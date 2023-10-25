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
    <!--Section-->
    <!--Profil-->
    <?php
        //menyertakan file koneksi.php
        require 'config/koneksi.php';

        $stmt = $pdo->prepare("SELECT * FROM pelanggan WHERE username = ?");
        $stmt ->execute([$_SESSION["username"]]);
        $row = $stmt -> fetch();
    ?>
    <div class="d-flex flex-direction-nav">
    <div class="container ms-5 mt-5 shadow-sm bg-body rounded" style="width: 40rem;">
    <div class="mt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info Pelanggan</div>
    <form class="ps-4 pe-4 pb-5">
        <div class="row mb-3 d-inline">
            <label for="id_pelanggan" class="col-sm-5 col-form-label">ID Pelanggan</label>
            <span>: <?php echo $row['id_pelanggan'] ?> </span>
        </div>
        <br>
        <div class="row mb-3 d-inline">
            <label for="nama_pelanggan" class="col-sm-5 col-form-label">Nama</label>
            <span>: <?php echo $row['nama_pelanggan'] ?> </span>
        </div>
        <br>
        <div class="row mb-3 d-inline">
            <label for="nomor_kwh" class="col-sm-5 col-form-label">No Kwh</label>
            <span>: <?php echo $row['nomor_kwh'] ?> </span>
        </div>
        <br>
        <div class="row mb-3 d-inline">
            <label for="alamat" class="col-sm-5 col-form-label">Alamat</label>
            <span>: <?php echo $row['alamat'] ?> </span>
        </div>
        <br>
        </form>
    </div>
    <!--Tagihan-->
    <div class="container shadow-sm me-5 mt-5 ms-3 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Info Tagihan</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped" style="width: 45rem;">
        <thead>
            <th styles="width:10%"> No </th>
            <th styles="width:20%"> ID Tagihan </th>
            <th styles="width:20%"> Bulan </th>
            <th styles="width:10%"> Meter Awal </th>
            <th styles="width:10%"> Meter Akhir </th>
            <th styles="width:10%"> Jumlah Meter</th>
            <th styles="width:10%"> Tarif/ KWh </th>
            <th styles="width:20%"> Jumlah Bayar </th>
            <th styles="width:20%"> Status </th>
            <th styles="width:20%"> Aksi </th>
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

                    $stmt = $pdo->prepare("SELECT * FROM tarif WHERE id_tarif = ?");
                    $stmt -> execute([$row['id_tarif']]);
                    $row2 = $stmt -> fetch();

                    $stmt = $pdo->prepare("SELECT * FROM penggunaan WHERE id_pelanggan = ?");
                    $stmt -> execute([$row['id_pelanggan']]);
                    $row3 = $stmt -> fetch();
                    
                    $stmt = $pdo->prepare("SELECT * FROM tagihan WHERE id_pelanggan = ? AND status = 'Belum Lunas'");
                    $stmt -> execute([$row3['id_pelanggan']]);
                    $i = 1;
                    while ($row4 = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i."</td>
                        <td>".$row4["id_tagihan"]."</td>
                        <td>".$row4["bulan"]." ".$row4["tahun"]."</td>
                        <td>".$row3["meter_awal"]."</td>
                        <td>".$row3["meter_akhir"]."</td>
                        <td>".$row4["jumlah_meter"]."</td>
                        <td>".$row2["tarifperkwh"]."</td>
                        <td>".$row4["jumlah_meter"] * $row2["tarifperkwh"]."</td>
                        <td>".$row4["status"]."</td>
                        <td>
                        <a  id='update' href='bayar.php?id_tagihan=".$row4["id_tagihan"]."&bulan=".$row4["bulan"]."' class='btn btn-primary mx-2'>Bayar</a>
                        </td>
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
    </div>
</body>
</html>