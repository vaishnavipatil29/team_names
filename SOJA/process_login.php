<?php

/*
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['username'], $_POST['password'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['p']; // The hashed password.
     /*$stmt = mysqli_query($mysqli,"SELECT roll_number FROM users WHERE username = '$username'");
     $user_id = $stmt->fetch_array();*/
    
   // if (checkbrute($user_id[0], $mysqli) == false) {
        if(login($username, $password, $mysqli) == true) {
            // Login success 
            header("Location: ../protected_page.php");
            exit();
        } else {
            header('Location: ../index.php?error=1');
            exit();
        }
    /*} else {
        // Login failed 
        header("Location: ../error.php");
    }*/
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}
