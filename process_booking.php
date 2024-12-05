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

// Lấy thông tin từ form
$fullname = $_POST['name'];
$gender = $_POST['sex'];
$address = $_POST['adress'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$cmnd = $_POST['cmnd'];
$payment_method = $_POST['fav_language'];
$user_id = $_SESSION['user_id']; // Thay thế bằng ID người dùng hiện tại (lấy từ session hoặc kiểm tra đăng nhập)

// Lưu vào bảng booking_info
$sql = "INSERT INTO booking_info (user_id, fullname, gender, address, phone, email, cmnd, payment_method)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssssss", $user_id, $fullname, $gender, $address, $phone, $email, $cmnd, $payment_method);

if ($stmt->execute()) {
    header("Location: trangThaiDonHang.php?booking_id=" . $stmt->insert_id);
    exit();
} else {
    echo "Đã xảy ra lỗi: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
