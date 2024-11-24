<?php
// Chèn file db_connection.php
include './connect-mysql/db_connection.php';

// Lấy dữ liệu được gửi từ form
$email = $_POST['email'] ?? ''; // Lấy giá trị input có name = 'email'
$password = $_POST['password'] ?? ''; // Lấy giá trị input có name = 'password'

// Kiểm tra dữ liệu đầu vào
if (!empty($email) && !empty($password)) {
    // Hiển thị thông tin kiểm tra (chỉ dùng khi debug, nên xóa đi khi triển khai thật)
    // echo "Email: " . htmlspecialchars($email) . "<br>";
    // echo "Password: " . htmlspecialchars($password) . "<br>";

    // SQL kiểm tra email và mật khẩu
    $loginSQL = "SELECT * FROM user_table WHERE email = ? AND password = ?";

    // Chuẩn bị câu lệnh truy vấn
    $stmt = mysqli_prepare($conn, $loginSQL);

    if (!$stmt) {
        die("Lỗi chuẩn bị truy vấn: " . mysqli_error($conn));
    }

    // Gán giá trị vào placeholder
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);

    // Thực thi câu truy vấn
    mysqli_stmt_execute($stmt);

    // Lấy kết quả
    $result = mysqli_stmt_get_result($stmt);

    // Kiểm tra kết quả
    if ($result && mysqli_num_rows($result) > 0) {
        // Người dùng đăng nhập thành công
        $user = mysqli_fetch_assoc($result); // Lấy dữ liệu người dùng từ kết quả truy vấn
        session_start();
        $_SESSION['user'] = $user; // Lưu thông tin người dùng vào session

        // Chuyển hướng đến index.php
        header("Location: ../index.php");
        exit();
    } else {
        // Sai mật khẩu hoặc email
        $error_message = "Sai mật khẩu hoặc email!";
        header("Location: ../login.php?error=" . urlencode($error_message) . "&email=" . urlencode($email));
        exit();
    }

    // Đóng câu lệnh truy vấn
    mysqli_stmt_close($stmt);
} else {
    $error_message = "Vui lòng nhập đầy đủ email và mật khẩu";
    header("Location: ../login.php?error=" . urlencode($error_message));
    exit();
}

// Đóng kết nối
mysqli_close($conn);
?>
