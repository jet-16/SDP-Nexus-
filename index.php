<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
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
            <img src="images/logo.png" >

          </div>
        </div>
      <!-- /Hero -->

      <!-- News -->
        <section class="news-section"
        data-aos="fade-right"
        data-aos-offset="-150"
        data-aos-delay="0"
        data-aos-duration="0"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"
        data-aos-once="true"
        data-aos-anchor-placement="top-center">
        <div class="newstitlediv">
          <h3 class="sectionfull-h3" id="news">We care about games</h3>
          <p class="news-div-p">Nexus is a digital distribution platform with a curated selection of games, a "you buy it, you own it" philosophy, and utmost care about customers.</p>
        </div>
        <!-- News Content -->
          <div class="news-div">
            <img src="images/BestPick.jpg" alt="">
          </div>
          <a href="store.php">Go to Store</a>
        </section>
      <!-- /News -->

      <!-- Special Offers -->
        <section class="specialoffer-section"
        data-aos="fade-left"
        data-aos-offset="-150"
        data-aos-delay="0"
        data-aos-duration="400"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"
        data-aos-once="true"
        data-aos-anchor-placement="top-center">
        <p class="specialoffer-div-p">Hand-picking the best in gaming. A selection of great games, from all-time classics to modern hits.</p>

        <!-- Special Offers Content -->
          <div class="specialoffer-div">
            <div class="special-offer"><img src="images/G1.jpg" alt=""></div>
            <div class="special-offer"><img src="images/G2.jpg" alt=""></div>
            <div class="special-offer"><img src="images/G3.jpg" alt=""></div>
            <div class="special-offer"><img src="images/G4.jpg" alt=""></div>

          </div>

        </section>
      <!-- /Special Offers -->

      <!-- About -->
        <section class="about-section"
        data-aos="fade-right"
        data-aos-offset="-150"
        data-aos-delay="0"
        data-aos-duration="400"
        data-aos-easing="ease-in-out"
        data-aos-mirror="true"
        data-aos-once="true"
        data-aos-anchor-placement="top-center" >
          <h3 class="sectionfull-h3">about</h3>
          <div class="about-div">

            <!-- About Content -->
            <p class="about-div-p">Nexus is a website that provides video game digital distribution service to users who have an interest in computer video games. The purpose of this proposed website is to promote and provide opportunities for local developers and users in Malaysia to list/sell and buy games internationally with a much lower “Submission Fee “. In addition, Nexus also allow users to purchase their desired games globally at a much lower cost due to the tax-free environment that we had provided through a tremendous amount of work that we had settled with the local authorities. This will result in an increase in economic and local developers as they are being inspired to develop games and sell them on our website.<br>
            <a href="about.php">Read more</a>
            </p>

            <!-- About Image -->
            <img class="about-div-img" src="images/about_1.png">

          </div>
        </section>
      <!-- /About -->

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
