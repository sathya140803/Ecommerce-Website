<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$con = mysqli_connect('localhost', 'root', 'dhavish1234', 'mystore');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare variables and handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
    $status = 'Available';

    // Handle file uploads
    $images = [];
    for ($i = 1; $i <= 4; $i++) {
        $image_name = $_FILES["game_image$i"]["name"] ?? '';
        $image_tmp_name = $_FILES["game_image$i"]["tmp_name"] ?? '';
        $image_path = "uploads/" . basename($image_name);
        
        if ($image_name && move_uploaded_file($image_tmp_name, $image_path)) {
            $images[] = $image_path;
        } else {
            $images[] = NULL;
        }
    }

    // Insert data into database
    $sql = "INSERT INTO games (game_title, game_description, long_description, game_keywords, category_id, game_image1, game_image2, game_image3, game_image4, game_price, rating, size, company, age_restriction, platforms, Status) 
            VALUES ('$game_title', '$description', '$long_description', '$keywords', '$category', 
                    '{$images[0]}', '{$images[1]}', '{$images[2]}', '{$images[3]}', '$price', '$rating', '$size', '$company', '$age_restriction', '$platforms', '$status')";

    if (mysqli_query($con, $sql)) {
        // Fetch the 5 latest games as XML
        $result = mysqli_query($con, "SELECT * FROM games ORDER BY game_id DESC LIMIT 5");
        
        // Create XML
        $xml = new SimpleXMLElement('<games/>');
        
        while ($game = mysqli_fetch_assoc($result)) {
            $gameNode = $xml->addChild('game');
            foreach ($game as $key => $value) {
                $gameNode->addChild($key, htmlspecialchars($value));
            }
        }

        // Output the XML response
        echo $xml->asXML();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
