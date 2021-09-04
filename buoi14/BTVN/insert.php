<?php
    $result = "";
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $result = "Tên của bạn là: $name";
    }
?>
<h3 style="color: green;"> 
    <?php
        echo $result;
    ?>
</h3>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Họ tên: <input type="text" name = "name"><br>
        Tuổi: <input type="text" name="age"><br>
        Ngày sinh: <input type="date" name = "date"><br>
        Giới tính: <input type="radio" name="gender" value="Nam"> Nam
                    <input type="radio" name="gender" value="Nữ"> Nữ <br>
        Quê quán: <input type="text" name="quenquan"><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>