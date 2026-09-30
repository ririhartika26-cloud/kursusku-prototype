<?php

$nama = trim($_REQUEST['nama'] ?? '');
$email = trim($_REQUEST['email'] ?? '');
$telepon = trim($_REQUEST['telepon'] ?? '');
$prodi = trim($_REQUEST['prodi'] ?? '');
$kursus = trim($_REQUEST['kursus'] ?? '');
$jenisPeserta = trim($_REQUEST['jenis_peserta'] ?? '');
$minat = $_REQUEST['minat'] ?? [];
$catatan = trim($_REQUEST['catatan'] ?? '');
$source = trim($_REQUEST['source'] ?? '');

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Hasil Pendaftaran - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header>

    <nav>

        <a href="index.php">
            KursusKu
        </a>

        <a href="registration.php">
            Kembali ke Form
        </a>

    </nav>

</header>

<main>

    <section>

        <div class="success">

            <h1>
                Pendaftaran Berhasil
            </h1>

            <p>
                Data pendaftaran berhasil diterima.
            </p>

        </div>

        <h2>Data Peserta</h2>

        <p>
            <strong>Nama:</strong>
            <?= $nama ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?= $email ?>
        </p>

        <p>
            <strong>Nomor Telepon:</strong>
            <?= $telepon ?>
        </p>

        <p>
            <strong>Program Studi:</strong>
            <?= $prodi ?>
        </p>

        <p>
            <strong>Kursus:</strong>
            <?= $kursus ?>
        </p>

        <p>
            <strong>Jenis Peserta:</strong>
            <?= $jenisPeserta ?>
        </p>

        <p>
            <strong>Minat:</strong>

            <?php if (!empty($minat)): ?>

                <?= htmlspecialchars(implode(', ', $minat)) ?>

            <?php else: ?>

                Tidak ada

            <?php endif; ?>

        </p>

        <p>
            <strong>Catatan:</strong>
            <?= $catatan ?: 'Tidak ada' ?>
        </p>

        <p>
            <strong>Sumber:</strong>
            <?= $source ?>
        </p>

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