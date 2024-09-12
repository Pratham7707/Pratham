<?php
$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$stmt = $con->prepare("UPDATE customer SET addr=?, Age=?, num=?, mailid=? WHERE Name=?");
$stmt->bind_param("sssss", $_POST['nm4'], $_POST['nm6'], $_POST['nm8'], $_POST['nm55'], $_POST['nm']);

if ($stmt->execute()) {
    echo "DATA MODIFIED";
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$con->close();
?>
