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

// Mendapatkan ID konser dari URL
$id_konser = isset($_GET['id']) ? $_GET['id'] : '';

// Mengambil data konser berdasarkan ID
$query = "SELECT * FROM konser WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'i', $id_konser);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Cek apakah data konser ditemukan
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    die("Konser tidak ditemukan.");
}

// Proses jika form disubmit untuk mengupdate data konser
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_konser = $_POST['nama_konser'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];
    $stok_tiket = $_POST['stok_tiket'];

    // Query untuk update data konser
    $update_query = "UPDATE konser SET nama_konser = ?, tanggal = ?, lokasi = ?, harga = ?, stok_tiket = ? WHERE id = ?";
    $update_stmt = mysqli_prepare($conn, $update_query);
    mysqli_stmt_bind_param($update_stmt, 'sssiii', $nama_konser, $tanggal, $lokasi, $harga, $stok_tiket, $id_konser);

    if (mysqli_stmt_execute($update_stmt)) {
        echo "<script>alert('Data konser berhasil diperbarui'); window.location.href='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data konser');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Konser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit Data Konser</h1>

    <form method="POST" action="">
        <label for="nama_konser">Nama Konser</label>
        <input type="text" id="nama_konser" name="nama_konser" value="<?= htmlspecialchars($row['nama_konser']); ?>" required>

        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" value="<?= htmlspecialchars($row['tanggal']); ?>" required>

        <label for="lokasi">Lokasi</label>
        <input type="text" id="lokasi" name="lokasi" value="<?= htmlspecialchars($row['lokasi']); ?>" required>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($row['harga']); ?>" required>

        <label for="stok_tiket">Stok Tiket</label>
        <input type="number" id="stok_tiket" name="stok_tiket" value="<?= htmlspecialchars($row['stok_tiket']); ?>" required>

        <button type="submit">Perbarui Konser</button>
    </form>
</div>

</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($conn);
?>