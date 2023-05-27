-- nama : Fuad Musstamirrul Ishlah
-- nim : 201011400093
-- kelas : 06TPLE005
CREATE TABLE matkul (
	id INT NOT NULL PRIMARY KEY,
	nama varchar(20) NOT NULL,
	nilai Text NOT NULL,
	status varchar(12) NOT NULL
)

INSERT INTO lat_dbase.matkul
(id, nama, nilai, status) VALUES
(1, 'Pemrograman Web 2', '100', 'LULUS'),
(2, 'Kecerdasan Buatan', '90', 'LULUS'),
(3, 'Mobile Programming', '90', 'LULUS'),
(4, 'RPL', '80', 'LULUS');

