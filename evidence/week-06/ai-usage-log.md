# AI Usage Log - Pertemuan 6

| Masalah/Tujuan | Saran AI | Keputusan | Hasil Uji |
|---|---|---|---|
| Branching diskon | Pisahkan aturan diskon berdasarkan `participant_type` | Diterima | Diskon Mahasiswa, Guru, dan Umum tampil berbeda |
| Checkbox kosong | Gunakan `$_POST['interests'] ?? []` dan validasi array | Diterima | Tidak ada warning saat minat kosong |
| Multiple checkbox | Gunakan checkbox dengan nama `interests[]` | Diterima | Beberapa minat dapat dipilih sekaligus |
| Looping kursus | Render daftar kursus dari array dengan `foreach` | Diterima | Pilihan kursus tampil otomatis dari array |
| Ringkasan pendaftaran | Tampilkan data POST dan rincian biaya | Diterima | Ringkasan pendaftaran dan total biaya tampil |
| Validasi form | Gunakan field wajib dan validasi input | Diterima | Nama kosong dan email tidak valid dapat diuji |
