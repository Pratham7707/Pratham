<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "a";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userid = $conn->real_escape_string($_POST["firstname"]);
$pass = $conn->real_escape_string($_POST["pass"]);

$stmt = $conn->prepare("SELECT * FROM cus_login WHERE username = ?");
$stmt->bind_param("s", $userid);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if ($pass == $row['password']) {
        setcookie('id', $userid, time() + (86400 * 7));
        header("Location: customerhome.html");
        exit();
    } else {
        echo "Invalid username or password";
    }
} else {
    echo "Invalid username or password";
}

$stmt->close();
$conn->close();
?>
