<?php
    // Mảng
    // 1 - Định nghĩa
    // Mảng là 1 cấu trúc dữ liệu có thể lưu chữ dc 1 or nhiều hơn 1 giá trị tại 1 thời điểm, khác với các kiểu 
    // dữ liệu nguyên thủy
    // Chỉ lưu trữ 1 giá trị tại 1 thời điểm 
    // Để xem 1 cấu trúc mảng, thường dùng các hàm của PHP sau:
    // var_dump: nhìn cấu trúc hơi khó
    // Echo "<pre>";
    // Print_r(); hay dùng cách này để xem cấu trúc mảng
    // Ví dụ về 1 trường hợp cần dùng mảng để lưu trữ:
    // Công ty bạn có 100 thành viên, yêu cầu lữu trữ tên của 100 thành viên dó
    $name = 'Nhan vien 1';
    $name = 'Nhan vien 2';
    // .... rất thủ công khai báo
    
    //...dùng khai báo mảng
    $names = ['Nhan vien 1' , 'Nhan vien 2' , 'Nhan vien 3' ];

    // 2 - Khai báo mảng
    // Dùng từ khóa array
    $arr1 = array(1, 2, 3, 4);
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";
    //  Dùng ký tự []
    $arr2 = [1, 2, 3, 4];
    echo "<pre>";
    print_r($arr2);
    echo "</pre>";  

    // 3 - Key của mảng
    // Là giá trị dùng để xác định phần tử của mảng
    // Key mặc định của 1 mảng sẽ bắt đầu từ 0
    $arr = [1, true, 'string'];
    // Phần tử đầu tiên của key = , giá trị = 1
    // Phần tử 2 của key = 1, giá trị = true
    // Phần tử 3 của key = 2, giá trị = string
    // Muốn lấy ra dc giá trị của phần tử bất kỳ trong mảng thì cần biết cái key của nó

    // 4 - Vòng lặp foreach
    // Demo sử dụng vòng lặp for để hiển thị các giá trị của mảng
    $arr = [1, 2, 'string', 1.23];
    // Sử dụng hàm count để lấy tổng số phần tử đang có trong mảng
    // để lấy 4 giá trị ra ta dùng count, sau đó dùng vòng lặp for
    // $count = count($arr); //4
    // for ($i = 0; $i < $count; i++ ) {
    //     // Sử dụng cú pháp tên- mang [key-của phần tử] để hiển thị
    //     echo $arr[$i] . " ";
    // }
    // 1 2 string 1.23

    $arr1 = [1, 'a', 'b', 'c', 'd'];
    echo $arr1[4]; //d
    echo $arr1[1]; //a
    // Hạn chế của vòng lặp for khi lặp mảng là xử lý các mảng mà key ko phải số rất phức tạp
    // Với mảng sẽ luôn dùng vòng lặp foreach để lặp mảng
    $arr = [1, 2, 3, 'a', 'b', 'c'];
    // Cú pháp đầy đủ của vòng lặp foreach
    foreach($arr As $key => $value) {
        echo "Key: $key, Values tương ứng: $value";
        echo "<Br/>";
    }
    // CÚ pháp ko đầy đủ, khuyết mất key
    foreach($arr AS $value) {
        echo "<Br /> Value tương ứng: $value";
    }

    // 5 - Phân loại mảng
    // - Mảng tuần tự - Mảng số nguyên: key của mảng chỉ ở dạng số,
    //  Đây là mảng đơn giản nhất
    $arr1 = [1, 2, 3, 4]; // key là số nguyên
    $arr2 = [
        4 => 'b',
        7 => 'a',
        9 => 1
    ];
    echo "<pre>";
    print_r($arr2);
    echo "</pre>";
    // Lấy riêng giá trị của phần tử
    echo $arr2[7];
    echo $arr2[4];
    // Lấy tất cả dùng foreach
    foreach($arr2 AS $key => $value) {
        echo "Key là: $key có value = $value";
        echo "<Br/>";
    }

    // - Mảng kết hợp: key của mảng sẽ ở dạng kết hợp số và chuỗi
    $arr = [
        4 => 'a',
        'name' => 'Thành',
        'age' => 30,
        'is_bool' => TRUE
    ];
    // Lấy giá trị của phần tử, thì vẫn có thể lấy theo key
    echo $arr['name']; // Thành
    echo $arr['is_bool']; // True
    // Sử dụng foreach để lấy các giá trị 
    foreach($arr AS $key => $value) {
        echo " <Br/>Key là: $key có value = $value";
    }

    // - Mảng đa chiều (mảng trong mảng)
    // Mảng chứa 1 nhiều mảng bên trong
    // Trong mảng đa chiều, ke có thể ở dạng số hoặc chuỗi
    // Để tránh độ phức tạp khi thao tác với mảng đa chiều, chỉ nên tạo ra 1 mảng ko quá 3 chiều
    $arr = [
        'name' => 'Thành',
        'age' => 21,
        'address' => [
            'phuong' => 'P.Xuan Khanh',
            'Thixa' => 'TX. Son Tay',
            'thanhpho' => 'TP.Ha Noi'
        ]
    ];
    // Lấy giá trị của từng mảng dựa theo key
    echo $arr['address']['thanhpho']; // Ha Noi
    echo $arr['name']; //Thành
    // Dùng foreach để xem thông tin phần tử
    foreach($arr AS $key => $value) {
            echo "Key: $key";
            // k thể value hết vì address kp là chuỗi mà là 1 mảng
            print_r($value);
    }

    // Ví dụ mảng 3 chiều
    $arr = [
        'name' => 'Thành',
        'class' => [
            'name' => 'PHP0320E',
            'country' => [
                'Đức',
                'Anh',
                'VN'
            ]
        ]
            ];
            // Lấy giá trị của phần tử mảng dựa theo key
            // Lấy ra giá trị VN
            echo $arr['class']['country'][2]; //Vn
            echo $arr['class']['name']; //PHP0320E
            // Dùng foreach để lặp mảng
            foreach($arr AS $k => $v) {
                print_r($k);
                print_r($v);
            }

            // 6 - CÚ pháp viết tắt của foreach khi hiển thị cùng HTML có cấu trúc phức tạp
            $arr = [0, 1, 2, 3, 4, 5];
            foreach($arr AS $value) {
                echo "<td>$value</td>";
            }
