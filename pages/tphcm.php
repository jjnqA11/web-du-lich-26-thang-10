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
                                <a href="../userInfo.php" class="dropdown-item">Trạng thái tài khoản</a>
                                <a href="../trangThaiDonHang.php" class="dropdown-item">Trạng thái đơn hàng</a>
                                <a href="../logout.php" class="dropdown-item">Đăng xuất</a>
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
    <br><br><br>
    <div class="content">
        <div class="title"><h2>Thành phố Hồ Chí Minh - Văn minh, hiện đại, nghĩa tình</h2></div>
        <div class="short-description"><p>TP Hồ Chí Minh là vùng đất với khí hậu ôn hòa có thể quy tụ những người dân từ mọi miền của đất nước về đây sinh sống, lập nghiệp. Người Sài Gòn vốn dĩ bao dung, hào sảng, nghĩa tình... và luôn biết thích ứng với mọi hoàn cảnh để tồn tại. Ngày mai luôn là một ngày mới - có lẽ người Sài Gòn luôn tâm niệm như vậy, để bắt đầu cuộc sống mới với một tâm thế lạc quan và đổi mới để luôn luôn phát triển. </p></div>
        <div class="muc-luc">Mục lục <br>
            <ul>
                <li><a href="#canh-dep-thien-nhien" rel="nofollow">Cảnh đẹp thiên nhiên</a></li>
                <li><a href="#nhung-con-nguoi-ky-tich" rel="nofollow">Những con người kỳ tích</a></li>
                <li><a href="#van-hoa" rel="nofollow">Văn hoá</a></li>
            </ul>
        </div>
        <div class="noi-dung">
            <span id="canh-dep-thien-nhien"><h3>Cảnh đẹp thiên nhiên</h3></span>
            <p>Thiên nhiên ở Thành phố Hồ Chí Minh tuy không hùng vĩ hay thơ mộng như ở các vùng miền khác, nhưng mang một vẻ đẹp đặc trưng của vùng đất đô thị sôi động, hòa quyện giữa hiện đại và tự nhiên.</p>
            <img src="images/canhdepthiennhientphcm.webp">
            <p>Thành phố Hồ Chí Minh được bao quanh bởi hệ thống sông ngòi chằng chịt, trong đó nổi bật là sông Sài Gòn. Các con kênh lớn như kênh Nhiêu Lộc - Thị Nghè, kênh Tàu Hủ - Bến Nghé, kênh Tân Hóa - Lò Gốm không chỉ góp phần vào giao thông và tưới tiêu mà còn tạo điểm nhấn thiên nhiên cho thành phố. Các khu vực ngoại ô như Cần Giờ với Rừng ngập mặn là một điểm nhấn đặc biệt. Khu dự trữ sinh quyển Cần Giờ được UNESCO công nhận, với hệ sinh thái rừng ngập mặn phong phú, là nơi sinh sống của nhiều loài động thực vật quý hiếm.</p>
            <span id="nhung-con-nguoi-ky-tich"><h3>Những con người kỳ tích</h3></span>
            <p>Con người Thành phố Hồ Chí Minh mang những nét đặc trưng của vùng đất năng động, hiện đại nhưng vẫn giữ được sự chân thành và gần gũi. Họ được định hình bởi lịch sử, văn hóa giao thoa và lối sống đặc trưng của một trung tâm kinh tế, văn hóa lớn nhất cả nước. </p>
            <img src="images/connguoitphcm.jpg">
            <p>Người Sài Gòn thường được miêu tả là năng động, cởi mở, và phóng khoáng. Họ có tinh thần lạc quan và thường xuyên nắm bắt các cơ hội kinh doanh. Sự hòa đồng và thân thiện cũng là những đặc điểm nổi bật của người dân ở đây.</p>
            <span id="van-hoa"><h3>Văn hoá</h3></span>
            <p>Văn hóa TP.HCM (Sài Gòn) là một sự hòa trộn đa dạng và phong phú. Đây là một trung tâm kinh tế, văn hóa và giáo dục quan trọng của Việt Nam, với sự ảnh hưởng mạnh mẽ từ nhiều vùng miền khác nhau.</p>
            <img src="images/vanhoatphcm.jpg">
            <p> <strong>Sự hòa nhập đa văn hóa:</strong> Người dân từ khắp nơi đến đây sinh sống, làm việc và học tập, tạo nên một cộng đồng đa dạng.<br>
                        <br>
                       <strong>Nghệ thuật và giải trí:</strong> TP.HCM nổi tiếng với các hoạt động nghệ thuật, từ nhạc sống, kịch nghệ, điện ảnh đến các lễ hội văn hóa lớn nhỏ.<br>
                        <br>
                        <strong>Ẩm thực:</strong> Đây là thiên đường ẩm thực với đủ các món ăn đặc trưng từ mọi miền đất nước và cả các món ăn quốc tế.<br>
                        <br>
                        <strong>Phát triển kinh tế:</strong> TP.HCM là trung tâm thương mại và công nghiệp hàng đầu, nơi có nhiều cơ hội kinh doanh và khởi nghiệp.<br>
                        <br>
                        <strong>Cuộc sống ban đêm:</strong> Thành phố này còn nổi tiếng với nhịp sống năng động về đêm, với các quán bar, nhà hàng và các hoạt động giải trí không ngừng nghỉ.</p>
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