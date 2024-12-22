<?php
// Kết nối cơ sở dữ liệu
include 'services/connect-mysql/db_connection.php';

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $agree_term = isset($_POST['agree-term']) ? 1 : 0; // Kiểm tra checkbox đồng ý điều khoản
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;

    // Kiểm tra dữ liệu hợp lệ
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "Vui lòng điền đầy đủ thông tin.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Mật khẩu không khớp.";
    } else {
        // Kiểm tra xem tên người dùng hoặc email đã tồn tại chưa
        $check_sql = "SELECT * FROM user_table WHERE userName = ? OR email = ?";
        $stmt = mysqli_prepare($conn, $check_sql);
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $error_message = "Tên người dùng hoặc email đã tồn tại.";
        } else {
            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            

            // Thêm người dùng vào cơ sở dữ liệu
            $insert_sql = "INSERT INTO user_table (userName, email, password, agree_term, newsletter) VALUES (?, ?, ?, ?, ?)";
            // Chuẩn bị câu lệnh SQL để thực thi, giúp bảo vệ chống SQL Injection
            // $conn là kết nối cơ sở dữ liệu, $insert_sql là chuỗi SQL chứa các tham số `?` cần gắn giá trị
            $stmt = mysqli_prepare($conn, $insert_sql);
            // Gắn các giá trị thực tế vào các tham số `?` trong câu lệnh đã chuẩn bị
            // "ssssi" chỉ định kiểu dữ liệu của các tham số: 
            // s - string (chuỗi) cho $name, $email, $hashed_password
            // i - integer (số nguyên) cho $agree_term, $newsletter
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $hashed_password, $agree_term, $newsletter);

            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Đăng ký thành công. Vui lòng đăng nhập.";
            } else {
                $error_message = "Có lỗi xảy ra, vui lòng thử lại.";
            }
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
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="assets/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="assets/js/register.js"></script>
</head>
<body>
    <div class="container">
      <form action="register.php" method="post" id="f-register">
        <div class="header">
          <h2>Đăng ký</h2>
        </div>
        
        <!-- Tên người dùng -->
        <div class="f-input">
          <div class="label">
            <label for="username">Tên người dùng:</label>
          </div>
          <input type="text" placeholder="Nhập tên của bạn vào đây(VD: diep123, hoangdz,..)" name="username" id="username" style="font-size: large;">
        </div>
        
        <!-- Email -->
        <div class="f-input">
          <div class="label">
            <label for="email">Email:</label>
          </div>
          <input type="email" placeholder="Điền Email của bạn..." name="email" id="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
        </div>
        
        <!-- Mật khẩu -->
        <div class="f-input">
          <div class="label">
            <label for="password">Mật khẩu:</label>
          </div>
          <input type="password" placeholder="Nhập mật khẩu..." name="password" id="password">
          <i class="fas fa-eye" id="toggle-password" onclick="togglePassword()"></i>
        </div>
        
        <!-- Nhập lại mật khẩu -->
        <div class="f-input">
          <div class="label">
            <label for="password">Nhập lại mật khẩu:</label>
          </div>
          <input type="password" placeholder="Nhập lại mật khẩu..." name="confirm_password" id="confirm_password">
        </div>

        <!-- Điều khoản -->
        <div class="f-checkbox">
            <input type="checkbox" name="agree-term" style="margin: 10px;" <?php echo isset($agree_term) && $agree_term ? 'checked' : ''; ?>>
            <span>Tôi đồng ý với điều khoản</span>
            <br>
            <input type="checkbox" name="newsletter" style="margin: 10px;" <?php echo isset($newsletter) && $newsletter ? 'checked' : ''; ?>>
            <span>Nhận tất cả thông báo từ Web</span>
        </div>

        <!-- Thông báo lỗi/success -->
        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php elseif (isset($success_message)): ?>
            <p style="color: green;"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <!-- Nút đăng ký và chuyển đến đăng nhập -->
        <div class="button-register">
            <div class="accept-submit">
              <span>Đã có tài khoản?</span> <a href="login.php" style="text-decoration: none; color: cornflowerblue;">Đăng nhập</a>
            </div>
            <div class="accept-submit">
              <button id="btn-submit" type="submit">Đăng ký</button>
            </div>
        </div>
      </form>
    </div>
</body>
</html>
