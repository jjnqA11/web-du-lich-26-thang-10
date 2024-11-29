<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/thanhtoan.css">
</head>
<body>
    <section id="header__banner">
        <header>
            <div class="logo">
                <img src="images/logo.jpg">
                <h1>Trùm Phượt Thủ</h1>
            </div>
            <div class="banner">
                <span>Default Banner</span>
            </div>
        </header>
        <nav class="navbar">
            <ul class="menu">
                <div class="menu_item">
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li><a href="index.php#DiemDen">ĐIỂM ĐẾN HẤP DẪN</a></li>
                    <li><a href="index.php#CamNang">CẨM NANG DU LỊCH</a></li>
                    <li><a href="index.php#KhachSan">KHÁCH SẠN</a></li>
                </div>
                <div class="menu_item">
                <a class="theme-toggle-btn" onclick="toggleTheme(event)">
                    <img id="theme-icon" src="images/sun-icon.png" alt="Theme Icon">
                </a>
                    <div class="user-info">
                            <!-- Avatar icon -->
                            <div class="user-avatar" onclick="toggleDropdown()">
                                <img src="images/user.png" alt="Avatar" class="avatar">
                                
                            </div>
                            <!-- Dropdown menu -->
                            <div class="dropdown-menu" id="userDropdown">
                                <span class="username"><b>Xin chào, <?php echo htmlspecialchars($_COOKIE['user']); ?>!</b></span>
                                <a href="userInfo.php" class="dropdown-item">Trạng thái tài khoản</a>
                                <a href="logout.php" class="dropdown-item">Đăng xuất</a>
                            </div>
                    </div>
                </div>
            </ul>
        </nav>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <section class="main">
        <header id="header__main">
            <h1>Thanh Toan</h1>

            <p>Vui lòng nhập đầy đủ thông tin chính xác của khách hàng trước khi đặt phòng</p>
        </header>

        <div class="info_user">
            <div class="col-left">
                <div>
                    <h1>Thông tin khách hàng</h1><br>
                </div>
                <div>
                    <label for="name">Họ và Tên:</label>
                    <input id="name" type="text" placeholder="Nhập họ tên của bạn">
                </div>
                <br>
                <div>
                    <label for="sex">Giới tính:</label>
                    <input id="sex" type="radio"> Nam
                    <input id="sex" type="radio"> Nữ
                </div>
                <br>
                <div>
                    <label for="adress">Địa chỉ:</label>
                    <input id="adress" type="text" placeholder="Nhập địa chỉ của bạn">
                </div>
                <br>
                <div>
                    <label for="phone">Số điện thoại:</label>
                    <input id="phone" type="number" placeholder="Nhập số điện thoại">
                </div>
                <br>
                <div>
                    <label for="email">Email:</label>
                    <input id="email" type="text" placeholder="Email">
                </div>
                <br>
                <div>
                    <label for="cmnd">CMND:</label>
                    <input id="cmnd" type="number" placeholder="Nhập đầy đủ số CMND gồm 12 chữ số">
                </div>
                <br>
                <div class="select-payment">
                    <h1>Hình thức thanh toán</h1>
                    <form action="">
                        <label class="radio">
                            <input type="radio" name="fav_language"> Thanh toán Tiền mặt
                        </label>
                        <label class="radio">
                            <input type="radio" name="fav_language"> Ship COD
                        </label>
                        <label class="radio">
                            <input type="radio" name="fav_language"> Chuyển khoản
                        </label>
                        <hr>
                        <div>
                            <input id="btn-submit" type="submit" value="Đặt phòng">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-right">
                <h1>Gio Hang</h1>

                <div>
                    <h2>Tour ngay 29/12</h2> <span>So tien cu the</span> 
                </div>
                <hr>
                <div>
                    <h1>Tong So Tien</h1> <span>110000000000000$</span>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-section about">
                    <h3>Giới thiệu về trang web</h3>
                    <p>
                        Đây là trang web cung cấp thông tin du lịch và các dịch vụ tour đáng tin cậy. Chúng tôi cam kết mang đến trải nghiệm tốt nhất cho khách hàng với những dịch vụ chất lượng và phong phú.
                    </p>
                </div>
                <div class="footer-section contact">
                    <h3>Liên hệ quảng cáo - hợp tác</h3>
                    <p>Email: quangcao@website.com</p>
                    <p>Số điện thoại: 0123 456 789</p>
                    <p>Địa chỉ: Số 123, Đường ABC, TP. XYZ</p>
                </div>
            </div>
        </footer>
    </section>

    <!-- Script -->
     <script src="assets/js/index.js"></script>
</body>
</html>