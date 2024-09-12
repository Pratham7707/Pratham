<html>
<body style="background-image: url(563899-flight-wallpaper.jpg);background-size: cover ;">
	<head><h1>All Cancellations detail</h1></head>
	<style type="text/css">
	h1{
		font-size: 32px;
		color: white;
		margin-top: 50px;
		text-align: center;
	}
    table{
        margin: 0 auto;
        margin-top: 100px ;
        font-size: large;
        background-color: rgba(0, 0, 0, 0.6);

    }
    td{
        margin-top: 10px !important;
        font-size: 18px;
        font-weight: bold;
        color: white;
        font-weight: lighter;
        padding: 15px;
        padding-right: 30px;
        padding-left: 30px;
        text-align: center;
        border-bottom: 1px solid gray;
        
    }
    th{
        background-color: #7de8d1;
        font-weight: bold;
        padding: 15px;
        padding-right: 30px;
        padding-left: 30px;
        text-align: center;
        color: black;
    }
  
</style>
<?php

$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, "a") or die("Connection Failed to select database");

$sql = "select * from cancel";

if($result = mysqli_query($con, $sql))
{
if (mysqli_num_rows($result) > 0) {
    echo "<table>
    <tr>
    <th>Cancellation ID</th>
    <th>Passenger name</th>
    <th>Ticket ID</th>
    <th>Flight number</th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";    
        echo "<td>" . $row['cancel_id'] . "</td>";
        echo "<td>" . $row['cus_name'] . "</td>";
        echo "<td>" . $row['ticket_id'] . "</td>";
        echo "<td>" . $row['flight_id'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "No records found";
}
}
else{
	echo "error could not be display!";
}

mysqli_close($con);

?>
</body>
</html>
