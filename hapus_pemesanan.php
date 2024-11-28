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

// Mengecek apakah parameter id ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data pemesanan berdasarkan ID
    $query = "DELETE FROM pemesanan WHERE id = ?";

    // Persiapkan statement
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, 'i', $id);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Pemesanan berhasil dihapus'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus pemesanan'); window.location.href='admin.php';</script>";
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID pemesanan tidak ditemukan'); window.location.href='admin.php';</script>";
}

// Menutup koneksi database
mysqli_close($conn);
?>