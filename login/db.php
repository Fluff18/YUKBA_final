<?php
	include("credentials.php");
	$user = 'root';
	$pass = '';
	$db = 'yukbauser';
	$mysqli = new mysqli($servername,$user,$pass,$db) or die($mysqli->error);
?>