<?php require_once("connect.php");?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Tun Blog</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/images/logo.ico">
	<!--Link icon-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!--Link JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="category">
	<a href="../loginpage.php"><button>Quay lại trang chủ</button></a>
	<div class="showcategory">
	<h2>Thể loại đã thêm</h2>
		<table>
			<tr>
				<th>ID POST</th>
				<th>NAME POST</th>
				<th>EDITS</th>
			</tr>
			<?php
				$stmt=$con->prepare("select * from category");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result=$stmt->fetchALL();
				foreach($result as $row)
				{
			?>
			<tr>
				<td><?php echo $row['idpost']; ?></td>
				<td><?php echo $row['namepost']; ?></td>
				<td>
					<a href="editcategory.php?idpost=<?php echo $row['idpost'];?>" class="tooltip">
						<i class="fas fa-edit"></i>
						<span class="tooltiptext">Sửa thể loại</span>
					</a>&emsp;&emsp;
					<a href="deletecategory.php?idpost=<?php echo $row['idpost'];?>" class="tooltip" onclick="return confirm('Bạn có chắc muốn xoá?');">
						<i class="fas fa-trash-alt"></i>
						<span class="tooltiptext">Xoá thể loại</span>
					</a>
					<script type="text/javascript">
						$(document).ready(function(){
							$(".del").click(function(){
								if (!confirm("Do you want to delete")){
									return false;
								}
							});
						});
					</script>
				</td>
			</tr>
				<?php
				}
				?>
		</table>
	</div>
	<h2>Thêm mới thể loại</h2>
	<div class="addcategory">
		<form action="runaddcategory.php" method="post">
			<input type="text" name="namepost" placeholder="Nhập tên thể loại" required>
			<input class="btnadd" type="submit" name="submit" value="Đăng ký">
		</form>
	</div>
</div>
</body>
</html>