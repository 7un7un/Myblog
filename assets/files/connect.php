<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'myblog';

try{
	$con = new PDO("mysql:host=$server; dbname=$dbname", $username, $password);
	$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	//echo "Ket noi thanh cong";
}
catch (PDOException $e) {
	echo "Error ".$e->getMessage();
}
?>