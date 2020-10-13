<?php
session_start();
echo "
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='css/style.css'>
  <link rel='stylesheet' href='css/profile.css'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>
  <script src='https://kit.fontawesome.com/ac84272c35.js' crossorigin='anonymous'></script>
</head>

<div class=''>
  <div class='info-div'>
    <h1>Games Created</h1>
    <form class='search-form' action='games.php' method='post'>
      <button type='submit' name='button'><i class='fas fa-search'></i></button>
      <input type='text' name='searchbox' placeholder='Search'>
    </form>
    <div class='approve-table-div'>
";

  include("conn.php");
  $sid = $_SESSION['id'];
  $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';
  $result=mysqli_query($con, "SELECT * FROM games JOIN users ON users.user_id = games.game_seller WHERE game_name LIKE '%". $search. "%' AND games.game_seller = $sid");

    echo "
        <table>
      <tr class='table-header-games'>
        <th style='width: 100px'></th>
        <th style='width: 30%'>Title</th>
        <th>Released</th>
        <th>Price</th>
        <th>Rating</th>
        <th>Status</th>
        <th class='table-button'>Delete</th>
      </tr>
    ";

                //get the number of rows fetched
                //$result means the whole table
                //$row means read the row one by one referring to the id
                //while is for looping the same process in the next row if next row have data

  while($row = mysqli_fetch_array($result))
                 {
                   if ($row['game_status'] == 2)
                   {
                     $status = "Rejected";
                   }

                   if ($row['game_status'] == 1)
                   {
                     $status = "Approved";
                   }

                   else if ($row['game_status'] == 0)
                   {
                     $status = "Pending";
                   }


                   echo "<td><img src='".$row['game_photopath']."' width='100px' height='100px'/></td>";
                   echo "<td class='game-title'>";
                   echo $row['game_name'];
                   echo "</td>";
                   echo "<td class='center'>";
                   echo $row['game_releasedate'];
                   echo "</td>";
                   echo "<td class='center'>RM";
                   echo $row['game_price'];
                   echo "</td>";
                   echo "<td class='center'>";
                   $gameid = $row['game_ID'];
                   $rating = mysqli_query($con, "SELECT AVG(ratings) AS average FROM ratings WHERE game_ID = $gameid  ");
                   $r = mysqli_fetch_assoc($rating);
                   $average =  round($r['average']);
                   echo $average;
                   echo "</td>";
                   echo "<td class='center'>";
                   echo $status;
                   echo "</td>";
                   //passing the row(id) selected into id="
                   echo "<td class='table-button'><a href=\"delete(games).php?id=";
                   echo $row['game_ID'];
                   echo "\" onClick=\"return confirm('Delete ";
                   echo $row['game_name'];
                   echo " details?'); target=_parent\"><i class='fas fa-trash-alt' style='color: #FF4444; font-size: 20px;'></i></a></td></tr>";
                 }

    echo "
            </table>
        </div>
      </div>
    </div>
    ";
?>
