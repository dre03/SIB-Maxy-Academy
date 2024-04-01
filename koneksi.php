<?php
// Konfigurasi koneksi database
$host = 'localhost';
$dbname = 'db_penduduk';
$username = 'root';
$password = '';

// Buat koneksi
$koneksi = mysqli_connect($host, $username, $password, $dbname);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
