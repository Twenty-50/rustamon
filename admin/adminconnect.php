<?php 
 $server="localhost";
 $username="root";
 $password="";
 $dbname="shop";

 $conn = mysqli_connect($server,$username,$password,$dbname);

$username = $_POST ['username'];
$password = $_POST ['password'];

$sql = "SELECT * from admin where username ='$username' && password ='$password'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);


if($count>0){
   
   header("Location:admindas.php");
}
else{
   echo"login failed";
}



?>
