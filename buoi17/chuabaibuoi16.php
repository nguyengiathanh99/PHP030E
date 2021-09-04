<?php 
    // chữa bài tập ngày 16
    function bt1($arr) {
        $str = '';
        // lặp qua từng phần của mảng để lấy giá trị 
        // sử dụng foreach
        $sum = 0;
        $str_sum= "Tổng các phần tử =";
        $sub = $arr[0];
        $str_sub = "Hiệu các phần tử =";
        $multiple = 1;
        $str_multiple = "Tích các phần tử =";
        $divide = $arr[0];
        $str_divide = "Thương các phần tử =";
        foreach ($arr as $key => $value) {
            // thực hiện các phép tính và gán kết quả tương ứng cho biến $str ban đầu
            // tính tổng
            $sum += $value;
            // Thực hiện nối chuỗi vào biến $str_sum
            $str_sum .= "$value + ";
            // Xử lý phép trừ, bỏ qua phần tử đầu tiê 
            // vì biến $sub ban đầu đã dc gán giá trị bằng phần tử đầu tiên rồi
            if ($key > 0 ) {
                $sub -= $value;
                $str_sub .= "$value -";
            }
            // Xử lý phép nhân
            $multiple *= $value;
            $str_multiple .= "$value *";

            // Xử lý phép chia
            if ($key > 0) {
                $divide /= $value;
            }
            $str_divide .= "$value / ";
        }

        // Các chuỗi hiện tại đang bị thừa ký tự +, / , *, / cuối nên dùng 
        // Hàm substr để cắt bỏ các ký tự này
        $str_sum = substr($str_sum, 0, -2 );
        $str_sub = substr($str_sub, 0, -2 );
        $str_multiple= substr($str_multiple, 0, -2 );
        $str_divide = substr($str_divide, 0, -2 );
        // Nối kết quả của phép cộng vào biến $str ban đầu
        $str .= $str_sum . " = $sum <Br/>";
        // Nối kết quả của phép trừ vào biến $str ban đầu
        $str .= $str_sub . " = $sub <Br/>";
        // Nối kết quả phép nhân vào biến $str ban đầu
        $str .= $str_multiple . "= $multiple <Br />";
        // Nối kết quả của phép chia vào biến $str ban đầu
        $str .= $str_divide . "= $divide";
        return $str;
    }
    // Khai báo mảng để gọi hàm
    $arr = [2, 5, 6, 9, 2, 5, 6, 12, 5];
    $str = bt1($arr);
    echo $str;
?>