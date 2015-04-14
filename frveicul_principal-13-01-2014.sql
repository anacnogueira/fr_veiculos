-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Jan-2014 às 21:32
-- Versão do servidor: 5.1.72-cll
-- versão do PHP: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `frveicul_principal`
--
CREATE DATABASE IF NOT EXISTS `frveicul_principal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `frveicul_principal`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Suzuki'),
(2, 'Toyota'),
(3, 'Yamaha'),
(4, 'Honda'),
(5, 'Fiat'),
(6, 'Kia'),
(7, 'Chevrolet'),
(8, 'Citroen'),
(9, 'Ford'),
(10, 'Hyundai'),
(11, 'Volkswagen'),
(12, 'Renault'),
(13, 'Mercedes-Benz'),
(14, 'Mitsubishi'),
(15, 'Nissan'),
(16, 'Peugeot'),
(17, 'Kawasaki'),
(18, 'Harley-Davidson'),
(19, 'Bmw'),
(20, 'Kasinski'),
(21, 'Dafra'),
(22, 'Ducati'),
(23, 'Triumph'),
(24, 'Agrale'),
(25, 'Sundown'),
(26, 'Buell'),
(27, 'Cagiva'),
(28, 'Shineray '),
(29, 'Piaggio'),
(30, 'Aprilia'),
(31, 'Ktm'),
(32, 'Derbi'),
(33, 'Mv Agusta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Novo'),
(2, 'Seminovo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`id`, `name`, `created`, `modified`) VALUES
(4, 'Cor', '2013-06-27 23:31:38', '2013-06-27 23:31:38'),
(5, 'CombustÃ­vel', '2013-06-27 23:32:21', '2013-06-27 23:32:21'),
(6, 'CÃ¢mbio', '2013-06-27 23:32:39', '2013-06-27 23:32:39'),
(7, 'NÂº de portas', '2013-06-27 23:33:01', '2013-06-27 23:33:01'),
(8, 'Carroceria', '2013-06-27 23:33:10', '2013-06-27 23:33:10'),
(9, 'Opcional1', '2013-06-27 23:33:26', '2013-07-16 17:13:28'),
(10, 'Opcional2', '2013-06-27 23:33:44', '2013-07-16 17:13:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_values`
--

