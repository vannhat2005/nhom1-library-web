<template>
  <div class="page">
    <!-- Title -->
    <div class="mb-4">
      <h1 class="page-title mb-2">Quản lý sách</h1>
      <p class="page-subtitle mb-0">Quản lý danh sách sách trong thư viện</p>
    </div>

    <!-- Toolbar -->
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-body d-flex flex-wrap align-items-center gap-3">
        <!-- Search -->
        <div class="search-wrap">
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
              <i class="fa-solid fa-magnifying-glass text-muted"></i>
            </span>
            <input
              type="text"
              class="form-control border-start-0"
              placeholder="Tìm kiếm theo tên sách, tác giả..."
            />
          </div>
        </div>

        <!-- Filter icon -->
        <button class="btn btn-outline-light border filter-btn" type="button" title="Bộ lọc">
          <i class="fa-solid fa-filter text-muted"></i>
        </button>

        <!-- Category select -->
        <select class="form-select category-select">
          <option selected>Tất cả thể loại</option>
          <option>Công nghệ</option>
          <option>Văn học</option>
          <option>Lịch sử</option>
          <option>Khoa học</option>
        </select>

        <!-- Add button -->
        <button class="btn btn-primary btn-add ms-auto" type="button">
          <i class="fa-solid fa-plus me-2"></i>
          Thêm sách mới
        </button>
      </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0 table-hover">
          <thead>
            <tr class="table-head">
              <th class="col-stt text-center">STT</th>
              <th>TÊN SÁCH</th>
              <th>TÁC GIẢ</th>
              <th>THỂ LOẠI</th>
              <th class="text-center">SỐ LƯỢNG</th>
              <th class="text-center">SỐ LƯỢNG CÒN</th>
              <th class="text-center">TRẠNG THÁI</th>
              <th class="text-center">THAO TÁC</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="text-muted text-center">1</td>
              <td class="fw-semibold">Lập trình C++</td>
              <td>Nguyễn Văn A</td>
              <td>
                <span class="badge badge-category">Công nghệ</span>
              </td>
              <td class="text-center">15</td>
              <td class="text-center">7</td>
              <td class="text-center">
                <span class="badge badge-status badge-ok">Hoạt động</span>
              </td>
              <td class="text-center">
                <button class="btn btn-link action action-edit" type="button" title="Sửa">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
                <button class="btn btn-link action action-delete" type="button" title="Xóa">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </td>
            </tr>

            <tr>
              <td class="text-muted text-center">2</td>
              <td class="fw-semibold">Truyện Kiều</td>
              <td>Nguyễn Du</td>
              <td>
                <span class="badge badge-category">Văn học</span>
              </td>
              <td class="text-center">20</td>
              <td class="text-center">5</td>
              <td class="text-center">
                <span class="badge badge-status badge-ok">Hoạt động</span>
              </td>
              <td class="text-center">
                <button class="btn btn-link action action-edit" type="button" title="Sửa">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
                <button class="btn btn-link action action-delete" type="button" title="Xóa">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </td>
            </tr>

            <tr>
              <td class="text-muted text-center">3</td>
              <td class="fw-semibold">Lịch sử Việt Nam</td>
              <td>Trần Văn B</td>
              <td>
                <span class="badge badge-category">Lịch sử</span>
              </td>
              <td class="text-center">12</td>
              <td class="text-center">0</td>
              <td class="text-center">
                <span class="badge badge-status badge-out">Ngừng hoạt động</span>
              </td>
              <td class="text-center">
                <button class="btn btn-link action action-edit" type="button" title="Sửa">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
                <button class="btn btn-link action action-delete" type="button" title="Xóa">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </td>
            </tr>

            <tr>
              <td class="text-muted text-center">4</td>
              <td class="fw-semibold">Toán cao cấp</td>
              <td>Lê Thị C</td>
              <td>
                <span class="badge badge-category">Khoa học</span>
              </td>
              <td class="text-center">8</td>
              <td class="text-center">3</td>
              <td class="text-center">
                <span class="badge badge-status badge-ok">Hoạt động</span>
              </td>
              <td class="text-center">
                <button class="btn btn-link action action-edit" type="button" title="Sửa">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
                <button class="btn btn-link action action-delete" type="button" title="Xóa">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </td>
            </tr>

            <tr>
              <td class="text-muted text-center">5</td>
              <td class="fw-semibold">Cơ sở dữ liệu</td>
              <td>Phạm Văn D</td>
              <td>
                <span class="badge badge-category">Công nghệ</span>
              </td>
              <td class="text-center">12</td>
              <td class="text-center">8</td>
              <td class="text-center">
                <span class="badge badge-status badge-ok">Hoạt động</span>
              </td>
              <td class="text-center">
                <button class="btn btn-link action action-edit" type="button" title="Sửa">
                  <i class="fa-regular fa-pen-to-square"></i>
                </button>
                <button class="btn btn-link action action-delete" type="button" title="Xóa">
                  <i class="fa-regular fa-trash-can"></i>
                </button>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    
}
</script>
<style scoped>
.page {
  padding: 24px;
}

.page-title {
  font-size: 32px;
  font-weight: 800;
  letter-spacing: -0.5px;
}

.page-subtitle {
  color: #6b7280;
}

.search-wrap {
  width: 520px;
  max-width: 520px;
}

.category-select {
  width: 200px;
}

.filter-btn {
  width: 42px;
  height: 42px;
  display: grid;
  place-items: center;
  background: #fff;
}

.btn-add {
  padding: 10px 18px;
  border-radius: 12px;
  font-weight: 600;
}

.table-head th {
  font-size: 12px;
  letter-spacing: 0.6px;
  color: #6b7280;
  background: #fff;
  border-bottom: 1px solid #eef2f7 !important;
  padding-top: 16px;
  padding-bottom: 16px;
}

.table td {
  padding-top: 16px;
  padding-bottom: 16px;
  border-color: #eef2f7;
}

.col-stt {
  width: 70px;
}

.badge-category {
  background: #e8f0ff;
  color: #2563eb;
  padding: 8px 12px;
  border-radius: 999px;
  font-weight: 600;
}

.badge-status {
  padding: 8px 12px;
  border-radius: 999px;
  font-weight: 700;
}

.badge-ok {
  background: #dcfce7;
  color: #16a34a;
}

.badge-out {
  background: #fee2e2;
  color: #ef4444;
}

.action {
  text-decoration: none;
  padding: 0 8px;
  font-size: 18px;
}

.action-edit {
  color: #2563eb;
}

.action-delete {
  color: #ef4444;
}

.action:hover {
  opacity: 0.8;
}
</style>