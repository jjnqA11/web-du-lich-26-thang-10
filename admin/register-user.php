<?php
// Kết nối cơ sở dữ liệu
include "../services/connect-mysql/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');

    // Kiểm tra các trường không được để trống
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin.'); window.history.back();</script>";
        exit;
    }
    // Kiểm tra mật khẩu khớp
    if ($password !== $confirm_password) {
        echo "<script>alert('Mật khẩu không khớp.'); window.history.back();</script>";
        exit;
    }

    // Kiểm tra tên người dùng hoặc email có bị trùng không
    $check_sql = "SELECT * FROM user_table WHERE userName = '$username' OR email = '$email'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Tên người dùng hoặc email đã tồn tại.'); window.history.back();</script>";
        exit;
    }

    // Thêm tài khoản vào cơ sở dữ liệu mà không mã hóa mật khẩu
    $insert_sql = "INSERT INTO user_table (userName, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $insert_sql)) {
        // Đăng ký thành công, hiển thị thông báo và quay lại trang trước
        $redirect_url = $_SERVER['HTTP_REFERER']; // Lấy URL của trang trước
        echo "<script>
                alert('Đăng ký thành công!');
                window.location.href = '$redirect_url';
              </script>";
    } else {
        // Lỗi khi thực hiện truy vấn
        echo "<script>alert('Lỗi khi thêm tài khoản: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Phương thức không hợp lệ.'); window.history.back();</script>";
}

mysqli_close($conn);
?>
