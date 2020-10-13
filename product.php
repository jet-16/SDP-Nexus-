<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    session_start();
      include("conn.php");
      if (!isset($_GET['id']) ){
          header('Location: store.php');
        }
      $id = intval($_GET['id']);  //get id from url

      $result = mysqli_query ($con,"SELECT * FROM games JOIN users ON users.user_id = games.game_seller WHERE games.game_id=$id");
        if ($row = mysqli_fetch_array($result)) {
          echo "<title>".$row['game_name']."</title>";
        }
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
                    echo "<script>window.history.go(-1);</script>";
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
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/rating.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <section class="content-section">
      <!-- Game Background Picture -->
        <div class="bg-div">
          <?php
        include("conn.php");
        $id = intval($_GET['id']);  //get id from url
        $rate = "SELECT * FROM ratings WHERE game_ID = $id";
        $rateresult = mysqli_query($con, $rate);
        $rating = mysqli_query($con, "SELECT AVG(ratings) AS average FROM ratings WHERE game_ID = $id  ");
        $r = mysqli_fetch_assoc($rating);
        $average =  round($r['average']);
        $latest = mysqli_query($con, "SELECT MAX(rating_id) AS max FROM ratings WHERE game_ID = $id");
        $latestrow = mysqli_fetch_assoc($latest);
        $recent = $latestrow['max'];
        $latestrating = mysqli_query($con, "SELECT ratings FROM ratings WHERE game_ID = $id AND rating_id = $recent");
        $lr = mysqli_fetch_assoc($latestrating);
        $lr2 = $lr['ratings'];
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
              <video src="<?php echo $row['game_videopath'] ?>" controls poster=""></video>
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
                      <h2 class="htmlh2">recent reviews:</h2><h2 class="phph2" style="color: #407AD3;"><?php echo $lr2 ?></h2>
                      <h2 class="htmlh2">overall reviews:</h2><h2 class="phph2" style="color: #407AD3;"><?php echo $average ?></h2>
                    </div>
                    <div class="origin">
                      <h2 class="htmlh2">release date:</h2><h2 class="phph2" style="color: #fff;"><?php echo $row['game_releasedate'] ?></h2>
                      <h2 class="htmlh2">developer:</h2><h2 class="phph2" style="color: #fff;"><?php echo $row['user_username'] ?></h2>
                    </div>
                  </div>
                  <div class="reviews-div-content-right">
                    <div class="reviews-div-content-right-top">
                      <div class="rating-box">
                        <?php
                        include("conn.php");
                        if ((!isset($_SESSION['role'])) || ($_SESSION['role'] !== "customer")) {
                          $gid = intval($_GET['id']);
                          $rate = "SELECT * FROM ratings WHERE game_ID = $gid";
                          $rateresult = mysqli_query($con, $rate);
                          $rating = mysqli_query($con, "SELECT AVG(ratings) AS average FROM ratings WHERE game_ID = $gid");
                          $r = mysqli_fetch_assoc($rating);
                          $average =  round($r['average']);

                          if (mysqli_num_rows($rateresult) > 0) {
                            if ($average == 0) {
                              echo "
                              <div class='ratings static'>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>";
                            }
                            elseif ($average == 1) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>";
                            }
                            elseif ($average == 2) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>
                              ";
                            }
                            elseif ($average == 3) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>
                              ";
                            }
                            elseif ($average == 4) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>
                              ";
                            }
                            elseif ($average == 5) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                              </div>
                              ";
                            }
                          }
                          elseif (mysqli_num_rows($rateresult) === 0) {
                            echo "
                            <div class='ratings static'>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                        }
                        else {
                          if (mysqli_num_rows($rateresult) > 0) {
                            if ($average == 0) {
                              echo "
                              <div class='ratings static'>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>";
                            }
                            elseif ($average == 1) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>";
                            }
                            elseif ($average == 2) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>
                              ";
                            }
                            elseif ($average == 3) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>
                              ";
                            }
                            elseif ($average == 4) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                              </div>
                              ";
                            }
                            elseif ($average == 5) {
                              echo "
                              <div class='ratings static'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                              </div>
                              ";
                            }
                          }
                          elseif (mysqli_num_rows($rateresult) === 0) {
                            echo "
                            <div class='ratings static'>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }


                        }

                       ?>

                      </div>
                    </div>
                    <div class="reviews-div-content-right-bottom">
                      <div class="price">
                        <h2>RM <?php echo $row['game_price']?></h2>
                      </div>
                      <form class="purchase-form" action="<?php echo "product.php?id=".$id.";"?>" method="post" >
                        <?php
                        if (!isset($_SESSION['id'])) {
                          echo "<button class='purchase-btn' type='submit' name='add'>Add to Cart</button>";
                        }elseif(!isset($_SESSION['cart'])){
                          echo "<button class='purchase-btn' type='submit' name='add'>Add to Cart</button><input type='hidden' name='game_ID' value='$id'>";
                        }else{


                        $item_array_id = array_column($_SESSION['cart'], "game_ID");

                        if(in_array($id, $item_array_id)){

                        foreach ($_SESSION['cart'] as $key => $value){

                          if($value["game_ID"] == $id){
                            echo "<button class='purchase-btn' type='button' name='add'><a href= \"cart.php\">Go to Cart</a></button>";
                          }
                        }
                        }

                        else {
                        $uid = $_SESSION['id'];
                        $gid = intval($_GET['id']);
                        $exist = mysqli_query($con, "SELECT * FROM purchase WHERE purchase_customer = $uid AND purchase_game = $gid");
                        $downloadpath = mysqli_query($con, "SELECT game_downloadpath FROM games WHERE game_ID = $gid");

                        if (mysqli_num_rows($exist) > 0) {
                          while ($downloadassoc = mysqli_fetch_assoc($downloadpath)) {
                            echo "<button class='download-btn' type='button' name='button'>  <a href=".$downloadassoc['game_downloadpath']." visible='hidden'><i class='fas fa-download'></i></a></button>";
                          }

                        }

                        elseif (mysqli_num_rows($exist) === 0) {
                          echo "<button class='purchase-btn' type='submit' name='add'>Add to Cart</button><input type='hidden' name='game_ID' value='$id'>";
                        }

                        }
                        }
                        ?>


                    </div>

                  </div>
                    </form>
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

            <div class="comment-box">
              <h2>reviews</h2>
              <?php
              include("conn.php");

            if ((!isset($_SESSION['id'])) || ($_SESSION['role'] !== "customer")) {
                $gid = intval($_GET['id']);
                $other = mysqli_query($con, "SELECT * FROM comments JOIN users ON users.user_id = comments.user_ID WHERE comments.game_id = $gid");


              }
              else {

              $uid = $_SESSION['id'];
              $gid = intval($_GET['id']);
              $result = "SELECT * FROM comments JOIN users ON users.user_id = comments.user_ID WHERE comments.game_id = $gid AND comments.user_ID = $uid";
              $select = mysqli_query($con, $result);
              $row = mysqli_fetch_assoc($select);
              $name = $_SESSION['name'];
              $profilepic = mysqli_query($con, "SELECT * FROM users WHERE user_id = $uid");
              $picrow = mysqli_fetch_assoc($profilepic);

              if (mysqli_num_rows($select) === 0) {?>

              <div class="comments-div">
                <div class="user-div">
                  <img src="<?php echo $picrow['user_photopath'] ?>">
                  <h3><?php echo $name ?></h3>
                </div>
                <div class="user-comments-div">
                  <div class="rating-box2">
                    <?php
                    include("conn.php");
                    $uid = $_SESSION['id'];
                    $gid = intval($_GET['id']);
                    $exist = mysqli_query($con, "SELECT * FROM purchase WHERE purchase_customer = $uid AND purchase_game = $gid");
                    if (mysqli_num_rows($exist) > 0) {
                    echo "<button class='btnrate' type='button' name='button'>rate</button>";
                    }
                      $rate = "SELECT * FROM ratings WHERE game_ID = $gid AND user_id = $uid";
                      $rateresult = mysqli_query($con, $rate);
                      $rating = mysqli_query($con, "SELECT ratings FROM ratings WHERE game_ID = $gid AND user_id = $uid");
                      $r = mysqli_fetch_assoc($rating);
                        if (mysqli_num_rows($rateresult) > 0) {
                          if ($r['ratings'] === "0") {
                            echo "<div class='ratings2 static'>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>";
                          }
                          elseif ($r['ratings'] === "1") {
                            echo "<div class='ratings2 static'>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>";
                          }
                          elseif ($r['ratings'] === "2") {
                            echo "
                            <div class='ratings2 static'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                          elseif ($r['ratings'] === "3") {
                            echo "
                            <div class='ratings2 static'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                          elseif ($r['ratings'] === "4") {
                            echo "
                            <div class='ratings2 static'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                          elseif ($r['ratings'] === "5") {
                            echo "
                            <div class='ratings2 static'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                            </div>
                            ";
                          }
                        }
                        elseif (mysqli_num_rows($rateresult) === 0) {
                          echo "<div class='ratings2 static'>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                          </div>";
                        }
                    ?>
                  </div>


                  <form action="comments.php?id= <?php echo $gid ?>" method="post">
                    <textarea name="comment" rows="8" cols="50" placeholder="Write a comment"></textarea>
                    <input type="hidden" name="gid" value="<?php echo $gid ?>">
                    <input type="hidden" name="uid" value="<?php echo $uid ?>">
                    <button type="submit" name="button">Post</button>
                  </form>
                </div>
              </div>
              <?php }

              elseif (mysqli_num_rows($select) > 0) {?>
                <div class="comments-div">
                  <div class="user-div">
                    <img src="<?php echo $row['user_photopath']?>">
                    <h3><?php echo $_SESSION['name']; ?></h3>
                  </div>
                  <div class="user-comments-div">
                    <div class="rating-box2">
                      <?php
                      include("conn.php");
                        $gid = intval($_GET['id']);
                        $uid = $row['user_ID'];
                        $exist = mysqli_query($con, "SELECT * FROM purchase WHERE purchase_customer = $uid AND purchase_game = $gid");
                        if (mysqli_num_rows($exist) > 0) {
                        echo "<button class='btnrate' type='button' name='button'>rate</button>";
                        }
                        $rate = "SELECT * FROM ratings WHERE game_ID = $gid AND user_id = $uid";
                        $rateresult = mysqli_query($con, $rate);
                        $rating = mysqli_query($con, "SELECT ratings FROM ratings WHERE game_ID = $gid AND user_id = $uid");
                        $r = mysqli_fetch_assoc($rating);

                        if (mysqli_num_rows($rateresult) > 0) {
                          if ($r['ratings'] === "0") {
                            echo "<div class='ratings2'>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>";
                          }
                          elseif ($r['ratings'] === "1") {
                            echo "<div class='ratings2'>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>";
                          }
                          elseif ($r['ratings'] === "2") {
                            echo "
                            <div class='ratings2'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                          elseif ($r['ratings'] === "3") {
                            echo "
                            <div class='ratings2'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                          elseif ($r['ratings'] === "4") {
                            echo "
                            <div class='ratings2'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='far fa-star'></i>
                            </div>
                            ";
                          }
                          elseif ($r['ratings'] === "5") {
                            echo "
                            <div class='ratings2'>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                              <i class='fas fa-star'></i>
                            </div>
                            ";
                          }
                        }
                        elseif (mysqli_num_rows($rateresult) === 0)  {
                          echo "<div class='ratings2'>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                            <i class='far fa-star'></i>
                          </div>";
                        }
                     ?>
                    </div>


                    <form action="comments.php?id= <?php echo $gid ?>" method="post">
                      <textarea name="comment" rows="8" cols="50" placeholder="Write a comment"><?php echo $row['comment'] ?></textarea>
                      <input type="hidden" name="gid" value="<?php echo $gid ?>">
                      <input type="hidden" name="uid" value="<?php echo $uid ?>">
                      <button type="submit" name="button">Edit</button>
                    </form>
                  </div>
                </div>

              <?php }}
              $other = mysqli_query($con, "SELECT * FROM comments JOIN users ON users.user_id = comments.user_ID WHERE comments.game_id = $gid");

              if (mysqli_num_rows($other) === 0) { ?>
                <div class="comments-div noreviews-div">

                      <p class="noreviews">
                        There are currently no reviews.
                      </p>
                </div>
            <?php  }
            else {
              while ($row = mysqli_fetch_assoc($other)) { ?>

              <div class="comments-div">
                <div class="user-div">
                  <img src="<?php echo $row['user_photopath']?>">
                  <h3><?php echo $row['user_username']?></h3>
                </div>
                <div class="user-comments-div">
                  <div class="rating-box2 static">
                    <?php
                    include("conn.php");
                      $gid = intval($_GET['id']);
                      $uid = $row['user_ID'];
                      $rate = "SELECT * FROM ratings WHERE game_ID = $gid AND user_id = $uid";
                      $rateresult = mysqli_query($con, $rate);
                      $rating = mysqli_query($con, "SELECT ratings FROM ratings WHERE game_ID = $gid AND user_id = $uid");
                      $r = mysqli_fetch_assoc($rating);

                      if (mysqli_num_rows($rateresult) > 0) {
                        if ($r['ratings'] === "0") {
                          echo "<div class='ratings2'>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                          </div>";
                        }
                        elseif ($r['ratings'] === "1") {
                          echo "<div class='ratings2'>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                          </div>";
                        }
                        elseif ($r['ratings'] === "2") {
                          echo "
                          <div class='ratings2'>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                          </div>
                          ";
                        }
                        elseif ($r['ratings'] === "3") {
                          echo "
                          <div class='ratings2'>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                          </div>
                          ";
                        }
                        elseif ($r['ratings'] === "4") {
                          echo "
                          <div class='ratings2'>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star-o' onclick=btn('rate')></span>
                          </div>
                          ";
                        }
                        elseif ($r['ratings'] === "5") {
                          echo "
                          <div class='ratings2'>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                            <span class='fa fa-star' onclick=btn('rate')></span>
                          </div>
                          ";
                        }
                      }
                      else {
                        echo "
                        <div class='ratings2'>
                          <span class='fa fa-star' onclick=btn('rate')></span>
                          <span class='fa fa-star-o' onclick=btn('rate')></span>
                          <span class='fa fa-star-o' onclick=btn('rate')></span>
                          <span class='fa fa-star-o' onclick=btn('rate')></span>
                          <span class='fa fa-star-o' onclick=btn('rate')></span>
                        </div>
                        ";
                      }
                   ?>
                  </div>
                    <p>
                    <?php echo $row['comment']?>
                    </p>
                </div>
              </div>

      <?php }} ?>

          </div>
        </div>

        </section>
      <!-- /Game Details -->

      <!-- Footer -->
          <section class="footer-section">
            Copyright (c) 2020 Copyright Nexus All Rights Reserved.
          </section>
      <!-- /Footer -->
      <?php
      if (isset($_SESSION['id'])) { ?>
      <div class="ratemodal-bg">
        <div class="ratemodal">
          <i class="fas fa-times"></i>
          <div class="currentrate">
            <h3>Your Current Rating on this Game</h3>
            <?php
            include("conn.php");
              $gid = intval($_GET['id']);
              $uid = $_SESSION['id'];
              $rate = "SELECT * FROM ratings WHERE game_ID = $gid AND user_id = $uid";
              $rateresult = mysqli_query($con, $rate);
              $rating = mysqli_query($con, "SELECT ratings FROM ratings WHERE game_ID = $gid AND user_id = $uid");
              $r = mysqli_fetch_assoc($rating);
                if (mysqli_num_rows($rateresult) > 0) {
                  if ($r['ratings'] === "0") {
                    echo "<div class='ratings3 static'>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                    </div>";
                  }
                  elseif ($r['ratings'] === "1") {
                    echo "<div class='ratings3 static'>
                      <i class='fas fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                    </div>";
                  }
                  elseif ($r['ratings'] === "2") {
                    echo "
                    <div class='ratings3 static'>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                    </div>
                    ";
                  }
                  elseif ($r['ratings'] === "3") {
                    echo "
                    <div class='ratings3 static'>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='far fa-star'></i>
                      <i class='far fa-star'></i>
                    </div>
                    ";
                  }
                  elseif ($r['ratings'] === "4") {
                    echo "
                    <div class='ratings3 static'>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='far fa-star'></i>
                    </div>
                    ";
                  }
                  elseif ($r['ratings'] === "5") {
                    echo "
                    <div class='ratings3 static'>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                      <i class='fas fa-star'></i>
                    </div>
                    ";
                  }
                }
                elseif (mysqli_num_rows($rateresult) === 0) {
                  echo "<div class='ratings3 static'>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                    <i class='far fa-star'></i>
                  </div>";
                }
            ?>
          </div>
          <div class="newrate">
            <h3>Update Your Rating Here</h3>
            <div class="ratings4">
              <span class="fa fa-star-o" onclick=btn("rate")></span>
              <span class="fa fa-star-o" onclick=btn("rate")></span>
              <span class="fa fa-star-o" onclick=btn("rate")></span>
              <span class="fa fa-star-o" onclick=btn("rate")></span>
              <span class="fa fa-star-o" onclick=btn("rate")></span>
            </div>
            <form class="rate-form" action="rate.php?id= <?php echo $gid ?>" method="post">
              <input type="hidden" name="rating" id="rating-value">
              <input type="hidden" name="gid" value="<?php echo $gid ?>">
              <input type="hidden" name="uid" value="<?php echo $uid ?>">
              <button type="submit" name="ratebtn" id="rate">rate</button>
            </form>
          </div>
        </div>
      </div>
    <?php }
      else {

      } ?>

    </section>
<!-- /Main Content -->
<script type="text/javascript" src="js/rating.js"></script>
<script type="text/javascript" src="js/ratemodal.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript">
function btn(elementId) {
      document.getElementById("rate").style.opacity = "0";
      document.getElementById(elementId).style.opacity = "1";
}
function remove() {
  document.querySelector(".game-about-div div p span").removeAttribute("style");
}
</script>
  </body>
</html>
