-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2021 at 05:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akitronix`
--

-- --------------------------------------------------------

--
-- Table structure for table `arbol`
--

CREATE TABLE `arbol` (
  `nodo` int(11) NOT NULL,
  `texto` varchar(500) DEFAULT NULL,
  `pregunta` tinyint(1) DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `probabilidad` double DEFAULT NULL,
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arbol`
--

INSERT INTO `arbol` (`nodo`, `texto`, `pregunta`, `costo`, `probabilidad`, `intentos`) VALUES
(1, '¿Su personaje es un Animal?', 1, 0.26, 1, 0),
(2, '¿Su personaje habla?', 1, 0.4, 0.8, 0),
(3, '¿Su personaje es parte de un anime?', 1, 0, 0, 0),
(4, '¿Su personaje usa guantes?', 1, 0, 0, 10),
(5, 'Pikachu', 0, 0.2, 0, 10),
(6, '¿Su personaje es un ninja?', 1, 0, 0, 10),
(7, '¿Su personaje usa guantes?', 1, 0.27, 0.75, 10),
(8, '¿Su personaje es de los Looney Tunes?', 1, 0.33, 0.67, 10),
(9, '¿Su personaje tiene cola larga?', 1, 0.1, 0.5, 10),
(12, 'Naruto', 0, 0, 0, 10),
(13, 'Gokū', 0, 0, 0, 10),
(14, 'Mario Bros', 0, 0, 0, 10),
(15, '¿Su personaje es inteligente?', 1, 0, 0, 10),
(16, 'Bugs Bunny', 0, 0.4, 0, 10),
(17, 'Mickey Mouse', 0, 0.2, 0, 10),
(18, 'Scooby-Doo', 0, 0.1, 0, 10),
(19, 'Pato Donald', 0, 0.1, 0, 10),
(30, 'Rick Sánchez\r\n', 0, 0, 0, 10),
(31, 'Homero Simpson', 0, 0, 0, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arbol`
--
ALTER TABLE `arbol`
  ADD PRIMARY KEY (`nodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
