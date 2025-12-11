<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>สมัครสมาชิก</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
          <h3 class="text-center mb-4 text-primary">สมัครสมาชิก</h3>
          
          <form action="register_save.php" method="POST">
            
            <div class="mb-3">
              <label for="username" class="form-label">ชื่อผู้ใช้ (Username)</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">อีเมล</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
              <label for="fullname" class="form-label">ชื่อ - นามสกุล</label>
              <input type="text" class="form-control" id="fullname" name="fullname" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">รหัสผ่าน</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
              <label for="confirm_password" class="form-label">ยืนยันรหัสผ่าน</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">สมัครสมาชิก</button>
            </div>

          </form>
        </div>
      </div>

      <p class="text-center mt-3">
        มีบัญชีอยู่แล้ว? <a href="login.html">เข้าสู่ระบบ</a>
      </p>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
