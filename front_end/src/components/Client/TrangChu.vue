<template>
  <div class="home-container">
    
    <div class="header-section">
      <div class="welcome-text">
        <h1>Thư Viện Trực Tuyến</h1>
        <p>Tìm kiếm và gửi yêu cầu mượn sách nhanh chóng.</p>
      </div>
      
      <div class="search-wrapper">
        <input 
          type="text" 
          v-model="searchQuery" 
          placeholder="Nhập tên sách hoặc tác giả để tìm..." 
          class="search-input"
        />
        <button class="search-btn">🔍</button>
      </div>
    </div>

    <div class="content-section">
      <h2 class="section-title">
        <span v-if="!searchQuery">📚 Sách nổi bật</span>
        <span v-else>🔎 Kết quả tìm kiếm cho: "{{ searchQuery }}"</span>
      </h2>
      
      <div v-if="filteredBooks.length === 0" class="no-result">
        <p>Không tìm thấy cuốn sách nào phù hợp!</p>
      </div>

      <div v-else class="book-grid">
        <div v-for="book in filteredBooks" :key="book.id" class="book-card">
          <div class="card-img-wrapper">
             <img :src="book.img" alt="Book Cover" class="book-img" />
             <span v-if="book.category" class="tag" :class="book.categoryClass">{{ book.category }}</span>
          </div>
          <div class="book-info">
            <h3 class="book-title">{{ book.title }}</h3>
            <p class="book-author">{{ book.author }}</p>
            
            <div class="stars">
              <span v-for="n in 5" :key="n" :class="{ 'gold': n <= book.stars, 'gray': n > book.stars }">★</span>
            </div>
            
            <button @click="openModal(book)" class="btn-borrow-card">
              📖 Yêu cầu mượn
            </button>
          </div>
        </div>
      </div>
    </div>

    <div v-if="showModal" class="modal-overlay" @click.self="closeModal">
      <div class="modal-content scale-in">
        
        <div class="modal-header">
          <h3>GỬI YÊU CẦU MƯỢN SÁCH</h3>
          <span class="close-icon" @click="closeModal">&times;</span>
        </div>

        <div class="modal-body">
          <div class="selected-book-info" v-if="selectedBook">
            Bạn đang chọn mượn: <strong>{{ selectedBook.title }}</strong>
          </div>

          <form @submit.prevent="submitRequest">
            <div class="form-group">
              <label>Số lượng:</label>
              <input type="number" v-model="form.quantity" min="1" max="3" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Ngày mượn:</label>
              <input type="date" v-model="form.borrowDate" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Ngày trả dự kiến:</label>
              <input type="date" v-model="form.returnDate" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Ghi chú:</label>
              <textarea 
                v-model="form.note" git branch
                class="form-control" 
                rows="3" 
                placeholder="Nhập ghi chú (nếu có)..."></textarea>
            </div>

            <div class="modal-actions">
              <button type="submit" class="btn-submit">[ Gửi yêu cầu ]</button>
              <button type="button" @click="closeModal" class="btn-cancel">[ Hủy ]</button>
            </div>
          </form>

          <p class="footer-note">* Yêu cầu sẽ được thủ thư duyệt trong 24h *</p>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
export default {
  
}
</script>

<style scoped>
/* --- 1. LAYOUT CHUNG --- */
.home-container {
  padding: 20px;
  background-color: #f0f2f5;
  min-height: 100vh;
  font-family: 'Segoe UI', sans-serif;
}

/* --- 2. HEADER & SEARCH --- */
.header-section {
  background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
  color: white;
  padding: 40px 20px;
  border-radius: 12px;
  margin-bottom: 30px;
  text-align: center;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.welcome-text h1 { margin: 0; font-size: 2.5em; }
.welcome-text p { margin-top: 10px; opacity: 0.9; }

.search-wrapper {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  gap: 10px;
}

.search-input {
  width: 100%;
  max-width: 500px;
  padding: 12px 20px;
  border-radius: 30px;
  border: none;
  font-size: 16px;
  outline: none;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.search-btn {
  background: #ff9f43;
  border: none;
  border-radius: 50%;
  width: 45px;
  height: 45px;
  cursor: pointer;
  font-size: 20px;
  transition: transform 0.2s;
}
.search-btn:hover { transform: scale(1.1); }

/* --- 3. GRID SÁCH --- */
.section-title {
  margin-bottom: 20px;
  color: #333;
  border-left: 5px solid #2c3e50;
  padding-left: 15px;
  font-size: 22px;
}

.book-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
  gap: 25px;
}

.book-card {
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.book-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.15); }

