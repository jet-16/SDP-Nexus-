<?php
echo "
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <link rel='stylesheet' href='css/style.css'>
  <link rel='stylesheet' href='css/profile.css'>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>
  <script src='https://kit.fontawesome.com/ac84272c35.js' crossorigin='anonymous'></script>
</head>

<div class='approve-div'>
  <div class='info-div'>
    <h1>Approve Games</h1>
    <form class='search-form' action='approve.php' method='post'>
      <button type='submit' name='button'><i class='fas fa-search'></i></button>
      <input type='text' name='searchbox' placeholder='Search'>
    </form>
    <div class='approve-table-div'>
";
      include("conn.php");
        $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';
        $result = mysqli_query($con, "SELECT DISTINCT * FROM users JOIN games ON users.user_id = games.game_seller WHERE users.user_username LIKE '%" .$search. "%' AND games.game_status = 0");
echo "<table>
        <tr class='table-header-approve'>
          <th style='width: 30%; font-size: 14px;'>Developer</th>
          <th class='center' style='width: 35%; font-size: 14px;'>Title</th>
          <th class='center' style='width: 20%; font-size: 14px;'>Category</th>
          <th class='center' style='width: 15%; font-size: 14px;'>Price</th>
          <th></th>
        </tr>
        ";

          while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='table-records-approve'>";
            echo "<td>";
            echo $row['user_username'];
            echo "</td>";
            echo "<td class='record-title'>";
            echo "<a href=approvegame.php?id=".$row['game_ID']." target=_parent>";
            echo $row['game_name'];
            echo "</a>";
            echo "</td>";
            echo "<td class='center'>";
            echo $row['game_category'];
            echo "</td>";
            echo "<td class='record-price'>RM ";
            echo $row['game_price'];
            echo "</td>";
            echo "</tr>";
          }

echo "
      </table>
    </div>
  </div>
</div>
";
?>
