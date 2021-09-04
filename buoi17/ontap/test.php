<?php
    $error = '';
    $result = '';
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        if (empty($name)) { 
            $error = 'Bạn phải nhập họ và tên';
        }
        else {
            $result = "Họ và tên của bạn là".' ' .$name;
        }
    }
?>
<h3 style="color: red;">
    <?php echo $error; ?>
</h3>
<h3 style="color: green;">
    <?php echo $result; ?>
</h3>
<form action="" method="post">
    <label for="name">Họ và tên</label>
    <input type="text" name="name" placeholder="Nhập họ và tên"><br>
    <input type="submit" name="submi    t" value="Gửi">
</form>