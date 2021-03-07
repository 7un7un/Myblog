<?php
require_once('../connect.php');
$id = $_GET['id'];
$sql = "delete from user where id ='".$id."'";
$stmt = $con->prepare($sql);
$stmt->execute();
header('location:tableuser.php');
?>