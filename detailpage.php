<?php session_start();?>
<?php require_once('include/connect.php')?>
<!DOCTYPE html>
<html>
<head>
    <title>Tun Blog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/images/logo.ico">
    <!--Link icon-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Link Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
</head>
<!--Confirm Delete Post-->
<script type="text/javascript">
    $(document).ready(function(){
        $(".del").click(function(){
            if (!confirm("Do you want to delete")){
                return false;
            }
        });
    });
</script>
<body>
    <!--Modal-->
    <div class="modal fade" id="confirm-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Đăng nhập tài khoản</h4>
                </div>
                <div class="modal-body">
                    <form action="include/runlogin.php" method="post">
                        <div class="input-container">
                            <i class="fa fa-user icon"></i>
                            <input class="input-field" type="text" placeholder="Tên đăng nhập" name="username" required>
                        </div>
                        <div class="input-container">
                            <i class="fa fa-key icon"></i>
                            <input class="input-field" type="password" placeholder="Mật khẩu" name="password" required>
                        </div>
                        <div class="input-container">
                            <input class="input-submit" type="submit" name="submit" value="Đăng Nhập">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#">Bạn chưa có tài khoản?</a>
                </div>
            </div>
        </div>
    </div>
    <!--Header-->
    <div class="header">
        <h1>Tun Blog</h1>
        <p>Chào mừng các bạn đến với Blog của <b>Tun</b>.</p>
        <?php
        if($_SESSION["power"]!='admin' && $_SESSION["power"]!='client'){
        ?>
            <button data-toggle="modal" data-target="#confirm-login">Đăng Nhập</button><br>
        <?php
        }
        ?>
        <canvas id='canvas' width="800px" height="300px"></canvas>
        <br><br>
        <audio src="assets/audio/leave.mp3" id="audio" controls></audio>
        <script src="include/main.js"></script>
    </body>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-46794744-6', 'auto');
      ga('send', 'pageview');
    </script>
    </div>
    <!--Navigation-->
    <div class="navbar">
        <?php
        if($_SESSION["power"]!='admin' && $_SESSION["power"]!='client'){
        ?>
            <a href="index.php">Trở về trang chủ</a>
        <?php
        }
        ?>
        <?php if(isset($_SESSION["power"])){
            ?>
            <a href="loginpage.php">Trở về trang chủ</a>
            <a>
                <?php if(isset($_SESSION["username"]))
                echo"Xin Chào: ".$_SESSION["username"];
                ?>
            </a>
            <a href="include/user/logout.php">Đăng Xuất</a>
            <?php if($_SESSION["power"]=='admin'){
                ?>
                <div class="dropdown">
                    <button class="dropbtn">Cài đặt Admin</button>
                    <div class="dropdown-content">
                        <a href="include/user/tableuser.php">Quản lý tài khoản</a>
                        <a href="include/addcategory.php">Thêm chủ đề mới</a>
                    </div>
                </div>
            <?php
            }
        }
        ?>
    </div>
    <!--Container-->
    <div class="row">
        <div class="side">
            <h2>Chủ đề</h2>
            <?php
                $stmt=$con->prepare("select * from category");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result=$stmt->fetchALL();
                foreach($result as $row) {
                    $idpost=$row['idpost'];
                    $namepost=$row['namepost'];
                    echo "<a href='detailpage.php?idpost=$idpost&namepost=$namepost'>
                    <button class='btnside'>$namepost</button></a><br><br>";
                }
            ?>
        </div>
        <div class="main">
            <h2>Tất cả <?php echo $_GET['namepost']?></h2>
            <?php if($_SESSION["power"]=='admin'){
                ?>
                <a href="include/post/addpost.php?idpost=<?php echo $_GET['idpost']?>&namepost=<?php echo $_GET['namepost']?>">
                    <button class='btnside'>Tạo bài vết mới</button>
                </a>
                <?php
                }?>
            <div class="content">
                <?php
                $idpost=$_GET['idpost'];
                $stmt=$con->prepare("select * from post where idpost=$idpost limit 4");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result=$stmt->fetchALL();
                foreach($result as $row){
                    $id=$row['id'];
                    $images=$row['images'];
                    $quoteimgs='uploads/images/'.$images;
                    $title=$row['title'];
                    $quote=$row['quote'];
                    $content=$row['content'];
                    if ($_SESSION["power"]=='admin') {
                        echo <<<EOT
                        <div class='post'>
                            <div class='btnpost'>
                                <button><a href='include/post/editpost.php?id=$id'>Sử bài viết</a></button>
                                <button><a href='include/post/deletepost.php?id=$id' onclick="return confirm('Bạn có chắc muốn xoá bài viết này?');">Xoá bài viết</a></button><br>
                            </div>
                            <a>$title</a><br><br>
                            <img src='$quoteimgs' alt='$title'><br><br>
                            <p>$quote</p>
                            <p>$content</p>
                        </div>
                        EOT;
                    }
                    else if($_SESSION["power"]!='admin') {
                        echo <<<EOT
                        <div class='post'>
                            <a>$title</a><br><br>
                            <img src='$quoteimgs' alt='$title'><br><br>
                            <p>$quote</p>
                            <p>$content</p>
                        </div>
                        EOT;
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!--Footer-->
    <div class="footer">
        <span>&#169; Bản quyền thuộc về TunTun</span>
    </div>
</body>
</html>