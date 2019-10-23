<!DOCTYPE html>
<html>
<head>
	<title>create table</title>
<?php

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
$comments="12939";
	$stmt = mysqli_prepare($conn, "INSERT INTO `theyukbauser`(`PHONE NUMBER`) VALUES (?)");
	mysqli_stmt_bind_param($stmt, 'd',$comments);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
/*if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
*/
mysqli_close($conn);

?>
</head>

</body>
</html>