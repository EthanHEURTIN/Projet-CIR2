<?php

session_start();

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


if ($requestRessource == 'getMN90Depth'){
  if ($requestMethod == 'GET'){
    $data = dbMN90TableDepth($db, $_GET['Depth']);
  }
}

if ($requestRessource == 'getDepth'){
  if ($requestMethod == 'GET'){
    $data = getDepth($db);
  }
}

if ($requestRessource == 'dbMN90Line'){
  if ($requestMethod == 'GET'){
    $data = dbMN90Line($db, $_GET['Depth'], $_GET['Duration']);
  }
}

/**
 * Default settings user profile.
 */

if($requestRessource == "get_user_settings"){
    if($requestMethod == 'GET'){
      if(isset($_SESSION['email'])){
        $data = getUserSettings($db, $_SESSION['email']);
      }
    }
}

if($requestRessource == "set_user_settings"){
    if($requestMethod == 'PUT'){
        parse_str(file_get_contents('php://input'), $_PUT);
        if(isset($_SESSION['email'])){
            $data = setUserSettings($db, $_SESSION['email'], $_PUT['capacity'], $_PUT['pressure']);
        }
    }
}

/**
 * Profiles
 */

if($requestRessource == "insert_profile"){
    if($requestMethod == 'POST'){
        if(isset($_SESSION['email']) && isset($_POST)){
            $data = insertProfile($db, $_POST['depth'], $_POST['duration'], getUserId($db, $_SESSION['email']));
        }
    }
}

if($requestRessource == "get_user_profiles"){
    if($requestMethod == 'GET'){
        if(isset($_SESSION['email']) && isset($_GET)){
            $data = getUserProfiles($db, $_SESSION['email']);
            if($data == -1){
                $data = array("error" => "empty");
            }
        }
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
