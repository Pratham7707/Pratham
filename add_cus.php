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

$con = mysqli_connect("localhost:3307", "root", "","a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$name = mysqli_real_escape_string($con, $_POST['nm']);
$address = mysqli_real_escape_string($con, $_POST['nm4']);
$age = mysqli_real_escape_string($con, $_POST['nm6']);
$number = mysqli_real_escape_string($con, $_POST['nm7']);
$email = mysqli_real_escape_string($con, $_POST['nm55']);

$sql = "INSERT INTO customer (name, addr, age, num, mailid) VALUES ('$name', '$address', '$age', '$number', '$email')";

if (mysqli_query($con, $sql)) {
    echo "1 customer details added<br/>";
    echo "UPDATED customer list:<br/>";

    $result = mysqli_query($con, "SELECT * FROM customer");

    echo "<table border='1'>
    <tr>
    <th>Customer name</th>
    <th>Address</th>
    <th>Age</th>
    <th>Contact Number</th>
    <th>Email ID</th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['addr'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['num'] . "</td>";
        echo "<td>" . $row['mailid'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo 'Error: ' . mysqli_error($con);
}

mysqli_close($con);

?>
