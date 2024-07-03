<?php
session_start();
include('../main/connection.php');

if(isset($session['seller_id'])){
    $sid=$session['seller_id'];
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dokan.com</title>
    <link rel="stylesheet" href="../landingPage/design.css">
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <header>
        <?php include '../landingPage/header.php' ?>
    </header>
<form method="post" action="connectadd.php" enctype="multipart/form-data" >
    <h1 >add</h1>
    <div class="cont1">
        <input type="text" class="s1" placeholder="name" name="pname" required>
              <br>
        <input type="text"  class="s1"placeholder="brand" name="pbrand" required>
            <br>
        <input type="number"  class="s1" placeholder="quantity" name="pquantity" required>
    <br>
    <input type="text" class="s1" placeholder="price" name="pprice" required>
<br>
<div class="h">
upload image at least 1
<input class="s2" type="file" name="pimg" required>
</div>
<br>
<button class="btn1">   List  </button>

</div>
    <div class="cont2">
<h2>
    <i>product details</i>
    
</h2>
<br>

<p>
    <h1>size <input class="c2" type="text" name="sizes"  placeholder="6/7/8/9"> </h1>
     <h1>For 
     <input class="sz" type="text" placeholder="men/kids/women" name="gen" ></h1>
   
</p>
<div class="des">This Product is a ......
    <textarea class="tes" name="pdet" id=""></textarea>
    </div>
</div>
</form>

<footer>
<div class="fotter"> 
    <?php include('../landingPage/footer.php');?>
</footer>
    
</body>
</html>