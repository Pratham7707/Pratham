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
$con = mysqli_connect("localhost:3307", "root", "", "a");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, "a");

$x = $_POST['nm'];
$y = $_POST['nm4'];

$sql = "DELETE FROM flights WHERE flight_number='$x' AND airline_name='$y'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}
echo "1 flight deleted";

echo "<br/>";

echo "UPDATED FLIGHT list:";

$result = mysqli_query($con, "SELECT * FROM flights");

echo "<table border='1'>
<tr>
<th>FLIGHT NUMBER</th>
<th>AIRLINE NAME</th>
<th>SOURCE</th>
<th>DESTINATION</th>
<th>FARE</th>
<th>ARRIVAL DATE</th>
<tr/>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['flight_number'] . "</td>";
    echo "<td>" . $row['airline_name'] . "</td>";
    echo "<td>" . $row['source'] . "</td>";
    echo "<td>" . $row['destination'] . "</td>";
    echo "<td>" . $row['fare'] . "</td>";
    echo "<td>" . $row['arriva_date'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
