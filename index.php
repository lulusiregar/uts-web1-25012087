
<?php
require_once 'data/menu.php';

function e($teks) {
    return htmlspecialchars(
        (string) $teks,
        ENT_QUOTES,
        'UTF-8'
    );
}

$cari = trim($_GET['cari'] ?? '');
$kategori = $_GET['kategori'] ?? '';

$hasilMenu = [];

foreach ($menu as $kode => $item) {
    $cocokNama = stripos($item['nama'], $cari) !== false;
    $cocokKategori = (
        $kategori === '' ||
        $item['kategori'] === $kategori
    );

    if ($cocokNama && $cocokKategori) {
        $hasilMenu[$kode] = $item;
    }
}

require_once 'includes/header.php';
?>

<h2>Daftar Menu Kantin</h2>

<form method="GET" action="index.php">
    <label for="cari">Cari nama menu:</label>
    <input
        type="text"
        id="cari"
        name="cari"
        value="<?= e($cari) ?>"
        placeholder="Contoh: nasi goreng"
    >

    <label for="kategori">Kategori:</label>
    <select id="kategori" name="kategori">
        <option value="">Semua Kategori</option>

        <?php foreach ($kategoriTersedia as $namaKategori): ?>
            <option
                value="<?= e($namaKategori) ?>"
                <?= $kategori === $namaKategori ? 'selected' : '' ?>
            >
                <?= e($namaKategori) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Cari Menu</button>
    <a href="index.php">Reset</a>
</form>

<p>
    Menampilkan <?= count($hasilMenu) ?> menu.
</p>

<?php if (count($hasilMenu) > 0): ?>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Menu</th>
                <th>Kategori</th>
                <th>Harga</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($hasilMenu as $kode => $item): ?>
                <tr>
                    <td><?= e($kode) ?></td>
                    <td><?= e($item['nama']) ?></td>
                    <td><?= e($item['kategori']) ?></td>
                    <td>
                        Rp<?= number_format(
                            $item['harga'],
                            0,
                            ',',
                            '.'
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php else: ?>

    <p class="error">
        Menu tidak ditemukan. Coba kata kunci lain.
    </p>

<?php endif; ?>

<?php require_once 'includes/footer.php'; ?>
