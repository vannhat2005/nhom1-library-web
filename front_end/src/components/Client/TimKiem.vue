<template>
  <div class="search-page">
    <!-- TIÊU ĐỀ -->
    <h2 class="title">TRA CỨU - TÌM KIẾM SÁCH</h2>

    <!-- FORM TÌM KIẾM -->
    <div class="search-form">
      <div class="form-group">
        <label>Tên sách</label>
        <input type="text" placeholder="Nhập tên sách" />
      </div>

    <div class="form-group">
      <label>Tác giả:</label>
      <input type="text" placeholder="Nhập tên tác giả" />
    </div>

      <div class="form-group">
      <label>Thể loại:</label>
      <select>
        <option>Chọn thể loại</option>
        <option>CNTT</option>
        <option>Văn học</option>
        <option>Khoa học</option>
      </select>
    </div>

      <div class="form-group">
        <label>Năm xuất bản</label>
        <input type="number" placeholder="Nhập năm" />
      </div>

      <!-- BUTTON -->
      <div class="button-group">
        <button class="btn-search">Tìm kiếm</button>
        <button class="btn-reset">Làm mới</button>
      </div>
    </div>

    <!-- KẾT QUẢ -->
    <h3 class="result-title">KẾT QUẢ TÌM KIẾM</h3>

    <table class="result-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên sách</th>
          <th>Tác giả</th>
          <th>Thể loại</th>
          <th>Năm XB</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>1</td>
          <td>Lập trình Java</td>
          <td>Nguyễn Văn A</td>
          <td>CNTT</td>
          <td>2022</td>
          <td><span class="status-available">Còn sách</span></td>
          <td><button class="btn-borrow">Mượn sách</button></td>
        </tr>

        <tr>
          <td>2</td>
          <td>Văn học Việt Nam</td>
          <td>Trần B</td>
          <td>Văn học</td>
          <td>2020</td>
          <td><span class="status-unavailable">Hết sách</span></td>
          <td><button class="btn-borrow" disabled>Không khả dụng</button></td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
    
}
</script>

<style scoped>
.search-page {
  padding: 20px;
  background: #f8f9fa;
}

.title {
  text-align: center;
  color: #d32f2f;
  margin-bottom: 20px;
}

.search-form {
  background: #ffffff;
  padding: 20px;
  border-radius: 6px;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 15px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  font-weight: 600;
  margin-bottom: 5px;
}

.form-group input,
.form-group select {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.button-group {
  grid-column: span 2;
  display: flex;
  gap: 12px;
}

/* Nút tìm kiếm */
.btn-search {
  background-color: #ffffff;
  color: #e53935;
  border: 1.5px solid #e53935;
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 600;
  cursor: pointer;  
}

.btn-search:hover {
  background-color: #fdecea;
}

/* Nút làm mới */
.btn-reset {
  background-color: #ffffff;
  color: #e53935;
  border: 1.5px solid #e53935;
  padding: 8px 16px;
  border-radius: 20px;
  font-weight: 600;
  cursor: pointer;
}

.btn-reset:hover {
  background-color: #fdecea;
}

.result-title {
  margin: 25px 0 10px;
  font-weight: bold;
}

.result-table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
}

.result-table th,
.result-table td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: center;
}

.result-table th {
  background: #eeeeee;
}

.status-available {
  color: green;
  font-weight: bold;
}

.status-unavailable {
  color: red;
  font-weight: bold;
}

.btn-borrow {
  background: blue;
  color: #fff;
  border: none;
  padding: 6px 12px;
  border-radius: 4px;
  cursor: pointer;
}

.btn-borrow:disabled {
  background: #bdbdbd;
  cursor: not-allowed;
}
</style>
