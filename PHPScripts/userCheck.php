<?php
  session_start();
    if(isset($_SESSION["userid"])){
        header("Location: home.php");
    }else{
        header("Location: register.php");
    }


?>