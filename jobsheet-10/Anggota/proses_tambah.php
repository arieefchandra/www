<?php
require __DIR__ . '/../includes/auth.php';
session_start();
require __DIR__ . '/../includes/koneksi.php';

$nama = trim($_POST['nama'] ?? '');
$noAnggota = trim($_POST['no_anggota'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
$noHp = trim($_POST['no_hp'] ?? '');
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '';

$stmt = $pdo->prepare(
    "INSERT INTO anggota (nama, no_anggota, alamat, no_hp, jenis_kelamin)
     VALUES (:nama, :no_anggota, :alamat, :no_hp, :jenis_kelamin)
     RETURNING id"
);
$stmt->execute([
    'nama' => $nama,
    'no_anggota' => $noAnggota,
    'alamat' => $alamat,
    'no_hp' => $noHp,
    'jenis_kelamin' => $jenis_kelamin,
]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Anggota berhasil ditambahkan.'];
header('Location: list.php');
exit;