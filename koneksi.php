<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pemesanan_paket";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>