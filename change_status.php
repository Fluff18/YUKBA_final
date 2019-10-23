<?php

include("credentials.php");
 
 
 
//post variables 

$status = $_POST['group1'];
$orderno = $_POST['c_order_no'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "$status";
}
$cookie = $_COOKIE['email'];
$sql = "UPDATE `theyukbauser` SET ORDERSTATUS='$status' WHERE ORDERNO=$orderno and BOUTIQUE_EMAIL = '$cookie' ";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo "<script>document.location.href='changestat.php'</script>";
?>