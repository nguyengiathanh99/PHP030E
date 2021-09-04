<?php
    require_once 'database.php';
    $sql_select_all = "SELECT * FROM categories ";
    $result_all = mysqli_query($connection,$sql_select_all);
    // echo "<pre>";
    // print_r($result_all);
    // echo "</pre>";
    $categories = mysqli_fetch_all($result_all,MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($categories);
    // echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=0, initial-scale=1.0">
    <title>Danh sách</title>
</head>
<br>
<body>
    <a href="create.php">Thêm mới</a>
    <table border="1" cellpadding = "8" cellspacing = "0" >
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Avatar</th>
            <th>Descreption</th>
            <th>Created_at</th>
            <th>Chức năng</th>
        </tr>

        <?php foreach($categories as $category): ?>
        <tr>
            <td>
                <?php echo $category['id']; ?>
            </td>
            <td>
                <?php echo $category['name']; ?>
            </td>
            <td>
                <?php echo $category['email']; ?>
            </td>
            <td>
                <img src="Upload/<?php echo $category['avatar'];?>"  height="80">
            </td>
            <td>
                <?php echo $category['descreption']; ?>
            </td>
            
            <td>
                <?php echo $category['created_at']; ?>
            </td>
            <td>
                <?php
                    $url_detail = 'detail.php?id=' .$category['id'];
                    $url_update = 'update.php?id=' .$category['id'];
                    $url_delete = 'delete.php?id=' .$category['id'];

                ?>
                <a href="<?php echo $url_detail; ?>">Chi tiết</a>
                <a href="<?php echo $url_update; ?>">Sửa</a>
                <a href="<?php echo $url_delete; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>