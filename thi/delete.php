<?php
    session_start();        
    require_once 'database.php';
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        $_SESSION['error']= 'ID ko hợp lệ';
        header('Location:index.php');
        exit();
    }
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM students WHERE id = $id";
    $is_delete = mysqli_query($connection, $sql_delete);
    // var_dump($is_delete);
    if ($is_delete) {
        $_SESSION['success'] = 'Xóa bản ghi $id thành công';
        header('Location:index.php');
        exit();
    }
    else {
        $_SESSION['error'] = 'Xóa bản ghi thất bại';
    }
    
?>