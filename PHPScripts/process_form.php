<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Payment Gateway Form Design using HTML and CSS</title>
    <link rel="stylesheet" href="../CSS/paymentstyle.css">
</head>
<body>
    <div class="container">
        <form action="process_payment.php" method="post">
            <div class="row">
                <div class="column">
                    <h3 class="title">Payment</h3>
                    <div class="input-box">
                        <span>Cards Accepted :</span>
                        <img src="Accepted-Cards-GB-IE.png" alt="">
                    </div>
                    <div class="input-box">
                        <span>Name on Card :</span>
                        <input type="text" name="cardholder_name" placeholder="Jacob Aiden" required>
                    </div>
                    <div class="input-box">
                        <span>Credit Card Number :</span>
                        <input type="text" name="card_number" placeholder="1111 2222 3333 4444" required>
                    </div>
                    <div class="input-box">
                        <span>Exp Month :</span>
                        <input type="text" name="expiration_month" placeholder="August" required>
                    </div>
                    <div class="flex-container">
                        <div class="input-box">
                            <span>Exp. Year :</span>
                            <input type="number" name="expiration_year" placeholder="2025" required>
                        </div>
                        <div class="input-box">
                            <span>CVV :</span>
                            <input type="number" name="cvv" placeholder="123" required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">Buy</button>
        </form>
    </div>

    <script>
        (function () {
            window.onpageshow = function(event) {
                if (event.persisted) {
                    window.location.reload();
                }
            };
        })();
    </script>
</body>
</html>
