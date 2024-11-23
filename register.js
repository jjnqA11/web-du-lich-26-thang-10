document.getElementById("btn-submit").addEventListener("click", function (event) {
  // Ngăn chặn hành vi mặc định của nút submit
  event.preventDefault();

  // Lấy giá trị từ các ô nhập liệu
  const username = document.getElementById("username").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document.querySelectorAll("input[type='password']")[1].value.trim();

  // Xóa thông báo lỗi cũ nếu có
  document.querySelectorAll(".error-message").forEach(msg => msg.remove());

  let isValid = true;

  // Kiểm tra tên người dùng
  if (!username) {
      showError("username", "Thông tin chưa hợp lệ, vui lòng nhập lại.");
      isValid = false;
  }

  // Kiểm tra email
  if (!email || !validateEmail(email)) {
      showError("email", "Thông tin chưa hợp lệ, vui lòng nhập lại.");
      isValid = false;
  }

  // Kiểm tra mật khẩu
  if (!password) {
      showError("password", "Thông tin chưa hợp lệ, vui lòng nhập lại.");
      isValid = false;
  }

  // Kiểm tra mật khẩu nhập lại
  if (password !== confirmPassword) {
      showError("password", "Mật khẩu không khớp.");
      isValid = false;
  }

  // Kiểm tra checkbox
  const agreeTerm = document.querySelector("input[name='agree-term']");
  const newsletter = document.querySelector("input[name='newsletter']");
  if (!agreeTerm.checked && !newsletter.checked) {
      alert("Bạn cần đồng ý với điều khoản và nhận thông báo để đăng ký.");
      isValid = false;
  }

  // Hiển thị kết quả kiểm tra
  if (isValid) {
      // Chuyển hướng đến trang login.html nếu thông tin hợp lệ
      window.location.href = "login.html";
  } else {
      alert("Có lỗi trong thông tin, vui lòng kiểm tra lại.");
  }
});

// Hàm kiểm tra email hợp lệ
function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// Hàm hiển thị thông báo lỗi
function showError(inputId, message) {
  const inputElement = document.getElementById(inputId);
  const errorMessage = document.createElement("div");
  errorMessage.className = "error-message";  // Thêm class để dễ dàng quản lý lỗi
  errorMessage.style.color = "red";          // Đổi màu chữ thành đỏ
  errorMessage.style.fontSize = "small";     // Tùy chỉnh kích thước chữ
  errorMessage.textContent = message;        // Thiết lập thông điệp lỗi
  inputElement.parentNode.appendChild(errorMessage);  // Thêm thông báo lỗi vào phần tử input
}

// Hàm kiểm tra trạng thái checkbox
function checkCheckboxes() {
  const agreeTerm = document.querySelector("input[name='agree-term']");
  const submitButton = document.getElementById("btn-submit");

  // Nếu cả hai checkbox đều không được chọn, làm mờ nút đăng ký
  if (!agreeTerm.checked ) {
      submitButton.disabled = true; // Làm mờ nút
      submitButton.style.opacity = 0.5; // Thay đổi độ mờ
  } else {
      submitButton.disabled = false; // Kích hoạt nút
      submitButton.style.opacity = 1; // Đặt lại độ mờ
  }
}

// Thêm sự kiện change cho các checkbox
document.querySelector("input[name='agree-term']").addEventListener("change", checkCheckboxes);
document.querySelector("input[name='newsletter']").addEventListener("change", checkCheckboxes);

// Gọi hàm kiểm tra checkbox khi trang được tải
checkCheckboxes();

//xem mật khẩu
function togglePassword() {
  const passwordInput = document.getElementById("password");
  const toggleIcon = document.getElementById("toggle-password");

  // Kiểm tra trạng thái và thay đổi kiểu input
  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      toggleIcon.classList.remove("fa-eye");
      toggleIcon.classList.add("fa-eye-slash"); // Đổi biểu tượng
  } else {
      passwordInput.type = "password";
      toggleIcon.classList.remove("fa-eye-slash");
      toggleIcon.classList.add("fa-eye");
  }
}