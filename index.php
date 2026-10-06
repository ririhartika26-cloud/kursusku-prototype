<?php

require_once 'helpers.php';

$siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');

$daftarKursus = [
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= htmlspecialchars($siteName) ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
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

        <h2>
            Keunggulan KursusKu
        </h2>

        <ul>

            <li>
                Kursus Terarah
            </li>

            <li>
                Materi Praktis
            </li>

            <li>
                Pendaftaran Mudah
            </li>

        </ul>

    </section>


    <!-- KATALOG -->
    <section id="katalog">

        <h2>
            Katalog Kursus
        </h2>

        <p>
            Pilih kursus sesuai kebutuhan dan minat belajar Anda.
        </p>

        <?php foreach ($daftarKursus as $item): ?>

            <article>

                <h3>
                    <?= htmlspecialchars($item['nama']) ?>
                </h3>

                <p>
                    <strong>Kategori:</strong>
                    <?= htmlspecialchars($item['kategori']) ?>
                </p>

                <p>
                    <strong>Harga:</strong>
                    <?= rupiah($item['harga']) ?>
                </p>

                <p>
                    <strong>Peserta:</strong>
                    <?= $item['peserta'] ?>
                    /
                    <?= $item['kapasitas'] ?>
                </p>

                <p>
                    <strong>Status:</strong>
                    <?= statusKursus($item['peserta'], $item['kapasitas']) ?>
                </p>

                <p>
                    <strong>Sisa Kursi:</strong>
                    <?= sisaKursi($item['peserta'], $item['kapasitas']) ?>
                </p>

                <p>
                    <strong>Mulai:</strong>
                    <?= formatTanggal($item['tanggal']) ?>
                </p>

                <a
                    href="registration.php?kursus=<?= urlencode($item['nama']) ?>"
                    class="button"
                >
                    Daftar Kursus
                </a>

            </article>

        <?php endforeach; ?>

        <p>
            <a href="fee-calculator.php" class="button">
                Lihat Estimasi Biaya
            </a>
        </p>

    </section>


    <!-- ALUR -->
    <section id="alur">

        <h2>
            Cara Mendaftar
        </h2>

        <ol>

            <li>
                Pilih kursus yang ingin diikuti.
            </li>

            <li>
                Klik tombol Daftar Kursus.
            </li>

            <li>
                Isi formulir pendaftaran.
            </li>

            <li>
                Kirim formulir dan lihat hasil pendaftaran.
            </li>

        </ol>

    </section>


    <!-- MEDIA -->
    <section id="media">

        <h2>
            Media Pembelajaran
        </h2>

        <p>
            Kenali KursusKu melalui media berikut.
        </p>

        <img
            src="assets/images/hero-kursus.jpg"
            alt="Ilustrasi pembelajaran KursusKu"
        >

        <video controls>
            <source
                src="assets/video/intro-kursus.mp4"
                type="video/mp4"
            >

            Browser Anda tidak mendukung video.
        </video>

    </section>


    <!-- KONTAK -->
    <section id="kontak">

        <h2>
            Kontak
        </h2>

        <p>
            Untuk informasi lebih lanjut mengenai KursusKu,
            silakan hubungi kami melalui email.
        </p>

        <p>
            Email:
            <a href="mailto:info@kursusku.test">
                info@kursusku.test
            </a>
        </p>

        <p>
            Dokumentasi PHP:
            <a
                href="https://www.php.net/"
                target="_blank"
                rel="noopener noreferrer"
            >
                PHP Documentation
            </a>
        </p>

    </section>

</main>


<footer>

    <p>
        &copy; <?= $year ?> <?= htmlspecialchars($siteName) ?>.
        Semua hak dilindungi.
    </p>

</footer>

</body>
</html>