# 🏫 Student Management System

Hệ thống quản lý sinh viên đơn giản sử dụng **Laravel** và **Tailwind CSS**, hỗ trợ quản lý thông tin sinh viên, điểm số và môn học một cách trực quan.

## 🚀 Tính năng chính

- 🧑‍🎓 **Quản lý sinh viên:** Tạo, sửa, xóa thông tin sinh viên.
- 📊 **Quản lý điểm:** Thêm, sửa, xóa điểm số của sinh viên theo môn học.
- 📚 **Quản lý môn học:** Xem danh sách các môn học.
- 🎨 **Giao diện trực quan:** Hiển thị danh sách sinh viên và điểm số với màu sắc phân biệt.
- 🔍 **Tìm kiếm & Lọc:** Hỗ trợ tìm kiếm sinh viên theo tên và lọc theo lớp.
- 🔒 **Xác thực người dùng:** Sử dụng Laravel Breeze để xử lý đăng nhập & đăng ký.
---
## 🛠️ Cài đặt

### 1️⃣ Yêu cầu hệ thống

- PHP `>= 8.1`
- Composer
- Node.js & npm
- MySQL hoặc SQLite

### 2️⃣ Clone repository
```sh
git https://github.com/Hieuab1308/student-management.git
cd student-management
```
### 3️⃣ Cài đặt dependencies
```sh
composer install
npm install
```
### 4️⃣ Cấu hình môi trường
```sh
cp .env.example .env
php artisan key:generate
```
### Cập nhật thông tin kết nối database trong .env
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
### 5️⃣ Chạy migration & seed dữ liệu
```sh
php artisan migrate --seed
```
### 6️⃣ Build frontend & khởi chạy server
```sh
npm run build
npm run dev
php artisan serve
```
Mở trình duyệt và truy cập: http://127.0.0.1:8000

---
# 🎨 Hướng dẫn sử dụng

### 1. Đăng nhập
- Đăng ký tài khoản nếu chưa có.
- Đăng nhập để bắt đầu sử dụng hệ thống.

### 2. Trang chủ

- Hiển thị danh sách sinh viên cùng với điểm số và môn học.

### 3. Quản lý sinh viên

- Nhấn "Thêm sinh viên" để tạo sinh viên mới.
- Nhấn "Sửa" để chỉnh sửa thông tin sinh viên.
- Nhấn "Xóa" để xóa sinh viên.

### 4. Quản lý điểm

- Nhấn "Thêm điểm" để thêm điểm cho sinh viên.
- Nhấn "Sửa" để chỉnh sửa điểm.
- Nhấn "Xóa" để xóa điểm.

### 5. Tìm kiếm & Lọc

- Sử dụng thanh tìm kiếm để tìm sinh viên theo tên.
- Lọc sinh viên theo lớp.

---
# ⚙️ Cấu trúc thư mục chính
```sh
💚 student-management
🗂️ app/Http/Controllers      # Controllers xử lý logic
🗂️ app/Models                # Mô hình dữ liệu (Eloquent)
🗂️ database/migrations       # Các file migration database
🗂️ resources/views           # Blade templates
🗂️ public                    # Assets (CSS, JS, images)
🗂️ routes                    # Định tuyến Laravel
🗂️ resources/js              # Mã nguồn frontend (Vue/Tailwind)
📂 .env                      # Cấu hình môi trường
```

