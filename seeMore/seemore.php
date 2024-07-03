<?php

session_start();
if (isset($_SESSION['buyer_id'])) {
  $bid = $_SESSION['buyer_id'];
}

require_once '../main/connection.php';
$sql = "SELECT * FROM product";
$all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothes</title>
    <link rel="stylesheet" href="../landingPage/design.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <?php include('../landingPage/header.php') ?>
    </header>

    <div class="shop1">
        <h4>Dress & Clothes</h4>
        <p> Price and other details may vary based on product size and color.</p>
    </div>

    <form action="" method="post">
        <div class="shop-dress">
            <?php while ($row = mysqli_fetch_assoc($all_product)){ ?>
            <div class="box">
                <div class="box-content">
                    <a href="../buynow/buy.php?id=<?php echo $row['id']; ?>">
                        <h4><?php echo $row['pname'];?></h4>
                        <div class="box-img" style="background-image: url('<?php echo $row['pimg']; ?>');"></div>
                        <p>Rs <?php echo $row['price']; ?></p>
                        <a href="../buynow/buy.php?id=<?php echo $row['id']; ?>" class="btn1">Buy Now</a>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </form>

    <footer>
        <?php include('../landingPage/footer.php') ?>
    </footer>
</body>
<style>
    *{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    border: border-box;
}

/* header section css is in landing page */

/* shop dress */
.shop1{
    background-color: #aeaeae;
}
.shop1 h4{ 
    margin-left: 50px;
    color: #222f32;
}
.shop1 p{
    margin-left: 50px;
    color: #222f32;
}

.shop-dress{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    background-color: #aeaeae;
    
}

.box{
    
    height: 420px;
    width: 23%;
    background-color: white;
    padding: 20px 0 15px;
    margin-top: 15px;
}

.box-img{
    height: 270px;
    background-size: cover;
    margin-top: 1rem;
    margin-bottom: 1rem;
    transition: 0.7s;
}

.box-content{
        margin-top: 1rem;
        margin-left: 1.5rem;
           
    }


 .box-content p{
    color: #007185;
} 
 .box-content h4{
    color: #000000;
} 

.box:hover{
    background-color: #c0c3cc;
    cursor: pointer;
}
/* footer section css is in landing page */

a{
    color:white;
}

.btn1{
   font-size: 20px;
    margin-top: 20px;
    background-color: rgb(19, 33, 82);
    color: rgb(255, 255, 255);
}
</style>
</html>
