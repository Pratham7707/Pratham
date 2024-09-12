<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body style="background: #bdc3c7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2c3e50, #bdc3c7);">
<style type="text/css">
    <style type="text/css">
    table{
        
        margin-top: 250px ;
        font-size: large;
        margin-left: 100px;

    }
    td{
        margin-top: 10px !important;
        font-size: 16px;
        font-weight: bold;
        color: #424242;
        background-color: white;
    }
    th{
       background: rgb(34,193,195);
background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(210,172,90,1) 100%);
        font-weight: bold;
        padding: 15px;
        padding-right: 30px;
        padding-left: 30px;
        text-align: center;
    }
  
    td{
        font-weight: lighter;
        padding: 15px;
        padding-right: 30px;
        padding-left: 30px;
        text-align: center;
    }
</style>
</body>
</html>
<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "a";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the DELETE statement
$stmt = $conn->prepare("DELETE FROM customer WHERE name=? AND mailid=?");
$stmt->bind_param("ss", $_POST['nm'], $_POST['nm55']);

// Execute the DELETE statement
if ($stmt->execute()) {
    echo "Customer deleted<br><br>";
} else {
    echo "Error: " . $conn->error;
}

echo "UPDATED customer list:<br>";

// Display the updated customer list
$result = $conn->query("SELECT * FROM customer");

if ($result->num_rows > 0) {
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Age</th>
    <th>Number</th>
    <th>Mail-id</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row['name'] . "</td>
        <td>" . $row['addr'] . "</td>
        <td>" . $row['age'] . "</td>
        <td>" . $row['num'] . "</td>
        <td>" . $row['mailid'] . "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
