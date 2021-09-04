<?php
session_start();

// mvc_demo/index.php
// 1- Tạo CSDL: php0320e_mvc
// 2 - Tạo 1 bảng categories: id , name , amount
// CREATE TABLE categories(
//     id INT(11) AUTO_INCREMENT,
//     name VARCHAR(255),
//     amount INT(11),
//     PRIMARY KEY (id)
// );
// File mvc_demo/index.php là file index gốc ứng dụng
// Bất cứ 1 mô hình MVC nào cx phải có 1 file index gốc
// Tên file luôn là index.php
// + Khi code mô hình MVC, code file index gốc đầu tiên
//  + Mục đích của file này: đón tất cả các request từ user gửi lên
// Xử lý để gọi đúng controller tương ứng
// + Về mặt code, cần phân tích url
// + Url trong MVC là do cta tự quyết định
// Mô hình MVC trong khóa học, URL luôn có định dạng như sau:
// index.php?controller=<tên-controller> &action=<tên-phương thức-tương-ứng>&...
// + File index.php gốc sẽ phân tích url trên, lấy dc controller và action tương ứng
// Nhúng file chứa class này, lấy đối tượng đó gọi đến phương thức action bắt được từ url
// + Vd: url thêm mới danh mục sẽ kiểu như sau:
// index.php?controller=category&action=create

// + BẮT ĐẦU CODE
// - Set múi giờ mặc định cho hệ thống
// Cách xác định múi giờ tham khảo link
date_default_timezone_set('Asia/Ho_Chi_Minh');
// - Phân tích url để lấy ra controller và action
// Lấy ra controller
// index.php?controller=category&action=create
// Nếu tồn tại thì mặc định là biến controller
// Nếu k tồn tại thì bằng controller = category
$controller = isset($_GET['controller']) ?
$_GET['controller'] : 'category';
// - Lấy ra action (phương thức) từ url
$action = isset($_GET['action']) ?
$_GET['action'] : 'index';

//  - Phân tích giá trị của controller, chuyển đổi giá trị này thành đúng tên file
// chứa controller tương ứng
// giả sử url mẫu
// index.php?controller=category&action=create
// $controller=category (viết thường)
// File cần nhúng: CategoryController.php
// - Chuyển ký tự đầu tiên của controller -> chữ hoa
$controller = ucfirst($controller); //Category (viết hoa chữ cái đầu)
// Nối thêm chuỗi Controller vào biến $controller
// Dùng dấu . để nối chuỗi
$controller .= "Controller"; // CategoryController

// - Tạo biến khác để nối thêm chuỗi .php vào, dùng để nhúng file
$controller_file = $controller . ".php"; // ra dc đuôi .php
// Sẽ dc file hoàn chỉnh: CategoryController.php

// - Nhúng file trên vào hệ thống, chú ý trong mô hình MVC
// Mọi đường dẫn khi nhúng file đều phải tư duy đứng từ file index.php của ứng dụng nhúng
$path_controller = "controllers/$controller_file";
// var_dump($path_controller);
// Cần kiểm tr đường dẫn trên tồn tại thì mới nhúng, nếu ko sẽ báo Not found
// Nếu đường dẫn tới trang k tồn tại thì die luôn
if (!file_exists($path_controller)) {
	die("Trang bạn tìm ko tồn tại");
}
// Còn nếu qua dc câu lệnh này thì chắc chắn nó đã tồn tại
require_once "$path_controller";
// Sau khi nhúng thành công file controller tương ứng
// Chắc chắn đã có class tương ứng, khởi tạo đối tượng từ class
$object = new $controller();
// - Kiểm tra nếu tồn tại phương thức trong class trên thì mới gọi, còn k thì sẽ die
if (!method_exists($object, $action)) {
	die("Không tồn tại phương thức $action trong class $controller");
}
$object->$action();
?>