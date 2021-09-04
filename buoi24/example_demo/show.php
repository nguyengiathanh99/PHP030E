<?php
session_start();
// nếu tồn tại mới hiển thị
// Nếu k thì rỗng
    echo isset($_SESSION['fullname']) ?  $_SESSION['fullname'] : '';
?>