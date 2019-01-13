<?php
include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	sec_session_start();
    $target_dir="images/";
    /*$stmt = mysqli_query($mysqli,"SELECT name FROM image_names");
while($row = $stmt->fetch_array())
	{
		$img[] = $row;
		$totalimages = $totalimages + 1;
	}*/
?>
<html lang="en">

<head>
<title>New Upload</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
	<link href="style.css" rel="stylesheet">
<style>
	.inputfile {
		width: 0.1px;
		height: 0.1px;
		opacity: 0;
		overflow: hidden;
		position: absolute;
		z-index: -1;
	}
	.inputfile + label {
		font-size: 1.25em;
		font-weight: 700;
		color: white;
		padding: 10px;
		background-color: #660066;
		display: inline-block;
		cursor: pointer;
		border-radius: 0.25rem;
	}
	.inputfile:focus + label,
	.inputfile + label:hover {
		background-color: #ffccff;
		color: black;
		padding: 10px;
	}
	.inputfile:focus + label {
		outline: 1px dotted #000;
		outline: -webkit-focus-ring-color auto 5px;
	}
</style>
<script>
function extchk()
{
	//alert("In extxhk");
	var x = document.getElementById("fileToUpload").files[0].name;
	var p=x.match(/.jpg$/g);
	//document.write(p);
	
	if(p==null)
	{
		//document.write(" FFFFFFFFFFFFFFFF ");
		alert("Not correct extension!");
		return false;
		
	}
	else 
	{
		//document.write(" TTTTTTTTTTTTTTTTT ");
		return true;
	}
}	
</script>
</head>

<body>
	<!---<?php //if (login_check($mysqli) == true) : ?>
--><div class="container-fluid">
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

  	<!--<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid text-center">
      <button type="button" class="navbar-toggler" data-toggle="collapse"
        data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarResponsive">
      	<ul class="navbar-nav ml-auto">
	      <li class="nav-item"><a class="nav-link" href="index1.html"> Home</a></li>
	      <li class="nav-item active"><a class="nav-link" href="New_Explore.php">Explore</a></li>
	      <li class="nav-item"><a class="nav-link" href="#">Team</a></li>
	      <li class="nav-item"><a class="nav-link" href="check_login.php">Log In</a></li>
	      <li class="nav-item"><a class="nav-link" href="#">About</a></li>
  		</ul>
      </div>
  </div>
  </nav>-->

<!-- Form -->
<form onsubmit="return extchk()" action="Upload.php" method="post" enctype="multipart/form-data" class="upload_form_1">
	<div class="container">
		<div class="row text-center">
			<div class="col-xm-12 xol-sm-12 col-md-12 col-lg-12 col-xs-12">
				<input type="file" name="fileToUpload" class="form-control" id="fileToUpload" placeholder="Upload Image">
			</div>
		</div>
		<div class="row text-center">
			<div class="col-12">
						<button class="btn btn-success" name="submit">Upload</button>
			</div>
		</div>
	</div>
</form>
<div class="container">
<?php
			$CurrentImage = 0;
			for ($CurrentImage = 0; $CurrentImage < $totalimages; $CurrentImage++) {
				if( $CurrentImage % 3 == 0)
				{
					echo '<div class="row display-flex">';
				}
			echo
		'
			<div  class="col-md-4">
							<div class="card" style="width: 18rem;">
							  <img class="card-img-top" style="width: 100%;height: 15vw;object-fit: cover;" src="'. $target_dir.$img[$CurrentImage][0] .'" alt="Card image cap">
						</div>
						</div>';

				if($CurrentImage % 3 == 2)
				{
					echo '</div><br>';
				}
			}
			if($CurrentImage % 3 != 0)
			{
				echo '</div><br>';
			}
?>
</div>
<!-- Footer 

<footer>
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-md-4">
				 IIT Dharwad Logo
				<img src="logo_white.png" class="logo">
				<hr class="light">
				<p>+91-0836-2212842</p>
				<a href="www.iitdh.ac.in">IIT Dharwad</p></a>
				<p>Walmi Campus, Belur Industrial Area</p>
				<p>PB Road, Dharwad -580011</p>
				<p>Karnataka, India</p>
			</div>
			<div class="col-md-4">
				<IIT Dharwad Music Club Logo 
				<hr class="light">
				<p>Saurav's Or Music Club's Number</p>
				<a href="www.iitdh.ac.in">www.iitdh.ac.in</p></a>
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
-<?php //else : ?>
            <div class="container">
                <div class="row text-center">
                <h2 class="display-4">You are not authorized to access this page. Please <a href="index.php">login</a>.</h2>
            </div>
        </div>
        <?php //endif; ?>-->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html> 
