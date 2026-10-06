<?php

$testMatrix = [
    [
        'no' => 1,
        'scenario' => 'Mahasiswa + Web Development',
        'actual' => 'Rp 700.000',
        'expected' => 'Rp 700.000',
        'status' => 'PASS'
    ],
    [
        'no' => 2,
        'scenario' => 'Guru + Web Development',
        'actual' => 'Rp 662.500',
        'expected' => 'Rp 662.500',
        'status' => 'PASS'
    ],
    [
        'no' => 3,
        'scenario' => 'Umum + Web Development',
        'actual' => 'Rp 737.500',
        'expected' => 'Rp 737.500',
        'status' => 'PASS'
    ],
    [
        'no' => 4,
        'scenario' => 'Pilih 3 minat',
        'actual' => 'Web Development, Desain Grafis, Data Analysis',
        'expected' => 'Semua minat tampil',
        'status' => 'PASS'
    ],
    [
        'no' => 5,
        'scenario' => 'Tidak memilih minat',
        'actual' => 'Proses tetap berhasil',
        'expected' => 'Form tetap dapat diproses',
        'status' => 'PASS'
    ],
    [
        'no' => 6,
        'scenario' => 'Nama kosong',
        'actual' => 'Nama wajib diisi',
        'expected' => 'Nama wajib diisi',
        'status' => 'PASS'
    ],
    [
        'no' => 7,
        'scenario' => 'Email tidak valid',
        'actual' => 'Email wajib valid',
        'expected' => 'Email wajib valid',
        'status' => 'PASS'
    ],
    [
        'no' => 8,
        'scenario' => 'Pilih kursus',
        'actual' => 'Pilihan berasal dari array + foreach',
        'expected' => 'Pilihan berasal dari array + foreach',
        'status' => 'PASS'
    ],
    [
        'no' => 9,
        'scenario' => 'Mahasiswa',
        'actual' => 'Diskon 10%',
        'expected' => 'Diskon 10%',
        'status' => 'PASS'
    ],
    [
        'no' => 10,
        'scenario' => 'Guru',
        'actual' => 'Diskon 15%',
        'expected' => 'Diskon 15%',
        'status' => 'PASS'
    ],
    [
        'no' => 11,
        'scenario' => 'Umum',
        'actual' => 'Diskon 5%',
        'expected' => 'Diskon 5%',
        'status' => 'PASS'
    ]
];

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Matrix Pertemuan 6 - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .test-section {
            overflow-x: auto;
        }

        .test-title {
            margin-bottom: 25px;
        }

        .test-title h1 {
            margin-bottom: 8px;
            color: #1e3a8a;
        }

        .test-title p {
            margin: 0;
            color: #64748b;
        }

        .test-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
            background: white;
        }

        .test-table th {
            background: #2563eb;
            color: white;
            padding: 14px 12px;
            text-align: left;
            font-weight: 600;
        }

        .test-table td {
            padding: 14px 12px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .test-table tbody tr:hover {
            background: #f8fafc;
        }

        .test-table th:first-child,
        .test-table td:first-child {
            text-align: center;
            width: 60px;
        }

        .status-pass {
            color: #166534;
            font-weight: 700;
        }

        .test-summary {
            margin-top: 25px;
            padding: 18px 20px;
            background: #ecfdf5;
            border: 1px solid #86efac;
            border-radius: 12px;
            color: #166534;
        }

        .test-back {
            margin-top: 25px;
        }
    </style>
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

    <section class="test-section">

        <div class="test-title">

            <h1>Test Matrix Pertemuan 6</h1>

            <p>
                Pengujian fitur pendaftaran dan perhitungan biaya KursusKu
            </p>

        </div>

        <table class="test-table">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Scenario</th>
                    <th>Actual</th>
                    <th>Expected</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                <?php foreach ($testMatrix as $test): ?>

                    <tr>

                        <td>
                            <?= $test['no'] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['scenario']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['actual']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['expected']) ?>
                        </td>

                        <td class="status-pass">
                            <?= htmlspecialchars($test['status']) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

        <div class="test-summary">

            <strong>Kesimpulan:</strong>

            Seluruh skenario pengujian pada Pertemuan 6
            berhasil dijalankan dan menghasilkan status PASS.

        </div>

        <div class="test-back">

            <a href="index.php" class="button">
                Kembali ke KursusKu
            </a>

        </div>

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