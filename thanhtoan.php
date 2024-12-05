<?php 
    session_start(); 
    ob_start(); // Bắt đầu output buffering
?>
<?php 
    session_start(); 
    ob_start(); // Bắt đầu output buffering
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
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }
    </style>
    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
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
            <h1>Thanh Toan</h1>

            <p>Vui lòng nhập đầy đủ thông tin chính xác của khách hàng trước khi đặt phòng</p>
        </header>

        <?php

            $servername = "localhost";
            $database = "khamphadisan";
            $username = "root";
            $password = "123456";
            $port = 3307; // mở cổng MYSQL mới

            // create connection
            $conn = mysqli_connect($servername, $username, $password, $database, $port);

            //Check Connection

            if(!$conn){
                die("Connection failed:" . mysqli_connect_error());
            }else{
                
            }

            $error_message = ''; // Khởi tạo biến lỗi
            $success_message = ''; // Khởi tạo biến thông báo thành công

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                

            $hovaten = $_COOKIE['user'];
            $gioitinh = $_POST['gender'];
            $diachi = $_POST['address'];
            $sodienthoai = $_POST['phone'];
            $hinhthucthanhtoan = $_POST['select-payment-choice'];
            $_COOKIE['hotel_price'] = (int) $_COOKIE['hotel_price']; // Ép kiểu thành integer
            $_COOKIE['idNguoiDung'] = (int) $_COOKIE['idNguoiDung'];
            $_COOKIE['idKhachSan'] = (int) $_COOKIE['idKhachSan'];

            $sql = "INSERT INTO `khamphadisan` . `payment_table` (totalBill, user_id, booking_hotel_id, gender, address, select_payment, phoneNumber) values (?,?,?,?,?,?,?)";

            $stmt = mysqli_prepare($conn, $sql);
            $stmt -> bind_param("iiisssi", $_COOKIE['hotel_price'], $_COOKIE['idNguoiDung'], $_COOKIE['idKhachSan'], $gioitinh, $diachi, $hinhthucthanhtoan,$sodienthoai);


            // Kiểm tra nếu gửi thành công
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Đăng ký thành công. Cảm ơn bạn đã đặt phòng!";
            } else {
                $error_message = "Có lỗi xảy ra, vui lòng thử lại.";
            }
            }
        ?>

        <form id="bookingForm" action="" method="POST">
            <div class="info_user">
                <div class="col-left">
                    <div>
                        <h1>Thông tin khách hàng</h1><br>
                    </div>
                    <div>
                        <label for="name">Họ và Tên:</label>
                    <?php
                            echo "<input id='name' type='text' placeholder='Nhập họ tên của bạn' value='{$_COOKIE['user']}' disabled>"
                    ?>
                    </div>
                    <br>
                    <div>
                        <label>Giới tính:</label>
                        <input class="sex" type="radio" name="gender" value="nam"> Nam
                        <input class="sex" type="radio" name="gender" value="nu"> Nữ
                    </div>
                    <br>
                    <div>
                        <label for="adress">Địa chỉ:</label>
                        <input id="adress" type="text" placeholder="Nhập địa chỉ của bạn" name="address">
                    </div>
                    <br>
                    <div>
                        <label for="phone">Số điện thoại:</label>
                        <input id="phone" type="number" placeholder="Nhập số điện thoại" style="width: 298px; height: 25px; border-radius: 5px" name="phone">
                    </div>
                    <br>
                    <div class="select-payment">
                        <h1>Hình thức thanh toán</h1>
                            <label class="radio">
                                <input type="radio" name="select-payment-choice" value="tien mat"> Thanh toán Tiền mặt
                            </label>
                            <label class="radio">
                                <input type="radio" name="select-payment-choice" value="Ship COD"> Ship COD
                            </label>
                            <label class="radio">
                                <input type="radio" name="select-payment-choice" value="Chuyen Khoan"> Chuyển khoản
                            </label>
                    </div>
                     <!-- Hiển thị thông báo lỗi hoặc thành công -->
                    <div class="error">
                        <?php
                        if ($error_message) {
                            echo "<p style='color:red;'>$error_message</p>";
                        }
                        if ($success_message) {
                            echo "<p style='color:green;'>$success_message</p>";
                        }
                        ?>
                    </div>
                    <div class="error"></div> <!--Hien thi loi khi nguoi dung nhap thieu thong tin-->
                    <br>
                    <input id="btn-submit" type="submit" value="Đặt phòng">
                </div>
                <div class="col-right">
                    <h2>Thông tin đơn hàng</h2>
                    <p>Danh sách đặt hàng</p>
                    <table>
                        <thead>
                            <tr>
                                <th>Tên khách sạn</th>
                                <th>Tiêu đề</th>
                                <th>Giá khách sạn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                include "./services/connect-mysql/db_connection.php";
                                
                                // Kiểm tra nếu có tham số 'KhachSan' trong URL
                                if(isset($_GET['KhachSan'])){
                                    $hotelPrice = 0; // Khởi tạo biến để lưu giá khách sạn

                                // Xử lý theo giá trị của 'KhachSan'
                                switch($_GET['KhachSan']){
                                    case 1: 
                                        // Truy vấn thông tin khách sạn từ cơ sở dữ liệu
                                        $sql = "SELECT name, title, price FROM hotel_table WHERE id = ?";
                                        $stmt = mysqli_prepare($conn, $sql);
                                        $stmt -> bind_param('i', $_GET['KhachSan']);
                                        $stmt -> execute();
                                        $result = $stmt -> get_result(); // Trả về kết quả truy vấn

                                        // Kiểm tra nếu có kết quả
                                        if($result -> num_rows > 0){
                                            $hotel = $result -> fetch_assoc(); // Lấy thông tin khách sạn
                                            echo "<td>{$hotel['name']}</td> <td>{$hotel['title']}</td> <td>{$hotel['price']}</td>";
                                            $hotelPrice = $hotel['price']; // Lưu giá khách sạn vào biến $hotelPrice

                                            // Thiết lập cookie
                                            setcookie("hotel_price", $hotelPrice, time() + (10 * 365 * 24 * 60 * 60), "/");
                                            setcookie("idKhachSan", $_GET['KhachSan'], time() + (10 * 365 * 24 * 60 * 60), "/");
                                        }
                                        break;
                                    }
                                }

                                ob_end_flush(); // Kết thúc output buffering và gửi tất cả dữ liệu ra trình duyệt
                            ?>

                            </tr>
                        </tbody>
                    </table>
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
     <script>
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        let errors = []; // Mảng chứa thông báo lỗi

        // Lấy giá trị của các trường
        const gender = document.querySelector('input[name="gender"]:checked');
        const address = document.getElementById('adress').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const payment = document.querySelector('input[name="select-payment-choice"]:checked');

        // Kiểm tra từng trường
        if (!gender) {
            errors.push("Vui lòng chọn giới tính!");
        }

        if (!address) {
            errors.push("Vui lòng nhập địa chỉ!");
        }

        if (!phone) {
            errors.push("Vui lòng nhập số điện thoại!");
        }

        if (!payment) {
            errors.push("Vui lòng chọn phương thức thanh toán!");
        }

        // Nếu có lỗi, hiển thị thông báo và ngăn gửi form
        if (errors.length > 0) {
            event.preventDefault(); // Ngăn form gửi
            const errorDiv = document.querySelector('.error'); // Tìm phần hiển thị lỗi
            errorDiv.innerHTML = errors.join('<br>'); // Hiển thị lỗi
            errorDiv.style.color = 'red';
        }else{
            const errorDiv =document.querySelector('.error');
            const completeSubmitForm = "Gui form thanh cong";
            errorDiv.innerHTML = completeSubmitForm;
            errorDiv.style.color = 'green';
        }
    });
