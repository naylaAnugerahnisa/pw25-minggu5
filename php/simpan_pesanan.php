<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$nomor = $_POST['nomor_telepon'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$produk = $_POST['produk'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO crud_020 (nama, tanggal_pesan, nomor_telepon, jenis_kelamin, produk, jumlah)
        VALUES ('$nama', '$tanggal', '$nomor', '$jenis_kelamin', '$produk', '$jumlah')";

if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('Pesanan berhasil disimpan'); window.location='../pemesanan.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>
