document.addEventListener('DOMContentLoaded', () => { 
    // sự kiện được kích hoạt khi DOM của trang được tải và phân tích hoàn toàn, nhưng không đợi các tài nguyên khác như ảnh v.v
    const themeIcon = document.getElementById('theme-icon'); // Đổi `themeButton` thành `themeIcon` cho chính xác
    const body = document.body;

    // Load trạng thái sáng/tối từ localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
        body.classList.add('dark-mode');
        themeIcon.src = 'images/moon-icon.png'; // Icon chế độ tối
    } else {
        themeIcon.src = 'images/sun-icon.png'; // Icon chế độ sáng
    }

    // Toggle chế độ sáng/tối
    themeIcon.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        const isDark = body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDark); // Lưu trạng thái vào localStorage

        // Cập nhật icon
        themeIcon.src = isDark ? 'images/moon-icon.png' : 'images/sun-icon.png';
    });
});

// Xác nhận trước khi xóa tài khoản
function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa tài khoản này không? Hành động này không thể hoàn tác.");
}
