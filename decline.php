<?php
  include("conn.php");

  $sql = "UPDATE games SET game_status = 2 WHERE game_ID = $_GET[id]";

  if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: profile.php');
  }

?>
