<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Koneksi ke database (sesuaikan dengan konfigurasi Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "inventaris_barang";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data laporan berdasarkan tanggal
    $sql = "SELECT * FROM laporan WHERE tanggal BETWEEN '$start_date' AND '$end_date'";
    $result = $conn->query($sql);
}
?>

<h2>Laporan</h2>

<form action="laporan.php" method="POST">
    <label for="start_date">Dari Tanggal:</label>
    <input type="date" name="start_date" required>

    <label for="end_date">Hingga Tanggal:</label>
    <input type="date" name="end_date" required>

    <input type="submit" value="Generate Laporan">
</form>

<?php
if (isset($result) && $result->num_rows > 0) {
    echo "<h3>Hasil Laporan:</h3>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Tanggal</th>";
    echo "<th>Jumlah Barang</th>";
    echo "<th>Total Penjualan</th>";
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['tanggal'] . "</td>";
        echo "<td>" . $row['jumlah_barang'] . "</td>";
        echo "<td>" . $row['total_penjualan'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "Tidak ada hasil yang ditemukan.";
}
?>

<?php
include 'footer.php';
?>
