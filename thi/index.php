<?php
    require_once 'database.php';
    $sql_select_all = "SELECT * FROM students";
    $result_all = mysqli_query($connection, $sql_select_all);
    $categories = mysqli_fetch_all($result_all, MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($categories);
    // echo "</pre>";
?>
<head>
    <h1>Danh sách sinh viên</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Category</title>
</head>
<body>
  <a href="create.php">Thêm mới</a>
    <table class="table" border = "1" cellspacing = "0" cellpading = "8">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Tuổi</th>
        <th>Ảnh đại diện</th>
        <th>Mô tả sinh viên</th>
        <th>Ngày tạo</th>
        <th></th>
      </tr>
      
    </thead>
    <tbody>

    <?php foreach ($categories AS $values): ?>
      <tr>
        <td><?php echo $values['id']; ?></td>
        <td><?php echo $values['name']; ?></td>
        <td><?php echo $values['age'] ?></td>
        <td>
            <img src="uploads/<?php echo $values['avatar'] ?>" width="150px">
        </td>
        <td><?php echo $values['description'] ?></td>
        <td>
            <?php
               echo date('d-m-Y H:i:s', strtotime($values['created_at']))
            ?>
        </td>
        <td>
        <?php
            $update = 'edit.php?id=' . $values['id'];
            $delete = 'delete.php?id=' . $values['id'];
            ?>
            <a href="<?php echo $update; ?>" style = "color:green">Sửa</a>
            <a href="<?php echo $delete; ?>" onclick = "return confirm('Chắc chắn muốn xóa bản ghi này?')"
            style = "color:red">Xóa</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
        
</body>
</html>