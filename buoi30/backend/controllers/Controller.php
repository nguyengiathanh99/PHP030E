    <?php
// Đóng vai trò là class cha để tất cả các controller còn lại đều kế thừa từ class này
// Trong class cha này sẽ khai báo các thuộc tính, phương thức dùng chung cho class con
class Controller {
	// Khai báo thuộc tính chứa nội dung view động
	public $content;
	// Khai báo thuộc tính chứa thông tin lỗi
	public $error;
	// Có thể khai báo thêm thuộc tính về seo
	// phương thức lấy nội dung động dựa vào đường dẫn với view
	public function render($view_path, $variables = []) {
		// Giải nén biến nếu có: extract
		extract($variables);
		// bắt đầu quy trình đọc nội dung file
		// + Tạo vùng đệm để chứa nội dung file
		ob_start();
		// + Nhúng file view vào
		require_once "$view_path";
		// + Kết thúc việc lấy nội dung file, sau khi lấy xong sẽ xóa vùng đệm ban đầu đi
		return ob_get_clean();
	}
}

?>