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

$id_penggunaan = $_POST["id_penggunaan"];
$id_pelanggan = $_POST["id_pelanggan"];
$bulan = $_POST["bulan"];
$tahun = $_POST["tahun"];
$meter_awal = $_POST["meter_awal"];
$meter_akhir = $_POST["meter_akhir"];

$sql = "INSERT INTO penggunaan (id_penggunaan, id_pelanggan, bulan,tahun,meter_awal,meter_akhir)
VALUES ('$id_penggunaan', '$id_pelanggan', '$bulan','$tahun','$meter_awal','$meter_akhir')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
    header("Location: daftar_penggunaan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

