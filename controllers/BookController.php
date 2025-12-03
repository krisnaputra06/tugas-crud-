<?php
require_once __DIR__ . '/../models/Book.php';

class BookController {
    private $model;

    public function __construct() {
        $this->model = new Book();
    }

    public function index() {
        return $this->model->getAll();
    }

    public function store($data, $file) {
        $cover = null;
        if ($file['cover']['name']) {
            $filename = time() . '_' . $file['cover']['name'];
            move_uploaded_file($file['cover']['tmp_name'], __DIR__ . '/../uploads/' . $filename);
            $cover = $filename;
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
        $cover = $book['cover'];

        if ($file['cover']['name']) {
            $filename = time() . '_' . $file['cover']['name'];
            move_uploaded_file($file['cover']['tmp_name'], __DIR__ . '/../uploads/' . $filename);
            $cover = $filename;
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
        return $this->model->delete($id);
    }
}
?>
