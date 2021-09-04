<?php
//mvc_demo/views/categories/index.php
//Hiển thị danh sách category
// echo "<pre>";
//  print_r($categories);
//  echo "</pre>";
?>
<a href="index.php?controller=Category&action=create"> Thêm mới</a>
<table border = "1" cellspacing = "0" cellpading = "8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Amount</th>
        <th></th>
    </tr>

        <?php foreach ($categories AS $category): ?>
            <tr>
            <td><?php echo $category['id']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td><?php echo $category['amount']; ?></td>

            <td>
        <a href="index.php?controller=category&action=detail&id=<?php echo $category['id'] ?>">Chi tiết</a>

        <a href="index.php?controller=category&action=update&id=<?php echo $category['id'] ?>">Update</a>

        <!-- Để sự kiện muốn trả về xóa được phải có return: hàm trả về
        nếu return true thì xóa
        còn ko thì nó sẽ k chuyển hướng -->

        <a href="index.php?controller=category&action=delete&id=<?php echo $category['id'] ?>"onclick = "return confirm('Bạn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>