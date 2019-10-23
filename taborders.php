<!DOCTYPE html>
<html>
    <head>
		
	<link rel="stylesheet" href="materialize/css/materialize.min.css">
     <title> Fetching data </title>
		<style>
		
	a.button {
		-webkit-appearance: button;
		-moz-appearance: button;
		appearance: button;
		text-align:center;
		text-decoration: none;
		color: White;
		background-color:Teal;
	}
th{
            background-color: #2bbbad
        }
        tr,th,td{
            border: 1px solid grey;
		text-align: center
        }
.ord{
background-color: #c8e6c9;
}


	</style>
    </head>

    <body>
	
        <table width="400" border="2" cellpadding="2" cellspacing='1'>

           <tr bgcolor="#2ECCFA">
           			<th>Order No</th>
					<th>Name</th>
                     <th>Phno</th>
                     <th>Email</th>
					 <th>Address</th>
					 <th>Total</th>
					 <th>Advance</th>
					 <th>To be Paid</th>
					 <th>Order Date</th>
					 <th>Delivery Date</th>
					 <th>Actual Delivery Date</th>
					 <th>Order Status</th>
					 <th>Comments</th>
					 <th>Cancelled Reason</th>
           </tr>
<script type="text/javascript">
	function fu(yo){
	localStorage.setItem("orderNo", yo);
	window.top.location = "changestat.php"
	}
</script>
<!-- We use while loop to fetch data and display rows of date on html table -->
<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'yukbauser';

//post variables 

$o1 = $_POST['o1'];
$o2 = $_POST['o2'];
$od1 = $_POST['od1'];
$od2 = $_POST['od2'];
$dd1 = $_POST['dd1'];
$dd2 = $_POST['dd2'];
$cname = $_POST['cname'];
$cnum = $_POST['cnum'];
$mail = $_POST['mail'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$cookie = $_COOKIE['email'];
if(!empty($_POST['o1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE `ORDERNO` >= $o1 AND `ORDERNO` <= $o2 AND BOUTIQUE_EMAIL = '$cookie'";
}

if(!empty($_POST['od1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE ORDERDATE BETWEEN '$od1' AND '$od2' AND BOUTIQUE_EMAIL = '$cookie'";
}
if(!empty($_POST['add1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE ACTUALDELIVERYDATE BETWEEN '$add1' AND '$add2' AND BOUTIQUE_EMAIL = '$cookie'";
}
if(!empty($_POST['dd1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE DELIVERYDATE BETWEEN '$dd1' AND '$dd2' AND BOUTIQUE_EMAIL = '$cookie'";
}

if(!empty($_POST['cname']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE CUSTOMERNAME LIKE '$cname' AND BOUTIQUE_EMAIL = '$cookie'";
}

if(!empty($_POST['cnum']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE PHONENUMBER = $cnum AND BOUTIQUE_EMAIL = '$cookie'";
}

if(!empty($_POST['mail']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE EMAIL LIKE '$mail' AND BOUTIQUE_EMAIL = '$cookie'";
}

$sql = $sql1;

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        	$x = $row['ORDERNO'];

        		echo "<td onclick='fu(this.id)' class='ord' id='$x'>".$row['ORDERNO']."</td>";
				echo "<td>".$row['CUSTOMERNAME']."</td>";
				echo "<td>".$row['PHONENUMBER']."</td>";
				echo "<td>".$row['EMAIL']."</td>";
               echo "<td>".$row['ADDRESS']."</td>";
               echo "<td>".$row['TOTALAMOUNT']."</td>";
			   echo "<td>".$row['ADVANCE']."</td>";
			   echo "<td>".$row['FINALTOTAL']."</td>";
			   echo "<td>".$row['ORDERDATE']."</td>";
			   echo "<td>".$row['DELIVERYDATE']."</td>";
			   echo "<td>".$row['ACTUALDELIVERYDATE']."</td>";
			   echo "<td>".$row['ORDERSTATUS']."</td>";
			   echo "<td>".$row['COMMENTS']."</td>";
			   echo "<td>".$row['CancelledReason']."</td>";
			   echo "</tr>"; 
     }
}    
 else {
    echo "0 results";
}

$conn->close();
?>

           

        </table>

   </body>

</html>