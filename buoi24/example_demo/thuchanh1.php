<?php
// Bài thực hành 1
// Tìm các số nguyên tố mà k nhỏ hơn số nhập vào
// Yêu cầu validate
// Nếu để trống ô nhập, báo lỗi k dc để trống
// Nếu nhập ko phải số, báo lỗi cần phải nhập số
// 1 - Khai báo các biển chứa lỗi và chữa kết quả
$error = '';
$result = '';
// debug mảng dữ liệu gửi lên từ form
// Dựa vào phương thức của form
echo "<pre>";
print_r($_POST);
echo "</pre>";
//  2 - Kiểm tra nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
	// Gán biến trung gian thao tác cho dễ
	$number = $_POST['number'];
	// 3 - Validate form
	if (empty($number)) {
		$error = "Không được để trống";
	} elseif (!is_numeric($number)) {
		$error = "Phải nhập số";
	}

	// Chỉ xử lý khi k có lỗi nào xảy ra
	if (empty($error)) {
		$result = "Các số nguyên tố nhỏ hơn $number là: ";
		for ($i = 0; $i < $number; $i++) {
			// Gọi hàm kiểm tra số nguyên tố
			// Nếu là true thì gắn result là kết quả
			if (isPrime($i)) {
				$result .= "$i";
			}
		}
	}
}
function isPrime($number) {
	if ($number < 2) {
		return FALSE;
	}
	// Định nghĩa số nguyên tố
	// Chỉ chia hết cho 1 và chính nó
	// Thuật toán: chạy vòng lặp từ 2 đến number và kiểm tra nếu
	// CHỉ cần number chia hết cho biến lặp tại 1 lần lặp nào đó
	// Thì gắn cờ kp số nguyên tố và ngược lại
	$is_prime = TRUE;
	// Hàm sqrt: tính căn bậc 2 của 1 số
	for ($i = 2; $i <= sqrt($number); $i++) {
		// Nếu mà chia hết là ko phải số nguyên tố dừng vòng lặp
		// Sau khi phát hiện trường hợp chia hết thì thoát vòng lặp
		// k cần check các case còn lại
		if ($number % $i == 0) {
			$is_prime = FALSE;
			break;
		}
	}
	return $is_prime;
}
?>
<h3 style = "color: red"> <?php echo $error ?></h3>
<h3 style = "color: green"> <?php echo $result ?></h3>
<form action="" method = "post">
<!-- ĐỔ lại dũ liệu đã nhập -->
    Nhập số cần kiểm tra:
    <input type="text" name = "number" value ="<?php echo isset($_POST['number']) ? $_POST['number'] : '' ?>">
    <br>
    <input type="submit" name = "submit" value = "Kiểm tra">

</form>