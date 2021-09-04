<?php
session_start();
// example_demo/thuc_hanh3/php
// xử lý SUBMIT FORM
$error = '';
$result = '';
echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    // kiểm tra validate -> tự làm
    // xử lý submit form, khi user nhập họ tên và submit form thì sẽ hiển thị họ tên user đó về 1 file khác
    if (empty($error)) {
        $_SESSION['fullname'] = $fullname;
        // chuyển hướng tới trang show.php và hiển thị họ tên ở file này
        header('Location: show.php');
        exit();
    }
}
?>
<form action="" method="post">
    <h2>Form đăng ký thông tin</h2>
    Họ tên:
    <input type="text" name="fullname" value="">
    <br>
    Giới tính:
    <input type="radio" name="gender" value="0"> Nữ
    <input type="radio" name="gender" value="1"> Nam
    <br>
    Nghề nghiệp:
    <input type="checkbox" name="jobs[]" value="0"> Developer
    <input type="checkbox" name="jobs[]" value="1"> Tester
    <input type="checkbox" name="jobs[]" value="2"> BA
    <br>
    Quốc gia:
    <select name="country" id="">
        <option value="0">Viet Nam</option>
        <option value="1">USA</option>
    </select>
    <br>
    <input type="submit" name="submit" value="Đăng ký">
</form>
