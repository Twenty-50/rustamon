<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dokan.com</title>
    <link rel="stylesheet" href="create.css">
    <link rel="stylesheet" href="../landingPage/design.css">
</head>

<body>
    <!-- header  -->
    <?php include('../landingPage/header.php');?>
    <!-- header  -->
    <h1>
        welcome to dokan
    </h1>
    <form action="sconn.php" method="post">
        <div class="container">
            <h1>Create a Account</h1>
            <input type="phone" class="s1" placeholder="phone"  name="phone1" required>
            <input type="password" class="s2" placeholder="password" name="password1" required>
            
            <div class="gor">
                <h2 class="ca">Category</h2>
                <input type="radio" name="choice" id="Shoe" value="shoe">
                <label for="shoe">shoes</label>
                <input type="radio" name="choice" id="Clothes" value="clothes">
                <label for="clothes">clothes</label>
                <input type="radio" name="choice" id="both" value="both">
                <label for="clothes">both</label>
            </div>

            <div class="last">
                <button class="btn" onclick="showalert()">Register</button>
        <!-- <script> 
        function myfunction1(){
            window.alert('registration success');
            window.location.href="../sellerlogin/slogin.php";
            
        }
        </script> -->
            </div>
        </div>
    </form>
    <!-- footer    -->
    <div class="fotter">
        <?php include("../landingPage/footer.php");?>
    </div>
    <!-- footer -->
</body>

</html>