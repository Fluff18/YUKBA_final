<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "yukbauser";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE theyukbauser ( 
`BOUTIQUE_EMAIL` VARCHAR(50),
`ORDERNO` INT NOT NULL,
`CUSTOMERNAME` VARCHAR(50) NOT NULL,
`PHONENUMBER` BIGINT(10) NOT NULL,
`TOTALAMOUNT` FLOAT NOT NULL, 
`EMAIL` VARCHAR(50),
`ADDRESS` VARCHAR(100),
`ADVANCE` FLOAT NOT NULL, 
`FINALTOTAL` FLOAT NOT NULL, 
`ORDERSTATUS` VARCHAR(20) NOT NULL DEFAULT 'PACKED', 
`AMOUNTPAID` FLOAT NOT NULL, 
`ORDERDATE` DATE NOT NULL, 
`DELIVERYDATE` DATE NOT NULL, 
`ACTUALDELIVERYDATE` DATE NOT NULL, 
`PAYMENTTYPE` VARCHAR(50) NOT NULL, 
`EMPLOYEE` VARCHAR(50) NOT NULL, 
`COMMENTS` VARCHAR(100) NOT NULL,
`CancelledReason` VARCHAR(150) DEFAULT '')
AUTO_INCREMENT = 1, 
ENGINE = InnoDB";

if ($conn->query($sql) === TRUE) {
    echo "Table theyukbausers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>