<?php
include 'koneksi.php';
$id = $_GET['id'];

$koneksi->query("DELETE FROM crud_020 WHERE id=$id");

echo "<script>alert('Data berhasil dihapus'); window.location='pesanan_list.php';</script>";
?>
