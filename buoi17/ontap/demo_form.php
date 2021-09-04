<?php

use Illuminate\Validation\Concerns\FilterEmailValidation;

$error = '';
    $result = '';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $error = "Không được để trống tài khoản mật khẩu";
        }
        elseif (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $error = "Username phải để định dạng là Email";
        }
        elseif(strlen($password) < 8 ) {
            $error = 'Mật khẩu phải lớn hơn 8 ký tự';
        }

        if (empty($error)) {
            if ($username == 'Nguyengiathanh1999@gmail.com' && $password == '123456789') {
                $result = "Đăng nhập thành công";
            }
            else {
                $error = "Tài khoản mật khẩu không đúng định kiểu";
            }
        }
    }
?>
<h3 style="color: red;">
    <?php echo $error ?>
</h3>
<h3 style="color:green;">   
    <?php echo $result; ?>
</h3>
<form action="" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" value=""><br>
    <label for="password">Password</label>
    <input type="password" name="password" value=""><br>
    <input type="submit" name="submit" value="Gửi">
</form>