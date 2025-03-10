<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" type="text/css" href="../CSS/styleLR.css">
</head>
<body>
<div id="form">
        <h1>Login</h1>
        <form name="form" action="loginLogic.php" onsubmit="return isvalid()" method="POST">
     
            <input type="text" id="user" name="user" placeholder=  "Username">
            <input type="password" id="pass" name="pass"  placeholder=  "Password">
            <input type ="submit" id="login_btn" value="Submit" name ="submit"/>
            <a href="register.php" id="register-link">Don't have an account? Click here</a></br>
            <a href="home.php" id="home-link">Back</a>  <!--home link-->
        </form>
    </div>
    <script>
        function isvalid(){
            var user = document.form.user.value;
            var pass = document.form.pass.value;
            if(user.length==""&&pass.length==""){
                alert("Username and Password field is empty!");
                return false;
            }
            if(user.length==""){
                alert("Username is empty!");
                return false;
                } 
                if(pass.length==""){
                alert("Password is empty!");
                return false;
            }
        }
        </script>
    
</body>
</html>
