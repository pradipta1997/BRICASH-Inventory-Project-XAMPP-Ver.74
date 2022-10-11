-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 01:21 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-inventory-new`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `format_barang`
-- (See below for the actual view)
--
CREATE TABLE `format_barang` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `no_urut` int(11) NOT NULL,
  `id_tipe_barang` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `min_stock` int(11) DEFAULT NULL,
  `max_stock` int(11) DEFAULT NULL,
  `barang_created_date` timestamp NULL DEFAULT current_timestamp(),
  `barang_created_by` varchar(255) DEFAULT NULL,
  `barang_updated_date` datetime DEFAULT NULL,
  `barang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`no_urut`, `id_tipe_barang`, `id_satuan`, `kode_barang`, `nama_barang`, `min_stock`, `max_stock`, `barang_created_date`, `barang_created_by`, `barang_updated_date`, `barang_updated_by`) VALUES
(14, 7, 2, 'AW048', 'LCD  1500 - 15 INCH', NULL, NULL, '2021-03-20 16:38:40', 'superadmin', NULL, NULL),
(15, 7, 2, 'AW077', 'SPECIAL ELEKTRONIK 1500', 1, 200, '2021-03-20 16:39:17', 'superadmin', '2021-05-20 09:16:56', 'superadmin'),
(16, 8, 2, 'AW078', 'SPECIAL ELEKTRONIK 280 DW', NULL, NULL, '2021-03-20 16:39:47', 'superadmin', NULL, NULL),
(17, 8, 2, 'AW001', 'AD BOARD 280 DW', NULL, NULL, '2021-03-20 16:40:50', 'superadmin', NULL, NULL),
(18, 8, 2, 'AW020', 'CE 280 DW', NULL, NULL, '2021-03-20 16:41:25', 'superadmin', NULL, NULL),
(19, 8, 2, 'AW054', 'MONITOR 280 DW', NULL, NULL, '2021-03-20 16:42:09', 'superadmin', NULL, NULL),
(20, 8, 2, 'AW069', 'RECIEPT PRINTER 280 DW', NULL, NULL, '2021-03-20 16:42:49', 'superadmin', NULL, NULL),
(21, 9, 2, 'AW002', 'AD BOARD 280 HG', 1, 100, '2021-03-20 16:45:05', 'superadmin', '2021-05-19 15:58:13', 'superadmin'),
(22, 10, 2, 'CH001', 'AD BOARD ATAS', NULL, NULL, '2021-03-20 16:48:29', 'superadmin', NULL, NULL),
(23, 10, 2, 'CH002', 'AD BOARD DVI', NULL, NULL, '2021-03-20 16:49:08', 'superadmin', NULL, NULL),
(24, 10, 2, 'CH003', 'BILL CHECKER', NULL, NULL, '2021-03-20 16:51:23', 'superadmin', NULL, NULL),
(25, 10, 2, 'CH004', 'BMU', NULL, NULL, '2021-03-20 16:51:55', 'superadmin', NULL, NULL),
(26, 10, 2, 'CH005', 'BOARD CASSETTE', NULL, NULL, '2021-03-20 16:52:32', 'superadmin', NULL, NULL),
(27, 10, 2, 'CH006', 'BOARD CSM', NULL, NULL, '2021-03-20 16:53:08', 'superadmin', NULL, NULL),
(28, 10, 2, 'CH007', 'BOARD EXIT SHUTTER', NULL, NULL, '2021-03-20 16:53:50', 'superadmin', NULL, NULL),
(29, 10, 2, 'CH008', 'BOARD SWITCH DENOM', NULL, NULL, '2021-03-20 16:54:24', 'superadmin', NULL, NULL),
(30, 10, 2, 'CH009', 'BRACKET TOP MOTOR', NULL, NULL, '2021-03-20 16:55:44', 'superadmin', NULL, NULL),
(31, 10, 2, 'CH010', 'CABLE CSM KOMPLIT', NULL, NULL, '2021-03-20 16:56:10', 'superadmin', NULL, NULL),
(32, 10, 2, 'CH011', 'CABLE DATA SATA', NULL, NULL, '2021-03-20 16:56:56', 'superadmin', NULL, NULL),
(33, 10, 2, 'CH012', 'CABLE DVI', NULL, NULL, '2021-03-20 16:57:56', 'superadmin', NULL, NULL),
(34, 10, 2, 'CH013', 'CABLE CONNECTOR CASSETTE A', NULL, NULL, '2021-03-20 16:58:34', 'superadmin', NULL, NULL),
(35, 10, 2, 'CH015', 'CABLE CONNECTOR KASET C', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(36, 10, 2, 'CH016', 'CABLE CONNECTOR KASET D', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(37, 10, 2, 'CH017', 'CABLE CONNECTOR KASET E', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(38, 10, 2, 'CH018', 'CABLE POWER SATA', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(39, 10, 2, 'CH019', 'CABLE USB (PC TO CDU)', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(40, 10, 2, 'CH020', 'CARD READER ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(41, 10, 2, 'CH021', 'CASSETTE CURRENCY', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(42, 10, 2, 'CH022', 'CASSETTE REJECT', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(43, 10, 2, 'CH023', 'COVER LCD ATAS', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(44, 10, 2, 'CH024', 'COVER TE', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(45, 10, 2, 'CH025', 'CE WINDOWS 7 ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(46, 10, 2, 'CH026', 'CSM', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(47, 10, 2, 'CH027', 'DIGITAL KEY', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(48, 10, 2, 'CH028', 'DRIVE UP TTW INTERFACE', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(49, 10, 2, 'CH029', 'EPP 8000', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(50, 10, 2, 'CH030', 'EXIT SHUTTER ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(51, 10, 2, 'CH031', 'FAN PROCESSOR', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(52, 10, 2, 'CH032', 'FRONT TRANSPORT ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(53, 10, 2, 'CH033', 'FUNCTION LEFT KEY ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(54, 10, 2, 'CH034', 'FUNCTION RIGHT KEY ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(55, 10, 2, 'CH035', 'GEAR BRM', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(56, 10, 2, 'CH036', 'GEAR ROUND TRANSPORT', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(57, 10, 2, 'CH037', 'GEAR TRANSPORT PAD TO REJECT', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(58, 10, 2, 'CH038', 'HARD DISK 3,5 500 GB', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(59, 10, 2, 'CH039', 'HIDROLIK SHUTTER', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(60, 10, 2, 'CH040', 'HUB USB 7 PORT', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(61, 10, 2, 'CH041', 'INVERTER ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(62, 10, 2, 'CH042', 'INVERTER DVI  ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(63, 10, 2, 'CH043', 'KUNCI FASCIA', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(64, 10, 2, 'CH044', 'LCD ATAS', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(65, 10, 2, 'CH045', 'LCD BAWAH', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(66, 10, 2, 'CH046', 'MEMBRAN TE_LOWER 41', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(67, 10, 2, 'CH047', 'MEMBRAN TE_LOWER 42', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(68, 10, 2, 'CH048', 'MEMBRAN TE_UPPER 39', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(69, 10, 2, 'CH049', 'MEMBRAN TE_UPPER 40', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(70, 10, 2, 'CH050', 'MOLD SHUTTER CSM', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(71, 10, 2, 'CH051', 'MOTOR PUSH PLATE ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(72, 10, 2, 'CH052', 'MOTOR REJECT', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(73, 10, 2, 'CH053', 'MOTOR STICK ROLLER ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(74, 10, 2, 'CH054', 'OSD ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(75, 10, 2, 'CH055', 'PNC ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(76, 10, 2, 'CH056', 'POWER SUPPLY ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(77, 10, 2, 'CH057', 'POWER SUPPLY PC', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(78, 10, 2, 'CH058', 'RBU', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(79, 10, 2, 'CH059', 'RECEIPT PRINTER ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(80, 10, 2, 'CH060', 'ROLLER ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(81, 10, 2, 'CH061', 'ROUND TRANSPORT ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(82, 10, 2, 'CH062', 'RUBBER CASSETTE , PN. S4375000003', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(83, 10, 2, 'CH063', 'RUBBER CASSETTE , PN. S4375000004', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(84, 10, 2, 'CH064', 'RUBBER CASSETTE , PN. S4375000005', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(85, 10, 2, 'CH065', 'RUBBER STACKER ROLLER CSM', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(86, 10, 2, 'CH066', 'SELENOID ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(87, 10, 2, 'CH067', 'SENSOR GS-002', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(88, 10, 2, 'CH068', 'SENSOR LED  ( D)', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(89, 10, 2, 'CH069', 'SENSOR PRISMA', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(90, 10, 2, 'CH070', 'SENSOR TR  (T)', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(91, 10, 2, 'CH071', 'SENSOR U  (GS023 - SENSOR HS002)', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(92, 10, 2, 'CH072', 'SHUTTER CSM', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(93, 10, 2, 'CH073', 'SOCKET CASSETTE ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(94, 10, 2, 'CH074', 'SWITCH SUPERVISOR ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(95, 10, 2, 'CH075', 'SWITCH TEMPORARY ESCROW', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(96, 10, 2, 'CH076', 'TEMPORARY ESCROW', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(97, 10, 2, 'CH077', 'TOUCH SCREEN ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(98, 10, 2, 'CH078', 'TRANSPORT PAD', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(99, 10, 2, 'CH079', 'U PNC ', NULL, NULL, '2021-03-20 17:14:47', 'superadmin', NULL, NULL),
(100, 13, 2, 'HH001', 'AD BOARD HYBRID', NULL, NULL, '2021-03-20 17:31:54', 'superadmin', NULL, NULL),
(101, 13, 2, 'HH002', 'BMU', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(102, 13, 2, 'HH003', 'CARD READER HYBRID', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(103, 13, 2, 'HH004', 'CE HYBRID', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(104, 13, 2, 'HH005', 'CSM', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(105, 13, 2, 'HH006', 'DIGITAL KEY', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(106, 13, 2, 'HH007', 'E-KTP Reader', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(107, 13, 2, 'HH008', 'EPP', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(108, 13, 2, 'HH009', 'FAN PROCESSOR', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(109, 13, 2, 'HH010', 'HARD DISK', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(110, 13, 2, 'HH011', 'CABLE POWER SATA', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(111, 13, 2, 'HH012', 'MEMBRAN TE_LOWER 41', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(112, 13, 2, 'HH013', 'MEMBRAN TE_LOWER 42', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(113, 13, 2, 'HH014', 'MEMBRAN TE_UPPER 39', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(114, 13, 2, 'HH015', 'MEMBRAN TE_UPPER 40', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(115, 13, 2, 'HH016', 'MONITOR LED HYBRID 24\"N', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(116, 13, 2, 'HH017', 'OPL ADV 24 \"', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(117, 13, 2, 'HH018', 'POWER SUPPLY', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(118, 13, 2, 'HH019', 'PRINTER LEXMARK', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(119, 13, 2, 'HH020', 'RBU', NULL, NULL, '2021-03-20 17:35:48', 'superadmin', NULL, NULL),
(120, 12, 2, 'SH001', 'AD BOARD SSB', NULL, NULL, '2021-03-20 17:40:41', 'superadmin', NULL, NULL),
(121, 12, 2, 'SH003', 'CARD DISPENSER SSB', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(122, 12, 2, 'SH004', 'CARD READER SSB', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(123, 12, 2, 'SH005', 'CARTRIDGE', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(124, 12, 2, 'SH006', 'CE ', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(125, 12, 2, 'SH007', 'E-KTP READER', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(126, 12, 2, 'SH008', 'EPP', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(127, 12, 2, 'SH009', 'FAN PROCESSOR', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(128, 12, 2, 'SH010', 'HARD DISK', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(129, 12, 2, 'SH011', 'ID SCANNER', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(130, 12, 2, 'SH012', 'IMAGING PRINTER', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(131, 12, 2, 'SH013', 'CABLE EXTENSION PENGUBUNG SIDE CARD', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(132, 12, 2, 'SH014', 'CABLE FLEXIBLE CARD DISPENSER', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(133, 12, 2, 'SH015', 'CABLE USB TO RECEIPT PRINTER', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(134, 12, 2, 'SH016', 'LCD (OPL)', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(135, 12, 2, 'SH017', 'PCI COM CARD', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(136, 12, 2, 'SH018', 'PNC SSB', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(137, 12, 2, 'SH019', 'POWER ADAPTOR E-KTP', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(138, 12, 2, 'SH020', 'POWER SUPPLY SSB', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(139, 12, 2, 'SH021', 'PRINTER LEXMAX', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(140, 12, 2, 'SH022', 'RECEIPT PRINTER', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(141, 12, 2, 'SH023', 'TOUCH SCREEN', NULL, NULL, '2021-03-20 17:43:19', 'superadmin', NULL, NULL),
(142, 15, 2, 'AN002', 'BELT 517', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(143, 15, 2, 'AN003', 'BELT 518', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(144, 15, 2, 'AN004', 'BELT LOWER', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(145, 15, 2, 'AN005', 'BELT UPPER', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(146, 15, 2, 'AN006', 'BOARD DISPENSER ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(147, 15, 2, 'AN007', 'BOARD INTERFACE', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(148, 15, 2, 'AN008', 'CARD READER ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(149, 15, 2, 'AN009', 'CASSETTE ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(150, 15, 2, 'AN010', 'CASSETTE REJECT ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(151, 15, 2, 'AN011', 'CE XP', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(152, 15, 2, 'AN012', 'CE WIN 7', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(153, 15, 2, 'AN013', 'EPP ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(154, 15, 2, 'AN014', 'EXIT SHUTTER  S22E', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(155, 15, 2, 'AN015', 'FILTER DISPENSER ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(156, 15, 2, 'AN016', 'HARD DISK 3,5 500 GB', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(157, 15, 2, 'AN017', 'KUNCI FASCIA', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(158, 15, 2, 'AN018', 'KUNCI TOMBAK', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(159, 15, 2, 'AN019', 'LCD MONITOR', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(160, 15, 2, 'AN020', 'MAIN MOTOR', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(161, 15, 2, 'AN021', 'PCB MISC I/F MINI 2016', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(162, 15, 2, 'AN022', 'PICK LINE', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(163, 15, 2, 'AN023', 'PICK MODULE', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(164, 15, 2, 'AN024', 'POWER SUPPLY ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(165, 15, 2, 'AN025', 'PRESENTER ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(166, 15, 2, 'AN026', 'RECEIPT PRINTER  ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(167, 15, 2, 'AN027', 'ROLLER CARD READER SANKYO', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(168, 15, 2, 'AN028', 'SENSOR FASCIA ATAS ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(169, 15, 2, 'AN029', 'SOFTKEY (1 SET)', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(170, 15, 2, 'AN030', 'SUCTION CUP', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(171, 15, 2, 'AN031', 'TAMBUR CASSETTE', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(172, 15, 2, 'AN032', 'TIMING BELT ', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL),
(173, 15, 2, 'AN033', 'VERTICAL BOARD', NULL, NULL, '2021-03-20 17:50:59', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang_temp`
--

CREATE TABLE `tbl_barang_temp` (
  `id_tmp` int(11) NOT NULL,
  `id_do_detail` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `id_det_currency` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `tgl_qc` date DEFAULT NULL,
  `no_sn` varchar(255) DEFAULT NULL,
  `have_sn` int(1) DEFAULT 1 COMMENT '0 = ya, 1 = tidak',
  `harga_barang` int(11) DEFAULT NULL,
  `flag_qc` int(1) DEFAULT 0 COMMENT '0 = Not Qc, 1 = Rusak, 2 = Bagus',
  `flag_greenpart` int(1) DEFAULT NULL COMMENT '0 = Not Greenpart, 1 = Greenpart',
  `flag_retur` int(1) UNSIGNED DEFAULT NULL COMMENT '0 = Bukan retur barang, 1 = Retur Barang',
  `flag_dikemas` int(1) DEFAULT NULL COMMENT '0 = tidak dikemas, 1 = dikemas',
  `flag_cacat` int(1) DEFAULT NULL COMMENT '0 = tidak cacat, 1 = cacat',
  `flag_fisik` int(1) DEFAULT NULL COMMENT '0 = rusak, 1 = bagus',
  `flag_status_vendor` int(11) NOT NULL COMMENT '0 = belum diterima, 1 = sudah diterima',
  `flag_brg_sesuai` int(1) DEFAULT NULL COMMENT '0 = belum sesuai, 1 = sudah sesuai',
  `flag_pindah` int(1) DEFAULT 0 COMMENT '0 = belum di pindah, 1 = sudah di pindah ke table stock',
  `ket` text DEFAULT NULL,
  `barang_created_date` timestamp NULL DEFAULT current_timestamp(),
  `barang_created_by` varchar(255) DEFAULT NULL,
  `barang_updated_date` date DEFAULT NULL,
  `barang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_barang_temp`
--

INSERT INTO `tbl_barang_temp` (`id_tmp`, `id_do_detail`, `no_urut`, `id_det_currency`, `id_rak`, `tgl_qc`, `no_sn`, `have_sn`, `harga_barang`, `flag_qc`, `flag_greenpart`, `flag_retur`, `flag_dikemas`, `flag_cacat`, `flag_fisik`, `flag_status_vendor`, `flag_brg_sesuai`, `flag_pindah`, `ket`, `barang_created_date`, `barang_created_by`, `barang_updated_date`, `barang_updated_by`) VALUES
(1, 1, 25, 4, 10, '2021-09-05', 'BMU-01', 1, 10000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'BMU Black', '2021-09-05 09:24:42', NULL, '2021-09-05', 'superadmin'),
(2, 1, 25, 4, 10, '2021-09-05', 'BMU-02', 1, 10000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'BMU Red', '2021-09-05 09:24:42', NULL, '2021-09-05', 'superadmin'),
(3, 2, 24, 4, 10, '2021-09-05', 'BC-01', 1, 5000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'Nice', '2021-09-05 11:11:58', NULL, '2021-09-05', 'superadmin'),
(4, 3, 75, 4, 10, '2021-09-07', 'SN10030', 1, 1000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'oke', '2021-09-07 07:24:05', NULL, '2021-09-07', 'superadmin'),
(5, 4, 169, 4, 10, '2021-09-07', 'SN100111', 1, 5000, 1, 0, 0, 0, 0, 0, 0, 0, 0, '', '2021-09-07 07:38:35', NULL, '2021-09-07', 'superadmin'),
(6, 4, 169, 4, 10, '2021-09-07', 'SN10012', 1, 5000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'good', '2021-09-07 07:38:35', NULL, '2021-09-07', 'superadmin'),
(7, 4, 169, 4, 10, '2021-09-08', 'SN10011', 1, 5000, 2, 0, 0, 1, 0, 1, 0, 1, 0, '', '2021-09-07 07:38:35', NULL, '2021-09-08', 'superadmin'),
(8, 5, 143, 4, 10, '2021-09-07', 'SN6001', 1, 50000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'oke', '2021-09-07 07:38:35', NULL, '2021-09-07', 'superadmin'),
(9, 5, 143, 4, 10, '2021-09-07', 'SN6003', 1, 50000, 1, 0, 1, 0, 1, 0, 0, 0, 0, 'rusak nih', '2021-09-07 07:38:35', NULL, '2021-09-07', 'superadmin'),
(10, 5, 143, 4, 10, '2021-09-07', 'SN6002', 1, 50000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'oke', '2021-09-07 07:38:35', NULL, '2021-09-07', 'superadmin'),
(11, 6, 127, 4, 10, NULL, NULL, 1, 5000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 08:00:00', NULL, NULL, NULL),
(12, 7, 29, 4, 10, NULL, NULL, 1, 5000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 08:00:00', NULL, NULL, NULL),
(13, 7, 29, 4, 10, NULL, NULL, 1, 5000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 08:00:00', NULL, NULL, NULL),
(14, 7, 29, 4, 10, NULL, NULL, 1, 5000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 08:00:00', NULL, NULL, NULL),
(15, 12, 14, 4, 10, NULL, NULL, 1, 500, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 09:50:27', NULL, NULL, NULL),
(16, 12, 14, 4, 10, NULL, NULL, 1, 500, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 09:50:28', NULL, NULL, NULL),
(17, 13, 26, 4, 10, NULL, NULL, 1, 100, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 09:50:28', NULL, NULL, NULL),
(18, 14, 19, 4, 10, '2021-09-09', 'SNDEDE', 1, 1000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'YES', '2021-09-09 09:54:46', NULL, '2021-09-09', 'superadmin'),
(19, 14, 19, 4, 10, NULL, NULL, 1, 1000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 09:54:46', NULL, NULL, NULL),
(20, 15, 20, 4, 10, NULL, NULL, 1, 500, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-09 09:54:46', NULL, NULL, NULL),
(21, 16, 14, 4, 10, '2021-09-10', 'SIMULASI-01', 1, 10000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'Good', '2021-09-10 06:42:53', NULL, '2021-09-10', 'superadmin'),
(22, 16, 14, 4, 10, '2021-09-10', 'SIMULASI-02', 1, 10000, 1, 0, 1, 0, 1, 0, 1, 0, 0, 'Rusak bos', '2021-09-10 06:42:53', NULL, '2021-09-10', 'superadmin'),
(23, 17, 80, 4, 10, '2021-09-10', 'SIMULASI-03', 0, 5000, 2, 1, 0, 1, 0, 1, 0, 1, 1, 'Good', '2021-09-10 06:42:53', NULL, '2021-09-10', 'superadmin'),
(24, 19, 45, 4, 10, '2021-09-15', 'SN012345', 1, 50000, 2, 0, 0, 1, 0, 1, 0, 1, 1, 'Kaset Windows 7', '2021-09-15 08:10:32', NULL, '2021-09-15', 'superadmin'),
(25, 20, 45, 4, 10, '2021-09-15', 'SN-ABCD', 1, 50000, 1, 0, 1, 0, 1, 0, 1, 0, 0, 'Barang jelek.', '2021-09-15 08:13:26', NULL, '2021-09-15', 'superadmin'),
(26, 20, 45, 4, 10, '2021-09-15', 'SN-666666', 1, 50000, 1, 0, 1, 0, 1, 0, 0, 0, 0, 'Rusak', '2021-09-15 08:13:26', NULL, '2021-09-15', 'superadmin'),
(27, 20, 45, 4, 10, NULL, NULL, 1, 50000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-09-15 08:13:26', NULL, NULL, NULL),
(28, 21, 43, 4, 10, '2021-10-28', 'SN-LCD123', 1, 1000, 1, 0, 1, 1, 1, 0, 0, 0, 0, 'Barang cacat.', '2021-10-24 11:19:43', NULL, '2021-10-28', 'superadmin'),
(29, 24, 26, 4, 10, NULL, NULL, 1, 1000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-10-26 06:41:44', NULL, NULL, NULL),
(30, 24, 26, 4, 10, NULL, NULL, 1, 1000, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, '2021-10-26 06:41:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `id_currency` int(11) NOT NULL,
  `kode_currency` char(12) DEFAULT NULL,
  `nama_currency` varchar(255) DEFAULT NULL,
  `currency_created_date` timestamp NULL DEFAULT current_timestamp(),
  `currency_created_by` varchar(255) DEFAULT NULL,
  `currency_updated_date` datetime DEFAULT NULL,
  `currency_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`id_currency`, `kode_currency`, `nama_currency`, `currency_created_date`, `currency_created_by`, `currency_updated_date`, `currency_updated_by`) VALUES
(1, 'IDR', 'Indonesia', '2021-02-18 18:49:26', 'superadmin', NULL, NULL),
(12, 'RUB', 'Rubel Rusia', '2021-02-23 23:05:49', 'superadmin', NULL, NULL),
(13, 'SAR', 'Riyal Saudi', '2021-02-23 23:06:15', 'superadmin', NULL, NULL),
(14, 'USD', 'Dolar Amerika Serikat', '2021-02-23 23:06:38', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delivery_type`
--

CREATE TABLE `tbl_delivery_type` (
  `id_delivery_type` int(11) NOT NULL,
  `nama_delivery_type` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `delivery_type_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_type_created_by` varchar(255) NOT NULL,
  `delivery_type_updated_date` datetime NOT NULL,
  `delivery_type_updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_delivery_type`
--

INSERT INTO `tbl_delivery_type` (`id_delivery_type`, `nama_delivery_type`, `keterangan`, `delivery_type_created_date`, `delivery_type_created_by`, `delivery_type_updated_date`, `delivery_type_updated_by`) VALUES
(3, 'Cargo', '', '2021-05-06 19:41:40', '', '0000-00-00 00:00:00', ''),
(4, 'On Hand', '', '2021-05-06 19:41:43', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_det_currency`
--

CREATE TABLE `tbl_det_currency` (
  `id_det_currency` int(11) NOT NULL,
  `id_currency` int(11) DEFAULT NULL,
  `tgl_kurs` date DEFAULT NULL,
  `rupiah` decimal(11,2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `detcur_created_date` timestamp NULL DEFAULT current_timestamp(),
  `detcur_created_by` varchar(255) DEFAULT NULL,
  `detcur_updated_date` datetime DEFAULT NULL,
  `detcur_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_det_currency`
--

INSERT INTO `tbl_det_currency` (`id_det_currency`, `id_currency`, `tgl_kurs`, `rupiah`, `keterangan`, `detcur_created_date`, `detcur_created_by`, `detcur_updated_date`, `detcur_updated_by`) VALUES
(1, 14, '2021-04-28', '15000.00', 'USD DOLAR AMERIKA', '2021-04-27 19:51:22', 'superadmin', NULL, NULL),
(2, 14, '2021-04-09', '14586.50', 'USD DOLAR AMERIKA', '2021-04-22 17:29:40', NULL, NULL, NULL),
(4, 1, '2021-04-23', '1.00', 'Rupiah Indonesia', '2021-04-22 18:19:44', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_do`
--

CREATE TABLE `tbl_do` (
  `id_do` int(11) NOT NULL,
  `id_po` int(11) DEFAULT NULL,
  `tgl_do` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `telp_pengirim` char(15) DEFAULT NULL,
  `no_do` text DEFAULT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `status_do` int(11) DEFAULT NULL COMMENT '0 = belum selesai, 1 = selesai',
  `do_status_date` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `do_created_date` timestamp NULL DEFAULT current_timestamp(),
  `do_created_by` varchar(255) DEFAULT NULL,
  `do_update_date` datetime DEFAULT NULL,
  `do_update_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_do`
--

INSERT INTO `tbl_do` (`id_do`, `id_po`, `tgl_do`, `tgl_kirim`, `tgl_terima`, `telp_pengirim`, `no_do`, `nama_pengirim`, `nama_penerima`, `status_do`, `do_status_date`, `keterangan`, `do_created_date`, `do_created_by`, `do_update_date`, `do_update_by`) VALUES
(1, 1, '2021-09-05', '2021-09-05', '2021-09-05', '0881', 'DO-01', 'Ateng Surateng', NULL, NULL, NULL, '<p>Mantap, barang sampai.</p>', '2021-09-05 09:24:42', 'superadmin', '2021-09-07 14:32:30', 'superadmin'),
(2, 2, '2021-09-05', '2021-09-05', '2021-09-05', '123', 'DO-02', 'Jamet', NULL, NULL, NULL, '<p>Cuy</p>', '2021-09-05 11:11:58', 'superadmin', NULL, NULL),
(3, 3, '2021-09-07', '2021-09-07', '2021-09-07', '0121', 'DO-0000003', 'parjamban', NULL, NULL, NULL, '<p>TEST</p>', '2021-09-07 07:24:05', 'superadmin', '2021-09-07 14:25:47', 'superadmin'),
(4, 4, '2021-09-07', '2021-09-07', '2021-09-07', '0121', 'DO-000004', 'parjamban', NULL, NULL, NULL, '<p>tes</p>', '2021-09-07 07:38:35', 'superadmin', NULL, NULL),
(5, 5, '2021-09-09', '2021-09-09', '2021-09-09', '0121', 'DO-000005', 'elsar', NULL, NULL, NULL, '<p>tes</p>', '2021-09-09 08:00:00', 'superadmin', NULL, NULL),
(6, 6, '2021-09-09', '2021-09-09', '2021-09-09', '555', 'DO-231100', 'asd', 'Alif', 1, '2021-09-09', '<p>tesssDO</p>', '2021-09-09 09:10:49', 'superadmin', '2021-09-09 16:11:01', 'superadmin'),
(7, 7, '2021-09-09', '2021-09-09', '2021-09-09', '666123', 'DO-666', 'ateng', 'Alif', 1, '2021-09-09', '<p>asdasdasd</p>', '2021-09-09 09:47:49', 'superadmin', NULL, NULL),
(8, 7, '2021-09-09', '2021-09-09', '2021-09-09', '66671', 'DO-777', 'ddddadad', 'dqwrqwea', NULL, NULL, '<p>asdawew</p>', '2021-09-09 09:50:27', 'superadmin', NULL, NULL),
(9, 8, '2021-09-09', '2021-09-09', '2021-09-09', '1234567', 'DO-DEDE', 'qweqwd', 'asdfghjkl', NULL, NULL, '<p>dfghjkl;</p>', '2021-09-09 09:54:46', 'superadmin', NULL, NULL),
(10, 10, '2021-09-09', '2021-09-09', '2021-09-10', '081212', 'DO-1234', 'Abdul', 'Alif', NULL, NULL, '<p>Barang aman.</p>', '2021-09-10 06:42:53', 'superadmin', NULL, NULL),
(12, 12, '2021-09-15', '2021-09-15', '2021-09-15', '08123456', 'DO-SIMULASI001', 'Deny', 'Dipta', 1, '2021-09-15', '<p>Barang sampai.</p>', '2021-09-15 08:10:32', 'superadmin', NULL, NULL),
(13, 12, '2021-09-15', '2021-09-15', '2021-09-15', '08123456', 'DO-SIMULASI002', 'Deny', 'Dipta', 1, '2021-09-15', '<p>DO kedua.</p>', '2021-09-15 08:13:26', 'superadmin', NULL, NULL),
(14, 13, '2021-10-24', '2021-10-24', '2021-10-24', '08111', 'DO-A-01', 'Deny', 'Alif', 1, '2021-10-24', '<p>Barang diterima 1.</p>', '2021-10-24 11:19:42', 'superadmin', NULL, NULL),
(15, 13, '2021-10-26', '2021-10-26', '2021-10-26', '0812', 'DO-A-02', 'Deny', 'Alif', 1, '2021-10-26', '<p>Test</p>', '2021-10-26 06:41:44', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_do_detail`
--

CREATE TABLE `tbl_do_detail` (
  `id_do_detail` int(11) NOT NULL,
  `id_do` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `dodet_created_date` timestamp NULL DEFAULT current_timestamp(),
  `dodet_created_by` varchar(255) DEFAULT NULL,
  `dodet_update_date` datetime DEFAULT NULL,
  `dodet_update_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_do_detail`
--

INSERT INTO `tbl_do_detail` (`id_do_detail`, `id_do`, `no_urut`, `qty`, `keterangan`, `dodet_created_date`, `dodet_created_by`, `dodet_update_date`, `dodet_update_by`) VALUES
(1, 1, 25, 2, 'Aman.', '2021-09-05 09:24:42', 'superadmin', '2021-09-07 14:32:30', 'superadmin'),
(2, 2, 24, 1, 'Mantap', '2021-09-05 11:11:58', 'superadmin', NULL, NULL),
(3, 3, 75, 1, 'bil', '2021-09-07 07:24:05', 'superadmin', '2021-09-07 14:25:47', 'superadmin'),
(4, 4, 169, 3, 'bil', '2021-09-07 07:38:35', 'superadmin', NULL, NULL),
(5, 4, 143, 3, 'bil', '2021-09-07 07:38:35', 'superadmin', NULL, NULL),
(6, 5, 127, 1, 'bil', '2021-09-09 08:00:00', 'superadmin', NULL, NULL),
(7, 5, 29, 3, 'bil', '2021-09-09 08:00:00', 'superadmin', NULL, NULL),
(8, 6, 23, 2, 'ok', '2021-09-09 09:10:49', 'superadmin', '2021-09-09 16:11:01', 'superadmin'),
(9, 6, 20, 1, 'ok', '2021-09-09 09:10:49', 'superadmin', '2021-09-09 16:11:01', 'superadmin'),
(10, 7, 14, 2, '', '2021-09-09 09:47:49', 'superadmin', '2021-09-09 16:48:23', 'superadmin'),
(11, 7, 26, 1, '', '2021-09-09 09:47:49', 'superadmin', '2021-09-09 16:48:23', 'superadmin'),
(12, 8, 14, 2, 'addd', '2021-09-09 09:50:27', 'superadmin', NULL, NULL),
(13, 8, 26, 1, 'adsada', '2021-09-09 09:50:28', 'superadmin', NULL, NULL),
(14, 9, 19, 2, 'sdfg', '2021-09-09 09:54:46', 'superadmin', NULL, NULL),
(15, 9, 20, 1, 'sdf', '2021-09-09 09:54:46', 'superadmin', NULL, NULL),
(16, 10, 14, 2, 'Aman', '2021-09-10 06:42:53', 'superadmin', NULL, NULL),
(17, 10, 80, 1, 'Aman', '2021-09-10 06:42:53', 'superadmin', NULL, NULL),
(19, 12, 45, 1, 'Kurang', '2021-09-15 08:10:32', 'superadmin', '2021-09-15 15:10:51', 'superadmin'),
(20, 13, 45, 1, '', '2021-09-15 08:13:26', 'superadmin', '2021-09-15 16:09:07', 'superadmin'),
(21, 14, 43, 1, 'Oke', '2021-10-24 11:19:42', 'superadmin', NULL, NULL),
(22, 14, 26, 0, '', '2021-10-24 11:19:43', 'superadmin', NULL, NULL),
(23, 15, 43, 0, 'Gak ada item.', '2021-10-26 06:41:44', 'superadmin', NULL, NULL),
(24, 15, 26, 2, 'Ini lengkap.', '2021-10-26 06:41:44', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ekpedisi`
--

CREATE TABLE `tbl_ekpedisi` (
  `id_ekpedisi` int(11) NOT NULL,
  `id_delivery_type` int(11) NOT NULL,
  `nama_ekpedisi` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `ekpedisi_created_date` timestamp NULL DEFAULT current_timestamp(),
  `ekpedisi_created_by` varchar(255) DEFAULT NULL,
  `ekpedisi_updated_date` datetime DEFAULT NULL,
  `ekpedisi_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_ekpedisi`
--

INSERT INTO `tbl_ekpedisi` (`id_ekpedisi`, `id_delivery_type`, `nama_ekpedisi`, `keterangan`, `ekpedisi_created_date`, `ekpedisi_created_by`, `ekpedisi_updated_date`, `ekpedisi_updated_by`) VALUES
(2, 3, 'POS Indonesia', '', NULL, 'superadmin', NULL, NULL),
(3, 3, 'JNE', '', NULL, 'superadmin', NULL, NULL),
(4, 3, 'J&T Express', '', NULL, 'superadmin', NULL, NULL),
(5, 3, 'TIKI', '', NULL, 'superadmin', NULL, NULL),
(6, 3, 'Wahana', '', NULL, 'superadmin', NULL, NULL),
(7, 3, 'Indah Cargo', '', NULL, 'superadmin', NULL, NULL),
(8, 3, 'Pandu logistik', '', NULL, 'superadmin', NULL, NULL),
(9, 4, 'Go-Kilat', '', NULL, 'superadmin', NULL, NULL),
(10, 4, 'SAP Express Courier', '', NULL, 'superadmin', NULL, NULL),
(11, 4, 'SiCepat', '', NULL, 'superadmin', NULL, NULL),
(12, 4, 'Ninja Express', '', NULL, 'superadmin', NULL, NULL),
(13, 4, 'RPX', '', NULL, 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gbarang`
--

CREATE TABLE `tbl_gbarang` (
  `id_gbarang` int(11) NOT NULL,
  `nama_gbarang` varchar(100) DEFAULT NULL,
  `gbarang_created_date` timestamp NULL DEFAULT current_timestamp(),
  `gbarang_created_by` varchar(255) DEFAULT NULL,
  `gbarang_updated_date` datetime DEFAULT NULL,
  `gbarang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_gbarang`
--

INSERT INTO `tbl_gbarang` (`id_gbarang`, `nama_gbarang`, `gbarang_created_date`, `gbarang_created_by`, `gbarang_updated_date`, `gbarang_updated_by`) VALUES
(1, 'Sparepart', '2021-02-18 19:55:00', 'superadmin', '2021-02-24 11:24:21', 'superadmin'),
(2, 'Inventaris', '2021-02-18 19:55:09', 'superadmin', '2021-02-19 09:55:47', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gudang`
--

CREATE TABLE `tbl_gudang` (
  `id_gudang` int(11) NOT NULL,
  `id_uker` int(11) DEFAULT NULL,
  `nama_gudang` varchar(100) DEFAULT NULL,
  `letak_gudang` varchar(150) DEFAULT NULL,
  `ket_gudang` text DEFAULT NULL,
  `gudang_created_date` timestamp NULL DEFAULT current_timestamp(),
  `gudang_created_by` varchar(255) DEFAULT NULL,
  `gudang_updated_date` datetime DEFAULT NULL,
  `gudang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_gudang`
--

INSERT INTO `tbl_gudang` (`id_gudang`, `id_uker`, `nama_gudang`, `letak_gudang`, `ket_gudang`, `gudang_created_date`, `gudang_created_by`, `gudang_updated_date`, `gudang_updated_by`) VALUES
(2, 1, 'Gudang B', 'Di Kamar Pojok', '-', '2021-04-05 18:30:16', 'superadmin', NULL, NULL),
(3, 1, 'Gudang QC Vendor', 'Di Kamar D', 'Gudang untuk barang qc dari Vendor', '2021-04-22 21:14:28', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoicebarang`
--

CREATE TABLE `tbl_invoicebarang` (
  `id_invoice` int(11) NOT NULL,
  `id_po` int(11) NOT NULL,
  `jenis_pembayaran` varchar(25) NOT NULL,
  `tanggal_invoice` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `nilai_invoice` int(11) NOT NULL,
  `status_verifikasi` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum verifikasi, 1 = Sudah verifikasi',
  `beban` varchar(25) NOT NULL,
  `tahap_tagihan` varchar(25) NOT NULL,
  `asli_invoice` int(11) NOT NULL DEFAULT 0,
  `asli_pajak` int(11) NOT NULL DEFAULT 0,
  `asli_tandaterima` int(11) NOT NULL DEFAULT 0,
  `copy_po` int(11) NOT NULL DEFAULT 0,
  `copy_ip` int(11) NOT NULL DEFAULT 0,
  `asli_ba` int(11) NOT NULL DEFAULT 0,
  `dokumen` int(11) NOT NULL DEFAULT 0,
  `lain_lain` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_invoicebarang`
--

INSERT INTO `tbl_invoicebarang` (`id_invoice`, `id_po`, `jenis_pembayaran`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `status_verifikasi`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES
(1, 1, '', '2021-09-05', '2021-09-05', '1', 30000, 1, '1', '1', 1, 1, 1, 0, 0, 1, 1, 0),
(2, 2, '', '2021-09-05', '2021-09-05', '2', 50000, 1, '1', '0', 1, 1, 1, 1, 1, 0, 0, 1),
(3, 3, '', '2021-09-07', '2021-09-07', 'INV-001', 50000, 1, '1', '1', 1, 1, 1, 0, 0, 1, 0, 0),
(4, 4, '', '2021-09-07', '2021-09-07', 'INV-002', 10000, 1, '1', '1', 1, 1, 0, 1, 0, 0, 0, 0),
(6, 6, '', '2021-09-09', '2021-09-09', '2311', 100, 1, '1', '1', 1, 1, 1, 1, 1, 0, 0, 0),
(7, 7, '', '2021-09-09', '2021-09-09', '6661', 1000, 1, '1', '1', 1, 0, 1, 0, 1, 0, 0, 0),
(8, 8, '', '2021-09-09', '2021-09-09', '2300', 10000, 1, '1', '1', 1, 1, 0, 0, 0, 0, 1, 0),
(9, 10, '', '2021-09-09', '2021-09-09', '12345666', 50000, 1, '1', '1', 1, 1, 1, 0, 0, 1, 1, 0),
(15, 2, 'termin', '2021-10-29', '2021-10-29', '291021', 50000, 2, 'project', 'persen', 1, 1, 1, 1, 1, 1, 0, 0),
(16, 3, 'termin', '2021-11-01', '2021-11-01', 'Tes-01', 1, 1, 'project', 'persen', 1, 1, 1, 1, 1, 1, 0, 0),
(17, 13, 'termin', '2021-11-01', '2021-11-01', 'TES-02', 100, 1, 'project', 'persen', 1, 1, 1, 1, 1, 1, 1, 0),
(18, 12, 'termin', '2021-11-04', '2021-11-04', '01-BRE', 50, 0, 'project', 'lunas', 1, 1, 1, 1, 1, 1, 0, 0),
(19, 13, 'termin', '2021-11-04', '2021-11-04', 'TES-02-2', 14000, 1, 'project', 'persen', 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jtran`
--

CREATE TABLE `tbl_jtran` (
  `id_jtran` int(11) NOT NULL,
  `nama_jtran` varchar(255) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `jtran_created_date` timestamp NULL DEFAULT current_timestamp(),
  `jtran_created_by` varchar(255) DEFAULT NULL,
  `jtran_updated_date` datetime DEFAULT NULL,
  `jtran_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_jtran`
--

INSERT INTO `tbl_jtran` (`id_jtran`, `nama_jtran`, `is_active`, `jtran_created_date`, `jtran_created_by`, `jtran_updated_date`, `jtran_updated_by`) VALUES
(1, 'Pengeluaran Barang', 1, '2021-03-19 01:36:34', 'superadmin', NULL, NULL),
(2, 'Penerimaan Barang Vendor', 1, '2021-03-19 01:36:43', 'superadmin', NULL, NULL),
(3, 'Penerimaan Barang Balikan Teknisi', 1, '2021-03-23 07:43:59', 'superadmin', NULL, NULL),
(4, 'Pengeluaran Barang Kecabang', 1, '2021-03-26 09:20:50', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan_ekspedisi`
--

CREATE TABLE `tbl_layanan_ekspedisi` (
  `id_layanan_ekspedisi` int(11) NOT NULL,
  `id_ekspedisi` int(11) NOT NULL,
  `layanan_ekspedisi` varchar(255) NOT NULL,
  `layanan_ekspedisi_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `layanan_ekspedisi_created_by` varchar(255) NOT NULL,
  `layanan_ekspedisi_updated_date` datetime NOT NULL,
  `layanan_ekspedisi_updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_layanan_ekspedisi`
--

INSERT INTO `tbl_layanan_ekspedisi` (`id_layanan_ekspedisi`, `id_ekspedisi`, `layanan_ekspedisi`, `layanan_ekspedisi_created_date`, `layanan_ekspedisi_created_by`, `layanan_ekspedisi_updated_date`, `layanan_ekspedisi_updated_by`) VALUES
(7, 3, 'Regular', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(8, 2, 'Ekspress', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_login`
--

CREATE TABLE `tbl_log_login` (
  `id_log_login` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_log` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `nama_pc` text DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_log_login`
--

INSERT INTO `tbl_log_login` (`id_log_login`, `id_user`, `date_log`, `status`, `nama_pc`, `ip_address`) VALUES
(1, 1, '2021-04-23 16:13:26', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(2, 1, '2021-04-23 16:27:28', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(3, 1, '2021-04-23 16:36:18', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(4, 1, '2021-04-23 16:37:48', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(5, 1, '2021-04-26 07:33:50', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(6, 1, '2021-04-26 11:44:38', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(7, 1, '2021-04-26 11:44:41', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(8, 1, '2021-04-26 18:46:39', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(9, 1, '2021-04-27 18:46:05', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(10, 1, '2021-04-27 19:27:44', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(11, 1, '2021-04-27 19:27:47', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(12, 1, '2021-04-27 19:28:44', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(13, 1, '2021-04-27 19:28:47', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(14, 1, '2021-04-27 19:29:36', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(15, 1, '2021-04-27 19:29:46', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(16, 1, '2021-04-27 19:29:55', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(17, 1, '2021-04-27 19:30:00', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(18, 1, '2021-04-27 19:30:18', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(19, 1, '2021-04-27 19:30:42', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(20, 1, '2021-04-27 19:30:51', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(21, 1, '2021-04-27 19:30:58', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(22, 1, '2021-04-27 19:35:19', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(23, 1, '2021-04-27 19:35:21', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(24, 1, '2021-04-27 19:41:41', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(25, 1, '2021-04-27 19:41:44', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(26, 1, '2021-04-28 07:22:18', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(27, 1, '2021-04-28 07:29:20', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(28, 1, '2021-04-28 07:29:23', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(29, 1, '2021-04-28 07:32:33', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(30, 1, '2021-04-28 07:32:36', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(31, 15, '2021-04-28 10:09:16', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(32, 15, '2021-04-28 10:10:29', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(33, 15, '2021-04-28 10:10:31', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(34, 15, '2021-04-28 10:37:26', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(35, 16, '2021-04-28 10:37:28', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(36, 16, '2021-04-28 10:38:13', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(37, 15, '2021-04-28 10:38:16', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(38, 15, '2021-04-28 12:43:44', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(39, 15, '2021-04-28 13:47:53', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(40, 17, '2021-04-28 13:47:57', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(41, 17, '2021-04-28 13:59:23', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(42, 19, '2021-04-28 13:59:26', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(43, 19, '2021-04-28 14:03:30', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(44, 20, '2021-04-28 14:03:33', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(45, 20, '2021-04-28 14:06:22', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(46, 21, '2021-04-28 14:06:25', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(47, 21, '2021-04-28 14:12:36', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(48, 22, '2021-04-28 14:12:39', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(49, 22, '2021-04-28 14:17:33', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(50, 23, '2021-04-28 14:17:37', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(51, 23, '2021-04-28 14:20:04', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(52, 24, '2021-04-28 14:20:08', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(53, 24, '2021-04-28 14:24:54', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(54, 25, '2021-04-28 14:24:58', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(55, 25, '2021-04-28 15:13:43', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(56, 1, '2021-04-28 15:13:49', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(57, 1, '2021-04-29 07:46:02', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(58, 1, '2021-04-29 18:31:27', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(59, 30, '2021-04-29 18:32:26', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(60, 30, '2021-04-29 18:41:13', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(61, 1, '2021-04-30 07:31:49', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(62, 15, '2021-04-30 13:11:16', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(63, 1, '2021-04-30 14:35:06', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.17.144.1'),
(64, 1, '2021-05-03 20:04:16', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.27.128.1'),
(65, 1, '2021-05-04 16:26:15', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(66, 1, '2021-05-05 08:10:24', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(67, 1, '2021-05-05 08:48:11', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(68, 1, '2021-05-05 08:51:48', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(69, 1, '2021-05-05 13:28:34', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(70, 1, '2021-05-06 07:38:15', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(71, 1, '2021-05-06 08:21:41', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(72, 1, '2021-05-06 08:21:49', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(73, 1, '2021-05-06 11:29:18', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(74, 1, '2021-05-06 11:29:27', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(75, 1, '2021-05-06 14:51:44', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(76, 1, '2021-05-06 14:51:53', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(77, 1, '2021-05-06 19:36:15', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(78, 1, '2021-05-06 20:39:54', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(79, 21, '2021-05-06 20:39:58', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(80, 21, '2021-05-06 20:40:14', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(81, 1, '2021-05-06 20:40:18', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(82, 1, '2021-05-06 20:40:49', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(83, 21, '2021-05-06 20:40:52', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(84, 1, '2021-05-06 20:41:09', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(85, 21, '2021-05-06 20:46:42', 'Logout', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(86, 31, '2021-05-06 20:46:44', 'Login', 'Windows NT DESKTOP-1TCBGMT 10.0 build 19042 (Windows 10) AMD64', '172.26.176.1'),
(87, 1, '2021-05-10 07:43:48', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(88, 1, '2021-05-11 07:34:23', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(89, 1, '2021-05-11 10:20:20', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(90, 1, '2021-05-11 18:28:46', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.100.10'),
(91, 1, '2021-05-17 08:25:06', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(92, 1, '2021-05-17 16:42:01', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(93, 1, '2021-05-18 08:16:00', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(94, 1, '2021-05-19 08:27:14', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(95, 21, '2021-05-19 13:42:21', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(96, 21, '2021-05-19 13:42:29', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(97, 1, '2021-05-19 13:59:07', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(98, 15, '2021-05-19 13:59:15', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(99, 15, '2021-05-19 15:20:57', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(100, 1, '2021-05-19 15:21:03', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(101, 21, '2021-05-19 15:22:46', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(102, 15, '2021-05-19 15:22:59', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(103, 15, '2021-05-19 15:26:09', 'Logout', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(104, 21, '2021-05-19 15:26:15', 'Login', 'Windows NT VIAN-PC 6.3 build 9200 (Windows 8.1 Professional Edition) i586', '192.168.3.71'),
(105, 1, '2021-05-20 08:23:31', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(106, 1, '2021-05-21 08:54:30', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(107, 1, '2021-05-21 13:43:19', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(108, 1, '2021-05-24 13:31:52', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(109, 1, '2021-05-25 08:36:28', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(110, 1, '2021-05-25 14:37:46', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.43.137'),
(111, 1, '2021-05-27 08:22:30', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(112, 1, '2021-05-27 13:08:29', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(113, 1, '2021-05-28 08:30:41', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(114, 1, '2021-05-28 14:01:59', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(115, 1, '2021-05-30 18:46:50', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.43.137'),
(116, 1, '2021-05-30 22:48:23', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '127.0.0.1'),
(117, 1, '2021-06-02 08:34:43', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(118, 1, '2021-06-02 14:45:31', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(119, 1, '2021-06-03 08:32:02', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(120, 1, '2021-06-09 08:12:23', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '17.17.17.185'),
(121, 1, '2021-06-10 09:06:02', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(122, 1, '2021-06-11 08:51:04', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(123, 1, '2021-06-11 13:44:58', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(124, 1, '2021-06-12 16:05:04', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '127.0.0.1'),
(125, 1, '2021-06-13 19:53:19', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '127.0.0.1'),
(126, 1, '2021-06-14 08:12:13', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(127, 1, '2021-06-15 09:06:42', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(128, 1, '2021-06-15 13:49:40', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(129, 1, '2021-06-16 09:13:09', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(130, 1, '2021-06-17 08:45:42', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(131, 1, '2021-06-18 13:19:23', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '127.0.0.1'),
(132, 1, '2021-06-21 08:41:44', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(133, 1, '2021-06-22 08:30:23', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(134, 1, '2021-06-22 12:58:59', 'Logout', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(135, 1, '2021-06-22 12:59:08', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(136, 1, '2021-06-22 12:59:13', 'Logout', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(137, 1, '2021-06-22 12:59:34', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(138, 1, '2021-06-22 13:00:17', 'Logout', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(139, 21, '2021-06-22 13:00:28', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(140, 21, '2021-06-22 13:01:06', 'Logout', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(141, 1, '2021-06-22 13:01:17', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(142, 1, '2021-06-23 09:02:50', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(143, 1, '2021-06-23 13:43:43', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(144, 1, '2021-06-24 09:16:54', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '17.17.17.243'),
(145, 1, '2021-06-25 08:39:54', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(146, 1, '2021-06-25 13:55:48', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(147, 1, '2021-06-29 08:27:33', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(148, 1, '2021-06-29 15:52:36', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(149, 1, '2021-06-29 15:52:42', 'Logout', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(150, 21, '2021-06-29 15:53:51', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(151, 1, '2021-06-29 15:55:57', 'Logout', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(152, 1, '2021-06-29 15:56:10', 'Login', 'Windows NT DESKTOP-BJ6FO52 10.0 build 19042 (Windows 10) AMD64', '192.168.3.66'),
(153, 1, '2021-07-01 09:11:46', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.68'),
(154, 1, '2021-07-02 07:02:14', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(155, 1, '2021-07-05 08:52:46', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.68'),
(156, 1, '2021-07-07 14:06:01', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(157, 1, '2021-07-08 08:36:58', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.68'),
(158, 1, '2021-07-09 15:02:39', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.68'),
(159, 1, '2021-07-12 12:28:33', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(160, 1, '2021-07-13 10:41:22', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(161, 1, '2021-07-13 15:23:08', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(162, 1, '2021-07-14 16:52:16', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(163, 1, '2021-07-15 09:22:29', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.68'),
(164, 1, '2021-07-15 13:26:47', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.68'),
(165, 1, '2021-07-16 08:53:03', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(166, 1, '2021-07-18 20:01:10', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(167, 1, '2021-07-19 17:04:33', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(168, 1, '2021-07-21 18:26:59', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(169, 1, '2021-07-23 11:25:11', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(170, 1, '2021-07-27 17:28:49', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(171, 1, '2021-07-28 08:19:44', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(172, 1, '2021-07-28 20:02:47', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(173, 1, '2021-07-29 10:39:31', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(174, 1, '2021-07-29 10:46:33', 'Logout', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(175, 1, '2021-07-29 10:46:38', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(176, 1, '2021-07-29 13:08:30', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(177, 1, '2021-07-29 17:03:02', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(178, 1, '2021-07-30 11:17:40', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(179, 1, '2021-07-30 21:01:39', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(180, 1, '2021-07-31 19:56:09', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.104'),
(181, 1, '2021-08-01 20:49:53', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.109'),
(182, 1, '2021-08-02 00:53:49', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.109'),
(183, 1, '2021-08-02 08:53:33', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.109'),
(184, 1, '2021-08-03 21:47:37', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.105'),
(185, 1, '2021-08-04 08:15:39', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.47.245'),
(186, 1, '2021-08-08 19:33:55', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(187, 1, '2021-08-09 08:51:06', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(188, 1, '2021-08-10 08:38:14', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.3.160'),
(189, 1, '2021-08-12 09:16:39', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(190, 1, '2021-08-12 12:30:51', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(191, 1, '2021-08-12 17:49:08', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(192, 1, '2021-08-13 08:49:42', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(193, 1, '2021-08-14 15:42:15', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(194, 1, '2021-08-15 13:30:12', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(195, 1, '2021-08-15 19:51:05', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(196, 1, '2021-08-16 00:32:45', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(197, 1, '2021-08-18 14:17:30', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.223.245'),
(198, 1, '2021-08-19 15:05:33', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(199, 1, '2021-08-19 19:58:07', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '192.168.0.102'),
(200, 1, '2021-08-20 08:17:53', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(201, 1, '2021-08-20 13:53:26', 'Login', 'Windows NT DESKTOP-OKLJBMS 10.0 build 19042 (Windows 10) AMD64', '17.17.17.20'),
(202, 1, '2021-08-25 12:00:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(203, 1, '2021-08-25 12:00:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(204, 1, '2021-08-27 08:21:56', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(205, 1, '2021-08-27 13:25:02', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(206, 1, '2021-08-30 09:00:54', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(207, 1, '2021-08-30 11:23:58', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(208, 1, '2021-08-31 08:37:46', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(209, 1, '2021-09-01 09:00:39', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(210, 1, '2021-09-02 10:00:33', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(211, 1, '2021-09-03 09:20:29', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(212, 1, '2021-09-03 09:29:35', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(213, 15, '2021-09-03 09:31:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(214, 15, '2021-09-03 09:31:48', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(215, 16, '2021-09-03 09:31:54', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(216, 16, '2021-09-03 09:32:14', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(217, 15, '2021-09-03 09:32:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(218, 15, '2021-09-03 10:00:52', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(219, 1, '2021-09-03 10:00:56', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(220, 1, '2021-09-03 10:13:22', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(221, 16, '2021-09-03 10:13:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(222, 16, '2021-09-03 10:14:26', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(223, 1, '2021-09-03 10:14:31', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(224, 1, '2021-09-03 10:16:52', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(225, 16, '2021-09-03 10:16:57', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(226, 16, '2021-09-03 10:17:48', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(227, 1, '2021-09-03 10:17:53', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(228, 1, '2021-09-03 10:21:43', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(229, 15, '2021-09-03 10:21:50', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(230, 15, '2021-09-03 10:22:01', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(231, 16, '2021-09-03 10:22:09', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(232, 16, '2021-09-03 10:22:17', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(233, 1, '2021-09-03 10:22:23', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(234, 1, '2021-09-03 13:33:16', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(235, 1, '2021-09-03 13:58:46', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(236, 16, '2021-09-03 13:58:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(237, 16, '2021-09-03 14:22:12', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(238, 1, '2021-09-03 14:22:17', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(239, 1, '2021-09-03 14:22:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(240, 16, '2021-09-03 14:22:47', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(241, 16, '2021-09-03 14:34:50', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(242, 1, '2021-09-03 14:34:55', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(243, 1, '2021-09-03 14:44:36', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(244, 16, '2021-09-03 14:44:40', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(245, 16, '2021-09-03 14:44:58', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(246, 1, '2021-09-03 14:45:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(247, 1, '2021-09-03 14:56:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(248, 15, '2021-09-03 14:56:49', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(249, 15, '2021-09-03 14:57:14', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(250, 16, '2021-09-03 14:57:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(251, 16, '2021-09-03 14:57:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(252, 15, '2021-09-03 14:57:42', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(253, 15, '2021-09-03 14:57:59', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(254, 1, '2021-09-03 14:58:03', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(255, 1, '2021-09-03 14:59:46', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(256, 16, '2021-09-03 14:59:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(257, 16, '2021-09-03 15:00:13', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(258, 1, '2021-09-03 15:00:17', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(259, 1, '2021-09-03 15:03:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(260, 15, '2021-09-03 15:03:21', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(261, 15, '2021-09-03 15:03:44', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(262, 1, '2021-09-03 15:03:49', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(263, 1, '2021-09-03 15:27:43', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(264, 16, '2021-09-03 15:27:50', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(265, 16, '2021-09-03 15:46:21', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(266, 1, '2021-09-03 15:46:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(267, 1, '2021-09-03 15:49:32', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(268, 16, '2021-09-03 15:49:38', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(269, 16, '2021-09-03 15:49:54', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(270, 15, '2021-09-03 15:49:58', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(271, 15, '2021-09-03 15:50:15', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(272, 1, '2021-09-03 15:50:19', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(273, 1, '2021-09-03 15:50:55', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(274, 16, '2021-09-03 15:51:07', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(275, 16, '2021-09-03 15:51:20', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(276, 1, '2021-09-03 15:51:27', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(277, 1, '2021-09-03 15:53:11', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(278, 16, '2021-09-03 15:53:17', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(279, 16, '2021-09-03 15:53:31', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(280, 1, '2021-09-03 15:53:35', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(281, 1, '2021-09-03 16:34:38', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(282, 16, '2021-09-03 16:34:43', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(283, 16, '2021-09-03 16:40:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(284, 1, '2021-09-03 16:40:50', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(285, 1, '2021-09-03 16:45:48', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(286, 1, '2021-09-03 16:45:53', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(287, 1, '2021-09-03 16:52:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(288, 31, '2021-09-03 16:53:13', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(289, 31, '2021-09-03 16:53:31', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(290, 21, '2021-09-03 16:53:43', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(291, 21, '2021-09-03 16:54:01', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(292, 31, '2021-09-03 16:54:04', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(293, 31, '2021-09-03 16:54:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(294, 1, '2021-09-03 16:54:28', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.92'),
(295, 1, '2021-09-05 15:08:08', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(296, 1, '2021-09-05 16:20:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(297, 16, '2021-09-05 16:20:35', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(298, 16, '2021-09-05 16:20:56', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(299, 15, '2021-09-05 16:21:04', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(300, 15, '2021-09-05 16:21:17', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(301, 1, '2021-09-05 16:21:21', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(302, 1, '2021-09-05 16:22:10', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(303, 16, '2021-09-05 16:22:14', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(304, 16, '2021-09-05 16:22:29', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(305, 1, '2021-09-05 16:22:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(306, 1, '2021-09-05 16:25:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(307, 15, '2021-09-05 16:25:48', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(308, 15, '2021-09-05 16:26:29', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(309, 1, '2021-09-05 16:26:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(310, 1, '2021-09-05 18:08:46', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(311, 16, '2021-09-05 18:08:52', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(312, 16, '2021-09-05 18:09:14', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(313, 15, '2021-09-05 18:09:19', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(314, 15, '2021-09-05 18:09:36', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(315, 1, '2021-09-05 18:09:41', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(316, 1, '2021-09-05 18:10:55', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(317, 16, '2021-09-05 18:11:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(318, 16, '2021-09-05 18:11:12', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(319, 1, '2021-09-05 18:11:16', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(320, 1, '2021-09-05 18:13:09', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(321, 16, '2021-09-05 18:13:14', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(322, 16, '2021-09-05 18:13:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(323, 1, '2021-09-05 18:13:33', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(324, 1, '2021-09-05 18:56:43', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(325, 21, '2021-09-05 18:56:50', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(326, 21, '2021-09-05 18:57:05', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(327, 1, '2021-09-05 18:57:09', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(328, 1, '2021-09-05 22:44:23', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(329, 1, '2021-09-05 22:47:46', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(330, 21, '2021-09-05 22:49:53', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(331, 21, '2021-09-05 22:50:40', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(332, 1, '2021-09-05 22:57:48', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(333, 1, '2021-09-05 23:14:58', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(334, 21, '2021-09-05 23:15:04', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(335, 21, '2021-09-05 23:15:18', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(336, 1, '2021-09-05 23:15:21', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(337, 1, '2021-09-06 08:41:33', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(338, 21, '2021-09-06 08:51:52', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(339, 21, '2021-09-06 09:52:43', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(340, 15, '2021-09-06 09:52:53', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(341, 15, '2021-09-06 09:53:03', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(342, 1, '2021-09-07 08:32:31', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(343, 15, '2021-09-07 14:00:55', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(344, 15, '2021-09-07 14:01:33', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(345, 16, '2021-09-07 14:01:39', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(346, 16, '2021-09-07 14:09:06', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(347, 15, '2021-09-07 14:09:11', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(348, 15, '2021-09-07 14:16:20', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(349, 15, '2021-09-07 14:16:25', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(350, 15, '2021-09-07 14:20:29', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(351, 16, '2021-09-07 14:20:36', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(352, 16, '2021-09-07 14:21:03', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(353, 15, '2021-09-07 14:21:08', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(354, 15, '2021-09-07 14:35:26', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(355, 16, '2021-09-07 14:35:31', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(356, 16, '2021-09-07 14:35:51', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(357, 15, '2021-09-07 14:35:55', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(358, 1, '2021-09-08 09:46:47', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(359, 1, '2021-09-09 09:20:52', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(360, 16, '2021-09-09 14:53:13', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(361, 16, '2021-09-09 14:55:00', 'Logout', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(362, 15, '2021-09-09 14:55:10', 'Login', 'Windows NT DESKTOP-EQK55BM 10.0 build 19042 (Windows 10) AMD64', '192.168.56.1'),
(363, 1, '2021-09-09 16:06:09', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(364, 15, '2021-09-09 16:06:19', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(365, 15, '2021-09-09 16:06:35', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(366, 1, '2021-09-09 16:06:39', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(367, 1, '2021-09-09 16:08:23', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(368, 16, '2021-09-09 16:08:28', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(369, 16, '2021-09-09 16:08:41', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(370, 15, '2021-09-09 16:08:44', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(371, 15, '2021-09-09 16:08:56', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(372, 1, '2021-09-09 16:09:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(373, 1, '2021-09-09 16:09:53', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(374, 16, '2021-09-09 16:09:56', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(375, 16, '2021-09-09 16:10:13', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(376, 1, '2021-09-09 16:10:16', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(377, 1, '2021-09-09 16:11:38', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(378, 16, '2021-09-09 16:11:41', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(379, 16, '2021-09-09 16:11:59', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(380, 1, '2021-09-09 16:12:03', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(381, 1, '2021-09-09 16:44:07', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(382, 16, '2021-09-09 16:44:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(383, 16, '2021-09-09 16:44:33', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(384, 15, '2021-09-09 16:44:36', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(385, 15, '2021-09-09 16:44:50', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(386, 1, '2021-09-09 16:44:54', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(387, 1, '2021-09-09 16:45:47', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(388, 16, '2021-09-09 16:45:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(389, 16, '2021-09-09 16:46:07', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(390, 1, '2021-09-09 16:46:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(391, 1, '2021-09-09 16:48:58', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(392, 15, '2021-09-09 16:49:03', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(393, 15, '2021-09-09 16:49:19', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(394, 1, '2021-09-09 16:49:24', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(395, 1, '2021-09-09 16:52:08', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(396, 16, '2021-09-09 16:52:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(397, 16, '2021-09-09 16:52:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(398, 15, '2021-09-09 16:52:31', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(399, 15, '2021-09-09 16:52:45', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(400, 1, '2021-09-09 16:52:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(401, 1, '2021-09-09 16:53:27', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(402, 16, '2021-09-09 16:53:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(403, 16, '2021-09-09 16:53:43', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(404, 1, '2021-09-09 16:53:49', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(405, 1, '2021-09-09 16:55:10', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39');
INSERT INTO `tbl_log_login` (`id_log_login`, `id_user`, `date_log`, `status`, `nama_pc`, `ip_address`) VALUES
(406, 15, '2021-09-09 16:55:16', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(407, 15, '2021-09-09 16:55:32', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(408, 1, '2021-09-09 16:55:36', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(409, 1, '2021-09-10 08:28:58', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(410, 1, '2021-09-10 13:33:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(411, 1, '2021-09-10 13:36:10', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(412, 16, '2021-09-10 13:36:15', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(413, 16, '2021-09-10 13:36:31', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(414, 1, '2021-09-10 13:36:35', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(415, 1, '2021-09-10 13:37:31', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(416, 1, '2021-09-10 13:37:42', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(417, 1, '2021-09-10 13:39:22', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(418, 16, '2021-09-10 13:39:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(419, 16, '2021-09-10 13:39:44', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(420, 15, '2021-09-10 13:39:48', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(421, 15, '2021-09-10 13:40:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(422, 1, '2021-09-10 13:40:10', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(423, 1, '2021-09-10 13:41:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(424, 16, '2021-09-10 13:41:10', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(425, 16, '2021-09-10 13:41:27', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(426, 1, '2021-09-10 13:41:31', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(427, 1, '2021-09-10 13:43:31', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(428, 16, '2021-09-10 13:43:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(429, 16, '2021-09-10 13:43:56', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(430, 1, '2021-09-10 13:44:01', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(431, 1, '2021-09-10 13:54:38', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(432, 21, '2021-09-10 13:54:43', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(433, 21, '2021-09-10 13:54:59', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(434, 31, '2021-09-10 13:55:02', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(435, 31, '2021-09-10 13:55:08', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(436, 1, '2021-09-10 13:55:12', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(437, 1, '2021-09-10 14:24:14', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(438, 21, '2021-09-10 14:24:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(439, 21, '2021-09-10 14:24:39', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(440, 1, '2021-09-10 14:24:43', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(441, 1, '2021-09-10 14:59:30', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(442, 31, '2021-09-10 14:59:36', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(443, 31, '2021-09-10 14:59:56', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(444, 21, '2021-09-10 15:00:03', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(445, 21, '2021-09-10 15:00:38', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(446, 31, '2021-09-10 15:00:48', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(447, 31, '2021-09-10 15:01:04', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(448, 1, '2021-09-10 15:01:08', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(449, 1, '2021-09-13 08:54:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(450, 1, '2021-09-13 13:44:41', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(451, 1, '2021-09-15 08:54:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.224.12'),
(452, NULL, '2021-09-15 13:34:36', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(453, 1, '2021-09-15 13:34:57', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(454, 1, '2021-09-15 13:47:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(455, 16, '2021-09-15 13:47:13', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(456, 16, '2021-09-15 13:51:57', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(457, 15, '2021-09-15 13:52:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(458, 15, '2021-09-15 13:57:24', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(459, 1, '2021-09-15 13:57:29', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(460, 1, '2021-09-15 14:33:47', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(461, 16, '2021-09-15 14:33:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(462, 16, '2021-09-15 14:34:04', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(463, 1, '2021-09-15 14:34:07', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(464, 1, '2021-09-15 14:35:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(465, 16, '2021-09-15 14:35:41', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(466, 16, '2021-09-15 14:36:10', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(467, 1, '2021-09-15 14:36:14', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(468, 1, '2021-09-15 14:36:30', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(469, 15, '2021-09-15 14:36:37', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(470, 15, '2021-09-15 14:37:15', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(471, 1, '2021-09-15 14:37:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(472, 1, '2021-09-15 15:44:10', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(473, 15, '2021-09-15 15:44:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(474, 15, '2021-09-15 15:44:52', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(475, 1, '2021-09-15 15:44:56', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(476, 1, '2021-09-15 15:45:52', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(477, 15, '2021-09-15 15:45:57', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(478, 15, '2021-09-15 15:55:19', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(479, 1, '2021-09-15 15:55:25', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(480, 1, '2021-09-15 16:23:26', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(481, 15, '2021-09-15 16:23:31', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(482, 15, '2021-09-15 16:27:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(483, 1, '2021-09-15 16:27:40', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(484, 1, '2021-09-16 08:23:12', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.224.12'),
(485, 1, '2021-09-16 11:14:02', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(486, 16, '2021-09-16 11:14:14', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(487, 16, '2021-09-16 11:35:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(488, 1, '2021-09-16 11:35:21', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.39'),
(489, 1, '2021-09-21 02:26:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.112'),
(490, 1, '2021-09-23 09:44:36', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(491, 1, '2021-09-23 10:33:45', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(492, 16, '2021-09-23 10:34:36', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(493, 16, '2021-09-23 10:35:12', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(494, 1, '2021-09-23 10:35:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(495, 1, '2021-09-23 10:44:18', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(496, 16, '2021-09-23 10:44:29', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(497, 16, '2021-09-23 11:54:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(498, 1, '2021-09-23 11:54:25', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(499, 1, '2021-09-23 11:59:59', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(500, 16, '2021-09-23 12:00:04', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(501, 16, '2021-09-23 13:32:15', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(502, 1, '2021-09-23 13:32:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.200'),
(503, 1, '2021-09-29 09:28:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(504, 1, '2021-09-29 09:46:00', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(505, 21, '2021-09-29 09:46:07', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(506, 21, '2021-09-29 09:47:15', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(507, 1, '2021-09-29 09:47:19', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(508, 1, '2021-09-29 09:54:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(509, 21, '2021-09-29 09:54:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(510, 21, '2021-09-29 09:59:12', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(511, 1, '2021-09-29 09:59:16', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(512, 1, '2021-09-29 10:56:18', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(513, 21, '2021-09-29 10:56:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(514, 21, '2021-09-29 10:56:35', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(515, 1, '2021-09-29 10:56:41', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(516, 1, '2021-09-29 11:18:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(517, 21, '2021-09-29 11:18:48', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(518, 21, '2021-09-29 11:19:39', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(519, 1, '2021-09-29 11:19:44', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(520, 1, '2021-09-29 13:38:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(521, 21, '2021-09-29 13:38:47', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(522, 21, '2021-09-29 13:39:19', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(523, 1, '2021-09-29 13:39:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(524, 1, '2021-10-06 09:25:44', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(525, 1, '2021-10-06 14:50:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.144'),
(526, 1, '2021-10-13 09:07:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(527, 1, '2021-10-13 14:26:13', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(528, 1, '2021-10-13 14:57:57', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(529, 16, '2021-10-13 14:58:02', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(530, 16, '2021-10-13 14:58:36', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(531, 1, '2021-10-13 14:58:43', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(532, 1, '2021-10-15 08:41:13', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.157'),
(533, 1, '2021-10-21 07:50:01', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(534, 1, '2021-10-21 09:19:39', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(535, 16, '2021-10-21 09:19:45', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(536, 16, '2021-10-21 09:20:05', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(537, 15, '2021-10-21 09:20:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(538, 15, '2021-10-21 09:20:39', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(539, 1, '2021-10-21 09:20:45', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(540, 1, '2021-10-21 14:16:57', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.43.61'),
(541, 1, '2021-10-21 14:35:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '127.0.0.1'),
(542, 15, '2021-10-21 14:36:09', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(543, 15, '2021-10-21 14:37:59', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(544, 16, '2021-10-21 14:38:05', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(545, 16, '2021-10-21 14:38:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(546, 1, '2021-10-21 14:38:47', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(547, 1, '2021-10-21 14:40:02', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(548, 16, '2021-10-21 14:40:10', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(549, 16, '2021-10-21 14:40:50', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(550, 15, '2021-10-21 14:41:05', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(551, 15, '2021-10-21 14:42:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(552, 1, '2021-10-21 14:42:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(553, 15, '2021-10-22 10:17:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(554, 15, '2021-10-22 10:17:44', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(555, 16, '2021-10-22 10:17:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(556, 16, '2021-10-22 10:18:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(557, 1, '2021-10-22 10:18:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(558, 1, '2021-10-22 10:20:05', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(559, 16, '2021-10-22 10:20:10', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(560, 16, '2021-10-22 10:20:44', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(561, 15, '2021-10-22 10:20:49', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(562, 15, '2021-10-22 10:21:02', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(563, 1, '2021-10-22 10:21:24', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(564, 1, '2021-10-22 13:40:44', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.150.12'),
(565, 1, '2021-10-24 18:12:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.107'),
(566, 1, '2021-10-26 13:33:04', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(567, 1, '2021-10-28 08:34:07', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(568, 1, '2021-10-28 15:39:51', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(569, 1, '2021-10-29 09:22:24', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(570, 1, '2021-10-29 13:27:08', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(571, 1, '2021-11-01 08:32:18', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(572, 1, '2021-11-01 09:04:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(573, 16, '2021-11-01 09:04:47', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(574, 16, '2021-11-01 10:47:54', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(575, 1, '2021-11-01 10:48:02', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(576, 1, '2021-11-01 10:54:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(577, 16, '2021-11-01 10:54:33', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(578, 16, '2021-11-01 10:55:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(579, 1, '2021-11-01 10:55:52', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(580, 1, '2021-11-01 14:05:40', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(581, 16, '2021-11-01 14:07:21', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(582, 16, '2021-11-01 14:19:03', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(583, 1, '2021-11-01 14:19:12', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(584, NULL, '2021-11-01 16:31:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(585, 15, '2021-11-01 16:31:24', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(586, 15, '2021-11-01 16:32:03', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(587, 1, '2021-11-01 16:32:08', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(588, 1, '2021-11-03 08:24:25', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(589, 1, '2021-11-03 13:24:42', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(590, 1, '2021-11-03 14:34:46', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(591, 16, '2021-11-03 14:34:53', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(592, 16, '2021-11-03 16:05:21', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(593, 1, '2021-11-03 16:05:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(594, 1, '2021-11-04 08:44:06', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(595, 1, '2021-11-04 16:23:53', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(596, 16, '2021-11-04 16:23:59', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(597, 16, '2021-11-04 16:24:21', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(598, 1, '2021-11-04 16:24:26', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(599, 1, '2021-11-04 16:24:53', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(600, 1, '2021-11-04 16:24:57', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(601, 1, '2021-11-04 16:25:06', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(602, 16, '2021-11-04 16:25:10', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(603, 16, '2021-11-04 16:25:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(604, 1, '2021-11-04 16:25:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(605, 1, '2021-11-05 08:37:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(606, 1, '2021-11-05 10:45:00', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(607, 21, '2021-11-05 10:45:08', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(608, 21, '2021-11-05 11:06:50', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(609, 1, '2021-11-05 11:06:55', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(610, 1, '2021-11-05 11:24:37', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(611, 21, '2021-11-05 11:24:46', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(612, 21, '2021-11-05 11:25:05', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(613, 1, '2021-11-05 11:25:09', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(614, 1, '2021-11-05 13:44:35', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(615, 1, '2021-11-05 13:46:49', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(616, 21, '2021-11-05 13:46:54', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(617, 21, '2021-11-05 13:47:27', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(618, 1, '2021-11-05 13:47:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(619, 1, '2021-11-08 08:38:54', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(620, 1, '2021-11-16 14:15:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(621, 1, '2021-11-16 14:30:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(622, 1, '2021-11-16 14:37:23', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(623, 1, '2021-11-18 15:34:09', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(624, 1, '2021-11-18 15:47:29', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(625, 1, '2021-11-18 15:49:06', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(626, 1, '2021-11-18 15:49:58', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(627, 21, '2021-11-18 15:50:02', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(628, 21, '2021-11-18 15:51:11', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(629, 1, '2021-11-18 15:51:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(630, 1, '2021-11-19 08:58:37', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(631, 1, '2021-11-24 08:50:01', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(632, 1, '2021-11-25 09:31:01', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(633, 1, '2021-11-25 10:12:04', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(634, 32, '2021-11-25 10:12:19', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(635, 32, '2021-11-25 10:12:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(636, 1, '2021-11-25 10:12:35', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(637, 1, '2021-11-25 10:14:15', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(638, 32, '2021-11-25 10:14:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(639, 32, '2021-11-25 10:55:40', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(640, 1, '2021-11-25 10:55:47', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(641, NULL, '2021-11-25 13:52:10', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(642, 16, '2021-11-25 13:52:25', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(643, 16, '2021-11-25 13:53:21', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(644, 1, '2021-11-25 13:53:27', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(645, 1, '2021-11-26 09:36:39', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(646, 1, '2021-11-26 13:23:25', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(647, 1, '2021-11-29 08:27:13', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(648, 1, '2021-11-29 08:53:36', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(649, 16, '2021-11-29 08:53:41', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(650, 16, '2021-11-29 08:59:19', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(651, 1, '2021-11-29 08:59:25', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(652, 1, '2021-11-29 09:07:14', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(653, 1, '2021-12-02 17:14:31', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(654, 1, '2021-12-03 08:41:22', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(655, 1, '2021-12-03 09:23:16', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(656, 30, '2021-12-03 09:23:20', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(657, 30, '2021-12-03 09:23:36', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(658, 1, '2021-12-03 09:23:40', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(659, 1, '2021-12-03 10:05:23', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(660, 33, '2021-12-03 10:05:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(661, 33, '2021-12-03 10:05:42', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(662, 1, '2021-12-03 10:05:47', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(663, 1, '2021-12-03 10:07:03', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(664, 33, '2021-12-03 10:07:08', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(665, 33, '2021-12-03 10:22:29', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(666, 1, '2021-12-03 10:22:39', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(667, 1, '2021-12-03 13:35:58', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(668, 1, '2021-12-07 09:33:23', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(669, 1, '2021-12-07 13:26:15', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(670, 1, '2021-12-09 09:51:54', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(671, 1, '2021-12-10 09:55:04', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(672, 1, '2021-12-10 11:07:28', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(673, 21, '2021-12-10 11:07:34', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(674, 21, '2021-12-10 11:08:57', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(675, 1, '2021-12-10 11:09:03', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(676, 1, '2021-12-10 14:06:00', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.31.12'),
(677, 1, '2021-12-13 08:40:27', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '17.17.17.19'),
(678, 1, '2021-12-13 21:21:14', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(679, 1, '2021-12-14 19:19:32', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(680, 1, '2021-12-14 22:51:11', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(681, 1, '2021-12-14 23:15:47', 'Logout', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103'),
(682, 1, '2021-12-14 23:22:21', 'Login', 'Windows NT DESKTOP-FGQ3GF6 10.0 build 19042 (Windows 10) AMD64', '192.168.0.103');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merek`
--

CREATE TABLE `tbl_merek` (
  `id_merek` int(11) NOT NULL,
  `id_sgbarang` int(11) DEFAULT NULL,
  `nama_merek` varchar(255) DEFAULT NULL,
  `merek_created_date` timestamp NULL DEFAULT current_timestamp(),
  `merek_created_by` varchar(255) DEFAULT NULL,
  `merek_updated_date` datetime DEFAULT NULL,
  `merek_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_merek`
--

INSERT INTO `tbl_merek` (`id_merek`, `id_sgbarang`, `nama_merek`, `merek_created_date`, `merek_created_by`, `merek_updated_date`, `merek_updated_by`) VALUES
(1, 1, 'NCR', '2021-02-18 19:56:38', 'superadmin', NULL, NULL),
(2, 1, 'Hyousung', '2021-02-18 19:56:48', 'superadmin', NULL, NULL),
(3, 1, 'Wincore', '2021-02-18 19:56:55', 'superadmin', NULL, NULL),
(4, 2, 'Oki', '2021-02-18 19:57:19', 'superadmin', NULL, NULL),
(5, 2, 'Hyousung', '2021-02-18 19:57:33', 'superadmin', NULL, NULL),
(6, 3, 'BMW', '2021-02-18 19:57:51', 'superadmin', NULL, NULL),
(7, 4, 'Honda', '2021-02-18 19:58:01', 'superadmin', NULL, NULL),
(8, 4, 'Yamaha', '2021-02-18 19:58:09', 'superadmin', NULL, NULL),
(9, 1, 'Diebold', '2021-02-23 21:31:55', 'superadmin', NULL, NULL),
(10, 6, 'Hyousung', '2021-02-23 21:32:34', 'superadmin', NULL, NULL),
(11, 7, 'Hyousung', '2021-02-23 21:32:49', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pbj`
--

CREATE TABLE `tbl_pbj` (
  `id` int(11) NOT NULL,
  `no_pbj` varchar(50) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `terms` text NOT NULL,
  `spv_gudang_approv` int(11) NOT NULL,
  `spv_gudang_approv_date` date DEFAULT NULL,
  `wakadiv_approv` int(11) NOT NULL DEFAULT 0,
  `wakadiv_approv_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pbj`
--

INSERT INTO `tbl_pbj` (`id`, `no_pbj`, `tanggal_permintaan`, `keterangan`, `terms`, `spv_gudang_approv`, `spv_gudang_approv_date`, `wakadiv_approv`, `wakadiv_approv_date`) VALUES
(1, 'PBJ0001/XI/2021', '2021-11-26', 'Testing PBJ Update', 'Ini Contoh untuk\r\nTerms\r\ndan\r\nCondition', 1, '2021-12-03', 1, '2021-11-29'),
(3, 'PBJ0002/XII/2021', '2021-12-02', 'Contoh PBJ', 'Contoh T&C\r\n1\r\n2\r\n3', 1, '2021-12-03', 0, '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pbj_det`
--

CREATE TABLE `tbl_pbj_det` (
  `id` int(11) NOT NULL,
  `id_pbj` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pbj_det`
--

INSERT INTO `tbl_pbj_det` (`id`, `id_pbj`, `no_urut`, `qty`, `keterangan`) VALUES
(3, 1, 151, 5, 'Kaset Bray'),
(4, 1, 40, 5, 'Kart Rider'),
(7, 3, 27, 5, 'Ini contoh barangnya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nomor_pembelian` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `tempo_pembayaran` varchar(255) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `nilai_pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `approvel` int(11) NOT NULL COMMENT '0 = belum di approvel 1 = sudah di approvel',
  `pembelian_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembelian_created_by` varchar(255) NOT NULL,
  `pembelian_updated_date` datetime NOT NULL,
  `pembelian_updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_pembelian`, `id_uker`, `id_vendor`, `nomor_pembelian`, `tanggal_pembelian`, `jenis_pembayaran`, `tempo_pembayaran`, `sub_total`, `nilai_pajak`, `total`, `approvel`, `pembelian_created_date`, `pembelian_created_by`, `pembelian_updated_date`, `pembelian_updated_by`) VALUES
(38, 1, 4, 'PMBL0006/VI/2021', '2021-06-29', 'Full', '7', 400000, 40000, 440000, 0, '2021-06-29 09:30:05', '1', '2021-06-29 16:30:05', '1'),
(39, 6, 5, 'PMBL0007/VI/2021', '2021-06-29', 'Full', '4', 1000000, 100000, 1100000, 0, '2021-06-29 07:32:57', '1', '0000-00-00 00:00:00', ''),
(40, 8, 6, 'PMBL0008/VI/2021', '2021-06-29', 'Full', '25', 700000, 0, 700000, 0, '2021-06-29 07:33:30', '1', '0000-00-00 00:00:00', ''),
(41, 4, 7, 'PMBL0009/VI/2021', '2021-06-30', 'Full', '5', 200000, 0, 200000, 0, '2021-06-29 09:30:35', '1', '0000-00-00 00:00:00', ''),
(42, 4, 4, 'PMBL0010/VII/2021', '2021-07-01', 'Full', '3', 104000, 10000, 114000, 0, '2021-07-01 02:38:12', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian_det`
--

CREATE TABLE `tbl_pembelian_det` (
  `id_pembelian_det` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_det_currency` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` decimal(10,0) NOT NULL,
  `total_ppn` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `pembelian_det_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembelian_det_created_by` varchar(255) NOT NULL,
  `pembelian_det_updated_date` datetime NOT NULL,
  `pembelian_det_updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pembelian_det`
--

INSERT INTO `tbl_pembelian_det` (`id_pembelian_det`, `id_pembelian`, `no_urut`, `id_det_currency`, `qty`, `harga_satuan`, `total_ppn`, `total`, `keterangan`, `pembelian_det_created_date`, `pembelian_det_created_by`, `pembelian_det_updated_date`, `pembelian_det_updated_by`) VALUES
(21, 21, 26, 1, 1, '2000000', '200000', '2', '-', '2021-06-23 10:34:35', '', '2021-06-23 00:00:00', '1'),
(22, 21, 171, 1, 1, '3000000', '4500000000', '2', '-', '2021-06-23 10:34:35', '', '2021-06-23 00:00:00', '1'),
(23, 23, 24, 1, 2, '1000000', '0', '2000000', 'ok', '2021-06-23 11:10:36', 'superadmin', '0000-00-00 00:00:00', ''),
(29, 30, 172, 1, 100, '15000', '150000', '1', 'Barang Mahal Ini', '2021-06-24 04:06:09', '', '2021-06-24 00:00:00', '1'),
(30, 30, 172, 1, 100, '15000', '150000', '1', 'Barang Mahal Ini', '2021-06-24 04:06:25', '', '2021-06-24 00:00:00', '1'),
(36, 31, 102, 1, 10, '40000', '600000000', '1', 'ok', '2021-06-24 04:15:41', '', '2021-06-24 00:00:00', '1'),
(37, 32, 107, 1, 2, '50000', '0', '100000', 'Detail Item-1', '2021-06-24 04:59:27', '1', '0000-00-00 00:00:00', ''),
(38, 33, 92, 1, 10, '100000', '100000', '1000000', 'Detail Item-2', '2021-06-24 05:00:34', '1', '0000-00-00 00:00:00', ''),
(43, 34, 14, 1, 5, '200000', '100000', '1', 'Detail Item-3', '2021-06-24 05:06:52', '', '2021-06-24 00:00:00', '1'),
(44, 34, 97, 1, 6, '150000', '90000', '3', 'Detail Item-4', '2021-06-24 05:06:52', '', '2021-06-24 00:00:00', '1'),
(45, 34, 156, 1, 3, '400000', '120000', '3', 'Detail Item-5', '2021-06-24 05:06:52', '', '2021-06-24 00:00:00', '1'),
(46, 34, 20, 1, 9, '1000000', '900000', '1', 'Detail Item-6', '2021-06-24 05:06:52', '', '2021-06-24 00:00:00', '1'),
(47, 35, 95, 1, 3, '100000', '30000', '300000', 'ok', '2021-06-25 09:34:25', '1', '0000-00-00 00:00:00', ''),
(48, 36, 33, 1, 2, '100000', '20000', '200000', 'test', '2021-06-29 07:02:15', '1', '0000-00-00 00:00:00', ''),
(49, 37, 28, 1, 2, '200000', '0', '400000', 'ok', '2021-06-29 07:03:42', '1', '0000-00-00 00:00:00', ''),
(51, 39, 22, 1, 2, '500000', '100000', '1000000', '-', '2021-06-29 07:32:57', '1', '0000-00-00 00:00:00', ''),
(52, 40, 103, 1, 7, '100000', '0', '700000', 'ok', '2021-06-29 07:33:30', '1', '0000-00-00 00:00:00', ''),
(53, 38, 58, 1, 2, '200000', '40000', '4', '-', '2021-06-29 09:30:05', '', '2021-06-29 00:00:00', '1'),
(54, 41, 112, 1, 2, '100000', '0', '200000', 'test', '2021-06-29 09:30:35', '1', '0000-00-00 00:00:00', ''),
(55, 42, 32, 1, 1, '50000', '5000', '50000', 'Kabel Data', '2021-07-01 02:38:12', '1', '0000-00-00 00:00:00', ''),
(56, 42, 34, 1, 1, '50000', '5000', '50000', 'Kabel Konektor', '2021-07-01 02:38:12', '1', '0000-00-00 00:00:00', ''),
(57, 42, 26, 1, 2, '2000', '0', '4000', 'Kaset', '2021-07-01 02:38:12', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembukuan`
--

CREATE TABLE `tbl_pembukuan` (
  `id_pembukuan` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL COMMENT 'foreign key',
  `id_stock` int(11) NOT NULL COMMENT 'foreign key',
  `id_po` int(11) NOT NULL COMMENT 'foreign key',
  `id_pemenuhan` int(11) NOT NULL COMMENT 'foreign key',
  `id_pengiriman` int(11) NOT NULL,
  `id_ekpedisi` int(11) NOT NULL,
  `status_pembukuan` int(11) NOT NULL,
  `tanggal_pembukuan` date NOT NULL,
  `pembukuan_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembukuan_created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembukuan_det`
--

CREATE TABLE `tbl_pembukuan_det` (
  `id_pembukuan_det` int(11) NOT NULL,
  `id_pembukuan` int(11) NOT NULL,
  `id_gbarang` int(11) NOT NULL,
  `id_sgbarang` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_tipe_barang` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `pembukuan_det_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pembukuan_det_created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemenuhan`
--

CREATE TABLE `tbl_pemenuhan` (
  `id_pemenuhan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `tanggal_pemenuhan` date NOT NULL,
  `status_pemenuhan` int(11) NOT NULL COMMENT 'Flag 0 = Belum Dipenuhi 1 = Sudah Dipenuhi',
  `status_balik` int(11) NOT NULL COMMENT '0 = belum dikembalikan, 1 = sudah dikembalikan',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemenuhan_barcab`
--

CREATE TABLE `tbl_pemenuhan_barcab` (
  `id_pemenuhan_barcab` int(11) NOT NULL,
  `id_permintaan` int(11) DEFAULT NULL,
  `id_ekpedisi` int(11) NOT NULL,
  `id_delivery_type` int(11) NOT NULL,
  `id_layanan_ekspedisi` int(11) DEFAULT NULL,
  `id_uker` int(11) DEFAULT NULL,
  `tanggal_pemenuhan` date NOT NULL,
  `jumlah_pemenuhan` int(11) NOT NULL,
  `pemenuhan` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status_pemenuhan` int(11) NOT NULL,
  `jumlah_koil` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemenuhan_barcab_det`
--

CREATE TABLE `tbl_pemenuhan_barcab_det` (
  `id_pemenuhan_barcab_det` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_sn` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `status_pemenuhan` int(11) NOT NULL,
  `permintaan_det_created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemenuhan_det`
--

CREATE TABLE `tbl_pemenuhan_det` (
  `id_pemenuhan_det` int(11) NOT NULL,
  `id_pemenuhan` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `totalppn` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_pembukuan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = belum dibukukan, 1 = sudah dibukukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penbarang`
--

CREATE TABLE `tbl_penbarang` (
  `id_penBarang` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_sn` varchar(30) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kondisi_barang` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Rusak | 1 = Bagus',
  `keterangan` text NOT NULL,
  `status_penerimaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Tidak Terima | 1 = Terima',
  `id_ekspedisi` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengbarang`
--

CREATE TABLE `tbl_pengbarang` (
  `id_pengBarang` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_sn` varchar(30) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kondisi_barang` int(1) NOT NULL DEFAULT 0 COMMENT '0 = Rusak, 1 = bagus',
  `keterangan` text NOT NULL,
  `status_pemenuhan` int(1) NOT NULL DEFAULT 0 COMMENT '0 = Belum dipenuhi, 1 = Sudah dipenuhi',
  `status_penerimaan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Tidak diterima, 1 = Diterima',
  `id_ekspedisi` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL,
  `id_delivery_type` int(11) NOT NULL,
  `jumlah_koli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengelolaan_mesin`
--

CREATE TABLE `tbl_pengelolaan_mesin` (
  `id_det_project` int(11) NOT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_uker` int(11) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `db` varchar(255) DEFAULT NULL,
  `merek` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `pengmes_created_date` timestamp NULL DEFAULT NULL,
  `pengmes_created_by` varchar(255) DEFAULT NULL,
  `pengmes_updated_date` datetime DEFAULT NULL,
  `pengmes_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_pengelolaan_mesin`
--

INSERT INTO `tbl_pengelolaan_mesin` (`id_det_project`, `id_project`, `id_uker`, `lokasi`, `db`, `merek`, `tipe`, `pengmes_created_date`, `pengmes_created_by`, `pengmes_updated_date`, `pengmes_updated_by`) VALUES
(1, 10, 1, 'Bekasi', 'project inventory', 'mesin 1', 'tipe 11', '0000-00-00 00:00:00', NULL, '2021-05-10 08:59:24', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengirimankekp`
--

CREATE TABLE `tbl_pengirimankekp` (
  `id_pengirimankekp` int(11) NOT NULL,
  `no_permintaan` varchar(30) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_penerimaan` date DEFAULT NULL,
  `jumlah_permintaan` int(11) NOT NULL,
  `jumlah_pemenuhan` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `estimasi` int(11) NOT NULL DEFAULT 0,
  `id_delivery_type` int(11) NOT NULL,
  `id_ekpedisi` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL,
  `j_koli` int(11) NOT NULL,
  `no_resi` varchar(30) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `berat_barang` int(11) NOT NULL,
  `pengiriman_created_by` int(11) NOT NULL,
  `status_pengiriman` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengirimankekp`
--

INSERT INTO `tbl_pengirimankekp` (`id_pengirimankekp`, `no_permintaan`, `tanggal_pengiriman`, `tanggal_penerimaan`, `jumlah_permintaan`, `jumlah_pemenuhan`, `sisa`, `estimasi`, `id_delivery_type`, `id_ekpedisi`, `id_uker`, `j_koli`, `no_resi`, `nama_pengirim`, `berat_barang`, `pengiriman_created_by`, `status_pengiriman`) VALUES
(1, 'PKKP0001/IX/2021', '2021-09-10', '2021-09-10', 1, 1, 0, 1, 4, 11, 1, 1, 'RESdasd', '12312', 1, 1, 1),
(2, 'PKKP0002/IX/2021', '2021-09-10', NULL, 1, 1, 0, 1, 3, 3, 1, 1, 'RESIBALIK-02', 'Alif', 1, 1, 0),
(3, 'PKKP0003/IX/2021', '2021-09-10', NULL, 1, 1, 0, 1, 3, 3, 1, 1, 'RESBAL-0666', 'ALIF', 1, 1, 0),
(4, 'PKKP0004/IX/2021', '2021-09-10', '2021-09-10', 1, 1, 0, 1, 3, 2, 1, 1, 'BESOKSAMPAI-01', 'Aleef', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengirimankekp_det`
--

CREATE TABLE `tbl_pengirimankekp_det` (
  `id_pengkekp_det` int(11) NOT NULL,
  `id_pengirimankekp` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_sn` varchar(30) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kondisi_barang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengirimankekp_det`
--

INSERT INTO `tbl_pengirimankekp_det` (`id_pengkekp_det`, `id_pengirimankekp`, `no_urut`, `no_sn`, `harga_barang`, `kondisi_barang`) VALUES
(1, 1, 25, 'BMU-01', 5000, 1),
(2, 2, 19, 'MONI-SIMU01', 10000, 0),
(3, 3, 24, 'BCC-CEK01', 1000, 0),
(4, 4, 40, 'CD-SIMU-01', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman_barang`
--

CREATE TABLE `tbl_pengiriman_barang` (
  `id_pengiriman` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL,
  `id_ekpedisi` int(11) NOT NULL,
  `id_layanan_ekspedisi` int(11) NOT NULL,
  `no_pengiriman` varchar(100) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `no_resi` varchar(100) NOT NULL,
  `estimasi` int(11) NOT NULL DEFAULT 1,
  `keterangan` text NOT NULL,
  `jumlah_koli` int(11) NOT NULL,
  `berat_barang` varchar(100) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `status_pengiriman` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum diterima, 1 = Sudah diterima',
  `status_cek` int(11) NOT NULL COMMENT '0 = Belum Cek | 1 = Sudah Cek',
  `pengiriman_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengiriman_created_by` varchar(255) NOT NULL,
  `pengiriman_update_date` datetime NOT NULL,
  `pengiriman_update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengiriman_barang`
--

INSERT INTO `tbl_pengiriman_barang` (`id_pengiriman`, `id_uker`, `id_ekpedisi`, `id_layanan_ekspedisi`, `no_pengiriman`, `tanggal_pengiriman`, `tanggal_penerimaan`, `no_resi`, `estimasi`, `keterangan`, `jumlah_koli`, `berat_barang`, `nama_pengirim`, `total_harga`, `status_pengiriman`, `status_cek`, `pengiriman_created_date`, `pengiriman_created_by`, `pengiriman_update_date`, `pengiriman_update_by`) VALUES
(1, 2, 3, 7, 'PGRM0001/XI/2021', '2021-11-24', '0000-00-00', '', 1, 'te boga duit', 2, '', '', 15000, 0, 0, '2021-11-24 08:13:18', '', '0000-00-00 00:00:00', ''),
(2, 2, 3, 7, 'PGRM0002/XI/2021', '2021-11-24', '0000-00-00', '', 1, 'te boga duit', 2, '', '', 15000, 0, 0, '2021-11-24 08:15:33', '', '0000-00-00 00:00:00', ''),
(3, 2, 3, 7, 'PGRM0003/XI/2021', '2021-11-24', '0000-00-00', '', 1, 'te boga duit', 2, '', '', 15000, 0, 0, '2021-11-24 08:17:35', '', '0000-00-00 00:00:00', ''),
(4, 2, 2, 7, 'PGRM0004/XI/2021', '2021-11-24', '0000-00-00', '', 1, 'Note', 1, '', '', 15000, 0, 0, '2021-11-24 08:19:14', '', '0000-00-00 00:00:00', ''),
(5, 1, 3, 7, 'PGRM0005/XII/2021', '2021-12-07', '0000-00-00', 'asdasd', 1, 'tes', 1, '1', 'adasddasd', 5000, 0, 0, '2021-12-07 06:30:59', '1', '0000-00-00 00:00:00', ''),
(6, 6, 3, 7, 'PGRM0006/XII/2021', '2021-12-13', '2021-12-13', 'ReNko-Usami', 1, 'Barang request jatipadang', 2, '6', 'Mariabel', 20000, 1, 0, '2021-12-13 14:52:12', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman_barang_det`
--

CREATE TABLE `tbl_pengiriman_barang_det` (
  `id_pengiriman_det` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `no_sn` varchar(30) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kondisi_barang` int(11) NOT NULL DEFAULT 1,
  `koli_ke` int(11) NOT NULL,
  `berat_koli` int(11) NOT NULL COMMENT '(Kg)',
  `keterangan` text NOT NULL,
  `status_pemenuhan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum Dipenuhi, 1 = Sudah Dipenuhi',
  `pengiriman_det_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pengiriman_det_created_by` varchar(255) NOT NULL,
  `pengiriman_det_update_date` datetime NOT NULL,
  `pengiriman_det_update_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengiriman_barang_det`
--

INSERT INTO `tbl_pengiriman_barang_det` (`id_pengiriman_det`, `id_pengiriman`, `no_urut`, `no_sn`, `harga_barang`, `kondisi_barang`, `koli_ke`, `berat_koli`, `keterangan`, `status_pemenuhan`, `pengiriman_det_created_date`, `pengiriman_det_created_by`, `pengiriman_det_update_date`, `pengiriman_det_update_by`) VALUES
(3, 2, 19, 'BC-01', 5000, 0, 0, 0, '', 1, '2021-11-24 08:15:33', '', '0000-00-00 00:00:00', ''),
(4, 2, 19, 'SIMULASI-01', 10000, 0, 0, 0, '', 1, '2021-11-24 08:15:33', '', '0000-00-00 00:00:00', ''),
(10, 5, 16, '123213', 10000, 1, 1, 1, 'AAAAA', 0, '2021-12-07 06:30:59', '1', '0000-00-00 00:00:00', ''),
(11, 6, 143, 'SN6001', 50000, 1, 1, 2, 'Belt6001', 1, '2021-12-13 14:52:13', '1', '0000-00-00 00:00:00', ''),
(12, 6, 143, 'SN6002', 50000, 1, 2, 4, 'Belt6002', 1, '2021-12-13 14:53:41', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perbaikan`
--

CREATE TABLE `tbl_perbaikan` (
  `id_perbaikanbarang` int(11) NOT NULL,
  `id_sgbarang` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `catatan_perbaikan` text NOT NULL,
  `stat_perbaikan` varchar(30) NOT NULL,
  `tanggal_perbaikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_perbaikan`
--

INSERT INTO `tbl_perbaikan` (`id_perbaikanbarang`, `id_sgbarang`, `no_urut`, `catatan_perbaikan`, `stat_perbaikan`, `tanggal_perbaikan`) VALUES
(1, 1, 142, 'Barang pertama belum QC breee.', '0', '2021-07-07'),
(2, 4, 155, 'Barang Kedua sudah QC brow.', '1', '2021-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perbaikankcsp`
--

CREATE TABLE `tbl_perbaikankcsp` (
  `id_perbaikankcsp` int(11) NOT NULL,
  `id_pengkekp_det` int(11) NOT NULL,
  `catatan_perbaikan` text NOT NULL,
  `status_perbaikan` int(11) NOT NULL DEFAULT 0 COMMENT '0 = Belum diQC, 1 = Bisa diperbaiki, 2 = Tidak bisa',
  `tanggal_perbaikan` date DEFAULT NULL,
  `status_ph` int(11) NOT NULL DEFAULT 0,
  `status_pembukuan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_perbaikankcsp`
--

INSERT INTO `tbl_perbaikankcsp` (`id_perbaikankcsp`, `id_pengkekp_det`, `catatan_perbaikan`, `status_perbaikan`, `tanggal_perbaikan`, `status_ph`, `status_pembukuan`) VALUES
(1, 1, 'Oke', 1, '2021-09-10', 0, 0),
(2, 2, '-', 0, NULL, 0, 0),
(3, 3, 'gosong bos', 2, '2021-09-13', 1, 1),
(4, 4, 'Good', 1, '2021-09-10', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan_barang`
--

CREATE TABLE `tbl_permintaan_barang` (
  `id_permintaan` int(11) NOT NULL,
  `id_uker` int(11) NOT NULL,
  `id_stock` int(11) DEFAULT NULL,
  `dari_uker` int(11) DEFAULT NULL,
  `id_delivery_type` int(11) NOT NULL,
  `id_ekpedisi` int(11) NOT NULL,
  `id_layanan_ekspedisi` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `no_permintaan` varchar(255) NOT NULL,
  `jumlah_koil` int(11) NOT NULL,
  `alasan_permintaan` text NOT NULL,
  `catatan_permintaan` text NOT NULL,
  `status_permintaan` int(11) DEFAULT NULL COMMENT '0 = belum terpenuhi, 1 = sudah terpenuhi',
  `harga_total` int(11) NOT NULL,
  `tanggal_pemenuhan` date NOT NULL,
  `tempo_barang` int(11) NOT NULL,
  `sla` int(11) DEFAULT NULL,
  `pinca_approv` int(11) DEFAULT NULL,
  `tgl_approve_pinca` date DEFAULT NULL,
  `permintaan_barang_created_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permintaan_barang_created_by` varchar(255) DEFAULT NULL,
  `permintaan_barang_updated_date` datetime DEFAULT NULL,
  `permintaan_barang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permintaan_barang`
--

INSERT INTO `tbl_permintaan_barang` (`id_permintaan`, `id_uker`, `id_stock`, `dari_uker`, `id_delivery_type`, `id_ekpedisi`, `id_layanan_ekspedisi`, `tgl_permintaan`, `no_permintaan`, `jumlah_koil`, `alasan_permintaan`, `catatan_permintaan`, `status_permintaan`, `harga_total`, `tanggal_pemenuhan`, `tempo_barang`, `sla`, `pinca_approv`, `tgl_approve_pinca`, `permintaan_barang_created_date`, `permintaan_barang_created_by`, `permintaan_barang_updated_date`, `permintaan_barang_updated_by`) VALUES
(4, 25, NULL, NULL, 3, 6, 7, '2021-09-06', 'PRMB0004/IX/2021', 1, 'Alasan permintaan-2', 'Catatan Permintaan-2', 1, 500000, '2021-09-14', 2, NULL, 1, '2021-09-06', '2021-09-14 06:07:02', '1', NULL, NULL),
(11, 33, NULL, NULL, 3, 2, 7, '2021-09-04', 'PRMB0005/IX/2021', 2, 'Alasan permintaan-21', 'Catatan Permintaan-21', 1, 100000, '2021-09-10', 2, NULL, 1, '2021-09-10', '2021-09-10 08:39:22', '1', NULL, NULL),
(12, 1, NULL, NULL, 0, 0, 0, '2021-09-10', 'PRMB0006/IX/2021', 0, 'Alasan permintaan-44', 'Catatan permintaan-44', 0, 0, '0000-00-00', 2, NULL, 0, NULL, '2021-09-10 08:41:43', '1', NULL, NULL),
(13, 1, NULL, NULL, 0, 0, 0, '2021-09-29', 'PRMB0007/IX/2021', 0, 'Ini contoh alasan permintaan', 'Ini contoh catatan permintaan', 0, 0, '0000-00-00', 7, NULL, 1, '2021-09-29', '2021-09-29 02:46:30', '1', '2021-09-29 09:45:39', 'superadmin'),
(14, 1, NULL, NULL, 3, 2, 7, '2021-09-29', 'PRMB0008/IX/2021', 1, 'asdasdasd', 'dasdasddd', 1, 5000, '2021-11-24', 7, NULL, 1, '2021-09-29', '2021-11-24 07:34:42', '1', NULL, NULL),
(15, 2, NULL, NULL, 3, 3, 7, '2021-11-05', 'PRMB0009/XI/2021', 2, 'Hayang madang', 'te boga duit', 1, 15000, '2021-11-24', 5, NULL, 1, '2021-11-05', '2021-11-24 08:17:35', '1', '2021-11-05 11:07:59', 'superadmin'),
(16, 2, NULL, NULL, 3, 2, 7, '2021-11-18', 'PRMB0010/XI/2021', 1, 'Urgent', 'Note', 1, 15000, '2021-11-24', 7, NULL, 1, '2021-11-18', '2021-11-24 08:19:14', '1', NULL, NULL),
(17, 1, NULL, NULL, 0, 0, 0, '2021-11-19', 'PRMB0011/XI/2021', 0, 'asdasd', 'ddd', 0, 0, '0000-00-00', 1, NULL, 0, NULL, '2021-11-19 08:46:48', '1', NULL, NULL),
(18, 1, NULL, NULL, 0, 0, 0, '2021-11-19', 'PRMB0012/XI/2021', 0, 'adasd', 'asdasdasd', 0, 0, '0000-00-00', 5, NULL, 0, NULL, '2021-11-19 08:47:23', '1', NULL, NULL),
(19, 1, NULL, NULL, 0, 0, 0, '2021-12-10', 'PRMB0013/XII/2021', 0, 'Tes Alasan Permintaan', 'Tes Catatan Permintaan', 0, 0, '0000-00-00', 1, NULL, 1, '2021-12-10', '2021-12-10 04:08:49', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan_barang_det`
--

CREATE TABLE `tbl_permintaan_barang_det` (
  `id_permintaan_det` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `no_sn` varchar(30) DEFAULT NULL,
  `no_urut` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `status_pemenuhan` int(11) NOT NULL,
  `permintaan_det_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permintaan_det_created_by` varchar(255) DEFAULT NULL,
  `permintaan_det_updated_date` datetime DEFAULT NULL,
  `permintaan_det_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permintaan_barang_det`
--

INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan_det`, `id_permintaan`, `no_sn`, `no_urut`, `qty`, `keterangan`, `harga_barang`, `kondisi_barang`, `status_pemenuhan`, `permintaan_det_created_date`, `permintaan_det_created_by`, `permintaan_det_updated_date`, `permintaan_det_updated_by`) VALUES
(36, 2, 'BC-01', 24, 0, '', 5000, '1', 1, '2021-09-10 07:37:46', NULL, NULL, NULL),
(37, 2, 'BC-02', 24, 0, '', 5000, '1', 1, '2021-09-10 07:37:46', NULL, NULL, NULL),
(38, 1, 'SN-0100001', 24, 0, '', 5000, '1', 1, '2021-09-10 08:14:16', NULL, NULL, NULL),
(39, 1, 'SN-0100002', 24, 0, '', 10000, '1', 1, '2021-09-10 08:14:16', NULL, NULL, NULL),
(40, 3, 'SN-0192', 34, 0, '', 50000, '1', 1, '2021-09-10 08:30:09', NULL, NULL, NULL),
(41, 3, 'SN-0193', 34, 0, '', 50000, '1', 1, '2021-09-10 08:30:09', NULL, NULL, NULL),
(43, 12, NULL, 25, 2, 'tes', 0, '0', 0, '2021-09-10 08:41:44', 'superadmin', NULL, NULL),
(44, 12, NULL, 31, 1, 'ok', 0, '0', 0, '2021-09-10 08:41:44', 'superadmin', NULL, NULL),
(51, 11, 'SN-0192', 30, 0, '', 50000, 'Bagus', 1, '2021-09-10 09:23:10', NULL, NULL, NULL),
(52, 11, 'SN-0193', 30, 0, '', 50000, 'Bagus', 1, '2021-09-10 09:23:10', NULL, NULL, NULL),
(62, 4, 'SN-0191', 29, 0, '', 150000, 'Bagus', 1, '2021-09-14 06:07:02', NULL, NULL, NULL),
(63, 4, 'SN-0192', 29, 0, '', 200000, 'Bagus', 1, '2021-09-14 06:07:02', NULL, NULL, NULL),
(64, 4, 'SN-0100001', 102, 0, '', 150000, 'Bagus', 1, '2021-09-14 06:07:02', NULL, NULL, NULL),
(66, 13, NULL, 24, 1, 'Ini contoh keterangannya.', 0, '', 0, '2021-09-29 02:45:40', 'superadmin', NULL, NULL),
(86, 17, NULL, 144, 1, 'tes', 0, '', 0, '2021-11-19 08:46:49', 'superadmin', NULL, NULL),
(87, 17, NULL, 24, 1, 'tes', 0, '', 0, '2021-11-19 08:46:49', 'superadmin', NULL, NULL),
(88, 18, NULL, 159, 1, '2222', 0, '', 0, '2021-11-19 08:47:23', 'superadmin', NULL, NULL),
(89, 18, NULL, 40, 1, '3333', 0, '', 0, '2021-11-19 08:47:23', 'superadmin', NULL, NULL),
(108, 14, 'BC-01', 25, 0, '', 5000, 'Bagus', 0, '2021-11-24 07:34:42', NULL, NULL, NULL),
(124, 16, 'BC-01', 25, 0, '', 5000, 'Bagus', 1, '2021-11-24 08:19:14', NULL, NULL, NULL),
(125, 16, 'BC-01', 14, 0, '', 5000, 'Bagus', 1, '2021-11-24 08:19:14', NULL, NULL, NULL),
(126, 16, 'BC-01', 14, 0, '', 5000, 'Bagus', 1, '2021-11-24 08:19:14', NULL, NULL, NULL),
(127, 19, NULL, 49, 5, 'Keterangan EPP', 0, '', 0, '2021-12-10 04:06:31', 'superadmin', NULL, NULL),
(128, 19, NULL, 152, 2, 'Keterangan Win 7', 0, '', 0, '2021-12-10 04:06:31', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_pem`
--

CREATE TABLE `tbl_permohonan_pem` (
  `id_permohonan_pem` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `no_permohonan_pem` varchar(100) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `tempo_pembayaran` varchar(100) NOT NULL,
  `pinca_approvel` int(1) NOT NULL COMMENT '0 = Not-Approv | 1 = Approv',
  `permohonan_pem_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permohonan_pem_created_by` varchar(100) NOT NULL,
  `permohonan_pem_updated_date` datetime NOT NULL,
  `permohonan_pem_updated_by` varchar(100) NOT NULL,
  `no_voucher` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` varchar(255) DEFAULT NULL,
  `file_voucher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permohonan_pem`
--

INSERT INTO `tbl_permohonan_pem` (`id_permohonan_pem`, `id_invoice`, `no_permohonan_pem`, `jenis_pembayaran`, `tempo_pembayaran`, `pinca_approvel`, `permohonan_pem_created_date`, `permohonan_pem_created_by`, `permohonan_pem_updated_date`, `permohonan_pem_updated_by`, `no_voucher`, `tanggal_transaksi`, `file_voucher`) VALUES
(1, 1, 'PPPB0001/IX/2021', 'Full', '5', 1, '2021-09-05 09:26:25', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(2, 2, 'PPPB0002/IX/2021', 'Full', '5', 1, '2021-09-05 11:13:24', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(3, 2, 'PPPB0003/IX/2021', 'Full', '5', 1, '2021-09-07 07:09:22', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(4, 1, 'PPPB0004/IX/2021', 'Full', '5', 1, '2021-09-07 07:16:16', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(5, 3, 'PPPB0005/IX/2021', 'Full', '2', 1, '2021-09-07 07:26:27', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(6, 2, 'PPPB0006/IX/2021', 'Full', '5', 1, '2021-09-07 07:29:33', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(7, 1, 'PPPB0007/IX/2021', 'Full', '5', 1, '2021-09-07 07:29:28', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(8, 1, 'PPPB0008/IX/2021', 'Full', '5', 1, '2021-09-07 07:33:06', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(9, 4, 'PPPB0009/IX/2021', 'Full', '2', 1, '2021-09-07 07:39:12', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(11, 3, 'PPPB0011/IX/2021', 'Full', '2', 1, '2021-09-09 09:06:30', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(12, 6, 'PPPB0012/IX/2021', 'Full', '7', 1, '2021-09-09 09:11:54', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(13, 7, 'PPPB0013/IX/2021', 'Full', '5', 1, '2021-09-09 09:49:15', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(14, 8, 'PPPB0014/IX/2021', 'Full', '1', 1, '2021-09-09 09:55:29', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(15, 9, 'PPPB0015/IX/2021', 'Full', '1', 1, '2021-09-10 06:43:51', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(18, 16, 'PPPB0016/XI/2021', '', '', 0, '2021-11-01 06:54:56', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(19, 17, 'PPPB0017/XI/2021', '', '', 1, '2021-11-04 07:45:53', '', '0000-00-00 00:00:00', '', 'V01', '2021-11-04', ''),
(20, 3, 'PPPB0018/XI/2021', '', '', 0, '2021-11-04 07:55:31', '', '0000-00-00 00:00:00', '', NULL, NULL, NULL),
(21, 19, 'PPPB0019/XI/2021', '', '', 1, '2021-11-04 09:26:07', '', '0000-00-00 00:00:00', '', 'V02', '2021-11-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permohonan_pembayaran`
--

CREATE TABLE `tbl_permohonan_pembayaran` (
  `id_pp` int(11) NOT NULL,
  `id_po` int(11) DEFAULT NULL,
  `no_pp` text DEFAULT NULL COMMENT 'no permohonan pembayaran',
  `tgl_pengajuan` datetime DEFAULT NULL,
  `tgl_approvel` datetime DEFAULT NULL,
  `tgl_diajukan` datetime DEFAULT NULL COMMENT 'tgl diajukan ke keuangan',
  `jumlah_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL COMMENT '0 = belum, 1 = sudah',
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertek`
--

CREATE TABLE `tbl_pertek` (
  `id_pertek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL COMMENT 'User Teknisi',
  `id_project` int(11) NOT NULL,
  `id_stock` int(11) DEFAULT 0,
  `nomor_pertek` varchar(100) NOT NULL,
  `tanggal_pertek` date NOT NULL,
  `status_pertek` int(11) NOT NULL COMMENT '0 = Belum dipenuhi 1 = Sudah dipenuhi',
  `tanggal_approv_pinca` date DEFAULT NULL,
  `pinca_appovel` int(11) NOT NULL COMMENT '0 = Not Approvel 1 = Approvel',
  `tanggal_approv_leader` date DEFAULT NULL,
  `leader_approvel` int(11) DEFAULT NULL COMMENT '0 = Not Approvel 1 = Approvel',
  `keterangan` text NOT NULL,
  `tanggal_pemenuhan` date DEFAULT NULL,
  `pertek_created_date` timestamp NULL DEFAULT current_timestamp(),
  `pertek_created_by` varchar(255) DEFAULT NULL,
  `pertek_updated_date` datetime DEFAULT current_timestamp(),
  `pertek_updated_by` varchar(255) DEFAULT NULL,
  `status_pembukuan` int(11) DEFAULT 0,
  `tanggal_pembukuan` date DEFAULT NULL,
  `no_voucher` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_pertek`
--

INSERT INTO `tbl_pertek` (`id_pertek`, `id_user`, `id_project`, `id_stock`, `nomor_pertek`, `tanggal_pertek`, `status_pertek`, `tanggal_approv_pinca`, `pinca_appovel`, `tanggal_approv_leader`, `leader_approvel`, `keterangan`, `tanggal_pemenuhan`, `pertek_created_date`, `pertek_created_by`, `pertek_updated_date`, `pertek_updated_by`, `status_pembukuan`, `tanggal_pembukuan`, `no_voucher`) VALUES
(1, 19, 10, 0, 'PRMT0001/IX/2021', '2021-09-03', 1, '2021-09-03', 1, '2021-09-03', 1, 'Tesade', '2021-09-05', '2021-09-03 09:52:09', 'superadmin', '0000-00-00 00:00:00', NULL, 1, '2021-09-07', '123456'),
(2, 19, 9, 0, 'PRMT0002/IX/2021', '2021-09-10', 1, '2021-09-10', 1, '2021-09-10', 1, 'Ade butuh barang', '2021-09-10', '2021-09-10 07:59:21', 'superadmin', '0000-00-00 00:00:00', NULL, 1, '2021-09-10', 'VCSIMULASI-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pertek_det`
--

CREATE TABLE `tbl_pertek_det` (
  `id_pertek_det` int(11) NOT NULL,
  `id_pertek` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_stock` int(11) DEFAULT NULL,
  `no_sn_new` varchar(30) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT 0,
  `totalppn` int(11) DEFAULT 0,
  `pertekdet_created_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pertekdet_created_by` varchar(255) DEFAULT NULL,
  `pertekdet_updated_date` datetime DEFAULT NULL,
  `pertekdet_updated_by` varchar(255) DEFAULT NULL,
  `flag_pertukaran` int(11) DEFAULT 0,
  `flag_pembukuan` int(11) DEFAULT 0,
  `no_sn_lama` varchar(30) DEFAULT NULL,
  `kondisi_barang` int(11) DEFAULT NULL,
  `tanggal_balik` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_pertek_det`
--

INSERT INTO `tbl_pertek_det` (`id_pertek_det`, `id_pertek`, `no_urut`, `qty`, `keterangan`, `id_stock`, `no_sn_new`, `harga_satuan`, `totalppn`, `pertekdet_created_date`, `pertekdet_created_by`, `pertekdet_updated_date`, `pertekdet_updated_by`, `flag_pertukaran`, `flag_pembukuan`, `no_sn_lama`, `kondisi_barang`, `tanggal_balik`) VALUES
(7, 1, 25, 1, 'BMU2', NULL, 'BMU-01', 10000, 1000, '2021-09-07 06:44:29', NULL, NULL, NULL, 1, 1, '1', NULL, '2021-09-07'),
(8, 1, 25, 1, 'BMU2', NULL, 'BMU-02', 10000, 1000, '2021-09-07 06:44:29', NULL, NULL, NULL, 1, 1, '', NULL, '2021-09-07'),
(10, 2, 80, 1, 'Road Roller', NULL, 'SIMULASI-03', 5000, 0, '2021-09-10 08:04:13', NULL, NULL, NULL, 1, 1, '2', NULL, '2021-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po`
--

CREATE TABLE `tbl_po` (
  `id_po` int(11) NOT NULL,
  `id_uker` int(11) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `id_pembelian` int(11) NOT NULL,
  `no_po` varchar(50) DEFAULT NULL,
  `tanggal_po` date DEFAULT NULL,
  `tanggal_approv_wakadiv` date DEFAULT NULL,
  `tanggal_approv_kadiv` date DEFAULT NULL,
  `tanggal_approv_direksi` date DEFAULT NULL,
  `kontak_person_po` varchar(100) DEFAULT NULL,
  `nama_kontak_po` varchar(255) DEFAULT NULL,
  `jenis_pembayaran` varchar(100) DEFAULT NULL,
  `jtempo_pembayaran` int(11) DEFAULT NULL,
  `jtempo_pemenuhan` int(11) DEFAULT NULL,
  `catatan_po` text DEFAULT NULL,
  `term_condition` text DEFAULT NULL,
  `subtotal` decimal(11,2) DEFAULT NULL,
  `subtotal_ppn` decimal(11,2) DEFAULT NULL,
  `grand_total` decimal(11,2) DEFAULT NULL,
  `file_po` text DEFAULT NULL,
  `status_po` int(1) DEFAULT 0 COMMENT '0 = Open, 1 = Close',
  `direksi_approv` int(11) NOT NULL DEFAULT 0,
  `kadiv_approv` int(1) DEFAULT 0,
  `wakadiv_approv` int(1) DEFAULT 0,
  `sla` text DEFAULT NULL,
  `flag_pembayaran` int(1) DEFAULT NULL COMMENT '0 = tidak dibayar, 1 = setengah, 2 =  full',
  `flag_pembukuan` int(1) DEFAULT NULL COMMENT '0 = belum di buku, 1 = sudah di buku',
  `status_invoice` int(1) DEFAULT NULL COMMENT '0 = Belum bayar, 1 = Bayar sebagian, 2 = Sudah bayar',
  `po_created_date` timestamp NULL DEFAULT current_timestamp(),
  `po_created_by` varchar(255) DEFAULT NULL,
  `po_updated_date` datetime DEFAULT NULL,
  `po_updated_by` varchar(255) DEFAULT NULL,
  `sisa_bayar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_po`
--

INSERT INTO `tbl_po` (`id_po`, `id_uker`, `id_vendor`, `id_project`, `id_pembelian`, `no_po`, `tanggal_po`, `tanggal_approv_wakadiv`, `tanggal_approv_kadiv`, `tanggal_approv_direksi`, `kontak_person_po`, `nama_kontak_po`, `jenis_pembayaran`, `jtempo_pembayaran`, `jtempo_pemenuhan`, `catatan_po`, `term_condition`, `subtotal`, `subtotal_ppn`, `grand_total`, `file_po`, `status_po`, `direksi_approv`, `kadiv_approv`, `wakadiv_approv`, `sla`, `flag_pembayaran`, `flag_pembukuan`, `status_invoice`, `po_created_date`, `po_created_by`, `po_updated_date`, `po_updated_by`, `sisa_bayar`) VALUES
(1, 1, 2, 9, 8, '00001/CHM/PGD/IX/2021', '2021-09-05', '2021-09-05', '2021-09-05', NULL, '0812', 'Ujang', 'Full', 5, 7, '<p>Ini pesen BMU 2.</p>', '<p>Barangnya bagus ya.</p>', '20000.00', '2000.00', '22000.00', 'btnKembali.png', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-05 09:18:54', 'superadmin', NULL, NULL, NULL),
(2, 1, 5, 9, 6, '00002/CHM/PGD/IX/2021', '2021-09-05', '2021-09-05', '2021-09-05', NULL, '123', 'Dadan', 'Full', 5, 7, '<p>Tes</p>', '<p>Alpha</p>', '5000.00', '500.00', '5500.00', 'btnDeskripsi.png', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-05 11:08:36', 'superadmin', NULL, NULL, NULL),
(3, 1, 10, 10, 11, '00003/CHM/PGD/IX/2021', '2021-09-07', '2021-09-07', '2021-09-07', NULL, '021888812222', 'ujang botot', 'Full', 2, 2, '<p>test</p>', '<p>test</p>', '1000.00', '100.00', '1100.00', 'wallpaperbetter.jpg', 0, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-07 07:20:03', 'superadmin', NULL, NULL, NULL),
(4, 1, 7, 9, 9, '00004/CHM/PGD/IX/2021', '2021-09-07', '2021-09-07', '2021-09-07', NULL, '02188', 'ujang', 'Full', 2, 2, '<p>tes</p>', '<p>oke</p>', '165000.00', '16500.00', '181500.00', 'wallpaperbetter1.jpg', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-07 07:34:39', 'superadmin', NULL, NULL, NULL),
(5, 1, 6, 10, 10, '00005/CHM/PGD/IX/2021', '2021-09-09', '2021-09-09', '2021-09-09', NULL, '021888812222', 'ujang botot', 'Full', 1, 1, '<p>tes</p>', '<p>tes</p>', '20000.00', '500.00', '20500.00', 'Surat_Sanggahan_Bulan_Juli_Alif_Athallah_Martadiredja.docx', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-09 07:52:58', 'superadmin', NULL, NULL, NULL),
(6, 1, 7, 10, 12, '00006/CHM/PGD/IX/2021', '2021-09-09', '2021-09-09', '2021-09-09', NULL, '555', 'ddd', 'Full', 7, 7, '<p>Tes tes</p>', '<p>Teees</p>', '12000.00', '1000.00', '13000.00', '0a179d9b36a43b164a5f78a73183d9bd.jpg', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-09 09:08:18', 'superadmin', NULL, NULL, NULL),
(7, 1, 2, 13, 13, '00007/CHM/PGD/IX/2021', '2021-09-09', '2021-09-09', '2021-09-09', NULL, '666', 'ddda', 'Full', 5, 5, '<p>tes1111</p>', '<p>tes22222</p>', '1100.00', '100.00', '1200.00', '0a179d9b36a43b164a5f78a73183d9bd.jpg', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-09 09:43:58', 'superadmin', NULL, NULL, NULL),
(8, 1, 4, 9, 14, '00008/CHM/PGD/IX/2021', '2021-09-09', '2021-09-09', '2021-09-09', NULL, '123123', 'ddada', 'Full', 1, 1, '<p>asdasdweqwe</p>', '<p>zvasdw</p>', '2500.00', '200.00', '2700.00', '1b9.jpg', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-09 09:52:03', 'superadmin', NULL, NULL, NULL),
(9, 1, 9, 9, 0, '00009/CHM/PGD/IX/2021', '2021-09-10', NULL, NULL, NULL, 'adasd', 'adasdasd', 'Full', 1, 1, '<p>qweqweasd</p>', '<p>zasda</p>', '0.00', '0.00', '0.00', '9rxFKcs.jpg', 0, 0, 0, 2, NULL, NULL, NULL, NULL, '2021-09-10 06:37:20', 'superadmin', NULL, NULL, NULL),
(10, 1, 8, 9, 15, '00010/CHM/PGD/IX/2021', '2021-09-09', '2021-09-10', '2021-09-10', NULL, '0813135', 'DaiMaou', 'Full', 1, 1, '<p>Ini note PO.</p>', '<p>ini T&C.</p>', '25000.00', '2000.00', '27000.00', '1b91.jpg', 1, 0, 1, 1, NULL, 2, NULL, 2, '2021-09-10 06:39:14', 'superadmin', NULL, NULL, NULL),
(12, 1, 2, 10, 0, '00011/CHM/PGD/IX/2021', '2021-09-15', '2021-09-15', '2021-09-15', NULL, '0812356', 'Deny', 'Full', 7, 7, '<p>Ini Contoh Catatan PO, kedua.</p>', '<p>Ini Contoh T&C, Kedua.</p>', '100000.00', '0.00', '100000.00', 'default.png', 0, 0, 1, 1, NULL, NULL, NULL, 1, '2021-09-15 07:35:31', 'superadmin', NULL, NULL, NULL),
(13, 1, 4, 9, 21, '00012/CHM/PGD/X/2021', '2021-10-13', '2021-10-22', '2021-10-22', NULL, '1111', 'tesalif', 'Full', 1, 1, '<p>tessss</p>', '<p>tess</p>', '13000.00', '1100.00', '14100.00', '46148752_2120516468264517_5780422318467579904_n.jpg', 1, 0, 1, 1, NULL, 1, 1, 1, '2021-10-13 07:57:48', 'superadmin', '2021-10-22 00:00:00', 'superadmin', '0'),
(14, 1, 5, 10, 0, '00013/CHM/PGD/XI/2021', '2021-11-24', NULL, NULL, '2021-11-25', '666', 'Maou', 'Full', 2, 2, '<p>dasdsadsadas</p>', '<p>asdasdasdasd</p>', '52000000.00', '5200000.00', '57200000.00', 'Untitled-2.png', 0, 2, 0, 0, NULL, NULL, NULL, NULL, '2021-11-24 09:05:11', 'superadmin', NULL, NULL, '57200000'),
(15, 1, 6, 10, 0, '00014/CHM/PGD/XII/2021', '2021-12-03', NULL, NULL, NULL, '621', 'Bray', 'Full', 5, 5, '<p>Catatan</p><p>Po</p><p>yeuh</p><p>bray</p>', '<p>ieu</p><p>tc</p><p>lain</p><p>tlc</p>', '500500.00', '0.00', '500500.00', 'Untitled-21.png', 0, 0, 0, 0, NULL, NULL, NULL, NULL, '2021-12-03 03:37:24', 'superadmin', NULL, NULL, '500500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_po_det`
--

CREATE TABLE `tbl_po_det` (
  `id_po_det` int(11) NOT NULL,
  `id_po` int(11) DEFAULT NULL,
  `id_det_currency` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_satuan` decimal(11,2) DEFAULT NULL,
  `total_ppn` decimal(11,2) DEFAULT NULL,
  `total` decimal(11,2) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `podet_created_date` timestamp NULL DEFAULT current_timestamp(),
  `podet_created_by` varchar(255) DEFAULT NULL,
  `podet_updated_date` datetime DEFAULT NULL,
  `podet_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_po_det`
--

INSERT INTO `tbl_po_det` (`id_po_det`, `id_po`, `id_det_currency`, `no_urut`, `qty`, `harga_satuan`, `total_ppn`, `total`, `keterangan`, `podet_created_date`, `podet_created_by`, `podet_updated_date`, `podet_updated_by`) VALUES
(1, 1, 4, 25, 2, '10000.00', '2000.00', '20000.00', '2 Bos.', '2021-09-05 09:18:55', 'superadmin', NULL, NULL),
(2, 2, 4, 24, 1, '5000.00', '500.00', '5000.00', 'Bill', '2021-09-05 11:08:36', 'superadmin', NULL, NULL),
(3, 3, 4, 75, 1, '1000.00', '100.00', '1000.00', 'ok', '2021-09-07 07:20:03', 'superadmin', NULL, NULL),
(4, 4, 4, 169, 3, '5000.00', '1500.00', '15000.00', 'ok', '2021-09-07 07:34:39', 'superadmin', NULL, NULL),
(5, 4, 4, 143, 3, '50000.00', '15000.00', '150000.00', 'tes', '2021-09-07 07:34:39', 'superadmin', NULL, NULL),
(6, 5, 4, 127, 1, '5000.00', '500.00', '5000.00', 'tes', '2021-09-09 07:52:59', 'superadmin', NULL, NULL),
(7, 5, 4, 29, 3, '5000.00', '0.00', '15000.00', 'ok', '2021-09-09 07:52:59', 'superadmin', NULL, NULL),
(8, 6, 4, 23, 2, '5000.00', '1000.00', '10000.00', 'asd 1', '2021-09-09 09:08:18', 'superadmin', NULL, NULL),
(9, 6, 4, 20, 1, '2000.00', '0.00', '2000.00', 'asd 2', '2021-09-09 09:08:18', 'superadmin', NULL, NULL),
(10, 7, 4, 14, 2, '500.00', '100.00', '1000.00', '1', '2021-09-09 09:43:58', 'superadmin', NULL, NULL),
(11, 7, 4, 26, 1, '100.00', '0.00', '100.00', '2', '2021-09-09 09:43:58', 'superadmin', NULL, NULL),
(12, 8, 4, 19, 2, '1000.00', '200.00', '2000.00', 'monitorcoek', '2021-09-09 09:52:03', 'superadmin', NULL, NULL),
(13, 8, 4, 20, 1, '500.00', '0.00', '500.00', 'Printer esson', '2021-09-09 09:52:03', 'superadmin', NULL, NULL),
(15, 10, 4, 14, 2, '10000.00', '2000.00', '20000.00', 'LCD 2', '2021-09-10 06:39:14', 'superadmin', NULL, NULL),
(16, 10, 4, 80, 1, '5000.00', '0.00', '5000.00', 'Berguling', '2021-09-10 06:39:14', 'superadmin', NULL, NULL),
(19, 12, 4, 45, 2, '50000.00', '0.00', '100000.00', 'Kaset Windows 7', '2021-09-15 07:35:31', 'superadmin', NULL, NULL),
(23, 13, 4, 43, 11, '1000.00', '1100.00', '11000.00', 'tes', '2021-10-22 03:18:53', NULL, '2021-10-22 00:00:00', 'superadmin'),
(24, 13, 4, 26, 2, '1000.00', '0.00', '2000.00', 'tes2', '2021-10-22 03:18:53', NULL, '2021-10-22 00:00:00', 'superadmin'),
(25, 14, 4, 26, 2, '26000000.00', '5200000.00', '52000000.00', 'Tes', '2021-11-24 09:05:11', 'superadmin', NULL, NULL),
(26, 15, 4, 25, 10, '50000.00', '0.00', '500000.00', 'BMU an heula', '2021-12-03 03:37:24', 'superadmin', NULL, NULL),
(27, 15, 4, 24, 5, '100.00', '0.00', '500.00', 'lain bbc', '2021-12-03 03:37:24', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id_project` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `tgl_spk` date DEFAULT NULL,
  `no_spk` varchar(100) DEFAULT NULL,
  `nama_project` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `project_created_date` timestamp NULL DEFAULT current_timestamp(),
  `project_created_by` varchar(255) DEFAULT NULL,
  `project_updated_date` datetime DEFAULT NULL,
  `project_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id_project`, `tid`, `tgl_spk`, `no_spk`, `nama_project`, `keterangan`, `project_created_date`, `project_created_by`, `project_updated_date`, `project_updated_by`) VALUES
(9, 8888, '2021-04-08', 'SPK1234', 'Project1', NULL, '2021-04-07 19:48:16', 'superadmin', '2021-04-08 09:55:12', 'superadmin'),
(10, 6545, '2021-04-08', 'SPK8763', 'Project2', NULL, '2021-04-07 19:48:43', 'superadmin', NULL, NULL),
(11, 9996, '2021-04-08', 'SPK9831', 'Project3', NULL, '2021-04-07 19:49:00', 'superadmin', NULL, NULL),
(12, 6351, '2021-04-07', 'SPK0923', 'Project4', NULL, '2021-04-07 19:49:47', 'superadmin', NULL, NULL),
(13, 8521, '2021-04-08', 'SPK8623', 'Project5', NULL, '2021-04-07 19:50:17', 'superadmin', NULL, NULL),
(14, 8560, '2021-04-08', 'SPK7702', 'Project6', NULL, '2021-04-07 19:52:58', 'superadmin', NULL, NULL),
(15, 7411, '2021-04-09', 'SPK9342', 'Project7', NULL, '2021-04-07 19:53:28', 'superadmin', NULL, NULL),
(16, 6511, '2021-04-08', 'SPK2131', 'Project8', NULL, '2021-04-07 19:53:56', 'superadmin', NULL, NULL),
(17, 215, '2021-04-09', 'SPK0943', 'Project9', NULL, '2021-04-07 19:54:20', 'superadmin', NULL, NULL),
(18, 5871, '2021-04-08', 'SPK8712', 'Project10', NULL, '2021-04-07 19:54:42', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `nama_rak` varchar(255) DEFAULT NULL,
  `ket_rak` varchar(255) DEFAULT NULL,
  `flag_rakqc` int(11) DEFAULT NULL,
  `flag_rakjunk` int(11) DEFAULT NULL,
  `rak_created_date` timestamp NULL DEFAULT current_timestamp(),
  `rak_created_by` varchar(255) DEFAULT NULL,
  `rak_updated_date` datetime DEFAULT NULL,
  `rak_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `id_gudang`, `nama_rak`, `ket_rak`, `flag_rakqc`, `flag_rakjunk`, `rak_created_date`, `rak_created_by`, `rak_updated_date`, `rak_updated_by`) VALUES
(9, 2, 'Rak Cabang', 'Rak Barang Dari Cabang', 0, 0, '2021-04-22 01:05:08', 'superadmin', NULL, NULL),
(10, 3, 'Rak QC Vendor', 'Rak untuk qc barang dari vendor', 1, 0, '2021-04-22 21:15:12', 'superadmin', NULL, NULL),
(11, 2, 'Rak Hasil Qc Barang dari Vendor', '-', 0, 0, '2021-04-25 19:13:04', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regin_ekspedisi`
--

CREATE TABLE `tbl_regin_ekspedisi` (
  `id_invoice` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `no_invoice` varchar(100) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `periode` int(11) NOT NULL,
  `tot_invoice` int(11) NOT NULL,
  `status_verif` int(11) DEFAULT NULL COMMENT '0 = no verify, 1 = verify',
  `nilai_invoice` varchar(255) NOT NULL,
  `regineks_created_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `regineks_created_by` varchar(255) DEFAULT NULL,
  `regineks_updated_date` datetime DEFAULT NULL,
  `regineks_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_regin_ekspedisi`
--

INSERT INTO `tbl_regin_ekspedisi` (`id_invoice`, `id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `tot_invoice`, `status_verif`, `nilai_invoice`, `regineks_created_date`, `regineks_created_by`, `regineks_updated_date`, `regineks_updated_by`) VALUES
(1, 4, '1', '2021-09-05', 2021, 0, NULL, '30000', '0000-00-00 00:00:00', NULL, NULL, NULL),
(4, 5, '2', '2021-09-07', 2021, 0, NULL, '1233', '0000-00-00 00:00:00', NULL, NULL, NULL),
(5, 8, 'INV-002', '2021-09-07', 2021, 0, NULL, '50000', '0000-00-00 00:00:00', NULL, NULL, NULL),
(6, 6, 'INV-0013', '2021-09-09', 2021, 0, NULL, '500000', '0000-00-00 00:00:00', NULL, NULL, NULL),
(7, 7, '2311', '2021-09-09', 2021, 0, NULL, '100', '0000-00-00 00:00:00', NULL, NULL, NULL),
(8, 2, '6661', '2021-09-09', 2021, 0, NULL, '1000', '0000-00-00 00:00:00', NULL, NULL, NULL),
(9, 4, '2300', '2021-09-09', 2021, 0, NULL, '1000', '0000-00-00 00:00:00', NULL, NULL, NULL),
(10, 8, '12345666', '2021-09-10', 2021, 0, NULL, '50000', '0000-00-00 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrasi_invoice`
--

CREATE TABLE `tbl_registrasi_invoice` (
  `id_reg_inv` int(11) NOT NULL,
  `id_po` int(11) DEFAULT NULL,
  `tgl_invoice` date DEFAULT NULL,
  `no_invoice` text DEFAULT NULL,
  `nilai_invoice` varchar(255) DEFAULT NULL,
  `reginv_created_date` timestamp NULL DEFAULT NULL,
  `reginv_created_by` varchar(255) DEFAULT NULL,
  `reginv_updated_date` datetime DEFAULT NULL,
  `reginv_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(100) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `satuan_created_date` timestamp NULL DEFAULT current_timestamp(),
  `satuan_created_by` varchar(255) DEFAULT NULL,
  `satuan_updated_date` datetime DEFAULT NULL,
  `satuan_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id_satuan`, `nama_satuan`, `is_active`, `satuan_created_date`, `satuan_created_by`, `satuan_updated_date`, `satuan_updated_by`) VALUES
(1, 'BOX', 0, '2021-02-18 20:03:15', 'superadmin', NULL, NULL),
(2, 'PCS', 1, '2021-02-18 20:03:20', 'superadmin', NULL, NULL),
(4, 'Meter', 1, '2021-02-23 23:51:18', 'superadmin', NULL, NULL),
(5, 'Batang', 1, '2021-02-23 23:51:44', 'superadmin', NULL, NULL),
(6, 'Pack', 1, '2021-02-23 23:52:05', 'superadmin', NULL, NULL),
(7, 'Gulung', 1, '2021-02-23 23:52:16', 'superadmin', NULL, NULL),
(8, 'Set', 1, '2021-02-23 23:52:20', 'superadmin', NULL, NULL),
(9, 'Unit', 1, '2021-02-23 23:52:30', 'superadmin', NULL, NULL),
(10, 'Bungkus', 1, '2021-02-23 23:52:36', 'superadmin', NULL, NULL),
(11, 'Hari', 1, '2021-02-23 23:52:48', 'superadmin', NULL, NULL),
(12, 'Bulan', 1, '2021-02-23 23:52:52', 'superadmin', NULL, NULL),
(13, 'Tahun', 1, '2021-02-23 23:52:56', 'superadmin', NULL, NULL),
(14, 'User', 1, '2021-02-23 23:52:59', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sgbarang`
--

CREATE TABLE `tbl_sgbarang` (
  `id_sgbarang` int(11) NOT NULL,
  `id_gbarang` int(11) DEFAULT NULL,
  `nama_sgbarang` varchar(100) DEFAULT NULL,
  `sgbarang_created_date` timestamp NULL DEFAULT current_timestamp(),
  `sgbarang_created_by` varchar(255) DEFAULT NULL,
  `sgbarang_updated_date` datetime DEFAULT NULL,
  `sgbarang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_sgbarang`
--

INSERT INTO `tbl_sgbarang` (`id_sgbarang`, `id_gbarang`, `nama_sgbarang`, `sgbarang_created_date`, `sgbarang_created_by`, `sgbarang_updated_date`, `sgbarang_updated_by`) VALUES
(1, 1, 'ATM', '2021-02-18 19:55:59', 'superadmin', NULL, NULL),
(2, 1, 'CRM', '2021-02-18 19:56:05', 'superadmin', NULL, NULL),
(3, 2, 'Mobil', '2021-02-18 19:56:15', 'superadmin', NULL, NULL),
(4, 2, 'Motor', '2021-02-18 19:56:20', 'superadmin', NULL, NULL),
(5, 1, 'Mesin', '2021-02-23 21:29:53', 'superadmin', NULL, NULL),
(6, 1, 'SSB', '2021-02-23 21:30:12', 'superadmin', NULL, NULL),
(7, 1, 'Hybrid', '2021-02-23 21:30:43', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id_stock` int(11) NOT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `id_po` int(11) NOT NULL,
  `id_det_currency` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `no_sn` text DEFAULT NULL,
  `keterangan` text NOT NULL,
  `no_voucher` varchar(255) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tanggal_balik` date NOT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `flag_qc` int(1) DEFAULT NULL COMMENT '0 = belum qc, 1 = sudah qc vendor, 2 = sudah qc cabang',
  `flag_pakai` int(1) DEFAULT NULL COMMENT '0 = belum di pakai, 1 = sudah di pakai',
  `flag_barang` int(1) DEFAULT NULL COMMENT '0 = rusak, 1 = bagus',
  `flag_pembukuan` int(1) DEFAULT NULL COMMENT '0 = belum di buku, 1 = sudah di buku',
  `flag_greenpart` int(1) DEFAULT NULL COMMENT '0 = greenpart, 1 = nongreenpart',
  `flag_balikan` int(1) DEFAULT NULL COMMENT '0 = bukan balikan, 1 = barang balikan, 2 = barang ini sudah ada balikannya',
  `stock_created_date` timestamp NULL DEFAULT current_timestamp(),
  `stock_created_by` varchar(255) DEFAULT NULL,
  `stock_updated_date` datetime DEFAULT NULL,
  `stock_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id_stock`, `id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `keterangan`, `no_voucher`, `tgl_transaksi`, `tanggal_balik`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_date`, `stock_created_by`, `stock_updated_date`, `stock_updated_by`) VALUES
(1, 10, 1, 4, 25, 'BMU-01', '', '123456', NULL, '2021-09-10', 5000, 2, 0, 1, 1, 0, 1, '2021-09-05 09:27:45', 'superadmin', NULL, NULL),
(2, 10, 1, 4, 25, 'BMU-02', '', '123456', NULL, '0000-00-00', 10000, 0, 1, 1, 1, 0, 0, '2021-09-05 09:27:52', 'superadmin', NULL, NULL),
(3, 10, 2, 4, 24, 'BC-01', '', NULL, NULL, '2021-09-05', 5000, 2, 0, 1, 1, 0, 1, '2021-09-05 11:14:22', 'superadmin', NULL, NULL),
(4, 10, 3, 4, 75, 'SN10030', '', NULL, NULL, '0000-00-00', 1000, 1, 0, 1, 0, 0, 0, '2021-09-07 07:31:35', 'superadmin', NULL, NULL),
(5, 10, 4, 4, 169, 'SN10012', '', NULL, NULL, '0000-00-00', 5000, 1, 0, 1, 0, 0, 0, '2021-09-07 07:43:02', 'superadmin', NULL, NULL),
(6, 10, 4, 4, 143, 'SN6001', '', NULL, NULL, '0000-00-00', 50000, 0, 1, 1, 0, 0, 0, '2021-09-07 07:43:07', 'superadmin', NULL, NULL),
(7, 10, 4, 4, 143, 'SN6002', '', NULL, NULL, '0000-00-00', 50000, 0, 1, 1, 0, 0, 0, '2021-09-07 07:43:13', 'superadmin', NULL, NULL),
(8, 10, 8, 4, 19, 'SNDEDE', '', NULL, NULL, '0000-00-00', 1000, 1, 0, 1, 0, 0, 0, '2021-09-09 09:56:53', 'superadmin', NULL, NULL),
(9, 10, 10, 4, 14, 'SIMULASI-01', '', NULL, NULL, '0000-00-00', 10000, 0, 1, 1, 0, 0, 0, '2021-09-10 06:45:56', 'superadmin', NULL, NULL),
(10, 10, 10, 4, 80, 'SIMULASI-03', '', 'VCSIMULASI-01', NULL, '0000-00-00', 5000, 0, 1, 1, 1, 1, 0, '2021-09-10 06:46:03', 'superadmin', NULL, NULL),
(12, 10, 12, 4, 45, 'SN012345', '', NULL, NULL, '0000-00-00', 50000, 1, 0, 1, 0, 0, 0, '2021-09-15 08:28:22', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipe_barang`
--

CREATE TABLE `tbl_tipe_barang` (
  `id_tipe_barang` int(11) NOT NULL,
  `id_merek` int(11) DEFAULT NULL,
  `tipe_barang` varchar(100) DEFAULT NULL,
  `tbarang_created_date` timestamp NULL DEFAULT current_timestamp(),
  `tbarang_created_by` varchar(255) DEFAULT NULL,
  `tbarang_updated_date` datetime DEFAULT NULL,
  `tbarang_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_tipe_barang`
--

INSERT INTO `tbl_tipe_barang` (`id_tipe_barang`, `id_merek`, `tipe_barang`, `tbarang_created_date`, `tbarang_created_by`, `tbarang_updated_date`, `tbarang_updated_by`) VALUES
(7, 3, 'PROCASH 1500', '2021-03-20 16:26:32', 'superadmin', '2021-03-21 06:34:28', 'superadmin'),
(8, 3, 'WINCOR 280 DW', '2021-03-20 16:28:04', 'superadmin', '2021-03-21 06:29:15', 'superadmin'),
(9, 3, 'WINCOR 280 HG', '2021-03-20 16:29:03', 'superadmin', NULL, NULL),
(10, 5, 'MONIMAX 8000A', '2021-03-20 16:30:28', 'superadmin', NULL, NULL),
(12, 10, 'MONIMAX 9200', '2021-03-20 16:34:14', 'superadmin', NULL, NULL),
(13, 11, 'MONIMAX 8800', '2021-03-20 16:35:15', 'superadmin', NULL, NULL),
(14, 2, 'Monimax 5600', '2021-03-20 16:47:36', 'superadmin', NULL, NULL),
(15, 1, 'NCR S55', '2021-03-20 17:46:21', 'superadmin', '2021-03-21 07:46:34', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_tran` int(11) NOT NULL,
  `id_tranOld` int(11) DEFAULT NULL,
  `id_jtran` int(11) DEFAULT NULL COMMENT '1. Pengeluaran Barang, 2.Penerimaan Barang Vendor, 3.Penerimaan Barang Balikan',
  `id_vendor` int(11) DEFAULT NULL,
  `id_uker` int(11) DEFAULT NULL COMMENT 'uker penerima / pengeluaran / vendor',
  `dari_uker` int(11) DEFAULT NULL COMMENT 'uker pengeluaran / pengeluaran',
  `no_urut` int(11) DEFAULT NULL,
  `no_referensi` text DEFAULT NULL COMMENT 'vendor / balikan',
  `tgl_terima_barang` date DEFAULT NULL COMMENT 'pengeluaran',
  `nama_ekpedisi` varchar(255) DEFAULT NULL,
  `tgl_kirim_barang` date DEFAULT NULL COMMENT 'pengeluaran',
  `tgl_pemakai_barang` date DEFAULT NULL COMMENT 'pemakaian',
  `nama_teknisi` varchar(255) DEFAULT NULL COMMENT 'pemakaian',
  `tid` int(11) DEFAULT NULL COMMENT 'pemakaian',
  `no_sn` varchar(255) DEFAULT NULL,
  `no_snOld` varchar(255) DEFAULT NULL,
  `kon_barang` varchar(255) DEFAULT NULL COMMENT 'Bagus / Rusak',
  `qty` int(11) DEFAULT 0,
  `harga_barang` decimal(11,2) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `catatan_pemakaian` text DEFAULT NULL COMMENT 'pemakaian',
  `is_active` int(1) DEFAULT 0 COMMENT 'datanya aktif atau enggak',
  `is_balikan` int(1) DEFAULT 0 COMMENT '1= Balikan balikan teknisi, 0 = bukan , 2 = barang lama sudah ada balikan',
  `is_have` int(1) DEFAULT 0 COMMENT 'sudah di terima = 1,0 = belum / pengeluaran',
  `status_pakai` int(1) DEFAULT 0 COMMENT '1 = terpakai , 0 = belum terpakai',
  `is_out` int(1) DEFAULT 0 COMMENT 'Barang vendor sudah keluar',
  `tran_created_date` timestamp NULL DEFAULT current_timestamp(),
  `tran_created_by` varchar(255) DEFAULT NULL,
  `tran_updated_date` datetime DEFAULT NULL,
  `tran_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_tran`, `id_tranOld`, `id_jtran`, `id_vendor`, `id_uker`, `dari_uker`, `no_urut`, `no_referensi`, `tgl_terima_barang`, `nama_ekpedisi`, `tgl_kirim_barang`, `tgl_pemakai_barang`, `nama_teknisi`, `tid`, `no_sn`, `no_snOld`, `kon_barang`, `qty`, `harga_barang`, `remark`, `catatan_pemakaian`, `is_active`, `is_balikan`, `is_have`, `status_pakai`, `is_out`, `tran_created_date`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES
(52, NULL, 1, NULL, 1, 1, 24, NULL, NULL, 'SiCepat', '2021-09-05', NULL, NULL, NULL, 'BC-01', NULL, '1', 0, '5000.00', NULL, NULL, 1, 1, 0, 0, 1, '2021-09-05 11:51:50', NULL, NULL, NULL),
(53, 52, 2, NULL, 1, 1, 24, NULL, '2021-09-05', 'SiCepat', '2021-09-05', NULL, NULL, NULL, 'BC-01', NULL, '1', 1, '5000.00', NULL, NULL, 0, 0, 1, 0, 0, '2021-09-05 11:52:47', NULL, NULL, NULL),
(54, NULL, 2, 75, NULL, NULL, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SN10030', NULL, '1', 1, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2021-09-07 07:31:35', 'superadmin', '2021-09-07 14:31:35', 'superadmin'),
(55, NULL, 2, 169, NULL, NULL, 169, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SN10012', NULL, '1', 3, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2021-09-07 07:43:02', 'superadmin', '2021-09-07 14:43:02', 'superadmin'),
(56, NULL, 2, 143, NULL, NULL, 143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SN6001', NULL, '1', 3, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2021-09-07 07:43:07', 'superadmin', '2021-09-07 14:43:07', 'superadmin'),
(57, NULL, 2, 143, NULL, NULL, 143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SN6002', NULL, '1', 3, NULL, NULL, NULL, 0, 0, 0, 0, 0, '2021-09-07 07:43:13', 'superadmin', '2021-09-07 14:43:13', 'superadmin'),
(61, NULL, 1, NULL, 1, 1, 14, NULL, NULL, 'POS Indonesia', '2021-09-10', NULL, NULL, NULL, 'SIMULASI-01', NULL, '1', 0, '10000.00', NULL, NULL, 1, 0, 0, 0, 1, '2021-09-10 06:57:33', NULL, NULL, NULL),
(62, 61, 2, NULL, 1, 1, 14, NULL, '2021-09-10', 'POS Indonesia', '2021-09-10', NULL, NULL, NULL, 'SIMULASI-01', NULL, '1', 0, '10000.00', NULL, NULL, 1, 0, 1, 0, 0, '2021-09-10 06:58:03', NULL, NULL, NULL),
(69, NULL, 1, NULL, 1, 1, 25, NULL, NULL, 'SiCepat', '2021-09-10', NULL, NULL, NULL, 'BMU-01', NULL, '1', 0, '5000.00', NULL, NULL, 1, 1, 0, 0, 1, '2021-09-10 08:40:50', NULL, NULL, NULL),
(70, 69, 2, NULL, 1, 1, 25, NULL, '2021-09-10', 'SiCepat', '2021-09-10', NULL, NULL, NULL, 'BMU-01', NULL, '1', 1, '5000.00', NULL, NULL, 0, 0, 1, 0, 0, '2021-09-10 08:43:17', NULL, NULL, NULL),
(71, NULL, 1, NULL, 1, 1, 19, NULL, NULL, 'JNE', '2021-09-10', NULL, NULL, NULL, 'MONI-SIMU01', NULL, '0', 0, '10000.00', NULL, NULL, 1, 1, 0, 0, 1, '2021-09-10 08:45:20', NULL, NULL, NULL),
(72, NULL, 1, NULL, 1, 1, 24, NULL, NULL, 'JNE', '2021-09-10', NULL, NULL, NULL, 'BCC-CEK01', NULL, '0', 0, '1000.00', NULL, NULL, 1, 1, 0, 0, 1, '2021-09-10 08:50:57', NULL, NULL, NULL),
(73, NULL, 1, NULL, 1, 1, 40, NULL, NULL, 'POS Indonesia', '2021-09-10', NULL, NULL, NULL, 'CD-SIMU-01', NULL, '0', 0, '1000.00', NULL, NULL, 1, 1, 0, 0, 1, '2021-09-10 08:52:16', NULL, NULL, NULL),
(74, 73, 2, NULL, 1, 1, 40, NULL, '2021-09-10', 'POS Indonesia', '2021-09-10', NULL, NULL, NULL, 'CD-SIMU-01', NULL, '0', 1, '1000.00', NULL, NULL, 0, 0, 1, 0, 0, '2021-09-10 08:53:06', NULL, NULL, NULL),
(76, NULL, 1, NULL, 1, 1, 16, NULL, NULL, 'JNE', '2021-12-07', NULL, NULL, NULL, '123213', NULL, '1', 0, '10000.00', NULL, NULL, 1, 0, 0, 0, 1, '2021-12-07 06:31:00', NULL, NULL, NULL),
(77, NULL, 1, NULL, 6, 1, 143, NULL, NULL, 'JNE', '2021-12-13', NULL, NULL, NULL, 'SN6001', NULL, '1', 0, '50000.00', NULL, NULL, 1, 0, 0, 0, 1, '2021-12-13 14:34:49', NULL, NULL, NULL),
(78, NULL, 1, NULL, 6, 1, 143, NULL, NULL, 'JNE', '2021-12-13', NULL, NULL, NULL, 'SN6002', NULL, '1', 0, '50000.00', NULL, NULL, 1, 0, 0, 0, 1, '2021-12-13 14:34:49', NULL, NULL, NULL),
(79, 77, 2, NULL, 6, 1, 143, NULL, '2021-12-13', 'JNE', '2021-12-13', NULL, NULL, NULL, 'SN6001', NULL, '1', 0, '50000.00', NULL, NULL, 1, 0, 1, 0, 0, '2021-12-13 14:52:13', NULL, NULL, NULL),
(80, 78, 2, NULL, 6, 1, 143, NULL, '2021-12-13', 'JNE', '2021-12-13', NULL, NULL, NULL, 'SN6002', NULL, '1', 0, '50000.00', NULL, NULL, 1, 0, 1, 0, 0, '2021-12-13 14:53:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit_kerja`
--

CREATE TABLE `tbl_unit_kerja` (
  `id_uker` int(11) NOT NULL,
  `kode_uker` varchar(50) DEFAULT NULL,
  `nama_uker` varchar(255) DEFAULT NULL,
  `kode_nama` char(10) DEFAULT NULL,
  `alamat_uker` text DEFAULT NULL,
  `ket_uker` text DEFAULT NULL,
  `is_pic` int(11) DEFAULT NULL COMMENT 'dapet dari table user',
  `uker_created_date` timestamp NULL DEFAULT current_timestamp(),
  `uker_created_by` varchar(255) DEFAULT NULL,
  `uker_updated_date` datetime DEFAULT NULL,
  `uker_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_unit_kerja`
--

INSERT INTO `tbl_unit_kerja` (`id_uker`, `kode_uker`, `nama_uker`, `kode_nama`, `alamat_uker`, `ket_uker`, `is_pic`, `uker_created_date`, `uker_created_by`, `uker_updated_date`, `uker_updated_by`) VALUES
(1, '9999', 'Pengadaan', 'PST', NULL, 'Bricash Gudang Pusat', 0, '2021-02-18 19:34:01', 'superadmin', '2021-04-23 07:57:22', 'superadmin'),
(2, '0001', 'Cabang Cempaka Putih', 'CEMPUT', NULL, 'Bricash Cempaka Putih', 0, '2021-02-23 21:50:10', 'superadmin', '2021-04-23 07:56:12', 'superadmin'),
(3, '0002', 'Cabang Tosiga', 'TSG', NULL, 'Bricash Tosiga', 0, '2021-03-22 21:01:19', NULL, '2021-04-23 07:57:00', 'superadmin'),
(4, '0014', 'Cabang Bekasi', 'BKS', NULL, 'Bricash Bekasi', 0, '2021-03-22 21:01:57', NULL, '2021-04-23 07:56:02', 'superadmin'),
(5, '0029', 'Cabang Tangerang', 'TNG', NULL, 'Bricash Tangerang', 0, '2021-03-22 21:02:34', NULL, '2021-04-23 07:56:52', 'superadmin'),
(6, '0022', 'Cabang Jatipadang', 'JTPD', NULL, 'Bricash Jati Padang', 0, '2021-03-22 21:03:25', NULL, '2021-04-23 07:56:24', 'superadmin'),
(7, '0013', 'Cabang Depok', 'DPK', NULL, 'Bricash Depok', 0, '2021-03-22 21:03:43', NULL, '2021-04-23 07:53:58', 'superadmin'),
(8, '0011', 'Cabang Serang', 'SRG', NULL, 'Bricash Serang', 0, '2021-03-22 21:04:06', NULL, '2021-04-23 07:56:34', 'superadmin'),
(24, '0003', 'Cabang Bandung', 'BDG', NULL, 'Bricash Bandung', 11, '2021-03-23 20:01:49', 'superadmin', NULL, NULL),
(25, '0018', 'Cabang Tasikmalaya', 'TSM', NULL, 'Bricash Tasikmalaya', 11, '2021-03-23 20:02:16', 'superadmin', NULL, NULL),
(26, '0010', 'Cabang Cirebon', 'CRB', NULL, 'Bricash Cirebon', 11, '2021-03-23 20:02:45', 'superadmin', NULL, NULL),
(27, '0005', 'Cabang Surabaya', 'SRBY', NULL, 'Bricash Surabaya', 11, '2021-03-23 20:03:11', 'superadmin', NULL, NULL),
(28, '0023', 'Cabang Pamekasan', 'PKN', NULL, 'Bricash Pamekasan', 11, '2021-03-23 20:04:08', 'superadmin', NULL, NULL),
(29, '0027', 'Cabang Sukabumi', 'SKB', NULL, 'Bricash Sukabumi', 11, '2021-03-23 20:14:48', 'superadmin', NULL, NULL),
(30, '0007', 'Cabang Palembang', 'PLB', NULL, 'Bricash Palembang', 11, '2021-03-23 20:15:11', 'superadmin', NULL, NULL),
(31, '0009', 'Cabang Solo', 'SL', NULL, 'Bricash Solo', 11, '2021-03-23 20:15:33', 'superadmin', NULL, NULL),
(32, '0024', 'Cabang Yogyakarta', 'YGKT', NULL, 'Bricash Yogyakarta', 11, '2021-03-23 20:16:10', 'superadmin', NULL, NULL),
(33, '0033', 'Cabang Jambi', 'JB', NULL, 'Bricash Jambi', 11, '2021-03-23 20:16:29', 'superadmin', NULL, NULL),
(34, '0017', 'Cabang Purwokerto', 'PWKT', NULL, 'Bricash Purwokerto', 11, '2021-03-23 20:17:21', 'superadmin', NULL, NULL),
(35, '0034', 'Cabang Banjarmasin', 'BJM', NULL, 'Bricash Banjarmasin', 11, '2021-03-23 20:17:45', 'superadmin', NULL, NULL),
(36, '0021', 'Cabang Lampung', 'LMP', NULL, 'Bricash Lampung', 11, '2021-03-23 20:18:19', 'superadmin', NULL, NULL),
(37, '0015', 'Cabang Pati', 'PT', NULL, 'Bricash Pati', 11, '2021-03-23 20:18:48', 'superadmin', NULL, NULL),
(38, '0032', 'Cabang Padang', 'PDG', NULL, 'Bricash Padang', 11, '2021-03-23 20:19:19', 'superadmin', NULL, NULL),
(39, '0012', 'Cabang Semarang', 'SMRG', NULL, 'Bricash Semarang', 11, '2021-03-23 20:36:48', 'superadmin', NULL, NULL),
(40, '0006', 'Cabang Medan', 'MD', NULL, 'Bricash Medan', 11, '2021-03-23 20:37:07', 'superadmin', NULL, NULL),
(41, '0026', 'Cabang Makassar', 'MKSR', NULL, 'Bricash Makassar', 11, '2021-03-23 20:37:46', 'superadmin', NULL, NULL),
(42, '0030', 'Cabang Tebing Tinggi', 'TEBTING', NULL, 'Bricash Tebing Tinggi', 11, '2021-03-23 20:38:27', 'superadmin', NULL, NULL),
(43, '0016', 'Cabang Pemalang', 'PMLG', NULL, 'Bricash Pemalang', 11, '2021-03-23 20:38:55', 'superadmin', NULL, NULL),
(44, '0020', 'Cabang Jember', 'JBR', NULL, 'Bricash Jember', 11, '2021-03-23 20:39:25', 'superadmin', NULL, NULL),
(45, '0004', 'Cabang Malang', 'MLG', NULL, 'Bricash Malang', 11, '2021-03-23 20:40:16', 'superadmin', NULL, NULL),
(46, '0008', 'Cabang Tulungagung', 'TLG', NULL, 'Bricash Tulungagung', 11, '2021-03-23 20:41:20', 'superadmin', NULL, NULL),
(47, '0025', 'Cabang Madiun', 'MDN', NULL, 'Bricash Madiun', 11, '2021-03-23 20:41:43', 'superadmin', NULL, NULL),
(49, '0028', 'Cabang Denpasar', 'DPSR', NULL, 'Bricash Denpasar', 11, '2021-03-23 21:16:30', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_sgroup` int(11) DEFAULT NULL,
  `id_uker` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `old_password` varchar(255) DEFAULT NULL,
  `user_created_date` timestamp NULL DEFAULT current_timestamp(),
  `user_created_by` varchar(255) DEFAULT NULL,
  `user_updated_date` datetime DEFAULT NULL,
  `user_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_sgroup`, `id_uker`, `username`, `password`, `old_password`, `user_created_date`, `user_created_by`, `user_updated_date`, `user_updated_by`) VALUES
(1, 1, 1, 'superadmin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', '2021-02-18 00:33:49', 'Superadmin', NULL, NULL),
(15, 2, 1, 'kadiv_chm', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-11 18:29:46', 'superadmin', '2021-04-15 07:30:16', 'superadmin'),
(16, 8, 1, 'wakadiv_chm', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-11 18:29:56', 'superadmin', '2021-04-15 07:30:04', 'superadmin'),
(17, 9, 2, 'rutang_cemput', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-27 05:40:50', 'superadmin', NULL, NULL),
(18, 11, 1, 'adm_keuangan', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-27 05:41:16', 'superadmin', NULL, NULL),
(19, 10, 2, 'ade', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-27 23:59:16', 'superadmin', NULL, NULL),
(20, 13, 2, 'spv_cemput', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:03:22', 'superadmin', NULL, NULL),
(21, 14, 2, 'pinca_cemput', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:06:14', 'superadmin', NULL, NULL),
(22, 16, 1, 'adm_pengadaan', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:12:29', 'superadmin', NULL, NULL),
(23, 12, 1, 'adm_penerimaan', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:17:28', 'superadmin', NULL, NULL),
(24, 15, 1, 'adm_pengeluaran', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:20:00', 'superadmin', NULL, NULL),
(25, 17, 1, 'adm_pembayaran', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:24:43', 'superadmin', NULL, NULL),
(26, 19, 1, 'svp_penerimaan', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:55:01', 'superadmin', NULL, NULL),
(27, 18, 1, 'spv_pengadaan', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:55:20', 'superadmin', NULL, NULL),
(28, 20, 1, 'spv_pengeluaran', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:55:40', 'superadmin', NULL, NULL),
(29, 21, 1, 'spv_workshop', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:55:59', 'superadmin', NULL, NULL),
(30, 22, 1, 'kabag_pengadaan', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-04-28 00:57:29', 'superadmin', NULL, NULL),
(31, 23, 2, 'leader_cemput', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-05-06 13:46:37', 'superadmin', NULL, NULL),
(32, 24, 1, 'direksi', '08d57f7fdc3c597c14b8b266f2814140a8747895', NULL, '2021-11-25 03:09:35', 'superadmin', NULL, NULL),
(33, 25, 1, 'spv_gudang', 'adcd7048512e64b48da55b027577886ee5a36350', NULL, '2021-12-03 03:05:13', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `id_group` int(11) NOT NULL,
  `nama_group` varchar(255) DEFAULT NULL,
  `group_created_date` timestamp NULL DEFAULT current_timestamp(),
  `group_created_by` varchar(255) DEFAULT NULL,
  `group_updated_date` datetime DEFAULT NULL,
  `group_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`id_group`, `nama_group`, `group_created_date`, `group_created_by`, `group_updated_date`, `group_updated_by`) VALUES
(1, 'Superadmin', '2021-02-18 00:34:13', 'superadmin', NULL, NULL),
(3, 'Divisi Cash Management', '2021-02-22 05:14:46', 'superadmin', '2021-04-28 14:50:59', 'superadmin'),
(9, 'Cabang', '2021-04-27 04:50:42', 'superadmin', NULL, NULL),
(10, 'Bagian Keuangan', '2021-04-27 04:51:58', 'superadmin', NULL, NULL),
(11, 'Bagian PGD', '2021-04-27 04:52:39', 'superadmin', '2021-04-28 14:10:33', 'superadmin'),
(12, 'Pusat', '2021-11-25 03:08:51', 'superadmin', NULL, NULL),
(13, 'Gudang', '2021-12-03 02:28:16', 'superadmin', '2021-12-03 03:27:54', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_log`
--

CREATE TABLE `tbl_user_log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `query` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_log`
--

INSERT INTO `tbl_user_log` (`id_log`, `id_user`, `query`) VALUES
(1, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'10\''),
(2, 1, 'INSERT INTO `tbl_do_detail` (`dodet_created_by`, `id_do`, `keterangan`, `no_urut`, `qty`) VALUES (\'superadmin\',11,\'\',\'26\',\'5\'), (\'superadmin\',11,\'\',\'25\',\'2\')'),
(3, 1, 'INSERT INTO `tbl_do_detail` (`dodet_created_by`, `id_do`, `keterangan`, `no_urut`, `qty`) VALUES (\'superadmin\',12,\'\',\'26\',\'5\'), (\'superadmin\',12,\'\',\'25\',\'3\')'),
(4, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'12\''),
(5, 1, 'INSERT INTO `tbl_do_detail` (`dodet_created_by`, `id_do`, `keterangan`, `no_urut`, `qty`) VALUES (\'superadmin\',13,\'\',\'26\',\'5\'), (\'superadmin\',13,\'\',\'25\',\'3\')'),
(6, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'13\''),
(7, 1, 'INSERT INTO `tbl_do_detail` (`dodet_created_by`, `id_do`, `keterangan`, `no_urut`, `qty`) VALUES (\'superadmin\',14,\'\',\'26\',\'5\'), (\'superadmin\',14,\'\',\'25\',\'3\')'),
(8, 1, 'INSERT INTO `tbl_gudang` (`id_uker`, `nama_gudang`, `letak_gudang`, `ket_gudang`, `gudang_created_by`) VALUES (\'1\', \'Gudang QC Vendor\', \'Di Kamar D\', \'Gudang untuk barang qc dari Vendor\', \'superadmin\')'),
(9, 1, 'INSERT INTO `tbl_rak` (`id_gudang`, `nama_rak`, `ket_rak`, `flag_rakqc`, `flag_rakjunk`, `rak_created_by`) VALUES (\'3\', \'Rak QC Vendor\', \'Rak untuk qc barang dari vendor\', 1, 0, \'superadmin\')'),
(10, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'11\''),
(11, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'14\''),
(12, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'15\''),
(13, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (26, \'25\', 10)'),
(14, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'16\''),
(15, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (28, \'25\', 10)'),
(16, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'17\''),
(17, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (30, \'25\', 10)'),
(18, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'18\''),
(19, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (32, \'25\', 10)'),
(20, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'19\''),
(21, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (34, \'25\', 10)'),
(22, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'20\''),
(23, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (36, \'25\', 10)'),
(24, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'21\''),
(25, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (38, \'25\', 10)'),
(26, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'22\''),
(27, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (40, \'25\', 10)'),
(28, 1, 'INSERT INTO `tbl_rak` (`id_gudang`, `nama_rak`, `ket_rak`, `flag_rakqc`, `flag_rakjunk`, `rak_created_by`) VALUES (\'2\', \'Rak Hasil Qc Barang dari Vendor\', \'-\', 0, 0, \'superadmin\')'),
(29, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-26\', `id_rak` = \'11\', `flag_qc` = 2, `flag_retur` = 1, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `ket` = \'Barang OK!\', `barang_updated_date` = \'2021-04-26 09:27:07\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'101\''),
(30, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-26 09:32:32\', `id_rak` = \'11\', `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `ket` = \'Barang bagus!\', `barang_updated_date` = \'2021-04-26 09:32:32\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'101\''),
(31, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-26 09:34:02\', `id_rak` = \'11\', `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `ket` = \'Barang Bagus!\', `barang_updated_date` = \'2021-04-26 09:34:02\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'101\''),
(32, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000002\', `tgl_qc` = \'2021-04-26 09:36:13\', `id_rak` = \'11\', `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `ket` = \'Barang Jelek\', `barang_updated_date` = \'2021-04-26 09:36:13\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'102\''),
(33, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-26\', `id_rak` = \'11\', `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 0, `ket` = \'\', `barang_updated_date` = \'2021-04-26 09:44:16\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'101\''),
(34, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-26\', `id_rak` = \'11\', `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `ket` = \'\', `barang_updated_date` = \'2021-04-26 09:47:10\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'101\''),
(35, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000002\', `tgl_qc` = \'2021-04-26\', `id_rak` = \'11\', `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `ket` = \'\', `barang_updated_date` = \'2021-04-26 09:47:26\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'102\''),
(36, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-26\', `id_rak` = \'11\', `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-26 09:52:30\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'101\''),
(37, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000002\', `tgl_qc` = \'2021-04-26\', `id_rak` = \'11\', `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `ket` = \'Rusak BORD Bolong, dan tidak berfungsi dengan baik\', `barang_updated_date` = \'2021-04-26 09:53:34\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'102\''),
(38, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'23\''),
(39, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (42, \'25\', 10)'),
(40, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Penerimanan Barang Lolos QC\', \'Penerimaanlolosqc\', \'160\', \'7\', 1, \'superadmin\')'),
(41, 1, 'DELETE FROM `tbl_user_group`\nWHERE `id_group` = \'8\''),
(42, 1, 'DELETE FROM `tbl_user_group`\nWHERE `id_group` = \'7\''),
(43, 1, 'INSERT INTO `tbl_user_group` (`nama_group`, `group_created_by`) VALUES (\'Cabang\', \'superadmin\')'),
(44, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'9\', \'Rutang Cabang\', \'superadmin\')'),
(45, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'9\', \'Teknisi Cabang\', \'superadmin\')'),
(46, 1, 'INSERT INTO `tbl_user_group` (`nama_group`, `group_created_by`) VALUES (\'Bagian Keuangan\', \'superadmin\')'),
(47, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'10\', \'Admin Keuangan\', \'superadmin\')'),
(48, 1, 'INSERT INTO `tbl_user_group` (`nama_group`, `group_created_by`) VALUES (\'Bagian Pengadaan\', \'superadmin\')'),
(49, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Bagian Penerimaan\', \'superadmin\')'),
(50, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Gudang (Pengadaan)\', `url_menu` = \'#\', `parent_id` = \'0\', `sort_order` = \'6\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 18:55:26\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'160\''),
(51, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Rutang Cabang\', \'#\', \'0\', \'5\', 1, \'superadmin\')'),
(52, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Permintaan Barang dari Cabang\', `url_menu` = \'Permintaanpengbar\', `parent_id` = \'170\', `sort_order` = \'1\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 18:57:12\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'108\''),
(53, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pemenuhan Barang Cabang\', `url_menu` = \'Pemenuhanbarang\', `parent_id` = \'170\', `sort_order` = \'2\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 18:58:29\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'104\''),
(54, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang dari Teknisi (Badpart)\', `url_menu` = \'Penerimaanbartek\', `parent_id` = \'170\', `sort_order` = \'3\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 18:59:29\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'112\''),
(55, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pembukuan Penggunaan Sparepart Kantor Cabang\', `url_menu` = \'Pempengsparekancab\', `parent_id` = \'170\', `sort_order` = \'4\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 19:00:13\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'146\''),
(56, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Rutang\', `url_menu` = \'#\', `parent_id` = \'0\', `sort_order` = \'5\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 19:01:44\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'170\''),
(57, 1, 'INSERT INTO `tbl_user_group` (`nama_group`, `group_created_by`) VALUES (\'Rumah Tangga\', \'superadmin\')'),
(58, 1, 'UPDATE `tbl_user_group` SET `nama_group` = \'Bagian Rumah Tangga\', `group_updated_date` = \'2021-04-27 19:02:28\', `group_updated_by` = \'superadmin\'\nWHERE `id_group` = \'12\''),
(59, 1, 'UPDATE `tbl_user_subgroup` SET `id_group` = \'12\', `nama_subgroup` = \'Rutang\', `usubgroup_updated_date` = \'2021-04-27 19:02:42\', `usubgroup_updated_by` = \'superadmin\'\nWHERE `id_subgroup` = \'9\''),
(60, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pengiriman Barang ke KP/KC\', `url_menu` = \'Pengirimanbarang\', `parent_id` = \'170\', `sort_order` = \'5\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 19:04:22\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'113\''),
(61, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang dari KP/KC\', `url_menu` = \'Penbarcab\', `parent_id` = \'170\', `sort_order` = \'6\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 19:04:39\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'114\''),
(62, 1, 'UPDATE `tbl_user_subgroup` SET `id_group` = \'9\', `nama_subgroup` = \'Rutang Cabang\', `usubgroup_updated_date` = \'2021-04-27 19:05:59\', `usubgroup_updated_by` = \'superadmin\'\nWHERE `id_subgroup` = \'9\''),
(63, 1, 'DELETE FROM `tbl_user_group`\nWHERE `id_group` = \'12\''),
(64, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang Lolos QC\', `url_menu` = \'Penerimaanlolosqc\', `parent_id` = \'160\', `sort_order` = \'7\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-27 19:14:48\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'169\''),
(65, 1, 'UPDATE `tbl_user` SET `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(66, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'P\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:27:44\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(67, 1, 'UPDATE `tbl_user` SET `id_uker` = \'1\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(68, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'P\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:28:44\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(69, 1, 'UPDATE `tbl_user` SET `id_uker` = \'1\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(70, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'P\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:29:35\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(71, 1, 'UPDATE `tbl_user` SET `id_uker` = \'2\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(72, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'P\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:29:55\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(73, 1, 'UPDATE `tbl_user` SET `id_uker` = \'1\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(74, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'P\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:30:18\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(75, 1, 'UPDATE `tbl_user` SET `id_uker` = \'49\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(76, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'L\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:30:51\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(77, 1, 'UPDATE `tbl_user` SET `id_uker` = \'1\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(78, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Ilman Manbaullum Ramdhan\', `alamat_pegawai` = \'Tasikmalaya\', `jk` = \'L\', `telp` = \'0895346073923\', `email` = \'ilmandera1@gmail.com\', `pegawai_updated_date` = \'2021-04-27 19:35:18\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(79, 1, 'INSERT INTO `tbl_user_pegawai` (`id_user`, `nama_pegawai`, `alamat_pegawai`, `jk`, `telp`, `email`, `pegawai_created_date`, `pegawai_created_by`, `photo`) VALUES (\'1\', \'Superadmin Pusat\', \'-\', \'L\', \'0000\', \'pusat@gmail.com\', \'2021-04-27 19:37:29\', \'superadmin\', \'b494b4a3f67f272fab5983a573ff54b1.jpg\')'),
(80, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'2\', \'9\', \'rutang_cemput\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(81, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'11\', \'adm_keuangan\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(82, 1, 'DELETE FROM `tbl_pengelolaan_mesin`\nWHERE `id_det_project` = \'1\''),
(83, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'24\''),
(84, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (44, \'25\', 10)'),
(85, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Barang bagus\', `barang_updated_date` = \'2021-04-28 08:10:39\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'113\''),
(86, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'25\''),
(87, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `id_rak`) VALUES (0, \'25\', 10)'),
(88, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'26\''),
(89, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `no_urut`, `harga_barang`, `id_rak`) VALUES (46, \'25\', \'2.00\', 10)'),
(90, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'27\''),
(91, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (48, \'14\', \'25\', \'2.00\', 10)'),
(92, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Barang sudah sesuai\', `barang_updated_date` = \'2021-04-28 08:36:18\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'143\''),
(93, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 08:44:51\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'143\''),
(94, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'3\', \'1\', \'26\', \'SN-00000001\', \'230000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(95, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000002\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Barang bagus\', `barang_updated_date` = \'2021-04-28 09:06:52\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'144\''),
(96, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 09:07:02\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'144\''),
(97, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'3\', \'1\', \'26\', \'SN-00000002\', \'230000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(98, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000003\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Good ITEM\', `barang_updated_date` = \'2021-04-28 09:42:08\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'148\''),
(99, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 09:42:35\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'148\''),
(100, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'3\', \'14\', \'25\', \'SN-00000003\', \'2\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(101, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000004\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'ITEM good Locking\', `barang_updated_date` = \'2021-04-28 09:43:56\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'149\''),
(102, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 09:44:13\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'149\''),
(103, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'3\', \'14\', \'25\', \'SN-00000004\', \'2\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(104, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'3\',\'1\',8,\'-\',\'21\',\'superadmin\',\'5\',\'225000\',\'0\'), (\'50000\',\'4\',8,\'-\',\'18\',\'superadmin\',\'5\',\'250000\',\'0\')'),
(105, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'3.00\',\'1\',\'8\',\'-\',\'21\',\'superadmin\',\'2021-04-28\',\'2\',\'90000\',\'0\'), (\'50000.00\',\'4\',\'8\',\'-\',\'18\',\'superadmin\',\'2021-04-28\',\'5\',\'250000.00\',\'0.00\')'),
(106, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-04-28\', `wakadiv_approv` = 1\nWHERE `id_po` = \'8\''),
(107, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-04-28\', `kadiv_approv` = 1\nWHERE `id_po` = \'8\''),
(108, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (50, \'4\', \'18\', \'50000.00\', 10)'),
(109, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'29\''),
(110, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (52, \'4\', \'18\', \'50000.00\', 10)'),
(111, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-28 10:43:54\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'158\''),
(112, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 10:44:44\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'158\''),
(113, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'8\', \'1\', \'21\', \'SN-00000001\', \'3\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(114, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000002\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-28 11:04:51\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'159\''),
(115, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000004\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-28 11:05:07\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'160\''),
(116, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000004\', `tgl_qc` = \'2021-04-28\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-28 11:05:25\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'161\''),
(117, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 11:05:49\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'159\''),
(118, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'8\', \'4\', \'18\', \'SN-00000002\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(119, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 11:05:54\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'160\''),
(120, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'8\', \'4\', \'18\', \'SN-00000004\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(121, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-28 11:05:59\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'161\''),
(122, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'8\', \'4\', \'18\', \'SN-00000004\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(123, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang Lolos QC (Stok)\', `url_menu` = \'Penerimaanlolosqc\', `parent_id` = \'160\', `sort_order` = \'7\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 12:37:04\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'169\''),
(124, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang yang belum dikembalikan Teknisi\', `url_menu` = \'Penerimaanbartek\', `parent_id` = \'170\', `sort_order` = \'3\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:04:43\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'112\''),
(125, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Permintaan Barang dari Cabang\', `url_menu` = \'Permintaanpengbar\', `parent_id` = \'160\', `sort_order` = \'1\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:53:53\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'108\''),
(126, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pemenuhan Barang Cabang\', `url_menu` = \'Pemenuhanbarang\', `parent_id` = \'160\', `sort_order` = \'2\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:54:09\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'104\''),
(127, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang yang belum dikembalikan Teknisi\', `url_menu` = \'Penerimaanbartek\', `parent_id` = \'161\', `sort_order` = \'3\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:54:29\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'112\''),
(128, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pembukuan Penggunaan Sparepart Kantor Cabang\', `url_menu` = \'Pempengsparekancab\', `parent_id` = \'161\', `sort_order` = \'4\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:54:52\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'146\''),
(129, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pengiriman Barang ke KP/KC\', `url_menu` = \'Pengirimanbarang\', `parent_id` = \'160\', `sort_order` = \'5\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:55:13\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'113\''),
(130, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Pengiriman Barang ke KP/KC\', `url_menu` = \'Pengirimanbarang\', `parent_id` = \'161\', `sort_order` = \'5\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:55:23\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'113\''),
(131, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Penerimaan Barang dari KP/KC\', `url_menu` = \'Penbarcab\', `parent_id` = \'161\', `sort_order` = \'6\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 13:55:46\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'114\''),
(132, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'2\', \'10\', \'ade\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(133, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'9\', \'Supervisor\', \'superadmin\')'),
(134, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'2\', \'13\', \'spv_cemput\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(135, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'9\', \'PINCA (Pemimpin Cabang)\', \'superadmin\')'),
(136, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'2\', \'14\', \'pinca_cemput\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(137, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Admin Gudang\', \'superadmin\')'),
(138, 1, 'UPDATE `tbl_user_subgroup` SET `id_group` = \'11\', `nama_subgroup` = \'Admin\', `usubgroup_updated_date` = \'2021-04-28 14:07:46\', `usubgroup_updated_by` = \'superadmin\'\nWHERE `id_subgroup` = \'15\''),
(139, 1, 'UPDATE `tbl_user_group` SET `nama_group` = \'Admin Pengadaan\', `group_updated_date` = \'2021-04-28 14:09:38\', `group_updated_by` = \'superadmin\'\nWHERE `id_group` = \'11\''),
(140, 1, 'UPDATE `tbl_user_group` SET `nama_group` = \'Bagian PGD\', `group_updated_date` = \'2021-04-28 14:10:33\', `group_updated_by` = \'superadmin\'\nWHERE `id_group` = \'11\''),
(141, 1, 'UPDATE `tbl_user_subgroup` SET `id_group` = \'11\', `nama_subgroup` = \'Admin Pengeluaran\', `usubgroup_updated_date` = \'2021-04-28 14:10:53\', `usubgroup_updated_by` = \'superadmin\'\nWHERE `id_subgroup` = \'15\''),
(142, 1, 'UPDATE `tbl_user_subgroup` SET `id_group` = \'11\', `nama_subgroup` = \'Admin Penerimaan\', `usubgroup_updated_date` = \'2021-04-28 14:11:02\', `usubgroup_updated_by` = \'superadmin\'\nWHERE `id_subgroup` = \'12\''),
(143, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Admin Pengadaan\', \'superadmin\')'),
(144, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'16\', \'adm_pengadaan\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(145, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'12\', \'adm_penerimaan\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(146, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'15\', \'adm_pengeluaran\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(147, 1, 'DELETE FROM `tbl_user_menu`\nWHERE `id_menu` = \'170\''),
(148, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Admin Pembayaran\', \'superadmin\')'),
(149, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'17\', \'adm_pembayaran\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(150, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Registrasi Invoice Pembelian Barang\', `url_menu` = \'RegInvoice\', `parent_id` = \'160\', `sort_order` = \'5\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 14:27:53\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'153\''),
(151, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Registrasi Invoice Jasa Pengiriman\', \'RegInvoicejaspeng\', \'160\', \'3\', 1, \'superadmin\')'),
(152, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Permohonan Pembayaran Ekpedisi\', `url_menu` = \'Permohonanpembarek\', `parent_id` = \'160\', `sort_order` = \'6\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 14:29:31\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'154\''),
(153, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Laporan Pembayaran Invoice Pembelian Barang\', \'Lap\', \'165\', \'4\', 1, \'superadmin\')'),
(154, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Laporan Pembayaran Ekpedisi\', \'Lap2\', \'165\', \'4\', 1, \'superadmin\')'),
(155, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Laporan Pembayaran Pembelian Barang\', `url_menu` = \'Lap\', `parent_id` = \'165\', `sort_order` = \'4\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 14:32:17\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'172\''),
(156, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Supervisor\', \'superadmin\')'),
(157, 1, 'UPDATE `tbl_user_subgroup` SET `id_group` = \'11\', `nama_subgroup` = \'Supervisor Pengadaan\', `usubgroup_updated_date` = \'2021-04-28 14:35:07\', `usubgroup_updated_by` = \'superadmin\'\nWHERE `id_subgroup` = \'18\''),
(158, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Supervisor Penerimaan\', \'superadmin\')'),
(159, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Supervisor Pengeluaran\', \'superadmin\')'),
(160, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Supervisor Workshop\', \'superadmin\')'),
(161, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Pengiriman Barang\', \'Pengbarkp\', \'160\', \'4\', 1, \'superadmin\')'),
(162, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Laporan Pengiriman Barang\', \'Lappengbar\', \'165\', \'5\', 1, \'superadmin\')'),
(163, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Registrasi Invoice Ekpedisi\', `url_menu` = \'RegInvoicejaspeng\', `parent_id` = \'160\', `sort_order` = \'3\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-28 14:45:23\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'171\''),
(164, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'11\', \'Kabag Pengadaan\', \'superadmin\')'),
(165, 1, 'UPDATE `tbl_user_group` SET `nama_group` = \'Divisi Cash Management\', `group_updated_date` = \'2021-04-28 14:50:59\', `group_updated_by` = \'superadmin\'\nWHERE `id_group` = \'3\''),
(166, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'19\', \'svp_penerimaan\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(167, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'18\', \'spv_pengadaan\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(168, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'20\', \'spv_pengeluaran\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(169, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'21\', \'spv_workshop\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(170, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'22\', \'kabag_pengadaan\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(171, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'30\''),
(172, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (54, \'4\', \'18\', \'50000.00\', 10)'),
(173, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-30 07:35:30\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'162\''),
(174, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Laporan Pembayaran Pembelian Barang\', `url_menu` = \'Lappempembar\', `parent_id` = \'165\', `sort_order` = \'4\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-30 09:51:36\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'172\''),
(175, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Laporan Pembayaran Pembelian Barang\', `url_menu` = \'Laporanpusat/Pempembar\', `parent_id` = \'165\', `sort_order` = \'4\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-30 09:53:53\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'172\''),
(176, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Laporan Pembayaran Ekpedisi\', `url_menu` = \'LapPemEkspedisi\', `parent_id` = \'165\', `sort_order` = \'4\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-30 13:19:02\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'173\''),
(177, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Registrasi Invoice Ekpedisi\', `url_menu` = \'RegInvoiceEkspedisi\', `parent_id` = \'160\', `sort_order` = \'3\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-30 13:20:23\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'171\''),
(178, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'31\''),
(179, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (56, \'4\', \'18\', \'50000.00\', 10)'),
(180, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000001\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-30 13:22:48\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'169\''),
(181, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 13:23:01\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'169\''),
(182, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'8\', \'1\', \'21\', \'SN-00000001\', \'3\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(183, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000002\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-30 13:29:17\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'170\''),
(184, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-00000003\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'-\', `barang_updated_date` = \'2021-04-30 13:30:20\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'171\''),
(185, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'32\''),
(186, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (58, \'4\', \'18\', \'50000.00\', 10)'),
(187, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1004\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'halo hai\', `barang_updated_date` = \'2021-04-30 14:35:59\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'176\''),
(188, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:36:13\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'176\''),
(189, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1001\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'--\', `barang_updated_date` = \'2021-04-30 14:36:32\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'178\''),
(190, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1002\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'ji\', `barang_updated_date` = \'2021-04-30 14:36:53\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'177\''),
(191, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1003\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'jkk\', `barang_updated_date` = \'2021-04-30 14:37:10\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'179\''),
(192, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'a101\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'bbbb\', `barang_updated_date` = \'2021-04-30 14:37:33\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'180\''),
(193, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:37:56\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'176\''),
(194, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'b201\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'ihhjkk\', `barang_updated_date` = \'2021-04-30 14:37:56\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'181\''),
(195, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:38:05\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'176\''),
(196, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'v1001\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'pppokoj\', `barang_updated_date` = \'2021-04-30 14:38:17\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'182\''),
(197, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:40:02\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'177\''),
(198, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:40:25\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'181\''),
(199, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:42:03\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'179\''),
(200, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:42:13\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'179\''),
(201, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:42:25\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'178\''),
(202, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'33\''),
(203, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (60, \'4\', \'18\', \'50000.00\', 10)'),
(204, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1001\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'ok\', `barang_updated_date` = \'2021-04-30 14:44:59\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'183\''),
(205, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1002\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'okay\', `barang_updated_date` = \'2021-04-30 14:45:16\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'184\''),
(206, 1, 'UPDATE `tbl_barang_temp` SET `id_rak` = \'11\', `flag_pindah` = 1, `barang_updated_date` = \'2021-04-30 14:45:31\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'183\''),
(207, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'11\', \'8\', \'1\', \'21\', \'1001\', 45000, 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(208, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'1003\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'oke\', `barang_updated_date` = \'2021-04-30 14:45:34\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(209, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'a101\', `tgl_qc` = \'2021-04-30\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'okie\', `barang_updated_date` = \'2021-04-30 14:45:58\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'186\''),
(210, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Laporan Pengiriman Barang\', `url_menu` = \'Laporanpusat/Lappengbar\', `parent_id` = \'165\', `sort_order` = \'5\', `show_in_menu` = 1, `menu_updated_date` = \'2021-04-30 15:03:27\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'175\''),
(211, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Monitoring Informasi Pemakaian Sparepart\', \'MonInformasipempart\', \'161\', \'8\', 1, \'superadmin\')'),
(212, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (3,\'-\',\'28\',\'superadmin\',\'2\'), (3,\'-\',\'84\',\'superadmin\',\'3\'), (3,\'-\',\'102\',\'superadmin\',\'1\')'),
(213, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'3\''),
(214, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (4,\'-\',\'24\',\'superadmin\',\'2\'), (4,\'-\',\'32\',\'superadmin\',\'1\'), (4,\'-\',\'105\',\'superadmin\',\'3\')'),
(215, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'4\',\'-\',\'24\',\'superadmin\',\'2\')'),
(216, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'4\',\'1\',\'14\',\'superadmin\',\'1\'), (\'4\',\'2\',\'16\',\'superadmin\',\'1\'), (\'4\',\'3\',\'95\',\'superadmin\',\'1\')'),
(217, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (5,\'help soos\',\'27\',\'superadmin\',\'5\')'),
(218, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'5\''),
(219, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'4\',\'1\',\'14\',\'superadmin\',\'1\'), (\'4\',\'2\',\'16\',\'superadmin\',\'1\'), (\'4\',\'3\',\'95\',\'superadmin\',\'1\')'),
(220, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (6,\'pppp\',\'23\',\'superadmin\',\'3\')'),
(221, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'6\',\'pppp\',\'23\',\'superadmin\',\'3\')'),
(222, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'6\''),
(223, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'002\', \'2021-05-26\', \'2019\', \'0932\', \'superadmin\')'),
(224, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'001\', \'2021-05-13\', \'2020\', \'123\', \'superadmin\')'),
(225, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'6\', \'002\', \'2021-05-06\', \'2019\', \'1289\', \'superadmin\')'),
(226, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'2\', \'001\', \'2021-05-13\', \'2020\', \'123\', \'superadmin\')'),
(227, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'5\''),
(228, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'6\', \'002\', \'2021-05-06\', \'1998\', \'1289\', \'superadmin\')'),
(229, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'6\''),
(230, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'4\''),
(231, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'7\', \'002\', \'2021-05-16\', \'2003\', \'2563\', \'superadmin\')'),
(232, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'\', \'\', \'\', \'\', \'\', \'superadmin\')'),
(233, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'\', \'\', \'\', \'\', \'\', \'superadmin\')'),
(234, 1, 'UPDATE `tbl_regin_ekspedisi` SET `id_vendor` = \'7\', `no_invoice` = \'002\', `tgl_invoice` = \'2021-05-16\', `periode` = \'2003\', `nilai_invoice` = \'2563932\', `regineks_updated_date` = \'2021-05-06 11:47:36\', `regineks_updated_by` = \'superadmin\'\nWHERE `id_invoice` = \'7\''),
(235, 1, 'UPDATE `tbl_regin_ekspedisi` SET `id_vendor` = \'7\', `no_invoice` = \'002\', `tgl_invoice` = \'2021-05-16\', `periode` = \'2003109\', `nilai_invoice` = \'2563932\', `regineks_updated_date` = \'2021-05-06 11:47:49\', `regineks_updated_by` = \'superadmin\'\nWHERE `id_invoice` = \'7\'');
INSERT INTO `tbl_user_log` (`id_log`, `id_user`, `query`) VALUES
(236, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'9\', \'003\', \'2021-05-06\', \'2009\', \'190\', \'superadmin\')'),
(237, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'7\''),
(238, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Master Layanan Ekpedisi\', \'Layananekpedisi\', \'2\', \'9\', 1, \'superadmin\')'),
(239, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Master Layanan Ekpedisi\', `url_menu` = \'Layananekpedisi\', `parent_id` = \'2\', `sort_order` = \'8\', `show_in_menu` = 1, `menu_updated_date` = \'2021-05-06 19:48:52\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'177\''),
(240, 1, 'DELETE FROM `tbl_ekpedisi`\nWHERE `id_ekpedisi` = \'14\''),
(241, 1, 'INSERT INTO `tbl_ekpedisi` (`id_delivery_type`, `nama_ekpedisi`, `keterangan`, `ekpedisi_created_by`) VALUES (3, \'Go Send\', \'-\', \'superadmin\')'),
(242, 1, 'UPDATE `tbl_ekpedisi` SET `id_delivery_type` = 3, `nama_ekpedisi` = \'1\', `keterangan` = \'1\', `ekpedisi_updated_date` = \'2021-05-06 20:00:44\', `ekpedisi_updated_by` = \'superadmin\'\nWHERE `id_ekpedisi` = \'15\''),
(243, 1, 'DELETE FROM `tbl_ekpedisi`\nWHERE `id_ekpedisi` = \'15\''),
(244, 1, 'INSERT INTO `tbl_layanan_ekspedisi` (`id_ekspedisi`, `layanan_ekspedisi`, `layanan_ekspedisi_created_by`) VALUES (\'2\', \'Reguler\', \'superadmin\')'),
(245, 1, 'UPDATE `tbl_layanan_ekspedisi` SET `id_ekspedisi` = \'2\', `layanan_ekspedisi` = \'Faster\', `layanan_ekspedisi_updated_date` = \'2021-05-06 20:05:22\', `layanan_ekspedisi_updated_by` = \'superadmin\'\nWHERE `id_layanan_ekspedisi` = \'13\''),
(246, 1, 'DELETE FROM `tbl_layanan_ekspedisi`\nWHERE `id_layanan_ekspedisi` = \'13\''),
(247, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'9\', \'Leader Cabang\', \'superadmin\')'),
(248, 21, 'UPDATE `tbl_pertek` SET `tanggal_approv_pinca` = \'2021-05-06\', `pinca_appovel` = 1\nWHERE `id_pertek` = \'4\''),
(249, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'2\', \'23\', \'leader_cemput\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(250, 31, 'UPDATE `tbl_pertek` SET `tanggal_approv_leader` = \'2021-05-06\', `leader_approvel` = 1\nWHERE `id_pertek` = \'4\''),
(251, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (5,\'\',\'30\',\'superadmin\',\'10\'), (5,\'\',\'54\',\'superadmin\',\'25\')'),
(252, 1, 'INSERT INTO `tbl_ekpedisi` (`id_delivery_type`, `nama_ekpedisi`, `keterangan`, `ekpedisi_created_by`) VALUES (3, \'Test\', \'test\', \'superadmin\')'),
(253, 1, 'DELETE FROM `tbl_ekpedisi`\nWHERE `id_ekpedisi` = \'16\''),
(254, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (6,\'aslasalsalasalalsaa\',\'26\',\'superadmin\',\'1\')'),
(255, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'10\''),
(256, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'7\', \'5441\', \'2021-05-07\', \'2021\', \'1000\', \'superadmin\')'),
(257, 1, 'UPDATE `tbl_regin_ekspedisi` SET `id_vendor` = \'7\', `no_invoice` = \'5441\', `tgl_invoice` = \'2021-05-07\', `periode` = \'2020\', `nilai_invoice` = \'1000\', `regineks_updated_date` = \'2021-05-07 08:17:39\', `regineks_updated_by` = \'superadmin\'\nWHERE `id_invoice` = \'11\''),
(258, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (7,\'asa\',\'27\',\'superadmin\',\'11\')'),
(259, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'7\''),
(260, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'6\''),
(261, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (8,\'LCD Baru\',\'134\',\'superadmin\',\'100\')'),
(262, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (9,\'Barang Mahal\',\'76\',\'superadmin\',\'52\')'),
(263, 1, 'INSERT INTO `tbl_pengelolaan_mesin` (`id_uker`, `id_project`, `lokasi`, `db`, `merek`, `tipe`, `pengmes_created_date`) VALUES (\'1\', \'10\', \'Bekasi\', \'project inventory\', \'mesin 1\', \'tipe 1\', \'superadmin\')'),
(264, 1, 'UPDATE `tbl_pengelolaan_mesin` SET `id_uker` = \'1\', `id_project` = \'10\', `lokasi` = \'Bekasi\', `db` = \'project inventory\', `merek` = \'mesin 1\', `tipe` = \'tipe 11\', `pengmes_updated_date` = \'2021-05-10 08:59:24\', `pengmes_updated_by` = \'superadmin\'\nWHERE `id_det_project` = \'1\''),
(265, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (10,\'LCD Baru\',\'28\',\'superadmin\',\'3\')'),
(266, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'28\''),
(267, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (29,\'hmm\',\'23\',\'superadmin\',\'1\')'),
(268, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'29\''),
(269, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (30,\'hehe\',\'22\',\'superadmin\',\'2\')'),
(270, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (31,\'--\',\'23\',\'superadmin\',\'4\')'),
(271, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'31\''),
(272, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (32,\'bt\',\'21\',\'superadmin\',\'2\')'),
(273, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'32\''),
(274, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (33,\'dd\',\'20\',\'superadmin\',\'3\')'),
(275, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'33\''),
(276, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (34,\'jkdk\',\'18\',\'superadmin\',\'2\')'),
(277, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'30\''),
(278, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'34\''),
(279, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (35,\'--\',\'19\',\'superadmin\',\'3\')'),
(280, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'35\''),
(281, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (36,\'aaih\',\'20\',\'superadmin\',\'3\')'),
(282, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'36\',\'aui\',\'24\',\'superadmin\',\'3\')'),
(283, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'36\',\'aui\',\'24\',\'superadmin\',\'3\')'),
(284, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'27\',\'aey\',\'21\',\'superadmin\',\'3\')'),
(285, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'27\''),
(286, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'36\''),
(287, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (37,\'aey\',\'19\',\'superadmin\',\'3\')'),
(288, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'37\',\'aeyii\',\'19\',\'superadmin\',\'4\')'),
(289, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'37\',\'brand new\',\'19\',\'superadmin\',\'3\')'),
(290, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (38,\'aey\',\'21\',\'superadmin\',\'4\')'),
(291, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (39,\'abc\',\'21\',\'superadmin\',\'3\')'),
(292, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'39\''),
(293, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'40\''),
(294, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'41\''),
(295, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'42\''),
(296, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (43,\'ee\',\'24\',\'superadmin\',\'2\')'),
(297, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'43\',\'ee\',\'25\',\'superadmin\',\'2\')'),
(298, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'43\''),
(299, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (44,\'ff\',\'18\',\'superadmin\',\'5\')'),
(300, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'44\',\'aaa\',\'18\',\'superadmin\',\'5\')'),
(301, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'44\',\'aaa\',\'22\',\'superadmin\',\'5\')'),
(302, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'44\''),
(303, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'38\''),
(304, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'37\''),
(305, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (45,\'Secepatnya\',\'22\',\'superadmin\',\'3\')'),
(306, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'45\',\'Secepatnya\',\'22\',\'superadmin\',\'3\')'),
(307, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'9\', \'001\', \'2021-05-13\', \'2019\', \'564\', \'superadmin\')'),
(308, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'45\',\'Secepatnya\',\'26\',\'superadmin\',\'3\')'),
(309, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (46,\'dd\',\'20\',\'superadmin\',\'45\')'),
(310, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (47,\'hmmm\',\'22\',\'superadmin\',\'9\')'),
(311, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'47\''),
(312, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'46\''),
(313, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'48\''),
(314, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'49\''),
(315, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (50,\'hehhehe\',\'30\',\'superadmin\',\'5\')'),
(316, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'50\',\'hehhehe\',\'30\',\'superadmin\',\'3\')'),
(317, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'50\''),
(318, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (51,\'help\',\'22\',\'superadmin\',\'5\')'),
(319, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'51\''),
(320, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (52,\'--\',\'19\',\'superadmin\',\'4\')'),
(321, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'52\',\'--\',\'21\',\'superadmin\',\'3\')'),
(322, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'52\',\'--\',\'173\',\'superadmin\',\'3\')'),
(323, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (53,\'ook\',\'20\',\'superadmin\',\'8\')'),
(324, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'53\''),
(325, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'52\',\'--\',\'158\',\'superadmin\',\'3\')'),
(326, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'52\',\'--\',\'14\',\'superadmin\',\'3\')'),
(327, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (54,\'aishiteru\',\'20\',\'superadmin\',\'3\')'),
(328, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'54\',\'aishiteru\',\'173\',\'superadmin\',\'3\')'),
(329, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'54\',\'aishiteru\',\'173\',\'superadmin\',\'7\')'),
(330, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'54\''),
(331, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'52\',\'--\',\'172\',\'superadmin\',\'2\')'),
(332, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (55,\'oey\',\'75\',\'superadmin\',\'7\')'),
(333, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'55\',\'oeyop\',\'75\',\'superadmin\',\'7\')'),
(334, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (56,\'---\',\'21\',\'superadmin\',\'3\')'),
(335, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (57,\'---\',\'21\',\'superadmin\',\'3\')'),
(336, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'57\',\'---\',\'21\',\'superadmin\',\'3\')'),
(337, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (58,\'hh\',\'23\',\'superadmin\',\'6\')'),
(338, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'58\''),
(339, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Permintaan Barang dari Cabang\', `url_menu` = \'Permintaanpengbarang\', `parent_id` = \'160\', `sort_order` = \'1\', `show_in_menu` = 1, `menu_updated_date` = \'2021-05-18 10:48:00\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'108\''),
(340, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Permintaan Barang dari Cabang\', `url_menu` = \'Permintaanbarangcab\', `parent_id` = \'160\', `sort_order` = \'1\', `show_in_menu` = 1, `menu_updated_date` = \'2021-05-18 11:44:58\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'108\''),
(341, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'57\',\'---\',\'21\',\'superadmin\',\'3\')'),
(342, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'57\',\'---\',\'21\',\'superadmin\',\'3\')'),
(343, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'57\',\'---\',\'173\',\'superadmin\',\'3\')'),
(344, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (58,\'mhmhmm\',\'118\',\'superadmin\',\'4\')'),
(345, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Stock Cabang\', `url_menu` = \'Stokcabang\', `parent_id` = \'161\', `sort_order` = \'1\', `show_in_menu` = 1, `menu_updated_date` = \'2021-05-18 14:37:34\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'145\''),
(346, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'58\',\'aey\',\'118\',\'superadmin\',\'4\')'),
(347, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',\'4\',9,\'njdk\',\'21\',\'superadmin\',\'2\',\'20000\',\'2000\')'),
(348, 1, 'DELETE FROM `tbl_po`\nWHERE `id_po` = \'9\''),
(349, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-05-19\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'58\''),
(350, 1, 'UPDATE `tbl_barang` SET `id_tipe_barang` = \'9\', `id_satuan` = \'2\', `kode_barang` = \'AW002\', `nama_barang` = \'AD BOARD 280 HG\', `min_stock` = \'1\', `max_stock` = \'100\', `barang_updated_date` = \'2021-05-19 15:58:13\', `barang_updated_by` = \'superadmin\'\nWHERE `no_urut` = \'21\''),
(351, 1, 'DELETE FROM `tbl_po`\nWHERE `id_po` = \'10\''),
(352, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',\'4\',11,\'-\',\'25\',\'superadmin\',\'6\',\'600000\',\'0\')'),
(353, 1, 'UPDATE `tbl_barang` SET `id_tipe_barang` = \'7\', `id_satuan` = \'2\', `kode_barang` = \'AW077\', `nama_barang` = \'SPECIAL ELEKTRONIK 1500\', `min_stock` = \'1\', `max_stock` = \'100\', `barang_updated_date` = \'2021-05-20 09:16:47\', `barang_updated_by` = \'superadmin\'\nWHERE `no_urut` = \'15\''),
(354, 1, 'UPDATE `tbl_barang` SET `id_tipe_barang` = \'7\', `id_satuan` = \'2\', `kode_barang` = \'AW077\', `nama_barang` = \'SPECIAL ELEKTRONIK 1500\', `min_stock` = \'1\', `max_stock` = \'200\', `barang_updated_date` = \'2021-05-20 09:16:56\', `barang_updated_by` = \'superadmin\'\nWHERE `no_urut` = \'15\''),
(355, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'9\',\'Barang Mahal\',\'76\',\'superadmin\',\'52\')'),
(356, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'10\',\'LCD Baru\',\'28\',\'superadmin\',\'3\')'),
(357, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'10\',\'Barang Baru\',\'28\',\'superadmin\',\'3\')'),
(358, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'8\',\'LCD Baru\',\'134\',\'superadmin\',\'100\')'),
(359, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'5\',\'Ini nama teknisinya si Ade\',\'30\',\'superadmin\',\'10\'), (\'5\',\'Ini nama teknisinya si Ade\',\'54\',\'superadmin\',\'25\')'),
(360, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',1,1,\'Printer\',\'20\',\'superadmin\',\'6\',\'60000\',\'6000\')'),
(361, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'80000\',1,2,\'test\',\'27\',\'superadmin\',\'2\',\'160000\',\'0\')'),
(362, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'400000\',1,3,\'Power Supply\',\'164\',\'superadmin\',\'50\',\'20000000\',\'2000000\')'),
(363, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',1,4,\'test\',\'29\',\'superadmin\',\'5\',\'50000\',\'5000\')'),
(364, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'20000\',1,5,\'Barang Murah Terjangkau\',\'169\',\'superadmin\',\'20\',\'400000\',\'0\'), (\'30000\',1,5,\'Barang Lumayan Murah\',\'26\',\'superadmin\',\'40\',\'1200000\',\'0\'), (\'1000000\',1,5,\'Brang Mahal ini\',\'64\',\'superadmin\',\'5\',\'5000000\',\'0\')'),
(365, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (11,\'Keterangan - 1\',\'23\',\'superadmin\',\'10\'), (11,\'Keterangan - 2\',\'30\',\'superadmin\',\'15\'), (11,\'Keterangan - 3\',\'14\',\'superadmin\',\'20\'), (11,\'Keterangan - 4\',\'157\',\'superadmin\',\'25\')'),
(366, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (12,\'DAS\',\'29\',\'superadmin\',\'2\')'),
(367, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'12\''),
(368, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'11\''),
(369, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'5\''),
(370, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'10\''),
(371, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'8\''),
(372, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'9\''),
(373, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (13,\'Test - 1\',\'120\',\'superadmin\',\'20\'), (13,\'Test - 2\',\'19\',\'superadmin\',\'10\'), (13,\'Test - 3\',\'166\',\'superadmin\',\'12\'), (13,\'Test - 4\',\'86\',\'superadmin\',\'14\')'),
(374, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (14,\'asdas\',\'28\',\'superadmin\',\'52\')'),
(375, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Test\', \'Test\', \'0\', \'1\', 1, \'superadmin\')'),
(376, 1, 'DELETE FROM `tbl_user_menu`\nWHERE `id_menu` = \'178\''),
(377, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Test\', \'#\', \'0\', \'1\', 1, \'superadmin\')'),
(378, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (59,\'asda\',\'30\',\'superadmin\',\'3\')'),
(379, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'14\''),
(380, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'13\''),
(381, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (15,\'as\',\'30\',\'superadmin\',\'2\')'),
(382, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (16,\'qqq\',\'24\',\'superadmin\',\'22\')'),
(383, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (17,\'aaza\',\'29\',\'superadmin\',\'8\'), (17,\'aaa\',\'32\',\'superadmin\',\'99\')'),
(384, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (18,\'aaas\',\'141\',\'superadmin\',\'18\')'),
(385, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'18\',\'aaas\',\'141\',\'superadmin\',\'18\'), (\'18\',\'dsd\',\'172\',\'superadmin\',\'15\'), (\'18\',\'ewew\',\'173\',\'superadmin\',\'45\'), (\'18\',\'eggg\',\'23\',\'superadmin\',\'23\')'),
(386, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (19,\'LCD Baru\',\'27\',\'superadmin\',\'10\')'),
(387, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (20,\'\',\'--Pilih Items--\',\'superadmin\',\'0\')'),
(388, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'19\''),
(389, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (21,\'ssss\',\'25\',\'superadmin\',\'55\'), (21,\'dfd\',\'31\',\'superadmin\',\'98\')'),
(390, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'18\''),
(391, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'17\''),
(392, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'16\''),
(393, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'21\''),
(394, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'15\''),
(395, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (22,\'Keterangan - 1\',\'14\',\'superadmin\',\'10\'), (22,\'Keterangan - 2\',\'128\',\'superadmin\',\'50\'), (22,\'Keterangan - 3\',\'117\',\'superadmin\',\'35\')'),
(396, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (23,\'sdsds\',\'29\',\'superadmin\',\'44\')'),
(397, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'23\''),
(398, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'22\''),
(399, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (24,\'asdsd\',\'19\',\'superadmin\',\'53\')'),
(400, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (25,\'fhf\',\'23\',\'superadmin\',\'45\')'),
(401, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'24\''),
(402, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'25\''),
(403, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (26,\'sada\',\'27\',\'superadmin\',\'6\'), (26,\'asdsa\',\'26\',\'superadmin\',\'555\')'),
(404, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'26\''),
(405, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (27,\'SDS\',\'27\',\'superadmin\',\'2\')'),
(406, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'27\''),
(407, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (28,\'gf\',\'25\',\'superadmin\',\'6\')'),
(408, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (29,\'sdsd\',\'25\',\'superadmin\',\'2\'), (29,\'dfdf\',\'25\',\'superadmin\',\'23\')'),
(409, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'29\''),
(410, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'28\''),
(411, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (30,\'asa\',\'76\',\'superadmin\',\'56\')'),
(412, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'30\''),
(413, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (31,\'Keterangan - 1\',\'28\',\'superadmin\',\'23\')'),
(414, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (32,\'asa\',\'26\',\'superadmin\',\'23\')'),
(415, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (33,\'fs\',\'23\',\'superadmin\',\'23\')'),
(416, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'33\''),
(417, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',1,6,\'i\',\'29\',\'superadmin\',\'21\',\'210000\',\'21000\')'),
(418, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'4\', \'5441\', \'2021-06-10\', \'2021\', \'3600\', \'superadmin\')'),
(419, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'3.00\',\'1\',\'8\',\'-\',\'21\',\'superadmin\',\'2021-06-11\',\'2\',\'90000.00\',\'0.00\'), (\'50000.00\',\'4\',\'8\',\'-\',\'18\',\'superadmin\',\'2021-06-11\',\'5\',\'250000.00\',\'0.00\')'),
(420, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'100000.00\',\'4\',\'11\',\'-\',\'25\',\'superadmin\',\'2021-06-11\',\'6\',\'600000.00\',\'0.00\')'),
(421, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',1,7,\'-\',\'17\',\'superadmin\',\'2\',\'20000\',\'0\')'),
(422, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'58\',\'qwerty\',\'118\',\'superadmin\',\'4\')'),
(423, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'3\''),
(424, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'2\''),
(425, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (34,\'-\',\'28\',\'superadmin\',\'4\')'),
(426, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'29\''),
(427, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'33\''),
(428, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'32\''),
(429, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'31\''),
(430, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',46,\'test\',\'1\',\'28\',\'1\'), (\'1\',46,\'test2\',\'1\',\'30\',\'1\')'),
(431, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'44\''),
(432, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'45\''),
(433, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'41\''),
(434, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'46\',\'\',\'1\',\'28\',\'1\'), (\'1\',\'46\',\'\',\'1\',\'30\',\'1\')'),
(435, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'36\''),
(436, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'35\''),
(437, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'2\',\'46\',\'\',\'2\',\'28\',\'1\'), (\'2\',\'46\',\'\',\'2\',\'30\',\'1\')'),
(438, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'40\''),
(439, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'39\''),
(440, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'38\''),
(441, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'37\''),
(442, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'7\',47,\'Barang Mahal Ini\',\'3\',\'14\',\'1\'), (\'6\',47,\'Barang Agak Mahal\',\'4\',\'156\',\'1\'), (\'4\',47,\'Barang Murah Ini\',\'5\',\'145\',\'1\')'),
(443, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'7\',\'47\',\'\',\'3\',\'14\',\'1\'), (\'6\',\'47\',\'\',\'4\',\'156\',\'1\'), (\'4\',\'47\',\'\',\'5\',\'145\',\'1\')'),
(444, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'2\',\'46\',\'\',\'2\',\'28\',\'1\'), (\'2\',\'46\',\'\',\'2\',\'30\',\'1\')'),
(445, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'36\''),
(446, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'35\''),
(447, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (38,\'-\',\'30\',\'superadmin\',\'3\')'),
(448, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'37\''),
(449, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'38\''),
(450, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (39,\'-\',\'26\',\'superadmin\',\'1\')'),
(451, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (40,\'-\',\'29\',\'superadmin\',\'1\')'),
(452, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'2\',48,\'test\',\'2\',\'148\',\'1\'), (\'3\',48,\'Test2\',\'1\',\'135\',\'1\')'),
(453, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'3\',49,\'test3\',\'2\',\'172\',\'1\')'),
(454, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'3\',50,\'test3\',\'2\',\'172\',\'1\')'),
(455, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'2\',51,\'test\',\'3\',\'28\',\'1\')'),
(456, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'6\',52,\'-\',\'2\',\'26\',\'1\')'),
(457, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'300000\',1,8,\'test\',\'26\',\'superadmin\',\'2\',\'600000\',\'60000\')'),
(458, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'4\',53,\'-\',\'6\',\'79\',\'1\')'),
(459, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'53\''),
(460, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,9,\'-\',\'23\',\'superadmin\',\'2\',\'200000\',\'20000\')'),
(461, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'6\',\'52\',\'\',\'2\',\'26\',\'1\'), (\'7\',\'52\',\'Barang Mahal Ini\',\'3\',\'20\',\'1\')'),
(462, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'6\',\'52\',\'\',\'2\',\'26\',\'1\'), (\'7\',\'52\',\'\',\'3\',\'20\',\'1\'), (\'1\',\'52\',\'-\',\'7\',\'19\',\'1\')'),
(463, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (60,\'test\',\'28\',\'superadmin\',\'2\'), (60,\'test3\',\'20\',\'superadmin\',\'1\')'),
(464, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'100000.00\',\'4\',\'11\',\'-\',\'25\',\'superadmin\',\'2021-06-23\',\'6\',\'600000.00\',\'0.00\')'),
(465, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'100000.00\',\'4\',\'11\',\'-\',\'25\',\'superadmin\',\'2021-06-23\',\'6\',\'600000.00\',\'0.00\')'),
(466, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'100000.00\',\'4\',\'11\',\'-\',\'25\',\'superadmin\',\'2021-06-23\',\'2\',\'200000\',\'20000\')'),
(467, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,10,\'-\',\'27\',\'superadmin\',\'2\',\'200000\',\'0\')'),
(468, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'100000.00\',\'4\',\'11\',\'-\',\'25\',\'superadmin\',\'2021-06-23\',\'2\',\'200000.00\',\'20000.00\')'),
(469, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,12,\'test\',\'25\',\'superadmin\',\'2\',\'200000\',\'0\')'),
(470, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'1000000\',1,13,\'test\',\'20\',\'superadmin\',\'2\',\'2000000\',\'200000\')'),
(471, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'1000000\',\'1\',\'13\',\'test\',\'20\',\'1\',\'2021-06-23\',\'2\',\'2\',\'200000\')'),
(472, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'1000000\',\'1\',\'13\',\'test\',\'20\',\'1\',\'2021-06-23\',\'7\',\'2\',\'10500000000\')'),
(473, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,14,\'test\',\'19\',\'superadmin\',\'2\',\'200000\',\'0\')'),
(474, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',1,20,\'ok\',\'17\',\'superadmin\',\'1\',\'0\',\'0\')'),
(475, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'2000000\',1,21,\'-\',\'26\',\'superadmin\',\'1\',\'2000000\',\'200000\')'),
(476, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'2000000\',\'1\',\'21\',\'-\',\'26\',\'1\',\'2021-06-23\',\'1\',\'2\',\'200000\')'),
(477, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'2000000\',\'1\',\'21\',\'-\',\'26\',\'1\',\'2021-06-23\',\'1\',\'2\',\'200000\'), (\'3000000\',\'1\',\'21\',\'-\',\'171\',\'1\',\'2021-06-23\',\'1\',\'2\',\'4500000000\')'),
(478, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'1000000\',1,23,\'ok\',\'24\',\'superadmin\',\'2\',\'2000000\',\'0\')'),
(479, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'15000\',1,30,\'Barang Mahal Ini\',\'162\',\'1\',\'100\',\'1500000\',\'150000\')'),
(480, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'15000\',\'1\',\'30\',\'Barang Mahal Ini\',\'157\',\'1\',\'2021-06-24\',\'100\',\'1\',\'150000\')'),
(481, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'20000\',1,31,\'test\',\'27\',\'1\',\'3\',\'60000\',\'6000\'), (\'50000\',1,31,\'ok\',\'27\',\'1\',\'2\',\'100000\',\'10000\')'),
(482, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'40000\',\'1\',\'31\',\'ok\',\'102\',\'1\',\'2021-06-24\',\'10\',\'1\',\'600000000\')'),
(483, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'52\''),
(484, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'30\''),
(485, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'21\''),
(486, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'22\''),
(487, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'27\''),
(488, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'23\''),
(489, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'24\''),
(490, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'25\''),
(491, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'26\''),
(492, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'29\''),
(493, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'28\''),
(494, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'31\''),
(495, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'50000\',1,32,\'Detail Item-1\',\'107\',\'1\',\'2\',\'100000\',\'0\')'),
(496, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,33,\'Detail Item-2\',\'92\',\'1\',\'10\',\'1000000\',\'100000\')'),
(497, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'200000\',1,34,\'Detail Item-3\',\'14\',\'1\',\'5\',\'1000000\',\'100000\'), (\'150000\',1,34,\'Detail Item-4\',\'97\',\'1\',\'6\',\'900000\',\'90000\'), (\'400000\',1,34,\'Detail Item-5\',\'156\',\'1\',\'3\',\'1200000\',\'120000\'), (\'1000000\',1,34,\'Detail Item-6\',\'20\',\'1\',\'9\',\'9000000\',\'900000\')'),
(498, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'200000\',\'1\',\'34\',\'Detail Item-3\',\'14\',\'1\',\'2021-06-24\',\'5\',\'1\',\'100000\'), (\'150000\',\'1\',\'34\',\'Detail Item-4\',\'97\',\'1\',\'2021-06-24\',\'6\',\'3\',\'90000\'), (\'400000\',\'1\',\'34\',\'Detail Item-5\',\'156\',\'1\',\'2021-06-24\',\'3\',\'3\',\'120000\'), (\'1000000\',\'1\',\'34\',\'Detail Item-6\',\'20\',\'1\',\'2021-06-24\',\'9\',\'1\',\'900000\')'),
(499, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (41,\'Keterangan - 1\',\'105\',\'superadmin\',\'2\'), (41,\'Keterangan - 1\',\'111\',\'superadmin\',\'4\')'),
(500, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'31\''),
(501, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'32\''),
(502, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'34\''),
(503, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'39\''),
(504, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'40\''),
(505, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'41\''),
(506, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (42,\'Detail Item-1\',\'21\',\'superadmin\',\'2\')'),
(507, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (43,\'Detail Item-2\',\'112\',\'superadmin\',\'52\'), (43,\'Detail Item-3\',\'171\',\'superadmin\',\'4\')'),
(508, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (44,\'Detail Item-4\',\'98\',\'superadmin\',\'70\'), (44,\'Detail Item-5\',\'120\',\'superadmin\',\'10\')'),
(509, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (45,\'Detail Item-5\',\'124\',\'superadmin\',\'30\')'),
(510, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (46,\'Detail Item-6\',\'170\',\'superadmin\',\'11\'), (46,\'Detail Item-7\',\'171\',\'superadmin\',\'15\'), (46,\'Detail Item-8\',\'170\',\'superadmin\',\'100\'), (46,\'Detail Item-9\',\'169\',\'superadmin\',\'22\'), (46,\'Detail Item-10\',\'111\',\'superadmin\',\'51\')'),
(511, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'51\''),
(512, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'50\''),
(513, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'49\''),
(514, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'48\''),
(515, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'47\''),
(516, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'46\''),
(517, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (61,\'test\',\'16\',\'superadmin\',\'4\')'),
(518, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'61\',\'test\',\'16\',\'superadmin\',\'4\')'),
(519, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (62,\'-\',\'27\',\'superadmin\',\'2\')'),
(520, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (63,\'test\',\'24\',\'superadmin\',\'2\')'),
(521, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'62\''),
(522, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'63\''),
(523, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'61\''),
(524, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'60\''),
(525, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'59\''),
(526, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'4\',54,\'ok\',\'3\',\'105\',\'1\')'),
(527, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'54\''),
(528, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'7\',55,\'Detail Item-1\',\'2\',\'164\',\'1\')'),
(529, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'4\',56,\'Detail Item-2\',\'3\',\'133\',\'1\'), (\'9\',56,\'Detail Item-3\',\'8\',\'165\',\'1\')'),
(530, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'12\',57,\'Detail Item-4\',\'5\',\'162\',\'1\'), (\'6\',57,\'Detail Item-5\',\'4\',\'88\',\'1\')'),
(531, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'57\',\'---\',\'173\',\'superadmin\',\'3\')'),
(532, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (64,\'test\',\'27\',\'superadmin\',\'3\')'),
(533, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (65,\'test\',\'27\',\'superadmin\',\'3\')'),
(534, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'57\''),
(535, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'64\''),
(536, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (66,\'-\',\'30\',\'superadmin\',\'1\')'),
(537, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (67,\'Printer\',\'16\',\'superadmin\',\'2\')'),
(538, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (68,\'test\',\'33\',\'superadmin\',\'3\')'),
(539, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (69,\'test\',\'26\',\'superadmin\',\'3\')'),
(540, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (70,\'test\',\'30\',\'superadmin\',\'2\')'),
(541, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (71,\'ok\',\'109\',\'superadmin\',\'3\')'),
(542, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'68\',\'test3\',\'33\',\'superadmin\',\'3\')');
INSERT INTO `tbl_user_log` (`id_log`, `id_user`, `query`) VALUES
(543, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,35,\'ok\',\'95\',\'1\',\'3\',\'300000\',\'30000\')'),
(544, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'35\''),
(545, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (72,\'-\',\'30\',\'superadmin\',\'3\')'),
(546, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'68\''),
(547, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'69\''),
(548, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'70\''),
(549, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (73,\'-\',\'27\',\'superadmin\',\'10\')'),
(550, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (74,\'ok\',\'26\',\'superadmin\',\'3\')'),
(551, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (75,\'ok\',\'29\',\'superadmin\',\'2\')'),
(552, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (80,\'Printer\',\'31\',\'superadmin\',\'1\')'),
(553, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'76\''),
(554, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'77\''),
(555, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'78\''),
(556, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'79\''),
(557, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'80\''),
(558, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (81,\'test\',\'82\',\'superadmin\',\'100\')'),
(559, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (82,\'-\',\'29\',\'superadmin\',\'2\')'),
(560, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'71\''),
(561, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'72\''),
(562, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'73\''),
(563, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'82\''),
(564, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'75\''),
(565, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (83,\'-\',\'30\',\'superadmin\',\'500\')'),
(566, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (84,\'ok\',\'136\',\'superadmin\',\'3\'), (84,\'test\',\'171\',\'superadmin\',\'1\')'),
(567, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (85,\'asa\',\'25\',\'superadmin\',\'3\')'),
(568, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (86,\'test\',\'136\',\'superadmin\',\'3\')'),
(569, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (87,\'test\',\'171\',\'superadmin\',\'100\')'),
(570, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'86\''),
(571, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'85\''),
(572, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'84\''),
(573, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'83\''),
(574, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'81\''),
(575, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'87\''),
(576, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (88,\'Keterangan-1\',\'162\',\'superadmin\',\'100\'), (88,\'Keterangan-2\',\'35\',\'superadmin\',\'52\')'),
(577, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (89,\'Keterangan-2\',\'98\',\'superadmin\',\'40\')'),
(578, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'88\',\'Keterangan-1\',\'162\',\'superadmin\',\'100\'), (\'88\',\'Keterangan-2\',\'35\',\'superadmin\',\'52\')'),
(579, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (90,\'Keterangan-4\',\'58\',\'superadmin\',\'20\'), (90,\'Keterangan-5\',\'26\',\'superadmin\',\'70\'), (90,\'Keterangan-6\',\'86\',\'superadmin\',\'100\')'),
(580, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (91,\'Keterangan-7\',\'96\',\'superadmin\',\'45\'), (91,\'Keterangan-8\',\'171\',\'superadmin\',\'95\')'),
(581, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,36,\'test\',\'33\',\'1\',\'2\',\'200000\',\'20000\')'),
(582, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'200000\',1,37,\'ok\',\'28\',\'1\',\'2\',\'400000\',\'0\')'),
(583, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'200000\',1,38,\'-\',\'58\',\'1\',\'2\',\'400000\',\'40000\')'),
(584, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'500000\',1,39,\'-\',\'22\',\'1\',\'2\',\'1000000\',\'100000\')'),
(585, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,40,\'ok\',\'103\',\'1\',\'7\',\'700000\',\'0\')'),
(586, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'36\''),
(587, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'34\''),
(588, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'33\''),
(589, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'32\''),
(590, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'15000\',\'4\',12,\'-\',\'23\',\'superadmin\',\'2\',\'30000\',\'3000\')'),
(591, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-06-29\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'91\''),
(592, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-06-29\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'90\''),
(593, 1, 'DELETE FROM `tbl_pembelian`\nWHERE `id_pembelian` = \'37\''),
(594, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_updated_by`, `pembelian_det_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'200000\',\'1\',\'38\',\'-\',\'58\',\'1\',\'2021-06-29\',\'2\',\'4\',\'40000\')'),
(595, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'100000\',1,41,\'test\',\'112\',\'1\',\'2\',\'200000\',\'0\')'),
(596, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'89\',\'Keterangan-2\',\'96\',\'superadmin\',\'40\')'),
(597, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'89\',\'Keterangan-2\',\'77\',\'superadmin\',\'40\')'),
(598, 1, 'INSERT INTO `tbl_pembelian_det` (`harga_satuan`, `id_det_currency`, `id_pembelian`, `keterangan`, `no_urut`, `pembelian_det_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'50000\',1,42,\'Kabel Data\',\'32\',\'1\',\'1\',\'50000\',\'5000\'), (\'50000\',1,42,\'Kabel Konektor\',\'34\',\'1\',\'1\',\'50000\',\'5000\'), (\'2000\',1,42,\'Kaset\',\'26\',\'1\',\'2\',\'4000\',\'0\')'),
(599, 1, 'INSERT INTO `tbl_pemenuhan_det` (`harga_satuan`, `id_pemenuhan`, `keterangan`, `no_urut`, `qty`, `total`, `totalppn`) VALUES (\'5000\',\'3\',\'asdasdasd\',\'25\',\'1\',\'5000\',\'0\')'),
(600, 1, 'INSERT INTO `tbl_pemenuhan_det` (`harga_satuan`, `id_pemenuhan`, `keterangan`, `no_urut`, `qty`, `total`, `totalppn`) VALUES (\'5000\',\'3\',\'Satu\',\'17\',\'1\',\'5000\',\'500\'), (\'5000\',\'3\',\'Dua\',\'32\',\'2\',\'10000\',\'1000\')'),
(601, 1, 'INSERT INTO `tbl_pemenuhan_det` (`harga_satuan`, `id_pemenuhan`, `keterangan`, `no_urut`, `qty`, `total`, `totalppn`) VALUES (\'10000\',\'3\',\'Satu\',\'16\',\'1\',\'10000\',\'1000\'), (\'5000\',\'3\',\'Dua\',\'30\',\'2\',\'10000\',\'1000\')'),
(602, 1, 'INSERT INTO `tbl_pemenuhan_det` (`harga_satuan`, `id_pemenuhan`, `keterangan`, `no_urut`, `qty`, `total`, `totalppn`) VALUES (\'5000\',\'3\',\'tes\',\'14\',\'1\',\'5000\',\'500\')'),
(603, 1, 'INSERT INTO `tbl_pemenuhan_det` (`harga_satuan`, `id_pemenuhan`, `keterangan`, `no_urut`, `qty`, `total`, `totalppn`) VALUES (\'50000\',\'3\',\'lcd\',\'14\',\'1\',\'50000\',\'5000\'), (\'500\',\'3\',\'spesial\',\'15\',\'1\',\'500\',\'50\')'),
(604, 1, 'UPDATE `tbl_perbaikan` SET `tanggal_perbaikan` = \'2021-07-07\', `catatan_perbaikan` = \'Tessss\', `stat_perbaikan` = \'\'\nWHERE `id_perbaikanbarang` = \'1\''),
(605, 1, 'UPDATE `tbl_perbaikan` SET `tanggal_perbaikan` = \'2021-07-07\', `catatan_perbaikan` = \'Barang Pertama\', `stat_perbaikan` = \'\'\nWHERE `id_perbaikanbarang` = \'1\''),
(606, 1, 'UPDATE `tbl_perbaikan` SET `tanggal_perbaikan` = \'2021-07-07\', `catatan_perbaikan` = \'Barang Kedua sudah QC brow.\', `stat_perbaikan` = \'\'\nWHERE `id_perbaikanbarang` = \'2\''),
(607, 1, 'UPDATE `tbl_perbaikan` SET `tanggal_perbaikan` = \'2021-07-07\', `catatan_perbaikan` = \'Barang Kedua sudah QC brow.\', `stat_perbaikan` = \'\'\nWHERE `id_perbaikanbarang` = \'2\''),
(608, 1, 'UPDATE `tbl_perbaikan` SET `tanggal_perbaikan` = \'2021-07-07\', `catatan_perbaikan` = \'Barang Kedua sudah QC brow.\', `stat_perbaikan` = \'1\'\nWHERE `id_perbaikanbarang` = \'2\''),
(609, 1, 'UPDATE `tbl_perbaikan` SET `tanggal_perbaikan` = \'2021-07-07\', `catatan_perbaikan` = \'Barang pertama belum QC breee.\', `stat_perbaikan` = \'0\'\nWHERE `id_perbaikanbarang` = \'1\''),
(610, 1, 'INSERT INTO `tbl_pemenuhan_det` (`harga_satuan`, `id_pemenuhan`, `keterangan`, `no_urut`, `qty`, `total`, `totalppn`) VALUES (\'500\',\'4\',\'Pemdet Kedua\',\'32\',\'1\',\'500\',\'0\'), (\'1000\',\'4\',\'PemdetKedua\',\'33\',\'1\',\'1000\',\'0\')'),
(611, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\'\nWHERE `no_sn` = \'\''),
(612, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tesupdate\'\nWHERE `id_pemenuhan` = \'4\''),
(613, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'1\'\nWHERE `no_sn` = \'\''),
(614, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tesupdate22\'\nWHERE `id_pemenuhan` = \'4\''),
(615, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'1\'\nWHERE `no_sn` = \'\''),
(616, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tesupdate223123\'\nWHERE `id_pemenuhan` = \'4\''),
(617, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\'\nWHERE `no_sn` = \'\''),
(618, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tes\'\nWHERE `id_pemenuhan` = \'4\''),
(619, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\'\nWHERE `no_sn` = \'\''),
(620, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tes111\'\nWHERE `id_pemenuhan` = \'4\''),
(621, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\'\nWHERE `no_sn` = \'\''),
(622, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tes\'\nWHERE `id_pemenuhan` = \'4\''),
(623, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\'\nWHERE `no_sn` = \'SN10027\''),
(624, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tes1\'\nWHERE `id_pemenuhan` = \'4\''),
(625, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'\'\nWHERE `no_sn` = \'SN10027\''),
(626, 1, 'UPDATE `tbl_pemenuhan` SET `keterangan` = \'Tes update\', `status_balik` = \'1\'\nWHERE `id_pemenuhan` = \'4\''),
(627, 1, 'UPDATE `tbl_pemenuhan_det` SET 1 = \'\'\nWHERE `id_pemenuhan` = \'4\''),
(628, 1, 'UPDATE `tbl_pemenuhan_det` SET `status_pembukuan` = 1\nWHERE `id_pemenuhan` = \'4\''),
(629, 1, 'UPDATE `tbl_pemenuhan_det` SET `status_pembukuan` = 1\nWHERE `id_pemenuhan` = \'4\''),
(630, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',58,\'Item 1 Ganteng\',\'1\',\'25\',\'1\'), (\'1\',58,\'Item 2 Tampan\',\'2\',\'31\',\'1\')'),
(631, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN50023\', `tgl_qc` = \'2021-05-05\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 0, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 0, `ket` = \'\', `barang_updated_date` = \'2021-07-29 10:40:37\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'187\''),
(632, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (\'46\',\'Detail Item-6\',\'170\',\'superadmin\',\'11\'), (\'46\',\'Detail Item-7\',\'171\',\'superadmin\',\'15\'), (\'46\',\'Detail Item-8\',\'170\',\'superadmin\',\'100\'), (\'46\',\'Detail Item-9\',\'169\',\'superadmin\',\'22\')'),
(633, 1, 'UPDATE `tbl_user` SET `id_uker` = \'1\', `username` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(634, 1, 'UPDATE `tbl_user_pegawai` SET `id_user` = \'1\', `nama_pegawai` = \'Superadmin Pusat\', `alamat_pegawai` = \'-\', `jk` = \'L\', `telp` = \'0001\', `email` = \'pusat@gmail.com\', `pegawai_updated_date` = \'2021-07-29 10:46:33\', `pegawai_updated_by` = \'superadmin\'\nWHERE `id_user` = \'1\''),
(635, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',\'4\',13,\'Kabel leptop\',\'32\',\'superadmin\',\'1\',\'10000\',\'1000\'), (\'50000\',\'4\',13,\'alus weh\',\'25\',\'superadmin\',\'2\',\'100000\',\'0\')'),
(636, 1, 'DELETE FROM `tbl_po`\nWHERE `id_po` = \'13\''),
(637, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'2\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'2\',\'0\',\'PGRM0001/VI/2021\',\'5\',\'166\',0,\'2021-06-24\')'),
(638, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'50000\',\'3\',\'3\',0,\'56\',\'2\',\'2\',\'1\',\'PGRM0002/VI/2021\',\'512\',\'133\',1,\'2021-06-24\'), (\'30000\',\'3\',\'3\',0,\'56\',\'2\',\'2\',\'1\',\'PGRM0002/VI/2021\',\'602\',\'165\',1,\'2021-06-24\')'),
(639, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'\''),
(640, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'\''),
(641, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(642, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'\',0,\'55\',\'\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'\'), (\'1000\',\'3\',\'\',0,\'55\',\'\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'\'), (\'5000\',\'3\',\'\',0,\'55\',\'\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'\')'),
(643, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(644, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'2021-06-24\')'),
(645, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'58\''),
(646, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'56\''),
(647, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'3\',59,\'Supra X\',\'1\',\'72\',\'1\')'),
(648, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(649, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'2021-06-24\')'),
(650, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(651, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'2021-06-24\')'),
(652, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(653, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `status_penerimaan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',\'1\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',\'1\',0,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',\'1\',0,\'2021-06-24\')'),
(654, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(655, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `status_penerimaan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',\'1\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',\'1\',0,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',\'1\',0,\'2021-06-24\')'),
(656, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(657, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `status_penerimaan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',\'1\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',\'1\',0,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',\'1\',0,\'2021-06-24\')'),
(658, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(659, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `status_penerimaan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',\'1\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',\'1\',0,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',\'1\',0,\'2021-06-24\')'),
(660, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (92,\'cba\',\'33\',\'superadmin\',\'1\')'),
(661, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'92\',\'ngok\',\'27\',\'superadmin\',\'2\')'),
(662, 1, 'DELETE FROM `tbl_permintaan_barang`\nWHERE `id_permintaan` = \'92\''),
(663, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'300000\',\'4\',14,\'Mie ayam pak dhe\',\'24\',\'superadmin\',\'1\',\'300000\',\'30000\'), (\'2000\',\'4\',14,\'Kabel Data YM\',\'32\',\'superadmin\',\'3\',\'6000\',\'0\')'),
(664, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'8\', `tanggal_invoice` = \'2021-08-08\', `tanggal_terima` = \'2021-08-08\', `no_invoice` = \'1\', `nilai_invoice` = \'10000\', `beban` = 1, `tahap_tagihan` = 0, `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 1, `lain_lain` = 0\nWHERE `id_invoice` = \'1\''),
(665, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'8\', `tanggal_invoice` = \'2021-08-08\', `tanggal_terima` = \'2021-08-08\', `no_invoice` = \'001\', `nilai_invoice` = \'10000\', `beban` = 0, `tahap_tagihan` = 1, `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 1, `lain_lain` = 0\nWHERE `id_invoice` = \'1\''),
(666, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'8\', `tanggal_invoice` = \'2021-08-09\', `tanggal_terima` = \'2021-08-09\', `no_invoice` = \'001\', `nilai_invoice` = \'500000\', `beban` = 1, `tahap_tagihan` = 0, `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 1, `lain_lain` = 0\nWHERE `id_invoice` = \'1\''),
(667, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'11\', \'2021-08-06\', \'2021-08-06\', \'666\', \'100000\', 0, 0, 1, 1, 1, 1, 1, 1, 1, 0)'),
(668, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'11\', `tanggal_invoice` = \'2021-08-06\', `tanggal_terima` = \'2021-08-06\', `no_invoice` = \'666\', `nilai_invoice` = \'100000\', `beban` = 1, `tahap_tagihan` = 0, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0\nWHERE `id_invoice` = \'4\''),
(669, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'4\''),
(670, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_urut`, `qty`, `totalppn`) VALUES (\'1000\',\'46\',\'Detail Item-6\',\'170\',\'11\',\'0\'), (\'1\',\'46\',\'Detail Item-7\',\'171\',\'15\',\'0\'), (\'200\',\'46\',\'Detail Item-8\',\'170\',\'100\',\'2000\'), (\'1\',\'46\',\'Detail Item-9\',\'169\',\'22\',\'0\')'),
(671, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_urut`, `qty`, `totalppn`) VALUES (\'1000\',\'46\',\'Detail Item-6\',\'170\',\'11\',\'0\'), (\'1\',\'46\',\'Detail Item-7\',\'171\',\'15\',\'0\'), (\'200\',\'46\',\'Detail Item-8\',\'170\',\'100\',\'2000\'), (\'1\',\'46\',\'Detail Item-9\',\'169\',\'22\',\'0\')'),
(672, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_urut`, `qty`, `totalppn`) VALUES (\'\',\'46\',\'Detail Item-6\',\'170\',\'11\',\'\'), (\'\',\'46\',\'Detail Item-7\',\'171\',\'15\',\'\'), (\'\',\'46\',\'Detail Item-8\',\'170\',\'100\',\'\'), (\'\',\'46\',\'Detail Item-9\',\'169\',\'22\',\'\')'),
(673, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_urut`, `qty`, `totalppn`) VALUES (\'100\',\'46\',\'Detail Item-6\',\'170\',\'11\',\'0\'), (\'1\',\'46\',\'Detail Item-7\',\'171\',\'15\',\'0\'), (\'200\',\'46\',\'Detail Item-8\',\'170\',\'100\',\'2000\'), (\'1\',\'46\',\'Detail Item-9\',\'169\',\'22\',\'0\')'),
(674, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (47,\'BMU cuy\',\'25\',\'superadmin\',\'1\'), (47,\'Type C\',\'32\',\'superadmin\',\'1\')'),
(675, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'100000\',\'47\',\'BMU cuy\',\'25\',\'1\',\'1\',\'10000\'), (\'2000\',\'47\',\'Type C\',\'32\',\'1\',\'1\',\'0\')'),
(676, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'100000\',\'47\',\'BMU cuy\',\'SN1\',\'25\',\'1\',\'1\',\'10000\'), (\'2000\',\'47\',\'Type C\',\'SN2\',\'32\',\'1\',\'1\',\'0\')'),
(677, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'100000\',\'47\',\'BMU cuy\',\'SN1\',\'25\',\'1\',\'1\',\'10000\'), (\'2000\',\'47\',\'Type C\',\'SN2\',\'32\',\'1\',\'1\',\'0\')'),
(678, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'100000\',\'47\',\'BMU cuy\',\'SN12\',\'25\',\'1\',\'1\',\'10000\'), (\'2000\',\'47\',\'Type C\',\'SN21\',\'32\',\'1\',\'1\',\'0\')'),
(679, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\'\nWHERE `id_stock` = \'15\''),
(680, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'15\'\nWHERE `id_pertek_det` = \'100\''),
(681, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-10\', `keterangan` = \'Gosong bos\'\nWHERE `id_stock` = \'15\''),
(682, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'15\'\nWHERE `id_pertek_det` = \'100\''),
(683, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `keterangan` = \'Good\'\nWHERE `id_stock` = \'16\''),
(684, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'16\'\nWHERE `id_pertek_det` = \'113\''),
(685, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `keterangan` = \'Good\'\nWHERE `id_stock` = \'16\''),
(686, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'16\'\nWHERE `id_pertek_det` = \'113\''),
(687, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'1\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `keterangan` = \'Good\'\nWHERE `id_stock` = \'16\''),
(688, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'16\'\nWHERE `id_pertek_det` = \'113\''),
(689, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `keterangan` = \'Cek\'\nWHERE `id_stock` = \'15\''),
(690, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'15\'\nWHERE `id_pertek_det` = \'100\''),
(691, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'1\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `keterangan` = \'Brey\'\nWHERE `id_stock` = \'16\''),
(692, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'16\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'113\''),
(693, 1, 'UPDATE `tbl_stock` SET `flag_barang` = \'0\', `flag_qc` = 0, `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `keterangan` = \'Rusak brek\'\nWHERE `id_stock` = \'15\''),
(694, 1, 'UPDATE `tbl_pertek_det` SET `id_stock` = \'15\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'100\''),
(695, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'47\''),
(696, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',1,\'0\',\'SN555\',\'16\')'),
(697, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',1,\'0\',\'SN555\',\'25\')'),
(698, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'100000\',1,\'0\',\'DMN5\',\'29\')'),
(699, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'900000\',2,\'1\',\'INV511\',\'61\')'),
(700, 1, 'DELETE FROM `tbl_pengirimankekp_det`\nWHERE `id_pengirimankekp` = \'1\''),
(701, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'100000\',3,\'0\',\'YJ-05\',\'14\')'),
(702, 1, 'DELETE FROM `tbl_pengirimankekp_det`\nWHERE `id_pengirimankekp` = \'3\''),
(703, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',\'3\',\'0\',\'YJ-666\',\'75\')'),
(704, 1, 'DELETE FROM `tbl_pengirimankekp_det`\nWHERE `id_pengirimankekp` = \'3\''),
(705, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',\'3\',\'0\',\'YJ-666\',\'75\')'),
(706, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'100000\',4,\'1\',\'BES-71\',\'28\')'),
(707, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'100000\',1,\'1\',1,1,0,1,\'1\',\'JNE\',\'BES-71\',\'28\',\'2021-08-14\')'),
(708, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'1000\',5,\'1\',\'SN1111\',\'29\')'),
(709, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'1000\',1,\'1\',1,1,0,1,\'1\',\'JNE\',\'SN1111\',\'29\',\'2021-08-14\')'),
(710, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'1500\',1,\'0\',\'SN500\',\'28\')'),
(711, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'1500\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'SN500\',\'28\',\'2021-08-14\')'),
(712, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`) VALUES (\'-\',1)'),
(713, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',2,\'0\',\'ELK-150\',\'15\'), (\'1000\',2,\'1\',\'CD-500\',\'14\')'),
(714, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'ELK-150\',\'15\',\'2021-08-10\'), (\'1\',\'1000\',1,\'1\',1,1,0,1,\'1\',\'POS Indonesia\',\'CD-500\',\'14\',\'2021-08-10\')'),
(715, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengirimankekp`, `id_pengkekp_det`) VALUES (\'-\',2,2), (\'-\',2,2)'),
(716, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'1000\',3,\'0\',\'ADB-280\',\'21\'), (\'1000\',3,\'0\',\'MNT-280\',\'19\')'),
(717, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'1000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'ADB-280\',\'21\',\'2021-08-13\'), (\'1\',\'1000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'MNT-280\',\'19\',\'2021-08-13\')'),
(718, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengirimankekp`, `id_pengkekp_det`) VALUES (\'-\',3,3), (\'-\',3,4)'),
(719, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',1,\'0\',\'BC-100\',\'24\'), (\'5000\',1,\'1\',\'ELK-150\',\'15\')'),
(720, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'JNE\',\'BC-100\',\'24\',\'2021-08-10\'), (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'JNE\',\'ELK-150\',\'15\',\'2021-08-10\')'),
(721, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengirimankekp`, `id_pengkekp_det`) VALUES (\'-\',1,1), (\'-\',1,2)'),
(722, 1, 'DELETE FROM `tbl_pengirimankekp_det`\nWHERE `id_pengirimankekp` = \'1\''),
(723, 1, 'DELETE FROM `tbl_perbaikankcsp`\nWHERE `id_pengirimankekp` = \'1\''),
(724, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',1,\'0\',\'PRT-280\',\'20\'), (\'20000\',1,\'1\',\'BC-100\',\'26\')'),
(725, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'PRT-280\',\'20\',\'2021-08-10\'), (\'1\',\'20000\',1,\'1\',1,1,0,1,\'1\',\'POS Indonesia\',\'BC-100\',\'26\',\'2021-08-10\')'),
(726, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',1,\'0\',\'SN 555\',\'34\')'),
(727, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'Ninja Express\',\'SN 555\',\'34\',\'2021-08-13\')'),
(728, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengirimankekp`, `id_pengkekp_det`) VALUES (\'-\',1,1)'),
(729, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',2,\'0\',\'CCC 50\',\'34\'), (\'10000\',2,\'1\',\'CDS 10\',\'32\')'),
(730, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'RPX\',\'CCC 50\',\'34\',\'2021-08-10\'), (\'1\',\'10000\',1,\'1\',1,1,0,1,\'1\',\'RPX\',\'CDS 10\',\'32\',\'2021-08-10\')'),
(731, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengirimankekp`, `id_pengkekp_det`) VALUES (\'-\',2,2), (\'-\',2,3)'),
(732, 1, 'SELECT * FROM `tbl_perbaikankcsp` ORDER BY id_pengkekp_det DESC'),
(733, 1, 'DELETE FROM `tbl_perbaikankcsp`\nWHERE `id_pengirimankekp` = \'1\''),
(734, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-08-13\', `catatan_perbaikan` = \'Kabel kendor\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'2\''),
(735, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-08-13\', `catatan_perbaikan` = \'Barang sudah jelek\', `status_perbaikan` = \'2\'\nWHERE `id_pengkekp_det` = \'3\''),
(736, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-10\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'2\''),
(737, 1, 'SELECT * FROM `tbl_stock` WHERE no_sn = \'CCC 50\''),
(738, 1, 'INSERT INTO `tbl_stock` () VALUES (), (), (), (), (), (), ()'),
(739, 1, 'INSERT INTO `tbl_stock` (`no_urut`, `no_sn`, `harga_barang`, `flag_barang`, `flag_balikan`, `tanggal_balik`) VALUES (\'34\', \'CCC 50\', \'5000\', \'0\', 1, \'2021-08-10\')'),
(740, 1, 'UPDATE `tbl_stock` SET `no_urut` = \'34\', `no_sn` = \'CCC 50\', `harga_barang` = \'5000\', `flag_barang` = \'0\', `flag_balikan` = 1, `tanggal_balik` = \'2021-08-10\', `flag_qc` = 2, `flag_pakai` = 0, `flag_pembukuan` = 1, `flag_greenpart` = 0\nWHERE `no_sn` = \'CCC 50\''),
(741, 1, 'UPDATE `tbl_perbaikankcsp` SET `status_ph` = 1, `status_pembukuan` = 1, `catatan_perbaikan` = \'Barang jelek\'\nWHERE `id_pengkekp_det` = \'3\''),
(742, 1, 'UPDATE `tbl_perbaikankcsp` SET `status_ph` = 1, `status_pembukuan` = 1, `catatan_perbaikan` = \'Barang sudah jelek\'\nWHERE `id_pengkekp_det` = \'3\''),
(743, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(744, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `status_penerimaan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',\'1\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',\'1\',1,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',\'1\',1,\'2021-06-24\')'),
(745, 1, 'UPDATE `tbl_perbaikankcsp` SET `status_ph` = 1, `status_pembukuan` = 1, `catatan_perbaikan` = \'Barang sudah jelekkk\'\nWHERE `id_pengkekp_det` = \'3\''),
(746, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'8\', `tanggal_invoice` = \'2021-08-09\', `tanggal_terima` = \'2021-08-09\', `no_invoice` = \'001\', `nilai_invoice` = \'5000000\', `beban` = 0, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 1, `lain_lain` = 0\nWHERE `id_invoice` = \'1\''),
(747, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-08-17\', `catatan_perbaikan` = \'-\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'4\''),
(748, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'\', `catatan_perbaikan` = \'bisa nih\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'5\''),
(749, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-08-17\', `catatan_perbaikan` = \'sama nih\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'4\''),
(750, 1, 'INSERT INTO `tbl_stock` (`no_urut`, `no_sn`, `harga_barang`, `flag_barang`, `flag_balikan`, `tanggal_balik`, `flag_qc`, `flag_pakai`, `flag_pembukuan`, `flag_greenpart`) VALUES (\'24\', \'KB 51\', \'5000\', \'1\', 1, \'2021-08-18\', 2, 0, 1, 0)'),
(751, 1, 'UPDATE `tbl_stock` SET `no_urut` = \'24\', `no_sn` = \'KB 51\', `harga_barang` = \'5000\', `flag_barang` = \'1\', `flag_balikan` = 1, `tanggal_balik` = \'2021-08-30\', `flag_qc` = 2, `flag_pakai` = 0, `flag_pembukuan` = 1, `flag_greenpart` = 0\nWHERE `no_sn` = \'KB 51\''),
(752, 1, 'UPDATE `tbl_stock` SET `no_urut` = \'24\', `no_sn` = \'KB 51\', `harga_barang` = \'5000\', `flag_barang` = \'1\', `flag_balikan` = 1, `tanggal_balik` = \'2021-08-17\', `flag_qc` = 2, `flag_pakai` = 0, `flag_pembukuan` = 1, `flag_greenpart` = 0\nWHERE `no_sn` = \'KB 51\''),
(753, 1, 'UPDATE `tbl_stock` SET `no_urut` = \'24\', `no_sn` = \'KB 51\', `harga_barang` = \'5000\', `flag_barang` = \'1\', `flag_balikan` = 1, `tanggal_balik` = \'2021-08-13\', `flag_qc` = 2, `flag_pakai` = 0, `flag_pembukuan` = 1, `flag_greenpart` = 0\nWHERE `no_sn` = \'KB 51\''),
(754, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-25\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(755, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-25\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(756, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-25\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(757, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'57\''),
(758, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-25\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(759, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-25\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(760, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-30\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(761, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'59\''),
(762, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-31\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(763, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(764, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `keterangan`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `status_penerimaan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',\'1\',1,\'2021-06-24\'), (\'1000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',\'1\',1,\'2021-06-24\'), (\'5000\',\'3\',\'2\',0,\'55\',\'1\',\'3\',\'-\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',\'1\',1,\'2021-06-24\')'),
(765, 1, 'SELECT * FROM `tbl_perbaikankcsp` ORDER BY id_pengkekp_det DESC'),
(766, 1, 'DELETE FROM `tbl_perbaikankcsp`\nWHERE `id_pengirimankekp` = \'2\''),
(767, 1, 'SELECT * FROM `tbl_perbaikankcsp` ORDER BY id_pengkekp_det DESC'),
(768, 1, 'DELETE FROM `tbl_perbaikankcsp`\nWHERE `id_pengirimankekp` = \'2\''),
(769, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'90\',\'Keterangan-4\',\'58\',\'superadmin\',\'20\'), (\'90\',\'Keterangan-5\',\'26\',\'superadmin\',\'70\'), (\'90\',\'Keterangan-6\',\'86\',\'superadmin\',\'100\')'),
(770, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'3\', `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'90\''),
(771, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_urut`, `status_pemenuhan`) VALUES (\'0\',\'90\',\'\',\'58\',\'1\'), (\'0\',\'90\',\'\',\'26\',\'1\'), (\'0\',\'90\',\'\',\'86\',\'1\')'),
(772, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(773, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'3\',\'4\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'3\',\'4\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'2021-06-24\'), (\'5000\',\'3\',\'4\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'2021-06-24\')'),
(774, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(775, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'4\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'4\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'2021-06-24\'), (\'5000\',\'4\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'2021-06-24\')'),
(776, 1, 'DELETE FROM `tbl_pengbarang`\nWHERE `id_pengiriman` = \'55\''),
(777, 1, 'INSERT INTO `tbl_pengbarang` (`harga_barang`, `id_delivery_type`, `id_ekspedisi`, `id_pengBarang`, `id_pengiriman`, `id_uker`, `jumlah_koli`, `kondisi_barang`, `no_permintaan`, `no_sn`, `no_urut`, `status_pemenuhan`, `tanggal_pengiriman`) VALUES (\'500\',\'4\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'666\',\'164\',1,\'2021-06-24\'), (\'1000\',\'4\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'5\',\'166\',1,\'2021-06-24\'), (\'5000\',\'4\',\'2\',0,\'55\',\'1\',\'3\',\'1\',\'PGRM0001/VI/2021\',\'123\',\'165\',1,\'2021-06-24\')'),
(778, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN60089\', `tgl_qc` = \'2021-05-14\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 0, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'ok\', `barang_updated_date` = \'2021-08-16 17:09:34\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'188\''),
(779, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-31\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(780, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-16 17:10:29\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'184\''),
(781, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10027\', \'21\', 2, \'21\', \'2\', 1, \'superadmin\', \'2021-08-16 17:10:29\', \'superadmin\')'),
(782, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'\', \'8\', \'1\', \'21\', \'SN10027\', 45000, 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(783, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'91\',\'Keterangan-7\',\'96\',\'superadmin\',\'45\'), (\'91\',\'Keterangan-8\',\'171\',\'superadmin\',\'95\')'),
(784, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'100000\',61,\'LCD Gaming\',\'1\',\'SN 1051\',\'14\',\'1\'), (\'1\',\'2000\',61,\'Type C\',\'1\',\'SN 1052\',\'32\',\'1\')'),
(785, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'100000\',1,\'2\',1,0,0,1,1,\'TIKI\',\'SN 1051\',\'14\',\'2021-08-18\'), (\'1\',\'2000\',1,\'2\',1,0,0,1,1,\'TIKI\',\'SN 1052\',\'32\',\'2021-08-18\')'),
(786, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'61\''),
(787, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'60\''),
(788, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'3\', `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'90\''),
(789, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_urut`, `status_pemenuhan`) VALUES (\'0\',\'90\',\'\',\'58\',\'1\'), (\'0\',\'90\',\'\',\'26\',\'1\'), (\'0\',\'90\',\'\',\'86\',\'1\')'),
(790, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'5000\',62,\'Kabel A\',\'1\',\'CCC 50\',\'34\',\'1\'), (\'1\',\'10000\',62,\'Kabel B\',\'1\',\'SN 555\',\'34\',\'1\')'),
(791, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'3\',1,0,0,1,1,\'TIKI\',\'CCC 50\',\'34\',\'2021-08-18\'), (\'1\',\'10000\',1,\'3\',1,0,0,1,1,\'TIKI\',\'SN 555\',\'34\',\'2021-08-18\')'),
(792, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'62\''),
(793, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'59\''),
(794, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'57\''),
(795, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'55\''),
(796, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'5000\',63,\'Item A\',\'1\',\'CCC 50\',\'34\',\'1\'), (\'1\',\'10000\',63,\'Item B\',\'1\',\'SN 555\',\'34\',\'1\')');
INSERT INTO `tbl_user_log` (`id_log`, `id_user`, `query`) VALUES
(797, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'2\',1,0,0,1,1,\'TIKI\',\'CCC 50\',\'34\',\'2021-08-18\'), (\'1\',\'10000\',1,\'2\',1,0,0,1,1,\'TIKI\',\'SN 555\',\'34\',\'2021-08-18\')'),
(798, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'63\''),
(799, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',64,\'Item A\',\'1\',\'CCC 50\',\'34\',\'1\'), (\'1\',\'5000\',64,\'Item B\',\'1\',\'SN 555\',\'34\',\'1\')'),
(800, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'3\',1,0,0,1,1,\'J&T Express\',\'CCC 50\',\'34\',\'2021-08-18\'), (\'1\',\'5000\',1,\'3\',1,0,0,1,1,\'J&T Express\',\'SN 555\',\'34\',\'2021-08-18\')'),
(801, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'5000.00\',2,\'2\',\'3\',\'1\',1,0,\'1\',\'J&T Express\',\'SN 555\',\'34\',\'2021-08-18\',\'2021-08-18\')'),
(802, 1, 'SELECT * FROM tbl_transaksi WHERE no_sn = \'SN 555\' ORDER BY tran_created_date DESC LIMIT 1'),
(803, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'10000.00\',2,\'1\',\'3\',\'1\',1,0,\'1\',\'J&T Express\',\'CCC 50\',\'34\',\'2021-08-18\',\'2021-08-18\')'),
(804, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (48,\'Konektor 1\',\'34\',\'superadmin\',\'1\')'),
(805, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'5000\',\'48\',\'Konektor 1\',\'SN 555\',\'34\',\'1\',\'1\',\'0\')'),
(806, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'5000\',\'48\',\'Konektor 1\',\'SN 555\',\'34\',\'1\',\'1\',\'0\')'),
(807, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'5000\',\'48\',\'Konektor 1\',\'SN 555\',\'34\',\'1\',\'1\',\'0\')'),
(808, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'48\''),
(809, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'48\''),
(810, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'48\''),
(811, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'5000\',\'48\',\'Konektor 1\',\'SN 555\',\'34\',\'1\',\'1\',\'0\')'),
(812, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-08-17\', `catatan_perbaikan` = \'Tidak bisa diperbaiki\', `status_perbaikan` = \'2\'\nWHERE `id_pengkekp_det` = \'4\''),
(813, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'48\''),
(814, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'100\',\'ok\',\'30\',\'superadmin\',\'2\'), (\'100\',\'ok bro\',\'29\',\'superadmin\',\'2\')'),
(815, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'42\', `dari_uker` = 1, `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'100\''),
(816, 1, 'UPDATE `tbl_pemenuhan_barcab` SET `harga_total` = \'15000\'\nWHERE `id_permintaan` = \'100\''),
(817, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-08-29\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(818, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',65,\'Bill Check Test\',\'1\',\'BC-123\',\'24\',\'1\')'),
(819, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'4\',1,0,0,1,1,\'POS Indonesia\',\'BC-123\',\'24\',\'2021-08-27\')'),
(820, 1, 'UPDATE `tbl_transaksi` SET 0 = Array\nWHERE `id_tran` = \'6\''),
(821, 1, 'UPDATE `tbl_transaksi` SET 0 = Array\nWHERE `id_tran` = \'6\''),
(822, 1, 'UPDATE `tbl_transaksi` SET 0 = Array\nWHERE `id_tran` = \'6\''),
(823, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'100000\',66,\'Kirim LCD\',\'1\',\'LCD-999\',\'14\',\'1\')'),
(824, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'100000\',1,\'6\',1,0,0,1,1,\'POS Indonesia\',\'LCD-999\',\'14\',\'2021-08-27\')'),
(825, 1, 'UPDATE `tbl_transaksi` SET 0 = Array\nWHERE `id_tran` = \'7\''),
(826, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'100000.00\',2,\'7\',\'6\',\'0\',1,0,\'1\',\'POS Indonesia\',\'LCD-999\',\'14\',\'2021-08-27\',\'2021-08-26\')'),
(827, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'1000\',67,\'Paket Ebray\',\'1\',\'EB-R4Y\',\'34\',\'1\')'),
(828, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'1000\',1,\'29\',1,0,0,1,1,\'TIKI\',\'EB-R4Y\',\'34\',\'2021-08-27\')'),
(829, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'1000.00\',2,\'10\',\'29\',\'1\',1,0,\'1\',\'TIKI\',\'EB-R4Y\',\'34\',\'2021-08-27\',\'2021-08-27\')'),
(830, 1, 'UPDATE `tbl_perbaikankcsp` SET `status_ph` = 1, `status_pembukuan` = 1, `catatan_perbaikan` = \'Tidak bisa diperbaiki\'\nWHERE `id_pengkekp_det` = \'4\''),
(831, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'1000\',\'4\',17,\'Simulasi Stock\',\'24\',\'superadmin\',\'1\',\'1000\',\'100\')'),
(832, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'17\', \'2021-08-12\', \'2021-08-12\', \'666\', \'50000\', 1, 0, 1, 1, 1, 1, 1, 1, 1, 0)'),
(833, 1, 'UPDATE `tbl_pengiriman_barang` SET `status_cek` = 1\nWHERE `id_pengiriman` = \'67\''),
(834, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'42\', `dari_uker` = 1, `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'100\''),
(835, 1, 'UPDATE `tbl_pemenuhan_barcab` SET `harga_total` = \'15000\'\nWHERE `id_permintaan` = \'100\''),
(836, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'42\', `dari_uker` = 1, `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'100\''),
(837, 1, 'UPDATE `tbl_pemenuhan_barcab` SET `harga_total` = \'15000\'\nWHERE `id_permintaan` = \'100\''),
(838, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:02:44\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(839, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:03:01\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(840, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:07:01\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(841, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:07:01\', \'superadmin\')'),
(842, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:08:10\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(843, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:08:10\', \'superadmin\')'),
(844, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:10:55\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(845, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:10:55\', \'superadmin\')'),
(846, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:11:21\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(847, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:11:21\', \'superadmin\')'),
(848, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:11:35\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(849, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:11:35\', \'superadmin\')'),
(850, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:11:47\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(851, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:11:47\', \'superadmin\')'),
(852, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:14:49\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(853, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:14:49\', \'superadmin\')'),
(854, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:14:55\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(855, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:14:55\', \'superadmin\')'),
(856, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-08-31 09:16:39\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'185\''),
(857, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-08-31 09:16:40\', \'superadmin\')'),
(858, 1, 'INSERT INTO `tbl_stock` (`id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'8\', \'4\', \'18\', \'SN10030\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(859, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-02 13:44:54\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'186\''),
(860, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN40051\', \'18\', 2, \'18\', \'5\', 1, \'superadmin\', \'2021-09-02 13:44:55\', \'superadmin\')'),
(861, 1, 'INSERT INTO `tbl_stock` (`id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (\'8\', \'4\', \'18\', \'SN40051\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(862, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'5000\',\'4\',1,\'Bill Checker Bagus\',\'24\',\'superadmin\',\'2\',\'10000\',\'1000\'), (\'10000\',\'4\',1,\'Kaset PS\',\'26\',\'superadmin\',\'1\',\'10000\',\'0\')'),
(863, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'1\', \'2021-09-01\', \'2021-09-01\', \'001\', \'20000\', 0, 0, 1, 1, 1, 0, 0, 1, 1, 0)'),
(864, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'1\', \'2021-09-01\', \'2021-09-01\', \'001\', \'20000\', 0, 0, 1, 1, 1, 0, 0, 1, 1, 0)'),
(865, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'6\''),
(866, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'13\''),
(867, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'12\''),
(868, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'4\', \'001\', \'2021-09-01\', \'2021\', \'20000\', \'superadmin\')'),
(869, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-03\', `wakadiv_approv` = 1\nWHERE `id_po` = \'1\''),
(870, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-03\', `kadiv_approv` = 1\nWHERE `id_po` = \'1\''),
(871, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'1\', `tanggal_invoice` = \'2021-09-01\', `tanggal_terima` = \'2021-09-01\', `no_invoice` = \'001\', `nilai_invoice` = \'200000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0\nWHERE `id_invoice` = \'7\''),
(872, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'1\', `tanggal_invoice` = \'2021-09-01\', `tanggal_terima` = \'2021-09-01\', `no_invoice` = \'001\', `nilai_invoice` = \'200000\', `beban` = 0, `tahap_tagihan` = 0, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'7\''),
(873, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (2, \'4\', \'26\', \'10000.00\', 10)'),
(874, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'1\'\nWHEN `id_do_detail` = \'2\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'Aman\'\nWHEN `id_do_detail` = \'2\' THEN \'Ini juga aman\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'2021-09-03 10:20:28\'\nWHEN `id_do_detail` = \'2\' THEN \'2021-09-03 10:20:28\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'superadmin\'\nWHEN `id_do_detail` = \'2\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'1\',\'2\')'),
(875, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'2\'\nWHEN `id_do_detail` = \'2\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'Aman\'\nWHEN `id_do_detail` = \'2\' THEN \'Ini juga aman\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'2021-09-03 10:21:24\'\nWHEN `id_do_detail` = \'2\' THEN \'2021-09-03 10:21:24\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'superadmin\'\nWHEN `id_do_detail` = \'2\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'1\',\'2\')'),
(876, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'7\', \'Full\', \'1\', \'PPPB0001/IX/2021\')'),
(877, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'7\', \'Full\', \'1\', \'PPPB0001/IX/2021\')'),
(878, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'7\', \'Full\', \'1\', \'PPPB0001/IX/2021\')'),
(879, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'7\', \'Full\', \'1\', \'PPPB0001/IX/2021\')'),
(880, 16, 'UPDATE `tbl_po` SET `id_pembelian` = \'1\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'1\''),
(881, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'BC0123\', `tgl_qc` = \'2021-09-03\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Warna biru.\', `barang_updated_date` = \'2021-09-03 14:40:51\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'190\''),
(882, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-03 14:43:50\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'190\''),
(883, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'BC0123\', \'24\', 2, \'24\', \'2\', 1, \'superadmin\', \'2021-09-03 14:43:50\', \'superadmin\')'),
(884, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'1\', \'4\', \'24\', \'BC0123\', \'5000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(885, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'BC02\', `tgl_qc` = \'2021-09-03\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'Barang Jelek.\', `barang_updated_date` = \'2021-09-03 14:46:00\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'191\''),
(886, 1, 'UPDATE `tbl_barang_temp` SET `flag_status_vendor` = \'1\', `barang_updated_date` = \'2021-09-03\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'191\''),
(887, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',\'4\',2,\'Sabuk pengaman.\',\'172\',\'superadmin\',\'1\',\'10000\',\'1000\')'),
(888, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'2\', \'2021-08-18\', \'2021-08-18\', \'225\', \'50000\', 0, 0, 1, 1, 1, 0, 0, 1, 1, 0)'),
(889, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-03\', `wakadiv_approv` = 1\nWHERE `id_po` = \'2\''),
(890, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-03\', `kadiv_approv` = 1\nWHERE `id_po` = \'2\''),
(891, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'2\', \'2021-08-18\', \'2021-08-18\', \'225\', \'50000\', 0, 0, 1, 1, 1, 1, 0, 1, 1, 0)'),
(892, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'2\', `tanggal_invoice` = \'2021-08-18\', `tanggal_terima` = \'2021-08-18\', `no_invoice` = \'225\', `nilai_invoice` = \'50000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'9\''),
(893, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'9\', \'225\', \'2021-08-18\', \'2021\', \'50000\', \'superadmin\')'),
(894, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (3, \'4\', \'172\', \'10000.00\', 10)'),
(895, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'9\', \'Full\', \'7\', \'PPPB0002/IX/2021\')'),
(896, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'2\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'2\''),
(897, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',\'4\',3,\'Monitor LG\',\'19\',\'superadmin\',\'1\',\'10000\',\'1000\')'),
(898, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-03\', `wakadiv_approv` = 1\nWHERE `id_po` = \'3\''),
(899, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-03\', `kadiv_approv` = 1\nWHERE `id_po` = \'3\''),
(900, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'3\', \'2021-09-03\', \'2021-09-03\', \'003\', \'30000\', 0, 0, 1, 1, 1, 0, 0, 1, 0, 0)'),
(901, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-09-03\', `tanggal_terima` = \'2021-09-03\', `no_invoice` = \'003\', `nilai_invoice` = \'30000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'10\''),
(902, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'5\', \'003\', \'2021-09-03\', \'2021\', \'30000\', \'superadmin\')'),
(903, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (4, \'4\', \'19\', \'10000.00\', 10)'),
(904, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'10\', \'Full\', \'1\', \'PPPB0003/IX/2021\')'),
(905, 16, 'UPDATE `tbl_po` SET `id_pembelian` = \'3\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'3\''),
(906, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'MNT-01\', `tgl_qc` = \'2021-09-03\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Bagus\', `barang_updated_date` = \'2021-09-03 15:54:15\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'194\''),
(907, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-03 15:54:31\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'194\''),
(908, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'MNT-01\', \'19\', 2, \'19\', \'1\', 1, \'superadmin\', \'2021-09-03 15:54:31\', \'superadmin\')'),
(909, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'3\', \'4\', \'19\', \'MNT-01\', \'10000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(910, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'98\',\'tes\',\'20\',\'superadmin\',\'2\'), (\'98\',\'ok\',\'120\',\'superadmin\',\'1\')'),
(911, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'98\',\'tes\',\'20\',\'superadmin\',\'2\'), (\'98\',\'ok\',\'120\',\'superadmin\',\'1\')'),
(912, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'49\', `dari_uker` = 1, `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'98\''),
(913, 1, 'UPDATE `tbl_pemenuhan_barcab` SET `harga_total` = \'6000\'\nWHERE `id_permintaan` = \'98\''),
(914, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'98\',\'tes\',\'20\',\'superadmin\',\'2\'), (\'98\',\'ok\',\'120\',\'superadmin\',\'1\')'),
(915, 1, 'UPDATE `tbl_permintaan_barang` SET `id_uker` = \'49\', `dari_uker` = 1, `status_permintaan` = \'1\'\nWHERE `id_permintaan` = \'98\''),
(916, 1, 'UPDATE `tbl_pemenuhan_barcab` SET `harga_total` = \'0\'\nWHERE `id_permintaan` = \'98\''),
(917, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'1\''),
(918, 1, 'DELETE FROM `tbl_pertek`\nWHERE `id_pertek` = \'2\''),
(919, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (1,\'BMU2\',\'25\',\'superadmin\',\'2\')'),
(920, 21, 'UPDATE `tbl_pertek` SET `tanggal_approv_pinca` = \'2021-09-03\', `pinca_appovel` = 1\nWHERE `id_pertek` = \'1\''),
(921, 31, 'UPDATE `tbl_pertek` SET `tanggal_approv_leader` = \'2021-09-03\', `leader_approvel` = 1\nWHERE `id_pertek` = \'1\''),
(922, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',\'4\',1,\'2 Bos.\',\'25\',\'superadmin\',\'2\',\'20000\',\'2000\')'),
(923, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-05\', `wakadiv_approv` = 1\nWHERE `id_po` = \'1\''),
(924, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-05\', `kadiv_approv` = 1\nWHERE `id_po` = \'1\''),
(925, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'1\', \'2021-09-05\', \'2021-09-05\', \'1\', \'30000\', 0, 0, 1, 1, 1, 0, 0, 1, 1, 0)'),
(926, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'1\', `tanggal_invoice` = \'2021-09-05\', `tanggal_terima` = \'2021-09-05\', `no_invoice` = \'1\', `nilai_invoice` = \'30000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'1\''),
(927, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'4\', \'1\', \'2021-09-05\', \'2021\', \'30000\', \'superadmin\')'),
(928, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (1, \'4\', \'25\', \'10000.00\', 10)'),
(929, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'1\', \'Full\', \'5\', \'PPPB0001/IX/2021\')'),
(930, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'1\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'1\''),
(931, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'BMU-01\', `tgl_qc` = \'2021-09-05\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'BMU Black\', `barang_updated_date` = \'2021-09-05 16:27:15\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'1\''),
(932, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'BMU-02\', `tgl_qc` = \'2021-09-05\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'BMU Red\', `barang_updated_date` = \'2021-09-05 16:27:30\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'2\''),
(933, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-05 16:27:45\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'1\''),
(934, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'BMU-01\', \'25\', 2, \'25\', \'2\', 1, \'superadmin\', \'2021-09-05 16:27:45\', \'superadmin\')'),
(935, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'1\', \'4\', \'25\', \'BMU-01\', \'10000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(936, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-05 16:27:52\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'2\''),
(937, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'BMU-02\', \'25\', 2, \'25\', \'2\', 1, \'superadmin\', \'2021-09-05 16:27:52\', \'superadmin\')'),
(938, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'1\', \'4\', \'25\', \'BMU-02\', \'10000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(939, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',68,\'BMU Black\',\'1\',\'BMU-01\',\'25\',\'1\'), (\'1\',\'10000\',68,\'BMU Red\',\'1\',\'BMU-02\',\'25\',\'1\')'),
(940, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'2\',1,0,0,1,1,\'JNE\',\'BMU-01\',\'25\',\'2021-09-05\'), (\'1\',\'10000\',1,\'2\',1,0,0,1,1,\'JNE\',\'BMU-02\',\'25\',\'2021-09-05\')'),
(941, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',69,\'ddd\',\'1\',\'BMU-01\',\'25\',\'1\'), (\'1\',\'10000\',69,\'ad\',\'1\',\'BMU-02\',\'25\',\'1\')'),
(942, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,0,0,1,1,\'POS Indonesia\',\'BMU-01\',\'25\',\'2021-09-05\'), (\'1\',\'10000\',1,\'1\',1,0,0,1,1,\'POS Indonesia\',\'BMU-02\',\'25\',\'2021-09-05\')'),
(943, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',70,\'Tes 1\',\'1\',\'BMU-01\',\'25\',\'1\'), (\'1\',\'10000\',70,\'Tes 2\',\'1\',\'BMU-02\',\'25\',\'1\')'),
(944, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,0,0,1,1,\'POS Indonesia\',\'BMU-01\',\'25\',\'2021-09-05\'), (\'1\',\'10000\',1,\'1\',1,0,0,1,1,\'POS Indonesia\',\'BMU-02\',\'25\',\'2021-09-05\')'),
(945, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'10000.00\',2,\'33\',\'1\',\'1\',1,0,\'1\',\'POS Indonesia\',\'BMU-01\',\'25\',\'2021-09-05\',\'2021-09-05\')'),
(946, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'10000.00\',2,\'34\',\'1\',\'1\',1,0,\'1\',\'POS Indonesia\',\'BMU-02\',\'25\',\'2021-09-05\',\'2021-09-05\')'),
(947, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'10000\',\'1\',\'BMU2\',\'BMU-01\',\'25\',\'1\',\'1\',\'1000\'), (\'10000\',\'1\',\'BMU2\',\'BMU-02\',\'25\',\'1\',\'1\',\'1000\')'),
(948, 1, 'UPDATE `tbl_pertek_det` SET `tanggal_balik` = \'2021-09-05\', `no_sn_lama` = \'1\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'5\''),
(949, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'5000\',\'4\',2,\'Bill\',\'24\',\'superadmin\',\'1\',\'5000\',\'500\')'),
(950, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-05\', `wakadiv_approv` = 1\nWHERE `id_po` = \'2\''),
(951, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-05\', `kadiv_approv` = 1\nWHERE `id_po` = \'2\''),
(952, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'2\', \'2021-09-05\', \'2021-09-05\', \'2\', \'50000\', 0, 0, 0, 1, 1, 1, 0, 0, 0, 0)'),
(953, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'5\', \'2\', \'2021-09-05\', \'2021\', \'50000\', \'superadmin\')'),
(954, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'2\', `tanggal_invoice` = \'2021-09-05\', `tanggal_terima` = \'2021-09-05\', `no_invoice` = \'2\', `nilai_invoice` = \'50000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 0, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'2\''),
(955, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (2, \'4\', \'24\', \'5000.00\', 10)'),
(956, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'2\', \'Full\', \'5\', \'PPPB0002/IX/2021\')'),
(957, 16, 'UPDATE `tbl_po` SET `id_pembelian` = \'2\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'2\''),
(958, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'BC-01\', `tgl_qc` = \'2021-09-05\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Nice\', `barang_updated_date` = \'2021-09-05 18:14:06\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'3\''),
(959, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-05 18:14:22\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'3\''),
(960, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'BC-01\', \'24\', 2, \'24\', \'1\', 1, \'superadmin\', \'2021-09-05 18:14:22\', \'superadmin\')'),
(961, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'2\', \'4\', \'24\', \'BC-01\', \'5000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(962, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'5000\',71,\'Tes\',\'1\',\'BC-01\',\'24\',\'1\')'),
(963, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'4\',1,0,0,1,1,\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(964, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'5000.00\',2,\'38\',\'4\',\'1\',1,0,\'1\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\',\'2021-09-05\')'),
(965, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',3,\'0\',\'BC-01\',\'24\')'),
(966, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(967, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',4,\'0\',\'BC-01\',\'24\')'),
(968, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(969, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',5,\'0\',\'BC-01\',\'24\')'),
(970, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(971, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',6,\'0\',\'BC-01\',\'24\')'),
(972, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(973, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',7,\'0\',\'BC-01\',\'24\')'),
(974, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(975, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',8,\'0\',\'BC-01\',\'24\')'),
(976, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BC-01\',\'24\',\'2021-09-05\')'),
(977, 1, 'DELETE FROM `tbl_pengiriman_barang`\nWHERE `id_pengiriman` = \'8\''),
(978, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',9,\'0\',\'BC-01\',\'24\')'),
(979, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'0\',\'JNE\',\'BC-01\',\'24\',\'2021-09-05\')'),
(980, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',10,\'1\',\'BC-01\',\'24\')'),
(981, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BC-01\',\'24\',\'2021-09-05\')'),
(982, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',11,\'1\',\'BC-01\',\'24\')'),
(983, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BC-01\',\'24\',\'2021-09-05\')'),
(984, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',12,\'1\',\'BC-01\',\'24\')'),
(985, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BC-01\',\'24\',\'2021-09-05\')'),
(986, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',13,\'1\',\'BC-01\',\'24\')'),
(987, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BC-01\',\'24\',\'2021-09-05\')'),
(988, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',14,\'1\',\'BC-01\',\'24\')'),
(989, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BC-01\',\'24\',\'2021-09-05\')'),
(990, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',1,\'1\',\'BC-01\',\'24\')'),
(991, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BC-01\',\'24\',\'2021-09-05\')'),
(992, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',1,0)'),
(993, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-09-05\', `catatan_perbaikan` = \'Masih bisa.\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'1\''),
(994, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-09-05\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(995, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (1,\'fast\',\'24\',\'superadmin\',\'2\')'),
(996, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-05\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'1\''),
(997, 1, 'INSERT INTO `tbl_pemenuhan_barcab_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'1\',\'fast\',\'24\',\'superadmin\',\'2\')'),
(998, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (2,\'tes\',\'24\',\'superadmin\',\'2\')'),
(999, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-05\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'2\''),
(1000, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'2\',\'1\',\'24\',\'1\'), (\'5000\',\'2\',\'1\',\'24\',\'1\')'),
(1001, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'1\',\'1\',\'24\',\'1\'), (\'0\',\'1\',\'\',\'24\',NULL)'),
(1002, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'2\',\'\',NULL,\'24\',\'1\'), (\'5000\',\'2\',\'\',NULL,\'24\',\'1\')'),
(1003, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'2\',\'1\',\'BC-01\',\'24\',\'1\'), (\'5000\',\'2\',\'1\',\'BC-01\',\'24\',\'1\')'),
(1004, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (3,\'tes\',\'34\',\'superadmin\',\'2\')'),
(1005, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (4,\'tes\',\'29\',\'superadmin\',\'2\'), (4,\'ok\',\'102\',\'superadmin\',\'1\')'),
(1006, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-06\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'4\''),
(1007, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'1\',\'SN-0191\',\'29\',\'1\'), (\'200000\',\'4\',\'1\',\'SN-0192\',\'29\',\'1\'), (\'\',\'4\',\'\',\'SN-0194\',\'102\',NULL)'),
(1008, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'1\',\'SN-0191\',\'29\',\'1\'), (\'200000\',\'4\',\'1\',\'SN-0192\',\'29\',\'1\'), (\'0\',\'4\',\'\',\'SN-0194\',\'102\',NULL)'),
(1009, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'\',\'SN-0191\',\'29\',\'1\'), (\'200000\',\'4\',\'\',\'SN-0192\',\'29\',\'1\'), (\'0\',\'4\',\'\',\'SN-0194\',\'102\',NULL)'),
(1010, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'\',\'SN-0191\',\'29\',\'1\'), (\'200000\',\'4\',\'\',\'SN-0192\',\'29\',\'1\'), (\'0\',\'4\',\'\',\'SN-0194\',\'102\',NULL)'),
(1011, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'1\',\'SN-0191\',\'29\',NULL), (\'200000\',\'4\',\'1\',\'SN-0192\',\'29\',NULL), (\'0\',\'4\',\'\',\'SN-0194\',\'102\',NULL)'),
(1012, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'2\',\'\',\'BC-01\',\'24\',NULL), (\'5000\',\'2\',\'\',\'BC-02\',\'24\',NULL)'),
(1013, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'2\',\'1\',\'BC-01\',\'24\',\'1\'), (\'5000\',\'2\',\'1\',\'BC-02\',\'24\',\'1\')'),
(1014, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'1\',\'1\',\'\',\'24\',\'0\'), (\'0\',\'1\',\'\',\'\',\'24\',\'0\')'),
(1015, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'10000\',\'1\',\'BMU2\',\'BMU-01\',\'25\',\'1\',\'1\',\'1000\'), (\'10000\',\'1\',\'BMU2\',\'BMU-02\',\'25\',\'1\',\'1\',\'1000\')'),
(1016, 1, 'UPDATE `tbl_pertek_det` SET `tanggal_balik` = \'2021-09-07\', `no_sn_lama` = \'1\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'7\'');
INSERT INTO `tbl_user_log` (`id_log`, `id_user`, `query`) VALUES
(1017, 1, 'UPDATE `tbl_pertek_det` SET `tanggal_balik` = \'2021-09-07\', `no_sn_lama` = \'2\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'8\''),
(1018, 1, 'UPDATE `tbl_pertek_det` SET `tanggal_balik` = \'2021-09-07\', `no_sn_lama` = \'\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'8\''),
(1019, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'1\''),
(1020, 1, 'SELECT * FROM `tbl_perbaikankcsp` ORDER BY id_pengkekp_det DESC'),
(1021, 1, 'UPDATE `tbl_regin_ekspedisi` SET `id_vendor` = \'5\', `no_invoice` = \'2\', `tgl_invoice` = \'2021-09-05\', `periode` = \'2021\', `nilai_invoice` = \'50000\', `regineks_updated_date` = \'2021-09-07 13:52:39\', `regineks_updated_by` = \'superadmin\'\nWHERE `id_invoice` = \'2\''),
(1022, 1, 'UPDATE `tbl_pengiriman_barang` SET `status_cek` = 1\nWHERE `id_pengiriman` = \'71\''),
(1023, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'10\', \'3\', \'2021-09-07\', \'2\', \'1233\', \'superadmin\')'),
(1024, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'3\''),
(1025, 1, 'DELETE FROM `tbl_regin_ekspedisi`\nWHERE `id_invoice` = \'2\''),
(1026, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'5\', \'2\', \'2021-09-07\', \'2021\', \'1233\', \'superadmin\')'),
(1027, 16, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'2\', \'Full\', \'5\', \'PPPB0003/IX/2021\')'),
(1028, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'3\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'2\''),
(1029, 15, 'UPDATE `tbl_pengiriman_barang` SET `status_cek` = 1\nWHERE `id_pengiriman` = \'70\''),
(1030, 1, 'UPDATE `tbl_pengiriman_barang` SET `status_cek` = 1\nWHERE `id_pengiriman` = \'70\''),
(1031, 15, 'UPDATE `tbl_pengiriman_barang` SET `status_cek` = 1\nWHERE `id_pengiriman` = \'70\''),
(1032, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'1\', \'Full\', \'5\', \'PPPB0004/IX/2021\')'),
(1033, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'4\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'1\''),
(1034, 1, 'UPDATE `tbl_pengiriman_barang` SET `status_cek` = 1\nWHERE `id_pengiriman` = \'71\''),
(1035, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'1000\',\'4\',3,\'ok\',\'75\',\'superadmin\',\'1\',\'1000\',\'100\')'),
(1036, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-07\', `wakadiv_approv` = 1\nWHERE `id_po` = \'3\''),
(1037, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-07\', `kadiv_approv` = 1\nWHERE `id_po` = \'3\''),
(1038, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'3\', \'2021-09-07\', \'2021-09-07\', \'INV-001\', \'50000\', 0, 0, 1, 1, 1, 0, 0, 1, 0, 0)'),
(1039, 15, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-09-07\', `tanggal_terima` = \'2021-09-07\', `no_invoice` = \'INV-001\', `nilai_invoice` = \'50000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'3\''),
(1040, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (3, \'4\', \'75\', \'1000.00\', 10)'),
(1041, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'3\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'3\' THEN \'bil\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'3\' THEN \'2021-09-07 14:25:47\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'3\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'3\')'),
(1042, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'3\', \'Full\', \'2\', \'PPPB0005/IX/2021\')'),
(1043, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'5\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'3\''),
(1044, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'2\', \'Full\', \'5\', \'PPPB0006/IX/2021\')'),
(1045, 15, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'1\', \'Full\', \'5\', \'PPPB0007/IX/2021\')'),
(1046, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'7\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'1\''),
(1047, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'6\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'2\''),
(1048, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN10030\', `tgl_qc` = \'2021-09-07\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'oke\', `barang_updated_date` = \'2021-09-07 14:31:21\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'4\''),
(1049, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-07 14:31:35\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'4\''),
(1050, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10030\', \'75\', 2, \'75\', \'1\', 1, \'superadmin\', \'2021-09-07 14:31:35\', \'superadmin\')'),
(1051, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'3\', \'4\', \'75\', \'SN10030\', \'1000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1052, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'2\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'Aman.\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'2021-09-07 14:32:30\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'1\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'1\')'),
(1053, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'1\', \'Full\', \'5\', \'PPPB0008/IX/2021\')'),
(1054, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'8\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'1\''),
(1055, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'5000\',\'4\',4,\'ok\',\'169\',\'superadmin\',\'3\',\'15000\',\'1500\'), (\'50000\',\'4\',4,\'tes\',\'143\',\'superadmin\',\'3\',\'150000\',\'15000\')'),
(1056, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-07\', `wakadiv_approv` = 1\nWHERE `id_po` = \'4\''),
(1057, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-07\', `kadiv_approv` = 1\nWHERE `id_po` = \'4\''),
(1058, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'4\', \'2021-09-07\', \'2021-09-07\', \'INV-002\', \'10000\', 0, 0, 1, 1, 0, 1, 0, 0, 0, 0)'),
(1059, 15, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'4\', `tanggal_invoice` = \'2021-09-07\', `tanggal_terima` = \'2021-09-07\', `no_invoice` = \'INV-002\', `nilai_invoice` = \'10000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 0, `copy_po` = 1, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'4\''),
(1060, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'8\', \'INV-002\', \'2021-09-07\', \'2021\', \'50000\', \'superadmin\')'),
(1061, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (5, \'4\', \'143\', \'50000.00\', 10)'),
(1062, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'4\', \'Full\', \'2\', \'PPPB0009/IX/2021\')'),
(1063, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'9\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'4\''),
(1064, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN100111\', `tgl_qc` = \'2021-09-07\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 0, `flag_cacat` = 0, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'\', `barang_updated_date` = \'2021-09-07 14:39:47\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'5\''),
(1065, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN10012\', `tgl_qc` = \'2021-09-07\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'good\', `barang_updated_date` = \'2021-09-07 14:40:24\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'6\''),
(1066, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN6001\', `tgl_qc` = \'2021-09-07\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'oke\', `barang_updated_date` = \'2021-09-07 14:41:00\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'8\''),
(1067, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN6002\', `tgl_qc` = \'2021-09-07\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'oke\', `barang_updated_date` = \'2021-09-07 14:41:20\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'10\''),
(1068, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN6003\', `tgl_qc` = \'2021-09-07\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'rusak nih\', `barang_updated_date` = \'2021-09-07 14:42:25\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'9\''),
(1069, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-07 14:43:02\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'6\''),
(1070, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN10012\', \'169\', 2, \'169\', \'3\', 1, \'superadmin\', \'2021-09-07 14:43:02\', \'superadmin\')'),
(1071, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'4\', \'4\', \'169\', \'SN10012\', \'5000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1072, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-07 14:43:07\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'8\''),
(1073, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN6001\', \'143\', 2, \'143\', \'3\', 1, \'superadmin\', \'2021-09-07 14:43:07\', \'superadmin\')'),
(1074, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'4\', \'4\', \'143\', \'SN6001\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1075, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-07 14:43:13\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'10\''),
(1076, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN6002\', \'143\', 2, \'143\', \'3\', 1, \'superadmin\', \'2021-09-07 14:43:13\', \'superadmin\')'),
(1077, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'4\', \'4\', \'143\', \'SN6002\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1078, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN10011\', `tgl_qc` = \'2021-09-08\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'\', `barang_updated_date` = \'2021-09-08 11:07:21\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'7\''),
(1079, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'5000\',\'4\',5,\'tes\',\'127\',\'superadmin\',\'1\',\'5000\',\'500\'), (\'5000\',\'4\',5,\'ok\',\'29\',\'superadmin\',\'3\',\'15000\',\'0\')'),
(1080, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-09\', `wakadiv_approv` = 1\nWHERE `id_po` = \'5\''),
(1081, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-09\', `kadiv_approv` = 1\nWHERE `id_po` = \'5\''),
(1082, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'5\', \'2021-09-09\', \'2021-09-09\', \'INV-0013\', \'500000\', 0, 0, 1, 1, 1, 0, 1, 0, 0, 0)'),
(1083, 15, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'5\', `tanggal_invoice` = \'2021-09-09\', `tanggal_terima` = \'2021-09-09\', `no_invoice` = \'INV-0013\', `nilai_invoice` = \'500000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 1, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'5\''),
(1084, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'6\', \'INV-0013\', \'2021-09-09\', \'2021\', \'500000\', \'superadmin\')'),
(1085, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (7, \'4\', \'29\', \'5000.00\', 10)'),
(1086, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'5\', \'Full\', \'1\', \'PPPB0010/IX/2021\')'),
(1087, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'10\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'5\''),
(1088, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'5\', `tanggal_invoice` = \'2021-09-09\', `tanggal_terima` = \'2021-09-09\', `no_invoice` = \'INV-0013\', `nilai_invoice` = \'500000\', `beban` = 0, `tahap_tagihan` = 0, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 1, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 1\nWHERE `id_invoice` = \'5\''),
(1089, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'2\', `tanggal_invoice` = \'2021-09-05\', `tanggal_terima` = \'2021-09-05\', `no_invoice` = \'2\', `nilai_invoice` = \'50000\', `beban` = 1, `tahap_tagihan` = 0, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 1\nWHERE `id_invoice` = \'2\''),
(1090, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'3\', \'Full\', \'2\', \'PPPB0011/IX/2021\')'),
(1091, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'11\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'3\''),
(1092, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'5000\',\'4\',6,\'asd 1\',\'23\',\'superadmin\',\'2\',\'10000\',\'1000\'), (\'2000\',\'4\',6,\'asd 2\',\'20\',\'superadmin\',\'1\',\'2000\',\'0\')'),
(1093, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-09\', `wakadiv_approv` = 1\nWHERE `id_po` = \'6\''),
(1094, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-09\', `kadiv_approv` = 1\nWHERE `id_po` = \'6\''),
(1095, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'6\', \'2021-09-09\', \'2021-09-09\', \'2311\', \'100\', 0, 0, 1, 1, 1, 1, 1, 0, 0, 0)'),
(1096, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'7\', \'2311\', \'2021-09-09\', \'2021\', \'100\', \'superadmin\')'),
(1097, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'6\', `tanggal_invoice` = \'2021-09-09\', `tanggal_terima` = \'2021-09-09\', `no_invoice` = \'2311\', `nilai_invoice` = \'100\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'6\''),
(1098, 1, 'INSERT INTO `tbl_do_detail` (`id_do`, `no_urut`, `qty`, `keterangan`, `dodet_created_by`) VALUES (6, \'20\', \'0\', \'\', \'superadmin\')'),
(1099, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'8\' THEN \'2\'\nWHEN `id_do_detail` = \'9\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'8\' THEN \'ok\'\nWHEN `id_do_detail` = \'9\' THEN \'ok\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'8\' THEN \'2021-09-09 16:11:01\'\nWHEN `id_do_detail` = \'9\' THEN \'2021-09-09 16:11:01\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'8\' THEN \'superadmin\'\nWHEN `id_do_detail` = \'9\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'8\',\'9\')'),
(1100, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'6\', \'Full\', \'7\', \'PPPB0012/IX/2021\')'),
(1101, 16, 'UPDATE `tbl_po` SET `id_pembelian` = \'12\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'6\''),
(1102, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'500\',\'4\',7,\'1\',\'14\',\'superadmin\',\'2\',\'1000\',\'100\'), (\'100\',\'4\',7,\'2\',\'26\',\'superadmin\',\'1\',\'100\',\'0\')'),
(1103, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-09\', `wakadiv_approv` = 1\nWHERE `id_po` = \'7\''),
(1104, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-09\', `kadiv_approv` = 1\nWHERE `id_po` = \'7\''),
(1105, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'7\', \'2021-09-09\', \'2021-09-09\', \'6661\', \'1000\', 0, 0, 1, 0, 1, 0, 1, 0, 0, 0)'),
(1106, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'7\', `tanggal_invoice` = \'2021-09-09\', `tanggal_terima` = \'2021-09-09\', `no_invoice` = \'6661\', `nilai_invoice` = \'1000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 0, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 1, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'7\''),
(1107, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'2\', \'6661\', \'2021-09-09\', \'2021\', \'1000\', \'superadmin\')'),
(1108, 1, 'INSERT INTO `tbl_do_detail` (`id_do`, `no_urut`, `qty`, `keterangan`, `dodet_created_by`) VALUES (7, \'26\', \'0\', \'\', \'superadmin\')'),
(1109, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'0\'\nWHEN `id_do_detail` = \'11\' THEN \'0\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'\'\nWHEN `id_do_detail` = \'11\' THEN \'\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'2021-09-09 16:48:16\'\nWHEN `id_do_detail` = \'11\' THEN \'2021-09-09 16:48:16\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'superadmin\'\nWHEN `id_do_detail` = \'11\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'10\',\'11\')'),
(1110, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'2\'\nWHEN `id_do_detail` = \'11\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'\'\nWHEN `id_do_detail` = \'11\' THEN \'\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'2021-09-09 16:48:23\'\nWHEN `id_do_detail` = \'11\' THEN \'2021-09-09 16:48:23\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'10\' THEN \'superadmin\'\nWHEN `id_do_detail` = \'11\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'10\',\'11\')'),
(1111, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'7\', \'Full\', \'5\', \'PPPB0013/IX/2021\')'),
(1112, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'13\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'7\''),
(1113, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (13, \'4\', \'26\', \'100.00\', 10)'),
(1114, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'1000\',\'4\',8,\'monitorcoek\',\'19\',\'superadmin\',\'2\',\'2000\',\'200\'), (\'500\',\'4\',8,\'Printer esson\',\'20\',\'superadmin\',\'1\',\'500\',\'0\')'),
(1115, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-09\', `wakadiv_approv` = 1\nWHERE `id_po` = \'8\''),
(1116, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-09\', `kadiv_approv` = 1\nWHERE `id_po` = \'8\''),
(1117, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'8\', \'2021-09-09\', \'2021-09-09\', \'2300\', \'10000\', 0, 0, 1, 1, 0, 0, 0, 0, 1, 0)'),
(1118, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'8\', `tanggal_invoice` = \'2021-09-09\', `tanggal_terima` = \'2021-09-09\', `no_invoice` = \'2300\', `nilai_invoice` = \'10000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'8\''),
(1119, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'4\', \'2300\', \'2021-09-09\', \'2021\', \'1000\', \'superadmin\')'),
(1120, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (15, \'4\', \'20\', \'500.00\', 10)'),
(1121, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'8\', \'Full\', \'1\', \'PPPB0014/IX/2021\')'),
(1122, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'14\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'8\''),
(1123, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SNDEDE\', `tgl_qc` = \'2021-09-09\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'YES\', `barang_updated_date` = \'2021-09-09 16:56:35\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'18\''),
(1124, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-09 16:56:52\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'18\''),
(1125, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SNDEDE\', \'\', 2, \'19\', \'2\', 1, \'superadmin\', \'2021-09-09 16:56:52\', \'superadmin\')'),
(1126, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'8\', \'4\', \'19\', \'SNDEDE\', \'1000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1127, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'10000\',\'4\',10,\'LCD 2\',\'14\',\'superadmin\',\'2\',\'20000\',\'2000\'), (\'5000\',\'4\',10,\'Berguling\',\'80\',\'superadmin\',\'1\',\'5000\',\'0\')'),
(1128, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-10\', `wakadiv_approv` = 1\nWHERE `id_po` = \'10\''),
(1129, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-10\', `kadiv_approv` = 1\nWHERE `id_po` = \'10\''),
(1130, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'10\', \'2021-09-09\', \'2021-09-09\', \'12345666\', \'50000\', 0, 0, 1, 1, 1, 0, 0, 1, 1, 0)'),
(1131, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'10\', `tanggal_invoice` = \'2021-09-09\', `tanggal_terima` = \'2021-09-09\', `no_invoice` = \'12345666\', `nilai_invoice` = \'50000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'9\''),
(1132, 1, 'INSERT INTO `tbl_regin_ekspedisi` (`id_vendor`, `no_invoice`, `tgl_invoice`, `periode`, `nilai_invoice`, `regineks_created_date`) VALUES (\'8\', \'12345666\', \'2021-09-10\', \'2021\', \'50000\', \'superadmin\')'),
(1133, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (17, \'4\', \'80\', \'5000.00\', 10)'),
(1134, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'9\', \'Full\', \'1\', \'PPPB0015/IX/2021\')'),
(1135, 16, 'UPDATE `tbl_po` SET `id_pembelian` = \'15\', `status_po` = 1, `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'10\''),
(1136, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SIMULASI-01\', `tgl_qc` = \'2021-09-10\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Good\', `barang_updated_date` = \'2021-09-10 13:44:37\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'21\''),
(1137, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SIMULASI-02\', `tgl_qc` = \'2021-09-10\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'Rusak bos\', `barang_updated_date` = \'2021-09-10 13:44:55\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'22\''),
(1138, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SIMULASI-03\', `tgl_qc` = \'2021-09-10\', `have_sn` = 0, `flag_qc` = 2, `flag_greenpart` = 1, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Good\', `barang_updated_date` = \'2021-09-10 13:45:16\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'23\''),
(1139, 1, 'UPDATE `tbl_barang_temp` SET `flag_status_vendor` = \'1\', `barang_updated_date` = \'2021-09-10\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'22\''),
(1140, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-10 13:45:55\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'21\''),
(1141, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SIMULASI-01\', \'\', 2, \'14\', \'2\', 1, \'superadmin\', \'2021-09-10 13:45:56\', \'superadmin\')'),
(1142, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'10\', \'4\', \'14\', \'SIMULASI-01\', \'10000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1143, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-10 13:46:02\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'23\''),
(1144, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SIMULASI-03\', \'\', 2, \'80\', \'1\', 1, \'superadmin\', \'2021-09-10 13:46:02\', \'superadmin\')'),
(1145, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'10\', \'4\', \'80\', \'SIMULASI-03\', \'5000\', 1, 0, 1, 0, 1, 0, \'superadmin\')'),
(1146, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (5,\'Nu alus\',\'14\',\'superadmin\',\'1\')'),
(1147, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-10\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'5\''),
(1148, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'10000\',\'5\',\'1\',\'SIMULASI-01\',\'14\',\'0\')'),
(1149, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'10000\',\'5\',\'\',\'SIMULASI-01\',\'14\',\'0\')'),
(1150, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',72,\'Nu alus\',\'1\',\'SIMULASI-01\',\'14\',\'1\')'),
(1151, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,0,0,1,1,\'POS Indonesia\',\'SIMULASI-01\',\'14\',\'2021-09-10\')'),
(1152, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'10000.00\',2,\'61\',\'1\',\'1\',1,0,\'1\',\'POS Indonesia\',\'SIMULASI-01\',\'14\',\'2021-09-10\',\'2021-09-10\')'),
(1153, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'10000\',\'5\',\'\',\'SIMULASI-01\',\'14\',1)'),
(1154, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (6,\'Road roller\',\'80\',\'superadmin\',\'1\')'),
(1155, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-10\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'6\''),
(1156, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'6\',\'1\',\'SIMULASI-03\',\'80\',1)'),
(1157, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'5000\',73,\'Road Roller\',\'1\',\'SIMULASI-03\',\'80\',\'1\')'),
(1158, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,0,0,1,1,\'J&T Express\',\'SIMULASI-03\',\'80\',\'2021-09-10\')'),
(1159, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'5000.00\',2,\'63\',\'1\',\'1\',1,0,\'1\',\'J&T Express\',\'SIMULASI-03\',\'80\',\'2021-09-10\',\'2021-09-10\')'),
(1160, 1, 'INSERT INTO `tbl_pertek_det` (`id_pertek`, `keterangan`, `no_urut`, `pertekdet_created_by`, `qty`) VALUES (2,\'Road Roller\',\'80\',\'superadmin\',\'1\')'),
(1161, 21, 'UPDATE `tbl_pertek` SET `tanggal_approv_pinca` = \'2021-09-10\', `pinca_appovel` = 1\nWHERE `id_pertek` = \'2\''),
(1162, 31, 'UPDATE `tbl_pertek` SET `tanggal_approv_leader` = \'2021-09-10\', `leader_approvel` = 1\nWHERE `id_pertek` = \'2\''),
(1163, 1, 'INSERT INTO `tbl_pertek_det` (`harga_satuan`, `id_pertek`, `keterangan`, `no_sn_new`, `no_urut`, `pertekdet_created_date`, `qty`, `totalppn`) VALUES (\'5000\',\'2\',\'Road Roller\',\'SIMULASI-03\',\'80\',\'1\',\'1\',\'0\')'),
(1164, 1, 'UPDATE `tbl_pertek_det` SET `tanggal_balik` = \'2021-09-10\', `no_sn_lama` = \'2\', `flag_pertukaran` = 1\nWHERE `id_pertek_det` = \'10\''),
(1165, 1, 'UPDATE `tbl_pertek_det` SET `flag_pembukuan` = 1\nWHERE `id_pertek` = \'2\''),
(1166, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',2,\'0\',\'BMU-02\',\'25\')'),
(1167, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BMU-02\',\'25\',\'2021-09-10\')'),
(1168, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',\'1\',\'0\',\'BMU-01\',\'25\')'),
(1169, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BMU-01\',\'25\',\'2021-09-10\')'),
(1170, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',\'1\',\'0\',\'BMU-01\',\'25\')'),
(1171, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BMU-01\',\'25\',\'2021-09-10\')'),
(1172, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',1,0)'),
(1173, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',\'1\',\'0\',\'BMU-01\',\'25\')'),
(1174, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'BMU-01\',\'25\',\'\')'),
(1175, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',1,0)'),
(1176, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-09-10\', `catatan_perbaikan` = \'Okey\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'1\''),
(1177, 1, 'SELECT * FROM `tbl_perbaikankcsp` ORDER BY id_pengkekp_det DESC'),
(1178, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',\'1\',\'1\',\'BMU-01\',\'25\')'),
(1179, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'5000\',1,\'1\',1,1,0,1,\'1\',\'SiCepat\',\'BMU-01\',\'25\',\'2021-09-10\')'),
(1180, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',1,0)'),
(1181, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-09-10\', `catatan_perbaikan` = \'Oke\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'1\''),
(1182, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-09-10\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'1\''),
(1183, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'10000\',\'2\',\'0\',\'MONI-SIMU01\',\'19\')'),
(1184, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,1,0,1,\'0\',\'JNE\',\'MONI-SIMU01\',\'19\',\'2021-09-10\')'),
(1185, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',\'1\',0)'),
(1186, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'1000\',\'3\',\'0\',\'BCC-CEK01\',\'24\')'),
(1187, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'1000\',1,\'1\',1,1,0,1,\'0\',\'JNE\',\'BCC-CEK01\',\'24\',\'2021-09-10\')'),
(1188, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',3,0)'),
(1189, 1, 'INSERT INTO `tbl_pengirimankekp_det` (`harga_barang`, `id_pengirimankekp`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'1000\',\'4\',\'0\',\'CD-SIMU-01\',\'40\')'),
(1190, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'1000\',1,\'1\',1,1,0,1,\'0\',\'POS Indonesia\',\'CD-SIMU-01\',\'40\',\'2021-09-10\')'),
(1191, 1, 'INSERT INTO `tbl_perbaikankcsp` (`catatan_perbaikan`, `id_pengkekp_det`, `status_perbaikan`) VALUES (\'-\',4,0)'),
(1192, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-09-10\', `catatan_perbaikan` = \'Good\', `status_perbaikan` = \'1\'\nWHERE `id_pengkekp_det` = \'4\''),
(1193, 1, 'UPDATE `tbl_pengirimankekp` SET `tanggal_penerimaan` = \'2021-09-10\', `status_pengiriman` = 1\nWHERE `id_pengirimankekp` = \'4\''),
(1194, 1, 'UPDATE `tbl_perbaikankcsp` SET `tanggal_perbaikan` = \'2021-09-13\', `catatan_perbaikan` = \'gosong bos\', `status_perbaikan` = \'2\'\nWHERE `id_pengkekp_det` = \'3\''),
(1195, 1, 'UPDATE `tbl_perbaikankcsp` SET `status_ph` = 1, `status_pembukuan` = 1, `catatan_perbaikan` = \'gosong bos\'\nWHERE `id_pengkekp_det` = \'3\''),
(1196, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'\',\'SN-0191\',\'29\',0), (\'200000\',\'4\',\'\',\'SN-0192\',\'29\',0), (\'\',\'4\',\'\',\'\',\'102\',0)'),
(1197, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'150000\',\'4\',\'Bagus\',\'SN-0191\',\'29\',1), (\'200000\',\'4\',\'Bagus\',\'SN-0192\',\'29\',1), (\'150000\',\'4\',\'Bagus\',\'SN-0100001\',\'102\',1)'),
(1198, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'50000\',\'4\',11,\'Contoh Kabel Sata\',\'32\',\'superadmin\',\'2\',\'100000\',\'10000\'), (\'25000\',\'4\',11,\'Front Transport\',\'52\',\'superadmin\',\'1\',\'25000\',\'0\')'),
(1199, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-15\', `wakadiv_approv` = 1\nWHERE `id_po` = \'11\''),
(1200, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-15\', `kadiv_approv` = 1\nWHERE `id_po` = \'11\''),
(1201, 1, 'DELETE FROM `tbl_po`\nWHERE `id_po` = \'11\''),
(1202, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'50000\',\'4\',12,\'Kaset Windows 7\',\'45\',\'superadmin\',\'2\',\'100000\',\'0\')'),
(1203, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-09-15\', `wakadiv_approv` = 1\nWHERE `id_po` = \'12\''),
(1204, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-09-15\', `kadiv_approv` = 1\nWHERE `id_po` = \'12\''),
(1205, 1, 'INSERT INTO `tbl_do_detail` (`id_do`, `no_urut`, `qty`, `keterangan`, `dodet_created_by`) VALUES (11, \'45\', \'0\', \'\', \'superadmin\')'),
(1206, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'2\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'Oke\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'2021-09-15 15:02:33\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'18\')'),
(1207, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'2\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'Oke\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'2021-09-15 15:02:46\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'18\')'),
(1208, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'Oke\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'2021-09-15 15:03:42\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'18\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'18\')'),
(1209, 1, 'DELETE FROM `tbl_do`\nWHERE `id_do` = \'11\''),
(1210, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (19, \'4\', \'45\', \'50000.00\', 10)'),
(1211, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'19\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'19\' THEN \'Kurang\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'19\' THEN \'2021-09-15 15:10:51\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'19\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'19\')'),
(1212, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (20, \'4\', \'45\', \'50000.00\', 10)'),
(1213, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'3\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'2021-09-15 15:16:24\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'20\')'),
(1214, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN012345\', `tgl_qc` = \'2021-09-15\', `have_sn` = 1, `flag_qc` = 2, `flag_greenpart` = 0, `flag_retur` = 0, `flag_dikemas` = 1, `flag_cacat` = 0, `flag_fisik` = 1, `flag_brg_sesuai` = 1, `ket` = \'Kaset Windows 7\', `barang_updated_date` = \'2021-09-15 15:25:55\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'24\''),
(1215, 1, 'UPDATE `tbl_barang_temp` SET `flag_pindah` = 1, `barang_updated_date` = \'2021-09-15 15:28:22\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'24\''),
(1216, 1, 'INSERT INTO `tbl_transaksi` (`no_sn`, `no_urut`, `id_jtran`, `id_vendor`, `qty`, `kon_barang`, `tran_created_by`, `tran_updated_date`, `tran_updated_by`) VALUES (\'SN012345\', \'\', 2, \'45\', \'1\', 1, \'superadmin\', \'2021-09-15 15:28:22\', \'superadmin\')'),
(1217, 1, 'INSERT INTO `tbl_stock` (`id_rak`, `id_po`, `id_det_currency`, `no_urut`, `no_sn`, `harga_barang`, `flag_qc`, `flag_pakai`, `flag_barang`, `flag_pembukuan`, `flag_greenpart`, `flag_balikan`, `stock_created_by`) VALUES (10, \'12\', \'4\', \'45\', \'SN012345\', \'50000\', 1, 0, 1, 0, 0, 0, \'superadmin\')'),
(1218, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-ABCD\', `tgl_qc` = \'2021-09-15\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'Barang jelek.\', `barang_updated_date` = \'2021-09-15 15:35:05\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'25\''),
(1219, 1, 'UPDATE `tbl_barang_temp` SET `flag_status_vendor` = \'1\', `barang_updated_date` = \'2021-09-15\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'25\''),
(1220, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'12\', \'2021-09-15\', \'2021-09-15\', \'6661\', \'10000\', 0, 0, 1, 1, 1, 1, 1, 1, 1, 0)'),
(1221, 15, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'12\', `tanggal_invoice` = \'2021-09-15\', `tanggal_terima` = \'2021-09-15\', `no_invoice` = \'6661\', `nilai_invoice` = \'10000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'10\''),
(1222, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'12\', \'2021-09-15\', \'2021-09-15\', \'6666000\', \'200000\', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0)'),
(1223, 15, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'12\', `tanggal_invoice` = \'2021-09-15\', `tanggal_terima` = \'2021-09-15\', `no_invoice` = \'6666000\', `nilai_invoice` = \'200000\', `beban` = 1, `tahap_tagihan` = 1, `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'11\''),
(1224, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-666666\', `tgl_qc` = \'2021-09-15\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 0, `flag_cacat` = 1, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'Rusak\', `barang_updated_date` = \'2021-09-15 16:05:39\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'26\''),
(1225, 1, 'UPDATE `tbl_do_detail` SET `qty` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'1\'\nELSE `qty` END, `keterangan` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'\'\nELSE `keterangan` END, `dodet_update_date` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'2021-09-15 16:09:07\'\nELSE `dodet_update_date` END, `dodet_update_by` = CASE \nWHEN `id_do_detail` = \'20\' THEN \'superadmin\'\nELSE `dodet_update_by` END\nWHERE `id_do_detail` IN(\'20\')'),
(1226, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'11\', \'Full\', \'7\', \'PPPB0016/IX/2021\')'),
(1227, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'\''),
(1228, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'\''),
(1229, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'\''),
(1230, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'\''),
(1231, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` IS NULL');
INSERT INTO `tbl_user_log` (`id_log`, `id_user`, `query`) VALUES
(1232, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'\''),
(1233, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'\''),
(1234, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` IS NULL'),
(1235, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` IS NULL'),
(1236, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` IS NULL'),
(1237, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'9\''),
(1238, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (13,\'Ini contoh keterangannya.\',\'19\',\'superadmin\',\'1\')'),
(1239, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'13\',\'Ini contoh keterangannya.\',\'24\',\'superadmin\',\'1\')'),
(1240, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-29\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'13\''),
(1241, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (14,\'Ini BC\',\'24\',\'superadmin\',\'2\'), (14,\'Ini BMU\',\'25\',\'superadmin\',\'2\')'),
(1242, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-09-29\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'14\''),
(1243, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'1000\',\'4\',13,\'tes\',\'43\',\'superadmin\',\'10\',\'10000\',\'1000\')'),
(1244, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'13\''),
(1245, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'1000.00\',\'4\',\'13\',\'tes\',\'43\',\'superadmin\',\'2021-10-13\',\'10\',\'10000.00\',\'1000.00\')'),
(1246, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'1000.00\',\'4\',\'13\',\'tes\',\'43\',\'superadmin\',\'2021-10-15\',\'11\',\'11000\',\'1100\')'),
(1247, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-10-21\', `wakadiv_approv` = 1\nWHERE `id_po` = \'13\''),
(1248, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-10-21\', `kadiv_approv` = 1\nWHERE `id_po` = \'13\''),
(1249, 15, 'UPDATE `tbl_po` SET `kadiv_approv` = 2\nWHERE `id_po` = \'13\''),
(1250, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'13\''),
(1251, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-10-21\', `wakadiv_approv` = 1\nWHERE `id_po` = \'13\''),
(1252, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-10-21\', `kadiv_approv` = 1\nWHERE `id_po` = \'13\''),
(1253, 15, 'UPDATE `tbl_po` SET `kadiv_approv` = 2\nWHERE `id_po` = \'13\''),
(1254, 16, 'UPDATE `tbl_po` SET `wakadiv_approv` = 2\nWHERE `id_po` = \'13\''),
(1255, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_updated_by`, `podet_updated_date`, `qty`, `total`, `total_ppn`) VALUES (\'1000.00\',\'4\',\'13\',\'tes\',\'43\',\'superadmin\',\'2021-10-22\',\'11\',\'11000.00\',\'1100.00\'), (\'1000.00\',\'4\',\'13\',\'tes2\',\'26\',\'superadmin\',\'2021-10-22\',\'2\',\'2000\',\'0\')'),
(1256, 16, 'UPDATE `tbl_po` SET `tanggal_approv_wakadiv` = \'2021-10-22\', `wakadiv_approv` = 1\nWHERE `id_po` = \'13\''),
(1257, 15, 'UPDATE `tbl_po` SET `tanggal_approv_kadiv` = \'2021-10-22\', `kadiv_approv` = 1\nWHERE `id_po` = \'13\''),
(1258, 1, 'INSERT INTO `tbl_do_detail` (`id_do`, `no_urut`, `qty`, `keterangan`, `dodet_created_by`) VALUES (14, \'26\', \'0\', \'\', \'superadmin\')'),
(1259, 1, 'INSERT INTO `tbl_barang_temp` (`id_do_detail`, `id_det_currency`, `no_urut`, `harga_barang`, `id_rak`) VALUES (24, \'4\', \'26\', \'1000.00\', 10)'),
(1260, 1, 'UPDATE `tbl_barang_temp` SET `no_sn` = \'SN-LCD123\', `tgl_qc` = \'2021-10-28\', `have_sn` = 1, `flag_qc` = 1, `flag_greenpart` = 0, `flag_retur` = 1, `flag_dikemas` = 1, `flag_cacat` = 1, `flag_fisik` = 0, `flag_brg_sesuai` = 0, `ket` = \'Barang cacat.\', `barang_updated_date` = \'2021-10-28 11:22:38\', `barang_updated_by` = \'superadmin\'\nWHERE `id_tmp` = \'28\''),
(1261, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Balikan Barang QC Ke Vendor\', `url_menu` = \'Balikanqcven\', `parent_id` = \'160\', `sort_order` = \'8\', `show_in_menu` = 1, `menu_updated_date` = \'2021-10-28 11:37:31\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'180\''),
(1262, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `beban`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'3\', \'2021-10-28\', \'2021-10-28\', \'1111\', \'12222\', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0)'),
(1263, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-10-28\', `tanggal_terima` = \'2021-10-28\', `no_invoice` = \'1111\', `nilai_invoice` = \'12222\', `beban` = 0, `tahap_tagihan` = 1, `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0\nWHERE `id_invoice` = \'12\''),
(1264, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'2\', \'2021-10-29\', \'2021-10-29\', \'291021\', \'\', \'termin\', \'\', 1, 1, 1, 1, 1, 1, 0, 0)'),
(1265, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'13\''),
(1266, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'12\''),
(1267, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'11\''),
(1268, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'2\', \'2021-10-29\', \'2021-10-29\', \'291021\', \'50000\', \'termin\', \'persen\', 1, 1, 1, 1, 1, 1, 0, 0)'),
(1269, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'14\''),
(1270, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'10\''),
(1271, 1, 'DELETE FROM `tbl_invoicebarang`\nWHERE `id_invoice` = \'5\''),
(1272, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `beban`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'2\', \'2021-10-29\', \'2021-10-29\', \'291021\', \'50000\', \'termin\', \'persen\', \'project\', 1, 1, 1, 1, 1, 1, 0, 0)'),
(1273, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `beban`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'3\', \'2021-11-01\', \'2021-11-01\', \'Tes-01\', \'1\', \'termin\', \'persen\', \'project\', 1, 1, 1, 1, 1, 1, 0, 0)'),
(1274, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1275, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1276, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1277, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1278, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'15\''),
(1279, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1280, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1281, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1282, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1283, 16, 'UPDATE `tbl_invoicebarang` SET `status_verifikasi` = 2\nWHERE `id_invoice` = \'16\''),
(1284, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-11-01\', `tanggal_terima` = \'2021-11-01\', `no_invoice` = \'Tes-01\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'persen\', `nilai_invoice` = \'1\', `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0\nWHERE `id_invoice` = \'16\''),
(1285, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-11-01\', `tanggal_terima` = \'2021-11-01\', `no_invoice` = \'Tes-01\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'persen\', `nilai_invoice` = \'1\', `asli_invoice` = 0, `asli_pajak` = 0, `asli_tandaterima` = 0, `copy_po` = 0, `copy_ip` = 0, `asli_ba` = 0, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 0\nWHERE `id_invoice` = \'16\''),
(1286, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-11-01\', `tanggal_terima` = \'2021-11-01\', `no_invoice` = \'Tes-01\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'persen\', `nilai_invoice` = \'1\', `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 0\nWHERE `id_invoice` = \'16\''),
(1287, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'3\', `tanggal_invoice` = \'2021-11-01\', `tanggal_terima` = \'2021-11-01\', `no_invoice` = \'Tes-01\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'persen\', `nilai_invoice` = \'1\', `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'16\''),
(1288, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'16\', \'\', \'\', \'PPPB0016/XI/2021\')'),
(1289, 1, 'DELETE FROM `tbl_permohonan_pem`\nWHERE `id_permohonan_pem` = \'17\''),
(1290, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'16\', \'\', \'\', \'PPPB0016/XI/2021\')'),
(1291, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `beban`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'13\', \'2021-11-01\', \'2021-11-01\', \'TES-02\', \'100\', \'termin\', \'persen\', \'project\', 1, 1, 1, 1, 1, 1, 1, 0)'),
(1292, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'13\', `tanggal_invoice` = \'2021-11-01\', `tanggal_terima` = \'2021-11-01\', `no_invoice` = \'TES-02\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'persen\', `nilai_invoice` = \'100\', `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 1, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'17\''),
(1293, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'17\', \'\', \'\', \'PPPB0017/XI/2021\')'),
(1294, 15, 'UPDATE `tbl_po` SET `id_pembelian` = \'19\', `status_invoice` = 2, `flag_pembayaran` = 2\nWHERE `id_po` = \'13\''),
(1295, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `beban`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'12\', \'2021-11-04\', \'2021-11-04\', \'01-BRE\', \'50\', \'termin\', \'persen\', \'project\', 1, 1, 1, 1, 1, 1, 0, 0)'),
(1296, 1, 'UPDATE `tbl_permohonan_pem` SET `no_voucher` = \'V01\', `tanggal_transaksi` = \'2021-11-04\', `file_voucher` = \'\'\nWHERE `id_permohonan_pem` = \'19\''),
(1297, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'3\', \'\', \'\', \'PPPB0018/XI/2021\')'),
(1298, 1, 'INSERT INTO `tbl_invoicebarang` (`id_po`, `tanggal_invoice`, `tanggal_terima`, `no_invoice`, `nilai_invoice`, `jenis_pembayaran`, `tahap_tagihan`, `beban`, `asli_invoice`, `asli_pajak`, `asli_tandaterima`, `copy_po`, `copy_ip`, `asli_ba`, `dokumen`, `lain_lain`) VALUES (\'13\', \'2021-11-04\', \'2021-11-04\', \'TES-02-2\', \'14000\', \'termin\', \'persen\', \'project\', 1, 1, 1, 1, 1, 1, 0, 0)'),
(1299, 16, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'13\', `tanggal_invoice` = \'2021-11-04\', `tanggal_terima` = \'2021-11-04\', `no_invoice` = \'TES-02-2\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'persen\', `nilai_invoice` = \'14000\', `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 1\nWHERE `id_invoice` = \'19\''),
(1300, 1, 'INSERT INTO `tbl_permohonan_pem` (`id_invoice`, `jenis_pembayaran`, `tempo_pembayaran`, `no_permohonan_pem`) VALUES (\'19\', \'\', \'\', \'PPPB0019/XI/2021\')'),
(1301, 16, 'UPDATE `tbl_po` SET `id_pembelian` = \'21\', `flag_pembayaran` = 1\nWHERE `id_po` = \'13\''),
(1302, 1, 'UPDATE `tbl_permohonan_pem` SET `no_voucher` = \'V02\', `tanggal_transaksi` = \'2021-11-04\', `file_voucher` = \'\'\nWHERE `id_permohonan_pem` = \'21\''),
(1303, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (15,\'Hayang udud\',\'19\',\'superadmin\',\'5\'), (15,\'Hayang ulin\',\'18\',\'superadmin\',\'2\')'),
(1304, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-11-05\', `pinca_approv` = 2\nWHERE `id_permintaan` = \'15\''),
(1305, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (\'15\',\'Hayang udud\',\'19\',\'superadmin\',\'5\'), (\'15\',\'Hayang ulin\',\'18\',\'superadmin\',\'2\')'),
(1306, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-11-05\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'15\''),
(1307, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'15\',\'Bagus\',\'SN-MONI280A1\',\'19\',0), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'5000\',\'15\',\'Bagus\',\'SN-CE280B1\',\'18\',0), (\'0\',\'15\',\'\',\'\',\'18\',0)'),
(1308, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (16,\'Contoh\',\'25\',\'superadmin\',\'2\'), (16,\'Contoh2\',\'14\',\'superadmin\',\'2\')'),
(1309, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-11-18\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'16\''),
(1310, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'500\',\'16\',\'Bagus\',\'SNTES-1\',\'25\',0), (\'0\',\'16\',\'\',\'\',\'25\',0), (\'0\',\'16\',\'\',\'\',\'14\',0), (\'0\',\'16\',\'\',\'\',\'14\',0)'),
(1311, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (17,\'tes\',\'144\',\'superadmin\',\'1\'), (17,\'tes\',\'24\',\'superadmin\',\'1\')'),
(1312, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (18,\'2222\',\'159\',\'superadmin\',\'1\'), (18,\'3333\',\'40\',\'superadmin\',\'1\')'),
(1313, 1, 'INSERT INTO `tbl_user_menu` (`nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_by`) VALUES (\'Permintaann PBJ\', \'permintaan-pbj\', \'160\', \'1\', 1, \'superadmin\')'),
(1314, 1, 'UPDATE `tbl_user_menu` SET `nama_menu` = \'Permintaann PBJ\', `url_menu` = \'Permintaanpbj\', `parent_id` = \'160\', `sort_order` = \'1\', `show_in_menu` = 1, `menu_updated_date` = \'2021-11-24 09:08:04\', `menu_updated_by` = \'superadmin\'\nWHERE `id_menu` = \'181\''),
(1315, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`harga_barang`, `id_pengiriman`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'0\',0,\'\',\'\',\'25\'), (\'5000\',0,\'Bagus\',\'BC-01\',\'14\'), (\'0\',0,\'\',\'\',\'14\')'),
(1316, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`harga_barang`, `id_pengiriman`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'0\',0,\'\',\'\',\'24\'), (\'5000\',0,\'Bagus\',\'BC-01\',\'24\'), (\'0\',0,\'\',\'\',\'25\'), (\'0\',0,\'\',\'\',\'25\')'),
(1317, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`harga_barang`, `id_pengiriman`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'0\',0,\'\',\'\',\'24\'), (\'5000\',0,\'Bagus\',\'BC-01\',\'24\'), (\'0\',0,\'\',\'\',\'25\'), (\'0\',0,\'\',\'\',\'25\')'),
(1318, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`harga_barang`, `id_pengiriman`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'0\',0,\'\',\'\',\'24\'), (\'5000\',0,\'Bagus\',\'BC-01\',\'25\'), (\'0\',0,\'\',\'\',\'25\')'),
(1319, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`harga_barang`, `id_pengiriman`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',0,\'Bagus\',\'BC-01\',\'24\'), (\'0\',0,\'\',\'\',\'25\')'),
(1320, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`harga_barang`, `id_pengiriman`, `kondisi_barang`, `no_sn`, `no_urut`) VALUES (\'5000\',0,\'Bagus\',\'BC-01\',\'24\'), (\'0\',0,\'\',\'\',\'25\')'),
(1321, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'14\',\'Bagus\',\'BC-01\',\'25\',0)'),
(1322, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'15\',\'Bagus\',\'BC-01\',\'19\',1), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'10000\',\'15\',\'Bagus\',\'SIMULASI-01\',\'19\',1), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'0\',\'15\',\'\',\'\',\'18\',0)'),
(1323, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'15\',\'Bagus\',\'BC-01\',\'19\',1), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'10000\',\'15\',\'Bagus\',\'SIMULASI-01\',\'19\',1), (\'0\',\'15\',\'\',\'\',\'19\',0), (\'0\',\'15\',\'\',\'\',\'18\',0)'),
(1324, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`harga_barang`, `id_permintaan`, `kondisi_barang`, `no_sn`, `no_urut`, `status_pemenuhan`) VALUES (\'5000\',\'16\',\'Bagus\',\'BC-01\',\'25\',1), (\'5000\',\'16\',\'Bagus\',\'BC-01\',\'14\',1), (\'5000\',\'16\',\'Bagus\',\'BC-01\',\'14\',1)'),
(1325, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'26000000\',\'4\',14,\'Tes\',\'26\',\'superadmin\',\'2\',\'52000000\',\'5200000\')'),
(1326, 1, 'INSERT INTO `tbl_user_group` (`nama_group`, `group_created_by`) VALUES (\'Pusat\', \'superadmin\')'),
(1327, 1, 'INSERT INTO `tbl_user_subgroup` (`id_group`, `nama_subgroup`, `usubgroup_created_by`) VALUES (\'12\', \'Direksi\', \'superadmin\')'),
(1328, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'24\', \'direksi\', \'08d57f7fdc3c597c14b8b266f2814140a8747895\', \'superadmin\')'),
(1329, 32, 'UPDATE `tbl_po` SET `tanggal_approv_direksi` = \'2021-11-25\', `direksi_approv` = 2\nWHERE `id_po` = \'14\''),
(1330, 1, 'UPDATE `tbl_invoicebarang` SET `id_po` = \'12\', `tanggal_invoice` = \'2021-11-04\', `tanggal_terima` = \'2021-11-04\', `no_invoice` = \'01-BRE\', `jenis_pembayaran` = \'termin\', `beban` = \'project\', `tahap_tagihan` = \'lunas\', `nilai_invoice` = \'50\', `asli_invoice` = 1, `asli_pajak` = 1, `asli_tandaterima` = 1, `copy_po` = 1, `copy_ip` = 1, `asli_ba` = 1, `dokumen` = 0, `lain_lain` = 0, `status_verifikasi` = 0\nWHERE `id_invoice` = \'18\''),
(1331, 1, 'INSERT INTO `tbl_pbj_det` (`keterangan`, `no_urut`, `qty`) VALUES (\'Kaset Bray\',\'151\',\'10\'), (\'Kart Rider\',\'40\',\'5\')'),
(1332, 1, 'INSERT INTO `tbl_pbj_det` (`id_pbj`, `keterangan`, `no_urut`, `qty`) VALUES (\'1\',\'Kaset Bray\',\'151\',\'5\'), (\'1\',\'Kart Rider\',\'40\',\'5\')'),
(1333, 1, 'INSERT INTO `tbl_pbj_det` (`id_pbj`, `keterangan`, `no_urut`, `qty`) VALUES (2,\'ddddd\',\'42\',\'11\'), (2,\'asd\',\'141\',\'2\')'),
(1334, 1, 'DELETE FROM `tbl_pbj`\nWHERE `id` = \'2\''),
(1335, 16, 'UPDATE `tbl_pbj` SET `wakadiv_approv` = 2\nWHERE `id` = \'1\''),
(1336, 16, 'UPDATE `tbl_pbj` SET `wakadiv_approv_date` = \'2021-11-29\', `wakadiv_approv` = 1\nWHERE `id` = \'1\''),
(1337, 1, 'INSERT INTO `tbl_pbj_det` (`id_pbj`, `keterangan`, `no_urut`, `qty`) VALUES (3,\'Ini contoh barangnya\',\'27\',\'5\')'),
(1338, 1, 'INSERT INTO `tbl_user` (`id_uker`, `id_sgroup`, `username`, `password`, `user_created_by`) VALUES (\'1\', \'25\', \'spv_gudang\', \'adcd7048512e64b48da55b027577886ee5a36350\', \'superadmin\')'),
(1339, 33, 'UPDATE `tbl_pbj` SET `spv_gudang_approv_date` = \'2021-12-03\', `spv_gudang_approv` = 1\nWHERE `id` = \'1\''),
(1340, 33, 'UPDATE `tbl_pbj` SET `spv_gudang_approv_date` = \'2021-12-03\', `spv_gudang_approv` = 1\nWHERE `id` = \'3\''),
(1341, 1, 'INSERT INTO `tbl_po_det` (`harga_satuan`, `id_det_currency`, `id_po`, `keterangan`, `no_urut`, `podet_created_by`, `qty`, `total`, `total_ppn`) VALUES (\'50000\',\'4\',15,\'BMU an heula\',\'25\',\'superadmin\',\'10\',\'500000\',\'0\'), (\'100\',\'4\',15,\'lain bbc\',\'24\',\'superadmin\',\'5\',\'500\',\'0\')'),
(1342, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'1\',\'10000\',5,\'AAAAA\',\'1\',\'123213\',\'16\',\'1\')'),
(1343, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'10000\',1,\'1\',1,0,0,1,1,\'JNE\',\'123213\',\'16\',\'2021-12-07\')'),
(1344, 1, 'INSERT INTO `tbl_permintaan_barang_det` (`id_permintaan`, `keterangan`, `no_urut`, `permintaan_det_created_by`, `qty`) VALUES (19,\'Keterangan EPP\',\'49\',\'superadmin\',\'5\'), (19,\'Keterangan Win 7\',\'152\',\'superadmin\',\'2\')'),
(1345, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-12-10\', `pinca_approv` = 2\nWHERE `id_permintaan` = \'19\''),
(1346, 21, 'UPDATE `tbl_permintaan_barang` SET `tgl_approve_pinca` = \'2021-12-10\', `pinca_approv` = 1\nWHERE `id_permintaan` = \'19\''),
(1347, 1, 'INSERT INTO `tbl_pengiriman_barang_det` (`berat_koli`, `harga_barang`, `id_pengiriman`, `keterangan`, `koli_ke`, `no_sn`, `no_urut`, `pengiriman_det_created_by`) VALUES (\'2\',\'50000\',6,\'Belt6001\',\'1\',\'SN6001\',\'143\',\'1\'), (\'4\',\'50000\',6,\'Belt6002\',\'2\',\'SN6002\',\'143\',\'1\')'),
(1348, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_uker`, `is_active`, `is_balikan`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`) VALUES (\'1\',\'50000\',1,\'6\',1,0,0,1,1,\'JNE\',\'SN6001\',\'143\',\'2021-12-13\'), (\'1\',\'50000\',1,\'6\',1,0,0,1,1,\'JNE\',\'SN6002\',\'143\',\'2021-12-13\')'),
(1349, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'50000.00\',2,\'77\',\'6\',\'1\',1,0,\'1\',\'JNE\',\'SN6001\',\'143\',\'2021-12-13\',\'2021-12-13\')'),
(1350, 1, 'INSERT INTO `tbl_transaksi` (`dari_uker`, `harga_barang`, `id_jtran`, `id_tranOld`, `id_uker`, `is_active`, `is_have`, `is_out`, `kon_barang`, `nama_ekpedisi`, `no_sn`, `no_urut`, `tgl_kirim_barang`, `tgl_terima_barang`) VALUES (\'1\',\'50000.00\',2,\'78\',\'6\',\'1\',1,0,\'1\',\'JNE\',\'SN6002\',\'143\',\'2021-12-13\',\'2021-12-13\')');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_menu`
--

CREATE TABLE `tbl_user_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `url_menu` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `show_in_menu` int(11) DEFAULT NULL,
  `menu_created_date` timestamp NULL DEFAULT current_timestamp(),
  `menu_created_by` varchar(255) DEFAULT NULL,
  `menu_updated_date` datetime DEFAULT NULL,
  `menu_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_menu`
--

INSERT INTO `tbl_user_menu` (`id_menu`, `nama_menu`, `url_menu`, `parent_id`, `sort_order`, `show_in_menu`, `menu_created_date`, `menu_created_by`, `menu_updated_date`, `menu_updated_by`) VALUES
(1, 'Dashboard', 'Dashboard', 0, 1, 1, '2021-02-24 02:10:39', 'superadmin', NULL, NULL),
(2, 'Master Data', '#', 0, 2, 1, '2021-02-24 02:11:17', 'superadmin', NULL, NULL),
(3, 'Master Menu', 'Menu', 2, 1, 1, '2021-02-24 02:11:44', 'superadmin', NULL, NULL),
(4, 'Master Group User', 'Groupuser', 157, 1, 1, '2021-02-24 02:16:41', 'superadmin', '2021-04-23 07:45:24', 'superadmin'),
(5, 'Master Subgroup User', 'Subgroupuser', 157, 2, 1, '2021-02-24 02:17:19', 'superadmin', '2021-04-23 07:45:34', 'superadmin'),
(6, 'Master User', 'User', 157, 3, 1, '2021-02-24 02:26:34', 'superadmin', '2021-04-23 07:45:57', 'superadmin'),
(7, 'Master Unit Kerja', 'Unitkerja', 2, 2, 1, '2021-02-24 02:43:33', 'superadmin', '2021-04-23 07:57:56', 'superadmin'),
(8, 'Master Gudang', 'Gudang', 2, 3, 1, '2021-02-24 02:49:10', 'superadmin', '2021-04-23 07:58:08', 'superadmin'),
(9, 'Master Rak', 'Rak', 2, 4, 1, '2021-02-24 02:59:58', 'superadmin', '2021-04-23 07:58:17', 'superadmin'),
(10, 'Master Group Barang', 'Groupbarang', 156, 1, 1, '2021-02-24 03:09:08', 'superadmin', '2021-04-23 07:41:43', 'superadmin'),
(11, 'Master Subgroup Barang', 'Subgroupbarang', 156, 2, 1, '2021-02-24 03:10:10', 'superadmin', '2021-04-23 07:42:52', 'superadmin'),
(12, 'Master Merek Barang', 'Merekbarang', 156, 3, 1, '2021-02-24 04:19:09', 'superadmin', '2021-04-23 07:43:07', 'superadmin'),
(13, 'Master Tipe Barang', 'Tipebarang', 156, 4, 1, '2021-02-24 04:19:31', 'superadmin', '2021-04-23 07:43:23', 'superadmin'),
(14, 'Master Satuan Barang', 'Satuan', 156, 6, 1, '2021-02-24 04:31:59', 'superadmin', '2021-04-23 07:48:14', 'superadmin'),
(16, 'Master Vendor', 'Vendor', 2, 5, 1, '2021-02-24 04:39:39', 'superadmin', '2021-04-23 07:58:30', 'superadmin'),
(17, 'Master Currency', 'Currency', 2, 6, 1, '2021-02-24 04:57:42', 'superadmin', '2021-04-23 07:58:57', 'superadmin'),
(18, 'Master Ekpedisi', 'Ekpedisi', 2, 8, 1, '2021-02-24 05:00:40', 'superadmin', '2021-04-23 08:20:41', 'superadmin'),
(93, 'Purchase Order', 'Purchaseorder', 159, 1, 1, '2021-03-30 02:06:35', 'superadmin', NULL, NULL),
(102, 'Stok Gudang', 'Stokgudang', 160, 1, 1, '2021-03-30 02:14:37', 'superadmin', NULL, NULL),
(103, 'Perbaikan Barang dari KC/SP', 'Perbaikanbarang', 162, 2, 1, '2021-03-30 02:14:57', 'superadmin', '2021-04-01 08:25:35', 'superadmin'),
(104, 'Pemenuhan Barang Cabang', 'Pemenuhanbarang', 160, 2, 1, '2021-03-30 02:15:14', 'superadmin', '2021-04-28 13:54:09', 'superadmin'),
(105, 'Penerimaan Barang Vendor', 'Penerimaanbarven', 160, 4, 1, '2021-03-30 02:15:32', 'superadmin', NULL, NULL),
(106, 'Penerimaan Barang dari Cabang', 'Penerimaanbarcab', 160, 5, 1, '2021-03-30 02:15:53', 'superadmin', '2021-04-07 13:15:44', 'superadmin'),
(107, 'Barang QC dari Vendor', 'Barangqcven', 162, 1, 1, '2021-03-30 02:16:12', 'superadmin', '2021-04-01 08:24:27', 'superadmin'),
(108, 'Permintaan Barang dari Cabang', 'Permintaanbarangcab', 160, 1, 1, '2021-03-30 02:16:43', 'superadmin', '2021-05-18 11:44:58', 'superadmin'),
(109, 'Pembelian Local', 'Pembelianlocal', 161, 1, 1, '2021-03-30 02:17:27', 'superadmin', NULL, NULL),
(110, 'Permintaan Teknisi', 'Permintaanteknisi', 161, 2, 1, '2021-03-30 02:17:43', 'superadmin', NULL, NULL),
(111, 'Pemenuhan Barang untuk Teknisi', 'Pemenuhanbartek', 161, 3, 1, '2021-03-30 02:18:03', 'superadmin', NULL, NULL),
(112, 'Penerimaan Barang yang belum dikembalikan Teknisi', 'Penerimaanbartek', 161, 3, 1, '2021-03-30 02:18:28', 'superadmin', '2021-04-28 13:54:29', 'superadmin'),
(113, 'Pengiriman Barang ke KP/KC', 'Pengirimanbarang', 161, 5, 1, '2021-03-30 02:19:24', 'superadmin', '2021-04-28 13:55:23', 'superadmin'),
(114, 'Penerimaan Barang dari KP/KC', 'Penbarcab', 161, 6, 1, '2021-03-30 02:20:48', 'superadmin', '2021-04-28 13:55:46', 'superadmin'),
(115, 'Permintaan Barang', 'Permintaanbarang', 161, 7, 1, '2021-03-30 02:21:34', 'superadmin', NULL, NULL),
(116, 'Monitoring Penghapus Bukuan Barang', 'Monpenghapusbukbar', 163, 1, 1, '2021-03-30 02:22:08', 'superadmin', '2021-04-20 13:49:29', 'superadmin'),
(117, 'Monitoring Pembukuan Penggunaan Sparepart Kantor Cabang', 'Monpengspare', 163, 2, 1, '2021-03-30 02:23:23', 'superadmin', '2021-04-20 13:25:55', 'superadmin'),
(118, 'Monitoring Pembukuan Persediaan', 'Monpemper', 163, 3, 1, '2021-03-30 02:23:41', 'superadmin', NULL, NULL),
(119, 'Monitoring Pembayaran', 'Monpembayaran', 163, 4, 1, '2021-03-30 02:24:01', 'superadmin', '2021-04-20 13:32:15', 'superadmin'),
(120, 'Permintaan Barang Teknisi', 'Perbartek', 164, 1, 1, '2021-03-30 02:24:36', 'superadmin', '2021-04-21 07:39:18', 'superadmin'),
(121, 'Status Pemakaian Barang', 'Pengbartek', 164, 2, 1, '2021-03-30 02:25:09', 'superadmin', '2021-04-15 08:25:56', 'superadmin'),
(122, 'Permintaan Barang Perbaikan', 'Laporanpusat/Perbarper', 165, 1, 1, '2021-03-30 02:26:00', 'superadmin', '2021-03-30 16:26:53', 'superadmin'),
(123, 'Permintaan Barang Project', 'Laporanpusat/Perbarpro', 165, 2, 1, '2021-03-30 02:26:38', 'superadmin', NULL, NULL),
(124, 'Pemenuhan Barang Cabang', 'Laporanpusat/Pembarcab', 165, 3, 1, '2021-03-30 02:27:16', 'superadmin', NULL, NULL),
(125, 'Purchase Order', 'Laporanpusat/Purchaseorder', 165, 4, 1, '2021-03-30 02:27:37', 'superadmin', NULL, NULL),
(126, 'Penerimaan Barang dari Vendor', 'Laporanpusat/Penbarver', 165, 5, 1, '2021-03-30 02:28:17', 'superadmin', NULL, NULL),
(127, 'Retur Barang dari Vendor', 'Laporanpusat/Returbarver', 165, 6, 1, '2021-03-30 02:28:43', 'superadmin', NULL, NULL),
(128, 'Barang tidak bisa di perbaiki', 'Laporanpusat/Barangnotrepair', 165, 7, 1, '2021-03-30 02:29:33', 'superadmin', NULL, NULL),
(129, 'Penghapus Bukuan Barang', 'Laporankeuangan/Pengbukbar', 166, 1, 1, '2021-03-30 02:30:04', 'superadmin', NULL, NULL),
(130, 'Pembukuan Persediaan', 'Laporankeuangan/Pemper', 166, 2, 1, '2021-03-30 02:30:22', 'superadmin', NULL, NULL),
(131, 'Pembukuan Pembebanan Sparepart', 'Laporankeuangan/Pempemspare', 166, 3, 1, '2021-03-30 02:30:42', 'superadmin', NULL, NULL),
(132, 'Permintaan Teknisi', 'Laporancabang/Pertek', 167, 1, 1, '2021-03-30 02:31:09', 'superadmin', NULL, NULL),
(133, 'Pengembalian Local', 'Laporancabang/Pengloc', 167, 2, 1, '2021-03-30 02:31:41', 'superadmin', NULL, NULL),
(134, 'Pengeluaran Barang Balikan', 'Laporancabang/Pengbarbal', 167, 3, 1, '2021-03-30 02:32:05', 'superadmin', NULL, NULL),
(135, 'Penerimaan Barang dari KP/KC', 'Laporancabang/Penbar', 167, 4, 1, '2021-03-30 02:32:36', 'superadmin', NULL, NULL),
(136, 'Update Profile', 'User/Updateprofile', 168, 1, 1, '2021-03-30 02:33:20', 'superadmin', NULL, NULL),
(145, 'Stock Cabang', 'Stokcabang', 161, 1, 1, '2021-04-05 19:37:34', 'superadmin', '2021-05-18 14:37:34', 'superadmin'),
(146, 'Pembukuan Penggunaan Sparepart Kantor Cabang', 'Pempengsparekancab', 161, 4, 1, '2021-04-05 20:13:55', 'superadmin', '2021-04-28 13:54:52', 'superadmin'),
(147, 'Permohonan Pembayaran Pembelian Barang', 'Permohonanpem', 160, 4, 1, '2021-04-05 20:16:19', 'superadmin', '2021-04-20 09:20:56', 'superadmin'),
(148, 'Penghapus Bukuan Barang', 'Penghapusbukbar', 160, 5, 1, '2021-04-05 20:21:52', 'superadmin', NULL, NULL),
(149, 'Master Project', 'Project', 2, 9, 1, '2021-04-07 19:20:02', 'superadmin', '2021-04-23 08:20:50', 'superadmin'),
(151, 'Master Barang', 'Masterbarang', 156, 5, 1, '2021-04-13 20:27:58', 'superadmin', '2021-04-23 07:43:50', 'superadmin'),
(152, 'Master Pengelolaan Mesin', 'Pengmesin', 2, 10, 1, '2021-04-15 00:16:35', 'superadmin', '2021-04-23 08:21:15', 'superadmin'),
(153, 'Registrasi Invoice Pembelian Barang', 'RegInvoice', 160, 5, 1, '2021-04-18 21:01:28', 'superadmin', '2021-04-28 14:27:53', 'superadmin'),
(154, 'Permohonan Pembayaran Ekpedisi', 'Permohonanpembarek', 160, 6, 1, '2021-04-19 19:21:53', 'superadmin', '2021-04-28 14:29:31', 'superadmin'),
(155, 'List Barang Balikan', 'Barbal', 161, 4, 1, '2021-04-21 22:56:59', 'superadmin', NULL, NULL),
(156, 'Master Barang', '#', 0, 3, 1, '2021-04-22 17:41:11', 'superadmin', '2021-04-23 07:46:30', 'superadmin'),
(157, 'Master User', '#', 0, 4, 1, '2021-04-22 17:44:35', 'superadmin', '2021-04-23 07:46:37', 'superadmin'),
(158, 'Master Detail Currency', 'Detcurrency', 2, 7, 1, '2021-04-22 17:59:45', 'superadmin', NULL, NULL),
(159, 'Purchase Order', '#', 0, 5, 1, '2021-04-22 18:57:45', 'superadmin', NULL, NULL),
(160, 'Gudang (Pengadaan)', '#', 0, 6, 1, '2021-04-22 19:26:42', 'superadmin', '2021-04-27 18:55:26', 'superadmin'),
(161, 'Cabang', '#', 0, 7, 1, '2021-04-22 19:30:17', 'superadmin', NULL, NULL),
(162, 'Quality Control (QC)', '#', 0, 8, 1, '2021-04-22 19:31:57', 'superadmin', NULL, NULL),
(163, 'Keuangan', '#', 0, 9, 1, '2021-04-22 19:33:52', 'superadmin', NULL, NULL),
(164, 'Teknisi', '#', 0, 10, 1, '2021-04-22 19:35:51', 'superadmin', NULL, NULL),
(165, 'Laporan Pusat', '#', 0, 11, 1, '2021-04-22 19:37:04', 'superadmin', NULL, NULL),
(166, 'Laporan Keuangan', '#', 0, 12, 1, '2021-04-22 19:42:32', 'superadmin', NULL, NULL),
(167, 'Laporan Cabang', '#', 0, 13, 1, '2021-04-22 19:43:23', 'superadmin', NULL, NULL),
(168, 'Settings', '#', 0, 14, 1, '2021-04-22 19:45:17', 'superadmin', '2021-04-23 09:45:34', 'superadmin'),
(169, 'Penerimaan Barang Lolos QC (Stok)', 'Penerimaanlolosqc', 160, 7, 1, '2021-04-26 03:44:18', 'superadmin', '2021-04-28 12:37:04', 'superadmin'),
(171, 'Registrasi Invoice Ekpedisi', 'RegInvoiceEkspedisi', 160, 3, 1, '2021-04-28 00:28:24', 'superadmin', '2021-04-30 13:20:23', 'superadmin'),
(172, 'Laporan Pembayaran Pembelian Barang', 'Laporanpusat/Pempembar', 165, 4, 1, '2021-04-28 00:31:36', 'superadmin', '2021-04-30 09:53:53', 'superadmin'),
(173, 'Laporan Pembayaran Ekpedisi', 'Laporanpusat/LapPemEkspedisi', 165, 4, 1, '2021-04-28 00:32:07', 'superadmin', '2021-04-30 13:19:02', 'superadmin'),
(174, 'Pengiriman Barang', 'Pengbarkp', 160, 4, 1, '2021-04-28 00:44:49', 'superadmin', NULL, NULL),
(175, 'Laporan Pengiriman Barang', 'Laporanpusat/Lappengbar', 165, 5, 1, '2021-04-28 00:45:08', 'superadmin', '2021-04-30 15:03:27', 'superadmin'),
(176, 'Monitoring Informasi Pemakaian Sparepart', 'MonInformasipempart', 161, 8, 1, '2021-05-03 06:18:34', 'superadmin', NULL, NULL),
(177, 'Master Layanan Ekpedisi', 'Layananekpedisi', 2, 8, 1, '2021-05-06 12:39:21', 'superadmin', '2021-05-06 19:48:52', 'superadmin'),
(179, 'Test', '#', 0, 1, 1, '2021-06-10 06:16:55', 'superadmin', NULL, NULL),
(180, 'Balikan Barang QC Ke Vendor', 'Balikanqcven', 160, 8, 1, '2021-08-27 12:25:19', 'superadmin', '2021-10-28 11:37:31', 'superadmin'),
(181, 'Permintaann PBJ', 'Permintaanpbj', 160, 1, 1, '2021-11-24 02:01:54', 'superadmin', '2021-11-24 09:08:04', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_pegawai`
--

CREATE TABLE `tbl_user_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `alamat_pegawai` text DEFAULT NULL,
  `jk` char(1) DEFAULT NULL COMMENT 'Jenis Kelamin',
  `photo` text DEFAULT NULL,
  `telp` char(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pegawai_created_date` datetime DEFAULT NULL,
  `pegawai_created_by` varchar(255) DEFAULT NULL,
  `pegawai_updated_date` datetime DEFAULT NULL,
  `pegawai_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_pegawai`
--

INSERT INTO `tbl_user_pegawai` (`id_pegawai`, `id_user`, `nama_pegawai`, `alamat_pegawai`, `jk`, `photo`, `telp`, `email`, `pegawai_created_date`, `pegawai_created_by`, `pegawai_updated_date`, `pegawai_updated_by`) VALUES
(5, 1, 'Superadmin Pusat', '-', 'L', 'b494b4a3f67f272fab5983a573ff54b1.jpg', '0001', 'pusat@gmail.com', '2021-04-27 19:37:29', 'superadmin', '2021-07-29 10:46:33', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_permission`
--

CREATE TABLE `tbl_user_permission` (
  `id_per` int(11) NOT NULL,
  `id_sgroup` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `per_select` int(11) DEFAULT NULL,
  `per_insert` int(11) DEFAULT NULL,
  `per_update` int(11) DEFAULT NULL,
  `per_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_permission`
--

INSERT INTO `tbl_user_permission` (`id_per`, `id_sgroup`, `id_menu`, `per_select`, `per_insert`, `per_update`, `per_delete`) VALUES
(1, 1, 1, 1, 0, 0, 0),
(2, 1, 2, 1, 0, 0, 0),
(80, 1, 3, 1, 1, 1, 1),
(81, 1, 4, 1, 1, 1, 1),
(82, 1, 5, 1, 1, 1, 1),
(83, 1, 6, 1, 1, 1, 1),
(84, 1, 7, 1, 1, 1, 1),
(85, 1, 8, 1, 1, 1, 1),
(86, 1, 9, 1, 1, 1, 1),
(87, 1, 10, 1, 1, 1, 1),
(88, 1, 11, 1, 1, 1, 1),
(89, 1, 12, 1, 1, 1, 1),
(90, 1, 13, 1, 1, 1, 1),
(91, 1, 14, 1, 1, 1, 1),
(92, 1, 16, 1, 1, 1, 1),
(93, 1, 17, 1, 1, 1, 1),
(94, 1, 18, 1, 1, 1, 1),
(96, 1, 93, 1, 1, 1, 1),
(105, 1, 102, 1, 1, 1, 1),
(106, 1, 103, 1, 1, 1, 1),
(107, 1, 104, 1, 1, 1, 1),
(108, 1, 105, 1, 1, 1, 1),
(109, 1, 106, 1, 1, 1, 1),
(110, 1, 107, 1, 1, 1, 1),
(111, 1, 108, 1, 1, 1, 1),
(112, 1, 109, 1, 1, 1, 1),
(113, 1, 110, 1, 1, 1, 1),
(114, 1, 111, 1, 1, 1, 1),
(115, 1, 112, 1, 1, 1, 1),
(116, 1, 113, 1, 1, 1, 1),
(117, 1, 114, 1, 1, 1, 1),
(118, 1, 115, 1, 1, 1, 1),
(119, 1, 116, 1, 1, 1, 1),
(120, 1, 117, 1, 1, 1, 1),
(121, 1, 118, 1, 1, 1, 1),
(122, 1, 119, 1, 1, 1, 1),
(123, 1, 120, 1, 1, 1, 1),
(124, 1, 121, 1, 1, 1, 1),
(125, 1, 122, 1, 1, 1, 1),
(126, 1, 123, 1, 1, 1, 1),
(127, 1, 124, 1, 1, 1, 1),
(128, 1, 125, 1, 1, 1, 1),
(129, 1, 126, 1, 1, 1, 1),
(130, 1, 127, 1, 1, 1, 1),
(131, 1, 128, 1, 1, 1, 1),
(132, 1, 129, 1, 1, 1, 1),
(133, 1, 130, 1, 1, 1, 1),
(134, 1, 131, 1, 1, 1, 1),
(135, 1, 132, 1, 1, 1, 1),
(136, 1, 133, 1, 1, 1, 1),
(137, 1, 134, 1, 1, 1, 1),
(138, 1, 135, 1, 1, 1, 1),
(139, 1, 136, 1, 1, 1, 1),
(187, 8, 1, 1, 0, 0, 0),
(188, 8, 2, 0, 0, 0, 0),
(189, 8, 3, 0, 0, 0, 0),
(190, 8, 4, 0, 0, 0, 0),
(191, 8, 5, 0, 0, 0, 0),
(192, 8, 6, 0, 0, 0, 0),
(193, 8, 7, 0, 0, 0, 0),
(194, 8, 8, 0, 0, 0, 0),
(195, 8, 9, 0, 0, 0, 0),
(196, 8, 10, 0, 0, 0, 0),
(197, 8, 11, 0, 0, 0, 0),
(198, 8, 12, 0, 0, 0, 0),
(199, 8, 13, 0, 0, 0, 0),
(200, 8, 14, 0, 0, 0, 0),
(201, 8, 16, 0, 0, 0, 0),
(202, 8, 17, 0, 0, 0, 0),
(203, 8, 18, 0, 0, 0, 0),
(205, 8, 93, 1, 0, 1, 0),
(214, 8, 102, 1, 0, 0, 0),
(215, 8, 103, 0, 0, 0, 0),
(216, 8, 104, 0, 0, 0, 0),
(217, 8, 105, 0, 0, 0, 0),
(218, 8, 106, 0, 0, 0, 0),
(219, 8, 107, 0, 0, 0, 0),
(220, 8, 108, 0, 0, 0, 0),
(221, 8, 109, 0, 0, 0, 0),
(222, 8, 110, 0, 0, 0, 0),
(223, 8, 111, 0, 0, 0, 0),
(224, 8, 112, 0, 0, 0, 0),
(225, 8, 113, 0, 0, 0, 0),
(226, 8, 114, 0, 0, 0, 0),
(227, 8, 115, 0, 0, 0, 0),
(228, 8, 116, 0, 0, 0, 0),
(229, 8, 117, 0, 0, 0, 0),
(230, 8, 118, 0, 0, 0, 0),
(231, 8, 119, 0, 0, 0, 0),
(232, 8, 120, 0, 0, 0, 0),
(233, 8, 121, 0, 0, 0, 0),
(234, 8, 122, 1, 0, 0, 0),
(235, 8, 123, 1, 0, 0, 0),
(236, 8, 124, 1, 0, 0, 0),
(237, 8, 125, 1, 0, 0, 0),
(238, 8, 126, 1, 0, 0, 0),
(239, 8, 127, 1, 0, 0, 0),
(240, 8, 128, 1, 0, 0, 0),
(241, 8, 129, 0, 0, 0, 0),
(242, 8, 130, 0, 0, 0, 0),
(243, 8, 131, 0, 0, 0, 0),
(244, 8, 132, 0, 0, 0, 0),
(245, 8, 133, 0, 0, 0, 0),
(246, 8, 134, 0, 0, 0, 0),
(247, 8, 135, 0, 0, 0, 0),
(248, 8, 136, 1, 0, 0, 0),
(250, 8, 145, 0, 0, 0, 0),
(251, 8, 146, 0, 0, 0, 0),
(252, 8, 147, 1, 0, 0, 0),
(253, 8, 148, 1, 0, 0, 0),
(254, 8, 149, 0, 0, 0, 0),
(256, 2, 1, 1, 0, 0, 0),
(257, 2, 2, 0, 0, 0, 0),
(258, 2, 3, 0, 0, 0, 0),
(259, 2, 4, 0, 0, 0, 0),
(260, 2, 5, 0, 0, 0, 0),
(261, 2, 6, 0, 0, 0, 0),
(262, 2, 7, 0, 0, 0, 0),
(263, 2, 8, 0, 0, 0, 0),
(264, 2, 9, 0, 0, 0, 0),
(265, 2, 10, 0, 0, 0, 0),
(266, 2, 11, 0, 0, 0, 0),
(267, 2, 12, 0, 0, 0, 0),
(268, 2, 13, 0, 0, 0, 0),
(269, 2, 14, 0, 0, 0, 0),
(270, 2, 16, 0, 0, 0, 0),
(271, 2, 17, 0, 0, 0, 0),
(272, 2, 18, 0, 0, 0, 0),
(274, 2, 93, 1, 1, 1, 1),
(283, 2, 102, 1, 0, 0, 0),
(284, 2, 103, 0, 0, 0, 0),
(285, 2, 104, 0, 0, 0, 0),
(286, 2, 105, 0, 0, 0, 0),
(287, 2, 106, 0, 0, 0, 0),
(288, 2, 107, 0, 0, 0, 0),
(289, 2, 108, 0, 0, 0, 0),
(290, 2, 109, 0, 0, 0, 0),
(291, 2, 110, 0, 0, 0, 0),
(292, 2, 111, 0, 0, 0, 0),
(293, 2, 112, 0, 0, 0, 0),
(294, 2, 113, 0, 0, 0, 0),
(295, 2, 114, 0, 0, 0, 0),
(296, 2, 115, 0, 0, 0, 0),
(297, 2, 116, 0, 0, 0, 0),
(298, 2, 117, 0, 0, 0, 0),
(299, 2, 118, 0, 0, 0, 0),
(300, 2, 119, 0, 0, 0, 0),
(301, 2, 120, 0, 0, 0, 0),
(302, 2, 121, 0, 0, 0, 0),
(303, 2, 122, 1, 0, 0, 0),
(304, 2, 123, 1, 0, 0, 0),
(305, 2, 124, 1, 0, 0, 0),
(306, 2, 125, 1, 0, 0, 0),
(307, 2, 126, 1, 0, 0, 0),
(308, 2, 127, 1, 0, 0, 0),
(309, 2, 128, 1, 0, 0, 0),
(310, 2, 129, 0, 0, 0, 0),
(311, 2, 130, 0, 0, 0, 0),
(312, 2, 131, 0, 0, 0, 0),
(313, 2, 132, 0, 0, 0, 0),
(314, 2, 133, 0, 0, 0, 0),
(315, 2, 134, 0, 0, 0, 0),
(316, 2, 135, 0, 0, 0, 0),
(317, 2, 136, 1, 0, 0, 0),
(319, 2, 145, 0, 0, 0, 0),
(320, 2, 146, 0, 0, 0, 0),
(321, 2, 147, 1, 0, 0, 0),
(322, 2, 148, 1, 0, 0, 0),
(323, 2, 149, 0, 0, 0, 0),
(324, 1, 145, 1, 1, 1, 1),
(325, 1, 146, 1, 1, 1, 1),
(326, 1, 147, 1, 1, 1, 1),
(327, 1, 148, 1, 1, 1, 1),
(328, 1, 149, 1, 1, 1, 1),
(329, 1, 151, 1, 1, 1, 1),
(330, 1, 152, 1, 1, 1, 1),
(331, 1, 153, 1, 1, 1, 1),
(332, 1, 154, 1, 1, 1, 1),
(333, 1, 155, 1, 1, 1, 1),
(334, 1, 156, 1, 0, 0, 0),
(335, 1, 157, 1, 0, 0, 0),
(336, 1, 158, 1, 1, 1, 1),
(337, 1, 159, 1, 0, 0, 0),
(338, 1, 160, 1, 0, 0, 0),
(339, 1, 161, 1, 0, 0, 0),
(340, 1, 162, 1, 0, 0, 0),
(341, 1, 163, 1, 0, 0, 0),
(342, 1, 164, 1, 0, 0, 0),
(343, 1, 165, 1, 0, 0, 0),
(344, 1, 166, 1, 0, 0, 0),
(345, 1, 167, 1, 0, 0, 0),
(346, 1, 168, 1, 0, 0, 0),
(347, 1, 169, 1, 1, 1, 1),
(349, 2, 151, 0, 0, 0, 0),
(350, 2, 152, 0, 0, 0, 0),
(351, 2, 153, 1, 0, 0, 0),
(352, 2, 154, 1, 0, 0, 0),
(353, 2, 155, 0, 0, 0, 0),
(354, 2, 156, 0, 0, 0, 0),
(355, 2, 157, 0, 0, 0, 0),
(356, 2, 158, 0, 0, 0, 0),
(357, 2, 159, 1, 0, 0, 0),
(358, 2, 160, 1, 0, 0, 0),
(359, 2, 161, 0, 0, 0, 0),
(360, 2, 162, 0, 0, 0, 0),
(361, 2, 163, 0, 0, 0, 0),
(362, 2, 164, 0, 0, 0, 0),
(363, 2, 165, 1, 0, 0, 0),
(364, 2, 166, 0, 0, 0, 0),
(365, 2, 167, 0, 0, 0, 0),
(366, 2, 168, 1, 0, 0, 0),
(367, 2, 169, 0, 0, 0, 0),
(369, 8, 151, 0, 0, 0, 0),
(370, 8, 152, 0, 0, 0, 0),
(371, 8, 153, 1, 0, 0, 0),
(372, 8, 154, 1, 0, 0, 0),
(373, 8, 155, 0, 0, 0, 0),
(374, 8, 156, 0, 0, 0, 0),
(375, 8, 157, 0, 0, 0, 0),
(376, 8, 158, 0, 0, 0, 0),
(377, 8, 159, 1, 0, 0, 0),
(378, 8, 160, 1, 0, 0, 0),
(379, 8, 161, 0, 0, 0, 0),
(380, 8, 162, 0, 0, 0, 0),
(381, 8, 163, 0, 0, 0, 0),
(382, 8, 164, 0, 0, 0, 0),
(383, 8, 165, 1, 0, 0, 0),
(384, 8, 166, 0, 0, 0, 0),
(385, 8, 167, 0, 0, 0, 0),
(386, 8, 168, 1, 0, 0, 0),
(387, 8, 169, 0, 0, 0, 0),
(389, 9, 1, 1, 0, 0, 0),
(390, 9, 2, 0, 0, 0, 0),
(391, 9, 3, 0, 0, 0, 0),
(392, 9, 4, 0, 0, 0, 0),
(393, 9, 5, 0, 0, 0, 0),
(394, 9, 6, 0, 0, 0, 0),
(395, 9, 7, 0, 0, 0, 0),
(396, 9, 8, 0, 0, 0, 0),
(397, 9, 9, 0, 0, 0, 0),
(398, 9, 10, 0, 0, 0, 0),
(399, 9, 11, 0, 0, 0, 0),
(400, 9, 12, 0, 0, 0, 0),
(401, 9, 13, 0, 0, 0, 0),
(402, 9, 14, 0, 0, 0, 0),
(403, 9, 16, 0, 0, 0, 0),
(404, 9, 17, 0, 0, 0, 0),
(405, 9, 18, 0, 0, 0, 0),
(406, 9, 93, 0, 0, 0, 0),
(407, 9, 102, 0, 0, 0, 0),
(408, 9, 103, 0, 0, 0, 0),
(409, 9, 104, 0, 0, 0, 0),
(410, 9, 105, 0, 0, 0, 0),
(411, 9, 106, 0, 0, 0, 0),
(412, 9, 107, 0, 0, 0, 0),
(413, 9, 108, 0, 0, 0, 0),
(414, 9, 109, 1, 0, 0, 0),
(415, 9, 110, 0, 0, 0, 0),
(416, 9, 111, 1, 0, 0, 0),
(417, 9, 112, 1, 0, 0, 0),
(418, 9, 113, 1, 0, 0, 0),
(419, 9, 114, 1, 0, 0, 0),
(420, 9, 115, 1, 0, 0, 0),
(421, 9, 116, 0, 0, 0, 0),
(422, 9, 117, 0, 0, 0, 0),
(423, 9, 118, 0, 0, 0, 0),
(424, 9, 119, 0, 0, 0, 0),
(425, 9, 120, 0, 0, 0, 0),
(426, 9, 121, 0, 0, 0, 0),
(427, 9, 122, 0, 0, 0, 0),
(428, 9, 123, 0, 0, 0, 0),
(429, 9, 124, 0, 0, 0, 0),
(430, 9, 125, 0, 0, 0, 0),
(431, 9, 126, 0, 0, 0, 0),
(432, 9, 127, 0, 0, 0, 0),
(433, 9, 128, 0, 0, 0, 0),
(434, 9, 129, 0, 0, 0, 0),
(435, 9, 130, 0, 0, 0, 0),
(436, 9, 131, 0, 0, 0, 0),
(437, 9, 132, 1, 0, 0, 0),
(438, 9, 133, 1, 0, 0, 0),
(439, 9, 134, 1, 0, 0, 0),
(440, 9, 135, 1, 0, 0, 0),
(441, 9, 136, 1, 0, 0, 0),
(442, 9, 145, 1, 0, 0, 0),
(443, 9, 146, 1, 0, 0, 0),
(444, 9, 147, 0, 0, 0, 0),
(445, 9, 148, 0, 0, 0, 0),
(446, 9, 149, 0, 0, 0, 0),
(447, 9, 151, 0, 0, 0, 0),
(448, 9, 152, 0, 0, 0, 0),
(449, 9, 153, 0, 0, 0, 0),
(450, 9, 154, 0, 0, 0, 0),
(451, 9, 155, 1, 0, 0, 0),
(452, 9, 156, 0, 0, 0, 0),
(453, 9, 157, 0, 0, 0, 0),
(454, 9, 158, 0, 0, 0, 0),
(455, 9, 159, 0, 0, 0, 0),
(456, 9, 160, 0, 0, 0, 0),
(457, 9, 161, 1, 0, 0, 0),
(458, 9, 162, 0, 0, 0, 0),
(459, 9, 163, 0, 0, 0, 0),
(460, 9, 164, 0, 0, 0, 0),
(461, 9, 165, 0, 0, 0, 0),
(462, 9, 166, 0, 0, 0, 0),
(463, 9, 167, 1, 0, 0, 0),
(464, 9, 168, 1, 0, 0, 0),
(465, 9, 169, 0, 0, 0, 0),
(467, 10, 1, 0, 0, 0, 0),
(468, 10, 2, 0, 0, 0, 0),
(469, 10, 3, 0, 0, 0, 0),
(470, 10, 4, 0, 0, 0, 0),
(471, 10, 5, 0, 0, 0, 0),
(472, 10, 6, 0, 0, 0, 0),
(473, 10, 7, 0, 0, 0, 0),
(474, 10, 8, 0, 0, 0, 0),
(475, 10, 9, 0, 0, 0, 0),
(476, 10, 10, 0, 0, 0, 0),
(477, 10, 11, 0, 0, 0, 0),
(478, 10, 12, 0, 0, 0, 0),
(479, 10, 13, 0, 0, 0, 0),
(480, 10, 14, 0, 0, 0, 0),
(481, 10, 16, 0, 0, 0, 0),
(482, 10, 17, 0, 0, 0, 0),
(483, 10, 18, 0, 0, 0, 0),
(484, 10, 93, 0, 0, 0, 0),
(485, 10, 102, 0, 0, 0, 0),
(486, 10, 103, 0, 0, 0, 0),
(487, 10, 104, 0, 0, 0, 0),
(488, 10, 105, 0, 0, 0, 0),
(489, 10, 106, 0, 0, 0, 0),
(490, 10, 107, 0, 0, 0, 0),
(491, 10, 108, 0, 0, 0, 0),
(492, 10, 109, 0, 0, 0, 0),
(493, 10, 110, 0, 0, 0, 0),
(494, 10, 111, 0, 0, 0, 0),
(495, 10, 112, 0, 0, 0, 0),
(496, 10, 113, 0, 0, 0, 0),
(497, 10, 114, 0, 0, 0, 0),
(498, 10, 115, 0, 0, 0, 0),
(499, 10, 116, 0, 0, 0, 0),
(500, 10, 117, 0, 0, 0, 0),
(501, 10, 118, 0, 0, 0, 0),
(502, 10, 119, 0, 0, 0, 0),
(503, 10, 120, 1, 0, 0, 0),
(504, 10, 121, 1, 0, 0, 0),
(505, 10, 122, 0, 0, 0, 0),
(506, 10, 123, 0, 0, 0, 0),
(507, 10, 124, 0, 0, 0, 0),
(508, 10, 125, 0, 0, 0, 0),
(509, 10, 126, 0, 0, 0, 0),
(510, 10, 127, 0, 0, 0, 0),
(511, 10, 128, 0, 0, 0, 0),
(512, 10, 129, 0, 0, 0, 0),
(513, 10, 130, 0, 0, 0, 0),
(514, 10, 131, 0, 0, 0, 0),
(515, 10, 132, 0, 0, 0, 0),
(516, 10, 133, 0, 0, 0, 0),
(517, 10, 134, 0, 0, 0, 0),
(518, 10, 135, 0, 0, 0, 0),
(519, 10, 136, 1, 0, 0, 0),
(520, 10, 145, 0, 0, 0, 0),
(521, 10, 146, 0, 0, 0, 0),
(522, 10, 147, 0, 0, 0, 0),
(523, 10, 148, 0, 0, 0, 0),
(524, 10, 149, 0, 0, 0, 0),
(525, 10, 151, 0, 0, 0, 0),
(526, 10, 152, 0, 0, 0, 0),
(527, 10, 153, 0, 0, 0, 0),
(528, 10, 154, 0, 0, 0, 0),
(529, 10, 155, 0, 0, 0, 0),
(530, 10, 156, 0, 0, 0, 0),
(531, 10, 157, 0, 0, 0, 0),
(532, 10, 158, 0, 0, 0, 0),
(533, 10, 159, 0, 0, 0, 0),
(534, 10, 160, 0, 0, 0, 0),
(535, 10, 161, 0, 0, 0, 0),
(536, 10, 162, 0, 0, 0, 0),
(537, 10, 163, 0, 0, 0, 0),
(538, 10, 164, 1, 0, 0, 0),
(539, 10, 165, 0, 0, 0, 0),
(540, 10, 166, 0, 0, 0, 0),
(541, 10, 167, 0, 0, 0, 0),
(542, 10, 168, 1, 0, 0, 0),
(543, 10, 169, 0, 0, 0, 0),
(545, 13, 1, 1, 0, 0, 0),
(546, 13, 2, 0, 0, 0, 0),
(547, 13, 3, 0, 0, 0, 0),
(548, 13, 4, 0, 0, 0, 0),
(549, 13, 5, 0, 0, 0, 0),
(550, 13, 6, 0, 0, 0, 0),
(551, 13, 7, 0, 0, 0, 0),
(552, 13, 8, 0, 0, 0, 0),
(553, 13, 9, 0, 0, 0, 0),
(554, 13, 10, 0, 0, 0, 0),
(555, 13, 11, 0, 0, 0, 0),
(556, 13, 12, 0, 0, 0, 0),
(557, 13, 13, 0, 0, 0, 0),
(558, 13, 14, 0, 0, 0, 0),
(559, 13, 16, 0, 0, 0, 0),
(560, 13, 17, 0, 0, 0, 0),
(561, 13, 18, 0, 0, 0, 0),
(562, 13, 93, 0, 0, 0, 0),
(563, 13, 102, 0, 0, 0, 0),
(564, 13, 103, 0, 0, 0, 0),
(565, 13, 104, 0, 0, 0, 0),
(566, 13, 105, 0, 0, 0, 0),
(567, 13, 106, 0, 0, 0, 0),
(568, 13, 107, 0, 0, 0, 0),
(569, 13, 108, 0, 0, 0, 0),
(570, 13, 109, 1, 0, 0, 0),
(571, 13, 110, 0, 0, 0, 0),
(572, 13, 111, 1, 0, 0, 0),
(573, 13, 112, 1, 0, 0, 0),
(574, 13, 113, 1, 0, 0, 0),
(575, 13, 114, 1, 0, 0, 0),
(576, 13, 115, 1, 0, 0, 0),
(577, 13, 116, 0, 0, 0, 0),
(578, 13, 117, 0, 0, 0, 0),
(579, 13, 118, 0, 0, 0, 0),
(580, 13, 119, 0, 0, 0, 0),
(581, 13, 120, 0, 0, 0, 0),
(582, 13, 121, 0, 0, 0, 0),
(583, 13, 122, 0, 0, 0, 0),
(584, 13, 123, 0, 0, 0, 0),
(585, 13, 124, 0, 0, 0, 0),
(586, 13, 125, 0, 0, 0, 0),
(587, 13, 126, 0, 0, 0, 0),
(588, 13, 127, 0, 0, 0, 0),
(589, 13, 128, 0, 0, 0, 0),
(590, 13, 129, 0, 0, 0, 0),
(591, 13, 130, 0, 0, 0, 0),
(592, 13, 131, 0, 0, 0, 0),
(593, 13, 132, 1, 0, 0, 0),
(594, 13, 133, 1, 0, 0, 0),
(595, 13, 134, 1, 0, 0, 0),
(596, 13, 135, 1, 0, 0, 0),
(597, 13, 136, 1, 0, 0, 0),
(598, 13, 145, 1, 0, 0, 0),
(599, 13, 146, 1, 0, 0, 0),
(600, 13, 147, 0, 0, 0, 0),
(601, 13, 148, 0, 0, 0, 0),
(602, 13, 149, 0, 0, 0, 0),
(603, 13, 151, 0, 0, 0, 0),
(604, 13, 152, 0, 0, 0, 0),
(605, 13, 153, 0, 0, 0, 0),
(606, 13, 154, 0, 0, 0, 0),
(607, 13, 155, 1, 0, 0, 0),
(608, 13, 156, 0, 0, 0, 0),
(609, 13, 157, 0, 0, 0, 0),
(610, 13, 158, 0, 0, 0, 0),
(611, 13, 159, 0, 0, 0, 0),
(612, 13, 160, 0, 0, 0, 0),
(613, 13, 161, 1, 0, 0, 0),
(614, 13, 162, 0, 0, 0, 0),
(615, 13, 163, 0, 0, 0, 0),
(616, 13, 164, 0, 0, 0, 0),
(617, 13, 165, 0, 0, 0, 0),
(618, 13, 166, 0, 0, 0, 0),
(619, 13, 167, 1, 0, 0, 0),
(620, 13, 168, 1, 0, 0, 0),
(621, 13, 169, 0, 0, 0, 0),
(623, 14, 1, 1, 0, 0, 0),
(624, 14, 2, 0, 0, 0, 0),
(625, 14, 3, 0, 0, 0, 0),
(626, 14, 4, 0, 0, 0, 0),
(627, 14, 5, 0, 0, 0, 0),
(628, 14, 6, 0, 0, 0, 0),
(629, 14, 7, 0, 0, 0, 0),
(630, 14, 8, 0, 0, 0, 0),
(631, 14, 9, 0, 0, 0, 0),
(632, 14, 10, 0, 0, 0, 0),
(633, 14, 11, 0, 0, 0, 0),
(634, 14, 12, 0, 0, 0, 0),
(635, 14, 13, 0, 0, 0, 0),
(636, 14, 14, 0, 0, 0, 0),
(637, 14, 16, 0, 0, 0, 0),
(638, 14, 17, 0, 0, 0, 0),
(639, 14, 18, 0, 0, 0, 0),
(640, 14, 93, 0, 0, 0, 0),
(641, 14, 102, 0, 0, 0, 0),
(642, 14, 103, 0, 0, 0, 0),
(643, 14, 104, 0, 0, 0, 0),
(644, 14, 105, 0, 0, 0, 0),
(645, 14, 106, 0, 0, 0, 0),
(646, 14, 107, 0, 0, 0, 0),
(647, 14, 108, 0, 0, 0, 0),
(648, 14, 109, 1, 0, 0, 0),
(649, 14, 110, 1, 0, 1, 0),
(650, 14, 111, 1, 0, 0, 0),
(651, 14, 112, 1, 0, 0, 0),
(652, 14, 113, 1, 0, 0, 0),
(653, 14, 114, 1, 0, 0, 0),
(654, 14, 115, 1, 0, 1, 0),
(655, 14, 116, 0, 0, 0, 0),
(656, 14, 117, 0, 0, 0, 0),
(657, 14, 118, 0, 0, 0, 0),
(658, 14, 119, 0, 0, 0, 0),
(659, 14, 120, 0, 0, 0, 0),
(660, 14, 121, 0, 0, 0, 0),
(661, 14, 122, 0, 0, 0, 0),
(662, 14, 123, 0, 0, 0, 0),
(663, 14, 124, 0, 0, 0, 0),
(664, 14, 125, 0, 0, 0, 0),
(665, 14, 126, 0, 0, 0, 0),
(666, 14, 127, 0, 0, 0, 0),
(667, 14, 128, 0, 0, 0, 0),
(668, 14, 129, 0, 0, 0, 0),
(669, 14, 130, 0, 0, 0, 0),
(670, 14, 131, 0, 0, 0, 0),
(671, 14, 132, 1, 0, 0, 0),
(672, 14, 133, 1, 0, 0, 0),
(673, 14, 134, 1, 0, 0, 0),
(674, 14, 135, 1, 0, 0, 0),
(675, 14, 136, 1, 0, 0, 0),
(676, 14, 145, 1, 0, 0, 0),
(677, 14, 146, 1, 0, 0, 0),
(678, 14, 147, 0, 0, 0, 0),
(679, 14, 148, 0, 0, 0, 0),
(680, 14, 149, 0, 0, 0, 0),
(681, 14, 151, 0, 0, 0, 0),
(682, 14, 152, 0, 0, 0, 0),
(683, 14, 153, 0, 0, 0, 0),
(684, 14, 154, 0, 0, 0, 0),
(685, 14, 155, 1, 0, 0, 0),
(686, 14, 156, 0, 0, 0, 0),
(687, 14, 157, 0, 0, 0, 0),
(688, 14, 158, 0, 0, 0, 0),
(689, 14, 159, 0, 0, 0, 0),
(690, 14, 160, 0, 0, 0, 0),
(691, 14, 161, 1, 0, 0, 0),
(692, 14, 162, 0, 0, 0, 0),
(693, 14, 163, 0, 0, 0, 0),
(694, 14, 164, 0, 0, 0, 0),
(695, 14, 165, 0, 0, 0, 0),
(696, 14, 166, 0, 0, 0, 0),
(697, 14, 167, 1, 0, 0, 0),
(698, 14, 168, 1, 0, 0, 0),
(699, 14, 169, 0, 0, 0, 0),
(701, 16, 1, 1, 0, 0, 0),
(702, 16, 2, 0, 0, 0, 0),
(703, 16, 3, 0, 0, 0, 0),
(704, 16, 4, 0, 0, 0, 0),
(705, 16, 5, 0, 0, 0, 0),
(706, 16, 6, 0, 0, 0, 0),
(707, 16, 7, 0, 0, 0, 0),
(708, 16, 8, 0, 0, 0, 0),
(709, 16, 9, 0, 0, 0, 0),
(710, 16, 10, 0, 0, 0, 0),
(711, 16, 11, 0, 0, 0, 0),
(712, 16, 12, 0, 0, 0, 0),
(713, 16, 13, 0, 0, 0, 0),
(714, 16, 14, 0, 0, 0, 0),
(715, 16, 16, 0, 0, 0, 0),
(716, 16, 17, 0, 0, 0, 0),
(717, 16, 18, 0, 0, 0, 0),
(718, 16, 93, 1, 0, 0, 0),
(719, 16, 102, 1, 0, 0, 0),
(720, 16, 103, 0, 0, 0, 0),
(721, 16, 104, 0, 0, 0, 0),
(722, 16, 105, 0, 0, 0, 0),
(723, 16, 106, 0, 0, 0, 0),
(724, 16, 107, 0, 0, 0, 0),
(725, 16, 108, 0, 0, 0, 0),
(726, 16, 109, 0, 0, 0, 0),
(727, 16, 110, 0, 0, 0, 0),
(728, 16, 111, 0, 0, 0, 0),
(729, 16, 112, 0, 0, 0, 0),
(730, 16, 113, 0, 0, 0, 0),
(731, 16, 114, 0, 0, 0, 0),
(732, 16, 115, 0, 0, 0, 0),
(733, 16, 116, 0, 0, 0, 0),
(734, 16, 117, 0, 0, 0, 0),
(735, 16, 118, 0, 0, 0, 0),
(736, 16, 119, 0, 0, 0, 0),
(737, 16, 120, 0, 0, 0, 0),
(738, 16, 121, 0, 0, 0, 0),
(739, 16, 122, 0, 0, 0, 0),
(740, 16, 123, 0, 0, 0, 0),
(741, 16, 124, 0, 0, 0, 0),
(742, 16, 125, 1, 0, 0, 0),
(743, 16, 126, 0, 0, 0, 0),
(744, 16, 127, 1, 0, 0, 0),
(745, 16, 128, 0, 0, 0, 0),
(746, 16, 129, 0, 0, 0, 0),
(747, 16, 130, 0, 0, 0, 0),
(748, 16, 131, 0, 0, 0, 0),
(749, 16, 132, 0, 0, 0, 0),
(750, 16, 133, 0, 0, 0, 0),
(751, 16, 134, 0, 0, 0, 0),
(752, 16, 135, 0, 0, 0, 0),
(753, 16, 136, 1, 0, 0, 0),
(754, 16, 145, 0, 0, 0, 0),
(755, 16, 146, 0, 0, 0, 0),
(756, 16, 147, 0, 0, 0, 0),
(757, 16, 148, 0, 0, 0, 0),
(758, 16, 149, 0, 0, 0, 0),
(759, 16, 151, 0, 0, 0, 0),
(760, 16, 152, 0, 0, 0, 0),
(761, 16, 153, 0, 0, 0, 0),
(762, 16, 154, 0, 0, 0, 0),
(763, 16, 155, 0, 0, 0, 0),
(764, 16, 156, 0, 0, 0, 0),
(765, 16, 157, 0, 0, 0, 0),
(766, 16, 158, 0, 0, 0, 0),
(767, 16, 159, 1, 0, 0, 0),
(768, 16, 160, 1, 0, 0, 0),
(769, 16, 161, 0, 0, 0, 0),
(770, 16, 162, 0, 0, 0, 0),
(771, 16, 163, 0, 0, 0, 0),
(772, 16, 164, 0, 0, 0, 0),
(773, 16, 165, 1, 0, 0, 0),
(774, 16, 166, 0, 0, 0, 0),
(775, 16, 167, 0, 0, 0, 0),
(776, 16, 168, 1, 0, 0, 0),
(777, 16, 169, 0, 0, 0, 0),
(779, 12, 1, 1, 0, 0, 0),
(780, 12, 2, 0, 0, 0, 0),
(781, 12, 3, 0, 0, 0, 0),
(782, 12, 4, 0, 0, 0, 0),
(783, 12, 5, 0, 0, 0, 0),
(784, 12, 6, 0, 0, 0, 0),
(785, 12, 7, 0, 0, 0, 0),
(786, 12, 8, 0, 0, 0, 0),
(787, 12, 9, 0, 0, 0, 0),
(788, 12, 10, 0, 0, 0, 0),
(789, 12, 11, 0, 0, 0, 0),
(790, 12, 12, 0, 0, 0, 0),
(791, 12, 13, 0, 0, 0, 0),
(792, 12, 14, 0, 0, 0, 0),
(793, 12, 16, 0, 0, 0, 0),
(794, 12, 17, 0, 0, 0, 0),
(795, 12, 18, 0, 0, 0, 0),
(796, 12, 93, 0, 0, 0, 0),
(797, 12, 102, 1, 0, 0, 0),
(798, 12, 103, 0, 0, 0, 0),
(799, 12, 104, 0, 0, 0, 0),
(800, 12, 105, 1, 0, 0, 0),
(801, 12, 106, 1, 0, 0, 0),
(802, 12, 107, 0, 0, 0, 0),
(803, 12, 108, 0, 0, 0, 0),
(804, 12, 109, 0, 0, 0, 0),
(805, 12, 110, 0, 0, 0, 0),
(806, 12, 111, 0, 0, 0, 0),
(807, 12, 112, 0, 0, 0, 0),
(808, 12, 113, 0, 0, 0, 0),
(809, 12, 114, 0, 0, 0, 0),
(810, 12, 115, 0, 0, 0, 0),
(811, 12, 116, 0, 0, 0, 0),
(812, 12, 117, 0, 0, 0, 0),
(813, 12, 118, 0, 0, 0, 0),
(814, 12, 119, 0, 0, 0, 0),
(815, 12, 120, 0, 0, 0, 0),
(816, 12, 121, 0, 0, 0, 0),
(817, 12, 122, 0, 0, 0, 0),
(818, 12, 123, 0, 0, 0, 0),
(819, 12, 124, 0, 0, 0, 0),
(820, 12, 125, 1, 0, 0, 0),
(821, 12, 126, 1, 0, 0, 0),
(822, 12, 127, 1, 0, 0, 0),
(823, 12, 128, 1, 0, 0, 0),
(824, 12, 129, 0, 0, 0, 0),
(825, 12, 130, 0, 0, 0, 0),
(826, 12, 131, 0, 0, 0, 0),
(827, 12, 132, 0, 0, 0, 0),
(828, 12, 133, 0, 0, 0, 0),
(829, 12, 134, 0, 0, 0, 0),
(830, 12, 135, 0, 0, 0, 0),
(831, 12, 136, 1, 0, 0, 0),
(832, 12, 145, 0, 0, 0, 0),
(833, 12, 146, 0, 0, 0, 0),
(834, 12, 147, 0, 0, 0, 0),
(835, 12, 148, 0, 0, 0, 0),
(836, 12, 149, 0, 0, 0, 0),
(837, 12, 151, 0, 0, 0, 0),
(838, 12, 152, 0, 0, 0, 0),
(839, 12, 153, 0, 0, 0, 0),
(840, 12, 154, 0, 0, 0, 0),
(841, 12, 155, 0, 0, 0, 0),
(842, 12, 156, 0, 0, 0, 0),
(843, 12, 157, 0, 0, 0, 0),
(844, 12, 158, 0, 0, 0, 0),
(845, 12, 159, 0, 0, 0, 0),
(846, 12, 160, 1, 0, 0, 0),
(847, 12, 161, 0, 0, 0, 0),
(848, 12, 162, 0, 0, 0, 0),
(849, 12, 163, 0, 0, 0, 0),
(850, 12, 164, 0, 0, 0, 0),
(851, 12, 165, 1, 0, 0, 0),
(852, 12, 166, 0, 0, 0, 0),
(853, 12, 167, 0, 0, 0, 0),
(854, 12, 168, 1, 0, 0, 0),
(855, 12, 169, 1, 0, 0, 0),
(857, 15, 1, 1, 0, 0, 0),
(858, 15, 2, 0, 0, 0, 0),
(859, 15, 3, 0, 0, 0, 0),
(860, 15, 4, 0, 0, 0, 0),
(861, 15, 5, 0, 0, 0, 0),
(862, 15, 6, 0, 0, 0, 0),
(863, 15, 7, 0, 0, 0, 0),
(864, 15, 8, 0, 0, 0, 0),
(865, 15, 9, 0, 0, 0, 0),
(866, 15, 10, 0, 0, 0, 0),
(867, 15, 11, 0, 0, 0, 0),
(868, 15, 12, 0, 0, 0, 0),
(869, 15, 13, 0, 0, 0, 0),
(870, 15, 14, 0, 0, 0, 0),
(871, 15, 16, 0, 0, 0, 0),
(872, 15, 17, 0, 0, 0, 0),
(873, 15, 18, 0, 0, 0, 0),
(874, 15, 93, 0, 0, 0, 0),
(875, 15, 102, 1, 0, 0, 0),
(876, 15, 103, 0, 0, 0, 0),
(877, 15, 104, 1, 0, 0, 0),
(878, 15, 105, 0, 0, 0, 0),
(879, 15, 106, 0, 0, 0, 0),
(880, 15, 107, 0, 0, 0, 0),
(881, 15, 108, 1, 0, 0, 0),
(882, 15, 109, 0, 0, 0, 0),
(883, 15, 110, 0, 0, 0, 0),
(884, 15, 111, 0, 0, 0, 0),
(885, 15, 112, 0, 0, 0, 0),
(886, 15, 113, 0, 0, 0, 0),
(887, 15, 114, 0, 0, 0, 0),
(888, 15, 115, 0, 0, 0, 0),
(889, 15, 116, 0, 0, 0, 0),
(890, 15, 117, 0, 0, 0, 0),
(891, 15, 118, 0, 0, 0, 0),
(892, 15, 119, 0, 0, 0, 0),
(893, 15, 120, 0, 0, 0, 0),
(894, 15, 121, 0, 0, 0, 0),
(895, 15, 122, 0, 0, 0, 0),
(896, 15, 123, 1, 0, 0, 0),
(897, 15, 124, 1, 0, 0, 0),
(898, 15, 125, 0, 0, 0, 0),
(899, 15, 126, 0, 0, 0, 0),
(900, 15, 127, 0, 0, 0, 0),
(901, 15, 128, 0, 0, 0, 0),
(902, 15, 129, 0, 0, 0, 0),
(903, 15, 130, 0, 0, 0, 0),
(904, 15, 131, 0, 0, 0, 0),
(905, 15, 132, 0, 0, 0, 0),
(906, 15, 133, 0, 0, 0, 0),
(907, 15, 134, 0, 0, 0, 0),
(908, 15, 135, 0, 0, 0, 0),
(909, 15, 136, 1, 0, 0, 0),
(910, 15, 145, 0, 0, 0, 0),
(911, 15, 146, 0, 0, 0, 0),
(912, 15, 147, 0, 0, 0, 0),
(913, 15, 148, 0, 0, 0, 0),
(914, 15, 149, 0, 0, 0, 0),
(915, 15, 151, 0, 0, 0, 0),
(916, 15, 152, 0, 0, 0, 0),
(917, 15, 153, 0, 0, 0, 0),
(918, 15, 154, 1, 0, 0, 0),
(919, 15, 155, 0, 0, 0, 0),
(920, 15, 156, 0, 0, 0, 0),
(921, 15, 157, 0, 0, 0, 0),
(922, 15, 158, 0, 0, 0, 0),
(923, 15, 159, 0, 0, 0, 0),
(924, 15, 160, 1, 0, 0, 0),
(925, 15, 161, 0, 0, 0, 0),
(926, 15, 162, 0, 0, 0, 0),
(927, 15, 163, 0, 0, 0, 0),
(928, 15, 164, 0, 0, 0, 0),
(929, 15, 165, 1, 0, 0, 0),
(930, 15, 166, 0, 0, 0, 0),
(931, 15, 167, 0, 0, 0, 0),
(932, 15, 168, 1, 0, 0, 0),
(933, 15, 169, 0, 0, 0, 0),
(934, 17, 1, 1, 0, 0, 0),
(935, 17, 2, 0, 0, 0, 0),
(936, 17, 3, 0, 0, 0, 0),
(937, 17, 4, 0, 0, 0, 0),
(938, 17, 5, 0, 0, 0, 0),
(939, 17, 6, 0, 0, 0, 0),
(940, 17, 7, 0, 0, 0, 0),
(941, 17, 8, 0, 0, 0, 0),
(942, 17, 9, 0, 0, 0, 0),
(943, 17, 10, 0, 0, 0, 0),
(944, 17, 11, 0, 0, 0, 0),
(945, 17, 12, 0, 0, 0, 0),
(946, 17, 13, 0, 0, 0, 0),
(947, 17, 14, 0, 0, 0, 0),
(948, 17, 16, 0, 0, 0, 0),
(949, 17, 17, 0, 0, 0, 0),
(950, 17, 18, 0, 0, 0, 0),
(951, 17, 93, 1, 0, 0, 0),
(952, 17, 102, 0, 0, 0, 0),
(953, 17, 103, 0, 0, 0, 0),
(954, 17, 104, 0, 0, 0, 0),
(955, 17, 105, 0, 0, 0, 0),
(956, 17, 106, 0, 0, 0, 0),
(957, 17, 107, 0, 0, 0, 0),
(958, 17, 108, 0, 0, 0, 0),
(959, 17, 109, 0, 0, 0, 0),
(960, 17, 110, 0, 0, 0, 0),
(961, 17, 111, 0, 0, 0, 0),
(962, 17, 112, 0, 0, 0, 0),
(963, 17, 113, 0, 0, 0, 0),
(964, 17, 114, 0, 0, 0, 0),
(965, 17, 115, 0, 0, 0, 0),
(966, 17, 116, 0, 0, 0, 0),
(967, 17, 117, 0, 0, 0, 0),
(968, 17, 118, 0, 0, 0, 0),
(969, 17, 119, 0, 0, 0, 0),
(970, 17, 120, 0, 0, 0, 0),
(971, 17, 121, 0, 0, 0, 0),
(972, 17, 122, 0, 0, 0, 0),
(973, 17, 123, 0, 0, 0, 0),
(974, 17, 124, 0, 0, 0, 0),
(975, 17, 125, 0, 0, 0, 0),
(976, 17, 126, 0, 0, 0, 0),
(977, 17, 127, 0, 0, 0, 0),
(978, 17, 128, 0, 0, 0, 0),
(979, 17, 129, 0, 0, 0, 0),
(980, 17, 130, 0, 0, 0, 0),
(981, 17, 131, 0, 0, 0, 0),
(982, 17, 132, 0, 0, 0, 0),
(983, 17, 133, 0, 0, 0, 0),
(984, 17, 134, 0, 0, 0, 0),
(985, 17, 135, 0, 0, 0, 0),
(986, 17, 136, 1, 0, 0, 0),
(987, 17, 145, 0, 0, 0, 0),
(988, 17, 146, 0, 0, 0, 0),
(989, 17, 147, 1, 0, 0, 0),
(990, 17, 148, 0, 0, 0, 0),
(991, 17, 149, 0, 0, 0, 0),
(992, 17, 151, 0, 0, 0, 0),
(993, 17, 152, 0, 0, 0, 0),
(994, 17, 153, 1, 0, 0, 0),
(995, 17, 154, 0, 0, 0, 0),
(996, 17, 155, 0, 0, 0, 0),
(997, 17, 156, 0, 0, 0, 0),
(998, 17, 157, 0, 0, 0, 0),
(999, 17, 158, 0, 0, 0, 0),
(1000, 17, 159, 1, 0, 0, 0),
(1001, 17, 160, 1, 0, 0, 0),
(1002, 17, 161, 0, 0, 0, 0),
(1003, 17, 162, 0, 0, 0, 0),
(1004, 17, 163, 0, 0, 0, 0),
(1005, 17, 164, 0, 0, 0, 0),
(1006, 17, 165, 0, 0, 0, 0),
(1007, 17, 166, 0, 0, 0, 0),
(1008, 17, 167, 0, 0, 0, 0),
(1009, 17, 168, 1, 0, 0, 0),
(1010, 17, 169, 0, 0, 0, 0),
(1011, 17, 171, 0, 0, 0, 0),
(1012, 17, 172, 1, 0, 0, 0),
(1013, 17, 173, 0, 0, 0, 0),
(1014, 15, 171, 0, 0, 0, 0),
(1015, 15, 172, 0, 0, 0, 0),
(1016, 15, 173, 1, 0, 0, 0),
(1017, 18, 1, 1, 0, 0, 0),
(1018, 18, 2, 0, 0, 0, 0),
(1019, 18, 3, 0, 0, 0, 0),
(1020, 18, 4, 0, 0, 0, 0),
(1021, 18, 5, 0, 0, 0, 0),
(1022, 18, 6, 0, 0, 0, 0),
(1023, 18, 7, 0, 0, 0, 0),
(1024, 18, 8, 0, 0, 0, 0),
(1025, 18, 9, 0, 0, 0, 0),
(1026, 18, 10, 0, 0, 0, 0),
(1027, 18, 11, 0, 0, 0, 0),
(1028, 18, 12, 0, 0, 0, 0),
(1029, 18, 13, 0, 0, 0, 0),
(1030, 18, 14, 0, 0, 0, 0),
(1031, 18, 16, 0, 0, 0, 0),
(1032, 18, 17, 0, 0, 0, 0),
(1033, 18, 18, 0, 0, 0, 0),
(1034, 18, 93, 1, 0, 0, 0),
(1035, 18, 102, 1, 0, 0, 0),
(1036, 18, 103, 0, 0, 0, 0),
(1037, 18, 104, 0, 0, 0, 0),
(1038, 18, 105, 0, 0, 0, 0),
(1039, 18, 106, 0, 0, 0, 0),
(1040, 18, 107, 0, 0, 0, 0),
(1041, 18, 108, 0, 0, 0, 0),
(1042, 18, 109, 0, 0, 0, 0),
(1043, 18, 110, 0, 0, 0, 0),
(1044, 18, 111, 0, 0, 0, 0),
(1045, 18, 112, 0, 0, 0, 0),
(1046, 18, 113, 0, 0, 0, 0),
(1047, 18, 114, 0, 0, 0, 0),
(1048, 18, 115, 0, 0, 0, 0),
(1049, 18, 116, 0, 0, 0, 0),
(1050, 18, 117, 0, 0, 0, 0),
(1051, 18, 118, 0, 0, 0, 0),
(1052, 18, 119, 0, 0, 0, 0),
(1053, 18, 120, 0, 0, 0, 0),
(1054, 18, 121, 0, 0, 0, 0),
(1055, 18, 122, 0, 0, 0, 0),
(1056, 18, 123, 0, 0, 0, 0),
(1057, 18, 124, 0, 0, 0, 0),
(1058, 18, 125, 1, 0, 0, 0),
(1059, 18, 126, 0, 0, 0, 0),
(1060, 18, 127, 0, 0, 0, 0),
(1061, 18, 128, 0, 0, 0, 0),
(1062, 18, 129, 0, 0, 0, 0),
(1063, 18, 130, 0, 0, 0, 0),
(1064, 18, 131, 0, 0, 0, 0),
(1065, 18, 132, 0, 0, 0, 0),
(1066, 18, 133, 0, 0, 0, 0),
(1067, 18, 134, 0, 0, 0, 0),
(1068, 18, 135, 0, 0, 0, 0),
(1069, 18, 136, 1, 0, 0, 0),
(1070, 18, 145, 0, 0, 0, 0),
(1071, 18, 146, 0, 0, 0, 0),
(1072, 18, 147, 1, 0, 0, 0),
(1073, 18, 148, 0, 0, 0, 0),
(1074, 18, 149, 0, 0, 0, 0),
(1075, 18, 151, 0, 0, 0, 0),
(1076, 18, 152, 0, 0, 0, 0),
(1077, 18, 153, 1, 0, 0, 0),
(1078, 18, 154, 0, 0, 0, 0),
(1079, 18, 155, 0, 0, 0, 0),
(1080, 18, 156, 0, 0, 0, 0),
(1081, 18, 157, 0, 0, 0, 0),
(1082, 18, 158, 0, 0, 0, 0),
(1083, 18, 159, 1, 0, 0, 0),
(1084, 18, 160, 1, 0, 0, 0),
(1085, 18, 161, 0, 0, 0, 0),
(1086, 18, 162, 0, 0, 0, 0),
(1087, 18, 163, 0, 0, 0, 0),
(1088, 18, 164, 0, 0, 0, 0),
(1089, 18, 165, 1, 0, 0, 0),
(1090, 18, 166, 0, 0, 0, 0),
(1091, 18, 167, 0, 0, 0, 0),
(1092, 18, 168, 1, 0, 0, 0),
(1093, 18, 169, 0, 0, 0, 0),
(1094, 18, 171, 0, 0, 0, 0),
(1095, 18, 172, 1, 0, 0, 0),
(1096, 18, 173, 0, 0, 0, 0),
(1097, 19, 1, 1, 0, 0, 0),
(1098, 19, 2, 0, 0, 0, 0),
(1099, 19, 3, 0, 0, 0, 0),
(1100, 19, 4, 0, 0, 0, 0),
(1101, 19, 5, 0, 0, 0, 0),
(1102, 19, 6, 0, 0, 0, 0),
(1103, 19, 7, 0, 0, 0, 0),
(1104, 19, 8, 0, 0, 0, 0),
(1105, 19, 9, 0, 0, 0, 0),
(1106, 19, 10, 0, 0, 0, 0),
(1107, 19, 11, 0, 0, 0, 0),
(1108, 19, 12, 0, 0, 0, 0),
(1109, 19, 13, 0, 0, 0, 0),
(1110, 19, 14, 0, 0, 0, 0),
(1111, 19, 16, 0, 0, 0, 0),
(1112, 19, 17, 0, 0, 0, 0),
(1113, 19, 18, 0, 0, 0, 0),
(1114, 19, 93, 1, 0, 0, 0),
(1115, 19, 102, 1, 0, 0, 0),
(1116, 19, 103, 0, 0, 0, 0),
(1117, 19, 104, 0, 0, 0, 0),
(1118, 19, 105, 1, 0, 0, 0),
(1119, 19, 106, 1, 0, 0, 0),
(1120, 19, 107, 0, 0, 0, 0),
(1121, 19, 108, 0, 0, 0, 0),
(1122, 19, 109, 0, 0, 0, 0),
(1123, 19, 110, 0, 0, 0, 0),
(1124, 19, 111, 0, 0, 0, 0),
(1125, 19, 112, 0, 0, 0, 0),
(1126, 19, 113, 0, 0, 0, 0),
(1127, 19, 114, 0, 0, 0, 0),
(1128, 19, 115, 0, 0, 0, 0),
(1129, 19, 116, 0, 0, 0, 0),
(1130, 19, 117, 0, 0, 0, 0),
(1131, 19, 118, 0, 0, 0, 0),
(1132, 19, 119, 0, 0, 0, 0),
(1133, 19, 120, 0, 0, 0, 0),
(1134, 19, 121, 0, 0, 0, 0),
(1135, 19, 122, 0, 0, 0, 0),
(1136, 19, 123, 0, 0, 0, 0),
(1137, 19, 124, 0, 0, 0, 0),
(1138, 19, 125, 1, 0, 0, 0),
(1139, 19, 126, 1, 0, 0, 0),
(1140, 19, 127, 1, 0, 0, 0),
(1141, 19, 128, 1, 0, 0, 0),
(1142, 19, 129, 0, 0, 0, 0),
(1143, 19, 130, 0, 0, 0, 0),
(1144, 19, 131, 0, 0, 0, 0),
(1145, 19, 132, 0, 0, 0, 0),
(1146, 19, 133, 0, 0, 0, 0),
(1147, 19, 134, 0, 0, 0, 0),
(1148, 19, 135, 0, 0, 0, 0),
(1149, 19, 136, 1, 0, 0, 0),
(1150, 19, 145, 0, 0, 0, 0),
(1151, 19, 146, 0, 0, 0, 0),
(1152, 19, 147, 0, 0, 0, 0),
(1153, 19, 148, 1, 0, 0, 0),
(1154, 19, 149, 0, 0, 0, 0),
(1155, 19, 151, 0, 0, 0, 0),
(1156, 19, 152, 0, 0, 0, 0),
(1157, 19, 153, 0, 0, 0, 0),
(1158, 19, 154, 0, 0, 0, 0),
(1159, 19, 155, 0, 0, 0, 0),
(1160, 19, 156, 0, 0, 0, 0),
(1161, 19, 157, 0, 0, 0, 0),
(1162, 19, 158, 0, 0, 0, 0),
(1163, 19, 159, 1, 0, 0, 0),
(1164, 19, 160, 1, 0, 0, 0),
(1165, 19, 161, 0, 0, 0, 0),
(1166, 19, 162, 0, 0, 0, 0),
(1167, 19, 163, 0, 0, 0, 0),
(1168, 19, 164, 0, 0, 0, 0),
(1169, 19, 165, 1, 0, 0, 0),
(1170, 19, 166, 0, 0, 0, 0),
(1171, 19, 167, 0, 0, 0, 0),
(1172, 19, 168, 1, 0, 0, 0),
(1173, 19, 169, 1, 0, 0, 0),
(1174, 19, 171, 0, 0, 0, 0),
(1175, 19, 172, 0, 0, 0, 0),
(1176, 19, 173, 0, 0, 0, 0),
(1177, 20, 1, 1, 0, 0, 0),
(1178, 20, 2, 0, 0, 0, 0),
(1179, 20, 3, 0, 0, 0, 0),
(1180, 20, 4, 0, 0, 0, 0),
(1181, 20, 5, 0, 0, 0, 0),
(1182, 20, 6, 0, 0, 0, 0),
(1183, 20, 7, 0, 0, 0, 0),
(1184, 20, 8, 0, 0, 0, 0),
(1185, 20, 9, 0, 0, 0, 0),
(1186, 20, 10, 0, 0, 0, 0),
(1187, 20, 11, 0, 0, 0, 0),
(1188, 20, 12, 0, 0, 0, 0),
(1189, 20, 13, 0, 0, 0, 0),
(1190, 20, 14, 0, 0, 0, 0),
(1191, 20, 16, 0, 0, 0, 0),
(1192, 20, 17, 0, 0, 0, 0),
(1193, 20, 18, 0, 0, 0, 0),
(1194, 20, 93, 0, 0, 0, 0),
(1195, 20, 102, 1, 0, 0, 0),
(1196, 20, 103, 0, 0, 0, 0),
(1197, 20, 104, 1, 0, 0, 0),
(1198, 20, 105, 0, 0, 0, 0),
(1199, 20, 106, 0, 0, 0, 0),
(1200, 20, 107, 0, 0, 0, 0),
(1201, 20, 108, 1, 0, 0, 0),
(1202, 20, 109, 0, 0, 0, 0),
(1203, 20, 110, 0, 0, 0, 0),
(1204, 20, 111, 0, 0, 0, 0),
(1205, 20, 112, 0, 0, 0, 0),
(1206, 20, 113, 0, 0, 0, 0),
(1207, 20, 114, 0, 0, 0, 0),
(1208, 20, 115, 0, 0, 0, 0),
(1209, 20, 116, 0, 0, 0, 0),
(1210, 20, 117, 0, 0, 0, 0),
(1211, 20, 118, 0, 0, 0, 0),
(1212, 20, 119, 0, 0, 0, 0),
(1213, 20, 120, 0, 0, 0, 0),
(1214, 20, 121, 0, 0, 0, 0),
(1215, 20, 122, 0, 0, 0, 0),
(1216, 20, 123, 0, 0, 0, 0),
(1217, 20, 124, 1, 0, 0, 0),
(1218, 20, 125, 0, 0, 0, 0),
(1219, 20, 126, 0, 0, 0, 0),
(1220, 20, 127, 0, 0, 0, 0),
(1221, 20, 128, 0, 0, 0, 0),
(1222, 20, 129, 0, 0, 0, 0),
(1223, 20, 130, 0, 0, 0, 0),
(1224, 20, 131, 0, 0, 0, 0),
(1225, 20, 132, 0, 0, 0, 0),
(1226, 20, 133, 0, 0, 0, 0),
(1227, 20, 134, 0, 0, 0, 0),
(1228, 20, 135, 0, 0, 0, 0),
(1229, 20, 136, 1, 0, 0, 0),
(1230, 20, 145, 0, 0, 0, 0),
(1231, 20, 146, 0, 0, 0, 0),
(1232, 20, 147, 0, 0, 0, 0),
(1233, 20, 148, 0, 0, 0, 0),
(1234, 20, 149, 0, 0, 0, 0),
(1235, 20, 151, 0, 0, 0, 0),
(1236, 20, 152, 0, 0, 0, 0),
(1237, 20, 153, 0, 0, 0, 0),
(1238, 20, 154, 1, 0, 0, 0),
(1239, 20, 155, 0, 0, 0, 0),
(1240, 20, 156, 0, 0, 0, 0),
(1241, 20, 157, 0, 0, 0, 0),
(1242, 20, 158, 0, 0, 0, 0),
(1243, 20, 159, 0, 0, 0, 0),
(1244, 20, 160, 1, 0, 0, 0),
(1245, 20, 161, 0, 0, 0, 0),
(1246, 20, 162, 0, 0, 0, 0),
(1247, 20, 163, 0, 0, 0, 0),
(1248, 20, 164, 0, 0, 0, 0),
(1249, 20, 165, 1, 0, 0, 0),
(1250, 20, 166, 0, 0, 0, 0),
(1251, 20, 167, 0, 0, 0, 0),
(1252, 20, 168, 1, 0, 0, 0),
(1253, 20, 169, 0, 0, 0, 0),
(1254, 20, 171, 1, 0, 0, 0),
(1255, 20, 172, 0, 0, 0, 0),
(1256, 20, 173, 1, 0, 0, 0),
(1257, 15, 174, 1, 0, 0, 0),
(1258, 15, 175, 1, 0, 0, 0),
(1259, 20, 174, 1, 0, 0, 0),
(1260, 20, 175, 1, 0, 0, 0),
(1261, 21, 1, 0, 0, 0, 0),
(1262, 21, 2, 0, 0, 0, 0),
(1263, 21, 3, 0, 0, 0, 0),
(1264, 21, 4, 0, 0, 0, 0),
(1265, 21, 5, 0, 0, 0, 0),
(1266, 21, 6, 0, 0, 0, 0),
(1267, 21, 7, 0, 0, 0, 0),
(1268, 21, 8, 0, 0, 0, 0),
(1269, 21, 9, 0, 0, 0, 0),
(1270, 21, 10, 0, 0, 0, 0),
(1271, 21, 11, 0, 0, 0, 0),
(1272, 21, 12, 0, 0, 0, 0),
(1273, 21, 13, 0, 0, 0, 0),
(1274, 21, 14, 0, 0, 0, 0),
(1275, 21, 16, 0, 0, 0, 0),
(1276, 21, 17, 0, 0, 0, 0),
(1277, 21, 18, 0, 0, 0, 0),
(1278, 21, 93, 0, 0, 0, 0),
(1279, 21, 102, 0, 0, 0, 0),
(1280, 21, 103, 1, 0, 0, 0),
(1281, 21, 104, 0, 0, 0, 0),
(1282, 21, 105, 0, 0, 0, 0),
(1283, 21, 106, 0, 0, 0, 0),
(1284, 21, 107, 1, 0, 0, 0),
(1285, 21, 108, 0, 0, 0, 0),
(1286, 21, 109, 0, 0, 0, 0),
(1287, 21, 110, 0, 0, 0, 0),
(1288, 21, 111, 0, 0, 0, 0),
(1289, 21, 112, 0, 0, 0, 0),
(1290, 21, 113, 0, 0, 0, 0),
(1291, 21, 114, 0, 0, 0, 0),
(1292, 21, 115, 0, 0, 0, 0),
(1293, 21, 116, 0, 0, 0, 0),
(1294, 21, 117, 0, 0, 0, 0),
(1295, 21, 118, 0, 0, 0, 0),
(1296, 21, 119, 0, 0, 0, 0),
(1297, 21, 120, 0, 0, 0, 0),
(1298, 21, 121, 0, 0, 0, 0),
(1299, 21, 122, 0, 0, 0, 0),
(1300, 21, 123, 0, 0, 0, 0),
(1301, 21, 124, 0, 0, 0, 0),
(1302, 21, 125, 0, 0, 0, 0),
(1303, 21, 126, 0, 0, 0, 0),
(1304, 21, 127, 0, 0, 0, 0),
(1305, 21, 128, 0, 0, 0, 0),
(1306, 21, 129, 0, 0, 0, 0),
(1307, 21, 130, 0, 0, 0, 0),
(1308, 21, 131, 0, 0, 0, 0),
(1309, 21, 132, 0, 0, 0, 0),
(1310, 21, 133, 0, 0, 0, 0),
(1311, 21, 134, 0, 0, 0, 0),
(1312, 21, 135, 0, 0, 0, 0),
(1313, 21, 136, 1, 0, 0, 0),
(1314, 21, 145, 0, 0, 0, 0),
(1315, 21, 146, 0, 0, 0, 0),
(1316, 21, 147, 0, 0, 0, 0),
(1317, 21, 148, 0, 0, 0, 0),
(1318, 21, 149, 0, 0, 0, 0),
(1319, 21, 151, 0, 0, 0, 0),
(1320, 21, 152, 0, 0, 0, 0),
(1321, 21, 153, 0, 0, 0, 0),
(1322, 21, 154, 0, 0, 0, 0),
(1323, 21, 155, 0, 0, 0, 0),
(1324, 21, 156, 0, 0, 0, 0),
(1325, 21, 157, 0, 0, 0, 0),
(1326, 21, 158, 0, 0, 0, 0),
(1327, 21, 159, 0, 0, 0, 0),
(1328, 21, 160, 0, 0, 0, 0),
(1329, 21, 161, 0, 0, 0, 0),
(1330, 21, 162, 1, 0, 0, 0),
(1331, 21, 163, 0, 0, 0, 0),
(1332, 21, 164, 0, 0, 0, 0),
(1333, 21, 165, 0, 0, 0, 0),
(1334, 21, 166, 0, 0, 0, 0),
(1335, 21, 167, 0, 0, 0, 0),
(1336, 21, 168, 1, 0, 0, 0),
(1337, 21, 169, 0, 0, 0, 0),
(1338, 21, 171, 0, 0, 0, 0),
(1339, 21, 172, 0, 0, 0, 0),
(1340, 21, 173, 0, 0, 0, 0),
(1341, 21, 174, 0, 0, 0, 0),
(1342, 21, 175, 0, 0, 0, 0),
(1343, 22, 1, 1, 0, 0, 0),
(1344, 22, 2, 0, 0, 0, 0),
(1345, 22, 3, 0, 0, 0, 0),
(1346, 22, 4, 0, 0, 0, 0),
(1347, 22, 5, 0, 0, 0, 0),
(1348, 22, 6, 0, 0, 0, 0),
(1349, 22, 7, 0, 0, 0, 0),
(1350, 22, 8, 0, 0, 0, 0),
(1351, 22, 9, 0, 0, 0, 0),
(1352, 22, 10, 0, 0, 0, 0),
(1353, 22, 11, 0, 0, 0, 0),
(1354, 22, 12, 0, 0, 0, 0),
(1355, 22, 13, 0, 0, 0, 0),
(1356, 22, 14, 0, 0, 0, 0),
(1357, 22, 16, 0, 0, 0, 0),
(1358, 22, 17, 0, 0, 0, 0),
(1359, 22, 18, 0, 0, 0, 0),
(1360, 22, 93, 1, 0, 0, 0),
(1361, 22, 102, 1, 0, 0, 0),
(1362, 22, 103, 0, 0, 0, 0),
(1363, 22, 104, 1, 0, 0, 0),
(1364, 22, 105, 1, 0, 0, 0),
(1365, 22, 106, 1, 0, 0, 0),
(1366, 22, 107, 0, 0, 0, 0),
(1367, 22, 108, 1, 0, 0, 0),
(1368, 22, 109, 0, 0, 0, 0),
(1369, 22, 110, 0, 0, 0, 0),
(1370, 22, 111, 0, 0, 0, 0),
(1371, 22, 112, 0, 0, 0, 0),
(1372, 22, 113, 0, 0, 0, 0),
(1373, 22, 114, 0, 0, 0, 0),
(1374, 22, 115, 0, 0, 0, 0),
(1375, 22, 116, 0, 0, 0, 0),
(1376, 22, 117, 0, 0, 0, 0),
(1377, 22, 118, 0, 0, 0, 0),
(1378, 22, 119, 0, 0, 0, 0),
(1379, 22, 120, 0, 0, 0, 0),
(1380, 22, 121, 0, 0, 0, 0),
(1381, 22, 122, 1, 0, 0, 0),
(1382, 22, 123, 1, 0, 0, 0),
(1383, 22, 124, 1, 0, 0, 0),
(1384, 22, 125, 1, 0, 0, 0),
(1385, 22, 126, 1, 0, 0, 0),
(1386, 22, 127, 1, 0, 0, 0),
(1387, 22, 128, 1, 0, 0, 0),
(1388, 22, 129, 0, 0, 0, 0),
(1389, 22, 130, 0, 0, 0, 0),
(1390, 22, 131, 0, 0, 0, 0),
(1391, 22, 132, 0, 0, 0, 0),
(1392, 22, 133, 0, 0, 0, 0),
(1393, 22, 134, 0, 0, 0, 0),
(1394, 22, 135, 0, 0, 0, 0),
(1395, 22, 136, 1, 0, 0, 0),
(1396, 22, 145, 0, 0, 0, 0),
(1397, 22, 146, 0, 0, 0, 0),
(1398, 22, 147, 1, 0, 0, 0),
(1399, 22, 148, 1, 0, 0, 0),
(1400, 22, 149, 0, 0, 0, 0),
(1401, 22, 151, 0, 0, 0, 0),
(1402, 22, 152, 0, 0, 0, 0),
(1403, 22, 153, 1, 0, 0, 0),
(1404, 22, 154, 1, 0, 0, 0),
(1405, 22, 155, 0, 0, 0, 0),
(1406, 22, 156, 0, 0, 0, 0),
(1407, 22, 157, 0, 0, 0, 0),
(1408, 22, 158, 0, 0, 0, 0),
(1409, 22, 159, 1, 0, 0, 0),
(1410, 22, 160, 1, 0, 0, 0),
(1411, 22, 161, 0, 0, 0, 0),
(1412, 22, 162, 0, 0, 0, 0),
(1413, 22, 163, 0, 0, 0, 0),
(1414, 22, 164, 0, 0, 0, 0),
(1415, 22, 165, 1, 0, 0, 0),
(1416, 22, 166, 0, 0, 0, 0),
(1417, 22, 167, 0, 0, 0, 0),
(1418, 22, 168, 1, 0, 0, 0),
(1419, 22, 169, 1, 0, 0, 0),
(1420, 22, 171, 1, 0, 0, 0),
(1421, 22, 172, 1, 0, 0, 0),
(1422, 22, 173, 1, 0, 0, 0),
(1423, 22, 174, 1, 0, 0, 0),
(1424, 22, 175, 1, 0, 0, 0),
(1425, 2, 171, 0, 0, 0, 0),
(1426, 2, 172, 1, 0, 0, 0),
(1427, 2, 173, 1, 0, 0, 0),
(1428, 2, 174, 0, 0, 0, 0),
(1429, 2, 175, 1, 0, 0, 0),
(1430, 8, 171, 0, 0, 0, 0),
(1431, 8, 172, 1, 0, 0, 0),
(1432, 8, 173, 1, 0, 0, 0),
(1433, 8, 174, 0, 0, 0, 0),
(1434, 8, 175, 1, 0, 0, 0),
(1435, 14, 171, 0, 0, 0, 0),
(1436, 14, 172, 0, 0, 0, 0),
(1437, 14, 173, 0, 0, 0, 0),
(1438, 14, 174, 0, 0, 0, 0),
(1439, 14, 175, 0, 0, 0, 0),
(1440, 14, 176, 0, 0, 0, 0),
(1441, 14, 177, 0, 0, 0, 0),
(1442, 23, 1, 0, 0, 0, 0),
(1443, 23, 2, 0, 0, 0, 0),
(1444, 23, 3, 0, 0, 0, 0),
(1445, 23, 4, 0, 0, 0, 0),
(1446, 23, 5, 0, 0, 0, 0),
(1447, 23, 6, 0, 0, 0, 0),
(1448, 23, 7, 0, 0, 0, 0),
(1449, 23, 8, 0, 0, 0, 0),
(1450, 23, 9, 0, 0, 0, 0),
(1451, 23, 10, 0, 0, 0, 0),
(1452, 23, 11, 0, 0, 0, 0),
(1453, 23, 12, 0, 0, 0, 0),
(1454, 23, 13, 0, 0, 0, 0),
(1455, 23, 14, 0, 0, 0, 0),
(1456, 23, 16, 0, 0, 0, 0),
(1457, 23, 17, 0, 0, 0, 0),
(1458, 23, 18, 0, 0, 0, 0),
(1459, 23, 93, 0, 0, 0, 0),
(1460, 23, 102, 0, 0, 0, 0),
(1461, 23, 103, 0, 0, 0, 0),
(1462, 23, 104, 0, 0, 0, 0),
(1463, 23, 105, 0, 0, 0, 0),
(1464, 23, 106, 0, 0, 0, 0),
(1465, 23, 107, 0, 0, 0, 0),
(1466, 23, 108, 0, 0, 0, 0),
(1467, 23, 109, 0, 0, 0, 0),
(1468, 23, 110, 1, 0, 1, 0),
(1469, 23, 111, 0, 0, 0, 0),
(1470, 23, 112, 0, 0, 0, 0),
(1471, 23, 113, 0, 0, 0, 0),
(1472, 23, 114, 0, 0, 0, 0),
(1473, 23, 115, 0, 0, 0, 0),
(1474, 23, 116, 0, 0, 0, 0),
(1475, 23, 117, 0, 0, 0, 0),
(1476, 23, 118, 0, 0, 0, 0),
(1477, 23, 119, 0, 0, 0, 0),
(1478, 23, 120, 0, 0, 0, 0),
(1479, 23, 121, 0, 0, 0, 0),
(1480, 23, 122, 0, 0, 0, 0),
(1481, 23, 123, 0, 0, 0, 0),
(1482, 23, 124, 0, 0, 0, 0),
(1483, 23, 125, 0, 0, 0, 0),
(1484, 23, 126, 0, 0, 0, 0),
(1485, 23, 127, 0, 0, 0, 0),
(1486, 23, 128, 0, 0, 0, 0),
(1487, 23, 129, 0, 0, 0, 0),
(1488, 23, 130, 0, 0, 0, 0),
(1489, 23, 131, 0, 0, 0, 0),
(1490, 23, 132, 0, 0, 0, 0),
(1491, 23, 133, 0, 0, 0, 0),
(1492, 23, 134, 0, 0, 0, 0),
(1493, 23, 135, 0, 0, 0, 0),
(1494, 23, 136, 0, 0, 0, 0),
(1495, 23, 145, 0, 0, 0, 0),
(1496, 23, 146, 0, 0, 0, 0),
(1497, 23, 147, 0, 0, 0, 0),
(1498, 23, 148, 0, 0, 0, 0),
(1499, 23, 149, 0, 0, 0, 0),
(1500, 23, 151, 0, 0, 0, 0),
(1501, 23, 152, 0, 0, 0, 0),
(1502, 23, 153, 0, 0, 0, 0),
(1503, 23, 154, 0, 0, 0, 0),
(1504, 23, 155, 0, 0, 0, 0),
(1505, 23, 156, 0, 0, 0, 0),
(1506, 23, 157, 0, 0, 0, 0),
(1507, 23, 158, 0, 0, 0, 0),
(1508, 23, 159, 0, 0, 0, 0),
(1509, 23, 160, 0, 0, 0, 0),
(1510, 23, 161, 1, 0, 0, 0),
(1511, 23, 162, 0, 0, 0, 0),
(1512, 23, 163, 0, 0, 0, 0),
(1513, 23, 164, 0, 0, 0, 0),
(1514, 23, 165, 0, 0, 0, 0),
(1515, 23, 166, 0, 0, 0, 0),
(1516, 23, 167, 0, 0, 0, 0),
(1517, 23, 168, 0, 0, 0, 0),
(1518, 23, 169, 0, 0, 0, 0),
(1519, 23, 171, 0, 0, 0, 0),
(1520, 23, 172, 0, 0, 0, 0),
(1521, 23, 173, 0, 0, 0, 0),
(1522, 23, 174, 0, 0, 0, 0),
(1523, 23, 175, 0, 0, 0, 0),
(1524, 23, 176, 0, 0, 0, 0),
(1525, 23, 177, 0, 0, 0, 0),
(1526, 24, 1, 1, 0, 0, 0),
(1527, 24, 2, 0, 0, 0, 0),
(1528, 24, 3, 0, 0, 0, 0),
(1529, 24, 4, 0, 0, 0, 0),
(1530, 24, 5, 0, 0, 0, 0),
(1531, 24, 6, 0, 0, 0, 0),
(1532, 24, 7, 0, 0, 0, 0),
(1533, 24, 8, 0, 0, 0, 0),
(1534, 24, 9, 0, 0, 0, 0),
(1535, 24, 10, 0, 0, 0, 0),
(1536, 24, 11, 0, 0, 0, 0),
(1537, 24, 12, 0, 0, 0, 0),
(1538, 24, 13, 0, 0, 0, 0),
(1539, 24, 14, 0, 0, 0, 0),
(1540, 24, 16, 0, 0, 0, 0),
(1541, 24, 17, 0, 0, 0, 0),
(1542, 24, 18, 0, 0, 0, 0),
(1543, 24, 93, 1, 0, 1, 0),
(1544, 24, 102, 0, 0, 0, 0),
(1545, 24, 103, 0, 0, 0, 0),
(1546, 24, 104, 0, 0, 0, 0),
(1547, 24, 105, 0, 0, 0, 0),
(1548, 24, 106, 0, 0, 0, 0),
(1549, 24, 107, 0, 0, 0, 0),
(1550, 24, 108, 0, 0, 0, 0),
(1551, 24, 109, 0, 0, 0, 0),
(1552, 24, 110, 0, 0, 0, 0),
(1553, 24, 111, 0, 0, 0, 0),
(1554, 24, 112, 0, 0, 0, 0),
(1555, 24, 113, 0, 0, 0, 0),
(1556, 24, 114, 0, 0, 0, 0),
(1557, 24, 115, 0, 0, 0, 0),
(1558, 24, 116, 0, 0, 0, 0),
(1559, 24, 117, 0, 0, 0, 0),
(1560, 24, 118, 0, 0, 0, 0),
(1561, 24, 119, 0, 0, 0, 0),
(1562, 24, 120, 0, 0, 0, 0),
(1563, 24, 121, 0, 0, 0, 0),
(1564, 24, 122, 0, 0, 0, 0),
(1565, 24, 123, 0, 0, 0, 0),
(1566, 24, 124, 0, 0, 0, 0),
(1567, 24, 125, 0, 0, 0, 0),
(1568, 24, 126, 0, 0, 0, 0),
(1569, 24, 127, 0, 0, 0, 0),
(1570, 24, 128, 0, 0, 0, 0),
(1571, 24, 129, 0, 0, 0, 0),
(1572, 24, 130, 0, 0, 0, 0),
(1573, 24, 131, 0, 0, 0, 0),
(1574, 24, 132, 0, 0, 0, 0),
(1575, 24, 133, 0, 0, 0, 0),
(1576, 24, 134, 0, 0, 0, 0),
(1577, 24, 135, 0, 0, 0, 0),
(1578, 24, 136, 1, 0, 0, 0),
(1579, 24, 145, 0, 0, 0, 0),
(1580, 24, 146, 0, 0, 0, 0),
(1581, 24, 147, 0, 0, 0, 0),
(1582, 24, 148, 0, 0, 0, 0),
(1583, 24, 149, 0, 0, 0, 0),
(1584, 24, 151, 0, 0, 0, 0),
(1585, 24, 152, 0, 0, 0, 0),
(1586, 24, 153, 0, 0, 0, 0),
(1587, 24, 154, 0, 0, 0, 0),
(1588, 24, 155, 0, 0, 0, 0),
(1589, 24, 156, 0, 0, 0, 0),
(1590, 24, 157, 0, 0, 0, 0),
(1591, 24, 158, 0, 0, 0, 0),
(1592, 24, 159, 1, 0, 0, 0),
(1593, 24, 160, 0, 0, 0, 0),
(1594, 24, 161, 0, 0, 0, 0),
(1595, 24, 162, 0, 0, 0, 0),
(1596, 24, 163, 0, 0, 0, 0),
(1597, 24, 164, 0, 0, 0, 0),
(1598, 24, 165, 0, 0, 0, 0),
(1599, 24, 166, 0, 0, 0, 0),
(1600, 24, 167, 0, 0, 0, 0),
(1601, 24, 168, 1, 0, 0, 0),
(1602, 24, 169, 0, 0, 0, 0),
(1603, 24, 171, 0, 0, 0, 0),
(1604, 24, 172, 0, 0, 0, 0),
(1605, 24, 173, 0, 0, 0, 0),
(1606, 24, 174, 0, 0, 0, 0),
(1607, 24, 175, 0, 0, 0, 0),
(1608, 24, 176, 0, 0, 0, 0),
(1609, 24, 177, 0, 0, 0, 0),
(1610, 24, 179, 0, 0, 0, 0),
(1611, 24, 180, 0, 0, 0, 0),
(1612, 24, 181, 0, 0, 0, 0),
(1613, 8, 176, 0, 0, 0, 0),
(1614, 8, 177, 0, 0, 0, 0),
(1615, 8, 179, 0, 0, 0, 0),
(1616, 8, 180, 0, 0, 0, 0),
(1617, 8, 181, 1, 0, 0, 0),
(1618, 22, 176, 0, 0, 0, 0),
(1619, 22, 177, 0, 0, 0, 0),
(1620, 22, 179, 0, 0, 0, 0),
(1621, 22, 180, 1, 0, 0, 0),
(1622, 22, 181, 1, 0, 0, 0),
(1623, 25, 1, 1, 0, 0, 0),
(1624, 25, 2, 0, 0, 0, 0),
(1625, 25, 3, 0, 0, 0, 0),
(1626, 25, 4, 0, 0, 0, 0),
(1627, 25, 5, 0, 0, 0, 0),
(1628, 25, 6, 0, 0, 0, 0),
(1629, 25, 7, 0, 0, 0, 0),
(1630, 25, 8, 0, 0, 0, 0),
(1631, 25, 9, 0, 0, 0, 0),
(1632, 25, 10, 0, 0, 0, 0),
(1633, 25, 11, 0, 0, 0, 0),
(1634, 25, 12, 0, 0, 0, 0),
(1635, 25, 13, 0, 0, 0, 0),
(1636, 25, 14, 0, 0, 0, 0),
(1637, 25, 16, 0, 0, 0, 0),
(1638, 25, 17, 0, 0, 0, 0),
(1639, 25, 18, 0, 0, 0, 0),
(1640, 25, 93, 0, 0, 0, 0),
(1641, 25, 102, 1, 0, 0, 0),
(1642, 25, 103, 1, 0, 0, 0),
(1643, 25, 104, 1, 0, 0, 0),
(1644, 25, 105, 1, 0, 0, 0),
(1645, 25, 106, 1, 0, 0, 0),
(1646, 25, 107, 1, 0, 0, 0),
(1647, 25, 108, 1, 0, 0, 0),
(1648, 25, 109, 0, 0, 0, 0),
(1649, 25, 110, 0, 0, 0, 0),
(1650, 25, 111, 0, 0, 0, 0),
(1651, 25, 112, 0, 0, 0, 0),
(1652, 25, 113, 0, 0, 0, 0),
(1653, 25, 114, 0, 0, 0, 0),
(1654, 25, 115, 0, 0, 0, 0),
(1655, 25, 116, 0, 0, 0, 0),
(1656, 25, 117, 0, 0, 0, 0),
(1657, 25, 118, 0, 0, 0, 0),
(1658, 25, 119, 0, 0, 0, 0),
(1659, 25, 120, 0, 0, 0, 0),
(1660, 25, 121, 0, 0, 0, 0),
(1661, 25, 122, 0, 0, 0, 0),
(1662, 25, 123, 0, 0, 0, 0),
(1663, 25, 124, 0, 0, 0, 0),
(1664, 25, 125, 0, 0, 0, 0),
(1665, 25, 126, 0, 0, 0, 0),
(1666, 25, 127, 0, 0, 0, 0),
(1667, 25, 128, 0, 0, 0, 0),
(1668, 25, 129, 0, 0, 0, 0),
(1669, 25, 130, 0, 0, 0, 0),
(1670, 25, 131, 0, 0, 0, 0),
(1671, 25, 132, 0, 0, 0, 0),
(1672, 25, 133, 0, 0, 0, 0),
(1673, 25, 134, 0, 0, 0, 0),
(1674, 25, 135, 0, 0, 0, 0),
(1675, 25, 136, 0, 0, 0, 0),
(1676, 25, 145, 0, 0, 0, 0),
(1677, 25, 146, 0, 0, 0, 0),
(1678, 25, 147, 1, 0, 0, 0),
(1679, 25, 148, 1, 0, 0, 0),
(1680, 25, 149, 0, 0, 0, 0),
(1681, 25, 151, 0, 0, 0, 0),
(1682, 25, 152, 0, 0, 0, 0),
(1683, 25, 153, 1, 0, 0, 0),
(1684, 25, 154, 1, 0, 0, 0),
(1685, 25, 155, 0, 0, 0, 0),
(1686, 25, 156, 0, 0, 0, 0),
(1687, 25, 157, 0, 0, 0, 0),
(1688, 25, 158, 0, 0, 0, 0),
(1689, 25, 159, 0, 0, 0, 0),
(1690, 25, 160, 1, 0, 0, 0),
(1691, 25, 161, 0, 0, 0, 0),
(1692, 25, 162, 1, 0, 0, 0),
(1693, 25, 163, 0, 0, 0, 0),
(1694, 25, 164, 0, 0, 0, 0),
(1695, 25, 165, 0, 0, 0, 0),
(1696, 25, 166, 0, 0, 0, 0),
(1697, 25, 167, 0, 0, 0, 0),
(1698, 25, 168, 0, 0, 0, 0),
(1699, 25, 169, 1, 0, 0, 0),
(1700, 25, 171, 1, 0, 0, 0),
(1701, 25, 172, 0, 0, 0, 0),
(1702, 25, 173, 0, 0, 0, 0),
(1703, 25, 174, 1, 0, 0, 0),
(1704, 25, 175, 0, 0, 0, 0),
(1705, 25, 176, 0, 0, 0, 0),
(1706, 25, 177, 0, 0, 0, 0),
(1707, 25, 179, 0, 0, 0, 0),
(1708, 25, 180, 1, 0, 0, 0),
(1709, 25, 181, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_subgroup`
--

CREATE TABLE `tbl_user_subgroup` (
  `id_subgroup` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `nama_subgroup` varchar(100) DEFAULT NULL,
  `usubgroup_created_date` timestamp NULL DEFAULT current_timestamp(),
  `usubgroup_created_by` varchar(255) DEFAULT NULL,
  `usubgroup_updated_date` datetime DEFAULT NULL,
  `usubgroup_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_user_subgroup`
--

INSERT INTO `tbl_user_subgroup` (`id_subgroup`, `id_group`, `nama_subgroup`, `usubgroup_created_date`, `usubgroup_created_by`, `usubgroup_updated_date`, `usubgroup_updated_by`) VALUES
(1, 1, 'Superadmin Pusat', '2021-02-18 00:34:32', 'Superadmin', NULL, NULL),
(2, 3, 'Kadiv Cash Management', '2021-02-22 05:15:04', 'superadmin', '2021-04-22 14:53:32', 'superadmin'),
(8, 3, 'Wakadiv Cash Management', '2021-04-11 18:27:42', 'superadmin', '2021-04-22 14:53:22', 'superadmin'),
(9, 9, 'Rutang Cabang', '2021-04-27 04:50:57', 'superadmin', '2021-04-27 19:05:59', 'superadmin'),
(10, 9, 'Teknisi Cabang', '2021-04-27 04:51:07', 'superadmin', NULL, NULL),
(11, 10, 'Admin Keuangan', '2021-04-27 04:52:15', 'superadmin', NULL, NULL),
(12, 11, 'Admin Penerimaan', '2021-04-27 04:52:56', 'superadmin', '2021-04-28 14:11:02', 'superadmin'),
(13, 9, 'Supervisor', '2021-04-28 00:02:35', 'superadmin', NULL, NULL),
(14, 9, 'PINCA (Pemimpin Cabang)', '2021-04-28 00:05:49', 'superadmin', NULL, NULL),
(15, 11, 'Admin Pengeluaran', '2021-04-28 00:07:36', 'superadmin', '2021-04-28 14:10:53', 'superadmin'),
(16, 11, 'Admin Pengadaan', '2021-04-28 00:11:22', 'superadmin', NULL, NULL),
(17, 11, 'Admin Pembayaran', '2021-04-28 00:24:19', 'superadmin', NULL, NULL),
(18, 11, 'Supervisor Pengadaan', '2021-04-28 00:34:51', 'superadmin', '2021-04-28 14:35:07', 'superadmin'),
(19, 11, 'Supervisor Penerimaan', '2021-04-28 00:35:42', 'superadmin', NULL, NULL),
(20, 11, 'Supervisor Pengeluaran', '2021-04-28 00:36:24', 'superadmin', NULL, NULL),
(21, 11, 'Supervisor Workshop', '2021-04-28 00:37:10', 'superadmin', NULL, NULL),
(22, 11, 'Kabag Pengadaan', '2021-04-28 00:49:17', 'superadmin', NULL, NULL),
(23, 9, 'Leader Cabang', '2021-05-06 13:39:18', 'superadmin', NULL, NULL),
(24, 12, 'Direksi', '2021-11-25 03:09:10', 'superadmin', NULL, NULL),
(25, 13, 'Supervisor Gudang', '2021-12-03 02:29:37', 'superadmin', '2021-12-03 03:28:46', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `id_vendor` int(11) NOT NULL,
  `kode_vendor` varchar(6) DEFAULT NULL,
  `nama_vendor` varchar(100) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `no_npwp` varchar(255) DEFAULT NULL,
  `no_rekening` varchar(255) DEFAULT NULL,
  `nama_rekening` varchar(255) DEFAULT NULL,
  `telp_vendor` char(15) DEFAULT NULL,
  `email_vendor` varchar(255) DEFAULT NULL,
  `alamat_vendor` text DEFAULT NULL,
  `nama_pic` varchar(255) DEFAULT NULL,
  `email_pic` varchar(255) DEFAULT NULL,
  `telp_pic` char(15) DEFAULT NULL,
  `posisi_pic` varchar(255) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `vendor_created_date` timestamp NULL DEFAULT current_timestamp(),
  `vendor_created_by` varchar(255) DEFAULT NULL,
  `vendor_updated_date` datetime DEFAULT NULL,
  `vendor_updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`id_vendor`, `kode_vendor`, `nama_vendor`, `nama_bank`, `no_npwp`, `no_rekening`, `nama_rekening`, `telp_vendor`, `email_vendor`, `alamat_vendor`, `nama_pic`, `email_pic`, `telp_pic`, `posisi_pic`, `ket`, `vendor_created_date`, `vendor_created_by`, `vendor_updated_date`, `vendor_updated_by`) VALUES
(2, '89 ELK', '89 ELEKTRONIK', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '', '', 'Komp. Citra Garden 2 Ext BH7 No. 18 (Pos 8) Kalideres, Pengadugan, Jakarta Barat 11830', '', '', '08567577877', '', '', '2021-02-23 23:28:17', 'superadmin', '2021-04-05 16:11:34', 'superadmin'),
(4, 'AHD', 'ACE HARDWARE', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '', '', 'Living Plaza, Jalan Jend Soedirman, Purwokerto Timur, Kabupaten Banyumas, Jawa Tengah, 53116\r\nPURWOKERTO', '', '', '', '', '', '2021-02-23 23:40:42', 'superadmin', '2021-04-05 16:11:02', 'superadmin'),
(5, 'AHJ', 'ACE HARDWARE -JATINEGARA', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '', 'cs_jatinegara@acehardware.co.id', 'Jl. Matraman Raya No. 173-175 RT.02 / RW.06 Jatinegara - Jakarta Timur\r\nJakarta Timur', '', '', '', '', '', '2021-02-23 23:41:09', 'superadmin', '2021-04-05 16:08:07', 'superadmin'),
(6, 'AHL', 'ACE HARDWARE SOLO', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '02717891262', '', 'Hartono Lifestyle Mall, Jl.Solo-Wonogiri, Madegondo, Grogol, Kab.Sukoharjo, Jateng 57552\r\nSukoharjo', '', '', '', '', '', '2021-02-23 23:41:38', 'superadmin', '2021-04-05 16:07:57', 'superadmin'),
(7, 'ASBY', 'ACE HARDWARE SURABAYA', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '03151205488', '', 'Jl.Walikota Mustajab & Kusuma Bangsa 60272 Surabaya - Jawa Timur', '', '', '', '', '', '2021-02-23 23:42:13', 'superadmin', '2021-04-05 16:07:44', 'superadmin'),
(8, 'AHY', 'ACE HARDWARE YOGYAKARTA', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '02744331422', '', 'Jl. Laksda Adi Sucipto No.80 Ambarukmo Plaza Lt.3 Yogyakarta\r\nYogyakarta', '', '', '', '', '', '2021-02-23 23:42:39', 'superadmin', '2021-04-05 16:07:18', 'superadmin'),
(9, 'AOC', 'ARIOS CELLULAR', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '', '', 'Plaza Kalibata Lt.Dasar No.30 ( Depan KFC ) Telp.021-7980122, 7993634\r\nJAKARTA', 'Bpk.Irwan', 'irwanpermana484@gmail.com', '082297667808', '', '', '2021-02-23 23:43:40', 'superadmin', '2021-04-05 16:06:06', 'superadmin'),
(10, 'APE', 'ARS PANEL ELECTRIC', 'Bank Central Asia', '763728372', '8293002020', 'PT 89 Elektronik', '0213902805', '', 'Pasar Kenari Lama Lt. Dasar AKS 154 Jl. Salemba Raya - Jakarta Pusat', 'WIDODO', '', '081807141481', '', 'Battery Lithium Power CR123-3V', '2021-02-23 23:47:53', 'superadmin', '2021-04-05 16:05:19', 'superadmin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_barang` (
`no_urut` int(11)
,`id_tipe_barang` int(11)
,`id_satuan` int(11)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`min_stock` int(11)
,`max_stock` int(11)
,`tipe_barang` varchar(100)
,`nama_satuan` varchar(100)
,`id_merek` int(11)
,`nama_merek` varchar(255)
,`id_sgbarang` int(11)
,`id_gbarang` int(11)
,`nama_sgbarang` varchar(100)
,`nama_gbarang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barangbalikteknisi`
-- (See below for the actual view)
--
CREATE TABLE `v_barangbalikteknisi` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`no_sn_new` varchar(30)
,`username` varchar(50)
,`tid` int(11)
,`no_sn_lama` varchar(30)
,`kondisi_barang` int(11)
,`keterangan` text
,`flag_pertukaran` int(11)
,`id_pertek_det` int(11)
,`id_pertek` int(11)
,`status_pertek` int(11)
,`id_gbarang` int(11)
,`id_merek` int(11)
,`id_sgbarang` int(11)
,`id_tipe_barang` int(11)
,`no_urut` int(11)
,`harga_satuan` int(11)
,`flag_pembukuan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barangqcvendor`
-- (See below for the actual view)
--
CREATE TABLE `v_barangqcvendor` (
`flag_retur` int(1) unsigned
,`flag_greenpart` int(1)
,`flag_qc` int(1)
,`have_sn` int(1)
,`no_sn` varchar(255)
,`id_rak` int(11)
,`tgl_qc` date
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`id_tipe_barang` int(11)
,`no_urut` int(11)
,`id_merek` int(11)
,`nama_merek` varchar(255)
,`nama_sgbarang` varchar(100)
,`id_sgbarang` int(11)
,`nama_gbarang` varchar(100)
,`id_gbarang` int(11)
,`no_do` text
,`no_po` varchar(50)
,`nama_vendor` varchar(100)
,`id_vendor` int(11)
,`id_tmp` int(11)
,`flag_dikemas` int(1)
,`flag_cacat` int(1)
,`flag_fisik` int(1)
,`ket` text
,`flag_brg_sesuai` int(1)
,`flag_pindah` int(1)
,`harga_barang` int(11)
,`id_po` int(11)
,`id_det_currency` int(11)
,`barang_updated_date` date
,`barang_created_date` timestamp
,`qty` int(11)
,`flag_status_vendor` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_caribarang`
-- (See below for the actual view)
--
CREATE TABLE `v_caribarang` (
`no_urut` int(11)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`nama_merek` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_carinosn`
-- (See below for the actual view)
--
CREATE TABLE `v_carinosn` (
`no_urut` int(11)
,`id_tmp` int(11)
,`harga_barang` int(11)
,`no_sn` varchar(255)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`id_tipe_barang` int(11)
,`qty` int(11)
,`keterangan` text
,`id_merek` int(11)
,`tipe_barang` varchar(100)
,`id_sgbarang` int(11)
,`nama_merek` varchar(255)
,`id_gbarang` int(11)
,`nama_sgbarang` varchar(100)
,`nama_gbarang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_caristock`
-- (See below for the actual view)
--
CREATE TABLE `v_caristock` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`id_stock` int(11)
,`no_sn` text
,`harga_barang` int(11)
,`flag_barang` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_currency`
-- (See below for the actual view)
--
CREATE TABLE `v_currency` (
`id_currency` int(11)
,`kode_currency` char(12)
,`nama_currency` varchar(255)
,`id_det_currency` int(11)
,`tgl_kurs` date
,`rupiah` decimal(11,2)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_penerimaan_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_penerimaan_barang` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`harga_barang` int(11)
,`kondisi_barang` int(11)
,`keterangan` text
,`no_sn` varchar(30)
,`status_pemenuhan` int(11)
,`id_pengiriman` int(11)
,`id_pengiriman_det` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detbarang`
-- (See below for the actual view)
--
CREATE TABLE `v_detbarang` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_dodet`
-- (See below for the actual view)
--
CREATE TABLE `v_dodet` (
`id_po` int(11)
,`id_do_detail` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`keterangan` text
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`id_do` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_dohead`
-- (See below for the actual view)
--
CREATE TABLE `v_dohead` (
`id_do` int(11)
,`id_po` int(11)
,`tgl_do` date
,`tgl_kirim` date
,`tgl_terima` date
,`telp_pengirim` char(15)
,`nama_pengirim` varchar(255)
,`status_do` int(11)
,`do_status_date` date
,`keterangan` text
,`do_created_date` timestamp
,`do_created_by` varchar(255)
,`do_update_date` datetime
,`do_update_by` varchar(255)
,`no_po` varchar(50)
,`no_do` text
,`nama_penerima` varchar(255)
,`tanggal_po` date
,`catatan_po` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_ekspedisi`
-- (See below for the actual view)
--
CREATE TABLE `v_ekspedisi` (
`id_ekpedisi` int(11)
,`nama_ekpedisi` varchar(100)
,`keterangan` text
,`id_layanan_ekspedisi` int(11)
,`layanan_ekspedisi` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_gudang`
-- (See below for the actual view)
--
CREATE TABLE `v_gudang` (
`id_gudang` int(11)
,`id_uker` int(11)
,`nama_gudang` varchar(100)
,`letak_gudang` varchar(150)
,`ket_gudang` text
,`nama_uker` varchar(255)
,`kode_uker` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_hasilqc`
-- (See below for the actual view)
--
CREATE TABLE `v_hasilqc` (
`id_do` int(11)
,`id_do_detail` int(11)
,`no_urut` int(11)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`tgl_qc` date
,`no_sn` varchar(255)
,`flag_qc` int(1)
,`flag_fisik` int(1)
,`ket` text
,`id_po` int(11)
,`no_po` varchar(50)
,`catatan_po` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_invoicebarang`
-- (See below for the actual view)
--
CREATE TABLE `v_invoicebarang` (
`id_invoice` int(11)
,`tanggal_invoice` date
,`no_po` varchar(50)
,`no_invoice` varchar(30)
,`nilai_invoice` int(11)
,`status_verifikasi` int(11)
,`id_po` int(11)
,`tanggal_po` date
,`id_uker` int(11)
,`id_vendor` int(11)
,`jenis_pembayaran` varchar(100)
,`jtempo_pembayaran` int(11)
,`subtotal` decimal(11,2)
,`subtotal_ppn` decimal(11,2)
,`grand_total` decimal(11,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporanlemper`
-- (See below for the actual view)
--
CREATE TABLE `v_laporanlemper` (
`id_pengiriman_det` int(11)
,`id_pengiriman` int(11)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_po`
-- (See below for the actual view)
--
CREATE TABLE `v_laporan_po` (
`id_po` int(11)
,`id_uker` int(11)
,`no_po` varchar(50)
,`tanggal_po` date
,`tanggal_approv_kadiv` date
,`kontak_person_po` varchar(100)
,`nama_kontak_po` varchar(255)
,`jenis_pembayaran` varchar(100)
,`catatan_po` text
,`grand_total` decimal(11,2)
,`nama_uker` varchar(255)
,`term_condition` text
,`kode_uker` varchar(50)
,`nama_vendor` varchar(100)
,`tid` int(11)
,`nama_project` varchar(100)
,`jtempo_pembayaran` int(11)
,`jtempo_pemenuhan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_po_det`
-- (See below for the actual view)
--
CREATE TABLE `v_laporan_po_det` (
`nama_barang` varchar(100)
,`kode_currency` char(12)
,`nama_currency` varchar(255)
,`rupiah` decimal(11,2)
,`id_po` int(11)
,`id_po_det` int(11)
,`qty` int(11)
,`harga_satuan` decimal(11,2)
,`total_ppn` decimal(11,2)
,`total` decimal(11,2)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lap_pembarcab`
-- (See below for the actual view)
--
CREATE TABLE `v_lap_pembarcab` (
`id_uker` int(11)
,`no_permintaan` varchar(255)
,`nama_uker` varchar(255)
,`pinca_approv` int(11)
,`dari_uker` int(11)
,`id_permintaan` int(11)
,`id_delivery_type` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`tgl_permintaan` date
,`jumlah_koil` int(11)
,`alasan_permintaan` text
,`catatan_permintaan` text
,`status_permintaan` int(11)
,`harga_total` int(11)
,`tanggal_pemenuhan` date
,`tempo_barang` int(11)
,`sla` int(11)
,`tgl_approve_pinca` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lap_pempembar`
-- (See below for the actual view)
--
CREATE TABLE `v_lap_pempembar` (
`id_invoice` int(11)
,`no_invoice` varchar(30)
,`nilai_invoice` int(11)
,`id_po` int(11)
,`no_po` varchar(50)
,`tanggal_po` date
,`id_permohonan_pem` int(11)
,`no_permohonan_pem` varchar(100)
,`jenis_pembayaran` varchar(100)
,`tempo_pembayaran` varchar(100)
,`pinca_approvel` int(1)
,`subtotal` decimal(11,2)
,`subtotal_ppn` decimal(11,2)
,`grand_total` decimal(11,2)
,`tanggal_invoice` date
,`id_uker` int(11)
,`nama_uker` varchar(255)
,`id_vendor` int(11)
,`nama_vendor` varchar(100)
,`status_po` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lap_penbarven`
-- (See below for the actual view)
--
CREATE TABLE `v_lap_penbarven` (
`id_do_detail` int(11)
,`id_do` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`id_po` int(11)
,`tgl_kirim` date
,`nama_pengirim` varchar(255)
,`telp_pengirim` char(15)
,`tanggal_po` date
,`status_po` int(1)
,`keterangan` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lap_pengbar`
-- (See below for the actual view)
--
CREATE TABLE `v_lap_pengbar` (
`id_pengiriman` int(11)
,`id_uker` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`no_pengiriman` varchar(100)
,`tanggal_pengiriman` date
,`tanggal_penerimaan` date
,`no_resi` varchar(100)
,`estimasi` int(11)
,`keterangan` text
,`jumlah_koli` int(11)
,`berat_barang` varchar(100)
,`nama_pengirim` varchar(100)
,`total_harga` int(11)
,`status_pengiriman` int(11)
,`pengiriman_created_date` timestamp
,`pengiriman_created_by` varchar(255)
,`pengiriman_update_date` datetime
,`pengiriman_update_by` varchar(255)
,`nama_uker` varchar(255)
,`layanan_ekspedisi` varchar(255)
,`nama_ekpedisi` varchar(100)
,`nama_delivery_type` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_lap_permintaan_barang_project`
-- (See below for the actual view)
--
CREATE TABLE `v_lap_permintaan_barang_project` (
`id_project` int(11)
,`tid` int(11)
,`id_pertek` int(11)
,`tanggal_pertek` date
,`nomor_pertek` varchar(100)
,`tgl_spk` date
,`no_spk` varchar(100)
,`nama_project` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_merek`
-- (See below for the actual view)
--
CREATE TABLE `v_merek` (
`id_merek` int(11)
,`id_sgbarang` int(11)
,`nama_merek` varchar(255)
,`merek_created_date` timestamp
,`merek_created_by` varchar(255)
,`merek_updated_date` datetime
,`merek_updated_by` varchar(255)
,`nama_sgbarang` varchar(100)
,`id_gbarang` int(11)
,`nama_gbarang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_monitoringpembayaran`
-- (See below for the actual view)
--
CREATE TABLE `v_monitoringpembayaran` (
`id_permohonan_pem` int(11)
,`no_invoice` varchar(30)
,`no_po` varchar(50)
,`nilai_invoice` int(11)
,`asli_invoice` int(11)
,`asli_pajak` int(11)
,`asli_tandaterima` int(11)
,`copy_po` int(11)
,`copy_ip` int(11)
,`asli_ba` int(11)
,`dokumen` int(11)
,`lain_lain` int(11)
,`tanggal_po` date
,`jtempo_pembayaran` int(11)
,`jenis_pembayaran` varchar(100)
,`catatan_po` text
,`term_condition` text
,`subtotal` decimal(11,2)
,`subtotal_ppn` decimal(11,2)
,`grand_total` decimal(11,2)
,`file_po` text
,`id_po` int(11)
,`id_uker` int(11)
,`id_vendor` int(11)
,`id_project` int(11)
,`tid` int(11)
,`nama_project` varchar(100)
,`nama_vendor` varchar(100)
,`kode_uker` varchar(50)
,`nama_uker` varchar(255)
,`id_invoice` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_monitoring_pembukuan_persedian`
-- (See below for the actual view)
--
CREATE TABLE `v_monitoring_pembukuan_persedian` (
`id_uker` int(11)
,`id_pengiriman` int(11)
,`id_ekpedisi` int(11)
,`tanggal_pengiriman` date
,`status_pembukuan` int(11)
,`nama_uker` varchar(255)
,`nama_ekpedisi` varchar(100)
,`status_pengiriman` int(11)
,`total_harga` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_monitoring_sparepart`
-- (See below for the actual view)
--
CREATE TABLE `v_monitoring_sparepart` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`no_sn` text
,`harga_barang` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pegawai`
-- (See below for the actual view)
--
CREATE TABLE `v_pegawai` (
`id_pegawai` int(11)
,`id_user` int(11)
,`nama_pegawai` varchar(255)
,`alamat_pegawai` text
,`jk` char(1)
,`photo` text
,`telp` char(15)
,`email` varchar(100)
,`pegawai_created_date` datetime
,`pegawai_created_by` varchar(255)
,`pegawai_updated_date` datetime
,`pegawai_updated_by` varchar(255)
,`username` varchar(50)
,`password` varchar(255)
,`id_uker` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembayaranpo`
-- (See below for the actual view)
--
CREATE TABLE `v_pembayaranpo` (
`id_po` int(11)
,`nama_vendor` varchar(100)
,`no_rekening` varchar(255)
,`nama_bank` varchar(255)
,`nama_rekening` varchar(255)
,`grand_total` decimal(11,2)
,`sisa_bayar` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembelian_local`
-- (See below for the actual view)
--
CREATE TABLE `v_pembelian_local` (
`id_pembelian` int(11)
,`nomor_pembelian` varchar(100)
,`tanggal_pembelian` date
,`nama_vendor` varchar(100)
,`tempo_pembayaran` varchar(255)
,`sub_total` int(11)
,`nilai_pajak` int(11)
,`total` int(11)
,`approvel` int(11)
,`id_uker` int(11)
,`id_vendor` int(11)
,`jenis_pembayaran` varchar(100)
,`nama_uker` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembelian_local_det`
-- (See below for the actual view)
--
CREATE TABLE `v_pembelian_local_det` (
`id_pembelian_det` int(11)
,`id_pembelian` int(11)
,`keterangan` text
,`nama_barang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembukuan`
-- (See below for the actual view)
--
CREATE TABLE `v_pembukuan` (
`id_pemenuhan` int(11)
,`tanggal_pemenuhan` date
,`username` varchar(50)
,`nama_uker` varchar(255)
,`no_voucher` varchar(255)
,`tgl_transaksi` date
,`harga_barang` int(11)
,`status_pembukuan` int(11)
,`pembukuan_created_date` timestamp
,`status_pemenuhan` int(11)
,`id_pembukuan` int(11)
,`id_uker` int(11)
,`tanggal_pembukuan` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pembukuan_det`
-- (See below for the actual view)
--
CREATE TABLE `v_pembukuan_det` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`harga_satuan` int(11)
,`id_pemenuhan` int(11)
,`status_pembukuan` int(11)
,`no_urut` int(11)
,`id_tipe_barang` int(11)
,`id_merek` int(11)
,`id_sgbarang` int(11)
,`id_gbarang` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemenuhan`
-- (See below for the actual view)
--
CREATE TABLE `v_pemenuhan` (
`id_pemenuhan` int(11)
,`id_user` int(11)
,`id_project` int(11)
,`no_urut` int(11)
,`id_stock` int(11)
,`tanggal_pemenuhan` date
,`status_pemenuhan` int(11)
,`keterangan` text
,`username` varchar(50)
,`tid` int(11)
,`nama_barang` varchar(100)
,`no_sn` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemenuhan_barang_det`
-- (See below for the actual view)
--
CREATE TABLE `v_pemenuhan_barang_det` (
`id_permintaan_det` int(11)
,`id_permintaan` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`keterangan` text
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`harga_barang` int(11)
,`kondisi_barang` varchar(255)
,`status_pemenuhan` int(11)
,`no_sn` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemenuhan_barcab`
-- (See below for the actual view)
--
CREATE TABLE `v_pemenuhan_barcab` (
`id_permintaan` int(11)
,`id_uker` int(11)
,`dari_uker` int(11)
,`tgl_permintaan` date
,`no_permintaan` varchar(255)
,`alasan_permintaan` text
,`catatan_permintaan` text
,`status_permintaan` int(11)
,`tanggal_pemenuhan` date
,`nama_uker` varchar(255)
,`jumlah_koil` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemenuhan_det`
-- (See below for the actual view)
--
CREATE TABLE `v_pemenuhan_det` (
`id_pemenuhan_det` int(11)
,`id_pemenuhan` int(11)
,`qty` int(11)
,`harga_satuan` int(11)
,`totalppn` int(11)
,`total` int(11)
,`keterangan` text
,`no_urut` int(11)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`nama_merek` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pempengsparekancab`
-- (See below for the actual view)
--
CREATE TABLE `v_pempengsparekancab` (
`status_pembukuan` int(11)
,`no_voucher` varchar(255)
,`tgl_transaksi` date
,`harga_barang` int(11)
,`tanggal_pemenuhan` date
,`id_pembukuan` int(11)
,`id_stock` int(11)
,`id_pemenuhan` int(11)
,`id_uker` int(11)
,`nama_uker` varchar(255)
,`id_user` int(11)
,`username` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pempengsparekancab_det`
-- (See below for the actual view)
--
CREATE TABLE `v_pempengsparekancab_det` (
`id_pembukuan_det` int(11)
,`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`no_sn` text
,`harga_barang` int(11)
,`id_pembukuan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pencarianbarang`
-- (See below for the actual view)
--
CREATE TABLE `v_pencarianbarang` (
`nama_sgbarang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`no_urut` int(11)
,`id_sgbarang` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penerimaan`
-- (See below for the actual view)
--
CREATE TABLE `v_penerimaan` (
`id_pemenuhan` int(11)
,`status_pemenuhan` int(11)
,`keterangan` text
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`nama_merek` varchar(255)
,`nama_sgbarang` varchar(100)
,`nama_gbarang` varchar(100)
,`username` varchar(50)
,`tid` int(11)
,`no_sn` text
,`flag_barang` int(1)
,`kode_barang` varchar(255)
,`tgl_transaksi` date
,`harga_barang` int(11)
,`flag_pakai` int(1)
,`status_balik` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penerimaanbarangkp`
-- (See below for the actual view)
--
CREATE TABLE `v_penerimaanbarangkp` (
`no_permintaan` varchar(30)
,`tanggal_pengiriman` date
,`pengiriman_created_by` int(11)
,`status_pengiriman` int(11)
,`id_ekpedisi` int(11)
,`id_pengirimankekp` int(11)
,`tanggal_penerimaan` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penerimaan_barang_dari_cabang`
-- (See below for the actual view)
--
CREATE TABLE `v_penerimaan_barang_dari_cabang` (
`id_pengiriman` int(11)
,`id_uker` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`no_pengiriman` varchar(100)
,`tanggal_pengiriman` date
,`no_resi` varchar(100)
,`jumlah_koli` int(11)
,`berat_barang` varchar(100)
,`nama_pengirim` varchar(100)
,`total_harga` int(11)
,`status_pengiriman` int(11)
,`status_cek` int(11)
,`pengiriman_created_date` timestamp
,`pengiriman_created_by` varchar(255)
,`pengiriman_update_date` datetime
,`pengiriman_update_by` varchar(255)
,`nama_uker` varchar(255)
,`kode_uker` varchar(50)
,`id_pengiriman_det` int(11)
,`no_urut` int(11)
,`koli_ke` int(11)
,`berat_koli` int(11)
,`keterangan` text
,`pengiriman_det_created_date` timestamp
,`pengiriman_det_created_by` varchar(255)
,`pengiriman_det_update_by` varchar(255)
,`pengiriman_det_update_date` datetime
,`nama_ekpedisi` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengbartek`
-- (See below for the actual view)
--
CREATE TABLE `v_pengbartek` (
`nomor_pertek` varchar(100)
,`tanggal_pertek` date
,`username` varchar(50)
,`tid` int(11)
,`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`no_sn` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengelolaanmesin`
-- (See below for the actual view)
--
CREATE TABLE `v_pengelolaanmesin` (
`id_det_project` int(11)
,`id_project` int(11)
,`id_uker` int(11)
,`lokasi` varchar(255)
,`db` varchar(255)
,`merek` varchar(255)
,`tipe` varchar(255)
,`nama_project` varchar(100)
,`tid` int(11)
,`kode_uker` varchar(50)
,`nama_uker` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengirimankekp`
-- (See below for the actual view)
--
CREATE TABLE `v_pengirimankekp` (
`no_permintaan` varchar(30)
,`tanggal_pengiriman` date
,`tanggal_penerimaan` date
,`jumlah_permintaan` int(11)
,`jumlah_pemenuhan` int(11)
,`sisa` int(11)
,`estimasi` int(11)
,`id_delivery_type` int(11)
,`id_ekpedisi` int(11)
,`id_uker` int(11)
,`j_koli` int(11)
,`no_resi` varchar(30)
,`nama_pengirim` varchar(50)
,`berat_barang` int(11)
,`id_pengkekp_det` int(11)
,`id_pengirimankekp` int(11)
,`no_urut` int(11)
,`no_sn` varchar(30)
,`harga_barang` int(11)
,`kondisi_barang` int(11)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`status_perbaikan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengirimankpkc`
-- (See below for the actual view)
--
CREATE TABLE `v_pengirimankpkc` (
`id_pengiriman` int(11)
,`no_pengiriman` varchar(100)
,`tanggal_pengiriman` date
,`id_uker` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`id_pengiriman_det` int(11)
,`no_urut` int(11)
,`status_pemenuhan` int(11)
,`status_pengiriman` int(11)
,`nama_ekpedisi` varchar(100)
,`layanan_ekspedisi` varchar(255)
,`nama_delivery_type` varchar(255)
,`id_delivery_type` int(11)
,`pengiriman_created_by` varchar(255)
,`jumlah_koli` int(11)
,`estimasi` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengiriman_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_pengiriman_barang` (
`id_pengiriman` int(11)
,`id_uker` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`no_pengiriman` varchar(100)
,`tanggal_pengiriman` date
,`no_resi` varchar(100)
,`jumlah_koli` int(11)
,`berat_barang` varchar(100)
,`nama_pengirim` varchar(100)
,`total_harga` int(11)
,`pengiriman_created_date` timestamp
,`pengiriman_created_by` varchar(255)
,`pengiriman_update_date` datetime
,`pengiriman_update_by` varchar(255)
,`layanan_ekspedisi` varchar(255)
,`nama_uker` varchar(255)
,`nama_ekpedisi` varchar(100)
,`nama_delivery_type` varchar(255)
,`status_pengiriman` int(11)
,`estimasi` int(11)
,`keterangan` text
,`tanggal_penerimaan` date
,`alamat_uker` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengiriman_barang_detail`
-- (See below for the actual view)
--
CREATE TABLE `v_pengiriman_barang_detail` (
`id_pengiriman` int(11)
,`id_pengiriman_det` int(11)
,`no_urut` int(11)
,`no_sn` varchar(30)
,`harga_barang` int(11)
,`keterangan` text
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_perbaikan`
-- (See below for the actual view)
--
CREATE TABLE `v_perbaikan` (
`id_perbaikanbarang` int(11)
,`nama_sgbarang` varchar(100)
,`nama_gbarang` varchar(100)
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`nama_merek` varchar(255)
,`catatan_perbaikan` text
,`stat_perbaikan` varchar(30)
,`id_tipe_barang` int(11)
,`id_merek` int(11)
,`no_urut` int(11)
,`id_gbarang` int(11)
,`id_sgbarang` int(11)
,`tanggal_perbaikan` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_perbaikankcsp`
-- (See below for the actual view)
--
CREATE TABLE `v_perbaikankcsp` (
`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`no_sn` varchar(30)
,`catatan_perbaikan` text
,`status_perbaikan` int(11)
,`id_perbaikankcsp` int(11)
,`id_pengkekp_det` int(11)
,`id_pengirimankekp` int(11)
,`no_urut` int(11)
,`id_tipe_barang` int(11)
,`id_merek` int(11)
,`id_sgbarang` int(11)
,`id_gbarang` int(11)
,`no_permintaan` varchar(30)
,`tanggal_perbaikan` date
,`harga_barang` int(11)
,`kode_barang` varchar(255)
,`kondisi_barang` int(11)
,`status_ph` int(11)
,`status_pembukuan` int(11)
,`nama_satuan` varchar(100)
,`tanggal_pengiriman` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_permintaan_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_permintaan_barang` (
`id_permintaan` int(11)
,`id_uker` int(11)
,`tgl_permintaan` date
,`no_permintaan` varchar(255)
,`alasan_permintaan` text
,`catatan_permintaan` text
,`status_permintaan` int(11)
,`tempo_barang` int(11)
,`sla` int(11)
,`pinca_approv` int(11)
,`tgl_approve_pinca` date
,`permintaan_barang_created_date` timestamp
,`permintaan_barang_created_by` varchar(255)
,`permintaan_barang_updated_date` datetime
,`permintaan_barang_updated_by` varchar(255)
,`nama_uker` varchar(255)
,`kode_uker` varchar(50)
,`tanggal_pemenuhan` date
,`id_delivery_type` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`jumlah_koil` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_permintaan_barang_det`
-- (See below for the actual view)
--
CREATE TABLE `v_permintaan_barang_det` (
`id_permintaan_det` int(11)
,`id_permintaan` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`keterangan` text
,`permintaan_det_created_date` timestamp
,`permintaan_det_created_by` varchar(255)
,`permintaan_det_updated_date` datetime
,`permintaan_det_updated_by` varchar(255)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`nama_merek` varchar(255)
,`no_sn` varchar(30)
,`harga_barang` int(11)
,`kondisi_barang` varchar(255)
,`status_pemenuhan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_permohonan_pem`
-- (See below for the actual view)
--
CREATE TABLE `v_permohonan_pem` (
`id_invoice` int(11)
,`no_invoice` varchar(30)
,`nilai_invoice` int(11)
,`id_po` int(11)
,`no_po` varchar(50)
,`tanggal_po` date
,`id_permohonan_pem` int(11)
,`no_permohonan_pem` varchar(100)
,`pinca_approvel` int(1)
,`subtotal` decimal(11,2)
,`subtotal_ppn` decimal(11,2)
,`grand_total` decimal(11,2)
,`tanggal_invoice` date
,`id_uker` int(11)
,`nama_uker` varchar(255)
,`id_vendor` int(11)
,`nama_vendor` varchar(100)
,`status_po` int(1)
,`jtempo_pembayaran` int(11)
,`jenis_pembayaran` varchar(25)
,`flag_pembayaran` int(1)
,`flag_pembukuan` int(1)
,`status_invoice` int(1)
,`no_rekening` varchar(255)
,`nama_rekening` varchar(255)
,`nama_bank` varchar(255)
,`beban` varchar(25)
,`tahap_tagihan` varchar(25)
,`asli_invoice` int(11)
,`asli_pajak` int(11)
,`asli_tandaterima` int(11)
,`copy_po` int(11)
,`copy_ip` int(11)
,`asli_ba` int(11)
,`dokumen` int(11)
,`lain_lain` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_permohonan_pembayaran_eks`
-- (See below for the actual view)
--
CREATE TABLE `v_permohonan_pembayaran_eks` (
`layanan_ekspedisi` varchar(255)
,`id_pengiriman` int(11)
,`id_uker` int(11)
,`id_ekpedisi` int(11)
,`id_layanan_ekspedisi` int(11)
,`no_pengiriman` varchar(100)
,`tanggal_pengiriman` date
,`no_resi` varchar(100)
,`jumlah_koli` int(11)
,`berat_barang` varchar(100)
,`nama_pengirim` varchar(100)
,`total_harga` int(11)
,`status_pengiriman` int(11)
,`pengiriman_created_date` timestamp
,`pengiriman_created_by` varchar(255)
,`pengiriman_update_date` datetime
,`pengiriman_update_by` varchar(255)
,`nama_ekpedisi` varchar(100)
,`nama_uker` varchar(255)
,`nama_delivery_type` varchar(255)
,`status_cek` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pertekdet`
-- (See below for the actual view)
--
CREATE TABLE `v_pertekdet` (
`id_pertek` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`keterangan` text
,`nama_barang` varchar(100)
,`kode_barang` varchar(255)
,`harga_satuan` int(11)
,`totalppn` int(11)
,`no_sn_new` varchar(30)
,`id_pertek_det` int(11)
,`id_sgbarang` int(11)
,`nama_sgbarang` varchar(100)
,`id_gbarang` int(11)
,`nama_gbarang` varchar(100)
,`id_merek` int(11)
,`nama_merek` varchar(255)
,`id_tipe_barang` int(11)
,`tipe_barang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pertekhed`
-- (See below for the actual view)
--
CREATE TABLE `v_pertekhed` (
`id_pertek` int(11)
,`id_user` int(11)
,`id_project` int(11)
,`nomor_pertek` varchar(100)
,`tanggal_pertek` date
,`status_pertek` int(11)
,`keterangan` text
,`username` varchar(50)
,`tid` int(11)
,`pinca_appovel` int(11)
,`leader_approvel` int(11)
,`nama_project` varchar(100)
,`tanggal_pemenuhan` date
,`nama_uker` varchar(255)
,`status_pembukuan` int(11)
,`id_uker` int(11)
,`tanggal_pembukuan` date
,`no_voucher` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_podet`
-- (See below for the actual view)
--
CREATE TABLE `v_podet` (
`id_po_det` int(11)
,`id_po` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`harga_satuan` decimal(11,2)
,`total_ppn` decimal(11,2)
,`total` decimal(11,2)
,`keterangan` text
,`podet_created_date` timestamp
,`podet_created_by` varchar(255)
,`podet_updated_date` datetime
,`podet_updated_by` varchar(255)
,`no_po` varchar(50)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`tipe_barang` varchar(100)
,`id_det_currency` int(11)
,`id_currency` int(11)
,`tgl_kurs` date
,`rupiah` decimal(11,2)
,`Detcurr` text
,`kode_currency` char(12)
,`nama_currency` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pohead`
-- (See below for the actual view)
--
CREATE TABLE `v_pohead` (
`id_po` int(11)
,`id_uker` int(11)
,`id_vendor` int(11)
,`id_project` int(11)
,`no_po` varchar(50)
,`tanggal_po` date
,`kontak_person_po` varchar(100)
,`nama_kontak_po` varchar(255)
,`jenis_pembayaran` varchar(100)
,`jtempo_pembayaran` int(11)
,`jtempo_pemenuhan` int(11)
,`catatan_po` text
,`term_condition` text
,`subtotal` decimal(11,2)
,`grand_total` decimal(11,2)
,`file_po` text
,`status_po` int(1)
,`kadiv_approv` int(1)
,`wakadiv_approv` int(1)
,`sla` text
,`nama_uker` varchar(255)
,`nama_vendor` varchar(100)
,`tid` int(11)
,`nama_project` varchar(100)
,`subtotal_ppn` decimal(11,2)
,`tanggal_approv_wakadiv` date
,`tanggal_approv_kadiv` date
,`flag_pembayaran` int(1)
,`flag_pembukuan` int(1)
,`status_invoice` int(1)
,`kode_uker` varchar(50)
,`direksi_approv` int(11)
,`alamat_vendor` text
,`telp_vendor` char(15)
,`alamat_uker` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_print_pbj`
-- (See below for the actual view)
--
CREATE TABLE `v_print_pbj` (
`id` int(11)
,`id_pbj` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`keterangan` varchar(255)
,`no_pbj` varchar(50)
,`tanggal_permintaan` date
,`terms` text
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_print_penerimaan`
-- (See below for the actual view)
--
CREATE TABLE `v_print_penerimaan` (
`id_do` int(11)
,`id_po` int(11)
,`no_do` text
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`no_po` varchar(50)
,`harga_satuan` decimal(11,2)
,`total` decimal(11,2)
,`rupiah` decimal(11,2)
,`kode_currency` char(12)
,`nama_currency` varchar(255)
,`qty` int(11)
,`subtotal` decimal(11,2)
,`grand_total` decimal(11,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rak`
-- (See below for the actual view)
--
CREATE TABLE `v_rak` (
`nama_gudang` varchar(100)
,`id_uker` int(11)
,`nama_uker` varchar(255)
,`id_rak` int(11)
,`id_gudang` int(11)
,`nama_rak` varchar(255)
,`ket_rak` varchar(255)
,`flag_rakqc` int(11)
,`flag_rakjunk` int(11)
,`kode_uker` varchar(50)
,`letak_gudang` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_regin_ekspedisi`
-- (See below for the actual view)
--
CREATE TABLE `v_regin_ekspedisi` (
`id_invoice` int(11)
,`id_vendor` int(11)
,`no_invoice` varchar(100)
,`tgl_invoice` date
,`periode` int(11)
,`tot_invoice` int(11)
,`status_verif` int(11)
,`regineks_created_date` timestamp
,`regineks_created_by` varchar(255)
,`nama_vendor` varchar(100)
,`nilai_invoice` varchar(255)
,`alamat_vendor` text
,`regineks_updated_date` datetime
,`regineks_updated_by` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_sgbarang`
-- (See below for the actual view)
--
CREATE TABLE `v_sgbarang` (
`id_sgbarang` int(11)
,`id_gbarang` int(11)
,`nama_sgbarang` varchar(100)
,`sgbarang_created_date` timestamp
,`sgbarang_created_by` varchar(255)
,`sgbarang_updated_date` datetime
,`sgbarang_updated_by` varchar(255)
,`nama_gbarang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockcabang`
-- (See below for the actual view)
--
CREATE TABLE `v_stockcabang` (
`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`min_stock` int(11)
,`max_stock` int(11)
,`tipe_barang` varchar(100)
,`id_uker` int(11)
,`nama_uker` varchar(255)
,`harga_barang` int(11)
,`kode_uker` varchar(50)
,`test` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockcbg`
-- (See below for the actual view)
--
CREATE TABLE `v_stockcbg` (
`id_tran` int(11)
,`id_tranOld` int(11)
,`id_jtran` int(11)
,`id_vendor` int(11)
,`id_uker` int(11)
,`dari_uker` int(11)
,`no_urut` int(11)
,`no_referensi` text
,`tgl_terima_barang` date
,`nama_ekpedisi` varchar(255)
,`tgl_kirim_barang` date
,`tgl_pemakai_barang` date
,`nama_teknisi` varchar(255)
,`tid` int(11)
,`no_sn` varchar(255)
,`no_snOld` varchar(255)
,`kon_barang` varchar(255)
,`qty` int(11)
,`harga_barang` decimal(11,2)
,`remark` text
,`catatan_pemakaian` text
,`is_active` int(1)
,`is_balikan` int(1)
,`is_have` int(1)
,`status_pakai` int(1)
,`is_out` int(1)
,`tran_created_date` timestamp
,`tran_created_by` varchar(255)
,`tran_updated_date` datetime
,`tran_updated_by` varchar(255)
,`kode_barang` varchar(255)
,`nama_barang` varchar(100)
,`min_stock` int(11)
,`max_stock` int(11)
,`tipe_barang` varchar(100)
,`kode_uker` varchar(50)
,`nama_uker` varchar(255)
,`nama_merek` varchar(255)
,`nama_sgbarang` varchar(100)
,`nama_gbarang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockdetail`
-- (See below for the actual view)
--
CREATE TABLE `v_stockdetail` (
`id_uker` int(11)
,`no_po` varchar(50)
,`nama_gudang` varchar(100)
,`nama_rak` varchar(255)
,`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`no_urut` int(11)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`no_sn` text
,`harga_barang` int(11)
,`id_det_currency` int(11)
,`tgl_kurs` date
,`rupiah` decimal(11,2)
,`keterangan` text
,`kode_currency` char(12)
,`nama_currency` varchar(255)
,`id_currency` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockgdg`
-- (See below for the actual view)
--
CREATE TABLE `v_stockgdg` (
`id_stock` int(11)
,`no_urut` int(11)
,`no_sn` text
,`flag_pakai` int(1)
,`nama_barang` varchar(100)
,`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`harga_barang` int(11)
,`id_po` int(11)
,`nama_rak` varchar(255)
,`nama_gudang` varchar(100)
,`no_po` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_stockgudang`
-- (See below for the actual view)
--
CREATE TABLE `v_stockgudang` (
`id_uker` int(11)
,`kode_uker` varchar(50)
,`nama_uker` varchar(255)
,`nama_gbarang` varchar(100)
,`nama_sgbarang` varchar(100)
,`no_urut` int(11)
,`nama_barang` varchar(100)
,`nama_merek` varchar(255)
,`tipe_barang` varchar(100)
,`total_stock` bigint(21)
,`total_harga` decimal(32,0)
,`tgl_kurs` date
,`id_det_currency` int(11)
,`rupiah` decimal(11,2)
,`keterangan` text
,`kode_currency` char(12)
,`nama_currency` varchar(255)
,`id_currency` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_subgroupuser`
-- (See below for the actual view)
--
CREATE TABLE `v_subgroupuser` (
`id_subgroup` int(11)
,`id_group` int(11)
,`nama_group` varchar(255)
,`nama_subgroup` varchar(100)
,`usubgroup_created_date` timestamp
,`usubgroup_created_by` varchar(255)
,`usubgroup_updated_date` datetime
,`usubgroup_updated_by` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_terimado`
-- (See below for the actual view)
--
CREATE TABLE `v_terimado` (
`id_po` int(11)
,`id_do` int(11)
,`id_do_detail` int(11)
,`no_urut` int(11)
,`qty` int(11)
,`nama_barang` varchar(100)
,`kode_barang` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tipe_barang`
-- (See below for the actual view)
--
CREATE TABLE `v_tipe_barang` (
`id_tipe_barang` int(11)
,`id_merek` int(11)
,`tipe_barang` varchar(100)
,`tbarang_created_date` timestamp
,`tbarang_created_by` varchar(255)
,`tbarang_updated_date` datetime
,`tbarang_updated_by` varchar(255)
,`nama_merek` varchar(255)
,`id_sgbarang` int(11)
,`nama_sgbarang` varchar(100)
,`id_gbarang` int(11)
,`nama_gbarang` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user`
-- (See below for the actual view)
--
CREATE TABLE `v_user` (
`id_user` int(11)
,`id_sgroup` int(11)
,`username` varchar(50)
,`password` varchar(255)
,`nama_subgroup` varchar(100)
,`id_group` int(11)
,`nama_group` varchar(255)
,`id_uker` int(11)
,`kode_uker` varchar(50)
,`nama_uker` varchar(255)
,`kode_nama` char(10)
,`alamat_uker` text
,`ket_uker` text
);

-- --------------------------------------------------------

--
-- Table structure for table `_`
--

CREATE TABLE `_` (
  `id_pembelian` int(11) NOT NULL,
  `nomor_pembelian` varchar(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `tempo_pembayaran` varchar(50) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `nilai_pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `format_barang`
--
DROP TABLE IF EXISTS `format_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `format_barang`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang` FROM ((((`tbl_gbarang` join `tbl_sgbarang` on(`tbl_gbarang`.`id_gbarang` = `tbl_sgbarang`.`id_gbarang`)) join `tbl_merek` on(`tbl_sgbarang`.`id_sgbarang` = `tbl_merek`.`id_sgbarang`)) join `tbl_tipe_barang` on(`tbl_merek`.`id_merek` = `tbl_tipe_barang`.`id_merek`)) join `tbl_barang` on(`tbl_tipe_barang`.`id_tipe_barang` = `tbl_barang`.`id_tipe_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS SELECT `tbl_barang`.`no_urut` AS `no_urut`, `tbl_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_barang`.`id_satuan` AS `id_satuan`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`min_stock` AS `min_stock`, `tbl_barang`.`max_stock` AS `max_stock`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_satuan`.`nama_satuan` AS `nama_satuan`, `tbl_tipe_barang`.`id_merek` AS `id_merek`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_merek`.`id_sgbarang` AS `id_sgbarang`, `tbl_sgbarang`.`id_gbarang` AS `id_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang` FROM (((((`tbl_barang` join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_satuan` on(`tbl_barang`.`id_satuan` = `tbl_satuan`.`id_satuan`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_barangbalikteknisi`
--
DROP TABLE IF EXISTS `v_barangbalikteknisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barangbalikteknisi`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_pertek_det`.`no_sn_new` AS `no_sn_new`, `tbl_user`.`username` AS `username`, `tbl_project`.`tid` AS `tid`, `tbl_pertek_det`.`no_sn_lama` AS `no_sn_lama`, `tbl_pertek_det`.`kondisi_barang` AS `kondisi_barang`, `tbl_pertek_det`.`keterangan` AS `keterangan`, `tbl_pertek_det`.`flag_pertukaran` AS `flag_pertukaran`, `tbl_pertek_det`.`id_pertek_det` AS `id_pertek_det`, `tbl_pertek_det`.`id_pertek` AS `id_pertek`, `tbl_pertek`.`status_pertek` AS `status_pertek`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_merek`.`id_merek` AS `id_merek`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_pertek_det`.`harga_satuan` AS `harga_satuan`, `tbl_pertek_det`.`flag_pembukuan` AS `flag_pembukuan` FROM ((((((((`tbl_pertek_det` join `tbl_barang` on(`tbl_pertek_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_pertek` on(`tbl_pertek_det`.`id_pertek` = `tbl_pertek`.`id_pertek`)) join `tbl_project` on(`tbl_pertek`.`id_project` = `tbl_project`.`id_project`)) join `tbl_user` on(`tbl_pertek`.`id_user` = `tbl_user`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_barangqcvendor`
--
DROP TABLE IF EXISTS `v_barangqcvendor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barangqcvendor`  AS SELECT `tbl_barang_temp`.`flag_retur` AS `flag_retur`, `tbl_barang_temp`.`flag_greenpart` AS `flag_greenpart`, `tbl_barang_temp`.`flag_qc` AS `flag_qc`, `tbl_barang_temp`.`have_sn` AS `have_sn`, `tbl_barang_temp`.`no_sn` AS `no_sn`, `tbl_barang_temp`.`id_rak` AS `id_rak`, `tbl_barang_temp`.`tgl_qc` AS `tgl_qc`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_merek`.`id_merek` AS `id_merek`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_do`.`no_do` AS `no_do`, `tbl_po`.`no_po` AS `no_po`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_vendor`.`id_vendor` AS `id_vendor`, `tbl_barang_temp`.`id_tmp` AS `id_tmp`, `tbl_barang_temp`.`flag_dikemas` AS `flag_dikemas`, `tbl_barang_temp`.`flag_cacat` AS `flag_cacat`, `tbl_barang_temp`.`flag_fisik` AS `flag_fisik`, `tbl_barang_temp`.`ket` AS `ket`, `tbl_barang_temp`.`flag_brg_sesuai` AS `flag_brg_sesuai`, `tbl_barang_temp`.`flag_pindah` AS `flag_pindah`, `tbl_barang_temp`.`harga_barang` AS `harga_barang`, `tbl_po`.`id_po` AS `id_po`, `tbl_barang_temp`.`id_det_currency` AS `id_det_currency`, `tbl_barang_temp`.`barang_updated_date` AS `barang_updated_date`, `tbl_barang_temp`.`barang_created_date` AS `barang_created_date`, `tbl_do_detail`.`qty` AS `qty`, `tbl_barang_temp`.`flag_status_vendor` AS `flag_status_vendor` FROM (((((((((`tbl_barang_temp` join `tbl_do_detail` on(`tbl_barang_temp`.`id_do_detail` = `tbl_do_detail`.`id_do_detail`)) join `tbl_barang` on(`tbl_barang_temp`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_do` on(`tbl_do_detail`.`id_do` = `tbl_do`.`id_do`)) join `tbl_po` on(`tbl_do`.`id_po` = `tbl_po`.`id_po`)) join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_caribarang`
--
DROP TABLE IF EXISTS `v_caribarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_caribarang`  AS SELECT `tbl_barang`.`no_urut` AS `no_urut`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_merek`.`nama_merek` AS `nama_merek` FROM ((`tbl_barang` join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_carinosn`
--
DROP TABLE IF EXISTS `v_carinosn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_carinosn`  AS SELECT `tbl_barang_temp`.`no_urut` AS `no_urut`, `tbl_barang_temp`.`id_tmp` AS `id_tmp`, `tbl_barang_temp`.`harga_barang` AS `harga_barang`, `tbl_barang_temp`.`no_sn` AS `no_sn`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_permintaan_barang_det`.`qty` AS `qty`, `tbl_permintaan_barang_det`.`keterangan` AS `keterangan`, `tbl_tipe_barang`.`id_merek` AS `id_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_merek`.`id_sgbarang` AS `id_sgbarang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_sgbarang`.`id_gbarang` AS `id_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang` FROM ((((((`tbl_barang_temp` join `tbl_barang` on(`tbl_barang_temp`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_permintaan_barang_det` on(`tbl_barang`.`no_urut` = `tbl_permintaan_barang_det`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_caristock`
--
DROP TABLE IF EXISTS `v_caristock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_caristock`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_stock`.`id_stock` AS `id_stock`, `tbl_stock`.`no_sn` AS `no_sn`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_stock`.`flag_barang` AS `flag_barang` FROM (((((`tbl_stock` join `tbl_barang` on(`tbl_stock`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_currency`
--
DROP TABLE IF EXISTS `v_currency`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_currency`  AS SELECT `tbl_currency`.`id_currency` AS `id_currency`, `tbl_currency`.`kode_currency` AS `kode_currency`, `tbl_currency`.`nama_currency` AS `nama_currency`, `tbl_det_currency`.`id_det_currency` AS `id_det_currency`, `tbl_det_currency`.`tgl_kurs` AS `tgl_kurs`, `tbl_det_currency`.`rupiah` AS `rupiah`, `tbl_det_currency`.`keterangan` AS `keterangan` FROM (`tbl_currency` join `tbl_det_currency` on(`tbl_currency`.`id_currency` = `tbl_det_currency`.`id_currency`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_penerimaan_barang`
--
DROP TABLE IF EXISTS `v_detail_penerimaan_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_penerimaan_barang`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_pengiriman_barang_det`.`harga_barang` AS `harga_barang`, `tbl_pengiriman_barang_det`.`kondisi_barang` AS `kondisi_barang`, `tbl_pengiriman_barang_det`.`keterangan` AS `keterangan`, `tbl_pengiriman_barang_det`.`no_sn` AS `no_sn`, `tbl_pengiriman_barang_det`.`status_pemenuhan` AS `status_pemenuhan`, `tbl_pengiriman_barang_det`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang_det`.`id_pengiriman_det` AS `id_pengiriman_det` FROM (((((`tbl_barang` join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_pengiriman_barang_det` on(`tbl_barang`.`no_urut` = `tbl_pengiriman_barang_det`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detbarang`
--
DROP TABLE IF EXISTS `v_detbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detbarang`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang` FROM ((((`tbl_barang` join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_dodet`
--
DROP TABLE IF EXISTS `v_dodet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dodet`  AS SELECT `tbl_do`.`id_po` AS `id_po`, `tbl_do_detail`.`id_do_detail` AS `id_do_detail`, `tbl_do_detail`.`no_urut` AS `no_urut`, `tbl_do_detail`.`qty` AS `qty`, `tbl_do_detail`.`keterangan` AS `keterangan`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_do_detail`.`id_do` AS `id_do` FROM ((`tbl_do` join `tbl_do_detail` on(`tbl_do`.`id_do` = `tbl_do_detail`.`id_do`)) join `tbl_barang` on(`tbl_do_detail`.`no_urut` = `tbl_barang`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_dohead`
--
DROP TABLE IF EXISTS `v_dohead`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dohead`  AS SELECT `tbl_do`.`id_do` AS `id_do`, `tbl_do`.`id_po` AS `id_po`, `tbl_do`.`tgl_do` AS `tgl_do`, `tbl_do`.`tgl_kirim` AS `tgl_kirim`, `tbl_do`.`tgl_terima` AS `tgl_terima`, `tbl_do`.`telp_pengirim` AS `telp_pengirim`, `tbl_do`.`nama_pengirim` AS `nama_pengirim`, `tbl_do`.`status_do` AS `status_do`, `tbl_do`.`do_status_date` AS `do_status_date`, `tbl_do`.`keterangan` AS `keterangan`, `tbl_do`.`do_created_date` AS `do_created_date`, `tbl_do`.`do_created_by` AS `do_created_by`, `tbl_do`.`do_update_date` AS `do_update_date`, `tbl_do`.`do_update_by` AS `do_update_by`, `tbl_po`.`no_po` AS `no_po`, `tbl_do`.`no_do` AS `no_do`, `tbl_do`.`nama_penerima` AS `nama_penerima`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_po`.`catatan_po` AS `catatan_po` FROM (`tbl_do` join `tbl_po` on(`tbl_do`.`id_po` = `tbl_po`.`id_po`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_ekspedisi`
--
DROP TABLE IF EXISTS `v_ekspedisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_ekspedisi`  AS SELECT `tbl_ekpedisi`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_ekpedisi`.`keterangan` AS `keterangan`, `tbl_layanan_ekspedisi`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_layanan_ekspedisi`.`layanan_ekspedisi` AS `layanan_ekspedisi` FROM (`tbl_ekpedisi` join `tbl_layanan_ekspedisi` on(`tbl_ekpedisi`.`id_ekpedisi` = `tbl_layanan_ekspedisi`.`id_ekspedisi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_gudang`
--
DROP TABLE IF EXISTS `v_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_gudang`  AS SELECT `tbl_gudang`.`id_gudang` AS `id_gudang`, `tbl_gudang`.`id_uker` AS `id_uker`, `tbl_gudang`.`nama_gudang` AS `nama_gudang`, `tbl_gudang`.`letak_gudang` AS `letak_gudang`, `tbl_gudang`.`ket_gudang` AS `ket_gudang`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker` FROM (`tbl_gudang` join `tbl_unit_kerja` on(`tbl_gudang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_hasilqc`
--
DROP TABLE IF EXISTS `v_hasilqc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hasilqc`  AS SELECT `tbl_do_detail`.`id_do` AS `id_do`, `tbl_do_detail`.`id_do_detail` AS `id_do_detail`, `tbl_barang_temp`.`no_urut` AS `no_urut`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang_temp`.`tgl_qc` AS `tgl_qc`, `tbl_barang_temp`.`no_sn` AS `no_sn`, `tbl_barang_temp`.`flag_qc` AS `flag_qc`, `tbl_barang_temp`.`flag_fisik` AS `flag_fisik`, `tbl_barang_temp`.`ket` AS `ket`, `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`no_po` AS `no_po`, `tbl_po`.`catatan_po` AS `catatan_po` FROM ((((`tbl_barang_temp` join `tbl_do_detail` on(`tbl_barang_temp`.`id_do_detail` = `tbl_do_detail`.`id_do_detail`)) join `tbl_barang` on(`tbl_barang_temp`.`no_urut` = `tbl_barang`.`no_urut` and `tbl_do_detail`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_do` on(`tbl_do_detail`.`id_do` = `tbl_do`.`id_do`)) join `tbl_po` on(`tbl_do`.`id_po` = `tbl_po`.`id_po`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_invoicebarang`
--
DROP TABLE IF EXISTS `v_invoicebarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_invoicebarang`  AS SELECT `tbl_invoicebarang`.`id_invoice` AS `id_invoice`, `tbl_invoicebarang`.`tanggal_invoice` AS `tanggal_invoice`, `tbl_po`.`no_po` AS `no_po`, `tbl_invoicebarang`.`no_invoice` AS `no_invoice`, `tbl_invoicebarang`.`nilai_invoice` AS `nilai_invoice`, `tbl_invoicebarang`.`status_verifikasi` AS `status_verifikasi`, `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_po`.`id_uker` AS `id_uker`, `tbl_po`.`id_vendor` AS `id_vendor`, `tbl_po`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_po`.`jtempo_pembayaran` AS `jtempo_pembayaran`, `tbl_po`.`subtotal` AS `subtotal`, `tbl_po`.`subtotal_ppn` AS `subtotal_ppn`, `tbl_po`.`grand_total` AS `grand_total` FROM (`tbl_invoicebarang` join `tbl_po` on(`tbl_invoicebarang`.`id_po` = `tbl_po`.`id_po`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_laporanlemper`
--
DROP TABLE IF EXISTS `v_laporanlemper`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporanlemper`  AS SELECT `tbl_pengiriman_barang_det`.`id_pengiriman_det` AS `id_pengiriman_det`, `tbl_pengiriman_barang_det`.`id_pengiriman` AS `id_pengiriman`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_pengiriman_barang_det`.`keterangan` AS `keterangan` FROM (((`tbl_pengiriman_barang_det` join `tbl_barang` on(`tbl_pengiriman_barang_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_po`
--
DROP TABLE IF EXISTS `v_laporan_po`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_po`  AS SELECT `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`id_uker` AS `id_uker`, `tbl_po`.`no_po` AS `no_po`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_po`.`tanggal_approv_kadiv` AS `tanggal_approv_kadiv`, `tbl_po`.`kontak_person_po` AS `kontak_person_po`, `tbl_po`.`nama_kontak_po` AS `nama_kontak_po`, `tbl_po`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_po`.`catatan_po` AS `catatan_po`, `tbl_po`.`grand_total` AS `grand_total`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_po`.`term_condition` AS `term_condition`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_project`.`tid` AS `tid`, `tbl_project`.`nama_project` AS `nama_project`, `tbl_po`.`jtempo_pembayaran` AS `jtempo_pembayaran`, `tbl_po`.`jtempo_pemenuhan` AS `jtempo_pemenuhan` FROM (((`tbl_unit_kerja` join `tbl_po` on(`tbl_unit_kerja`.`id_uker` = `tbl_po`.`id_uker`)) join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) join `tbl_project` on(`tbl_po`.`id_project` = `tbl_project`.`id_project`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_po_det`
--
DROP TABLE IF EXISTS `v_laporan_po_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_po_det`  AS SELECT `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_currency`.`kode_currency` AS `kode_currency`, `tbl_currency`.`nama_currency` AS `nama_currency`, `tbl_det_currency`.`rupiah` AS `rupiah`, `tbl_po`.`id_po` AS `id_po`, `tbl_po_det`.`id_po_det` AS `id_po_det`, `tbl_po_det`.`qty` AS `qty`, `tbl_po_det`.`harga_satuan` AS `harga_satuan`, `tbl_po_det`.`total_ppn` AS `total_ppn`, `tbl_po_det`.`total` AS `total`, `tbl_po_det`.`keterangan` AS `keterangan` FROM ((((`tbl_po` join `tbl_po_det` on(`tbl_po`.`id_po` = `tbl_po_det`.`id_po`)) join `tbl_det_currency` on(`tbl_po_det`.`id_det_currency` = `tbl_det_currency`.`id_det_currency`)) join `tbl_currency` on(`tbl_det_currency`.`id_currency` = `tbl_currency`.`id_currency`)) join `tbl_barang` on(`tbl_po_det`.`no_urut` = `tbl_barang`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lap_pembarcab`
--
DROP TABLE IF EXISTS `v_lap_pembarcab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lap_pembarcab`  AS SELECT `tbl_permintaan_barang`.`id_uker` AS `id_uker`, `tbl_permintaan_barang`.`no_permintaan` AS `no_permintaan`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_permintaan_barang`.`pinca_approv` AS `pinca_approv`, `tbl_permintaan_barang`.`dari_uker` AS `dari_uker`, `tbl_permintaan_barang`.`id_permintaan` AS `id_permintaan`, `tbl_permintaan_barang`.`id_delivery_type` AS `id_delivery_type`, `tbl_permintaan_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_permintaan_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_permintaan_barang`.`tgl_permintaan` AS `tgl_permintaan`, `tbl_permintaan_barang`.`jumlah_koil` AS `jumlah_koil`, `tbl_permintaan_barang`.`alasan_permintaan` AS `alasan_permintaan`, `tbl_permintaan_barang`.`catatan_permintaan` AS `catatan_permintaan`, `tbl_permintaan_barang`.`status_permintaan` AS `status_permintaan`, `tbl_permintaan_barang`.`harga_total` AS `harga_total`, `tbl_permintaan_barang`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_permintaan_barang`.`tempo_barang` AS `tempo_barang`, `tbl_permintaan_barang`.`sla` AS `sla`, `tbl_permintaan_barang`.`tgl_approve_pinca` AS `tgl_approve_pinca` FROM (`tbl_permintaan_barang` join `tbl_unit_kerja` on(`tbl_permintaan_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lap_pempembar`
--
DROP TABLE IF EXISTS `v_lap_pempembar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lap_pempembar`  AS SELECT `tbl_invoicebarang`.`id_invoice` AS `id_invoice`, `tbl_invoicebarang`.`no_invoice` AS `no_invoice`, `tbl_invoicebarang`.`nilai_invoice` AS `nilai_invoice`, `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`no_po` AS `no_po`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_permohonan_pem`.`id_permohonan_pem` AS `id_permohonan_pem`, `tbl_permohonan_pem`.`no_permohonan_pem` AS `no_permohonan_pem`, `tbl_permohonan_pem`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_permohonan_pem`.`tempo_pembayaran` AS `tempo_pembayaran`, `tbl_permohonan_pem`.`pinca_approvel` AS `pinca_approvel`, `tbl_po`.`subtotal` AS `subtotal`, `tbl_po`.`subtotal_ppn` AS `subtotal_ppn`, `tbl_po`.`grand_total` AS `grand_total`, `tbl_invoicebarang`.`tanggal_invoice` AS `tanggal_invoice`, `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_vendor`.`id_vendor` AS `id_vendor`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_po`.`status_po` AS `status_po` FROM ((((`tbl_po` join `tbl_invoicebarang` on(`tbl_po`.`id_po` = `tbl_invoicebarang`.`id_po`)) join `tbl_permohonan_pem` on(`tbl_invoicebarang`.`id_invoice` = `tbl_permohonan_pem`.`id_invoice`)) join `tbl_unit_kerja` on(`tbl_po`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lap_penbarven`
--
DROP TABLE IF EXISTS `v_lap_penbarven`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lap_penbarven`  AS SELECT `tbl_do_detail`.`id_do_detail` AS `id_do_detail`, `tbl_do_detail`.`id_do` AS `id_do`, `tbl_do_detail`.`no_urut` AS `no_urut`, `tbl_do_detail`.`qty` AS `qty`, `tbl_do`.`id_po` AS `id_po`, `tbl_do`.`tgl_kirim` AS `tgl_kirim`, `tbl_do`.`nama_pengirim` AS `nama_pengirim`, `tbl_do`.`telp_pengirim` AS `telp_pengirim`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_po`.`status_po` AS `status_po`, `tbl_do_detail`.`keterangan` AS `keterangan` FROM ((`tbl_po` join `tbl_do` on(`tbl_po`.`id_po` = `tbl_do`.`id_po`)) join `tbl_do_detail` on(`tbl_do`.`id_do` = `tbl_do_detail`.`id_do`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lap_pengbar`
--
DROP TABLE IF EXISTS `v_lap_pengbar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lap_pengbar`  AS SELECT `tbl_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang`.`id_uker` AS `id_uker`, `tbl_pengiriman_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengiriman_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_pengiriman_barang`.`no_pengiriman` AS `no_pengiriman`, `tbl_pengiriman_barang`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengiriman_barang`.`tanggal_penerimaan` AS `tanggal_penerimaan`, `tbl_pengiriman_barang`.`no_resi` AS `no_resi`, `tbl_pengiriman_barang`.`estimasi` AS `estimasi`, `tbl_pengiriman_barang`.`keterangan` AS `keterangan`, `tbl_pengiriman_barang`.`jumlah_koli` AS `jumlah_koli`, `tbl_pengiriman_barang`.`berat_barang` AS `berat_barang`, `tbl_pengiriman_barang`.`nama_pengirim` AS `nama_pengirim`, `tbl_pengiriman_barang`.`total_harga` AS `total_harga`, `tbl_pengiriman_barang`.`status_pengiriman` AS `status_pengiriman`, `tbl_pengiriman_barang`.`pengiriman_created_date` AS `pengiriman_created_date`, `tbl_pengiriman_barang`.`pengiriman_created_by` AS `pengiriman_created_by`, `tbl_pengiriman_barang`.`pengiriman_update_date` AS `pengiriman_update_date`, `tbl_pengiriman_barang`.`pengiriman_update_by` AS `pengiriman_update_by`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_layanan_ekspedisi`.`layanan_ekspedisi` AS `layanan_ekspedisi`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_delivery_type`.`nama_delivery_type` AS `nama_delivery_type` FROM ((((`tbl_pengiriman_barang` join `tbl_unit_kerja` on(`tbl_pengiriman_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_layanan_ekspedisi` on(`tbl_pengiriman_barang`.`id_layanan_ekspedisi` = `tbl_layanan_ekspedisi`.`id_layanan_ekspedisi`)) join `tbl_ekpedisi` on(`tbl_layanan_ekspedisi`.`id_ekspedisi` = `tbl_ekpedisi`.`id_ekpedisi`)) join `tbl_delivery_type` on(`tbl_ekpedisi`.`id_delivery_type` = `tbl_delivery_type`.`id_delivery_type`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_lap_permintaan_barang_project`
--
DROP TABLE IF EXISTS `v_lap_permintaan_barang_project`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_lap_permintaan_barang_project`  AS SELECT `tbl_project`.`id_project` AS `id_project`, `tbl_project`.`tid` AS `tid`, `tbl_pertek`.`id_pertek` AS `id_pertek`, `tbl_pertek`.`tanggal_pertek` AS `tanggal_pertek`, `tbl_pertek`.`nomor_pertek` AS `nomor_pertek`, `tbl_project`.`tgl_spk` AS `tgl_spk`, `tbl_project`.`no_spk` AS `no_spk`, `tbl_project`.`nama_project` AS `nama_project` FROM (((`tbl_pertek` join `tbl_user` on(`tbl_pertek`.`id_user` = `tbl_user`.`id_user`)) join `tbl_project` on(`tbl_pertek`.`id_project` = `tbl_project`.`id_project`)) join `tbl_unit_kerja` on(`tbl_user`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_merek`
--
DROP TABLE IF EXISTS `v_merek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_merek`  AS SELECT `tbl_merek`.`id_merek` AS `id_merek`, `tbl_merek`.`id_sgbarang` AS `id_sgbarang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_merek`.`merek_created_date` AS `merek_created_date`, `tbl_merek`.`merek_created_by` AS `merek_created_by`, `tbl_merek`.`merek_updated_date` AS `merek_updated_date`, `tbl_merek`.`merek_updated_by` AS `merek_updated_by`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang` FROM ((`tbl_gbarang` join `tbl_sgbarang` on(`tbl_gbarang`.`id_gbarang` = `tbl_sgbarang`.`id_gbarang`)) join `tbl_merek` on(`tbl_sgbarang`.`id_sgbarang` = `tbl_merek`.`id_sgbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_monitoringpembayaran`
--
DROP TABLE IF EXISTS `v_monitoringpembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_monitoringpembayaran`  AS SELECT `tbl_permohonan_pem`.`id_permohonan_pem` AS `id_permohonan_pem`, `tbl_invoicebarang`.`no_invoice` AS `no_invoice`, `tbl_po`.`no_po` AS `no_po`, `tbl_invoicebarang`.`nilai_invoice` AS `nilai_invoice`, `tbl_invoicebarang`.`asli_invoice` AS `asli_invoice`, `tbl_invoicebarang`.`asli_pajak` AS `asli_pajak`, `tbl_invoicebarang`.`asli_tandaterima` AS `asli_tandaterima`, `tbl_invoicebarang`.`copy_po` AS `copy_po`, `tbl_invoicebarang`.`copy_ip` AS `copy_ip`, `tbl_invoicebarang`.`asli_ba` AS `asli_ba`, `tbl_invoicebarang`.`dokumen` AS `dokumen`, `tbl_invoicebarang`.`lain_lain` AS `lain_lain`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_po`.`jtempo_pembayaran` AS `jtempo_pembayaran`, `tbl_po`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_po`.`catatan_po` AS `catatan_po`, `tbl_po`.`term_condition` AS `term_condition`, `tbl_po`.`subtotal` AS `subtotal`, `tbl_po`.`subtotal_ppn` AS `subtotal_ppn`, `tbl_po`.`grand_total` AS `grand_total`, `tbl_po`.`file_po` AS `file_po`, `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`id_uker` AS `id_uker`, `tbl_po`.`id_vendor` AS `id_vendor`, `tbl_po`.`id_project` AS `id_project`, `tbl_project`.`tid` AS `tid`, `tbl_project`.`nama_project` AS `nama_project`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_invoicebarang`.`id_invoice` AS `id_invoice` FROM (((((`tbl_permohonan_pem` join `tbl_invoicebarang` on(`tbl_permohonan_pem`.`id_invoice` = `tbl_invoicebarang`.`id_invoice`)) join `tbl_po` on(`tbl_invoicebarang`.`id_po` = `tbl_po`.`id_po`)) join `tbl_project` on(`tbl_po`.`id_project` = `tbl_project`.`id_project`)) join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) join `tbl_unit_kerja` on(`tbl_po`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_monitoring_pembukuan_persedian`
--
DROP TABLE IF EXISTS `v_monitoring_pembukuan_persedian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_monitoring_pembukuan_persedian`  AS SELECT `tbl_pengiriman_barang`.`id_uker` AS `id_uker`, `tbl_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengiriman_barang`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pembukuan`.`status_pembukuan` AS `status_pembukuan`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_pengiriman_barang`.`status_pengiriman` AS `status_pengiriman`, `tbl_pengiriman_barang`.`total_harga` AS `total_harga` FROM (((`tbl_pengiriman_barang` join `tbl_pembukuan` on(`tbl_pengiriman_barang`.`id_pengiriman` = `tbl_pembukuan`.`id_pengiriman`)) join `tbl_unit_kerja` on(`tbl_pengiriman_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_ekpedisi` on(`tbl_pembukuan`.`id_ekpedisi` = `tbl_ekpedisi`.`id_ekpedisi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_monitoring_sparepart`
--
DROP TABLE IF EXISTS `v_monitoring_sparepart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_monitoring_sparepart`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_stock`.`no_sn` AS `no_sn`, `tbl_stock`.`harga_barang` AS `harga_barang` FROM (((((`tbl_stock` join `tbl_barang` on(`tbl_stock`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_merek`) join `tbl_tipe_barang` on(`tbl_merek`.`id_merek` = `tbl_tipe_barang`.`id_merek` and `tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pegawai`
--
DROP TABLE IF EXISTS `v_pegawai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pegawai`  AS SELECT `tbl_user_pegawai`.`id_pegawai` AS `id_pegawai`, `tbl_user_pegawai`.`id_user` AS `id_user`, `tbl_user_pegawai`.`nama_pegawai` AS `nama_pegawai`, `tbl_user_pegawai`.`alamat_pegawai` AS `alamat_pegawai`, `tbl_user_pegawai`.`jk` AS `jk`, `tbl_user_pegawai`.`photo` AS `photo`, `tbl_user_pegawai`.`telp` AS `telp`, `tbl_user_pegawai`.`email` AS `email`, `tbl_user_pegawai`.`pegawai_created_date` AS `pegawai_created_date`, `tbl_user_pegawai`.`pegawai_created_by` AS `pegawai_created_by`, `tbl_user_pegawai`.`pegawai_updated_date` AS `pegawai_updated_date`, `tbl_user_pegawai`.`pegawai_updated_by` AS `pegawai_updated_by`, `tbl_user`.`username` AS `username`, `tbl_user`.`password` AS `password`, `tbl_user`.`id_uker` AS `id_uker` FROM (`tbl_user` join `tbl_user_pegawai` on(`tbl_user`.`id_user` = `tbl_user_pegawai`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembayaranpo`
--
DROP TABLE IF EXISTS `v_pembayaranpo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembayaranpo`  AS SELECT `tbl_po`.`id_po` AS `id_po`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_vendor`.`no_rekening` AS `no_rekening`, `tbl_vendor`.`nama_bank` AS `nama_bank`, `tbl_vendor`.`nama_rekening` AS `nama_rekening`, `tbl_po`.`grand_total` AS `grand_total`, `tbl_po`.`sisa_bayar` AS `sisa_bayar` FROM (`tbl_po` join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembelian_local`
--
DROP TABLE IF EXISTS `v_pembelian_local`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembelian_local`  AS SELECT `tbl_pembelian`.`id_pembelian` AS `id_pembelian`, `tbl_pembelian`.`nomor_pembelian` AS `nomor_pembelian`, `tbl_pembelian`.`tanggal_pembelian` AS `tanggal_pembelian`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_pembelian`.`tempo_pembayaran` AS `tempo_pembayaran`, `tbl_pembelian`.`sub_total` AS `sub_total`, `tbl_pembelian`.`nilai_pajak` AS `nilai_pajak`, `tbl_pembelian`.`total` AS `total`, `tbl_pembelian`.`approvel` AS `approvel`, `tbl_pembelian`.`id_uker` AS `id_uker`, `tbl_pembelian`.`id_vendor` AS `id_vendor`, `tbl_pembelian`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker` FROM ((`tbl_pembelian` join `tbl_unit_kerja` on(`tbl_pembelian`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_vendor` on(`tbl_pembelian`.`id_vendor` = `tbl_vendor`.`id_vendor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembelian_local_det`
--
DROP TABLE IF EXISTS `v_pembelian_local_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembelian_local_det`  AS SELECT `tbl_pembelian_det`.`id_pembelian_det` AS `id_pembelian_det`, `tbl_pembelian_det`.`id_pembelian` AS `id_pembelian`, `tbl_pembelian_det`.`keterangan` AS `keterangan`, `tbl_barang`.`nama_barang` AS `nama_barang` FROM (`tbl_barang` join `tbl_pembelian_det` on(`tbl_barang`.`no_urut` = `tbl_pembelian_det`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembukuan`
--
DROP TABLE IF EXISTS `v_pembukuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembukuan`  AS SELECT `tbl_pemenuhan`.`id_pemenuhan` AS `id_pemenuhan`, `tbl_pemenuhan`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_user`.`username` AS `username`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_stock`.`no_voucher` AS `no_voucher`, `tbl_stock`.`tgl_transaksi` AS `tgl_transaksi`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_pembukuan`.`status_pembukuan` AS `status_pembukuan`, `tbl_pembukuan`.`pembukuan_created_date` AS `pembukuan_created_date`, `tbl_pemenuhan`.`status_pemenuhan` AS `status_pemenuhan`, `tbl_pembukuan`.`id_pembukuan` AS `id_pembukuan`, `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_pembukuan`.`tanggal_pembukuan` AS `tanggal_pembukuan` FROM ((((`tbl_pemenuhan` join `tbl_user` on(`tbl_pemenuhan`.`id_user` = `tbl_user`.`id_user`)) join `tbl_unit_kerja` on(`tbl_user`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_stock` on(`tbl_pemenuhan`.`id_stock` = `tbl_stock`.`id_stock`)) join `tbl_pembukuan` on(`tbl_pemenuhan`.`id_pemenuhan` = `tbl_pembukuan`.`id_pemenuhan` and `tbl_stock`.`id_stock` = `tbl_pembukuan`.`id_stock`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pembukuan_det`
--
DROP TABLE IF EXISTS `v_pembukuan_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pembukuan_det`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_pemenuhan_det`.`harga_satuan` AS `harga_satuan`, `tbl_pemenuhan_det`.`id_pemenuhan` AS `id_pemenuhan`, `tbl_pemenuhan_det`.`status_pembukuan` AS `status_pembukuan`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_merek`.`id_merek` AS `id_merek`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang` FROM (((((`tbl_pemenuhan_det` join `tbl_barang` on(`tbl_pemenuhan_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemenuhan`
--
DROP TABLE IF EXISTS `v_pemenuhan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemenuhan`  AS SELECT `tbl_pemenuhan`.`id_pemenuhan` AS `id_pemenuhan`, `tbl_pemenuhan`.`id_user` AS `id_user`, `tbl_pemenuhan`.`id_project` AS `id_project`, `tbl_pemenuhan`.`no_urut` AS `no_urut`, `tbl_pemenuhan`.`id_stock` AS `id_stock`, `tbl_pemenuhan`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_pemenuhan`.`status_pemenuhan` AS `status_pemenuhan`, `tbl_pemenuhan`.`keterangan` AS `keterangan`, `tbl_user`.`username` AS `username`, `tbl_project`.`tid` AS `tid`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_stock`.`no_sn` AS `no_sn` FROM ((((`tbl_pemenuhan` join `tbl_user` on(`tbl_pemenuhan`.`id_user` = `tbl_user`.`id_user`)) join `tbl_project` on(`tbl_pemenuhan`.`id_project` = `tbl_project`.`id_project`)) join `tbl_barang` on(`tbl_pemenuhan`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_stock` on(`tbl_pemenuhan`.`id_stock` = `tbl_stock`.`id_stock`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemenuhan_barang_det`
--
DROP TABLE IF EXISTS `v_pemenuhan_barang_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemenuhan_barang_det`  AS SELECT `tbl_permintaan_barang_det`.`id_permintaan_det` AS `id_permintaan_det`, `tbl_permintaan_barang_det`.`id_permintaan` AS `id_permintaan`, `tbl_permintaan_barang_det`.`no_urut` AS `no_urut`, `tbl_permintaan_barang_det`.`qty` AS `qty`, `tbl_permintaan_barang_det`.`keterangan` AS `keterangan`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_permintaan_barang_det`.`harga_barang` AS `harga_barang`, `tbl_permintaan_barang_det`.`kondisi_barang` AS `kondisi_barang`, `tbl_permintaan_barang_det`.`status_pemenuhan` AS `status_pemenuhan`, `tbl_permintaan_barang_det`.`no_sn` AS `no_sn` FROM (`tbl_permintaan_barang_det` join `tbl_barang` on(`tbl_permintaan_barang_det`.`no_urut` = `tbl_barang`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemenuhan_barcab`
--
DROP TABLE IF EXISTS `v_pemenuhan_barcab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemenuhan_barcab`  AS SELECT `tbl_permintaan_barang`.`id_permintaan` AS `id_permintaan`, `tbl_permintaan_barang`.`id_uker` AS `id_uker`, `tbl_permintaan_barang`.`dari_uker` AS `dari_uker`, `tbl_permintaan_barang`.`tgl_permintaan` AS `tgl_permintaan`, `tbl_permintaan_barang`.`no_permintaan` AS `no_permintaan`, `tbl_permintaan_barang`.`alasan_permintaan` AS `alasan_permintaan`, `tbl_permintaan_barang`.`catatan_permintaan` AS `catatan_permintaan`, `tbl_permintaan_barang`.`status_permintaan` AS `status_permintaan`, `tbl_permintaan_barang`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_permintaan_barang`.`jumlah_koil` AS `jumlah_koil` FROM (`tbl_permintaan_barang` join `tbl_unit_kerja` on(`tbl_permintaan_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemenuhan_det`
--
DROP TABLE IF EXISTS `v_pemenuhan_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemenuhan_det`  AS SELECT `tbl_pemenuhan_det`.`id_pemenuhan_det` AS `id_pemenuhan_det`, `tbl_pemenuhan_det`.`id_pemenuhan` AS `id_pemenuhan`, `tbl_pemenuhan_det`.`qty` AS `qty`, `tbl_pemenuhan_det`.`harga_satuan` AS `harga_satuan`, `tbl_pemenuhan_det`.`totalppn` AS `totalppn`, `tbl_pemenuhan_det`.`total` AS `total`, `tbl_pemenuhan_det`.`keterangan` AS `keterangan`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_merek`.`nama_merek` AS `nama_merek` FROM (((`tbl_pemenuhan_det` join `tbl_barang` on(`tbl_pemenuhan_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pempengsparekancab`
--
DROP TABLE IF EXISTS `v_pempengsparekancab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pempengsparekancab`  AS SELECT `tbl_pembukuan`.`status_pembukuan` AS `status_pembukuan`, `tbl_stock`.`no_voucher` AS `no_voucher`, `tbl_stock`.`tgl_transaksi` AS `tgl_transaksi`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_pemenuhan`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_pembukuan`.`id_pembukuan` AS `id_pembukuan`, `tbl_stock`.`id_stock` AS `id_stock`, `tbl_pemenuhan`.`id_pemenuhan` AS `id_pemenuhan`, `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_user`.`id_user` AS `id_user`, `tbl_user`.`username` AS `username` FROM ((((`tbl_stock` join `tbl_pembukuan` on(`tbl_stock`.`id_stock` = `tbl_pembukuan`.`id_stock`)) join `tbl_pemenuhan` on(`tbl_pembukuan`.`id_pemenuhan` = `tbl_pemenuhan`.`id_pemenuhan`)) join `tbl_user` on(`tbl_pemenuhan`.`id_user` = `tbl_user`.`id_user`)) join `tbl_unit_kerja` on(`tbl_user`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pempengsparekancab_det`
--
DROP TABLE IF EXISTS `v_pempengsparekancab_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pempengsparekancab_det`  AS SELECT `tbl_pembukuan_det`.`id_pembukuan_det` AS `id_pembukuan_det`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_stock`.`no_sn` AS `no_sn`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_pembukuan`.`id_pembukuan` AS `id_pembukuan` FROM (((((((`tbl_pembukuan_det` join `tbl_stock` on(`tbl_pembukuan_det`.`id_stock` = `tbl_stock`.`id_stock`)) join `tbl_barang` on(`tbl_pembukuan_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_gbarang` on(`tbl_pembukuan_det`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_pembukuan` on(`tbl_stock`.`id_stock` = `tbl_pembukuan`.`id_stock`)) join `tbl_sgbarang` on(`tbl_pembukuan_det`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_merek` on(`tbl_pembukuan_det`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pencarianbarang`
--
DROP TABLE IF EXISTS `v_pencarianbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pencarianbarang`  AS SELECT `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang` FROM (((`tbl_tipe_barang` join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_sgbarang`.`id_sgbarang` = `tbl_merek`.`id_sgbarang`)) join `tbl_barang` on(`tbl_tipe_barang`.`id_tipe_barang` = `tbl_barang`.`id_tipe_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_penerimaan`
--
DROP TABLE IF EXISTS `v_penerimaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penerimaan`  AS SELECT `tbl_pemenuhan`.`id_pemenuhan` AS `id_pemenuhan`, `tbl_pemenuhan`.`status_pemenuhan` AS `status_pemenuhan`, `tbl_pemenuhan`.`keterangan` AS `keterangan`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_user`.`username` AS `username`, `tbl_project`.`tid` AS `tid`, `tbl_stock`.`no_sn` AS `no_sn`, `tbl_stock`.`flag_barang` AS `flag_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_stock`.`tgl_transaksi` AS `tgl_transaksi`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_stock`.`flag_pakai` AS `flag_pakai`, `tbl_pemenuhan`.`status_balik` AS `status_balik` FROM ((((((((`tbl_pemenuhan` join `tbl_barang` on(`tbl_pemenuhan`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_user` on(`tbl_pemenuhan`.`id_user` = `tbl_user`.`id_user`)) join `tbl_project` on(`tbl_pemenuhan`.`id_project` = `tbl_project`.`id_project`)) join `tbl_stock` on(`tbl_pemenuhan`.`id_stock` = `tbl_stock`.`id_stock`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_penerimaanbarangkp`
--
DROP TABLE IF EXISTS `v_penerimaanbarangkp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penerimaanbarangkp`  AS SELECT `tbl_pengirimankekp`.`no_permintaan` AS `no_permintaan`, `tbl_pengirimankekp`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengirimankekp`.`pengiriman_created_by` AS `pengiriman_created_by`, `tbl_pengirimankekp`.`status_pengiriman` AS `status_pengiriman`, `tbl_pengirimankekp`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengirimankekp`.`id_pengirimankekp` AS `id_pengirimankekp`, `tbl_pengirimankekp`.`tanggal_penerimaan` AS `tanggal_penerimaan` FROM `tbl_pengirimankekp` ;

-- --------------------------------------------------------

--
-- Structure for view `v_penerimaan_barang_dari_cabang`
--
DROP TABLE IF EXISTS `v_penerimaan_barang_dari_cabang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penerimaan_barang_dari_cabang`  AS SELECT `tbl_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang`.`id_uker` AS `id_uker`, `tbl_pengiriman_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengiriman_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_pengiriman_barang`.`no_pengiriman` AS `no_pengiriman`, `tbl_pengiriman_barang`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengiriman_barang`.`no_resi` AS `no_resi`, `tbl_pengiriman_barang`.`jumlah_koli` AS `jumlah_koli`, `tbl_pengiriman_barang`.`berat_barang` AS `berat_barang`, `tbl_pengiriman_barang`.`nama_pengirim` AS `nama_pengirim`, `tbl_pengiriman_barang`.`total_harga` AS `total_harga`, `tbl_pengiriman_barang`.`status_pengiriman` AS `status_pengiriman`, `tbl_pengiriman_barang`.`status_cek` AS `status_cek`, `tbl_pengiriman_barang`.`pengiriman_created_date` AS `pengiriman_created_date`, `tbl_pengiriman_barang`.`pengiriman_created_by` AS `pengiriman_created_by`, `tbl_pengiriman_barang`.`pengiriman_update_date` AS `pengiriman_update_date`, `tbl_pengiriman_barang`.`pengiriman_update_by` AS `pengiriman_update_by`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_pengiriman_barang_det`.`id_pengiriman_det` AS `id_pengiriman_det`, `tbl_pengiriman_barang_det`.`no_urut` AS `no_urut`, `tbl_pengiriman_barang_det`.`koli_ke` AS `koli_ke`, `tbl_pengiriman_barang_det`.`berat_koli` AS `berat_koli`, `tbl_pengiriman_barang_det`.`keterangan` AS `keterangan`, `tbl_pengiriman_barang_det`.`pengiriman_det_created_date` AS `pengiriman_det_created_date`, `tbl_pengiriman_barang_det`.`pengiriman_det_created_by` AS `pengiriman_det_created_by`, `tbl_pengiriman_barang_det`.`pengiriman_det_update_by` AS `pengiriman_det_update_by`, `tbl_pengiriman_barang_det`.`pengiriman_det_update_date` AS `pengiriman_det_update_date`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi` FROM ((((`tbl_pengiriman_barang` join `tbl_pengiriman_barang_det` on(`tbl_pengiriman_barang`.`id_pengiriman` = `tbl_pengiriman_barang_det`.`id_pengiriman`)) join `tbl_unit_kerja` on(`tbl_pengiriman_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_layanan_ekspedisi` on(`tbl_pengiriman_barang`.`id_layanan_ekspedisi` = `tbl_layanan_ekspedisi`.`id_layanan_ekspedisi`)) join `tbl_ekpedisi` on(`tbl_layanan_ekspedisi`.`id_ekspedisi` = `tbl_ekpedisi`.`id_ekpedisi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengbartek`
--
DROP TABLE IF EXISTS `v_pengbartek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengbartek`  AS SELECT `tbl_pertek`.`nomor_pertek` AS `nomor_pertek`, `tbl_pertek`.`tanggal_pertek` AS `tanggal_pertek`, `tbl_user`.`username` AS `username`, `tbl_project`.`tid` AS `tid`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_barang_temp`.`no_sn` AS `no_sn` FROM (((`tbl_pertek` join `tbl_project` on(`tbl_pertek`.`id_project` = `tbl_project`.`id_project`)) join `tbl_user` on(`tbl_pertek`.`id_user` = `tbl_user`.`id_user`)) join (((((`tbl_sgbarang` join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_merek` on(`tbl_sgbarang`.`id_sgbarang` = `tbl_merek`.`id_sgbarang`)) join `tbl_tipe_barang` on(`tbl_merek`.`id_merek` = `tbl_tipe_barang`.`id_merek`)) join `tbl_barang` on(`tbl_tipe_barang`.`id_tipe_barang` = `tbl_barang`.`id_tipe_barang`)) join `tbl_barang_temp` on(`tbl_barang`.`no_urut` = `tbl_barang_temp`.`no_urut`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengelolaanmesin`
--
DROP TABLE IF EXISTS `v_pengelolaanmesin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengelolaanmesin`  AS SELECT `tbl_pengelolaan_mesin`.`id_det_project` AS `id_det_project`, `tbl_pengelolaan_mesin`.`id_project` AS `id_project`, `tbl_pengelolaan_mesin`.`id_uker` AS `id_uker`, `tbl_pengelolaan_mesin`.`lokasi` AS `lokasi`, `tbl_pengelolaan_mesin`.`db` AS `db`, `tbl_pengelolaan_mesin`.`merek` AS `merek`, `tbl_pengelolaan_mesin`.`tipe` AS `tipe`, `tbl_project`.`nama_project` AS `nama_project`, `tbl_project`.`tid` AS `tid`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker` FROM ((`tbl_pengelolaan_mesin` join `tbl_project` on(`tbl_pengelolaan_mesin`.`id_project` = `tbl_project`.`id_project`)) join `tbl_unit_kerja` on(`tbl_pengelolaan_mesin`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengirimankekp`
--
DROP TABLE IF EXISTS `v_pengirimankekp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengirimankekp`  AS SELECT `tbl_pengirimankekp`.`no_permintaan` AS `no_permintaan`, `tbl_pengirimankekp`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengirimankekp`.`tanggal_penerimaan` AS `tanggal_penerimaan`, `tbl_pengirimankekp`.`jumlah_permintaan` AS `jumlah_permintaan`, `tbl_pengirimankekp`.`jumlah_pemenuhan` AS `jumlah_pemenuhan`, `tbl_pengirimankekp`.`sisa` AS `sisa`, `tbl_pengirimankekp`.`estimasi` AS `estimasi`, `tbl_pengirimankekp`.`id_delivery_type` AS `id_delivery_type`, `tbl_pengirimankekp`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengirimankekp`.`id_uker` AS `id_uker`, `tbl_pengirimankekp`.`j_koli` AS `j_koli`, `tbl_pengirimankekp`.`no_resi` AS `no_resi`, `tbl_pengirimankekp`.`nama_pengirim` AS `nama_pengirim`, `tbl_pengirimankekp`.`berat_barang` AS `berat_barang`, `tbl_pengirimankekp_det`.`id_pengkekp_det` AS `id_pengkekp_det`, `tbl_pengirimankekp_det`.`id_pengirimankekp` AS `id_pengirimankekp`, `tbl_pengirimankekp_det`.`no_urut` AS `no_urut`, `tbl_pengirimankekp_det`.`no_sn` AS `no_sn`, `tbl_pengirimankekp_det`.`harga_barang` AS `harga_barang`, `tbl_pengirimankekp_det`.`kondisi_barang` AS `kondisi_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_perbaikankcsp`.`status_perbaikan` AS `status_perbaikan` FROM (((`tbl_pengirimankekp` join `tbl_pengirimankekp_det` on(`tbl_pengirimankekp`.`id_pengirimankekp` = `tbl_pengirimankekp_det`.`id_pengirimankekp`)) join `tbl_barang` on(`tbl_pengirimankekp_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_perbaikankcsp` on(`tbl_pengirimankekp_det`.`id_pengkekp_det` = `tbl_perbaikankcsp`.`id_pengkekp_det`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengirimankpkc`
--
DROP TABLE IF EXISTS `v_pengirimankpkc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengirimankpkc`  AS SELECT `tbl_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang`.`no_pengiriman` AS `no_pengiriman`, `tbl_pengiriman_barang`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengiriman_barang`.`id_uker` AS `id_uker`, `tbl_pengiriman_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengiriman_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_pengiriman_barang_det`.`id_pengiriman_det` AS `id_pengiriman_det`, `tbl_pengiriman_barang_det`.`no_urut` AS `no_urut`, `tbl_pengiriman_barang_det`.`status_pemenuhan` AS `status_pemenuhan`, `tbl_pengiriman_barang`.`status_pengiriman` AS `status_pengiriman`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_layanan_ekspedisi`.`layanan_ekspedisi` AS `layanan_ekspedisi`, `tbl_delivery_type`.`nama_delivery_type` AS `nama_delivery_type`, `tbl_delivery_type`.`id_delivery_type` AS `id_delivery_type`, `tbl_pengiriman_barang`.`pengiriman_created_by` AS `pengiriman_created_by`, `tbl_pengiriman_barang`.`jumlah_koli` AS `jumlah_koli`, `tbl_pengiriman_barang`.`estimasi` AS `estimasi` FROM (((`tbl_ekpedisi` join `tbl_layanan_ekspedisi` on(`tbl_ekpedisi`.`id_ekpedisi` = `tbl_layanan_ekspedisi`.`id_ekspedisi`)) join (`tbl_pengiriman_barang` join `tbl_pengiriman_barang_det` on(`tbl_pengiriman_barang`.`id_pengiriman` = `tbl_pengiriman_barang_det`.`id_pengiriman`)) on(`tbl_pengiriman_barang`.`id_layanan_ekspedisi` = `tbl_layanan_ekspedisi`.`id_layanan_ekspedisi`)) join `tbl_delivery_type` on(`tbl_ekpedisi`.`id_delivery_type` = `tbl_delivery_type`.`id_delivery_type`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengiriman_barang`
--
DROP TABLE IF EXISTS `v_pengiriman_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengiriman_barang`  AS SELECT `tbl_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang`.`id_uker` AS `id_uker`, `tbl_pengiriman_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengiriman_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_pengiriman_barang`.`no_pengiriman` AS `no_pengiriman`, `tbl_pengiriman_barang`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengiriman_barang`.`no_resi` AS `no_resi`, `tbl_pengiriman_barang`.`jumlah_koli` AS `jumlah_koli`, `tbl_pengiriman_barang`.`berat_barang` AS `berat_barang`, `tbl_pengiriman_barang`.`nama_pengirim` AS `nama_pengirim`, `tbl_pengiriman_barang`.`total_harga` AS `total_harga`, `tbl_pengiriman_barang`.`pengiriman_created_date` AS `pengiriman_created_date`, `tbl_pengiriman_barang`.`pengiriman_created_by` AS `pengiriman_created_by`, `tbl_pengiriman_barang`.`pengiriman_update_date` AS `pengiriman_update_date`, `tbl_pengiriman_barang`.`pengiriman_update_by` AS `pengiriman_update_by`, `tbl_layanan_ekspedisi`.`layanan_ekspedisi` AS `layanan_ekspedisi`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_delivery_type`.`nama_delivery_type` AS `nama_delivery_type`, `tbl_pengiriman_barang`.`status_pengiriman` AS `status_pengiriman`, `tbl_pengiriman_barang`.`estimasi` AS `estimasi`, `tbl_pengiriman_barang`.`keterangan` AS `keterangan`, `tbl_pengiriman_barang`.`tanggal_penerimaan` AS `tanggal_penerimaan`, `tbl_unit_kerja`.`alamat_uker` AS `alamat_uker` FROM ((((`tbl_layanan_ekspedisi` join `tbl_pengiriman_barang` on(`tbl_pengiriman_barang`.`id_layanan_ekspedisi` = `tbl_layanan_ekspedisi`.`id_layanan_ekspedisi`)) join `tbl_unit_kerja` on(`tbl_pengiriman_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_ekpedisi` on(`tbl_layanan_ekspedisi`.`id_ekspedisi` = `tbl_ekpedisi`.`id_ekpedisi`)) join `tbl_delivery_type` on(`tbl_ekpedisi`.`id_delivery_type` = `tbl_delivery_type`.`id_delivery_type`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengiriman_barang_detail`
--
DROP TABLE IF EXISTS `v_pengiriman_barang_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengiriman_barang_detail`  AS SELECT `tbl_pengiriman_barang_det`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang_det`.`id_pengiriman_det` AS `id_pengiriman_det`, `tbl_pengiriman_barang_det`.`no_urut` AS `no_urut`, `tbl_pengiriman_barang_det`.`no_sn` AS `no_sn`, `tbl_pengiriman_barang_det`.`harga_barang` AS `harga_barang`, `tbl_pengiriman_barang_det`.`keterangan` AS `keterangan`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang` FROM ((`tbl_pengiriman_barang` join `tbl_pengiriman_barang_det` on(`tbl_pengiriman_barang`.`id_pengiriman` = `tbl_pengiriman_barang_det`.`id_pengiriman`)) join `tbl_barang` on(`tbl_pengiriman_barang_det`.`no_urut` = `tbl_barang`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_perbaikan`
--
DROP TABLE IF EXISTS `v_perbaikan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_perbaikan`  AS SELECT `tbl_perbaikan`.`id_perbaikanbarang` AS `id_perbaikanbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_perbaikan`.`catatan_perbaikan` AS `catatan_perbaikan`, `tbl_perbaikan`.`stat_perbaikan` AS `stat_perbaikan`, `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_merek`.`id_merek` AS `id_merek`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_perbaikan`.`tanggal_perbaikan` AS `tanggal_perbaikan` FROM (((((`tbl_perbaikan` join `tbl_sgbarang` on(`tbl_perbaikan`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_barang` on(`tbl_perbaikan`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_perbaikankcsp`
--
DROP TABLE IF EXISTS `v_perbaikankcsp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_perbaikankcsp`  AS SELECT `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_pengirimankekp_det`.`no_sn` AS `no_sn`, `tbl_perbaikankcsp`.`catatan_perbaikan` AS `catatan_perbaikan`, `tbl_perbaikankcsp`.`status_perbaikan` AS `status_perbaikan`, `tbl_perbaikankcsp`.`id_perbaikankcsp` AS `id_perbaikankcsp`, `tbl_perbaikankcsp`.`id_pengkekp_det` AS `id_pengkekp_det`, `tbl_pengirimankekp_det`.`id_pengirimankekp` AS `id_pengirimankekp`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_merek`.`id_merek` AS `id_merek`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_pengirimankekp`.`no_permintaan` AS `no_permintaan`, `tbl_perbaikankcsp`.`tanggal_perbaikan` AS `tanggal_perbaikan`, `tbl_pengirimankekp_det`.`harga_barang` AS `harga_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_pengirimankekp_det`.`kondisi_barang` AS `kondisi_barang`, `tbl_perbaikankcsp`.`status_ph` AS `status_ph`, `tbl_perbaikankcsp`.`status_pembukuan` AS `status_pembukuan`, `tbl_satuan`.`nama_satuan` AS `nama_satuan`, `tbl_pengirimankekp`.`tanggal_pengiriman` AS `tanggal_pengiriman` FROM ((((((((`tbl_pengirimankekp_det` join `tbl_barang` on(`tbl_pengirimankekp_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_perbaikankcsp` on(`tbl_pengirimankekp_det`.`id_pengkekp_det` = `tbl_perbaikankcsp`.`id_pengkekp_det`)) join `tbl_pengirimankekp` on(`tbl_pengirimankekp_det`.`id_pengirimankekp` = `tbl_pengirimankekp`.`id_pengirimankekp`)) join `tbl_satuan` on(`tbl_barang`.`id_satuan` = `tbl_satuan`.`id_satuan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_permintaan_barang`
--
DROP TABLE IF EXISTS `v_permintaan_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_permintaan_barang`  AS SELECT `tbl_permintaan_barang`.`id_permintaan` AS `id_permintaan`, `tbl_permintaan_barang`.`id_uker` AS `id_uker`, `tbl_permintaan_barang`.`tgl_permintaan` AS `tgl_permintaan`, `tbl_permintaan_barang`.`no_permintaan` AS `no_permintaan`, `tbl_permintaan_barang`.`alasan_permintaan` AS `alasan_permintaan`, `tbl_permintaan_barang`.`catatan_permintaan` AS `catatan_permintaan`, `tbl_permintaan_barang`.`status_permintaan` AS `status_permintaan`, `tbl_permintaan_barang`.`tempo_barang` AS `tempo_barang`, `tbl_permintaan_barang`.`sla` AS `sla`, `tbl_permintaan_barang`.`pinca_approv` AS `pinca_approv`, `tbl_permintaan_barang`.`tgl_approve_pinca` AS `tgl_approve_pinca`, `tbl_permintaan_barang`.`permintaan_barang_created_date` AS `permintaan_barang_created_date`, `tbl_permintaan_barang`.`permintaan_barang_created_by` AS `permintaan_barang_created_by`, `tbl_permintaan_barang`.`permintaan_barang_updated_date` AS `permintaan_barang_updated_date`, `tbl_permintaan_barang`.`permintaan_barang_updated_by` AS `permintaan_barang_updated_by`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_permintaan_barang`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_permintaan_barang`.`id_delivery_type` AS `id_delivery_type`, `tbl_permintaan_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_permintaan_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_permintaan_barang`.`jumlah_koil` AS `jumlah_koil` FROM (`tbl_permintaan_barang` join `tbl_unit_kerja` on(`tbl_permintaan_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_permintaan_barang_det`
--
DROP TABLE IF EXISTS `v_permintaan_barang_det`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_permintaan_barang_det`  AS SELECT `tbl_permintaan_barang_det`.`id_permintaan_det` AS `id_permintaan_det`, `tbl_permintaan_barang_det`.`id_permintaan` AS `id_permintaan`, `tbl_permintaan_barang_det`.`no_urut` AS `no_urut`, `tbl_permintaan_barang_det`.`qty` AS `qty`, `tbl_permintaan_barang_det`.`keterangan` AS `keterangan`, `tbl_permintaan_barang_det`.`permintaan_det_created_date` AS `permintaan_det_created_date`, `tbl_permintaan_barang_det`.`permintaan_det_created_by` AS `permintaan_det_created_by`, `tbl_permintaan_barang_det`.`permintaan_det_updated_date` AS `permintaan_det_updated_date`, `tbl_permintaan_barang_det`.`permintaan_det_updated_by` AS `permintaan_det_updated_by`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_permintaan_barang_det`.`no_sn` AS `no_sn`, `tbl_permintaan_barang_det`.`harga_barang` AS `harga_barang`, `tbl_permintaan_barang_det`.`kondisi_barang` AS `kondisi_barang`, `tbl_permintaan_barang_det`.`status_pemenuhan` AS `status_pemenuhan` FROM (((`tbl_barang` join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_permintaan_barang_det` on(`tbl_permintaan_barang_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_permohonan_pem`
--
DROP TABLE IF EXISTS `v_permohonan_pem`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_permohonan_pem`  AS SELECT `tbl_invoicebarang`.`id_invoice` AS `id_invoice`, `tbl_invoicebarang`.`no_invoice` AS `no_invoice`, `tbl_invoicebarang`.`nilai_invoice` AS `nilai_invoice`, `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`no_po` AS `no_po`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_permohonan_pem`.`id_permohonan_pem` AS `id_permohonan_pem`, `tbl_permohonan_pem`.`no_permohonan_pem` AS `no_permohonan_pem`, `tbl_permohonan_pem`.`pinca_approvel` AS `pinca_approvel`, `tbl_po`.`subtotal` AS `subtotal`, `tbl_po`.`subtotal_ppn` AS `subtotal_ppn`, `tbl_po`.`grand_total` AS `grand_total`, `tbl_invoicebarang`.`tanggal_invoice` AS `tanggal_invoice`, `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_vendor`.`id_vendor` AS `id_vendor`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_po`.`status_po` AS `status_po`, `tbl_po`.`jtempo_pembayaran` AS `jtempo_pembayaran`, `tbl_invoicebarang`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_po`.`flag_pembayaran` AS `flag_pembayaran`, `tbl_po`.`flag_pembukuan` AS `flag_pembukuan`, `tbl_po`.`status_invoice` AS `status_invoice`, `tbl_vendor`.`no_rekening` AS `no_rekening`, `tbl_vendor`.`nama_rekening` AS `nama_rekening`, `tbl_vendor`.`nama_bank` AS `nama_bank`, `tbl_invoicebarang`.`beban` AS `beban`, `tbl_invoicebarang`.`tahap_tagihan` AS `tahap_tagihan`, `tbl_invoicebarang`.`asli_invoice` AS `asli_invoice`, `tbl_invoicebarang`.`asli_pajak` AS `asli_pajak`, `tbl_invoicebarang`.`asli_tandaterima` AS `asli_tandaterima`, `tbl_invoicebarang`.`copy_po` AS `copy_po`, `tbl_invoicebarang`.`copy_ip` AS `copy_ip`, `tbl_invoicebarang`.`asli_ba` AS `asli_ba`, `tbl_invoicebarang`.`dokumen` AS `dokumen`, `tbl_invoicebarang`.`lain_lain` AS `lain_lain` FROM ((((`tbl_po` join `tbl_invoicebarang` on(`tbl_po`.`id_po` = `tbl_invoicebarang`.`id_po`)) join `tbl_permohonan_pem` on(`tbl_invoicebarang`.`id_invoice` = `tbl_permohonan_pem`.`id_invoice`)) join `tbl_unit_kerja` on(`tbl_po`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_permohonan_pembayaran_eks`
--
DROP TABLE IF EXISTS `v_permohonan_pembayaran_eks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_permohonan_pembayaran_eks`  AS SELECT `tbl_layanan_ekspedisi`.`layanan_ekspedisi` AS `layanan_ekspedisi`, `tbl_pengiriman_barang`.`id_pengiriman` AS `id_pengiriman`, `tbl_pengiriman_barang`.`id_uker` AS `id_uker`, `tbl_pengiriman_barang`.`id_ekpedisi` AS `id_ekpedisi`, `tbl_pengiriman_barang`.`id_layanan_ekspedisi` AS `id_layanan_ekspedisi`, `tbl_pengiriman_barang`.`no_pengiriman` AS `no_pengiriman`, `tbl_pengiriman_barang`.`tanggal_pengiriman` AS `tanggal_pengiriman`, `tbl_pengiriman_barang`.`no_resi` AS `no_resi`, `tbl_pengiriman_barang`.`jumlah_koli` AS `jumlah_koli`, `tbl_pengiriman_barang`.`berat_barang` AS `berat_barang`, `tbl_pengiriman_barang`.`nama_pengirim` AS `nama_pengirim`, `tbl_pengiriman_barang`.`total_harga` AS `total_harga`, `tbl_pengiriman_barang`.`status_pengiriman` AS `status_pengiriman`, `tbl_pengiriman_barang`.`pengiriman_created_date` AS `pengiriman_created_date`, `tbl_pengiriman_barang`.`pengiriman_created_by` AS `pengiriman_created_by`, `tbl_pengiriman_barang`.`pengiriman_update_date` AS `pengiriman_update_date`, `tbl_pengiriman_barang`.`pengiriman_update_by` AS `pengiriman_update_by`, `tbl_ekpedisi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_delivery_type`.`nama_delivery_type` AS `nama_delivery_type`, `tbl_pengiriman_barang`.`status_cek` AS `status_cek` FROM ((((`tbl_layanan_ekspedisi` join `tbl_pengiriman_barang` on(`tbl_layanan_ekspedisi`.`id_layanan_ekspedisi` = `tbl_pengiriman_barang`.`id_layanan_ekspedisi`)) join `tbl_ekpedisi` on(`tbl_layanan_ekspedisi`.`id_ekspedisi` = `tbl_ekpedisi`.`id_ekpedisi`)) join `tbl_unit_kerja` on(`tbl_pengiriman_barang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_delivery_type` on(`tbl_ekpedisi`.`id_delivery_type` = `tbl_delivery_type`.`id_delivery_type`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pertekdet`
--
DROP TABLE IF EXISTS `v_pertekdet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pertekdet`  AS SELECT `tbl_pertek_det`.`id_pertek` AS `id_pertek`, `tbl_pertek_det`.`no_urut` AS `no_urut`, `tbl_pertek_det`.`qty` AS `qty`, `tbl_pertek_det`.`keterangan` AS `keterangan`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_pertek_det`.`harga_satuan` AS `harga_satuan`, `tbl_pertek_det`.`totalppn` AS `totalppn`, `tbl_pertek_det`.`no_sn_new` AS `no_sn_new`, `tbl_pertek_det`.`id_pertek_det` AS `id_pertek_det`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_merek`.`id_merek` AS `id_merek`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang` FROM (((((`tbl_pertek_det` join `tbl_barang` on(`tbl_pertek_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pertekhed`
--
DROP TABLE IF EXISTS `v_pertekhed`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pertekhed`  AS SELECT `tbl_pertek`.`id_pertek` AS `id_pertek`, `tbl_pertek`.`id_user` AS `id_user`, `tbl_pertek`.`id_project` AS `id_project`, `tbl_pertek`.`nomor_pertek` AS `nomor_pertek`, `tbl_pertek`.`tanggal_pertek` AS `tanggal_pertek`, `tbl_pertek`.`status_pertek` AS `status_pertek`, `tbl_pertek`.`keterangan` AS `keterangan`, `tbl_user`.`username` AS `username`, `tbl_project`.`tid` AS `tid`, `tbl_pertek`.`pinca_appovel` AS `pinca_appovel`, `tbl_pertek`.`leader_approvel` AS `leader_approvel`, `tbl_project`.`nama_project` AS `nama_project`, `tbl_pertek`.`tanggal_pemenuhan` AS `tanggal_pemenuhan`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_pertek`.`status_pembukuan` AS `status_pembukuan`, `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_pertek`.`tanggal_pembukuan` AS `tanggal_pembukuan`, `tbl_pertek`.`no_voucher` AS `no_voucher` FROM (((`tbl_pertek` join `tbl_user` on(`tbl_pertek`.`id_user` = `tbl_user`.`id_user`)) join `tbl_project` on(`tbl_pertek`.`id_project` = `tbl_project`.`id_project`)) join `tbl_unit_kerja` on(`tbl_user`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_podet`
--
DROP TABLE IF EXISTS `v_podet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_podet`  AS SELECT `tbl_po_det`.`id_po_det` AS `id_po_det`, `tbl_po_det`.`id_po` AS `id_po`, `tbl_po_det`.`no_urut` AS `no_urut`, `tbl_po_det`.`qty` AS `qty`, `tbl_po_det`.`harga_satuan` AS `harga_satuan`, `tbl_po_det`.`total_ppn` AS `total_ppn`, `tbl_po_det`.`total` AS `total`, `tbl_po_det`.`keterangan` AS `keterangan`, `tbl_po_det`.`podet_created_date` AS `podet_created_date`, `tbl_po_det`.`podet_created_by` AS `podet_created_by`, `tbl_po_det`.`podet_updated_date` AS `podet_updated_date`, `tbl_po_det`.`podet_updated_by` AS `podet_updated_by`, `tbl_po`.`no_po` AS `no_po`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_po_det`.`id_det_currency` AS `id_det_currency`, `tbl_det_currency`.`id_currency` AS `id_currency`, `tbl_det_currency`.`tgl_kurs` AS `tgl_kurs`, `tbl_det_currency`.`rupiah` AS `rupiah`, `tbl_det_currency`.`keterangan` AS `Detcurr`, `tbl_currency`.`kode_currency` AS `kode_currency`, `tbl_currency`.`nama_currency` AS `nama_currency` FROM (((((`tbl_po_det` join `tbl_po` on(`tbl_po_det`.`id_po` = `tbl_po`.`id_po`)) join `tbl_barang` on(`tbl_po_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_det_currency` on(`tbl_po_det`.`id_det_currency` = `tbl_det_currency`.`id_det_currency`)) join `tbl_currency` on(`tbl_det_currency`.`id_currency` = `tbl_currency`.`id_currency`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pohead`
--
DROP TABLE IF EXISTS `v_pohead`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pohead`  AS SELECT `tbl_po`.`id_po` AS `id_po`, `tbl_po`.`id_uker` AS `id_uker`, `tbl_po`.`id_vendor` AS `id_vendor`, `tbl_po`.`id_project` AS `id_project`, `tbl_po`.`no_po` AS `no_po`, `tbl_po`.`tanggal_po` AS `tanggal_po`, `tbl_po`.`kontak_person_po` AS `kontak_person_po`, `tbl_po`.`nama_kontak_po` AS `nama_kontak_po`, `tbl_po`.`jenis_pembayaran` AS `jenis_pembayaran`, `tbl_po`.`jtempo_pembayaran` AS `jtempo_pembayaran`, `tbl_po`.`jtempo_pemenuhan` AS `jtempo_pemenuhan`, `tbl_po`.`catatan_po` AS `catatan_po`, `tbl_po`.`term_condition` AS `term_condition`, `tbl_po`.`subtotal` AS `subtotal`, `tbl_po`.`grand_total` AS `grand_total`, `tbl_po`.`file_po` AS `file_po`, `tbl_po`.`status_po` AS `status_po`, `tbl_po`.`kadiv_approv` AS `kadiv_approv`, `tbl_po`.`wakadiv_approv` AS `wakadiv_approv`, `tbl_po`.`sla` AS `sla`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_project`.`tid` AS `tid`, `tbl_project`.`nama_project` AS `nama_project`, `tbl_po`.`subtotal_ppn` AS `subtotal_ppn`, `tbl_po`.`tanggal_approv_wakadiv` AS `tanggal_approv_wakadiv`, `tbl_po`.`tanggal_approv_kadiv` AS `tanggal_approv_kadiv`, `tbl_po`.`flag_pembayaran` AS `flag_pembayaran`, `tbl_po`.`flag_pembukuan` AS `flag_pembukuan`, `tbl_po`.`status_invoice` AS `status_invoice`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_po`.`direksi_approv` AS `direksi_approv`, `tbl_vendor`.`alamat_vendor` AS `alamat_vendor`, `tbl_vendor`.`telp_vendor` AS `telp_vendor`, `tbl_unit_kerja`.`alamat_uker` AS `alamat_uker` FROM (((`tbl_po` join `tbl_unit_kerja` on(`tbl_po`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_vendor` on(`tbl_po`.`id_vendor` = `tbl_vendor`.`id_vendor`)) join `tbl_project` on(`tbl_po`.`id_project` = `tbl_project`.`id_project`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_print_pbj`
--
DROP TABLE IF EXISTS `v_print_pbj`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_print_pbj`  AS SELECT `tbl_pbj_det`.`id` AS `id`, `tbl_pbj_det`.`id_pbj` AS `id_pbj`, `tbl_pbj_det`.`no_urut` AS `no_urut`, `tbl_pbj_det`.`qty` AS `qty`, `tbl_pbj_det`.`keterangan` AS `keterangan`, `tbl_pbj`.`no_pbj` AS `no_pbj`, `tbl_pbj`.`tanggal_permintaan` AS `tanggal_permintaan`, `tbl_pbj`.`terms` AS `terms`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek` FROM ((((`tbl_pbj` join `tbl_pbj_det` on(`tbl_pbj`.`id` = `tbl_pbj_det`.`id_pbj`)) join `tbl_barang` on(`tbl_pbj_det`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_print_penerimaan`
--
DROP TABLE IF EXISTS `v_print_penerimaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_print_penerimaan`  AS SELECT `tbl_do`.`id_do` AS `id_do`, `tbl_do`.`id_po` AS `id_po`, `tbl_do`.`no_do` AS `no_do`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_po`.`no_po` AS `no_po`, `tbl_po_det`.`harga_satuan` AS `harga_satuan`, `tbl_po_det`.`total` AS `total`, `tbl_det_currency`.`rupiah` AS `rupiah`, `tbl_currency`.`kode_currency` AS `kode_currency`, `tbl_currency`.`nama_currency` AS `nama_currency`, `tbl_do_detail`.`qty` AS `qty`, `tbl_po`.`subtotal` AS `subtotal`, `tbl_po`.`grand_total` AS `grand_total` FROM ((((((`tbl_do` join `tbl_do_detail` on(`tbl_do`.`id_do` = `tbl_do_detail`.`id_do`)) join `tbl_barang` on(`tbl_do_detail`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_po` on(`tbl_do`.`id_po` = `tbl_po`.`id_po`)) join `tbl_po_det` on(`tbl_po`.`id_po` = `tbl_po_det`.`id_po` and `tbl_barang`.`no_urut` = `tbl_po_det`.`no_urut`)) join `tbl_currency`) join `tbl_det_currency` on(`tbl_currency`.`id_currency` = `tbl_det_currency`.`id_currency` and `tbl_po_det`.`id_det_currency` = `tbl_det_currency`.`id_det_currency`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rak`
--
DROP TABLE IF EXISTS `v_rak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rak`  AS SELECT `tbl_gudang`.`nama_gudang` AS `nama_gudang`, `tbl_gudang`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_rak`.`id_rak` AS `id_rak`, `tbl_rak`.`id_gudang` AS `id_gudang`, `tbl_rak`.`nama_rak` AS `nama_rak`, `tbl_rak`.`ket_rak` AS `ket_rak`, `tbl_rak`.`flag_rakqc` AS `flag_rakqc`, `tbl_rak`.`flag_rakjunk` AS `flag_rakjunk`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_gudang`.`letak_gudang` AS `letak_gudang` FROM ((`tbl_unit_kerja` join `tbl_gudang` on(`tbl_unit_kerja`.`id_uker` = `tbl_gudang`.`id_uker`)) join `tbl_rak` on(`tbl_gudang`.`id_gudang` = `tbl_rak`.`id_gudang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_regin_ekspedisi`
--
DROP TABLE IF EXISTS `v_regin_ekspedisi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_regin_ekspedisi`  AS SELECT `tbl_regin_ekspedisi`.`id_invoice` AS `id_invoice`, `tbl_regin_ekspedisi`.`id_vendor` AS `id_vendor`, `tbl_regin_ekspedisi`.`no_invoice` AS `no_invoice`, `tbl_regin_ekspedisi`.`tgl_invoice` AS `tgl_invoice`, `tbl_regin_ekspedisi`.`periode` AS `periode`, `tbl_regin_ekspedisi`.`tot_invoice` AS `tot_invoice`, `tbl_regin_ekspedisi`.`status_verif` AS `status_verif`, `tbl_regin_ekspedisi`.`regineks_created_date` AS `regineks_created_date`, `tbl_regin_ekspedisi`.`regineks_created_by` AS `regineks_created_by`, `tbl_vendor`.`nama_vendor` AS `nama_vendor`, `tbl_regin_ekspedisi`.`nilai_invoice` AS `nilai_invoice`, `tbl_vendor`.`alamat_vendor` AS `alamat_vendor`, `tbl_regin_ekspedisi`.`regineks_updated_date` AS `regineks_updated_date`, `tbl_regin_ekspedisi`.`regineks_updated_by` AS `regineks_updated_by` FROM (`tbl_regin_ekspedisi` join `tbl_vendor` on(`tbl_regin_ekspedisi`.`id_vendor` = `tbl_vendor`.`id_vendor`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_sgbarang`
--
DROP TABLE IF EXISTS `v_sgbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sgbarang`  AS SELECT `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_sgbarang`.`id_gbarang` AS `id_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_sgbarang`.`sgbarang_created_date` AS `sgbarang_created_date`, `tbl_sgbarang`.`sgbarang_created_by` AS `sgbarang_created_by`, `tbl_sgbarang`.`sgbarang_updated_date` AS `sgbarang_updated_date`, `tbl_sgbarang`.`sgbarang_updated_by` AS `sgbarang_updated_by`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang` FROM (`tbl_gbarang` join `tbl_sgbarang` on(`tbl_gbarang`.`id_gbarang` = `tbl_sgbarang`.`id_gbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockcabang`
--
DROP TABLE IF EXISTS `v_stockcabang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockcabang`  AS SELECT `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`min_stock` AS `min_stock`, `tbl_barang`.`max_stock` AS `max_stock`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_po`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, 'test' AS `test` FROM ((((`tbl_stock` join `tbl_barang` on(`tbl_stock`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_po` on(`tbl_stock`.`id_po` = `tbl_po`.`id_po`)) join `tbl_unit_kerja` on(`tbl_po`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockcbg`
--
DROP TABLE IF EXISTS `v_stockcbg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockcbg`  AS SELECT `tbl_transaksi`.`id_tran` AS `id_tran`, `tbl_transaksi`.`id_tranOld` AS `id_tranOld`, `tbl_transaksi`.`id_jtran` AS `id_jtran`, `tbl_transaksi`.`id_vendor` AS `id_vendor`, `tbl_transaksi`.`id_uker` AS `id_uker`, `tbl_transaksi`.`dari_uker` AS `dari_uker`, `tbl_transaksi`.`no_urut` AS `no_urut`, `tbl_transaksi`.`no_referensi` AS `no_referensi`, `tbl_transaksi`.`tgl_terima_barang` AS `tgl_terima_barang`, `tbl_transaksi`.`nama_ekpedisi` AS `nama_ekpedisi`, `tbl_transaksi`.`tgl_kirim_barang` AS `tgl_kirim_barang`, `tbl_transaksi`.`tgl_pemakai_barang` AS `tgl_pemakai_barang`, `tbl_transaksi`.`nama_teknisi` AS `nama_teknisi`, `tbl_transaksi`.`tid` AS `tid`, `tbl_transaksi`.`no_sn` AS `no_sn`, `tbl_transaksi`.`no_snOld` AS `no_snOld`, `tbl_transaksi`.`kon_barang` AS `kon_barang`, `tbl_transaksi`.`qty` AS `qty`, `tbl_transaksi`.`harga_barang` AS `harga_barang`, `tbl_transaksi`.`remark` AS `remark`, `tbl_transaksi`.`catatan_pemakaian` AS `catatan_pemakaian`, `tbl_transaksi`.`is_active` AS `is_active`, `tbl_transaksi`.`is_balikan` AS `is_balikan`, `tbl_transaksi`.`is_have` AS `is_have`, `tbl_transaksi`.`status_pakai` AS `status_pakai`, `tbl_transaksi`.`is_out` AS `is_out`, `tbl_transaksi`.`tran_created_date` AS `tran_created_date`, `tbl_transaksi`.`tran_created_by` AS `tran_created_by`, `tbl_transaksi`.`tran_updated_date` AS `tran_updated_date`, `tbl_transaksi`.`tran_updated_by` AS `tran_updated_by`, `tbl_barang`.`kode_barang` AS `kode_barang`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`min_stock` AS `min_stock`, `tbl_barang`.`max_stock` AS `max_stock`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang` FROM ((((((`tbl_transaksi` join `tbl_barang` on(`tbl_transaksi`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_unit_kerja` on(`tbl_transaksi`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_gbarang`) join `tbl_sgbarang` on(`tbl_gbarang`.`id_gbarang` = `tbl_sgbarang`.`id_gbarang` and `tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockdetail`
--
DROP TABLE IF EXISTS `v_stockdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockdetail`  AS SELECT `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_po`.`no_po` AS `no_po`, `tbl_gudang`.`nama_gudang` AS `nama_gudang`, `tbl_rak`.`nama_rak` AS `nama_rak`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_stock`.`no_sn` AS `no_sn`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_det_currency`.`id_det_currency` AS `id_det_currency`, `tbl_det_currency`.`tgl_kurs` AS `tgl_kurs`, `tbl_det_currency`.`rupiah` AS `rupiah`, `tbl_det_currency`.`keterangan` AS `keterangan`, `tbl_currency`.`kode_currency` AS `kode_currency`, `tbl_currency`.`nama_currency` AS `nama_currency`, `tbl_currency`.`id_currency` AS `id_currency` FROM (((((((((((`tbl_stock` join `tbl_po` on(`tbl_stock`.`id_po` = `tbl_po`.`id_po`)) join `tbl_rak` on(`tbl_stock`.`id_rak` = `tbl_rak`.`id_rak`)) join `tbl_gudang` on(`tbl_rak`.`id_gudang` = `tbl_gudang`.`id_gudang`)) join `tbl_unit_kerja` on(`tbl_gudang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_barang` on(`tbl_stock`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_det_currency` on(`tbl_stock`.`id_det_currency` = `tbl_det_currency`.`id_det_currency`)) join `tbl_currency` on(`tbl_det_currency`.`id_currency` = `tbl_currency`.`id_currency`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockgdg`
--
DROP TABLE IF EXISTS `v_stockgdg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockgdg`  AS SELECT `tbl_stock`.`id_stock` AS `id_stock`, `tbl_stock`.`no_urut` AS `no_urut`, `tbl_stock`.`no_sn` AS `no_sn`, `tbl_stock`.`flag_pakai` AS `flag_pakai`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_stock`.`harga_barang` AS `harga_barang`, `tbl_stock`.`id_po` AS `id_po`, `tbl_rak`.`nama_rak` AS `nama_rak`, `tbl_gudang`.`nama_gudang` AS `nama_gudang`, `tbl_po`.`no_po` AS `no_po` FROM ((((((((`tbl_stock` join `tbl_barang` on(`tbl_stock`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_tipe_barang` on(`tbl_barang`.`id_tipe_barang` = `tbl_tipe_barang`.`id_tipe_barang`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_gbarang`) join `tbl_sgbarang` on(`tbl_gbarang`.`id_gbarang` = `tbl_sgbarang`.`id_gbarang` and `tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_po` on(`tbl_stock`.`id_po` = `tbl_po`.`id_po`)) join `tbl_rak` on(`tbl_stock`.`id_rak` = `tbl_rak`.`id_rak`)) join `tbl_gudang` on(`tbl_rak`.`id_gudang` = `tbl_gudang`.`id_gudang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_stockgudang`
--
DROP TABLE IF EXISTS `v_stockgudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_stockgudang`  AS SELECT `tbl_unit_kerja`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_barang`.`no_urut` AS `no_urut`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, count(`tbl_stock`.`id_stock`) AS `total_stock`, sum(`tbl_stock`.`harga_barang`) AS `total_harga`, `tbl_det_currency`.`tgl_kurs` AS `tgl_kurs`, `tbl_det_currency`.`id_det_currency` AS `id_det_currency`, `tbl_det_currency`.`rupiah` AS `rupiah`, `tbl_det_currency`.`keterangan` AS `keterangan`, `tbl_currency`.`kode_currency` AS `kode_currency`, `tbl_currency`.`nama_currency` AS `nama_currency`, `tbl_currency`.`id_currency` AS `id_currency` FROM ((((((((((`tbl_stock` join `tbl_rak` on(`tbl_stock`.`id_rak` = `tbl_rak`.`id_rak`)) join `tbl_gudang` on(`tbl_rak`.`id_gudang` = `tbl_gudang`.`id_gudang`)) join `tbl_unit_kerja` on(`tbl_gudang`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) join `tbl_tipe_barang`) join `tbl_barang` on(`tbl_tipe_barang`.`id_tipe_barang` = `tbl_barang`.`id_tipe_barang` and `tbl_stock`.`no_urut` = `tbl_barang`.`no_urut`)) join `tbl_merek` on(`tbl_tipe_barang`.`id_merek` = `tbl_merek`.`id_merek`)) join `tbl_sgbarang` on(`tbl_merek`.`id_sgbarang` = `tbl_sgbarang`.`id_sgbarang`)) join `tbl_gbarang` on(`tbl_sgbarang`.`id_gbarang` = `tbl_gbarang`.`id_gbarang`)) join `tbl_det_currency` on(`tbl_stock`.`id_det_currency` = `tbl_det_currency`.`id_det_currency`)) join `tbl_currency` on(`tbl_det_currency`.`id_currency` = `tbl_currency`.`id_currency`)) GROUP BY `tbl_stock`.`no_urut` ;

-- --------------------------------------------------------

--
-- Structure for view `v_subgroupuser`
--
DROP TABLE IF EXISTS `v_subgroupuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_subgroupuser`  AS SELECT `tbl_user_subgroup`.`id_subgroup` AS `id_subgroup`, `tbl_user_group`.`id_group` AS `id_group`, `tbl_user_group`.`nama_group` AS `nama_group`, `tbl_user_subgroup`.`nama_subgroup` AS `nama_subgroup`, `tbl_user_subgroup`.`usubgroup_created_date` AS `usubgroup_created_date`, `tbl_user_subgroup`.`usubgroup_created_by` AS `usubgroup_created_by`, `tbl_user_subgroup`.`usubgroup_updated_date` AS `usubgroup_updated_date`, `tbl_user_subgroup`.`usubgroup_updated_by` AS `usubgroup_updated_by` FROM (`tbl_user_group` join `tbl_user_subgroup` on(`tbl_user_group`.`id_group` = `tbl_user_subgroup`.`id_group`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_terimado`
--
DROP TABLE IF EXISTS `v_terimado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_terimado`  AS SELECT `tbl_po`.`id_po` AS `id_po`, `tbl_do`.`id_do` AS `id_do`, `tbl_do_detail`.`id_do_detail` AS `id_do_detail`, `tbl_do_detail`.`no_urut` AS `no_urut`, `tbl_do_detail`.`qty` AS `qty`, `tbl_barang`.`nama_barang` AS `nama_barang`, `tbl_barang`.`kode_barang` AS `kode_barang` FROM (((`tbl_po` join `tbl_do` on(`tbl_po`.`id_po` = `tbl_do`.`id_po`)) join `tbl_do_detail` on(`tbl_do`.`id_do` = `tbl_do_detail`.`id_do`)) join `tbl_barang` on(`tbl_do_detail`.`no_urut` = `tbl_barang`.`no_urut`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_tipe_barang`
--
DROP TABLE IF EXISTS `v_tipe_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tipe_barang`  AS SELECT `tbl_tipe_barang`.`id_tipe_barang` AS `id_tipe_barang`, `tbl_tipe_barang`.`id_merek` AS `id_merek`, `tbl_tipe_barang`.`tipe_barang` AS `tipe_barang`, `tbl_tipe_barang`.`tbarang_created_date` AS `tbarang_created_date`, `tbl_tipe_barang`.`tbarang_created_by` AS `tbarang_created_by`, `tbl_tipe_barang`.`tbarang_updated_date` AS `tbarang_updated_date`, `tbl_tipe_barang`.`tbarang_updated_by` AS `tbarang_updated_by`, `tbl_merek`.`nama_merek` AS `nama_merek`, `tbl_sgbarang`.`id_sgbarang` AS `id_sgbarang`, `tbl_sgbarang`.`nama_sgbarang` AS `nama_sgbarang`, `tbl_gbarang`.`id_gbarang` AS `id_gbarang`, `tbl_gbarang`.`nama_gbarang` AS `nama_gbarang` FROM (((`tbl_gbarang` join `tbl_sgbarang` on(`tbl_gbarang`.`id_gbarang` = `tbl_sgbarang`.`id_gbarang`)) join `tbl_merek` on(`tbl_sgbarang`.`id_sgbarang` = `tbl_merek`.`id_sgbarang`)) join `tbl_tipe_barang` on(`tbl_merek`.`id_merek` = `tbl_tipe_barang`.`id_merek`)) ORDER BY `tbl_tipe_barang`.`id_tipe_barang` ASC, `tbl_tipe_barang`.`tipe_barang` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_user`
--
DROP TABLE IF EXISTS `v_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user`  AS SELECT `tbl_user`.`id_user` AS `id_user`, `tbl_user`.`id_sgroup` AS `id_sgroup`, `tbl_user`.`username` AS `username`, `tbl_user`.`password` AS `password`, `tbl_user_subgroup`.`nama_subgroup` AS `nama_subgroup`, `tbl_user_group`.`id_group` AS `id_group`, `tbl_user_group`.`nama_group` AS `nama_group`, `tbl_user`.`id_uker` AS `id_uker`, `tbl_unit_kerja`.`kode_uker` AS `kode_uker`, `tbl_unit_kerja`.`nama_uker` AS `nama_uker`, `tbl_unit_kerja`.`kode_nama` AS `kode_nama`, `tbl_unit_kerja`.`alamat_uker` AS `alamat_uker`, `tbl_unit_kerja`.`ket_uker` AS `ket_uker` FROM (((`tbl_user_group` join `tbl_user_subgroup` on(`tbl_user_group`.`id_group` = `tbl_user_subgroup`.`id_group`)) join `tbl_user` on(`tbl_user`.`id_sgroup` = `tbl_user_subgroup`.`id_subgroup`)) join `tbl_unit_kerja` on(`tbl_user`.`id_uker` = `tbl_unit_kerja`.`id_uker`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`no_urut`) USING BTREE,
  ADD KEY `id_tipe_barang` (`id_tipe_barang`) USING BTREE,
  ADD KEY `id_satuan` (`id_satuan`) USING BTREE;

--
-- Indexes for table `tbl_barang_temp`
--
ALTER TABLE `tbl_barang_temp`
  ADD PRIMARY KEY (`id_tmp`) USING BTREE,
  ADD KEY `id_rak` (`id_rak`) USING BTREE,
  ADD KEY `id_do_detail` (`id_do_detail`) USING BTREE,
  ADD KEY `no_urut` (`no_urut`) USING BTREE,
  ADD KEY `id_det_currency` (`id_det_currency`) USING BTREE;

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`id_currency`) USING BTREE,
  ADD UNIQUE KEY `uniq_cur` (`kode_currency`,`nama_currency`) USING BTREE;

--
-- Indexes for table `tbl_delivery_type`
--
ALTER TABLE `tbl_delivery_type`
  ADD PRIMARY KEY (`id_delivery_type`) USING BTREE;

--
-- Indexes for table `tbl_det_currency`
--
ALTER TABLE `tbl_det_currency`
  ADD PRIMARY KEY (`id_det_currency`) USING BTREE,
  ADD KEY `id_currency` (`id_currency`) USING BTREE;

--
-- Indexes for table `tbl_do`
--
ALTER TABLE `tbl_do`
  ADD PRIMARY KEY (`id_do`) USING BTREE,
  ADD KEY `id_po` (`id_po`) USING BTREE;

--
-- Indexes for table `tbl_do_detail`
--
ALTER TABLE `tbl_do_detail`
  ADD PRIMARY KEY (`id_do_detail`) USING BTREE,
  ADD KEY `id_do` (`id_do`) USING BTREE,
  ADD KEY `id_barang` (`no_urut`) USING BTREE;

--
-- Indexes for table `tbl_ekpedisi`
--
ALTER TABLE `tbl_ekpedisi`
  ADD PRIMARY KEY (`id_ekpedisi`) USING BTREE,
  ADD KEY `id_delivery_type` (`id_delivery_type`) USING BTREE;

--
-- Indexes for table `tbl_gbarang`
--
ALTER TABLE `tbl_gbarang`
  ADD PRIMARY KEY (`id_gbarang`) USING BTREE,
  ADD UNIQUE KEY `unik_gbarang` (`nama_gbarang`) USING BTREE,
  ADD KEY `index_tipe` (`id_gbarang`) USING BTREE;

--
-- Indexes for table `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  ADD PRIMARY KEY (`id_gudang`) USING BTREE,
  ADD UNIQUE KEY `uniq_uker` (`id_uker`,`nama_gudang`) USING BTREE;

--
-- Indexes for table `tbl_invoicebarang`
--
ALTER TABLE `tbl_invoicebarang`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `id_po` (`id_po`);

--
-- Indexes for table `tbl_jtran`
--
ALTER TABLE `tbl_jtran`
  ADD PRIMARY KEY (`id_jtran`) USING BTREE;

--
-- Indexes for table `tbl_layanan_ekspedisi`
--
ALTER TABLE `tbl_layanan_ekspedisi`
  ADD PRIMARY KEY (`id_layanan_ekspedisi`) USING BTREE,
  ADD KEY `id_ekspedisi` (`id_ekspedisi`) USING BTREE;

--
-- Indexes for table `tbl_log_login`
--
ALTER TABLE `tbl_log_login`
  ADD PRIMARY KEY (`id_log_login`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  ADD PRIMARY KEY (`id_merek`) USING BTREE,
  ADD UNIQUE KEY `uniq_merek` (`id_sgbarang`,`nama_merek`) USING BTREE;

--
-- Indexes for table `tbl_pbj`
--
ALTER TABLE `tbl_pbj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pbj_det`
--
ALTER TABLE `tbl_pbj_det`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pbj` (`id_pbj`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_uker` (`id_uker`),
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `tbl_pembelian_det`
--
ALTER TABLE `tbl_pembelian_det`
  ADD PRIMARY KEY (`id_pembelian_det`);

--
-- Indexes for table `tbl_pembukuan`
--
ALTER TABLE `tbl_pembukuan`
  ADD PRIMARY KEY (`id_pembukuan`),
  ADD KEY `id_uker` (`id_uker`),
  ADD KEY `id_pemenuhan` (`id_pemenuhan`),
  ADD KEY `id_stock` (`id_stock`),
  ADD KEY `id_po` (`id_po`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_ekpedisi` (`id_ekpedisi`);

--
-- Indexes for table `tbl_pembukuan_det`
--
ALTER TABLE `tbl_pembukuan_det`
  ADD PRIMARY KEY (`id_pembukuan_det`),
  ADD UNIQUE KEY `id_tipe_barang_2` (`id_tipe_barang`),
  ADD KEY `id_pembukuan` (`id_pembukuan`),
  ADD KEY `id_gbarang` (`id_gbarang`),
  ADD KEY `id_sgbarang` (`id_sgbarang`),
  ADD KEY `no_urut` (`no_urut`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_stock` (`id_stock`),
  ADD KEY `id_tipe_barang` (`id_tipe_barang`);

--
-- Indexes for table `tbl_pemenuhan`
--
ALTER TABLE `tbl_pemenuhan`
  ADD PRIMARY KEY (`id_pemenuhan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `no_urut` (`no_urut`),
  ADD KEY `id_stock` (`id_stock`);

--
-- Indexes for table `tbl_pemenuhan_barcab`
--
ALTER TABLE `tbl_pemenuhan_barcab`
  ADD PRIMARY KEY (`id_pemenuhan_barcab`),
  ADD KEY `id_permintaan` (`id_permintaan`),
  ADD KEY `id_layanan_ekspedisi` (`id_layanan_ekspedisi`),
  ADD KEY `id_uker` (`id_uker`);

--
-- Indexes for table `tbl_pemenuhan_barcab_det`
--
ALTER TABLE `tbl_pemenuhan_barcab_det`
  ADD PRIMARY KEY (`id_pemenuhan_barcab_det`),
  ADD KEY `no_urut` (`no_urut`),
  ADD KEY `id_permintaan` (`id_permintaan`);

--
-- Indexes for table `tbl_pemenuhan_det`
--
ALTER TABLE `tbl_pemenuhan_det`
  ADD PRIMARY KEY (`id_pemenuhan_det`),
  ADD KEY `id_pemenuhan` (`id_pemenuhan`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `tbl_penbarang`
--
ALTER TABLE `tbl_penbarang`
  ADD PRIMARY KEY (`id_penBarang`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `tbl_pengbarang`
--
ALTER TABLE `tbl_pengbarang`
  ADD PRIMARY KEY (`id_pengBarang`),
  ADD KEY `tbl_pengbarang_ibfk_1` (`id_pengiriman`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `tbl_pengelolaan_mesin`
--
ALTER TABLE `tbl_pengelolaan_mesin`
  ADD PRIMARY KEY (`id_det_project`) USING BTREE,
  ADD KEY `tid` (`id_project`) USING BTREE,
  ADD KEY `id_uker` (`id_uker`) USING BTREE;

--
-- Indexes for table `tbl_pengirimankekp`
--
ALTER TABLE `tbl_pengirimankekp`
  ADD PRIMARY KEY (`id_pengirimankekp`);

--
-- Indexes for table `tbl_pengirimankekp_det`
--
ALTER TABLE `tbl_pengirimankekp_det`
  ADD PRIMARY KEY (`id_pengkekp_det`),
  ADD KEY `id_pengirimankekp` (`id_pengirimankekp`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `tbl_pengiriman_barang`
--
ALTER TABLE `tbl_pengiriman_barang`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_uker` (`id_uker`),
  ADD KEY `id_layanan_ekspedisi` (`id_layanan_ekspedisi`),
  ADD KEY `id_ekpedisi` (`id_ekpedisi`);

--
-- Indexes for table `tbl_pengiriman_barang_det`
--
ALTER TABLE `tbl_pengiriman_barang_det`
  ADD PRIMARY KEY (`id_pengiriman_det`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `no_urut` (`no_urut`);

--
-- Indexes for table `tbl_perbaikan`
--
ALTER TABLE `tbl_perbaikan`
  ADD PRIMARY KEY (`id_perbaikanbarang`),
  ADD KEY `no_urut` (`no_urut`),
  ADD KEY `id_sgbarang` (`id_sgbarang`);

--
-- Indexes for table `tbl_perbaikankcsp`
--
ALTER TABLE `tbl_perbaikankcsp`
  ADD PRIMARY KEY (`id_perbaikankcsp`),
  ADD KEY `id_pengkekp_det` (`id_pengkekp_det`);

--
-- Indexes for table `tbl_permintaan_barang`
--
ALTER TABLE `tbl_permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `id_stock` (`id_stock`),
  ADD KEY `id_uker` (`id_uker`),
  ADD KEY `id_delivery_type` (`id_delivery_type`);

--
-- Indexes for table `tbl_permintaan_barang_det`
--
ALTER TABLE `tbl_permintaan_barang_det`
  ADD PRIMARY KEY (`id_permintaan_det`),
  ADD KEY `id_permintaan` (`id_permintaan`),
  ADD KEY `no_urut` (`no_urut`),
  ADD KEY `tbl_permintaan_barang_det_ibfk_1` (`no_sn`);

--
-- Indexes for table `tbl_permohonan_pem`
--
ALTER TABLE `tbl_permohonan_pem`
  ADD PRIMARY KEY (`id_permohonan_pem`),
  ADD KEY `id_invoice` (`id_invoice`);

--
-- Indexes for table `tbl_permohonan_pembayaran`
--
ALTER TABLE `tbl_permohonan_pembayaran`
  ADD PRIMARY KEY (`id_pp`) USING BTREE,
  ADD KEY `id_po` (`id_po`) USING BTREE;

--
-- Indexes for table `tbl_pertek`
--
ALTER TABLE `tbl_pertek`
  ADD PRIMARY KEY (`id_pertek`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `id_project` (`id_project`) USING BTREE,
  ADD KEY `id_stock` (`id_stock`);

--
-- Indexes for table `tbl_pertek_det`
--
ALTER TABLE `tbl_pertek_det`
  ADD PRIMARY KEY (`id_pertek_det`) USING BTREE,
  ADD KEY `id_pertek` (`id_pertek`) USING BTREE,
  ADD KEY `no_urut` (`no_urut`) USING BTREE,
  ADD KEY `id_stock` (`id_stock`);

--
-- Indexes for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD PRIMARY KEY (`id_po`) USING BTREE,
  ADD KEY `id_uker` (`id_uker`) USING BTREE,
  ADD KEY `id_supplier` (`id_vendor`) USING BTREE,
  ADD KEY `id_project` (`id_project`) USING BTREE;

--
-- Indexes for table `tbl_po_det`
--
ALTER TABLE `tbl_po_det`
  ADD PRIMARY KEY (`id_po_det`) USING BTREE,
  ADD KEY `id_po` (`id_po`) USING BTREE,
  ADD KEY `id_barang` (`no_urut`) USING BTREE,
  ADD KEY `id_currency` (`id_det_currency`) USING BTREE;

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id_project`) USING BTREE,
  ADD UNIQUE KEY `uniq_project` (`id_project`,`no_spk`,`nama_project`) USING BTREE,
  ADD KEY `tid` (`tid`) USING BTREE;

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`) USING BTREE,
  ADD UNIQUE KEY `uniq_rak` (`id_gudang`,`nama_rak`) USING BTREE;

--
-- Indexes for table `tbl_regin_ekspedisi`
--
ALTER TABLE `tbl_regin_ekspedisi`
  ADD PRIMARY KEY (`id_invoice`) USING BTREE,
  ADD KEY `id_vendor` (`id_vendor`);

--
-- Indexes for table `tbl_registrasi_invoice`
--
ALTER TABLE `tbl_registrasi_invoice`
  ADD PRIMARY KEY (`id_reg_inv`) USING BTREE,
  ADD KEY `id_po` (`id_po`) USING BTREE;

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id_satuan`) USING BTREE,
  ADD UNIQUE KEY `uniq_tipe` (`nama_satuan`) USING BTREE;

--
-- Indexes for table `tbl_sgbarang`
--
ALTER TABLE `tbl_sgbarang`
  ADD PRIMARY KEY (`id_sgbarang`) USING BTREE,
  ADD UNIQUE KEY `uniq_sgbarang` (`id_gbarang`,`nama_sgbarang`) USING BTREE;

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id_stock`) USING BTREE,
  ADD KEY `id_rak` (`id_rak`) USING BTREE,
  ADD KEY `no_urut` (`no_urut`) USING BTREE,
  ADD KEY `id_po` (`id_po`) USING BTREE,
  ADD KEY `id_det_currency` (`id_det_currency`) USING BTREE;

--
-- Indexes for table `tbl_tipe_barang`
--
ALTER TABLE `tbl_tipe_barang`
  ADD PRIMARY KEY (`id_tipe_barang`) USING BTREE,
  ADD UNIQUE KEY `uniq_tipe` (`id_merek`,`tipe_barang`) USING BTREE,
  ADD KEY `index` (`id_tipe_barang`,`tipe_barang`) USING BTREE;

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_tran`) USING BTREE,
  ADD KEY `id_jtran` (`id_jtran`) USING BTREE,
  ADD KEY `id_vendor` (`id_vendor`) USING BTREE,
  ADD KEY `no_urut` (`no_urut`) USING BTREE,
  ADD KEY `id_uker` (`id_uker`) USING BTREE;

--
-- Indexes for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  ADD PRIMARY KEY (`id_uker`) USING BTREE,
  ADD UNIQUE KEY `uniq_uker` (`kode_uker`,`nama_uker`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE,
  ADD UNIQUE KEY `uniq_user` (`id_sgroup`,`username`) USING BTREE,
  ADD KEY `id_group` (`id_sgroup`) USING BTREE,
  ADD KEY `id_uker` (`id_uker`) USING BTREE;

--
-- Indexes for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD PRIMARY KEY (`id_group`) USING BTREE,
  ADD UNIQUE KEY `index_tipe` (`nama_group`) USING BTREE;

--
-- Indexes for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  ADD PRIMARY KEY (`id_log`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  ADD PRIMARY KEY (`id_menu`) USING BTREE,
  ADD KEY `uniq` (`nama_menu`) USING BTREE;

--
-- Indexes for table `tbl_user_pegawai`
--
ALTER TABLE `tbl_user_pegawai`
  ADD PRIMARY KEY (`id_pegawai`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `tbl_user_permission`
--
ALTER TABLE `tbl_user_permission`
  ADD PRIMARY KEY (`id_per`) USING BTREE,
  ADD KEY `id_group` (`id_sgroup`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`) USING BTREE;

--
-- Indexes for table `tbl_user_subgroup`
--
ALTER TABLE `tbl_user_subgroup`
  ADD PRIMARY KEY (`id_subgroup`) USING BTREE,
  ADD UNIQUE KEY `index_tipe` (`id_group`,`nama_subgroup`) USING BTREE,
  ADD KEY `id_group` (`id_group`) USING BTREE;

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`id_vendor`) USING BTREE,
  ADD UNIQUE KEY `uniq_sup` (`nama_vendor`) USING BTREE;

--
-- Indexes for table `_`
--
ALTER TABLE `_`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `tbl_barang_temp`
--
ALTER TABLE `tbl_barang_temp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `id_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_delivery_type`
--
ALTER TABLE `tbl_delivery_type`
  MODIFY `id_delivery_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_det_currency`
--
ALTER TABLE `tbl_det_currency`
  MODIFY `id_det_currency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_do`
--
ALTER TABLE `tbl_do`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_do_detail`
--
ALTER TABLE `tbl_do_detail`
  MODIFY `id_do_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_ekpedisi`
--
ALTER TABLE `tbl_ekpedisi`
  MODIFY `id_ekpedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_gbarang`
--
ALTER TABLE `tbl_gbarang`
  MODIFY `id_gbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_invoicebarang`
--
ALTER TABLE `tbl_invoicebarang`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_jtran`
--
ALTER TABLE `tbl_jtran`
  MODIFY `id_jtran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_layanan_ekspedisi`
--
ALTER TABLE `tbl_layanan_ekspedisi`
  MODIFY `id_layanan_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_log_login`
--
ALTER TABLE `tbl_log_login`
  MODIFY `id_log_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=683;

--
-- AUTO_INCREMENT for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pbj`
--
ALTER TABLE `tbl_pbj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pbj_det`
--
ALTER TABLE `tbl_pbj_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_pembelian_det`
--
ALTER TABLE `tbl_pembelian_det`
  MODIFY `id_pembelian_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_pembukuan`
--
ALTER TABLE `tbl_pembukuan`
  MODIFY `id_pembukuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pembukuan_det`
--
ALTER TABLE `tbl_pembukuan_det`
  MODIFY `id_pembukuan_det` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pemenuhan`
--
ALTER TABLE `tbl_pemenuhan`
  MODIFY `id_pemenuhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pemenuhan_barcab`
--
ALTER TABLE `tbl_pemenuhan_barcab`
  MODIFY `id_pemenuhan_barcab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pemenuhan_barcab_det`
--
ALTER TABLE `tbl_pemenuhan_barcab_det`
  MODIFY `id_pemenuhan_barcab_det` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pemenuhan_det`
--
ALTER TABLE `tbl_pemenuhan_det`
  MODIFY `id_pemenuhan_det` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penbarang`
--
ALTER TABLE `tbl_penbarang`
  MODIFY `id_penBarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengbarang`
--
ALTER TABLE `tbl_pengbarang`
  MODIFY `id_pengBarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengelolaan_mesin`
--
ALTER TABLE `tbl_pengelolaan_mesin`
  MODIFY `id_det_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pengirimankekp`
--
ALTER TABLE `tbl_pengirimankekp`
  MODIFY `id_pengirimankekp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengirimankekp_det`
--
ALTER TABLE `tbl_pengirimankekp_det`
  MODIFY `id_pengkekp_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengiriman_barang`
--
ALTER TABLE `tbl_pengiriman_barang`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pengiriman_barang_det`
--
ALTER TABLE `tbl_pengiriman_barang_det`
  MODIFY `id_pengiriman_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_perbaikan`
--
ALTER TABLE `tbl_perbaikan`
  MODIFY `id_perbaikanbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_perbaikankcsp`
--
ALTER TABLE `tbl_perbaikankcsp`
  MODIFY `id_perbaikankcsp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_permintaan_barang`
--
ALTER TABLE `tbl_permintaan_barang`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_permintaan_barang_det`
--
ALTER TABLE `tbl_permintaan_barang_det`
  MODIFY `id_permintaan_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `tbl_permohonan_pem`
--
ALTER TABLE `tbl_permohonan_pem`
  MODIFY `id_permohonan_pem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_permohonan_pembayaran`
--
ALTER TABLE `tbl_permohonan_pembayaran`
  MODIFY `id_pp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pertek`
--
ALTER TABLE `tbl_pertek`
  MODIFY `id_pertek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pertek_det`
--
ALTER TABLE `tbl_pertek_det`
  MODIFY `id_pertek_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_po`
--
ALTER TABLE `tbl_po`
  MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_po_det`
--
ALTER TABLE `tbl_po_det`
  MODIFY `id_po_det` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_regin_ekspedisi`
--
ALTER TABLE `tbl_regin_ekspedisi`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_registrasi_invoice`
--
ALTER TABLE `tbl_registrasi_invoice`
  MODIFY `id_reg_inv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_sgbarang`
--
ALTER TABLE `tbl_sgbarang`
  MODIFY `id_sgbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_tipe_barang`
--
ALTER TABLE `tbl_tipe_barang`
  MODIFY `id_tipe_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_tran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  MODIFY `id_uker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1351;

--
-- AUTO_INCREMENT for table `tbl_user_menu`
--
ALTER TABLE `tbl_user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `tbl_user_pegawai`
--
ALTER TABLE `tbl_user_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_permission`
--
ALTER TABLE `tbl_user_permission`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1710;

--
-- AUTO_INCREMENT for table `tbl_user_subgroup`
--
ALTER TABLE `tbl_user_subgroup`
  MODIFY `id_subgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `_`
--
ALTER TABLE `_`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_ibfk_3` FOREIGN KEY (`id_tipe_barang`) REFERENCES `tbl_tipe_barang` (`id_tipe_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_barang_temp`
--
ALTER TABLE `tbl_barang_temp`
  ADD CONSTRAINT `tbl_barang_temp_ibfk_1` FOREIGN KEY (`id_do_detail`) REFERENCES `tbl_do_detail` (`id_do_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_temp_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_temp_ibfk_3` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_barang_temp_ibfk_4` FOREIGN KEY (`id_det_currency`) REFERENCES `tbl_det_currency` (`id_det_currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_det_currency`
--
ALTER TABLE `tbl_det_currency`
  ADD CONSTRAINT `tbl_det_currency_ibfk_1` FOREIGN KEY (`id_currency`) REFERENCES `tbl_currency` (`id_currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_do`
--
ALTER TABLE `tbl_do`
  ADD CONSTRAINT `tbl_do_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `tbl_po` (`id_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_do_detail`
--
ALTER TABLE `tbl_do_detail`
  ADD CONSTRAINT `tbl_do_detail_ibfk_1` FOREIGN KEY (`id_do`) REFERENCES `tbl_do` (`id_do`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_do_detail_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ekpedisi`
--
ALTER TABLE `tbl_ekpedisi`
  ADD CONSTRAINT `tbl_ekpedisi_ibfk_1` FOREIGN KEY (`id_delivery_type`) REFERENCES `tbl_delivery_type` (`id_delivery_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_gudang`
--
ALTER TABLE `tbl_gudang`
  ADD CONSTRAINT `tbl_gudang_ibfk_1` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoicebarang`
--
ALTER TABLE `tbl_invoicebarang`
  ADD CONSTRAINT `tbl_invoicebarang_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `tbl_po` (`id_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_layanan_ekspedisi`
--
ALTER TABLE `tbl_layanan_ekspedisi`
  ADD CONSTRAINT `tbl_layanan_ekspedisi_ibfk_1` FOREIGN KEY (`id_ekspedisi`) REFERENCES `tbl_ekpedisi` (`id_ekpedisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_log_login`
--
ALTER TABLE `tbl_log_login`
  ADD CONSTRAINT `tbl_log_login_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_merek`
--
ALTER TABLE `tbl_merek`
  ADD CONSTRAINT `tbl_merek_ibfk_1` FOREIGN KEY (`id_sgbarang`) REFERENCES `tbl_sgbarang` (`id_sgbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pbj_det`
--
ALTER TABLE `tbl_pbj_det`
  ADD CONSTRAINT `tbl_pbj_det_ibfk_1` FOREIGN KEY (`id_pbj`) REFERENCES `tbl_pbj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pbj_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD CONSTRAINT `tbl_pembelian_ibfk_1` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembelian_ibfk_2` FOREIGN KEY (`id_vendor`) REFERENCES `tbl_vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembukuan`
--
ALTER TABLE `tbl_pembukuan`
  ADD CONSTRAINT `tbl_pembukuan_ibfk_2` FOREIGN KEY (`id_pemenuhan`) REFERENCES `tbl_pemenuhan` (`id_pemenuhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_ibfk_3` FOREIGN KEY (`id_stock`) REFERENCES `tbl_stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_ibfk_4` FOREIGN KEY (`id_po`) REFERENCES `tbl_po` (`id_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_ibfk_5` FOREIGN KEY (`id_pengiriman`) REFERENCES `tbl_pengiriman_barang` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_ibfk_6` FOREIGN KEY (`id_ekpedisi`) REFERENCES `tbl_ekpedisi` (`id_ekpedisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembukuan_det`
--
ALTER TABLE `tbl_pembukuan_det`
  ADD CONSTRAINT `tbl_pembukuan_det_ibfk_2` FOREIGN KEY (`id_gbarang`) REFERENCES `tbl_gbarang` (`id_gbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_det_ibfk_3` FOREIGN KEY (`id_sgbarang`) REFERENCES `tbl_sgbarang` (`id_sgbarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_det_ibfk_4` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_det_ibfk_5` FOREIGN KEY (`id_merek`) REFERENCES `tbl_merek` (`id_merek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembukuan_det_ibfk_7` FOREIGN KEY (`id_stock`) REFERENCES `tbl_stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemenuhan`
--
ALTER TABLE `tbl_pemenuhan`
  ADD CONSTRAINT `tbl_pemenuhan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemenuhan_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `tbl_project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemenuhan_ibfk_3` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemenuhan_ibfk_4` FOREIGN KEY (`id_stock`) REFERENCES `tbl_stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemenuhan_barcab`
--
ALTER TABLE `tbl_pemenuhan_barcab`
  ADD CONSTRAINT `tbl_pemenuhan_barcab_ibfk_1` FOREIGN KEY (`id_permintaan`) REFERENCES `tbl_permintaan_barang` (`id_permintaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemenuhan_barcab_det`
--
ALTER TABLE `tbl_pemenuhan_barcab_det`
  ADD CONSTRAINT `tbl_pemenuhan_barcab_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemenuhan_det`
--
ALTER TABLE `tbl_pemenuhan_det`
  ADD CONSTRAINT `tbl_pemenuhan_det_ibfk_1` FOREIGN KEY (`id_pemenuhan`) REFERENCES `tbl_pemenuhan` (`id_pemenuhan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pemenuhan_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengbarang`
--
ALTER TABLE `tbl_pengbarang`
  ADD CONSTRAINT `tbl_pengbarang_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `tbl_pengiriman_barang` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengbarang_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengirimankekp_det`
--
ALTER TABLE `tbl_pengirimankekp_det`
  ADD CONSTRAINT `tbl_pengirimankekp_det_ibfk_1` FOREIGN KEY (`id_pengirimankekp`) REFERENCES `tbl_pengirimankekp` (`id_pengirimankekp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengirimankekp_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengiriman_barang`
--
ALTER TABLE `tbl_pengiriman_barang`
  ADD CONSTRAINT `tbl_pengiriman_barang_ibfk_1` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengiriman_barang_ibfk_3` FOREIGN KEY (`id_layanan_ekspedisi`) REFERENCES `tbl_layanan_ekspedisi` (`id_layanan_ekspedisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pengiriman_barang_det`
--
ALTER TABLE `tbl_pengiriman_barang_det`
  ADD CONSTRAINT `tbl_pengiriman_barang_det_ibfk_1` FOREIGN KEY (`id_pengiriman`) REFERENCES `tbl_pengiriman_barang` (`id_pengiriman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pengiriman_barang_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_perbaikan`
--
ALTER TABLE `tbl_perbaikan`
  ADD CONSTRAINT `tbl_perbaikan_ibfk_1` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_perbaikan_ibfk_2` FOREIGN KEY (`id_sgbarang`) REFERENCES `tbl_sgbarang` (`id_sgbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_perbaikankcsp`
--
ALTER TABLE `tbl_perbaikankcsp`
  ADD CONSTRAINT `tbl_perbaikankcsp_ibfk_1` FOREIGN KEY (`id_pengkekp_det`) REFERENCES `tbl_pengirimankekp_det` (`id_pengkekp_det`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permintaan_barang`
--
ALTER TABLE `tbl_permintaan_barang`
  ADD CONSTRAINT `tbl_permintaan_barang_ibfk_1` FOREIGN KEY (`id_stock`) REFERENCES `tbl_stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_permintaan_barang_ibfk_2` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permintaan_barang_det`
--
ALTER TABLE `tbl_permintaan_barang_det`
  ADD CONSTRAINT `tbl_permintaan_barang_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permohonan_pem`
--
ALTER TABLE `tbl_permohonan_pem`
  ADD CONSTRAINT `tbl_permohonan_pem_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `tbl_invoicebarang` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pertek`
--
ALTER TABLE `tbl_pertek`
  ADD CONSTRAINT `tbl_pertek_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `tbl_project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pertek_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pertek_det`
--
ALTER TABLE `tbl_pertek_det`
  ADD CONSTRAINT `tbl_pertek_det_ibfk_1` FOREIGN KEY (`id_pertek`) REFERENCES `tbl_pertek` (`id_pertek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pertek_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pertek_det_ibfk_3` FOREIGN KEY (`id_stock`) REFERENCES `tbl_stock` (`id_stock`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_po`
--
ALTER TABLE `tbl_po`
  ADD CONSTRAINT `tbl_po_ibfk_1` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_po_ibfk_2` FOREIGN KEY (`id_vendor`) REFERENCES `tbl_vendor` (`id_vendor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_po_ibfk_3` FOREIGN KEY (`id_project`) REFERENCES `tbl_project` (`id_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_po_det`
--
ALTER TABLE `tbl_po_det`
  ADD CONSTRAINT `tbl_po_det_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `tbl_po` (`id_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_po_det_ibfk_2` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_po_det_ibfk_3` FOREIGN KEY (`id_det_currency`) REFERENCES `tbl_det_currency` (`id_det_currency`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD CONSTRAINT `tbl_rak_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `tbl_gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sgbarang`
--
ALTER TABLE `tbl_sgbarang`
  ADD CONSTRAINT `tbl_sgbarang_ibfk_1` FOREIGN KEY (`id_gbarang`) REFERENCES `tbl_gbarang` (`id_gbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stock_ibfk_2` FOREIGN KEY (`id_po`) REFERENCES `tbl_po` (`id_po`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_stock_ibfk_3` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tipe_barang`
--
ALTER TABLE `tbl_tipe_barang`
  ADD CONSTRAINT `tbl_tipe_barang_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `tbl_merek` (`id_merek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`no_urut`) REFERENCES `tbl_barang` (`no_urut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transaksi_ibfk_2` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_uker`) REFERENCES `tbl_unit_kerja` (`id_uker`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;