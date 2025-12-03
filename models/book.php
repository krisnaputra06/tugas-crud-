<?php
require_once __DIR__ . '/../config/database.php';

class Book {
    private $db;

    public function __construct() {
        $this->db = (new Database())->pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM books ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($judul, $penulis, $tahun, $kategori, $cover, $status) {
        $stmt = $this->db->prepare("INSERT INTO books (judul, penulis, tahun_terbit, kategori, cover, status)
                                    VALUES (?,?,?,?,?,?)");
        return $stmt->execute([$judul, $penulis, $tahun, $kategori, $cover, $status]);
    }

    public function update($id, $judul, $penulis, $tahun, $kategori, $cover, $status) {
        $stmt = $this->db->prepare("UPDATE books 
                                    SET judul=?, penulis=?, tahun_terbit=?, kategori=?, cover=?, status=?
                                    WHERE id=?");
        return $stmt->execute([$judul, $penulis, $tahun, $kategori, $cover, $status, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM books WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
