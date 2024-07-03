<?php
session_start();
include('../main/connection.php');

if (isset($_SESSION['seller_id'])) {
    $sid = $_SESSION['seller_id'];
} else {
    // Handle the case where seller_id is not set in the session
    echo "Seller ID is not set in the session.";
    exit;
}

// Function to generate a unique filename
function generateUniqueFileName($prefix) {
    return $prefix . '_' . uniqid();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare variables for SQL insertion
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $who = mysqli_real_escape_string($conn, $_POST['who']);
    $descript = mysqli_real_escape_string($conn, $_POST['descript']);

    // Handle file upload
    $uploadDir = '../amazon/'; // Directory where images will be uploaded

    $tempFileName = generateUniqueFileName('product'); // Generate unique filename
    $tempFilePath = $uploadDir . $tempFileName;

    $uploadedFile = $_FILES['pimg']['tmp_name'];
    $fileExtension = pathinfo($_FILES['pimg']['name'], PATHINFO_EXTENSION);
    $finalFilePath = $tempFilePath . '.' . $fileExtension;

    if (move_uploaded_file($uploadedFile, $finalFilePath)) {
        $pimg = $finalFilePath; // Set image path in database
    } else {
        echo "Error uploading image.";
        exit; // Exit script if image upload fails
    }

    // SQL query to insert data into database
    $sql = "INSERT INTO product (seller_id, pname, brand, quantity, price, pimg, size, who, descript)
            VALUES ('$sid', '$pname', '$brand', '$quantity', '$price', '$pimg', '$size', '$who', '$descript')";

    if ($conn->query($sql) === TRUE) {
        header("location:view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="../landingPage/design.css">
  <link rel="stylesheet" href="product.css">
</head>
<body>
  <?php include '../landingPage/sheader.php'?>
  <div class="container">
    <h2>Add Product</h2>
    <form action="" method="POST" enctype="multipart/form-data">
      <label for="pname">Product Name:</label>
      <input type="text" id="pname" name="pname" >

      <label for="brand">Brand:</label>
      <input type="text" id="brand" name="brand" >

      <label for="quantity">Quantity:</label>
      <input type="text" id="quantity" name="quantity" >

      <label for="price">Price:</label>
      <input type="number" id="price" name="price" >

      <label for="pimg">Product Image URL:</label>
      <input type="file" id="pimg" name="pimg">

      <label for="size">Size:</label>
      <input type="text" id="size" name="size">

      <label for="who">For:</label>
      <input type="text" id="who" name="who">

      <label for="descript">Description:</label>
      <textarea id="descript" name="descript" rows="4"></textarea>

      <input type="submit" value="List">
    </form>
  </div>
  <?php include '../landingPage/footer.php'?>
</body>
</html>
