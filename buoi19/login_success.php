<?php
session_start();
    // Để đề phòng trường hợp user chưa login mà truy cập thẳng vào file này, cần chuyển hướng user về trang login
    // Ngang hàng với file thực hành session
    // File này hiển thị username và message thành công sau khi user đăng nhập
    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = 'Bạn chưa login';
        header('Location: thuc_hanh_sesison.php');
        exit();
    }
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    $username = $_SESSION['username'];
    $success = $_SESSION['success'];
    echo "<h3> $success </h3>";
    echo "<h1> Chào bạn, $username </h1>";
    // Tạo link logout để đăng xuất người dùng
    echo "<a href = 'logout.php'> Logout </a>";
?>