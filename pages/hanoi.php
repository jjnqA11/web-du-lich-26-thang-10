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
        <div class="title"><h2>Hà Nội trong tôi với mối tình dang dở, bất chợt thích cậu vào mùa hè, đau buồn vào ngày thu và dang dở khi đông đến.</h2></div>
        <div class="short-description"><p>Không biết từ bao giờ, cứ mỗi khi mùa đông ùa về trên khắp các hang cùng ngõ hẻm tại mảnh đất Hà Nội này, người ta lại đổ xô nhau đi thưởng thức những que kem lạnh giá. Có phải chăng kem không chỉ dành cho mùa hè nóng nực, mà nó cũng dành cho cả một mùa đông với cái lạnh khó tả chăng? </p></div>
        <div class="muc-luc">Mục lục <br>
            <ul>
                <li><a href="#canh-dep-thien-nhien" rel="nofollow">Cảnh đẹp thiên nhiên</a></li>
                <li><a href="#nhung-con-nguoi-ky-tich" rel="nofollow">Những con người kỳ tích</a></li>
                <li><a href="#van-hoa" rel="nofollow">Văn hoá</a></li>
            </ul>
        </div>
        </div>
        <div class="noi-dung">
            <span id="canh-dep-thien-nhien"><h3>Cảnh đẹp thiên nhiên</h3></span>
            <p> Ba mươi sáu phố phường của Hà Nội thật khiến con người ta trầm trồ. Nó vừa mang cái dung dị và trầm mặc của một thủ đô ngàn năm văn hiến vừa trẻ trung hiện đại của nơi đô thị phát triển bậc nhất Việt Nam, ấy thế nhưng lại luôn yêu bình, lặng lẽ vào cuối ngày hoàng hôn.</p>
            <img src="images/canhdepthiennhienhanoi.jpg">
            <p>Hà Nội luôn mang một vẻ đẹp riêng biệt luôn thu hút hàng triệu người bơi sự hòa quyện giữa nét cổ kính và hiện đại. Nơi đây không chỉ sở hữu những di tích lịch sử, văn hóa lâu đời mà còn được thiên nhiên ưu ái ban tặng cho nhiều cảnh đẹp thơ mộng. </p>
            <span id="nhung-con-nguoi-ky-tich"><h3>Những con người kỳ tích</h3></span>
            <p>Hà Nội vẫn là thành phố gây thương nhớ đến lạ lùng. Những người con đi xa sẽ nhớ Hà Nội đến quay quắt, còn những người từng có năm tháng sống ở Hà Nội thì luôn bồi hồi nhớ về những năm tháng của đời người ở đây. Và thật lạ là cả những người chưa một lần đặt chân tới Hà Nội cũng nhớ Hà Nội da diết. Phải chăng đó chính là chiều sâu văn hóa. Qua những khúc quanh của lịch sử, Hà Nội dần hồi sinh và đẹp hơn xưa.</p>
            <img src="images/nguoihanoi.jpg">
            <p>Trong đời sống hàng ngày, người Hà Nội cũng thay đổi, Âu hóa hơn. Nữ để tóc bồng, mặc áo dài Lơ mur Cát Tường. Nam biết chơi thể thao, mặc veston, đi giày hay sandal. Nam nữ thanh niên có đời sống tâm hồn lãng mạn, thích đọc thơ, đọc tiểu thuyết tình cảm, biết cắm hoa, thích nghe nhạc, đi tắm biển.</p>
            <span id="van-hoa"><h3>Văn hoá</h3></span>
            <p>Với hơn 1000 năm văn hiến, từ thuở là kinh thành Thăng Long cho tới nay Hà Nội vẫn luôn là trung tâm văn hóa lớn nhất nước với các di tích văn hóa vật thể và phi vật thể. Vùng đất lành vốn đã sản sinh ra nền văn hóa dân gian với nhiều truyền thuyết, ca dao, tục ngữ, những vị anh hùng, danh nhân được dân gian ca ngợi và những lễ hội dân gian mang đậm màu sắc lịch sử....</p>
            <img src="images/vanhoahanoi.jpg">
            <p>Thăng Long Hà Nội trong gần nghìn năm ấy luôn biết tiếp nhận tất cả những gì tinh tuý nhất của mọi vùng miền đất nước và xa hơn, của bạn bè quốc tế, để với bản lĩnh của Hà Nội ngàn năm văn hiến, đã nhân lên những điều hay, xoá đi cái dở, làm nên một nền văn hoá bản sắc riêng đầy quyến rũ – văn hoá Hà Nội. Và không chỉ những người sống ở Hà Nội, yêu Hà nội mà tất cả những ai đã từng đặt chân đến Hà Nội đều có thể cảm nhận được nét quyến rũ ấy. Chính vì vậy, bước chân đầu tiên mà Qua mọi miền văn hoá muốn các bạn đặt tới chính là Thủ đô của Chúng ta.</p>
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