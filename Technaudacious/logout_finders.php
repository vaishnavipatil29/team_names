<?php
session_start();
    $mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("DROP TABLE Recommended_" . $_SESSION['ID'] . ";");
session_unset();
session_destroy();
    header('Location: index.html');
?>