# UTS Web I - Pemesanan Kantin Kampus

## Identitas Mahasiswa
- Nama  : Lulu' Khairunnisa
- NIM   : 25012087
- Kelas : 25M31

## Deskripsi Aplikasi
Aplikasi Pemesanan Kantin Kampus dibuat menggunakan PHP Native.
Pengguna dapat melihat menu, mencari makanan, memesan menu,
mengelola keranjang, dan melihat total pembayaran.

## Kebutuhan
- XAMPP
- PHP
- Web browser
- Git

## Cara Menjalankan
1. Simpan folder project di dalam htdocs.
2. Jalankan Apache melalui XAMPP.
3. Buka browser.
4. Akses http://localhost/uts-web1-25012087/

## Struktur Project
- index.php: halaman daftar menu
- keranjang.php: halaman keranjang
- proses.php: memproses pesanan
- data/menu.php: data menu
- includes/fungsi.php: fungsi aplikasi
- includes/header.php: bagian header
- includes/footer.php: bagian footer
- assets/style.css: tampilan aplikasi


## Catatan Hasil Pengujian

Dokumentasi pengujian aplikasi Pemesanan Kantin Kampus.

| ID | Input/Langkah | Hasil yang Diharapkan | Hasil Aktual | Status | Bukti |
|---|---|---|---|---|---|
| U01 | Buka halaman menu | Minimal 5 menu tampil | 5 menu tampil | Lulus | [Screenshot](/dokumentasi/pengujian/U01-daftar-menu.png) |
| U02a | Cari "Nasi Goreng" | Menu yang sesuai tampil | Nasi Goreng tampil | Lulus | [Screenshot](/dokumentasi/pengujian/U02a-pencarian-ditemukan.png) |
| U02b | Cari "Dimsum" | Pesan tidak ditemukan | Pesan tidak ditemukan tampil | Lulus | [Screenshot](/dokumentasi/pengujian/U02b-pencarian-kosong.png) |
| U03a | Kirim jumlah kosong | Ditolak, keranjang tetap | Pesan kesalahan tampil, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U03a-jumlah-kosong.png) |
| U03b | Kirim jumlah negatif | Ditolak, keranjang tetap | Pesan kesalahan tampil, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U03b-jumlah-negatif.png) |
| U03c | Kirim jumlah pecahan | Ditolak, keranjang tetap | Pesan kesalahan tampil, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U03c-jumlah-pecahan.png) |
| U03d | Kirim jumlah 11 | Ditolak, keranjang tetap | Pesan kesalahan tampil, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U03d-jumlah-11.png) |
| U03e | Kirim jumlah nol | Ditolak, keranjang tetap | Pesan kesalahan tampil, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U03e-jumlah-nol.png) |
| U04 | Kirim kode tidak valid (M009), jumlah 1 | Server menolak kode dan keranjang tetap | Pesan kode menu tidak valid tampil, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U04-kode-menu-tidak-valid.png) |
| U05a | Menambahkan menu dengan jumlah 3 | Menu masuk ke keranjang dengan jumlah 3 | Menu bertambah dengan jumlah 3 | Lulus | [Screenshot](/dokumentasi/pengujian/U05a-tambah-menu.png)
| U05b | Menambahkan menu yang sama sebanyak 4 lagi | Menu yang sama bertambah menjadi 7 | Lulus | [Screenshot](/dokumentasi/pengujian/U05b-gabung-jumlah.png) |
| U05c | Menambahkan menu hingga jumlah tepat 10 | Menu yang sama bertambah menjadi 10 | Lulus | [Screenshot](/dokumentasi/pengujian/U05c-batas-maksimal.png) |
| U05d | Menambahkan menu melebihi batas 10 | Pesan batas maksimal menu tampil, menu tidak bertambah | Lulus | [Screenshot](/dokumentasi/pengujian/U05d-melebihi-batas.png) |
| U05e | Refresh halaman keranjang | Halaman ter-refresh, keranjang tetap | Lulus | [Screenshot](/dokumentasi/pengujian/U05e-session-refresh.png) |
| U05f | Menghapus satu item | Pesan item terhapus muncul | Lulus | [Screenshot](/dokumentasi/pengujian/U05f-hapus-item.png) |
| U05g | Mengosongkan keranjang | Pesan keranjang sudah dikosongkan muncul, keranjang kosong | Lulus | [Screenshot](/dokumentasi/pengujian/U05g-kosongkan.png) |
| U06a | Melihat keranjang sebelum berpindah halaman | Keranjang menampilkan Es Teh sebanyak 1 sebelum refresh | Lulus | [Screenshot](/dokumentasi/pengujian/U06a-sebelum-refresh.png) |
| U06b | Refresh dan berpindah halaman | Setelah refresh dan berpindah halaman, Es Teh tetap tersedia dengan jumlah 1 | Lulus | [Screeshot](/dokumentasi/pengujian/U06b-sesudah-refresh.png) |
| U07a | Menambahkan menu melalui POST | Setelah pengiriman POST, browser dialihkan ke keranjang.php, item masuk ke keranjang, dan flash message tampil satu kali | Lulus | [Screenshot](/dokumentasi/pengujian/U07a-setelah-post.png) |
| U07b | Refresh halaman setelah POST | Setelah halaman di-refresh, jumlah item tidak bertambah dan flash message tidak muncul kembali | Lulus | [Screenshot](/dokumentasi/pengujian/U07b-setelah-refresh.png) |
| U08a | Subtotal Rp49.000 | Diskon Rp0 dan total Rp49.000 | Subtotal Rp49.000 tampil dengan diskon Rp0 dan total akhir Rp49.000 | Lulus | [Screenshot](/dokumentasi/pengujian/U08a-subtotal-49000.png) |
| U08b | Subtotal Rp50.000 | Diskon Rp5.000 dan total Rp45.000 | Subtotal Rp50.000 tampil dengan diskon Rp5.000 dan total akhir Rp45.000 | Lulus | [Screenshot](/dokumentasi/pengujian/U08b-subtotal-50000.png) |
| U09a |
| U09b |
| U10a |
| U10b |
| U10c |

Screenshot pengujian akan ditambahkan pada setiap tahap.
