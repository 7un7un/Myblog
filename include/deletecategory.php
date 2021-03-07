<?php
require_once('connect.php');
$idpost = $_GET['idpost'];
$sql = "delete from category where idpost ='".$idpost."'";
$stmt = $con->prepare($sql);
$stmt->execute();
header('location:addcategory.php');
?>