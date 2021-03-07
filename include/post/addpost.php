<!DOCTYPE html>
<html>
<head>
	<title>Thêm bài viết</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/logo.ico">
</head>
<body>
<div class="usercontainer">
	<a href="../../loginpage.php"><button>Quay lại</button></a>
	<h2>Tạo mới bài viết chủ đề: <?php echo $_GET['namepost']?></h2>
	<p>Vui lòng điền thông tin bài viết mới vào các trường bên dưới.</p>
	<form action="runaddpost.php" method="post" enctype='multipart/form-data'>
		<input type="hidden" name="idpost" value="<?php echo $_GET['idpost']?>" required>
		<div class="userinput">
			<label><b>TIÊU ĐỀ</b></label>
			<input type="text" name="title" placeholder="Tiêu đề.." required>
        </div>
        <div class="userinput">
        	<label><b>TRÍCH DẪN</b></label>
        	<input type="text" name="quote" placeholder="Trích dẫn.." required>
        </div>
        <div class="userinput">
        	<label><b>NỘI DUNG</b></label>
        	<textarea type="text" rows="5" cols="100%" name="content" placeholder="Nội dung.." required></textarea>
        </div>
        <div class="userinput">
        	<label><b>ẢNH</b></label><hr>
        	<input type="file" name="file">
        </div>
        <div class="btnuserinput">
        	<button type="submit" name="upload">Thêm mới bài viết</button>
        </div>
    </form>
</div>
</body>
</html>