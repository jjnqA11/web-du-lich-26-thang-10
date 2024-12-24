<?php
session_start();
// Kết nối cơ sở dữ liệu
        include 'services/connect-mysql/db_connection.php';

        // Kiểm tra cookie
        if (!isset($_COOKIE['user'])) {
            header("Location: login.php");
            exit();
        }

        // Lấy thông tin người dùng từ cookie
        $user = $_COOKIE['user'];

        // Lấy ID người dùng từ cơ sở dữ liệu
        $sql = "SELECT id FROM user_table WHERE userName = '$user'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row['id'];
        } else {
            header("Location: login.php");
            exit();
        }
        
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
                <a class="theme-toggle-btn" onclick="toggleTheme(event)">
                    <img id="theme-icon" src="images/sun-icon.png" alt="Theme Icon">
                </a>
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
            <input type="text" id="new_name" name="new_name" value="<?php echo isset($_COOKIE['user_name']) ? htmlspecialchars($_COOKIE['user_name']) : ''; ?>">
            <button type="submit" name="update_name">Cập nhật tên</button>
        </form>
        <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['update_name'])) {
                    // Đổi tên người dùng
                    $new_name = trim($_POST['new_name']);
                    if (!empty($new_name)) {
                        $updateSQL = "UPDATE user_table SET userName = '$new_name' WHERE id = $user_id";
                        if ($conn->query($updateSQL)) {
                            setcookie('user', $new_name, time() + 30*24*60*60, "/");
                            echo "<p style='color: green'>Tên người dùng đã được thay đổi thành công.</p>";
                        } else {
                            echo "<p style='color: red'>Có lỗi xảy ra khi thay đổi tên.</p>";
                        }
                    } else {
                        echo "<p style='color: red'>Tên không được để trống.</p>";
                    }
                }
            }
        ?>
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
        <?php
    if (isset($_POST['update_password'])) {
        // Thay đổi mật khẩu
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
            if ($new_password === $confirm_password) {
                // Kiểm tra mật khẩu hiện tại
                $checkSQL = "SELECT password FROM user_table WHERE id = $user_id AND password = '$current_password'";
                $checkResult = $conn->query($checkSQL);
                if ($checkResult->num_rows > 0) {
                    // Cập nhật mật khẩu mới
                    $updateSQL = "UPDATE user_table SET password = '$new_password' WHERE id = $user_id";
                    if ($conn->query($updateSQL)) {
                        echo "<p style='color: green'>Mật khẩu đã được thay đổi thành công.</p>";
                    } else {
                        echo "<p style='color: red'>Có lỗi xảy ra khi thay đổi mật khẩu.</p>";
                    }
                } else {
                    echo "<p style='color: red'>Mật khẩu hiện tại không đúng.</p>";
                }
            } else {
                echo "<p style='color: red'>Mật khẩu mới và xác nhận mật khẩu không khớp.</p>";
            }
        } else {
            echo "<p style='color: red'>Vui lòng điền đầy đủ các trường.</p>";
        }
    }
    ?>
    </section>

    <section>
    <h2>Xóa tài khoản</h2>
    <form method="POST" action="userInfo.php" onsubmit="confirmDelete();"> 

    <!-- Sự kiện onsubmit sẽ xảy ra khi người dùng nhấn nút "Submit" trên biểu mẫu hoặc khi form được gửi đi thông qua JavaScript. -->
     
        <button type="submit" name="delete_account" class="delete-account-btn">Xóa tài khoản</button>
    </form>
    <?php
                if (isset($_POST['delete_account'])) {
                    // Xóa tài khoản
                    $deleteSQL = "DELETE FROM user_table WHERE id = $user_id";
                    if ($conn->query($deleteSQL)) {

                        setcookie('user', '', time() - 3600, "/"); // Xóa cookie

                        session_destroy(); // hủy dữ liệu của tất cả các biến tồn tại, không hu

                        header("Location: login.php?message=" . urlencode("Tài khoản đã bị xóa.")); 
                        // echo urldecode("Tài khoản đã bị xóa.");
                        // urlencode mã hóa thông điệp thay thế các kí tự đặc biệt trong chuỗi thành các kí tự mã hóa tương ứng trong URL
                        exit();
                    } else {
                        echo "Có lỗi xảy ra khi xóa tài khoản.";
                    }
                }

            // Đóng kết nối
            $conn->close();
        ?>
    </section>

    <a href="index.php">Quay lại trang chủ</a>
</body>
</html>
