CREATE TABLE IF NOT EXISTS `ffjodoro_kylastajad` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `passw` varchar(40) NOT NULL,
  `visits` int(11) NOT NULL
);