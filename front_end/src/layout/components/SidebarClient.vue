<template>
    <div class="sidebar"> <!-- Logo -->
        <div class="logo">
            <div class="logo-icon"> <i class="fa-solid fa-book-open"></i> </div>
            <div>
                <h2 class="mt-1">Quản lý Thư viện</h2>
                <p>Khám phá</p>
            </div>
        </div> <!-- Menu -->
        <ul class="menu">
            <li> <router-link to="/" class="menu-item"> <i class="fa-solid fa-home"></i> Trang chủ
                </router-link> </li>
            <li> <router-link to="/client/tim-kiem" class="menu-item"> <i class="fa fa-search"></i> Tìm kiếm
                </router-link> </li>
            <li> <router-link to="/client/lich-su-muon" class="menu-item"> <i class="fa-solid fa-clock-rotate-left"></i>
                    Xem lịch sử đang mượn </router-link> </li>
        </ul> <!-- Logout -->
        <!-- ✅ User Info thêm trước logout -->
        <div class="user-box">
            <div class="user-avatar">
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="user-text">
                <p class="user-name">Nguyễn Văn A</p>
                <p class="user-email">khactuong@email.com</p>
            </div>
            <div class="user-exit">
                <router-link to="/login" class="logout-btn" @click="logout">
                    <i class="fa-solid fa-sign-out-alt"></i>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

const API_BASE = "http://127.0.0.1:8000";

export default {
  data() {
    return {
      user: {},
    };
  },

  mounted() {
    this.user = JSON.parse(localStorage.getItem("user") || "{}");
  },

  methods: {
    async logout() {
      try {
        await axios.post(
          `${API_BASE}/api/auth/logout`,
          {},
          {
            headers: {
              Authorization: `Bearer ${localStorage.getItem("token")}`,
            },
          }
        );
      } catch (err) {}

      localStorage.removeItem("token");
      localStorage.removeItem("user");

      this.$toast.success("Đăng xuất thành công");
      this.$router.push("/login");
    },
  },
};
</script>
<style scoped>
.sidebar {
    width: 260px;
    height: 100vh;
    background: white;
    border-right: 1px solid #eee;
    display: flex;
    flex-direction: column;
    padding: 20px;
    font-family: Arial, sans-serif;
    position: sticky;  /* 🔥 dùng cái này */
    top: 0;            /* 🔥 bắt buộc có */
}

/* Logo */
.logo {
    display: flex;
    gap: 12px;
    margin-bottom: 30px;
    padding: 10px;
    border-bottom: 1px solid #eee;
}

.logo-icon {
    width: 45px;
    height: 45px;
    background: #2563eb;
    color: white;
    border-radius: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
}

.logo h2 {
    font-size: 16px;
    margin: 0;
}

.logo p {
    font-size: 13px;
    color: gray;
    margin: 0;
}

/* Menu */
.menu {
    
    list-style: none;
    padding: 0;
    flex: 1;
}

.menu-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 15px;
    margin: 6px 0;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    font-size: 14px;
    transition: 0.2s;
}

.menu-item i {
    width: 20px;
    font-size: 15px;
    color: #555;
}

.menu-item:hover {
    background: #f3f4f6;
}

/* Active giống hình */
.active {
    background: #e0f2fe;
    color: #2563eb;
    font-weight: bold;
}

.active i {
    color: #2563eb;
}

/* Logout */
.logout-btn {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 15px;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
}

.logout-btn:hover {
    background: #fee2e2;
    color: red;
}

.menu-item.router-link-exact-active {
    background: #e0f2fe;
    color: #2563eb;
    font-weight: bold;
}

.menu-item.router-link-exact-active i {
    color: #2563eb;
}

/* ✅ User box giống hình */
.user-box {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 10px;
    border-top: 1px solid #eee;
}

.user-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: #f1f5f9;
    display: flex;
    justify-content: center;
    align-items: center;
    color: gray;
    font-size: 16px;
}

.user-text {
    flex: 1;
}

.user-name {
    font-size: 14px;
    font-weight: bold;
    margin: 0;
    color: #111;
}

.user-email {
    font-size: 12px;
    margin: 0;
    color: gray;
}

.user-exit {
    font-size: 16px;
    color: gray;
    cursor: pointer;
}

.user-exit:hover {
    color: red;
}
</style>
