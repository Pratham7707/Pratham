<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body style="background: #bdc3c7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2c3e50, #bdc3c7);">

</body>
</html>
<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "a";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$tid = $_POST['nm']; // Sanitize user input here
session_start();
$_SESSION['ticketID'] = $tid;
$stmt = $con->prepare("SELECT * FROM booking WHERE ticket_id=?");
$stmt->bind_param("s", $tid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Passenger Nanme</th>
    <th>Flight Number</th>
    <th>Ticket ID</th>
    <th>Seat number</th>
    <th>Add Package</th>
    </tr>";

    echo "<tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        ?>
        <form name="pack4" action="buk_pack4.php" method="post">
  
        <?php 
        echo "<td>" . $row['cus_name'] . "</td>";
        echo "<td>" . $row['fli_num'] . "</td>";
        echo "<td>" . $row['ticket_id'] . "</td>";
        echo "<td>" . $row['seat_no'] . "</td>"; ?>
        <td><input type="submit" class="add"  value="Add"></td>
        
<?php
        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "No records found";
}
mysqli_close($con);
?>
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
    .add{
        font-size: 18px;
        color: white;
        background-color: black;
        text-align: center;
        border: 1px solid white;
        border-radius: 8px; 
        padding: 2px 15px 2px 15px;
    }