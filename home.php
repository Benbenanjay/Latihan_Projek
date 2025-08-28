<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['nickname'])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Jumanji</title>
</head>
<body>
  <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION['nickname']); ?>!</h1>
  <p>Ini halaman home.</p>
  <a href="logout.php">Logout</a>
</body>
</html>
