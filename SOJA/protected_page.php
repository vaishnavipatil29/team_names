<?php
/**
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
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Activity</title>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="stylesheet" href="style_protected_page.css">
    <script src="https://unpkg.com/scrollreveal"></script>
       <!-- <style type="text/css">
            /*html, body {
                height: 100%;
                width: 100%;
                margin: 0px;
                background: linear-gradient(to bottom right, #0066ff 0%, #00ffff 100%);
                background-repeat: no-repeat;
                background-size: cover;
                font-family: 'Roboto', sans-serif;
                color: #fff;
            }*/
            .Delete {
                width: 300px;
                height: 40px;
                border: 0px;
                color: #fff;
                font-family: "Roboto";
                background: linear-gradient(to right, #ff6600 0%, #cc0000 100%);
                border-radius: 12px;
            }
            .Upload {
                width: 150px;
                height: 40px;
                border: 0px;
                color: #fff;
                font-family: "Roboto";
                background: linear-gradient(to right, #ff6600 0%, #cc0000 100%);
                border-radius: 4px;
            }
            .heading {
                width: 300px;
                height: 100px;
                text-align: center;
            }
        </style>-->
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
           <!-- <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <div class="container-fluid text-center">
              <button type="button" class="navbar-toggler" data-toggle="collapse"
                data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
              </button>
             <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="login.html">Log In</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Explore</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Team</a></li>
                  <li class="nav-item"><a class="nav-link" href="index1.html"> Home</a></li>
                </ul>
              </div>
          </div>
          </nav> -->
          <?php date_default_timezone_set('YOUR TIMEZONE'); $timestamp1 = date('H');
                    if ($timestamp1 >= 12) {
                        $_SESSION['show'] = "Good Afternoon";
                    }
                    if ($timestamp1 > 16) {
                        $_SESSION['show'] = "Good Evening";
                    }
                    if ($timestamp1 < 12) {
                        $_SESSION['show'] = "Good Morning";
                    }
                    ?>
            <!--<div class="container">
                <div class="row text-center jumbotron">
                    <div class="col-12">
                        <div id="timestamp"><?php
            //date_default_timezone_set('YOUR TIMEZONE');
            //echo $timestamp = date('H:i'); ?></div> -->
                    
                    <!--</div>
                    </div>
                </div>
            </div>-->
            <div class="container-fluid">
            <div class="row">
                
            </div>
        </div>
            <div class="jumbotron" id="top">
            <div class="container-fluid">
                <?php if($_SESSION['status'] == '3' or $_SESSION['status'] == '2') { ?>
                    <div class="row text-center">
                        <div class="col-12">
                            <h1 class="display-4"><?php echo $_SESSION['show'] ?> <?php echo htmlentities($_SESSION['myname']); ?>!  
                            </h1>
                            <hr style="border-top: 2px solid #b4b4b4;
                                width: 95%;
                                margin-top: 0.8rem;
                                margin-bottom: 1rem;">
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 buttons">
                                <form action="newupload.php" method="post"><button type="submit" class="btn btn-success btn-lg">Upload Image</button></form>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 buttons">
                                <form action="delete.php" method="post"><button type="submit" class="btn btn-danger btn-lg">Delete Image</button></form>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 buttons">
                                <form action="remove_mem.php" method="post"><button type="submit" class="btn btn-dark btn-lg">Update Member's List</button></form>
                        </div>
                        </div>
            <div class="row text-center">
                <div class="col-12">
                    <br>
                <a href="includes/logout.php"><button type="button" class="btn btn-warning btn-lg">Log out</button></a>
                </div>
            <?php } 
                else { ?>
                    <div class="row text-center">
                        <div class="col-12">
                            <h1 class="display-4"><?php echo $_SESSION['show'] ?> <?php echo htmlentities($_SESSION['myname']); ?>!  
                            </h1>
                            <hr style="border-top: 2px solid #b4b4b4;
                                width: 95%;
                                margin-top: 0.8rem;
                                margin-bottom: 1rem;">
                        </div>
                        <div class="col-6 buttons">
                                <form action="newupload.php" method="post"><button type="submit" class="btn btn-success btn-lg">Upload Image</button></form>
                        </div>
                        <div class="col-6">
                        <a href="includes/logout.php"><button type="button" class="btn btn-warning btn-lg">Log out</button></a>
                </div>
            <?php } ?>
            </div>
        </div>
            </div>
        <?php else : ?>
            <div class="container">
                <div class="row text-center">
                <h2 class="display-4">You are not authorized to access this page. Please <a href="index.php">login</a>.</h2>
            </div>
        </div>
        <?php endif; ?>
    </body>
</html>
