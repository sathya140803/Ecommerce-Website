<?php
session_start();
require("dbInit.php");
// Get form data
$userID = $_SESSION["userid"];
$cardholder_name = $_POST['cardholder_name'];
$card_number = $_POST['card_number'];
$expiration_month = $_POST['expiration_month'];
$expiration_year = $_POST['expiration_year'];
$cvv = $_POST['cvv'];

// Prepare the SQL statement to insert payment details (without payment_id)
$sql = "INSERT INTO payments (userID, cardHolderName, cardNumber, expirationMonth, expirationYear, CVV)
VALUES (".$userID.", '".$cardholder_name."', '".$card_number."', '".$expiration_month."', '".$expiration_year."', '".$cvv."')";

$res = $conn->query($sql);

// Bind parameters (use 's' for string and 'i' for integer)

// Execute the statement and check if it was successful
if ($res===TRUE) {
    require("addToLib.php");
    echo "Payment successfully processed!";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$conn->close();
?>

