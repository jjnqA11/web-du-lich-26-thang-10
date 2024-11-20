function toggleTheme() {
    // Chuyển đổi giữa chế độ sáng và tối bằng cách thay đổi class "dark-theme"
    document.body.classList.toggle('dark-theme');

    // Đổi nội dung nút dựa trên chế độ hiện tại
    const btn = document.querySelector('.theme-toggle-btn');
    if (document.body.classList.contains('dark-theme')) { //lấy giữa chế độ sáng và tối
        btn.textContent = 'Sáng';
    } else {
        btn.textContent = 'Tối';
    }
}
// Load the infobox HTML into the main page
window.onload = function() {
    fetch('infoBox.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('infobox-container').innerHTML = data;
            
            // Add the close button functionality
            document.getElementById('closeInfoBox').addEventListener('click', function() {
                document.getElementById('infoBox').classList.add('hidden');
                document.getElementById('infoBox').classList.remove('show');
            });
        });
};

function details(title, info) {
    document.getElementById('infoTitle').textContent = title;
    document.getElementById('infoText').textContent = info;
    document.getElementById('infoBox').classList.add('show');
    document.getElementById('infoBox').classList.remove('hidden');
}
