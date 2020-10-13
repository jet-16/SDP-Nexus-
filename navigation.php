<head>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<nav>
  <section class="navbar-section" style="background-color: #252525;">
    <div class="navbar-div">
      <div class="navbar-div-logo">
        <a href="index.php">
          <img href="index.php" class="logo-pic" src="images/logoonly.png" alt="">
          <img class="logo-name" src="images/logonameonly.png" alt="">
        </a>
      </div>
      <ul class="navbar-ul-links">

          <li> <a class="navbar-a-links" href="index.php">home</a> </li>
          <li> <a class="navbar-a-links" href="store.php">store</a> </li>
          <li> <a class="navbar-a-links" href="news.php">news</a> </li>
          <li class="marginright"> <a class="navbar-a-links" href="about.php">about</a> </li>

          <?php

          if (isset($_SESSION['id'])) {
            if ($_SESSION['role'] === "customer") {
              echo  "<li><a href='cart.php' class='dropdown'><i class='fas fa-shopping-bag'></i></li>
                    <li class='dropdown'>
                      <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background-color: transparent; border: none;'>
                        <i class='fas fa-user-alt'></i>
                      </button>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a class='dropdown-item' href='profile.php'>Profile</a>
                        <a class='dropdown-item' href='library.php'>Library</a>
                        <a class='dropdown-item' href='logout.php'>Sign Out</a>
                      </div>
                    </li>
                      ";
            }
            elseif ($_SESSION['role'] === "seller") {
              echo  "<li> <a class='dropdown none' href='gamescreated.php'><i class='fas fa-gamepad'></i></a> </li>
                    <li class='dropdown'>
                      <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background-color: transparent; border: none;'>
                        <i class='fas fa-user-alt'></i>
                      </button>
                      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a class='dropdown-item' href='profile.php'>Profile</a>
                        <a class='dropdown-item' href='logout.php'>Sign Out</a>
                      </div>
                    </li>";
            }
            else  {
              echo  "<li><a href='manage.php' class='dropdown'><i class='fas fa-users'></i></a></li>
                    <li class='dropdown'>
                        <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background-color: transparent; border: none;'>
                          <i class='fas fa-user-alt'></i>
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                          <a class='dropdown-item' href='profile.php'>Profile</a>
                          <a class='dropdown-item' href='logout.php'>Sign Out</a>
                        </div>
                      </li>";
                }

          }
          else {
            echo  "<li><a class='login navbar-a-links' href='login.php'>login</a></li>";
          }
          ?>
          </div>


      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </div>
  </section>
</nav>

<script type="text/javascript">
const slide = () => {

  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.navbar-ul-links');
    burger.addEventListener('click', () => {
      nav.classList.toggle('nav-active');
      burger.classList.toggle('toggle');
    });

}
slide();
</script>
