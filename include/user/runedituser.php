<?php
require_once('../connect.php');
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$power = $_POST['power'];

$sql="update user set username='".$username."', password='".$password."', email='".$email."', power='".$power."' where id=".$id;
$stmt=$con->prepare($sql);
$stmt->execute();
header('location:tableuser.php');
?>