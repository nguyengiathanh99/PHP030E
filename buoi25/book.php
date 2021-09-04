<?php
// Sử dụng OOP để code chức năng CRUD
// Phân tích đối tượng book để lấy ra các phương thức và thuộc tính có thể có
//  + Thuộc tính: id, name, amount, created_at...
// + Phương thức: connnectDb, disconnectDb, insert,update,delete,index
// - Tạo CSDL tên OOP, tạo 1 bảng books: id, name, amount, created_at
// CREATE TABLE books(
//     id INT(11) AUTO_INCREMENT,
//     name VARCHAR(255),
//     amount INT(11),
//     Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     PRIMARY KEY (id)
// );
class Book {
	// Khai báo các hàm số liên quan kết nối CSDL
	const DB_HOST = 'localhost';
	const DB_USERNAME = 'root';
	const DB_PASSWORD = '';
	const DB_NAME = 'oop';
	const DB_PORT = 3306;

	// Khai báo các thuộc tính của class book
	// Các thuộc tính chính là các trường của bảng books
	// Về mặt cơ bản có bn trường trong bảng thì sẽ có ít nhất từng đó thuộc tính
	public $id;
	public $name;
	public $amount;
	public $created_at;

	// Liệt kê các phương thức có thể có của class Book
	// Phương thức kết nối CSDL
	public function connectDb() {
		$connnection = NULL;
		// Truy cập hằng trong class giống như truy cập thuộc tính static
		$connnection = mysqli_connect(Book::DB_HOST,
			Book::DB_USERNAME, Book::DB_PASSWORD, Book::DB_NAME, Book::DB_PORT);
		return $connnection;
	}
	// Phương thức đóng kết nối
	public function disconnectDb($connnection) {
		mysqli_close($connnection);
	}
	// Phương thức thêm sách
	public function insert() {
		// Lấy ra biến kết nối để có thể insert vào db
		// Truy cập vào phương thức hiện tại bằng this
		$connnection = $this->connectDb();
		// + Tạo câu truy vấn thêm dữ liệu

		// truy cập tới thuộc tính dùng this đến thuộc tính name, amount
		$sql_insert = "INSERT INTO books(`name`, `amount`)
             VALUES ('$this->name', '$this->amount')";

		//  Thực thi truy vấn
		$is_insert = mysqli_query($connnection, $sql_insert);
		// + Đóng kết nối
		$this->disconnectDb($connnection);
		return $is_insert;
	}
	// Phương thức sửa sách
	public function update() {

	}
	// Phương thức xóa sách
	public function delete() {

	}
	// Phương thức liệt kê sách
	public function index() {

	}
}
// Khởi tạo đối tượng từ class trên
// Khởi tạo class new và tên class
$book = new Book();
// Cần gán các giá trị tương ứng cho đối tượng
// Tên sách 1 và 5 quyển sách
$book->name = 'Sách1';
$book->amount = 5;
// Gọi phương thức insert vào CSDL
$is_insert = $book->insert();
var_dump($is_insert);
?>