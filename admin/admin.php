
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                        <path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/>
                    </svg>
                </a>
                <h3>Hello <?php echo htmlspecialchars($_COOKIE['user']); ?></h3>
            </div>
            <div class="sidebar_wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="../images/user.png" width="32px" height="32px" alt="">
                    </div>
                    <div class="user-info">
                        Chỉnh sửa thông tin
                    </div>
                </div>
                <ul class="nav">
                    <li class="nav-item"><a href="#">Quan tri</a></li>
                    <li class="nav-item"><a href="#">Menu</a></li>
                    <li class="nav-item"><a href="#">Cai Dat Trang</a></li>
                    <li class="nav-item"><a href="#">Dang ki truc tuyen</a></li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
        <nav class="navbar">
        <div id="navigation">
            <form method="GET" action="admin.php" id="search-form">
                <input type="text" name="query" placeholder="Tìm kiếm..." value="<?php echo htmlspecialchars($_GET['query'] ?? ''); ?>">
                <button type="submit">Tìm</button>
            </form>
        </div>
    </nav>

    <?php
    // Kết nối cơ sở dữ liệu
    include "../services/connect-mysql/db_connection.php";

    // Kiểm tra kết nối
    if (!$conn) {
        die("Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error());
    }

    // Xử lý tìm kiếm
    $search = trim($_GET['query'] ?? '');
    if ($search !== '') {
        $sql = "SELECT id, userName, email, password FROM user_table WHERE userName LIKE ? OR email LIKE ? OR id LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            $like_search = "%" . $search . "%";
            mysqli_stmt_bind_param($stmt, "sss", $like_search, $like_search, $like_search);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Hiển thị kết quả
            if ($result && mysqli_num_rows($result) > 0) {
                echo '<table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Mật khẩu</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo  '
                        <tr>
                            <td>' . $row["id"] . '</td>
                            <td>' . $row["userName"] . '</td>
                            <td>' . $row["email"] . '</td>
                            <td>******</td> <!-- Mật khẩu ẩn đi, chỉ hiển thị dấu sao -->
                            <td>
                                <!-- Nút Đặt lại mật khẩu -->
                                <button onclick="showPasswordBox(' . $row["id"] . ')">Đặt lại mật khẩu</button>
                                <!-- Nút Sửa -->
                                <button onclick="showEditBox(' . $row["id"] . ', \'' . $row["userName"] . '\', \'' . $row["email"] . '\')">Sửa</button>
                                <!-- Nút Xóa -->
                                <button onclick="showDeleteBox(' . $row["id"] . ')">Xóa</button>
                            </td>
                        </tr>';
                }
                echo '</tbody>
                      </table>';
            } else {
                echo '<p>Không tìm thấy kết quả nào.</p>';
            }
        } else {
            echo '<p>Lỗi khi chuẩn bị câu lệnh: ' . mysqli_error($conn) . '</p>';
        }
    }
        ?>
            <div class="app-dashboard">
                <div class="create-user">
                    <button id="create_user_btn">
                        Them nguoi dung
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/>
                        </svg>
                    </button>
                    <div class="add-user-box">
                        <div class="close_btn">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                                </svg>
                            </button>
                        </div>
                        <form action="../admin.php" method="post" id="f-register">
                            <div class="header">
                            <h2>Đăng ký</h2>
                            </div>
                            <!-- Tên người dùng -->
                            <div class="f-input">
                            <div class="label">
                                <label for="username">Tên người dùng:</label>
                            </div>
                            <input type="text" placeholder="Nhập tên của bạn vào đây(VD: diep123, hoangdz,..)" name="username" id="username" style="font-size: large;">
                            </div>
                            
                            <!-- Email -->
                            <div class="f-input">
                            <div class="label">
                                <label for="email">Email:</label>
                            </div>
                            <input type="email" placeholder="Điền Email của bạn..." name="email" id="email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                            </div>
                            
                            <!-- Mật khẩu -->
                            <div class="f-input">
                            <div class="label">
                                <label for="password">Mật khẩu:</label>
                            </div>
                            <input type="password" placeholder="Nhập mật khẩu..." name="password" id="password">
                            <i class="fas fa-eye" id="toggle-password" onclick="togglePassword()"></i>
                            </div>
                            
                            <!-- Nhập lại mật khẩu -->
                            <div class="f-input">
                            <div class="label">
                                <label for="password">Nhập lại mật khẩu:</label>
                            </div>
                            <input type="password" placeholder="Nhập lại mật khẩu..." name="confirm_password" id="confirm_password">
                            </div>

                            <!-- Thông báo lỗi/success -->
                            <?php if (isset($error_message)): ?>
                                <p style="color: red;"><?php echo $error_message; ?></p>
                            <?php elseif (isset($success_message)): ?>
                                <p style="color: green;"><?php echo $success_message; ?></p>
                            <?php endif; ?>

                            <!-- Nút đăng ký và chuyển đến đăng nhập -->
                            <div class="button-register">
                                <div class="accept-submit">
                                <button id="btn-submit" type="submit">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="main-content">
                    <!-- Nền mờ khi mở hộp thoại sửa -->
                    <div id="modal-overlay" onclick="hideEditBox()"></div>
                    <!-- Hộp thoại chỉnh sửa người dùng -->
                    <div class="edit-user-box" id="edit-user-box" style="display: none;">
                        <div class="header">
                            <h2>Chỉnh sửa thông tin người dùng</h2>
                        </div>
                        <form action="admin.php" method="POST">
                            <input type="hidden" name="id" id="edit-id">
                            <div class="f-input">
                                <label for="edit-username">Tên người dùng:</label>
                                <input type="text" name="username" id="edit-username" required>
                            </div>
                            <div class="f-input">
                                <label for="edit-email">Email:</label>
                                <input type="email" name="email" id="edit-email" required>
                            </div>
                            <div class="button-group">
                                <button type="submit" name="save">Lưu</button>
                                <button type="button" onclick="hideEditBox()">Hủy</button>
                            </div>
                        </form>
                    </div>
                        <?php 
                        if (isset($_POST['save'])) {
                            $id = $_POST['id'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                        
                            $sql = "UPDATE user_table SET userName = ?, email = ?, password = ? WHERE id = ?";
                            $stmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($stmt, "sssi", $username, $email, $password, $id);
                        
                            if (mysqli_stmt_execute($stmt)) {
                                echo "<script>alert('Chỉnh sửa thành công!'); window.location.href='admin.php';</script>";
                            } else {
                                echo "<script>alert('Lỗi: " . mysqli_error($conn) . "');</script>";
                            }
                        }
                        ?>
                    </div>

                    <!-- Nền mờ khi mở hộp thoại reset -->
                    <div id="box-overlay" onclick="closePasswordBox()"></div>
                    <!-- Modal Đặt lại mật khẩu -->
                    <div id="reset-password-box" class="reset-password-box" style="display: none;">
                        <div class="modal-content">
                            <h3>Đặt lại mật khẩu</h3>
                            <form id="reset-password-form" method="POST" action="reset-password.php">
                                <input type="hidden" name="user_id" id="user-id">
                                <label for="new-password">Mật khẩu mới:</label>
                                <input type="password" name="new_password" id="new-password" required>
                                <br>
                                <label for="confirm-password">Nhập lại mật khẩu mới:</label>
                                <input type="password" id="confirm-password" required>
                                    <div class="button-group">
                                        <button type="save" onclick="validatePasswords()">Xác nhận</button>
                                        <button type="button" onclick="closePasswordBox()">Hủy</button>
                                        </div>
                            </form>
                        </div>
                    </div>

                    <!-- Nền mờ khi mở hộp thoại xoá -->
                    <div id="modal-overlay-delete" onclick="closeDeleteBox()" style="display: none;"></div>
                    <!-- Hộp thoại xác nhận xóa tài khoản -->
                    <div id="delete-account-box" style="display: none;" class="delete-modal">
                        <div class="modal-content">
                            <h3>Xác nhận xóa tài khoản</h3>
                            <p>Bạn có chắc chắn muốn xóa tài khoản này không? Thao tác này không thể hoàn tác.</p>
                            <form id="delete-account-form" method="POST" action="delete-user.php">
                                <input type="hidden" name="user_id" id="delete-user-id">
                                <div class="button-group">
                                    <button type="submit">Xóa</button>
                                    <button type="button" onclick="closeDeleteBox()">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Script -->
     <script src="../assets/js/admin.js"></script>
</body>
</html>