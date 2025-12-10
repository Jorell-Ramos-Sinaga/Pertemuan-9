-- Membuat Database
CREATE DATABASE IF NOT EXISTS pendaftaran_siswa;
USE pendaftaran_siswa;

-- Membuat Tabel
CREATE TABLE IF NOT EXISTS calon_siswa (
    id INT NOT NULL AUTO_INCREMENT,
    nama VARCHAR(64) NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    jenis_kelamin VARCHAR(16) NOT NULL,
    agama VARCHAR(16) NOT NULL,
    sekolah_asal VARCHAR(64) NOT NULL,
    PRIMARY KEY (id)
);

-- Menambahkan beberapa data sampel (opsional)
INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) VALUES
('Budi Santoso', 'Jl. Merdeka No. 123, Jakarta', 'Laki-laki', 'Islam', 'SMP Negeri 1 Jakarta'),
('Siti Nurhaliza', 'Jl. Sudirman No. 456, Bandung', 'Perempuan', 'Islam', 'SMP Negeri 5 Bandung');
