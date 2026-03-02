<template>
  <div class="home-page">
    <!-- Banner -->
    <div class="hero">
      <div class="hero-title">Chào mừng đến với Thư viện</div>
      <div class="hero-sub">Khám phá và mượn sách yêu thích của bạn</div>
    </div>

    <!-- Section Head -->
    <div class="section-head">
      <div class="section-left">
        <span class="star">★</span>
        <h2 class="section-title">Sách nổi bật</h2>
      </div>

      <!-- Badges -->
      <div class="badge-row">
        <button class="badge" :class="{ active: selectedCategory === 'all' }" @click="selectCategory('all')">
          Tất cả
        </button>

        <button v-for="c in categories" :key="c.id" class="badge" :class="{ active: selectedCategory === c.id }"
          @click="selectCategory(c.id)">
          {{ c.name }}
        </button>
      </div>
    </div>

    <!-- Loading -->
    <div v-if="loadingBooks" class="loading-wrap">
      <div class="loading-card" v-for="i in 6" :key="i">
        <div class="sk-img"></div>
        <div class="sk-line w-80"></div>
        <div class="sk-line w-55"></div>
        <div class="sk-line w-65"></div>
        <div class="sk-btn"></div>
      </div>
    </div>

    <!-- Grid books -->
    <div v-else class="books-grid">
      <div v-for="b in books" :key="b.id" class="book-card">
        <div class="book-image">
          <img :src="b.image" alt="" />
          <span class="chip" :class="chipClass(b.category_id)">
            {{ categoryName(b.category_id) }}
          </span>
        </div>

        <div class="book-body">
          <div class="book-title">{{ b.title }}</div>

          <!-- Vì API hiện tại không join authors, nên chỉ có author_id -->
          <div class="book-author">
            {{ b.author_name }}
          </div>

          <!-- rating demo (chưa có backend) -->
          <div class="stars">
            <i class="fa-solid fa-star" v-for="i in 5" :key="i" :class="{ off: i > 4 }"></i>
          </div>

          <button class="borrow-btn" type="button" data-bs-toggle="modal" data-bs-target="#addModal"
            v-on:click="Object.assign(add_request, b)">
            <i class="fa-solid fa-book me-2"></i>
            Yêu cầu mượn
          </button>
        </div>
      </div>

      <div v-if="books.length === 0" class="empty">
        Không có sách phù hợp.
      </div>
    </div>
  </div>

  <!-- Modal Yêu cầu mượn sách -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal">
      <div class="modal-content borrow-modal">
        <div class="modal-header">
          <h5 class="modal-title">Xác nhận yêu cầu mượn sách</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Thông tin sách -->
          <div class="info-box">
            <div class="info-label">Thông tin sách:</div>
            <div class="info-v fw-bold">{{ add_request.title }}</div>
            <!-- Tác giả -->
            <div class="info-label">Tác giả:</div>
            <div class="info-v fw-bold">{{ add_request.author_name }}</div>
          </div>


          <!-- Thời hạn mượn -->
          <div class="deadline-box">
            <div class="deadline-icon">
              <i class="fa-regular fa-calendar"></i>
            </div>
            <div class="deadline-text">
              <span class="muted">Thời hạn mượn:</span>
              <span class="fw-bold"> 14 ngày</span>
            </div>
          </div>

          <!-- Cảnh báo -->
          <div class="warn-box">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <span>Vui lòng trả sách đúng hạn để tránh bị phạt</span>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light btn-cancel" data-bs-dismiss="modal">
            Hủy
          </button>

          <button type="button" class="btn btn-primary btn-confirm  " @click="requestBook">
            Xác nhận mượn
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Home",
  data() {
    return {
      selectedCategory: "all",
      categories: [],
      books: [],
      loadingBooks: false,
      loadingCats: false,
      add_request: {},

      API_BASE: "http://127.0.0.1:8000/api",

    };
  },

  mounted() {
    this.init();
  },

  methods: {
    async init() {
      await this.getCategories();
      await this.getBooks(); // load all
    },

    async getCategories() {
      try {
        this.loadingCats = true;
        const res = await axios.get(`${this.API_BASE}/student/home/categories`);
        this.categories = res.data?.data || [];
      } catch (e) {
        console.error("Lỗi load categories:", e);
      } finally {
        this.loadingCats = false;
      }
    },

    async getBooks(categoryId = null) {
      try {
        this.loadingBooks = true;

        const res = await axios.get(`${this.API_BASE}/student/home/books`, {
          params: categoryId ? { category_id: categoryId } : {},
        });

        this.books = res.data?.data || [];
      } catch (e) {
        console.error("Lỗi load books:", e);
      } finally {
        this.loadingBooks = false;
      }
    },

    selectCategory(id) {
      this.selectedCategory = id;

      if (id === "all") this.getBooks();
      else this.getBooks(id);
    },

    categoryName(categoryId) {
      const c = this.categories.find((x) => x.id === categoryId);
      return c ? c.name : "Khác";
    },

    chipClass(categoryId) {
      // đổi màu nhẹ theo category_id
      if (categoryId === 1) return "chip-new";
      if (categoryId === 2) return "chip-skill";
      if (categoryId === 3) return "chip-novel";
      return "chip-biz";
    },

    async requestBook() {
      try {
        const token = localStorage.getItem("token");
        if (!token) {
          this.$toast.error("Bạn cần đăng nhập để mượn sách");
          this.$router.push("/login");
          return;
        }

        // payload gửi lên backend (tối thiểu cần book_id)
        // Bạn đang Object.assign(add_request, b) nên add_request.id chính là id sách
        const payload = {
          book_id: this.add_request.id,
          // nếu backend cần thêm thì bạn bổ sung ở đây (vd: note, deadline,...)
        };

        const res = await axios.post(
          `${this.API_BASE}/student/borrow-request/add-data`,
          payload,
          {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          }
        );

        // toast theo backend trả về
        if (res.data?.status) {
          this.$toast.success(res.data.message || "Gửi yêu cầu mượn thành công");

          // đóng modal bootstrap
          const modalEl = document.getElementById("addModal");
          const modalInstance = window.bootstrap?.Modal.getInstance(modalEl);
          modalInstance?.hide();

          // reset data
          this.add_request = {};
        } else {
          this.$toast.error(res.data?.message || "Gửi yêu cầu mượn thất bại");
        }
      } catch (err) {
        const message =
          err?.response?.data?.message ||
          "Gửi yêu cầu mượn thất bại (kiểm tra API/CORS)";
        this.$toast.error(message);
      }
    },
  },
};
</script>

