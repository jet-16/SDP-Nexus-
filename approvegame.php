<?php
include("conn.php");
session_start();
if(!isset($_SESSION['id'])) {
  header('Loaction: loginhtml.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approve</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>

    <style media="screen">
    .rating h2,
    .origin h2,
    .price h2 {
      margin-top: 0;
    }

    </style>
  </head>
  <body>

<!-- Navigation -->
<?php
include 'navigation.php';
 ?>
<!-- /Navigation -->

<!-- Main Content -->
    <section class="content-section">
      <!-- Game Background Picture -->
        <div class="bg-div">
        <?php
        include("conn.php");
        $id = intval($_GET['id']);  //get id from url

        $result = mysqli_query ($con,"SELECT * FROM games JOIN users ON users.user_id = games.game_seller WHERE games.game_id=$id");

       while($row = mysqli_fetch_array($result))
  			{ ?>
          <img class="bg-div-img" src="<?php echo $row['game_backgroundimagepath'] ?>" alt="">
          <div class="game-name-div">
            <img src="<?php echo $row['game_logopath'] ?>" alt="">
          </div>
        </div>
      <!-- /Game Background Picture -->

      <!-- Game Details -->
        <section class="game-details-section">
          <div class="game-details-div">
            <div class="game-video-div">
              <video src="<?php echo $row['game_videopath'] ?>" controls poster="posterimage.jpg"></video>
            </div>
            <div class="reviews-div">
              <div class="mainimgdiv">
                <img class="mainbg"src="<?php echo $row['game_backgroundimagepath'] ?>">
                <img class="mainlogo"src="<?php echo $row['game_logopath'] ?>">
              </div>
                <div class="reviews-div-two">
                <h3><?php echo $row['game_name'] ?></h3>
                <div class="reviews-div-content">
                  <div class="reviews-div-content-left">
                    <div class="rating">
                      <h2 class="htmlh2">recent reviews:</h2><h2 class="phph2" style="color: #407AD3;"></h2>
                      <h2 class="htmlh2">overall reviews:</h2><h2 class="phph2" style="color: #407AD3;"></h2>
                    </div>
                    <div class="origin">
                      <h2 class="htmlh2">release date:</h2><h2 class="phph2" style="color: #fff;"><?php echo $row['game_releasedate'] ?></h2>
                      <h2 class="htmlh2">developer:</h2><h2 class="phph2" style="color: #fff;"><?php echo $row['user_username'] ?></h2>
                    </div>
                  </div>
                  <div class="reviews-div-content-right">
                    <div class="reviews-div-content-right-top">

                    </div>
                    <div class="reviews-div-content-right-bottom">
                      <div class="price">
                        <h2>RM <?php echo $row['game_price']?></h2>
                      </div>
                <!-- <div class="price">
                        <h2>Install</h2>
                      </div> -->
                    <!--   <button class="purchase-btn" type="button" name="button">Purchase</button>-->
                    <button class="download-btn" type="button" name="button"> <a href="<?php echo $row['game_downloadpath']?>" visible="hidden"><i class="fas fa-download"></i></a></button>
                    </div>
                    </div>
                </div>
            </div>

          </div>
          <div class="game-about-div">
            <h2>description</h2>
            <div>
            <?php echo $row['game_description'] ?>
            </div>
            <?php }  ?>
          </div>


          <div class="form-button-div">
            <?php
              $gid = intval($_GET['id']);
            ?>
            <button type="button" name="approve">
              <a class="submit" href="approval.php?id=<?php echo $gid ?>">Approve</a>
            </button>
            <button type="button" name="reject">
              <a class="cancel" href="decline.php?id= <?php echo $gid ?> ">Reject</a>
            </button>
          </div>
        </section>
      <!-- /Game Details -->

      <!-- Footer -->
          <section class="footer-section">
            Copyright (c) 2020 Copyright Nexus All Rights Reserved.
          </section>
      <!-- /Footer -->
    </section>
<!-- /Main Content -->
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
