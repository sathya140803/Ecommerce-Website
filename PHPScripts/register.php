
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../CSS/styleLR.css">
<div id="form">
    <h1>Register</h1>
    <form name="register-form" action="registrationLogic.php" method="POST">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <input type="password" id="confirm_password" name="confirm-password" placeholder="Confirm Password" required>
        <input type="submit" id="register_btn" value="Submit" name="register"/>
        <a href="login.php" id="login-link">Already have an account? Click here</a></br>
        <a href="home.php" id="home-link">Back</a>
    </form>
</div>

</body>
</html>
