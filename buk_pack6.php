<style type="text/css">
	.d1{

	}
</style>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body style="background: #bdc3c7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2c3e50, #bdc3c7);">
<style type="text/css">
                .navbar{
                        background: black; font-family: calibri; padding-right: 15px; padding-left: 15px;
                }
                .navdiv{
                        display: flex; align-items: center; justify-content: space-between; 
                }
                .logo a{
                        font-size: 35px; font-weight: 600; color: white;
                }
                li{
                        list-style: none; display: inline-block;
                }
                li a{
                        color: white; font-size: 18px; font-weight: bold; margin-right: 30px; 
                }
                *{
                        margin: 0;
                        padding: 0;
                        text-decoration: none;

                }
        </style>
        <nav class="navbar">
                <div class="navdiv">
                        <div class="logo"><a href="#"><img src="1000051173.png" width="120px"></a></div>
                        <ul>
                                <li><a href="customerhome.html">Home</a></li>
                        </ul>
                </div>
        </nav>
<table border="0" style="margin-bottom: 40px;">
<tr>
<td rowspan="5" style="width:100px;height:150">
</td>
<td rowspan="5" style="width:1400px;height:150;">

</td>
<td rowspan="5" style="width:100px;height:150">
</td>

</tr>
</table>
<br>
<h1 style="text-align:center; color:#134254;"><?php
echo "Payment successfully!!";
?>
</h1>
<br>
<h1 style="text-align:center; color:#0e3b1c;background-color: white; display: inline; margin-left: 580px;"><?php
function generatePackageID(){
    $timeStamp = time();
    $random = bin2hex(random_bytes(3));
    $packegeID = $random;
    return $packegeID;
}
$packegeID = generatePackageID();
echo "Your Package ID: ".$packegeID;
?></h1>
</body>
</html>
<?php
session_start();
$ticketID = $_SESSION['ticketID'];



$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}
mysqli_select_db($con, "a") or die("Connection Failed to select database");


$stmt = mysqli_prepare($con, "SELECT * FROM booking WHERE ticket_id=?");

mysqli_stmt_bind_param($stmt, "s", $ticketID);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    

    while ($row = mysqli_fetch_array($result)) {
              
        $cn = $row['cus_name'];
        $fn = $row['fli_num'];
        $tn = $row['ticket_id'];
        $sn = $row['seat_no'];
      
    }
  
} else {
    echo "No records found";
}

$sqlInsert = "INSERT INTO package_details (cus_name, fli_num, ticket_id, package_id) VALUES (?, ?, ?, ?)";
$stmtInsert = mysqli_prepare($con, $sqlInsert);

if ($stmtInsert) {
    mysqli_stmt_bind_param($stmtInsert, 'ssss',$cn, $fn, $tn, $packegeID);
    mysqli_stmt_execute($stmtInsert);
    mysqli_stmt_close($stmtInsert);
} else {
    echo "Error in preparing SQL statement.";
}

mysqli_close($con);
?>