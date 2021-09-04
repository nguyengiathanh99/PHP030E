<?php
/**
 * Laravel cơ bản
 * + Khái niệm chung
 * - Laravel là 1 framework của PHP, dựa trên mô hình MVC và
 * OOP
 * - Có thể tưởng tượng Laravel chính là 1 ứng dụng MVC giống
 * như bạn tự viết, nhưng đây là do bên thứ 3 viết
 * - Laravel học khá dễ so các framework khác, cộng đồng hỗ
 * trợ rất lớn
 * - Lên trang chủ Laravel tự học
 * - Laravel copy project Laravel từ máy khác về, chưa chắc
 * nó đã chạy trên máy của bạn, Laravel cài đặt tự động dựa theo
 * phiên bản PHP đang cài trên máy -> đó là lý do tại sao Laravel
 * luôn dùng Composer để cài đặt
 * - Composer là trình quản lý các thư viện từ bên thứ 3 1 cách
 * tự động
 * + CÁc bước xây dựng 1 ứng dụng CRUD từ đầu với
 * Framework Laravel: tin tức
 * 1 - Tạo CSDL và tạo các bảng
 * Tạo CSDL PHP0320e_laravel
 * Tạo bảng products: id, title, avatar, description,
 * created_at, updated_at
 * - Tạo CSDL bằng tay:
 * CREATE DATABASE IF NOT EXISTS php0320e_laravel
 * CHARACTER SET utf8 COLLATE utf8_general_ci;
 * - Tạo bảng: sử dụng công cụ rất mạnh của Laravel:
 * artisan, học Laravel ko biết artisan thì thôi!
 * + Khi teamwork, luôn thao tác với bảng bằng artisan thông qua
 * cơ chế migrate
 * + Cú pháp tạo bảng: sinh ra các file migrate bằng lệnh sau:
 * php artisan make:migration <tên file migrate>
 * --create=<tên bảng ở dạng số nhiều>
 * + Tên bảng trong Laravel nên đặt ở dạng số nhiều
 * + File sau khi tạo sẽ nằm ở database/migrations/
 * + VD:
 * php artisan make:migration create_table_products
 * --create=products
 * + Sau khi tạo các file migrate xong, chạy lệnh sau để thực
 * thi các file migrate đó:
 * php artisan migrate
 * + Lưu ý: cần kết nối CSDL trước khi chạy migrate, cài đặt tại
 * file .env
 * + Trong trường hợp cần drop hết bảng r tạo lại, sử dụng lệnh
 * sau thay thê:
 * php artisan migrate:fresh
 *
 *  2 - Khai báo các route tại routes/web.php
 * + Mọi chức năng đều cần khai báo các route thì mới truy cập
 * đc
 * + Route trong Laravel tương đương với file .htaccess trong MVC
 * + Cơ chế route ở mức trừu tượng cao hơn so với việc thao tác
 * với .htaccess của MVC
 *
 * 3 - Tạo controller theo chuẩn Laravel, sử dụng artisan
 * để tạo
 * php artisan make:controller <đường dẫn tới controller>
 * + Controller luôn nằm ở đường dẫn: app/Http/Controllers
 * + Laravel hỗ trợ tạo 1 controller sinh sẵn các phương thức
 * theo chuẩn của nó luôn: resources, viết cú pháp như sau:
 * php artisan make:controller <đường dẫn controller> --resource
 */