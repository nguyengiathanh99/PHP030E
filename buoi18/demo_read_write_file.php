<?php
    // Demo việc đọc và ghi file trong PHP
    // VD: tạo ra các chức năng import file trên hệ thống, ví dụ
    // FIled excel, file csv
    // PHP hỗ trợ các hàm sau cho việc đọc/ ghi file: fopen, fwrite, fread, file_get_contents, file_put_contents. file
    // 1 - Đọc nội dung file trong file test.txt, có 2 kiểu đọc:
    // + - ĐỌc nội dung theo từng dòng, sử dụng hàm file($file_path)
    // Trả về 1 mảng và mỗi phần tử của mảng chính lầ 1 dòng mà nó đọc dc
    $rows = file('test.txt');
    foreach ($rows as $row) {
        echo "$row <br/>";
    }
    echo "<pre>";
    print_r($rows);
    echo "</pre>";

    // + Đọc toàn bộ nội dung fille, dùng hàm file_get_content($file_path)
    // Hàm này sẽ dùng thay thế cho các hàm fopen, fread

    // $file_content = file_get_contents('https://vnexpress.net/de-xuat-mo-duong-bay-quoc-te-vao-cuoi-thang-7-4122678.html');
    // echo $file_content;
    // file get contents lấy dc bất cứ nội dung file trong url
    // Lấy nội dung file của 1 domain thật, tùy thuộc vào cơ chế của domain có cho phép lấy nội dung này

    // 2 - Ghi file
    // Sử dụng hàm file_put_contents($file_path, $content, $mode)
    // Ghi đè vào nội dung file cũ là file test.txt
    file_put_contents('test.txt' , 'Nội dung mới');
    // Đọc lại nội dung file test.txt sau khi đè file
    echo file_get_contents('test.txt');

    // Ghi nối tiếp vào nội dung file test.text-txt, cần truyền vào tham số  thứ 3 cho file _put_content
    file_put_contents('test.txt', 'Nội dung mới', FILE_APPEND);
    // 3 - Một số hàm có sẵn khác về thao tác với file
    // Xóa file: unlink($path_file)
    // Với hàm unlink thường sẽ thêm ký tự @ ở đầu hàm
    // Để bỏ qua lỗi khi xóa file k tồn tại
    // @unlink('test.txt');
    // Kiểm tra đường dẫn file/ thư mục có tồn tại hay k
    // file_exist($path)
    $is_exist = file_exists('test.txt');
    var_dump($is_exist);
    // fopen, fread, fwrite, fclose: tham khảo thêm, dùng để mở file đọc, ghi, đóng...

?>