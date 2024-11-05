function toggleTheme() {
    // Chuyển đổi giữa chế độ sáng và tối bằng cách thay đổi class "dark-theme"
    document.body.classList.toggle('dark-theme');

    // Đổi nội dung nút dựa trên chế độ hiện tại
    const btn = document.querySelector('.theme-toggle-btn');
    if (document.body.classList.contains('dark-theme')) {
        btn.textContent = 'Giao diện: Sáng';
    } else {
        btn.textContent = 'Giao diện: Tối';
    }
}