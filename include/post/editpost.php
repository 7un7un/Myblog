<?php require_once('../connect.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa bài viết</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/logo.ico">
</head>
<body>
<?php
$id = $_GET['id'];
$stmt = $con->prepare("select * from post where id = '".$id."'");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();
?>
<div class="usercontainer">
	<a href="../../loginpage.php"><button>Quay lại</button></a>
	<h2>Sửa bài viết</h2>
	<p>Vui lòng chỉnh sửa bài viết vào các trường bên dưới.</p>
	<form action="runeditpost.php" method="post" enctype='multipart/form-data'>
		<input type="hidden" name="id" value="<?php echo $result['id'];?>" required>
		<div class="userinput">
			<label><b>ID POST</b></label>
			<input type="text" name="idpost" value="<?php echo $result['idpost'];?>" required>
        </div>
        <div class="userinput">
        	<label><b>TIÊU ĐỀ</b></label>
        	<input type="text" name="title" value="<?php echo $result['title'];?>" required>
        </div>
        <div class="userinput">
        	<label><b>TRÍCH DẪN</b></label>
        	<input type="text" name="quote" value="<?php echo $result['quote'];?>" required>
        </div>
		<div class="userinput">
        	<label><b>NỘI DUNG</b></label>
			<input type="text" name="content" value="<?php echo $result['content'];?>" required>
        </div>
		<div class="userinput">
        	<label><b>ẢNH</b></label>
        	<input type="file" name="file" value="<?php echo $result['images'];?>" required>
        </div>
        <div class="btnuserinput">
        	<button type="submit" name="upload">Cập nhật</button>
        </div>
    </form>
</div>
</body>
</html>