<?php

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function statusKursus($peserta, $kapasitas)
{
    if ($peserta >= $kapasitas) {
        return 'Penuh';
    }

    return 'Tersedia';
}

function sisaKursi($peserta, $kapasitas)
{
    return $kapasitas - $peserta;
}

function formatTanggal($tanggal)
{
    return date('d-m-Y', strtotime($tanggal));
}

?>