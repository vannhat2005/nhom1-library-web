# 📚 Library Web Management System

Dự án **Library Web** là hệ thống quản lý thư viện trực tuyến gồm các chức năng dành cho:

- 👤 Người dùng (Client)
- 📖 Thủ thư (Librarian)
- 🛠️ Quản trị viên (Admin)

---

## 🚀 Công nghệ sử dụng

- **Vue 3**
- **Vite**
- **Vue Router**
- **Bootstrap 5**
- **Font Awesome Icons**

---

## 📂 Cấu trúc thư mục chính

```bash
front_end/
 ┣ src/
 ┃ ┣ components/
 ┃ ┃ ┣ Auth/        # Đăng nhập
 ┃ ┃ ┣ Client/      # Giao diện người dùng
 ┃ ┃ ┣ Librarian/   # Giao diện thủ thư
 ┃ ┃ ┣ Admin/       # Giao diện admin
 ┃ ┣ layout/
 ┃ ┃ ┣ wrapper/     # Layout chung (client/admin/librarian)
 ┃ ┣ router/
 ┃ ┃ ┗ index.js     # Định tuyến hệ thống
 ┃ ┣ services/      # API services
 ┃ ┣ App.vue
 ┃ ┗ main.js
## Cài đặt dự án
1. Clone repository
git clone https://github.com/vannhat2005/library-web.git
cd library-web/front_end
2. Cài đặt package
npm install
3. Chạy dự án
npm run dev
4. Sau đó mở trình duyệt:
http://localhost:5173
