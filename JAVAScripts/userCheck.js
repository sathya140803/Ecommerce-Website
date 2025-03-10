

$.ajax({
    url: "getFuncs.php",
    data: {
    "type": "GetUserInfo"
    },
    type: "GET",
    success: function(response){
    var logNotif = document.getElementById("loginNotifier");
    var userPL = document.getElementById("userProfile");
    
    if(response ==  "NoResults"){
        logNotif.innerHTML = "";
        userPL.innerHTML = "Register or Login now!";
        userPL.href = "login.php";
        document.getElementById("lgout").style.display = "none";
        return;
    }
    document.getElementById("lgout").style.display = "block";
    var userData = JSON.parse(response);
    logNotif.innerHTML = "Logged in As";
    userPL.innerHTML = userData.userName;
    userPL.href = "profile.php";
    }
})