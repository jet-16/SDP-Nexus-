<?php
  session_start();


  require_once ('component.php');
require_once ('conn.php');

$page= basename($_SERVER['PHP_SELF']);



if (isset($_POST['add'])){
    if (!isset($_SESSION['role'])){
      echo "<script>alert('Only Customer are allowed to make purchases, Please login using a customer account.');";
      die("window.history.go(-1);</script>");

    }
    $customer = $_SESSION['role'];
    if ($customer!=='customer') {

        echo "<script>alert('Only Customer are allowed to make purchases, Please login using a customer account.');";
        die("window.history.go(-1);</script>");

    } else{
      if(isset($_SESSION['cart'])){

          $item_array_id = array_column($_SESSION['cart'], "game_ID");



          if(in_array($_POST['game_ID'], $item_array_id)){
              echo "<script>alert('Product is already added in the cart..!')</script>";
              echo "<script>window.location = 'Action.php'</script>";
          }else{

              $count = count($_SESSION['cart']);
              $item_array = array(
                  'game_ID' => $_POST['game_ID']
              );

              $_SESSION['cart'][$count] = $item_array;
          }

      }else{

          $item_array = array(
                  'game_ID' => $_POST['game_ID']
          );

          // Create new session variable
          $_SESSION['cart'][0] = $item_array;

      }
    }
   }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Store</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/categorized.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/sticky.js"></script>
  <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
  <style media="screen">
    .newrelease img {
      width: 350px;
      height: 200px;
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

    <section class="store-section">
      <div class="menu-div">
        <div class="dropdown dropdown-div">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent; border: none;">
            Games
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="Action.php">Action</a>
            <a class="dropdown-item" href="Adventure.php">Adventure</a>
            <a class="dropdown-item" href="Sports.php">Sports</a>
            <a class="dropdown-item" href="Strategy.php">Strategy</a>
            <a class="dropdown-item" href="FPS.php">FPS</a>
            <a class="dropdown-item" href="Racing.php">Racing</a>
            <a class="dropdown-item" href="Simulation.php">Simulation</a>
            <a class="dropdown-item" href="RPG.php">RPG</a>
            <a class="dropdown-item" href="MOBA.php">Moba</a>
            <a class="dropdown-item" href="categorized.php">Browse All</a>
          </div>
        </div>

        <form class="searchbar-form" method="post" action="categorized.php">
          <div class="search-div">

            <div class="searchbar-div">
              <input type="text" name="searchbox" placeholder="Search" >

            </div>

            <div class="searchicon-div">

              <button type=submit name="button">
                <i class="fas fa-search"></i>
              </button>

            </div>

          </div>
        </form>
      </div>
      <div class="title-div">
        <img src="images/all.jpg">
        <h1>All Games</h1>
      </div>

        <div class="all-games-div">
          <div class="allgames-div">

            <!-- <div class="allgames"> -->
            <?php
			        include("conn.php");
			        $search = isset($_POST['searchbox']) ? $_POST['searchbox'] : '' ;

		        	//for search function
			        if ($search == NULL)
			        {
                $result = mysqli_query($con,"Select * from games join users on users.user_id = games.game_seller where games.game_status = 1");

                while($row = mysqli_fetch_array($result))
                {
                  component($row['game_name'], $row['game_price'], $row['game_ID'], $row['game_photopath'],$row['game_videopath'], $row['user_username'],$row['game_releasedate'], $page);


                }



              }
              else
      	   	{
              $result = mysqli_query($con,"Select * from games join users on users.user_id = games.game_seller where games.game_name like '%" .$search. "%' and games.game_status = 1");

               while($row = mysqli_fetch_array($result))
               {
                 component($row['game_name'], $row['game_price'], $row['game_ID'], $row['game_photopath'],$row['game_videopath'], $row['user_username'], $row['game_releasedate'], $page);


                }

		  } ?>


          </div>
        </div>
      </div>
    </section>
    <!-- /Main Content -->

    <!-- Footer -->
      <footer>
        <section class="footer-section" style="background-image: linear-gradient(to top, black, #0A1829)">
          Copyright (c) 2020 Copyright Nexus All Rights Reserved.
        </section>
      </footer>
    <!-- /Footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
    function show() {
      var x = document.getElementById("games");
        if (x.style.visibility === "hidden") {
          x.style.opacity = "1";
          x.style.visibility = "visible";
          x.style.pointerEvents = "all";
        } else {
          x.style.opacity = "0";
          x.style.visibility = "hidden";
          x.style.pointerEvents = "none";
        }
}
    </script>
  </body>
</html>
