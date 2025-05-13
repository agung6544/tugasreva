<?php
// Konfigurasi database
$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'db_login';

// Membuat koneksi
$koneksi = mysqli_connect($server, $username, $password, $database);

// Cek koneksi
if (mysqli_connect_errno()) {
    echo 'Koneksi gagal: ' . 
    mysqli_connect_error();
    exit();
}
// Jika ingin menampilkan pesan berhasil:
else {
     echo 'Koneksi berhasil';
 }
?>