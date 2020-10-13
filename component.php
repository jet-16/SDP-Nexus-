<?php

function component($game_name, $game_price, $game_ID,$game_photopath,$game_videopath,$game_seller,$game_releasedate,$page){
  include("conn.php");

  if (!isset ($_SESSION['id'])){

    $element = "
    <form action=$page method=\"post\">
      <div class=\"allgames\">
        <img src=$game_photopath >
        <div class=\"pricetag-div\">
          <h5 class=\"discount\">RM$game_price</h6>
        </div>
        <a href=\"product.php?id=$game_ID\"><div class=\"allgames-info\">
        <a href=\"product.php?id=$game_ID\"><video src=\"$game_videopath\"  autoplay loop muted></video></a>
        <a href=\"product.php?id=$game_ID\"><p>$game_name</p></a>
        <div class=\"developer-div\">
          <h3>Developer: </h3><h4>$game_seller</h4>
        </div>

        <button type=\"submit\" name=\"add\">

          <i class=\"fas fa-shopping-bag\"><i class=\"fas fa-plus\"></i></i>

          <span class=\"tip\">Add to Cart</span>

        </button>
        <input type='hidden' name='game_ID' value='$game_ID'>



        </div></a>
      </div>
    </form>
    ";
    echo $element;


  }

  else {
    $CID = $_SESSION['id'];
    $sql="SELECT * FROM purchase WHERE purchase_customer	='$CID' and purchase_game='$game_ID'";


    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
      $element = "
        <form action=\"library.php\" method=\"post\">
          <div class=\"allgames\">
            <img src=$game_photopath >
            <div class=\"pricetag-div\">
              <h5 class=\"discount\">RM$game_price</h6>
            </div>
            <a href=\"product.php?id=$game_ID\"><div class=\"allgames-info\">
            <a href=\"product.php?id=$game_ID\"><video src=\"$game_videopath\"  autoplay loop muted></video></a>
            <a href=\"product.php?id=$game_ID\"><p>$game_name</p></a>
            <div class=\"developer-div\">
              <h3>Developer: </h3><h4>$game_seller</h4>
            </div>

            <button class='download' type=\"submit\" name=\"add\">

              <i class='fas fa-download'></i>
              <span class=\"tip\">Download</span>

            </button>




            </div></a>
          </div>
        </form>
        ";
    echo $element;



  }
  else {

      if(!isset($_SESSION['cart'])){
        $element = "
        <form action=$page method=\"post\">
          <div class=\"allgames\">
            <img src=$game_photopath >
            <div class=\"pricetag-div\">
              <h5 class=\"discount\">RM$game_price</h6>
            </div>
            <a href=\"product.php?id=$game_ID\"><div class=\"allgames-info\">
            <a href=\"product.php?id=$game_ID\"><video src=\"$game_videopath\"  autoplay loop muted></video></a>
            <a href=\"product.php?id=$game_ID\"><p>$game_name</p></a>
            <div class=\"developer-div\">
              <h3>Developer: </h3><h4>$game_seller</h4>
            </div>

            <button type=\"submit\" name=\"add\">

              <i class=\"fas fa-shopping-bag\"><i class=\"fas fa-plus\"></i></i>

              <span class=\"tip\">Add to Cart</span>

            </button>
            <input type='hidden' name='game_ID' value='$game_ID'>



            </div></a>
          </div>
        </form>
        ";
    echo $element;


    }

    else {

      If (empty($_SESSION['cart'])){

      $element = "
        <form action=$page method=\"post\">
          <div class=\"allgames\">
            <img src=$game_photopath >
            <div class=\"pricetag-div\">
              <h5 class=\"discount\">RM$game_price</h6>
            </div>
            <a href=\"product.php?id=$game_ID\"><div class=\"allgames-info\">
            <a href=\"product.php?id=$game_ID\"><video src=\"$game_videopath\"  autoplay loop muted></video></a>
            <a href=\"product.php?id=$game_ID\"><p>$game_name</p></a>
            <div class=\"developer-div\">
              <h3>Developer: </h3><h4>$game_seller</h4>
            </div>

            <button type=\"submit\" name=\"add\">

              <i class=\"fas fa-shopping-bag\"><i class=\"fas fa-plus\"></i></i>
              <span class=\"tip\">Add to Cart</span>

            </button>
            <input type='hidden' name='game_ID' value='$game_ID'>



            </div></a>
          </div>
        </form>
        ";
      echo $element;


      }

      else {

        $item_array_id = array_column($_SESSION['cart'], "game_ID");

        if(in_array($game_ID, $item_array_id)){

          foreach ($_SESSION['cart'] as $key => $value){

            if($value["game_ID"] == $game_ID){

            $element = "
                <form action=\"cart.php\" method=\"post\">
                  <div class=\"allgames\">
                    <img src=$game_photopath >
                    <div class=\"pricetag-div\">
                      <h5 class=\"discount\">RM$game_price</h6>
                    </div>
                    <a href=\"product.php?id=$game_ID\"><div class=\"allgames-info\">
                    <a href=\"product.php?id=$game_ID\"><video src=\"$game_videopath\"  autoplay loop muted></video></a>
                    <a href=\"product.php?id=$game_ID\"><p>$game_name</p></a>
                    <div class=\"developer-div\">
                      <h3>Developer: </h3><h4>$game_seller</h4>
                    </div>

                    <button type=\"submit\" name=\"add\" style=\"background-color: #091727\">
                    <i class=\"fas fa-shopping-bag\"></i>
                    <span class=\"tip\">Go to Cart</span>
                    </button>


                    </div></a>
                  </div>
                </form>
                ";
                echo $element;
              }

            }
          }
          else if(!in_array($game_ID, $item_array_id)) {
            echo $game_ID;


              $element = "
                <form action=$page method=\"post\">
                  <div class=\"allgames\">
                    <img src=$game_photopath >
                    <div class=\"pricetag-div\">
                      <h5 class=\"discount\">RM$game_price</h6>
                    </div>
                    <a href=\"product.php?id=$game_ID\"><div class=\"allgames-info\">
                    <a href=\"product.php?id=$game_ID\"><video src=\"$game_videopath\"  autoplay loop muted></video></a>
                    <a href=\"product.php?id=$game_ID\"><p>$game_name</p></a>
                    <div class=\"developer-div\">
                      <h3>Developer: </h3><h4>$game_seller</h4>
                    </div>

                    <button type=\"submit\" name=\"add\">

                      <i class=\"fas fa-shopping-bag\"><i class=\"fas fa-plus\"></i></i>
                      <span class=\"tip\">Add to Cart</span>

                    </button>
                    <input type='hidden' name='game_ID' value='$game_ID'>



                    </div></a>
                  </div>
                </form>
                ";
              echo $element;


          }
        }
      }
    }
  }
}


