<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/sticky.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
  </head>
  <body>

<!-- Navigation -->
  <?php
    session_start();
    include 'navigation.php';
  ?>
<!-- /Navigation -->

<!-- Main Content -->
<section class="register-section">
  <div class="block">

  </div>
  <div class="register-div"
  data-aos="fade-up"
  data-aos-offset="0"
  data-aos-delay="0"
  data-aos-duration="800"
  data-aos-easing="ease-in-out"
  data-aos-mirror="true"
  data-aos-once="true"
  data-aos-anchor-placement="top-center">
  <h3>register</h3>
    <form class="register-form" action="register().php" method="post">
      <div class="register-form-div">
        <input type="text" name="username" value="" placeholder="Username" required autofocus>
        <input type="email" name="email" value="" placeholder="Email" required>
        <div class="gender-div">
          <h4>Gender</h4>
          <div class="account-gender-div">
            <div class="account-male-div">
            <input type="radio" name="gender"  value="male">
              <label for="male">Male</label>
            </div>
            <div class="account-female-div">
              <input type="radio" name="gender"  value="female">
              <label for="female">Female</label>
            </div>
          </div>
        </div>
        <input type="password" name="password" value="" placeholder="Password" required>
        <input type="password" name="confirmpassword" value="" placeholder="Confirm Password" required>
      </div>

      <button type="submit" name="submit">sign up</button>
      <a href="registerdev.php">Sign up as Developer</a>
    </form>
  </div>
</section>
<!-- /Main Content -->

<!-- Footer -->
    <section class="footer-section">
      Copyright (c) 2020 Copyright Nexus All Rights Reserved.
    </section>
<!-- /Footer -->
<script type="text/javascript">
function show(elementId) {
      document.getElementById("personal-info").style.display = "none";
      document.getElementById("acc-info").style.display = "none";
      document.getElementById(elementId).style.display = "flex";
  }

/*
  $('.personal').on('click', function(){
    $('personal').removeClass('selected');
    $(this).addClass('selected');
});

  $('.acc').on('click', function(){
    $('acc').removeClass('selected');
    $(this).addClass('selected');
});
*/
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
</script>
  </body>
</html>
