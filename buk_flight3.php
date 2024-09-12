<?php


session_start();
$ticketID = $_SESSION['ticketID'];
$fno1 = $_SESSION['fno'];
$cname = $_SESSION['cname'];
// Now you can use $ticketID in this file

$tid = $ticketID;
$con = mysqli_connect("localhost:3307", "root", "", "a");

if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

$stmt = mysqli_prepare($con, "SELECT * FROM booking WHERE ticket_id=? and cus_name=?");

mysqli_stmt_bind_param($stmt, "ss", $tid, $cname);
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

$stmt1 = mysqli_prepare($con, "SELECT * FROM flights WHERE flight_number=?");
mysqli_stmt_bind_param($stmt1, "s", $fno1);
mysqli_stmt_execute($stmt1);
$result1 = mysqli_stmt_get_result($stmt1);

if (mysqli_num_rows($result1) > 0) {
    

    while ($row1 = mysqli_fetch_array($result1)) {
        $an = $row1['airline_name'];
        $source = $row1['source'];
        $dest = $row1['destination'];
        $fare = $row1['fare'];
        $arrdate = $row1['arriva_date'];
        $class = $row1['class'];
      
    }

} else {
    echo "No records found";
}

mysqli_close($con);
?>
<html>
<body style="background-color: #dbedad ;">
       
  <link rel="stylesheet" type="text/css" href="style3.css">
  <div class="wrapper">
    <div class="ticket-one">
      <div class="main-pass">
        <div class="flight-heading">
          <div class="blanks"></div>
          <div class="fheading">
            <h3><?php echo $an; ?></h3>
            <h2>Ticket</h2>
          </div>
        </div>
        <div class="main-flight-details">
          <div class="margin-color-code">
            <div class="barcode-container">
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
            </div>
            <div class="mfbtime">
              <p><?php echo $tn; ?></p>
            </div>
          </div>
          <div class="mf-details">
            <div class="mf-stampc">
              <div class="mftravelstamp">
                <p><?php echo $arrdate; ?></p>
                <p>&#9733;<?php echo $source?>&#9733;</p>
              </div>
              <div class="mfsecuritystamp">
                <p>AVIATION SECURITY</p>
                <p style="color:rgb(41, 123, 41);">checked</p>

              </div>
            </div>

            <div class="pdetails">
              <div class="pname">
                <p>passenger</p>
                <p><?php echo $cn; ?></p>
              </div>
              <div class="pfrom">
                <p>From</p>
                <p><?php echo $source; ?></p>
              </div>
              <div class="pto">
                <p>To</p>
                <p><?php echo $dest; ?></p>
              </div>
            </div>
            <div class="passdetails">
              <div class="passgate">
                <p>Gate</p>
                <p><?php
                $randno = rand(1,7);
                 echo $randno;  ?></p>
              </div>
              <div class="passflight">
                <p>Flight</p>
                <p><?php echo $fn; ?></p>
              </div>
              <div class="passdate">
                <p>Date</p>
                <p><?php echo $arrdate; ?></p>
              </div>
              <div class="passseat">
                <p>Seat</p>
                <p><?php echo $sn; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="counter-pass">
        <div class="cpboardingstampc">
          <div class="boardingstamp">
            <p>boarded</p>
            <p><?php $currentTime = date('H:i');
            echo $currentTime;
             ?></p>
          </div>
        </div>
        <h3><?php echo $an; ?></h3>
        <div class="cpassname">
          <p>Name of passenger</p>
          <p><?php echo $cn; ?></p>
        </div>
        <div class="cpassfrom">
          <p>From</p>
          <p><?php echo $source; ?></p>
        </div>
        <div class="cpassto">
          <p>TO</p>
          <p><?php echo $dest; ?></p>
        </div>
        <div class="cpassdetails">
          <div class="cpass">
            <p>Gate</p>
            <p><?php echo $randno; ?></p>
          </div>
          <div class="cpass">
            <p>Date</p>
            <p><?php echo $arrdate; ?></p>
          </div>
          <div class="cpass">
            <p>Flight</p>
            <p><?php echo $fn; ?></p>
          </div>
        </div>
        <div class="cpassimp">
          <div class="cpassimp1">
            <p>Boarding time</p>
            <p><?php $currentTime = date('H:i');
            echo $currentTime; 
          ?></p>
          </div>
          <div class="cpassimpseat">
            <p>Seat</p>
            <p><?php echo $sn; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- second ticket -->
  <div id="ticketTwo" class="wrapper">
    <div class="ticket-one">
      <div class="main-pass">
        <div class="flight-heading">
          <div class="blanks"></div>
          <div class="fheading">
            <h3><?php echo $an; ?></h3>
            <h2>Ticket</h2>
          </div>
        </div>
        <div class="main-flight-details">
          <div class="margin-color-code">
            <div class="barcode-container">
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline3"></div>
              <div class="codeline4"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline2"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline3"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
              <div class="codeline1"></div>
            </div>
            <div class="mfbtime">
              <p><?php echo $tn; ?></p>
            </div>
          </div>
          <div class="mf-details">
            <div class="pdetails">
              <div class="pname">
                <p>passenger</p>
                <p><?php echo $cn; ?></p>
              </div>
              <div class="pfrom">
                <p>From</p>
                <p><?php echo $source; ?></p>
              </div>
              <div class="pto">
                <p>To</p>
                <p><?php echo $dest; ?></p>
              </div>
            </div>
            <div class="passdetails">
              <div class="passgate">
                <p>Gate</p>
                <p><?php echo $randno; ?></p>
              </div>
              <div class="passflight">
                <p>Flight</p>
                <p><?php echo $fn; ?></p>
              </div>
              <div class="passdate">
                <p>Date</p>
                <p><?php echo $arrdate; ?></p>
              </div>
              <div class="passseat">
                <p>Seat</p>
                <p><?php echo $sn; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="counter-pass">
        <h3><?php echo $an; ?></h3>
        <div class="cpassname">
          <p>Name of passenger</p>
          <p><?php echo $cn; ?></p>
        </div>
        <div class="cpassfrom">
          <p>From</p>
          <p><?php echo $source; ?></p>
        </div>
        <div class="cpassto">
          <p>TO</p>
          <p><?php echo $dest; ?></p>
        </div>
        <div class="cpassdetails">
          <div class="cpass">
            <p>Gate</p>
            <p><?php echo $randno; ?></p>
          </div>
          <div class="cpass">
            <p>Date</p>
            <p><?php echo $arrdate; ?></p>
          </div>
          <div class="cpass">
            <p>Flight</p>
            <p><?php echo $fn; ?></p>
          </div>
        </div>
        <div class="cpassimp">
          <div class="cpassimp1">
            <p>Boarding time</p>
            <p><?php $currentTime = date('H:i');
            echo $currentTime;
             ?></p>
          </div>
          <div class="cpassimpseat">
            <p>Seat</p>
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  </script>
</body>
</html>
