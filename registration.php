<?php

require_once 'helpers.php';

$kursusDipilih = $_GET['kursus'] ?? '';

$daftarKursus = [
    'Web Development',
    'Desain Grafis',
    'Digital Marketing',
    'Microsoft Office',
    'Data Analysis',
    'UI/UX Design'
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

    <title>Pendaftaran KursusKu</title>

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

        <h1>Formulir Pendaftaran Kursus</h1>

        <form
            action="process-registration.php"
            method="GET"
        >

           <div class="form-group">

    <label for="nama">
        Nama Lengkap
    </label>

    <input 
        type="text" 
        id="nama" 
        name="nama"
        placeholder="Masukkan nama lengkap"
        autocomplete="off"
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
                            name="jenis_peserta"
                            value="Mahasiswa"
                            required
                        >
                        Mahasiswa
                    </label>

                    <label>
                        <input
                            type="radio"
                            name="jenis_peserta"
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
                            name="minat[]"
                            value="Teknologi"
                        >
                        Teknologi
                    </label>

                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Desain"
                        >
                        Desain
                    </label>

                    <label>
                        <input
                            type="checkbox"
                            name="minat[]"
                            value="Bisnis"
                        >
                        Bisnis
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
                    placeholder="Tulis catatan jika diperlukan..."
                ></textarea>

            </div>


            <input
                type="hidden"
                name="source"
                value="website-kursusku"
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