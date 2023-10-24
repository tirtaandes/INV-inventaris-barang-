<?php
include 'header.php';

// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
$host = "localhost";
$username = "root";
$password = "";
$database = "inventaris_barang";
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Query untuk mengambil data barang dari database, termasuk tanggal masuk
$sql = "SELECT * FROM barang";
$result = $conn->query($sql);
?>

<h2>Daftar Barang</h2>
<table>
    <tr>
        <th>Nama Barang</th>
        <th>Deskripsi</th>
        <th>Jumlah</th>
        <th>Harga</th>
        <th>Tanggal Masuk</th> <!-- Tambahkan kolom tanggal masuk -->
        <th>Aksi</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . $row['deskripsi'] . "</td>";
            echo "<td>" . $row['jumlah'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['tanggal_masuk'] . "</td>"; // Tampilkan tanggal masuk
            echo '<td><a href="edit_barang.php?id=' . $row['id'] . '">Edit</a> | <a href="hapus_barang.php?id=' . $row['id'] . '">Hapus</a></td>';
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada barang yang ditemukan.</td></tr>";
    }
    ?>
</table>

<?php
include 'footer.php';
?>
