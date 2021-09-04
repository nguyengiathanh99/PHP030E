<?php
require_once 'database.php';
//crud/sql_injection_demo.php
//1 - Khái niệm về lỗi bảo mật SQL Injection
// + Đây là các lỗi bảo mật liên quan đến các thao tác truy vấn
//CSDL
// + Lỗi bảo mật này thường được thực hiện qua form của bạn, can
//thiệp vào câu truy vấn để tạo thêm các truy vấn khác theo ý
//của hacker
// + Với thư viện MySQLi, khi viết truy vấn thuần thường sẽ bị
//dính lỗi bảo mật này
//2 - Demo ứng dụng đơn giản bị lỗi SQL Injection: tạo ra 1 form
//search danh mục theo tên danh mục
//XỬ LÝ FORM
if (isset($_GET['submit'])) {
    //để fix lỗi bảo mật SQLInjection, cần phải làm rất nhiều việc:
    //validate chặt chẽ dữ liệu, các cơ chế bảo mật CSDL
    //ngoài ra có thể sử dụng hàm sau để mã hóa các ký tự đặc biệt
    //như ;'", là hàm mysqli_real_escape_string

    $name = $_GET['name'];
    $name = mysqli_real_escape_string($connection, $name);
    //+ tạo câu truy vấn search
    //so sánh tương đối sẽ dùng từ khóa LIKE, và sử dụng ký tự
//    % để thể hiện cho ký tự bất kỳ
    $sql_select_all =
    "SELECT * FROM categories WHERE `name` LIKE '%$name%'";
//    + //thực thi truy vấn
    $result_all = mysqli_query($connection, $sql_select_all);
    // + lấy mảng dữ liệu thật
    $categories = mysqli_fetch_all($result_all,
        MYSQLI_ASSOC);
    echo "<pre>";
    print_r($categories);
    echo "</pre>";
    //thử nhập chuỗi sau vào input search:
//    123456' OR `name` != '
    //kết quả là toàn bộ dữ liệu trong bảng categories vẫn đc
    //hiển thị ra! -> bị dính lỗi bảo mật SQL Injection
    //thử debug câu truy vấn
    var_dump($sql_select_all);
}
?>
<form action="" method="GET">
    Nhập tên danh mục
    <input type="text" name="name"
value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>" />
    <br />
    <input type="submit" name="submit" value="Tìm kiếm" />
</form>
