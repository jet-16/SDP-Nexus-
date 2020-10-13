<?php
  session_start();
  if (!isset($_SESSION['id']) || (!$_SESSION['role'])) {
    header('Location: login.php');
  }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
    <style media="screen">
    .gender-contact-div {
      display: flex;
      flex-direction: row !important;
      width: 100%;
      position: relative;
      left: 11%;
      top: -1.5%;
    }

    .gender-btn-div label {
      margin-right: 25px;
    }

    .contact-div input {
      width: 150px;
      height: 25px;
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
<div class="block"></div>
<section class="profile-section">
  <div class="menubar-div"
  data-aos="fade-up"
  data-aos-offset="-150"
  data-aos-delay="0"
  data-aos-duration="0"
  data-aos-easing="ease-in-out"
  data-aos-mirror="true"
  data-aos-once="true"
  data-aos-anchor-placement="top-center">
    <?php

    if($_SESSION['role']==="customer")
               { ?>
        <div onclick=show("account") class="individual-div">
          <i class="fas fa-user"></i>
          <h2>general</h2>
        </div>
        <div onclick=show("transactions") class="individual-div">
          <i class="fas fa-history"></i>
          <h2>transaction history</h2>
        </div>

        <?php }

    else if($_SESSION['role']==="seller")
        { ?>
        <div onclick=show("account") class="individual-div">
          <i class="fas fa-user"></i>
          <h2>general</h2>
        </div>
        <div onclick=show("games") class="individual-div" id="button">
          <i class="fas fa-gamepad"></i>
          <h2>Games Created</h2>
        </div>
        <div onclick=show("reportd") class="individual-div">
          <i class="fas fa-chart-line"></i>
          <h2>View Sales</h2>
        </div>
        <?php }

    else if($_SESSION['role']==="admin")
        { ?>
        <div onclick=show("account") class="individual-div">
          <i class="fas fa-user"></i>
          <h2>general</h2>
        </div>
        <div onclick=show("reporta") class="individual-div">
          <i class="fas fa-chart-line"></i>
          <h2>View Customer Purchases</h2>
        </div>
        <div onclick=show("approve") class="individual-div">
          <i class="fas fa-tasks"></i>
          <h2>approve request</h2>
        </div>
        <div onclick=show("register") class="individual-div">
          <i class="fas fa-user-cog"></i>
          <h2>Register Admin</h2>
        </div>
      <?php }?>
  </div>

      <div class="profile-div"
      data-aos="fade-up"
      data-aos-offset="-150"
      data-aos-delay="0"
      data-aos-duration="0"
      data-aos-easing="ease-in-out"
      data-aos-mirror="true"
      data-aos-once="true"
      data-aos-anchor-placement="top-center">
        <div class="account-div" id="account">
          <div class="info-div">
            <h1>General</h1>
            <div class="account-main-div">


              <div class="account-div-secondary">
                  <div class="profile-pic">
                  <?php
                  include("conn.php");
                  $sid = $_SESSION['id'];
                  $result = mysqli_query($con,"SELECT * FROM users WHERE user_id=$sid");
                while($row = mysqli_fetch_array($result))
                { ?>
                    <img src="<?php echo $row['user_photopath'] ?>" alt="">
                    <?php
                    }

      		        ?>
                  </div>
                  <h3>Profile Picture</h3>

              </div>
              <?php


               $sid = $_SESSION['id'];
               $result = mysqli_query($con,"SELECT * FROM users WHERE user_id=$sid");
             while($row = mysqli_fetch_array($result))
             {

              if($_SESSION['role']==="customer")
              { ?>

              <form class="account-form">
                <h3>Username</h3>
                <input type="text" name="" value="<?php echo $row['user_username'] ?>" disabled>
                <h3>Email</h3>
                <input type="email" name="" value="<?php echo $row['user_email'] ?>" disabled>
                <h3 class="not">Gender</h3>
                <div class="account-gender-div">
                  <div class="account-male-div">
                  <input type="radio" name="gender"  value="male" disabled <?php if ($row['user_gender']=="male") { ?>
					          checked="checked" <?php } ?> >
                    <label for="male">Male</label>
                  </div>
                  <div class="account-female-div">
                    <input type="radio" name="gender"  value="female" disabled <?php if ($row['user_gender']=="female") { ?>
					          checked="checked" <?php } ?> >
                    <label for="female">Female</label>
                  </div>
                </div>
                <?php }
                 else if($_SESSION['role']==="seller")
                  { ?>
                  <form class="account-form">
                  <h3>Username</h3>
                <input type="text" name="" value="<?php echo $row['user_username'] ?>" disabled>
                <h3>Email</h3>
                <input type="email" name="" value="<?php echo $row['user_email'] ?>" disabled>
                <h3>Contact</h3>
                <input type="text" name="" value="<?php echo $row['user_contact'] ?>" disabled>
                <h3 class="not">Gender</h3>
                <div class="account-gender-div">
                  <div class="account-male-div">
                  <input type="radio" name="gender"  value="male" disabled <?php if ($row['user_gender']=="male") { ?>
					          checked="checked" <?php } ?> >
                    <label for="male">Male</label>
                  </div>
                  <div class="account-female-div">
                    <input type="radio" name="gender"  value="female" disabled <?php if ($row['user_gender']=="female") { ?>
					          checked="checked" <?php } ?> >
                    <label for="female">Female</label>
                  </div>
                </div>
                <?php }
                else if($_SESSION['role']==="admin")


               {?>
                  <form class="account-form">
                  <h3>Username</h3>
                <input type="text" name="" value="<?php echo $row['user_username'] ?>" disabled>
                <h3>Email</h3>
                <input type="email" name="" value="<?php echo $row['user_email'] ?>" disabled>
                <h3>Contact</h3>
                <input type="text" name="" value="<?php echo $row['user_contact'] ?>" disabled>
                <h3 class="not">Gender</h3>
                <div class="account-gender-div">
                  <div class="account-male-div">
                    <input type="radio" name="gender"  value="male" disabled <?php if ($row['user_gender']=="male") { ?>
					          checked="checked" <?php } ?> >
                    <label for="male">Male</label>
                  </div>
                  <div class="account-female-div">
                    <input type="radio" name="gender"  value="female" disabled <?php if ($row['user_gender']=="female") { ?>
					          checked="checked" <?php } ?> >
                    <label for="female">Female</label>
                  </div>
                </div>
                <?php }
              }?>
                <button class="editprofile" type="button" name="button">edit profile
                  <i class="fas fa-edit"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
        <iframe id="transactions" src="transactions.php?id=<?php echo $_SESSION['id']?>" width="100%" height="100%" frameborder="no" scrolling="yes"></iframe>
        <iframe id="games" src="games.php?id=<?php echo $_SESSION['id']?>" width="100%" height="100%" frameborder="no" scrolling="yes"></iframe>
        <iframe id="reportd" src="reportd.php?id=<?php echo $_SESSION['id']?>" width="100%" height="100%" frameborder="no" scrolling="yes"></iframe>
        <iframe id="reporta" src="reporta.php" width="100%" height="100%" frameborder="no" scrolling="yes"></iframe>
        <iframe id="approve" src="approve.php" width="100%" height="100%" frameborder="no" scrolling="yes"></iframe>
        <div class="register-div" id="register">
          <div class="info-div">
            <h1>register admin</h1>
            <div class="register-main-div">
              <form class="register-form" action="registeradmin.php" method="post">
                <input type="text" name="username" value="" placeholder="Username" required="required">
                <input type="email" name="email" value="" placeholder="Email" required="required">
                <input type="text" name="contact" value="" placeholder="Contact" required="required" onkeydown="javascript: return event.keyCode === 8 ||
              event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                <h3>Gender</h3>
                <div class="account-gender-div">
                  <div class="account-male-div">
                    <input type="radio" name="gender"  value="male">
                    <label for="male">Male</label>
                  </div>
                  <div class="account-female-div">
                    <input type="radio" name="gender"  value="female">
                    <label for="female">Female</label>
                  </div>
                </div>

                <input type="password" name="password" value="" placeholder="Password" required="required">
                <input type="password" name="confirmpassword" value="" placeholder="Confrim Password" required="required">
                <button type="submit" name="button">register</button>
              </form>
              <div class="constraints">
                <h2>constraints</h2>
                <div class="constraints-div">
                  <p>All fields are required to be filled</p>
                  <p>The username should be unique and does not match with other users.</p>
                  <p>The email should not be used more on than one account.</p>
                  <p>The password should be strong to secure the account.</p>
                </div>
                <div class="usernames">
                  <h2>Admin Accounts</h2>
                  <div class="listnames">
                    <?php
                    include("conn.php");
                    $admin = "admin";
                    $result = mysqli_query($con, "SELECT * FROM users WHERE user_role = '$admin'");
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div>
                          <p><?php echo $row['user_username']?></p>
                        </div>
                  <?php  }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="editprofile-div-bg">
        <div class="editprofile-div">
          <h1>Edit Profile</h1>
          <?php
          include("conn.php");

                    $sid = $_SESSION['id'];
                    $result = mysqli_query($con, "SELECT * FROM users WHERE user_id = $sid");

                  while ($row = mysqli_fetch_array($result)) {

          if($_SESSION['role']==="customer")
           { ?>
            <form class="editprofile-form" action="updateprofile.php" method="post" enctype="multipart/form-data">
            <div class="flex-row-div">
              <div class="flex-column-div">
              <h3>Username</h3>
                  <input type="text" name="username" value="<?php echo $row['user_username'] ?>"  required>
                  <h3>Email</h3>
                  <input type="email" name="email" value="<?php echo $row['user_email'] ?>"  required>

                  <h3 class="not">Gender</h3>
                  <div class="editprofile-gender-div">
                    <div class="account-male-div">
                      <input type="radio" name="gender"  value="male"  <?php if ($row['user_gender']=="male") { ?>
                      checked="checked" <?php } ?> >
                      <label for="male" style="color: white;">Male</label>
                    </div>
                    <div class="account-female-div">
                      <input type="radio" name="gender"  value="female"  <?php if ($row['user_gender']=="female") { ?>
                      checked="checked" <?php } ?> >
                      <label for="female" style="color: white;">Female</label>
                    </div>
                  </div>
                  <h3>Password</h3>
                <input type="password" name="password" value="<?php echo $row['user_password'] ?>" placeholder="Password" required>
                <h3>Confirm Password</h3>
                <input type="password" name="password-repeat" value="<?php echo $row['user_password'] ?>" placeholder="Confrim Password" required>
              </div>
              <div class="image-preview">
                <img id="profilepicture" src="<?php echo $row['user_photopath'] ?>">
                <label class="profilepic-btn" for="profilepic"><i class="fas fa-edit"></i></label>
                <input type="file" name="photo" id="profilepic" value="<?php echo $row['user_photopath'] ?>">
                <h5 class="profilepich5"></h5>
              </div>

            </div>
            <div class="editprofile-btn-div">
              <button type="submit" name="button">save changes</button>
              <button class="closebtn" type="button" name="button">cancel</button>
            </div>
          </form>
                  <?php }
                   else if(($_SESSION['role']==="seller") || ($_SESSION['role']==="admin"))
                    { ?>

            <form class="editprofile-form" action="updateprofileseller.php" method="post" enctype="multipart/form-data">
            <div class="flex-row-div">
              <div class="flex-column-div">
              <h3>Username</h3>
                  <input type="text" name="username" value="<?php echo $row['user_username'] ?>"  required>
                  <h3>Email</h3>
                  <input type="email" name="email" value="<?php echo $row['user_email'] ?>"  required>
                  <h3>Contact</h3>
                  <input type="text" name="contact" value="<?php echo $row['user_contact'] ?>"onkeydown="javascript: return event.keyCode === 8 ||
              event.keyCode === 46 ? true : !isNaN(Number(event.key))"  required>
                  <h3 class="not">Gender</h3>
                  <div class="editprofile-gender-div">
                    <div class="account-male-div">
                      <input type="radio" name="gender"  value="male"  <?php if ($row['user_gender']=="male") { ?>
                      checked="checked" <?php } ?> >
                      <label for="male" style="color: white;">Male</label>
                    </div>
                    <div class="account-female-div">
                      <input type="radio" name="gender"  value="female"  <?php if ($row['user_gender']=="female") { ?>
                      checked="checked" <?php } ?> >
                      <label for="female" style="color: white;">Female</label>
                    </div>
                  </div>
                  <h3>Password</h3>
                <input type="password" name="password" value="<?php echo $row['user_password'] ?>" placeholder="Password" required>
                <h3>Confirm Password</h3>
                <input type="password" name="password-repeat" value="<?php echo $row['user_password'] ?>" placeholder="Confrim Password" required>
              </div>
              <div class="image-preview">
                <img id="profilepicture" src="<?php echo $row['user_photopath'] ?>">
                <label class="profilepic-btn"for="profilepic"><i class="fas fa-edit"></i></label>
                <input type="file" name="photo" id="profilepic" value="<?php echo $row['user_photopath'] ?>">
                <h5 class="profilepich5"></h5>
              </div>
            </div>
            <div class="editprofile-btn-div">
              <button type="submit" name="button">save changes</button>
              <button class="closebtn" type="button" name="button">cancel</button>
            </div>
          </form>

                  <?php }
                }?>

        </div>
      </div>
    </section>
<!-- /Main Content -->

<!-- Footer -->
  <footer>
    <section class="footer-section">
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
<script src="js/showpath.js"></script>
<script src="js/previewimg.js"></script>
<script src="js/profilemodal.js"></script>
<script type="text/javascript">
function show(elementId) {
      document.getElementById("account").style.display = "none";
      document.getElementById("transactions").style.display = "none";
      document.getElementById("games").style.display = "none";
      document.getElementById("reportd").style.display = "none";
      document.getElementById("reporta").style.display = "none";
      document.getElementById("approve").style.display = "none";
      document.getElementById("register").style.display = "none";
      document.getElementById(elementId).style.display = "flex";
  }

</script>
  </body>
</html>
