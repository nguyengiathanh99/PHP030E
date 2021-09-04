<?php
// bài tập 3 ngày 14
$variable1 = '123abc';
$a = (int) $variable1; //123 - Dựa vào ký tự đầu tiên của chuỗi
// Nếu là số thì trả về, còn nếu ký tự đầu tiên k phải số -> 0
$b = (float) $variable1; //123
$c = (boolean) $variable1; //true // Nếu chuỗi khác rỗng thì ép kiểu sang boolean -> true và ngược lại

$variable2 = NULL;
//-> Ép sang int -> 0
// Float -> 0
// string -> ''
$variable3 = '';
// Ép sang int -> 0
// float -> 0
// boolean -> true
$variable5 = 'null';
// int -> 0
// float -> 0
// boolean -> true
?>