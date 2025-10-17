### README: Dự án Web Du Lịch  

#### Giới thiệu  
Dự án này là bài tập lớn trong khuôn khổ môn học phát triển web, tập trung xây dựng một ứng dụng web du lịch cơ bản. Mục tiêu chính là cung cấp một nền tảng để quản lý tài khoản, hỗ trợ tìm kiếm và tối ưu trải nghiệm người dùng.  

Dự án được triển khai bằng **XAMPP**, tích hợp các công cụ cần thiết như PHP và MySQL để xây dựng ứng dụng web. Lưu ý, để đảm bảo tính ổn định và tương thích, vui lòng không tự ý chỉnh sửa port PHP hoặc cấu hình cơ bản.  

---

#### Ý tưởng  
Dự án được lấy cảm hứng từ nhu cầu thực tế của người dùng khi tìm kiếm thông tin du lịch trên các nền tảng trực tuyến. Ý tưởng chính:  

- Xây dựng một website đơn giản và dễ sử dụng, giúp người dùng nhanh chóng tìm kiếm các điểm đến du lịch và lập kế hoạch.  
- Hỗ trợ đăng ký tài khoản để cá nhân hóa trải nghiệm, quản lý lịch trình hoặc thông tin cá nhân.  
- Tích hợp thanh toán trực tuyến cho các dịch vụ du lịch.  
- Đem lại trải nghiệm giao diện sáng tối hiện đại, phù hợp với mọi hoàn cảnh sử dụng (ban ngày hoặc ban đêm).  

Mặc dù không phải là một sản phẩm thương mại hoàn chỉnh, dự án này là bước đầu trong việc nghiên cứu và phát triển một nền tảng web hướng đến người dùng.  

---

#### Các thành viên trong nhóm  

1. **Nguyễn Vũ Hoàng**: Quản lý viết html và css thô và phát triển giao diện sáng tối, hỗ trợ thiết kế giao diện đăng ký/đăng nhập

2. **Nguyễn Quang Diệp**:  Quản lý database và thiết kế giao diện và chức năng đăng ký / đăng nhập, phát triển các chức năng sử dụng js

3. **Nguyễn Đình Khánh - TRƯỞNG NHÓM**:  Phát triển và quản lý CRUD và chỉnh sửa bố cục các trang, khắc phục một số lỗi liên quan đến 1 vài chức năng 
   
---

#### Các chức năng chính  

Ứng dụng cung cấp các tính năng sau:  

1. **Tạo tài khoản**:  
   - Người dùng có thể đăng ký tài khoản mới. *(Đã hoàn thành)*  

2. **Đăng nhập**:  
   - Sử dụng tài khoản đã đăng ký để truy cập ứng dụng. *(Đã hoàn thành)*  

3. **Quản lý tài khoản**:  
   - Admin có thể xem, chỉnh sửa hoặc xóa tài khoản người dùng. *(Đã hoàn thành)*  

4. **Lấy lại mật khẩu**:  
   - Liên hệ với Quản trị viên để yêu cầu lấy lại mật khẩu.  

5. **Tìm kiếm**:  
   - Người dùng có thể tìm kiếm thông tin liên quan trên trang web. *(Đã hoàn thành)*  

6. **Lọc kết quả tìm kiếm**:  
   - Chức năng này không được triển khai vì độ phức tạp trong việc xử lý dữ liệu. 

7. **Thanh toán**:  
   - Tính năng thanh toán được tích hợp để người dùng thực hiện giao dịch trực tuyến. *(Đã hoàn thành)*  

8. **Chế độ sáng/tối**:  
   - Giao diện hỗ trợ chế độ sáng và tối, giúp cải thiện trải nghiệm người dùng. *(Đã hoàn thành)*  

9. **Các tính năng bổ sung**:  
    - Một số chức năng khác sẽ được phát triển thêm trong các phiên bản tiếp theo.  

---

# 🌍 Hướng Dẫn Cài Đặt & Sử Dụng Dự Án Du Lịch

## ⚙️ 1. Đặt Dự Án Vào Thư Mục XAMPP

1. Sau khi tải xong thì tìm đến thư mục htdocs của xampp rồi dán dự án vào đấy nhé. 

   ```bash
   C:\xampp\htdocs\
   ```
2. Ví dụ, nếu tên thư mục dự án là `dulich`, đường dẫn đầy đủ sẽ là:

   ```bash
   C:\xampp\htdocs\dulich
   ```

---

## 🗄️ 2. Cài Đặt Cơ Sở Dữ Liệu

1. Mở **XAMPP Control Panel** → bật **Apache** và **MySQL**.
2. Truy cập **phpMyAdmin** tại địa chỉ:

   ```
   http://localhost/phpmyadmin
   ```
3. Tạo một **database mới**, ví dụ: `khamphadisan`.
4. Nhập tệp SQL đi kèm trong dự án (`khamphadisan.sql`) để khởi tạo dữ liệu:

   * Vào tab **Import** → chọn file `khamphadisan.sql` → **Go**.

---

## 🧭 3. Sử Dụng Ứng Dụng

* Sau khi import cơ sở dữ liệu thành công, mở trình duyệt và truy cập:

  ```
  http://localhost/dulich
  ```
* Tại đây, bạn có thể **tạo tài khoản mới** và **đăng nhập** để trải nghiệm các tính năng của hệ thống.

---

## 🧑‍💻 4. Quản Lý Trang Web (Admin)

* Đăng nhập với tài khoản **Admin**.
* Truy cập trang quản trị qua đường dẫn:

  ```
  http://localhost/dulich/admin/admin.php
  ```
* Tại đây bạn có thể:

  * Quản lý tài khoản người dùng
  * Cập nhật nội dung trang web
  * Kiểm soát hoạt động của hệ thống

---

## 💡 Gợi Ý

* Nếu truy cập bị lỗi, hãy đảm bảo rằng:

  * Apache và MySQL đang chạy trong **XAMPP**
  * Tên thư mục và đường dẫn trùng khớp với dự án (`dulich`)
  * File `khamphadisan.sql` đã được import thành công

---

#### Lưu ý  

- Nếu gặp bất kỳ lỗi nào trong quá trình sử dụng, vui lòng liên hệ nhóm phát triển để được hỗ trợ kịp thời.  
- Tuyệt đối không chỉnh sửa port hoặc cấu hình của PHP mà không thông báo trước.  

---

#### Tài liệu tham khảo  
- **XAMPP Documentation**: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)  
- **PHP Documentation**: [https://www.php.net/docs.php](https://www.php.net/docs.php)  
- **MySQL Documentation**: [https://dev.mysql.com/doc/](https://dev.mysql.com/doc/)  

---

Cảm ơn bạn đã quan tâm và sử dụng dự án này!  
Nhóm phát triển luôn mong muốn cải thiện và nhận phản hồi để nâng cao chất lượng sản phẩm.  
