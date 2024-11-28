<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kontak</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* Global Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5e0b7; /* Warna cream yang lembut */
            margin: 0;
            padding: 0;
            color: #4b3f2f; /* Coklat gelap untuk teks */
        }

        /* Navbar Styling */
        .navbar {
            background-color: #4b3f2f; /* Coklat gelap untuk navbar */
            padding: 10px 20px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
        }

        .nav-links li {
            margin: 0 15px;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
        }

        .nav-links li a:hover {
            background-color: #8d6e63; /* Coklat muda saat hover */
        }

        /* Title */
        .title {
            text-align: center;
            font-size: 36px;
            color: #4b3f2f;
            margin-top: 30px;
        }

        /* Contact Info Section */
        .contact-info {
            background-color: #fff9e6; /* Warna cream lebih muda */
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-info h3 {
            font-size: 28px;
            text-align: center;
            color: #4b3f2f;
        }

        .contact-info p {
            font-size: 18px;
            line-height: 1.6;
            margin: 10px 0;
        }

        .contact-info p strong {
            color: #4b3f2f;
        }

        /* Social Media Links */
        .social-media {
            text-align: center;
            margin-top: 20px;
        }

        .social-media a {
            font-size: 30px;
            margin: 0 10px;
            color: #4b3f2f;
            text-decoration: none;
            transition: color 0.3s;
        }

        .social-media a:hover {
            color: #8d6e63; /* Coklat muda saat hover */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                flex-direction: column;
                align-items: center;
            }

            .nav-links li {
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <ul class="nav-links">
            <li><a href="index.php">Beranda</a></li>
            <li><a href="keterangantiket.php">Keterangan Tiket</a></li>
            <li><a href="kontak.php">Kontak</a></li>
        </ul>
    </div>

    <!-- Judul -->
    <h2 class="title">Kontak Kami</h2>

    <!-- Kontainer kontak -->
    <div class="contact-info">
        <h3>Hubungi Kami</h3>
        <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, Anda dapat menghubungi kami melalui informasi kontak di bawah ini:</p>
        <p><strong>Telepon:</strong> 0987 6785 4456</p>
        <p><strong>Email:</strong> tiketkonser12@gmail.com</p>
        <p><strong>Alamat:</strong> Jl. Raya Soedirman No. 12, Jakarta, Indonesia</p>
        
        <h4>Ikuti kami di media sosial:</h4>
        <div class="social-media">
            <a href="" target="_blank" class="fab fa-facebook"></a>
            <a href="" target="_blank" class="fab fa-twitter"></a>
            <a href="" target="_blank" class="fab fa-instagram"></a>
        </div>
    </div>

</body>
</html>
