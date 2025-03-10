<?php
session_start();
require("dbInit.php");



$cartCookie = json_decode($_COOKIE["listCart"]);

foreach($cartCookie as $gameArr){
    $gameID = $gameArr->game_id;
    $sql = "INSERT INTO gamesowned VALUES (". $gameID .",". $_COOKIE["userid"] .")";
    if ($conn->query($sql) === TRUE) {
    } else {
        header("Location: ../index.php");
        die();
    }
}

unset( $_SESSION["userid"]);
setcookie("listCart", "", -1,); 

header("Location: profile.php");
die();
?>