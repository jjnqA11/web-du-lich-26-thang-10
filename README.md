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

#### Phân chia công việc  

1. **Nguyễn Vũ Hoàng**:  
   - Chịu trách nhiệm xử lý giao diện bằng **HTML**, **CSS**.  
2. **Nguyễn Quang Diệp**:  
   - Phụ trách phần backend với **PHP**, **MySQL** và **JavaScript thô** bao gồm phát triển các chức năng xử lý dữ liệu.  
3. **Nguyễn Đình Khánh**:  
   - Tập trung vào sửa lỗi (fix bug) liên quan đến các chức năng web.  
   - Tối ưu và chỉnh sửa bố cục các trang để đảm bảo tính thẩm mỹ và trải nghiệm người dùng.  

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

9. **Chức năng bình luận**:  
   - Đã bị loại bỏ do không nằm trong phạm vi yêu cầu của bài tập lớn.  

10. **Các tính năng bổ sung**:  
    - Một số chức năng khác sẽ được phát triển thêm trong các phiên bản tiếp theo.  

---

#### Hướng dẫn cài đặt và sử dụng  

1. **Cài đặt cơ sở dữ liệu**:  
   - Mở **phpMyAdmin** trong **XAMPP**.  
   - Nhập tệp `khamphadisan.sql` vào để khởi tạo cơ sở dữ liệu.  

2. **Sử dụng ứng dụng**:  
   - Sau khi nhập dữ liệu thành công, bạn có thể tạo tài khoản và đăng nhập để sử dụng các tính năng của ứng dụng.  

3. **Quản lý web**:  
   - Đăng nhập với tài khoản admin.  
   - Truy cập vào đường dẫn:  
     ```
     http://localhost/dulich/admin/admin.php
     ```  
     để thực hiện các thao tác quản lý tài khoản.  

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