<?php
require_once '../repository/GalleryRepository.php';
  class GallerieController
  {
    public function index()
    {
      
    }

    public function createGallery() {

        $view = new View('create_gallery');
        
        $view->heading = 'Bilderdatenbank';
        $view->title = 'Gallerie erstellen';
        $view->display();
    }

    public function doCreateGallery() {

      $name = $_POST['name'];
      $description = $_POST['description'];
      $galleryRepository = new GalleryRepository();
      $galleryRepository->createGallery($name, $description, $_SESSION['uid']);
      header('Location: '.$GLOBALS['appurl'].'/landing');

      
    }
  }
?>