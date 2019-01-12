<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mysqli = new mysqli("localhost", "root", "", "Battleship");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("UPDATE Finders SET Password=\"" . $password . "\" WHERE Email=\"" . $email . "\"");
    header('Location: finder_login.html');
?>