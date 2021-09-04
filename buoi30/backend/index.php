<?php
// Codes_demo/Draft/mvc_original
// Khung 1 cơ bản
// Copy toàn bộ thư mực assets trong đường dẫn sau: mockup html/backend/assets vào thư mục 
// assets của mô hình MVC -> demo việc ghép layout
// + Copy file ockup html/backend/index.html -> mvc_original/views/layouts/main.php
// index.php?controller=category&&action=create
session_start();
date_default_timezone_get('Asia/Ho_Chi_Minh');
// + Lấy giá trị của tham số controller và action từ url

// Nếu đúng thì lấy giá trị controller sai thì là giá trị :home
$controller = isset($_GET['controller']) ? $_GET['controller']:'home';
$action = isset($_GET['action']) ? $_GET['action'] :'index';
// + Biến đổi giá trị của controller để trở thành tên file controller tương ứng
// -> nhúng được file controller vào
// index.php?controller=category&&action=create
// ->Chuyển đổi $controller thành CategoryController
$controller = ucfirst($controller); //Category
$controller .= "Controller";//CategoryController
$path_controller = "controllers/$controller.php";
// controllers/CategoryController.php

// KIểm tra đường dẫn xem có tồn tại k
if (!file_exists($path_controller)) {
    die('Trang hiển thị không tồn tại');
}
// Nếu tồn tại nhúng file
require_once $path_controller;
// Khởi tạo đối tượng
$object= new $controller();
// Kiểm tra xem phương thức $controller có tồn tại k
if (!method_exists($object,$action)) {
    die("Không tồn tại phương thức $action trong class $controller");
}
$object->$action();
?>


