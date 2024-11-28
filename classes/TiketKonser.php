<?php
class TiketKonser {
    private $db;

    // Konstruktor untuk menerima object PDO
    public function __construct($db) {
        $this->db = $db;
    }

    // Mendapatkan daftar pemesanan dengan join
    public function getAllPemesanan() {
        try {
            $query = "SELECT p.*, k.nama_konser, k.harga 
                      FROM pemesanan p 
                      JOIN konser k ON p.id_konser = k.id 
                      ORDER BY p.tanggal_pemesanan DESC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return [];
        }
    }

    // Dalam kelas TiketKonser, tambahkan method berikut untuk mengambil pemesanan berdasarkan ID



    // Mendapatkan daftar konser dengan stok tiket yang lebih dari 0
    public function getDaftarKonser() {
        try {
            $query = "SELECT * FROM konser WHERE stok_tiket > 0";
            $stmt = $this->db->prepare($query);
            $stmt->execute();  // Perbaiki eksekusi statement
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return [];
        }
    }

    // Memesan tiket dan memperbarui stok tiket
    public function pesanTiket($data) {
        try {
            $this->db->beginTransaction();

            // Cek stok tiket dan harga
            $query = "SELECT stok_tiket, harga FROM konser WHERE id = ? FOR UPDATE";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['id_konser']]);
            $konser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($konser['stok_tiket'] < $data['jumlah_tiket']) {
                throw new Exception("Stok tiket tidak mencukupi");
            }

            $total_harga = $konser['harga'] * $data['jumlah_tiket'];

            // Insert data pemesanan
            $query = "INSERT INTO pemesanan (nama_pemesan, email, no_telepon, id_konser, 
                                             jumlah_tiket, total_harga, status_pembayaran) 
                      VALUES (?, ?, ?, ?, ?, ?, 'pending')";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                $data['nama_pemesan'],
                $data['email'],
                $data['no_telepon'],
                $data['id_konser'],
                $data['jumlah_tiket'],
                $total_harga
            ]);

            // Update stok tiket
            $query = "UPDATE konser SET stok_tiket = stok_tiket - ? WHERE id = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$data['jumlah_tiket'], $data['id_konser']]);

            $this->db->commit();

            return [
                'status' => 'success',
                'message' => 'Pemesanan berhasil',
                'order_id' => $this->db->lastInsertId()
            ];
        } catch (Exception $e) {
            $this->db->rollBack();
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    // Memperbarui pemesanan berdasarkan ID pemesanan
    public function updatePemesanan($id_pemesanan, $nama_pemesan, $email, $no_telepon, $nama_konser, $jumlah_tiket, $total_harga, $tanggal_pemesanan) {
        try {
            $query = "UPDATE pemesanan 
                      SET nama_pemesan = :nama_pemesan, 
                          email = :email, 
                          no_telepon = :no_telepon, 
                          nama_konser = :nama_konser, 
                          jumlah_tiket = :jumlah_tiket, 
                          total_harga = :total_harga, 
                          tanggal_pemesanan = :tanggal_pemesanan 
                      WHERE id_pemesanan = :id_pemesanan";

            $stmt = $this->db->prepare($query);

            // Binding parameter
            $stmt->bindParam(':id_pemesanan', $id_pemesanan, PDO::PARAM_INT);
            $stmt->bindParam(':nama_pemesan', $nama_pemesan, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':no_telepon', $no_telepon, PDO::PARAM_STR);
            $stmt->bindParam(':nama_konser', $nama_konser, PDO::PARAM_STR);
            $stmt->bindParam(':jumlah_tiket', $jumlah_tiket, PDO::PARAM_INT);
            $stmt->bindParam(':total_harga', $total_harga, PDO::PARAM_INT);
            $stmt->bindParam(':tanggal_pemesanan', $tanggal_pemesanan, PDO::PARAM_STR);

            // Eksekusi query
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return false;
        }
    }
}

?>
