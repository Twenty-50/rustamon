
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dokan.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="design.css">

</head>
<body>
    <header>
       <!-- header has been made to header php section -->
       <?php include('../landingPage/header.php');?>
    </header>
  
     <div class="hero-section">
        <div class="hero-msg">
            <p>You are on dokan.com. You can also shop on dokan Nepal for millions of product with fast loacl delivery. <a href="#">Click here to go to dokan.np </a></p>
        </div>
     </div>

     <div class="shop-section">
        <div class="box">
            <div class="box-content" >
                <a href="../seeMore/seemore.php">
                    <h2 style="color: black;">Clothes</h2>
            <div class="box-img" style="background-image: url('../amazon/box1_image.jpg');"></div>
            <p><a href="../seeMore/seemore.php"> See more</a></p></a>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Health & Personal Care</h2>
            <div class="box-img" style="background-image: url('../amazon/box2_image.jpg');"></div>
            <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Furniture</h2>
            <div class="box-img" style="background-image: url('../amazon/box3_image.jpg');"></div>
            <p>See more</p>
            </div>
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Gadgets</h2>
            <div class="box-img" style="background-image: url('../amazon/box4_image.jpg');"></div>
            <p>See more</p>
            </div>     
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Beauy Picks</h2>
            <div class="box-img" style="background-image: url('../amazon/box5_image.jpg');"></div>
            <p>See more</p>
            </div>     
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Pets Cure</h2>
            <div class="box-img" style="background-image: url('../amazon/box6_image.jpg');"></div>
            <p>See more</p>
            </div>     
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Kid Toys</h2>
            <div class="box-img" style="background-image: url('../amazon/box7_image.jpg');"></div>
            <p>See more</p>
            </div>     
        </div>
        <div class="box">
            <div class="box-content">
                <h2>Discover Fashion Trends</h2>
            <div class="box-img" style="background-image: url('../amazon/box8_image.jpg');"></div>
            <p>See more</p>
            </div>     
        </div>
     </div>

     <footer>
       <!-- to access the footer section write this code -->
       <?php include('../landingPage/footer.php')?>
     </footer>
</body>
</html>