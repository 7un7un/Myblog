<?php session_start();?>
<?php require_once('assets/files/connect.php')?>
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
    <!--Header-->
    <div class="header">
        <h1>Tun Blog</h1>
        <p>Chào mừng các bạn đến với Blog của <b>Tun</b>.</p>
        <canvas id='canvas' width="800px" height="300px"></canvas>
        <br><br>
        <audio src="assets/audio/leave.mp3" id="audio" controls></audio>
        <script src="assets/files/main.js"></script>
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
        <?php if(isset($_SESSION["power"])){
            ?>
            <a>
                <?php if(isset($_SESSION["username"]))
                echo"Xin Chào: ".$_SESSION["username"];
                ?>
            </a>
            <a href="assets/files/logout.php">Đăng Xuất</a>
            <?php if($_SESSION["power"]=='admin'){
                ?>
                <div class="dropdown">
                    <button class="dropbtn">Cài đặt Admin</button>
                    <div class="dropdown-content">
                        <a href="#">Quản lý tài khoản</a>
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
            <h2>Chủ Đề</h2>
            <?php
                $stmt=$con->prepare("select * from category");
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $result=$stmt->fetchALL();
                foreach($result as $row) {
                    $idpost=$row['idpost'];
                    $namepost=$row['namepost'];
            ?>
            <?php echo "<a href='detailpage.php?idpost=$idpost'><button class='btnside'>$namepost</button></a><br><br>"; ?>
            <?php
                }
            ?>
        </div>
        <div class="main">
            <h2>Bài Viết</h2>
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
                    $quoteimgs='assets/images/imagesblog/'.$images;
                    $quote=$row["quote"];
                    $id=$row["id"];
                    $idpost=$row["idpost"];
                    ?>
                    <?php
                        echo <<<EOT
                        <div class='contentok'>
                            <a href='detailpage.php?id=$id&idpost=$idpost'>$title</a><br><br>
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