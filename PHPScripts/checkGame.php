<?php
// Database connection
require("dbInit.php");

// Get the game ID from the request
$game_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($game_id <= 0) {
    die("Invalid game ID.");
}

// Fetch game details from the database
$sql = "SELECT * FROM games WHERE game_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $game_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the game exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Create XML document
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->formatOutput = true;

    $root = $xml->createElement("game");
    $xml->appendChild($root);

    // Create XML elements from database values
    $elements = [
        "game_id" => $row["game_id"],
        "game_title" => $row["game_title"], 
        "game_description" => $row["game_description"],
        "long_description" => $row["long_description"],
        "game_keywords" => $row["game_keywords"] ?? '', 
        "category_id" => $row["category_id"],
        "game_price" => $row["game_price"], 
        "date" => $row["date"], 
        "Status" => $row["Status"],
        "rating" => $row["rating"],
        "size" => $row["size"],
        "company" => $row["company"],
        "age_restriction" => $row["age_restriction"],
        "platforms" => $row["platforms"]
    ];

    foreach ($elements as $key => $value) {
        $node = $xml->createElement($key, htmlspecialchars($value));
        $root->appendChild($node);
    }

    // Add images as a nested element
    $images = $xml->createElement("images");
    $root->appendChild($images);

    for ($i = 1; $i <= 4; $i++) {
        $imgElement = $xml->createElement("image$i", htmlspecialchars($row["game_image$i"] ?? ""));
        $images->appendChild($imgElement);
    }

    // Save XML content
    $xmlFilePath = "gameData.xml";
    $xml->save($xmlFilePath);

    // Validate against the XSD schema
    $xsdFilePath = "../GameDetails/gameDetails.xsd";
    if (!file_exists($xsdFilePath)) {
        die("XSD file does not exist!");
    }

    if (!$xml->schemaValidate("../GameDetails/gameDetails.xsd")) {
        die("Invalid XML structure. Does not conform to the schema.");
    }

    // Transform XML using XSLT
    $xsl = new DOMDocument();
    $xsl->load("../GameDetails/gameDetails.xsl");

    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    // Apply transformation and output result
    header("Content-Type: text/html");
    echo $proc->transformToXML($xml);
} else {
    // If game not found, return error XML
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->formatOutput = true;
    $error = $xml->createElement("error", "Game not found!");
    $xml->appendChild($error);
    
    header("Content-Type: text/xml");
    echo $xml->saveXML();
}

$stmt->close();
$conn->close();
?>
