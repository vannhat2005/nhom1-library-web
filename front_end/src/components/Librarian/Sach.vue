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
            <input v-model="key_search" @input="search()" type="text" class="form-control border-start-0" placeholder="Tìm kiếm theo tên sách, tác giả..." />
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
        <button class="btn btn-primary btn-add ms-auto" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
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
            <template v-for="(item, index) in list_sach" :key="index">
              <tr>
                <td class="text-muted text-center">{{ index + 1 }}</td>
                <td class="fw-semibold">{{ item.title }}</td>
                <td>{{ item.author_name }}</td>
                <td>
                  <span class="badge badge-category">{{ item.category_name }}</span>
                </td>
                <td class="text-center">{{ item.quantity }}</td>
                <td class="text-center">{{ item.available }}</td>

                <td v-if="item.status == 1" class="text-center">
                  <span class="badge badge-status badge-ok">Hoạt động</span>
                </td>
                <td v-else class="text-center">
                  <span class="badge badge-status badge-out">Ngừng hoạt động</span>
                </td>
                <td class="text-center">
                  <button class="btn btn-link action action-edit" data-bs-toggle="modal" data-bs-target="#updateModal"
                    v-on:click="Object.assign(update_sach, item)" type="button" title="Sửa">
                    <i class="fa-regular fa-pen-to-square"></i>
                  </button>
                  <button class="btn btn-link action action-delete" data-bs-toggle="modal" data-bs-target="#deleteModal"
                    v-on:click="Object.assign(delete_sach, item)" type="button" title="Xóa">
                    <i class="fa-regular fa-trash-can"></i>
                  </button>
                </td>
              </tr>
            </template>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Modal Thêm Mới -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Thêm Sách Mới</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Tên Sách</label>
              <input v-model="create_sach.title" type="text" class="form-control" />
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Hình Ảnh</label>
              <input v-model="create_sach.image" type="text" class="form-control" />
            </div>
            <!-- Tác giả -->
            <div class="col-md-6 mb-3">
              <label class="form-label">Tác Giả</label>
              <select v-model="create_sach.author_id" class="form-select">
                <option v-for="a in list_author" :key="a.id" :value="a.id">
                  {{ a.name }}
                </option>
              </select>
            </div>

            <!-- Thể loại -->
            <div class="col-md-6 mb-3">
              <label class="form-label">Thể Loại</label>
              <select v-model="create_sach.category_id" class="form-select">
                <option v-for="c in list_category" :key="c.id" :value="c.id">
                  {{ c.name }}
                </option>
              </select>
            </div>

            <!-- Số lượng -->
            <div class="col-md-4 mb-3">
              <label class="form-label">Số Lượng</label>
              <input v-model.number="create_sach.quantity" type="number" min="1" class="form-control" />
            </div>

            <div class="col-md-3 mb-3">
              <label class="form-label">Trạng Thái</label>
              <select v-model="create_sach.status" class="form-select">
                <option selected value="1">Hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Đóng
          </button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="createSach()">
            Thêm mới
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Cập Nhật -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cập Nhật Sách</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Tên Sách</label>
              <input v-model="update_sach.title" type="text" class="form-control" />
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Hình Ảnh</label>
              <input v-model="update_sach.image" type="text" class="form-control" />
            </div>
            <!-- Tác giả -->
            <div class="col-md-6 mb-3">
              <label class="form-label">Tác Giả</label>
              <select v-model="update_sach.author_id" class="form-select">
                <option v-for="a in list_author" :key="a.id" :value="a.id">
                  {{ a.name }}
                </option>
              </select>
            </div>

            <!-- Thể loại -->
            <div class="col-md-6 mb-3">
              <label class="form-label">Thể Loại</label>
              <select v-model="update_sach.category_id" class="form-select">
                <option v-for="c in list_category" :key="c.id" :value="c.id">
                  {{ c.name }}
                </option>
              </select>
            </div>

            <!-- Số lượng -->
            <div class="col-md-4 mb-3">
              <label class="form-label">Số Lượng</label>
              <input v-model.number="update_sach.quantity" type="number" min="1" class="form-control" />
            </div>

            <div class="col-md-3 mb-3">
              <label class="form-label">Trạng Thái</label>
              <select v-model="update_sach.status" class="form-select">
                <option selected value="1">Hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Đóng
          </button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="updateSach()">
            Cập Nhật
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Xóa -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xóa Sách</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" role="alert">
            Bạn có chắc chắn muốn xóa sách
            <strong>{{ delete_sach.title }}</strong>?
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Đóng
          </button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" v-on:click="deleteSach()">
            Xác nhận
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
  data() {
    return {
      list_sach: [],
      list_category: [],
      list_author: [],
      create_sach: {},
      update_sach: {},
      delete_sach: {},
      key_search: '',
    };
  },
  mounted() {
    this.getSach();
    this.getCategory();
    this.getAuthor();
  },
  methods: {
    search() {
        axios.post('http://127.0.0.1:8000/api/librarian/sach/search', { key_search : this.key_search })
          .then(res => {
            this.list_sach = res.data.data;
          });
    },
    getCategory() {
      axios.get('http://127.0.0.1:8000/api/librarian/category/get-data')
        .then(res => {
          this.list_category = res.data.data;
        });
    },
    getAuthor() {
      axios.get('http://127.0.0.1:8000/api/librarian/author/get-data')
        .then(res => {
          this.list_author = res.data.data;
        });
    },
    getSach() {
      axios.get('http://127.0.0.1:8000/api/librarian/sach/get-data')
        .then(res => {
          this.list_sach = res.data.data;
        });
    },
    createSach() {
      axios.post('http://127.0.0.1:8000/api/librarian/sach/add-data', this.create_sach)
        .then(res => {
          this.$toast.success(res.data.message);
          this.getSach();
        })
        .catch(error => {
          const errors = error.response.data.errors;
          const firstKey = Object.keys(errors)[0];
          this.$toast.error(errors[firstKey][0]);
        });
    },
    updateSach() {
      axios.post('http://127.0.0.1:8000/api/librarian/sach/update-data/' + this.update_sach.id, this.update_sach)
        .then(res => {
          this.$toast.success(res.data.message);
          this.getSach();
        })
        .catch(error => {
          const errors = error.response.data.errors;
          const firstKey = Object.keys(errors)[0];
          this.$toast.error(errors[firstKey][0]);
        });
    },
    deleteSach() {
      axios.delete('http://127.0.0.1:8000/api/librarian/sach/delete-data/' + this.delete_sach.id)
        .then(res => {
          this.$toast.success(res.data.message);
          this.getSach();
        })
        .catch(error => {
          this.$toast.error('Xóa sách thất bại');
        });
    }
  }
};
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
  padding: 10px 16px;
  border-radius: 12px;
  font-weight: 600;
  flex: 0 0 auto;     /* không bị giãn */
  width: auto;        /* không full width */
  white-space: nowrap;
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