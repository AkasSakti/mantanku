-- Membuat database
CREATE DATABASE data_mantan;

-- Menggunakan database
USE data_mantan;

-- Membuat tabel mantan
CREATE TABLE mantan (
    id_mantan INT AUTO_INCREMENT PRIMARY KEY,
    Nama_mantan VARCHAR(100),
    Alamat TEXT,
    No_Hp VARCHAR(15)
);