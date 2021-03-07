<?php
require_once('../connect.php');
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$power = $_POST['power'];

$sql = "insert into user (username, password, email, power) values ('".$username."' ,'".$password."' ,'".$email."' ,'".$power."')";
$stmt = $con->prepare($sql);
$stmt->execute();
header('location:tableuser.php');
?>