<!--<?php
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
//include_once 'includes/db_connect.php';
//include_once 'includes/functions.php';
//sec_session_start();
/*$_SESSION['result1'] = 0;
if (login_check($mysqli) == true) {
    header("Location: protected_page.php");
}
else {
    $logged = 'out';
}*/
?>-->
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <link rel="stylesheet" href="login.css">
    <style type="text/css">
      .form {  background: #0F2027;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
overflow-y: hidden;
}
    </style>
    </head>
    <body class="form"><!--
        <div class="jumbotron" id="top">-->
            <div class="container-fluid animated fadeIn">
                <div class="row text-center">
                    <div class="col-xs-0 xol-sm-0 col-md-4 col-lg-4 col-xl-4"></div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <!--<?php
                            //if (isset($_GET['error'])) {
                              //  echo '<p class="error">Error Logging In!</p>';
                            }
                        ?>-->
                        <form class="login_form" action="includes/process_login.php" method="post" name="login_form">
                          <div class="form-group">
                            <label class="uname" style="color: #fff">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <label class="pass">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password"/>
                          </div>
                          <!--
                          <div class="checkbox">
                            <label class="rem">
                              <input type="checkbox"> Remember me
                            </label> -->
                          <button class="btn btn-info btn-block">Log In</button>
                        </form>
                        <a  href="Sign_up.php" ><button type="submit" class="btn btn-success btn-block">Sign Up</button></a>
                        <br>
                        <a  href="index1.html" ><button type="submit" class="btn btn-light btn-block" style="color: black;">Home</button></a>
                        <br>
                        <!--<p style="color: #fff" >You are currently logged <?php //echo $logged ?>.</p>
                --></div>
            </div>
        </div>
    <!--</body> 
        <form action="includes/process_login.php" method="post" name="login_form"> 			
            Email: <input type="text" name="email" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
        </form>
        <p>If you don't have a login, please <a href="register.php">register</a></p>
        <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
        <p>You are currently logged <?php //echo $logged ?>.</p> !-->
    </body>
</html>
