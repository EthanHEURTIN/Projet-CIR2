<?php

    session_start();

  require_once('/PHP/constants.php');

/**
 * Create the connection to the database.
 * @return PDO|false
 */
  function dbConnect()
  {
    try
    {
      $db = new PDO('pgsql:host='.DB_SERVER.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $exception)
    {
      error_log('Connection error: '.$exception->getMessage());
      return false;
    }
    return $db;
  }


////////////////
// Connection //
////////////////


/**
 * Insert an user into database.
 * @return true|false
 */

function insertUser($db, $email, $password, $capacity_tank_l, $pressure_tank){
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    try {
        $statement = $db->prepare('INSERT INTO public.user (email, password, capacity_tank_l, pressure_tank) VALUES (:email, :pwd, :cap, :pressure)');
        $statement->bindParam(':email', $email);
        $statement->bindParam(':pwd', $password_hash);
        $statement->bindParam(':cap', $capacity_tank_l, PDO::PARAM_INT);
        $statement->bindParam(':pressure', $pressure_tank, PDO::PARAM_INT);
        $statement->execute();
    } catch (PDOException $exception) {
        error_log('Request error: '.$exception->getMessage());
        return false;
    }
    return true;
}

/**
 * Check if a client can connect.
 * @return true|false
 */

function canConnect($db, $email, $password){
    try {
        $statement = $db->prepare('SELECT password FROM public.user WHERE email=:email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $result['password'])){
            return true;
        }
        else {
            return false;
        }
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }
}

  
//////////////////
// User profile //
//////////////////

/**
 * Gives the default settings of an user.
 * @return array|false
 */

function getUserSettings($db, $email){
    try {
        $statement = $db->prepare('SELECT capacity_tank_l, pressure_tank FROM public.user WHERE email=:email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo 'Request error :'.$e->getMessage();
        return false;
    }
}

/**
 * Set the default settings of an user.
 * @return true|false
 */

function setUserSettings($db, $email, $capacity, $pressure){
    try {
        $statement = $db->prepare('UPDATE public.user SET capacity_tank_l=:cap, pressure_tank=:press WHERE email=:email');
        $statement->bindParam(':cap', $capacity);
        $statement->bindParam(':press', $pressure);
        $statement->bindParam(':email', $email);
        $result = $statement->execute();
        return $result;
    } catch (PDOException $e) {
        echo 'Request error :'.$e->getMessage();
        return false;
    }
}


/**
 * Get the user's email.
 * @return string|false
 */

function getUserEmail($db, $email){
    try {
        $statement = $db->prepare('SELECT email FROM public.user WHERE email=:email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['email'];
    } catch (PDOException $e) {
        error_log('Request error: 1 '.$e->getMessage());
        return false;
    }
}

/**
 * Get the user's id.
 * @return number|false
 */

 function getUserId($db, $email){
    try {
        $statement = $db->prepare('SELECT iduser FROM public.user WHERE email=:email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['iduser'];
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }
}

//////////////
// Profiles //
//////////////

function insertProfile($db, $depth, $duration, $idUser){
    try {
        $statement = $db->prepare('INSERT INTO public.profile (duration_min, depth, iduser) SELECT :duration, :depth, :id WHERE NOT EXISTS (SELECT 1 FROM public.profile WHERE depth=:depth AND duration_min=:duration AND iduser=:id)');
        $statement->bindParam(':duration', $duration);
        $statement->bindParam(':depth', $depth);
        $statement->bindParam(':id', $idUser);
        $result = $statement->execute();
        return $result;
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }
}

/**
 * Get the user profiles.
 * @return array|false 
 */

 function getUserProfiles($db, $email){
    try {
        $statement = $db->prepare('SELECT * FROM public.profile p JOIN public.user u ON p.iduser=u.iduser WHERE u.email=:email');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)){
            return -1;
        }
        else {
            return $result;
        }
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }
 }

/**
 * Delete an user profile.
 * @return true|false
 */

 function deleteUserProfile($db, $email, $depth, $duration){
    try {
        $statement = $db->prepare('DELETE FROM public.profile p USING public.user u WHERE u.email=:email AND p.depth=:depth AND p.duration_min=:duration');
        $statement->bindParam(':email', $email);
        $statement->bindParam(':depth', $depth);
        $statement->bindParam(':duration', $duration);
        $result = $statement->execute();
        return $result;
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }
 }


////////////////
// Table MN90 //
////////////////

/**
 * Get the MN90's table with depth.
 * @param {PDO} db - Database connection
 * @param {int} depth - Depth of the profile
 * @return array|false
 */

function dbMN90TableDepth($db, $depth){
    $result1; $result2;
    try {
        $statement = $db->prepare('SELECT * FROM public.mn90 WHERE prof=:depth');
        $statement->bindParam(':depth', $depth);
        $statement->execute();
        $result1 = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }

    try {
        $statement = $db->prepare('SELECT capacity_tank_l, pressure_tank FROM public.user WHERE email = :email');
        $statement->bindParam(':email', $_SESSION['email']);
        $statement->execute();
        $result2 = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Request error: '.$e->getMessage());
        return false;
    }

    $result = array_merge($result1, $result2);
    return $result;

}

function dbMN90Line($conn, $depth, $duration){

    $email = $_SESSION['email'];

    $requete = $conn->prepare('SELECT *  FROM public.mn90 WHERE prof = :depth AND t = :duration');
    $requete->bindParam(':depth', $depth);
    $requete->bindParam(':duration', $duration);
    $requete->execute();
    $info1 = $requete->fetch(PDO::FETCH_ASSOC);

    $counter = 0;
    if($info1['m15'] != null){ $counter++; }
    if($info1['m12'] != null){ $counter++; }
    if($info1['m9'] != null){ $counter++; }
    if($info1['m6'] != null){ $counter++; }
    if($info1['m3'] != null){ $counter++; }    
    $info3 = array('nb_paliers' => $counter);

    $requete = $conn->prepare('SELECT capacity_tank_l, pressure_tank FROM public.user WHERE email = :email');
    $requete->bindParam(':email', $email);
    $requete->execute();
    $info2 = $requete->fetch(PDO::FETCH_ASSOC);

    $result = array_merge($info1, $info2, $info3);
    return $result;
}

function getMn90InfoByDepth($conn, $depth){
    $requete = $conn->prepare('SELECT * FROM public.mn90 WHERE prof = :depth');
    $requete->bindParam(':depth', $depth);
    $requete->execute();
    $info = $requete->fetchAll();
    return $info;
}

function getDepth($conn){
    $requete = $conn->prepare('SELECT DISTINCT prof FROM public.mn90 ORDER BY prof');
    $requete->execute();
    $info = $requete->fetchAll();
    return $info;
}