<?php
    // Đóng vai trò 1 class cha, chứa thuộc tính kết nối để class con kế thừa từ nó
    // có thể sử dụng được
    require_once 'configs/Database.php';
    class Model {
        // Thuộc tính chứa thông tin kết nối CSDL theo PDO
        public $connection;
        // Tận dụng phương thức khởi tạo của 1 class để khởi tạo giá trị mặc định nào đó
        // cho thuộc tính của class đó
        // Khởi tạo giá trị mặc định....
        public function _construct() {
            $this->connection = $this->getConnection();
        }
        // Phương thức kết nối CSDL theo PDO
        public function getConnection() {
            try {
                $connection = new PDO(Database::DB_DSN,Database::DB_USERNAME,Database::DB_PASSWORD);
            } catch (Exception $e) {
                die ('Lỗi kết nối: ' .$e->getMessage());
            }
            return $connection;
        }
    }
?>