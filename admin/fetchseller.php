<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fet.css">
</head>
<body>
    <table border='1'>
        <tr>
            <th>Full Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Citizen</th>
            <th>Citizen Image</th>
            <th>Pan</th>
            <th>Pan Image</th>
            <th>Description</th>
            <th>Actions</th> 
        </tr>

        <?php
        include_once "../main/connection.php"; //  directory structure

        // Fetch all products from the database
        $sql = "SELECT * FROM sdetail";
        $result = $conn->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["fullname"] . "</td>
                        <td>" . $row["address"] . "</td>
                        <td>" . $row["phonenumber"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["citizen"] . "</td>
                        <td><img src='" . $row["citizenimg"] . "' style='max-width: 300px; max-height:150px;'></td>
                        <td>" . $row["pan"] . "</td>
                        <td><img src='" . $row["panimg"] . "' style='max-width: 300px; max-height: 150px;'></td>
                        <td>" . $row["description"] . "</td>
                      
                        
            <td><a href='..seller/sreg.php?fullname=$row[fullname]&address=$row[address]&phonenumber=$row[phonenumber]&email=$row[email]&citizen=$row[citizen]&citizen img=$row[citizenimg]&pan=$row[pan]&panimg=$row[panimg]&description=$row[description]'><input type='submit' value = 'Edit' clasa= 'Edit'></a>

            <a href='delete.php?id=$row[id]'><input type='submit' value = 'Delete'></a></td
                      </tr>";
            }  
        } else {
            echo "<tr><td colspan='10'>0 results</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </table>

    
</body>

</html>
