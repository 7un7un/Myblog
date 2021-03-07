<?php
$username=$_POST['username'];
$password=$_POST['password'];

$conn = new mysqli('localhost', 'root', '', 'myblog');
$sql = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($sql)->fetch_assoc();

if($result['password'] == $password)
{
	session_start();
	$_SESSION["username"] = $username;
	$_SESSION["power"] = $result['power'];
	header("location:../loginpage.php");
}
else
{
	echo "<p style='color:red'>Sai tên đăng nhập hoặc mật khẩu!</p>";
}
$conn->close();
?>
<a href="../index.php"><button>Trang chủ</button></a>