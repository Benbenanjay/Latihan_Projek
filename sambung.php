<?php
$host = "localhost"; // sesuaikan
$user = "root";      // sesuaikan
$pass = "";          // sesuaikan
$db   = "jumanji";   // sesuaikan nama database

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
