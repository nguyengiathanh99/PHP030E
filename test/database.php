<?php
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'my_test';
    const DB_PORT = 3306;

    $connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
    if (!$connection) {
        die("Kết nối thất bại". mysqli_connect_error());
    }
    else {
        echo "Kết nối thành công";
    }
?>