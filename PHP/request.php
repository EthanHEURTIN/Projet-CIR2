<?php
require_once('database.php');

$data = null;

$db = dbConnect();
if (!$db)
{
  header('HTTP/1.1 503 Service Unavailable');
  exit;
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

if ($requestRessource == 'signing_up')
{
  if($requestMethod == 'POST')
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $capacity_tank_l = 15;
    $pressure_tank = 200;
    $data = insertUser($db, $email, $password, $capacity_tank_l, $pressure_tank);
  }
}

/**
 * Default settings user profile.
 */

if($requestRessource == "get_user_settings"){
    if($requestMethod == 'GET'){
        $data = getUserSettings($db, 1);
        // if(isset($_SESSION['id'])){
        //     $data = getUserSettings($db, 1);
        // }
    }
}


// Send result.
if (!empty($data)) {
  header('Content-Type: application/json; charset=utf-8');
  header('Cache-control: no-store, no-cache, must-revalidate');
  header('HTTP/1.1 200 OK');
  echo json_encode($data);
  exit();
}

// Bad request case.
header('HTTP/1.1 400 Bad Request');

?>
