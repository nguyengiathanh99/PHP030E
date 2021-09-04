<!-- Thực hành form -->
<h2> Thực hành 2 trong slide </h2>
<!-- Khai báo form -->
<?php
    // Luôn khai báo code xử lý form ở vị trí phía trên HTML Form
    // Debug thông tin biến chứa dữ liệu từ Form
    // Do method form đang là get nên PHP đã tạo ra biến $_GET
    // CHứa tất cả các thong tin của form gửi lên
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    // Quy trình xử lý form sẽ có các bước sau:
    // 1 - Khai báo các biến chứa thông tin lỗi hoặc thành công
    $error = '';
    $result = '';
    // 2 - Xử lý submit form chỉ khi người dùng đã có hành động submit form, sử dụng hàm isset() để kiểm tra xem  biến $var từng tồn tại hay chưa    
    // 3 - Xử lý validate form, nếu có lỗi thì đẩy vào biến $error ban đầu
    // 4 - Xử lý logic submit form chỉ khi nào k có lỗi xảy ra tương đương biến $error rỗng

    // Nếu User submit form thì mới xử lý form
    if (isset($_GET['submit'])) {
        // TẠo biến và gán giá trị, để tránh phải dùng mảng theo key sẽ hơi dài dòng
        $name = $_GET['name'];
        // validate dữ liệu
        // Name ko dc để trống
        // Name phải có độ dài tối thiểu là 6 ký tự
        // Kiểm tra bằng hàm empty: xem có rỗng hay k (nếu name == true thì....)
        if (empty($name)) {
            $error = 'Name ko dc để trống';
        }
        elseif (strlen($name) < 6 ) {
            $error = 'Name phải có độ dài 6 ký tự';
        }
        // Xử lý logic submit form khi ko có lỗi nào xảy ra tương đương với biến $error đang rỗng
        if (empty($error)) {
            $result = "Tên của bạn: $name";
        }

    }
?>
<!-- Vùng hiển thị lỗi -->
<h3 style = "color: red">
<?php echo $error; ?>
</h3> 
<h3 style = "color: green">
<?php echo $result; ?>
</h3>  
<!-- 5 - Đổ lại dữ liệu user đã nhập ra form -->
<form action="" method = "GET">
    Nhập tên của bạn: <br/>
    <!-- Đổ lại dữ liệu ra trường name dùng toán tử điều kiện -->
    <!-- Dùng isset kiểm tra xem đã từng tồn tại hay chưa -->
    <input type="text" name = "name" 
    value ="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>" />
    <br/>
    <input name="submit" type="submit" value="Show thông tin">
</form>