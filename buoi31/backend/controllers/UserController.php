<?php
// Dùng để control đối tượng users
require_once 'controllers/Controller.php';
require_once 'models/User.php';
// Kế thừa từ class Controller cha để có thể sử dụng luôn 2 thuộc tính: error, content
// 1- Phương thức: render
class UserController extends Controller {
	// url: index.php?controller=user&action=register
	public function register() {
		// XỬ lý submit form khi user click Đăng ký
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		if (isset($_POST['register'])) {
			// Gán biến trung gian
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			// Xử lý validate form
			// + Tất cả cấc trường ko đc để trống
			// + Mật khẩu phải trùng nhau
			if (empty($username) || empty($password) || empty($confirm_password)) {
				$this->error = 'Không được để trống';
			} elseif ($password != $confirm_password) {
				$this->error = 'Mật khẩu phải trùng nhau';
			}
			// Nếu như ko có lỗi thì xử lý đăng ký user
			if (empty($this->error)) {
				// Kiểm tra xem username đã tồn tại trong bảng user chưa
				// + Gọi model để xử lý, tạo model User (models/User.php)
				$user_model = new User();
				$is_username_exists =
				$user_model->isUsernameExists($username);
				if ($is_username_exists) {
					$this->error = 'Username đã tồn tại';
				} else {
					// Đăng ký user
					// Cần lưu mật khẩu dưới dạng mã hóa
					$password = md5($password);
					$is_register = $user_model->register($username, $password);
					var_dump($is_register);
				}
			}
		}

		// set title cho chức năng đăng ký
		$this->title_page = 'Trang đăng ký user';
		// echo "Register";
		// Tạo view tương ứng:
		// views/users/
		//              / register.php
		// + Do giao diện trang đăng ký hoàn toàn khác so với giao diện chính của backend
		// nên cần tạo 1 layout khác: views/layouts/main_login.php
		// + Lấy nội dụng view
		$this->content = $this->render('views/users/register.php');
		// + Gọi layout để hiển thị nội dung view vừa lấy được
		require_once 'views/layouts/main_login.php';
	}
}
?>