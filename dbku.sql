CREATE DATABASE dbbuku ;
use dbbuku ;

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