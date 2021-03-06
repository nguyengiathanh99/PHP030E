<?php
//mvc_demo/models/Category.php
//File model quản lý category
// Nhúng file Database.php vào để sử dụng được các hằng số của class này
require_once 'configs/Database.php';
class Category {
	// khai báo các thuộc 	tính chính là tên trường
	// tương ứng trong bảng
	public $id;
	public $name;
	public $amount;
	// Phương thức kết nối CSDL theo PDO
	public function getConnection() {
		$connection = '';
		// Với PDO nên dùng khối try catch để khởi tạo, để bắt các ngoại lệ (lỗi)
		// liên quan đến việc kết nối có thể xảy ra mà ko lường trc dc
		try {
			$connection = new PDO(Database::DB_DSN,
				Database::DB_USERNAME, Database::DB_PASSWORD);
		} catch (Exception $e) {
			die("Lỗi kết nối:" . $e->getMessage());
		}

		return $connection;
	}
	// Phương thức insert dữ liệu
	public function insert() {
		$connection = $this->getConnection();
		// + Tạo câu truy vấn
		$sql_insert = "INSERT INTO categories(`name`, `amount`) VALUES(:name, :amount)";

		// Tạo đối tượng truy vấn, prepare
		// gọi tới đối tượng kết nối truyền tới prepare
		$obj_insert = $connection->prepare($sql_insert);

		// + Do câu truy vấn có tham số, cần có bước tọa mảng để truyền
		// giá trị thật cho tham số
		// Các giá trị thật đến từ chính thuộc tính của model
		$arr_insert = [
			':name' => $this->name,
			':amount' => $this->amount,
		];
		// Thực thi truy vấn, execute (trả về true và false)
		$is_insert = $obj_insert->execute($arr_insert);
		return $is_insert;
		// quay lại categorycontroller
	}

	// Khai báo phương thức getALl
	public function getAll() {
		// + Tạo câu truy vấn
		// Muốn bản ghi mới nhất hiện lên dùng odderby và giảm dần dùng desc
		// Sắp xếp theo thứ tự id
		$sql_select_all = "SELECT * FROM categories ORDER BY id DESC ";
		// Chuẩn bị đối tượng truy vấn, prepare
		// Lấy ra đối tượng kết nối
		$connection = $this->getConnection();
		$obj_select_all = $connection->prepare($sql_select_all);
		// + Bỏ qua bước tạo mảng gán giá trị vì câu truy vấn ko có tham số nào cả
		// + Thực thi truy vấn, execute

		$obj_select_all->execute();
		// + Lấy ra mảng dữ liệu, fetchALl
		// $obj_select_all truy cập đến fetchAll
		$categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		// return để trả về giá trị
		return $categories;
	}
	// Lấy ra bản ghi duy nhất
	public function getOne($id) {
		// + Tạo câu truy vấn 
		$sql_select_one = "SELECT * FROM categories WHERE id = $id";
		// + Tạo đối tượng truy vấn, prepare
		$connection=$this->getConnection();
		$obj_select_one = $connection->prepare($sql_select_one);
		// + Bỏ qua bước tạo mảng vì câu truy vấn ko có tham số

		$obj_select_one->execute();
		//  + Lấy ra mảng kết hợp chứa thông tin bản ghi tương ứng
		// + Lấy ra bản ghi dùng phương thức fetch
		$category = $obj_select_one->fetch(PDO::FETCH_ASSOC);
		// Sau đó return để trả về
		return $category;
	}

	// update bản ghi theo tham số id truyền vào
	public function update($id) {
		// + Tạo câu truy vấn
		$sql_update = "UPDATE categories
		 SET `name`= :name,`amount`= :amount WHERE id = $id";
		//  + Tạo đối tượng truy vấn
		$connection=$this->getConnection();
		$obj_update = $connection->prepare($sql_update);
		// + Do câu truy vấn có dạng tham số nên cần tạo mảng để truyền giá trị thật cho tham số
		// khai báo mảng với 2 phần tử
		$arr_update = [
			':name' => $this->name,
			':amount'=> $this->amount
		];
		// + Thực thi truy vấn
		$is_update = $obj_update->execute($arr_update);
		return $is_update;
	}
	
	public function delete($id) {
		$sql_delete = "DELETE FROM categories WHERE id = $id";
		$connection=$this->getConnection();
		$obj_delete = $connection->prepare($sql_delete);
		$is_delete = $obj_delete->execute();
		return $is_delete;
	}
}
?>