<?php
    //menyertakan file koneksi.php
    require '../config/koneksi.php';
try {
    // Retrieve form data
    $id_pelanggan = $_POST["id_pelanggan"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $alamat = $_POST["alamat"];
    $nomor_kwh = $_POST["nomor_kwh"];
    $id_tarif = $_POST["id_tarif"];

    // Prepare and execute update statement
    $stmt = $pdo->prepare("UPDATE pelanggan SET username=:username, password=:password,nama_pelanggan=:nama_pelanggan,alamat=:alamat,nomor_kwh=:nomor_kwh,id_tarif=:id_tarif WHERE id_pelanggan=:id_pelanggan");
    $stmt->bindParam(":id_pelanggan", $id_pelanggan);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":nama_pelanggan", $nama_pelanggan);
    $stmt->bindParam(":alamat", $alamat);
    $stmt->bindParam(":nomor_kwh", $nomor_kwh);
    $stmt->bindParam(":id_tarif", $id_tarif);
    $stmt->execute();

    echo "
    <script>
    alert('Data berhasil diedit');
    document.location.href='data_pelanggan.php'
    </script>";
    exit;
} catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}
?>
