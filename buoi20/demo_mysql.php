<!-- 1 - Cơ sở dữ liệu mysql luôn đi kèm với ngôn ngữ PHP -->
<!-- 2- MYSQL mặc định được cài sẵn khi cài XAMPP (cùng với Apache và PHP) -->
<!-- 3 - XAMPP cũng tự cài đặt 1 công cụ để quản trị CSDL về mặt đồ họa là PHPMyadmin , thực tế
khi đi làm sẽ dùng các phần mềm chuyên dụng hơn để quản lý CSDL như workbench (free), Navicat -->
<!-- Navicat (crack) -->
<!-- 4 - Trong cơ sở dữ liệu sẽ có các bảng, vd: trang bán hàng sẽ có các bảng sau, tên bản thì
nên viết số nhiều và viết bằng chữ thường hết 
- categories: quản lý thông tin các danh mục trên hệ thống
- products: quản lý thông tin sản phẩm
- users: quản lý user trên hệ thống
- order_ details:  -->
<!-- 5 - Trong các bảng thì sẽ có:
+ Các trường/ cột: mô tả cấu trúc bảng
Vd: Bảng categories: Id, name, status, created_at....
+ Các hàng/ bản ghi: là các thông tin cụ thể của từng đối tượng bảng
Vd: id = 1, name = thể thao, status = 1, created_at = 06/07/2020
+ Khóa chính của bảng: thể hiện cho các bản ghi dc phân biệt với nhau, 1 bảng thường sẽ có 1
khóa chính là id
+ Mặt kỹ thuật thì khóa chính sẽ dc tự động tăng mỗi khi bảng sinh ra bản ghi mới
+ Khóa ngoại của bảng: là khóa chính của bảng khá, để thể hiện cho sự liên kết (relation) 
giữa các bảng
+ Các relation chính: 1 - 1, 1 - n, n - n
Thực hành thao tác cơ bản CSDL, MYSQL sử dụng PHPMyadmin
1 - Tạo CSDl php0320e: categories, có các trường là: id, name,  status, created_at
2 - Thêm các bản ghi mới cho bản categories
3 - Export CSDL vừa tạo để sử dụng ở 1 nơi khác, đuôi file của csdl là.sql, dùng tab Export
- Xóa CSDL vừa tạo sử dụng tab Operations
-->

<!--  Các câu truy vấn và thao tác với CSDL MYSQL -->
<!-- Trong MYSQL sẽ k phân biệt hoa thường, các từ khóa viết hoa hay thường đều được -->
<!-- 1 - Tạo CSDL 
#  tạo csdl nếu chưa tồn tại, đồng thời cho phép lưu chữ
# Ký tự có dấu (utf8)
CREATE DATABASE IF NOT EXISTS php0320e CHARACTER SET
utf8 COLLATE utf8_general_ci;
#2 - Sử dụng CSDL muốn thao tác, giả sử sẽ thao tác với CSDL php0320e vừa tạo
USE php0320e;
#3 - Xóa CSDL
DROP DATABASE demo1;
# muốn thao tác như tạo bảng, tạo trường, thêm bản ghi...thì cần đứng trong CSDL đó
# 4 - các kiểu dữ liệu trong MySQL
# là định dạng lưu các giá trị trong các bản ghi của bảng
# + kiểu số
# thông thường sử dụng 3 kiểu sau: Tinyint, INT, FLOAT.
# kiểu chuỗi: lưu các giá  trị là chuỗi
# thông thừng sử dụng 2 kiểu chính: VARCHAR - độ dài thay đổi linh hoạt, TEXT - khi không xác định được đô dài
# + kiểu date/ time: lưu theo định dạng ngày tháng năm
# thường sử dụng 2 kiểu chính:
# DATE TIME : lưu theo định dạng Y-M-D H:M:S :
# TIMESTAMP: lưu theo định dạng trên để lưu các giá trị tự động sinh ra như các trường liên quan đến ngày tạo bản ghi

#5 - TẠO BẢNG
# tạo bảng tên là categories, có các trường:
#id: khóa chính, tự động tăng, độ dài tối đa 11 ký tự, kiểu số
#name: kiểu chuỗi, độ dài max 255 ký tư, cho phép giá trị NULL
#status : kiểu số, độ dài max 11 ký tự, cho phép NULL
# created_at : kiểu timestamp, sinh tự động dựa vào ngày giờ hiện tại
CREATE TABLE categories(
    id INT(11) AUTO_INCREMENT, #sinh tự động trường id, tăng 1 đơn vị
    name VARCHAR(255) DEFAULT NULL, #NOT NULL
    STATUS TINYINT(3) DEFAULT 0, #mặc định là giá trị 0
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  #sinh tự động , giá trị mặc định là thời gian hiện tại,
    #set khóa chính hoặc khóa ngoại nếu có cho bảng
    PRIMARY KEY (id)
);

