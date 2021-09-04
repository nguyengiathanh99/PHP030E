<?php
//mvc_demo/controllers/CategoryController.php
//Class controller quản lý danh mục
// + Nhúng model Category trên đầu file , để tất cả các phương thức khác của class
// đều sử dụng được
require_once 'models/Category.php';

class CategoryController {
	// Khai báo 1 thuộc tính thể hiện nội dung động của từng view
	public $content;
	// Khai báo thuộc tính hiển thị lỗi
	public $error;

	public function index() {
		// echo "Phương thức index";

		// $this->content = "Bảng liệt kê danh mục";
		// require_once 'views/layouts/main.php';

		// Gọi model để nhờ model lấy ra danh mục
		// đang có trên hệ thống, theo đúng mô hình MVC
		// Cách 1 in ra mảng
		$category_model = new Category();
		// Phương thức getALl chưa tồn tại trong category. Gọi trc ra và đi xây dựng
		$categories = $category_model->getAll();
		// echo "<pre>";
		// print_r($categories);
		// echo "</pre>";

		// Cách 2
		// Có thể thao tác được, tuyền vào giá trị thứ 2 của phương thức render,
		// truyền dưới dạng 1 mảng kết hợp
		$arr_view = [
			// Key của phần tử chính là tên biến view sẽ sử dụng
			// Thường tên key sẽ trùng tên biến cho dễ nhớ
			'categories' => $categories,
			// Xuống phương thức render cho thêm biến $arr_view
		];

		// Mỗi phương thức đều có các bược gọi view như sau:
		// + Lấy nội dung view tương ứng sử dụng phương thức render
		// Gọi file layout để hiển thị nội dung view vừa lấy được
		// truy cập dùng ->
		// phương thức render đang nằm trong thư mục view...
		$this->content = $this->render('views/categories/index.php', $arr_view);
		// Nhúng file
		require_once 'views/layouts/main.php';
		// CHạy thì chưa hiển thị vì file view/index.php chưa có nội dung

	}
	// Tạo phương thức thêm mới danh mục
	// Từ khóa tạo phương thức:public
	public function create() {
		// Xử lý submit form, do action của form đang để rỗng nên chính url hiện tại
		// sẽ xử lý form
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		// + Lưu ý, xử lý submit form, ví trị của nó
		// Cần đứng trước phần hiển thị view

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$amount = $_POST['amount'];
			// Xử lý validate form: 2 trường bắt buộc phải nhập
			if (empty($name) || empty($amount)) {
				$this->error = 'Name hoặc Amount phải nhập';
				// vì chưa có chỗ nào để hiển thị ra nên ta
				// đi vào file layout main
			}
			// + Xử lý lưu dữ liệu vào bảng categories trong trường hợp
			// + Khi ko có lỗi
			if (empty($this->error)) {
				//+ Theo đúng mô hình MVC,
				// Sẽ gọi model để insert vào DB, chứ k lưu trực tiếp tại đây
				//+ Nhúng file model tương ứng nhúng ở đầu file

				// insert....
				$category_model = new Category();
				// Gán các giá trị từ form cho các thuộc tính của model
				$category_model->name = $name;
				$category_model->amount = $amount;
				// Gọi phương thức insert trên model để lưu vào bảng categories
				$is_insert = $category_model->insert();
				// var_dump($is_insert);
				if ($is_insert) {
					$_SESSION['success'] = 'Thêm mới thành công';
					header('Location:index.php?controller=category&action=index');

				} else {
					$this->$error = "Thêm mới thất bại";
				}
			}
		}
		// Cần phải lấy dc nội dung view create.php tương ứng
		// Đổ vào thuộc tính content
		$this->content =
		$this->render('views/categories/create.php');

		// $this->content = "Form thêm mới";

		// echo "Phương thức create";

