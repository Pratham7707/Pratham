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
    .cancel{
        font-size: 20px;
        background-color: #edd75c;
        border: 1px solid #9e1010;
        border-radius: 8px; 
        padding: 1px 15px 1px 15px;
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

$tid = $_POST['nm'];
session_start();
$_SESSION['ticketID'] = $tid;
$price = $_SESSION['price'];

$stmt = mysqli_prepare($con, "SELECT * FROM booking WHERE ticket_id=?");
mysqli_stmt_bind_param($stmt, "s", $tid);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);


if (mysqli_num_rows($result) > 0) {
   
echo "<table border='1'>
<tr>
<th>Passenger name</th>
<th>Flight number</th>
<th>Ticket Id</th>
<th>Seat number</th>
<th>Fare</th>
<th>Cancel</th>
</tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    ?>
    <form name="cancel2" action="cancel3.php" method="post">
    <?php
    echo "<td>" . $row['cus_name'] . "</td>";
    echo "<td>" . $row['fli_num'] . "</td>";
    echo "<td>" . $row['ticket_id'] . "</td>";
    echo "<td>" . $row['seat_no'] . "</td>";
    echo "<td>" . $price . "</td>";
    $fno = $row['fli_num'];
    ?>

    <td><input type="submit" class="cancel" name="nm90" value="Cancel"></td>
<?php
    echo "</tr>";
}

echo "</table>";
} else {
    echo "No records found";
}

$sql = "DELETE FROM booking WHERE ticket_id=$tid";



mysqli_close($con);
?>
