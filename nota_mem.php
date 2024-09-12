<?php
$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$a = $_POST['nm'];
$b = $_POST['nm1'];
$c = $_POST['2nm']; // Check the correctness of this variable name
$d = $_POST['nm4'];
$e = $_POST['nm6'];
$f = $_POST['nm8'];
$g = $_POST['nm55'];

$sql = "INSERT INTO notamem VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g')";
$v = "INSERT INTO cus_login VALUES ('$g', '$b')";

if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
}

echo "Successful signup";

mysqli_query($con, $v);
echo "<a href=\"customerlogin.html\">Proceed</a>";

mysqli_close($con);
?>
