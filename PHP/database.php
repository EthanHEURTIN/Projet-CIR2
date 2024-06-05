<?php

  require_once('constants.php');

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
        $statement = $db->prepare('INSERT INTO public.user (email, password, capacity_tank_l, pressure_tank) SELECT :email::VARCHAR, :pwd, :cap, :pressure WHERE NOT EXISTS (SELECT 1 FROM user WHERE email=:email);');
        $statement->bindParam(':email', $email);
        $statement->bindParam(':pwd', $password_hash);
        $statement->bindParam(':cap', $capacity_tank_l);
        $statement->bindParam(':pressure', $pressure_tank);
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
        error_log('Request error: '.$e->getMessage());
        return false;
    }
  }





