function recieveTab(a) {

    document.getElementById("sortVal").innerHTML = a;
    
        
    $.ajax({
        url: "getFuncs.php",
        data: { 
            "type": "GetUserLib",
            "sortval": a
        },
        type: "GET",
        success: function(response) {
            var gameUl = document.getElementById("unorderedGameList");
            var noRes = document.getElementById("noResults");
            if(response == "NoResult"){
                gameUl.innerHTML = "";
                noRes.innerHTML = "No Games Found";
                return;
            }
            noRes.innerHTML = "";
            
            var gameData = JSON.parse(response); //decoding the data into a java script object
            

            var inhtml =  "";

            for(const curRow of gameData){
                
                var gameName = curRow.game_title;
                var gameCat = curRow.category_id;
                var gameId = curRow.game_id;
                var gameDesc = curRow.game_description;
                var gameImg = curRow.game_image1;

                inhtml +=  '<div class = "gameContainer">'
                            +    '<div class = "gameDetails">'
                            +        '<div class = "sideCont">'
                            +            '<div class = "gameImg">'
                            +                   '<img src= ../admin_area/'+ gameImg +'>'
                            +            '</div>'
                            +            '<div class = "gameDesc">'
                            +                '<h1>' + gameName + '</h1>'
                            +                '<h2>' + gameDesc + '</h2>'
                            +            '</div>'
                            +        '</div>'
                            +        '<div class = "gameCategory">'
                            +            '<h4>' + gameCat + '</h4>'
                            +        '</div>'
                            +        '<div class = "gameButtons">'
                            +            '<button class = "goToPage" onclick = ' + 
                            'goToPage('+ gameId +')' + '>'
                            +                'Go To Game Page'
                            +            '</button>'
                            +        '</div>'
                            +    '</div>' +
                            '</div>'

            }
            gameUl.innerHTML = inhtml;
        },
    });
}

function backToTop(){
    document.documentElement.scrollTop = 0;
}

function goToPage(id){
    window.location.href = "game_details.php?id="+id;
}

window.onscroll = function(){
    var profileEl = document.getElementById("userProfile");

    if(document.documentElement.scrollTop > (profileEl.offsetHeight + 
        profileEl.offsetTop) - 50){
        document.getElementById("backToTop").style.display = "block";
    }else{
        document.getElementById("backToTop").style.display = "none";
    }
    
}

recieveTab("None");