<?php
    $conn = new mysqli("localhost", "root", "dhavish1234", "mystore");
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
?>