<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $database = "khamphadisan";
    // Kết nối cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $db_password, $database);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn cơ sở dữ liệu để lấy mật khẩu mã hóa
    $stmt = $conn->prepare("SELECT password, userName FROM user_table WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password_from_db, $name_from_db);
        $stmt->fetch();

        // Kiểm tra mật khẩu
        if (password_verify($password, $hashed_password_from_db)) {
            $_SESSION['user'] = $name_from_db; // Lưu tên người dùng vào session
            $_SESSION['password'] = $password;

            // Tạo cookie lưu trữ userName
            setcookie("user", $name_from_db, time() + (86400 * 30), "/", "", true, true);
            setcookie("password", $password, time() + (86400 * 30), "/", "", true, true);
            // Đóng kết nối trước khi chuyển hướng
            $stmt->close();
            $conn->close();

            // Chuyển hướng đến trang index.php
            header("Location: index.php");
            exit();
        } else {
            // Sai mật khẩu
            $_SESSION['error'] = "Sai mật khẩu.";
            $_SESSION['email'] = $email;
            $stmt->close();
            $conn->close();
            header("Location:login.php");
            exit();
        }
    } else {
        // Email không tồn tại
        $_SESSION['error'] = "Email không tồn tại.";
        $_SESSION['email'] = $email;
        $stmt->close();
        $conn->close();
        header("Location:login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <div class="logo">
                <img src="your-logo-url.png" alt="Logo">
            </div>
            <h2>XIN CHÀO</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">
                        <i class="fa fa-email"></i> Email
                    </label>
                    <input type="text" id="email" name="email" placeholder="Nhập email của bạn ở đây.." required>
                </div>
                <div class="input-group">
                    <label for="password">
                        <i class="fa fa-lock"></i> Mật khẩu
                    </label>
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu ở đây" required>
                </div>    
                 <!-- Kiểm tra lỗi và hiển thị thông báo -->
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="error-message">
                            <p><?php echo htmlspecialchars($_SESSION['error']); ?></p>
                        </div>
                        <?php unset($_SESSION['error']); // Xóa thông báo sau khi hiển thị ?>
                    <?php endif; ?>
                <button type="submit" class="login-btn">Login</button>
                <div class="register">
                    <label for="register">Chưa có tài khoản? <a href="register.php" style="text-decoration: none; color: #0066ff">Đăng ký</a></label>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



