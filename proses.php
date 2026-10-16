
<?php
require_once 'includes/fungsi.php';
require_once 'data/menu.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

$aksi = $_POST['aksi'] ?? 'tambah';
$pesan = '';
$tipe = 'error';

if ($aksi === 'tambah') {
    $kode = $_POST['kode_menu'] ?? '';
    $inputJumlah = $_POST['jumlah'] ?? '';

    if (!is_string($kode) || !isset($menu[$kode])) {
        $pesan = 'Kode menu tidak valid.';
    } elseif (
        !is_string($inputJumlah) ||
        !preg_match('/^[0-9]+$/', $inputJumlah)
    ) {
        $pesan = 'Jumlah harus berupa bilangan bulat.';
    } else {
        $jumlah = (int) $inputJumlah;

        if ($jumlah < 1 || $jumlah > 10) {
            $pesan = 'Jumlah pembelian harus antara 1 sampai 10.';
        } else {
            $jumlahLama = $_SESSION['keranjang'][$kode] ?? 0;
            $jumlahBaru = $jumlahLama + $jumlah;

            if ($jumlahBaru > 10) {
                $pesan = 'Gagal! Jumlah menu maksimal 10.';
            } else {
                $_SESSION['keranjang'][$kode] = $jumlahBaru;
                $pesan = 'Menu berhasil ditambahkan ke keranjang.';
                $tipe = 'success';
            }
        }
    }
} elseif ($aksi === 'hapus') {
    $kode = $_POST['kode_menu'] ?? '';

    if (
        is_string($kode) &&
        isset($_SESSION['keranjang'][$kode])
    ) {
        unset($_SESSION['keranjang'][$kode]);
        $pesan = 'Item berhasil dihapus.';
        $tipe = 'success';
    } else {
        $pesan = 'Item tidak ditemukan di keranjang.';
    }
} elseif ($aksi === 'kosongkan') {
    $_SESSION['keranjang'] = [];
    $pesan = 'Keranjang berhasil dikosongkan.';
    $tipe = 'success';
} else {
    $pesan = 'Aksi tidak valid.';
}

$_SESSION['flash'] = [
    'pesan' => $pesan,
    'tipe' => $tipe
];

header('Location: keranjang.php');
exit;
