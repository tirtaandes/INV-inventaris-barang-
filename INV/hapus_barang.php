<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $barang_id = $_GET['id'];

    // Koneksi ke database (sesuaikan dengan konfigurasi Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "inventaris_barang";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk menghapus data barang berdasarkan ID
    $sql = "DELETE FROM barang WHERE id = $barang_id";

    if ($conn->query($sql) === TRUE) {
        // Data berhasil dihapus, alihkan kembali ke halaman utama
        header("Location: daftar-barang.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
