<!-- ** footer begin ** -->

        <div class="subfooter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                          &copy; Copyright 2020
                        </div>
                        <div class="col-md-6 social-icons">
                              <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                              <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<script src="js/type.js" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/jquery.slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js"></script>

<script>

$(function(){
  $.ajax({
    url: "https://ssd-api.jpl.nasa.gov/cad.api?body=earth&sort=date"
  }).done(function(response){
    parse(response);
    $('li.asteroid-detail').hover(function(){
      var distanceFromEarth = $(this).data('distance');
      showAsteroid(distanceFromEarth);
    })
  });

  $("#closeapproach").click(function(){
    resetAsteroid();
  });

  function parse(json){
    //console.log(json);
    var objects = json.data;
    $.each(objects, function(key,value){
      var designation = value[0];
      var orbitID = value[1];
      var timeOfCloseApproach = value[3];
      var distance = value[4]; //astronomical unit.
      var velocitykms = value[7];
      console.log(timeOfCloseApproach);
      var astronomicalUnit = 149598073;



      var html = "<li class='asteroid-detail' data-distance='"+parseFloat(distance*astronomicalUnit).toFixed(4)+"'><strong>"+timeOfCloseApproach+"</strong><br />"+parseFloat(distance*astronomicalUnit).toFixed(4)+" kms from Earth, and moving at a velocity of "+parseFloat(velocitykms*3600).toFixed(2)+" km/h.";
      //au to km
      if (distance < 0.029) {
          html +=  "<br /> <p class='book-btn'><a href='booking.php?date="+Math.round(new Date(timeOfCloseApproach) /1000)+"'><strong>Book Evacuation</strong></a></p></li>";

      }
      $(".timeline ol").append(html);
    //  plotPoint(distance*1000+100);

    });
  };


  function resetAsteroid(){
    $("#asteroid").css("margin-left", -25);
    $("#asteroid").hide();
  }

  function showAsteroid(distanceFromEarth){
    var cssDistance;

    if(distanceFromEarth < 160000){
      cssDistance = distanceFromEarth/300;
    }else if(distanceFromEarth > 160000 && distanceFromEarth < 350000){
      cssDistance = distanceFromEarth/600;
    }else if(distanceFromEarth > 35000 && distanceFromEarth < 600000){
        cssDistance = distanceFromEarth/900;
    }else{
      cssDistance = distanceFromEarth/8700;
    }

    $("#asteroid").css("margin-left", -cssDistance);
    $("#asteroid").show();
  }

});

</script>
</html>
