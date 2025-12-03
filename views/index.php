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
    <td><?= htmlspecialchars($b['id']) ?></td>
    <td><?= htmlspecialchars($b['judul']) ?></td>
    <td><?= htmlspecialchars($b['penulis']) ?></td>
    <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
    <td><?= htmlspecialchars($b['kategori']) ?></td>
    <td>
        <?php if ($b['cover']): ?>
            <img src="../uploads/<?= htmlspecialchars($b['cover']) ?>" width="70">
        <?php endif; ?>
    </td>
    <td><?= htmlspecialchars($b['status']) ?></td>
    <td>
        <a href="edit.php?id=<?= htmlspecialchars($b['id']) ?>">Edit</a> | 
        <a href="delete.php?id=<?= htmlspecialchars($b['id']) ?>" onclick="return confirm('Hapus?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>