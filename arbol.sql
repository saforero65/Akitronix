-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2021 at 05:56 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17902746_akitronix`
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
(1, '¿Su personaje es un Animal?', 1, 3.8701298701298, 0.68181818181818, 15, 22),
(2, '¿Su personaje habla?', 1, 4.1428571428571, 0.64285714285714, 9, 14),
(3, '¿Su personaje es parte de un anime?', 1, 3.2857142857143, 0.71428571428571, 5, 7),
(4, '¿Usa guantes?', 1, 5.1111111111111, 0.66666666666667, 6, 9),
(5, '¿Es un perro?', 1, 2.4, 0.6, 3, 5),
(6, '¿Es de género masculino?', 1, 4, 0.8, 4, 5),
(7, '¿Usa guantes?', 1, 1.5, 0.5, 1, 2),
(8, '¿Es de los Looney Tunes?', 1, 6.1666666666667, 0.83333333333333, 5, 6),
(9, '¿Tiene cola larga?', 1, 3, 1, 3, 3),
(10, '¿Camina en cuatro patas?', 1, 2.6666666666667, 0.33333333333333, 1, 3),
(11, '¿Es un felino?', 1, 2, 0.5, 1, 2),
(12, '¿Es humano?', 1, 5, 1, 3, 3),
(13, '¿Es una sailor scout?', 1, 1, 1, 1, 1),
(14, '¿Es del género femenino?', 1, 2, 0, 0, 1),
(15, '¿Es del género masculino?', 1, 1, 1, 1, 1),
(16, '¿Es del género masculino?', 1, 5.8, 0.6, 3, 5),
(17, '¿Es un ratón?', 1, 8, 1, 1, 1),
(18, '¿Es un rey?', 1, 3, 1, 3, 3),
(19, '¿Es de Disney?', 1, 3, 0, 0, 0),
(20, '¿Es rojo?', 1, 2, 1, 1, 1),
(21, '¿Su dueño es un niño?', 1, 3, 1, 2, 2),
(22, '¿Es de Disney?', 1, 2, 1, 1, 1),
(23, '¿Puede volar?', 1, 2, 0.5, 1, 2),
(24, '¿Es un ninja?', 1, 5, 0.33333333333333, 1, 3),
(25, '¿Le gustan las manzanas?', 1, 3, 0, 0, 0),
(26, '¿Tiene el poder de la luna?', 1, 1, 1, 1, 1),
(27, '¿Es sucesora de una diosa griega?', 1, 1, 0, 0, 0),
(28, '¿Es una villana?', 1, 2, 0, 0, 0),
(29, '¿Usa antifaz?', 1, 2, 1, 1, 1),
(30, '¿Es fuerte?', 1, 1, 0, 0, 1),
(31, '¿Es una princesa?', 1, 4, 0, 0, 0),
(32, 'Bugs Bunny', 0, 7, 0.6, 3, 5),
(33, 'Lola Bunny', 0, 4, 0.4, 2, 5),
(34, 'Mickey Mouse', 0, 8, 2, 2, 3),
(35, 'Goofy', 0, 1, 0, 0, 1),
(36, '¿Tiene hijos?', 1, 3, 0.66666666666667, 2, 3),
(37, '¿Tiene un grupo de cazafantasmas?', 1, 1, 0, 0, 0),
(38, '¿Le gusta la miel?', 1, 1, 0, 0, 0),
(39, '¿Es mágico?', 1, 3, 0, 0, 0),
(40, 'Clifford', 0, 2, 1, 1, 1),
(41, 'Pluto', 0, 3, 0, 0, 1),
(42, 'Snoopy', 0, 3, 1, 2, 2),
(43, 'Coraje el perro cobarde', 0, 2, 0, 0, 2),
(44, '¿Su dueña es una malvada madrastra?', 1, 2, 1, 1, 1),
(45, '¿Su enemigo es un ratón llamado Jerry?', 1, 1, 0, 0, 0),
(46, 'Dumbo', 0, 3, 1, 1, 1),
(47, '¿Tiene orejas?', 1, 1, 1, 1, 1),
(48, '¿Tiene el cabello rubio?', 1, 3, 1, 1, 1),
(49, '¿Es un saiyajin?\r\n', 1, 6, 1, 2, 2),
(50, 'Ryuk', 0, 5, 0, 0, 0),
(51, 'Majin Buu', 0, 3, 0, 0, 0),
(52, 'Sailor Moon', 0, 1, 0, 1, 0),
(53, 'Sailor Saturn', 0, 1, 0, 0, 0),
(54, 'Athena', 0, 1, 0, 0, 0),
(55, '¿Es un androide?', 1, 1, 0, 0, 0),
(56, 'Cruella de Vil', 0, 1, 0, 0, 0),
(57, '¿Es un hada?', 1, 2, 0, 0, 0),
(58, '¿Es un niño?', 1, 2, 1, 1, 1),
(59, '¿Es un fotanero?', 1, 1, 0, 0, 0),
(60, '¿Come espinacas?', 1, 8, 0, 0, 0),
(61, '¿Es inteligente?', 1, 1, 1, 1, 1),
(62, '¿Tiene el cabello muy largo?', 1, 4, 0, 0, 0),
(63, '¿Hace magia?', 1, 4, 0, 0, 0),
(72, 'Mufasa', 0, 4, 1, 2, 2),
(73, 'El rey Julien ', 0, 1, 0.5, 1, 2),
(74, 'Scooby Doo', 0, 1, 0, 0, 0),
(75, 'Gato sonriente', 0, 1, 0, 0, 0),
(76, 'Winnie Pooh', 0, 3, 0, 0, 0),
(77, 'Pato Donald', 0, 1, 0, 0, 0),
(78, 'Jake el perro', 0, 2, 0, 0, 0),
(79, 'Sid', 0, 3, 0, 0, 0),
(88, 'Lucifer', 0, 2, 1, 1, 1),
(89, 'Figaro', 0, 1, 0, 0, 1),
(90, 'Tom', 0, 1, 0, 0, 0),
(91, 'Bola de nieve', 0, 1, 0, 0, 0),
(94, '¿Tiene poderes?', 1, 1, 0, 0, 1),
(95, 'Perry el ornitorrinco', 0, 6, 0, 0, 0),
(96, 'Naruto Uzumaki', 0, 3, 1, 1, 1),
(97, 'Sasuke Uchiha', 0, 1, 0, 0, 1),
(98, 'Gokū', 0, 6, 1, 2, 2),
(99, 'Seiya de Pegaso', 0, 1, 0, 0, 2),
(110, 'Androide número 18', 0, 1, 0, 0, 0),
(111, 'Bulma', 0, 1, 0, 0, 0),
(114, 'Bloom', 0, 1, 0, 0, 0),
(115, '¿Es una princesa?', 1, 2, 0, 0, 0),
(116, 'Dash', 0, 2, 1, 1, 1),
(117, 'Síndrome', 0, 1, 0, 0, 1),
(118, 'Pinocho', 0, 1, 0, 0, 0),
(119, 'Mario Bros', 0, 1, 0, 0, 0),
(120, 'Popeye', 0, 1, 0, 0, 0),
(121, '¿Es un ser humano?', 1, 8, 0, 0, 0),
(122, '¿Es un científico?', 1, 1, 1, 1, 1),
(123, '¿Le gustan las donas?', 1, 1, 0, 0, 0),
(124, 'Rapunzel', 0, 1, 0, 0, 0),
(125, '¿Fue a la guerra?', 1, 4, 0, 0, 0),
(126, 'El hada madrina', 0, 1, 0, 0, 0),
(127, 'Kim Posible', 0, 4, 0, 0, 0),
(188, 'Pikachu', 0, 1, 0, 0, 1),
(189, 'Jerry', 0, 1, 1, 1, 1),
(230, 'Princesa Peach', 0, 1, 0, 0, 0),
(231, 'Jessica Rabbit', 0, 2, 0, 0, 0),
(242, '¿Usa supertraje?', 1, 1, 0, 0, 0),
(243, '¿Es verde?', 1, 8, 0, 0, 0),
(244, 'Rick Sánchez', 0, 1, 0, 1, 0),
(245, 'Phineas Flynn', 0, 2, 0, 0, 0),
(246, 'Homero Simpson', 0, 1, 0, 0, 0),
(247, '¿Es un ser mágico?', 1, 1, 0, 0, 0),
(250, 'Mulán', 0, 3, 0, 0, 0),
(251, '¿Fue envenenada?', 1, 4, 0, 0, 0),
(484, 'Mr. Increíble', 0, 2, 0, 0, 0),
(485, 'Johnny Bravo', 0, 1, 0, 0, 0),
(486, 'Shrek', 0, 3, 0, 0, 0),
(487, 'Baymax', 0, 8, 0, 0, 0),
(494, 'Cosmo', 0, 2, 0, 0, 0),
(495, 'Billy', 0, 1, 0, 0, 0),
(502, '¿Fue envenenada con una manzana?', 1, 2, 0, 0, 0),
(503, '¿Le gusta nadar?', 1, 4, 0, 0, 0),
(1004, 'Blanca Nieves', 0, 1, 0, 0, 0),
(1005, 'Aurora', 0, 2, 0, 0, 0),
(1006, 'Ariel', 0, 2, 0, 0, 0),
(1007, 'Bella', 0, 4, 0, 0, 0);

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
