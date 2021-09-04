<?php
// nhận dữ liệu từ ajax gửi lên
//debug các thông tin từ ajax gửi lên thông qua phương thức tương ứng
echo "<pre>";
print_r($_POST);
echo "</pre>";
// kết nối csdl, insert dữ liệu bằng php
// khởi tạo kết nối từ php tới csdl, mysql thông qua thư viện mysqli
const DB_HOST = 'localhost';
const  DB_USERNAME = 'root';
const  DB_PASSWORD = '';
const DB_NAME = 'day22';
const DB_PORT = 3306;
// tạo biến kết nối
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
// KIỂM Tra nếu kết nối thất bại thì báo lõi
// insert vàop bảng categories theo các bước đã làm từ buổi trước với truy vấn INSErt thì kết quả trả về thưc thi truy vấn luôn trả về false/true
// giả sử insert thành công
// dữ liệu trả về cho ajax chính là giá trị của các câu lệnh echo
echo 'Insert thành công';
echo 'đàasdf'
?>
