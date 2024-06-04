<?php
require_once('database.php');

$data = null;

// Database connection.zeddzec
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

// Polls request.
if ($requestRessource == 'subscribe')
{
  $id = array_shift($request);
    if ($id == '')
      $id = NULL;
    $data = false;

    if ($requestMethod == 'GET')
    {
      $data = dbSelectPeople($db);
    }
    else if($requestMethod == 'POST')
    {
      $firstname = $_POST["firstname"];
      $lastname = $_POST["lastname"];
      $data = dbAddSubscriber($db, $firstname, $lastname);
    }
    else if($requestMethod == 'DELETE')
    {
      $firstname = $_GET["firstname"];
      $lastname = $_GET["lastname"];
      $data = dbDeleteSubscriber($db, $firstname, $lastname);

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
