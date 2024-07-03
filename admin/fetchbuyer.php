<?php
include_once "../main/connection.php"; // Adjust the path as per your directory structure

// Fetch all products from the database
$sql = "SELECT * FROM sdetail";
$result = $conn->query($sql);

// Check if there are any products
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'>
            <tr>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Password</th>
                <th>Address</th>
                
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phonenumber"] . "</td>
                <td>" . $row["Password"] . "</td>
                <td>" . $row["address"] . "</td>
                
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
