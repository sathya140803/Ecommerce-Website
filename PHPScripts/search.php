<?php
header("Content-Type: text/xml; charset=UTF-8");

// Database connection
$conn = new mysqli("localhost", "root", "dhavish1234", "mystore");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search term
$searchTerm = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Query the database
$sql = "SELECT game_title, game_image1 FROM games WHERE game_title LIKE '%$searchTerm%'";
$result = $conn->query($sql);

// Generate XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<games>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<game>';
        echo '<title>' . htmlspecialchars($row['game_title']) . '</title>';
        echo '<image>' . htmlspecialchars($row['game_image1']) . '</image>';
        echo '</game>';
    }
} else {
    echo '<game><title>No results found</title></game>';
}
echo '</games>';

$conn->close();
?>