.card-img-wrapper { position: relative; height: 280px; overflow: hidden; }
.book-img { width: 100%; height: 100%; object-fit: cover; }

.tag {
  position: absolute; top: 10px; right: 10px;
  padding: 5px 10px; border-radius: 20px;
  font-size: 11px; color: white; font-weight: bold; text-transform: uppercase;
}
.tag-science { background: #3498db; }
.tag-skill { background: #2ecc71; }
.tag-novel { background: #9b59b6; }
.tag-biz { background: #f1c40f; color: #333; }
.tag-life { background: #e74c3c; }

.book-info { padding: 15px; display: flex; flex-direction: column; flex-grow: 1; }
.book-title { font-size: 17px; margin: 0 0 5px; color: #2c3e50; font-weight: 700; }
.book-author { font-size: 14px; color: #7f8c8d; margin-bottom: 8px; }

.stars { margin-bottom: 15px; color: #f1c40f; }
.stars .gold { color: #f1c40f; }
.stars .gray { color: #ddd; }

.btn-borrow-card {
  margin-top: auto;
  width: 100%; padding: 10px;
  background-color: #2c3e50; color: white;
  border: none; border-radius: 6px;
  cursor: pointer; font-weight: 600;
  transition: background 0.3s;
}
.btn-borrow-card:hover { background-color: #34495e; }

.no-result { text-align: center; padding: 40px; color: #7f8c8d; font-size: 18px; }

/* --- 4. MODAL STYLE --- */
.modal-overlay {
  position: fixed; top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex; justify-content: center; align-items: center;
  z-index: 2000;
}

.modal-content {
  background: white;
  width: 90%; max-width: 500px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 15px 40px rgba(0,0,0,0.3);
}

.modal-header {
  padding: 20px; text-align: center;
  border-bottom: 1px solid #eee; position: relative;
}
.modal-header h3 { margin: 0; color: #e74c3c; font-weight: 800; text-transform: uppercase; }
.close-icon { position: absolute; right: 15px; top: 15px; font-size: 28px; cursor: pointer; color: #aaa; }
.close-icon:hover { color: #e74c3c; }

.modal-body { padding: 25px; }

.selected-book-info {
  background: #fff3f3; color: #c0392b;
  padding: 10px; border-radius: 5px; margin-bottom: 20px;
  text-align: center; border: 1px dashed #e74c3c;
}

.form-group { margin-bottom: 15px; }
.form-group label { display: block; margin-bottom: 6px; font-weight: 600; color: #555; font-size: 14px; }
.form-control {
  width: 100%; padding: 10px;
  border: 1px solid #ccc; border-radius: 5px;
  font-size: 14px; box-sizing: border-box;
}
.form-control:focus { outline: none; border-color: #e74c3c; box-shadow: 0 0 5px rgba(231, 76, 60, 0.2); }

.modal-actions { display: flex; gap: 15px; margin-top: 25px; }
.btn-submit {
  flex: 1; padding: 12px;
  background: #e74c3c; color: white;
  border: none; border-radius: 5px; font-weight: bold; cursor: pointer;
}
.btn-submit:hover { background: #c0392b; }

.btn-cancel {
  flex: 1; padding: 12px;
  background: #f1f2f6; color: #555;
  border: 1px solid #ddd; border-radius: 5px; font-weight: bold; cursor: pointer;
}
.btn-cancel:hover { background: #e1e2e6; }

.footer-note { margin-top: 20px; text-align: center; font-size: 12px; color: #999; font-style: italic; }

/* Animation */
.scale-in { animation: scaleIn 0.25s ease-out; }
@keyframes scaleIn { from { transform: scale(0.9); opacity: 0; } to { transform: scale(1); opacity: 1; } }
</style>
