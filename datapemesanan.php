<?php
require_once 'config/koneksi.php';
require_once 'classes/TiketKonser.php';

// Membuat objek TiketKonser
$tiketKonser = new TiketKonser($db);
$dataPemesanan = $tiketKonser->getAllPemesanan(); // Membuat method baru di class TiketKonser
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan Tiket</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stylenavbar.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .data-table th,
        .data-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background-color: #4CAF50;
            color: white;
        }

        .data-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .data-table tr:hover {
            background-color: #f5f5f5;
        }

        .search-box {
            margin: 20px 0;
            padding: 10px;
        }

        .search-box input {
            width: 300px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #666;
        }

        footer {
            margin-top: 40px;
            padding: 20px;
            text-align: center;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="logo">
                <h2>Data Pemesanan</h2>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="keterangantiket.php">Keterangan Tiket</a></li>
                <li><a href="datapemesanan.php">Data Pemesanan</a></li>
                <li><a href="kontak.php">Kontak</a></li>

               
            </ul>
        </nav>

        <main>
            <h1>Data Pemesanan Tiket Konser</h1>

            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari pemesanan..." onkeyup="searchTable()">
            </div>

            <table class="data-table" id="pemesananTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pemesan</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Konser</th>
                        <th>Jumlah Tiket</th>
                        <th>Total Harga</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($dataPemesanan)): ?>
                        <?php $no = 1; ?>
                        <?php foreach ($dataPemesanan as $pemesanan): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($pemesanan['nama_pemesan']); ?></td>
                                <td><?php echo htmlspecialchars($pemesanan['email']); ?></td>
                                <td><?php echo htmlspecialchars($pemesanan['no_telepon']); ?></td>
                                <td><?php echo htmlspecialchars($pemesanan['nama_konser']); ?></td>
                                <td><?php echo htmlspecialchars($pemesanan['jumlah_tiket']); ?></td>
                                <td>Rp <?php echo number_format($pemesanan['total_harga'], 0, ',', '.'); ?></td>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($pemesanan['tanggal_pemesanan'])); ?></td>
                                <td class="opsi">
                                <td><a href="hapuspemesanan.php?id=<?= $pemesanan['id']; ?>" onclick="return confirm('Hapus pesanan ini?')">Hapus</a></td>
                                </tr>
                        </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="no-data">Belum ada data pemesanan</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </main>

        <footer>
            <p>&copy; 2024 Sistem Pemesanan Tiket Konser</p>
        </footer>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const table = document.getElementById('pemesananTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                let show = false;
                const cells = rows[i].getElementsByTagName('td');
                
                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        show = true;
                        break;
                    }
                }
                
                rows[i].style.display = show ? '' : 'none';
            }
        }
    </script>
</body>
</html>