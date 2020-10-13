<?php
  session_start();
  if (isset($_SESSION['id'])) {
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/sticky.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
  </head>
  <body>

<!-- Navigation -->
    <?php
      include 'navigation.php';
    ?>
<!-- /Navigation -->

<!-- Main Content -->
    <section class="login-section">
      <div class="loginbg-div">
        <video src="images/hero.mp4" autoplay loop muted poster="posterimage.jpg"></video>
      </div>
      <div class="block"></div>
      <div class="login-div"
      data-aos="fade-up"
      data-aos-offset="0"
      data-aos-delay="0"
      data-aos-duration="800"
      data-aos-easing="ease-in-out"
      data-aos-mirror="true"
      data-aos-once="true"
      data-aos-anchor-placement="top-center">
        <img src="images/logoonly.png" alt="">
        <h3>account</h3>
        <form class="login-form" action="login().php" method="post">
          <input type="text" name="username" placeholder="Username" autocomplete="off" autofocus required>
          <input type="password" name="password" placeholder="Password" autocomplete="off" required>
          <button type="submit" name="login">Login</button>
        </form>
        <div class="links">
          <a class="signup" href="register.php">Sign Up</a>
        </div>
      </div>
    </section>
<!-- /Main Content -->

<!-- Footer -->
    <section class="footer-section">
      Copyright (c) 2020 Copyright Nexus All Rights Reserved.
    </section>
<!-- /Footer -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
   AOS.init();
  </script>
  </body>
</html>
