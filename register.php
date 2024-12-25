<?php
// Kết nối cơ sở dữ liệu
include './services/connect-mysql/db_connection.php';

// Kiểm tra nếu form đã được gửi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['username'] ?? ''; // toán tử null coalecsing (a ?? b) nếu giá trị a tồn tại và không phải là null thì nhận giá trị a 
    // còn không nhận giá trị b 

    $email = $_POST['email'] ?? '';

    $password = $_POST['password'] ?? '';

    $confirm_password = $_POST['confirm_password'] ?? '';
    $agree_term = isset($_POST['agree-term']) ? 1 : 0; // Kiểm tra checkbox đồng ý điều khoản
    $newsletter = isset($_POST['newsletter']) ? 1 : 0; 
    // toán tử 3 ngôi kiểm tra xem giá trị POST trả về có tồn tại và không phải là null hay không
    // nếu true trả về 1 còn false trả về 0

    // Kiểm tra dữ liệu hợp lệ
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {

        $error_message = "Vui lòng điền đầy đủ thông tin.";

    } elseif ($password !== $confirm_password) {

        $error_message = "Mật khẩu không khớp.";

    } else {

        // Kiểm tra xem tên người dùng hoặc email đã tồn tại chưa
        $check_sql = "SELECT * FROM user_table WHERE userName = ? OR email = ?";

        $stmt = mysqli_prepare($conn, $check_sql);

        $stmt -> bind_param( "ss", $name, $email);

        $stmt -> execute(); // thực thi câu lệnh

        $result = $stmt->get_result(); // trả về 1 đối tượng đại diện cho bản ghi được trả về từ câu truy vấn 

        if ($result -> num_rows > 0) { // kiểm tra xem có bản ghi nào thỏa mãn điều kiện được trả về hay không

            $error_message = "Tên người dùng hoặc email đã tồn tại.";

        } else {
            // Lưu mật khẩu dạng thuần vào cơ sở dữ liệu
            $insert_sql = "INSERT INTO user_table (userName, email, password, agree_term, newsletter) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn -> prepare( $insert_sql);

            $stmt -> bind_param( "ssssi", $name, $email, $password, $agree_term, $newsletter);


            if ($stmt -> execute()) {
                $success_message = "Đăng ký thành công. Vui lòng chờ đợi đăng nhập.";
                header("Location: login.php");
            } else {

                $error_message = "Có lỗi xảy ra, vui lòng thử lại.";

            }
        }
        $stmt -> close(); // giải phóng bộ nhớ biến $stmt

    }
}

// Đóng kết nối
$conn -> close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký tài khoản</title>
  <link rel="stylesheet" href="assets/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
          <input type="email" placeholder="Điền Email của bạn..." name="email" id="email" value="<?php 
            // ?? nếu giá trị là null or không xác định giá trị trả về defaultValue 
           echo htmlspecialchars($email ?? ''); ?>">
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
    <script src="assets/js/register.js"></script>
</body>
</html>
