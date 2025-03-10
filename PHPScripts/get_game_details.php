<?php
 session_start();
require("dbInit.php");

if (isset($_GET['id'])) {
    $gameId = $_GET['id'];



    if(!isset($_SESSION["userid"])){
        echo json_encode(['error' => "LU"]);
        die();
    }

    // Fetch game details from the database
    $sql = "SELECT game_id, game_title, game_price, game_image1
     FROM games WHERE game_id = ". $gameId;
    $result = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM gamesowned WHERE userID = ". $_SESSION["userid"] ." AND gameID = ". $gameId;
    $results2 = mysqli_query($conn, $sql2);

    
    if ((mysqli_num_rows($result) > 0)) {
        if( (mysqli_num_rows($results2) == 0)){
            $game = mysqli_fetch_assoc($result);
            echo json_encode($game);
        }else{
            echo json_encode(['error' => "AH"]);
        }    
    } else {
        echo json_encode(['error' => "NF"]);
    }
}

// Close the database connection
mysqli_close($conn);
?>
