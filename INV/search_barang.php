<?php
include 'header.php';

if (isset($_GET['submit'])) {
    // Ambil kriteria pencarian dari formulir
    $search = $_GET['search'];

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

    // Query untuk mencari barang berdasarkan kriteria
    $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%' OR deskripsi LIKE '%$search%' OR jumlah = '$search' OR harga = '$search'";
    $result = $conn->query($sql);
}
?>

<h2>Pencarian Barang</h2>

<form action="search_barang.php" method="GET">
    <input type="text" name="search" placeholder="Masukkan kriteria pencarian">
    <input type="submit" name="submit" value="Cari">
</form>


<?php
if (isset($result) && $result->num_rows > 0) {
    echo "<h3>Hasil Pencarian:</h3>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Nama Barang</th>";
    echo "<th>Deskripsi</th>";
    echo "<th>Jumlah</th>";
    echo "<th>Harga</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nama_barang'] . "</td>";
        echo "<td>" . $row['deskripsi'] . "</td>";
        echo "<td>" . $row['jumlah'] . "</td>";
        echo "<td>" . $row['harga'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} elseif (isset($_GET['submit'])) {
    echo "Tidak ada hasil yang ditemukan.";
}
?>

<?php
include 'footer.php';
?>
