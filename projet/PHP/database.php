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

  /**
   * Function to get all people
   * @return array|false
   */
  function dbSelectPeople($db)
  {
    try
    {
      $request = 'SELECT * FROM subscribe';
      $statement = $db->query($request);
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return $result;
  }

  function dbAddSubscriber($db, $firstname, $lastname)
  {
    try
    {
      $request = 'INSERT INTO subscribe VALUES(default, :firstname , :lastname)';
      $statement = $db->prepare($request);
      $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR, 20);
      $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR, 20);
      $statement->execute();
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return true;
  }

  function dbDeleteSubscriber($db, $firstname, $lastname)
  {
    try
    {
      $request = 'DELETE FROM tweets WHERE lastname=:lastname AND firstname=:firstname';
      $statement = $db->prepare($request);
      $statement->bindParam(':lastname', $id, PDO::PARAM_INT);
      $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR, 20);
      $statement->execute();
    }
    catch (PDOException $exception)
    {
      error_log('Request error: '.$exception->getMessage());
      return false;
    }
    return true;
  }


?>
