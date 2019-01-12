<?php
session_start();
    $email = $_POST['email'];
	$password = $_POST['password'];
    $mysqli = new mysqli("localhost", "root", "", "Battleship");
    $mysqli->query("USE A_New_Tinder");
    $sql="DELETE FROM recommended
	WHERE email='$email';";
	if ($myconnection->query($sql) != TRUE)
	     	echo "Error: " . $sql . "<br>" . $myconnection->error;
	else
        	header('Location: finder_homepage.html');
?>