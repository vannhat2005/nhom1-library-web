<template>
    <div>
        <div class="container">
  <h2>Quản lý yêu cầu mượn</h2>
  <p class="sub">Quản lý danh sách yêu cầu mượn sách từ người dùng</p>

  <div class="search-box">
    <input type="text" placeholder="Tìm kiếm theo tên sách, sinh viên...">
  </div>

  <table>
    <thead>
      <tr>
        <th>STT</th>
        <th>TÊN SÁCH</th>
        <th>NGƯỜI MƯỢN</th>
        <th>MÃ SV</th>
        <th>NGÀY YÊU CẦU</th>
        <th>TRẠNG THÁI</th>
        <th>THAO TÁC</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Lập trình C++</td>
        <td>Nguyễn Văn A</td>
        <td>SV001</td>
        <td>2024-01-15</td>
        <td><span class="status pending">Chờ duyệt</span></td>
        <td class="actions">
          <i class="fa fa-eye"></i>
          <i class="fa fa-check"></i>
          <i class="fa fa-xmark"></i>
        </td>
      </tr>

      <tr>
        <td>2</td>
        <td>Truyện Kiều</td>
        <td>Trần Thị B</td>
        <td>SV002</td>
        <td>2024-01-16</td>
        <td><span class="status pending">Chờ duyệt</span></td>
        <td class="actions">
          <i class="fa fa-eye"></i>
          <i class="fa fa-check"></i>
          <i class="fa fa-xmark"></i>
        </td>
      </tr>

      <tr>
        <td>3</td>
        <td>Toán cao cấp</td>
        <td>Lê Văn C</td>
        <td>SV003</td>
        <td>2024-01-17</td>
        <td><span class="status approved">Đã duyệt</span></td>
        <td class="actions">
          <i class="fa fa-eye"></i>
        </td>
      </tr>

      <tr>
        <td>4</td>
        <td>Lịch sử Việt Nam</td>
        <td>Hoàng Văn E</td>
        <td>SV005</td>
        <td>2024-01-19</td>
        <td><span class="status reject">Từ chối</span></td>
        <td class="actions">
          <i class="fa fa-eye"></i>
        </td>
      </tr>
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
body {
  font-family: Arial, sans-serif;
  background: #f5f6f8;
  margin: 0;
}

.container {
  width: 100%;
  margin: 0px auto;
  background: white;
  padding: 20px 25px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

h2 {
  margin-bottom: 5px;
}

.sub {
  color: #777;
  font-size: 14px;
  margin-bottom: 20px;
  border-bottom: solid ;
}

.search-box {
  margin-bottom: 15px;
}

.search-box input {
  width: 300px;
  padding: 10px 14px;
  border-radius: 6px;
  border: 1px solid #ddd;
  outline: none;
}

table {
  width: 100%;
  border-collapse: collapse;
}

thead {
  background: #f0f2f5;
}

th, td {
  padding: 12px 10px;
  text-align: left;
  border-bottom: 1px solid #eee;
  font-size: 14px;
}

.status {
  padding: 5px 10px;
  border-radius: 20px;
  font-size: 12px;
  font-weight: bold;
}

.pending {
  background: #fff3cd;
  color: #856404;
}

.approved {
  background: #d4edda;
  color: #155724;
}

.reject {
  background: #f8d7da;
  color: #721c24;
}

.actions i {
  margin-right: 10px;
  cursor: pointer;
}

.actions .fa-eye {
  color: #007bff;
}

.actions .fa-check {
  color: green;
}

.actions .fa-xmark {
  color: red;
}
</style>