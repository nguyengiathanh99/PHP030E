<?php
//thuc_hanh2.php
// tìm giá trị tiền điện theo bậc thang cho sẵn
// yêu cầu validate:
// nếu để trống ô nhập, báo lỗi 'không được để trống'
// nếu nhập không phải số, báo lỗi 'cần phải nhập số'
$error = '';
$result = '';
//debug
echo "<pre>";
print_r($_GET);
echo "</pre>";
if (isset($_GET['submit'])) {
    $number = $_GET['number'];
    //check validate -> tự làm
    // bỏ qua bước check validate
    if (empty($error)) {
        if ($number < 50 && $number > 0) {
            $result = $number * 1000;
        } elseif ($number >= 50) {
            $result = (50*1000) + ($number - 50) * 2000;
        }
        if (empty($error)) {
            $result = "Giá tiền điện tháng $number là:";
        }
        // hiển thị ra error và result -> tự làm
    }
}
?>
<h3 style="color: red"> <?php echo $error; ?></h3>
<h3 style="color: green"> <?php echo $result; ?></h3>
<form action="" method="get">
    Nhập số điện tiêu thụ:
    <input type="text" name="number" value="">
    <br>
    <table border="1" cellpadding="0" cellspacing="3">
        <tr>
            <th colspan="2">
                bảng giá theo leo thang
            </th>
        </tr>
        <tr>
            <td>0 - 50KW</td>
            <td><b>1000đ/KW</b></td>
        </tr>
        <tr>
            <td>Trên 50 - 100KW</td>
            <td>
                <b>2000đ/KW</b>
                <br>
                Từ 0 - 50KW giá là 1000đ/KW
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Tính tiền điện">
</form>
