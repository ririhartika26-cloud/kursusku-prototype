<?php

$namaKursus = 'Web Development';
$hargaKursus = 750000;
$jumlahPeserta = 2;
$diskonPersen = 10;
$biayaAdmin = 25000;

$subtotal = $hargaKursus * $jumlahPeserta;
$nilaiDiskon = $subtotal * ($diskonPersen / 100);
$totalSetelahDiskon = $subtotal - $nilaiDiskon;
$totalBayar = $totalSetelahDiskon + $biayaAdmin;

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Kalkulator Biaya - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header>

    <nav>

        <a href="index.php">
            KursusKu
        </a>

        <a href="index.php#katalog">
            Katalog
        </a>

    </nav>

</header>

<main>

    <section>

        <h1>Kalkulator Estimasi Biaya Kursus</h1>

        <p>
            <strong>Kursus:</strong>
            <?= htmlspecialchars($namaKursus) ?>
        </p>

        <p>
            <strong>Harga per Peserta:</strong>
            Rp <?= number_format($hargaKursus, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Jumlah Peserta:</strong>
            <?= $jumlahPeserta ?>
        </p>

        <p>
            <strong>Subtotal:</strong>
            Rp <?= number_format($subtotal, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Diskon:</strong>
            <?= $diskonPersen ?>%
        </p>

        <p>
            <strong>Nilai Diskon:</strong>
            Rp <?= number_format($nilaiDiskon, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Biaya Admin:</strong>
            Rp <?= number_format($biayaAdmin, 0, ',', '.') ?>
        </p>

        <h2>
            Total Bayar:
            Rp <?= number_format($totalBayar, 0, ',', '.') ?>
        </h2>

        <a href="index.php" class="button">
            Kembali ke Halaman Utama
        </a>

    </section>

</main>

<footer>

    <p>
        &copy; <?= date('Y') ?> KursusKu.
        Semua hak dilindungi.
    </p>

</footer>

</body>

</html>