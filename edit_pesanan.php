<?php
require_once 'php/koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $nomor = $_POST['nomor_telepon'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $produk = $_POST['produk'];
    $jumlah = $_POST['jumlah'];

    $stmt = $koneksi->prepare("UPDATE crud_020 SET nama=?, tanggal_pesan=?, nomor_telepon=?, jenis_kelamin=?, produk=?, jumlah=? WHERE id=?");
    $stmt->bind_param("ssssssi", $nama, $tanggal, $nomor, $jenis_kelamin, $produk, $jumlah, $id);
    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Gagal mengupdate data.";
    }
}

$data = $koneksi->query("SELECT * FROM crud_020 WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Pesanan</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f0f0;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .form-box {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        input,
        select {
            width: 100%;
            padding: 10px 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            text-align: center;
            margin-top: 15px;
        }

        .back-link a {
            color: #333;
            text-decoration: none;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="form-box">
        <h2>Edit Pesanan</h2>
        <form method="post">
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
            <input type="date" name="tanggal" value="<?= $data['tanggal_pesan'] ?>" required>
            <input type="text" name="nomor_telepon" value="<?= htmlspecialchars($data['nomor_telepon']) ?>" required>

            <select name="jenis_kelamin" required>
                <option value="Laki-Laki" <?= $data['jenis_kelamin'] === 'Laki-Laki' ? 'selected' : '' ?>>Laki-Laki
                </option>
                <option value="Perempuan" <?= $data['jenis_kelamin'] === 'Perempuan' ? 'selected' : '' ?>>Perempuan
                </option>
            </select>

            <input type="text" name="produk" value="<?= htmlspecialchars($data['produk']) ?>" required>
            <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <div class="back-link">
            <a href="admin_dashboard.php">← Kembali ke Dashboard</a>
        </div>
    </div>

</body>

</html>