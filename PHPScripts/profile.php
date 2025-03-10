

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="../CSS/gameLib.css">
    <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <title>Profile</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>

    
    <div class = "backToTop" id = "backToTop" style = "display:none; height: 40px; position: fixed; width: 20%; top: 0px; left: 40%">
        <button class = "backToTopButton" onclick = "backToTop()">
            Back To Top
        </button>
    </div>
    <?php require("getProfile.php") ?>
    <div class = "userProfile" id = "userProfile">
        <div class = "userData">
            <div class = "userAvatar">
                   <div class = "initial">
                        <?php echo strtoupper(substr($userrow["userName"], 0, 1)); ?>
                   </div> 
            </div>
            <div class = "userAccData">
                <h2 class = "userName">
                    <?php echo $userrow["userName"]; ?>
                </h2>
                <h4 class = "userMail">
                    <?php echo $userrow["userEmail"]; ?>
                </h4>
            </div>
        </div>
        <div class = "editDiv">
            <a href = "profileEdit.php">
                <button class = "editButton">
                    EDIT PROFILE    
                </button>
            </a>
        </div>
    </div>

    
    <div class = "mainList">
        <div class = "libIdentifier">
            <h2 >
                USER LIBRARY
            </h2>
        </div>
        <div class = "sortContainer">
            <div class="staticSort">
                <h2>Sort By: </h2>
            </div>
            <div class="sortDiv">
                <button onclick = "recieveTab('Action')">
                    Action
                </button>
                <button onclick = "recieveTab('Puzzle')">
                    Puzzle
                </button>
                <button onclick = "recieveTab('Sport')">
                    Sport
                </button>
                <button onclick = "recieveTab('Strategy')">
                    Strategy
                </button>
                <button onclick = "recieveTab('None')">
                    None
                </button>
            </div>
        </div>
        <div class="curSort">
            <div class="curSortChild">
                <h2 class = "sortValId">Sorted By:</h2>
                <h2 class = "sortVal" id = "sortVal">None</h2>
            </div>
        </div>
        <div class="info">
            <div id="unorderedGameList" class="gameList">

            </div>
        </div>
        <h2 class = "noResults" id = "noResults">
            
        </h2>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>


    <footer class="footer" style = "background-color: #333333">
        <div class="container">
            <p>&copy; 2024 Game Shop. All Rights Reserved.</p>
            <p>
                <a href="term_of_service.html">Terms of service</a> |
                <a href="aboutus.html">Policy</a> |
                <a href="connect.html">Contact Us</a>
            </p>
        </div>
    </footer>

    <script src = "../JAVAScripts/gameLibJS.js"></script>


</body>
</html>