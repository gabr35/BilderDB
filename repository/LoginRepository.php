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

    public function chekcEmail($email) {

      $query = "SELECT name FROM user WHERE email=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $email);

      if (!$statement->execute()) {
        throw new Exception($statement->error);
      }

      $rows = array();
      $result = $statement->get_result();
      while ($row = $result->fetch_object()) {
        $rows[] = $row;
      }
      $statement->close();
      if (count($rows) > 0) {
        return false;
      } else {
        return true;
      }
    }

    public function checkLogin($email, $password)
    {
      // Query erstellen
      $query = "SELECT * FROM user WHERE email=?";
  
      // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
      // und die Parameter "binden"
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('s', $email);
  
      // Das Statement absetzen
      $statement->execute();
  
      // Resultat der Abfrage holen
      $result = $statement->get_result();
      if (!$result) {
        throw new Exception($statement->error);
      }
  
      // Ersten Datensatz aus dem Reultat holen
      $row = $result->fetch_object();
  
      // Datenbankressourcen wieder freigeben
      $result->close();

     
      //var_dump($row->password, sha1($password));
      //echo $row->password;
      //die();

      if ($row->password == sha1($password)) {
        //Den gefundenen Datensatz zurückgeben
       // echo $row->name;
        
        return $row;
      } else {
        // echo $row->name;
        // echo "nok";
        
        return null;
      }
    }

  }
?>