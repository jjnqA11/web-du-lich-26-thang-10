document.getElementById("btn-submit").addEventListener("click", function (event) {
  // Ngăn chặn hành vi mặc định của nút submit
  event.preventDefault();

  // Lấy giá trị từ các ô nhập liệu
  const username = document.getElementById("username").value.trim(); // loại bỏ 2 đầu input id username
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document.querySelectorAll("input[type='password']")[1].value.trim(); // loại bỏ 2 đầu input type password thứ 2

  // Xóa thông báo lỗi cũ nếu có
  document.querySelectorAll(".error-message").forEach(msg => msg.remove()); // xóa bỏ các phần tử trong mảng class "error-message"

  let isValid = true;

  // Kiểm tra tên người dùng
  if (!username) { // nếu username để trống hiển thị 
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
      window.location.href = "login.php";
  } else {
      alert("Có lỗi trong thông tin, vui lòng kiểm tra lại.");
  }
});

// Hàm kiểm tra email hợp lệ
function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // xác thực email
    /**
    * ^: Bắt đầu từ đầu chuỗi.
    * [^\s@]+: Phần này sẽ khớp với một hoặc nhiều ký tự không phải là dấu cách (\s) và dấu @. Đây là phần tên người dùng của địa chỉ email, ví dụ: example trong example@domain.com.

    * [^\s@]: Định nghĩa một ký tự không phải dấu cách (\s) và không phải dấu @.
    * +: Một hoặc nhiều ký tự.
    * @: Chữ cái @ phải có mặt giữa phần tên người dùng và tên miền.

    * [^\s@]+: Phần này sẽ khớp với một hoặc nhiều ký tự không phải là dấu cách (\s) và dấu @, ví dụ: domain trong example@domain.com. Đây là phần tên miền của địa chỉ email.

    * \.: Một dấu chấm (.), phân tách giữa tên miền và phần mở rộng tên miền (ví dụ: .com, .org).

    * Dấu chấm cần phải được thoát ra (\.) vì trong biểu thức chính quy, dấu chấm có nghĩa là "bất kỳ ký tự nào", nên phải thoát nó lại để dùng đúng nghĩa là dấu chấm.
    * [^\s@]+: Phần này khớp với một hoặc nhiều ký tự không phải dấu cách và dấu @. Đây là phần mở rộng của tên miền (ví dụ: com trong example@domain.com).

    * $: Kết thúc chuỗi.

    */
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

  // Nếu checkbox agreeTerm không được chọn, làm mờ nút đăng ký
  if (!agreeTerm.checked ) {
      
    submitButton.style.opacity = 0.5; // Thay đổi độ mờ , phần tử mờ đi 50%
    submitButton.style.pointerEvents = "none"; // ngắn chặn tất cả các hành động click, hover trên phần tử button
  } else {

    submitButton.style.opacity = 1; // hiển thị phần tử không bị trong suốt

  }
}

// Thêm sự kiện change cho các checkbox
document.querySelector("input[name='agree-term']").addEventListener("change", checkCheckboxes); // thay đổi nếu có sự kiện 

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