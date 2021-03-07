<!DOCTYPE html>
<html>
<head>
    <title>Đăng ký tài khoản</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/logo.ico">
</head>
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
            alert('Đăng ký thành công');
        }
    }
</script>
<body>
    <form action="runregister.php" method="post">
        <div class="container-register">
            <h2>Đăng ký tài khoản</h2>
            <p>Vui lòng điền vào biểu mẫu này để tạo tài khoản.</p>
            <hr>
            <label><b>Tên tài khoản</b></label>
            <input type="text" placeholder="Enter Name" name="username" required>
            <label><b>Mật khẩu</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <label><b>Tài khoản email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" required>
            <input type="hidden" name="power" value="client" required>
            <hr>
            <button type="submit" class="registerbtn" onclick="return checkEmail();">Đăng ký</button>
            <div class="registerbottom">
                <p>Bạn đã có tài khoản? <a href="../../index.php">Đăng nhập</a>.</p>
            </div>
        </div>
    </form>
</body>
</html>