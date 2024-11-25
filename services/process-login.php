<?php
session_start();

// Kết nối cơ sở dữ liệu
include '../services/connect-mysql/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Truy vấn thông tin người dùng dựa trên email
    $loginSQL = "SELECT * FROM user_table WHERE email = ?";
    $stmt = mysqli_prepare($conn, $loginSQL);

    if ($stmt === false) {
        die("Lỗi chuẩn bị câu lệnh SQL: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result); // Lấy thông tin người dùng
        $hashed_password = $user['password']; // Mật khẩu đã mã hóa từ database

        // So sánh mật khẩu nhập vào với mật khẩu đã mã hóa
        if (password_verify($password, $hashed_password)) {
            echo "Đăng nhập thành công!";
            // Tạo session
            $_SESSION['user'] = $user;
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../login.php?error=" . urlencode("Sai mật khẩu.") . "&email=" . urlencode($email));
            exit();
        }
            } else {
                header("Location: ../login.php?error=" . urlencode("Email không tồn tại."));
                exit();
            }

    // Đóng câu lệnh
    if ($stmt !== false) {
        mysqli_stmt_close($stmt);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>
