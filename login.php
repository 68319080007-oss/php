<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>เข้าสู่ระบบ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
          <h3 class="text-center mb-4 text-primary">เข้าสู่ระบบ</h3>

          <form action="check_login.php" method="POST">
            
            <div class="mb-3">
              <label for="username" class="form-label">ชื่อผู้ใช้ (Username)</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">รหัสผ่าน</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-lg">เข้าสู่ระบบ</button>
            </div>
          </form>
        </div>
      </div>

      <p class="text-center mt-3">
        ยังไม่มีบัญชี? <a href="register_form.php">สมัครสมาชิก</a>
      </p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