function cartElement($game_name, $game_price, $game_ID,$game_backgroundimagepath,$game_logopath,$game_seller,$game_releasedate){
    include("conn.php");
    $rating = mysqli_query($con, "SELECT AVG(ratings) AS average FROM ratings WHERE game_ID = $game_ID");
    $r = mysqli_fetch_assoc($rating);
    $average =  round($r['average']);
    $element = "


    <form class=\"itemform\" action=\"cart.php?action=remove&id=$game_ID\" method=\"post\"
    data-aos=\"fade-right\"
    data-aos-offset=\"-1000\"
    data-aos-delay=\"0\"
    data-aos-duration=\"0\"
    data-aos-easing=\"ease-in-out\"
    data-aos-mirror=\"true\"
    data-aos-once=\"true\"
    data-aos-anchor-placement=\"top-center\">
    <div class=\"cart-items-div\">

         <!-- Game Image -->
         <div class=\"img-div\">
            <img class=\"bgimg\" src=$game_backgroundimagepath >
            <img class=\"logoimg\" src=$game_logopath >
         </div>

         <div class=\"description-div\">
           <div class=\"description\">

             <!-- Game Name -->
             <h2 class=\"game-title\">$game_name</h2>

             <!-- Remove Game From Cart Button -->
             <button type=\"submit\"  name=\"remove\"><i class=\"fas fa-trash-alt\" style=\"color: #FF4444\"></i></button>


           </div>


             <!-- Game Description -->
             <div class=\"d\">
               <div class=\"details\">
                 <h2>overall reviews:</h2>
                 <h2>release date:</h2>
               </div>
               <div class=\"game-details\">
                 <h2 style=\"color: #4B86B4;\">$average</h2>
                 <h2 style=\"color: white;\">$game_releasedate</h2>
               </div>
             </div>

           <div class=\"button-div\">


             <!-- Purchase Game -->
              <a href= \"checkout.php?id=".$game_ID.";\"><button class=\"purchase\" button type=\"button\">Purchase</button></a>

             <!-- Price -->
             <h3 style=\"border-right: none;\">RM $game_price</h3>

           </div>
         </div>

       </div>
    </form>

    ";
    echo  $element;
}
