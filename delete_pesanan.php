<?php
require_once 'php/koneksi.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $koneksi->query("DELETE FROM crud_020 WHERE id = $id");
}

header("Location: admin.php");
exit();
