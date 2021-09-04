<?php
    session_start();
    $error = '';
    $result = '';  
    require_once 'database.php';
    $id = $_GET['id'];
    if (!isset($id) || !is_numeric($id)) {
        $_SESSION['error'] = 'Id ko hợp lệ';
        header('Location:index.php');
        exit();
    }
    $sql_select_one = "SELECT * FROM categories WHERE id = $id";
    $result_assoc = mysqli_query($connection,$sql_select_one);
    $category = mysqli_fetch_assoc($result_assoc);
    // var_dump($category);

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $avatar_arr = $_FILES['avatar'];
        $descreption = $_POST['descreption'];

        if (empty($name) || empty($descreption)) {
            $error = 'Name và descreption không được để trống';
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = 'Email phải đúng định dạng';
        }
        elseif ($avatar_arr['error'] == 0) {
            $extension = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            $extension_allowed = ['jpg','jpeg','png','gif'];
            $avatar_arr_size_mb = $avatar_arr['size'] /1024 /1024;
            $avatar_arr_size_mb = round($avatar_arr_size_mb, 2);
            if (!in_array($extension,$extension_allowed)) {
                $error = 'Cần upload đúng file ảnh';
            }
            elseif ($avatar_arr_size_mb > 2) {
                $error = 'Cần upload file dưới 2MB';
            }
        }
        if (empty($error)) {
            $avatar = '';
            if ($avatar_arr['error'] == 0) {
                $dir_upload = 'Image';
                if (!file_exists($dir_upload)) {
                    mkdir($dir_upload);
                }
                @unlink("Image/$avatar");
                $avatar = time() .'-'.$avatar_arr['name'];
                move_uploaded_file($avatar_arr['tmp_name'],$dir_upload .'/'. $avatar );
            }
        }
        $update_sql = "UPDATE categories SET
         `name` = '$name', `email` = '$email', `avatar` = '$avatar', `descreption` = '$descreption'
        WHERE `id` = $id";
        $is_update = mysqli_query($connection,$update_sql);
        // var_dump($is_update);
        if ($is_update) {
            $_SESSION['success'] = 'Update thành công';
            header('Location:index.php');
            exit();
        }
        else {
            $_SESSION['error'] = 'Update thất bại';
        }
    }

?>
<h3 style="color: red;">
    <?php echo $error; ?>
</h3>
<h3 style="color: green;">
    <?php echo $result; ?>
</h3>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhập</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="" class="form-control">
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" value="" class="form-control">
            </div>
            <div class="form-group">Descreption</div>
            <textarea name="descreption" id="" cols="10" rows="5" class="form-control"></textarea>
            <input type="submit" name="submit" value="Cập nhập" class="btn btn-danger">
            <a href="index.php">Trở về</a>
        </form>
    </div>
</body>
</html>