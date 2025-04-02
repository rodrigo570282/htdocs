create database if not exists usuario;


use usuario;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `usuario` (
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `usuario` (`email`, `senha`) VALUES
('rodrigo', 'rodrigo');
COMMIT;

