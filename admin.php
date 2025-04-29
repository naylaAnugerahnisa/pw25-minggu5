<?php
session_start();
require_once 'php/koneksi.php';

// Cek login admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Ambil data dari database
$query = "SELECT * FROM crud_020 ORDER BY id DESC";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        a.button {
            padding: 6px 12px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.button:hover {
            background-color: #218838;
        }
        .delete {
            background-color: #dc3545;
        }
        .delete:hover {
            background-color: #c82333;
        }
        .logout {
            margin-top: 20px;
            text-align: center;
        }
        .logout a {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Data Pemesanan</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Nomor Telepon</th>
        <th>Jenis Kelamin</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= $row['tanggal_pesan'] ?></td>
        <td><?= htmlspecialchars($row['nomor_telepon']) ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= htmlspecialchars($row['produk']) ?></td>
        <td><?= $row['jumlah'] ?></td>
        <td>
            <a class="button" href="edit_pesanan.php?id=<?= $row['id'] ?>">Edit</a>
            <a class="button delete" href="delete_pesanan.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<div class="logout">
    <p><a href="php/logout.php">Logout</a></p>
</div>

</body>
</html>
