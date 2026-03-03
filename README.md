📚 Library Web Management System

Hệ thống quản lý thư viện trực tuyến với 3 vai trò:

👤 Client – Tìm kiếm & mượn sách

📖 Librarian – Quản lý sách, xử lý mượn/trả

🛠️ Admin – Quản lý toàn hệ thống

🏗️ Công nghệ sử dụng
Frontend

Vue 3 + Vite

Vue Router

Bootstrap 5

Font Awesome

Backend

Laravel (RESTful API)

Sanctum Authentication

MySQL

Server

Nginx (Production)

📂 Cấu trúc dự án
library-web/
 ┣ front_end/   # Vue 3
 ┗ back_end/    # Laravel API
⚙️ Cài đặt
1️⃣ Clone project
git clone https://github.com/vannhat2005/library-web.git
cd library-web
2️⃣ Cài đặt Backend (Laravel)
cd back_end
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

Backend chạy tại:
http://127.0.0.1:8000

3️⃣ Cài đặt Frontend (Vue)
cd front_end
npm install
npm run dev

Frontend chạy tại:
http://localhost:5173
