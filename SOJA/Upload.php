<?php
	include_once "includes/db_connect.php";
	include_once "includes/functions.php";
	$target_dir="images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$result=0;
	if (file_exists($target_file)) {
		$file_exists=1;
		//echo "Sorry, image already exists.";
		//echo '<form action="newupload.php" method="post"><button name="back" id="back">back</button></form>';
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		//echo "Sorry, image file was not uploaded.";
		//echo '<form action="newupload.php" method="post"><button name="back" id="back">back</button></form>';
 } 
 else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$stmt = mysqli_query($mysqli,"INSERT INTO images_names VALUES ('" .  basename($_FILES["fileToUpload"]["name"]) . "')");
		$result=1;
		//$myfile = fopen("imagenames.txt", "a");
		//$asd=" ".basename($_FILES["fileToUpload"]["name"]);
		//fwrite($myfile,$asd);
		//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		//header("Location:newupload.php");
	} 
	else {
		$result=0;
        //echo "Sorry, there was an error uploading your file.";
   }
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
	<div class="container">
		<div clas="row text-center">
			<div class="col-12">
				<h2 class="display-4">
					<?php if($result==1) {
							echo "Your request for uploading an image will be accepted by the admin soon :)";
						}
						if($file_exists==1) {
							echo "Sorry, the image already exists Please upload another image.";
						}
						if($result==0) {
							echo "Sorry, there was an error uploading your image.";
						}
					?>
				</h2>
				<br><br>
				<form action="newupload.php" method="post"><button name="back" class="btn btn-primary" id="back">Back</button></form>
			</div>
		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
