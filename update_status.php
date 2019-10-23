<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'yukbauser';
//post variables 

$orderno = $_POST['d_order_no'];
$adate = $_POST['adelivery_date'];
$cash = $_POST['group2'];
$apaid = $_POST['amount_paid'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(!empty($orderno) && !empty($adate) && !empty($cash) && !empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET ACTUALDELIVERYDATE='$adate', PAYMENTTYPE = '$cash', AMOUNTPAID = $apaid WHERE ORDERNO=$orderno";

	$sql2 = "UPDATE `theyukbauser` SET TOTALAMOUNT = AMOUNTPAID + ADVANCE WHERE ORDERNO=$orderno";
}
else if(!empty($orderno) && !empty($adate) && !empty($delivery) && empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET ACTUALDELIVERYDATE='$adate', PAYMENTTYPE = '$cash', AMOUNTPAID = $apaid WHERE ORDERNO=$orderno";
	$sql2 = "UPDATE `theyukbauser` SET TOTALAMOUNT = AMOUNTPAID + ADVANCE WHERE ORDERNO=$orderno";
}
else if(!empty($orderno) && empty($adate) && !empty($cash) && !empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET  PAYMENTTYPE = '$cash', AMOUNTPAID = $apaid WHERE ORDERNO=$orderno";
	$sql2 = "UPDATE `theyukbauser` SET TOTALAMOUNT = AMOUNTPAID + ADVANCE WHERE ORDERNO=$orderno";
}
else if(!empty($orderno) && !empty($adate) && !empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET ACTUALDELIVERYDATE='$adate',  AMOUNTPAID = $apaid WHERE ORDERNO=$orderno";
	$sql2 = "UPDATE `theyukbauser` SET TOTALAMOUNT = AMOUNTPAID + ADVANCE WHERE ORDERNO=$orderno";
}
if(!empty($orderno) && !empty($adate) && empty($cash) && empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET ACTUALDELIVERYDATE='$adate' WHERE ORDERNO=$orderno";
}
if(!empty($orderno) && empty($adate) && !empty($cash) && !empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET PAYMENTTYPE = '$cash', AMOUNTPAID = $apaid WHERE ORDERNO=$orderno";
	$sql2 = "UPDATE `theyukbauser` SET TOTALAMOUNT = AMOUNTPAID + ADVANCE WHERE ORDERNO=$orderno";
}
if(!empty($orderno) && !empty($adate) && !empty($cash) && empty($apaid))
{
	$sql1 = "UPDATE `theyukbauser` SET ACTUALDELIVERYDATE='$adate', PAYMENTTYPE = '$cash' WHERE ORDERNO=$orderno";
}
$sql = $sql1;

if ($conn->query($sql) === TRUE) {
    echo "Updating info happened successfully";
} else {
    echo "Error updating @query 1: " . $conn->error;
}

$sql = $sql2;


if ($conn->query($sql) === TRUE) {
    echo "Updating total amount happened successfully";
} else {
    echo "Error updating @query 2: " . $conn->error;
}

?>