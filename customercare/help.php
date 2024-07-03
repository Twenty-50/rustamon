
<?php 


if (isset($_SESSION['buyer_id'])) {
    $bid = $_SESSION['buyer_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer care</title>
    <link rel="stylesheet" href="helps.css">
    <link rel="stylesheet" href="../landingPage/design.css">
</head>
<body>
    <header>
    <?php include('../landingPage/header.php');?>
    </header>
    
    <div class="cc">
   <h1 class="greatin">Welcome to Dokan Customer Care!</h1> <br><br><br>

    <div class="help">
        <h1 class="post">Please contact for fast service</h1>
        <h2 class="num"> Mobile no: &nbsp; 9870252503</h2>
        
        <h2 class="num"> Email: &nbsp; Pandit123@gmail.com</h2>
        <h2 class="num"> Fax no: &nbsp; 07up45625</h2>
    </div>
    <br><br><br>
    <div class="tha">Thank you For Your Support</div>
</div>
<footer>
<?php include('../landingPage/footer.php');?>
</footer>

</body>
</html>