<?php
// Koneksi ke database
$host = 'localhost'; // Ganti dengan host database Anda
$db = 'pembayaran_listrik_pasca'; // Ganti dengan nama database Anda
$user = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda

$connection = mysqli_connect($host, $user, $password, $db);
if (!$connection) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Memulai session
session_start();

// Mengambil data yang dikirim melalui form
$username = $_POST['username'];
$password = $_POST['password'];

// Mengecek kecocokan username di database
$query = "SELECT * FROM pelanggan WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if ($username == $row['username'] && $password == $row['password']) {
        // Login berhasil, menyimpan informasi username dalam session
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        // Mengarahkan ke halaman php10F.php
        header('Location: dashboard.php');
        exit();
    }
}

// Menutup koneksi ke database
mysqli_close($connection);
?>
