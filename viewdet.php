<html>
    <head>
    <?php include 'css/css.html'; ?>
    <style>
        th{
            text-align: center;
            background: rgba(19, 35, 47, 0.9)
        }   
        tr,td{
            border: 1px solid grey;
        }
        td{
            align: center;
            color: black;
            background: #c1bdba;
        }
        </style>
    </head>
<body>
    

     
<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'yukbauser';

//post variables 

$o1 = $_POST['o1'];




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3306);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$cookie = $_COOKIE['email'];
$sql = "SELECT * FROM `theyukbauser` WHERE ORDERNO=$o1 AND BOUTIQUE_EMAIL = '$cookie' ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	echo "<table  width='400' border='2' cellpadding='2' cellspacing='1'>";
	echo "<tr>";
	echo "			<th>Name</th>";
   echo "             <th>Phno</th>";
	echo "    <th>Email</th>";
	echo " <th>Address</th>";
	echo "			 <th>Total</th>";
	echo "			 <th>Advance</th>";
	echo "			 <th>To be Paid</th>";
	echo "			 <th>Order Date</th>";
	echo "			 <th>Delivery Date</th>";
	echo "			<th>Actual Delivery Date</th>";
	echo "			 <th>Order Status</th>";
	echo "			 <th>Comments</th>";
    echo " <th> Cancellation reason </th>";
	echo "</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
		
        	$x = $row['ORDERNO'];

        		
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
echo "</table><br>";
$cookie = $_COOKIE['email'];
$sql="SELECT * FROM ITEMS WHERE ORDERNUMBER=$o1 AND BOUTIQUE_EMAIL = '$cookie' ";

echo "<table width='400' border='2' cellpadding='2' cellspacing='1'>";

echo "<tr bgcolor='#2ECCFA'>";
echo "<th>ITEM NAME</th> ";
echo "<th>ITEM RATE</th>" ;
echo "<th>ITEM QUANTITY</th>";
echo "<th>ITEM AMOUNT</th>";
echo "  </tr>";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
				echo "<td>".$row['ITEMNAME']."</td>";
				echo "<td>".$row['ITEMRATE']."</td>";
				echo "<td>".$row['ITEMQUANTITY']."</td>";
               echo "<td>".$row['ITEMAMOUNT']."</td>";
        echo "</tr>";
             
     }
}    
 else {
    echo "0 results";
}
echo "</table><br>";
$conn->close();



// open this directory 
$myDirectory = opendir("Image/uploads/");

    // get each entry
    while($entryName = readdir($myDirectory)) {
        $dirArray[] = $entryName;
    }

    // close directory
    closedir($myDirectory);

    //  count elements in array
    $indexCount = count($dirArray);

   
   

        
        // loop through the array of files and print them all in a list
        for($index=2; $index < $indexCount; $index++) {
            $extension = substr($dirArray[$index], -3);
            $n1=explode("_",$dirArray[$index])[0];
            $n2=explode("_",$dirArray[$index])[1];
            if ($extension == 'jpg' and $n2==$o1 and $n1==$_COOKIE['email']){ // list only jpgs
				echo '<li><img src="Image/uploads//' . $dirArray[$index] . '" alt="Image" /><span>'  . '</span>';
            }   
        }
        
?>

</body>
</html>