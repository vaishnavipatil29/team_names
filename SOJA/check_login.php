<?php
	$sn = "localhost";
	$un = "admin";
	$pw = "jay&&ojas&saurav!!T$#1999";
	$db = "small_scale_retail";

	$conn = new mysqli($sn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error); 

	if(isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT password,status FROM users WHERE username = '$username'";
		$result = $conn->query($query);
		if(!$result) {
			die ($conn->error);
		} else {
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if($row['password'] == $password) {
				if($row['status'] == 1) {
					header("Location: home_login.php");
				}
			} else {
				echo "Try Again!";
			}
		}
	}
?>