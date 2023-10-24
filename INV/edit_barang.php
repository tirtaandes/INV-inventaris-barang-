<?php
include 'header.php';

$nama_barang = $deskripsi = $jumlah = $harga = '';
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

    // Query untuk mengambil data barang berdasarkan ID
    $sql = "SELECT * FROM barang WHERE id = $barang_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nama_barang = $row['nama_barang'];
        $deskripsi = $row['deskripsi'];
        $jumlah = $row['jumlah'];
        $harga = $row['harga'];
    } else {
        echo "Data barang tidak ditemukan.";
    }
}
?>

<div class="container">
    <h2>Edit Barang</h2>
    <form action="edit_barang.php?id=<?php echo $barang_id; ?>" method="POST">
        <div class="form-group">
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" required><?php echo $deskripsi; ?></textarea>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" name="jumlah" value="<?php echo $jumlah; ?>" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" name="harga" value="<?php echo $harga; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary" name="simpan">Simpan Perubahan</button>
    </form>
</div>

<?php
include 'footer.php';
?>
