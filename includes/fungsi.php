
<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function e($teks) {
    return htmlspecialchars(
        (string) $teks,
        ENT_QUOTES,
        'UTF-8'
    );
}

function rupiah($angka) {
    return 'Rp' . number_format(
        $angka,
        0,
        ',',
        '.'
    );
}

function hitungSubtotal($keranjang, $menu) {
    $subtotal = 0;

    foreach ($keranjang as $kode => $jumlah) {
        if (isset($menu[$kode])) {
            $subtotal += $menu[$kode]['harga'] * $jumlah;
        }
    }

    return $subtotal;
}

function hitungDiskon($subtotal) {
    if ($subtotal >= 50000) {
        return $subtotal * 0.10;
    }

    return 0;
}

function hitungTotal($subtotal, $diskon) {
    return $subtotal - $diskon;
}
