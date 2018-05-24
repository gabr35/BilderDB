<?php
require_once '../lib/Repository.php';

class GalleryRepository extends Repository {

    public function createGallery($name, $description, $uid) {

        $query = "INSERT INTO gallery (uid, description, name) VALUES (?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $uid, $description, $name);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function getGalleryById($id) {

        $query = "SELECT * FROM gallery WHERE id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

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
    
        // Den gefundenen Datensatz zurückgeben
        return $row;
    }

    public function getGalleriesByUid($uid) {

        $query = "SELECT * FROM gallery WHERE uid=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $uid);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $rows = array();
        $result = $statement->get_result();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $statement->close();
       return $rows;
    }

    public function deleteGalleryById($id) {
        $query = "DELETE FROM gallery WHERE id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $id);
    
        if (!$statement->execute()) {
          throw new Exception($statement->error);
        }
      }

      public function editGallery($id, $name, $description) {
        $query = "UPDATE gallery SET description=?, name=? where id=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi', $description, $name, $id);
        if (!$statement->execute()) {
            throw new Exception($statement->error);
          }
      }

      public function getFotosByGid($gid) {
        $query = "SELECT * FROM picture WHERE gid=?";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $gid);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        $rows = array();
        $result = $statement->get_result();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }
        $statement->close();
       return $rows;
      }

      public function createPicture($gid, $name, $path, $thumpnail, $description) {
        $query = "INSERT INTO picture (gid, name, description, path, thumpnail) VALUES (?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $gid, $name, $description, $path, $thumpnail);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
        var_dump($gid, $name, $path, $thumpnail, $description);
        die();
      }

}
?>