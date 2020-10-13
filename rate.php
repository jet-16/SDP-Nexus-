<?php
include("conn.php");
session_start();

$game = $_GET['id'];
$user = $_SESSION['id'];
$uid = intval($_POST['uid']);
$gid = intval($_POST['gid']);
$rate = $_POST['rating'];
$result = "SELECT * FROM ratings WHERE game_ID = $game AND user_id = $user";
$select = mysqli_query($con, $result);

  if (mysqli_num_rows($select) === 0) {
    $insert = mysqli_query($con, "INSERT INTO ratings(game_ID, user_id, ratings) VALUES ('$gid', '$uid', '$rate')");
  }

  if (mysqli_num_rows($select) > 0) {
    $update = mysqli_query($con, "UPDATE ratings SET ratings = '$rate' WHERE game_ID = $game AND user_id = $user");
  }

mysqli_close($con);
echo "<script>window.history.go(-1);</script>";

?>
