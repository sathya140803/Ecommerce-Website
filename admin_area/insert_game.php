<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$con = mysqli_connect('localhost', 'root', '', 'mystore');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['insert_game'])) {
    // Use isset() to avoid undefined index warnings
    $game_title = mysqli_real_escape_string($con, $_POST['game_title'] ?? '');
    $description = mysqli_real_escape_string($con, $_POST['description'] ?? '');
    $long_description = mysqli_real_escape_string($con, $_POST['long_description'] ?? '');
    $keywords = mysqli_real_escape_string($con, $_POST['game_keywords'] ?? '');
    $category = mysqli_real_escape_string($con, $_POST['game_category'] ?? '');
    $price = mysqli_real_escape_string($con, $_POST['game_price'] ?? '');
    $rating = mysqli_real_escape_string($con, $_POST['game_rating'] ?? '');
    $size = mysqli_real_escape_string($con, $_POST['game_size'] ?? '');
    $company = mysqli_real_escape_string($con, $_POST['company'] ?? '');
    $age_restriction = mysqli_real_escape_string($con, $_POST['age_restriction'] ?? '');
    $platforms = implode(', ', $_POST['platforms'] ?? []);

    // Handle file uploads
    $images = [];
    for ($i = 1; $i <= 4; $i++) {
        $image_name = $_FILES["game_image$i"]["name"] ?? '';
        $image_tmp_name = $_FILES["game_image$i"]["tmp_name"] ?? '';
        $image_path = "uploads/" . basename($image_name);
        
        if ($image_name && move_uploaded_file($image_tmp_name, $image_path)) {
            $images[] = $image_path;
        } else {
            $images[] = NULL; // Set to NULL if upload fails
        }
    }

    // Prepare SQL statement with new columns
    $sql = "INSERT INTO games (game_title, game_description, long_description, game_keywords, category_id, game_image1, game_image2, game_image3, game_image4, game_price, rating, size, company, age_restriction, platforms) 
            VALUES ('$game_title', '$description', '$long_description', '$keywords', '$category', 
                    '{$images[0]}', '{$images[1]}', '{$images[2]}', '{$images[3]}', '$price', '$rating', '$size', '$company', '$age_restriction', '$platforms')";
    
    // Execute SQL statement
    if (mysqli_query($con, $sql)) {
        echo "New game inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
    // Close the database connection
    mysqli_close($con);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .form-outline {
            width: 50%;
            margin: auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Game</title>
    
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body style="background-image: url('https://assets.hongkiat.com/uploads/40-cool-abstract-and-background-photoshop-tutorials/yellow-green-abstract.jpg'); background-size: cover; background-position: center;">
    <div class="container mt-3">
        <h1 class="text-center">
            Insert Game
        </h1>
        <!-- Form -->
        <form action="insert_game.php" method="post" enctype="multipart/form-data">
            <!-- Existing Fields -->
            <!-- Title, Description, etc... -->
            <label for="game_title" class="form-label">Game title</label>
                <input type="text" name="game_title" id="game_title" class="form-control"
                 placeholder="Enter game title" autocomplete="off" required="required">
            </div>
            <!-- Description -->
            <div class="form-outline mb-4">
                <label for="description" class="form-label">Game description</label>
                <input type="text" name="description" id="description" class="form-control"
                 placeholder="Enter game description" autocomplete="off" required="required">
            </div>
            <!-- Second Description -->
            <div class="form-outline mb-4">
                <label for="long_description" class="form-label">Game long description</label>
                <input type="text" name="long_description" id="long_description" class="form-control"
                 placeholder="Enter game long description" autocomplete="off" required="required">
            </div>
            <!-- Keywords -->
            <div class="form-outline mb-4 w-50">
                <label for="game_keywords" class="form-label">Game keywords</label>
                <input type="text" name="game_keywords" id="game_keywords" class="form-control"
                 placeholder="Enter game keywords" autocomplete="off" required="required">
            </div>
            <!-- Categories -->
            <div class="form-outline mb-4 w-50">
                <select name="game_category" id="game_category" class="form-select" required>
                    <option value="">Select a category</option>
                    <option value="Action">Action game</option>
                    <option value="Strategy">Strategy game</option>
                    <option value="Sport">Sport game</option>
                    <option value="Puzzle">Puzzle game</option>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image1" class="form-label">Game image 1</label>
                <input type="file" name="game_image1" id="game_image1" class="form-control" required="required">
            </div>
            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image2" class="form-label">Game image 2</label>
                <input type="file" name="game_image2" id="game_image2" class="form-control" required="required">
            </div>
            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image3" class="form-label">Game image 3</label>
                <input type="file" name="game_image3" id="game_image3" class="form-control" required="required">
            </div>
            <!-- Image 4 -->
            <div class="form-outline mb-4 w-50">
                <label for="game_image4" class="form-label">Game image 4</label>
                <input type="file" name="game_image4" id="game_image4" class="form-control" required="required">
            </div>
            <!-- Price -->
            <div class="form-outline mb-4 w-50">
                <label for="game_price" class="form-label">Game price</label>
                <input type="text" name="game_price" id="game_price" class="form-control"
                 placeholder="Enter game price" autocomplete="off" required="required">
            </div>
            <!-- Rating -->
            <div class="form-outline mb-4">
                <label for="game_rating" class="form-label">Game Rating</label>
                <input type="number" name="game_rating" id="game_rating" class="form-control"
                 placeholder="Enter game rating (e.g., 4.5)" step="0.1" min="0" max="5" required>
            </div>
            <!-- Size -->
            <div class="form-outline mb-4">
                <label for="game_size" class="form-label">Game Size (GB)</label>
                <input type="text" name="game_size" id="game_size" class="form-control"
                 placeholder="Enter game size in GB" required>
            </div>
            <!-- Company -->
            <div class="form-outline mb-4">
                <label for="company" class="form-label">Created by Company</label>
                <input type="text" name="company" id="company" class="form-control"
                 placeholder="Enter company name" required>
            </div>
            <!-- Age Restriction -->
            <div class="form-outline mb-4">
                <label for="age_restriction" class="form-label">Age Restriction</label>
                <input type="text" name="age_restriction" id="age_restriction" class="form-control"
                 placeholder="Enter age restriction (e.g., 18+)" required>
            </div>
            <!-- Supported Platforms -->
            <div class="form-outline mb-4">
                <label for="platforms" class="form-label">Supported Platforms</label>
                <select name="platforms[]" id="platforms" class="form-select" multiple required>
                    <option value="PS4">PS4</option>
                    <option value="PS5">PS5</option>
                    <option value="Xbox">Xbox</option>
                    <option value="PC">PC</option>
                </select>
            </div>
            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50">
                <input type="submit" name="insert_game" class="btn btn-info mb-3 px-3" value="Insert game">
            </div>
        </form>
    </div>
</body>
</html>
