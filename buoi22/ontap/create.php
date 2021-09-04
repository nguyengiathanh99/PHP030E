<?php

use phpDocumentor\Reflection\Location;
use Symfony\Component\Mime\Header\Headers;

session_start();
    require_once 'database.php';
    $error = '';
    $result = '';

    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $avatar_arr = $_FILES['avatar'];
        $descreption = $_POST['descreption'];

        if (empty($name) || empty($descreption)) {
            $error = 'Name và Descreption không được để trống';
        }
        elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = 'Email phải đúng định dạng';
        }
        elseif ($avatar_arr['error'] == 0) {
           $extension = pathinfo($avatar_arr['name'],PATHINFO_EXTENSION);
           $extension = strtolower($extension);
           $extension_allowed = ['jpg','jpeg','png','gif'];
           $extension_size_mb = $avatar_arr['size'] /1024 /1024;
           $extension_size_mb = round($extension_size_mb, 2);
           if (!in_array($extension,$extension_allowed)) {
               $error = 'Cần upload đúng file ảnh';
           }
           elseif ($extension_size_mb > 2) {
               $error = 'File upload phải dưới 2MB';
           }     
        }
        if (empty($error)) {
            $avatar = '';
            if ($avatar_arr['error'] == 0) {
                $dir_upload = 'Image';
                if (!file_exists($dir_upload)) {
                    mkdir($dir_upload);
                }
                $avatar = time() . '-'. $avatar_arr['name'];
                move_uploaded_file($avatar_arr['tmp_name'],$dir_upload .'/'. $avatar);
            }
            $sql_insert = "INSERT INTO categories (`name`,`email`,`avatar`,`descreption`)
            VALUES ('$name','$email','$avatar','$descreption')";
            $is_insert = mysqli_query($connection,$sql_insert);
            // var_dump($is_insert);
            if ($is_insert) {
                $_SESSION['success'] = 'Insert thành công';
                header('Location:index.php');
                exit();
            }
            else {
                $error = 'Insert thất bại';
            }
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title></title>
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" value="" class="form-control">
            </div>  
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="descreption">Descreption</label>
                <textarea name="descreption" id="" cols="15" rows="5" class="form-control"></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Save">
           
             <a href="index.php" class="alert-link">List</a> 

        </form>
    </div>
</body>
</html>