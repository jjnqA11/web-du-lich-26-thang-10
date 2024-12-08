<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Ép kiểu để tránh SQL Injection
        $conn = new mysqli('localhost', 'root', '123456', 'khamphadisan', 3307);    
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
    
        $sql = "DELETE FROM `payment_table` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            echo "Xóa thành công.";
        } else {
            echo "Lỗi khi xóa: " . $conn->error;
        }
    
        $stmt->close();
        $conn->close();
    } else {
        echo "ID không hợp lệ.";
    }    
?>