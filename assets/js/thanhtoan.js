document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("bookingForm");

    // Hàm kiểm tra thông tin
    function validateForm() {
        let isValid = true;

        // Reset các thông báo lỗi
        document.querySelectorAll(".error").forEach(el => el.textContent = "");

        // Kiểm tra họ và tên
        const name = document.getElementById("name").value.trim();
        if (name === "") {
            document.getElementById("error-name").textContent = "Vui lòng nhập họ và tên.";
            isValid = false;
        }

        // Kiểm tra giới tính
        const gender = document.querySelector('input[name="sex"]:checked');
        if (!gender) {
            document.getElementById("error-sex").textContent = "Vui lòng chọn giới tính.";
            isValid = false;
        }

        // Kiểm tra địa chỉ
        const address = document.getElementById("adress").value.trim();
        if (address === "") {
            document.getElementById("error-address").textContent = "Vui lòng nhập địa chỉ.";
            isValid = false;
        }

        // Kiểm tra số điện thoại
        const phone = document.getElementById("phone").value.trim();
        if (phone === "" || phone.length < 10 || isNaN(phone)) {
            document.getElementById("error-phone").textContent = "Vui lòng nhập số điện thoại hợp lệ.";
            isValid = false;
        }

        // Kiểm tra email
        const email = document.getElementById("email").value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === "" || !emailRegex.test(email)) {
            document.getElementById("error-email").textContent = "Vui lòng nhập email hợp lệ.";
            isValid = false;
        }

        // Kiểm tra CMND
        const cmnd = document.getElementById("cmnd").value.trim();
        if (cmnd === "" || cmnd.length !== 12 || isNaN(cmnd)) {
            document.getElementById("error-cmnd").textContent = "Vui lòng nhập CMND gồm 12 chữ số.";
            isValid = false;
        }

        // Kiểm tra hình thức thanh toán
        const paymentMethod = document.querySelector('input[name="fav_language"]:checked');
        if (!paymentMethod) {
            document.getElementById("error-payment-method").textContent = "Vui lòng chọn hình thức thanh toán.";
            isValid = false;
        }

        return isValid; // Trả về trạng thái hợp lệ
    }

    // Lắng nghe sự kiện "submit"
    form.addEventListener("submit", function (e) {
        const isValid = validateForm();
        if (!isValid) {
            e.preventDefault(); // Ngăn form gửi nếu không hợp lệ
        }
    });

    // Xóa lỗi khi người dùng bắt đầu nhập đúng
    form.addEventListener("input", function (e) {
        const target = e.target;

        if (target.id === "name" && target.value.trim() !== "") {
            document.getElementById("error-name").textContent = "";
        } else if (target.name === "sex") {
            document.getElementById("error-sex").textContent = "";
        } else if (target.id === "adress" && target.value.trim() !== "") {
            document.getElementById("error-address").textContent = "";
        } else if (target.id === "phone" && target.value.trim().length >= 10) {
            document.getElementById("error-phone").textContent = "";
        } else if (target.id === "email" && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(target.value.trim())) {
            document.getElementById("error-email").textContent = "";
        } else if (target.id === "cmnd" && target.value.trim().length === 12) {
            document.getElementById("error-cmnd").textContent = "";
        } else if (target.name === "fav_language") {
            document.getElementById("error-payment-method").textContent = "";
        }
    });
});
