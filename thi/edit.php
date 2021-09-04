<?php
session_start();
    require_once 'database.php';
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        $_SESSION['error']= 'ID ko hợp lệ';
        header('Location:index.php');
        exit();
    } 
    $id = $_GET['id'];
  
    $sql_select_one = "SELECT * FROM students WHERE id = $id";

    $result_one = mysqli_query($connection, $sql_select_one);

    $category = mysqli_fetch_assoc($result_one);

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $number = $_POST['number'];
        $avatar_arr = $_FILES['avatar'];
        $description = $_POST['description'];
  
        if (empty($name) || empty($number)) {
          $error = ' Không được để trống họ tên và tuổi';
        }
        elseif ($number < 0) {
          $error = 'Phải nhập số lớn hơn 0 ';
        }
        elseif ($avatar_arr['error'] == 0 ) {
          $extension = pathinfo ($avatar_arr['name'], PATHINFO_EXTENSION);
          $extension = strtolower($extension);
          $extension_allowed = ['jpg', 'png', 'gif', 'jpeg'];
          $fize_size_mb = $avatar_arr['size'] / 1024 / 1024;
  
          if (!in_array($extension, $extension_allowed)) {
            $error = 'Cần upload dạng file ảnh';
          }
          elseif ($fize_size_mb > 2) {
            $error = 'File upload không được quá 2MB';
          }
        }
        if (empty($error)) {
            $avatar = '';
          
            if ($avatar_arr['error'] == 0) {
                $dir_upload = 'uploads';
               
                if (!file_exists($dir_upload)) {
                    mkdir($dir_upload);
                }
                
                $avatar = time() . '-' .$avatar_arr['name'];
                move_uploaded_file($avatar_arr['tmp_name'], $dir_upload . '/' . $avatar);
            }
        
            $sql_update = "UPDATE students SET `name`='$name',`age`='$number',
            `avatar`='$avatar',`description`='$description' WHERE `id` = $id";
            
            $is_update =  mysqli_query($connection, $sql_update);
            //  var_dump($is_update);
            if ($is_update) {
                $_SESSION['success'] = 'Sửa thành công';
                header('Location:index.php');
                exit();
            }
            else {
              $error = 'Sửa thất bại';
            }
        }
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
<h1>Sửa sinh viên</h1>
<a href="index.php">Về trang danh sách</a>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
    Họ tên:
    <input type="text" name="name" value="" class="form-control"/>
    </div>
    <div class="form-group">
    Tuổi:
    <input type="number" name="number" value="" class="form-control" />
    </div>
    <div class="form-group">
    Ảnh đại diện:
    <input type="file" name="avatar" class="form-control" />
    </div>
    <div class="form-group">
    Mô tả sinh viên:
    <textarea name="description" cols="20" class="form-control"></textarea>
    </div>
    <input type="submit" name="submit" value="Sửa" class="btn btn-success" />
    <input type="reset" name="reset" value="reset" class="btn btn-secondary" />
</form>

</body>
</html>