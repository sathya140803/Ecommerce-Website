
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleLR.css">
<div id="form">
    <h1>Register</h1>
    <form name="form">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="confirm_password" name="confirm-password" placeholder="Confirm Password" required>
        <input type="button" id="register_btn" value="Submit" name="register" onclick="ajaxPost()"/>
        <a href="login.php" id="login-link">Already have an account? Click here</a></br>
        <a href="home.php" id="home-link">Back</a>
    </form>
</div>

<script>
        function ajaxPost(){
            var user = document.form.username.value;
            var pass = document.form.password.value;
            var email = document.form.email.value;
            var c_pass = document.form.confirm_password.value;
            
            var req = new XMLHttpRequest();
            req.open("POST","registrationLogic.php",true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            req.onreadystatechange = function(){
                if(req.readyState == 4){
                    if(req.status == 200){
                        alert(req.responseXML);
                        var val = req.responseXML.getElementsByTagName("error")[0].firstChild.nodeValue;
                        if(val == "false"){
                            window.location.href = "home.php";
                        }else{
                            alert(val);
                        }
                    }else{
                        alert("Error");
                    }
                }
            }

            req.send("username="+user+"&email="+email+"&password="+pass+"&confirm-password="+c_pass);
        }
    </script>

</body>
</html>