<style scoped>
.home-page {
  padding: 18px 22px;
}

/* Banner */
.hero {
  border-radius: 14px;
  padding: 18px 18px;
  color: #fff;
  background: linear-gradient(90deg, #5b3df5, #8a2be2);
  margin-bottom: 18px;
}

.hero-title {
  font-size: 18px;
  font-weight: 800;
  margin-bottom: 4px;
}

.hero-sub {
  font-size: 13px;
  opacity: 0.9;
}

/* Section header */
.section-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 14px;
  margin: 12px 0;
  flex-wrap: wrap;
}

.section-left {
  display: flex;
  align-items: center;
  gap: 8px;
}

.star {
  color: #f59e0b;
  font-size: 14px;
}

.section-title {
  margin: 0;
  font-size: 16px;
  font-weight: 800;
}

/* Badges */
.badge-row {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.badge {
  border: 1px solid #e5e7eb;
  background: #fff;
  color: #111;
  border-radius: 10px;
  padding: 6px 10px;
  font-size: 12px;
  font-weight: 700;
  cursor: pointer;
}

.badge.active {
  background: #2563eb;
  border-color: #2563eb;
  color: #fff;
}

/* Grid */
.books-grid {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 14px;
}

@media (max-width: 1200px) {
  .books-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 720px) {
  .books-grid {
    grid-template-columns: 1fr;
  }
}

/* Card */
.book-card {
  background: #fff;
  border-radius: 14px;
  overflow: hidden;
  border: 1px solid #eef2f7;
  box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
}

.book-image {
  position: relative;
  height: 120px;
  background: #f3f4f6;
}

.book-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* Category chip */
.chip {
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 11px;
  font-weight: 800;
  padding: 6px 10px;
  border-radius: 999px;
  background: #e5e7eb;
  color: #111827;
}

.chip-new {
  background: #dbeafe;
  color: #1d4ed8;
}

.chip-skill {
  background: #dcfce7;
  color: #16a34a;
}

.chip-novel {
  background: #e0e7ff;
  color: #4f46e5;
}

.chip-biz {
  background: #fee2e2;
  color: #dc2626;
}

/* Body */
.book-body {
  padding: 12px 12px 14px;
}

.book-title {
  font-weight: 900;
  font-size: 13.5px;
  margin-bottom: 2px;
  color: #0f172a;
}

.book-author {
  font-size: 12px;
  color: #6b7280;
  margin-bottom: 8px;
}

.stars {
  font-size: 12px;
  margin-bottom: 10px;
  color: #f59e0b;
}

.stars .off {
  color: #e5e7eb;
}

/* Borrow button */
.borrow-btn {
  width: 100%;
  border: none;
  background: #0f172a;
  color: #fff;
  padding: 10px 12px;
  border-radius: 10px;
  font-weight: 800;
  font-size: 12.5px;
  cursor: pointer;
}

.borrow-btn:hover {
  opacity: 0.92;
}

/* Empty */
.empty {
  grid-column: 1 / -1;
  background: #fff;
  border: 1px dashed #e5e7eb;
  padding: 16px;
  border-radius: 12px;
  color: #6b7280;
  text-align: center;
}

/* Loading skeleton */
.loading-wrap {
  display: grid;
  grid-template-columns: repeat(3, minmax(0, 1fr));
  gap: 14px;
}

@media (max-width: 1200px) {
  .loading-wrap {
    grid-template-columns: repeat(2, minmax(0, 1fr));
  }
}

@media (max-width: 720px) {
  .loading-wrap {
    grid-template-columns: 1fr;
  }
}

.loading-card {
  background: #fff;
  border-radius: 14px;
  border: 1px solid #eef2f7;
  padding: 12px;
  box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
}

.sk-img {
  height: 120px;
  border-radius: 12px;
  background: linear-gradient(90deg, #f1f5f9, #e5e7eb, #f1f5f9);
  background-size: 200% 100%;
  animation: sk 1.2s infinite;
  margin-bottom: 12px;
}

.sk-line {
  height: 10px;
  border-radius: 999px;
  background: linear-gradient(90deg, #f1f5f9, #e5e7eb, #f1f5f9);
  background-size: 200% 100%;
  animation: sk 1.2s infinite;
  margin-bottom: 10px;
}

.sk-btn {
  height: 34px;
  border-radius: 10px;
  background: linear-gradient(90deg, #f1f5f9, #e5e7eb, #f1f5f9);
  background-size: 200% 100%;
  animation: sk 1.2s infinite;
  margin-top: 6px;
}

.w-80 {
  width: 80%;
}

.w-65 {
  width: 65%;
}

.w-55 {
  width: 55%;
}

@keyframes sk {
  0% {
    background-position: 0% 50%;
  }

  100% {
    background-position: 200% 50%;
  }
}

.borrow-modal {
  border-radius: 14px;
  overflow: hidden;
}

.info-box {
  background: #f8fafc;
  border: 1px solid #eef2f7;
  border-radius: 12px;
  padding: 14px;
}

.info-label {
  font-size: 12px;
  color: #64748b;
  margin-bottom: 8px;
  font-weight: 700;
}

.info-row {
  display: flex;
  gap: 10px;
  margin-top: 6px;
}

.info-k {
  width: 80px;
  color: #64748b;
  font-size: 12px;
}

.info-v {
  flex: 1;
  font-size: 13px;
  color: #0f172a;
}

.deadline-box {
  margin-top: 12px;
  background: #eef6ff;
  border: 1px solid #dbeafe;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.deadline-icon {
  width: 34px;
  height: 34px;
  border-radius: 10px;
  display: grid;
  place-items: center;
  background: #dbeafe;
  color: #2563eb;
}

.deadline-text {
  font-size: 13px;
  color: #0f172a;
}

.muted {
  color: #64748b;
}

.warn-box {
  margin-top: 12px;
  background: #f4e174;
  border: 1px solid #fed7aa;
  border-radius: 12px;
  padding: 12px 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  color: #9a3412;
  font-size: 13px;
  font-weight: 600;
}

.btn-cancel {
  border-radius: 10px;
  font-weight: 700;
  padding: 10px 30px;
}

.btn-confirm {
  border-radius: 10px;
  font-weight: 800;
  padding: 10px 30px;
}

.modal-footer {
  justify-content: center !important;
}

custom-modal {
  max-width: 300px;
}
</style>