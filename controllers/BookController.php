<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
    public $model;

    public function __construct() {
        $this->model = new Book();
    }

    public function index() {
        return $this->model->getAll();
    }

    public function store($data, $file) {
        $cover = null;

        if (!empty($file['cover']['name'])) {
            $filename = time() . "_" . $file['cover']['name'];
            $path = __DIR__ . '/../uploads/' . $filename;
            // PENTING: Lakukan validasi tipe file dan ukuran di sini sebelum move!
            if (move_uploaded_file($file['cover']['tmp_name'], $path)) {
                $cover = $filename;
            }
        }

        return $this->model->create(
            $data['judul'],
            $data['penulis'],
            $data['tahun'],
            $data['kategori'],
            $cover,
            $data['status']
        );
    }

    public function update($id, $data, $file) {
        $book = $this->model->getById($id);

        if (!$book) {
            die("Data buku tidak ditemukan");
        }

        $cover = $book['cover'];

        if (!empty($file['cover']['name'])) {
            $filename = time() . "_" . $file['cover']['name'];
            $path = __DIR__ . '/../uploads/' . $filename;
            
            // PENTING: Hapus cover lama jika ada sebelum upload baru
            if ($book['cover'] && file_exists(__DIR__ . '/../uploads/' . $book['cover'])) {
                unlink(__DIR__ . '/../uploads/' . $book['cover']);
            }
            
            // PENTING: Lakukan validasi tipe file dan ukuran di sini sebelum move!
            if (move_uploaded_file($file['cover']['tmp_name'], $path)) {
                $cover = $filename;
            }
        }

        return $this->model->update(
            $id,
            $data['judul'],
            $data['penulis'],
            $data['tahun'],
            $data['kategori'],
            $cover,
            $data['status']
        );
    }

    public function destroy($id) {
        $book = $this->model->getById($id);

        if (!$book) {
            return false; // Buku tidak ditemukan
        }

        // PENTING: Hapus file cover fisik
        if ($book['cover'] && file_exists(__DIR__ . '/../uploads/' . $book['cover'])) {
            unlink(__DIR__ . '/../uploads/' . $book['cover']);
        }
        
        // Hapus data dari database
        return $this->model->delete($id);
    }
}
?>