<?php

include "../main/connection.php";
session_start();

// Assuming $conn is your MySQLi connection object
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['buyer_id'])) {
    header('Location: ../login/loginn1.php?attempt=1');
    exit();
}
$buyer_id = $_SESSION['buyer_id'];


if (isset($_POST['logout'])) {
    session_destroy();
    header("location: ../login/loginn1.php?logout=1");
    exit();
}
if (isset($_POST['update_cart'])) {
    $cart_id = filter_var($_POST['cart_id'], FILTER_SANITIZE_STRIPPED);
    $qty = filter_var($_POST['qty'], FILTER_SANITIZE_NUMBER_INT);

    $update_qty = "UPDATE `cart` SET qty= '$qty' WHERE id= '$cart_id'";
    if ($conn->query($update_qty) === TRUE) {
        $success_msg[] = "Cart quantity updated";
    } else {
        $error_msg[] = "Error updating cart quantity: " . $conn->error;
    }
}
if (isset($_POST['delete_item'])) {
    $cart_id = filter_var($_POST['cart_id'], FILTER_SANITIZE_STRIPPED);

    $verify_delete_item = "SELECT * FROM `cart` WHERE id= '$cart_id'";
    $result = $conn->query($verify_delete_item);

    if ($result->num_rows > 0) {
        $delete_cart_id = "DELETE FROM `cart` WHERE id='$cart_id'";
        if ($conn->query($delete_cart_id) === TRUE) {
            $success_msg[] = "Successfully deleted a cart item";
        } else {
            $error_msg[] = "Error deleting cart item: " . $conn->error;
        }
    } else {
        $error_msg[] = "Error deleting cart item";
    }
}
if (isset($_POST['empty_cart'])) {
    $verify_empty_item = "SELECT * FROM `cart` WHERE buyer_id= '$buyer_id'";
    $result = $conn->query($verify_empty_item);

    if ($result->num_rows > 0) {
        $delete_cart_id = "DELETE FROM `cart` WHERE buyer_id='$buyer_id'";
        if ($conn->query($delete_cart_id) === TRUE) {
            $success_msg[] = "Emptied the cart";
        } else {
            $error_msg[] = "Error emptying cart: " . $conn->error;
        }
    } else {
        $error_msg[] = "Error emptying cart";
    }
}
$select_cart = "SELECT * FROM `cart` WHERE user_id= '$buyer_id'";
$result = $conn->query($select_cart);

