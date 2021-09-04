<?php
    // 1- Tổng quan về lập trình hướng đối tượng
    // + Viết tắt OOP - Object Oriented Programing
    // + Bắt buộc phải biết về OOP nếu muốn theo lập trình backend
    // + Tập trung vào sự tương tác dựa trên đối tượng, để phân tích và đưa ra các thuộc tính
    // và phương thức của đối tượng đó
    // 2 - Các thuật ngữ trong lập trình hướng đối tượng
    // + Lớp - Class 
    // CLass hiểu như 1 kiểu dữ liệu đặc biệt, giống như 1 cái khuôn mẫu, các đối tượng mà sinh ra
    // từ class sẽ đều chung 1 đặc điểm gì đó
    // Từ khóa để khai báo class = class, chữ cái đầu của tên class nên viết hoa

    class Student {
        public $id; //mã sinh viên

    }
    // + Đối tượng - object: chính là thể hiện cụ thể của class
    // Khai báo:  sử dụng từ khóa new như sau

    // Khởi tạo 1 đối tượng từ class Student, như vậy 
    // Đối tượng khởi tạo có tất cả các tính chất của class Student
    // Khai báo class phải có bước khởi tạo
    // Ko thì tương đương khai báo hàm nhưng lại k gọi hàm
    $student_A = new Student();
    $student_B = new Student();
    // + Thuộc tính của class: Khái niệm thuộc tính tương đương với biến trong PHP thuần
    // vd: Khai báo 3 thuộc tính của class Person: name, age, birthday
    class Person {
        public $name;
        public $age;
        public $birthday;
    }
    // Khởi tạo đối tượng từ class trên
    // Class có các thuộc tính gì thì đối tượng nó sẽ có hết
    $person_A = new Person();
    // ĐỐi tượng của class sẽ truy cấp dc tất cả các thuộc tính của class
    // Sử dụng cú pháp: ->
    $person_A -> name = 'Thành';
    $person_A -> age = '22';
    $person_A -> birthday = '24-07-1999';
    echo "Tên của đối tượng Person A:" .$person_A->name;
    echo "Tuổi của đối tượng Person A:" .$person_A->age;
    echo "Ngày sinh của đối tượng Person A:" .$person_A->birthday;

    // Tạo thêm 1 đối tượng từ class trên
    $person_B = new Person();
    $person_B -> name = 'B';
    $person_B -> age = '12';
    $person_B -> birthday = '11-11-1111';
    // + Phương thức của class: thuật ngữ phương thức tương đương với hàm trong PHP thuần
    // Phương thức thể hiện cho việc 1 class có thể có các hành động gì
    // Đối tượng của class sẽ truy vập phương thức của class sử dụng ký tự
    class Person1 {
        public $name;
        public $age;

        public function run() {
            echo "Running";
        }
    }
    // Khởi tạo 1 đối tượng từ class trên
    $person1 = new Person1();
    //Truy cấp phương thức run của class
    $person1->run();

    // + Phạm vi truy cập
    // Liên quan đến 1 trong 4 tính chất của OOP: tính đóng gói
    // Là từ khóa đặt trước tên thuộc tính hoặc phương thức của class
    // Gắn quyền truy cập tương ứng với các thuộc tính và phương thức đó
    // Có 3 từ khóa: private, protected, public

    // Private: thuộc tính/ phương thức mà dc set private thì chỉ duy nhất
    // Class đó mới truy cập dc, ngoài ra đối tượng khởi tạo từ class đó và các class
    // Kế thừa từ class đó đều k thể truy cập dc

    class TestPrivate {
        private $name;
        public $age;
        private function checkPrivate() {
            echo "Check private";
        }
        public function checkPublic() {
            echo "Check public";
        }   
    }
    $test_private = new TestPrivate();
    // Cố tình truy cập thuộc tính private sẽ báo lôĩ
    // $test_private ->name = 'ABC';
    $test_private->age = 123;
    // Cố tình truy cập phương thức private sẽ báo lỗi
    // $test_private->checkPrivate();
    // Với PH
    // Thực tế khi triển khai trên ứng dụng web, có thể bỏ qua việc khai báo private
    // Cho các thuộc tính hoặc phương thức cho đỡ rườm rà
    class TestPrivate2 {
        private $name;
        private function getName() {
            // Truy cập thuộc tính/ phương thức private bên trong class 1 cách bình thường
            // Sẽ sử dụng từ khóa $this để đại diện cho class hiện tại
            $this->name = 'Thành';
            //(Bên trong thì truy cập dc nhưng ngoài thì k) 
        }
    }

    // - Protected: Nội bộ class và các class kế thùa từ class đó đều có thể truy cập dc
    // Đối tượng của class đó vẫn k truy cập dc
    class TestProtected {
        protected $name;
        protected function getName() {
            $this->name = 'abc';
        }
    }
    class Test2 extends TestProtected {
        public function getNameExtends() {
            // Class kế thừa sẽ truy cập dc thuộc tính/ phương thức ở phạm vi truy cập
            // là protected, public
            echo $this->name;
        }
    }
    // public: phạm vi thoáng nhất, bất cứ đâu cũng truy cập được
    // Để đơn giản cho các bạn mới, luôn dùng public cho mọi trường hợp khi khai báo
    // phạm vi truy cập cho thuộc tính/phương thức

    //  + Phương thức khởi tạo: dùng khởi tạo giá trị mặc định nào đó cho các thuộc tính
    // của class, phương thức này nó chỉ chạy đầu tiên khi khởi tạo đối tượng
    // Chạy ngầm
    // Luôn có tên là: __constuctor(), phạm vi truy cập luôn là public
    class TestConstructor {
        public $name;
        public function __construct() {
            $this->name = 'Tên mặc định';
            echo "Text trong phương thức khởi tạo";
        }
       public function hello() {
           echo "hello";
       }
    }
    // Tạo đối tượng từ class trên
    $test_construct = new TestConstructor();
    // Ngay khi khởi tạo đối tượng, sẽ chạy phương thức khởi tạo rồi
    echo $test_construct->name; // Tên mặc định

    // + Từ khóa static 
    // Bình thường phải khởi tạo đối tượng từ class thì mới có thể
    // Truy cập vào thuộc tính/phương thức của class đó
    // Có thể ko cần khởi tạo hướng đối tượng mà vẫn truy cập dc thuộc tính/phương thức
    // của class đó bằng cách set static cho nó

    class TestStactic {
        public static $name;
        public static function show() {
            echo "Phương thức Show";
        }
    }
    // TRuy cập thuộc tính/phương thức tĩnh theo cú pháp sau:
    // <Tên-Class>:: <tên thuộc tính/ phương thức>
    TestStactic:: $name = 'Name static';
    echo TestStactic:: $name;
    TestStactic:: show();

    // + Từ khóa extends - Thể hiện tính chất kế thừa trong OOP
    // Đây là tính chất rất quan trọng, dc áp dụng nhiều khi làm project
    // 1 class con kế thừa từ class cha thì sẽ kế thừa tất cả các thuộc tính/phương thức
    // ở phạm vi truy cập là protected và public
    // PHP hỗ trợ đơn kế thừa, 1 class chỉ kế thừa dc duy nhất 1 class khác tại 1 thời điểm
    // Xác định tính chất kế thừa, trả lời câu hỏi is-a
    // Khai báo 1 class đóng vai trò class cha
    class ConNguoi {
        public $name;
        public $age;

    }
    class SinhVien extends ConNguoi {
        // Class sinh viên có luôn 2 thuộc tính name và age của class cha rồi
        public $id;
        public function study() {}
    }

    // + Abstract - Tính trừu tượng trong OOP, là tính chất rất khó hiểu
    abstract class TestAbstract {
        public $name;
        public function show() {
            echo "Show";
        }
        // Class trừu tượng sẽ có các phương thức khai báo trừu tượng
        // Ko có nội dung gì cả
        abstract public function run();
    }
    // Mục đích của class trừu tượng -> kế thừa
    class A extends TestAbstract {
        // Class kế thừa trừu tượng bắt buộc phải định nghĩa lại phương thức trừu tượng
        public function run() {
            
        }
    }

    // + Từ khóa implements: triển khai 1 interface
    interface Config {
        // Trong interface ko thể khai báo 1 thuộc tính, chỉ khai báo phương thức
        // ko có nội dung gì cả
        public function sendMail();
        public function getMail();
        
    }
    
    class C implements Config {
        public function sendMail() {

        }
        public function getMail() {
            
        }
    }
    // Abstract và Interface dùng thiên về mặt thiết kế hệ thống hơn
    // Nên chưa cần hiểu quá sâu về 2 từ khóa này

    // CẦN CHUẨN BỊ Ý TƯỞNG CHO PROJECT CUỐI KHÓA
    // - Cần xác định chủ đề sẽ làm: tin tức, bán hàng, thi online, đọc truyện
    // - Xác định nhóm sẽ làm: độc lập, làm theo team
    // - CHuẩn bị giao diện frontend, backend. Nên tìm 
    // template free với từ khóa: ecomerce templete thêm free..
    // - Cần làm tài liệu báo cáo, giảng viên sẽ gửi tài liệu mẫu

    // 3 - Bốn tính chất của OOP
    // Tính trừu tượng: thể hiện của từ khóa abstract 
    // + Tính đóng gói: thể hiện của phạm vi truy cập: private
    // Protected, public
    // + Tính kế thừa: thể hiện của từ khóa extends
    // + Tính đa hình: Liên quan đến interface, cùng 1 phương thức của interface
    // Các class implement phương thức đó sẽ có các hình thức triển khai khác nhau
    

?>