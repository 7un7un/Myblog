<!DOCTYPE html>
<html>
<head>
	<title>Thêm người dùng</title>
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
            return true;
        }
    }
</script>
<div class="usercontainer">
	<a href="tableuser.php"><button>Quay lại</button></a>
	<h2>Thêm người dùng</h2>
	<p>Vui lòng điền thông tin người dùng mới vào các trường bên dưới.</p>
	<form action="runadduser.php" method="post">
		<div class="userinput">
			<label><b>USERNAME</b></label>
			<input type="text" name="username" placeholder="Tên người dùng.." required>
        </div>
        <div class="userinput">
        	<label><b>PASSWORD</b></label>
        	<input type="text" name="password" placeholder="Mật khẩu.." required>
        </div>
        <div class="userinput">
        	<label><b>EMAIL</b></label>
        	<input type="text" name="email" id="email" placeholder="Email.." required>
        </div>
        <div class="userinput">
        	<label><b>POWER</b></label>
        	<select name="power" required>
        		<option value="client">Client</option>
            	<option value="admin">Admin</option>
        	</select>
        </div>
        <div class="btnuserinput">
        	<button type="submit" onclick="return checkEmail();">Thêm mới người dùng</button>
        </div>
    </form>
</div>
</body>
</html>