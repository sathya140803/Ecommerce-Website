<?php
session_start();
require("dbInit.php");  

if (isset($_POST['register'])) {
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
                    header("Location: home.php");
                }
                
                exit();
            } else {
                
                echo '<script>
                    alert("Error during registration. Please try again.");
                    window.location.href = "register.php";
                </script>';
                exit();  
            }
        } else {
            
            echo '<script>
                alert("Passwords do not match");
                window.location.href = "register.php";
            </script>';
            exit();  
        }
    } else {
        
        if ($count_user > 0) {
            echo '<script>
                alert("Username already exists!");
                window.location.href = "register.php";
            </script>';
        }
        if ($count_email > 0) {
            echo '<script>
                alert("Email already exists!");
                window.location.href = "register.php";
            </script>'; 
        }
        exit();  
    }
}
?>
