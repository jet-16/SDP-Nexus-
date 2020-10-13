<?php
include("conn.php");
session_start();
//username and password sent from Form
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$sql="SELECT * FROM users WHERE user_username	='$username' and user_password='$password' and user_status =0";
$result=mysqli_query($con,$sql);


if(mysqli_num_rows($result)<=0)
{
  echo "<script>alert('Wrong username or password.');";
  die("window.history.go(-1);</script>");
}


if($row=mysqli_fetch_array($result))
{
  $_SESSION['name']=$row['user_username'];
  $_SESSION['role']=$row['user_role'];
  $_SESSION['status']=$row['user_status'];
  $_SESSION['id']=$row['user_id'];

}

/*if($_SESSION['status']==="1")
{
  echo "<script>alert('Your account has been disable due to violations to the terms and condition.');</script>";
  echo "<script>window.location.href='login.php';</script>";
}
*/
 if($_SESSION['role']==="customer")
{
  echo "<script>alert('Welcome back ".$_SESSION['name']."');</script>";
  echo "<script>window.location.href='index.php';</script>";
}
else if($_SESSION['role']==="seller")
{
  echo "<script>alert('Welcome back ".$_SESSION['name']."');</script>";
  echo "<script>window.location.href='profile.php';</script>";
}
else if($_SESSION['role']==="admin")
{
  echo "<script>alert('Welcome back ".$_SESSION['name']."');</script>";
  echo "<script>window.location.href='profile.php';</script>";
}

?>
