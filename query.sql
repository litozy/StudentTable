CREATE DATABASE db_akademik;
CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    alamat VARCHAR(50) NOT NULL,
    umur INT NOT NULL,
);