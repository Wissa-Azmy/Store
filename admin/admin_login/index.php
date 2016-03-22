<?php
session_start();
if(isset($_SESSION['manager'])){
	header("location:../index.php");
	exit();
}
?>



<!-- HTML -->

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/reset.css">

    <!-- <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'> -->
<!-- <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'> -->
<!-- <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> -->

        <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
<div class="container">
  <div class="info">
    <h1>Login to Continue</h1><span>Made <i class="fa fa-heart"></i> by Wissa Azmy</span>
  </div>
</div>
<div class="form">
  <!-- <div class="thumbnail"><img src=" "/></div> -->

    <!-- REGISTERATION FORM -->

  <form action="../admin_login.php" method="post" class="register-form">
    <input type="text" name="username" placeholder="name"/>
    <input type="password" name="password" placeholder="password"/>
    <input type="text" name="email" placeholder="email address"/>
    <button>create</button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>
  </form>

  <!--  LOGIN FORM -->

  <form action="../admin_login.php" method="post" class="login-form">
    <input type="text" name="username" id="username" placeholder="username"/>
    <input type="password" name="password" placeholder="password"/>
    <button type="submit">login</button>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
  </form>
</div>
<!-- <video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
  <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video> -->
    <script src='js/jquery-2.2.0.min.js'></script>

        <script src="js/index.js"></script>
      <script type="text/javascript" src="js/jquery.min.js"></script>
  </body>
</html>
