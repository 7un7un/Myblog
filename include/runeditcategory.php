<?php
require_once('connect.php');
$idpost = $_POST['idpost'];
$namepost = $_POST['namepost'];

$sql="update category set namepost='".$namepost."' where idpost=".$idpost;
$stmt=$con->prepare($sql);
$stmt->execute();
header('location:addcategory.php');
?>