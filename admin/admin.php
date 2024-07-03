<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="adminlogi.css">
</head>
<body>
    <form action="adminconnect.php" method="post">
        <div class="von">
            <div class="ll">
        <h1>Welcome admin!</h1>
         <h2>Username  &nbsp;
        <input type="text" name="username" placeholder="username" required></h2>
        <h2>Password &nbsp;
        <input type="password" name="password" placeholder="password" required></h2><br><br>
        

        <button type="submit"  onclick="myfunction2()">Login</button>
            <!-- <script type="text/javascript">
            function myfunction2(){
            window.location.href="admindas.php";}
            </script> -->
    </div>
</div>
    </form>
    
</body>
</html>