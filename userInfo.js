document.addEventListener('DOMContentLoaded', () => {
    const themeButton = document.getElementById('themeButton');
    const body = document.body;

    // Load trạng thái sáng/tối từ localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
        body.classList.add('dark-mode');
    }

    // Toggle chế độ sáng/tối
    themeButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        localStorage.setItem('darkMode', body.classList.contains('dark-mode'));
    });
});
// Xác nhận trước khi xóa tài khoản
function confirmDelete() {
    return confirm("Bạn có chắc chắn muốn xóa tài khoản này không? Hành động này không thể hoàn tác.");
}
