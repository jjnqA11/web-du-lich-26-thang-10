<?php
include "../services/connect-mysql/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST['user_id'];
    $newPassword = $_POST['new_password'];

    // Cập nhật mật khẩu mới (không mã hóa)
    $sql = "UPDATE user_table SET password = '$newPassword' WHERE id = $userId";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Mật khẩu đã được cập nhật!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Đã xảy ra lỗi, vui lòng thử lại!'); window.history.back();</script>";
    }
}
?>
