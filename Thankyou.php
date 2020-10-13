<?php
include("conn.php");
 session_start();
 if (!isset($_SESSION['id'])) {
 header('Location: login.php');}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="css/checkout.css">
    <title> Reciept</title>
</head>

<body>
<div class="row">
  <div class="col-75">
    <div class="container">
    <?php
		  $Uid = $_SESSION['id'];
          $gid =intval($_GET['id']);;
		  
          $result = mysqli_query($con,"SELECT * FROM `purchase` join games on games.game_ID = purchase.purchase_game join users on users.user_id = purchase.purchase_customer where purchase.purchase_customer = $Uid and purchase.purchase_game = $gid ");
		  //Select * from games join users on users.user_id = games.game_seller where games.game_id=$gid

          while($row = mysqli_fetch_array($result)){?>
        <div class="row">
          <div class="col-50">
            <h2>Reciept</h2>
            <label for="fname"><i class="fa fa-user"></i> Full Name: <?php echo $row['user_username'] ?></label>
            </br>
            <label for="email"><i class="fa fa-envelope"></i> Email: <?php echo $row['user_email'] ?></label>
            </br>
            <label for="adr"><i class="fa fa-address-card-o"></i> Contact: <?php echo $row['user_contact'] ?></label>
            </br>
          </div>

          <div class="col-50">
            <h4>Purchase Details</h4>
            <label for="cname">Purchase ID: <?php echo $row['purchase_ID'] ?></label>

            <label for="ccnum">Game Name: <?php echo $row['game_name'] ?></label>

            <label for="expmonth">Purchase Date: <?php echo $row['purchase_date'] ?></label>


            <div class="row">
              <div class="col-50">
                <label for="expyear">Purchase Price: <?php echo $row['purchase_price'] ?></label>
                <?php } ?>
              </div>
            </div>
            <button target="blank" style="cursor: pointer" onclick="window.print();">Print</button>
            <a href = "index.php"><button type="button" class="btn btn-secondary btn-sm">Return Home </button></a>
          </div>
</body>
