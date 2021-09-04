<?php
    session_start();
    require_once 'database.php';
    $id = $_GET['id'];

    if (!isset($id) || !is_numeric($id)) {
        $_SESSION['success'] = 'Id hợp lệ';
        header('Location:index.php');
        exit();
    }
    $delete_sql = "DELETE FROM categories WHERE id = $id";
    $is_delete = mysqli_query($connection,$delete_sql);
    // var_dump($is_delete);
    if ($is_delete) {
        $_SESSION['success'] = 'Xóa bản ghi thành công';
    }
    else {
        $_SESSION['error'] = 'Xóa bản ghi thất bại';
    }
    header('Location:index.php');
    exit();
?>