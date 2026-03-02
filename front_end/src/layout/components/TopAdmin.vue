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
            <router-link to="/login" class="logout-btn" @click="logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                Đăng xuất
            </router-link>
        </div>
    </header>
</template>
<script>
import axios from 'axios';
const API_BASE = "http://127.0.0.1:8000";
export default {
    data() {
        return {
            user: {},
        };
    },

    computed: {
        roleText() {
            if (this.user.status === 0) return "Admin";
            if (this.user.status === 1) return "Thủ thư";
            return "Khách hàng";
        },
    },

    mounted() {
        const user = JSON.parse(localStorage.getItem("user") || "{}");
        this.user = user;
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
            } catch (err) {
                console.log("Logout API error", err);
            }

            localStorage.removeItem("token");
            localStorage.removeItem("user");

            this.$toast.success("Đăng xuất thành công");
            this.$router.push("/login");
        },
    },
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