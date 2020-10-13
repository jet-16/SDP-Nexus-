<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
   <title>News</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/news.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/sticky.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

        <section class="news-section">
          <h3>news</h3>
          <div class="news-div">
          <!-- News -->
            <div class="news"
            data-aos="fade-up"
            data-aos-offset="-100"
            data-aos-duration="400"
            data-aos-easing="ease-in"
            data-aos-mirror="true"
            data-aos-once="true"
            data-aos-anchor-placement="top-center">
              <div class="newstitle-div">
                <!-- News Title -->
                <p>Begin your journey to reconnect remnants of a shattered world. DEATH STRANDING is now available on PC! Experience the genre-defying open world action adventure from legendary game creator Hideo Kojima firsthand, and unite the divided.</p>

                <!-- News Author -->
                <h5>Kojima Productions</h5>
              </div>

                <!-- News Image -->
                <img src="images/deathstanding.jpg" alt="">

            </div>
          <!-- /News -->
          </div>
        </section>
    <!-- /Main Content -->

    <!-- Footer -->
        <section class="footer-section" style="background-image: linear-gradient(to top, black, #0A1829)">
          Copyright (c) 2020 Copyright Nexus All Rights Reserved.
        </section>
    <!-- /Footer -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
     AOS.init();
    </script>
  </body>
</html>
