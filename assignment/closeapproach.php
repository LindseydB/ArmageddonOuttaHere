<?php
session_start();

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

if(!isset($_SESSION['username'])){ //if login in session is not set
    header("Location: login.php");
}
?>

<?php include 'includes/header.php';?>
<main role="main" id ="closeapproach">
<div class="container">
  <div class="row">
    <div class="container-asteroid">
      <div id="asteroid"></div>
    </div>
    <div id="earth"></div>
    <div id="moon-orbit">
        <div id="moon"></div>
    </div>
   </div>
  </div>
</main>

<div class="timeline">
  <ol>

  </ol>
 </div>
</div>

  <?php include 'includes/footer.php';?>
