<?php
header("Content-Type:application/xml");
session_start();
require("dbInit.php");  
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$cpassword = mysqli_real_escape_string($conn, $_POST['confirm-password']);


$sql = "SELECT * FROM users WHERE userName='$username'";
$result = mysqli_query($conn, $sql);
$count_user = mysqli_num_rows($result);


$sql = "SELECT * FROM users WHERE userEmail='$email'";
$result = mysqli_query($conn, $sql);
$count_email = mysqli_num_rows($result);

$xml="";

if ($count_user == 0 && $count_email == 0) {
    if ($password == $cpassword) {
       $sql = "INSERT INTO users (userName, userEmail, userPass) VALUES ('$username', '$email', '$password')";
        
       $result = mysqli_query($conn, $sql); 
        if ($result) {
            $query2 = "SELECT userID FROM users WHERE userName = '$username' AND userEmail = '$email' AND userPass = '$password' ";

            $result2 = mysqli_query($conn, $query2);
            if($result2){
                $useriddat = $result2->fetch_assoc();
                $userid = $useriddat["userID"];
                $_SESSION["userid"]=$userid;
                $xml = "<error>false</error>";
            }
            
        } else {
            $xml = "<error>Database Error</error>";
        }
    } else {
        $xml = "<error>Passwords are not the same</error>";
    }
} else {
    
    if ($count_user > 0) {
        $xml = "<error>Account already exist</error>";
    }
    if ($count_email > 0) {
        $xml = "<error>Email already being used</error>";
    }
}

echo "<?xml version='1.0' encoding='UTF-8'?>";
echo $xml;
?>
