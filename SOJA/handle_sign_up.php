<?php
	$sn = "localhost";
	$un = "admin";
	$pw = "jay&&ojas&saurav!!T$#1999";
	$db = "small_scale_retail";

	$conn = new mysqli($sn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error); 

	if(isset($_POST['myname'], $_POST['roll_number'], $_POST['username'], $_POST['password'])) {
		$name = $_POST['myname'];
		$roll_no = $_POST['roll_number'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "INSERT INTO users (name, roll_no, username, password) VALUES ('$name', '$roll_no', '$username', '$password') ";
		$result = $conn->query($query);
		if(!$result) {
			die ($conn->error);
		} else {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if($row['password'] == $password) {
				echo "Added!";
			} else {
				echo "Try Again!";
			}
		}
	}

	
$target_dir = "known_persons/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
echo $target_file;

if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
}
else
{
	echo "Sorry, not uploaded";
}





//echo $target_file;

//$output1 = shell_exec("rm ".$target_file);
//echo "out is: $output1";

?>