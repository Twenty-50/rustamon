<?php 
session_start();

include'../main/connection.php';

if(isset($_session['seller_id'])){
    $sid=$_session['seller_id'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dokan.com</title>
    <link rel="stylesheet" href="pay.css">
    <link rel="stylesheet" href="../landingPage/design.css">
</head>

<body>
    <header>
    <?php include('../landingPage/sheader.php');?> 
    <header >
    <form action="" method="post">
        <div class="cont1">
            <div class="null"></div>

            <br>

            <button class="btn3">add payment</button>
            <div id="pay">
                <input class="m1" type="text" placeholder="account name " required><br>
                <input class="m1" type="number" placeholder="account number" required><br>
                <select class="opt" name="Bank" required>
                    <option value="" disabled selected>Bank Name</option>
                    <option value="">Nabil Bank Ltd</option>
                    <option value="">Globel Ime Bank</option>
                    <option value="">Machhepuchere Bank </option>
                    <option value="">Sanima Bank Ltd</option>
                    <option value="">National Bank</option>

                </select>
            </div>

            <button class="end" type="submit" >submit</button>




        </div>

        <footer>
         <div class="fotter"> 
        <?php include("../landingPage/footer.php");?>  
        <footer>
        </div>

    </form>
</body>

</html>