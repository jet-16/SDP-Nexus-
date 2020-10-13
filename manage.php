<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: login.php');
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/manage.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
    <style media="screen">
      #developer {
        display: none;
      }
    </style>
  </head>
  <body>

<!-- Navigation -->
<?php
  include "navigation.php";
?>
<!-- /Navigation -->

<!-- Main Content -->
    <div class="block"></div>
    <section class="profile-section">
      <div class="menubar-div"
      data-aos="fade-up"
      data-aos-offset="-150"
      data-aos-delay="0"
      data-aos-duration="0"
      data-aos-easing="ease-in-out"
      data-aos-mirror="true"
      data-aos-once="true"
      data-aos-anchor-placement="top-center">
        <div onclick=show("customer") class="individual-div">
          <i class="fas fa-user-friends"></i>
          <h2>customer</h2>
        </div>
        <div onclick=show("developer") class="individual-div">
          <i class="fas fa-code"></i>
          <h2>developer</h2>
        </div>
        <div onclick=show("admin") class="individual-div">
          <i class="fas fa-user-cog"></i>
          <h2>admin</h2></div>
      </div>
      <div class="profile-div"
      data-aos="fade-up"
      data-aos-offset="-150"
      data-aos-delay="0"
      data-aos-duration="0"
      data-aos-easing="ease-in-out"
      data-aos-mirror="true"
      data-aos-once="true"
      data-aos-anchor-placement="top-center">
        <iframe id="customer" src="customer.php" width="100%" height="100%" frameborder="no" scrolling="yes" ></iframe>
        <iframe id="developer" src="developer.php" width="100%" height="100%" frameborder="no" scrolling="yes" ></iframe>
        <iframe id="admin" src="admin.php" width="100%" height="100%" frameborder="no" scrolling="yes" ></iframe>
      </div>

    </section>
<!-- /Main Content -->

<!-- Footer -->
  <footer>
    <section class="footer-section">
      Copyright (c) 2020 Copyright Nexus All Rights Reserved.
    </section>
  </footer>
<!-- /Footer -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!--<script type="text/javascript">
var iframe = document.querySelector("iframe");

      // Adjusting the iframe height onload event
      iframe.onload = function(){
          iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
      }
</script> -->
<script type="text/javascript">
function show(elementId) {
      document.getElementById("customer").style.display = "none";
      document.getElementById("developer").style.display = "none";
      document.getElementById("admin").style.display = "none";
      document.getElementById(elementId).style.display = "flex";
  }
</script>
  </body>
</html>
