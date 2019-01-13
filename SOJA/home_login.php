<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style type="text/css">
      .carousel-inner img {
  width: 85%;
  height: 25%;
  opacity: 75%;
}
#overlay {
  position: fixed; /* Sit on top of the page content */
  display: none; /* Hidden by default */
  width: 100%; /* Full width (cover the whole page) */
  height: 100%; /* Full height (cover the whole page) */
  top: 0; 
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
  cursor: pointer; /* Add a pointer on hover */
}
.carousel-caption {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}
.carousel-caption h1 {
  font-size: 500%;
  font-family: 'Abril Fatface', cursive;
}
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">NewTransactions</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">ModifyAvailability</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index10.php">LogIn</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
<br>
<br>
<br>


<?php
$sn = "localhost";
$un = "admin";
$pw = "jay&&ojas&saurav!!T$#1999";
$db = "small_scale_retail";

$conn = new mysqli($sn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM avit";
$result = $conn->query($query);

$result = $conn->query($query);
  if (!$result) die ($conn->error);
?>
<div class='container text-center'>
<div class='row'>
<div class='col-md-12'>
     <table class="table">
          <tr>
        <th>Item</th>
        <th>Availablity</th>
        <th colspan='3'>Available</th>
        </tr>
        <?php
     $rows = $result->num_rows;
     for ($j = 0 ; $j < $rows ; ++$j)
     {
     $result->data_seek($j);
     $row = $result->fetch_array(MYSQLI_ASSOC);
     ?><tr>
     <td><?php echo $row['item']; ?></td>
     <td> <?php echo $row['avail']; ?></td><td>
     <form action='' method='post'>
     <input type='submit' name='available' value = 'Available'>
         <input type='hidden' name='itemname_a' value='<?php echo $row['item']; ?>'></form></td>
             <td>
             <form action='' method='post'>
        <input type='submit' name='notavailable' value = 'Unavailable'>
         <input type='hidden' name='itemname_n' value='<?php echo $row['item']; ?>'></form></td>
         <td>
             <form action='' method='post'> 
         <input type='hidden' name='itemname_l' value=<?php echo $row['item']; ?>'>
          <input type='submit' name='lessavailable' value = 'Few availale'></form></td> </tr>
    <?php } ?></table></div></div></div>
    <?php $result->close();

  if(isset($_POST["available"]))
  {
    $query = "UPDATE avit SET avail = 2 WHERE item = '". $_POST["itemname_a"]."'";
    $result = $conn->query($query);
    header("Location:home_login.php");   

  }    

if(isset($_POST["notavailable"]))
  {   

    $query = "UPDATE avit SET avail = 0 WHERE item = '". $_POST["itemname_n"]."'";
    $result = $conn->query($query);
    header("Location: home_login.php");

    
  }
  if(isset($_POST["lessavailable"]))
  {
    $query = "UPDATE avit SET avail = 1 WHERE item = '". $_POST["itemname_l"]."'";
    $result = $conn->query($query);
    header("Location: retailerlogin.php");
    
  }







     

?>


    <!-- /.container -->

    <!-- Footer -->

    <footer>
  <div class="container-fluid">
    <div class="row text-center">
      <div class="col-md-6">
        <!-- IIT Dharwad Logo -->
        <img src="logo_white.png" class="logo">
      </div>
      <div class="col-md-6">
        <!-- IIT Dharwad Music Club Logo -->
        <hr class="light">
        <p>+91-0836-2212842</p>
        <a href="www.iitdh.ac.in">IIT Dharwad</p></a>
        <p>Walmi Campus, Belur Industrial Area</p>
        <p>PB Road, Dharwad -580011</p>
        <p>Karnataka, India</p>
        <!--<a href="www.iitdh.ac.in">www.iitdh.ac.in</p></a>-->
      </div>
      <div class="col-12">
        <hr class="light">
        <h5>&copy;Canteen</h5>
      </div>
    </div>
  </div>
</footer>

    <!--<footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
       /.container
    </footer>-->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
