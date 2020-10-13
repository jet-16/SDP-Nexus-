<?php
include("conn.php");
session_start();

$game = $_GET['id'];
$user = $_SESSION['id'];
$uid = intval($_POST['uid']);
$gid = intval($_POST['gid']);
$comment = $_POST['comment'];
$result = "SELECT * FROM comments WHERE game_id = $game AND user_ID = $user";
$select = mysqli_query($con, $result);

  if (mysqli_num_rows($select) === 0) {
    $insert = mysqli_query($con, "INSERT INTO comments(user_ID, game_id, comment) VALUES ('$uid', '$gid', '$comment')");
  }

  if (mysqli_num_rows($select) > 0) {
    $update = mysqli_query($con, "UPDATE comments SET comment = '$comment' WHERE game_id = $game AND user_ID = $user");
  }

mysqli_close($con);
echo "<script>window.history.go(-1);</script>";



?>
