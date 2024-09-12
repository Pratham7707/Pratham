<?php
$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, "a") or die("Connection Failed to select database");



echo "Flight booked by:-> " . $_POST['nm'];
echo "<br>";
echo "BOOKING DETAILS:";

$query = "SELECT * FROM flights where flight_number=?;
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$row = mysqli_fetch_array($result);

if ($row) {
    $useats = $row['seats'];
    $useats = ($useats - 1);

    echo "<br>";
    echo "Remaining seats: " . $useats;

    $sqlUpdate = "UPDATE flights set seats='$useats' where flight_number='$fnum'";
    
    

    if (!mysqli_query($con, $sqlUpdate)) {
        die('Error: ' . mysqli_error($con));
    }

    echo "Ticket Booked";
} else {
    echo "Flight not found.";
}

$sqlInsert = "INSERT INTO booking (cus_name, fli_num) VALUES (?, ?)";
$query1 = "SELECT * FROM booking";
$stmt = mysqli_prepare($con, $sqlInsert);
    mysqli_stmt_bind_param($stmt, 'ss', $_POST['nm'], $_POST['nmm5']);
    mysqli_stmt_execute($stmt);
$result1 = mysqli_query($con, $query1);

if (mysqli_num_rows($result1) > 0) {
    echo "<table border='1'>
    <tr>
    <th>Custome name</th>
    <th>Flight number</th>
    </tr>";
    while ($row1 = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>" . $row1['cus_name'] . "</td>";
        echo "<td>" . $row1['fli_num'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

mysqli_close($con);

?>