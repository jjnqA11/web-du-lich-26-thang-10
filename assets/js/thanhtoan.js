// JavaScript Validation
document.getElementById("bookingForm").addEventListener("submit", function (e) {
    let isValid = true;

    // Reset error messages
    document.querySelectorAll(".error").forEach(function (el) {
        el.textContent = "";
    });

    // Validate name
    const name = document.getElementById("name").value.trim();
    if (!name) {
        document.getElementById("error-name").textContent = "Vui lòng nhập họ và tên.";
        isValid = false;
    }

    // Validate gender
    const genderSelected = document.querySelector('input[name="sex"]:checked');
    if (!genderSelected) {
        document.getElementById("error-sex").textContent = "Vui lòng chọn giới tính.";
        isValid = false;
    }

    // Validate address
    const address = document.getElementById("address").value.trim();
    if (!address) {
        document.getElementById("error-address").textContent = "Vui lòng nhập địa chỉ.";
        isValid = false;
    }

    // Validate phone
    const phone = document.getElementById("phone").value.trim();
    if (!phone || phone.length < 10) {
        document.getElementById("error-phone").textContent = "Vui lòng nhập số điện thoại hợp lệ.";
        isValid = false;
    }

    // Validate email
    const email = document.getElementById("email").value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailRegex.test(email)) {
        document.getElementById("error-email").textContent = "Vui lòng nhập email hợp lệ.";
        isValid = false;
    }

    // Validate CMND
    const cmnd = document.getElementById("cmnd").value.trim();
    if (!cmnd || cmnd.length !== 12) {
        document.getElementById("error-cmnd").textContent = "Vui lòng nhập CMND gồm 12 chữ số.";
        isValid = false;
    }

    // Validate payment method
    const paymentMethod = document.querySelector('input[name="payment_method"]:checked');
    if (!paymentMethod) {
        document.getElementById("error-payment-method").textContent = "Vui lòng chọn hình thức thanh toán.";
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault(); // Ngăn gửi form nếu có lỗi
    }
});
