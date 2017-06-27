-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2017 a las 09:54:42
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jilk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ik`
--

CREATE TABLE `ik` (
  `Kcod` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Idni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `IKempfct` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IKcont` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `IKdual` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ikasle`
--

CREATE TABLE `ikasle` (
  `Idni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Inombrea` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Imail` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Itelefono` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Iact` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Iest` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Idact` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Idest` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Iacts` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Iemp` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Itime` datetime DEFAULT NULL,
  `Itipo` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Icurri` text COLLATE utf8_spanish_ci,
  `Ipass` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kurso`
--

CREATE TABLE `kurso` (
  `Kcod` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Kurso` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ik`
--
ALTER TABLE `ik`
  ADD PRIMARY KEY (`Kcod`,`Idni`);
ALTER TABLE `ik` ADD FULLTEXT KEY `indiceik` (`IKempfct`,`IKcont`);
ALTER TABLE `ik` ADD FULLTEXT KEY `IKempfct` (`IKempfct`,`IKcont`,`IKdual`);

--
-- Indices de la tabla `ikasle`
--
ALTER TABLE `ikasle`
  ADD PRIMARY KEY (`Idni`),
  ADD UNIQUE KEY `Itelefono` (`Itelefono`),
  ADD UNIQUE KEY `Imail` (`Imail`),
  ADD KEY `Iacts` (`Iacts`);
ALTER TABLE `ikasle` ADD FULLTEXT KEY `Iindice` (`Idni`,`Inombrea`,`Imail`,`Itelefono`,`Iact`,`Iest`,`Idact`,`Idest`,`Iacts`,`Iemp`,`Itipo`,`Icurri`);

--
-- Indices de la tabla `kurso`
--
ALTER TABLE `kurso`
  ADD PRIMARY KEY (`Kcod`),
  ADD UNIQUE KEY `Kcod` (`Kcod`);
ALTER TABLE `kurso` ADD FULLTEXT KEY `Kcod_2` (`Kcod`,`Kurso`);
ALTER TABLE `kurso` ADD FULLTEXT KEY `Kcod_3` (`Kcod`,`Kurso`);
ALTER TABLE `kurso` ADD FULLTEXT KEY `finder` (`Kcod`,`Kurso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
