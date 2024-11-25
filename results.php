
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Lấy thông tin người dùng từ session
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Phá Di Sản</title>
    <link rel="stylesheet" href="style.css">
    <script src="index.js"></script>
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
        <form id="searchForm" action="results.php" method="GET">
            <input type="text" name="search_query" id="search_query" placeholder="Từ khóa tìm kiếm...">
        <select>
            <option selected disabled>Chọn địa điểm</option>
            <option value="1">Miền Bắc</option>
            <option value="2">Miền Trung</option>
            <option value="3">Miền Nam</option>
        </select>
        <button type="submit">TÌM KIẾM NGAY</button>
        </form>
    </section>
    <section class="search-results">
        <div class="search-results">
        <?php
            if (isset($_GET['search_query'])) {
                $searchQuery = htmlspecialchars($_GET['search_query']); // Chống XSS
                echo "<div class='search-results'>";
                echo "<h1>Kết quả tìm kiếm cho: <strong>$searchQuery</strong></h1>";

                // Mô phỏng kết quả tìm kiếm (thay bằng truy vấn cơ sở dữ liệu nếu có)
                $fakeDatabase = [
                    "apple" => "Apple là một công ty công nghệ nổi tiếng.",
                    "banana" => "Banana là một loại trái cây phổ biến.",
                    "php" => "PHP là một ngôn ngữ lập trình server-side.",
                ];

                $found = false;
                foreach ($fakeDatabase as $key => $value) {
                    if (stripos($key, $searchQuery) !== false) { // Tìm kiếm không phân biệt hoa thường
                        echo "<p><strong>$key:</strong> $value</p>";
                        $found = true;
                    }
                }

                if (!$found) {
                    echo "<p>Không tìm thấy kết quả nào phù hợp.</p>";
                }
                echo "</div>"; // Đóng thẻ div
            } else {
                echo "<div class='search-results'><p>Vui lòng nhập từ khóa tìm kiếm.</p></div>";
            }
            ?>
        </div>
    </section>
    <section class="search-results-item">
            <div class="search-results-item">

            </div>
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