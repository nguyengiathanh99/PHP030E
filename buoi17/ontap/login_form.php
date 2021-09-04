<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $html = $_POST['html'];
        $css = $_POST['css'];
        $java = $_POST['java'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];
        $descreption = $_POST['descreption'];
        if (isset($name)) {
            echo "Tên của :" .$name;
        }
        if (isset($password)) {
            echo "Mật khẩu :" .$password; 
        }
        if (isset($html)) {
            echo "Chuyên ngành" .$html;
        }
        if (isset($css)) {
            echo "Chuyên ngành" .$css;
        }
        if (isset($java)) {
            echo "Chuyên ngành" .$java;
        }
        if (isset($gender)) {
            echo "Giới tính:" .$gender;
        }
        if (isset($city)) {
            echo "Thành phố:" .$city;
        }
        if (isset($descreption)) {
            echo "Ghi chú: " .$descreption;
        }
    }
?>
<form action="" method="post">
    Họ tên: 
    <input type="text" name="name" value=""><br>
    Mật khẩu:
    <input type="password" name="password" value=""><br>
    Đăng ký môn học:
    <input type="checkbox" name="html" value="html"> HTML
    <input type="checkbox" name="css" value="css"> CSS
    <input type="checkbox" name="java" value="java">JAVA
    <br>
    Giới tính:
    <input type="radio" name="gender" value="Nam"> Nam
    <input type="radio" name="gender" value="Nữ"> Nữ
    <br>
    Thành phố:
    <select name="city" id="">
        <option value="HN">Hà Nội</option>
        <option value="HCM">Hồ Chí Minh</option>
        <option value="DN">Đà Nẵng</option>
    </select>
    <br>
    Tin nhắn:
    <textarea name="descreption" id="" cols="30" rows="10"></textarea>
    <br>
    <input type="submit" name="submit" value="Gửi">
</form>