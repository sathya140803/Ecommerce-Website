<?php
session_start();
    require("dbInit.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $cookie = $_SESSION["userid"];

        $sql = 'UPDATE users SET userName = "'.$name.'" WHERE userID = '.$cookie;

        $result = $conn->query($sql);

        if($result === TRUE){
            echo json_encode(['success' => true, 'message' => "UPDATED SUCCESSFULLY!", 'newName' => $name]);
        }else{
            echo json_encode(['success' => false, 'message' => 'An error occured..']);
        }
    }

    $conn->close();
    die();

?>