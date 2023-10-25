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

$id_pelanggan = $_POST["id_pelanggan"];
$username = $_POST["username"];
$password = $_POST["password"];
$nama_pelanggan = $_POST["nama_pelanggan"];
$alamat = $_POST["alamat"];
$nomor_kwh = $_POST["nomor_kwh"];
$id_tarif = $_POST["id_tarif"];

$sql = "INSERT INTO pelanggan (id_pelanggan, username, password,nama_pelanggan,alamat,nomor_kwh,id_tarif)
VALUES ('$id_pelanggan', '$username', '$password','$nama_pelanggan','$alamat','$nomor_kwh','$id_tarif')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
    header("Location: data_pelanggan.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

