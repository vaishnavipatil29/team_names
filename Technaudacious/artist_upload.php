<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Status</title>
	<script type="text/javascript">
		function call_album()
		{
			location.href = 'album.php?index=0';
		}
		function call_newupload()
		{
			location.href = 'newupload.php';
		}
	</script>
</head>
<body>
	<?
		$mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
	    $mysqli->query("USE A_New_Tinder");
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		if($imageFileType != "jpg" && $imageFileType != "jpeg")
		{
    		echo "Sorry, only JPG & JPEG files are allowed.<br>";
   	 		$uploadOk = 0;
		}

		else if ($_FILES["filetoupload"]["size"] > 204800)
		{
    		echo "Sorry, your Image is too large.<br>";
			$uploadOk = 0;
		}

    	if ($uploadOk == 0)
    	{
		    echo "Sorry, your Image was not uploaded.<br>";

				echo "<br><form>";
				echo "<input type=\"button\" value=\"Back\" name=\"back\" id=\"back\" onclick=\"call_newupload()\">";
				echo "</form>";
			header('Location: artist_newupload.php');
		}
		else
		{
		    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file))
		    {
		    	echo "The file " . basename($_FILES["filetoupload"]["name"]) . " has been uploaded.<br>";
		    	$file_name = basename($_FILES["filetoupload"]["name"]);
		    	$result = $mysqli->query("UPDATE Artists SET Image = \"" . $file_name . "\" WHERE ID=\"" . $_SESSION['ID'] . "\"");

				echo "<br><form>";
				echo "<input type=\"button\" value=\"Back\" name=\"back\" id=\"back\" onclick=\"call_album()\">";
				echo "</form>";
				header('Location: artist_homepage.php');
		    }
    		else
    		{
       			echo "Sorry, there was an error uploading your Image.<br>";

       			echo "<br><form>";
				echo "<input type=\"button\" value=\"Back\" name=\"back\" id=\"back\" onclick=\"call_newupload()\">";
				echo "</form>";
				header('Location: artist_newupload.php');
    		}
		}
	?>
</body>
</html>