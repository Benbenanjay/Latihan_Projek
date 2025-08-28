<?php
include "koneksi.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = trim($_POST['login'] ?? '');
    $password = trim($_POST['pw'] ?? '');

    $sql = "SELECT * FROM users WHERE nickname = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nickname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['nickname'] = $user['nickname'];
            header("Location: home.php");
            exit;
        } else {
            echo "<script>alert('Password salah!');window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('User tidak ditemukan!');window.location.href='index.html';</script>";
    }
}
?>
