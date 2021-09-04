<?php
session_start();
    // Xử lý submit form
    $error = '';
    $result = '';
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        // Kiểm tra validate-> tự làm
        // Xử lý submit form, khi user nhập họ tên và submit form thì sẽ hiển thị
        // Họ tên user đó ở 1 file khác
        if (empty($error)) {
            $_SESSION['fullname'] = $fullname;
            // Chuyển hướng tới trang show.php và hiển thị họ tên ở file này
            header('Location:show.php');
            exit();
        }
    } 

?>
<form action="" method = "post">
    <h2>Form đăng ký thông tin</h2>
    Họ tên:
    <input type="text" name = "fullname" value = "" />
    <br/>
    Giới tính:
    <input type="radio" name = "gender" value = "0" > Nữ
    <input type="radio" name = "gender" value = "1" > Nam
    <br/>
    Nghề nghiệp: 
    <input type="checkbox" name = "jobs[]" value = "0" /> Developer
    <input type="checkbox" name = "jobs[]" value = "1" /> Tester
    <input type="checkbox" name = "jobs[]" value = "2" /> Ba
    <br/>
    Quốc gia: 
    <select name="country" id="">
        <option value="0">Việt Nam</option>
        <option value="1">USA</option>
    </select>
    <br/>
    <input type="submit" name = "submit" value = "Đăng ký" />
</form>