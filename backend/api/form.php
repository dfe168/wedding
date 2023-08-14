<?php
include '../util.php';


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  Redirect::forbidden();
}

if (isset($_GET['api']) && $_GET['api'] != '') {
  $result = $_GET['api']();
  echo $result;
}

function fetchFormData()
{

  $data = json_decode(file_get_contents('php://input'), true);
  $token = $data['token'];

  if (!Token::validateToken($token)) {
    return json_encode(["error" => 'Invalid Token']);
  }

  $guestID = Token::validateToken($token)->data->user;

  $guest = Database::db()->table('guests')->where('id', $guestID)->get();

  //fom not compleeted
  if ($guest->rsvp_completed == 0) {
    $response = [
      "name" => $guest->name,
      "phone" => $guest->phone
    ];
    return json_encode($response);
  }

  $response = Database::db()->select('rsvp_completed,r.attend, g.name, g.phone,r.adults, r.children,r.accommodation, r.flight_in,r.flight_out,
  r.flight_in_datetime, r.flight_out_datetime,r.flight_out_num, r.flight_out_num, r.flight_in_num, r.flight_from , r.flight_to')
    ->table('guests as g')->join('rsvp as r', 'g.id', 'r.guest_id')->where('guest_id', $guestID)->get();

  return json_encode($response);
}

function saveFormData()
{

  $data = $_POST;

  $params_guest = [
    "name" => $data['name'],
    "phone" => $data['phone'],
    "rsvp_completed" => 1,
    "update_datetime" => date('Y-m-d H:i:s'),
  ];

  //validate token
  if (isset($data['token']) && Token::validateToken($data['token'])) {
    $token = $data['token'];

    $guestID = Token::validateToken($token)->data->user;
    Database::db()->table('guests')->where('id',$guestID)->update(["update_datetime"=>date('Y-m-d H:i:s')]);
    //inset or update rsvp
    insert_rsvp($data);

  } else { //new guest
    //inset to table guests
    try {
      Database::db()->table('guests')->insert($params_guest);
    } catch (\Throwable $th) {
      return ['error ' => true];
    }

    //insert to table rsvp

    try {
      insert_rsvp($data);
    } catch (\Throwable $th) {
      throw $th;
      //return ['error ' => true];
    }
  }


  //redirest to send page
}


function insert_rsvp($data)
{
  $guest = Database::db()->table('guests')->where('name', $data['name'])->get();
  $guestID = $guest->id;
  $guesttoken = Token::generateJWT($guestID, true);
  Database::db()->table('guests')->where('id', $guestID)->update(["token" => $guesttoken]);

  $param_rsvp = [
    "guest_id" => $guest->id,
    "attend" => ($data['attend'] == 'true') ? 1 : 0,
    "adults" => $data['adults'],
    "children" => $data['children'],
    "accommodation" => ($data['accommodation'] == 'true') ? 1 : 0,
  ];
  $param_accommodation = [
    "flight_in" => (isset($data['flight_in_datetime']) ? 1 : 0),
    "flight_out" => (isset($data['flight_out_datetime']) ? 1 : 0),
    "flight_in_datetime" => $data['flight_in_datetime'],
    "flight_in_num" => $data['flight_in_num'],
    "flight_from" => $data['from'],
    "flight_out_datetime" => $data['flight_out_datetime'],
    "flight_out_num" => $data['flight_out_num'],
    "flight_to" => $data['to']
  ];

  if ($param_rsvp['accommodation'] == 0) {
    $params = $param_rsvp;
  } else {
    $params = array_merge($param_rsvp, $param_accommodation);
  }

  //check if guest_is exixts in table rsvp (insert or upate record)
  if (Database::db()->table('rsvp')->where('guest_id', $guestID)->get()) {
    //update all data in table rsvp
    Database::db()->table('rsvp')->update($params);
  } else {
    //insert all data in table rsvp
    Database::db()->table('rsvp')->insert($params);
  }


  //set form completed to 1
  Database::db()->table('guests')->where('id', $guestID)->update(['rsvp_completed' => 1]);

  //return Redirect::xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

}



function updateRsvp($guestID, $param_rsvp, $param_accommodation = [])
{

  // if first time rsvp insert or update 
  $guestRsvp = Database::db()->table('rsvp')->where('guest_id', $guestID)->get();
  if (!$guestRsvp) {
    try {
      Database::db()->table('rsvp')->insert($param_rsvp);
    } catch (\Throwable $th) {
      //throw $th;
    }
  } else {
    Database::db()->table('rsvp')->where('guest_id', $guestID)->update($param_rsvp);
  }

  //update accomodation
  if ($param_rsvp['accommodation'] === 1) {
    Database::db()->table('rsvp')->where('guest_id', $guestID)->update($param_accommodation);
  }
}
