<?php

require_once 'helpers.php';

$siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');

$kursus = [

    [
        'nama' => 'Web Development',
        'kategori' => 'Teknologi',
        'harga' => 750000,
        'peserta' => 18,
        'kapasitas' => 20,
        'tanggal' => '2026-10-05'
    ],

    [
        'nama' => 'Desain Grafis',
        'kategori' => 'Desain',
        'harga' => 650000,
        'peserta' => 12,
        'kapasitas' => 20,
        'tanggal' => '2026-10-10'
    ],

    [
        'nama' => 'Digital Marketing',
        'kategori' => 'Bisnis',
        'harga' => 800000,
        'peserta' => 20,
        'kapasitas' => 20,
        'tanggal' => '2026-10-15'
    ],

    [
        'nama' => 'Microsoft Office',
        'kategori' => 'Komputer',
        'harga' => 500000,
        'peserta' => 10,
        'kapasitas' => 20,
        'tanggal' => '2026-10-20'
    ],

    [
        'nama' => 'Data Analysis',
        'kategori' => 'Teknologi',
        'harga' => 900000,
        'peserta' => 15,
        'kapasitas' => 20,
        'tanggal' => '2026-10-25'
    ],

    [
        'nama' => 'UI/UX Design',
        'kategori' => 'Desain',
        'harga' => 850000,
        'peserta' => 8,
        'kapasitas' => 20,
        'tanggal' => '2026-10-30'
    ]

];

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title><?= htmlspecialchars($siteName) ?></title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<header>

    <nav>

        <a href="index.php">
            KursusKu
        </a>

        <a href="#keunggulan">
            Keunggulan
        </a>

        <a href="#katalog">
            Katalog
        </a>

        <a href="#alur">
            Cara Daftar
        </a>

        <a href="#media">
            Media
        </a>

        <a href="#kontak">
            Kontak
        </a>

        <a href="fee-calculator.php">
            Kalkulator Biaya
        </a>

    </nav>

</header>


<main>

    <!-- HERO -->

    <section id="hero">

        <h1>
            <?= htmlspecialchars($siteName) ?>
        </h1>

        <p>
            <?= htmlspecialchars($tagline) ?>
        </p>

        <a href="#katalog">
            Lihat Katalog Kursus
        </a>

    </section>


    <!-- KEUNGGULAN -->

    <section id="keunggulan">

        <h2>Keunggulan KursusKu</h2>

        <ul>

            <li>Informasi kursus mudah dipahami</li>

            <li>Pendaftaran kursus lebih sederhana</li>

            <li>Data kursus tersusun dengan rapi</li>

        </ul>

    </section>


    <!-- KATALOG -->

    <section id="katalog">

        <h2>Katalog Kursus</h2>

        <p>
            Pilih kursus yang sesuai dengan kebutuhan belajar Anda.
        </p>

        <?php foreach ($kursus as $item): ?>

            <article>

                <h3>
                    <?= htmlspecialchars($item['nama']) ?>
                </h3>

                <p>
                    Kategori:
                    <?= htmlspecialchars($item['kategori']) ?>
                </p>

                <p>
                    Harga:
                    <?= rupiah($item['harga']) ?>
                </p>

                <p>
                    Peserta:
                    <?= $item['peserta'] ?>
                    / <?= $item['kapasitas'] ?>
                </p>

                <p>
                    Status:
                    <?= statusKursus(
                        $item['peserta'],
                        $item['kapasitas']
                    ) ?>
                </p>

                <p>
                    Sisa kursi:
                    <?= sisaKursi(
                        $item['peserta'],
                        $item['kapasitas']
                    ) ?>
                </p>

                <p>
                    Tanggal:
                    <?= formatTanggal($item['tanggal']) ?>
                </p>

                <a href="registration.php?kursus=<?= urlencode($item['nama']) ?>" class="button">
                    Daftar Kursus
                </a>

            </article>

            <hr>

        <?php endforeach; ?>

    </section>


    <!-- CARA DAFTAR -->

    <section id="alur">

        <h2>Cara Daftar Kursus</h2>

        <ol>

            <li>Pilih kursus yang ingin diikuti.</li>

            <li>Isi formulir pendaftaran.</li>

            <li>Periksa kembali data pendaftaran.</li>

            <li>Kirim formulir pendaftaran.</li>

        </ol>

    </section>


    <!-- MEDIA -->

    <section id="media">

        <h2>Media Pembelajaran</h2>

        <p>
            Contoh media yang digunakan dalam kegiatan pembelajaran.
        </p>

        <img
            src="assets/images/hero-kursus.jpg"
            alt="Kegiatan pembelajaran kursus"
            width="600"
        >

        <br><br>

        <video controls width="600">

            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser Anda tidak mendukung video HTML5.

        </video>

    </section>


    <!-- KONTAK -->

    <section id="kontak">

        <h2>Kontak</h2>

        <p>
            Hubungi kami untuk mendapatkan informasi lebih lanjut
            mengenai kursus yang tersedia.
        </p>

        <p>
            Email: info@kursusku.test
        </p>

    </section>

</main>


<footer>

    <p>
        &copy; <?= $year ?>
        <?= htmlspecialchars($siteName) ?>.
        Semua hak dilindungi.
    </p>

</footer>

</body>

</html>