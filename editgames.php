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
    <title>Nexus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="icon" href= "images/logoonly.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/editgame.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/sticky.js"></script>
    <script src="https://kit.fontawesome.com/ac84272c35.js" crossorigin="anonymous"></script>
    <script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="application/x-javascript">
      tinymce.init({
        selector:'#TypeHere',
        content_css: 'editgame.css',
        plugins: "paste",
        paste_as_text: true
      });
    </script>
    <script type="text/javascript">
      var validate = function(e) {
      var t = e.value;
      e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
    }
    function validateFloatKeyPress(el, evt) {

    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
        && (charCode < 48 || charCode > 57)) {
        return false;
    }

    if (charCode == 46 && el.value.indexOf(".") !== -1) {
        return false;
    }

    return true;
}
    </script>
  </head>
  <body>

<!-- Navigation -->
    <?php
      include 'navigation.php';
    ?>
<!-- /Navigation -->

<!-- Main Content -->
<?php
      include("conn.php");
      $id = intval($_GET['id']); //get the id from URL
      $result = mysqli_query($con,"SELECT * FROM games WHERE game_ID=$id");
      while($row = mysqli_fetch_array($result))
                   {
  ?>
<form action="edit(games).php" method="post" enctype="multipart/form-data" >
    <section class="content-section">
      <!-- Game Background Picture -->
        <div class="bg-div">
          <img id="bg-divp" src="<?php echo $row['game_backgroundimagepath'] ?>">
          <div class="game-bg-div">
            <label class="label" for="bg-img"><i class="fas fa-file-image"></i></label>
            <p>Background Image</br></p>
            <h4>Format</br>png / jpg / jpeg</h4>
            <h4>Recommended</br>(1000x600)</h4>
            <input id="bg-img" class="bg-input" type="file" name="game_backgroundimagepath" value="<?php echo $row['game_backgroundimagepath'] ?>">
            <h5 class="bg-img"></h5>
          </div>
          <div class="game-name-div">
            <img id="logop" src="<?php echo $row['game_logopath'] ?>">
            <label class="label" for="logo"><i class="fas fa-file-image"></i></label>
            <p>Logo</p></br>
            <h4>Format</br>png / jpg / jpeg</h4>
            <h4>Recommended</br>(260x200)</h4>
            <input id="logo" type="file" name="game_logopath" value="<?php echo $row['game_logopath'] ?>">
            <h5 class="logo"></h5>
          </div>
        </div>
      <!-- /Game Background Picture -->

      <!-- Game Details -->
        <section class="game-details-section">
        <div class="form">
          <div class="game-details-div">
            <div class="game-video-div">
              <video id="videop" src="<?php echo $row['game_videopath'] ?>" controls></video>
            </div>
            <div class="upload-video-div">
              <div class="upload-video-div-secondary">
                <label class="label" for="video"><i class="fas fa-file-image"></i></label>
                <div class="h4p">
                  <h4>Recommended</br>(720p)</h4>
                  <h4>Format</br>mp4 / mkv / avi / hevc</h4>
                </div>
                <p>Video</p>
                <input id="video"type="file" name="game_videopath" value="<?php echo $row['game_videopath'] ?>">
                <h5 class="video"></h5>
              </div>
            </div>
            <div class="reviews-div">
                <div class="img">
                  <img id="mainp" src="<?php echo $row['game_photopath'] ?>" alt="">
                  <label class="label" for="main"><i class="fas fa-file-image"></i></label>
                  <h4>Recommended</br>(230x320)</h4>
                  <h4>Format</br>png / jpg / jpeg</h4>
                  <p>Vertical Image</br></p>
                  <input id="main"type="file" name="game_photopath" value="<?php echo $row['game_photopath'] ?>">
                  <h5 class="main"></h5>
                </div>
                <div class="des">
                  <div class="des1">
                    <input class="title-input" type="text" placeholder="Game Title" name="game_name" value="<?php echo $row['game_name'] ?>">
                    <div class="category-div">
                      <p name="cat">Category</p>
                      <select class="" name="game_category" >
                        <option value="Action" <?php if ($row['game_category'] == "Action") {  ?>
                            selected="selected"
                          <?php } ?>>Action</option>
                        <option value="Adventure" <?php if ($row['game_category'] == "Adventure") {  ?>
                            selected="selected"
                          <?php } ?>>Adventure</option>
                        <option value="Racing" <?php if ($row['game_category'] == "Racing") {  ?>
                            selected="selected"
                          <?php } ?>>Racing</option>
                        <option value="Strategy" <?php if ($row['game_category'] == "Strategy") {  ?>
                            selected="selected"
                          <?php } ?>>Strategy</option>
                        <option value="MOBA" <?php if ($row['game_category'] == "MOBA") {  ?>
                            selected="selected"
                          <?php } ?>>MOBA</option>
                        <option value="Sports" <?php if ($row['game_category'] == "Sports") {  ?>
                            selected="selected"
                          <?php } ?>>Sports</option>
                        <option value="FPS" <?php if ($row['game_category'] == "FPS") {  ?>
                            selected="selected"
                          <?php } ?>>FPS</option>
                        <option value="RPG" <?php if ($row['game_category'] == "RPG") {  ?>
                            selected="selected"
                          <?php } ?>>RPG</option>
                        <option value="Simulation" <?php if ($row['game_category'] == "Simulation") {  ?>
                            selected="selected"
                          <?php } ?>>Simulation</option>
                      </select>
                    </div>
                    <div class="price">
                      <input oninput="validate(this)" id="test1" class="price-input" type="text" placeholder="Price" name="game_price" required="required" value="<?php echo $row['game_price'] ?>" onkeydown="return validateFloatKeyPress(this, event)" oninput="validate(this)">
                    </div>
                  </div>
                  <div class="reviews-div-content">
                    <p>Upload Game Files</p>
                    <label for="uploadgame">
                      <i class="fas fa-upload"></i> <input type="file" name="game_downloadpath" value="<?php echo $row['game_downloadpath'] ?>">
                      <input id="uploadgame" type="file" name="game_downloadpath" value="<?php echo $row['game_downloadpath'] ?>" multiple>
                    </label>
                    <div class="showdes">
                      <h3>Game Files</br></h3>
                      <h4>Format</br>zip / rar / exe / dmg</h4>
                    </div>
                    <h5 class="uploadgame"></h5>
                  </div>
                </div>
            </div>
            <div class="game-about-div">
              <h2>description</h2>
              <div class="description-div">
                 <textarea class="about-textarea" id="TypeHere" name="game_description" value="<?php echo $row['game_description'] ?>"></textarea>
              </div>
            </div>
            <div class="form-button-div">
              <button class="submit" type="submit" name="button">Update</button>
              <button class="cancel" type="button" name="button"> <a href="gamescreated.php">Cancel</a> </button>
            </div>
            <input type="hidden" name="id" value="<?php echo $row['game_ID'] ?>">
          </div>

        </div>

        </section>

      <!-- /Game Details -->
      <!-- Footer -->
          <section class="footer-section">
            Copyright (c) 2020 Copyright Holder All Rights Reserved.
          </section>
      <!-- /Footer -->
    </section>
    </form>
    <?php } ?>
<!-- /Main Content -->

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
<script type="text/javascript">
  var validate = function(e) {
  var t = e.value;
  e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
}
</script>
  </body>
</html>
