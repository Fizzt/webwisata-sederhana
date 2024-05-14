<?php
// Sambungkan ke database
include  'koneksi.php'; 

// Hapus pesanan jika tombol hapus ditekan
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM pesanan WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: detail-pemesanan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ubah pesanan jika tombol ubah ditekan
if (isset($_POST['ubah'])) {
    // Tangkap data yang diubah dari form
    $id = $_POST['id'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $nomor_hp = $_POST['nomor_hp'];
    $durasi = $_POST['durasi'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $paket_perjalanan = implode(", ", $_POST['paket_perjalanan']);
    $harga_paket = $_POST['harga_paket'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    // Update data di database
    $sql = "UPDATE pesanan SET nama_pemesan='$nama_pemesan', nomor_hp='$nomor_hp', durasi='$durasi', jumlah_peserta='$jumlah_peserta', paket_perjalanan='$paket_perjalanan', harga_paket='$harga_paket', jumlah_tagihan='$jumlah_tagihan' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: detail-pemesanan.php----");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
