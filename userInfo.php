<?php
session_start();

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Kết nối cơ sở dữ liệu
include 'services/connect-mysql/db_connection.php';

// Lấy thông tin người dùng từ session
$user = $_SESSION['user'];

// Xử lý khi người dùng gửi form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_name'])) {
        // Đổi tên người dùng
        $new_name = trim($_POST['new_name']);
        if (!empty($new_name)) {
            $updateSQL = "UPDATE user_table SET name = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $updateSQL);
            mysqli_stmt_bind_param($stmt, "si", $new_name, $user['id']);
            if (mysqli_stmt_execute($stmt)) {
                $user['name'] = $new_name;
                $_SESSION['user'] = $user; // Cập nhật session
                $message = "Tên người dùng đã được thay đổi thành công.";
            } else {
                $error = "Có lỗi xảy ra khi thay đổi tên.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $error = "Tên không được để trống.";
        }
    }

    if (isset($_POST['update_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
    
        if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
            if ($new_password === $confirm_password) {
                // Kiểm tra mật khẩu hiện tại
                $checkSQL = "SELECT password FROM user_table WHERE id = ?";
                $stmt = mysqli_prepare($conn, $checkSQL);
                if ($stmt === false) {
                    die("Lỗi chuẩn bị câu lệnh SQL: " . mysqli_error($conn));
                }
    
                mysqli_stmt_bind_param($stmt, "i", $user['id']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
    
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $hashed_password = $row['password'];
    
                    if (password_verify($current_password, $hashed_password)) {
                        // Mã hóa mật khẩu mới
                        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    
                        // Cập nhật mật khẩu mới
                        $updateSQL = "UPDATE user_table SET password = ? WHERE id = ?";
                        $stmt = mysqli_prepare($conn, $updateSQL);
                        if ($stmt === false) {
                            die("Lỗi chuẩn bị câu lệnh SQL: " . mysqli_error($conn));
                        }
    
                        mysqli_stmt_bind_param($stmt, "si", $hashed_new_password, $user['id']);
                        if (mysqli_stmt_execute($stmt)) {
                            $message = "Mật khẩu đã được thay đổi thành công.";
                        } else {
                            $error = "Có lỗi xảy ra khi thay đổi mật khẩu.";
                        }
                    } else {
                        $error = "Mật khẩu hiện tại không đúng.";
                    }
                } else {
                    $error = "Không tìm thấy người dùng.";
                }
    
                mysqli_stmt_close($stmt);
            } else {
                $error = "Mật khẩu mới và xác nhận mật khẩu không khớp.";
            }
        } else {
            $error = "Vui lòng điền đầy đủ các trường.";
        }
    }
    

    if (isset($_POST['delete_account'])) {
        // Xóa tài khoản khỏi cơ sở dữ liệu
        $deleteSQL = "DELETE FROM user_table WHERE id = ?";
        $stmt = mysqli_prepare($conn, $deleteSQL);
        mysqli_stmt_bind_param($stmt, "i", $user['id']);
        if (mysqli_stmt_execute($stmt)) {
            session_destroy(); // Xóa session
            header("Location: login.php?message=" . urlencode("Tài khoản của bạn đã bị xóa."));
            exit();
        } else {
            $error = "Có lỗi xảy ra khi xóa tài khoản.";
        }
        mysqli_stmt_close($stmt);
    }
}

// Đóng kết nối
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="assets/css/userInfo.css">
    <script src="assets/js/userInfo.js"></script>
</head>
<body>
    <div class="theme-toggle">
        <button id="themeButton">Giao diện</button>
    </div>
    <h1>Quản lý tài khoản</h1>
    <?php if (isset($message)): ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <section>
        <h2>Đổi tên người dùng</h2>
        <form method="POST" action="userInfo.php">
            <label for="new_name">Tên mới:</label>
            <input type="text" id="new_name" name="new_name" value="<?php echo htmlspecialchars($user['name']); ?>">
            <button type="submit" name="update_name">Cập nhật tên</button>
        </form>
    </section>

    <section>
        <h2>Đổi mật khẩu</h2>
        <form method="POST" action="userInfo.php">
            <label for="current_password">Mật khẩu hiện tại:</label>
            <input type="password" id="current_password" name="current_password" required>

            <label for="new_password">Mật khẩu mới:</label>
            <input type="password" id="new_password" name="new_password" required>

            <label for="confirm_password">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit" name="update_password">Cập nhật mật khẩu</button>
        </form>
    </section>

    <section>
    <h2>Xóa tài khoản</h2>
    <form method="POST" action="userInfo.php" onsubmit="return confirmDelete();">
        <button type="submit" name="delete_account" class="delete-account-btn">Xóa tài khoản</button>
    </form>
    </section>

    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>
