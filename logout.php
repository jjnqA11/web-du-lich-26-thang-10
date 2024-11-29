<?php
session_start();

// Xóa session
session_destroy();

// Xóa tất cả cookie
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach ($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        // Đặt thời gian hết hạn của cookie về trước để xóa
        setcookie($name, '', time() - 3600, '/');
    }
}

// Chuyển hướng đến trang đăng nhập
header('Location: login.php');
exit();
?>