DROP TABLE IF EXISTS `item_values`;
CREATE TABLE IF NOT EXISTS `item_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `item_values`
--

INSERT INTO `item_values` (`id`, `name`, `item_id`, `created`, `modified`) VALUES
(3, 'Flex', 5, '2013-07-11 00:46:10', '2013-07-11 00:46:10'),
(4, 'Gasolina', 5, '2013-07-11 00:46:18', '2013-07-11 00:46:18'),
(5, 'Etanol', 5, '2013-07-11 00:46:28', '2013-07-11 00:46:28'),
(6, 'Amarelo', 4, '2013-07-16 17:01:28', '2013-07-16 17:01:28'),
(7, 'Azul', 4, '2013-07-16 17:01:34', '2013-07-16 17:01:34'),
(8, 'Verde', 4, '2013-07-16 17:01:38', '2013-07-16 22:56:18'),
(9, 'Vermelho', 4, '2013-07-16 17:01:46', '2013-07-16 17:01:46'),
(10, 'Preto', 4, '2013-07-16 17:01:56', '2013-07-16 17:01:56'),
(11, 'Hatchback', 8, '2013-07-16 17:04:20', '2013-07-16 17:04:20'),
(12, 'Pickup', 8, '2013-07-16 17:04:41', '2013-07-16 17:04:41'),
(13, 'Sedan', 8, '2013-07-16 17:05:40', '2013-07-16 17:05:40'),
(14, 'AutomÃ¡tico', 6, '2013-07-16 17:08:41', '2013-07-16 17:08:41'),
(15, 'Manual', 6, '2013-07-16 17:09:02', '2013-07-16 17:09:02'),
(16, 'SemiautomÃ¡tico', 6, '2013-07-16 17:11:28', '2013-07-16 17:11:28'),
(17, 'Garantia de FÃ¡brica', 9, '2013-07-16 17:13:50', '2013-07-16 17:13:50'),
(18, 'IPVA Pago', 9, '2013-07-16 17:14:03', '2013-07-16 17:14:03'),
(19, 'Licenciado', 9, '2013-07-16 17:14:12', '2013-07-16 17:14:12'),
(20, 'ServiÃ§o Leva e Traz', 9, '2013-07-16 17:14:22', '2013-07-16 17:14:22'),
(21, 'Abertura interna do porta-malas', 10, '2013-07-16 17:14:51', '2013-07-16 17:14:51'),
(22, 'Air Bag ', 10, '2013-07-16 17:15:00', '2013-11-26 12:26:11'),
(23, 'Alerta de farÃ³is acesos', 10, '2013-07-16 17:15:08', '2013-07-16 17:15:08'),
(25, '1', 7, '2013-07-16 23:00:27', '2013-07-16 23:00:27'),
(26, '2', 7, '2013-07-16 23:00:32', '2013-07-16 23:00:32'),
(27, '3', 7, '2013-07-16 23:00:38', '2013-07-16 23:00:38'),
(28, '4', 7, '2013-07-16 23:00:54', '2013-07-16 23:00:54'),
(29, 'Prata', 4, '2013-08-21 22:06:16', '2013-08-21 22:06:16'),
(30, 'Ar Condicionado', 10, '2013-11-26 12:20:10', '2013-11-26 12:20:10'),
(31, ' Ar Quente', 10, '2013-11-26 12:20:42', '2013-11-26 12:20:55'),
(32, 'Limpador Traseiro', 10, '2013-11-26 12:21:34', '2013-11-26 12:21:34'),
(33, 'Travas ElÃ©tricas', 10, '2013-11-26 12:23:09', '2013-11-26 12:23:09'),
(34, 'Vidros ElÃ©tricos', 10, '2013-11-26 12:23:29', '2013-11-26 12:23:29'),
(35, 'DireÃ§Ã£o HidrÃ¡ulica', 10, '2013-11-26 12:23:48', '2013-11-26 12:23:48'),
(36, 'Banco do motorista com ajuste de altura', 10, '2013-11-26 12:24:18', '2013-11-26 12:24:18'),
(37, 'CD Player', 10, '2013-11-26 12:24:41', '2013-11-26 12:24:41'),
(38, 'Encosto de cabeÃ§a traseiro', 10, '2013-11-26 12:24:55', '2013-11-26 12:24:55'),
(39, 'Limpador  traseiro', 10, '2013-11-26 12:25:08', '2013-11-26 12:25:08'),
(40, 'Rodas de liga leve', 10, '2013-11-26 12:25:18', '2013-11-26 12:25:18'),
(41, 'Cinza', 4, '2013-11-26 12:47:21', '2013-11-26 12:47:21'),
(42, 'Alarme', 10, '2013-11-26 12:51:50', '2013-11-26 12:51:50'),
(43, 'DesembaÃ§ador Traseiro', 10, '2013-11-26 12:57:01', '2013-11-26 12:57:01'),
(44, 'Branco', 4, '2013-12-02 12:51:47', '2013-12-02 12:51:47'),
(45, 'Champagne', 4, '2013-12-02 13:09:48', '2013-12-02 13:09:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_admins`
--

