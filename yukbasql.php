<!DOCTYPE html>
<html>
<head>
	<title>create table</title>
<?php

include("credentials.php");
 
 
 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$num= $_POST['order_number'];
$phno = $_POST['phone_number'];
$name =$_POST['name'];
$email = $_POST['email'];
$orddate=$_POST['date_of_order'];
$address=$_POST['address'];
$totamount=$_POST['sub_total'];
$discount=$_POST['discount'];
$tobepaid=$_POST['total_amount_to_be_paid'];
$deldate=$_POST['date_of_delivery'];
$comments=$_POST['comments'];
$ordstatus="NOT STARTED";



	/*$stmt = mysqli_prepare($conn, "INSERT INTO `theyukbausers`(PHONE NUMBER,NAME,EMAIL,ORDER DATE,DELIVERY DATE,ADDRESS,TOTAL AMOUNT, ADVANCE,FINAL AMOUNT,COMMENTS) VALUES (?,?,?,?,?,?,?,?,?,?)");
	mysqli_stmt_bind_param($stmt, 'dsssssddds',$phno,$name,$email,$orddate,$deldate,$address,$totamount,$discount,$tobepaid,$comments);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);*/
	$stmt = mysqli_prepare($conn, "INSERT INTO `theyukbauser`(BOUTIQUE_EMAIL,ORDERNO,PHONENUMBER,CUSTOMERNAME,EMAIL,ORDERDATE,DELIVERYDATE,ADDRESS,TOTALAMOUNT,ADVANCE,FINALTOTAL,COMMENTS,ORDERSTATUS) VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	
	mysqli_stmt_bind_param($stmt, 'sddsssssdddss',$_COOKIE['email'],$num,$phno,$name,$email,$orddate,$deldate,$address,$totamount,$discount,$tobepaid,$comments,$ordstatus);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
/*if (mysqli_query($conn, $sql)) {	
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
$i1 = "item_name";
	$i2 = "item_rate";
	$i3 = "item_quantity";
	$i4 = "item_amount";
$ordNo = $_POST['order_number'];
	$iName = $_POST[$i1];
		$iRate = $_POST[$i2];
		$iQty = $_POST[$i3];
		$iAmount = $_POST[$i4];
		
$stmt = mysqli_prepare($conn, "INSERT INTO `ITEMS`(BOUTIQUE_EMAIL,ORDERNUMBER,ITEMNAME,ITEMRATE,ITEMQUANTITY,ITEMAMOUNT) VALUES (?, ?, ?, ?, ?, ?)");	
	mysqli_stmt_bind_param($stmt, 'sdsddd',$_COOKIE['email'],$ordNo,$iName,$iRate,$iQty,$iAmount);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	
	
	$cnt=2;

	while(1)
	{
		$i1 = "item_name".$cnt;
		$i2 = "item_rate".$cnt;
		$i3 = "item_quantity".$cnt;
		$i4 = "item_amount".$cnt;

		if(isset($_POST[$i1]))
		{
			$cnt = $cnt + 1;
		}
		else
		{
			break;
		}
		
	   $iName = $_POST[$i1];
		$iRate = $_POST[$i2];
		$iQty = $_POST[$i3];
		$iAmount = $_POST[$i4];

		$stmt = mysqli_prepare($conn, "INSERT INTO `ITEMS`(BOUTIQUE_EMAIL,ORDERNUMBER,ITEMNAME,ITEMRATE,ITEMQUANTITY,ITEMAMOUNT) VALUES (? ,?, ?, ?, ?, ?)");	
		mysqli_stmt_bind_param($stmt, 'sdsddd',$_COOKIE['email'],$ordNo,$iName,$iRate,$iQty,$iAmount);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

	} 
	
	
	$j = 0; //Variable for indexing uploaded image 
	
	$x=explode(" ", $num)[0];
	$target_path = "Image\uploads\\"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) 
    {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path ="Image\uploads\\".$_COOKIE['email']."_".$x."_".$i.".jpg";//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 10000000) //Approx. 10000kb files can be uploaded.
                && in_array($file_extension, $validextensions)) 
      {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) 
            {//if file moved to uploads folder
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }

mysqli_close($conn);
header("Location: printMe.html");
?>
</head>
<body>
</body>
</html>