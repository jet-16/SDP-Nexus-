<?php
include("conn.php");
session_start();

$gid = mysqli_real_escape_string($con,$_POST['ID']);

  if (null!==$_POST['ID']){
   foreach ($_SESSION['cart'] as $key => $value){
       if($value["game_ID"] == $_POST['ID']){
           unset($_SESSION['cart'][$key]);

       }
   }
  }


date_default_timezone_set('asia/kuala_lumpur');
  //get game id from url

$sid = $_SESSION['id'];
$date= date("Y-m-d");
$time= date("h:i:s");
$receipt = $sid.$gid;

$sql="SELECT * FROM purchase WHERE purchase_customer	='$sid' and purchase_game='$gid'";
$result=mysqli_query($con,$sql);


if(mysqli_num_rows($result)>0)
{
 echo "<script>alert('Game is already purchased.');";
 echo "window.location.href='Thankyou.php?id=$gid';</script>";
}

else{
$result = mysqli_query ($con,"Select * from games where game_id=$gid");


while($row = mysqli_fetch_array($result))
{ $price = $row['game_price'];



$sql="INSERT INTO purchase(purchase_customer,purchase_game, purchase_price,purchase_receipt,purchase_date,purchase_time) VALUES($sid,$gid,'$price','$receipt','$date','$time')";

if (!mysqli_query($con,$sql))
{
 die('Error: ' . mysqli_error($con));
}

mysqli_close($con);

echo "<script>alert('Purchase successful.');";
echo "window.location.href='Thankyou.php?id=$gid';</script>";
}
}
?>
