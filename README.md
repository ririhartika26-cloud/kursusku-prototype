# KursusKu

Prototype website kursus berbasis PHP yang dikembangkan menggunakan Laragon.

## Pertemuan 3 - Kalkulator Estimasi Biaya

### Rumus Bisnis

1. Subtotal = harga per peserta × jumlah peserta
2. Nilai diskon = subtotal × (persentase diskon / 100)
3. Total setelah diskon = subtotal - nilai diskon
4. Total akhir = total setelah diskon + biaya admin

### Contoh Input

- Nama kursus: Web Development
- Harga per peserta: Rp750.000
- Jumlah peserta: 2
- Diskon: 10%
- Biaya admin: Rp25.000

### Expected Total

Subtotal:

Rp750.000 × 2 = Rp1.500.000

Diskon:

10% × Rp1.500.000 = Rp150.000

Total setelah diskon:

Rp1.500.000 - Rp150.000 = Rp1.350.000

Total akhir:

Rp1.350.000 + Rp25.000 = Rp1.375.000

### Catatan

Nilai uang disimpan sebagai integer agar mudah digunakan dalam proses
aritmatika. Format rupiah hanya diterapkan pada bagian output menggunakan
number_format().