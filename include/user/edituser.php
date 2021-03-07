<?php require_once('../connect.php')?>
<!DOCTYPE html>
<html>
<head>
	<title>Sửa người dùng</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/logo.ico">
</head>
<body>
<script type="text/javascript">
    function checkEmail() {
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email.value)) {
            alert('Hãy nhập địa chỉ email hợp lệ.\nExample@gmail.com');
            return false;
        }
        else
        {
            alert('Cập nhật thành công');
        }
    }
</script>
<?php
$id = $_GET['id'];
$stmt = $con->prepare("select * from user where id = '".$id."'");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();
?>
<div class="usercontainer">
	<a href="tableuser.php"><button>Quay lại</button></a>
	<h2>Sửa người dùng</h2>
	<p>Vui lòng chỉnh sửa thông tin người dùng vào biểu mẫu bên dưới.</p>
	<form action="runedituser.php" method="post">
		<input type="hidden" name="id" value="<?php echo $result['id'];?>" required>
		<div class="userinput">
			<label><b>USERNAME</b></label>
			<input type="text" name="username" value="<?php echo $result['username'];?>" required>
        </div>
        <div class="userinput">
        	<label><b>PASSWORD</b></label>
        	<input type="text" name="password" value="<?php echo $result['password'];?>" required>
        </div>
        <div class="userinput">
        	<label><b>EMAIL</b></label>
        	<input type="text" name="email" id="email" value="<?php echo $result['email'];?>" required>
        </div>
        <div class="userinput">
        	<label><b>POWER</b></label>
        	<select name="power" required>
        		<option value="client">Client</option>
            	<option value="admin">Admin</option>
        	</select>
        </div>
        <div class="btnuserinput">
        	<button type="submit" onclick="return checkEmail();">Cập nhật</button>
        </div>
    </form>
</div>
</body>
</html>