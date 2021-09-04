<?php
    require_once 'models/Model.php';
    class User extends Model 
    {
        // Khai báo các thuộc tính cho model chính là
        // các trường của bảng tương tự
        public $id;
        public $username;
        public $password;
        // Kiểm tra username đã tồn tại trong bảng user hay chưa
        public function isUsernameExists($username) {
            //  + Viết câu lệnh truy vấn
            $sql_select_one = "SELECT * FROM
             users WHERE username=:username";
            //  + Tạo đối tượng truy vấn
            $obj_select_one = 
            $this->connection->prepare($sql_select_one);
            // + Tạo mảng để gán giá trị thật cho tham số trong câu truy vấn
            $arr_select = [
                // gán =>
                ':username' => $username
            ];
            // Thực thi câu truy vấn, execute
            $obj_select_one->execute($arr_select);
            // + Lấy ra đối tượng user dưới dạng mảng,
            $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
            // Nếu k tồn tại user thì sẽ trả về true
            if (!empty($user)) {
                return TRUE;
            }
            return FALSE;

        }
        // phương thức đăng ký user
        // Có 2 cách gán
        // 1 là lấy từ class
        // 2 là gán giá trị vào register(..)
        public function register($username,$password) {
            // Tạo câu truy vấn
            $sql_insert = "INSERT INTO users (username, password)
            VALUES(:username, :password)";
            // + Tạo đối tượng truy vấn, prepare
            $obj_insert = $this->connection->prepare($sql_insert);
            // Tạo mảng để gán dữ liệu thật cho tham số
            // câu truy vấn
            $arr_insert = [
                ':username' => $username,
                ':password' => $password
            ];
            // Thực thi truy vấn exceute
            $is_insert = $obj_insert->execute($arr_insert);
            return $is_insert;
        }
    }
    
?>
