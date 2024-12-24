<?php
if (isset($_GET['id'])) { // Kiểm tra xem có giá trị và không null hay không
    $id = intval($_GET['id']); // Ép kiểu để tránh SQL Injection

    include "./services/connect-mysql/db_connection.php"; // Chèn file db_connection.php

    $sql = "DELETE FROM `payment_table` WHERE `id` = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Xóa thành công!');
                window.location.href = 'trangThaiDonHang.php';
              </script>";
        // window.location.href: Chuyển hướng trang sang trang khác
    } else {
        echo "Lỗi khi xóa: " . $conn->error; // Hiển thị lỗi
    }

    $conn->close(); // Đóng kết nối
} else {
    echo "ID không hợp lệ.";
}
?>
