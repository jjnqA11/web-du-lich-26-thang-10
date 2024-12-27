function toggleTheme(event) {
  event.preventDefault(); // Ngăn hành vi mặc định của thẻ <a>

  const body = document.body;

  const themeIcon = document.getElementById("theme-icon");

  // Kiểm tra và chuyển đổi class "dark-theme" và "light-theme"
  if (body.classList.contains("dark-theme")) {
    body.classList.remove("dark-theme");

    body.classList.add("light-theme");

    themeIcon.src = "../images/sun-icon.png";

    localStorage.setItem("theme", "light"); // Lưu trạng thái light
  } else {
    body.classList.remove("light-theme");

    body.classList.add("dark-theme");

    themeIcon.src = "../images/moon-icon.png";

    localStorage.setItem("theme", "dark"); // Lưu trạng thái dark
  }
}

// Hàm kiểm tra trạng thái theme khi tải trang
function loadTheme() {
  const body = document.body;
  const themeIcon = document.getElementById("theme-icon");

  // Lấy trạng thái theme từ localStorage
  const savedTheme = localStorage.getItem("theme");

  // Áp dụng trạng thái theme đã lưu
  if (savedTheme === "dark") {
    body.classList.add("dark-theme");
    themeIcon.src = "../images/moon-icon.png"; // Icon giao diện tối
  } else {
    body.classList.add("light-theme");
    themeIcon.src = "../images/sun-icon.png"; // Icon giao diện sáng
  }
}

// Đợi DOM tải xong rồi gọi hàm loadTheme
document.addEventListener("DOMContentLoaded", loadTheme);

// xử lý click vào box hiện ra title box
function toggleDropdown() {
  const dropdown = document.getElementById("userDropdown");
  dropdown.classList.toggle("show");
}

// đóng dropdown khi click ra ngoài thẻ class user-info
document.addEventListener("click", (e) => {
  const dropdown = document.getElementById("userDropdown");

  const userInfo = document.querySelector(".user-info");

  if (!userInfo.contains(e.target)) {
    dropdown.classList.remove("show");
  }
});
