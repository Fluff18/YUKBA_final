<html>
<head>
<link rel="stylesheet" href="materialize/css/materialize.min.css">
	<style type="text/css">
		
		body{
			background-image: url("wall1.jpg");
		}
		
		
	</style>
<nav>
<ul id="navul">
	<li id="navli"><a href="new-1.html" id="nava">Home</a></li>
	<li id="navli"><a href="viewdetails.php" id="nava">View Details</a></li>
	<li id="navli"><a href="retPage.php" id="nava">Search Order</a></li>
	<li id="navli"><a href="changestat.php" id="nava">Delivery Status</a></li>
	<li id="navli"><a href="new-1.html" id="nava">Sales</a></li>
</ul>

</head>
<body>
<?php
include("credentials.php");
 
 
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$cookie = $_COOKIE['email'];
$sql = "SELECT SUM(TOTALAMOUNT) AS total FROM theyukbauser WHERE ACTUALDELIVERYDATE=CURDATE() AND BOUTIQUE_EMAIL = '$cookie'  ";
$result = $conn->query($sql);
$service = $result->fetch_assoc();
if($service['total']==0){
	$service['total']=0;
}
if ($result->num_rows > 0) {
    echo "<div  style='font-size:150px;color:black'><br><br><br><center>₹".$service['total']."</center></div>";
} else {
    echo "Error deleting record: " . $conn->error;
}

?>

</body>
</html>