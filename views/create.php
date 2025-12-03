<?php
require_once __DIR__ . '/../controllers/BookController.php';
$controller = new BookController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->store($_POST, $_FILES);
    header("Location: index.php");
}
?>

<h2>Tambah Buku</h2>
<a href="index.php">Kembali</a>

<form method="POST" enctype="multipart/form-data">

Judul: <br>
<input type="text" name="judul" required><br><br>

Penulis: <br>
<input type="text" name="penulis" required><br><br>

Tahun: <br>
<input type="number" name="tahun" required><br><br>

Kategori: <br>
<select name="kategori">
    <option value="Fiksi">Fiksi</option>
    <option value="Non-Fiksi">Non-Fiksi</option>
    <option value="Edukasi">Edukasi</option>
</select><br><br>

Cover:<br>
<input type="file" name="cover"><br><br>

Status: <br>
<select name="status">
    <option value="tersedia">Tersedia</option>
    <option value="habis">Habis</option>
</select>
<br><br>

<button type="submit">Simpan</button>

</form>
