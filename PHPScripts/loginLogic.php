<?php
session_start();
    if(isset($_POST['submit'])){
        require("dbInit.php");
        $username=$_POST['user'];
        $password=$_POST['pass'];
        
        $sql ="select * from users where userName= '$username' and userPass = '$password'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $userid = $row["userID"];
        if($count==1){
            $_SESSION["userid"]=$userid;
            header("Location: home.php");
            exit(); 
        }
        else{
            echo '<script>
            window.location.href ="login.php";
            alert("Login failed. Invalid Username or Password!!!");
            </script>';
        }
    }



?>