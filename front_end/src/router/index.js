import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    // Client
    {
        path: '/',
        component: () => import('../components/Client/TrangChu.vue'),
        meta: { layout: 'client' },
    },

    // Librarian
    {
        path: '/librarian/trang-chu',
        component: () => import('../components/Librarian/TrangChu.vue'),
        meta: { layout: 'librarian' },
    },
    {
        path: '/librarian/the-loai',
        component: () => import('../components/Librarian/TheLoai.vue'),
        meta: { layout: 'librarian' },
    },
    {
        path: '/librarian/sach',
        component: () => import('../components/Librarian/Sach.vue'),
        meta: { layout: 'librarian' },
    },
    {
        path: '/librarian/muon-sach',
        component: () => import('../components/Librarian/MuonSach.vue'),
        meta: { layout: 'librarian' },
    },
    {
        path: '/librarian/phieu-muon',
        component: () => import('../components/Librarian/PhieuMuon.vue'),
        meta: { layout: 'librarian' },
    },
    {
        path: '/librarian/khach-hang',
        component: () => import('../components/Librarian/KhachHang.vue'),
        meta: { layout: 'librarian' },
    },

    // Admin
    {
        path: '/admin/trang-chu',
        component: () => import('../components/Admin/TrangChu.vue'),
        meta: { layout: 'admin' },
    },
    {
        path: '/admin/tai-khoan',
        component: () => import('../components/Admin/TaiKhoan.vue'),
        meta: { layout: 'admin' },
    },
    {
        path: '/admin/cau-hinh-he-thong',
        component: () => import('../components/Admin/CauHinhHeThong.vue'),
        meta: { layout: 'admin' },
    },
    {
        path: '/admin/bao-cao-thong-ke',
        component: () => import('../components/Admin/BaoCaoThongKe.vue'),
        meta: { layout: 'admin' },
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes : routes,
});

export default router;