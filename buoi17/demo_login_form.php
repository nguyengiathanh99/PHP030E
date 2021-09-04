<?php
    //debug thông tin biến $_POST
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // Tạo ra bến lưu thông tin lỗi và kết quả
    $error = '';
    $result = '';
    // Nếu có hành động submit form thì mới xử lý
    if (isset($_POST['submit'])) {
        // Tạo biến và gán giá trị
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Xử lý validate theo yêu cầu đề bài
        // Kiểm tra 2 thằng ko dc để trống dùng : OR
        if (empty($username)|| empty($password)) {
            $error = 'Không dc để trống các trường';
        }
        // Xử dụng hàm filter_var để check định dạng dữ liệu
        // Gồm 2 tham số: tên biến muốn kiểm tra hằng số quy định sẽ vaidate theo kiểu nào
        elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $error = 'Username phải có định dạng email';
        }
        // Kiểm tra độ dài pass...bằng hàm strlen
        elseif (strlen($password) < 6) {
            $error = 'Phải có độ dài 6 ký tự';
        }
        // Xử lý logic submit form khi ko có lỗi gì xảy ra
        if (empty($error)) {
            // Xử lý đăng nhập
            if ($username == 'nguyengiathanh@gmail.com' && $password == 123456 ) {
                $result = 'Đăng nhập thành công';   
              
            }
            else {
                $error = 'Sai tài khoản hoặc mật khẩu';
            }
        }
    }
?>
<h3 style = "color: red">
<?php echo $error; ?>
</h3> 
<h3 style = "color: green">
<?php echo $result; ?>
</h3>  
<form action="" method = "POST">
    Username: 
    <input type="text" name= "username" value ="" >
    <br/>
    Password: 
    <input type="password" name = "password" value ="">
    <br/>
    <input type="submit" name ="submit" value = " Đăng Nhập ">
</form>