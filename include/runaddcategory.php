<?php
require_once('connect.php');
$namepost = $_POST['namepost'];

$sql = "insert into category (namepost) values ('".$namepost."')";
$stmt = $con->prepare($sql);
$stmt->execute();
header('location:addcategory.php');
?>