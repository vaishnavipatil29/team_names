<?php
	$email = $_POST['email'];
	$sec = $_POST['sec'];
    $mysqli = new mysqli("localhost", "root", "", "Battleship");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("SELECT Email, Security FROM Finders WHERE Email = \"" . $email . "\"");
        if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                    if($row['Email'] == $email && $row['Security'] == $sec)
                        header('Location: finder_reset_password.html');
                    else
                        header('Location: finder_forgot_password.html');
            }
?>