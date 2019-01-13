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
if (login_check($mysqli) == true) {
    header("Location: protected_page.php");
}
else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Include the above in your HEAD tag -->

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="login2.css">
</head>
<body>
<div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">
<?php
                            if (isset($_GET['error'])) {
                                echo '<p class="error">Error Logging In!</p>';
                            }
                        ?>
        <form action="javascript:void(0);" method="get">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input type="text"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input type="password"  Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#">Forgot
                                password?</a></span>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
                            </div>

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo">LOGO
          
          <div class="clearfix"></div>
      </div>
      
      </div>
</center>
    </div>

</div>
</body>
</html>
