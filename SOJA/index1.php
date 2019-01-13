<!DOCTYPE html>
<?php
/**
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = $_SESSION['myname'];
}
else {
    $logged = 'out';
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link href="style.css" rel="stylesheet">
    <title>
    	IIT Dharwad
    </title>
  </head>
  <body>

  	<div class="container-fluid">
  		<div class="row site_header">
  			<div class="col-4">
  				<a href="www.iitdh.ac.in"><img src="logo_white.png" class="logo2"></a>
  			</div>
  			<div class="col-4 text-center college_name_header">
	  			<h2 class="display-5" style="padding-top: 10px;">
	  				IIT Dharwad Music Club
	  			</h2>
	  		</div>
	  		<div class="col-4 text-center">
	  			<h1 class="display-4 club_logo"">R</h1>
	  		</div>
	  	</div>
  	</div>

  	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid text-center">
      <button type="button" class="navbar-toggler" data-toggle="collapse"
        data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
      	<ul class="navbar-nav ml-auto">
	      <li class="nav-item active"><a class="nav-link" href="index1.html"> Home</a></li>
	      <li class="nav-item"><a class="nav-link" href="New_Explore.php">Explore</a></li>
	      <li class="nav-item"><a class="nav-link" href="#">Team</a></li>
	      <li class="nav-item"><a class="nav-link" href="check_login.php">Hi, <?php echo $logged ?>!</a></li>
	      <li class="nav-item"><a class="nav-link" href="#">About</a></li>
  		</ul>
      </div>
  </div>
  </nav>

<!-- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">

	<ul class="carousel-indicators">
		<li data-target="#slides" class="active" data-slide-to="0"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
<div class="carousel-inner">
	<div class="carousel-item active">
		<img src="img/saurav.jpg">
	</div>
	<div class="carousel-item">
		<img src="img/adil.jpg">
	</div>
	<div class="carousel-item">
		<img src="img/club.jpg">
	</div>
	<div class="carousel-caption">
			<h1 class="display-2">Rhapsody</h1>
			<h3>Welcome</h3>
			<h3 class="heading">To IIT Dharwad Music Club</h3>
		</div>
</div>
</div>

<!-- Jumbotrom ON Music Club -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
			<p class="lead">
				Let's see how this Jumbotron Looks
			</p>
			<?php $cmd="python3 webscrapper.py"; exec($cmd, $output, $status);
					if($status) {
					echo "Exec command failed";
					} 
					else {
						echo "Files converted successfully";
					}
				?>
		</div>
	</div>
</div>

<!-- Welcome section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<div class="scroll_Reveal">
				<h1 class="display-4">Great!</h1>
			<hr>
			<div class="col-12">
				<p class="lead">Nice to meet you. Let's start! So at first we are planning to grab some coffee and then start coding. </p>
			</div>
		</div>
		</div>	
	</div>
</div>

<!-- Three colums Section -->

<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-xs-12 col-sm-6 col-md-6 music">
			<i class="fa fa-music" aria-hidden="true"></i>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<h2 class="display-4">Music!</h2><p class="lead"> Something Refreshing, Something Cool!</p>
		</div>
	</div>
	<hr class="my-4 light">
</div>

<!-- Footer -->

<footer>
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-md-4">
				<!-- IIT Dharwad Logo -->
				<img src="logo_white.png" class="logo">
				<hr class="light">
				<p>+91-0836-2212842</p>
				<a href="www.iitdh.ac.in">IIT Dharwad</p></a>
				<p>Walmi Campus, Belur Industrial Area</p>
				<p>PB Road, Dharwad -580011</p>
				<p>Karnataka, India</p>
			</div>
			<div class="col-md-4">
				<!-- IIT Dharwad Music Club Logo -->
				<hr class="light">
				<p>Saurav's Or Music Club's Number</p>
				<!--<a href="www.iitdh.ac.in">www.iitdh.ac.in</p></a>-->
			</div>
			<div class="col-md-4">
				<hr class="light">
				<h3 class="display-4">Follow Us</h3>
				<hr class="light">
				<div class="row text-center social">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<a href="https://www.facebook.com/rhapsody.iitdh/"><i class="fab fa-facebook"></i></a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<a href="https://www.instagram.com/rhapsody.iitdh/?utm_source=ig_profile_share&igshid=z319mzg8umva"><i class="fab fa-instagram"></i></a>
					</div>
				</div>
				<div class="row text-center social">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<a href="https://twitter.com/iitdhmusicclub"><i class="fab fa-twitter"></i></a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<a href="https://www.youtube.com/channel/UCrx2MGi5Za6RoMILjTmT9Cg?view_as=subscriber"><i class="fab fa-youtube"></i></a>
					</div>
				</div>
			</div>
			<div class="col-12">
				<hr class="light">
				<h5>&copy;Rhapsody</h5>
			</div>
		</div>
	</div>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
    	window.sr = ScrollReveal();
    	ScrollReveal().reveal('.navbar', {
    		duration: 2000,
    		origin: 'bottom'
    	})
    	ScrollReveal().reveal('.scroll_Reveal', {
    		duration: 2000,
    		origin: 'bottom',
    		distance:'200px'
    	})
    </script>

  </body>
</html>