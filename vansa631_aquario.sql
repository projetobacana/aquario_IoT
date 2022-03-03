-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 03-Mar-2022 às 12:57
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `vansa631_aquario`
--
CREATE DATABASE IF NOT EXISTS `vansa631_aquario` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vansa631_aquario`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atualiza`
--

DROP TABLE IF EXISTS `atualiza`;
CREATE TABLE IF NOT EXISTS `atualiza` (
  `idAT` int(11) NOT NULL AUTO_INCREMENT,
  `qc` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `atualiza` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idAT`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ip`
--

DROP TABLE IF EXISTS `ip`;
CREATE TABLE IF NOT EXISTS `ip` (
  `idip` int(11) NOT NULL AUTO_INCREMENT,
  `qc` varchar(100) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbsensores`
--

DROP TABLE IF EXISTS `tbsensores`;
CREATE TABLE IF NOT EXISTS `tbsensores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sensor` varchar(10) NOT NULL,
  `valorSensor` float NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `aquecedor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22292 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_teste`
--
DROP VIEW IF EXISTS `v_teste`;
CREATE TABLE IF NOT EXISTS `v_teste` (
`sensor` varchar(10)
,`SensorAgua` double(18,1)
,`data` timestamp
);
-- --------------------------------------------------------

--
-- Structure for view `v_teste`
--
DROP TABLE IF EXISTS `v_teste`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_teste` AS select `tbsensores`.`sensor` AS `sensor`,round(avg(`tbsensores`.`valorSensor`),1) AS `SensorAgua`,`tbsensores`.`data` AS `data` from `tbsensores` where ((`tbsensores`.`sensor` = 'agua') and (`tbsensores`.`data` between (curdate() - 7) and (curdate() + 1))) group by `tbsensores`.`sensor`,date_format(`tbsensores`.`data`,'%d') order by `tbsensores`.`id`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
