<?php
// khởi tạo session
session_start();


session_unset(); // xoa tat ca cac bien session

session_destroy(); // Hủy session hiện tại

// Xóa tất cả cookie
if (isset($_SERVER['HTTP_COOKIE'])) { // $_SERVER['HTTP_COOKIE'] trả về một chuỗi "user=John; age=30; country=USA"

    $cookies = explode(';', $_SERVER['HTTP_COOKIE']); // tách chuỗi với điểm cắt là ";" thành một mảng 

    foreach ($cookies as $cookie) { // lặp qua từng phần tử bên trong mảng 

        $parts = explode('=', $cookie); // tách chuỗi của phần tử với điểm cắt là "="

        $name = trim($parts[0]); // lấy khóa của chuỗi và bỏ hết khoảng cách 2 bên

        // Đặt thời gian hết hạn của cookie về trước để xóa
        setcookie($name, '', time() - 3600, '/'); // xóa tất cả các biến cookie tồn tại

    }
}

// Chuyển hướng đến trang đăng nhập
header('Location: login.php');
exit();
?>
