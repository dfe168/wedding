<?php
include '../util.php';

if (!Auth::user()) {
  die('Not logged in');
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
  Redirect::forbidden();
}

if (isset($_GET['api']) && $_GET['api'] != '') {
  $result = $_GET['api']();
  echo $result;
}


function create()
{
  $data = json_decode(file_get_contents('php://input'), true);

  $name = $data['name'];
  $phone = $data['fullPhoneNumber'];

  $params = [
    'name' => $data['name'],
    'phone' => $phone
  ];

  if (!fetchGuest($name)) {
    //insert new guest
    try {
      Database::db()->table('guests')->insert($params);
    } catch (\Throwable $th) {
      return json_encode(['error' => true, 'message' => 'Cant not create new Guest. contact Dara']);
    }

    try {
      generateNewToken($name);

    } catch (\Throwable $th) {
      //throw $th;
    }

    $guest = fetchGuest($name);

    return json_encode([
      'error' => false,
      'message' => 'Send invitation to ' . $guest->name . ' on phonenumber(' . $guest->phone . ')',
      'token' => $guest->token,
      'phoneNum' => $guest->phone,
    ]);
  } else {
    $guest = fetchGuest($name);
    if(!$guest->token){
      generateNewToken($guest->name);
      $guest = fetchGuest($name);
    }
    return json_encode([
      'error' => true,
      'message' => 'Warning: Guest name <b>'. $guest->name .'</b> already exists, with phonenumber (' . $guest->phone . ')',
      'token' => $guest->token,
      'phoneNum' => $guest->phone,
    ]);
  }
}

function generateNewToken($name){
  $guest = fetchGuest($name);
  $token = Token::generateJWT($guest->id,true);
  Database::db()->table('guests')->where('name', $name)->update(['token' => $token]);

  return $token;
}


function fetchGuest($name)
{
  $guest =  Database::db()->table('guests')->where('name', $name)->get();

  if ($guest) {
    return $guest;
  }
  return false;
}
