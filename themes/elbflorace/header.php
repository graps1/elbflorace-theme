<!DOCTYPE html>
<?php
  include 'functions/header-functions.php';
  include 'functions/post-template.php';
?>

<head>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet'  type='text/css'>
</head>

<html <?php language_attributes(); ?>>
<head>

<title> <?php the_title(); ?> </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
 href="<?php echo get_theme_dir() ?>bootstrap/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
 crossorigin="anonymous"/>

<!-- Optional theme -->
<link rel="stylesheet"
 href="<?php echo get_theme_dir() ?>bootstrap/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
 crossorigin="anonymous"/>

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo get_theme_dir() ?>bootstrap/js/bootstrap.min.js"
 integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
 crossorigin="anonymous"></script>

<link rel="stylesheet" href="/wordpress/wp-content/themes/elbflorace/style.css">

<!--
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');
  echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>"
  type="text/css" media="screen, projection" />
-->

<meta name="viewport"
 content="width=device-width, initial-scale=1.0 maximum-scale=1.0, user-scalable=no">

</head>
<body <?php body_class(); ?>>

  <div class="navbar-header-custom">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">

      <div class="container">
          <div class="navbar-header navbar-custom">
            <button type="button" class="navbar-toggle collapsed"
             data-toggle="collapse" data-target="#bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          </div>
      </div>


      <div class="collapse navbar-collapse navbar-custom" id="bs-navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a class="tab" href="/wordpress/index.php">Home</a></li>
          <li><a class="tab" href="/wordpress/index.php/team">Team</a></li>
          <li><a class="tab" href="#">Fahrzeuge</a></li>
          <li><a class="tab" href="#">Erfolge</a></li>
          <li><a class="tab" href="/wordpress/index.php/wettbewerb">Wettbewerb</a></li>
          <li><a class="tab" href="#">Medien</a></li>
          <li><a class="tab" href="#">Mitgliedschaft</a></li>
          <li><a class="tab" href="#">Sponsoren</a></li>
        </ul>
      </div>
    </nav>

  </div>

  <img id="header" src="<?php echo get_page_banner(); ?>"></img>

  <div id="main-content" class="main-content container-fluid col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
    <div id="logo">
      <img src='<?php echo get_page_banner_dir() . "logo.png"; ?>'></img> 
    </div>
