<?php
    include "./services/connect-mysql/db_connection.php";
    session_start(); // khoi tao phien dang nhap

    if (!isset($_COOKIE['user'])) { // neu khong ton tai cookie user
        header("Location: login.php"); // quay lai trang dang nhap
        exit(); // dừng việc thực thi chương trình ngay tại đây 
        // mọi đoạn mã bên dưới sẽ không được chạy 
        echo "Doan ma nay nay se khong duoc in ra";
    }

    $sql = "SELECT id FROM `khamphadisan` . `user_table` where userName = '{$_COOKIE['user']}' "; // lấy giá trị id trong database "khamphadisan" . table "user_table" where userName = cookie['user]
    $result = $conn -> query($sql); // thực thi câu lệnh sql 

        // kiem tra neu co ket qua
        if($result -> num_rows > 0){
            // duyet qua cac dong du lieu
            while($row = $result -> fetch_assoc()){ // lay tung dong du lieu duoi dang mot mang ket hop ["key" => "value"]
                setcookie("idNguoiDung", $row['id'], time() + (10 * 365 * 24 * 60 * 60), "/");
                // setcookie("name", "value", "expire", "path") 
                /**
                 * name: ten cua cookie
                 * value: gia tri cua cookie 
                 * expire: thoi gian het han cua cookie 10 nam * 365 ngay * 24 gio * 60 phut * 60 giay
                 * path: duong dan ma cookie khả dụng mặc định / (cookie khả dụng cho toàn bộ trang web) từ trang index.php
                 */
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Phá Di Sản</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <li><a href="#">TRANG CHỦ</a></li>
                    <li><a href="#DiemDen">ĐIỂM ĐẾN HẤP DẪN</a></li>
                    <li><a href="#CamNang">CẨM NANG DU LỊCH</a></li>
                    <li><a href="#KhachSan">KHÁCH SẠN</a></li>
                </div>
                <div class="menu_item">
                    <li class="theme-toggle">
                        <a class="theme-toggle-btn" onclick="toggleTheme(event)">
                            <img id="theme-icon" src="images/sun-icon.png" alt="Theme Icon">
                        </a>
                    </li>  
                        <div class="user-info">
                            <!-- Avatar icon -->
                            <div class="user-avatar" onclick="toggleDropdown()"> 
                                
                                <img src="images/user.png" alt="Avatar" class="avatar"> 
                            </div>
                            <!-- Dropdown menu -->
                            <div class="dropdown-menu" id="userDropdown">
                                <span class="username"><b>Xin chào, <?php echo htmlspecialchars($_COOKIE['user']); ?>!</b></span>
                                <a href="userInfo.php" class="dropdown-item">Trạng thái tài khoản</a>
                                <a href="trangThaiDonHang.php" class="dropdown-item">Trạng thái đơn hàng</a>
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
    <button type="submit">TÌM KIẾM NGAY</button>
        </form>
        
    </section>
    <section class = "main-news">
        <section class="attractive-destinations">
            <h2 class="title">
                <span id="DiemDen">
                    <a href="/diem-den-hap-dan/">Điểm đến hấp dẫn</a>
                </span>
            </h2>
            <div class="destinations-container">
                <div class="destination-card item">
                    <a href="pages/hanoi.php">
                        <img src="images/ho-hoan-kiem-7185.jpg" alt="Hà Nội">
                    <div class="overlay">
                        <p>Hà Nội – Biểu tượng lịch sử độc đáo của Việt Nam</p>
                    </div>
                    </a>   
                </div>
                <div class="destination-card item">
                   <a href="pages/thaibinh.php"><img src="images/DTQGDB_Chua Keo Thai Binh.jpg" alt="Thái Bình">
                    <div class="overlay">
                        <p>Thái Bình - Nơi sản sinh những nhân tài kiệt xuất</p>
                    </div>
                </a>
                </div>
                <div class="destination-card item">
                    <a href="pages/ninhbinh.php">
                    <img src="images/Ninh_binh.webp" alt="Ninh Bình">
                    <div class="overlay">
                        <p>Ninh Bình - Cảnh đẹp thiên nhiên ngút trời</p>
                    </div>
                </a>
                </div>
                <div class="destination-card item">
                    <a href="pages/hue.php">
                    <img src="images/hue.jpg" alt="Huế">
                    <div class="overlay">
                        <p>Huế – Biểu tượng Cố Đô</p>
                    </div>
                </a>
                </div>
                <div class="destination-card item">
                    <a href="pages/tphcm.php">
                    <img src="images/TPHCM.jpg" alt="TPHCM">
                    <div class="overlay">
                        <p>TP Hồ Chí Minh - Thành phố của tương lai</p>
                    </div>
                </a>
                </div>
            </div>
        </section>
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
                <ul class="list-kn">
                    <li>
                        <a href="#">
                            <img src="https://khamphadisan.com.vn/img/100x80/khampha/2024/09/Mang-Den-Minh-Le.jpg" alt="Khám phá Măng Đen - Thiên nhiên đại ngàn" title="Khám phá Măng Đen - Thiên nhiên đại ngàn">
                        </a>
                        <div class="content">
                            <h4 class="tit-kn">
                                <a href="#">Khám phá Măng Đen – Thiên nhiên đại ngàn</a>
                            </h4>
                            <p class="tit-kn-detail">Măng Đen là một thị trấn được mệnh danh là “Đà Lạt thu nhỏ”...</p>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="https://khamphadisan.com.vn/img/100x80/khampha/2024/09/Mang-Den-Minh-Le.jpg" alt="Khám phá Măng Đen - Thiên nhiên đại ngàn" title="Khám phá Măng Đen - Thiên nhiên đại ngàn">
                        </a>
                        <div class="content">
                            <h4 class="tit-kn">
                                <a href="#">Khám phá Măng Đen – Thiên nhiên đại ngàn</a>
                            </h4>
                            <p class="tit-kn-detail">Măng Đen là một thị trấn được mệnh danh là “Đà Lạt thu nhỏ”...</p>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="https://khamphadisan.com.vn/img/100x80/khampha/2024/09/Mang-Den-Minh-Le.jpg" alt="Khám phá Măng Đen - Thiên nhiên đại ngàn" title="Khám phá Măng Đen - Thiên nhiên đại ngàn">
                        </a>
                        <div class="content">
                            <h4 class="tit-kn">
                                <a href="#">Khám phá Măng Đen – Thiên nhiên đại ngàn</a>
                            </h4>
                            <p class="tit-kn-detail">Măng Đen là một thị trấn được mệnh danh là “Đà Lạt thu nhỏ”...</p>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <img src="https://khamphadisan.com.vn/img/100x80/khampha/2024/09/Mang-Den-Minh-Le.jpg" alt="Khám phá Măng Đen - Thiên nhiên đại ngàn" title="Khám phá Măng Đen - Thiên nhiên đại ngàn">
                        </a>
                        <div class="content">
                            <h4 class="tit-kn">
                                <a href="#">Khám phá Măng Đen – Thiên nhiên đại ngàn</a>
                            </h4>
                            <p class="tit-kn-detail">Măng Đen là một thị trấn được mệnh danh là “Đà Lạt thu nhỏ”...</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tips-table">
                <div class="tips-card">
                    <a href="#"><img src="images/TPHCM.jpg" alt="TPHCM">
                    <p>Những thứ phải mang khi đi du lịch</p></a>
                </div>
                <div class="tips-card">
                    <a href="#"><img src="images/TPHCM.jpg" alt="TPHCM">
                    <p>Những thứ phải mang khi đi du lịch</p></a>
                </div>
                <div class="tips-card">
                    <a href="#"><img src="images/TPHCM.jpg" alt="TPHCM">
                    <p>Những thứ phải mang khi đi du lịch</p></a>
                </div>
            </div>
            <div class="tour-card">
                <h3>Tour Bali 5 ngày Cung đường đẹp nhất - Tặng Tour Xế Cổ Volkswagen - Làng cổ Penglipuran</h3>
                <p class="original-price"><del>15.890.000₫</del></p>
                <p class="new-price">Giá mới: 14.490.000₫ <span class="discount">Tiết kiệm -9%</span></p>
                
                <ul class="itinerary">
                    <li>Hà Nội – Bali – Ngắm hoàng hôn biển Jimbaran – Đền nước thiêng Tirta Empul</li>
                    <li>Đảo Khủng long Nusa Penida – Check in Cổng trời Handara – Xích đu My swing</li>
                    <li>Đền Ulundanu – Núi lửa Kintamani – Làng cổ Penglipura – Tour xe Cổ Volkswagen</li>
                </ul>
                
                <p><strong>Di chuyển:</strong> Xe Bus đời mới</p>
                <p><strong>Di chuyển:</strong> Vietjet Air</p>
                <p><strong>Lịch khởi hành:</strong> 24-12-2024</p>
                <p><strong>Thời gian:</strong> 5 Ngày 4 Đêm</p>
                
                <div class="button-group">
                    <button class="btn-book"><a href="#datTour" style="text-decoration: none; color: white;">Đặt Tour</a></button>
                </div>
            </div>
        </div>        
    </section>
    <section class="attractive-destinations">
        <h2 class="title">
            <span id="KhachSan">
                <a href="/khach-san/">Khách sạn</a>
            </span>
        </h2>
    </section>
    <section class="hotel-container">
        <div class="hotel-card">
          <img src="images/nguyen-ho-homstay-da-lat.jpg" alt="Nguyễn Hồ Homestay" />
          <h3>Nguyễn Hồ Homestay Đà Lạt</h3>
          <div class="price">150.000VNĐ</div>
          <div class="stars">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
          </div>
          <a href="thanhtoan.php?KhachSan=1"><button>Đặt Phòng Ngay</button></a>
        </div>
        
        <div class="hotel-card">
          <img src="images/hoang-phuc-hotel.jpg" alt="Khách Sạn Hoàng Phúc" />
          <h3>Khách Sạn Hoàng Phúc</h3>
          <div class="price">230.000VNĐ</div>
          <div class="stars">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
          </div>
          <a href="thanhtoan.php?KhachSan=2"><button>Đặt Phòng Ngay</button></a>
        </div>
      
        <div class="hotel-card">
          <img src="images/dong-ho-hotel.jpg" alt="Khách Sạn Đông Hồ" />
          <h3>Khách Sạn Đông Hồ</h3>
          <div class="price">200.000đ</div>
          <div class="stars">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
          </div>
          <a href="thanhtoan.php?KhachSan=3"><button>Đặt Phòng Ngay</button></a>
        </div>
        
        <div class="hotel-card">
          <img src="images/truong-giang-hotel.jpg" alt="Khách Sạn Trường Giang" />
          <h3>Khách Sạn Trường Giang Huế</h3>
          <div class="price">303.000-606.000VNĐ</div>
          <div class="stars">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>☆</span>
          </div>
          <a href="thanhtoan.php?KhachSan=4"><button>Đặt Phòng Ngay</button></a>
        </div>
    </section>
   
    <section class="tour-booking" id="datTour">
        <h2>CHỌN NGÀY KHỞI HÀNH</h2>
        <table>
            <thead>
                <tr>
                    <th>Ngày khởi hành</th>
                    <th>Số người</th>
                    <th>Kinh phí</th>
                    <th>Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>26/10/2024</td>
                    <td><input id="input-passenger1" type="number" value="0" min="0"></td>
                    <td>14.490.000₫</td>
                    <td id="tour-booking-price1">0₫</td>
                </tr>
                <tr>
                    <td>16/11/2024</td>
                    <td><input id="input-passenger2" type="number" value="0" min="0"></td>
                    <td>14.490.000₫</td>
                    <td id="tour-booking-price2">0₫</td>
                </tr>
                <tr>
                    <td>30/11/2024</td>
                    <td><input id="input-passenger3" type="number" value="0" min="0"></td>
                    <td>14.490.000₫</td>
                    <td id="tour-booking-price3">0₫</td>
                </tr>
                <tr>
                    <td>28/12/2024 (Bali Countdown 2025)</td>
                    <td><input id="input-passenger-sell" type="number" value="0" min="0"></td>
                    <td>16.990.000₫</td>
                    <td id="tour-booking-price-sell">0₫</td>
                </tr>
            </tbody>
        </table>
        <div class="total">
            <span>Tổng tiền</span>
            <span id="thanh-tien">0₫</span>
        </div>
        <a href="thanhtoan.php"><button class="book-tour">ĐẶT TOUR NGAY</button></a>
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

    <!-- Execute -->
    <script src="assets/js/index.js"></script>
</body>
</html>
