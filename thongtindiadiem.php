<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./thongtindiadiem.css">
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
            <div class="login">
                <a href="login.html">Login</a>
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
                </div>
            </ul>
        </nav>
    </section>
    <section class="search-bar">
        <input type="text" placeholder="Từ khóa tìm kiếm...">
        <select>
            <option selected disabled>Chọn địa điểm</option>
            <option value="1">Miền Bắc</option>
            <option value="2">Miền Trung</option>
            <option value="3">Miền Nam</option>
        </select>
        <button>TÌM KIẾM NGAY</button>
    </section>

    <section class="main-news-km">
        <section class="attractive-destinations">
            <h2 class="title">
                <span id="CamNang">
                    <a href="/cam-nang-du-dich/">Cẩm nang du lịch</a>
                </span>
            </h2>
        </section>
        <div class="container">
            <div class="row">
                             
            </div>
            <div class="tour-card">
                <h3>Tour Bali 5 ngày Cung đường đẹp nhất - Tặng Tour Xế Cổ Volkswagen - Làng cổ Penglipuran</h3>
                <p class="original-price"><del>15.890.000₫</del></p>
                <p class="new-price">Giá mới: 14.490.000₫ <span class="discount">Tiết kiệm -9%</span></p>
                <button class="btn-tour">In chương trình tour</button>
                
                <ul class="itinerary">
                    <li>Hà Nội – Bali – Ngắm hoàng hôn biển Jimbaran – Đền nước thiêng Tirta Empul</li>
                    <li>Đảo Khủng long Nusa Penida – Check in Cổng trời Handara – Xích đu My swing</li>
                    <li>Đền Ulundanu – Núi lửa Kintamani – Làng cổ Penglipura – Tour xe Cổ Volkswagen</li>
                </ul>
                
                <p><strong>Di chuyển:</strong> Xe Bus đời mới</p>
                <p><strong>Di chuyển:</strong> Vietjet Air</p>
                <p><strong>Lịch khởi hành:</strong> 26-10-2024</p>
                <p><strong>Thời gian:</strong> 5 Ngày 4 Đêm</p>
                
                <div class="button-group">
                    <button class="btn-book">Đặt Tour</button>
                    <button class="btn-request">Yêu cầu đặt</button>
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
    <script src="./index.js"></script>
</body>
</html>