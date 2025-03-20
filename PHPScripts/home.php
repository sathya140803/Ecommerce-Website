
<?php
require("dbInit.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Shop</title>
    <link rel="icon" type="image/png" href="/logo.jpeg">
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/popup.css">
    <link rel="stylesheet" href="../CSS/triangle.css">
    <link rel="stylesheet" href="../CSS/banner.css">
    <link rel="stylesheet" href="../CSS/search.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<!-- Navbar -->
<!-- Navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg"> 
        <div class="container-fluid">
            <img src="../logo.jpeg" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex align-items-center">
                    <!-- Navbar items -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="puzzel-games.php">Puzzle game</a></li>
                            <li><a class="dropdown-item" href="action-game.php">Action game</a></li>
                            <li><a class="dropdown-item" href="sport-game.php">Sports game</a></li>
                            <li><a class="dropdown-item" href="strategy-game.php">Strategy game</a></li>
                        </ul>
                    </li>

                    <!-- Search Form -->
                    <form class="d-flex mx-4" role="search" method="GET" action="search_results.php">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light" name="search_game_data">
                    </form>

                    <!-- Cart and User Profile -->
                    <li class="nav-item">
                        <span id="cart-count" class="d-flex" style="margin-left: 60px; position:absolute; color:white">0</span>
                        <a class="nav-link" href="cart.php">
                            <i class="fas fa-shopping-cart"></i>
                            Cart
                        </a>
                    </li>
                    <li class="nav-item">
                        <p id="loginNotifier" style="color:white; margin:0;">
                            Logged in as:
                        </p>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="userProfile" style="margin:0"></a>
                    </li>
                    <li class="nav-item" id="lgout">
                        <a class="nav-link" href="logout.php" id="userProfile">
                            Log Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<!-- Search Results Container -->
<div id="search-results-container"></div>
<div id = "homePopup" class = "popup"></div>

<div style="
    background-image: url('/image/god2.jpg'); 
    height: 600px; 
    background-size: cover; 
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;">
        <?php include('../PHPxml/games1.php'); ?>
</div>


<div class="trending-section-wrapper" style="background-image: url('/image/ruby.jpg'); background-size: cover; background-position: center; padding: 20px;">
  
    <h3 style="  
        text-align: center;   
        font-size: 2.5em;   
        color: #ffffff;   
        background: linear-gradient(to right, rgb(29, 209, 29), rgba(0, 0, 0, 1)); /* Forest Green to Black */  
        padding: 20px;   
        border-radius: 10px;   
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);  
        margin: 20px auto;   
        max-width: 600px;  
    ">  
        Top Trending Games  
    </h3>  

    <!-- Triangles -->  
    <div class="triangle-small-left"></div>  
    <div class="triangle-small-right"></div>  

    <?php include('../PHPxml/games2.php'); ?>
</div>

<div class="image-containerr">
  <div class="card-containerr">
    <div class="top-row">
      <div class="cardr-wrapper">
        <h3 class="card-title" style="color:white">Destiny</h3>
        <div class="cardr card1"></div>
      </div>
      <div class="cardr-wrapper">
        <h3 class="card-title" style="color:white">Solo</h3>
        <div class="cardr card2"></div>
      </div>
    </div>
    <div class="bottom-row">
      <div class="cardr-wrapper">
        <h3 class="card-title" style="color:white">Dragon Ball</h3>
        <div class="cardr card3"></div>
      </div>
      <div class="cardr-wrapper">
        <h3 class="card-title" style="color:white">Mario</h3>
        <div class="cardr card4"></div>
      </div>
    </div>
  </div>
</div>

<div class="trending-section-wrapper" style="background-image: url('/image/spot.jpg'); background-size: cover; background-position: center; padding: 20px;">
    <h3 style="  
        text-align: center;   
        font-size: 2.5em;   
        color: #ffffff;   
        background: linear-gradient(to right, rgb(29, 209, 29), rgb(43, 14, 207)); /* Forest Green to Black */  
        padding: 20px;   
        border-radius: 10px;   
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);  
        margin: 20px auto;   
        max-width: 600px;  
    ">  
        Bestsellers
    </h3>  
    <?php include('../PHPxml/games3.php'); ?>
</div>

<?php require('carousel.php') ?>

<footer class="footer">
    <div class="container">
        <p>&copy; 2024 Game Shop. All Rights Reserved.</p>
        <p>
            <a href="term_of_service.html">Terms of service</a> 
            <a href="aboutus.html">Policy</a> 
            <a href="connect.html">Contact Us</a>
        </p>
    </div>
</footer>

<script src = "../JAVAScripts/userCheck.js"></script>
<script src = "../JAVAScripts/triangle.js"></script>
<script src = "../JAVAScripts/search.js"></script>


<!-- Bootstrap JS Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script for Cart -->
  <script src = "../JAVAScripts/cart.js"></script>
  <script>
    updateCartIcon();
    (function () {
      window.onpageshow = function(event) {
          if (event.persisted) {
              window.location.reload();
          }
      };
    })();
  </script>
</body>
</html>

<?php $conn->close(); ?>