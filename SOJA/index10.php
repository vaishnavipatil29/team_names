<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
  sec_session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Hello, world!</title>
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
                      <form class="login_form" action="check_login.php" method="post" name="login_form">
                          <div class="form-group">
                            <label class="uname" style="color: #fff">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <label class="pass" style="color: #fff">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password"/>
                          </div>
                          <!--
                          <div class="checkbox">
                            <label class="rem">
                              <input type="checkbox"> Remember me
                            </label> -->
                          <button class="btn btn-info btn-block">Log In</button>
                        </form>
                        <form action="New_Sign_up.php" method="post">
                          <?php $_SESSION['result1']=0; ?>
                        <button class="btn btn-info btn-block">Register</button>
                      </form>
                      </div>
                    </div>
                  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>