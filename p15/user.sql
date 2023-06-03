
CREATE TABLE `user` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'fuad', '201011400093');
