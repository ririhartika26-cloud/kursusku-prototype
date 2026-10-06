<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}


/*
|--------------------------------------------------------------------------
| Mengambil data dari form
|--------------------------------------------------------------------------
*/

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$telepon = trim($_POST['telepon'] ?? '');
$prodi = trim($_POST['prodi'] ?? '');
$kursus = trim($_POST['kursus'] ?? '');

$participantType = $_POST['participant_type'] ?? '';

$interests = $_POST['interests'] ?? [];

$catatan = trim($_POST['catatan'] ?? '');

$source = $_POST['source'] ?? '';


/*
|--------------------------------------------------------------------------
| Validasi sederhana
|--------------------------------------------------------------------------
*/

if (
    $nama === '' ||
    $email === '' ||
    $telepon === '' ||
    $prodi === '' ||
    $kursus === '' ||
    $participantType === ''
) {

    echo '<h2>Data belum lengkap</h2>';

    echo '<p>Data yang wajib diisi belum lengkap.</p>';

    echo '<p>
        <a href="registration.php">
            Kembali ke Form Pendaftaran
        </a>
    </p>';

    exit;
}


/*
|--------------------------------------------------------------------------
| Daftar harga kursus
|--------------------------------------------------------------------------
*/

$hargaKursus = [

    'Web Development' => 750000,

    'Desain Grafis' => 650000,

    'Digital Marketing' => 800000,

    'Microsoft Office' => 500000,

    'Data Analysis' => 900000,

    'UI/UX Design' => 850000

];


/*
|--------------------------------------------------------------------------
| Mengambil harga berdasarkan kursus
|--------------------------------------------------------------------------
*/

$fee = $hargaKursus[$kursus] ?? 0;


/*
|--------------------------------------------------------------------------
| Diskon berdasarkan jenis peserta
|--------------------------------------------------------------------------
|
| Aturan diskon proyek:
| Mahasiswa = 10%
| Guru      = 15%
| Umum      = 5%
|
*/

$discountPercent = 0;

if ($participantType === 'Mahasiswa') {

    $discountPercent = 10;

} elseif ($participantType === 'Guru') {

    $discountPercent = 15;

} elseif ($participantType === 'Umum') {

    $discountPercent = 5;

}


/*
|--------------------------------------------------------------------------
| Perhitungan biaya
|--------------------------------------------------------------------------
*/

$participantCount = 1;

$adminFee = 25000;

$subtotal = $fee * $participantCount;

$discount = intdiv(
    $subtotal * $discountPercent,
    100
);

$totalBeforeAdmin = $subtotal - $discount;

$total = $totalBeforeAdmin + $adminFee;


/*
|--------------------------------------------------------------------------
| Minat belajar
|--------------------------------------------------------------------------
*/

if (!is_array($interests)) {
    $interests = [];
}

$interestsText = !empty($interests)
    ? implode(', ', $interests)
    : 'Tidak ada';


/*
|--------------------------------------------------------------------------
| Fungsi keamanan output
|--------------------------------------------------------------------------
*/

function e($value)
{
    return htmlspecialchars(
        (string) $value,
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

    <nav aria-label="Navigasi utama">

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

        <h1>
            Pendaftaran Berhasil
        </h1>


        <div class="success">

            <p>
                Data pendaftaran berhasil diterima.
            </p>

        </div>


        <h2>
            Ringkasan Pendaftaran
        </h2>


        <p>

            <strong>Nama Lengkap:</strong>

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

            <strong>Pilihan Kursus:</strong>

            <?= e($kursus) ?>

        </p>


        <p>

            <strong>Jenis Peserta:</strong>

            <?= e($participantType) ?>

        </p>


        <p>

            <strong>Minat Belajar:</strong>

            <?= e($interestsText) ?>

        </p>


        <p>

            <strong>Catatan:</strong>

            <?= $catatan !== ''
                ? e($catatan)
                : 'Tidak ada'
            ?>

        </p>


        <p>

            <strong>Source:</strong>

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

            <strong>Subtotal:</strong>

            Rp <?= number_format(
                $subtotal,
                0,
                ',',
                '.'
            ) ?>

        </p>


        <p>

            <strong>Jenis Peserta:</strong>

            <?= e($participantType) ?>

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


        <h2>

            Total Bayar:

            Rp <?= number_format(
                $total,
                0,
                ',',
                '.'
            ) ?>

        </h2>


        <p>

            <a
                href="registration.php"
                class="button"
            >

                Daftar Lagi

            </a>

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