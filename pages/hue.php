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
        <div class="title"><h2>Huế - Kinh đô xưa, trải nghiệm mới</h2></div>
        <div class="short-description"><p>Những ai đã từng đến Huế chắc chắn sẽ cảm nhận được một mảnh đất lãng mạn, mộng mơ, đậm chất thơ, một miền di sản có một không hai về vẻ đẹp rất riêng, rất ngọt ngào. Khi chưa đặt chân đến đây, bạn sẽ không mường tượng được một vẻ đẹp mộng mơ thiên nhiên Huế đầy chất thơ giữa thời hiện đại.</p></div>
        <div class="muc-luc">Mục lục <br>
            <ul>
                <li><a href="#canh-dep-thien-nhien" rel="nofollow">Cảnh đẹp thiên nhiên</a></li>
                <li><a href="#nhung-con-nguoi-ky-tich" rel="nofollow">Những con người kỳ tích</a></li>
                <li><a href="#van-hoa" rel="nofollow">Văn hoá</a></li>
            </ul>
        </div>
        <div class="noi-dung">
            <span id="canh-dep-thien-nhien"><h3>Cảnh đẹp thiên nhiên</h3></span>
            <p>Huế có sông Hương hiền hòa thơ mộng, có núi Ngự thông reo vi vu giữa trời xanh. Huế có Kinh thành, nơi chứng kiến biết bao sự đổi thay quyền cai trị đất nước, lúc thịnh lúc suy. Huế có lăng tẩm đền đài lưu dấu ngàn thu của các bậc Vua chúa. Huế có Từ Đàm, ngôi Phạm Vũ đã chứng tri biết bao biến động thăng trầm hào hùng của lịch sử nước nhà. Huế có Thiên Mụ, ngôi cổ tự hùng thiêng trải qua bao thế hệ. Những hồi chuông Thiên Mụ còn mãi ngân vang từ ngàn xưa cho tới tận ngàn đời sau. Tháp Phước Duyên vời vợi giữa chốn Kinh kỳ, như thâu gọn hồn thiêng của Tổ quốc.</p>
            <img src="images/canhdepthiennhienhue.jpg">
            <p>Vẻ đẹp thơ mộng thiên nhiên Huế về đêm yên tĩnh và bình lặng đến lạ kỳ. Ngồi trên xích lô chạy lòng vòng qua các đường phố rợp bóng cây xanh. Gần cầu Tràng Tiền, gặp những đôi trai gái ngồi bên bờ sông Hương nhâm nhi tách cà phê, cốc nước ngọt trò chuyện rôm rả; nhóm khác ăn chè thập cẩm, cười nói vui vẻ, rất thoải mái, an nhàn tự tại. Vài đôi trai gái đứng ngắm nhìn dòng sông Hương lung linh, vời vợi, huyền ảo. Tất cả cảnh trí đó tạo nên một bức tranh sống động, nhộn nhịp, sao mà đẹp và nên thơ đến thế! Đêm ở Huế trôi đi chậm chạp khiến ai cũng thấy lòng mình thanh thản, thư thái….</p>
            <span id="nhung-con-nguoi-ky-tich"><h3>Những con người kỳ tích</h3></span>
            <p>Vẻ đẹp của những người xứ Huế rất dịu dàng, chỉ cần nhắc đến Huế người ta đã thấy một vẻ đẹp gì đó nhẹ nhàng quyến rũ thư thái đi vào lòng người. Người ta bị cuốn hút không chỉ vì vẻ đẹp của những thắng cảnh thiên nhiên, sự cổ kính của những đền đài, lăng tẩm, mà còn bởi tính cách con người xứ Huế. Ta sẽ cảm nhận được sự gần gũi thân thiện của con người nơi đây. Người Huế luôn nở nụ cười trên môi khi gặp người khác, bạn sẽ cảm nhận được sự quan tâm, hỏi han giúp đỡ tận tình của người dân xứ Huế.</p>
            <img src="images/connguoihue.jpg">
            <p>Tính cách kín đáo trầm lặng và nề nếp gia phong đã ăn sâu vào máu của những con người nơi đất Cố đô. Họ ít nói, sống luôn giữ kẽ và hết sức kín đáo trong lời ăn tiếng nói hằng ngày. Họ thường giấu kín những khó khăn riêng của mình trước bạn bè, không để điều to tiếng, chuyện buồn lan tới khách khứa láng giềng. Người Huế sống rất có phép tắc, từ già tới trẻ, từ đàn ông con trai đến đàn bà con gái, tất cả tuân theo một khuôn phép đã có từ rất lâu, đó chính là truyền thống nề nếp gia phong. </p>
            <span id="van-hoa"><h3>Văn hoá</h3></span>
            <p>Huế không chỉ là xứ sở của sông Hương - núi Ngự mà Huế có đủ núi - đồi, sông - biển, đầm - phá, đất - cát, cồn - bàu. Huế có núi đồi nhấp nhô với Kim Phụng, Ngự Bình, Vọng Cảnh; có dòng sông êm đềm với Hương Giang, An Cựu, Như Ý, Lợi Nông; có đầm Chuồn, Cầu Hai; có phá Tam Giang; lại có Cồn Hến, Giã Viên v.v... Huế có tất cả đất núi đồi, đất thịt và cả đất cát ven phá, ven biển... Không những thế, thiên nhiên Huế lại quyện vào nhau, sơn thủy hữu tình, phong cảnh kỳ thú. Sống trong khung cảnh thiên nhiên hòa quyện như vậy, con người Huế đã sớm đùm bọc, gắn bó với nhau, kể từ ngày vào mảnh đất làm "quà cưới" này lập làng, sinh sống.</p>
            <img src="images/vanhoahue.jpg">
            <p>Nét riêng của văn hóa Huế còn được thể hiện qua ăn nói, ăn mặc, ăn uống, ăn học và cả ăn chơi của người Huế. Trong ăn nói, người Huế luôn tôn trọng thứ bậc thể hiện qua cách xưng hô ở làng, họ và gia đình, không phân biệt tuổi tác, giàu sang, nghèo hèn (có cả một hệ thống xưng hô khác với nhiều vùng). Đối với xóm giềng, lạ cũng như quen đều căn cứ vào tuổi tác mà ăn nói. Trên địa bàn Thừa Thiên Huế hiện nay đều có chung một thứ tiếng là tiếng Huế, chung là thứ giọng là giọng Huế, không phân biệt dân làng hay thành phố. Người ta vẫn biết đến giọng Huế nhẹ nhàng, có phần e ấp của những cô gái Huế./.</p>
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