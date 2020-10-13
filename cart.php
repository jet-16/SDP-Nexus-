<?php
  session_start();
  if (!isset($_SESSION['role'])) {
    header('Location: login.php');
  }

  require_once ("conn.php");
  require_once ("component.php");



  if (isset($_POST['remove'])){
    if ($_GET['action'] == 'remove'){
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["game_ID"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
   <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/cart.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="js/sticky.js"></script>
   <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
   <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
 </head>
 <body>

<!-- Navigation -->
    <?php
      include "navigation.php";
    ?>
<!-- /Navigation -->

<!-- Main Content -->
   <section class="cart-section">
     <div class="block"></div>
     <div class="cart-div">
       <h1>cart</h1>

     <!-- Filter & Search Menu Bar -->
     <form class="searchform" action="cart.php" method="post">
       <div class="filter-search-div">

         <div class="search-div">
           <input type="text" name="searchbox" placeholder="Search">
           <div class="search-icon-div">
             <button type="submit" name="button">
               <i class="fas fa-search"></i>
             </button>
           </div>
         </div>

       </div>
     </form>

     <!-- /Filter & Search Menu Bar -->

     <!-- Cart Games -->
     <?php

    $total = 0;
    if (isset($_SESSION['cart'])){
        $ID = array_column($_SESSION['cart'], 'game_ID');


     include("conn.php");
     $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';
     $result = mysqli_query($con,"SELECT * from games join users on users.user_id = games.game_seller where games.game_name LIKE '%". $search. "%' AND games.game_status = 1");
      while($row = mysqli_fetch_array($result)){

        foreach ($ID as $game_ID){
          if ($row['game_ID'] == $game_ID){
             cartElement( $row['game_name'], $row['game_price'], $row['game_ID'], $row['game_backgroundimagepath'], $row['game_logopath'], $row['user_username'], $row['game_releasedate']);
             $total = $total + (int)$row['game_price'];
          }
        }
      }
    }
    else {
          echo "<h5>Cart is Empty</h5>
          <a class='visitbtn' href='store.php'>Visit Store</a> ";
    }



  ?>

   </section>
<!-- /Main Content -->

<!-- Footer -->
 <footer>
   <section class="footer-section" style="background-image: linear-gradient(to top, black, #0A1829)">
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
<script src="js/modal.js"></script>


 </body>
</html>