DROP TABLE IF EXISTS `menu_admins`;
CREATE TABLE IF NOT EXISTS `menu_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `order` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `ativo` enum('S','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `menu_admins`
--

INSERT INTO `menu_admins` (`id`, `nome`, `descricao`, `order`, `link`, `ativo`) VALUES
(1, 'VeÃ­culos', 'Gerenciamento de carros e motos', 1, '/admin/vehicles', 'S'),
(2, 'Categorias', 'Categorias de veÃ­culos(novo/seminovo)', 9, '/admin/categories', 'N'),
(3, 'Items', 'Gereciamento de opcionais dos veÃ­culos como marca, modelo, cor, combustÃ­vel, chassi, outros opcionais', 4, '/admin/items', 'S'),
(4, 'OpÃ§Ãµes de items', 'Preenche os opÃ§Ãµes possÃ­veis dos items. Ex: cor: amarelo,vermelho, azul, verde...', 5, '/admin/item_values', 'S'),
(5, 'NotÃ­cias', 'Gerenciamento de notÃ­cias a serem exibidas no site', 7, '/admin/news', 'S'),
(6, 'Agendamentos', 'Gerencimento de agendamentos para visitar veÃ­culos', 6, '/admin/schedules', 'S'),
(7, 'UsuÃ¡rios', 'Gerenciamento de usuÃ¡rios administradores do site', 8, '/admin/users', 'S'),
(8, 'Items do menu', 'Gerencia os items do menu da Ã¡rea administrativa', 10, '/admin/menu_admins', 'N'),
(9, 'Marcas', 'Marcas de veÃ­culos e motos', 2, '/admin/brands', 'S'),
(10, 'Modelos', 'Modelos dos automoveis', 3, '/admin/modelos', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos`
--

