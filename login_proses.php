<?php
session_start();

// Konfigurasi koneksi database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_kopikisah";

// Koneksi ke MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Escape input
$username = $conn->real_escape_string($username);
$password = $conn->real_escape_string($password);

// Query cek user
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $_SESSION['login_status'] = 'success';
    // $_SESSION['username'] = $username;
} else {
    $_SESSION['login_status'] = 'failed';
}

$conn->close();
header("Location: login.php");
exit;