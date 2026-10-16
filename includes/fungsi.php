
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
