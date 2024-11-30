<?php
// Bắt đầu phiên làm việc
session_start();

$page = basename($_SERVER['PHP_SELF'], ".php"); // Lấy tên trang (thaibinh hoặc hanoi)
$commentsFile = 'comments.json';// Đường dẫn tới file JSON chứa bình luận

// Khởi tạo mảng bình luận nếu chưa tồn tại
if (!isset($_SESSION['comments'])) {
    $_SESSION['comments'] = [];
}

// Đọc bình luận từ file JSON (nếu tồn tại)
$commentsFromFile = [];
if (file_exists($commentsFile)) {
    $commentsFromFile = json_decode(file_get_contents($commentsFile), true);
    if (!is_array($commentsFromFile)) {
        $commentsFromFile = []; // Khởi tạo mảng rỗng nếu dữ liệu không hợp lệ
    }
}

// Xử lý yêu cầu gửi bình luận
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['comment'])) {
    // Làm sạch dữ liệu đầu vào
    $comment = htmlspecialchars(trim($_POST['comment']));
    $username = isset($_COOKIE['user']) ? htmlspecialchars($_COOKIE['user']) : 'Anonymous';

    // Bình luận mới
    $newComment = [
        'username' => $username,
        'comment' => $comment,
        'time' => date('Y-m-d H:i:s') // Thêm timestamp để biết thời gian bình luận
    ];

    // Thêm bình luận mới vào đầu danh sách bình luận
    array_unshift($commentsFromFile, $newComment);

    // Ghi lại mảng bình luận vào file JSON
    file_put_contents($commentsFile, json_encode($commentsFromFile, JSON_PRETTY_PRINT));

    // Redirect để tránh việc gửi lại dữ liệu khi reload trang
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Đọc bình luận để hiển thị
$comments = $commentsFromFile;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Phá Di Sản</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/content.css">

</head>
<body>
    <section id="header__banner">
        <header>
            <div class="logo">
                <img src="../../images/logo.jpg">
                <h1>Trùm Phượt Thủ</h1>
            </div>
            <div class="banner">
                <span>Default Banner</span>
            </div>
            
        </header>
        <nav class="navbar">
            <ul class="menu">
                <div class="menu_item">
                    <li><a href="../../index.php">TRANG CHỦ</a></li>
                    <li><a href="../../index.php#DiemDen">ĐIỂM ĐẾN HẤP DẪN</a></li>
                    <li><a href="../../index.php#CamNang">CẨM NANG DU LỊCH</a></li>
                    <li><a href="../../index.php#KhachSan">KHÁCH SẠN</a></li>
                </div>
                <div class="menu_item">
                    <li class="theme-toggle">
                        <a class="theme-toggle-btn" onclick="toggleTheme(event)">
                            <img id="theme-icon" src="../../images/sun-icon.png" alt="Theme Icon">
                        </a>
                    </li>  
                        <div class="user-info">
                            <!-- Avatar icon -->
                            <div class="user-avatar" onclick="toggleDropdown()">
                                <img src="../../images/user.png" alt="Avatar" class="avatar"> 
                            </div>
                            <!-- Dropdown menu -->
                            <div class="dropdown-menu" id="userDropdown">
                                <span class="username"><b>Xin chào, <?php echo htmlspecialchars($_COOKIE['user']); ?>!</b></span>
                                <a href="../../userInfo.php" class="dropdown-item">Trạng thái tài khoản</a>
                                <a href="../../logout.php" class="dropdown-item">Đăng xuất</a>
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
        <img src="../images/user.png" alt="Avatar" width="40" height="40" style="vertical-align: middle; margin-right: 10px;">
        <form id="commentForm" action="thaibinh.php" method="POST">
            <input type="text" name="comment" id="commentInput" placeholder="Bình luận" required>
            <button type="submit">Gửi</button>
        </form>
    </div>
</div>

<div class="comments-list">
    <h3>Bình luận:</h3>
    <?php if (count($comments) > 0): ?>
        <ul id="commentsList">
            <?php foreach ($comments as $c): ?>
                <li class="comment-item" style="padding-left: 1%;">
                    <img src="../../images/user.png" alt="Avatar" width="40" height="40" style="vertical-align: middle; margin-right: 10px;">
                    <strong><?php echo $c['username']; ?>:</strong> <?php echo $c['comment']; ?>
                </li>
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
    <script src="../../assets/js/theme.js"></script>
    <script>
    // Lưu vị trí cuộn trước khi gửi bình luận
    const saveScrollPosition = () => {
        localStorage.setItem("scrollPosition", window.scrollY);
    };

    // Khôi phục vị trí cuộn sau khi tải lại trang
    const restoreScrollPosition = () => {
        const scrollPosition = localStorage.getItem("scrollPosition");
        if (scrollPosition) {
            window.scrollTo(0, parseInt(scrollPosition, 10));
            localStorage.removeItem("scrollPosition"); // Xóa dữ liệu sau khi đã cuộn
        }
    };

    // Gắn sự kiện lưu vị trí cuộn khi form được gửi
    document.getElementById("commentForm").addEventListener("submit", saveScrollPosition);

    // Khôi phục vị trí cuộn khi trang tải xong
    document.addEventListener("DOMContentLoaded", restoreScrollPosition);
    </script>
    </body>
    </html>