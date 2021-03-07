<?php require_once("../connect.php");?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Bảng người dùng</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/logo.ico">
	<!--Link icon-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!--Link JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="category">
	<a href="../../loginpage.php"><button>Quay lại trang chủ</button></a>
	<div class="showcategory">
	<h2>Tất cả người dùng</h2>
		<table>
			<tr>
				<th>ID</th>
				<th>USERNAME</th>
				<th>PASSWORD</th>
				<th>EMAIL</th>
				<th>POWER</th>
				<th>EDITS</th>
			</tr>
			<?php
				$stmt=$con->prepare("select * from user");
				$stmt->execute();
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				$result=$stmt->fetchALL();
				foreach($result as $row)
				{
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['power']; ?></td>
				<td>
					<a href="edituser.php?id=<?php echo $row['id'];?>" class="tooltip">
						<i class="fas fa-edit"></i>
						<span class="tooltiptext">Sửa người dùng</span>
					</a>&emsp;&emsp;
					<a href="deleteuser.php?id=<?php echo $row['id'];?>" class="tooltip" onclick="return confirm('Bạn có chắc muốn xoá người dùng này?');">
						<i class="fas fa-trash-alt"></i>
						<span class="tooltiptext">Xoá người dùng</span>
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
	<div class="btnadduser">
		<a href="adduser.php">
			<button>Thêm mới người dùng&emsp;<i class="fas fa-user-plus"></i></button>
		</a>
	</div>
</div>
</body>
</html>