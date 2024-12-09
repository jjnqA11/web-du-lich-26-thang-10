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
        <div class="title"><h2>Ninh Bình - Tuyệt sắc miền cố đô</h2></div>
        <div class="short-description"><p>Cách Hà Nội khoảng 100 km, Ninh Bình là lựa chọn phù hợp với những du khách không có nhiều thời gian nhưng muốn khám phá thiên nhiên hùng vĩ. </p></div>
        <div class="muc-luc">Mục lục <br>
            <ul>
                <li><a href="#canh-dep-thien-nhien" rel="nofollow">Cảnh đẹp thiên nhiên</a></li>
                <li><a href="#nhung-con-nguoi-ky-tich" rel="nofollow">Những con người kỳ tích</a></li>
                <li><a href="#van-hoa" rel="nofollow">Văn hoá</a></li>
            </ul>
        </div>
        <div class="noi-dung">
            <span id="canh-dep-thien-nhien"><h3>Cảnh đẹp thiên nhiên</h3></span>
            <p>Cách Hà Nội khoảng 100 km, Ninh Bình là lựa chọn phù hợp với những du khách không có nhiều thời gian nhưng muốn khám phá thiên nhiên hùng vĩ.</p>
            <img src="images/canhdepthiennhienninhbinh.jpg">
            <p>Ninh bình với những vùng đất thiên nhiên vô cùng phong phú như Vườn Quốc gia Cúc Phương (hay rừng Cúc Phương) là vườn quốc gia đầu tiên tại Việt Nam, đóng vai trò quan trọng trong việc bảo tồn các loài động vật quý hiếm đang có nguy cơ tuyệt chủng hay như Tràng An - khu du lịch sinh thái nằm trong Quần thể di sản thế giới Tràng An - nơi bảo tồn và chứa đựng nhiều hệ sinh thái rừng ngập nước, rừng trên núi đá vôi, các di chỉ khảo cổ học và di tích lịch sử văn hóa. Năm 2014, khu du lịch sinh thái Tràng An đã được Chính phủ Việt Nam xếp hạng di tích quốc gia đặc biệt quan trọng và UNESCO công nhận là di sản thế giới kép.</p>
            <span id="nhung-con-nguoi-ky-tich"><h3>Những con người kỳ tích</h3></span>
            <p>Tỉnh Ninh Bình có trên 90 vạn dân sinh sống ở 8 huyện, thành phố, thị xã với 2 dân tộc Kinh và Mường. Mỗi dân tộc, mỗi địa phương trong tỉnh có một bản sắc văn hoá truyền thống, song đều hội tụ một phẩm chất chung đó là cần cù, sáng tạo trong lao động sản xuất, đoàn kết, dũng cảm trong đấu tranh chống thiên tai, chống lại các thế lực thù địch, gắn bó và yêu quê hương tha thiết. </p>
            <img src="images/connguoininhbinh.jpg">
            <p>Truyền thống yêu nước, chống giặc ngoại xâm và tinh thần cần cù, sáng tạo trong lao động là nét nổi bật nhất và cũng là di sản tinh thần vô giá của nhân dân các dân tộc ở Ninh Bình trong công cuộc đấu tranh dựng nước và giữ nước. truyền thống quý báu đó được kế tục và phát huy từ đời này sang đời khác và càng được phát huy cao độ từ khi có Đảng cộng sản Việt Nam ra đời, nó trở thành các cao trào cách mạng của nhân dân trong tỉnh.</p>
            <span id="van-hoa"><h3>Văn hoá</h3></span>
            <p>Với thế mạnh là vùng đất ken dày các di tích lịch sử và các danh thắng nổi tiếng, lấy du lịch văn hóa di sản làm nòng cốt, đặc trưng để xây dựng sản phẩm du lịch xanh, thân thiện, an toàn trong mắt bạn bè trong nước và quốc tế, Ninh Bình đã và đang trở thành điểm đến thú vị không thể bỏ qua đối với du khách trong và ngoài nước.</p>
            <img src="images/vanhoaninhbinh.jpg">
            <p>Đến Ninh Bình du khách không ngừng tìm kiếm và trải nghiệm văn hóa bản địa trong đó chính giá trị văn hóa làm nên điều khác biệt trong hành trình trải nghiệm của du khách. Tự tay làm ra những sản phẩm địa phương cũng là một cách để du khách có được một chuyến du lịch trải nghiệm thú vị qua đó giúp du khách hiểu thêm được về lịch sử văn hóa của mỗi vùng quê ở Ninh Bình. Trên nhiều khía cạnh khác nhau trải nghiệm văn hóa bản địa gắn với lịch sử đó là trải nghiệm hai trong một rất thú vị.</p>
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