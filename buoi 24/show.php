<?php
session_start();
//show.php
echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : '';