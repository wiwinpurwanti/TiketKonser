<?php
require_once 'config/koneksi.php';
require_once 'classes/TiketKonser.php';

// Membuat objek TiketKonser dan mendapatkan daftar konser
$tiketKonser = new TiketKonser($db);
$daftarKonser = $tiketKonser->getDaftarKonser(); // Ambil daftar konser

// Cek jika ada data pemesanan yang dikirimkan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menyusun data pemesanan dari form
    $dataPemesanan = [
        'nama_pemesan' => $_POST['nama_pemesan'],
        'email' => $_POST['email'],
        'no_telepon' => $_POST['no_telepon'],
        'id_konser' => $_POST['id_konser'],
        'jumlah_tiket' => $_POST['jumlah_tiket']
    ];
    
    // Proses pemesanan tiket
    $hasil = $tiketKonser->pesanTiket($dataPemesanan);
    $pesanStatus = $hasil; // Menampilkan status pemesanan
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket Konser</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stylenavbar.css">
    <style>
                footer {
            background-color: #f1f1f1; /* Example footer background */
            padding: 10px; /* Add some padding */
            text-align: center; /* Center the text */
        }
        </style>    



</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="logo">
                <h2>Pemesanan Tiket</h2>
            </div>
            <ul class="nav-links">
                <li><a href="">Beranda</a></li>
                <li><a href="keterangantiket.php">Keterangan Tiket</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                
            </ul>
        </nav>

        <header>
            <h1>Pemesanan Tiket Konser</h1>
        </header>
        
        <!-- Menampilkan Pesan Status -->
        <?php if(isset($pesanStatus)): ?>
            <div class="alert <?php echo $pesanStatus['status']; ?>">
                <?php echo $pesanStatus['message']; ?>
            </div>
        <?php endif; ?>

        <main>
            <section class="daftar-konser">
                <h2>Konser yang Tersedia</h2>

                <!-- Cek jika $daftarKonser tidak kosong -->
                <?php if (!empty($daftarKonser)): ?>
                    <div class="konser-grid">
                        <?php foreach($daftarKonser as $konser): ?>
                            <div class="konser-card">
                                <h3><?php echo $konser['nama_konser']; ?></h3>
                                <p class="tanggal"><?php echo date('d F Y', strtotime($konser['tanggal'])); ?></p>
                                <p class="lokasi"><?php echo $konser['lokasi']; ?></p>
                                <p class="harga">Rp <?php echo number_format($konser['harga'], 0, ',', '.'); ?></p>
                                <p class="stok">Sisa tiket: <?php echo $konser['stok_tiket']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a href="formtiket.php" class="btn-pesan" style="background-color: #28a745; color: white; padding: 10px 20px; font-size: 16px; border: none; border-radius: 5px; text-align: center; text-decoration: none;">Pesan Tiket</a>
                <?php else: ?>
                    <p>Tidak ada konser yang tersedia saat ini.</p>
                <?php endif; ?>
            </section>
        </main>
        
        <footer>
            <p>&copy; 2024 Sistem Pemesanan Tiket Konser</p>
        </footer>
    </div>
</body>
</html>