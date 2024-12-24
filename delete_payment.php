<?php
    if (isset($_GET['id'])) { // kiểm tra xem có giá trị và không null hay không
        $id = intval($_GET['id']); // Ép kiểu để tránh SQL Injection

        include "./services/connect-mysql/db_connection.php"; // chèn file db_connection.php

        $sql = "DELETE FROM `payment_table` WHERE `id` = ?";

        $stmt = $conn->prepare($sql); 

        $stmt->bind_param("i", $id);

        /**
         * type: i => int, d => double , s => string , b => blob
         * 
         */
    
        if ($stmt->execute()) {

            echo 
            `<script>
                alert('Xóa thành công !');
                window.location.href = 'trangThaiDonHang.php';
            </script>`;
            // window.location.href: chuyển hướng trang sang trang khác
        } else {
            echo "Lỗi khi xóa: " . $conn->error; // hiển thị lỗi
        }
    
        $stmt->close(); // giải phóng tài nguyên biến $stmt 
        $conn->close(); // đóng cổng kết nối
    } else {
        echo "ID không hợp lệ.";
    }    
?>