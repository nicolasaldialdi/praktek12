<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM kantin WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama_makanan = $_POST['nama_makanan'];
    $kode_makanan = $_POST['kode_makanan'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE kantin SET nama_makanan = '$nama_makanan', kode_makanan = '$kode_makanan', kategori = '$kategori', harga = '$harga', stok = '$stok' , deskripsi = '$deskripsi' WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Edit Siswa</h1>

        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="nama_makanan" class="form-label">Nama Makanan</label>
                <input type="text" class="form-control" id="nama_makanan" name="nama_makanan" value="<?=$row['nama_makanan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kode_makanan" class="form-label">Kode Makanan</label>
                <input type="text" class="form-control" id="kode_makanan" name="kode_makanan" value="<?php echo $row['kode_makanan']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori Makanan</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Makanan</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Sisa Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>
