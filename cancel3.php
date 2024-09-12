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
<h1 style="text-align:center;text-color:#1a0f3b;background: #bdc3c7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #2c3e50, #bdc3c7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #2c3e50, #bdc3c7);">WELCOME TO <br/> TOURIST MANAGEMENT SYSTEM
</h1>
</td>
<td rowspan="5" style="width:100px;height:150">
</td>

</tr>
</table>
<br>
<h1 style="text-align:center; color:#134254;"><?php
echo "Ticket Cancelled Successfully!! ";?>
<br>
<?php
echo "Refund 90% amount in your account within 24 hours";
?>
</h1>
<br>
<h1 style="text-align:center; color:#0e3b1c;background-color: white; display: inline; margin-left: 550px;"><?php
function generateCancellationID(){
    $timeStamp = time();
    $random = bin2hex(random_bytes(3));
    $cancelID = $random;
    return $cancelID;
}
$cancelID = generateCancellationID();
echo "Your Cancellation ID: ".$cancelID;
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
        $tn = $row['ticket_id'];
        $fn = $row['fli_num'];
    }
  
} else {
    echo "";
}

$sqlInsert = "INSERT INTO cancel (cancel_id, cus_name, ticket_id, flight_id) VALUES (?, ?, ?, ?)";
$stmtInsert = mysqli_prepare($con, $sqlInsert);

if ($stmtInsert) {
    mysqli_stmt_bind_param($stmtInsert, 'ssss',$cancelID, $cn, $tn, $tn);
    mysqli_stmt_execute($stmtInsert);
    mysqli_stmt_close($stmtInsert);
} else {
    echo "Error in preparing SQL statement.";
}
$sql = "DELETE FROM booking WHERE ticket_id = '$ticketID'";
if(mysqli_query($con,$sql))
{
    echo "";
}
else{
    echo "";
}

mysqli_close($con);
?>
