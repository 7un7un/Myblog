<?php
require_once('../connect.php');
$id = $_GET['id'];
$sql = "delete from post where id ='".$id."'";
$stmt = $con->prepare($sql);
$stmt->execute();
header('location:../../loginpage.php');
?>