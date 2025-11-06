# manguonmo






<h2 align="center">
<a href="https://dainam.edu.vn/vi/khoa-cong-nghe-thong-tin">
🎓 Faculty of Information Technology (DaiNam University)
</a>
</h2>
<h2 align="center">
Youth Union Member Management
</h2>
<div align="center">
<p align="center">
   <img src="https://github.com/user-attachments/assets/227d7fe3-e187-4c5e-a1e4-afdcf5830162" alt="AIoTLab Logo" width="170"/>
   <img src="https://github.com/user-attachments/assets/c44f525f-19b0-4368-9449-ec63a6a8f18c" alt="FIT DNU Logo" width="180"/>
   <img src="https://github.com/user-attachments/assets/f9ca218f-c891-4b64-9a00-1450021beaa8" alt="DaiNam University Logo" width="200"/>
</p>

[![AIoTLab](https://img.shields.io/badge/AIoTLab-green?style=for-the-badge)](https://www.facebook.com/DNUAIoTLab)
[![Faculty of Information Technology](https://img.shields.io/badge/Faculty%20of%20Information%20Technology-blue?style=for-the-badge)](https://dainam.edu.vn/vi/khoa-cong-nghe-thong-tin)
[![DaiNam University](https://img.shields.io/badge/DaiNam%20University-orange?style=for-the-badge)](https://dainam.edu.vn)

</div>

## 📖 1. Giới thiệu
Hệ thống Quản lý Thư viện trong trường Đại học được xây dựng nhằm hỗ trợ công tác quản lý, theo dõi và đánh giá các nghiệp vụ thư viện như mượn, trả, và kiểm kê tài liệu trong môi trường giáo dục đại học. Thay vì quản lý thủ công bằng giấy tờ hay các tệp Excel rời rạc, hệ thống mang đến một giải pháp tập trung, hiện đại và dễ sử dụng, giúp nâng cao hiệu quả phục vụ bạn đọc và bảo trì kho sách.

## 🔧 2. Các công nghệ được sử dụng
<div align="center">

### Hệ điều hành
![macOS](https://img.shields.io/badge/macOS-000000?style=for-the-badge&logo=macos&logoColor=F0F0F0)
[![Windows](https://img.shields.io/badge/Windows-0078D6?style=for-the-badge&logo=windows&logoColor=white)](https://www.microsoft.com/en-us/windows/)
[![Ubuntu](https://img.shields.io/badge/Ubuntu-E95420?style=for-the-badge&logo=ubuntu&logoColor=white)](https://ubuntu.com/)

### Công nghệ chính
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](#)
[![CSS](https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white)](#)
[![SCSS](https://img.shields.io/badge/SCSS-CC6699?style=for-the-badge&logo=sass&logoColor=white)](#)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](#)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)

### Web Server & Database
[![Apache](https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=apache&logoColor=white)](https://httpd.apache.org/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/) 
[![XAMPP](https://img.shields.io/badge/XAMPP-FB7A24?style=for-the-badge&logo=xampp&logoColor=white)](https://www.apachefriends.org/)

### Database Management Tools
[![MySQL Workbench](https://img.shields.io/badge/MySQL_Workbench-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://dev.mysql.com/downloads/workbench/)
</div>

## 🚀 3. Hình ảnh các chức năng

### Trang đăng nhập
<img width="1919" height="1022" alt="image" src="https://github.com/user-attachments/assets/d2272b87-bde4-4a66-840c-fa92e0d057d4" />

### Trang chủ admin
<img width="1916" height="950" alt="image" src="https://github.com/user-attachments/assets/c823dd7c-5e15-48dd-a9e1-30c97b58f1cf" />

### Trang quản lý nhân viên
<img width="1907" height="1017" alt="image" src="https://github.com/user-attachments/assets/cacfb7ba-bd28-4fb9-b984-b838bde1308e" />

### Trang quản lý vé máy bay 
<img width="1912" height="1020" alt="image" src="https://github.com/user-attachments/assets/bec20bdb-4fe4-4017-96e1-efa9e9327fea" />


---

## ⚙️ 4. Cài đặt
### 4.1. Cài đặt công cụ, môi trường và các thư viện cần thiết

- Tải và cài đặt **XAMPP**  
👉 https://www.apachefriends.org/download.html  
(Khuyến nghị bản XAMPP với PHP 8.x)

- Cài đặt **Visual Studio Code** và các extension:
- PHP Intelephense  
- MySQL  
- Prettier – Code Formatter  
### 4.2. Tải project
Clone project về thư mục `htdocs` của XAMPP (ví dụ ổ C):

```bash
cd C:\xampp\htdocs
https://github.com/tyanzuq2811/BTL_Quan_ly_doan_vien.git
https://github.com/DangQuocKhanh1714/BTL_Quan_Ly_Thu_Vien.git
Truy cập project qua đường dẫn:
👉 http://localhost/authentication_login.
👉 http://localhost/login.php
```
### 4.3. Setup database
Mở XAMPP Control Panel, Start Apache và MySQL

Truy cập MySQL WorkBench
Tạo database:
```bash
CREATE DATABASE IF NOT EXISTS quan_ly_doan_vien
CREATE DATABASE IF NOT EXISTS qltvnhom3
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

### 4.4. Setup tham số kết nối
Mở file config.php (hoặc .env) trong project, chỉnh thông tin DB:
```bash

<?php

function getDbConnection() {
$servername = "localhost";
$username = "root";
$password = "";
        $dbname = "quan_ly_doan_vien";
        $dbname = "qltvnhom3";
$port = 3306;

        // Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

        // Kiểm tra kết nối
if (!$conn) {
die("Kết nối database thất bại: " . mysqli_connect_error());
}
        // Thiết lập charset cho kết nối (quan trọng để hiển thị tiếng Việt đúng)
mysqli_set_charset($conn, "utf8");
return $conn;
}
?>

    ?>
```
### 4.5. Chạy hệ thống
Mở XAMPP Control Panel → Start Apache và MySQL

Truy cập hệ thống:
👉 http://localhost/index.php

### 4.6. Đăng nhập lần đầu
Hệ thống có thể cấp tài khoản admin 
Hệ thống cung cấp tài khoản quản trị viên (Admin) mặc định cho người phụ trách thư viện.

Sau khi đăng nhập, Quản trị viên có thể:

Sau khi đăng nhập Admin có thể:
Quản lý Thể loại/Danh mục sách: Tạo, sửa, và xóa các danh mục sách (ví dụ: Khoa học, Văn học, Công nghệ thông tin).

Tạo thông tin tổ chức đoàn (Đoàn trường, Liên chi, Chi đoàn)
Thêm và quản lý Đầu sách: Nhập thông tin chi tiết về sách (tên, tác giả, số lượng tồn kho) vào hệ thống.

Thêm đoàn viên và cấp tài khoản
Thêm Sinh viên/Người dùng: Thêm thông tin sinh viên (Mã sinh viên, Họ tên) và cấp tài khoản truy cập vào hệ thống (nếu có chức năng đăng nhập riêng cho sinh viên).

Quản lý phân quyền theo cấp
Quản lý phân quyền người dùng: Thiết lập phân quyền truy cập cho các vai trò khác nhau (ví dụ: Admin Thư viện, Thủ thư, Sinh viên).
   
