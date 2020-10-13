<?php
include("conn.php");

//retrieve data from register.html
if (!isset($_POST['gender']))
{

  echo "<script>alert('Please choose your gender');";
  die("window.history.go(-1);</script>");

}

$email = mysqli_real_escape_string($con, $_POST['email']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$confirmpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
$contact = mysqli_real_escape_string($con, $_POST['contact']);

$sql="SELECT * FROM users WHERE user_email='$email'";
$result=mysqli_query($con,$sql);
$sql="SELECT * FROM users WHERE user_username='$username'";
$result2=mysqli_query($con,$sql);


if(mysqli_num_rows($result)>0)
{
  echo "<script>alert('This email has been used to create an account.');";
  die("window.history.go(-1);</script>");
}

if(mysqli_num_rows($result2)>0)
{
  echo "<script>alert('This username already exist.');";
  die("window.history.go(-1);</script>");
}

if(ctype_digit(trim((string) $_POST['contact']))==false)
{
  echo "<script>alert('Contact should only contain digits');";
  die("window.history.go(-1);</script>");
}

//check the password is same as confirmed password or not?
if($password !== $confirmpassword)
{
  echo "<script>alert('The passwords you've entered does not match!');";
  die("window.history.go(-1);</script>");
}
//Write the insert statement in the $sql variable and execute it.
$sql="INSERT INTO users(user_username,user_email, user_password,user_gender, user_role,user_contact) VALUES('$username','$email','$password','$gender','admin','$contact')";

if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}
mysqli_close($con);

echo "<script>alert('Registration successful.');";
echo "window.location.href='profile.php';</script>";
?>
