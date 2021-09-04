<?php
/**
 * Created by PhpStorm.
 * User: nvmanh
 * Date: 3/13/2020
 * Time: 11:02 PM
 */
// controllers/Controller.php

class Controller
{
    // check ở class cha nếu chưa đăng nhập thì k vào dc (từ session)
    // khai báo phương thức khởi tạo cho class cha
    // phương thức này chạy đầu tiên
    public function __construct() {
        // Kiểm tra nếu user chưa đăng nhập thì ko cho phép truy cập các chức năng, chuyển hướng
        // về trang login
        // cần phải loại trừ controller=user để cho hết lỗi ở trình duyệt ẩn
        // Sau đó sang file main.php
        if (!isset($_SESSION['user']) && $_GET['controller'] != 'user' ) {
            $_SESSION['error'] = "Bạn cần đăng nhập";
            header('Location:index.php?controller=user&action=login');
            exit();
        }
    }

    //chứa nội dung view
    public $content;
    //chứa nội dung lỗi validate
    public $error;
    // Chứa nội dung động cho tiêu đề của từng trang <title>
    public $title_page;

    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = []) {

        //Nhập các giá trị của mảng vào các biến có tên tương ứng chính là key của phần tử đó.
        //khi muốn sử dụng biến từ bên ngoài vào trong hàm
        extract($variables);
        //bắt đầu nhớ mọi nội dung kể từ khi khai báo, kiểu như lưu vào bộ nhớ tạm
        ob_start();
        //thông thường nếu ko có ob_start thì sẽ hiển thị 1 dòng echo lên màn hình
        //tuy nhiên do dùng ob_Start nên nội dung của nó đã đc lưu lại, chứ ko hiển thị ra màn hình nữa
        require_once $file;
        //lấy dữ liệu từ bộ nhớ tạm đã lưu khi gọi hàm ob_Start để xử lý, lấy xong rồi xóa luôn dữ liệu đó
        $render_view = ob_get_clean();

        return $render_view;
    }
}