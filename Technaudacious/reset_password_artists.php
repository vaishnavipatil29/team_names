<?php
	$email = $_POST['email'];
	$password = $_POST['password'];
    $mysqli = new mysqli("localhost", "root", "", "Battleship");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("UPDATE Artists SET Password=\"" . $password . "\" WHERE Email=\"" . $email . "\"");
    header('Location: artist_login.html');
?>