<?php
include ("conn.php");

//intval - get the integer value of a variable
//intval-convert string to integer
$id = intval($_GET['id']);
$result = mysqli_query($con,"DELETE FROM games WHERE game_ID=$id");

//close database connection
mysqli_close($con);
header('Location: games.php');
?>
