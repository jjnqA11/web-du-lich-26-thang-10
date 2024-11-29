function checkCookie() {
    fetch('/api/checkCookie', {
        method: 'GET',
        credentials: 'include' // Đảm bảo cookie được gửi cùng yêu cầu
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.exists) {
            console.log('Cookie tồn tại:', data.message);
        } else {
            console.log('Cookie không tồn tại:', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// Gọi hàm kiểm tra cookie
checkCookie();