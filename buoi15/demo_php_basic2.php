<?php
// 1 - Toán tử
// Giống javascipt
$number1 = 5;
$number2 = 4;
echo $number1 + $number2; //9
echo  $number1 - $number2; //1
echo  $number1 * $number2;
echo  $number1 / $number2;
echo  $number1 % $number2;
  $number1++; //5
echo  $number1++;
  $number2--;//4
echo  $number2;
$number = 4;
$sum = $number-- + (2* --$number) - --$number;
//7     4           2       2           1
$number = -1;
$sum = $number++ - --$number * --$number;
//-3          0     -   -1     *  -2
// 2 - Toán tử so sánh
// Giống hệt javascript
$number1 = 5;
$number2 = 4;
echo $number1 == $number2; // false
echo  $number1 > $number2; //true
echo  $number1 >= $number2; //true
echo  $number1 < $number2; //false
echo  $number1 <= $number2; //false
echo  $number1 != $number2; //true
// 3 - Toán Tử logic
// Giống hệt Javascript
$number1 = 5;
$number2 = 4;
echo ($number1 > $number2) && $number1 !=0; //true
echo  ($number1 != $number2) || $number1 <0; //true
echo  !($number1 !=0); //false
//4- Toán Tử Gán
$number = 1; //phép gán
$number += 2; //$number = $number + 2; //3
$number -=1; //number = $number -1; //2
$number /=1; //4
$number %=2; //0
//5- Toán tử điều kiện
//DÙng thay thế cho câu lệnh if....else
$number = 5;
if ($number > 0) {
    echo 'Number > 0';
}
else {
    echo 'Number < 0';
}
echo  $number > 0 ? 'Number > 0': 'Number <= 0';

// THỰC HÀNH
$x = 5;
$sum = $x++ * $x + 2 * --$x % 2;
//35    5       7          6    2
$sum = $x * $x - --$x * 2 + $x++ - $x * ++$x;
 //-9       5 *  5 -    4  * 2 +  4  - 5  * 6
//Thực Hành 2
$number1 = 10;
$number2 = 7;
echo "<span style = 'color: red'>";
echo "$number1 + $number2 = " . ($number1 + $number2);
echo "<br />";
echo "$number1 - $number2 = " . ($number1 - $number2);
echo "<br />";
echo "$number1 * $number2 = " . ($number1 * $number2);
echo "<br />";
echo "$number1 / $number2 = " . ($number1 / $number2);
echo "<br />";
echo "$number1 % $number2 = " . ($number1 % $number2);
echo "<br />";
echo "</span>";

// Thục hành 3
$number = 8;
echo "<span style = 'color:red'>";
echo "Giá trị hiện tại là $number";
echo "<br />";
$number += 2;
echo  "Cộng thêm 2. Giá trị hiện tại là: $number";
echo "</span>";

// 2 - Câu lệnh điều kiện
// If, If...else, if...elseiff...else, swithc...case
// If: CHỉ dùng cho 1 trg hợp duy nhất
$number = 5;
if ($number > 0) {
    echo "Biến number > 0";
}
// If....else: dùng cho 2 trường hợp
$number = 4;
// !=0 là khác 0
if ($number % 2 !=0) {
    echo "Là số lẻ";
}
else {
    echo "Là số chẵn";
}
// Có thể sử dụng toán tử điều kiện ?: để thay thế cho if....else
echo $number % 2 != 0 ? 'Là số lẻ' : ' Là số chẵn';
// If....elseif....else: >=3 trường hợp
$number = 5;
if ($number > 10) {
    echo 'Number > 10';
}
elseif ($number > 8) {
    echo 'Number > 8 và number <=10';
}
else {
    echo 'Number <= 6.5';
}

// Biểu thức switch case
// DÙng thay thế cho if....elseif, tuy nhiên chỉ dùng dc khi biểu thức
// là so sánh bằng ==
$day = 6;
switch ($day) {
    case 2: echo 'Thứ 2'; break;
    case 3: echo  'Thứ 3'; break;
    case 6: echo  'Thứ 6'; break;
    default: echo  'Không phải thứ 2, 3, 6';
}
// Cú pháp viết tắt của câu lệnh điều kiện khi viết chung với HTML
$number = 1;
// Kiểm tra nếu như $number > 0 thì sẽ hiển thị ra 1 cấu trúc bảng
// Bảng HTML có 5 hàng, mỗi hàng 2 cột
if ($number > 0) {
    echo "<table>
    <tr>
    <th> Cột 1</th>
    <th> Cột 2</th>
</tr>
   <tr>
    <th> Data 1</th>
    <th> Data 2</th>
</tr>
</table>";
}
// Ko nên viết lồng HTML bằng PHP như trên khi cấu trúc HTML phức tạp
?>

<?php
if ($number > 0):?>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Header 1</th>
        <th>Header 2</th>
    </tr>
    <tr>
        <th>Data 1</th>
        <th>Data 2</th>
    </tr>
    <tr>
        <th>Data 1</th>
        <th>Data 2</th>
    </tr>
