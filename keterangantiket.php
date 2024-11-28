<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keterangan Tiket Konser</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stylenavbar.css">

    <style>
        /* Styling untuk tombol */
        .btn-tiket {
            background-color: #4CAF50; /* Hijau */
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
        }
                footer {
            background-color: #f1f1f1; /* Example footer background */
            padding: 10px; /* Add some padding */
            text-align: center; /* Center the text */
        }
        .btn-tiket:hover {
            background-color: #45a049;
        }

        /* Styling untuk deskripsi yang tersembunyi */
        .tiket-deskripsi {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .tiket-detail {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="logo">
                <h2>Keterangan Tiket</h2>
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="keterangantiket.php">Keterangan Tiket</a></li>
                 <li><a href="kontak.php">Kontak</a></li>
                
            </ul>
        </nav>

        <header>
            <h1>Keterangan Tiket Konser</h1>
        </header>

        <main>
            <section class="keterangan-tiket">
                <h2>Penjelasan Tentang Tiket Konser</h2>

                <!-- Konser Musik Rock -->
                <div class="tiket-detail">
                    <h3>1. Konser Musik Rock</h3>
                    <button class="btn-tiket" onclick="toggleDeskripsi(0)">Lihat Deskripsi</button>
                    <div id="deskripsi-0" class="tiket-deskripsi">
                        <p>Konser Musik Rock menawarkan pengalaman mendalam bagi para penggemar musik rock. Dengan penampilan dari band-band ternama, Anda akan merasakan energi dan semangat khas genre ini. Tiket untuk konser ini mencakup akses ke semua area utama, termasuk akses VIP untuk beberapa penonton terpilih.</p>
                        <ul>
                            <li>Harga Tiket: Rp 500.000</li>
                            <li>Lokasi: Stadion GBK Jakarta</li>
                            <li>Tanggal: 20 December 2024</li>
                        </ul>
                    </div>
                </div>

                <!-- Festival Jazz -->
                <div class="tiket-detail">
                    <h3>2. Festival Jazz</h3>
                    <button class="btn-tiket" onclick="toggleDeskripsi(1)">Lihat Deskripsi</button>
                    <div id="deskripsi-1" class="tiket-deskripsi">
                        <p>Festival Jazz adalah acara tahunan yang menampilkan musisi jazz terbaik dari dalam dan luar negeri. Tiket untuk festival ini memberi Anda akses untuk menikmati berbagai pertunjukan di beberapa panggung, dengan suasana yang lebih santai dan intim.</p>
                        <ul>
                            <li>Harga Tiket: Rp 750.000</li>
                            <li>Lokasi: JCC Senayan</li>
                            <li>Tanggal: 25 December 2024</li>
                        </ul>
                    </div>
                </div>

                <!-- Konser Pop Indonesia -->
                <div class="tiket-detail">
                    <h3>3. Konser Pop Indonesia</h3>
                    <button class="btn-tiket" onclick="toggleDeskripsi(2)">Lihat Deskripsi</button>
                    <div id="deskripsi-2" class="tiket-deskripsi">
                        <p>Konser Pop Indonesia adalah konser yang menampilkan penyanyi-penyanyi pop terbaik di Indonesia. Jika Anda seorang penggemar musik pop lokal, konser ini adalah acara yang tidak boleh Anda lewatkan. Tiket konser ini juga menawarkan berbagai kategori tempat duduk sesuai anggaran Anda.</p>
                        <ul>
                            <li>Harga Tiket: Rp 450.000</li>
                            <li>Lokasi: ICE BSD City</li>
                            <li>Tanggal: 31 December 2024</li>
                        </ul>
                    </div>
                </div>

                <!-- Music Festival -->
                <div class="tiket-detail">
                    <h3>4. Music Festival</h3>
                    <button class="btn-tiket" onclick="toggleDeskripsi(3)">Lihat Deskripsi</button>
                    <div id="deskripsi-3" class="tiket-deskripsi">
                        <p>Music Festival adalah festival musik yang menyatukan berbagai genre dari seluruh dunia. Dengan berbagai panggung dan musisi internasional yang hadir, festival ini cocok untuk semua kalangan penggemar musik yang mencari pengalaman festival yang luar biasa.</p>
                        <ul>
                            <li>Harga Tiket: Rp 350.000</li>
                            <li>Lokasi: Lapangan D Senayan</li>
                            <li>Tanggal: 15 January 2025</li>
                        </ul>
                    </div>
                </div>

            </section>
        </main>

        <footer>
            <p>&copy; 2024 Sistem Pemesanan Tiket Konser</p>
        </footer>
    </div>

    <script>
        // Fungsi untuk toggle tampilan deskripsi tiket
        function toggleDeskripsi(index) {
            var deskripsi = document.getElementById('deskripsi-' + index);
            if (deskripsi.style.display === "none" || deskripsi.style.display === "") {
                deskripsi.style.display = "block";
            } else {
                deskripsi.style.display = "none";
            }
        }
    </script>
</body>
</html>
