<?php
    // Bài 1
    //  Liệt kê cấu trúc đề thi WPM2
    //  + Tạo CSDL, tạo bảng sử dụng câu truy vấn theo thông tin
    // các trường đã cho trước
    //  VD: tạo CSDL wpm2, tạo 1 bảng categories: id, name, avatar, created_at
    // CREATE DATABASE IF NOT EXITST wpm2 CHARACTER SET utf8
    // COLLATE utf8_general_ci;
    // + Tạo bảng categories
    // CREATE TABLE categories (
    // id INT(11) AUTO_INCREMENT,
    // name VARCHAR(70),
    // avatar VARCHAR(150)
    // created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    // PRIMARY KEY (id)
    // );

    // + Bài 2: Xây dựng ứng dụng CRUD dựa vào bảng vừa tạo: có thể dùng mô hình MVC đã học
    // để xây dựng, hoặc dùng cấu trúc file như bình thường, ngoài ra có thể dùng cơ chế
    //  kết nối CSDL mysqli, PDO
    // Có thể sử dụng cấu trúc file như sau để xây dựng: 
    //  Crud/
    //      /config.php: chứa các hằng số kết nối CSDL, tạo ra biến $connection
    //      /index/php:liệt kê
    //      /create.php:form thêm mới
    //      /update.php:form update
    //      /delete.php: xử lý chức năng xóa
?>