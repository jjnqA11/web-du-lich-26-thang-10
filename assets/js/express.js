// Ví dụ sử dụng Express.js
const express = require('express');
const app = express();

app.get('/api/checkCookie', (req, res) => {
    // Kiểm tra xem cookie có tồn tại không
    const userCookie = req.cookies.user; // Giả sử cookie có tên là 'user'
    
    if (userCookie) {
        res.json({ exists: true, message: 'Cookie tồn tại' });
    } else {
        res.json({ exists: false, message: 'Cookie không tồn tại' });
    }
});

// Khởi động server
app.listen(3000, () => {
    console.log('Server is running on port 3000');
});