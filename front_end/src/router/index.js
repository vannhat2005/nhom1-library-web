import { createRouter, createWebHistory } from "vue-router";

const routes = [
  // Client (status: 2)
  {
    path: "/",
    component: () => import("../components/Client/TrangChu.vue"),
    meta: { layout: "client", roles: [2] },
  },
  {
    path: "/client/tim-kiem",
    component: () => import("../components/Client/TimKiem.vue"),
    meta: { layout: "client", roles: [2] },
  },
  {
    path: "/client/lich-su-muon",
    component: () => import("../components/Client/LichSu.vue"),
    meta: { layout: "client", roles: [2] },
  },

  // Librarian (status: 1)
  {
    path: "/librarian/the-loai",
    component: () => import("../components/Librarian/TheLoai.vue"),
    meta: { layout: "librarian", roles: [1] },
  },
  {
    path: "/librarian/sach",
    component: () => import("../components/Librarian/Sach.vue"),
    meta: { layout: "librarian", roles: [1] },
  },
  {
    path: "/librarian/muon-sach",
    component: () => import("../components/Librarian/MuonSach.vue"),
    meta: { layout: "librarian", roles: [1] },
  },
  {
    path: "/librarian/phieu-muon",
    component: () => import("../components/Librarian/PhieuMuon.vue"),
    meta: { layout: "librarian", roles: [1] },
  },
  {
    path: "/librarian/phieu-tra",
    component: () => import("../components/Librarian/PhieuTra.vue"),
    meta: { layout: "librarian", roles: [1] },
  },

  // Admin (status: 0)
  {
    path: "/admin/trang-chu",
    component: () => import("../components/Admin/TrangChu.vue"),
    meta: { layout: "admin", roles: [0] },
  },
  {
    path: "/admin/tai-khoan",
    component: () => import("../components/Admin/TaiKhoan.vue"),
    meta: { layout: "admin", roles: [0] },
  },
  {
    path: "/admin/bao-cao-thong-ke",
    component: () => import("../components/Admin/BaoCaoThongKe.vue"),
    meta: { layout: "admin", roles: [0] },
  },
  {
    path: "/admin/the-loai",
    component: () => import("../components/Admin/TheLoai.vue"),
    meta: { layout: "admin", roles: [0] },
  },
  {
    path: "/admin/sach",
    component: () => import("../components/Admin/Sach.vue"),
    meta: { layout: "admin", roles: [0] },
  },
  {
    path: "/admin/muon-tra",
    component: () => import("../components/Admin/MuonTra.vue"),
    meta: { layout: "admin", roles: [0] },
  },

  // Auth
  {
    path: "/login",
    component: () => import("../components/Auth/Login.vue"),
    meta: { layout: "blank" },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// ====== helper điều hướng theo status ======
function homeByStatus(status) {
  if (status === 0) return "/admin/trang-chu";
  if (status === 1) return "/librarian/sach";
  return "/"; // status 2
}

// ====== Guard kiểm tra quyền ======
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem("token");
  const user = JSON.parse(localStorage.getItem("user") || "null");

  // Nếu đã login mà vẫn vào /login => đá về đúng trang theo role
  if (to.path === "/login" && token && user) {
    return next(homeByStatus(user.status));
  }

  // Route có roles thì bắt buộc phải login
  if (to.meta.roles) {
    if (!token || !user) return next("/login");

    // Sai role => đá về đúng khu
    if (!to.meta.roles.includes(user.status)) {
      return next(homeByStatus(user.status));
    }
  }

  next();
});

export default router;