DROP TABLE IF EXISTS `modelos`;
CREATE TABLE IF NOT EXISTS `modelos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=319 ;

--
-- Extraindo dados da tabela `modelos`
--

INSERT INTO `modelos` (`id`, `name`, `brand_id`) VALUES
(1, 'Advantage', 7),
(2, 'Agile', 7),
(3, 'Astra', 7),
(4, 'Camaro', 7),
(5, 'Captiva', 7),
(6, 'Captiva Sport FWD', 7),
(7, 'Celta', 7),
(8, 'Celta Life 1.0 2p', 7),
(9, 'Celta LT 1.0 Flex', 7),
(10, 'Celta Spirit', 7),
(11, 'CELTA VHC 1.0', 7),
(12, 'Classic', 7),
(13, 'Cobalt', 7),
(14, 'Cobalt 1.4 LS', 7),
(15, 'Cobalt 1.4 LT', 7),
(16, 'Cobalt LTZ 1.4 Econo.Flex', 7),
(17, 'Corsa', 7),
(18, 'Corsa Sedan Classic LS 1.0', 7),
(19, 'Cruze', 7),
(20, 'Cruze LT 1.8 Flex', 7),
(21, 'Cruze LTZ 1.8 Flex Aut', 7),
(22, 'Cruze Sport LT Aut', 7),
(23, 'Cruze Sport6', 7),
(24, 'Malibu', 7),
(25, 'Malibu LTZ', 7),
(26, 'Meriva', 7),
(27, 'Montana', 7),
(28, 'Omega', 7),
(29, 'Onix', 7),
(30, 'Prisma', 7),
(31, 'S10', 7),
(32, 'S10 2.4 LT CD (Cod R7H)', 7),
(33, 'S10 Advantage', 7),
(34, 'S10 Executive Cabine Dupla', 7),
(35, 'Sonic Hatch LT', 7),
(36, 'Sonic LTZ', 7),
(37, 'Sonic Sedan LTZ', 7),
(38, 'Spin', 7),
(39, 'TrailBlazer 2.8', 7),
(40, 'TrailBlazer 3.6 (R6B)', 7),
(41, 'Vectra', 7),
(42, 'Vectra GT', 7),
(43, 'Zafira', 7),
(44, 'Aircross', 8),
(45, 'C3', 8),
(46, 'C3 Picasso Exclusive', 8),
(47, 'C4', 8),
(48, 'C4 Pallas', 8),
(49, 'C4 VTR', 8),
(50, 'C5', 8),
(51, 'DS3', 8),
(52, 'Grand Picasso', 8),
(53, 'Jumper Minibus', 8),
(54, 'Xsara Picasso', 8),
(55, '500', 5),
(56, 'Adventure', 5),
(57, 'Bravo', 5),
(58, 'Cinquecento', 5),
(59, 'Doblò', 5),
(60, 'Fiorino 1.3', 5),
(61, 'Fiorino 1.3 Furgão', 5),
(62, 'Freemont Emotion (5 Lugares)', 5),
(63, 'Freemont Precision', 5),
(64, 'Freemont Precision ( 5 Lugares )', 5),
(65, 'Grand Siena', 5),
(66, 'Idea', 5),
(67, 'Linea', 5),
(68, 'Marea', 5),
(69, 'Palio', 5),
(70, 'Palio 1.4 ELX', 5),
(71, 'Palio Weekend', 5),
(72, 'Palio Weekendy ELX 1.0', 5),
(73, 'Punto', 5),
(74, 'PUNTO 1.4 ATTRACTIVE', 5),
(75, 'Punto HLX 1.8', 5),
(76, 'Siena Attractive ELX 1.4', 5),
(77, 'Siena EL 1.0 Flex', 5),
(78, 'Siena ELX 1.0 Flex', 5),
(79, 'Siena ELX 1.4', 5),
(80, 'Siena ELX 1.4 Flex', 5),
(81, 'Stilo', 5),
(82, 'Strada', 5),
(83, 'STRADA ADVENTURE CD', 5),
(84, 'Strada Adventure CE', 5),
(85, 'Uno', 5),
(86, 'Courier', 9),
(87, 'EcoSport', 9),
(88, 'Edge', 9),
(89, 'EDGE 3.5L AUT', 9),
(90, 'Escort SW GL 1.8', 9),
(91, 'F250 CD XLT 4x4', 9),
(92, 'F250 XLT SD', 9),
(93, 'Fiesta', 9),
(94, 'Fiesta 1.0 Flex', 9),
(95, 'Fiesta 1.6 Class.', 9),
(96, 'Focus', 9),
(97, 'Focus 1.6 GL', 9),
(98, 'Focus 1.6 GLX', 9),
(99, 'Ford F-250 XL', 9),
(100, 'Fusion', 9),
(101, 'Ka 1.0 Flex', 9),
(102, 'Ka 1.6 Action', 9),
(103, 'Ka GL', 9),
(104, 'Ka Sport 1.6', 9),
(105, 'New Fiesta', 9),
(106, 'New Fiesta Hatch SE 1.6 Flex (Cod RCA2)', 9),
(107, 'Ranger', 9),
(108, 'Ranger CD Limited 3.0 4X4', 9),
(109, 'Ranger CD XLS 4x2', 9),
(110, 'Ranger XLS 4X4', 9),
(111, 'Scort SW GL 1.8', 9),
(112, 'City DX', 4),
(113, 'CITY EX', 4),
(114, 'City EXL', 4),
(115, 'City EXL Aut.', 4),
(116, 'City LX', 4),
(117, 'Civic EXR Aut', 4),
(118, 'Civic EXS', 4),
(119, 'CIVIC LXL', 4),
(120, 'Civic LXR 2.0 Flex Aut', 4),
(121, 'Civic LXS Aut', 4),
(122, 'Civic LXS Mec', 4),
(123, 'CR-V LX 2.0 16V 4X2', 4),
(124, 'CRV', 4),
(125, 'CRV 4X4 TOP', 4),
(126, 'Fit', 4),
(127, 'Fit EX 1.5 Aut.', 4),
(128, 'Fit Lx 1.4 Flex (Mec)', 4),
(129, 'Fit LXL', 4),
(130, 'New Civic', 4),
(131, 'Azera', 10),
(132, 'Elantra Top', 10),
(133, 'Elantra Top (TETO KEYLESS CAM.RÉ ECO-DRIVE)', 10),
(134, 'HB20', 10),
(135, 'HB20S', 10),
(136, 'HB20S 1.0 Comfort Plus + Audio', 10),
(137, 'HB20S 1.6 Comfort Plus Mec', 10),
(138, 'HB20X', 10),
(139, 'HR', 10),
(140, 'I30', 10),
(141, 'IX35', 10),
(142, 'Santa Fé', 10),
(143, 'Sonata', 10),
(144, 'Tucson', 10),
(145, 'Tucson GL 2.0 Mecânica', 10),
(146, 'Veloster Automatic', 10),
(147, 'Vera Cruz 3.8 v6 (7 Lugares)', 10),
(148, 'Bongo', 6),
(149, 'Cadenza', 6),
(150, 'Carens', 6),
(151, 'Cerato', 6),
(152, 'Cerato Koup (E.387)', 6),
(153, 'Mohave', 6),
(154, 'Mohave  (H.658)', 6),
(155, 'Optima', 6),
(156, 'Picanto', 6),
(157, 'Picanto (J.318)', 6),
(158, 'Sorento', 6),
(159, 'Sorento 4x2 Aut 5 Lugares  (Cod 252)', 6),
(160, 'Sorento 4x2 Aut 5 Lugares  (Cod 253)', 6),
(161, 'Soul', 6),
(162, 'Soul Flex', 6),
(163, 'Sportage', 6),
(164, 'B 180', 13),
(165, 'C  180 K', 13),
(166, 'C 180', 13),
(167, 'C 280', 13),
(168, 'C180 Coupe', 13),
(169, 'C200 K avangard', 13),
(170, 'CLC 200 Kompressor', 13),
(171, 'CLC 280', 13),
(172, 'E350', 13),
(173, 'SLK 200 Kompressor', 13),
(174, 'ASX 2.0 Aut', 14),
(175, 'ASX 4X2', 14),
(176, 'L200', 14),
(177, 'L200 Triton', 14),
(178, 'L200 Triton 3.2 Aut Flex', 14),
(179, 'L200 Triton CD 3.2 Aut Diesel 4x4', 14),
(180, 'Lancer ', 14),
(181, 'Outlander 2.0 Aut', 14),
(182, 'Outlander 2.4', 14),
(183, 'Outlander 3.0 ', 14),
(184, 'Outlander 3.0 V6 (GT)', 14),
(185, 'Pajero Dakar', 14),
(186, 'Pajero Sport Flex', 14),
(187, 'Pajero TR-4', 14),
(188, 'Pajero TR4', 14),
(189, 'Frontier', 15),
(190, 'Frontier LE', 15),
(191, 'Frontier LE Attack 4x4 Aut', 15),
(192, 'Frontier SEL', 15),
(193, 'Granlivina', 15),
(194, 'Livina', 15),
(195, 'March', 15),
(196, 'NISSAN VERSA 1.6 SL', 15),
(197, 'Sentra', 15),
(198, 'Sentra S 2.0', 15),
(199, 'Tiida', 15),
(200, 'Versa', 15),
(201, 'Versa 1.6 S Flex', 15),
(202, '206', 16),
(203, '206 Presence SW', 16),
(204, '206 SW Escapade 1.6 Flex', 16),
(205, '207', 16),
(206, '207 SW XR 1.4 Flex', 16),
(207, '208 Active 1.5l Flex Mec', 16),
(208, '208 Griffe 1.6 Flex Mec', 16),
(209, '3008', 16),
(210, '307', 16),
(211, '308 Active 1.6', 16),
(212, '308 Active 1.6 Mec', 16),
(213, '308 Allure 1.6', 16),
(214, '308 Allure 2.0 Aut', 16),
(215, '308 Allure 2.0 Mec', 16),
(216, '308 Feline', 16),
(217, '408 Feline', 16),
(218, '408 Griffe Sedan 2.0 Aut', 16),
(219, '408 Sedan', 16),
(220, '508', 16),
(221, 'Boxer', 16),
(222, 'Boxer Minibus', 16),
(223, 'Hoggar', 16),
(224, 'Partner', 16),
(225, 'Peugeot Allure 1.6', 16),
(226, 'RCZ', 16),
(227, 'Clio', 12),
(228, 'Clio 1.0 Expression', 12),
(229, 'Clio Campus', 12),
(230, 'Duster Dynamic 1.6 4x2', 12),
(231, 'Duster Dynamic 2.0 4x2', 12),
(232, 'Duster Dynamique 2.0 16v 4x4 Manual', 12),
(233, 'Dynamique', 12),
(234, 'Expression 1.6 4X2', 12),
(235, 'Fluence', 12),
(236, 'Fluence Dynamique', 12),
(237, 'Fluence Turbo GT Sport', 12),
(238, 'Kangoo Express 1.6 Flex', 12),
(239, 'Kangoo Expression', 12),
(240, 'Logan', 12),
(241, 'Logan Expression 1.6', 12),
(242, 'Master 2.5 Diesel', 12),
(243, 'Megane', 12),
(244, 'Previlege', 12),
(245, 'Sandero', 12),
(246, 'Sandero Vibe', 12),
(247, 'Scenic', 12),
(248, 'Stepway', 12),
(249, 'Symbol Expression 1.6', 12),
(250, 'Corolla Altis 2.0 Aut', 2),
(251, 'Corolla GLI', 2),
(252, 'Corolla GLi 1.8 Aut', 2),
(253, 'Corolla GLI Mec', 2),
(254, 'Corolla SEG', 2),
(255, 'Corolla XEI', 2),
(256, 'Corolla XEI 1.8 Flex Automático', 2),
(257, 'Corolla XEI 2.0 Aut', 2),
(258, 'Corolla XEI Automático 1.8', 2),
(259, 'Corolla XLI', 2),
(260, 'Corolla XLI 1.8 Flex Automático', 2),
(261, 'Corolla XRS', 2),
(262, 'Etios  ', 2),
(263, 'Etios 1.5 XLS', 2),
(264, 'Etios 1.5 XLS 1.5', 2),
(265, 'Fielder', 2),
(266, 'Fielder XEI Automática Flex', 2),
(267, 'Hilux', 2),
(268, 'Hilux Cabine Dupla 4x4 SRV ', 2),
(269, 'Hilux SR CD 4X2', 2),
(270, 'Hilux SW4 3.0 SRV 4X4', 2),
(271, 'Land Cruiser Prado 4x4 3.0 Turbo Intercooler 16V Aut', 2),
(272, 'RAV-4 2.4 4X2 Aut', 2),
(273, 'RAV4 ', 2),
(274, 'Amarok CS', 11),
(275, 'Amarok Highline', 11),
(276, 'Amarok Highline Aut (Top de linha)', 11),
(277, 'Amarok Trendline', 11),
(278, 'Black Gol 1.0 Flex (Edição Limitada)', 11),
(279, 'Bug Special', 11),
(280, 'CrossFox', 11),
(281, 'Fox', 11),
(282, 'Fox 1.6 Plus', 11),
(283, 'Go 1.6', 11),
(284, 'Gol 1.6', 11),
(285, 'Gol 16V Power', 11),
(286, 'Gol G5 1.0', 11),
(287, 'GOL G5 1.6 FLEX', 11),
(288, 'Gol G6', 11),
(289, 'Gol GIV', 11),
(290, 'Gol Power G5', 11),
(291, 'Gol Rallye 1.6 Mi 8V Total Flex', 11),
(292, 'Golf', 11),
(293, 'Golf SP Limited Edition', 11),
(294, 'Jetta', 11),
(295, 'Kombi', 11),
(296, 'New Beetle', 11),
(297, 'NEW BEETLE 12/13  MOTOR 200CV TSi', 11),
(298, 'Novo Gol', 11),
(299, 'Parati', 11),
(300, 'Passat 2.0', 11),
(301, 'Passat 2.0 TSI Aut', 11),
(302, 'Passat CC 3.6 FSI', 11),
(303, 'Passat Variant (Itens de Serie)', 11),
(304, 'Polo', 11),
(305, 'Saveiro', 11),
(306, 'Saveiro Cross 1.6 CE', 11),
(307, 'Spacefox', 11),
(308, 'Tiguan', 11),
(309, 'Touareg V6', 11),
(310, 'Voyage', 11),
(311, 'Voyage 1.0 Flex', 11),
(312, 'Voyage 1.0 Flex Trend', 11),
(313, 'Voyage 1.6 Flex', 11),
(314, 'VW 5.140E DELIVERY (+Bau Frigorifico)', 11),
(315, 'VW 5.140E DELIVERY (no Chassi)', 11),
(316, 'CG 125', 4),
(317, 'XTZ 125 XK', 3),
(318, 'GS500E', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_published` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `options` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `schedules`
--

