<!DOCTYPE html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../landingPage/design.css">
        <link rel="stylesheet" href="sreeg.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>

<?php include("../landingPage/header.php");?>
 
  <h1>Become a Seller !</h1>
  <form method="POST" action="sellerconnect.php" enctype="multipart/form-data">
  <div> 
         <label for="Username">Full Name</label>
         <input type="text" id="username" placeholder="Enter Full name" name="fname" required >
       </div>

       <div>
         <label for="address">Address</label>
         <input type="text" placeholder="Address"name="address1"required >
       </div>

       <div>
         <label for="contactno">Contact Number</label>
         <input type="number" placeholder="Contact number" name="phone1" required>
       </div>

       <div>
         <label for="emailid">Email </label>
         <input type="email" placeholder="example@gmail.com" name="mail1" required>
       </div>

       <div>
         <label for="Citizenship">Citizenship No</label>
         <input type="number" placeholder="Citizenship no"name="citizen1" required>    
       </div>

       <div>
         <label for="Citizenship pho">Citizenship Photo</label>
         <input type="file" placeholder="Upload Citizenship photo" name="citizenimg" required >
       </div>

       <div>
          <label for="Pan no">Pan no</label>
          <input type="number" placeholder="pan no" name="pan1" required>
       </div>

        <div>
          <label for="pan image">Pan image</label>
          <input type="file" placeholder="pan image" name="panimg" required >
       </div>

       <div>
        <label for="Description">Description</label> <br>
        <textarea name="descript1" placeholder="Description about prdouct you sell" required></textarea>
       </div> 

       <div>
       <a href="./create.php">
        <button class="sbut"  type="submit"> Send request to dokan </button></a>
       </div>
     </form>
     <footer>
        <!-- to include any file <a href="./create.php">Send request to dokan</a>-->
        <?php include('../landingPage/footer.php')?>
    </footer>  

  
  
       
</body>
</html>