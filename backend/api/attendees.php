<?php
include '../util.php';

if (!Auth::user()) {
  die('Not logged in');
}

if($_SERVER['REQUEST_METHOD'] === 'GET'){
 // Redirect::forbidden();
}

if (isset($_GET['api']) && $_GET['api'] != '') {
  $result = $_GET['api']();
  echo $result;
}

function getAttendees(){
    $data = Database::db()->table('guests as g')->join('rsvp as r', 'g.id', 'r.guest_id')->where('attend', 1)->getAll();
    //$data = Database::db()->table('guests')->getAll();
    return json_encode($data);
}