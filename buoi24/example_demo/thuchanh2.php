<?php
$error = '';
$result = '';
// debug
echo "<pre>";
print_r($_GET);
echo "</pre>";
if (isset($_GET['submit'])) {
	$number = $_GET['number'];
	// Check validate -> tự làm
	// Bỏ qua bước check validate
	if (empty($error)) {
		if ($number < 50 && $number > 0) {
			$result = $number * 1000;
		} elseif ($number >= 50) {
			$result = (50 + 1000) + ($number - 50) * 2000;
		}
		// Hiển thị ra error và result
	}
}
?>
<h3 style = "color: red"> <?php echo $error ?></h3>
<h3 style = "color: green"> <?php echo "Kết quả là: " . $result ?></h3>
<form action="" method = "get">
    Nhập số điện tiêu thụ
    <input type="text" name = "number" value = ""/>
    <br>
    <table border = 1 cellspacing = "0" cellpading = "8">
        <tr>
            <th colspan = "2">
                Bảng giá theo bậc thang
            </th>
        </tr>
        <tr>
                <td>0 - 50KW </td>
                <td>
                    <b>1000đ/KW</b>
                </td>
        </tr>
        <tr>
            <td>Trên 50 - 100KW </td>
            <td>
                <b>2000đ/KW</b>
                <br/>
                Từ 0 - 50KW giá là 1000đ/KW
            </td>
        </tr>
    </table>
    <input type="submit" name = "submit" value = "Tính tiền điện"/>
</form>