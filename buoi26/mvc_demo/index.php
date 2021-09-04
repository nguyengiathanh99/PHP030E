<!--
Bài toán: Xây dựng úng dụng CRUD, sử dụng mô hình MVC
 + Cần xây dựng cấu trúc thư mục cho mô hình MVC,
cấu trúc thư mục thì sẽ do chính bạn được tư quy định
 + Với khóa học thì sẽ xây dựng cấu trúc thư mục như sau
 mvc_demo/
        /index.php: là file index gốc của ứng dụng, mọi require từ user đều đi qua file này
        đầu tiên, file này sẽ phân tích request để xác định xem controller nào sẽ xử lý,
        tên file luôn là index.php
        /.htaccess: Tạo ra các url của ứng dụng dưới dạng rewite, url ở dạng thân thiện với
        người dùng
        /assets: thư mục chứa các file về frontend
            /css: chứa các file.css
                /style.css
            /js: chứa các file .js của ứng dụng
                /script.js
            /images: chứa các ảnh tĩnh của ứng dụng
            /fonts
            /webfonts
        /configs: chứa các class liên quan đến cấu hình
        như database, config hệ thống...
            /Database.php: class chứa các hằng số kết nối CSDL, tên class sẽ viết hoa
            chữ cái đầu tiên, tên class trùng tên file 
        /controllers: chứa các class Controller của ứng dụng
                    /CategoriesController.php: tên controller ở dạng <tên>
        /models: chứa các class Model của ứng dụng
                /Category.php: chứa class Category
        /views: chứa các view bên trong
                /categories: chứa các file view của danh mục
                            /index.php: liệt kê danh mục
                            /create.php: tạo danh mục
                            /update.php: sửa
                            /detail.php: chi tiết
                /layouts: chứa các file layout của ứng dụng
                        /header.php: header của trang
                        /footer.php: footer của trang
                        /main.php: layout chính của ứng dụng
                        
 -->