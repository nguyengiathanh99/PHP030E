<?php
require_once 'controllers/Controller.php';
//Tạo class phải trùng với tên file
// Áp dụng tính kế thừa của OOP để có thể sử dụng lại các thuộc tính/phương thức của class
// cha mà phạm vi truy cập là
class CategoryController extends Controller {
    // Tạo phương thức
    public function create() {
        //  + Lấy nội dung view tương ứng
        // Dù k xuất hiện content ở thuộc tính hiện tại nhưng đã dc kế thừa...
        $this->content =
        $this->render('views/categories/create.php');
        // + Gọi layout để hiển thị nội dung view vừa lấy
        require_once 'views/layouts/main.php';
    }
}
?>