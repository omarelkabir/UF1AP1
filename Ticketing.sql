-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2020 a las 20:22:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Ticketing`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incident`
--

CREATE TABLE `tbl_incident` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `component` varchar(50) NOT NULL,
  `aula` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `createdby` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_incident`
--

INSERT INTO `tbl_incident` (`id`, `date`, `component`, `aula`, `description`, `type`, `status`, `createdby`, `role`) VALUES
(28, '2020-05-29 17:22:52', 'Scanner', '16', 'Instal·lar SolidWorks', 'Petició', 'Closed', 'Super Admin', 'Admin'),
(10, '2020-05-19 19:29:57', 'Computer', 'A14', 'Necessito instal·lar SolidWorks amb llicència d’estudiant\r\n', '', 'Closed', 'Super Admin', 'Teacher'),
(9, '2020-05-20 10:30:26', 'Printer', 'Classrom16', 'No puc connectar la meva impressora, si us plau, ajuda\r\n', '', 'Closed', 'Super Admin', 'Teacher'),
(12, '2020-05-20 07:37:16', 'Computer', 'Standard 6', 'Necessiteu arreglar el més aviat possible els pc de l\'aula plis.\r\ngracies', '', 'Closed', 'Super Admin', 'Admin'),
(16, '2020-05-20 10:47:58', 'Computer', 'test1', 'test1Accés a la unitat', 'test1Accés a la unitat', 'Closed', 'Estudiant1', 'Estudiant1'),
(14, '2020-05-20 09:33:17', 'Computer', 'Class1', 'Need help asap!\r\n\r\n\r\nTeacher', 'Urgent', 'Pending', 'a Teacher', 'Teacher'),
(17, '2020-05-20 10:48:33', 'Printer', 'Accés a la unitat', 'test2Accés a la unitat', 'Accés a la unitat', 'Closed', 'b teacher', 'Teacher'),
(18, '2020-05-20 10:50:45', 'Computer', 'student-test', 'Accés a la unitat de xarxa', 'Accés a la unitat de xarxa', 'Pending', 'estudiant2', 'estudiant2'),
(23, '2020-05-21 18:12:22', '', 'C11', 'Estudiant', 'ajuda programari', 'Closed', 'Estudiant', 'Estudiant'),
(25, '2020-05-21 18:13:05', 'Computer', 'C11', 'help', 'urgent!!', 'Closed', 'student two', 'Student'),
(26, '2020-05-21 18:13:23', 'Projector', 'C11', 'help\r\n', 'Normal', 'Pending', 'Estudiant', 'Estudiant'),
(29, '2020-05-29 17:27:56', 'Scanner', '16', 'No puc instal·lar Wireshark si us plau, necesito una remote install.\r\nMerci!', 'Petició', 'Closed', 'Super Admin', 'Admin'),
(30, '2020-05-29 17:28:18', 'Computer', '16', 'No tinc accés a la unitat de xarxa de clase', 'Petició', 'Pending', 'Super Admin', 'Admin'),
(31, '2020-05-29 17:28:56', '', '14', 'Tinc problemes de xarxa el meu adaptador ethernet no funciona i el ratolí no hem funciona tampoc', 'Incidencia', 'Closed', 'Super Admin', 'Admin'),
(32, '2020-05-29 17:38:23', 'Computer', '10', 'Instal·larapache2', 'Incidencia', 'Pending', 'Super Admin', 'Admin'),
(35, '2020-05-29 17:56:04', '', '', '', '', 'Pending', 'Super Admin', 'Admin'),
(36, '2020-05-29 18:19:33', 'Computer', '14', 'Necesito jailbreak', 'Incidencia', 'Pending', 'Super Admin', 'Admin'),
(34, '2020-05-29 17:39:17', 'Printer', '16', 'Desplegament massiu de config per impressora Konica a tots els terminals', 'Petició', 'Closed', 'Super Admin', 'Admin'),
(37, '2020-05-29 18:20:06', 'Scanner', '10', 'necesitem teclats nous gracies', 'Petició', 'Closed', 'Super Admin', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`, `description`, `datetime`) VALUES
(1, 'Admin', 'Gestionar tot', '2020-05-20 07:49:21'),
(2, 'Student', 'Només permís de lectura', '2020-05-20 07:49:41'),
(3, 'Teacher', 'Poques funcions d’edició', '2020-05-20 07:49:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `firstname`, `lastname`, `email`, `password`, `role`) VALUES
(1, 'Super', 'Admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(9, 'omar', 'elkabir', 'oelkabir@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(5, 'a', 'Teacher', 'teacher@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher'),
(7, 'Student', 'one', 'student@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Student'),
(8, 'b', 'teacher', 'bteacher@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Teacher'),
(10, 'student', 'two', 'bstudent@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Student'),
(11, 'Student', 'Three', 'cstudent@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Student');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incident`
--
ALTER TABLE `tbl_incident`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incident`
--
ALTER TABLE `tbl_incident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
