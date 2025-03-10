// cart.js

let listCart = {};

// Initialize cart from cookie
function checkCart() {
    let cookieValue = document.cookie.split('; ').find(row => row.startsWith('listCart='));
    if (cookieValue) {
        listCart = JSON.parse(cookieValue.split('=')[1]);
    } else {
        listCart = {};
    }
}
checkCart();

// Add game to cart
function addToCart(gameId) {
    var popup = document.getElementById("homePopup");
    fetch('get_game_details.php?id=' + gameId )
        .then(response => response.json())
        .then(game => {
            if ((!listCart[gameId]) && (game["error"] != "NF") && (game["error"] != "AH") && (game["error"] != "LU")) {
                listCart[gameId] = { ...game };
            }else{
                if(game["error"] == "LU"){
                    window.location.href = "login.php";
                    return;
                }
                var errinnerHTML = "Already in cart!";
                if(game["error"] == "NF"){
                    errinnerHTML = "This item was not found! Please contact us for more info.";
                }
                if(game["error"] == "AH"){
                    errinnerHTML = "You already own this item.";
                }
                popup.innerHTML = errinnerHTML;
                if(popup.style.display == "block"){
                    return;
                }
                popup.style.display = 'block';
                setTimeout(() => {
                    popup.style.display = 'none';
                }, 3000);
            }
            document.cookie = "listCart=" + JSON.stringify(listCart) + ";";
            updateCartIcon();
        });
}

// Update the cart icon with the total number of items
function updateCartIcon() {
    let totalQuantity = 0;
    Object.values(listCart).forEach(game => {
        totalQuantity += 1;
    });
    document.querySelector('#cart-count').innerText = totalQuantity;
}

function cartItemCheck(){
    let totalQuantity = 0;
    Object.values(listCart).forEach(game => {
        totalQuantity += 1;
    });
    if(totalQuantity > 0){
        window.location.href = "process_form.php";
        return;
    }
    var popup = document.getElementById("cartPopup");
    popup.innerHTML = "No items in cart";
    if(popup.style.display == "block"){
        return;
    }
    popup.style.display = 'block';
    setTimeout(() => {
        popup.style.display = 'none';
    },3000); 
}

function displayCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = '';

    var totalPrice = 0;
    var goneThrough = false;

    for (const gameId in listCart) {
        goneThrough = true;
        const game = listCart[gameId];
        const gameElement = document.createElement('div');
        if (isNaN(parseFloat(game.game_price))) {
            game.game_price = 0;
        }
        gameElement.innerHTML = "<img src='../admin_area/" + game.game_image1 + "'>"
            + "<p>"+ game.game_title + "</p>"
            + "<p> Price: $" + parseFloat(game.game_price) + "</p>"
            + "<button onclick='removeFromCart(" + game.game_id + ")'> Remove </button>";

        totalPrice += parseFloat(game.game_price);

        cartItemsContainer.appendChild(gameElement);
    }

    const totalPriceSpan = document.getElementById("total-price");
    totalPrice = totalPrice.toString();
    totalPriceSpan.innerHTML = totalPrice.toString().substring(0, totalPrice.toString().search(/\./) + 3);

    if (goneThrough == false) {
        goneThrough = true;
        const gameElement = document.createElement('div');
        gameElement.innerHTML = "No games found!";
        cartItemsContainer.appendChild(gameElement);
    }
}


function removeFromCart(gameId) {
    if (listCart[gameId]) {
        delete listCart[gameId];
        document.cookie = "listCart=" + JSON.stringify(listCart) + ";";
        displayCartItems();
    }
}
