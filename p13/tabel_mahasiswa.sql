-- nama : Fuad Musstamirrul Ishlah
-- nim : 201011400093
-- kelas : 06TPLE005
CREATE TABLE tabel_mahasiswa (
	nim INT NOT NULL PRIMARY KEY,
	nama varchar(20) NOT NULL,
	alamat Text NOT NULL,
	jurusan varchar(20) NOT NULL
)

INSERT INTO lat_dbase.tabel_mahasiswa
(nim, nama, alamat, jurusan) VALUES
(1001, 'Muhammad Makmur', 'jakarta', 'Teknik Informatika'),
(1002, 'Muhammad Soleh', 'jakarta', 'Teknik Informatika');

