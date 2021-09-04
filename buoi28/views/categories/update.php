<?php
//mvc_demo/views/categories/update.php
//Hiển thị form cập nhật category
// copy form từ create sang
?>
<!-- Đổ ra dữ liệu ra tác dụng vào value -->
<form action="" method = "post">
    Name:
    <input type="text" name = "name"
     value ="<?php echo $category['name']; ?>"/>
    <br/>
    Amount:
    <input type="number" name = "amount"
     value ="<?php echo $category['amount']; ?>"/>
    <br/>
    <input type="submit" name = "submit" value = "Upadate"/>
    <a href="index.php?controllers=Category&action=index"> Về trang danh sách </a>
</form>