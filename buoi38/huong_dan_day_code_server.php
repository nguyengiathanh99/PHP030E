<?php
/**
    Đườn dẫn đẩy code lên server.fa-php
    - Muốn web của bạn chạy online bất cứ ai cũng có thể truy cập tại bất cứ thời điểm nào
    -> thuê 1 server để đẩy web của bạn lên đó, có 2 khái niệm chính : thuê hosting và thuê 
    domain
    + Hosting: chính là nời đặt web của bạn vào, về bản chất hosting chính là các thư mục, so 
    sánh với localhost thì hosting chính là các thư mục nằm trong htdocs trong XAMPP,
    + Webserver có 2 loại chính là: Apache và Nginx
    Hướng dẫn đẩy code từ local -> server thật của ITPLUS    
    + Domain: Có thể không cần thuê domain mà vẫn truy cập được web, truy cập thông qua IP 
    của hosting, tuy nhiên IP rất khó với user -> cần phải thuê domain
    - Để đẩy được code 1 server bất kỳ, cần được cung cấp các thông tin sau
    + Thông tin upload:
    IP của hosting:
    Username:
    Password:
    Giao thức chuyển file: FTP, cổng mặc định: 21. Có thể dùng phần mềm như FileZilla hoặc ngay 
    bản thân PHPStorm
    + Thông tin kết nối CSDL
    IP/Domain của PHPMyadmin
    Username 
    Pasword
    Thao tác:
    Tạo 1 thư mục theo <tên ko dấu>_project, để trong htdocs, trong thư mục vừa tạo, tạo 1
    file test.php, bên trong file này tạo echo "<tên của bạn>";
    + DÙng PHPStorm để cấu hình đẩy code lên server như sau:
    Vào Tools/Develoyment/Configuation...Cấu hình 2 ở 2 tab Connection và Mappings
    Sau khi test kết nối thành công, vào Tools/Develoyment/Browse Remote Host để show ra 
    cấu trúc files / thư mục -> Develoyment -> Upload to...
 */