</script>

     <script>
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        let errors = []; // Mảng chứa thông báo lỗi

        // Lấy giá trị của các trường
        const gender = document.querySelector('input[name="gender"]:checked');
        const address = document.getElementById('adress').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const payment = document.querySelector('input[name="select-payment-choice"]:checked');

        // Kiểm tra từng trường
        if (!gender) {
            errors.push("Vui lòng chọn giới tính!");
        }

        if (!address) {
            errors.push("Vui lòng nhập địa chỉ!");
        }

        if (!phone) {
            errors.push("Vui lòng nhập số điện thoại!");
        }

        if (!payment) {
            errors.push("Vui lòng chọn phương thức thanh toán!");
        }

        // Nếu có lỗi, hiển thị thông báo và ngăn gửi form
        if (errors.length > 0) {
            event.preventDefault(); // Ngăn form gửi
            const errorDiv = document.querySelector('.error'); // Tìm phần hiển thị lỗi
            errorDiv.innerHTML = errors.join('<br>'); // Hiển thị lỗi
            errorDiv.style.color = 'red';
        }else{
            const errorDiv =document.querySelector('.error');
            const completeSubmitForm = "Gui form thanh cong";
            errorDiv.innerHTML = completeSubmitForm;
            errorDiv.style.color = 'green';
        }
    });
</script>

</body>
</html>