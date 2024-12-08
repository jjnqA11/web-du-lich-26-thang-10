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
        <div class="title"><h2>Thái Bình - Vùng đất hiền hoà, thăng hoa cảm xúc</h2></div>
        <div class="short-description"><p>Thái Bình tên gọi quen thuộc và thân thương với rất nhiều người. Thế nhưng cũng rất ít những người biết rằng, quê hương Thái Bình có rất nhiều điều thú vị  đằng sau. Hãy cùng khám phá nhé. </p></div>
        <div class="muc-luc">Mục lục <br>
            <ul>
                <li><a href="#canh-dep-thien-nhien" rel="nofollow">Cảnh đẹp thiên nhiên</a></li>
                <li><a href="#nhung-con-nguoi-ky-tich" rel="nofollow">Những con người kỳ tích</a></li>
                <li><a href="#van-hoa" rel="nofollow">Văn hoá</a></li>
            </ul>
        </div>
        <div class="noi-dung">
            <span id="canh-dep-thien-nhien"><h3>Cảnh đẹp thiên nhiên</h3></span>
            <p>Tuy chưa quá nổi bật trong danh sách những điểm đến tại Việt Nam, nhưng với nét đẹp hoang sơ và quyến rũ của Thái Bình đã dần được mọi người, đặc biệt là giới trẻ đến khám phá và trải nghiệm. Với nguồn tài nguyên quý giá là các di tích lịch sử, cổ vật lâu đời cho đến thiên nhiên là những bãi biển còn giữ nguyên nét hoang sơ, Thái Bình hiện nay dần trở thành một trong những điểm đến thú vị nhất tại Việt Nam.</p>
            <img src="images/canhdepthiennhienthaibinh.webp">
            <p>Thời điểm hợp lý nhất để bạn có thể thưởng thức hết những vẻ đẹp của Thái Bình thường là cuối tháng 12 hoặc đầu tháng 1. Hoặc vào những ngày hè nóng bức, bạn hoàn toàn có thể đến nạp tí “vitamin sea” tại các bãi biển ở Thái Bình.</p>
            <span id="nhung-con-nguoi-ky-tich"><h3>Những con người kỳ tích</h3></span>
            <p>Do những đặc điểm nguồn gốc cư dân, Thái Bình là nơi hội tụ và lan tỏa  các sắc thái văn hóa, văn minh của vùng châu thổ Bắc Bộ. Cho đến nay Thái Bình còn gìn giữ được một kho tàng di sản văn hóa đồ sộ với những công trình kiến trúc cổ, những lễ hội truyền thống theo tâm thức “sáng rối, tối chèo” cùng nhiều loại hình diễn xướng dân gian mang đậm sắc thái văn hóa cổ truyền của người Việt. Đó là những di sản văn hóa phản ánh tố chất hào hoa, tinh tế của người Thái Bình.  Kho tàng ca dao, tục ngữ của Thái Bình còn lưu giữ hằng hà, sa số những câu châm ngôn phản ánh về tính cách của người Thái Bình, trong đó có tính cách của từng làng, dạng như: “Chơi với Động Trung mất cả vung lẫn nồi”; “Chơi với Phủ Sóc thì khóc mà về”; “Chơi với Nguyên Xá mất cả má lẫn mông”; “Chơi với làng Keo mất cả kèo lẫn cột”...</p>
            <img src="images/connguoithaibinh.jpg">
            <p>Do chung đúc khí thiêng sông biển nên những bậc anh hùng hào kiệt “lưng đeo gươm, tay mềm mại bút hoa” ở đất này thời nào cũng có. Cần mẫn và năng động. Đoàn kết và dân chủ. Quả cảm và cương nghị. Hiếu học và giàu chí tiến thủ. Nhạy bén với thời cuộc. Dễ thích nghi với mọi môi trường sống. Thích ứng với việc nghĩa và sẵn sàng xả thân vì nghĩa lớn  là những tố chất nổi trội của cư dân Thái Bình. Có thể khái quát về những nét đặc trưng cơ bản là tố chất của người Thái Bình vốn được hình thành và phát triển từ “ba biển”: biển người - biển lúa - biển Đông. “Ba biển” này từng đã có vai trò, vị thế đặc biệt quan trọng trong mọi thời kỳ lịch sử của quốc gia, dân tộc. Chắc chắn là trên con đường hội nhập và phát triển, những tiềm năng, lợi thế về đất đai và cư dân Thái Bình sẽ được khai thác và phát huy xứng tầm để “biển lúa, biển người bên bờ biển Đông” sớm trở thành một tỉnh giàu mạnh, văn minh.</p>
            <span id="van-hoa"><h3>Văn hoá</h3></span>
            <p>Trong cuộc kháng chiến chống Mỹ cứu nước, Thái Bình là “Quê hương năm tấn”. Tới nay, tên gọi thân thương ấy vẫn được người dân cả nước nhắc đến như một biểu tượng của tinh thần đoàn kết, anh dũng, quật cường, vừa sản xuất giỏi vừa chiến đấu, chiến thắng. Trên mảnh đất của những người dân anh dũng, cần cù còn bảo tồn và lưu giữ kho tàng di sản văn hóa, tạo nên đời sống tinh thần phong phú, mang đậm bản sắc văn hóa dân tộc nhưng vẫn có những nét riêng độc đáo.</p>
            <img src="images/vanhoathaibinh.jpg">
            <p>Trải qua hàng nghìn năm lịch sử, các thế hệ tiền nhân xưa đã để lại trên đất Thái Bình hàng nghìn di tích lịch sử văn hóa đặc sắc: đình, đền, miếu, chùa, từ đường… cùng nhiều loại hình diễn xướng dân gian nổi tiếng, hàng trăm lễ hội truyền thống với hàng chục trò chơi, trò diễn dân gian độc đáo và mạng lưới các làng nghề truyền thống còn được duy trì cho đến ngày nay. Cùng với quá trình phát triển hưng thịnh của đất nước, Thái Bình cũng có nhiều thay đổi và phát triển, nhưng đặc thù là tỉnh đồng bằng, đông dân cư, sản xuất nông nghiệp vẫn là chủ yếu, những tiền đề phát triển công nghiệp, phát triển đô thị chưa thật rộng mở nên nhiều sắc thái tiêu biểu của nền văn hóa, văn minh nông nghiệp, trồng lúa nước và đánh bắt thủy hải sản còn được bảo lưu khá đậm nét ở Thái Bình.</p>
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