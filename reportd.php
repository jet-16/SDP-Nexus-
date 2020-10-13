<?php
class Order {
  private $sale = 0;

  public static function getHighesSale(){
    include("conn.php");
    $seller = $_GET['id'];
    $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';
    $result = mysqli_query($con,"SELECT * FROM games WHERE game_name LIKE '%". $search. "%' AND game_seller = $seller ");
    $sale = 0;
    while ($row = mysqli_fetch_array($result)) {

      $gameid = $row['game_ID'];
      $salesre = mysqli_query($con, "SELECT COUNT(purchase_game) AS purchase FROM purchase WHERE purchase_game = $gameid");
      $salesro = mysqli_fetch_assoc($salesre);
      $sales = $salesro['purchase'];
      if($sale<$sales){
        $sale=$sales;

      }
    }
    return $sale;

  }
}




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
    <h1>View Sales</h1>
    <form class='search-form' action='reportd.php?id=". $_GET['id'] ."' method='post'>
      <button type='button' name='button'><i class='fas fa-search'></i></button>
      <input type='text' name='searchbox' placeholder='Search'>
    </form>
    <div class='approve-table-div'>
";
  include("conn.php");
  $seller = $_GET['id'];
  $sales = mysqli_query($con, "SELECT * FROM purchase WHERE purchase_game = game_ID");
  $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';

  $result = mysqli_query($con,"SELECT * FROM games WHERE game_name LIKE '%". $search. "%' AND game_seller = $seller ");

  echo "
      <table>
        <tr class='table-header-approve'>
          <th style='width: 30%'>Title</th>
          <th class='center' style='width: 35%'>Category</th>
          <th class='center' style='width: 20%'>Sales</th>
          <th style='width: 10%'>Rating</th>
          <th></th>
        </tr>
";

$order = new Order;
$sale = $order::getHighesSale();


for ($i = $sale; $i>-1; $i--){

        while ($row = mysqli_fetch_array($result)) {
        $gameid = $row['game_ID'];
        $salesre = mysqli_query($con, "SELECT COUNT(purchase_game) AS purchase FROM purchase WHERE purchase_game = $gameid");
        $salesro = mysqli_fetch_assoc($salesre);
        $sales = $salesro['purchase'];

          if ($i==$sales){

        echo "<tr class='table-records-approve'>";
        echo "<td class='record-title'>";
        echo $row['game_name'];
        echo "</td>";
        echo "<td class='center'>";
        echo $row['game_category'];
        echo "</td>";
        echo "<td class='center'>";
        $gameid = $row['game_ID'];
        $salesre = mysqli_query($con, "SELECT COUNT(purchase_game) AS purchase FROM purchase WHERE purchase_game = $gameid");
        $salesro = mysqli_fetch_assoc($salesre);
        $sales = $salesro['purchase'];
        echo $sales;
        echo "</td>";
        echo "<td class='center'>";
        $re = mysqli_query($con, "SELECT AVG(ratings) AS rate FROM ratings LEFT JOIN games ON ratings.game_ID = games.game_ID WHERE ratings.game_ID = $gameid AND games.game_ID = $gameid");
        $ro = mysqli_fetch_assoc($re);
        $average = $ro['rate'];
        echo round($average);
        echo "</td>";
        echo "</tr>";

          }

        }
        $result = mysqli_query($con,"SELECT * FROM games WHERE game_name LIKE '%". $search. "%' AND game_seller = $seller ");
      }





echo "
      </table>
    </div>
  </div>
</div>
";
?>
