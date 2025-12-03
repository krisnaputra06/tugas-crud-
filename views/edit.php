<?php
require_once __DIR__ . '/../controllers/BookController.php';
$controller = new BookController();

$id = $_GET['id'];
$buku = $controller->model->getById($id);

if (!$buku) die("Data tidak ditemukan.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, $_POST, $_FILES);
    header("Location: index.php");
    exit;
}
?>

<h2>Edit Buku</h2>
<a href="index.php">Kembali</a>

<form method="POST" enctype="multipart/form-data">

Judul: <br>
<input type="text" name="judul" value="<?= htmlspecialchars($buku['judul']) ?>" required><br><br>

Penulis: <br>
<input type="text" name="penulis" value="<?= htmlspecialchars($buku['penulis']) ?>" required><br><br>

Tahun Terbit: <br>
<input type="number" name="tahun" value="<?= htmlspecialchars($buku['tahun_terbit']) ?>" required><br><br>

Kategori: <br>
<select name="kategori">
    <option value="Fiksi" <?= htmlspecialchars($buku['kategori'])=="Fiksi"?"selected":"" ?>>Fiksi</option>
    <option value="Non-Fiksi" <?= htmlspecialchars($buku['kategori'])=="Non-Fiksi"?"selected":"" ?>>Non-Fiksi</option>
    <option value="Edukasi" <?= htmlspecialchars($buku['kategori'])=="Edukasi"?"selected":"" ?>>Edukasi</option>
</select><br><br>

Cover Lama: <br>
<?php if ($buku['cover']): ?>
    <img src="../uploads/<?= htmlspecialchars($buku['cover']) ?>" width="90"><br><br>
<?php endif; ?>

Ganti Cover Baru (opsional): <br>
<input type="file" name="cover"><br><br>

Status: <br>
<select name="status">
    <option value="tersedia" <?= htmlspecialchars($buku['status'])=="tersedia"?"selected":"" ?>>Tersedia</option>
    <option value="habis" <?= htmlspecialchars($buku['status'])=="habis"?"selected":"" ?>>Habis</option>
</select><br><br>

<button type="submit">Update</button>

</form>