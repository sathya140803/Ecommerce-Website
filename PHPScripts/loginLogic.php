<?php
    header("Content-Type:application/xml");
    session_start();
    require("dbInit.php");
    $username=$_POST['user'];
    $password=$_POST['pass'];

    $xmlData = "";
    
    $sql ="select * from users where userName= '$username' and userPass = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==1){
        $userid = $row["userID"];
        $_SESSION["userid"]=$userid;
        $xmlData = "<exist>true</exist>";
    }
    else{
        $xmlData = "<exist>false</exist>";
    }

    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo $xmlData;
?>