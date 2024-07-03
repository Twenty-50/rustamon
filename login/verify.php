<?php 
session_start();
if(isset($_SESSION['buyer_id'])){
    header('location: ../seeMore/seemore.php');
    exit(); // Ensure to exit after redirection
}

// Check if phone and password are submitted via POST
if(isset($_POST['phone']) && isset($_POST['password'])) {
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'shop');

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use mysqli_real_escape_string to prevent SQL injection
    $phone = mysqli_real_escape_string($conn, $phone);
    $password = mysqli_real_escape_string($conn, $password);

    // Query to check if user credentials are valid
    $sql = "SELECT * FROM ureg WHERE phone ='$phone' AND password ='$password'";
    $result = mysqli_query($conn, $sql);

    if(!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $count = mysqli_num_rows($result);

    if($count > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        
        // Set session variable
        $_SESSION['buyer_id'] = $row['id'];

        // Redirect to seemore.php
        header('location: ../seeMore/seemore.php');
        exit(); // Exit after redirection
    } else {
        echo "Login failed";
    }

    // Close database connection
} 
?>