if ($result->num_rows > 0) {
    while ($fetch_carts = $result->fetch_assoc()) {
        // Your existing logic to fetch products and render HTML
    }
} else {
    echo "<p class='empty'>No products added yet.</p>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../landingPage/design.css">
    <style>
        :root {
            --green: rgba(19, 78, 0, 0.956);
        }

        .carts {
            display: flex;
            justify-content: center;
            align-items: center
        }

        .carts .item .cartimg img {
            max-width: 240px;
            height: auto;
            margin: 11px
        }

        .accumulation {
            line-height: 4;
            width: 80%;
            margin: 0 auto;
            text-align: center;
            font-size: 20px;
        }

        .inActive-box {
            display: flex;
        }

        .inActive-element {
            background: #ddd;
            border-color: gray;
        }

        img {
            max-width: 100%;
            max-height: 100%;
            width: 200px;
            height: 200px;
            border: 1px solid black;
            object-fit: contain;
        }

        .box-container,
        .inActive-box {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 80%
        }

        .item {
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            max-width: 300px;
            min-width: 250px;
            padding: 14px;
            margin: 17px 23px;
            border: 3px solid var(--green);
            border-radius: 14px;
        }

        .flex button,
        .flex input {
            margin: 13px;
        }
    </style>
    <title>Cart Page</title>
</head>

<body>
    <?php include "../landingPage/header.php"; ?>


    <section class="sign-board">
        <div class="about-content">
            <h1>Items in Cart</h1>
        </div>
    </section>

    <section class="carts">
        <div class="box-container">
        <?php
$grand_total = 0;
$has_Active_products = false;

// Select cart items
$select_cart_query = "SELECT * FROM `cart` WHERE user_id = '$buyer_id'";
$select_cart_result = mysqli_query($conn, $select_cart_query);

if ($select_cart_result) {
    if (mysqli_num_rows($select_cart_result) > 0) {
        while ($fetch_carts = mysqli_fetch_assoc($select_cart_result)) {
            $product_id = $fetch_carts["product_id"];

            // Select products where status is 'Active'
            $select_products_query = "SELECT * FROM `product` WHERE id = '$product_id'";
            $select_products_result = mysqli_query($conn, $select_products_query);

            if ($select_products_result) {
                if (mysqli_num_rows($select_products_result) > 0) {
                    $fetch_products = mysqli_fetch_assoc($select_products_result);


                    $has_Active_products = true;
?>
                    <form action="" method="POST" class="item" style="height:540px">
                        <input type="hidden" name="cart_id" value="<?= $fetch_carts['id']; ?>">
                        <div class="cartimg">
                            <img src="../amazon/<?= $fetch_products['pimg']; ?>" alt="lost img" class="img">
                        </div>
                        <div class="desc">
                            <h1><?php
                                $product_name = $fetch_products['name'];
                                if (strlen($product_name) > 20) {
                                    $product_name = htmlspecialchars(substr($product_name, 0, 20)) . '... <a style="color:#888;" href="view_page.php?pid=' . $fetch_products["id"] . '">More</a>';
                                }
                                echo $product_name;
                                ?></h1>
                            <strong>From: </strong><?= $sname['s-name'] ?>
                            <p><b>Available stock: </b><?= $fetch_products["available_stock"]; ?></p>
                            <p><strong>Price:</strong> Rs. <?= $fetch_products['price'] ?>/-</p>
                            <p><strong>Calculation: </strong> Rs. <?= $fetch_products['price'] ?> &times; <?= $fetch_carts['qty'] ?></p>
                            <p class="subtotal"><strong>Sub total:</strong> <span>Rs. <?= $sub_total = ($fetch_carts['qty'] * $fetch_carts['price']) ?></span></p>
                        </div>
                        <?php if ($fetch_products['available_stock'] > 0) { ?>
                            <div class="flex">
                                <?php
                                if ($fetch_products['available_stock'] < $fetch_carts['qty']) {
                                    $newqty = $fetch_products['available_stock'];
                                    $updateCart_query = "UPDATE cart SET qty = '$newqty' WHERE id = '{$fetch_carts['id']}'";
                                    $updateCart_result = mysqli_query($conn, $updateCart_query);
                                }
                                ?>
                                <input class="btn" type="number" name="qty" required min="1" value=<?= $fetch_carts['qty'] ?> max="<?= $fetch_products['available_stock'] ?>" maxlength="2" class="qty">
                                <button type="submit" name="update_cart" class="bx bxs-edit fa-edit btn"></button>
                                <a class="btn" href="view_page.php?pid=<?= $fetch_products['id'] ?>"><i class="bx bx-show"></i></a>
                            </div>
                        <?php } else {
                            echo "<div class='empty'>Product not available</div>";
                        } ?>
                        <button type="submit" name="delete_item" class="btn" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
<?php
                    $grand_total += $sub_total;
                }
            }
        }
        if (!$has_Active_products) {
            echo "<p class='empty'>No active products found in the cart.</p>";
        }
    } else {
        echo "<p class='empty'>No products added yet.</p>";
    }
}
?>

        </div>
    </section>

    <hr>

    <section class="inActive-cart">
        <div class="inActive-box">
        <?php
$select_cart_query = "SELECT * FROM `cart` WHERE user_id = '$buyer_id' ORDER BY date_added DESC";
$select_cart_exec = mysqli_query($conn, $select_cart_query);

if ($select_cart_exec) {
    if (mysqli_num_rows($select_cart_exec) > 0) {
        while ($fetch_carts = mysqli_fetch_assoc($select_cart_exec)) {
            $product_id = $fetch_carts["product_id"];
            
            // Fetch products excluding those with status 'Active'
            $select_products_query = "SELECT * FROM `product` WHERE id = '$product_id'";
            $select_products_result = mysqli_query($conn, $select_products_query);

            if ($select_products_result) {
                if (mysqli_num_rows($select_products_result) > 0) {
                    $fetch_products = mysqli_fetch_assoc($select_products_result);
                    $has_inActive_products = true;
?>
                    <form action="" method="POST" class="item inActive-element">
                        <input type="hidden" name="cart_id" value="<?= $fetch_carts['id']; ?>">
                        <div class="cartimg">
                            <img src="../seller/img/<?= $fetch_products['image']; ?>" alt="Product Image" class="img">
                        </div>
                        <div class="desc">
                            <h1><?= $fetch_products['pname']; ?></h1>
                            <p><strong>Price:</strong> Rs. <?= $fetch_products['price'] ?>/-</p>
                            <p><strong>Calculation:</strong> Rs. <?= $fetch_products['price'] ?> &times; <?= $fetch_carts['qty'] ?></p>
                            <p class="subtotal"><strong>Sub total:</strong> <span>Rs. <?= $sub_total = ($fetch_carts['qty'] * $fetch_products['price']) ?></span></p>
                        </div>
                        <div class="empty">Product not available</div>
                        <button type="submit" name="delete_item" class="btn" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
<?php
                    $grand_total += $sub_total;
                }
            } else {
                // Handle query error
                $error_msg[] = "Error fetching product details: " . mysqli_error($conn);
            }
        }

        if (!$has_inActive_products) {
            echo "<p class='empty'>No inactive products found in the cart.</p>";
        }
    } else {
        echo "<p class='empty'>No products found in the cart.</p>";
    }
} else {
    // Handle query error
    echo "Error executing query: " . mysqli_error($conn);
}
?>

            ?>
        </div>
    </section>

    <section class="accumulation">
        <?php if ($grand_total > 0) { ?>
            <div class="cart-total">
                <div class="final-price">
                    <p>Total amount payable: <span><?= $grand_total; ?></span></p>
                </div>
                <div class="summary-buttons">
                    <form action="" method="post">
                        <button type="submit" name="empty_cart" class="btn" onclick="return confirm('Are you sure you want to empty your cart?');">Clear Cart</button>
                        <a href="checkout.php" class="btn">Proceed to Checkout</a>
                    </form>
                </div>
            </div>
        <?php } ?>
    </section>

    <?php include("../landingPage/footer.php"); ?>
</body>

</html>