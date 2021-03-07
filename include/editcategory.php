<?php require_once('connect.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa chủ đề</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/logo.ico">
</head>
<body>
<?php
$idpost = $_GET['idpost'];
$stmt = $con->prepare("select * from category where idpost = '".$idpost."'");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();
?>
<div class="editcategory">
	<a href="addcategory.php"><button>Quay lại</button></a>
	<h2>Sửa tên</h2>
	<p>Nhập tên thể loại mới vào ô bên dưới:</p>
	<div>
		<form action="runeditcategory.php" method="post">
			<table>
				<tr> 
					<th>ID</th>
					<th>NAME POST</th>
				</tr>
				<tr>
					<td>
						<input type="text" name="idpost" value="<?php echo $result['idpost'];?>" readonly required>
					</td>
					<td>
						<input type="text" name="namepost" value="<?php echo $result['namepost'];?>" required>
					</td>
				</tr>
			</table>
			<input type="submit" value="Cập nhật" class="btnedit">
		</form>
		<?php
		if(isset($_POST['submit'])){
			header('location:runeditcategory.php');
		}
		else exit;
		?>
	</div>
</div>
</body>
</html>