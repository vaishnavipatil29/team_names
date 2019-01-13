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
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
sec_session_start();
$default = "";
	if($_SESSION['result1'] == 0) {
		$default = "https://image.ibb.co/f5Kehq/bio-image.jpg";
	}
?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script type="text/JavaScript" src="js/sha512.js"></script> 
  <link rel="stylesheet" href="testing.css">
        <script type="text/JavaScript" src="js/forms.js"></script>
    

    <title>Explore</title>
  </head>
  <body>
    <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>


<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">				
				<img src="https://image.ibb.co/cbCMvA/logo.png" />
			</div>
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
							<label class="pass">Upload Profile Image</label>
					        <img src = "<?php echo $default; ?>" alt="image" />
					        <br>
							<form onsubmit="return extchk()" action="<?php upload();  ?>" method="post" enctype="multipart/form-data" class="upload_form_1">
									<div class="container">
										<a> <?php echo $default ?> </a>
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
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="bio-content">

					<form class="login_form" method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">

          <div class="form-group">
            <label class="mname">Name</label>
            <input type="text" name="myname" class="form-control" id="myname" placeholder="Name">
          </div>
          <div class="form-group">
            <label class="rnum">Roll number</label>
            <input type="text" name="roll_number" class="form-control" id="roll_number" placeholder="Roll-number">
          </div>
          <div class="form-group">
            <label class="uname">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="UserName">
          </div>
          <div class="form-group">
            <label class="pass">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label class="pass">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
          </div>
           <div class="form-group">
          </div>
          <button onclick="return regformhash(this.form,
                                   this.form.myname,
                                   this.form.roll_number,
                                   this.form.username,
                                   this.form.password,
                                   this.form.confirm_password);" class="btn btn-success btn-block">Sign Up</button>
        </form>
        <br>
      <a href="index.php"><button class="btn btn-info btn-block">Go Back</button></a>


				</div>
			</div>
		</div>	
	</div>
</div>


    <div class="container">
      <div class="row text-center">
        <div class="animated fadeIn">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        	
        
      </div>
    </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>



<?php
	function upload() {
	$target_dir="images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
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
			$_SESSION['result1'] = 1;
			$default = $target_file; 
			header("Location: Sign_up.php");
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
}
?>