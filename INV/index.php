<?php
include 'header.php';
?>
    <div class="search-box">
    <input type="text" placeholder="Cari data...">
    <button type="submit">Cari</button>
</div>

    <body>
            <div class="container">
            <h2>Halaman Utama</h2>
    
            <!-- Kartu untuk menampilkan data dari tabel barang -->
            <div class="card">
                <h3>Daftar Barang</h3>
                <p>Jumlah Barang: 100</p>
                <a href="daftar_barang.php">Lihat Detail</a>
            </div>
    
            <!-- Kartu untuk menampilkan data dari tabel pengguna -->
            <div class="card">
                <h3>Daftar Pengguna</h3>
                <p>Jumlah Pengguna: 50</p>
                <a href="daftar_pengguna.php">Lihat Detail</a>
            </div>
    
            <!-- Kartu untuk menampilkan data dari tabel lainnya -->
            <div class="card">
                <h3>Data Lainnya</h3>
                <p>Jumlah Data: 25</p>
                <a href="data_lainnya.php">Lihat Detail</a>
            </div>
        </div>
    </body>
    <?php
    include 'footer.php';
    ?>
    
