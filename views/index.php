<?php
require_once __DIR__ . '/../controllers/BookController.php';
$controller = new BookController();
$books = $controller->index();
?>

<h2>Daftar Buku</h2>
<a href="create.php">Tambah Buku</a>
<br><br>

<table border="1" cellpadding="8">
<tr>
    <th>ID</th><th>Judul</th><th>Penulis</th><th>Tahun</th>
    <th>Kategori</th><th>Cover</th><th>Status</th><th>Aksi</th>
</tr>

<?php foreach ($books as $b): ?>
<tr>
    <td><?= $b['id'] ?></td>
    <td><?= $b['judul'] ?></td>
    <td><?= $b['penulis'] ?></td>
    <td><?= $b['tahun_terbit'] ?></td>
    <td><?= $b['kategori'] ?></td>
    <td>
        <?php if ($b['cover']): ?>
            <img src="../uploads/<?= $b['cover'] ?>" width="70">
        <?php endif; ?>
    </td>
    <td><?= $b['status'] ?></td>
    <td>
        <a href="edit.php?id=<?= $b['id'] ?>">Edit</a> | 
        <a href="delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Hapus?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>
