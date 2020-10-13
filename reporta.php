<?php

class Order {
  private $sale = 0;

  public static function getCustHighesSale(){
    include("conn.php");

    $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';
    $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
    $sale = 0;
    while ($row = mysqli_fetch_array($result)) {
      $cust = $row['purchase_customer'];

      $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
      $salesro = mysqli_fetch_assoc($countresult);
      $sales = $salesro['count'];
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

<div class='reporta-div'>
  <div class='info-div'>
    <h1>View Customer Purchases</h1>
    <div class='approvea-div'>
    <form class='dropdown-form' action='reporta.php' method='post'>
      <div class='dropdown dropdown-div'>
        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background-color: transparent; border: none; color: black'>
          Filter
        </button>
        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
          <button class='dropdown-item' type='submit' name='filter' value='desc'>Most Purchases</button>
          <button class='dropdown-item' type='submit' name='filter' value='asc'>Least Purchases</button>
        </div>
      </div>
    </form>
      <form class='search-form' action='reporta.php' method='post'>
        <button type='submit' name='button'><i class='fas fa-search'></i></button>
        <input type='text' name='searchbox' placeholder='Search'>
      </form>
    </div>
    <div class='approve-table-div'>
    ";

      include("conn.php");


    $search=isset($_POST['searchbox']) ? $_POST['searchbox']: '';


    echo "<table>
        <tr class='table-header-approve'>
          <th style='width: 30%; font-size: 14px;'>Username</th>
          <th class='center' style='width: 30%; font-size: 14px;'>Top Up Total</th>
          <th class='center' style='width: 15%; font-size: 14px;'>Purchases</th>
          <th class='center' style='width: 25%; font-size: 14px;'>Recent Purchase</th>
          <th></th>
        </tr>

";
if (isset($_POST['filter'])) {
  switch ($_POST['filter']) {
       case 'asc':
        {
          $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
          $order = new Order;
          $sale = $order::getCustHighesSale();
          for ($i = 0; $i<=$sale; $i++){
            while ($row = mysqli_fetch_array($result)) {
              $cust = $row['purchase_customer'];
              $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
              $countrow = mysqli_fetch_assoc($countresult);
              $count = $countrow['count'];
              if ($i== $count){
              echo "<tr class='table-records-approve'>";
              echo "<td>";
              $uid = $row['purchase_customer'];
              $name = mysqli_query($con, "SELECT * FROM users WHERE user_id = $uid");
              $nname = mysqli_fetch_assoc($name);
              echo $nname['user_username'];
              echo "</td>";
              echo "<td class='center'>RM";
              $cust = $row['purchase_customer'];
              $sumresult = mysqli_query($con, "SELECT SUM(purchase_customer) AS sum FROM purchase WHERE purchase_customer = $cust");
              $sumrow = mysqli_fetch_assoc($sumresult);
              $sum = $sumrow['sum'];
              echo $sum;
              echo "</td>";
              echo "<td class='center'>";
              $cust = $row['purchase_customer'];
              $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
              $countrow = mysqli_fetch_assoc($countresult);
              $count = $countrow['count'];
              echo $count;
              echo "</td>";
              echo "<td class='center'>";
              $cust = $row['purchase_customer'];
              $dateresult = mysqli_query($con, "SELECT MAX(purchase_date) AS maxdate FROM purchase WHERE purchase_customer = $cust");
              $daterow = mysqli_fetch_assoc($dateresult);
              $date = $daterow['maxdate'];
              echo $date;
              echo "</td>";
              echo "</tr>";
            }
          }
          $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
        }


       }
           break;
       case 'desc':
        {
          $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
          $order = new Order;
          $sale = $order::getCustHighesSale();
          for ($i = $sale; $i>-1; $i--){
                    while ($row = mysqli_fetch_array($result)) {
                      $cust = $row['purchase_customer'];
                      $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
                      $countrow = mysqli_fetch_assoc($countresult);
                      $count = $countrow['count'];
                      if ($i== $count){
                      echo "<tr class='table-records-approve'>";
                      echo "<td>";
                      $uid = $row['purchase_customer'];
                      $name = mysqli_query($con, "SELECT * FROM users WHERE user_id = $uid");
                      $nname = mysqli_fetch_assoc($name);
                      echo $nname['user_username'];
                      echo "</td>";
                      echo "<td class='center'>RM";
                      $cust = $row['purchase_customer'];
                      $sumresult = mysqli_query($con, "SELECT SUM(purchase_customer) AS sum FROM purchase WHERE purchase_customer = $cust");
                      $sumrow = mysqli_fetch_assoc($sumresult);
                      $sum = $sumrow['sum'];
                      echo $sum;
                      echo "</td>";
                      echo "<td class='center'>";
                      $cust = $row['purchase_customer'];
                      $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
                      $countrow = mysqli_fetch_assoc($countresult);
                      $count = $countrow['count'];
                      echo $count;
                      echo "</td>";
                      echo "<td class='center'>";
                      $cust = $row['purchase_customer'];
                      $dateresult = mysqli_query($con, "SELECT MAX(purchase_date) AS maxdate FROM purchase WHERE purchase_customer = $cust");
                      $daterow = mysqli_fetch_assoc($dateresult);
                      $date = $daterow['maxdate'];
                      echo $date;
                      echo "</td>";
                      echo "</tr>";
                    }
                  }
                  $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
                }
       }
           break;
   }
}
else {
 $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
 $order = new Order;
 $sale = $order::getCustHighesSale();
 for ($i = $sale; $i>-1; $i--){
           while ($row = mysqli_fetch_array($result)) {
             $cust = $row['purchase_customer'];
             $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
             $countrow = mysqli_fetch_assoc($countresult);
             $count = $countrow['count'];
             if ($i== $count){
             echo "<tr class='table-records-approve'>";
             echo "<td>";
             $uid = $row['purchase_customer'];
             $name = mysqli_query($con, "SELECT * FROM users WHERE user_id = $uid");
             $nname = mysqli_fetch_assoc($name);
             echo $nname['user_username'];
             echo "</td>";
             echo "<td class='center'>RM";
             $cust = $row['purchase_customer'];
             $sumresult = mysqli_query($con, "SELECT SUM(purchase_customer) AS sum FROM purchase WHERE purchase_customer = $cust");
             $sumrow = mysqli_fetch_assoc($sumresult);
             $sum = $sumrow['sum'];
             echo $sum;
             echo "</td>";
             echo "<td class='center'>";
             $cust = $row['purchase_customer'];
             $countresult = mysqli_query($con, "SELECT COUNT(purchase_customer) AS count FROM purchase WHERE purchase_customer = $cust");
             $countrow = mysqli_fetch_assoc($countresult);
             $count = $countrow['count'];
             echo $count;
             echo "</td>";
             echo "<td class='center'>";
             $cust = $row['purchase_customer'];
             $dateresult = mysqli_query($con, "SELECT MAX(purchase_date) AS maxdate FROM purchase WHERE purchase_customer = $cust");
             $daterow = mysqli_fetch_assoc($dateresult);
             $date = $daterow['maxdate'];
             echo $date;
             echo "</td>";
             echo "</tr>";
           }
         }
         $result = mysqli_query($con,"SELECT DISTINCT purchase_customer FROM purchase join users on users.user_id = purchase.purchase_customer where users.user_username like '%" .$search. "%'");
       }
}



echo "
      </table>
    </div>
  </div>
</div>
";
?>
