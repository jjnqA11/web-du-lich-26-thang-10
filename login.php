<?php
include('./services/connect-mysql/db_connection.php');
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
                 <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        // Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
                        $sql = "SELECT id, userName FROM user_table WHERE email = '$email' AND password = '$password'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Lấy thông tin người dùng từ kết quả truy vấn
                            $row = $result->fetch_assoc();
                            $userName = $row['userName'];

                            // Khởi tạo session
                            session_start();
                            $_SESSION["user"] = $userName;

                            // Tạo cookie lưu thông tin người dùng (cookie tồn tại trong 30 ngày)
                            setcookie("user", $userName, time() + (30 * 24 * 60 * 60), "/");

                            // Chuyển hướng đến trang chính
                            header("Location: index.php");
                            exit();
                        } else {
                            // Hiển thị thông báo lỗi nếu đăng nhập thất bại
                            echo "<p class='warning' style='color: red'>Email hoặc mật khẩu không hợp lệ</p>";
                        }
                    }
                    ?>
                <button type="submit" class="login-btn">Login</button>
                <div class="register">
                    <label for="register">Chưa có tài khoản? <a href="register.php" style="text-decoration: none; color: #0066ff">Đăng ký</a></label>
                </div>
            </form>
        </div>
    </div>
</body>
</html>



