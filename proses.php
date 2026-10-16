
<?php
require_once 'data/menu.php';

function e($teks) {
    return htmlspecialchars(
        (string) $teks,
        ENT_QUOTES,
        'UTF-8'
    );
}

$pesanError = [];
$pesanSukses = '';

$kode = '';
$jumlahInput = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode_menu'] ?? '';
    $jumlahInput = $_POST['jumlah'] ?? '';

    // Validasi kode menu
    if (
        !is_string($kode) ||
        !array_key_exists($kode, $menu)
    ) {
        $pesanError[] = 'Kode menu tidak valid.';
    }

    // Validasi jumlah harus berupa bilangan bulat
    if (
        !is_string($jumlahInput) ||
        !preg_match('/^[0-9]+$/', $jumlahInput)
    ) {
        $pesanError[] = 'Jumlah harus berupa bilangan bulat.';
    } else {
        $jumlah = (int) $jumlahInput;

        if ($jumlah < 1 || $jumlah > 10) {
            $pesanError[] = 'Jumlah pembelian harus antara 1 sampai 10.';
        }
    }

    if (empty($pesanError)) {
        $pesanSukses = 'Validasi berhasil! Data pesanan siap diproses.';
    }
} else {
    $pesanError[] = 'Akses ditolak. Silakan kirim pesanan melalui formulir.';
}

require_once 'includes/header.php';
?>

<h2>Proses Pemesanan</h2>

<?php if (!empty($pesanError)): ?>
    <div class="error">
        <p>Pesanan ditolak:</p>
        <ul>
            <?php foreach ($pesanError as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <p class="success"><?= e($pesanSukses) ?></p>

    <p>Kode menu: <?= e($kode) ?></p>
    <p>Nama menu: <?= e($menu[$kode]['nama']) ?></p>
    <p>Jumlah: <?= e($jumlah) ?></p>
    <p>Harga satuan: Rp<?= number_format(
        $menu[$kode]['harga'], 0, ',', '.'
    ) ?></p>
    <p>Subtotal: Rp<?= number_format(
        $menu[$kode]['harga'] * $jumlah, 0, ',', '.'
    ) ?></p>

    <p>Keranjang session akan diimplementasikan pada tahap 4.</p>
<?php endif; ?>

<p><a href="index.php">Kembali ke daftar menu</a></p>

<?php require_once 'includes/footer.php'; ?>
