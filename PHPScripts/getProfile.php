<?php
 session_start();
    require("dbInit.php");

    $sql = "SELECT * 
            FROM users
            WHERE userid = ". $_SESSION["userid"];


    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $userrow = $result->fetch_assoc();
    }else{
        header("Location: index.php");
        die();
    }

    $conn->close();
?>