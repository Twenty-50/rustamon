<?php 
session_start();

if(isset($_SESSION['buyer_id'])){
    header('location: ../seeMore/seemore.php');
    exit();
}

$bid = isset($_SESSION['buyer_id']) ? $_SESSION['buyer_id'] : '';
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
        <form action="verify.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="tel" name="phone" placeholder="Phone" required>
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="remember-forget">
                <label> <input type="checkbox" name="remember"> Remember me </label>
                <label>   <a href="../customercare/help.php">Forgot password?</a> </label>
                
            </div>
            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="../regPage/register.php">Register</a></p>
            </div>
        </form>
    </div>
    
</body>
</html>
