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
    <link rel="stylesheet" href="<?=$GLOBALS['appurl']?>/css/bootstrap.min.new.css">
    <!-- Custom styles for this template -->
    <link href="<?=$GLOBALS['appurl']?>/css/style.css" rel="stylesheet">

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
