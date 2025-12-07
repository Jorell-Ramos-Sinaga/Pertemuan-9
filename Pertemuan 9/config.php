<?php
// Konfigurasi Database
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'pendaftaran_siswa';

// Koneksi ke Database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset ke utf8
mysqli_set_charset($koneksi, "utf8");
?>
