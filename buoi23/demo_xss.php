<?php
    // Demo lỗi bảo mật XSS liên quan đến form
    // XSS- Cross-site scripting - là kỹ thuật tấn công form, bằng cách chèn mã js vào form
    // Xử lý form
    if (isset($_GET['submit'])) {
        // Để fix lỗi xss, trc khi hiển thị ra giá trị của biến
        // Cần lọc biến bó bằng cách chuyển các ký tự đặc biệt thành ký tự an toàn
        // Sử dụng hàm htmlspecialchars
        $name = $_GET['name'];
        $name = htmlspecialchars($name);
        echo "Tên của bạn là: $name ";
        // Thử nhập giá trị sau
        // <script> alert('123');</script>
        // <script> alert(document.cookie);</script>
        // Sau khi nhập sẽ xuất hiện alert() -> form đã bị dính lỗi XSS
    }
?>
<form action="" method = "GET">
    Nhập tên:
    <input type="text" name = "name" value = "<?php echo isset($_GET['name']) ?$_GET['name']: '' ?>"/>
    <br/>
    <input type="submit" name = "submit" value = "Hiển thị name"> 
</form>