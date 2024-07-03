<?php
session_start();
if (isset($_SESSION['buyer_id'])) {
    $bid = $_SESSION['buyer_id'];
}


require_once '../main/connection.php';
// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);  
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id='$product_id'";
    $all = mysqli_query($conn, $sql);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="../landingPage/design.css">
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                align-items: center;
                min-height: 90vh;


                background-color: #8fd5fe;
                background-image: linear-gradient(160deg, #8fd5fe 0%, #80D0C7 100%);


            }

            .card {
                position: relative;
                width: 90%;
                transform: scale(0.7);
                background: #0000;
                display: flex;
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
                /* overflow: hidden; */
                /* transition: 0.5s ease-in-out;  */
            }


            .card .imgBx {
                position: relative;
                width: 400px;
                height: 700px;
                display: flex;
            }

            .details {
                position: absolute;
                top: 0;
                left: 600px;
                text-align: center;
                height: 100%;

            }

            .details h3 {
                text-align: left;
                font-size: 48px;
                margin-top: 15px;
            }

            .details h4 {
                font-size: 28px;
                text-align: left;
                margin-top: 40px;
            }

            .pag {
                font-size: 20px;
                text-align: left;
                margin-top: 10px;

            }

            .Size {
                display: flex;
                margin-top: 30px;
            }

            .Size li {
                border: #000000 solid 1px;
                list-style-type: none;
                margin: 0;
                text-align: center;
                background-color: #f9f9f9;
                color: black;
                padding: 12px;
                box-sizing: border-box;
                font-size: 25px;
            }

            .Size li:hover {
                background-color: #8BC6EC;
                background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
                box-shadow: 0px -7px;
            }

            .group {
                font-size: 24px;
                margin: 10px;
                float: left;
            }

            .atc,
            .btn {
                margin: 10px;
                font-size: 25px;
                height: 50px;
                background-color: #fff;
                cursor: pointer;
                margin-top: 30px;
            }

            .atc:hover {
                background-color: #8BC6EC;
                background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
                box-shadow: -5px -5px;
            }
        </style>
    </head>

    <body>
        <?php include("../landingPage/header.php"); ?>

        <?php while ($row = mysqli_fetch_assoc($all)) { ?>
            <div class="card">
                <div class="imgBx">
                    <img src="<?php echo  $row['pimg'] ?>" alt="">
                </div>
                <div class="details">
                    <form action="" method="post">

                        <h3 class="pn"><?php echo $row['pname'] ?> </h3>
                        <h3 class="pp">Rs <?php echo $row['price'] ?> </h3>
                        <h4>Product Details</h4>
                        <p class="pag"><?php echo $row['descript'] ?></p>
                        <h4>Size</h4>
                        <select name="cat" id="cat" required>
                            <option value="XL">Extra large</option>
                            <option value="L">Large</option>
                            <option value="M">Medium</option>
                            <option value="S">small</option>
                        </select>

                        
                        <!-- <ul class="Size">
                            
                            <input type="radio" name="cat" value="S"></input>
                            <input type="radio" name="cat" value="l"></input>
                            <input type="radio" name="cat" value="xl"></input>
                            <li>S</li>
                            <li>M</li>
                            <li>L</li>
                            <li>XL</li>
                        </ul> -->
                        <div class="group">
                            <button class="atc" onclick="myfunction()">BUY NOW</button>

                            <input class="btn" type="number" name="qty" id="qty" value="1" min="1">
                            <br>
                            <a href="../addtocart/cart.php">

                        </div>
                        <button class="atc" name="atc"> + Add to Cart</button></a>
                    </form>
                </div>
            </div>
            <script>
                function myfunction() {
                    window.alert("thanks for buying");
                }
            </script>

            <footer>
                <?php include("../landingPage/footer.php"); ?>
            </footer>
    <?php
        }
    }
    
    if (isset($_POST['atc'])) {
        $qty = $_POST['qty'];
        $cat = $_POST['cat'];
        $product_id = $_GET['id'];
        // Assuming you have a valid MySQLi connection in $conn
    
        // Query to verify if the product is already in the cart
        $verify_cart_query = "SELECT * FROM `cart` WHERE user_id = $bid AND product_id = $product_id";
        $verify_cart_result = mysqli_query($conn, $verify_cart_query);
    
        // Query to count the number of items in the cart
        $max_cart_items_query = "SELECT * FROM `cart` WHERE user_id = $bid";
        $max_cart_items_result = mysqli_query($conn, $max_cart_items_query);
    
        if (mysqli_num_rows($verify_cart_result) > 0) {
            echo "<script>alert('product is already in cart')</script>";
        } else if (mysqli_num_rows($max_cart_items_result) > 20) {
            echo "<script>alert('cart is already full')</script>";
        } else {
            // Query to select the price of the product
            $select_price_query = "SELECT * FROM `product` WHERE id = $product_id";
            $select_price_result = mysqli_query($conn, $select_price_query);
            $fetch_price = mysqli_fetch_assoc($select_price_result);
    
            // Sanitize variables to prevent SQL injection
            $cat = mysqli_real_escape_string($conn, $cat);
    
            // Query to insert the product into the cart
            $insert_cart_query = "INSERT INTO `cart` (user_id, product_id, price, qty, size) VALUES ($bid, $product_id, {$fetch_price['price']}, $qty, '$cat')";
            mysqli_query($conn, $insert_cart_query);
    
            echo "<script>alert('inserted " . $qty . " products into the cart')</script>";
        }
    }
    
    // Close the prepared statements
    // $verify_cart->close();
    // $max_cart_items->close();
    // $select_price->close();
    // $insert_cart->close();

    ?>

    </body>



    </html>