</table>
<?php endif;?>
<!-- Cú pháp viết tắt của if...else -->
<?php if ($number > 0): ?>
<span>Number > 0</span>
<?php else: ?>
<span>Number <= 0 </span>
<?php endif; ?>
<!-- Cú pháp viết tắt của if....elseif...else -->
<?php if ($number > 0): ?>
Number > 0
<?php elseif ($number == 0): ?>
Number = 0
<?php elseif ($number <= -1 && $number >= -2): ?>
-2 <= Number <= -1
<?php else: ?>
Number < -2
<?php endif; ?>

<!-- 3 - VÒng lặp -->
<!-- For, while, do...while -->
<!-- For: Vòng lặp xác định trc số lần lặp -->
<?php
for ($i=1; $i <=10; $i++) {
    echo $i;
}
// 12345678910
// While - Vòng lặp k xác định số lần lặp
$j = 1;
while ($j <=10 ) {
    echo $j;
    $j ++;
}
// do-while - chỉ khác while ở 1 điểm duy nhất: luôn chạy code ít nhất 1 lần
// cho dù điều kiện bị sai ngay từ đầu
$j = 1;
do {
    echo $j;
    $j++;
}
while ($j < 10);
// Với PHP thì ít khi sử dụng while, do...while
// 4- Từ khóa continue - break
// Break: thoát hẳn vòng lặp
for ($i = 3; $i <=9; $i +=2) {
    echo $i;
    if ($i <= 5 ) {
        break;
    }
}
// 3,5,7,9
// 3

//continue: bỏ qua lần lặp hiện tại, nhảy tới lần lặp kế tiếp
for ($i = 2; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        continue;
    }
    echo $i;
}
//3,5,7,9

for ($i = 2; $i <= 10; $i++) {
    if ($i >= 5) {
        break;
    }
//    i mà lớn hơn 5 thì kbh hiển thị ra
//    vậy chỉ có <5
    if ($i % 2 == 0) {
        continue;
    }
    echo $i;
}
//3

//Demo bài tập 4
function bai4($n) {
    // Theo như kết quả mong muốn bài toán
//    Xác định kiểu dữ liệu trả về là 1 string
    $string = '';
    for ($i = 1; $i <= $n; $i++) {
        if ($i < $n) {
            $string .= "$i - ";
        }
        else {
            $string .= "$i";
        }
    }
    return $string;
    // ko chạy code bên dưới
}
$str = bai4(5);
echo $str;

//Bài 7
/**
 * Giải bài 7
 * @param $n int số n  truyền vào
 * @return string Kết quả trả về là 1 string
 */
function bai7($n) {
    $string = '';
    for ($row = 1; $row <= $n; $row++) {
        for ($col = 1; $col <= $row; $col++) {
            $string .= " * ";
        }
        $string .= "<br />";
    }
    return $string;
}
$str = bai7(5);
echo $str;

//5 - Một số hàm thao tác với string có sẵn của PHP
// Nối chuỗi
// Đếm số từ xuất hiện trong 1 chuỗi: Thanh is ngthanh
$count = str_word_count('Thanh is ngthanh');
echo $count; //4
// Chuyển chuỗi thành chữ hoa
echo strtolower('Ngthanh is Abc'); //ngthanh is abc
// Chuyển ký tự đầu tiên thành chữ hoa
echo ucfirst('abcdef'); // Abcdef
// Cắt khoảng trắng đầu cuối của chuỗi
echo trim("abc "); //abc
//Cắt chuỗi

$string = 'Hello World';
echo substr($string, 1); //hello World
echo substr($string, 6); //Wolrd
echo substr($string, 1, 3); //ell
// Tách chuỗi $string từ ký tự nào đó
strstr('nguyengiahthanh1999@gmail.com' , '@');
//@gmail.com
//Kiểm tra 1 chuỗi có xuất hiện trong 1 chuỗi hay k
$string = 'ngthanh is abc';
$pos = strpos($string, 'abc'); //10
var_dump($pos);
// Đảo ngược chuỗi: strrev
var_dump(strrev('abcdef')); //fedcba
// Hàm so sánh chuỗi: strcmp, so sánh 2 chuỗi phân biệt hoa thường
var_dump(strcmp('abc', 'abc')); //0

// Một số hàm có sẵn liên quan tới số
// Hàm kiểm tra xem có phải số hay k: is_numeric
//echo is_numeric(var:'abc'); false
// Kiểm tra phải số nguyên hay k
is_int(123); // true
is_int(12.3); // false

// Kiểm tra phải số thực hay k
is_float(123); // false
is_float(123); // true

// Làm tròn thập phân: round
echo round(14.5); //15
echo round(1.234567 , 2); //1.23

// Làm tròn lên số nguyên lớn nhất so với giá trị hiện tại: ceil
echo ceil( 1.37); //2
echo ceil( -1.67); //1

// Làm tròn xuống, ngược lại với hàm ceil: floor
echo floor(1.37); // 1
echo floor(-1.67); // 2

//Tìm giá trị lớn nhất, nhỏ nhất: max, min
echo max(1, 2, 3,4); //4
echo min(1, 2, 3,4); //1

//Hàm format giá tiền: number_format
//100,000
echo number_format(100000); //100,000
//echo number_format, decimals:0, dec_point '.'
?>
