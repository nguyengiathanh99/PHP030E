<?php
session_start();
    // Bắt buộc phải khởi tạo session thì mới dùng được biến $_SESSION
    // Sử dụng hàm session_start, thường sẽ dc khai báo ở trên cùng của file
    // 1 - Khái niệm 
    // Session được hiểu như 1 phiên làm việc, sẽ mất đi khi close trình duyệt
    // Các giá trị được lưu session có thể được truy cập ở bất cứ file nào trên hệ thống
    // 1 số ứng dụng của session: login, giỏ hàng
    // Session chỉ dc lưu trên server, ko phải trên trình duyệt nên có độ bỏa mật cao

    // 2 - PHP có sẵn 1 biến toàn cục để lưu trữ tất cả thông tin session trên hệ thống, $_SESSION, là biến kiểu mảng
    // Thử debug
   

    // 2 - Thao tác với session giống hệt thao tác với mảng
    // + Thêm dữ liệu cho session, thêm phần tử cho mảng
    // CHú ý: key của phần tử trong session ko thể là số
    $_SESSION['name'] = 'Thành';
    $_SESSION['age'] = 21;
    $_SESSION['a'] = 1; // thêm phần tử cho session với key = 0
    $_SESSION['b'] = 'abc'; // thêm phẩn tử cho sesison với key = 1
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";  
    //+ Lấy giá trị của session, chính là lấy giá trị theo key của phần tử
    echo $_SESSION['name']; // Thành
    
    // Xóa session, chính là xóa phần tử theo key tương ứng
    // Sử dụng hàm unset
    unset($_SESSION['name']);
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    // Xóa tất cả sesison trên hệ thống, sử dụng hàm sesison destroy
    // Tuy nhiên hàm này chỉ hoạt động khi chạy code lần thứ 2
    // Nên thông thường vẫn sử dụng hàm unset để xóa session tương ứng

?>