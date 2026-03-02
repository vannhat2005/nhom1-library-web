<template>
    <div class="sidebar"> <!-- Logo -->
        <div class="logo">
            <!-- <div class="logo-icon"> <i class="fa-solid fa-book-open"></i> </div> -->
            <div>
                <h2 class="mt-1"><b>ADMIN</b></h2>
                <p>Quản lý thư viện</p>
            </div>
        </div> <!-- Menu -->
        <ul class="menu">
            <li> <router-link to="/admin/trang-chu" class="menu-item"> <i class="fa-solid fa-grip"></i> Trang tổng quan</router-link> </li>
            <li> <router-link to="/admin/sach" class="menu-item"> <i class="fa-solid fa-book-open"></i> Quản lý sách</router-link> </li>
            <li> <router-link to="/admin/the-loai" class="menu-item"> <i class="fa-solid fa-tags"></i> Quản lý thể loại </router-link> </li>
            <li> <router-link to="/admin/muon-tra" class="menu-item"> <i class="fa-solid fa-receipt"></i> Quản lý mượn - trả </router-link> </li>
            <li> <router-link to="/admin/tai-khoan" class="menu-item"> <i class="fa-solid fa-user-group"></i> Quản lý người dùng</router-link> </li>
            <li> <router-link to="/admin/bao-cao-thong-ke" class="menu-item"> <i class="fa-solid fa-chart-simple"></i> Báo cáo thống kê</router-link> </li>

        </ul>
    </div>
</template>
<script>
export default {
    
}
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

.menu-item.router-link-exact-active {
    background: #e0f2fe;
    color: #2563eb;
    font-weight: bold;
}

.menu-item.router-link-exact-active i {
    color: #2563eb;
}
</style>
