<?php
include 'koneksi.php';
$data = $koneksi->query("SELECT * FROM crud_020");
?>

<h2>Daftar Pesanan</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>No. Telepon</th>
        <th>Jenis Kelamin</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = $data->fetch_assoc()) : ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['tanggal_pesan'] ?></td>
        <td><?= $row['nomor_telepon'] ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= $row['produk'] ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<a href="index.php">Kembali</a>