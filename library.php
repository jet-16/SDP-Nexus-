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
    <title>Library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/library.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
  </head>
  <body>

<!-- Navigation -->
<?php
  include "navigation.php";
?>
<!-- /Navigation -->

<!-- Main Content -->
<!-- <form action="download.php" method="get"> -->
  <div class="block"></div>
  <section class="library-section">

    <div class="game-div">
      <h1>all games
        <form action="library.php" method="post">
          <input type="text" name="searchbox" placeholder="Search">
          <button type="submit" name="button">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </h1>

			<?php
      include("conn.php");
      $CID = $_SESSION['id'];
      $search = isset($_POST['searchbox']) ? $_POST['searchbox'] : '' ;

      //for search function
      if ($search !== NULL)
      {
        $result = mysqli_query($con,"SELECT * FROM games INNER JOIN purchase ON purchase.purchase_game = games.game_ID INNER JOIN users ON users.user_id = purchase.purchase_customer WHERE games.game_name like '%" .$search. "%' AND games.game_status = 1 AND purchase.purchase_customer='$CID'");

        while($row = mysqli_fetch_array($result))
        { ?>
       <div class="games"
       data-aos="fade-up"
       data-aos-offset="-150"
       data-aos-delay="0"
       data-aos-duration="0"
       data-aos-easing="ease-in-out"
       data-aos-mirror="true"
       data-aos-once="true"
       data-aos-anchor-placement="top-center">
       <img src="<?php echo $row['game_photopath'] ?>">
       <div class="info-div">
        <h2><?php echo $row['game_name'] ?> </h2>
        <h4><?php echo $row['game_category']?></h4>
        <a href="<?php echo $row['game_downloadpath']?>" visible="hidden">
          <button type="submit" name="">
            <i class="fas fa-download"></i>
          </button>
        </a>
      </div>
    </div>
  <?php }
		  } ?>

  <div class="block">
  </div>
  </div>
</div>




  <!--  <div class="individual-game-div">

  </div>-->
  </section>
 <!-- </form> -->
<!-- /Main Content -->

<!-- Footer -->
  <footer>
    <section class="footer-section" style="background-color: black; background-image: none;">
      Copyright (c) 2020 Copyright Nexus All Rights Reserved.
    </section>
  </footer>
<!-- /Footer -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
 AOS.init();
</script>
  <script type="text/javascript">
  var divHeight = $('.game-div').height();
  $('.sidebar-div').css('min-height', divHeight+'px');
  </script>
  </body>
</html>
