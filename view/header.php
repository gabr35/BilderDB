<?php
  
  $loginUrl = $GLOBALS["appurl"].'/login';
  $loginTag = 'Login';
  $regriTag = "block";
  $gallerieTag = "none";
  
  if (isset($_SESSION['uid'])) {
    $loginUrl = $GLOBALS["appurl"].'/login/logout';
    $loginTag = 'Logout';
    $regriTag = "none"; 
    $gallerieTag = "display";
  }
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="<?=$GLOBALS['appurl']?>/css/style.css" rel="stylesheet">

  

	<script src="<?=$GLOBALS['appurl']?>/js/jscript.js"></script>
    <title><?= $title ?></title>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">Bilder-DB</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
			<!-- fix schf -->
            <li><a href="<?=$loginUrl?>"><?=$loginTag?></a></li> 
            <li style="display:<?=$regriTag ?>"><a href="<?=$GLOBALS['appurl']?>/login/registration">Registration</a></li>      
            <li style="display:<?=$gallerieTag ?>"><a href="<?=$GLOBALS['appurl']?>/gallerie/createGallery">Gallerie erstellen</a></li>      
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">
    <h3><?= $heading ?></h3>
