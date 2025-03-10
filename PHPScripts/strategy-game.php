<?php
// Database connection
require("dbinit.php");

// Fetch games data from the 9th to the 14th records
$sqlNinthToFourteenth = "SELECT * FROM games LIMIT 26, 6"; // Starting from the 9th record, fetch 6 records
$resultNinthToFourteenth = mysqli_query($conn, $sqlNinthToFourteenth);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strategy Games</title>
    <link rel="stylesheet" href="../CSS/game_cat_style.css">
    <!-- Include Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/popup.css">
    <link rel="stylesheet" href="../CSS/Style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<link rel="stylesheet" href="../CSS/footer.css">
<body style="background-color: black; color: white;">
    <style>
      
 .footer {
    background-color: 	#32CD32; /* Dark background */
    
}
 .logo{
    width: 2%;
    height: 2%;
 }
 .navbar {
    background-color:#32CD32 ;
 }
 /* Navbar text color (links and other text) */
.navbar .nav-link, .navbar-brand {
    color:white; /* Change to your desired color */
}
.bold-white-line {
    border-top: 2px solid white;
    margin: 20px auto; /* Centers the line horizontally */
    width: 50%;
    /* Adjust the width to control the length */
}

 .navbar-nav {
     display: flex;
     justify-content: center;
     align-items: center;
     width: 100%;
 }
 
 /* Spacing between navbar items */
 .nav-item {
     margin: 0 10px;
 }
    </style>


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
           

            <form class="d-flex mx-4" role="search" method="GET" action="search_results.php">
               <input class="form-control me-2" type="search" 
                   placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-light" name="search_game_data">
             </form>
            


             <li class="nav-item">
             <span id="cart-count" class="d-flex" style="margin-left: 60px; position:absolute">0</span>
                <a class="nav-link" href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                    Cart
                </a>
             </li>


            <li class="nav-item">
              <p id = "loginNotifier" style = "color:white; margin:0;">
                Logged in as:
              </p>
            </li>

            <li class = "nav-item">
              <a class="nav-link" href="#" id = "userProfile" style = "margin:0">
              </a>
            </li>

            <li class = "nav-item" id = "lgout">
              <a class="nav-link" href="logout.php" id = "userProfile">
                Log Out
              </a>
            </li>
            

          </ul>
        </div>
      </div>
    </nav>
</div>

<div id = "homePopup" class = "popup"></div>


    <div class="center-text text-center">
        <h1>Strategy Games</h1>
    </div>
    <div class="bold-white-line"></div>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
        <?php
        if (mysqli_num_rows($resultNinthToFourteenth) > 0) {
            while($rowGame = mysqli_fetch_assoc($resultNinthToFourteenth)) {
                echo '
                <div class="col-md-4 mb-4 text-center">
                    <h5 class="game-title">'.$rowGame['game_title'].'</h5>
                    <img src="../admin_area/'.$rowGame['game_image1'].'" alt="Game Image" class="game-image">
                    <p class="game-price"><strong>Price:</strong> $'.$rowGame['game_price'].'</p>
                    <a href="#" class="btn btn-primary mb-2" onclick="addToCart(' . $rowGame['game_id'] . '); return false;">Add to cart</a>
                    <a href="game_details.php?id='.$rowGame['game_id'].'" class="btn btn-secondary mx-2 mb-2">Explore</a>
                </div>';
            }
        } else {
            echo '<p class="text-center">No games found in the specified range.</p>';
        }
        ?>
        </div>
    </div>
   
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src = "../JAVAScripts/userCheck.js"></script>

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

<?php
// Close the database connection
mysqli_close($conn);
?>

