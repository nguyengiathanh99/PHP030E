<?php
session_start();
require_once 'database.php';
//crud/detail.php
//Xem chi tiết 1 bản ghi
//Cần phải biết đc là đang xem chi tiết bản ghi nào
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	$_SESSION['error'] = 'ID ko hợp lệ';
	header('Location: index.php');
	exit();
}
$id = $_GET['id'];
//tạo câu truy vấn
$sql_select_one = "SELECT * FROM categories WHERE id = $id";
//thực thi câu truy vấn vừa tạo
//đối với truy vấn SELECT, sẽ trả về 1 đối tượng trung gian
$result_one = mysqli_query($connection, $sql_select_one);
//lấy ra dữ liệu thật từ đối tượng trung gian
//do biết chắc chắn chỉ có 1 bản ghi trả về, nên sẽ sử dụng hàm
//mysqli_fetch_assoc để trả về mảng 1 chiều
$category = mysqli_fetch_assoc($result_one);
//check kỹ hơn, nếu ko tồn tại danh mục thì báo message
if (empty($category)) {
	echo "Không có dữ liệu tương ứng với bản ghi có id = $id";
	//sử dụng return để ko chạy các code phía sau
	return;
}
?>
ID: <?php echo $category['id']; ?><br />
Name : <?php echo $category['name'] ?> <br />
Description: <?php echo $category['description'] ?><br />
Avatar:
<img src="uploads/<?php echo $category['avatar'] ?>"
     height="80" />
<br />
Created_at: <?php echo $category['created_at'] ?><br />
<a href="index.php">Back
</a>
