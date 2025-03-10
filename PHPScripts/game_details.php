
<?php
// Database connection
require("dbInit.php");
// Get the game ID from the URL
$game_id = $_GET['id'];

// Fetch game details from the database
$sql = "SELECT * FROM games WHERE game_id = $game_id";
$result = mysqli_query($conn, $sql);

// Check if the game exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Game not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($row['game_title']); ?> - Game Details</title>
    <link rel="stylesheet" href="../CSS/d.css">
    <link rel="stylesheet" href="../CSS/popup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="//ajax.googleapis.com/ajax/libs/
    jquery/1.9.1/jquery.min.js"></script>

    
    <style>


        body {
            background-image: url('../image/back.avif');
            background-size: cover;
            background-position: center;
        }
        .footer {
    background-color: #32CD32; /* Dark background */
                }
        .description-text {
            color: white;
        }
        .bold-white-line {
            border-top: 2px solid white;
            margin: 20px 0;
        }
        .leftimg {
            
            width: 75%; /* Adjust width as needed */
            max-width: 400px; /* Maximum width */
            height: auto;
            border-radius: 10px; /* Adjust border radius */
            border: 2px solid white; /* Optional: Add border */
        }
        .custom-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<style>
        .navbar {
    background-color:rgba(7, 37, 76, 0.866) ;
 }
 .logo{
    width: 2%;
    height: 2%;
 }
 /* Navbar text color (links and other text) */
.navbar .nav-link, .navbar-brand {
    color:white; /* Change to your desired color */
}
.bold-white-line {
    border-top: 2px solid white;
    margin: 20px auto; /* Centers the line horizontally */
    width: 100%;
    /* Adjust the width to control the length */
}
.navbar {
    background-color:#32CD32 ;
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



<!-- Navbar -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg"> 
      <div class="container-fluid">
        <img src="logo.jpeg" alt="" class="logo">
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
                <li><a class="dropdown-item" href="puzzel-games.php">Puzzel game</a></li>
                <li><a class="dropdown-item" href="#">Strategy game</a></li>
                <li><a class="dropdown-item" href="#">Sports game</a></li>
                <li><a class="dropdown-item" href="#">Puzzel game</a></li>
              </ul>
            </li>

            <li class="nav-item">
               <a href="cart.php" class="icon nav-link">
                 <i class="bx bx-cart" style="font-size: 1.5rem;"></i>
                    <!-- Updated: Added span to display the cart count -->
                 <span id="cart-count" class="d-flex" style="margin-left: 5px;">0</span>
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



<div class="container mt-3">
    <div class="row">
        <!-- Left side: Image 1, description, and "Add to Cart" button -->
        <div class="col-md-6 text-center">
            <img src="../admin_area/<?php echo htmlspecialchars($row['game_image1']); ?>" class="img-fluid leftimg" alt="Game Image 1">
            <p class="description-text"><strong>Description:</strong> <?php echo htmlspecialchars($row['game_description']); ?></p>
            <button onclick="addToCart(<?php echo $game_id; ?>)" class="btn btn-primary mb-3">Add to Cart</button>
        </div>
        
        <!-- Right side: Title, long description, other details, and images -->
        <div class="col-md-6">
            <h1 style="color:white;"><?php echo htmlspecialchars($row['game_title']); ?></h1>
            <!-- Horizontal line -->
            <div class="bold-white-line"></div>
            <p class="description-text"><strong></strong> <span class="description-text"><?php echo htmlspecialchars($row['long_description']); ?></span></p>
            <!-- Horizontal line -->
            <div class="bold-white-line"></div>
            <!-- Details side by side -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <p class="description-text"><strong>Rating:</strong> <?php echo htmlspecialchars($row['rating']); ?> stars</p>
                </div>
                <div class="col-md-6">
                    <p class="description-text"><strong>Size:</strong> <?php echo htmlspecialchars($row['size']); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="description-text"><strong>Company:</strong> <?php echo htmlspecialchars($row['company']); ?></p>
                </div>
                <div class="col-md-6">
                    <p class="description-text"><strong>Age Restriction:</strong> <?php echo htmlspecialchars($row['age_restriction']); ?></p>
                </div>
                <div class="col-md-12">
                    <p class="description-text"><strong>Platforms:</strong> <?php echo htmlspecialchars($row['platforms']); ?></p>
                </div>
            </div>
            <!-- Horizontal line -->
            <div class="bold-white-line"></div>
            
            <!-- Images 2, 3, and 4 -->
            <div class="row">
                <div class="col-md-4">
                    <img src="../admin_area/<?php echo htmlspecialchars($row['game_image2']); ?>" class="img-fluid custom-img" alt="Game Image 2">
                </div>
                <div class="col-md-4">
                    <img src="../admin_area/<?php echo htmlspecialchars($row['game_image3']); ?>" class="img-fluid custom-img" alt="Game Image 3">
                </div>
                <div class="col-md-4">
                    <img src="../admin_area/<?php echo htmlspecialchars($row['game_image4']); ?>" class="img-fluid custom-img" alt="Game Image 4">
                </div>
                
                <!-- Horizontal line -->
            </div>
            <div class="bold-white-line"></div>
            <h1 class="description-text"> Comments </h1>
        </div>
    </div>
</div>


<script src = "../JAVAScripts/userCheck.js"></script>
<script src = "../JAVAScripts/cart.js"></script>

</body>
</html>
