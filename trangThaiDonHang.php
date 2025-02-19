<?php
    include "./services/connect-mysql/db_connection.php";
    // Lấy giá trị từ cookie
    $username_cookie = $_COOKIE['user'] ?? null;

    if (!$username_cookie) {
        die("Cookie không tồn tại hoặc không hợp lệ!");
    }
    
    $sql = "SELECT userName , password from user_table where userName = ?";


    // truyen cart vao table data

    $stmt = mysqli_prepare($conn, $sql);

    $stmt -> bind_param("s", $username_cookie);

    $stmt -> execute();

    $result = $stmt->get_result();


    if($result -> num_rows <= 0){

        die("Khong tim thay nguoi dung va ten: " . $username_cookie);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/thanhtoan.css">
    <style>
        /* Bao quanh bảng để tạo khung cuộn */
        .table-container {
            max-height: 400px; /* Giới hạn chiều cao của bảng */
            overflow-y: auto; /* Hiện thanh cuộn dọc */
            border: 1px solid #ddd;
        }

        /* Cố định tiêu đề bảng */
        .table-container table {
            width: 100%; /* Đảm bảo bảng không bị kéo rộng */
            border-collapse: collapse;
        }

        .table-container thead {
            position: sticky;
            top: 0; /* Cố định ở đỉnh bảng */
            background-color: #f1f1f1; /* Màu nền cho thead */
            z-index: 2; /* Đảm bảo thead luôn ở trên tbody */
        }



        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            width: auto;
            }
    </style>
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
                <a class="theme-toggle-btn" onclick="toggleTheme(event)">
                    <img id="theme-icon" src="images/sun-icon.png" alt="Theme Icon">
                </a>
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
            </ul>
        </nav>
    </section>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <section class="main">
        <header id="header__main">
            <h1>Trạng thái đơn hàng</h1>

            <p>Thông tin đơn hàng của quý khách.</p>
        </header>
        <form id="bookingForm" action="" method="POST">
        <div class="info_user">
            <div class="col-left">
                <div>
                    <h1>Thông tin khách hàng</h1><br>
                </div>
                <div>
                    <label for="name">Họ và Tên:</label>
                    <?php
                        echo "<input id='name' type='text' placeholder='Nhập họ tên của bạn' value='{$_COOKIE['user']}' disabled>";
                    ?>
                </div>
                <br>
                <?php         
                    $userId = 
                    "SELECT p.address, p.phoneNumber, u.email " .
                    // lấy email người dùng trong bảng user_table, address trong bảng payment_table, phoneNumber trong bảng payment_table
                    "FROM `khamphadisan`.`payment_table` AS p " .
                    // từ bảng payment_table viết tắt "AS" p nối với bảng user_table dựa trên điều kiện nối
                    "INNER JOIN `khamphadisan`.`user_table` AS u " .
                    // điều kiện kết nối (p.user_id = u.id) chỉ lấy các bản ghi trong bảng payment_table mà user_id khớp với id của bảng user_table
                    "ON p.user_id = u.id";

                    $userIdResult = $conn->query($userId);
                    $addressUser;
                    $phoneNumberUser;
                    $emailUser;

                    if ($userIdResult) {
                        // Kiểm tra nếu có kết quả
                        if ($userIdResult-> num_rows > 0) {
                            // Duyệt qua các dòng dữ liệu
                            while ($row = $userIdResult->fetch_assoc()) {
                                // Truy xuất giá trị của các cột từ mảng $row
                                $address = $row['address'];
                                $phoneNumber = $row['phoneNumber'];
                                $emailUser = $row['email'];
                            }
                        } else {
                            echo "No data found.";
                        }
                    } else {
                        echo "Query failed: " . $conn->error;
                    }
                ?>
                <div>
                    <label for="adress">Địa chỉ:</label>
                    <input id="adress" type="text" placeholder="Nhập địa chỉ của bạn" value="<?php echo $address; ?>" disabled>
                </div>
                    <br>
                <div>
                        <label for="phone">Số điện thoại:</label>
                        <input id="phone" placeholder="Nhập số điện thoại" style="width: 298px; height: 25px; border-radius: 5px color: #ccc" value="<?php echo $phoneNumber; ?>" disabled>
                </div>
                    <br>
                <div>
                        <label for="email">Email:</label>
                        <input id="email" type="text" placeholder="Email" value="<?php echo $emailUser; ?>" disabled>
                </div>
            </div>
            <div class="col-right">
                <div>
                    <h1>Thong tin don hang</h1>
                </div>
                <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình thức thanh toán</th>
                            <th>Giá</th>
                            <th>Huỷ đơn</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                    <?php
                        $cartUser = "SELECT h.name, p.select_payment, p.totalBill, p.id " . 
                        // lấy các trường tên khách sạn (name), trường hình thức thanh toán (select_payment), trường giá (totalBill)
                        "FROM `khamphadisan`.`payment_table` AS p " . 
                        // từ bảng payment_table viết tắt "AS" p nối với bảng hotel_table dựa trên điều kiện nối
                        "INNER JOIN `khamphadisan`.`hotel_table` AS h " . 
                        // điều kiện kết nối (p.booking_hotel_id = h.id) chỉ lấy các bản ghi trong bảng payment_table mà booking_hotel_id khớp với id của bảng hotel_table
                        "ON p.booking_hotel_id = h.id WHERE p.user_id = '{$_COOKIE['idNguoiDung']}'";
                        // giới hạn kết quả chỉ bao gồm các bản ghi mà user_id trong bảng payment_table khớp với giá trị $_COOKIE['idNguoiDung]

                        // Sử dụng đúng biến $cartUser
                        $cartUserResult = $conn->query($cartUser);

                        if ($cartUserResult) {
                            
                            if ($cartUserResult->num_rows > 0) {

                                while ($row = $cartUserResult->fetch_assoc()) {

                                    $paymentId = $row['id'];
                                    
                                    echo "<tr>
                                            <td>{$row['name']}</td>
                                            <td>{$row['select_payment']}</td>
                                            <td>{$row['totalBill']}</td>
                                            <td><a href='delete_payment.php?id=$paymentId' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")' style='
                                            display: flex;
                                            color: white; 
                                            background-color: red; 
                                            text-decoration: none; 
                                            justify-content: center;
                                            margin: 25%;
                                            '>X</a></td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' style='text-align:center;'>No records found</td></tr>";
                            }
                        } else {
                            echo "Query failed: " . $conn->error;
                        }
                    ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </form>
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
    <!-- Script -->

     <script src="assets/js/index.js"></script>

     <script src="assets/js/thanhtoan.js"></script>
</body>
</html>