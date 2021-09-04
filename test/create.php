<?php
    require_once 'database.php';
    $error = '';
    $result = '';
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $avatar_arr = $_FILES['avatar'];
        $avatar = '';
        $descreption = $_POST['descreption'];
        if (empty($name) || empty($descreption)) {
            $error = 'Name và Descreption không được để trống';
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = 'Email cần đúng định dạng';
        }
        elseif ($avatar_arr['error'] == 0) {
            $extension = pathinfo($avatar_arr['name'], PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $extension_allowed = ['jpg','jpeg','png','gif'];
            $avatar_arr_size = $avatar_arr['size'] /1024 /1024;
            $avatar_arr_size = round($avatar_arr_size, 2);
            if (!in_array($extension,$extension_allowed)) {
                $error = 'Cần upload đúng file ảnh';
            }
            elseif ($avatar_arr_size > 2) {
                $error = 'File upload phải dưới 2MB';
            }
        }
        if (empty($error)) {
            if ($avatar_arr['error'] == 0) {
                $dir_upload = 'Upload';
                if (!file_exists($dir_upload)) {
                    mkdir($dir_upload);
                }
                $avatar = time() .'-'.$avatar_arr['name'];
                move_uploaded_file($avatar_arr['tmp_name'],$dir_upload .'/'.$avatar);
            }
            $sql_insert = "INSERT INTO categories(name,email,avatar,descreption)
            VALUES('$name','$email','$avatar','$descreption')";
            $is_insert = mysqli_query($connection,$sql_insert);
            // var_dump($is_insert);
            if ($is_insert) {
                $_SESSION['success'] = 'Insert thành công';
                header('Location:create.php');
                exit();
            }
            else {
                $error = "Insert thất bại";
            }
        }
    }
?>
<h3 style="color: red;">
    <?php echo $error; ?>
</h3>
<h3 style="color:green;">
    <?php echo $result; ?>
</h3>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo bảng</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        Name:
        <input type="text" name="name" value=""><br>
        Email:
        <input type="email" name="email" value=""><br>
        Avatar:
        <input type="file" name="avatar" value="file"><br>
        Descreption:
        <textarea name="descreption" id="" cols="10" rows="5"></textarea><br>
        <input type="submit" name="submit" value="Thêm">
        <a href="category.php">Danh sách</a>
    </form>
</body>
</html>
