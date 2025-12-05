# 📚 Aplikasi CRUD Data Buku

Aplikasi ini merupakan proyek sederhana untuk mengelola data buku menggunakan fitur **CRUD** (Create, Read, Update, Delete). Dibangun dengan **PHP** berkonsep **OOP**, menggunakan **PDO** untuk koneksi database MySQL, serta mendukung **upload cover buku**.

Tujuan utama aplikasi ini adalah untuk memahami:
- Cara menghubungkan PHP dengan database menggunakan PDO
- Pengelolaan data dinamis melalui CRUD
- Validasi input dan proses upload file pada PHP
- Penerapan struktur project yang modular

---

## Fitur Aplikasi
- Tambah data buku
- Tampilkan daftar buku dalam tabel
- Edit data buku
- Hapus data buku
- Upload dan menampilkan gambar cover buku

---

## Struktur Folder
```
project/
│── config/
│ └── Database.php
│── controllers/
│ └── BookController.php
│── models/
│ └── Book.php
│── uploads/
│ ├── asset
│ └── dbbuku.sql
│── views/
│ ├── create.php
│ ├── delete.php
│ ├── edit.php
│ └── index.php
│── index.php
└── readme.MD
```
---

### Penjelasan Singkat Fungsi Aplikasi

- **Create** → Form tambah buku, data disimpan ke database menggunakan PDO  
- **Read** → Menampilkan daftar semua buku dalam bentuk tabel  
- **Update** → Edit form dengan data lama sudah terisi otomatis  
- **Delete** → Menghapus data berdasarkan ID  
- **Upload File** → Menyimpan cover ke folder 'upload' dan menampilkan di tabel  

---

## Spesifikasi Teknis  

    Bahasa dan Tools
        - PHP: 8.4.13 
        - Database: MySQL / MariaDB
        - Web Server: PHP Built-in Server 

---

## Instruksi Menjalankan Aplikasi

### Import Database

Gunakan file `dbbuku.sql`.

CREATE DATABASE dbbuku ;
use dbbuku ;

```
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(100) NOT NULL,
    city VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    tahun_terbit INT NOT NULL,
    kategori ENUM('Fiksi', 'Non-Fiksi', 'Edukasi') NOT NULL,
    cover VARCHAR(255) NULL,
    status ENUM('tersedia', 'habis') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

``` 
---

Menjalankan Aplikasi
   php -S localhost:8000 -t public

Buka Browser :
    http://localhost:8000

---

## Contoh Skenario Uji Singkat

    Tambah 1 Data
        - Buka halaman Tambah  
        - Isi form  
        - Klik Simpan  
        - Data tampil di tabel  

    Tampilkan Daftar Data
        - Akses halaman utama  
        - Semua data buku tampil di tabel

    Ubah Data Tertentu
        - Klik Edit  
        - Ubah salah satu field  
        - Klik Update  
        - Data berubah di tabel  

    Hapus Data
        - Klik Delete  
        - Konfirmasi OK  
        - Data hilang dari daftar
