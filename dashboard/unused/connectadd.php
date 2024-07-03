<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

$conn =  mysqli_connect($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product= $_POST['pname'];
$brand= $_POST['pbrand'];
$quantity= $_POST['pquantity'];
$price= $_POST['pprice'];
$pimg= $_FILES['pimg']['name'];
$size= $_POST['sizes'];
$who= $_POST['gen'];
$descript= $_POST['pdet'];

$target_dir = "../amazon/"; // Replace with your upload directory path
$pimg = $target_dir . basename($_FILES['pimg']['name']);

if (move_uploaded_file($_FILES["pimg"]["tmp_name"], $pimg)) {
  echo "The file ". basename( $_FILES["pimg"]["name"]). " has been uploaded.";
} else {
  echo "Sorry, there was an error uploading your image: ";
  echo mysqli_error($conn); // Check for upload errors (if any)
}

$sql ="INSERT INTO product (pname,brand,quantity,price,pimg,size,who,descript) 
VALUES ('$product','$brand','$quantity','$price','$pimg','$size','$who','$descript')";

$stmt = mysqli_query($conn,$sql);

if($stmt== true){
    header("location:view.php");
}
else{
    echo"register unsucessful";
}

mysqli_close($conn);

?>