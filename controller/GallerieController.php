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

    public function delete() {
      
      $id = $_GET['id'];
      $galleryRepository = new GalleryRepository();
      $galleryRepository->deleteGalleryById($id);
      header('Location: '.$GLOBALS['appurl'].'/landing');
    }

    public function edit() {
      $id = $_GET['id'];
      $galleryRepository = new GalleryRepository();
      $gallery = $galleryRepository->getGalleryById($id);
      $view = new View('edit_gallery');
      $view->heading = 'Bilderdatenbank';
      $view->title = 'Gallerie erstellen';
      $view->gallery = $gallery;
      $view->display();
    }

    public function doEditGallery() {
      $id = $_GET['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $galleryRepository = new GalleryRepository();
      $galleryRepository->editGallery($id, $name, $description);
      header('Location: '.$GLOBALS['appurl'].'/landing');
    }
  }
?>