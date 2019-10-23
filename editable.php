<html>
<head>
</head>
<script src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js">
</script>

<table id="data_table" class="table table-striped" border="border">

<tr>
<th>ORDERNO</th>
<th>CUSTOMERNAME</th>
<th>PHONENUMBER</th>
<th>TOTALAMOUNT</th>
<th>ADVANCE</th>
<th>FINALAMOUNT</th>
<th>ORDERSTATUS</th>
<th>AMOUNTPAID</th>
<th>ORDERDATE</th>
<th>DELIVERYDATE</th>
<th>ACTUALDELIVERYDATE</th>
<th>PAYMENTTYPE</th>
<th>COMMENTS</th>
</tr>

<tbody>
<?php
/*
$sql_query = "SELECT id, name, gender, address, designation, age FROM developers LIMIT 10";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
*/
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'yukbauser';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$cookie = $_COOKIE['email'];
$sql = "SELECT * FROM `theyukbauser` WHERE BOUTIQUE_EMAIL = '$cookie' ";
$result = $conn->query($sql);
while( $developer = mysqli_fetch_assoc($result) ) {
	
	
	

?>
<tr id="<?php echo $developer ['ORDERNO']; ?>">
<td><?php echo $developer ['ORDERNO']; ?></td>
<td><?php echo $developer ['CUSTOMERNAME']; ?></td>
<td><?php echo $developer ['PHONENUMBER']; ?></td>
<td><?php echo $developer ['TOTALAMOUNT']; ?></td>
<td><?php echo $developer ['ADVANCE']; ?></td>
<td><?php echo $developer ['FINALAMOUNT']; ?></td>
<td><?php echo $developer ['ORDERSTATUS']; ?> </td>
<td><?php echo $developer ['AMOUNTPAID']; ?></td>
<td><?php echo $developer ['ORDERDATE']; ?></td>
<td><?php echo $developer ['DELIVERYDATE']; ?></td>
<td><?php echo $developer ['ACTUALDELIVERYDATE']; ?></td>
<td><?php echo $developer ['PAYMENTTYPE']; ?></td>
<td><?php echo $developer ['COMMENTS']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>