<?php
session_start();
unset($_SESSION["userid"]);
setcookie('userid', "", time() - 3600);
setcookie('listCart', "", time() - 3600);
header("Location: login.php");
?>