<?php
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
          
          $sql_insert = "INSERT INTO students (`name`,`age`,`avatar`,`description`)
                          VALUES('$name', '$number','$avatar','$description' )";
          
          $is_insert =  mysqli_query($connection, $sql_insert);
        //    var_dump($is_insert); 

          if ($is_insert) {
              $_SESSION['success'] = 'Insert dữ liệu thành công';
              header('Location:index.php');
              exit();
          }
          else {
            $error = 'Insert thất bại';
          }
  
      }
    }
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sinh viên</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body>
<h1>Thêm mới sinh viên</h1>
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
    <input type="submit" name="submit" value="Save" class="btn btn-success" />
    <input type="reset" name="reset" value="reset" class="btn btn-secondary" />
</form>

</body>
</html>