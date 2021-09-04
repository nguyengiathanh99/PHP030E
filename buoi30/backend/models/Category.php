<?php
require_once 'models/Model.php';
// models/Category.php
class Category extends Model {
	// demo phương thức lấy danh sách category
	public function getAll() {
		// + Tạo câu truy vấn
		$sql_select_all = "SELECT * FROM categories";
		// + Tạo đối tượng truy vấn, prepare
		// Do đã khơi tạo thuộc tính connection của class cha bên Model.php
		// mỗi khi kết nối chỉ cần có biến $connection là sẽ kết nối dc db
		$obj_select_all = $this->connection->prepare($sql_select_all);
		$obj_select_all->execute();
		$categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
		return $categories;
	}

}
?>