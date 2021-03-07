<?php
require_once('../../config.php');
require_once('../connect.php');
$id=$_POST['id'];
$idpost = $_POST['idpost'];
$title = $_POST['title'];
$quote = $_POST['quote'];
$content = $_POST['content'];

// Kiểm tra người dùng bấm submit
if(isset($_POST['upload'])) {
	// Dung lượng cho phép upload lên
	$maxsize = 12000000; // 12MB

	// Lưu vào thư mục trên máy tính
	$linkfolder = ROOTPATH . "/uploads/images/";
	$addfiles = $linkfolder . $_FILES["file"]["name"];
	$FileType = strtolower(pathinfo($addfiles,PATHINFO_EXTENSION));

	// Định dạng mở rộng
	$extensions_arr = array('png', 'jpg', 'jpeg', 'gif', 'tiff', 'bmp');
	if( in_array($FileType,$extensions_arr) ) {
		// Điều kiện kiểm tra dung lượng file
		if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
			echo "File quá lớn! Vui lòng upload file nhỏ hơn!";
		}
		// Tiếp hành Upload
		else {
			if(move_uploaded_file($_FILES['file']['tmp_name'],$addfiles)) {
				// Ghi dữ liệu vào Database
				$sql="UPDATE post SET idpost='".$idpost."', title='".$title."', quote='".$quote."', content='".$content."', images='".$_FILES["file"]["name"]."' where id=".$id;
				$stmt=$con->prepare($sql);
				$stmt->execute();
				header('location:../../loginpage.php');
			}
			else {
				echo "Không thành công";
			}
		}
	}
}
?>