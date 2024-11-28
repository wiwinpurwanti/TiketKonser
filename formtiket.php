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
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f3e3; /* Warna cream */
            color: #333;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            font-size: 36px;
            margin-bottom: 30px;
        }

        /* Form styling */
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #2c3e50;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[type="number"] {
            -moz-appearance: textfield;
        }

        .form-group input[type="number"]::-webkit-outer-spin-button, 
        .form-group input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Button Styling */
        .btn-pesan {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #27ae60; /* Warna hijau */
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .btn-pesan:hover {
            background-color: #2ecc71;
        }

        /* Alert Message */
        .alert {
            margin: 20px 0;
            padding: 15px;
            background-color: #f1c40f;
            color: white;
            border-radius: 4px;
            text-align: center;
        }

        .alert.success {
            background-color: #2ecc71;
        }

        .alert.error {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
<h2>Form Pemesanan Tiket Konser</h2>

<!-- Menampilkan Pesan Status -->
<?php if (isset($pesanStatus)): ?>
    <div class="alert <?php echo $pesanStatus['status']; ?>">
        <?php echo $pesanStatus['message']; ?>
    </div>
<?php endif; ?>

<form method="POST" action="">
    <div class="form-group">
        <label for="nama_pemesan">Nama Lengkap:</label>
        <input type="text" id="nama_pemesan" name="nama_pemesan" required>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="no_telepon">No. Telepon:</label>
        <input type="text" id="no_telepon" name="no_telepon" required>
    </div>

    <div class="form-group">
        <label for="id_konser">Pilih Konser:</label>
        <select id="id_konser" name="id_konser" required>
            <option value="">-- Pilih Konser --</option>
            <?php foreach($daftarKonser as $konser): ?>
                <option value="<?php echo $konser['id']; ?>">
                    <?php echo $konser['nama_konser']; ?> - 
                    Rp <?php echo number_format($konser['harga'], 0, ',', '.'); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="jumlah_tiket">Jumlah Tiket:</label>
        <input type="number" id="jumlah_tiket" name="jumlah_tiket" min="1" required>
    </div>

    <button type="submit" class="btn-pesan">Pesan Tiket</button>
</form>

</body>
</html>
