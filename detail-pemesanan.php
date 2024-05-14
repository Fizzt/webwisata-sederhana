<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="style_detail.css">
</head>
<body>
    <div class="container">
        <h2>Detail Pesanan</h2>
        <table  border="1">
            <thead>
                <tr class="table-header">
                    <th>Nama Pemesan</th>
                    <th>Nomor HP</th>
                    <th>Durasi</th>
                    <th>Jumlah Peserta</th>
                    <th>Paket Perjalanan</th>
                    <th>Harga / Orang</th>
                    <th>Jumlah Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data pesanan ditampilkan di sini -->
                <?php
                // Sambungkan ke database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "pemesanan_paket";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Ambil data pesanan dari database
                $sql = "SELECT * FROM pesanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Tampilkan data pesanan dalam tabel
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nama_pemesan"] . "</td>";
                        echo "<td>" . $row["nomor_hp"] . "</td>";
                        echo "<td>" . $row["durasi"] . "</td>";
                        echo "<td>" . $row["jumlah_peserta"] . "</td>";
                        echo "<td>" . $row["paket_perjalanan"] . "</td>";
                        echo "<td>" . $row["harga_paket"] . "</td>";
                        echo "<td>" . $row["jumlah_tagihan"] . "</td>";
                        echo "<td>";
                        echo "<form action='ubah_hapus_pesanan.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' name='ubah'>Ubah</button>";
                        echo "<button type='submit' name='hapus'>Hapus</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Tidak ada data pesanan.";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="button-group">
            <br>
            <a href="pemesanan.html" class="button">Kembali ke Pemesanan</a>
            <!-- Tambahkan tombol lain jika diperlukan -->
        </div>
    </div>
</body>
</html>
