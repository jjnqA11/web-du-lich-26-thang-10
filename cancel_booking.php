<?php
// Kết nối cơ sở dữ liệu
$host = "localhost";
$user = "root";
$password = "";
$database = "hotel_booking";

$conn = new mysqli($host, $user, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy booking_id từ form
$booking_id = $_POST['booking_id'];

// Xóa thông tin đặt phòng
$sql = "DELETE FROM booking_info WHERE booking_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $booking_id);

if ($stmt->execute()) {
    echo "Đơn đặt phòng đã được huỷ thành công.";
} else {
    echo "Đã xảy ra lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
