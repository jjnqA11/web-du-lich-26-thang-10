<?php
// Kết nối cơ sở dữ liệu
$host = "localhost";
$user = "root";
$password = "";
$database = "khamphadisan";

$conn = new mysqli($host, $user, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra và lấy booking_id
if (!isset($_GET['booking_id'])) {
    die("Lỗi: booking_id không tồn tại.");
}
$booking_id = $_GET['booking_id'];

// Truy vấn thông tin đặt phòng
$sql = "SELECT bi.*, u.name AS user_name, u.email AS user_email
        FROM booking_info bi
        JOIN user_table u ON bi.user_id = u.id
        WHERE bi.booking_id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Lỗi chuẩn bị truy vấn: " . $conn->error);
}

$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $booking = $result->fetch_assoc();
    echo "<h1>Thông tin đặt phòng</h1>";
    echo "<p>Họ và tên: " . htmlspecialchars($booking['fullname']) . "</p>";
    echo "<p>Giới tính: " . htmlspecialchars($booking['gender']) . "</p>";
    echo "<p>Địa chỉ: " . htmlspecialchars($booking['address']) . "</p>";
    echo "<p>Số điện thoại: " . htmlspecialchars($booking['phone']) . "</p>";
    echo "<p>Email: " . htmlspecialchars($booking['email']) . "</p>";
    echo "<p>CMND: " . htmlspecialchars($booking['cmnd']) . "</p>";
    echo "<p>Hình thức thanh toán: " . htmlspecialchars($booking['payment_method']) . "</p>";
    echo '<form method="POST" action="cancel_booking.php">
            <input type="hidden" name="booking_id" value="' . htmlspecialchars($booking['booking_id']) . '">
            <button type="submit">Huỷ đơn đặt phòng</button>
          </form>';
} else {
    echo "Không tìm thấy thông tin đặt phòng.";
}

$stmt->close();
$conn->close();
?>
