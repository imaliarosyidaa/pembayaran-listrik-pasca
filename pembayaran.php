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
    <title>Pembayaran</title>
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
    <div class="container shadow-sm mt-5 ms-5 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info Pembayaran Listrik</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped" style="width: 65rem;">
        <thead>
            <th styles="width:10%">No</th>
            <th styles="width:20%"> ID Pembayaran</th>
            <th styles="width:20%"> ID Tagihan </th>
            <th styles="width:20%"> Tanggal Pembayaran </th>
            <th styles="width:10%"> Bulan Bayar </th>
            <th styles="width:10%"> Biaya Admin </th>
            <th styles="width:10%"> Total Bayar </th>
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

                    $stmt = $pdo->prepare("SELECT * FROM tagihan WHERE id_pelanggan = ?");
                    $stmt -> execute([$row['id_pelanggan']]);
                    $row2 = $stmt -> fetch();

                    $stmt = $pdo->prepare("SELECT * FROM pembayaran WHERE id_tagihan = ?");
                    $stmt -> execute([$row2['id_tagihan']]);
                    $i = 1;
                    while ($row3 = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i."</td>
                        <td>".$row3["id_pembayaran"]."</td>
                        <td>".$row3["id_tagihan"]."</td>
                        <td>".$row3["tanggal_pembayaran"]."</td>
                        <td>".$row3["bulan_bayar"]."</td>
                        <td>".$row3["biaya_admin"]."</td>
                        <td>".$row3["total_bayar"]."</td>
                    </tr>
                    ";$i++;}
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