		// gọi layout để hiển thị view tương ứng
		// Nhúng file layout tương ứng vào
		require_once 'views/layouts/main.php';
	}
	// Phương thức update
	public function update() {
		// Validate id bắt url giống detail
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = 'ID k hợp lệ';
			// mặc định nếu k truyền tham số controller và action thì đã xử lý
			// controller = category và action=index
			header('Location:index.php');
			exit();
		}
		$id = $_GET['id'];
		// Gọi model để lấy thông tin danh mục theo id
		// truyền ra view để hiển thị các giá trị mặc định cho input
		$category_model = new Category();
		$category = $category_model->getOne($id);

		// Xử lý submit form nếu user có hành động click nút submit
		// Lưu ý luôn viết phía trên phần hiển thị view
		if (isset($_POST['submit'])) {
			// + Gặp biến trung gian
			$name = $_POST['name'];
			$amount = $_POST['amount'];
			// + Check validate form
			if (empty($name) || empty($amount)) {
				$this->error = 'Name hoặc amount phải nhập';
			}
			// + Update dữ liệu chỉ khi không có lỗi nào xảy ra
			if (empty($this->error)) {
				// + Nhờ model update dữ liệu
				// + Gán các giá trị từ form cho các thuộc tính của model
				// đã tìm được ở trên
				$category_model->name = $name;
				$category_model->amount = $amount;
				$is_update = $category_model->update($id);
				// var_dump($is_update);
				// Sau đó chuyển sang category
				if ($is_update) {
					$_SESSION['success'] = 'Update thành công';
					header('Location:index.php?controller=category&action=index');
				} else {
					$this->$error = 'Update thất bại';
				}
			}
		}

		// + Lấy nội dung view update
		$this->content = $this->render('views/categories/update.php', [
			// truyền mảng
			'category' => $category,
			// Sau đó vào update để hiển thị ra
		]);
		// + Nhúng layout để hiển thị nội dung view vừa lấy được
		require_once 'views/layouts/main.php';
	}
	// Phương thức detail
	public function detail() {
		// Kiểm tra lỗi phòng ng dùng sửa ...
		// + Gọi model để lấy ra danh mục id bắt được từ url
		// index.php?controller=category&action=detail&id=4
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = 'ID k hợp lệ';
			// mặc định nếu k truyền tham số controller và action thì đã xử lý
			// controller = category và action=index
			header('Location:index.php');
			exit();
		}
		$id = $_GET['id'];
		$category_model = new Category();
		// Truy cập tới phương thức getOne
		$category = $category_model->getOne($id);
		// echo "<pre>";
		// print_r($category);
		// echo "</pre>";

		// + Lấy nội dung view detail
		$this->content =
		$this->render('views/categories/detail.php', [
			// truyền biến category vào giá trị category ở trên luôn
			//Lưu ý: (cách này khác với create)
			// Sau đó sang view/detail

			'category' => $category,
		]);
		// + Nhúng layout để hiển thị nội dung view trên
		require_once 'views/layouts/main.php';
	}
	// Phương thức xóa
	public function delete() {
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = 'ID k hợp lệ';
			// mặc định nếu k truyền tham số controller và action thì đã xử lý
			// controller = category và action=index
			header('Location:index.php');
			exit();
		}
		$id = $_GET['id'];
		$category_model = new Category();
		$category = $category_model->getOne($id);
		$is_delete = $category_model->delete($id);

		if ($is_delete) {
			$_SESSION['success'] = 'Delete thành công';
			header('Location:index.php?controller=category&action=index');
		} else {
			$this->$error = 'Delete thất bại';
		}

	}

	// Phương thức lấy nội dung view động dựa vào đường dẫn để file view đó
	// Kết quả trả về là nội dung HTML
	// CÓ 2 tham số
	// + $file: đường dẫn tới file muốn lấy
	// + $variables:mảng kết hợp chứa các biến muốn sử dụng ở file view tương ứng
	public function render($file, $variables = []) {
		$reder_view = '';
		// + Khi muốn sử dụng biến từ bên ngoài trong view,
		// Cần sử dụng hàm sau
		extract($variables);
		// + Sử dụng hàm sau để ghi nhớ việc đọc nội dung view
		// View, lưu tạm vào bộ nhớ
		ob_start();
		// + Nhúng view vào để lấy nội dung
		require_once "$file";
		// + Kết thúc việc đọc nội dung file
		$reder_view = ob_get_clean();
		return $reder_view;
	}
}
?>