INSERT INTO `schedules` (`id`, `vehicle_id`, `name`, `email`, `telephone`, `message`, `date`, `hour`, `options`, `created`, `modified`) VALUES
(1, 1, 'Ana Claudia', 'anacnogueira@gmail.com', '(12)9161-8959', 'teste', '2013-06-12', '21:45:15', '', '2013-06-12 21:45:15', '2013-06-12 21:45:15'),
(2, 2, 'Zé da Silva', 'ze@gmail.com', '(12)9161-8959', 'Teste', '2013-06-12', '22:13:29', '', '2013-06-12 22:13:29', '2013-06-12 22:13:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Carro'),
(2, 'Moto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `ativo` enum('S','N') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cpf`, `telefone`, `celular`, `password`, `ativo`, `created`, `modified`) VALUES
(1, 'Ana Claudia Nogueira', 'anacnogueira@gmail.com', '330.872.648-30', '(12)3951-6900', '(12)9161-8959', '3d31d140e674abd9c1b9551a638bb8245e7dbc61', 'S', '2012-01-08 16:25:58', '2012-01-08 16:25:58'),
(2, 'Osvaldo faro', 'osvfaro@hotmail.com', '348.878.133-09', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'S', '2013-07-05 09:29:52', '2013-07-05 09:30:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `stars` int(11) DEFAULT NULL,
  `manufacturing_year` int(11) NOT NULL,
  `model_year` int(11) NOT NULL,
  `modelo_id` int(11) NOT NULL,
  `status` enum('S','N') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `category_id`, `type_id`, `price`, `kilometrage`, `stars`, `manufacturing_year`, `model_year`, `modelo_id`, `status`, `created`, `modified`) VALUES
(8, 'Agile 1.4 MPFI LTZ 8V 4P', 2, 1, 32900.00, 10, NULL, 2010, 2011, 2, 'S', '2013-11-05 10:56:03', '2013-11-05 10:56:03'),
(9, 'SIENA 1.0 MPI FIRE 8V', 2, 1, 18500.00, 82503, NULL, 2006, 2006, 78, 'S', '2013-11-26 12:40:06', '2013-11-26 12:40:06'),
(10, 'UNO 1.0 EVO VIVACE', 2, 1, 29500.00, 1, NULL, 2012, 2013, 85, 'S', '2013-11-26 12:51:29', '2013-11-26 12:51:29'),
(12, 'CELTA 1.0 MPFI LS', 2, 1, 21600.00, 59664, NULL, 2011, 2012, 7, 'S', '2013-12-02 11:06:50', '2013-12-02 11:06:50'),
(13, 'Ka 1.0 MPI ', 2, 1, 21300.00, 14720, NULL, 2011, 2011, 101, 'S', '2013-12-02 11:58:13', '2013-12-02 11:58:13'),
(14, 'Strada 1.4 Fire Flex CS', 2, 1, 22800.00, 134381, NULL, 2007, 2008, 82, 'S', '2013-12-02 12:55:50', '2013-12-02 12:55:50'),
(15, 'Gol', 2, 1, 22700.00, 61692, NULL, 2009, 2009, 286, 'S', '2013-12-02 13:01:06', '2013-12-02 13:01:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicle_item_values`
--

DROP TABLE IF EXISTS `vehicle_item_values`;
CREATE TABLE IF NOT EXISTS `vehicle_item_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_value_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Extraindo dados da tabela `vehicle_item_values`
--

INSERT INTO `vehicle_item_values` (`id`, `vehicle_id`, `item_id`, `item_value_id`) VALUES
(34, 8, 4, 29),
(35, 8, 5, 3),
(36, 8, 6, 15),
(37, 8, 7, 28),
(38, 8, 8, 11),
(39, 9, 5, 3),
(40, 9, 6, 15),
(41, 9, 7, 28),
(42, 9, 8, 13),
(43, 9, 10, 30),
(44, 9, 10, 31),
(45, 9, 10, 33),
(46, 9, 10, 34),
(47, 9, 10, 35),
(48, 10, 4, 41),
(49, 10, 5, 3),
(50, 10, 6, 15),
(51, 10, 7, 28),
(52, 10, 10, 30),
(53, 10, 10, 31),
(54, 10, 10, 32),
(55, 10, 10, 33),
(56, 10, 10, 34),
(57, 10, 10, 35),
(63, 12, 4, 29),
(64, 12, 5, 3),
(65, 12, 7, 26),
(66, 12, 10, 31),
(67, 12, 10, 38),
(68, 12, 10, 43),
(69, 13, 4, 9),
(70, 13, 5, 3),
(71, 13, 7, 26),
(72, 13, 10, 33),
(73, 14, 4, 44),
(74, 14, 5, 3),
(75, 14, 7, 26),
(76, 15, 4, 41),
(77, 15, 5, 3),
(78, 15, 7, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vehicle_photos`
--

DROP TABLE IF EXISTS `vehicle_photos`;
CREATE TABLE IF NOT EXISTS `vehicle_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_ori` varchar(255) DEFAULT NULL,
  `photo_redim` varchar(255) DEFAULT NULL,
  `vehicle_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Extraindo dados da tabela `vehicle_photos`
--

INSERT INTO `vehicle_photos` (`id`, `photo_ori`, `photo_redim`, `vehicle_id`) VALUES
(48, 'vehicle_ori_20131105105552_1.jpg', 'vehicle_redim_20131105105552_1.jpg', 8),
(49, 'vehicle_ori_20131126123913_1.jpg', 'vehicle_redim_20131126123913_1.jpg', 9),
(50, 'vehicle_ori_20131126125123_5.jpg', 'vehicle_redim_20131126125123_5.jpg', 10),
(52, 'vehicle_ori_20131202110559_6.jpg', 'vehicle_redim_20131202110559_6.jpg', 12),
(53, 'vehicle_ori_20131202110619_7.jpg', 'vehicle_redim_20131202110619_7.jpg', 12),
(54, 'vehicle_ori_20131202110631_8.jpg', 'vehicle_redim_20131202110632_8.jpg', 12),
(55, 'vehicle_ori_20131202110640_9.jpg', 'vehicle_redim_20131202110641_9.jpg', 12),
(56, 'vehicle_ori_20131202115541_11.jpg', 'vehicle_redim_20131202115541_11.jpg', 13),
(57, 'vehicle_ori_20131202115608_12.jpg', 'vehicle_redim_20131202115608_12.jpg', 13),
(58, 'vehicle_ori_20131202115802_14.jpg', 'vehicle_redim_20131202115803_14.jpg', 13),
(59, 'vehicle_ori_20131202125345_15.jpg', 'vehicle_redim_20131202125346_15.jpg', 14),
(60, 'vehicle_ori_20131202125401_16.jpg', 'vehicle_redim_20131202125402_16.jpg', 14),
(61, 'vehicle_ori_20131202125455_17.jpg', 'vehicle_redim_20131202125455_17.jpg', 14),
(62, 'vehicle_ori_20131202125510_18.jpg', 'vehicle_redim_20131202125511_18.jpg', 14),
(63, 'vehicle_ori_20131202010004_19.jpg', 'vehicle_redim_20131202010004_19.jpg', 15),
(64, 'vehicle_ori_20131202010027_20.jpg', 'vehicle_redim_20131202010028_20.jpg', 15),
(65, 'vehicle_ori_20131202010047_21.jpg', 'vehicle_redim_20131202010047_21.jpg', 15),
(66, 'vehicle_ori_20131202010054_22.jpg', 'vehicle_redim_20131202010054_22.jpg', 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
