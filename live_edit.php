<?php
include("credentials.php");
 
 
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
$update_field='';
if(isset($input['ORDERSTATUS'])) {
$update_field.= "ORDERSTATUS='".$input['ORDERSTATUS']."'";
} else if(isset($input['AMOUNTPAID'])) {
$update_field.= "AMOUNTPAID='".$input['AMOUNTPAID']."'";
} else if(isset($input['ORDERDATE'])) {
$update_field.= "ORDERDATE='".$input['ORDERDATE']."'";
} else if(isset($input['DELIVERYDATE'])) {
$update_field.= "DELIVERYDATE='".$input['DELIVERYDATE']."'";
} else if(isset($input['ACTUALDELIVERYDATE'])) {
$update_field.= "ACTUALDELIVERYDATE='".$input['ACTUALDELIVERYDATE']."'";
}
$x=$input['ORDERNO'];
if($update_field && $input['ORDERNO']) {
$sql_query = "UPDATE theyukbauser SET $update_field WHERE ORDERNO='$x'";
mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
}
}
?>