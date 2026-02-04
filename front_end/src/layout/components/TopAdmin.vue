<template>
    <header class="topbar">
        <div class="spacer"></div>
        <div class="right">
            <div class="user">
                <div class="avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
                <span class="name">Nguyễn Văn A (Admin)</span>
            </div>
            <router-link to="/login" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                Đăng xuất
            </router-link>
        </div>
    </header>
</template>
<script>
export default {

}
</script>
<style scoped>
.topbar {
    height: 64px;
    background: #fff;
    border-bottom: 1px solid #eee;
    padding: 0 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.right {
    display: flex;
    align-items: center;
    gap: 14px;
}

.user {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #111;
}

.avatar {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    background: #e0f2fe;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
}

.name {
    font-size: 14px;
    font-weight: 600;
}

.logout-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    border: 1px solid #eee;
    border-radius: 10px;
    text-decoration: none;
    color: #111;
    background: #fff;
    font-size: 14px;
}

.logout-btn:hover {
    background: #f3f4f6;
}
</style>