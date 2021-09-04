<?php
session_start();
// Nếu như tồn tại cookie username và password
// Thì tương đương user đăng nhập thành công
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    // Phải sét lại session username
    $_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['success'] = 'Đăng nhập thành công từ cookie';
    header('Location: login_success.php');
    exit();
}

// Trong trường hợp user đã login thành công mà cố tình truy cập lại form login ( file hiện tại), thì cần chuyển hướng tới trang đăng nhập thành công
if (isset($_SESSION['username'])) {
    $_SESSION['success'] = 'Bạn đã đăng nhập rồi';
    header('Location:login_sucess.php');
    exit();
}   
    // Demo chức năng đăng nhập đơn giản sử dụng session
    // Trường hợp đăng nhập thành công username bất kỳ, password > 3 ký tự
    $error = '';
    // ko cần khai báo biến $result vì các message thành công sẽ hiển thị ở file khác
    // Debug thông tin biến $_POST
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // Kiểm tra xem đã submit form hay chưa
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // + Validate form, username phải có định dạng email
        // + Username và password ko dc để trống
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $error = 'Username phải là email';
        }
        elseif (empty($password)) {
            $error = 'Password ko dc để trống';
        }

        // Xử lý logic submit form chỉ khi ko có lỗi xảy ra
        if (empty($error)) {
            // Lấy dra độ dài của password
            $password_length = strlen($password);
            if ($password_length >=3 ) {
                // Do trong form có chức năng ghi nhớ đăng nhập nên nếu đăng nhập thành công và có tích checkbox ghi nhớ đăng nhập thì mới lưu cookie username và password
                if (isset($_POST['remember']) && $_POST['remember'] == 1) {
                    setcookie('username' , $username, time() + 1120);
                    setcookie('password', $password, time() + 1120);
                }
                // Chuyển hướng sang 1 trang khác, tại trnag đó sẽ hiển thị username vừa đăng nhập kèm theo thông báo: đăng nhập thành công
                // Cần sử dụng sessin để lưu thông tin username và message thành công để tại file khác có thể sử dụng lại
                $_SESSION['username'] = $username;
                $_SESSION['success'] = 'Đăng nhập thành công';
                // CHuyển hướng user sang trang khác, sử dụng hàm 
                // Header()
                header('Location: login_success.php');
                // Kết thúc chuyển hướng luôn dùng hàm exit để đảm bảo chuyển hướng thành công trong mọi trường hợp
                exit();
            }
            else {
                // Nếu hiển thị lỗi vẫn ở trang hiện tại thì sẽ gán thông tin lỗi đó cho biến $error
                $error = 'Sai tài khoản hoặc mật khẩu';
            }
        }
    }
?>
<h3 style = "color :red"></h3>
    <?php echo $error; ?>
    <?php if(isset($_SESSION['error'])): ?>
    <h3 style = "color: red">
        <?php
            echo $_SESSION['error'];
            // Sau khi hiển thị ra lỗi, cần xóa session error đi để các lần refresh trang sau ko hiển thị nữa
            unset($_SESSION['error']);
        ?>
    </h3>
    <?php endif ?>
    <?php if(isset($_SESSION['success'])): ?>
    <h3 style = "color: green">
        <?php
            echo $_SESSION['success'];
            // Sau khi hiển thị ra lỗi, cần xóa session error đi để các lần refresh trang sau ko hiển thị nữa
            unset($_SESSION['success']);
        ?>
    </h3>
    <?php endif ?>
<form action="" method = "post">
    Username:
    <input type="text" name = "username" value = "">
    <br/>
    Password :
    <input type="password" name = "password" value = "">
    <br/>
     <!-- Nếu chỉ có 1 check box duy nhất thì ko cần khai báo name dạng mảng 
    vẫn cần check nếu tích vào checkbox thì mới xử lý
    -->
    <input type="checkbox" name = "remember" value = "1" />
    Ghi nhớ đăng nhập
    <br/>
    <input type="submit" name = "submit" value = "login">
</form>
 
   