#tạo bảng produts, liên kết với bảng categories, để thể hiện cho việc
#1  danh mục sẽ có nhiều sản phầm. bảng products sẽ có các trường sau
#id: khóa chính, tự tăng , max 11 ký tự
# name: tên sản phầm, varhcar, độ dài tối đa 255 ký tự
# category_id: khóa ngoại, liên kết với bảng categories, int, 11
#created_at:ngày tạo, timestamp, sinh tự động
#Tạo bảng products, liên kết với bảng categories, để thể hiện cho việc 
# 1 - Danh mục sẽ có nhiều sản phẩm, bảng products sẽ có các trường sau
# id : Khóa chính, tự tăng, độ dài tối đa 11 ký tự
#category_id : khóa ngoại liên kết với bảng categories, int, 11 
# name: tên sp, varchar, độ dài tối 255 ký tự
#created_at: ngày tạo, timestamp, sinh tự động
CREATE TABLE products(
	id INT(11) AUTO_INCREMENT,
    category_id INT(11) NOT NULL,
    name VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    #set khóa ngoại
    PRIMARY KEY(id),
    #set khóa ngoại
    FOREIGN KEY (category_id) REFERENCES categories(id)
);
#6 - Xóa bảng
#DROP TABLE abc; 
# 7 - Thêm dữ liệu vào bảng: INSERT INTO
# Thêm 1 số dữ liệu mẫu vào bảng categories, sẽ dùng cặp ký tự '' để bao lấy trên tường, để đề phòng tên trường bị trùng từ khóa trong MYSQL 
#Bảng categories đang có các trường sau: id, name, status, created_at
INSERT INTO categories('name' , 'status')
# CÚ pháp thêm nhiều giá trị trong 1 câu truy vấn
VALUES ('Thể thao', 1), ('Thế giới', 2), ('Thời sự', 3);

# Thêm dữ liệu cho bảng products, đang có các trường id, name, category_id,created_at
INSERT INTO products('category_id' , 'name')
#Chú ý, khi thêm dữ liệu cho khóa ngoại, cần tham chiếu đến bảng mà trường đó đang làm khóa chính, cụ thể là cần thâm chiếu đến trường id của bảng categories
VALUES (1, 'Sản phẩm thể thao 1'), (2, 'Sản phẩm thế giới 1'), (3, 'Sản phẩm thời sự 1');

#8 - Truy vấn select 
# Lấy dữ liệu từ bảng 
# Lấy tất cả thông tin từ bảng categories
SELECT * FROM categories;
#Lấy trường cụ thể từ bảng, chứ k lấy tất cả trường 
SELECT id, created_at FROM categories;
#Lấy tất cả bản ghi với điều kiện gì đó
SELECT * FROM categories WHERE id > 2; #chỉ lấy các bản ghi có id > 2
# lấy các bản ghi có id = 1 hoặc id = 2;
SELECT *FROM categories WHERE id = 1 OR id = 2;
# Lấy giới hạn các bản ghi 
SELECT * FROM categories LIMIT 2; #Chỉ lấy ra bản ghi đầu tiên
#Lấy từ bản ghi thứ 2 và chỉ lấy 1 bản ghi tính từ bản ghi thứ 2 đó
SELECT * FROM categories LIMIT 2,1;

#9 - Update
# Cập nhập dữ liệu cho bản ghi
#VD: cập nhập name cho category đang có id = 1
#chú ý: với truy vấn update, delete thì luôn cần xác định điều kiện đi kèm, nếu ko sẽ update/delete toàn bộ bảng
UPDATE categories SET 'name' = 'Name update' WHERE id = 1;

#10 - Delete
#Xóa bản ghi của bảng
#chú ý: với truy vấn update, delete thì luôn cần xác định điều kiện đi kèm, nếu ko sẽ update/delete toàn bộ bảng
#Xóa các bản ghi nào mà có id > 4 của mảng categories
DELETE FROM categories WHERE id > 4;

#11 - Từ khóa LIKE
#Thường dùng để tìm kiếm tương đối
# Ký tự % là đại diện cho các ký tự bất kỳ
#Lấy tất cả các thông tin của bảng categories mà name có chứa chuỗi TH
SELECT * FROM categories WHERE name LIKE '%th%'; #abcth12, th,

#12 - Từ khóa ODDER BY 
# Sắp xếp bản ghi trả về theo ký tự nào đó
# sắp xếp giảm dần DESC
# sắp xếp tăng dần ASC
#vd: Lấy tất cả bnar ghi từ bảng categories, sau đó sắp xếp theo thứ tự giảm dần của trường id
SELECT * FROM categories ORDER BY id  DESC;

#13 - JOIN
# Thực tế các hệ thống web sẽ bao gồm rất nhiều mảng, nên sẽ cần cơ chế join các bảng để lấy các thông tin tương ứng
#Join chỉ hoạt động trên các bảng mà có sự liên kết (khóa ngoại)
#vd: Lấy tất cả bản ghi products kèm theo tên danh mục tương ứng của từng bản ghi
# Chú ý: khi JOIN bảng, thì cần viết <tên-bảng> <tên-trường-tương-ứng> khi muốn thao tác với trường
# Có 3 cơ chế join: inner join, left join, right join, thường dùng inner join để đảm bảo tính toàn vẹn của dữ liệu, ngĩa là các bảng liên quan phải có dữ liệu mới lấy ra dc
# Trong trường hợp các bảng có tên trường bị trùng, thì cần đặt định danh từ khóa AS cho 1 trường
SELECT products *, categories.name AS category_name  FROM products 
INNER JOIN categories
ON products.category_id = categories.id



-->