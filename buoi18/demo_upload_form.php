<?php
   $error = '';
   $result ='';
   //debug thông tin mảng
   echo "<pre>";
   print_r($_POST);
   print_r($_FILES);
   echo "</pre>";
//    XỬ lý submit form
    if (isset($_POST['submit'])) {
        # code...
        // tạo bến trung gian
        $name = $_POST['name'];
        $age = $_POST['age'];
        // Với radio và checkbox sẽ có trường hợp k tích vào
        // Radio/ checkbox nòa mà submit form nếu cần check isset
        // Nếu tồn tại thì mới gán dc biến
        if (isset($_POST['gender'])) {
            # code...
            $gender = $_POST['gender'];
        }
        if (isset($_POST['jobs'])) {
            # code...
            $jobs = $_POST['jobs'];
        }
        $avatar = $_FILES['avatar'];
        // check validate cho form
        // Tất cả các trường k dc để trống
        // Phải tích chọn ít nhất 1 radio và checkbox
        // File upload nếu có phải có dạng ảnh
        if(empty($name)) {
            $error = 'Name k dc để trống';
        }
        elseif (empty($age) || !is_numeric($age)) {
            # code...
            $error = 'Age ko dc để trống và phải là số';
        }
        // Kiểm tra nếu chưa tích vào radio nào khi báo lỗi
        elseif (!isset($_POST['gender'])) {
            # code...
            $error = 'Cần chọn gender';
        }
        // Validate chưa chọn job nào
        elseif (isset($_POST['jobs[]'])) {
            # code...
            $error = 'Cần chọn ít nhất 1 jobs';
        }
        // Validate file upload phải là ảnh
        elseif ($avatar['error'] == 0 ) {
            # code...
            // Lấy tên file
            $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $extension_allowed = ['png' , 'jpg' , 'jpeg' , 'gif'];
            if (!in_array($extension, $extension_allowed)) {
                # code...
                $error = 'Phai upload file ảnh';
            }
        }
        // Hiển thị lỗi
        echo "<b> $error </b>";
        // Xử lý logic submit form chỉ khi ko có lỗi
        if (empty($error)) {
            # code...
            // Xử lý hiển thị các thông tin user đã chọn trên form
        }
    }
?>

<form action="" method = "post" enctype = "multipart/form-data">
    Name: 
    <input type="text" name = "name" value = "">
    <br>
    Age:
    <input type="text" name = "age" value = "">
    <br>
    Gender :
    <input type="radio" name = "gender" value = "0"> Male
    <input type="radio" name = "gender" value = "1"> Female
    <br>
    Jobs: 
    <input type="checkbox" name = "jobs[]" value = "0"> Coder
    <input type="checkbox" name = "jobs[]" value = "1"> Tester
    <br>
    Avartar:
    <input type="file" name = "avatar">
    <br>
    <input type="submit" name = "submit" value = "Show info">
</form>