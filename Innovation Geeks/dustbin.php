<!DOCTYPE html>
<?php
	$servername = "localhost";//use the sql server Name
	$username = "root";//use your sql username
	$password = "Shruti@123"; //use your sql password
	$dbname = "arduino";// Please do not change this line
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<html>
  <head>
    <style>
      #map {
        height: 1000px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
    </style>
  </head>
  <body>
    <div id="container" style="position: relative;">
      <img src="marker.png" id="marker" width="100px" height="100px" alt="Hostel 10" style="display: none; position: absolute" />
      <img src="marker.png" id="marker1" width="100px" height="100px" alt="Hostel 4" style="display: none; position: absolute" />
      <img src="marker.png" id="marker2" width="100px" height="100px" alt="Hostel 5" style="display: none; position: absolute" />
      <img src="map.png" id="map"  />
    </div>
  </body>

  <script>
    var p = 4;
    document.getElementById('map').onload = put_marker(300, 350);
    document.getElementById('map').onload = put_marker1(450, 350);
    document.getElementById('map').onload = put_marker2(1000, 500);

    function put_marker(from_left, from_top) {
      if (p==4){
        with(document.getElementById('marker')) {
          document.getElementById('marker').src="marker2.png";
          style.left = from_left + "px";
          style.top = from_top + "px";
          style.display = "block";
        }
      }
    };

    function put_marker1(from_left, from_top) {
      with(document.getElementById('marker1')) {
        style.left = from_left + "px";
        style.top = from_top + "px";
        style.display = "block";
      }
    };

    function put_marker2(from_left, from_top) {
      with(document.getElementById('marker2')) {
        document.getElementById('marker2').src="marker2.png";
        style.left = from_left + "px";
        style.top = from_top + "px";
        style.display = "block";
      }
    };

  </script>

</html>
