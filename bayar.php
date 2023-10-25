<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php");
            exit();
        }
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

                    $stmt = $pdo->prepare("UPDATE tagihan SET status='Lunas' WHERE id_tagihan = ? AND status = 'Belum Lunas'");
                    $stmt -> execute([$_GET["id_tagihan"]]);
                    $row4 = $stmt -> fetch();
                    
                    $stmt = $pdo->query("SELECT * FROM pembayaran");
                    $row5 = $stmt -> fetch();
                    $rowNum = $pdo->exec("SELECT * FROM pembayaran");

                    $id_tagihan = $_GET["id_tagihan"];
                    $bulan = $_GET["bulan"];
                    $tanggal_pembayaran = date('Y-m-d');
                    
                    $stmt = $pdo->prepare("UPDATE pembayaran SET id_pembayaran_=?, id_tagihan=?, id_pelanggan=?,tanggal_pembayaran=?,bulan_bayar=?,biaya_admin=?,total_bayar=?,id_user=?");
                    $stmt->bindParam("?",$rowNum+1);
                    $stmt->bindParam("?",$id_tagihan);
                    $stmt->bindParam("?", $row["$id_pelanggan"]);
                    $stmt->bindParam("?", $tanggal_pembayaran);
                    $stmt->bindParam("?", $bulan);
                    $stmt->bindParam("?", 200);
                    $stmt->bindParam("?", $row4["jumlah_meter"] * $row2["tarifperkwh"]+200);
                    $stmt->bindParam("?", $row["$id_pelanggan"]);
                    $stmt->execute();
                } catch(PDOException $e){
                    exit("PDO Error: ".$e->getMessage()."<br>");
                }
                echo "
                    <script>
                    document.location.href='dashboard.php'
                    </script>";
            ?>