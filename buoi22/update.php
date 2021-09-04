<?php
session_start();
//nhúng file để sử dụng đc biến kết nối CSDL $connection
require_once 'database.php';
//crud/update.php
//Thực hiện chức năng sửa danh mục
//đầu tiên cần phải lấy ra bản ghi tương ứng để hiển thị các giá
//trị mặc định trong form
//copy form ở chức năng thêm mới sang chức năng cập nhật
//chức năng cập nhật nó giống 80% chức năng thêm mới, cả về giao
//diện lẫn xử lý submit form
//1 - Lấy dữ liệu tương ứng để đổ ra form
///Codes_demo/crud/update.php?id=1
//Dựa vào cấu trúc URL, thì sẽ dùng mảng $_GET để lấy giá trị id,
//để biết đc đang cập nhật trên bản ghi nào
//trước khi lấy giá trị của id, cần xử lý validate cho id này, vì
//các tham số trên url user đều có thể sửa đc
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	$_SESSION['error'] = 'ID ko hợp lệ';
	header('Location: index.php');
	exit();
}
$id = $_GET['id'];
//truy vấn CSDL để lấy ra bản ghi tương ứng với id vừa bắt được
//từ url
//các bước để thao tác vói CSDL
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
//về logic xử lý form khi update, nếu đã xây dựng chức năng
//thêm mới r thì có thể copy toàn bộ logic submit của chức năng
//thêm mới đó cho chức năng update, sau đó sửa lại cho phù hợp
//với chức năng update
if (isset($_POST['submit'])) {
	//khai báo biến trung gian để thao tác cho dễ
	$name = $_POST['name'];
	$description = $_POST['description'];
	$avatar_arr = $_FILES['avatar'];
	//4 - Validate form:
	// + Name và description ko đc để trống
	// + File upload phải có dạng ảnh, dung lượng ko quá 2Mb
	//bất cứ lỗi nào xảy ra, đổ dữ liệu cho biến $error
	if (empty($name) || empty($description)) {
		$error = 'Name hoặc description ko đc để trống';
	}
	//chỉ xử lý validate file upload nếu có file đc tải lên
	//dựa vào thuộc tính error của mảng $_FILES
	else if ($avatar_arr['error'] == 0) {
		//validate file upload phải có dạng ảnh
		//lấy ra đuôi file
		$extension = pathinfo($avatar_arr['name'],
			PATHINFO_EXTENSION);
		// chuyển về ký tự thường
		$extension = strtolower($extension);
		//tạo mảng chứa các đuôi file ảnh hợp lệ
		$extension_allowed = ['jpg', 'png', 'gif', 'jpeg'];
		//lấy dung lượng của file upload theo đơn vị Mb
		//1MB = 1024KB = 1024 * 1024 B
		$file_size_mb = $avatar_arr['size'] / 1024 / 1024;
		//giữ lại 2 số thập phân sau dấu .
		$file_size_mb = round($file_size_mb, 2);
		if (!in_array($extension, $extension_allowed)) {
			$error = 'Cần upload file dạng ảnh';
		} elseif ($file_size_mb > 2) {
			$error = 'File upload ko đc vượt quá 2MB';
		}
	}
	//5 - Xử lý upload file nếu có và lưu vào bảng categories
	//chỉ xử lý khi ko có lỗi xảy ra

	//hầu như sẽ chỉnh sửa logic update tại thời điểm xử lý
	//submit form khi ko có lỗi xảy ra
	if (empty($error)) {
		//biến khởi tạo $avatar sẽ có giá trị với
		// chức năng update
		$avatar = $category['avatar'];
		//xử lý upload file nếu có hành động upload
		if ($avatar_arr['error'] == 0) {
			//tạo thư mục chứa file sẽ upload lên
			//tạo thư mục có tên = uploads, ngang hàng với file
			//hiện tại
			$dir_uploads = 'uploads';
			//tạo thư mục chỉ khi thư mục chưa tồn tại
			if (!file_exists($dir_uploads)) {
				mkdir($dir_uploads);
			}
			//với chức năng update, trước khi tạo ra đuôi
			// file mang tính duy nhất thì cần xóa ảnh cũ đi
			//để tránh rác hệ thống
			@unlink("uploads/$avatar");

			//tạo ra tên file mang tính duy nhất, để tránh trường
			//hợp bị đè file khi user upload cùng 1 file lên hệ
			//thống nhiều lần
			$avatar = time() . '-' . $avatar_arr['name'];
			//upload file từ thư mục tạm của XAMPP vào trong
			//thư mục uploads bạn đã tạo
			move_uploaded_file($avatar_arr['tmp_name'],
				$dir_uploads . '/' . $avatar);
		}
		//xử lý cập nhật dữ liệu vào bảng categories dựa vào
		//id bắt đc trên url
		// + tạo câu truy vấn, chú ý với truy vấn UPDATE luôn
		//cần xác định điều kiện WhERE đi kèm
		$sql_update = "UPDATE categories
SET `name` = '$name', `description` = '$description',
 `avatar` = '$avatar' WHERE `id` = $id";
		// + thực thi truy vấn, với truy vấn UPDATE thì luôn
		//trả về kiểu boolean
		$is_update = mysqli_query($connection, $sql_update);

		if ($is_update) {
			$_SESSION['success'] = 'Update thành công';
			header('Location: index.php');
			exit();
		} else {
			$error = 'Update thất bại';
		}
	}
}

?>
<form action="" method="post" enctype="multipart/form-data">
    Name:
    <input type="text" name="name"
           value="<?php echo $category['name']; ?>" />
    <br />
    Description:
<!--  với thẻ textarea, ko đc để khoảng cách trong nội dung thẻ  -->
    <textarea name="description" cols="20"><?php echo $category['description']; ?></textarea>
    <br />
    Upload avatar:
    <input type="file" name="avatar" />
    <img src="uploads/<?php echo $category['avatar'] ?>"
    height="80" />
    <br />
    <input type="submit" name="submit" value="Save" />
    <a href="index.php">Cancel</a>
</form>
