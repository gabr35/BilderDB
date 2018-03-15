<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Benutzer
 */
  class LoginRepository extends Repository
  {

    public function registerUser($name, $email, $password) {
       
      $query = "INSERT INTO user (name, email, password) VALUES (?,?,?)";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('sss', $name, $email, $password);

      if (!$statement->execute()) {
        throw new Exception($statement->error);
      }

    }
  }
?>