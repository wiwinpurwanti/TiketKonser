<?php
// Koneksi ke database
$host = "localhost";    // Ganti dengan host database Anda
$user = "root";         // Ganti dengan username database Anda
$password = "";         // Ganti dengan password database Anda
$dbname = "19046_psas"; // Nama database

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mengambil data pemesanan
$query_pemesanan = "SELECT * FROM pemesanan";
$result_pemesanan = mysqli_query($conn, $query_pemesanan);

// Cek apakah ada data pemesanan
if (!$result_pemesanan) {
    die("Query pemesanan gagal: " . mysqli_error($conn));
}

// Mengambil data konser
$query_konser = "SELECT * FROM konser";
$result_konser = mysqli_query($conn, $query_konser);

// Cek apakah ada data konser
if (!$result_konser) {
    die("Query konser gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Data Pemesanan & Konser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f5e0b7; /* Warna cream untuk header tabel */
            color: #4b3f2f; /* Warna coklat gelap untuk teks header tabel */
        }

        table tr:nth-child(even) {
            background-color: #f9f4e6; /* Warna cream muda untuk baris genap */
        }

        table tr:hover {
            background-color: #f0e0c9; /* Warna cream lebih gelap saat hover */
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #666;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            text-align: center;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Tombol Logout */
        .logout-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #f44336; /* Merah untuk tombol logout */
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<!-- Tombol Logout -->
<a href="logout.php">
    <button class="logout-btn">Logout</button>
</a>

<div class="container">
    <h1>Data Pemesanan Tiket</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pemesan</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>ID Konser</th>
                <th>Jumlah Tiket</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Tanggal Pemesanan</th>
                <th>Status Terima</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result_pemesanan) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result_pemesanan)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['nama_pemesan']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['no_telepon']); ?></td>
                        <td><?= htmlspecialchars($row['id_konser']); ?></td>
                        <td><?= htmlspecialchars($row['jumlah_tiket']); ?></td>
                        <td>Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($row['status_pembayaran']); ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($row['tanggal_pemesanan'])); ?></td>
                        <td><?= htmlspecialchars($row['status_terima']); ?></td>
                        <td>
                            <a href="hapus_pemesanan.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus pemesanan ini?')">
                                <button>Hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11" class="no-data">Belum ada data pemesanan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h1>Data Konser</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Konser</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Harga</th>
                <th>Stok Tiket</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result_konser) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result_konser)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['nama_konser']); ?></td>
                        <td><?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                        <td><?= htmlspecialchars($row['lokasi']); ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($row['stok_tiket']); ?></td>
                        <td>
                            <a href="edit_konser.php?id=<?= $row['id']; ?>">
                                <button>Edit</button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="no-data">Belum ada data konser</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($conn);
?>
