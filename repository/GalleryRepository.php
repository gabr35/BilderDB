<?php
require_once '../lib/Repository.php';

class GalleryRepository extends Repository {

    public function createGallery($name, $description, $uid) {

        $query = "INSERT INTO gallery (uid, description, name) VALUES (?,?,?)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('iss', $uid, $name, $description);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

}
?>