<template>
  <div class="auth-wrapper auth-wrapper--active">
    <div class="auth-card">
      <div class="remove">
        <i class="remove_icon fa-solid fa-xmark"></i>
      </div>

      <h1>Welcome Back</h1>
      <p>Please enter your details to access your account</p>

      <!-- Tabs -->
      <div class="tabs">
        <button id="tab__registry" class="tab">Register</button>
        <button id="tab__login" class="tab active">Login</button>
      </div>
      <!-- Register Form -->
      <form id="formRegister" class="form">
        <div class="form-group">
          <label>Email</label>
          <div class="input-box">
            <input
              id="email"
              type="email"
              name="email"
              placeholder="Nhap vao email@.com cua ban..."
            />
          </div>
          <span class="form-Messege"></span>
        </div>

        <div class="form-group">
          <div class="label-row">
            <label>Password</label>
          </div>
          <div class="input-box">
            <input
              id="password"
              type="password"
              name="password"
              placeholder="Nhập vào password..."
            />
            <span class="eye">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>
          <span class="form-Messege"></span>
        </div>

        <div class="form-group">
          <div class="input-box">
            <input
              id="confirm-password"
              type="password"
              name="confirm"
              placeholder="Xác nhận lại password..."
            />
            <span class="eye">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>
          <span class="form-Messege"></span>
        </div>

        <div class="options">
          <!-- <label class="checkbox">
            <input type="checkbox" />
            Remember me for 30 days
          </label> -->
        </div>

        <button type="submit" class="btn-primary">Register</button>

        <!-- <div class="divider">
          <span>OR CONTINUE WITH</span>
        </div>

        <div class="social-login">
          <button class="btn-social">
            <img src="https://www.svgrepo.com/show/475656/google-color.svg" />
            Google
          </button>
          <button class="btn-social">
            <img src="https://www.svgrepo.com/show/475654/github-color.svg" />
            GitHub
          </button>
        </div> -->
      </form>

      <!-- Login Form -->
      <form id="formLogin" class="form active_form">
        <div class="form-group">
          <label>Email</label>
          <div class="input-box">
            <input
              id="login-email"
              type="email"
              name="email"
              placeholder="Nhap vao email@.com cua ban..."
            />
          </div>
          <span class="form-Messege"></span>
        </div>

        <div class="form-group">
          <div class="label-row">
            <label>Password</label>
            <a href="#" class="link">Forgot password?</a>
          </div>
          <div class="input-box">
            <input
              id="login-password"
              type="password"
              name="password"
              placeholder="Nhap vao password..."
            />
            <span class="eye">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>
          <span class="form-Messege"></span>
        </div>
        <button type="submit" class="btn-primary">Sign In</button>
      </form>
    </div>
  </div>
</template>



<script>
export default {
    
}
</script>
<style>
    .auth-wrapper {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.55);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  }
/* .auth-wrapper--active{
    display: none;
  } */
  
  .remove{
    display: block;
    text-align: end;
  }
  .remove_icon{
    padding: 5px;
    font-size: 1.4rem;
    color: #999;

  }
.remove_icon:hover{
    background-color: rgb(225, 8, 8);
    color: #eee;
}

  .auth-card {
    max-width: 420px;
    width: 100%;
    background: #fff;
    border-radius: 16px;
    padding: 0 32px 32px 32px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    animation: modalFade 0.25s ease;
  }
  
  @keyframes modalFade {
    from {
      opacity: 0;
      transform: scale(0.96);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }
  
  .auth-card h1 {
    text-align: center;
    color: var(--primary);
  }
  
  .tab.active {
    color: var(--pink-primary);
    border-bottom: 2px solid var(--pink-hover);
  }
.form{
  display: none;
}
  .active_form{
    display: block;
  }

  
  .btn-primary {
    background: linear-gradient(
      135deg,
      var(--pink-primary),
      var(--pink-hover)
    );
  }
  
  
  /* Tabs */
  .tabs {
    display: flex;
    border-bottom: 1px solid #eee;
    margin-bottom: 24px;
  }
  
  .tab {
    flex: 1;
    padding: 12px;
    background: none;
    border: none;
    font-weight: 600;
    cursor: pointer;
    color: #aaa;
  }
  
  .tab.active {
    color: var(--primary);
    border-bottom: 2px solid var(--bg-card);
  }
  
  /* Form */
  .form-group {
    margin-bottom: 16px;
  }

  
  label {
    font-size: 14px;
    margin-bottom: 6px;
    display: block;
  }
  
  .label-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .link {
    font-size: 13px;
    color: #666;
    text-decoration: none;
  }
  
  .input-box {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 12px;
  }
  
  .input-box input {
    border: none;
    outline: none;
    flex: 1;
    font-size: 14px;
  }
  
  .input-box .material-symbols-outlined {
    font-size: 20px;
    color: #999;
  }
  
  .eye {
    cursor: pointer;
  }
  
  /* Options */
  .options {
    margin-bottom: 20px;
  }
  
  .checkbox {
    font-size: 14px;
    color: #555;
  }
  
  .checkbox input {
    margin-right: 6px;
  }
  
  /* Buttons */
  .btn-primary {
    width: 100%;
    padding: 14px;
    border-radius: 10px;
    border: none;
    background: rgb(28, 50, 250);
    color: #fff;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
  }
  
  .btn-primary:hover {
    opacity: 0.95;
  }
  
  /* Divider */
  .divider {
    text-align: center;
    margin: 24px 0;
    position: relative;
  }
  
  .divider span {
    font-size: 12px;
    color: #999;
    background: #fff;
    padding: 0 10px;
  }
  
  .divider::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
    height: 1px;
    background: #eee;
    z-index: -1;
  }
  
  /* Social */
  .social-login {
    display: flex;
    gap: 12px;
  }
  
  .btn-social {
    flex: 1;
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #ddd;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    cursor: pointer;
    font-weight: 500;
  }
  
  .btn-social img {
    width: 18px;
    height: 18px;
  }
</style>