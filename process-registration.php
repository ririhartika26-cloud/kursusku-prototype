<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$telepon = trim($_POST['telepon'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$kursus = trim($_POST['kursus'] ?? '');

$participantType = trim(
    $_POST['participant_type'] ?? ''
);

$interests = $_POST['interests'] ?? [];

$catatan = trim(
    $_POST['catatan'] ?? ''
);

$source = trim(
    $_POST['source'] ?? ''
);

$errors = [];

/* VALIDASI */

if ($nama === '') {
    $errors[] = 'Nama wajib diisi.';
}

if ($email === '') {

    $errors[] = 'Email wajib diisi.';

} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errors[] = 'Email wajib menggunakan format yang valid.';

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

/* HARGA KURSUS */

$hargaKursus = [

    'Web Development' => 750000,

    'Desain Grafis' => 650000,

    'Digital Marketing' => 800000,

    'Microsoft Office' => 500000,

    'Data Analysis' => 900000,

    'UI/UX Design' => 850000

];

$fee = $hargaKursus[$kursus] ?? 0;

/* JUMLAH PESERTA */

$participantCount = 1;

/* BIAYA ADMIN */

$adminFee = 25000;

/* DISKON WEEK 6 */

$discountPercent = 0;

if ($participantType === 'Mahasiswa') {

    $discountPercent = 10;

} elseif ($participantType === 'Guru') {

    $discountPercent = 15;

} elseif ($participantType === 'Umum') {

    $discountPercent = 5;

}

/* PERHITUNGAN */

$subtotal = $fee * $participantCount;

$discount = intdiv(
    $subtotal * $discountPercent,
    100
);

$totalBeforeAdmin = $subtotal - $discount;

$total = $totalBeforeAdmin + $adminFee;

/* MINAT */

if (empty($interests)) {

    $interestText = 'Tidak ada';

} else {

    $interestText = implode(
        ', ',
        $interests
    );

}

/* ESCAPE HTML */

function e($value)
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
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

            <h1>
                Data Belum Lengkap
            </h1>

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
                    Data pendaftaran berhasil diproses.
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
                <?= e($interestText) ?>
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

            <h2>
                Rincian Biaya
            </h2>

            <p>
                <strong>Harga Kursus:</strong>
                Rp <?= number_format(
                    $fee,
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <p>
                <strong>Jumlah Peserta:</strong>
                <?= $participantCount ?>
            </p>

            <p>
                <strong>Subtotal:</strong>
                Rp <?= number_format(
                    $subtotal,
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <p>
                <strong>Diskon:</strong>
                <?= $discountPercent ?>%
            </p>

            <p>
                <strong>Nilai Diskon:</strong>
                Rp <?= number_format(
                    $discount,
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <p>
                <strong>Biaya Admin:</strong>
                Rp <?= number_format(
                    $adminFee,
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <p>
                <strong>Total Setelah Diskon:</strong>
                Rp <?= number_format(
                    $totalBeforeAdmin,
                    0,
                    ',',
                    '.'
                ) ?>
            </p>

            <h2>
                Total Bayar:
                Rp <?= number_format(
                    $total,
                    0,
                    ',',
                    '.'
                ) ?>
            </h2>

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