<?php 
include_once 'resource/session.php';
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

?>

<!DOCTYPE html>
<html>
<head lang="en">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?php if(isset($page_title)) echo $page_title; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">


</head>
<body background="boston2.jpg" style="background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">



<nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #071822">
  
  <a class="navbar-brand" href="https://www.boston.gov/community-preservation">
    <img src="cityofboston.png" width="210" height="45" alt="" style="margin-left: 25px;" >
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Home</a>
      </li>

      <?php if((isset($_SESSION['username']) || isCookieValid($db))): ?>


        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>

      <?php else: ?>
          
        <li class="nav-item">
          <a class="nav-link" href="login.php">Sign in</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="signup.php">Register</a>
        </li>

      <?php endif ?>

    </ul>
    
  </div>
</nav>