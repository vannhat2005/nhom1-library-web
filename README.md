# 📚 Library Web Management System

Hệ thống quản lý thư viện trực tuyến với 3 vai trò:
- 👤 Client: Tìm kiếm & mượn sách
- 📖 Librarian: Quản lý sách, xử lý mượn/trả
- 🛠️ Admin: Quản lý toàn hệ thống

## 🚀 Tech Stack
**Frontend:** Vue 3, Vite, Vue Router, Bootstrap 5, Font Awesome  
**Backend:** Laravel (RESTful API), Sanctum  
**Database:** MySQL  
**Server:** Nginx (Production)

## 📂 Project Structure
library-web/

├─ front_end/ # Vue 3 + Vite

└─ back_end/ # Laravel API
## ⚙️ Installation

### 1) Clone repository
```bash
git clone https://github.com/vannhat2005/cs434b-nhom1-library-web.git
cd library-web

** Setup Backend (Laravel)
cd back_end
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

Backend: http://127.0.0.1:8000

** Setup Frontend (Vue)
cd ../front_end
npm install
npm run dev

Frontend: http://localhost:5173
