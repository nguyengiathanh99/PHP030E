<?php 
    $arr = [2, 5, 6, 9, 2, 5, 6, 12, 5];
    $tong = 0;
    foreach ($arr as $value) {
        $tong += $value;
    } 
    echo "Tổng là: " .$tong ;
    echo "<Br/>";
   
    $arr1 = [2, 5, 6, 9, 2, 5, 6, 12, 5];
    $tich = 1;
    foreach ($arr1 as $value) {
        $tich *= $value;
    }
    echo "Tích là:" .$tich;
    echo "<Br/>";   

    $arr2 = [2, 5, 6, 9, 2, 5, 6, 12, 5];
    $hieu = 0;
    foreach ($arr2 as $value) {
        $hieu = $hieu - $value;
    }
    echo " Hiệu là:" .$hieu;
    echo "<Br/>";

    $arr3 = [2, 5, 6, 9, 2, 5, 6, 12, 5];
    $thuong = 1;
    foreach ($arr3 as $value) {
        $thuong = $thuong / $value;
    }
    echo "Thương là:" .$thuong;
?>