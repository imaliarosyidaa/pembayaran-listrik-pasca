<?php
//menyertakan file koneksi.php
require '../config/koneksi.php';

try {
    $id_pelanggan = $_GET['id_pelanggan'];

    $stmt = $pdo->prepare("DELETE FROM pelanggan WHERE id_pelanggan = ?");
    $stmt->execute([$id_pelanggan]);
    echo "
    <script>
    alert('Data berhasil dihapus');
    document.location.href='data_pelanggan.php'
    </script>";
    exit;
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>