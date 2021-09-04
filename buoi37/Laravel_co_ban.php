<!-- 
    + Khái niệm chung
    - Laravel là 1 framework của PHP, dựa trên mô hình MVC và OOP
    - CÓ thể tưởng tượng Laravel chính là 1 ứng dụng MVC giống như bạn tự viết nhưng đây là do
    bên thứ 3 viết
    - Laravel học khá dễ so các framework khác, cộng đồng hỗ trợ lớn
    - Lên trang chủ Laravel tự học
    - Laravel ko copy project Laravel từ máy khác về, chưa chắc nó đã chạy trên máy của bạn,
    Laravel cài đặt trên phiên bản PHP đang cài trên máy -> đó là lý do tại sao Laravel luôn dùng
    Composer để cài đặt
    - Composer là trình quản lý các thư viện từ bên thứ 3 1 cách tự động
    + Các bước xây dựng ứng dụng CRUD từ đầu với FrameWork Laravel
    1 - Tạo CSDL và tạo các bảng
    Tạo CSDL PHP0320e_laravel
    Tạo bảng products: id,title,avatar,description,created_at,updated_at

    CREATE DATABASE IF NOT EXISTS php0320e_laravel
    CHARACTER SET utf8 COLLATE utf8_general_ci;
    - Tạo bảng: sử dụng công cụ rất mạnh của Laravel: artisan, học Laravel ko biết
    artisan thì thôi!
    + Khi teamwork luôn thao tác với bảng bằng Artisan thông qua cơ chế migrate
    Cú pháp tạo: sinh ra các file migrate bằng lệnh sau:
    php artisan make:miggration <tên file migrate>
     -- create=<tên bảng ở dạng số nhiều>
    + Tên bảng trong Laravel nên đặt ở dạng số 
    + File sau khi tạo sẽ nằm ở database/migrations/
    + VD:
    php artisan make: migration create_table_products
    --create==products
 -->