<template>
        <div class="dashboard">

    <h1 class="title">Báo cáo thống kê</h1>

    <!-- ===== HÀNG THỐNG KÊ ===== -->
    <div class="stat-row">
        <div class="stat-box">
            <div class="stat-label">Tổng số sách</div>
            <div class="stat-value">--</div>
            <div class="stat-sub">Sách trong thư viện</div>
        </div>

        <div class="stat-box">
            <div class="stat-label">Sách đang được mượn</div>
            <div class="stat-value">--</div>
            <div class="stat-sub">Đang lưu hành</div>
        </div>

        <div class="stat-box">
            <div class="stat-label">Sách quá hạn</div>
            <div class="stat-value">--</div>
            <div class="stat-sub">Chưa trả</div>
        </div>

        <div class="stat-box">
            <div class="stat-label">Tổng người dùng</div>
            <div class="stat-value">--</div>
            <div class="stat-sub">Người dùng đăng ký</div>
        </div>
    </div>

    <!-- ===== BẢNG DANH SÁCH ===== -->
    <div class="table-card">
        <div class="table-title">Danh sách mượn sách gần đây</div>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>TÊN SÁCH</th>
                    <th>NGƯỜI MƯỢN</th>
                    <th>NGÀY MƯỢN</th>
                    <th>TRẠNG THÁI</th>
                </tr>
            </thead>
            <tbody>
                <!-- Để trống cho backend đổ dữ liệu -->
            </tbody>
        </table>
    </div>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
   .dashboard {
    padding: 20px;
    font-family: Arial, sans-serif;
}

.title {
    font-size: 26px;
    font-weight: bold;
    margin-bottom: 20px;
}

/* ==== STAT BOX ==== */
.stat-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-box {
    background: #fff;
    border-radius: 10px;
    padding: 18px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.stat-label {
    font-size: 14px;
    color: #555;
}

.stat-value {
    font-size: 28px;
    font-weight: bold;
    margin: 8px 0;
}

.stat-sub {
    font-size: 12px;
    color: #999;
}

/* ==== TABLE ==== */
.table-card {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.table-title {
    font-weight: bold;
    margin-bottom: 15px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

th {
    background: #f4f6f9;
    font-size: 13px;
    color: #555;
}

</style>