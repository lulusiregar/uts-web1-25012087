
<?php
require_once 'includes/fungsi.php';
require_once 'data/menu.php';

$keranjang = $_SESSION['keranjang'] ?? [];

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

require_once 'includes/header.php';
?>

<h2>Keranjang Pesanan</h2>

<?php if ($flash): ?>
    <p class="<?= e($flash['tipe']) ?>">
        <?= e($flash['pesan']) ?>
    </p>
<?php endif; ?>

<?php if (empty($keranjang)): ?>

    <p>Keranjang masih kosong.</p>

<?php else: ?>

    <table>
        <thead>
            <tr>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $totalSubtotal = hitungSubtotal($keranjang, $menu);
            $diskon = hitungDiskon($totalSubtotal);
            $totalAkhir = hitungTotal($totalSubtotal, $diskon);

            foreach ($keranjang as $kode => $jumlah):
                if (!isset($menu[$kode])) {
                    continue;
                }

                $item = $menu[$kode];
                $subtotal = $item['harga'] * $jumlah;
            ?>

            <tr>
                <td><?= e($item['nama']) ?></td>
                <td><?= rupiah($item['harga']) ?></td>
                <td><?= e($jumlah) ?></td>
                <td><?= rupiah($subtotal) ?></td>
                <td>
                    <form action="proses.php" method="POST">
                        <input
                            type="hidden"
                            name="aksi"
                            value="hapus"
                        >

                        <input
                            type="hidden"
                            name="kode_menu"
                            value="<?= e($kode) ?>"
                        >

                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    
    <CodeBlock language="php" editable>
        <p>Subtotal: <?= rupiah($totalSubtotal) ?></p>
        <p>Diskon: <?= rupiah($diskon) ?></p>
        <h3>Total akhir: <?= rupiah($totalAkhir) ?></h3>
        
        <form action="proses.php" method="POST">
            <input
                type="hidden"
                name="aksi"
                value="kosongkan"
            >

            <button type="submit">Kosongkan Keranjang</button>
        </form>

    <?php endif; ?>

    <p>
        <a href="index.php">Kembali ke daftar menu</a>
    </p>

    <?php require_once 'includes/footer.php'; ?>
