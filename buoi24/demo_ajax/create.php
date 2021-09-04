<?php
    // demo_ajax/create.php
    // Mục đích: thêm dữ liệu vào CSDL mà k cần dùng form
    // 1- Khái niệm Ajax
    // + Viết tắt Asynchronous Javascript and XML, nó là 1 kỹ thuật
    // Để tạo ra các trang web k đồng bộ , nghĩa là chức năng sử dụng
    // Ajax có thể chạy được trước các chức năng
    // + Bình thường với 1 web PHP thuần thi sẽ theo cơ chế đồng bộ:
    // Chức năng nào gọi trước sẽ chạy trước, và các chức năng sau phải chờ
    // CHức năng trc đó chạy xong thì mới dc chạy
    // + Ajax có cơ chế thao tác lấy dữ liệu mà k hề tải lại trang
    // Có trải nghiệm tốt hơn với người dùng so với PHP so với PHP thuần
    // Các framework JS như: Node, Angular, React đểu sử dụng cơ chế tương tự Ajax
    // + Thay vì dùng Js thuần để gọi ajax thì sẽ sử dụng thư viện Jquery thay thế để cho đơn giản
    
    // DEMO ỨNG DỤNG THÊM DỮ LIỆU VÀO BẢNG CATEGORIES CỦA CSDL DAY22 
    // SỬ DỤNG CƠ CHẾ AJAX (KO CẦN FORM)

    // Copy file jquery-<Version>.min.js vào cấu trúc thư mục tại
    //  + Bảng catefories đnag có các tường sau: id, nam, description, avatar, created_at
?>
<!-- Do sử dụng Ajax nên nhúng file jquery vòa để thao tác cho tiện -->
<script type = "text/javascript" src = "js/jquery-3.2.1.min.js"></script>
<script type = "text/javascript" src = "js/main.js"></script>
    Nhập tên:
    <input type="text" name = "name" id = "name" value = ""/>
    <br/>
    Nhập mô tả: 
    <textarea  id = "description"></textarea>
    <br/>
    <button id = "save">Lưu</button>


