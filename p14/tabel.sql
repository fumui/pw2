-- lat_dbase.tabel_1 definition

CREATE TABLE `tabel_1` (
  `kode` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tabel_1
(kode, nama_barang, jumlah)
VALUES(1001, 'Buku', 100);

INSERT INTO tabel_1
(kode, nama_barang, jumlah)
VALUES(1002, 'Pulpen', 50);

-- lat_dbase.tabel_2 definition

CREATE TABLE `tabel_2` (
  `kode` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tabel_2
(kode, nama_barang, jumlah)
VALUES(1001, 'Buku', 0);

INSERT INTO tabel_2
(kode, nama_barang, jumlah)
VALUES(1002, 'Pulpen', 0);


CREATE PROCEDURE update_datatable(in id int(11),in jml int(11))
LANGUAGE SQL
DETERMINISTIC
SQL SECURITY DEFINER
COMMENT 'First SP at Expert developer'
BEGIN
    DECLARE exit handler for sqlexception
    BEGIN
        -- ERROR
        ROLLBACK;
    END;

    DECLARE exit handler for sqlwarning
    BEGIN
        -- WARNING
        ROLLBACK;
    END;
    START TRANSACTION;
        UPDATE tabel_1 SET jumlah=jumlah-jml WHERE kode=id;
        UPDATE tabel_2 SET jumlah=jumlah+jml WHERE kode=id;
    COMMIT;
END

