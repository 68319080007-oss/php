<?php
$host = "localhost";    // หรือ 127.0.0.1
$user = "root";         // ค่าเริ่มต้นของ XAMPP
$pass = "";             // ถ้ายังไม่ได้ตั้งรหัส MySQL ให้เว้นว่าง
$dbname = "007"; // ← แก้ให้ตรงกับชื่อฐานข้อมูลใน phpMyAdmin

$connect = mysqli_connect($host, $user, $pass, $dbname);

if (!$connect) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}
?>
