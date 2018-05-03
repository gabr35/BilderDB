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

}
?>