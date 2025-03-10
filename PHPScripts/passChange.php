<?php
session_start();
    require("dbInit.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curP = $_POST['curPass'];
        $newP = $_POST['newPass'];
        $cookie = $_SESSION["userid"];

        $sql = 'SELECT userPass FROM users WHERE userID = '. $cookie;

        $result = $conn->query($sql);
        $thing = $result->fetch_assoc();

        if($curP == $thing["userPass"]){

            $sql2 = 'UPDATE users SET userPass = "'.$newP.'" WHERE userID = '. $cookie;

            $result2 = $conn->query($sql2);

            if($result2 === TRUE){
                echo json_encode(['success' => true, 'message' => "Successfully Updated"]);
            }else{
                echo json_encode(['success' => true, 'message' => "Some error occured"]);
            }

        }else{
            echo json_encode(['success' => true, 'message' => "OLD PASSWORD DOES NOT MATCH!"]);
        }

        
    }

    $conn->close();
    die();

?>