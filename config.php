<?php
// Konfigurasi Database
$host = 'sql209.infinityfree.com';
$user = 'if0_40616880';
$password = 'jorell06';
$database = 'if0_40616880_database';

// Koneksi ke Database
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset ke utf8
mysqli_set_charset($koneksi, "utf8");
?>
