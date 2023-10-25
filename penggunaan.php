<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penggunaan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
            rel="stylesheet" integrity="" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.bundle.min.js"
            rel="stylesheet" integrity="" crossorigin="anonymous"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        include 'fragments/navbar.php';
    ?>
    <div class="container shadow-sm me-5 mt-5 ms-5 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info Penggunaan Listrik</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped" style="width: 65rem;">
        <thead>
            <th styles="width:10%">No</th>
            <th styles="width:20%"> ID Penggunaan</th>
            <th styles="width:10%"> Bulan </th>
            <th styles="width:10%"> Tahun </th>
            <th styles="width:10%"> Meter Awal </th>
            <th styles="width:10%"> Meter Akhir </th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require 'config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE username = ?");
                    $stmt ->execute([$_SESSION["username"]]);
                    $row = $stmt -> fetch();

                    $stmt = $pdo->prepare("SELECT * FROM penggunaan WHERE id_pelanggan = ?");
                    $stmt -> execute([$row['id_pelanggan']]);
                    $i =1;
                    while ($row2 = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i."</td>
                        <td>".$row2["id_penggunaan"]."</td>
                        <td>".$row2["bulan"]."</td>
                        <td>".$row2["tahun"]."</td>
                        <td>".$row2["meter_awal"]."</td>
                        <td>".$row2["meter_akhir"]."</td>
                    </tr>
                    "; $i++;}
                } catch(PDOException $e){
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
            ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>