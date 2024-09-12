<?php
$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_select_db($con, "a");

$sql = "UPDATE flights SET flight_number='{$_POST['nm']}', airline_name='{$_POST['nm4']}', source='{$_POST['nm6']}', destination='{$_POST['nm8']}', fare='{$_POST['nm9']}', arriva_date='{$_POST['nm9']}' WHERE flight_number='{$_POST['nm']}' AND airline_name='{$_POST['nm4']}'";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "DATA MODIFIED";

mysqli_close($con);
?>
