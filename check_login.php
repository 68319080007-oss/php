<?php
session_start();
include('connect.php');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    echo "<script>alert('กรุณากรอกชื่อผู้ใช้และรหัสผ่าน'); window.history.back();</script>";
    exit();
}

$sql = "SELECT * FROM member WHERE username = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
        // เก็บข้อมูลไว้ใน session
        $_SESSION['Mem_id'] = $row['Mem_id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['fullname'] = $row['Fullname'];

        echo "<script>alert('เข้าสู่ระบบสำเร็จ'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('รหัสผ่านไม่ถูกต้อง'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('ไม่พบบัญชีผู้ใช้ในระบบ'); window.history.back();</script>";
}

mysqli_stmt_close($stmt);
mysqli_close($connect);
?>
