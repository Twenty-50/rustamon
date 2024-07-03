<?php
session_start();

if(isset($_SESSION['seller_id'])){
    $sid = $_SESSION['seller_id'];
}
if(!isset($sid)){
    header('location:../sellerLogin/slogin.php');
}

include('../main/connection.php');

// Use prepared statements to prevent SQL injection
$stmt = "SELECT * FROM product WHERE seller_id = '$sid' ORDER BY RAND() LIMIT 0,3";
$your_product = mysqli_query($conn,$stmt);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="das.css">
    <link rel="stylesheet" href="../landingPage/design.css">
</head>
<body>
    <header>
        <?php include '../landingPage/sheader.php'; ?>
    </header>

    <div class="dash">
        <h1 class="oh">Dashboard for seller</h1>
        <div class="indash">
            <p class="controls">
                <a href="addprod.php"><button class="bt"> add </button></a>
                <a href="view.php"><button class="bt"> view all </button></a>
                <a href="payments.php"><button class="bt"> payments </button></a>
                <a href=""><button class="bt">modify  </button></a>
            </p>
            <div class="prod"> <h3>Your Product</h3></div>
           
            <br>
            <?php while ($row = mysqli_fetch_assoc($your_product)) : ?>
                <div class="dis">
                    <img src="<?php echo ($row['pimg']); ?>" alt="product image">
                </div>
                
            <?php endwhile; ?>
        </div>
    </div>
    
    <footer>
        <div class="fotter"> 
            <?php include('../landingPage/footer.php'); ?>
        </div>
    </footer>
</body>
<style>
    


        .indash {
            display:flex;
            flex-wrap: wrap;
            justify-content: center; /* Adjust as needed */
        }
        .indash .bt{
            margin-left:110px;
        }

        .indash .prod {
            font-size: 30px;
            width: 100%;
            margin-left: 40px;
            margin-top: 40px;
        }
        .dis {
            margin-top: 60px;

            width: 30%; /* Adjust width of each product item */
            margin-bottom: 20px; /* Optional: Add margin between products */
            text-align:left ; /* Center align items */
        }
        .dis img {
    height:400px;
    width: 300px;
    margin-top: 20px;
    margin-left: 80px;
    border:  1px solid rgb(0, 0, 0);
    
}
    </style>
</html>


