<?php
echo "
<head>
  <meta charset'utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='css/style.css'>
  <link rel='stylesheet' href='css/manage.css'>
  <script src='https://kit.fontawesome.com/ac84272c35.js' crossorigin='anonymous'></script>
</head>
<div class='dev-div'>
  <div class='info-div'>
    <h1>developer</h1>
    <form action='developer.php' method='post'>
      <button type='submit' name='button'><i class='fas fa-search'></i></button>
      <input type='text' name='searchboxs' placeholder='Search'>
    </form>
";
          include("conn.php");
          $searchs=isset($_POST['searchboxs']) ? $_POST['searchboxs']: '';
          {
            $result=mysqli_query($con,"SELECT * FROM users WHERE user_username LIKE '%". $searchs. "%'and user_role = 'seller'");
echo "
    <table>
      <tr class='table-header-games'>
        <th style='width: 20%'>Username</th>
        <th class='center' style='width: 35%'>Email</th>
        <th class='center' style='width: 30%'>Contact</th>
        <th class='center' style='width: 5%'>Gender</th>
        <th class='table-button'>Delete</th>
      </tr>
";
           while($row = mysqli_fetch_array($result))
            {
                echo "<tr class='table-records-games'>";
                echo "<td 'game-title'>";
                echo $row['user_username'];
                echo "</td>";
                echo "<td class='center'>";
                echo $row['user_email'];
                echo "</td>";
                echo "<td class='center'>";
                echo $row['user_contact'];
                echo "<td class='center'>";
                echo $row['user_gender'];
                echo "</td>";
                //passing the row(id) selected into id="
                echo "<td class='table-button'><a href=\"delete(seller).php?id=";
                echo $row['user_id'];
                echo "\" onClick=\"return confirm('Delete ";
                echo $row['user_username'];
                echo " details?');\" target=_parent><i class='fas fa-trash-alt'></a></td></tr>";
                }
              }
            mysqli_close($con); //to close the database connection
echo "
    </table>
  </div>
</div>
";
?>
