<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>

  </head>
  <body>

<!-- Navigation -->
<?php
session_start();
  include "navigation.php";
?>
<!-- /Navigation -->

<!-- Main Content -->
    <section class="content-section">
      <!-- Hero -->
        <div class="hero-div">

          <!-- Hero Video -->
          <video src="images/hero.mp4" autoplay loop muted></video>

          <div class="hero-description">

            <!-- Logo -->
            <img src="images/logo.png" alt="">
            <h1>about</h1>
            <p>
              Nexus is a website that provides video game digital distribution service to users who have an interest in computer video games. The purpose of this proposed website is to promote and provide opportunities for local developers and users in Malaysia to list/sell and buy games internationally with a much lower “Submission Fee “. In addition, Nexus also allow users to purchase their desired games globally at a much lower cost due to the tax-free environment that we had provided through a tremendous amount of work that we had settled with the local authorities. This will result in an increase in economic and local developers as they are being inspired to develop games and sell them on our website.
            </p>
          </div>
        </div>
      <!-- /Hero -->
      <section class="about-section">
        <div class="about-div-one">
          <img src="images/about_1.png" alt=""
          data-aos="fade-right"
          data-aos-offset="0"
          data-aos-delay="0"
          data-aos-duration="400"
          data-aos-easing="ease-in-out"
          data-aos-mirror="true"
          data-aos-once="true"
          data-aos-anchor-placement="top-center">
          <div class="about-div-description">
            <h3>Get your favourite games with the best values.</h3>
            <p> We care about our customers. Because price is a common factor on deciding to purchase a game. So the price is set to values suitable for all gamers to achieve great satisfaction. With promotions,  sales and more. Visit the store for more details.</p>
            <a href="store.php">Browse the Store</a>
          </div>
        </div>
        <div class="about-div-sec">
          <div class="about-div-description">
            <h3>Get updated by developers ASAP!</h3>
            <p>Get updated with the newest content, experience and more with your favourite games.</p>
            <a href="news.php">Go to News</a>
          </div>
            <img src="images/about_2.png" alt=""
            data-aos="fade-left"
            data-aos-offset="0"
            data-aos-delay="0"
            data-aos-duration="400"
            data-aos-easing="ease-in-out"
            data-aos-mirror="true"
            data-aos-once="true"
            data-aos-anchor-placement="top-center">
        </div>
        <div class="about-div-thi">
          <?php
            if ((!isset($_SESSION['id'])) || ($_SESSION['role'] === "customer") || ($_SESSION['role'] === "admin")) { ?>
              <img src="images/about_3.png" alt=""
              data-aos="fade-right"
              data-aos-offset="0"
              data-aos-delay="0"
              data-aos-duration="400"
              data-aos-easing="ease-in-out"
              data-aos-mirror="true"
              data-aos-once="true"
              data-aos-anchor-placement="top-center">
          <?php }
            elseif ($_SESSION['role'] === "seller") { ?>
              <img src="images/aboutcust.png" alt=""
              data-aos="fade-right"
              data-aos-offset="0"
              data-aos-delay="0"
              data-aos-duration="400"
              data-aos-easing="ease-in-out"
              data-aos-mirror="true"
              data-aos-once="true"
              data-aos-anchor-placement="top-center">
          <?php } ?>
          <div class="about-div-description">
            <?php
              if ((!isset($_SESSION['id'])) || ($_SESSION['role'] === "customer")) { ?>
                <h3>Promote your games.</h3>
                <p>Want to see your own games on our website? Get an account as a developer. Get your own freedom to launch and update. Get reviews and interact with gamers for consistent feedback. </p>
                <a href="registerdev.php">Create an Account</a>
            <?php  }
              elseif ($_SESSION['role'] === "seller") { ?>
                <h3>Purchase games and review other games as developer.</h3>
                <p>Want to buy other developer's games and review them? Get an account as a customer. Explore what other developers are up to and get inspired by their work! </p>
                <a href="register.php">Create an Account</a>
            <?php  }
            ?>
          </div>
        </div>
      </section>

      <!-- Footer -->
          <section class="footer-section">
            Copyright (c) 2020 Copyright Nexus All Rights Reserved.
          </section>
      <!-- /Footer -->
    </section>
<!-- /Main Content -->
<!--Script for aos Animation-->
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
    AOS.init();
   </script>
   <!--End Script-->
  </body>
</html>
