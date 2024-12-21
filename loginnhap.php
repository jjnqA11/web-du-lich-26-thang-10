<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "./services/connect-mysql/db_connection.php";

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

            // Tạo cookie lưu trữ userName
            setcookie("user", $name_from_db, time() + (86400 * 30), "/", "", false, false);

            // Đóng kết nối trước khi chuyển hướng
            $stmt->close();
            $conn->close();

            // Chuyển hướng đến trang index.php
            header("Location: nhap.php");
            exit();
        } else {
            // Sai mật khẩu
            $stmt->close();
            $conn->close();
            header("Location: ../login.php?error=" . urlencode("Sai mật khẩu.") . "&email=" . urlencode($email));
            exit();
        }
    } else {
        // Email không tồn tại
        $stmt->close();
        $conn->close();
        header("Location: ../login.php?error=" . urlencode("Email không tồn tại."));
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <!-- Form đăng nhập -->
    <form action="loginnhap.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <!-- Hiển thị lỗi nếu có -->
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
    ?>
</body>
</html>

