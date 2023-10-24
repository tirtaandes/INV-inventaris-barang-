<?php
include 'header.php';
?>

<h2>Tambah Barang</h2>
<form action="proses_input.php" method="POST">
    <div class="form-group">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" name="nama_barang" required>
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi"></textarea>
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" required>
    </div>

    <div class="form-group">
        <label for="harga">Harga:</label>
        <input type="text" name="harga" required>
    </div>

    <div class="form-group">
        <input type="submit" value="Simpan">
    </div>
</form>

<?php
include 'footer.php';
?>
