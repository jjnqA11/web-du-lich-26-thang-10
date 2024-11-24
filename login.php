<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  

  // Kết nối cơ sở dữ liệu
  $conn = new mysqli($servername, $name, $password, $database);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Truy vấn cơ sở dữ liệu để lấy mật khẩu đã mã hóa
  $stmt = $conn->prepare("SELECT password FROM user_table WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  // Kiểm tra nếu có kết quả trả về
  if ($stmt->num_rows > 0) {
      $stmt->bind_result($hashed_password_from_db);
      $stmt->fetch();

      // Kiểm tra nếu mật khẩu đúng
      if (password_verify($password, $hashed_password_from_db)) {
          echo "Login successful!";
          // Tiến hành các bước tiếp theo, ví dụ chuyển hướng tới trang người dùng
      } else {
          echo "Invalid email or password.";
      }
  } else {
      echo "No user found with this email.";
  }

  $stmt->close();
  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Login Form HTML CSS | CodingNepal</title>
  <link rel="stylesheet" href="login.css" />
  <!-- Font Awesome CDN link for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <style>
    .error-message {
      position: absolute;
      color: red;
      font-size: 0.9em;
      margin-top: 5px;
      z-index: 6;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="title"><span><a href="index.html" style="text-decoration: none; color: aliceblue;">Du lịch</a></span>
    </div>
    <form action="./services/process-login.php" method="POST">
      <div class="row">
        <i class="fas fa-user"></i>
        <input 
            type="text" 
            name="email" 
            placeholder="Email" 
            required 
            value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>"
            />
        <?php if (isset($_GET['error'])): ?>
          <div class="error-message">
            <?php echo htmlspecialchars($_GET['error']); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="row">
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Mật khẩu" id="password" required />
        <i class="fas fa-eye" id="toggle-password" onclick="togglePassword()"></i>
      </div>
      <div class="pass"><a href="#">Quên mật khẩu?</a></div>
      <div class="row button">
        <input type="submit" value="Đăng nhập" />
      </div>
      <div class="signup-link">Chưa có tài khoản? <a href="register.php">Đăng ký</a></div>
    </form>    
  </div>
  <script src="login.js"></script>
</body>
</html>
