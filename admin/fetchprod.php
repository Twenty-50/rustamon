<?php
include_once "../main/connection.php"; // Adjust the path as per your directory structure

// Fetch all products from the database
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Check if there are any products
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Size</th>
                <th>Who</th>
                <th>Description</th>
                

            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["pname"] . "</td>
                <td>" . $row["brand"] . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>" . $row["price"] . "</td>
                <td><img src='" . $row["pimg"] . "' style='max-width: 300px; max-height: 150px;'></td>
                <td>" . $row["size"] . "</td>
                <td>" . $row["who"] . "</td>
                <td>" . $row["descript"] . "</td>
                
                
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