?> 
<table boder = "1" cellpadding = "8">
        <tr>
            <th>ID</th>
            <th> Giá trị</th>
        </tr>
            <?php foreach($arr AS $value): ?> 
            <tr>
                <td>    
                    <?php echo $value; ?>
                </td>
            </tr>   
            <?php endforeach; ?>
</table>

<!-- Bài tập -->
<?php
    // Thực hành với mảng
    // Thực hành 1:
    // CHo biết đây là loại mảng nào
    // Tính tổng và tích của các phần tử trong mảng sau
    $arrs = [12, 50, 60, 90, 12, 25, 60];
    $sum = 0;
    $multiple = 1;
    foreach($arrs AS $value) {
        $sum += $value;
        $multiple *= $value;
    }
    echo "Tổng = $sum, Tích = $multiple";

    // Tổng = 309       
    // Tích = 583....


    // Thực hành 2
    $arrs = ['đỏ', 'xanh', 'cam', 'trắng'];
    // trộn html vs php
    $red = $arr[0];
    $blue = $arr[1];
    $orange = $arr[2];
    $white = $arr[3];
    echo "Màu <span style = 'color: red'> $red </span>";

    // Thực hành 
    $arrs = ['PHP', 'HTML', 'CSS', 'JS'];

?>
<table boder = "1" cellpadding = "8" cellspascing = "0">
    <tr>
        <th> Tên khóa học </th>
    </tr>
    <?php foreach($arrs AS $value): ?>
        <tr>
            <td> <?php echo $value; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    // -  Các hàm php cung cấp sẵn thao tác với mảng
    //  Tính tổng các phần tử trong mảng
    $arr = [1, 2, 3, 4];    
   echo array_sum($arr); //10


   // Đếm số phần tử của 1 mảng: count ()
   $arr = [
       'name' => 'Thành',
       'age' => 30
   ];
   echo count($arr); // hàm count trả về 2 phần tử
//    Hàm kiểm tra key bất kỳ có tồn tại trong mảng hay k
// array_key_exists 
$arr = [
    'name' => 'Thành',
    3 => 'abc',
    'age' => 30
];
// echo array_key_exists(key:'name', $arr); //true
// echo array_key_exists(key:'name1', $arr); // false

