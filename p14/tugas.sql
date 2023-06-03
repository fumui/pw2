-- lat_dbase.status_pembayaran definition

CREATE TABLE `status_pembayaran` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO status_pembayaran
(nim, nama, status)
VALUES('201011400093', 'Fuad Mustamirrul Ishlah', 'BELUM LUNAS');

-- lat_dbase.riwayat_status_pembayaran definition

CREATE TABLE `riwayat_status_pembayaran` (
  `nim` varchar(12) NOT NULL,
  `status_sebelumnya` varchar(20) NOT NULL,
  `status_terbaru` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE OR REPLACE PROCEDURE set_status_pembayaran(in id varchar(12),in status_terbaru varchar(20))
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
        INSERT INTO riwayat_status_pembayaran (nim, status_sebelumnya, status_terbaru, timestamp)
        SELECT nim, status, new_status, now() FROM status_pembayaran WHERE nim = id;

        UPDATE status_pembayaran SET status = new_status WHERE nim=id;
    COMMIT;
END

