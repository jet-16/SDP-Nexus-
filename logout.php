<?php
session_start();
echo "<script>alert('You are already logged out. Thank you ".$_SESSION['name']."  ');</script>";


//remove all session variables
session_unset();

//destroy the session
session_destroy();
header("location: index.php");
?>
