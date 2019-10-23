<!DOCTYPE html>
<html>
<head>
	<?php include 'css/css.html'; ?>
	<title>View</title>
<nav>
<ul id="navul">
	<li id="navli"><a href="new-1.php" id="nava">Home</a></li>
	<li><a href="login/profile.php" id="nava">Profile</a></li>
	<li id="navli"><a href="viewdetails.php" id="nava">View Details</a></li>
	<li id="navli"><a href="retPage.php" id="nava">Search Order</a></li>
	<li id="navli"><a href="changestat.php" id="nava">Delivery Status</a></li>
	<li id="navli"><a href="" id="nava">Sales</a></li>
</ul>
</nav>
</head>
<script type="text/javascript">
function func(){
<?php

include("credentials.php");
 
 
 

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
	$sql1 = "SELECT * FROM `theyukbauser` WHERE ORDERNO >= $o1 AND ORDERNO <=$o2  AND BOUTIQUE_EMAIL = '$cookie' ";
}

if(!empty($_POST['od1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE ORDERDATE BETWEEN '$od1' AND '$od2' AND BOUTIQUE_EMAIL = '$cookie'  ";
}

if(!empty($_POST['dd1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE DELIVERYDATE BETWEEN '$dd1' AND '$dd2'  AND BOUTIQUE_EMAIL = '$cookie'  ";
}

if(!empty($_POST['add1']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE ACTUALDELIVERYDATE BETWEEN '$add1' AND '$add2'  AND BOUTIQUE_EMAIL = '$cookie' ";
}

if(!empty($_POST['cname']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE CUSTOMERNAME IS $cname  AND BOUTIQUE_EMAIL = '$cookie' ";
}

if(!empty($_POST['cnum']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE PHONENUMBER = $cnum  AND BOUTIQUE_EMAIL = '$cookie' ";
}

if(!empty($_POST['mail']))
{
	$sql1 = "SELECT * FROM `theyukbauser` WHERE EMAIL IS $mail  AND BOUTIQUE_EMAIL = '$cookie' ";
}


echo gettype($o1);
echo $sql1;
$sql = $sql1;



$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
				echo "<td>".$row['CUSTOMERNAME']."</td>";
				echo "<td>".$row['PHONENUMBER']."</td>";
				echo "<td>".$row['EMAIL']."</td>";
               echo "<td>".$row['ADDRESS']."</td>";
              echo "<td>".$row['TOTALAMOUNT']."</td>";
			   echo "<td>".$row['ADVANCE']."</td>";
			   echo "<td>".$row['FINALAMOUNT']."</td>";
			   echo "<td>".$row['ORDERDATE']."</td>";
			   echo "<td>".$row['DELIVERYDATE']."</td>";
			   echo "<td>".$row['ACTUALDELIVERYDATE']."</td>";
			   echo "<td>".$row['COMMENTS']."</td>";
			   echo "</tr>"; 
     }
}    
 else {
    echo "0 results";
}	

$conn->close();

?>
}
</script>
<body>
<div class="form">
	<h1>Search Order</h1>
<form action="taborders.php" method="POST" target="myframe">
		
<h4>Order Number <h4>
		<div class="field-wrap">
			<label id="from">FROM </label> 
			<input type="number" class="validate" name="o1" min="1" style="width: 20%">
		</div>
		<div class="field-wrap">
			<label id="to">TO </label> 
			<input type="number" name="o2" min="1" style="width: 20%">
		</div>

<h4>Order Date </h4>
<div class="field-wrap">
	<label  class="active highlight">FROM </label>
	<input type="date" style="width: 20%" class="validate" name="od1" min="1">
</div>
<div class="field-wrap">
	<label  class="active highlight">TO </label>
	<input type="date" style="width: 20%" name="od2" min="1">
</div>

<h4>Delivery Date </h4>
<div class="field-wrap">
	<label class="active highlight">FROM </label>
	<input style="width: 20%;" type="date" class="validate" name="dd1" min="1">
</div>
<div class="field-wrap">
	<label class="active highlight">TO </label>
	<input type="date" name="dd2" min="1" style="width: 20%;">
</div>

<h4>Actual Delivery Date </h4>
<div class="field-wrap" style="width: 20%">
	<label class="active highlight">FROM </label>
	<input style="width: 20%;" type="date" class="validate" name="add1" min="1">
</div>
<div class="field-wrap">
	<label class="active highlight">TO </label>
	<input type="date" name="add2" min="1" style="width: 20%;">
</div>

<div class="field-wrap">
	<label>Name </label>
	<input type="text" class="validate" name="cname">
</div>

<div class="field-wrap">
	<label>Number </label>
	<input type="number"  class="validate" name="cnum" min="1000000000" max="9999999999">
</div>

<div class="field-wrap">
	<label>Email </label>
	<input type="email"  class="validate" name="mail">
</div>

<input onclick="func()" type="submit" class="btn waves-effect waves-light" name="submit" value="SUBMIT BUTTON" >
</form>		
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="index.js"></script>
</body>

<body>

<iframe name="myframe" style="height:1000px; width:1500px" id="fr1">
	<table width="400"  cellpadding="2" cellspacing='1'>

           <tr bgcolor="#2ECCFA">
					<th>Name</th>
                     <th>Phno</th>
                     <th>Email</th>
					 <th>Address</th>
					 <th>Total</th>
					 <th>Advance</th>
					 <th>To be Paid</th>
					 <th>Order Date</th>
					 <th>Actual Delivery Date</th>
					 <th>Delivery Date</th>
					 <th>Comments</th>
           </tr>
     </table>
</iframe>
</body>
</html>