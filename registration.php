<?php

$daftarKursus = [
    'Web Development',
    'Desain Grafis',
    'Digital Marketing',
    'Microsoft Office',
    'Data Analysis',
    'UI/UX Design'
];

$kursusDipilih = $_GET['kursus'] ?? '';

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Pendaftaran KursusKu</title>

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

    <h1>Pendaftaran KursusKu</h1>

    <p>
        Silakan isi data pendaftaran kursus dengan lengkap.
    </p>

    <form
        action="process-registration.php"
        method="GET"
    >

        <!-- NAMA -->

        <div class="form-group">

            <label for="nama">
                Nama Lengkap
            </label>

            <input
                type="text"
                id="nama"
                name="nama"
                required
            >

        </div>


        <!-- EMAIL -->

        <div class="form-group">

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                required
            >

        </div>


        <!-- TELEPON -->

        <div class="form-group">

            <label for="telepon">
                Nomor Telepon
            </label>

            <input
                type="text"
                id="telepon"
                name="telepon"
                required
            >

        </div>


        <!-- PROGRAM STUDI -->

        <div class="form-group">

            <label for="prodi">
                Program Studi
            </label>

            <input
                type="text"
                id="prodi"
                name="prodi"
                required
            >

        </div>


        <!-- KURSUS -->

        <div class="form-group">

            <label for="kursus">
                Pilih Kursus
            </label>

            <select
                id="kursus"
                name="kursus"
                required
            >

                <option value="">
                    -- Pilih Kursus --
                </option>

                <?php foreach ($daftarKursus as $kursus): ?>

                    <option
                        value="<?= htmlspecialchars($kursus) ?>"
                        <?= $kursusDipilih === $kursus ? 'selected' : '' ?>
                    >

                        <?= htmlspecialchars($kursus) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- JENIS PESERTA -->

        <div class="form-group">

            <label>
                Jenis Peserta
            </label>

            <div class="radio-group">

                <label>

                    <input
                        type="radio"
                        name="participant_type"
                        value="Mahasiswa"
                        required
                    >

                    Mahasiswa

                </label>


                <label>

                    <input
                        type="radio"
                        name="participant_type"
                        value="Umum"
                    >

                    Umum

                </label>

            </div>

        </div>


        <!-- MINAT -->

        <div class="form-group">

            <label>
                Minat Kursus
            </label>

            <div class="checkbox-group">

                <label>

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="Web Development"
                    >

                    Web Development

                </label>


                <label>

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="Desain Grafis"
                    >

                    Desain Grafis

                </label>


                <label>

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="Data Analysis"
                    >

                    Data Analysis

                </label>


                <label>

                    <input
                        type="checkbox"
                        name="interests[]"
                        value="Digital Marketing"
                    >

                    Digital Marketing

                </label>

            </div>

        </div>


        <!-- CATATAN -->

        <div class="form-group">

            <label for="catatan">
                Catatan
            </label>

            <textarea
                id="catatan"
                name="catatan"
                placeholder="Masukkan catatan jika diperlukan"
            ></textarea>

        </div>


        <!-- SOURCE -->

        <input
            type="hidden"
            name="source"
            value="website"
        >


        <!-- BUTTON -->

        <button
            type="submit"
            class="button"
        >
            Daftar Sekarang
        </button>

    </form>

</section>

</main>

<footer>

    <p>
        &copy; <?= date('Y') ?> KursusKu.
    </p>

</footer>

</body>

</html>