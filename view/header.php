<?php
  
  $loginUrl = $GLOBALS["appurl"].'/login';
  $loginTag = 'Login';
  $regriTag = "block";
  $gallerieTag = "none";
  $profileIcon = "none";
  $userName = "";
  $showGallerie = "";
  
  if (isset($_SESSION['uid'])) {
    $loginUrl = $GLOBALS["appurl"].'/login/logout';
    $loginTag = 'Logout';
    $regriTag = "none"; 
    $gallerieTag = "block";
    $profileIcon = "block";
    $userNameTag = "block";
    $userName = $_SESSION['name'];
    $showGallerie = "block";
  }
?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap core CSS -->
    
    <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/css/materialize.min.css">
    <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/css/bootstrap.min.new.css">
    <!-- Custom styles for this template -->
    <link href="<?=$GLOBALS['appurl']?>/css/style.css" rel="stylesheet">

    <script src="<?=$GLOBALS['appurl']?>/svg-injector.min.js"></script>

    <script>
      // Elements to inject
      var mySVGsToInject = document.querySelectorAll('.iconic-sprite');

      // Do the injection
      SVGInjector(mySVGsToInject);
    </script>

     <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?=$GLOBALS['appurl']?>/assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$GLOBALS['appurl']?>/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$GLOBALS['appurl']?>/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$GLOBALS['appurl']?>/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?=$GLOBALS['appurl']?>/assets/ico/apple-touch-icon-57-precomposed.png">

  

	<script src="<?=$GLOBALS['appurl']?>/js/jscript.js"></script>
    <title><?= $title ?></title>
  </head>
  <body style="padding-top:0">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Bilder-DB</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?=$loginUrl?>"><?=$loginTag?></a>
          </li>
          <li class="nav-item">
            <a style="display:<?=$regriTag ?>" class="nav-link" href="<?=$GLOBALS['appurl']?>/login/registration">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="display:<?=$gallerieTag ?>" href="<?=$GLOBALS['appurl']?>/gallerie/createGallery">Gallerie erstellen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="display:<?=$showGallerie?>" href="<?=$GLOBALS['appurl']?>/landing">Gallerien</a>
          </li>
        </ul>
        <ul class="navbar-nav pull-right">
          <li class="nav-item">
            <a class="nav-link" style="display:<?=$userNameTag ?>" href="<?=$GLOBALS['appurl']?>/login/editUser"><?=$userName?></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" style="display:<?=$profileIcon ?>" href="<?=$GLOBALS['appurl']?>/login/editUser"><img alt="icon" src="<?=$GLOBALS['appurl']?>/svg/person.svg"></a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
    <h3><?= $heading ?></h3>
