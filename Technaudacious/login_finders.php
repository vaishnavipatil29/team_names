<?php
session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mysqli = new mysqli("localhost", "root", "", "A_New_Tinder");
    $mysqli->query("USE A_New_Tinder");
    $result = $mysqli->query("SELECT ID, Email, Password, State FROM Finders WHERE Email=\"" . $email . "\"");
        if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                    if($row['Email'] == $email && $row['Password'] == $password)
                    {   
                        $resul = $mysqli->query("CREATE TABLE Recommended_" . $row['ID'] . " (ID int);");
                        $_SESSION['ID'] = $row['ID'];
                        $res=$mysqli->query("SELECT ID FROM Artists WHERE State = \"" . $row['State'] . "\";");
                            if ($res->num_rows > 0)
                            {
                                while($r = $res->fetch_assoc())
                                {
                                    $_res = $mysqli->query("INSERT INTO Recommended_" . $row['ID'] . " VALUES(" . $r['ID'] . ");");
                                }           
                            }
                        header('Location: finder_homepage.php');
                    }               
                    else
                        header('Location: finder_login.html');
            }
        else
            header('Location: finder_login.html');
?>