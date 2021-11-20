-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2021 at 02:30 AM
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
  `elecciones` int(11) NOT NULL,
  `personas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arbol`
--

INSERT INTO `arbol` (`nodo`, `texto`, `pregunta`, `costo`, `probabilidad`, `elecciones`, `personas`) VALUES
(1, '¿Su personaje es un Animal?', 1, 0.18571428571428, 0.73333333333333, 11, 15),
(2, '¿Su personaje habla?', 1, 0.24545454545455, 0.72727272727273, 8, 11),
(3, '¿Su personaje es parte de un anime?', 1, 0, 0.25, 1, 4),
(4, '¿Su personaje usa guantes?', 1, 0.2625, 0.625, 5, 8),
(5, 'Pikachu', 0, 0.2, 0, 0, 0),
(6, '¿Su personaje es un ninja?', 1, 0, 1, 1, 1),
(7, '¿Usa guantes?', 1, 0, 0.33333333333333, 1, 3),
(8, '¿Su personaje es de los Looney Tunes?', 1, 0.36, 0.8, 4, 5),
(9, '¿Su personaje tiene cola larga?', 1, 0.1, 0.66666666666667, 2, 3),
(12, 'Naruto', 0, 0, 0, 0, 0),
(13, 'Gokū', 0, 0, 0, 0, 0),
(14, 'Mario Bros', 0, 0, 0, 0, 0),
(15, '¿Su personaje es inteligente?', 1, 0, 0.5, 1, 2),
(16, 'Bugs Bunny', 0, 0.4, 0, 0, 0),
(17, 'Mickey Mouse', 0, 0.2, 0, 0, 0),
(18, 'Scooby-Doo', 0, 0.1, 0, 0, 0),
(19, 'Pato Donald', 0, 0.1, 0, 0, 0),
(30, 'Rick Sánchez\r\n', 0, 0, 0, 0, 0),
(31, 'Homero Simpson', 0, 0, 0, 0, 0);

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
