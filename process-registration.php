<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('Location: registration.php');
    exit;
}

$nama = trim($_GET['nama'] ?? '');
$email = trim($_GET['email'] ?? '');
$telepon = trim($_GET['telepon'] ?? '');
$prodi = trim($_GET['prodi'] ?? '');
$kursus = trim($_GET['kursus'] ?? '');
$participantType = trim($_GET['participant_type'] ?? '');
$interests = $_GET['interests'] ?? [];
$catatan = trim($_GET['catatan'] ?? '');
$source = trim($_GET['source'] ?? '');

$errors = [];

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
}

if ($telepon === '') {
    $errors[] = 'Nomor telepon wajib diisi.';
}

if ($prodi === '') {
    $errors[] = 'Program studi wajib diisi.';
}

if ($kursus === '') {
    $errors[] = 'Kursus wajib dipilih.';
}

if ($participantType === '') {
    $errors[] = 'Jenis peserta wajib dipilih.';
}

if (!is_array($interests)) {
    $interests = [];
}

function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>
        Hasil Pendaftaran - KursusKu
    </title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<header>

    <nav>

        <a href="index.php">
            <strong>KursusKu</strong>
        </a>

        <a href="index.php#katalog">
            Katalog
        </a>

        <a href="registration.php">
            Daftar Kursus
        </a>

    </nav>

</header>

<main>

    <section>

        <?php if (!empty($errors)): ?>

            <h1>Data Belum Lengkap</h1>

            <div class="success">

                <ul>

                    <?php foreach ($errors as $error): ?>

                        <li>
                            <?= e($error) ?>
                        </li>

                    <?php endforeach; ?>

                </ul>

            </div>

            <a
                href="registration.php"
                class="button"
            >
                Kembali ke Form
            </a>

        <?php else: ?>

            <h1>
                Pendaftaran Berhasil
            </h1>

            <div class="success">

                <strong>
                    Data berhasil dikirim melalui method GET.
                </strong>

            </div>

            <h2>
                Ringkasan Pendaftaran
            </h2>

            <p>
                <strong>Nama:</strong>
                <?= e($nama) ?>
            </p>

            <p>
                <strong>Email:</strong>
                <?= e($email) ?>
            </p>

            <p>
                <strong>Nomor Telepon:</strong>
                <?= e($telepon) ?>
            </p>

            <p>
                <strong>Program Studi:</strong>
                <?= e($prodi) ?>
            </p>

            <p>
                <strong>Kursus:</strong>
                <?= e($kursus) ?>
            </p>

            <p>
                <strong>Jenis Peserta:</strong>
                <?= e($participantType) ?>
            </p>

            <p>
                <strong>Minat:</strong>

                <?php if (empty($interests)): ?>

                    Tidak ada

                <?php else: ?>

                    <?= e(implode(', ', $interests)) ?>

                <?php endif; ?>

            </p>

            <p>
                <strong>Catatan:</strong>

                <?php if ($catatan !== ''): ?>

                    <?= e($catatan) ?>

                <?php else: ?>

                    Tidak ada

                <?php endif; ?>

            </p>

            <p>
                <strong>Sumber:</strong>
                <?= e($source) ?>
            </p>

            <a
                href="registration.php"
                class="button"
            >
                Kembali ke Form
            </a>

        <?php endif; ?>

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