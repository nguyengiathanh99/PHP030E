<?php
    session_start();
    require_once 'database.php';

    $id = $_GET['id'];
    if (!isset($id) || !is_numeric($id)) {
        $_SESSION['error'] = 'Id ko hợp lệ';
        header('Location:index.php');
        exit();
    }
    $sql_select_one = "SELECT * FROM categories WHERE id = $id";
    $result_one = mysqli_query($connection,$sql_select_one);
    // var_dump($result_one);
    $category = mysqli_fetch_assoc($result_one);
    // var_dump($category);
    

?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết</title>
</head>
<body>
    ID: <?php echo $category['id']; ?><br>
    Name: <?php echo $category['name']; ?><br>
    Email: <?php echo $category['email']; ?><br>
    Avatar: <img src="Image/<?php echo $category['avatar']; ?>" height="80"><br>
    Descreption: <?php echo $category['descreption']; ?>
    Created_at: <?php echo $category['created_at']; ?>
</body>
</html>