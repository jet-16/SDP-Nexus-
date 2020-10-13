<?php
include("conn.php");

session_start();

$sql = "UPDATE games SET game_status = 1 WHERE game_ID = $_GET[id]";
$approve = 1;


if (mysqli_query($con, $sql)) {
  mysqli_close($con);
  header('Location: profile.php');
}

?>
