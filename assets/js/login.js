// hàm ẩn hiển thị password trang register
function togglePassword() {

    const passwordInput = document.getElementById("password");

    const toggleIcon = document.getElementById("toggle-password");


    // Kiểm tra trạng thái và thay đổi kiểu input
    if (passwordInput.type === "password") {

        passwordInput.type = "text"; // chuyển đổi type input

        toggleIcon.classList.remove("fa-eye");

        toggleIcon.classList.add("fa-eye-slash"); // Đổi biểu tượng

    } else {
        passwordInput.type = "password";

        toggleIcon.classList.remove("fa-eye-slash");
        
        toggleIcon.classList.add("fa-eye");
    }
}