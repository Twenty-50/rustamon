<?php 

session_start();
if(isset($_SESSION['seller_id'])){
    header('location: ../dashboard/dash.php');
    exit(); // Ensure to exit after redirection
}


// get inputs
if(isset($_POST['phone']) && isset($_POST['password'])) {
$phone = $_POST['phone'];
$pds = $_POST['password'];


// connection with db with short cut techinque
$conn = mysqli_connect('localhost','root','','shop');

// run match query
 $sql = "SELECT * from saccount where phone ='$phone' && password ='$pds'";
 $result = mysqli_query($conn,$sql);
 $count = mysqli_num_rows($result);

 
if($count>0){
    while ($row = $result->fetch_assoc()) {
        $_SESSION['seller_id']=$row['id'];
        echo"<script>alert(".$row['id'].")</script>";
        echo"login sucessful";
      header("Location:../dashboard/dash.php");
      exit();
}}
else{
    echo"login failed";
}



}

?>