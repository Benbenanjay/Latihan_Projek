<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = trim($_POST['name'] ?? '');
    $password = trim($_POST['pw'] ?? '');
    $cpassword = trim($_POST['cpw'] ?? '');

    if ($password !== $cpassword) {
        echo "<script>alert('Password tidak sama!');window.location.href='pendaftaran.html';</script>";
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nickname, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nickname, $passwordHash);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil, silakan login!');window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Nickname sudah dipakai atau error lainnya!');window.location.href='pendaftaran.html';</script>";
    }
}
?>
