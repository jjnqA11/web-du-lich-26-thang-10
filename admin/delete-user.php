<?php
// Kết nối cơ sở dữ liệu
include "../services/connect-mysql/db_connection.php";

// Kiểm tra kết nối
if (!$conn) {
    die("Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error());
}

// Kiểm tra xem có dữ liệu gửi qua POST không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'] ?? ''; // Lấy ID người dùng từ form

    if ($user_id !== '') {
        // Kiểm tra xem tài khoản có tồn tại không
        $check_sql = "SELECT * FROM user_table WHERE id = $user_id";
        $result_check = mysqli_query($conn, $check_sql);

        if (mysqli_num_rows($result_check) > 0) {
            // Nếu tài khoản tồn tại, thực hiện xóa
            $delete_sql = "DELETE FROM user_table WHERE id = $user_id";
            if (mysqli_query($conn, $delete_sql)) {
                echo "<script>alert('Tài khoản với ID $user_id đã được xóa thành công.'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            } else {
                echo "<script>alert('Lỗi khi xóa tài khoản: " . mysqli_error($conn) . "'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
            }
        } else {
            echo "<script>alert('Tài khoản với ID $user_id không tồn tại.'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
        }
    } else {
        echo "<script>alert('ID người dùng không hợp lệ.'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
    }
} else {
    echo "<script>alert('Yêu cầu không hợp lệ.'); window.location.href='" . $_SERVER['HTTP_REFERER'] . "';</script>";
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>


