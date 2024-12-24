<?php
// Kết nối cơ sở dữ liệu
include "services/connect-mysql/db_connection.php";

// Lấy ID từ URL
$id = $_GET['id'] ?? '';
if (!$id) {
    echo "ID người dùng không hợp lệ.";
    exit;
}

// Truy vấn thông tin người dùng
$sql = "SELECT * FROM user_table WHERE id = $id";  // Truy vấn trực tiếp
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Hiển thị form chỉnh sửa thông tin người dùng
    echo '<form method="POST" action="update-user.php">
        <input type="hidden" name="id" value="' . htmlspecialchars($row['id']) . '">
        <label for="userName">Tên người dùng:</label>
        <input type="text" name="userName" value="' . htmlspecialchars($row['userName']) . '">
        <label for="email">Email:</label>
        <input type="email" name="email" value="' . htmlspecialchars($row['email']) . '">
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" value="' . htmlspecialchars($row['password']) . '">
        <button type="submit">Lưu thay đổi</button>
    </form>';
} else {
    echo "Không tìm thấy người dùng.";
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($conn);
?>
