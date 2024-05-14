<?php
include  'koneksi.php';  //memanggil file koneksi.

// Tangkap data dari halaman pemesanan
$nama_pemesan = $_POST['nama_pemesan'];
$nomor_hp = $_POST['nomor_hp'];
$durasi = $_POST['durasi'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$paket_perjalanan = implode(", ", $_POST['paket_perjalanan']);
$harga_paket = $_POST['harga_paket'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];

// Tampilkan rangkuman pesanan dalam halaman HTML
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Rangkuman Pesanan</title>";
echo "<link rel='stylesheet' href='style.css'>";
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<h2>Rangkuman Pesanan</h2>";
echo "<div class='summary'>";
echo "<p><strong>Nama Pemesan:</strong> $nama_pemesan</p>";
echo "<p><strong>Nomor HP:</strong> $nomor_hp</p>";
echo "<p><strong>Durasi Pelaksanaan:</strong> $durasi hari</p>";
echo "<p><strong>Jumlah Peserta:</strong> $jumlah_peserta orang</p>";
echo "<p><strong>Paket Perjalanan:</strong> $paket_perjalanan</p>";
echo "<p><strong>Harga Paket:</strong> $harga_paket</p>";
echo "<p><strong>Jumlah Tagihan:</strong> $jumlah_tagihan</p>";
echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>";

// Masukkan data ke dalam database
$sql = "INSERT INTO pesanan (nama_pemesan, nomor_hp, durasi, jumlah_peserta, paket_perjalanan, harga_paket, jumlah_tagihan)
VALUES ('$nama_pemesan', '$nomor_hp', '$durasi', '$jumlah_peserta', '$paket_perjalanan', '$harga_paket', '$jumlah_tagihan')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan."; 
    echo "<br><br>";
    echo "<a href='detail-pemesanan.php' class='button'>Lihat Detail Pesanan</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
