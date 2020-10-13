<?php
include("conn.php");
session_start();

$sid = $_SESSION['id'];
$pword = mysqli_real_escape_string($con, $_POST['password']);
$rpword = mysqli_real_escape_string($con, $_POST['password-repeat']);

$username = mysqli_real_escape_string($con, $_POST['username']);
$target_dir1 = "profilepic/";
//the basename($_FILES["photo"]["name"]) means to get the basename (e.g. test.docx)from the file path (e.g. D://images/test.docx)
$sql="SELECT * FROM users WHERE user_username='$username'";
$result2=mysqli_query($con,$sql);

if ($username != $_SESSION['name']) {
  if(mysqli_num_rows($result2)>0)
  {
    echo "<script>alert('This username already exist.');";
    die("window.history.go(-1);</script>");
  }
}


if (!empty($_FILES['photo']['tmp_name'] ) ){
       //the basename($_FILES["photo"]["name"]) means to get the basename (e.g. test.docx)from the file path (e.g. D://images/test.docx)
        $target_file1 = $target_dir1 . basename($_FILES["photo"]["name"]);
        //to get the extension of the file (e.g. docx)
        $imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
        if (isset($_POST["photo"])){
          echo "$_POST[photo]";
        }
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);


        if($check !== false)
        {
         echo "<script>alert('File is an image -" . $check["mime"] . ".');</script>";
         }
         else
          {
          echo "<script>alert('File is not an image.Please try again!');</script>";
          die("<script>window.history.go(-1);</script>");
          }

          // Allow certain file formats
          if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif" )
           {
           echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.Please try again!');</script>";
           die("<script>window.history.go(-1);</script>");
         }

           //move the file using move_uploaded_file function.
            //If not success transfer, give alert message!
            if (! move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file1))
            {
            echo "<script>alert('Unable to upload photo.Thus, data will not be inserted to database. Please try again!');</script>";
            die("<script>window.history.go(-1);</script>");
            }
            echo "<script>alert('The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.');</script>";

            //check the password is same as confirmed password or not?
            if($pword !== $rpword)
            {
              echo "<script>alert('Password and confirm password are not same.');";
              die("window.history.go(-1);</script>");
            }

          $sql = "UPDATE users SET user_username='$_POST[username]', user_email='$_POST[email]',user_password='$pword',user_gender='$_POST[gender]', user_photopath='$target_file1' where user_id =$sid";


}

else {

  if($pword !== $rpword)
  {
    echo "<script>alert('Password and confirm password are not same.');";
    die("window.history.go(-1);</script>");
  }
  $sql = "UPDATE users SET user_username='$_POST[username]', user_email='$_POST[email]',user_password='$pword',user_gender='$_POST[gender]', user_contact='$_POST[contact]' where user_id =$sid";

}
   if (mysqli_query($con,$sql)) {
      mysqli_close($con);
      header('Location:profile.php');
   }
?>
