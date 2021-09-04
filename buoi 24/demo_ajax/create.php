<?php
//create.php
// mục đích: thêm dữ liệu vòa csdl mà không cần dùng form
// 1 - khái niệm ajax
// + viết tắt asynchronous Javascript and XML, nó là 1 kỹ thuật để tạo ra các
// trang wed không đồng bộ, nghĩa là chức năng sử dụng ajax có thể chạy tước các chức năng
// + Bình thường với 1 web php thuần thì sẽ chạy theo cơ chế đồng bộ:
// chức năng nào gọi trước thì sẽ  chạy trước, và các chức năng sau phải chờ chức năng trước
// đó chạy xong thì nói mới được chạy
// + Ajax có cơ chế thao tác với dữ liệu mà không hề tải lại trang có trải nghiệm tốt hơn với người dùng so với php thuần
// Các framework js như sau: node, angular, react đều sử dụng cơ chế tương tự ajax
// + thay vì sử dụng js thuần để gọi ajax, thì sẽ sử dụng thư viện jquery thay thế cho đơn giản

//DEMO ỨNG DỤNG THÊM DỮ LIỆU VÀO BẢNG CATEGORIES CỦA CSDL DAY 22 SỬ DỤNG CƠ CHẾ AJAX( K CẦN FORM)
//copy file jquery --<version>.min.js vào cấu trúc thư mục
//demo_ajax/js/jquery..min.js: file jquery
//            /main.js: file custom code js
// + bảng categories đang có trường sau: id, name, description, avatar, created_at
?>
<!--do sử dụng ajax nên nhúng file jquery vào để thao tác cho tiện-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<form>
    Nhập tên:
    <input type="text" id="name" name="name" value="">
    <br>
    Nhập mô tả:
    <textarea id="description"></textarea>
    <br>
    <button id="save">Lưu</button>
</form>
