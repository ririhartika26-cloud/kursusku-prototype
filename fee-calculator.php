<?php

$courseName = 'Web Development';
$fee = 750000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;

$subtotal = $fee * $participantCount;
$discount = $subtotal * ($discountPercent / 100);
$totalBeforeAdmin = $subtotal - $discount;
$total = $totalBeforeAdmin + $adminFee;

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

        <h1>Kalkulator Estimasi Biaya</h1>

        <p>
            <strong>Nama Kursus:</strong>
            <?= htmlspecialchars($courseName) ?>
        </p>

        <p>
            <strong>Harga per Peserta:</strong>
            Rp <?= number_format($fee, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Jumlah Peserta:</strong>
            <?= $participantCount ?>
        </p>

        <p>
            <strong>Subtotal:</strong>
            Rp <?= number_format($subtotal, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Diskon:</strong>
            <?= $discountPercent ?>%
        </p>

        <p>
            <strong>Nilai Diskon:</strong>
            Rp <?= number_format($discount, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Biaya Admin:</strong>
            Rp <?= number_format($adminFee, 0, ',', '.') ?>
        </p>

        <p>
            <strong>Total Setelah Diskon:</strong>
            Rp <?= number_format($totalBeforeAdmin, 0, ',', '.') ?>
        </p>

        <h2>
            Total Bayar:
            Rp <?= number_format($total, 0, ',', '.') ?>
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