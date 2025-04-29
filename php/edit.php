<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM crud_020 WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $nomor = $_POST['nomor_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $sql = "UPDATE crud_123 SET 
            nama='$nama', tanggal_pesan='$tanggal', nomor_telepon='$nomor', 
            jenis_kelamin='$jenis_kelamin', produk='$produk', jumlah='$jumlah'
            WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil diupdate'); window.location='pesanan_list.php';</script>";
    } else {
        echo "Gagal: " . $koneksi->error;
    }
}
?>

<h2>Edit Pesanan</h2>
<form method="POST">
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>
    Tanggal: <input type="datetime-local" name="tanggal" value="<?= date('Y-m-d\TH:i', strtotime($data['tanggal_pesan'])) ?>"><br>
    Nomor Telepon: <input type="text" name="nomor_telepon" value="<?= $data['nomor_telepon'] ?>"><br>
    Jenis Kelamin:
    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= ($data['jenis_kelamin'] == 'Laki-laki') ? 'checked' : '' ?>> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan" <?= ($data['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?>> Perempuan<br>
    Produk: <input type="text" name="produk" value="<?= $data['produk'] ?>"><br>
    Jumlah: <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>"><br>
    <button type="submit">Update</button>
</form>
