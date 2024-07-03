<?php 
session_start();

if(isset($_SESSION['seller_id'])){
    header('location: ../dashboard/dash.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <form action="verifyseller.php" method="post">
            <h1>Hello Seller !</h1>
            <div class="input-box">
                <input type="number" name="phone"  placeholder="phone" required>
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="remeber-forget">
                <label> <input type="checkbox"> Remember me </label>
                <a href="" onclick=" myfunctiona();">Forget password?</a>
                <script>
                    function myfunctiona() {
                      alert("Please contact admin for resetting your password");
                    };
                </script>
            </div>
            <button type="submit" class="btn" onclick="myfunction2()">Login</button>
            <!-- <script>
                function myfunction2(){
                window.location.href="../dashboard/dash.html";}
            </script> -->

            <div class="register-link">
                <p>Don't have an any account? <a href="../seller/sreg.php">Register</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>