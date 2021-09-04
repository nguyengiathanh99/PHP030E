<?php
    require_once 'database.php';
    $sql_select_all = "SELECT * FROM categories";
    $result_all = mysqli_query($connection,$sql_select_all);
    $categories = mysqli_fetch_all($result_all,MYSQLI_ASSOC);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
  <br>
  <a href="create.php">Thêm mới</a>
<table class="table table-striped" border="1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Avatar</th>
      <th scope="col">Descreption</th>
      <th scope="col">Created_at</th>
      <th scope="col">Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach($categories as $category): ?>
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
         <img src="Image/<?php echo $category['avatar'] ?>" height="80px">
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
          <a href="<?php echo $url_update;?>">Sửa</a>
          <a href="<?php echo $url_delete; ?>" onclick="return confirm('Bạn có muốn xóa?')">Xóa</a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

</body>
</html>