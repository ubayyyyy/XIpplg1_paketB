<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'galerifoto');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