// Hàm gộp mảng: array_merge
$arr1 = [1, 3, 6];
$arr2 = ['a', 'b', 'c'];
// Lấy các phần tử của mảng arr2 thêm vào chuỗi của mảng arr1
 $arr_merge = array_merge($arr1, $arr2);
 echo "<pre>";
 print_r($arr_merge);
 echo "</pre>";

//  Kiểm tra giá trị có tồn tại trong mảng hay k, nếu có thì sẽ trả về vị trí xuất hiện
//  trả về key ngược lại trả về False
// $arr = ['a', 'b', 'c'];
// echo array_search(neddle:'c', $arr); //2
// var_dump array_search(neddle:'1', $arr); //false

// Hàm loại bỏ các giá trị trùng lặp: array_unique
$arr = [1, 2, 3, 1, 1, 1];
$arr_unique = array_unique($arr);
print_r($arr_unique); //[1,2.3]

// Hàm tạo 1 mảng mới với các phần tử với có giá trị chính bằng các giá trị mảng ban đầu: array
$arr = [
    'key 1' => 'Giá trị thứ nhất',
    'key 2' => 'Giá trị thứ 2',
    'key 3' => 'Giá trị thứ 3',
];
$arr_values = array_values($arr);
print_r($arr_values);
// ['Giá trị thứ nhất', 'Giá trị thứ 2', 'Giá trị thứ 3'];
// Hàm tạo 1 mảng mới với các giá trị sẽ lấy theo key của mảng ban đầu: array_keys
$arr = [
    'key 1' => 'Giá trị thứ nhất',
    'key 2' => 'Giá trị thứ 2',
    'key 3' => 'Giá trị thứ 3',
];
$arr_keys = array_keys($arr);
print_r($arr_keys); // ['key 1',' key2', 'key3']
// hàm xóa phần tử cuối cùng của mảng , trả về key của phần tử
//  Xóa: array_pop
$arr = [
    'name' => 'Thành',
    'age' => 30
];
// $key_remove = array_pop(&array:$arr); //age
// var_dump($key_remove); //30
// print_r($arr);

// Hàm thêm 1 hoặc nhiều phần tử vào cuối mảng ban đầu, trả về
// số phần tử vừa thêm: array_push
$arr = [
    'name' => 'Thành',
    'age' => 30
];

// $add = array_push(&array:$arr, var 1, _:'Thành', 'abc'); //5
// var_dump($add); //3
// print_r($arr);

// Xóa phần tử đầu tiên của mảng, trả về giá trị phần tử vừa bị xóa: array_shifft
$arr = [1, 2, 3, 4];
// $value_remove = array_shift(&array:$arr);
// echo $value_remove;
// print_r($arr);

// Chuyển từ chuỗi thành mảng dựa vào ký tự phân tích: explode
// $str = 'Hello this is a beer';
// $arr = explode(delimiter:' ', $str);
// echo "<pre>";
// print_r($arr);
// echo "</pre>";

// Lấy giá trị đầu tiên của 1 mảng: reset
$arr = [
    'name' => 'Thành',
    'age' => 21

];
// echo reset (&array:$arr); // Thành
// // Lấy giá trị cuối cùng : end
// echo end($array: $arr); // 30

// XÓa phần tử của mảng: unset
$arr = [1, 2, 3, 4, 5];
unset($arr[4]);
print_r($arr); //[1, 2,3,4]

// Kiểm tra 1 biến có phải kiểu mảng hay k: is_array
is_array($arr); // true

// 1 số hàm thao tác với thời gian
// lấy múi giờ mặc định của hệ thống đang sử dụng
echo date_default_timezone_get(); // múi h của đức

// date_default_timezone_set(timezone_identifiers: 'Asia/Ho_Chí_Minh');
// echo date_default_timezone_get(); // asian hồ chí minh

// Lấy giá trị hiện tại của thời gian tính bằng giây
//  So với thời điểm 1,1,1970 - unixtimestamp: time
echo "<Br/>";
echo time();
// Hàm chuyển đổi từ giây về định dạng ngày tháng dễ nhìn: date
// Lấy ngày giờ hiện tại theo format dễ nhìn
// echo "<Br/>";
// echo date(format: 'd-m-Y:i:s', time());
 ?>




