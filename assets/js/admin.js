// xu ly click hien thi box tao nguoi dung

let create_user_btn = document.getElementById('create_user_btn');

let create_user_box = document.getElementsByClassName('add-user-box')[0];

let create_user_close_btn = document.getElementsByClassName('close_btn')[0];

create_user_btn.addEventListener('click', () => {

    const computedStyle = window.getComputedStyle(create_user_box);

    const displayWindow = computedStyle.getPropertyValue('display'); 

    if(displayWindow == 'none'){
        create_user_box.style.display = 'block';
    }

})

create_user_close_btn.addEventListener('click', () => {
    const computedStyle = window.getComputedStyle(create_user_box);
    const displayWindow = computedStyle.getPropertyValue('display');
    if(displayWindow == 'block'){
        create_user_box.style.display = 'none';
    }
})
// mở box tạo user
function showRegisterBox() {
    document.getElementById("register-user-box").style.display = "block";
    document.getElementById("register-overlay").style.display = "block";
}
// đóng box tạo user
function hideRegisterBox() {
    document.getElementById("register-user-box").style.display = "none";
    document.getElementById("register-overlay").style.display = "none";
}

// Mở modal chỉnh sửa người dùng với thông tin người dùng
function showEditBox(id, username, email) {
    // Hiển thị modal và nền mờ
    document.getElementById("edit-user-box").style.display = "block";
    document.getElementById("modal-overlay").style.display = "block";

    // Điền thông tin vào form
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-username").value = username;
    document.getElementById("edit-email").value = email;
}

// Đóng modal chỉnh sửa người dùng
function hideEditBox() {
    document.getElementById("edit-user-box").style.display = "none";
    document.getElementById("modal-overlay").style.display = "none";
}

// Mở modal đặt lại mật khẩu
function showPasswordBox(userId) {
    // Hiển thị modal và nền mờ
    document.getElementById("reset-password-box").style.display = "block";
    document.getElementById("box-overlay").style.display = "block";

    // Điền ID người dùng vào form
    document.getElementById("user-id").value = userId;
}

// Đóng modal đặt lại mật khẩu
function closePasswordBox() {
    document.getElementById("reset-password-box").style.display = "none";
    document.getElementById("box-overlay").style.display = "none";
}

// Kiểm tra mật khẩu nhập lại có khớp không
function validatePasswords() {
    document.getElementById("reset-password-form").addEventListener("submit", function (event) {
        var newPassword = document.getElementById("new-password").value;
        var confirmPassword = document.getElementById("confirm-password").value;
    
        // Kiểm tra mật khẩu có khớp không
        if (newPassword !== confirmPassword) {
            event.preventDefault(); // Ngăn form gửi đi
            alert("Mật khẩu nhập lại không khớp! Vui lòng kiểm tra lại.");
        }
    });
}

function showDeleteBox(userId) {
    document.getElementById("delete-user-id").value = userId; // Gắn ID người dùng vào input ẩn
    document.getElementById("modal-overlay-delete").style.display = "block";
    document.getElementById("delete-account-box").style.display = "block";
}

// Đóng hộp thoại xác nhận xóa
function closeDeleteBox() {
    document.getElementById("modal-overlay-delete").style.display = "none";
    document.getElementById("delete-account-box").style.display = "none";
}
