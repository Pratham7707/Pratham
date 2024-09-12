<?php

$mysqli = new mysqli("localhost:3307", "root", "", "a");

if ($mysqli->connect_error) {
    die('Could not connect: ' . $mysqli->connect_error);
}

$pid = $_POST['nm55'];

echo "PACKAGE booked by:-> " . $_POST['nm11'] . "<br>";
echo "BOOKING DETAILS:";

$stmt = $mysqli->prepare("SELECT * FROM package_details WHERE package_id = ?");
$stmt->bind_param("s", $pid);
$stmt->execute();

$result = $stmt->get_result();

echo "<table border='1'>
<tr>
<th>Package-ID</th>
<th>Location</th>
<th>Date</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['package_id'] . "</td>";
    echo "<td>" . $row['location'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "</tr>";
}

echo "</table>";

$stmt->close();
$mysqli->close();
?>
