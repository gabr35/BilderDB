<?php
require_once '../repository/GalleryRepository.php';
 
  class LandingController
  {
   
    public function index()
    {
      // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
      //   "default_index" rendern. Wie das genau funktioniert, ist in der
      //   View Klasse beschrieben.
      $galleryRepository = new GalleryRepository();
      $view = new View('login_landing');
      $view->title = 'Landingpage';
      $view->heading = 'Landingpage';
      $view->galleries = $galleryRepository->getGalleriesByUid($_SESSION['uid']);
      $view->display();
    }
  }
?>