<?php
include('connect.php');

$username = $_POST['username'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];  // ตรงกับคอลัมน์ Fullname
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if (empty($username) || empty($email) || empty($fullname) || empty($password) || empty($confirm_password)) {
    die("กรุณากรอกข้อมูลให้ครบทุกช่อง");
}

if ($password != $confirm_password) {
    die("รหัสผ่านไม่ตรงกัน");
}

// เข้ารหัสรหัสผ่าน
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// ✅ ปรับชื่อคอลัมน์ให้ตรงกับฐานข้อมูลจริง (Fullname)
$sql = "INSERT INTO member (username, email, Fullname, password) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($connect, $sql);

if (!$stmt) {
    die("เกิดข้อผิดพลาดในการเตรียมคำสั่ง SQL: " . mysqli_error($connect));
}

// ผูกค่า
mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $fullname, $hashed_password);

// รันคำสั่ง
if (mysqli_stmt_execute($stmt)) {
    echo "สมัครสมาชิกสำเร็จ <a href='login.php'>ไปหน้าเข้าสู่ระบบ</a>";
} else {
    echo "บันทึกข้อมูลล้มเหลว: " . mysqli_error($connect);
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
