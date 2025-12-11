<?php
session_start();
include('connect.php');

// ถ้าไม่ได้ล็อกอิน
if (!isset($_SESSION['Mem_id'])) {
    echo "<div style='text-align:center; margin-top:50px;'>
            <h3>กรุณาล็อกอินก่อนครับ</h3>
            <a href='login.php' style='color:blue;'>ไปหน้าล็อกอิน</a>
          </div>";
    exit();
}

// ดึงค่า Mem_id จาก session
$mem_id = $_SESSION['Mem_id'];

// ตรวจสอบว่ามีค่าไหม
if (empty($mem_id)) {
    die("<div class='text-center mt-5 text-danger'>❌ ไม่มีค่า Mem_id ใน session</div>");
}

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT username, `Fullname`, email FROM member WHERE Mem_id = ?";
$stmt = mysqli_prepare($connect, $sql);
if (!$stmt) {
    die("<div class='text-center mt-5 text-danger'>SQL Error: " . mysqli_error($connect) . "</div>");
}

mysqli_stmt_bind_param($stmt, "i", $mem_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $fullname = $row['Fullname'];
    $email = $row['email'];
} else {
    die("<div class='text-center mt-5 text-danger'>ไม่พบข้อมูลสมาชิกในระบบ</div>");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>หน้าโปรไฟล์</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #e3f2fd, #bbdefb);
      font-family: 'Prompt', sans-serif;
    }
    .profile-card {
      max-width: 500px;
      margin: 80px auto;
      border-radius: 20px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .profile-header {
      background: #2196f3;
      color: white;
      padding: 30px 20px;
      border-radius: 20px 20px 0 0;
    }
    .profile-body {
      padding: 30px;
    }
    .avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: white;
      border: 4px solid #fff;
      margin: 0 auto;
      display: block;
      object-fit: cover;
    }
  </style>
</head>
<body>

<div class="card profile-card">
  <div class="profile-header text-center">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="avatar" class="avatar mb-3">
    <h3 class="mb-0"><?= htmlspecialchars($fullname); ?></h3>
    <p class="mb-0">@<?= htmlspecialchars($username); ?></p>
  </div>
  <div class="profile-body text-center">
    <h5 class="mb-3 text-primary">ข้อมูลสมาชิก</h5>
    <p><strong>อีเมล:</strong> <?= htmlspecialchars($email); ?></p>
    <hr>
    <a href="logout.php" class="btn btn-danger w-100 mt-3">ออกจากระบบ</a>
  </div>
</div>

</body>
</html>
