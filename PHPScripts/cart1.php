
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/popup.css">
    <link rel="stylesheet" href="../CSS/cartstyle.css">
</head>
<body>
    <?php 
    session_start();
        if(!isset( $_SESSION["userid"])){
            header("Location: login.php");
            die();
        }
    ?>

    <div class = "popup" id = "cartPopup"></div>
    <div class="container cart-container">
        <h2>Shopping Cart</h2>
        <div id="cart-items" class="cart-items">

        </div>
        <div class="cart-total">
            Total Price: $<span id="total-price">0.00</span>
        </div>
        <div class="cart-actions">
            <button onclick = "cartItemCheck()" class="btn btn-success
             checkout-btn">Proceed to Checkout</button>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    
    <script src="../JAVAScripts/cart.js"></script>
    <script>
        displayCartItems();
        (function () {
        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
