<?php
session_start();
    require("dbInit.php");
    if(isset($_GET["type"])){
        /*if($_GET["type"] == "GetUserLib"){
            $sortVal = strval($_GET["sortval"]);

           $sql = "SELECT g.game_id, g.game_title, g.category_id, g.game_description, game_image1
                    FROM games g
                    INNER JOIN gamesowned owg
                    WHERE owg.gameID = g.game_id AND owg.userID = ". $_SESSION["userid"];
            
            if($sortVal != "None"){
                $sql .= " AND g.category_id = " . '"' . $sortVal . '"';
            }

            

            $result = $conn->query($sql);

            $dataRec = array();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $dataRec[] = $row;
                }

                echo json_encode($dataRec);//easier to manage with json
            } else {
                echo "NoResult";
            }
            
        }*/
        if($_GET["type"] == "GetUserInfo"){
            if(isset($_SESSION["userid"])){
                $sql = "SELECT * FROM users where userID = ". $_SESSION["userid"];
                $results = $conn->query($sql);

                if($results->num_rows > 0){
                    echo json_encode($results->fetch_assoc());
                }else{
                    echo "NoResults";
                }

            }else{
                echo "NoResults";
            }
        }
    }
    die();
    $conn->close();
?>