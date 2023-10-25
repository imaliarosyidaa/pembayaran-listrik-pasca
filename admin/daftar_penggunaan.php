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
    <title>Daftar Penggunaan</title>
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
<body class="bg-light">
    <?php 
        include '../fragments/navbar_admin.php';
    ?>
    <!--Add Data Penggunaan-->
    <div class="d-flex flex-direction-nav">
    <div class="container ms-5 mt-5 shadow-sm bg-body rounded" style="width: 45rem; height: 30rem;">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Add Penggunaan</div>
        <form class="row g-3 ps-3 pe-2 pb-5" action="add_penggunaan_action.php" method="POST">
            <div class="col-12">
                <label for="inputIdPenggunaan" class="form-label">ID Penggunaan</label>
                <input type="text" class="form-control" id="id_penggunaan" name="id_penggunaan" placeholder="Masukan ID Penggunaan" required>
            </div>
            <div class="col-12">
                <label for="inputIdPelanggan" class="form-label">ID Pelanggan</label>
                <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Masukan ID Pelanggan" required>
            </div>
            <div class="col-md-6">
                <label for="inputIdBulan" class="form-label">Bulan</label>
                <select id="bulan" name="bulan" class="form-select">
                    <option selected>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                    <option>Juni</option>
                    <option>Juli</option>
                    <option>Agustus</option>
                    <option>September</option>
                    <option>Oktober</option>
                    <option>November</option>
                    <option>Desember</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputTahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun" required>
            </div>
            <div class="col-md-6">
                <label for="inputMeterAwal" class="form-label">Meter Awal</label>
                <input type="text" class="form-control" id="meter_awal" name="meter_awal" placeholder="Masukan Meter Awal" required>
            </div>
            <div class="col-md-6">
                <label for="inputMeterAkhir" class="form-label">Meter Akhir</label>
                <input type="text" class="form-control" id="meter_akhir" name="meter_akhir" placeholder="Masukan Meter Akhir" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    <!--Data Penggunaan-->
    <div class="container shadow-sm me-3 mt-5 ms-3 bg-body rounded">
    <div class="pt-3 ms-3 mb-2 fw-bold pb-2" style="border-bottom: 1px solid #e5e5e5;">Data Penggunaan Listrik</div>
    <div class="d-flex justify-content-center pt-2 pb-5 ps-3 pe-3">
    <table class="table table-bordered table-striped">
        <thead class="text-center">
            <th styles="width:10%"> No </th>
            <th styles="width:20%"> ID Penggunaan </th>
            <th styles="width:20%"> ID Pelanggan </th>
            <th styles="width:10%"> Bulan </th>
            <th styles="width:10%"> Tahun </th>
            <th styles="width:10%"> Meter Awal </th>
            <th styles="width:10%"> Meter Akhir </th>
        </thead>
        <tbody>
            <?php
                //menyertakan file koneksi.php
                require '../config/koneksi.php';

                try{
                    //Mengambil data dari database dan menampilkanya di tabel
                    $stmt = $pdo->query("SELECT * FROM penggunaan");
                    $i = 1;
                    while ($row2 = $stmt->fetch()){
                    echo"<tr>
                        <td>".$i++."</td>
                        <td>".$row2["id_penggunaan"]."</td>
                        <td>".$row2["id_pelanggan"]."</td>
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
    </div>
</body>
</html>