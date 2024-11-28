// config/koneksi.php
<?php
$host = 'localhost';
$dbname = '19046_psas';  // Nama database Anda
$username = 'root';      // Username database Anda
$password = '';          // Password database Anda

try {
    // Membuat koneksi PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode menjadi exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
