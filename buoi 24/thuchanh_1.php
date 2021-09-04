<?php
// tạo cấu trúc file như sau:
// example_demo/thuchanh_1.php
// tìm các số nguyên tố mà nhỏ hơn số nhập vào
// yêu cầu validate
// nếu đê trống ô nhập, báo lỗi không được để trống
// nếu nhập k phải số, báo lỗi cần phải nhập số
// xử lý submit form
// 1 - khai báo các biến chứa lỗi và chứa kết quả
$error = '';
$result = '';
//debug mảng dữ liệu gửi lên từ form
echo "<pre>";
print_r($_POST);
echo "</pre>";
// 2- kiểm tra nếu user submit form thì mới sử lý
if (isset($_POST['submit'])) {
    // gán biến trung gian để thao tác cho dễ
    $number = $_POST['number'];
    // 3 - validate form
    if (empty($number)) {
        $error = 'Không được để trống';
    } elseif (!is_numeric($number)) {
        $error = 'Phải nhập số';
    }
    // 4 - xử lý logic submit form theo đề bải chỉ xử lý khi không có lỗi
    if (empty($error)) {
        $result = "Các số nguyên tố nhỏ hơn $number là: ";
        for ($i = 0; $i < $number; $i++) {
            // gọi hàm kiểm tra số nguyên tố
            if (isPrime($i)) {
                $result .= "$i ";
            }
        }
    }
}
        function isPrime($number) {
            if ($number < 2) {
                return FALSE;

            }
            // số nguyên tố là gì: chỉ chia hết chó 1 và chính nó
            // thuật toán: chạy vòng lặp từ 2 -> number, kiểm tra nếu chỉ cần number chia hết cho biến
            // lặp nào đó thì gắn cờ là không phải số nguyên tố và ngược lại
            $is_prime = TRUE;
            for ($i = 2; $i <= sqrt($number); $i++) {
                if ($number % $i == 0) {
                    $is_prime = FALSE;
                    // sau khi phát hiện được trường hợp chia hết, thoát khỏi vòng lặp
                    // mà không cần check các case còn lại nữa
                    break;
                }
            }
        return $is_prime;
        }


?>
<h3 style="color: red"> <?php echo $error; ?></h3>
<h3 style="color: green"> <?php echo $result; ?></h3>
<form action="" method="post">
    Nhập số cần kiểm tra:
    <input type="text" name="number"
           value=" <?php echo isset($_POST['number']) ? $_POST['number'] : ''?>">
    <br>
    <input type="submit" name="submit" value="kiểm tra">
    <br>


</form>