<?php
include("conn.php");

session_start();

$id = $_SESSION['id'];
$name = $_POST['game_name'];
$category = $_POST['game_category'];
$price = $_POST['game_price'];
$description = $_POST['game_description'];
$date = date("Y-m-d");

//Logo
$target_dir1 = "gamelogo/";
$target_file1 = $target_dir1 . basename($_FILES["game_logopath"]["name"]);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["game_logopath"]["tmp_name"]);


if($check == false)
{
  echo "<script>alert('Logo image file is not an image.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
 }

else if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" )// Allow certain file formats
   {
   echo "<script>alert('(Error:gl1) Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}



//background image
$target_dir2 = "gamebackground/";
$target_file2 = $target_dir2 . basename($_FILES["game_backgroundimagepath"]["name"]);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["game_backgroundimagepath"]["tmp_name"]);


if($check == false)
{
  echo "<script>alert('Background image file is not an image.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
 }

else if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "gif" )// Allow certain file formats
   {
   echo "<script>alert('(Error:gb1) Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}



//main image
$target_dir3 = "gamephoto/";
$target_file3 = $target_dir3 . basename($_FILES["game_photopath"]["name"]);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["game_photopath"]["tmp_name"]);


if($check == false)
{
  echo "<script>alert('Main image file is not an image.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
 }

else if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "gif" )// Allow certain file formats
   {
   echo "<script>alert('(Error:gp1) Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}



//video
$target_dir4 = "gamevideo/";
$target_file4 = $target_dir4 . basename($_FILES["game_videopath"]["name"]);
$videoFileType = pathinfo($target_file4,PATHINFO_EXTENSION);

 if($videoFileType != "mp4" && $videoFileType != "mkv" && $videoFileType != "avi" && $videoFileType!= "hevc" )// Allow certain file formats
   {
   echo "<script>alert('(Error:gv1) Sorry, only MP4, MKV, AVI & HEVC files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}




//file
$target_dir5 = "gamefile/";
$target_file5 = $target_dir5 . basename($_FILES["game_downloadpath"]["name"]);
$FileType = pathinfo($target_file5,PATHINFO_EXTENSION);

 if($FileType != "zip" && $FileType != "rar" && $FileType != "exe" )// Allow certain file formats
   {
   echo "<script>alert('(Error:gf1) Sorry, only ZIP, RAR & EXE files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}



//move the file using move_uploaded_file function.
move_uploaded_file($_FILES["game_logopath"]["tmp_name"], $target_file1);
move_uploaded_file($_FILES["game_backgroundimagepath"]["tmp_name"], $target_file2);
move_uploaded_file($_FILES["game_photopath"]["tmp_name"], $target_file3);
move_uploaded_file($_FILES["game_videopath"]["tmp_name"], $target_file4);
move_uploaded_file($_FILES["game_downloadpath"]["tmp_name"], $target_file5);


$sql = "UPDATE games SET game_name='$_POST[game_name]', game_category='$_POST[game_category]',
game_price='$_POST[game_price]',game_description='$_POST[game_description]',game_status = 0, game_logopath='$target_file1',
game_backgroundimagepath='$target_file2',game_photopath='$target_file3',game_videopath='$target_file4',game_downloadpath='$target_file5'
WHERE game_ID=$_POST[id];";


if (mysqli_query($con,$sql))
{
  mysqli_close($con);
  header('Location: gamescreated.php');
}
?>
