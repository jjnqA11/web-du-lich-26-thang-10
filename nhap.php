<?php
// Kiểm tra cookie
if (isset($_COOKIE['user'])) {
    echo "Cookie 'user' tồn tại: " . htmlspecialchars($_COOKIE['user']);
} else {
    echo "Cookie 'user' không tồn tại.";
}
?>
<br>
<a href="logout.php">Đăng xuất</a>
<!-- Hiển thị lỗi nếu có -->
<?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>