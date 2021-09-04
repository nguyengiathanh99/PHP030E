<!-- Khai báo php -->
<?php
	echo('Hello word');
?>
<!-- Cú pháp khác để khai báo -->
<?php
	// Cú pháp khác để khai báo
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo PHP</title>
</head>
<body>
    <h1>  Demo PHP </h1>
</body>
</html>

<?php
	// code php
	echo '<h1>PHP căn bản: Biến - Hằng - Hàm</h1>';
	// 1- Biến: là 1 nơi lưu chữ giá trị có thể thay đổi được
	// Cú pháp khai báo biến 
	$name = 'Thành';
	$age = 12;
	$adress = 'add1'; $adress2 = 'add2';
	// Quy tắc đặt tên giống JS
	// $name, $Name là 2 kiểu khác nhau do PHP phân biệt hoa và thường
	// Các kiểu trong PHP
	// Interger: Kiểu số nguyên
	$number1 = 12;
	$number2 = 123;
	// Hàm kiểm tra kiểu dữ liệu xem có phải hay ko
	$check1 = is_int($number1);
	// Hàm debug thông tin về biến
	var_dump($check1); //true
	// Float/ double: kiểu số thực, là các số có phần thập phân
	$number1 = 1.23;
	$number11= -1.23;
	$check1 = is_float($number1);
	var_dump($check1); // true
	// String, kiểu chuỗi, thể hiện bởi ký tự nháy đơn hoặc nháy kép
	$string1 = 'string 1';
	$string2 = "string 2";
	$string3 = "string '3'";
	$check1 = is_string($string1);
	var_dump($check1); // true
	// Với kiểu chuỗi. có thể hiển thị luôn giá trị của biến trong 1 chuỗi mà sử dụng nháy kép bao ngoài
	$str = 'Thành';
	echo "hello, $str"; // hello, thành
	echo 'hello, $str'; // hello , $str
	// Boolean - Kiểu đúng/sai bao gồm 2 giá trị true và false,
	// Viết hoa thường thỏa mái
	$bool1 = true;
	$bool2 = false;
	$bool3 = true;
	$bool4 = FALSE;
	$check1 = is_bool($bool1);
	var_dump($check1); //true
	// NULL - Kiểu null: kiểu này sẽ sinh ra khi bạn thao tác với 1 biến chưa hề tồn tại, có 1 giá trị duy nhất = null, viết hoa thường thoải mái
	$null1 = NULL;
	$null2 = null;
	is_null($null1); //true
	// -Array - Kiểu mảng, chứa nhiều giá trị tại nhiều thời điểm
	$arr1 = array(123, 'str', true, null);
	// Cách 2
	$arr2 = [123, 'str', true, null]; 
	// Không thể hiển thị thông tin của mảng (của các kiểu dữ liệu có cấu trúc như 1 kiểu dữ liệu nguyên thủy (int, float, string, boolean))
	// echo '$arr2';
	// Sử dụng hàm var_dump hoặc print_r để hiển thị cấu trúc mảng 
	echo "<pre>";
	print_r($arr2);
	echo "</pre>";
	is_array($arr2); // true
	// Object: Kiểu hướng đối tượng, tìm hiểu sau
	// 3 Ép kiểu dữ liệu: dùng cú pháp tên kiểu dữ liệu đặt phía trc biến muốn ép kiểu
	$number = 11.2; //float
	$number = (int) $number; // 11 -> Kiểu số nguyên int
	$number = (string) $number; // 11 -> Kiểu chuỗi

	// 4- Hằng: cũng là 1 loại biến nhưng ko thể thay đổi dc giá trị sau khi đã gán cho nó
	const PI = 3.14;
	const NAME = 'Thành';
	define('AGE', 15); // khai báo age có giá trị 15
	// Nên dùng từ khóa const để khai báo hằng
	// KHi học về OOP -> chỉ có thể sử dụng const để khai báo hằng trong class
	// PI = 3; // cố tình gán giá trị khác cho hằng sẽ báo lỗi
	// Một số hằng được định nghĩa sẵn
	echo __LINE__; // số dòng trong code mà đang gọi tới hằng này
	echo "<br />";
	// Hiển thị đường dẫn tuyệt đối tới file hiện tại đang gọi hằng
	 echo __FILE__;
	echo "<br />";
	// Hiển thị đường dẫn tuyệt đối tới thư mực cha gần nhất chứa file hiện tại đang gọi là hằng
	echo __DIR__;
	echo "<br />";

	// 4- Hàm trong PHP: Là tập các dòng code để xử lý 1 chức năng gì đó 
	// Hàm có tính sử dụng lại
	// Phân loại hàm:
	// Hàm có sẵn: var_dump, print_r, is_int ... 
	// Hàm tự định nghĩa: cú pháp khai báo giống hệt js
	function display() {
		echo 'Hàm display';
	// 	// Sẽ k hiện ra phải gọi hàm
	 }
	// // gọi hàm
	display();
	

	// 1 số biến thể của hàm
	// Hàm tham số
	function showInfo($name, $age) {
		echo "Name: $name, Age: $age";
	}
	// GỌi hàm là cấu trúc nguyên giá trị thật cho các tham số
	showInfo(name:'Thành', age:21); // name: thành, tuổi 21
	showInfo(name:'ABC' , age:123);

	// Hàm có tham số với các giá trị khởi tạo mặc định
	function getName($name = 'Thành') {
		echo $name;
	}
	getName();
	getName(name:'ABC'); // ABC

	// Hàm có giá trị trả về, sử dụng từ khóa return
	// Nên sử dụng return bên trong hàm
	// Tính tổng 2 số
	function sum($number1, $number2) {
		$sum = $number1 + $number2;
		// echo 'Tổng 2 số = ' .$sum;
		return $sum;
		// Từ khóa return làm cho hàm mang 1 giá trị nào đó, và kết thúc hàm 
		echo 'Có chạy dc k';
	}
	$sum = sum(number1:2, number2:3);
	echo $sum; //5
	echo "Tổng 2 số = $sum";

	// 6 truyền giá tị của tham số của hàm theo kiểu tham trị hoặc tham chiếu
	 echo "Biến number1 ban đầu = $number1";
	 function changeNumber($num) {
	 	// gán lại giá trị cho biến num và return biến đó
	 	$num = 0;
	 	echo "Biến number bên trong hàm đang có giá trị = $num1"; //0
	 	// return $num;
	 }
	 changeNumber($number1);
	 echo 'Biến number 1 sau khi gọi hàm = $number1'; // 5 hay 0
	 // Đây là cách truyền theo kiểu tham trị
	 // Khi gọ hàm thì number 1 sẽ tạo ra 1 bản sao của chính nó, hàm của bạn đang thao tác với bản sao của biến number1
	 // Để thay đổi dc giá trị của bản gốc, thì phải truyền theo kiểu tham chiếu
	 $number2 = 4;
	 echo "Biến number2 ban đầu = $number2"; //4
	 function changeNumber2($num) {
	 	num = 0;
	 	echo "Biến number 2 bên trong hàm có giá trị = $num"; //0
	 }
	 changeNumber2(&num:$number2);
	 echo "Biến number2 sau khi gọi hàm = number2"; //0
	 // Truyền tham chiếu tương đương với việc thao tác với chính bản gốc của biến đó
	 
	 // Giới thiệu 1 số hàm liên quan đến nhúng file
	 //4 hàm: require, include, require_once, inclue_once
	 // Nhúng file theo đường dẫn tương đối
	 
	 // require 'test_file.php';
	 
	 // Include khi file k tồn tại, nó vẫn chạy dc code bên dưới
	 // include 'test_filedsdsds.php';
	 
	 // Kiểm tra xem trc đó đã nhúng file đó hay chưa nếu chưa thì sẽ nhúng nếu nhúng r thì sẽ k nhúng
	  require_once 'test_file.php';
	  require_once 'test_file.php';
	  require_once 'test_file.php';
	  require_once 'test_file.php';

	  // Nên sử dụng hàm require_once cho vc sử dụng nhúng file để đảm bảo file dc nhứng duy nhất nhưng 1 lần, và nếu nhúng file k tồn tại thì sẽ k chạy code phía sau
	 echo ' <br />Nội dung cuối cùng của buổi học';
	?>
