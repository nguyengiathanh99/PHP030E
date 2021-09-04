<?php
    $error = '';
    $result = '';
    if (isset($_POST['submit'])) {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";

        $avatar_name = $_FILES['avatar']['name'];
        $avatar_type = $_FILES['avatar']['type'];
        $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
        $avatar_error = $_FILES['avatar']['error'];
        $avatar_size = $_FILES['avatar']['size'];

        if ($avatar_error == 0) {
            $extension = pathinfo($avatar_name,PATHINFO_EXTENSION);
            $extension_allowed = ['png','jpg','jpeg','gif'];
            $extension = strtolower($extension);
            $avatar_size_mb = $avatar_size / 1024 / 1024;
            $avatar_size_mb = round($avatar_size_mb,2);
            if ($avatar_size_mb > 2) {
                $error = "FIle upload dưới 2MB";
            }
            elseif (!in_array($extension,$extension_allowed)) {
                $error = "Cần phải upload dạng file ảnh";
            }

            if (empty($error)) {
                if ($avatar_error == 0) {
                    // Tạo 1 file
                    $dir_upload = 'image';
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    $avatar_name = time() .'-'.$avatar_name;
                    $move_upload_file = move_uploaded_file($avatar_tmp_name,$dir_upload .'/'.$avatar_name);
                    // var_dump($move_upload_file);
                    if ($move_upload_file) {
                        $result .= "Tên file là: $avatar_name <br>";
                        $result .= "<img src = 'image/$avatar_name' height = '80'> <br>";
                        $result .= "Định dạng file: $extension <Br>";
                        $result .= "Đường dẫn: $dir_upload/$avatar_name <Br>";
                        $result .= "Kích cỡ file: $avatar_size_mb";
                    }
                }
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
<form action="" method="post" enctype="multipart/form-data">
    Upload file ảnh:
    <input type="file" name="avatar" value="">
    <input type="submit" name="submit" value="Upload">
</form>