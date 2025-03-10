<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="stylesheet" href="../CSS/profileEdit.css">
    <link rel="stylesheet" href="../CSS/popup.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

    <div id="popup" class="popup"></div>

    <?php
        require("getProfile.php");
    ?>
    <div class = "userProfile" id = "userProfile">
        <div class = "userData">
            <div class = "userAvatar">
                   <div class = "initial" id = "initial">
                        <?php echo strtoupper(substr($userrow["userName"], 0, 1)); ?>
                   </div> 
            </div>
            <div class = "userAccData">
                <h2 class = "userName" id = "userName">
                    <?php echo $userrow["userName"]; ?>
                </h2>
                <h4 class = "userMail">
                    <?php echo $userrow["userEmail"]; ?>
                </h4>
            </div>
        </div>
    </div>



    <div class = "profileEdit">
        <h1>
            Edit Profile
        </h1>
        
        <div class = "formDiv">
            <h3>Change Name</h3>
            <form id = "nameForm">
                <div class = "flexBody">
                    <label> Input your new Name </label><br>
                    <input type="text" name="name" required>
                </div>
                <div>
                    <button type="submitName"> Change </button>
                </div>
            </form>
        </div>
        <br>
        <div class = "formDiv">
            <h3>Change Password</h3>
            <form id="passForm">
                <div class = "flexBody">
                    <label> Input your current password </label><br>
                    <input type="password" name = "curPass" required>
                </div>
                <div class = "flexBody">
                    <label> Input your new password </label><br>
                    <input type="password" name = "newPass" required>
                </div>
                <button type="submitPass"> Change </button>
            </form>
        </div>
    </div>


    <br>
    <br>
    <br>


    <script>
        document.getElementById('nameForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);
            fetch('changeName.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                let popup = document.getElementById('popup');
                popup.textContent = data.message;
                popup.style.display = 'block';
                document.getElementById("initial").innerHTML = data.newName.substring(0, 1).toUpperCase();
                document.getElementById("userName").innerHTML = data.newName;
                if (data.success) {
                    this.reset();
                }
                setTimeout(() => {
                    popup.style.display = 'none';
                }, 3000);
            })
        });

        document.getElementById('passForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            fetch('passChange.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                let popup = document.getElementById('popup');
                popup.textContent = data.message;
                popup.style.display = 'block';
                if (data.success) {
                    this.reset();
                }
                setTimeout(() => {
                    popup.style.display = 'none';
                }, 3000);
            })
        });

    </script>

</body>
</html>