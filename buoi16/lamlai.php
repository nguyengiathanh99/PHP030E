<?php
    $arr = array(1, 2, 3, 4, 5);
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    $arr = array( "Thành", "Long", "Hoàng");
    print_r($arr);

    $arr1 = [1, 2, 3, 4, 5 ,6, 8, 9];
    echo "<pre>";
    echo print_r($arr1);
    echo "</pre>";

     $arr2 = [1, 2, 'string', 1.22, 3, 4];
     $count = count($arr2);
     for ($i=0; $i < $count ; $i++) { 
         echo $arr2[$i] . "";
     }

    $arr3 = [1, 'Thành', 'Long', 'Hoàng'];
    echo "$arr3[2]";    
    echo "$arr3[3]";
    

    $arr4 = ['Nam', 'Minh', 'Dương', 'Linh'];
    foreach($arr4 AS $key => $value) {
        echo "Key là: $key, value tương ứng là: $value";
        echo "<Br/>";
    }
    
    $arr5 = ['Mai', 1, 2, 3, 'Linh', 'string'];
    foreach($arr5 AS $value ) {
        echo "<br/> $value";
    }
    
    $arr6 = [
        1 => 'a',
        'name' => 'Thành',
        'age' => 21
    ];
    // echo $arr6['name'];
    // echo $arr6['age'];
    foreach($arr6 AS $key => $value) {
        echo "<Br/> Key: $key, value = $value";
        echo "<Br/>";
    }

    $arr7 = [
        'name' => 'Thành',
        'age' => 21,
        'university' => 'Humg',
        'address' => [
            'phương' => 'Xuân Khanh',
            'xa' => 'Sơn Tây',
            'thanhpho' => 'Hà Nội'
        ]
    ];
    // Lấy thông tin từng mảng
    echo $arr7['name'];
    echo $arr7['address']['thanhpho'];
    // Lấy thông tin tất cả
    foreach ($arr7 AS $key => $value) {
       echo "<br/> Key: $key";
       print_r($arr7);
       echo "<Br/>";
    }

    $arr8 = [
        'name' => 'Thành',
        'class' => [
            'name' => 'PHP',
            'country' => [
                'Đức',
                'Nga',
                'Úc'
            ]
        ]
    ];
    // Lấy từng giá trị 1
    echo  $arr8['name'];
    echo "<Br/>";
    echo $arr8['class']['country'][2];
    // Lấy tất cả giá trị
    foreach ($arr8 as $key => $value) {
        print_r($key);
        echo "<Br/>";
        print_r($value);
        echo "<Br/>";
    }
  
    $arr9 = [1,2,3,4,5,6,7,8,9];
?>
<table boder = "1" cellpadding = "8">
    <th>Value</th>
    <?php foreach($arr9 as $value): ?>
        <tr>
            <td>
                <?php echo $value; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    $arr10 = [10, 11, 12, 13, 14, 15, 16];
    $tong = 0;
    $tich = 1;
    foreach ($arr10 as $value) {
        $tong += $value;
        $tich *= $value;
    }
    echo "Tổng là: $tong, Tích là: $tich";

    $arr11 = [17, 18, 19, 20, 21, 22];
    $hieu = 0;
    $thuong = 1;
    foreach ($arr11 as  $value) {
        $hieu -= $value;
        $thuong /= $value;
    }
    echo "Hiệu là: $hieu, Thương là: $thuong";
 
    $arr12 = ['PHP', 'HTML', 'CSS', 'JS'];
?>
<table boder = "1" cellpadding = "8">
    <tr>
        <th> Tên khóa học </th>
    </tr>
    <?php foreach($arr12 as $value): ?>
        <tr>
            <td><?php echo "<br/> $value"; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    // Tính tổng
    $arr13 = [1, 2, 3, 4, 5];
    echo array_sum($arr13);

    // Đếm số phần tử trong mảng
    $arr14 = [
        'name' => 'Thành',
        'age' => 21,
        'university' => 'Humg'
    ];
    echo " <br/> Số phần tử trong mảng là:" .count($arr14);
    // Kiểm tra key xem có tồn tại trong mảng ko
    // array_key_exits

    // Gộp hàm
    $arr15 = [1, 2, 3, 4, 5];
    $arr16 = [6, 7, 8, 9, 10];
    $arr_merge = array_merge($arr15, $arr16);
    echo "<pre>";
    print_r($arr_merge);
    echo "</pre>";
    
    $arr17 = [1, 2, 3, 1, 1, 1];
    $arr_unique = array_unique($arr17);
    print_r($arr_unique);

    $arr17 = ['đỏ', 'xanh', 'cam', 'trắng', 'hồng'];
    $red = $arr17[0];
    $blue = $arr17[1];
    $orange = $arr17[2];
    $white = $arr17[3];
    $pink = $arr17[4];
    echo "Màu <span style = 'color: blue'> $blue </span>";

    $arr18 = [
        'key1' => 'Giá trị thứ nhất',
        'key2' => 'Giá trị thứ hai',
        'key3' => 'Giá trị thứ ba'
    ];
    $arr_key = array_keys($arr18);
    print_r($arr_key);
    echo "<br/>";

    // Kiểm tra key xem có tồn tại hay k
    $arr20 = [
        'name' => 'Thành',
        'age' => 30,
        'school' => 'humg'
    ];
    var_dump(array_key_exists('name', $arr20));
    var_dump(array_key_exists('age', $arr20));
    var_dump(array_key_exists('agee', $arr20));
   
    // Xóa dữ liệu trong mảng
    $arr19 = [
        'name' => 'Thành',
        'age'  => 21,
        'university' => 'humg'
    ];
    $key_remove = array_pop($arr19);
    var_dump($key_remove);
    print_r($arr19);

    // Thêm dữ liệu trong mảng
    $arr20 = array('Thành', 'Long',  'Hoàng', 'Minh');
    $add = array_push($arr20, 'Lan', 'Ngọc');
    print_r($arr20);
    echo "<Br/>";

    // Xóa phần tử cuối cùng
    $arr21 = [1, 2, 3, 4, 5, 6];
    $arr_pop = array_pop($arr21); 
    var_dump($arr_pop);
    print_r($arr21);
    echo "<Br/>";
    
    // Xóa phần tử đầu tiên
    $arr22 = [1, 2, 3, 4, 5];
    $arr_shift = array_shift($arr22);
    var_dump($arr_shift);
    print_r($arr22);
    echo "<Br/>";

    // $str = 'Hello this is beer';
    // $arr = explode('', $str);
    // echo "<pre>";
    // print_r($str);
    // echo "</pre>";

    // Xóa mảng phần tử inset
    $arr23 = [1, 2, 3, 4, 5, 6, 7];
    unset($arr23[7]);
    print_r($arr23);
    is_array($arr23);
 ?>


