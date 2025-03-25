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
        <form name="form" >
            <input type="text" id="user" name="user" placeholder=  "Username">
            <input type="password" id="pass" name="pass"  placeholder=  "Password">
            <input type ="button" id="login_btn" value="Submit" name ="submit" onclick="ajaxPost()"/>
            <a href="register.php" id="register-link">Don't have an account? Click here</a></br>
            <a href="home.php" id="home-link">Back</a>  <!--home link-->
        </form>
    </div>
    <script>
        function ajaxPost(){
            var user = document.form.user.value;
            var pass = document.form.pass.value;
            var validationPattern = /^([a-zA-Z0-9]){1,10}$/;

            if(!(validationPattern.test(user) || validationPattern.test(pass))){
                alert("Invalid Details. Try again.");
                return;
            }
            
            var req = new XMLHttpRequest();
            req.open("POST","loginLogic.php",true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            req.onreadystatechange = function(){
                if(req.readyState == 4){
                    if(req.status == 200){
                        var val = req.responseXML.getElementsByTagName("exist")[0].firstChild.nodeValue;
                        if(val == "false"){
                            alert("Account does not exist");
                        }else{
                            window.location.href = "home.php";
                        }
                    }else{
                        alert("Error");
                    }
                }
            }

            req.send("user="+user+"&pass="+pass);
        }
    </script>
    
</body>
</html>
