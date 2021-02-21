<?php
namespace armageddon;
session_start();
error_reporting(0);
date_default_timezone_set("Pacific/Auckland");

require_once __DIR__ . '/Model/Member.php';
$member = new Member();

require_once __DIR__ . '/lib/DataSource.php';
$ds= new DataSource();

$memberID = $member->getMember($_SESSION["username"])[0]['id'];

$query = "SELECT seats FROM bookings WHERE bookingdate = '".Date("Y-m-d H:i:s",$_GET['date'])."'";
$bookings = $ds->select($query);
$bookedSeats = array();

foreach($bookings as $booking){

$seats = json_decode($booking['seats']);
  foreach($seats as $seat){
    if(!in_array($seat,$bookedSeats)){
      array_push($bookedSeats,$seat);
    }
  }
}

if(isset($_POST['date'])){
  //form has been submitted, we have a post request
  $date = $_POST['date'];
  $seats = json_encode($_POST['seats']);

  $query = 'INSERT INTO bookings (memberid, bookingdate, seats) VALUES (?, ?, ?)';
  $paramType = 'sss';
  $paramValue = array(
      $memberID,
      $date,
      $seats
  );
  $bookingid = $ds->insert($query, $paramType, $paramValue);
  if (! empty($bookingid)) {
      header("location:success.php");
  }else{
    header("location:error.php");
  }

}else{
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

  $date = date('F j, Y @ g:i a', $_GET['date']);
?>

<?php include 'includes/header.php';?>

<main role="main" id ="booking">
  <form action="" method="post">
    <input type="hidden" name="date" id="date" value="<?php echo Date("Y-m-d H:i:s",$_GET['date'])?>"></input>
  <div class="inputForm">
    <div class="book-intro">
      <p>Okay <strong> <?php echo $username;?>,</strong><br />let's book your evacuation for<strong> <?php echo $date; ?></strong></p>
      <p>Your current plan allows you to book up to <strong>3</strong> seats.
   </div>

  <center>
    <input type="hidden" name="numseats" id="Numseats" value="3"></input>
  </center>
  </div>

<div class="seating">
  <div class="rocket-nose">
  </div>

  <div class="seat-structure">
  <center>
  <table id="seatsBlock">
   <p id="notification"></p>
    <tr><br/></tr>

    <?php
    $seatRows = array('A','B','C','D','E','F','G','H','I','J');
    $seatsPerRow = 10;
    ?>

    <tr><td></td>
      <?php
      for($i=0;$i<$seatsPerRow;$i++){
        if($i+1 % 2 ==6){
          echo "<td>&nbsp;</td>";
        }
        ?>
        <td><?php echo $i+1; ?></td>
    <?php
  } ?>
  </tr>

  <?php
  foreach($seatRows as $rowLetter){
    ?>
    <tr>
      <td><?php echo $rowLetter ?></td>

      <?php
      for($i=0;$i<$seatsPerRow;$i++){

        if($i+1 % 2 ==6){
          echo "<td>&nbsp;</td>";

        }

        $rowNum = $i+1;
        $seatNum = $rowLetter.$rowNum;
      ?>
      <td><input type="checkbox" class="seats <?php if(in_array($seatNum,$bookedSeats)){ ?> disabled <?php } ?>" name="seats[]" value="<?php echo $seatNum; ?>" <?php if(in_array($seatNum,$bookedSeats)){ ?> disabled <?php } ?>></td>

    <?php
  }
  ?>

  <?php

  if($rowLetter == "E"){
    echo '<tr class="seatVGap"></tr>';
   }
  }
  ?>

  </table>
</div>

  <br/><br/>

  <div class="displayerBoxes">
  <center>
    <button onclick="updateTextArea();return false;" class="confirm">Confirm Selection</button>
    <div class="spacer-40"></div>
    </div>
<table class="confirmation">
  <tr><td><p class="book">Date:</p></td><td><p class="book" id="nameDisplay"> <?php echo Date("F j Y",$_GET['date'])?></p></td></tr>
      <tr><td><p class="book">Quantity:</p></td><td><p class="book" id="NumberDisplay" readonly></p></td></tr>
    <tr><td><p class="book">Seats:</p></td><td><p class="book" id="seatsDisplay"  readonly></p></td></tr>
    <tr><td colspan="2"> <div class="spacer-40"></div>
 <button type="submit" id="complete" style="display:none;">Complete booking</button>
 <div class="spacer-40"></div>
</td></tr>
  </table>
   </center>

  </div>
 </div>
</form>
</main>

  <?php include 'includes/footer.php';?>

  <script>
  function onLoaderFunc()
  {
    $(".seatStructure *").prop("disabled", true);
    $(".displayerBoxes *").prop("disabled", true);
  }
  function takeData()
  {
    if (( $("#Username").val().length == 0 ) || ( $("#Numseats").val().length == 0 ))
    {
    alert("Please Enter your Name and Number of Seats");
    }
    else
    {
      $(".inputForm *").prop("disabled", true);
      $(".seatStructure *").prop("disabled", false);
      document.getElementById("notification").innerHTML = "<b style='margin-bottom:0px;background:yellow;'>Please Select your Seats NOW!</b>";
    }
  }

  function updateTextArea() {

    if (($("input:checked").length <= ($("#Numseats").val()))&&($("input:checked").length > 0))
      {
        $(".seatStructure *").prop("enabled", true);

       var allNumberVals = [];
       var allSeatsVals = [];

       //Storing in Array
       allNumberVals.push($("#Numseats").val());
       $('#seatsBlock :checked').each(function() {
         allSeatsVals.push($(this).val());
       });

       //Displaying
       $('#NumberDisplay').text(allSeatsVals.length);
       $('#seatsDisplay').text(allSeatsVals);

       $("#complete").show();

      }
    else
      {
        alert("Please select at least one seat to secure your safety!");
        return false;
      }
    }


  $(":checkbox").click(function() {
    console.log($("#Numseats").val());
    if ($("input:checked").length == ($("#Numseats").val())) {
      $(":checkbox").prop('disabled', true);
      $(':checked').prop('disabled', false);
    }
    else
      {
        $(":checkbox").prop('disabled', false);
      }
  });

  <?php } ?>

  </script>
