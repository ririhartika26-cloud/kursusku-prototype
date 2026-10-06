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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pendaftaran KursusKu</title>

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

    <section>

        <h1>Pendaftaran Kursus</h1>

        <p>
            Silakan isi data berikut untuk melakukan pendaftaran kursus.
        </p>

        <form action="process-registration.php" method="POST">

            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    placeholder="Masukkan nama lengkap"
                    required
                >

            </div>


            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Masukkan email"
                    required
                >

            </div>


            <div class="form-group">

                <label for="telepon">
                    Nomor Telepon
                </label>

                <input
                    type="tel"
                    id="telepon"
                    name="telepon"
                    placeholder="Masukkan nomor telepon"
                    required
                >

            </div>


            <div class="form-group">

                <label for="prodi">
                    Program Studi
                </label>

                <input
                    type="text"
                    id="prodi"
                    name="prodi"
                    placeholder="Masukkan program studi"
                    required
                >

            </div>


            <div class="form-group">

                <label for="kursus">
                    Pilihan Kursus
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
                            value="Guru"
                        >
                        Guru
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


            <div class="form-group">

                <label>
                    Minat Belajar
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
                            value="Desain"
                        >
                        Desain
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


            <div class="form-group">

                <label for="catatan">
                    Catatan
                </label>

                <textarea
                    id="catatan"
                    name="catatan"
                    rows="4"
                    placeholder="Tulis catatan jika ada"
                ></textarea>

            </div>


            <input
                type="hidden"
                name="source"
                value="website"
            >


            <button
                type="submit"
                class="button"
            >
                Kirim Pendaftaran
            </button>

        </form>

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