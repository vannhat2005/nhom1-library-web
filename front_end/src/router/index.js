import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    // Client
    {
        path: '/',
        component: () => import('../components/Client/TrangChu.vue'),
        meta: { layout: 'client' },
    },
     {
        path: '/client/tim-kiem',
        component: () => import('../components/Client/TimKiem.vue'),
        meta: { layout: 'client' },
    },
     {
        path: '/client/lich-su-muon',
        component: () => import('../components/Client/LichSu.vue'),
        meta: { layout: 'client' },
    },

    // Librarian
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
        path: '/librarian/phieu-tra',
        component: () => import('../components/Librarian/PhieuTra.vue'),
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
        path: '/admin/bao-cao-thong-ke',
        component: () => import('../components/Admin/BaoCaoThongKe.vue'),
        meta: { layout: 'admin' },
    },
    {
        path: '/admin/the-loai',
        component: () => import('../components/Admin/TheLoai.vue'),
        meta: { layout: 'admin' },
    },
    {
        path: '/admin/sach',
        component: () => import('../components/Admin/Sach.vue'),
        meta: { layout: 'admin' },
    },
    {
        path: '/admin/muon-tra',
        component: () => import('../components/Admin/MuonTra.vue'),
        meta: { layout: 'admin' },
    },
    //Auth
        {
            path: '/login',
            component: () => import('../components/Auth/Login.vue'),
            meta: { layout: 'blank' },
        },
];
const router = createRouter({
    history: createWebHistory(),
    routes : routes,
});

export default router;