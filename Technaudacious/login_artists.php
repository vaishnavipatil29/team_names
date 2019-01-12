<?php
session_start();
    $email = $_POST['email'];
	$password = $_POST['password'];
    $mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("SELECT ID, Email, Password, State FROM Artists WHERE Email=\"" . $email . "\"");
        if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                    if($row['Email'] == $email && $row['Password'] == $password)
                    {   
                        $_SESSION['ID'] = $row['ID'];
                        header('Location: artist_homepage.php');
                    }
                    else
                        header('Location: artist_login.html');
            }
        else
            header('Location: artist_login.html');
?>