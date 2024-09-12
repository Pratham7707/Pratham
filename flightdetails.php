<!DOCTYPE html>
<html>
<head>
</head>
<body style="background-image: url(1307415.png);background-size: cover ;">

<style type="text/css">
    table{
        margin: 0 auto;
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
    button{
        font-size: 20px;
        background-color: #c3cc10;
        border: 1px solid orange;
        border-radius: 8px; 
        padding: 1px 15px 1px 15px;
        color: black;
    }
    *{
        text-decoration: none;
        margin: 0;
        padding: 0;
    }

</style>
</body>
</html>
<?php

$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, "a") or die("Connection Failed to select database");


$source = $_POST["source"];
$dest = $_POST["destination"];
$c1 = $_POST["class"];
$adate = $_POST["date"];
$trip = $_POST["Trip"];

$stmt = mysqli_prepare($con, "SELECT * FROM flights WHERE source=? AND destination=? AND class=? AND arriva_date=?");
mysqli_stmt_bind_param($stmt, "ssss", $source, $dest, $c1, $adate);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "<table>
    <tr>
    <th>Flight number</th>
    <th>Airline name</th>
    <th>source</th>
    <th>destination</th>
    <th>fare</th>
    <th>date</th>
    <th>Class</th>
    <th></th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";    
        echo "<td>" . $row['flight_number'] . "</td>";
        echo "<td>" . $row['airline_name'] . "</td>";
        echo "<td>" . $row['source'] . "</td>";
        echo "<td>" . $row['destination'] . "</td>";
        echo "<td>" . ($trip == "One trip" ? $row['fare'] : $row['fare'] * 2) . "</td>";
        echo "<td>" . $row['arriva_date'] . "</td>";
        echo "<td>" . $row['class'] . "</td>";
        ?>
        <td><button><a href="customerlogin.html">Log in</a></button></td>
<?php


        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "No records found";
}

mysqli_close($con);
?>
