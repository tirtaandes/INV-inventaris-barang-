<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];

    // Mengambil tanggal dan waktu saat input
    $tanggal_masuk = date('Y-m-d H:i:s');

    // Koneksi ke database (sesuaikan dengan konfigurasi Anda)
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "inventaris_barang";
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk menyimpan data barang
    $sql = "INSERT INTO barang (nama_barang, deskripsi, jumlah, harga, tanggal_masuk) VALUES ('$nama_barang', '$deskripsi', $jumlah, $harga, '$tanggal_masuk')";

    if ($conn->query($sql) === TRUE) {
        // Data berhasil disimpan, alihkan kembali ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
