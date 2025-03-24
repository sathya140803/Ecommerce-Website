<?php  
$xml = simplexml_load_file('form.xml');  

echo '<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Contact Form</title>  
    <link rel="stylesheet" href="../CSS/contactstyles.css">  
</head>  
<body>';  

echo '<div class="container">';  
echo '<h1>Connect with us</h1>';  
echo '<p>We would love to respond to your queries and help you succeed. Feel free to get in touch with us.</p>';  

echo '<form action="submit_contact.php" method="POST">';  
foreach ($xml->field as $field) {  
    $name = (string)$field['name'];  
    $type = (string)$field['type'];  
    $label = (string)$field['label'];  
    $placeholder = (string)$field['placeholder'] ?? ''; // Add placeholder support  

    echo "<label for='$name'>$label</label>";  

    if ($type === "textarea") {  
        echo "<textarea name='$name' id='$name' placeholder='$placeholder' required></textarea>";  
    } else {  
        echo "<input type='$type' name='$name' id='$name' placeholder='$placeholder' required>";  
    }  
}  
echo '<button type="submit">Send</button>';  
echo '</form>';  
echo '</div>'; // Closing container div  

echo '</body></html>';  
?>  