<?php
// Mulai sesi
session_start();

// Cek apakah user sudah login
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    include "index.php"; // Arahkan ke halaman login
    exit(); // Hentikan proses selanjutnya
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .logout-button {
            float: right;
            margin-top: -10px;
        }
    </style>
</head>
<body>

<h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['nama']); ?></h2>

<!-- Tombol Logout -->
<form method="GET" action="utama.php" class="logout-button">
    <input type="hidden" name="page" value="logout">
    <button type="submit">Logout</button>
</form>

<hr>

<?php
// Routing halaman berdasarkan parameter 'page'
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'logout':
        include "logout.php";
        break;
    default:
        echo "<p>Ini adalah halaman utama. Silakan pilih menu.</p>";
        break;
}
?>

</body>
</html>