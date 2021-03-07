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
</head>
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
                    <a href="include/user/register.php">Bạn chưa có tài khoản?</a>
                </div>
            </div>
        </div>
    </div>
    <!--Header-->
    <div class="header">
        <h1>Tun Blog</h1>
        <p>Chào mừng các bạn đến với Blog của <b>Tun</b>.</p>
        <button data-toggle="modal" data-target="#confirm-login">Đăng Nhập</button><br>
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
    <!--<div class="navbar">
    </div>-->
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
            <h2>Tất cả bài viết</h2>
            <div class="content">
                <?php
                $stmt=$con->prepare("select * from post limit 4");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result=$stmt->fetchALL();
                foreach($result as $row)
                {
                    $title=$row["title"];
                    $images=$row["images"];
                    $quoteimgs='uploads/images/'.$images;
                    $quote=$row["quote"];
                    $id=$row["id"];
                    $idpost=$row["idpost"];
                    ?>
                    <?php
                        echo <<<EOT
                        <div class='post'>
                            <a>$title</a><br><br>
                            <img src='$quoteimgs' alt='$title'><br><br>
                            <p>$quote</p>
                        </div>
                        EOT;
                    ?>
                    <?php
                }?>
            </div>
        </div>
    </div>
    <!--Footer-->
    <div class="footer">
        <span>&#169; Bản quyền thuộc về TunTun</span>
    </div>
</body>
</html>