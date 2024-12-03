<?php
include "../services/connect-mysql/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST['user_id'];
    $newPassword = $_POST['new_password'];
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Cập nhật mật khẩu mới
    $sql = "UPDATE user_table SET password = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $hashedPassword, $userId);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Mật khẩu đã được cập nhật!'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Đã xảy ra lỗi, vui lòng thử lại!'); window.history.back();</script>";
    }
}
?>