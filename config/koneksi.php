<?php
    $db_hostname = "localhost"; // Ganti dengan host database Anda
    $db_database = "pembayaran_listrik_pasca2"; // Ganti dengan nama database Anda
    $db_username = "root"; // Ganti dengan username database Anda
    $db_password = ""; // Ganti dengan password database Anda

    $db_charset = "utf8mb4"; // Optional
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    try {
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);
    } catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>