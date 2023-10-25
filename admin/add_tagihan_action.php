<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pembayaran_listrik_pasca2";

//coba koneksi pakai mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id_tagihan = $_POST["id_tagihan"];
$id_penggunaan = $_POST["id_penggunaan"];
$id_pelanggan = $_POST["id_pelanggan"];
$bulan = $_POST["bulan"];
$tahun = $_POST["tahun"];
$jumlah_meter = $_POST["jumlah_meter"];
$status = $_POST["status"];

$sql = "INSERT INTO tagihan (id_tagihan,id_penggunaan, id_pelanggan, bulan,tahun,jumlah_meter,status)
VALUES ('$id_tagihan','$id_penggunaan', '$id_pelanggan', '$bulan','$tahun','$jumlah_meter','$status')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
    header("Location: daftar_tagihan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

