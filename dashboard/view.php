<?php
require_once '../main/connection.php';

session_start();
if (isset($_SESSION['seller_id'])) {
    $sid = $_SESSION['seller_id'];
}

$sql = "SELECT * FROM product where seller_id='$sid'";
$all_product = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
   
    <link rel="stylesheet" href="../landingPage/design.css">
</head>

<body>
    <header>
        <?php include '../landingPage/sheader.php'; ?>
    </header>

    <div class="b1">
        <button class="v">View All</button>


        <?php while ($row = $all_product->fetch_assoc()) : ?>
            <div class="viewal">
                <img src="<?php echo $row['pimg']; ?>" alt="Product Image">
                <br><br>
                <p class="tex">
                Product Description : <br><br>
                   <?php echo $row['descript']; ?>
                <div class="upd">
                <a href='delete.php?id=$result[id]'><button class="bd">Delete</button></a>
                </div>
                <div class="upd">
                    <button class="bd">Modify</button>
                    </a>
                </div>
                <div class="upd">
                    <button class="bd">Unlist</button>
                </div>
            </div>
    </div>

<?php endwhile; ?>


<footer>
    <?php include('../landingPage/footer.php'); ?>
</footer>

<style>
    


 .v{
height: 40px;
width: 110px;
background-color: red;
color: white;
font-size: 19px;
margin-top: 20px;
margin-left: 20px;
} 

.viewal{
    margin-bottom: 30px;
    padding: 120px;
}
.viewal img{
    
    height:370px;
    width: 250px;
    margin-left: 40px;
    margin-top: 20px;
}  
.tex{
text-decoration: underline;
    height:370px;
    width: 700px;
    margin-top: -392px;
    margin-left: 350px;
    border: 2px solid black;
} 

.adds{
       margin-left: 1040px;
    margin-top: 218px;
    }
    .as{
        font-size: 18px;
    }
    .as:hover{
        background-color: red;
    } 
 .upd{
   
   height: 70px;
   width: 170px;
   margin-left: 1120px;
   margin-top: -160px;
   background-color: grey;

} 
 .bd:hover{
    background-color: red;

}
.bd{
    height: 70px;
    width: 170px;
    font-size: 18px;

} 

.fotter{
    margin-top: 40px;
}
 
</style>
</body>

</html>