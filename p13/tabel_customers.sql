-- nama : Fuad Musstamirrul Ishlah
-- nim : 201011400093
-- kelas : 06TPLE005
CREATE TABLE customers (
	customerNumber INT NOT NULL PRIMARY KEY,
	customerName varchar(50) NOT NULL,
	contactFirstName varchar(50) NOT NULL,
	contactLastName varchar(50) NOT NULL,
	phone varchar(50) NOT NULL,
	addressLine1 varchar(50) NOT NULL,
	addressLine2 varchar(50) NULL,
	city varchar(50) NOT NULL
)

INSERT INTO lat_dbase.customers
( customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, city) VALUES
(103, 'Atelier graphique', 'Schmitt', 'Carine', '40.32.2555','54,rue Royale','Jakarta'),
(112, 'Signal Gift Store', 'King', 'Jean', '7932728337','8487 Strong St','Pamulang'),
(114, 'Australian Collectors, Co', 'Ferguson', 'Peter', '03.9520.4555','636 St Kilda Road','Bogor'),
(119, 'La Rochelle Gifts', 'Labrune', 'Janine', '40.67.8555','67,rue Bisalle','Jakarta'),
(121, 'Baane Mini Imports', 'Bergulfsen', 'Jonas', '9239579849','Wochester St','Birmingham'),
(124, 'Mini Gifts Distributors Ltd.', 'Nelson', 'Susan', '415555938','Erning Gate 78','London'),
(125, 'Havel & Zbyszek', 'Piter', 'Zbyszek', '62638326','ul Filtrowa 68','Berlin'),
(128, 'Blauer See Auto Co.', 'Keitel', 'Roland', '49 69 66 8239','Lyonerstr 34','Parins'),
(129, 'Mini wheels', 'Murphy', 'Carine', '40.32.2555','54,rue Royale','Jakarta'),
(131, 'Cape Isi Data', 'Schmitt', 'Carine', '40.32.2555','54,rue Royale','Jakarta');

