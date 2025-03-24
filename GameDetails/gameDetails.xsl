<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" indent="yes" encoding="UTF-8"/>

<xsl:template match="/">
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><xsl:value-of select="game/game_title"/> - Game Details</title>
    <link rel="stylesheet" href="../CSS/d.css"/>
    <link rel="stylesheet" href="../CSS/popup.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    
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
        .navbar {
            background-color: #32CD32;
        }
        .logo {
            width: 2%;
            height: 2%;
        }
        /* Navbar text color (links and other text) */
        .navbar .nav-link, .navbar-brand {
            color: white; /* Change to your desired color */
        }
        .bold-white-line {
            border-top: 2px solid white;
            margin: 20px auto; /* Centers the line horizontally */
            width: 100%;
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
</head>
<body>
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg"> 
          <div class="container-fluid">
            <img src="logo.jpeg" alt="" class="logo"/>
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
                    <li><a class="dropdown-item" href="#">Puzzle game</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                   <a href="cart.php" class="icon nav-link">
                     <i class="bx bx-cart" style="font-size: 1.5rem;"></i>
                     <span id="cart-count" class="d-flex" style="margin-left: 5px;">0</span>
                    </a>
                </li>
                
                <li class="nav-item">
                  <p id="loginNotifier" style="color:white; margin:0;">
                    Logged in as:
                  </p>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" id="userProfile" style="margin:0">
                  </a>
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

    <div id="homePopup" class="popup"></div>

    <div class="container mt-3">
        <div class="row">
            <!-- Left side: Image 1, description, and "Add to Cart" button -->
            <div class="col-md-6 text-center">
                <img>
                    <xsl:attribute name="src">../admin_area/<xsl:value-of select="game/images/image1"/></xsl:attribute>
                    <xsl:attribute name="class">img-fluid leftimg</xsl:attribute>
                    <xsl:attribute name="alt">Game Image 1</xsl:attribute>
                </img>
                <p class="description-text"><strong>Description:</strong> <xsl:value-of select="game/game_description"/></p>
                <button class="btn btn-primary mb-3">
                    <xsl:attribute name="onclick">
                        addToCart(<xsl:value-of select="game/game_id"/>)
                    </xsl:attribute>
                    <xsl:text>Add to Cart</xsl:text>
                </button>
            </div>
            
            <!-- Right side: Title, long description, other details, and images -->
            <div class="col-md-6">
                <h1 style="color:white;"><xsl:value-of select="game/game_title"/></h1>
                <!-- Horizontal line -->
                <div class="bold-white-line"></div>
                <p class="description-text"><strong></strong> <span class="description-text"><xsl:value-of select="game/long_description"/></span></p>
                <!-- Horizontal line -->
                <div class="bold-white-line"></div>
                <!-- Details side by side -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="description-text"><strong>Rating:</strong> <xsl:value-of select="game/rating"/> stars</p>
                    </div>
                    <div class="col-md-6">
                        <p class="description-text"><strong>Size:</strong> <xsl:value-of select="game/size"/></p>
                    </div>
                    <div class="col-md-6">
                        <p class="description-text"><strong>Company:</strong> <xsl:value-of select="game/company"/></p>
                    </div>
                    <div class="col-md-6">
                        <p class="description-text"><strong>Age Restriction:</strong> <xsl:value-of select="game/age_restriction"/></p>
                    </div>
                    <div class="col-md-12">
                        <p class="description-text"><strong>Platforms:</strong> <xsl:value-of select="game/platforms"/></p>
                    </div>
                </div>
                <!-- Horizontal line -->
                <div class="bold-white-line"></div>
                
                <!-- Images 2, 3, and 4 -->
                <div class="row">
                    <div class="col-md-4">
                        <img>
                            <xsl:attribute name="src">../admin_area/<xsl:value-of select="game/images/image2"/></xsl:attribute>
                            <xsl:attribute name="class">img-fluid custom-img</xsl:attribute>
                            <xsl:attribute name="alt">Game Image 2</xsl:attribute>
                        </img>
                    </div>
                    <div class="col-md-4">
                        <img>
                            <xsl:attribute name="src">../admin_area/<xsl:value-of select="game/images/image3"/></xsl:attribute>
                            <xsl:attribute name="class">img-fluid custom-img</xsl:attribute>
                            <xsl:attribute name="alt">Game Image 3</xsl:attribute>
                        </img>
                    </div>
                    <div class="col-md-4">
                        <img>
                            <xsl:attribute name="src">../admin_area/<xsl:value-of select="game/images/image4"/></xsl:attribute>
                            <xsl:attribute name="class">img-fluid custom-img</xsl:attribute>
                            <xsl:attribute name="alt">Game Image 4</xsl:attribute>
                        </img>
                    </div>
                </div>
                <div class="bold-white-line"></div>
                <h1 class="description-text"> Comments </h1>
            </div>
        </div>
    </div>

    <script src="../JAVAScripts/userCheck.js"></script>
    <script src="../JAVAScripts/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</xsl:template>
</xsl:stylesheet>