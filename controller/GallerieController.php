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

    public function fotos() {
      $gid = $_GET['gid'];
      $galleryRepository = new GalleryRepository();
      $view = new View('foto_gallery');
      $view->heading = 'Fotos';
      $view->title = 'Fotos';
      $view->gid = $gid;
      $view->fotos = $galleryRepository->getFotosByGid($gid);
      $view->display();
    }

    public function createFoto() {
      $gid = $_GET['gid'];
      $view = new View('create_foto');    
      $view->heading = 'Bilderdatenbank';
      $view->title = 'Foto hochladen';
      $view->gid = $gid;
      $view->display();
    }

    public function doCreateFoto() {
      $description = $_POST['description'];
      $name = $_POST['name'];
      $gid = $_GET['gid'];

      $target_dir = "uploads/";
      $target_file = $target_dir.time()."_".basename($_FILES["picture"]["name"]);
      $target_file_small = $target_dir.time()."_small_".basename($_FILES["picture"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if($imageFileType === "jpg" || $imageFileType === "png") {
          $check = getimagesize($_FILES["picture"]["tmp_name"]);
           var_dump($check, "chekc if png or jpg");
          //die();
          if($_FILES["fileToUpload"]["size"] < 400000) {
              //echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
              var_dump($target_file, "chekc if picture");
              //die(); //bis hier kommt er
              if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                  var_dump($target_file, "move upolaod");
                  //die();
                  //make thumpnail
                  if ($imageFileType === "jpg") {
                    $filename = $target_file;
                    $source = imagecreatefromjpeg($filename);
                    list($width, $height) = getimagesize($filename);
                    $factor = $width / $height;
                    $newheight = 200;
                    $newwidth = 200 * $factor;
                    $destination = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    imagejpeg($destination, $target_file_small, 100);
                    var_dump($gid, $name, $target_file, $target_file_small, $description, "jpg");
                    //die();
                  } else {
                    $filename = $target_file;
                    $source = imagecreatefrompng($filename);
                    list($width, $height) = getimagesize($filename);
                    $factor = $width / $height;
                    $newheight = 200;
                    $newwidth = 200 * $factor;
                    $destination = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($destination, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    imagepng($destination, $target_file_small, 100);
                  }
                  
                  $galleryRepository = new GalleryRepository();
                  $galleryRepository->createPicture($gid, $name, $target_file, $target_file_small, $description);
                  header('Location: '.$GLOBALS['appurl'].'/gallerie/fotos?gid='.$gid);
                  
              } else {
                  var_dump('Fehlere beim hochladen, versuche es nochmal');
                  //die();
                  header('Location: '.$GLOBALS['appurl'].'/gallerie/createFoto?error='.'Fehlere beim hochladen, versuche es nochmal&gid='.$gid);
              }

          } else {
            var_dump("Das hochgeladene File ist kein bild");
            //die();
            header('Location: '.$GLOBALS['appurl'].'/gallerie/createFoto?error='.'Das hochgeladene Bild ist zu gross&gid='.$gid);
          }
      } else {
        var_dump("Es werden nur JPG oder PNG akzeptiert");
        //die();
        header('Location: '.$GLOBALS['appurl'].'/gallerie/createFoto?error='.'Es werden nur JPG oder PNG akzeptiert&gid='.$gid);
      }
      
    }

    public function editFoto() {
      $fid = $_GET['fid'];
      
      $galleryRepository = new GalleryRepository();
      $view = new View('foto_edit');
      $view->heading = 'Foto Bearbeiten';
      $view->title = 'Foto Bearbeiten';
      $view->fid = $fid;
      $view->foto = $galleryRepository->getFotoById($fid);
      $view->display();
    }

    public function doEditFoto() {
      $id = $_GET['id'];
      $gid = $_GET['gid'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $galleryRepository = new GalleryRepository();
      $galleryRepository->editFoto($id, $name, $description);
      header('Location: '.$GLOBALS['appurl'].'/gallerie/fotos?gid='.$gid);
    }

    public function deleteFoto() {
      $id = $_GET['id'];
      $gid = $_GET['gid'];
      $galleryRepository = new GalleryRepository();
      $galleryRepository->deleteFotoById($id);
      unlink($GLOBALS['appurl'].'/'.$_POST['path_small']);
      unlink($GLOBALS['appurl'].'/'.$_POST['path']);
      var_dump($GLOBALS['appurl'].'/'.$_GET['path'], $_GET['path_small']);
      die();
      header('Location: '.$GLOBALS['appurl'].'/gallerie/fotos?gid='.$gid);
    }
  }
?>