<?php 
include "../services/connect-mysql/db_connection.php";

if (!$conn) {
    die("Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM user_table WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: admin.php");
        exit;
    } else {
        die("Lỗi khi xóa tài khoản: " . mysqli_error($conn));
    }
} else {
    die("ID không hợp lệ.");
}
?>
