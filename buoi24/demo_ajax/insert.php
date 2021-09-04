<?php
    // Nhận dữ liệu từ ajax gửi lên
    // Nhận dữ liệu từ ajax gửi lên
    // debug các thông tin từ ajax gửi lên thông qua phương thức tương ứng
    echo "<pre>";
     print_r($_POST);
     echo "</pre>";
    //  Kết nối CSDL, r insert dữ liệu bằng PHP
    // Khởi tạo kết nối từ PHP tới CSDL MySQL thông quan thư viện mysqli
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'day_22';
    const DB_PORT = 3306;
    $connection = mysqli_connect( DB_HOST, DB_USERNAME, DB_PASSWORD ,DB_NAME, DB_PORT);
    // Kiểm tra kết nối thất bại
    if (!$connection) {
        die ('Kết nối thất bại: '.mysqli_connect_error());
    }
    echo "<h2> Kết nối thành công </h2>";
    // Insert vào bảng categories theo các bước làm từ buổi trước
    // Với câu truy vấn INSERT thì kết quả trả về khi thực thi truy vấn
    // Luôn trả về true/false
    // Giả sử Insert thành công
    // Dữ liệu trả về cho ajax chính là các giá trị của các câu lệnh echo
    echo 'Insert thành công';
    echo 'Nguyễn Gia Thành';
?>