<?php
error_reporting(0);
session_start();
$username = $_SESSION["username"];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
     <title>Armageddon outta here!</title>
    <link id="bootstrap" href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap" href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/05712f27b3.js" crossorigin="anonymous"></script>
    <link id="bootstrap" href="css/closeapproach.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap" href="css/booking.css" rel="stylesheet" type="text/css" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-menu">
      <div class="container">
           <div class="col-md-6" style="">
              <a href="index.php"><img src="images/logo-light.png" /></a>
            </div>

          <div class="col-md-6">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>

          <?php if (isset($_SESSION['username'])): ?>

            <li class="nav-item">
              <a class="nav-link" href="closeapproach.php">Dashboard</a>
            </li>
            <li class="nav-item welcome">
              <a class="nav-link nav-button" href="logout.php">Welcome <?php echo $username;?>, Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
          <?php endif; ?>
          <?php if (isset($_SESSION['username'])): ?>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="user-registration.php">Register</a>
            </li>
          <?php endif; ?>
        </ul>
    </div>
  </div>
</div>
</nav>
