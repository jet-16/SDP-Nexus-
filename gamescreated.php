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
    <title>Nexus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gamescreated.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"> </script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="application/x-javascript">
      tinymce.init({
        selector:'#TypeHere',
        width: 1000
      });
    </script>
  </head>
  <body>

<!-- Navigation -->
    <?php
      include 'navigation.php';
    ?>
<!-- /Navigation -->

<!-- Main Content -->
  <div class="block"></div>
  <section class="content-section">
    <div class="games-div">
      <h1>GAMES CREATED <div> <a href="uploadgame.php" style='text-decoration: none'>add game</a> </div> </h1>
      <?php
        include("conn.php");
        $id = $_SESSION['id'];
        $result = mysqli_query($con, "SELECT * FROM games WHERE game_seller = $id");


        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result))
          {?>
              <div class="games"
              data-aos="fade-up"
              data-aos-offset="-150"
              data-aos-delay="0"
              data-aos-duration="0"
              data-aos-easing="ease-in-out"
              data-aos-mirror="true"
              data-aos-once="true"
              data-aos-anchor-placement="top-center">
                <a href="editgames.php?id=<?php echo $row['game_ID'] ?>" style="text-decoration: none">
                  <img src="<?php echo $row['game_photopath'] ?>">
                  <div class="edit-div">
                    <p>EDIT</p>
                  </div>
                  <div class="info-div">
                    <h2><?php echo $row['game_name'] ?></h2>
                    <h4><?php echo $row['game_category'] ?></h4>
                  </div>
                </a>
              </div>
        <?php }
      }
      elseif (mysqli_num_rows($result) === 0) { ?>
          <div class="nogames">
            <h2>Currently, you don't have any games created.</h1>
          </div>

      <?php   }
      ?>

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="js/showpath.js"></script>
<script src="js/previewimg.js"></script>
<script type="text/javascript">
function show(elementId) {
      document.getElementById("windows").style.display = "none";
      document.getElementById("mac").style.display = "none";
      document.getElementById("linux").style.display = "none";
      document.getElementById(elementId).style.display = "flex";
  }
</script>
  </body>
</html>
