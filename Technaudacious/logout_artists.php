<?php
session_start();
    $mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
    $mysqli->query("USE A_New_Tinder");
session_unset();
session_destroy();
    header('Location: index.html');
?>