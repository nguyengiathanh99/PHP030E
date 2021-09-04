<?php
require_once 'controllers/Controller.php';

class PaymentController extends Controller {
    public function index() {
        // Lấy nội dung view payment
        $this->content = 
        $this->render('views/payments/index.php');
        // GỌi layout để hiển thị nội dung view vừa lấy đước
        require_once 'views/layouts/main.php';
    }
}