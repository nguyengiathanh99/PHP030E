<?php
session_start();
    // Ngang hàng với file demo trc
    // Xử lý đăng xuất khỏi hệ thống
    // Xóa hết các session liên quan đến user đã login thành công, chuyển hướng về trang login kèm thông báo
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    // XÓa session username
    unset($_SESSION['username']);
    $_SESSION['success'] = 'Logout thành công';
    // CHuyển hướng về trang login 
    header('Location: thuc_hanh_session.php');
    exit();
?>