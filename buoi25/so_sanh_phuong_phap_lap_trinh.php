<?php
    // So sánh phương pháp lập trình php
    // So sánh các phương pháp lập trình từ trc đến giờ
    // Trong khóa học
    //  + Lập trình tuyến tính: phổ biến ở các bạn mới, nghĩ gì viết nấy
    // Vd: bài toán cộng 2 số
    $a = 5;
    $a = 6;
     echo "$a + $b = " .($a + $b);
    // Nhược điểm: khó bảo trì code khi project lớn, code ko có tính sử dụng lại, ko có bỏa mật
    // + Lập trình có cấu trúc - Function: đã biết viết hàm
    // chia project của bạn thành các chức năng, và mỗi chức năng được viết thành hàm
    // Phương pháp này khá ổn khi chưa có lập trình hướng đối tượng
    // VD: code 1 chức năng quản lý sinh viên, sẽ chia thành các function như sau
    function connectDatabase() {}
    function disconnectDatabase() {}
    function addstudent() {}
    function editstudent() {}
    function liststudent() {}
    function deletestudent() {}
    // + Lập trình hướng đối tượng: đây chính là cách tiếp cận phổ biến nhất hiện nay
    //  Lấy đối tượng làm trung tâm để đưa ra các thuộc tính mà đối tượng đó có thể có
    // VD: Lấy đối tượng sinh viên để phân tích, thì các thuộc tính có thể có của sinh viên:
    // Id, name, tên sv, tuổi, ngày sinh....
    // CÓ các phương thức: study, beer
    ?>