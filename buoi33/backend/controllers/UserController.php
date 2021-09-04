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
					// var_dump($is_register);
					if ($is_register) {
						$_SESSION['success'] = 'Đăng ký thành công';
						// Chuyển hướng sang trang login
						header('Location:index.php?controller=user&action=login');
						exit();
					}
					else {
						$this->error = "Không thể đăng ký";
					}
					// Sau khi xong chạy thử trình duyệt ẩn và nó sẽ hiện lỗi...ko ra dc form 
					// đăng nhập
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
	// Phương thức xử lý login
	public function login() {
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			// XỬ lý
			if (empty($username) || empty($password)) {
				$this->error = 'Phải nhập cả 2 trường';
			}
			// Xử lý đăng nhập chỉ khi không có lỗi xảy ra
			if (empty($this->error)) {
				$user_model = new User();
				// Cần mã hóa password đúng theo cơ chế đã lưu
				// Pass này trc khi kiểm tra trong CSDL
				$password = md5($password);
				// DO cần hiển thị thông tin user sau khi login thành công nên kết quả trả về
				// xử lý hàm getUser là 1 mảng, gán mảng đó cho session
				// phương thức getUser trả về true or false: true là đăng nhập thành công...
				// (sau đó chuyển sang bảng user)
				$user = $user_model->getUser($username,$password);
				// Nếu đăng nhập thành công
				if (!empty($user)) {
					// Tạo session gán bằng mảng user trên
					$_SESSION['user'] = $user;
					$_SESSION['success'] = 'Đăng nhập thành công';
					header('Location:index.php?controller=product');
					exit();
				}
				else {
					$this->error = 'Sai tài khoản mật khẩu';
				}
				// echo "<pre>";
				// print_r($user);
				// echo "</pre>";
			

			}
		}
		$this->title_page = 'Trang đăng nhập';

		// + Lấy nội dung view login tương ứng
		// Tạo view: views/users/login.php: sau khi tạo xong để hiển thị gọi đến content
		$this->content = $this->render('views/users/login.php'); 
		// + Gọi layout để hiển thị
		require_once 'views/layouts/main_login.php';
	}
}
?>