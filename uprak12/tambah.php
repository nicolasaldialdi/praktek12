<?php
require "conn.php";
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Proses Tambah data 
if (isset($_POST['tambah'])) {
    $nama_makanan = $_POST['nama_makanan'];
    $kode_makanan = $_POST['kode_makanan'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO kantin (nama_makanan, kode_makanan, kategori, harga, stok, deskripsi) VALUES ('$nama_makanan', '$kode_makanan', '$kategori', '$harga', '$stok', '$deskripsi')";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container mt-3">
<h3>Tambah Data</h3>
<form method="POST" action="tambah.php">
            <div class="mb-3">
                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" required>
            </div>
            <div class="mb-3">
                <label for="kode_makanan" class="form-label">Kode Makanan</label>
                <input type="text" class="form-control" id="kode_makanan" name="kode_makanan" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Makanan</label>
                <input type="text" class="form-control" id="kategori" name="kategori" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Makanan</label>
                <input type="text" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Sisa Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
            </div>
            <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        </form>
</div>
</body>
</html>