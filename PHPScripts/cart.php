<?php  
session_start();  

// Step 1: Check if the user is logged in  
if (!isset($_SESSION["userid"])) {  
    header("Location: login.php");  
    die();  
}  

// Step 1: Get JSON cart data from session/cookie  
$jsonCartData = isset($_SESSION['cart']) ? $_SESSION['cart'] : (isset($_COOKIE['listCart']) ? $_COOKIE['listCart'] : json_encode([]));  
$cartDataArray = json_decode($jsonCartData, true);  

// Step 2: Convert cart data into XML  
function arrayToXml($data, &$xmlData) {  
    foreach ($data as $key => $value) {  
        if (is_array($value)) {
            // Create a new element for each game in the cart
            if (is_numeric($key)) {
                $subnode = $xmlData->addChild("item");
                // Add the id as an attribute
                $subnode->addAttribute("id", $key);
            } else {
                $subnode = $xmlData->addChild("$key");
            }
            arrayToXml($value, $subnode);  
        } else {  
            // Replace invalid XML characters in key or value  
            $xmlData->addChild(sanitizeXML($key), htmlspecialchars("$value"));  
        }  
    }  
}  

function sanitizeXML($string) {  
    // Replace invalid XML character sequences and return a valid XML tag name  
    return preg_replace('/[^a-z_]/i', '_', $string);  
}  

// Create XML structure
$xmlData = new SimpleXMLElement('<?xml version="1.0"?><cart></cart>');  
arrayToXml($cartDataArray, $xmlData);  
$xmlString = $xmlData->asXML();  

// Step 3: Return XML cart data (store it in a variable for XSLT processing)
// For debugging purposes, you can uncomment the following lines
// header('Content-Type: application/xml');
// echo $xmlString;
// exit;

// Step 4: Apply XML cart data to XSLT
// Debugging output to inspect the generated XML  
if (empty($xmlString)) {  
    echo "Generated XML is empty!";  
    exit;  
}  

// Load the XSLT stylesheet   
$xsl = new DOMDocument;  
if (!$xsl->load('stylesheet1.xsl')) {  
    echo "Failed to load the XSLT file.";  
    exit;  
}  

// Configure the transformer  
$xsltProcessor = new XSLTProcessor;  
if (!$xsltProcessor->importStyleSheet($xsl)) {  
    echo "Error importing stylesheet!";  
    exit;  
}  

// Transform the XML to HTML  
$htmlOutput = $xsltProcessor->transformToXML($xmlData);  
if ($htmlOutput === false) {  
    echo "XSLT Transformation failed!";  
    exit;  
}  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Shopping Cart</title>  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">  
    <link rel="stylesheet" href="../CSS/popup.css">  
    <link rel="stylesheet" href="../CSS/cartstyle.css">  
</head>  
<body>  
    <div class="popup" id="cartPopup"></div>  
    <div class="container cart-container">  
        <h2>Shopping Cart</h2>  
        <div id="cart-items" class="cart-items">  
            <?php echo $htmlOutput; ?> <!-- Rendered HTML from XSLT transformation -->  
        </div>  
        <div class="cart-total">  
            Total Price: $<span id="total-price">0.00</span>  
        </div>  
        <div class="cart-actions">  
            <button onclick="cartItemCheck()" class="btn btn-success checkout-btn">Proceed to Checkout</button>  
        </div>  
    </div>  
    <br>  
    <br>  
    <br>  
    <br>  
    
    <script src="../JAVAScripts/cart.js"></script>  
    <script>  
        // Call to display cart items after XML transformation is complete
        displayCartItems();
        
        // Refresh page when navigating back to ensure cart is updated
        (function () {  
            window.onpageshow = function(event) {  
                if (event.persisted) {  
                    window.location.reload();  
                }  
            };  
        })();  
    </script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>