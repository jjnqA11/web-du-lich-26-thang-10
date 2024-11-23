<?php
    // chen file db_connection.php
    include './connect-mysql/db_connection.php';

    // lay du lieu duoc gui ra tu form
    $email = $_POST['email'] ?? ''; // lay gia tri input co name = 'email'
    $password = $_POST['password'] ?? ''; // lay gia tri input co name = 'password'

    // toan tu ?? (Null Coalecsing Operator) toan tu ket hop null toan tu hoat dong nhu sau 
    /**
     * Neu gia tri $_POST['email'] ton tai khong phai null , thi $email nhan gia tri cua $_POST['email'] con neu gia tri
     * khong ton tai hoac bang null thi $email nhan gia tri ''
     */

     // kiem tra du lieu dau vao 
     if (!empty($email) && !empty($password)){
        // hien thi thong tin kiem tra 
        echo "Email" . htmlspecialchars($email) . "<br>";
        echo "Password" . htmlspecialchars($password) . "<br>";

        // htmlspecialchar() chuyen doi cac ki tu dac biet thanh cac ma html an toan tranh loi XSS . 
        // vidu "<" => "&lt" va ">" chuyen thanh "&gt"

        $loginSQL = "SELECT * FROM user WHERE email = ? AND password = ?";
        // $loginSQL => cau lenh sql kiem tra email va mat khau co khop voi ban ghi khong trong bang user hay khong 
        // ? : Placeholder dung de bao ve chong lai loi SQL Injection (Truy van khong an toan)


        // chuan bi cau lenh truy van
        $stmt = mysqli_prepare($conn, $loginSQL);
        // mysqli_prepare: chuan bi mot cau truy van sql . no tra ve mot doi tuong stmt (statement) hoac false neu that bai

        if(!$stmt){
            die("Loi chuan bi truy van: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        // ham mysqli_stmt_bind_param : gan gia tri vao cho placeholder (?) trong cau truy van 
        // "ss" xac dinh kieu du lieu cua cac gia tri (s la string).

        // thuc thi cau truy van 
        mysqli_stmt_execute($stmt);

        // lay ket qua
        $result = mysqli_stmt_get_result($stmt);
        // ham tren tra ve ket qua cua cau truy van duoi dang tap hop du lieu

        // kiem tra ket qua 
        if($result && mysqli_num_rows($result) > 0){
            echo "Dang nhap thanh cong";
        }else{
            // sai mat khau hoac email
            $error_message = "Sai mat khau hoac email!";
            header("Location: ../login.php?error=" . urlencode($error_message) . "&email=" . urlencode($email));
            exit();
        }

        // kiem tra mysqli_num_rows($result) dem so ban ghi tra ve 
        // neu ban ghi > 0 : nguoi dung nhap dung thong tin. neu khong : email hoac mat khau khong dung

        // dong cau lenh truy van 
        mysqli_stmt_close($stmt);
        // mysqli_stmt_close: Giải phóng tài nguyên liên quan đến đối tượng stmt.
     }else{
        $error_message = "Vui long nhap day du email va mat khau";
        header("../login.php?error=" . urlencode($error_message));
        exit();
     }

     // dong ket noi
     mysqli_close($conn);
     // mysqli_close: Đóng kết nối với MySQL, giải phóng tài nguyên.
?>