<?php
include("conn.php");

//-Logo
$target_dir1 = "gamelogo/";
$target_file1 = $target_dir1 . basename($_FILES["game_logopath"]["name"]);
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["game_logopath"]["tmp_name"]);
if($check !== false)
{
 echo "<script>alert('File is an image -" . $check["mime"] . ".');</script>";
 } 
 else
  {
  echo "<script>alert('File is not an image.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
  }
  
  // Logo - Allow certain file formats
 if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "tif" )
   {
   echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}
   
   //move the file using move_uploaded_file function.
    //If not success transfer, give alert message!
    if (! move_uploaded_file($_FILES["game_logopath"]["tmp_name"], $target_file1)) 
    {
    echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
    die("<script>window.history.go(-1);</script>");
    }
    echo "<script>alert('The file ". basename( $_FILES["game_logopath"]["name"]). " has been uploaded.');</script>";
//Logo-




//-Background Image
$target_dir2 = "gamebackground/";
$target_file2 = $target_dir2 . basename($_FILES["game_backgroundimagepath"]["name"]);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["game_backgroundimagepath"]["tmp_name"]);
if($check !== false)
{
 echo "<script>alert('File is an image -" . $check["mime"] . ".');</script>";
 } 
 else
  {
  echo "<script>alert('File is not an image.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
  }
  
  // Background - Allow certain file formats
 if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg" && $imageFileType2 != "tif" )
   {
   echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}
   
   //move the file using move_uploaded_file function.
    //If not success transfer, give alert message!
    if (! move_uploaded_file($_FILES["game_backgroundimagepath"]["tmp_name"], $target_file2)) 
    {
    echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
    die("<script>window.history.go(-1);</script>");
    }
    echo "<script>alert('The file ". basename( $_FILES["game_backgroundimagepath"]["name"]). " has been uploaded.');</script>";
//Background Image-


//-Main Image
$target_dir3 = "gamephoto/";
$target_file3 = $target_dir3 . basename($_FILES["game_photopath"]["name"]);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
$check = getimagesize($_FILES["game_photopath"]["tmp_name"]);
if($check !== false)
{
 echo "<script>alert('File is an image -" . $check["mime"] . ".');</script>";
 } 
 else
  {
  echo "<script>alert('File is not an image.Please try again!');</script>";
  die("<script>window.history.go(-1);</script>");
  }
  
  // Main Image - Allow certain file formats
 if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg" && $imageFileType3 != "tif" )
   {
   echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}
   
   //move the file using move_uploaded_file function.
    //If not success transfer, give alert message!
    if (! move_uploaded_file($_FILES["game_photopath"]["tmp_name"], $target_file3)) 
    {
    echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
    die("<script>window.history.go(-1);</script>");
    }
    echo "<script>alert('The file ". basename( $_FILES["game_photopath"]["name"]). " has been uploaded.');</script>";
//Main Image-

//-Video
$target_dir4 = "gamevideo/";
$target_file4 = $target_dir4 . basename($_FILES["game_videopath"]["name"]);
$videoFileType = pathinfo($target_file4,PATHINFO_EXTENSION);
  // Video - Allow certain file formats
 if($videoFileType != "mp4" && $videoFileType != "mpeg"  )
   {
   echo "<script>alert('Sorry, only MP4 and MPEG files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}
   
   //move the file using move_uploaded_file function.
    //If not success transfer, give alert message!
    if (! move_uploaded_file($_FILES["game_videopath"]["tmp_name"], $target_file4)) 
    {
    echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
    die("<script>window.history.go(-1);</script>");
    }
    echo "<script>alert('The file ". basename( $_FILES["game_videopath"]["name"]). " has been uploaded.');</script>";
//Video-

//-Download File
$target_dir5 = "gamefiles/";
$target_file5 = $target_dir5 . basename($_FILES["game_downloadpath"]["name"]);
$downloadFileType = pathinfo($target_file5,PATHINFO_EXTENSION);
  // Download File- Allow certain file formats
 if( $downloadFileType != "rar"  )
   {
   echo "<script>alert('Sorry, only MP4 and MPEG files are allowed.Please try again!');</script>";
   die("<script>window.history.go(-1);</script>");}
   
   //move the file using move_uploaded_file function.
    //If not success transfer, give alert message!
    if (! move_uploaded_file($_FILES["game_downloadpath"]["tmp_name"], $target_file5)) 
    {
    echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
    die("<script>window.history.go(-1);</script>");
    }
    echo "<script>alert('The file ". basename( $_FILES["game_downloadpath"]["name"]). " has been uploaded.');</script>";
//Download File



$sql = "UPDATE games SET game_name='$_POST[game_name]', game_category='$_POST[game_category]',
game_price='$_POST[game_price]',game_description='$_POST[game_description]',game_status = 0, game_logopath='$target_file1',
game_backgroundimagepath='$target_file2',game_photopath='$target_file3',game_videopath='$target_file4',game_downloadpath='$target_file5'
WHERE game_ID=$_POST[id];";


if (mysqli_query($con,$sql))
{
  mysqli_close($con);
  header('Location: profile.php');
}
?>
