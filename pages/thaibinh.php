<?php
// Khởi tạo mảng bình luận
session_start();
if (!isset($_SESSION['comments'])) {
    $_SESSION['comments'] = [];
}

// Kiểm tra xem có bình luận mới không
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['comment'])) {
    $comment = htmlspecialchars(trim($_POST['comment'])); // Làm sạch bình luận
    $_SESSION['comments'][] = $comment; // Lưu bình luận vào session
}

// Lấy danh sách bình luận
$comments = $_SESSION['comments'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Phá Di Sản</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/content.css">

</head>
<body>
    <section id="header__banner">
        <header>
            <div class="logo">
                <img src="../images/logo.jpg">
                <h1>Trùm Phượt Thủ</h1>
            </div>
            <div class="banner">
                <span>Default Banner</span>
            </div>
            
        </header>
        <nav class="navbar">
            <ul class="menu">
                <div class="menu_item">
                    <li><a href="../index.php">TRANG CHỦ</a></li>
                    <li><a href="../index.php#DiemDen">ĐIỂM ĐẾN HẤP DẪN</a></li>
                    <li><a href="../index.php#CamNang">CẨM NANG DU LỊCH</a></li>
                    <li><a href="../index.php#KhachSan">KHÁCH SẠN</a></li>
                </div>
                <div class="menu_item">
                    <li class="theme-toggle">
                        <a class="theme-toggle-btn" onclick="toggleTheme(event)">
                            <img id="theme-icon" src="../images/sun-icon.png" alt="Theme Icon">
                        </a>
                    </li>  
                        <div class="user-info">
                            <!-- Avatar icon -->
                            <div class="user-avatar" onclick="toggleDropdown()">
                                <img src="../images/user.png" alt="Avatar" class="avatar"> 
                            </div>
                            <!-- Dropdown menu -->
                            <div class="dropdown-menu" id="userDropdown">
                                <span class="username"><b>Xin chào, <?php echo htmlspecialchars($_COOKIE['user']); ?>!</b></span>
                                <a href="userInfo.php" class="dropdown-item">Trạng thái tài khoản</a>
                                <a href="logout.php" class="dropdown-item">Đăng xuất</a>
                            </div>
                    </div>
                    </div>
                </div>
            </ul>
        </nav>
    </section>
    <section class="search-bar">
    <form id="searchForm" action="../results.php" method="GET">
    <input type="text" name="search_query" id="search_query" placeholder="Từ khóa tìm kiếm...">
    <button type="submit">TÌM KIẾM NGAY</button>
        </form>
    </section>
    <div class="content">
        <div class="title"><h2>Thái Bình - Vùng đất hiền hoà, thăng hoa cảm xúc</h2></div>
        <div class="short-description"><p>Thái Bình tên gọi quen thuộc và thân thương với rất nhiều người. Thế nhưng cũng rất ít những người biết rằng, quê hương Thái Bình có rất nhiều điều thú vị  đằng sau. Hãy cùng khám phá nhé. </p></div>
        <div class="muc-luc">Mục lục <br>
            <ul>
                <li><a href="#canh-dep-thien-nhien" rel="nofollow">Cảnh đẹp thiên nhiên</a></li>
                <li><a href="#nhung-con-nguoi-ky-tich" rel="nofollow">Những con người kỳ tích</a></li>
                <li><a href="#van-hoa" rel="nofollow">Văn hoá</a></li>
            </ul>
        </div>
        <div class="gioi-thieu">
            <p>Nội dung giới thiệu</p>
            <img src="../images/thaibinh.jpg">
        </div>
        <div class="noi-dung">
            <span id="canh-dep-thien-nhien"><h3>Cảnh đẹp thiên nhiên</h3></span>
            <p>Nội dung về cảnh đẹp thiên nhiên</p>
            <img src="../images/thaibinh.jpg">
            <p>Nội dung cảnh đẹp thiên nhiên</p>
            <span id="nhung-con-nguoi-ky-tich"><h3>Những con người kỳ tích</h3></span>
            <p>Nội dung về những con người kỳ tích</p>
            <img src="../images/thaibinh.jpg">
            <p>Nội dung những con người kỳ tích</p>
            <span id="van-hoa"><h3>Văn hoá</h3></span>
            <p>Nội dung về văn hoá</p>
            <img src="../images/thaibinh.jpg">
            <p>Nội dung về văn hoá</p>
        </div>
    </div>
    <div class="comment">
        <div class="comment-form">
            <img src="../images/user.png" alt="Avatar">
            <form action="thaibinh.php" method="POST">
                    <input type="text" name="comment" placeholder="Bình luận">
                    <button type="submit">Gửi</button>
            </form>
        </div>
    </div>
    <div class="comments-list">
            <h3>Bình luận:</h3>
            <?php if (count($comments) > 0): ?>
                <ul>
                    <?php foreach ($comments as $c): ?>
                        <li class="comment-item" style="padding-left: 1%;"><?php echo $c; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="padding-left: 1%;">Chưa có bình luận nào.</p>
            <?php endif; ?>
        </div>
    </div>
    <br><br><br>
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
    <script src="../assets/js/theme.js"></script>
    </body>
    </html>