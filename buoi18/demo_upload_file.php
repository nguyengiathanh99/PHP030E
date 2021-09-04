<!-- Xử lý upload file trong form
    Khi trong form của bạn có input file thì bắt buộc form đó phải có các tính chất sau
    - Phương thức của form bắt buộc phải là POST
    - Phải thêm thuộc tính sau cho form, enctype và giá trị tương ứng của thuộc tính enctype=multipart/form-data

    PHP cũng sinh ra 1 biến chứa toàn bộ thông tin file upload lên có tên là: $_FILES, ko thể dùng biến $_POST để lấy thông tin file dc

    Mô tả về biến $_FILES: là mảng 2 chiều, có dạng như sau
    $_FILES[tên-input-file][thuộc-tính]
    Thuộc tính bao gồm 5 thuộc tính sau
    - name: tên file dc upload
    - type : kiểu dữ liệu của file
    - tmp_name: đường dẫn tạo mà sever đã upload tạm cho bạn
    - size: kích thước file upload , tính bằng đơn vị Byte,
    1 MB = 1024KB = 1024*1024B
    - error:  trạng thái lỗi khi upload, có các giá trị cụ thể sau
    0 : ko có lỗi, khi upload
    1 : file upload hơi quá dung lượng cho phép trong file cấu hình
    2 : số file upload vượt quá số file cho phép trong file cấu hình...
    ....
    Chỉ cần quan tâm đến giá trị 0 - nếu = 0 thì upload k lỗi, khác 0 thì là lỗi

 -->
 <?php
//debug mảng
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    // debug mản chứa thông tin file $_FILES
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    // Xử lý submit form
    $error = '';
    $result = '';
    if (isset($_POST['submit'])) {
        // Tạo ra các biến chứa thông tin file
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_type = $_FILES['avatar']['type'];
        $avatar_tmp_name = $_FILES['avatar']['tmp_name'];
        $avatar_error = $_FILES['avatar']['error'];
        $avatar_size = $_FILES['avatar']['size'];
        // Xử lý validate nếu có file upload lên
        // - Phải có dạng ảnh: png, jpg, jpeg, gif...
        // - File upload dung lượng k dc vượt quá 2Mb
        // Theo yêu cầu đề bài nếu user upload file lên thì mới check validate
        // Dựa vào thuộc tính error,
        // Nếu error = 0 tương đương có file upload lên thì mới xử lý
        
        if ($avatar_error == 0) {
            // validate phải là ảnh, sử dụng hàm parthinfo để lấy ra đuôi file dựa vào tên file
            $extension = pathinfo($avatar_name, PATHINFO_EXTENSION);
            // var_dump($extension);
            // Kiểm tra xem các file hình ảnh có đuôi giống trong 4 file này k
            $extension_allowed = ['png', 'jpg' , 'jpeg' , 'gif'];
            // CHuyển đổi file tìm được thành chữ thường
            $extension = strtolower($extension);
            // Chuyển size từ Byte về Mb
            $avatar_size_mb = $avatar_size / 1024 / 1024;
            // Muốn làm tròn phần thập phân
            // Giữ lại 2 ký tự sau phần thập phân để nhìn cho gọn
            $avatar_size_mb = round($avatar_size_mb, 2);
            if (!in_array($extension, $extension_allowed)) {
                $error = 'Phải upload file ảnh';
            }
            // Để test thì để size > 0.2Mb
            elseif ($avatar_size_mb > 2) {
               $error = "Dung lượng file k dc vượt quá 2Mb";
            }
            
        }
        // Xủ lý logic submit form khi k có lỗi gì xảy ra
        if (empty($error)) {
           // xử lý upload file lên trên hệ thống
           // chỉ upload khi user có hành động upload lên
           if ($avatar_error == 0) {
               // Tạo 1 thư mục chứa các file sẽ upload lên
               // Với tên là uploads, thư mục này sẽ ngang hàng với file code hiện tại
                // Tạo thư mục sử dụng code thì cần phải sử dụng đường dẫn tuyệt đối đó: _DIR_
                $dir_uploads = __DIR__ . '/uploads';
                // Tạo thư mục, cần kiểm tra nếu thư mục upload chưa tồn tại thì mới tạo
                if (!file_exists($dir_uploads)) {
                    mkdir($dir_uploads);
                }
                // Tạo nên file mang tính duy nhất, để tránh trường hợp user upload nhiều file trùng tên -> mất file
                // Sử dụng hàm time() để sinh chuỗi ngẫu nhiên 
                $avatar_name = time() . '-' .$avatar_name;
                // upload file vào thưc mục upload đã tạo
               $is_upload = move_uploaded_file($avatar_tmp_name, $dir_uploads . '/'  . $avatar_name);
               var_dump($is_upload);
            //    Hiển thị thông tin ra ảnh
            if ($is_upload) {
                $result .= "tên file ảnh: $avatar_name <br>";
                $result .= "<img src='uploads/$avatar_name' height = '80'/>";
                $result .= "<br> định dạng file: $extension </br>";
                $result .= "đường dẫn vật lý:  $dir_uploads/$avatar_name <br>";
                $result .= "kích thước file Mb: $avatar_size_mb";
            }
           } 
        }
    }
 ?>
 <h3 style = "color:green">
 <?php echo $result; ?>
 </h3>
 <h3 style = "color:red">
 <?php echo $error; ?>
 </h3>
 <form action="" method = "post" enctype = "multipart/form-data">
 <!-- Với input file thuộc tính value sẽ k có tác dụng -->
      Upload avatar:
      <input type="file" name = "avatar">
      <br/>
      <input type="submit" name = "submit" value = "upload">

 </form>

