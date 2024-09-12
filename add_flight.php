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
        text-align: center;
        margin-top: 250px ;
        font-size: large;

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

$sql = "INSERT INTO flights (flight_number, airline_name, source, destination, fare, arriva_date, seats , class) 
        VALUES ('$_POST[nm]', '$_POST[nm4]', '$_POST[nm6]', '$_POST[nm8]', '$_POST[nm9]', '$_POST[nm55]', '$_POST[nm56]', '$_POST[nm58]')";

if ($conn->query($sql) === TRUE) {
    echo "1 flight details added<br>";
    echo "UPDATED FLIGHT list:<br>";

    $result = $conn->query("SELECT * FROM flights");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>FLIGHT NUMBER</th>
        <th>AIRLINE NAME</th>
        <th>SOURCE</th>
        <th>DESTINATION</th>
        <th>FARE</th>
        <th>ARRIVAL DATE</th>
        <th>SEATS</th>
        <th>CLASS</th>
        <tr/>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['flight_number'] . "</td>";
            echo "<td>" . $row['airline_name'] . "</td>";
            echo "<td>" . $row['source'] . "</td>";
            echo "<td>" . $row['destination'] . "</td>";
            echo "<td>" . $row['fare'] . "</td>";
            echo "<td>" . $row['arriva_date'] . "</td>";
            echo "<td>" . $row['seats'] . "</td>";
            echo "<td>" . $row['class'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
