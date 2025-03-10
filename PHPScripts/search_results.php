<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("dbInit.php");
// Get the search query from the URL
$search_query = mysqli_real_escape_string($conn, $_GET['search_data'] ?? '');

// SQL query to search games by keywords
$sql = "SELECT * FROM games WHERE game_keywords LIKE '%$search_query%'";

// Execute the query
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/Style.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/popup.css">
    <!-- Add your CSS files here -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
    <style>
        body, html {
            margin: 0;
            padding: 0;
            background-color: black;
            color: white;
        }
        .game-item {
            display: flex;
            flex-direction: column; /* Stack items vertically */
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .game-item img {
            width: 200px; /* Adjust the width as needed */
            height: 250px; /* Adjust the height as needed */
            object-fit: cover; /* Ensures the image covers the set size */
            border: 5px solid white; /* Frame around the image */
            border-radius: 8px; /* Rounded corners for the frame */
            margin-bottom: 15px; /* Space below the image */
            transition: transform 0.3s; /* Smooth transition for hover effect */
        }
        .game-item img:hover {
            transform: scale(1.05); /* Slight zoom on hover */
        }
        .game-title {
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 1.5em;
        }
        .logo{
              width: 2%;
              height: 2%;
          }
           .navbar {
         background-color:#32CD32 ;
           }
        .game-price {
            margin-top: 10px;
            font-size: 1.2em;
        }
        .btn-container {
            display: flex;
            gap: 10px; /* Space between buttons */
            margin-top: 10px; /* Space above the buttons */
        }
        .btn-container .btn {
            padding: 8px 16px; /* Adjust padding for button size */
            font-size: 1em; /* Adjust font size */
            text-align: center;
        }
    </style>
</head>
<body>


<div id = "homePopup" class = "popup"></div>

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



    <div class="container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                <div class="game-item">
                    <h5 class="game-title">'.$row['game_title'].'</h5>
                    <img src="../admin_area/'.$row['game_image1'].'" alt="'.$row['game_title'].'">
                    <p class="game-price"><strong>Price:</strong> $'.$row['game_price'].'</p>
                    <div class="btn-container">
                        <button class="btn btn-primary" onclick="addToCart('.$row['game_id'].')" >Add to cart</button>
                        <a href="game_details.php?id='.$row['game_id'].'" class="btn btn-secondary">Explore</a>
                    </div>
                </div>';
            }
        } else {
            echo '<p>No games found with the keywords "<strong>'.$search_query.'</strong>".</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    <script src = "../JAVAScripts/userCheck.js"></script>

    <!-- Add your JavaScript files here -->
    <script src="path/to/bootstrap.bundle.min.js"></script>

    <script src = "../JAVAScripts/cart.js"></script>
    <script>updateCartIcon();</script>


</body>
</html>