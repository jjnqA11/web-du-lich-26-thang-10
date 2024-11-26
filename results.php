
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Lấy thông tin người dùng từ session
$user = $_SESSION['user'];
?>
<?php
// Kiểm tra nếu có tham số 'search_query' trong URL
if (isset($_GET['search_query'])) {
    $search_query = $_GET['search_query'];
    // Làm sạch đầu vào để tránh XSS (Cross-site scripting)
    $search_query = htmlspecialchars($search_query, ENT_QUOTES, 'UTF-8');

    // Mảng dữ liệu mock (thay thế bằng dữ liệu thực tế hoặc kết nối cơ sở dữ liệu)
    $mockData = [
        [
            'title' => 'Hà Nội - Thủ đô ngàn năm văn hiến',
            'description' => 'Hà Nội nổi tiếng với Hồ Gươm, phố cổ và các món ăn đặc sắc.',
            'image' => 'https://via.placeholder.com/150',
            'link' => './pages/hanoi.html',
        ],
        [
            'title' => 'Thái Bình - Vùng đất hiền hòa, thăng hoa cảm xúc',
            'description' => 'Thái bình nổi tiếng là đất quê lúa, đất nghề bốn bề sông nước.',
            'image' => 'https://via.placeholder.com/150',
            'link' => './pages/thaibinh.html',
        ],
        [
            'title' => 'Ninh Bình - Thành phố đáng sống',
            'description' => 'Ninh Bình nổi tiếng với bãi biển Mỹ Khê và cầu Rồng đặc sắc.',
            'image' => 'https://via.placeholder.com/150',
            'link' => '#',
        ]
    ];

    // Lọc dữ liệu mock để tìm các kết quả phù hợp với từ khóa
    $filteredResults = array_filter($mockData, function($item) use ($search_query) {
        return stripos($item['title'], $search_query) !== false || stripos($item['description'], $search_query) !== false;
    });
} else {
    $filteredResults = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Phá Di Sản</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/results.css">
    <script src="assets/js/index.js"></script>
   
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
                        <li class="theme-toggle"><button class="theme-toggle-btn" onclick="toggleTheme()">Chế Độ</button></li>
                        <div class="user-info">
                            <!-- Avatar icon -->
                            <div class="user-avatar" onclick="toggleDropdown()">
                                <img src="images/user.png" alt="Avatar" class="avatar"> 
                            </div>
                            <!-- Dropdown menu -->
                            <div class="dropdown-menu" id="userDropdown">
                                <span class="username"><b>Xin chào, <?php echo htmlspecialchars($user['name']); ?>!</b></span>
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
        <form id="searchForm">
        <input type="text" name="search_query" id="search_query" placeholder="Từ khóa tìm kiếm...">
        <button type="submit">TÌM KIẾM NGAY</button>
            </form>
    </section>
    <h2>Kết quả tìm kiếm:</h2>
    <section class="search-results">
        <?php if (empty($filteredResults)): ?>
            <p>Không tìm thấy kết quả nào.</p>
        <?php else: ?>
            <?php foreach ($filteredResults as $result): ?>
                <div class="search-results-card">
                    <img src="<?php echo $result['image']; ?>" alt="<?php echo $result['title']; ?>">
                    <div class="content">
                        <h3><a href="<?php echo $result['link']; ?>"><?php echo $result['title']; ?></a></h3>
                        <p><?php echo $result['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
    </body>
    </html>