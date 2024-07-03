<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set parameters and execute
$fullname = $_POST['fname'];
$address = $_POST['address1'];
$phonenumber = $_POST['phone1'];
$email = $_POST['mail1'];
$citizenno = $_POST['citizen1'];
$citizenimg = $_FILES['citizenimg']['name'];
$panno = $_POST['pan1'];
$panimg = $_FILES['panimg']['name'];
$description = $_POST['descript1'];




$target_dir = "../pan/"; // Replace with your upload directory path
$citizenimg = $target_dir . basename($_FILES['citizenimg']['name']);
$panimg = $target_dir . basename($_FILES['panimg']['name']);

// Validate and move uploaded files (refer to PHP documentation for details)
if (move_uploaded_file($_FILES["citizenimg"]["tmp_name"], $citizenimg) && move_uploaded_file($_FILES["panimg"]["tmp_name"], $panimg)) {
  // Upload successful
} else {
  // Upload failed, handle the error
  echo "Sorry, there was an error uploading your images.";
}



$sql ="INSERT INTO sdetail(fullname,address,phonenumber,email,citizen,citizenimg,pan,panimg,description)
VALUES ('$fullname','$address','$phonenumber','$email','$citizenno','$citizenimg','$panno','$panimg','$description')";

$stmt= mysqli_query($conn,$sql);

if($stmt== true){
    header("location:create.php");
}
else{
    echo"register unsucessful";
}


?>