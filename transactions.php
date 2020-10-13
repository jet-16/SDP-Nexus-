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

<div class=''>
  <div class='info-div'>
    <h1>Transaction History</h1>
    <form class='search-form' action='transactions.php?id=". $_GET['id'] ."' method='post'>
      <button type='submit' name='button'><i class='fas fa-search'></i></button>
      <input type='text' name='searchbox' placeholder='Search'>
    </form>
    <div class='transaction-table-div'>
";

      include("conn.php");
      $sid = $_GET['id'];
      $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';
      $result=mysqli_query($con,"SELECT * FROM purchase join games on games.game_ID = purchase.purchase_game WHERE game_name LIKE '%". $search. "%' AND purchase.purchase_customer =$sid ORDER BY purchase_date DESC");

echo "
      <table>
        <tr class='table-header-transaction'>
          <th style='width: 65%'>Title</th>
          <th style='width: 10%; text-align: center;'>Price</th>
          <th style='width: 20%; text-align: center;'>Date</th>
        </tr>
";

       while($row = mysqli_fetch_array($result))
        {
            echo "<tr class='table-records-transaction'>";
            echo "<td class='record-title'>";
            echo $row['game_name'];
            echo "</td>";
            echo "<td class='record-price'>RM";
            echo $row['purchase_price'];
            echo "</td>";
            echo "<td 'record-date' class='text-align: center !important;'>";
            echo $row['purchase_date'];
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
