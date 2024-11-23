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
      <div class="signup-link">Chưa có tài khoản? <a href="register.html">Đăng ký</a></div>
    </form>    
  </div>
  <script src="login.js"></script>
</body>
</html>