-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_pobox
CREATE DATABASE IF NOT EXISTS `db_pobox` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_pobox`;

-- Dumping structure for table db_pobox.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `customer_pic` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_status` varchar(1) NOT NULL,
  `customer_user_id` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.customer: ~7 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_pic`, `customer_contact`, `customer_email`, `customer_status`, `customer_user_id`) VALUES
	('CSR00001', 'PT Amerta Indah Otsuka', 'Jl Raya Cicurug', 'Takagaki', '087765456785', 'communication@outsuka.co.id', '1', 'USR00004'),
	('CSR00002', 'Andri', 'Jl Primata Raya 01', 'Andri', '082244534556', 'andri@gmail.com', '1', 'USR00002'),
	('CSR00003', 'PT Indah Sari', 'Jl Udayana 02', 'Detia', '082287667654', 'detia@indahsari.com', '1', 'USR00003'),
	('CSR00004', 'PT Rasa Indonesia', 'Jl Perumnas 8 No 02', 'Rini', '082265565434', 'rini@rasaindo.com', '1', 'USR00006'),
	('CSR00005', 'rizal', 'Jl Pejuang Barat No 01', 'rizal', '082211345431', 'rizal@gmail.com', '1', 'USR00008'),
	('CSR00006', 'Tatam Rustaman', 'Jl Pemuda Raya', 'Tatam Rustaman', '087765456785', 'tatam248@gmail.com', '1', 'USR00005'),
	('CSR00007', 'Adini', 'Jl Timur Asia', 'Andini', '082211345543', 'andini@gmail.com', '1', 'USR00009');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table db_pobox.office
CREATE TABLE IF NOT EXISTS `office` (
  `office_id` varchar(50) NOT NULL,
  `office_name` varchar(50) DEFAULT NULL,
  `office_address` varchar(300) DEFAULT NULL,
  `office_regional` varchar(50) DEFAULT NULL,
  `office_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.office: ~7 rows (approximately)
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` (`office_id`, `office_name`, `office_address`, `office_regional`, `office_status`) VALUES
	('OFC00001', 'REGIONAL 1 MEDAN', 'MEDAN', '1', '1'),
	('OFC00002', 'REGIONAL 2 PALEMBANG', 'PALEMBANG', '1', '1'),
	('OFC00003', 'KANTOR POS JAKARTA UTARA', 'JAKARTA UTARA', 'OFC00004', '1'),
	('OFC00004', 'REGIONAL 4 JAKARTA', 'JAKARTA', '1', '1'),
	('OFC00005', 'KANTOR POS JAKARTA TIMUR', 'JAKARTA TIMUR', 'OFC00004', '1'),
	('OFC00006', 'REGIONAL 8 DENPASAR', 'DENPASAR', '1', '1'),
	('OFC00007', 'KANTOR POS GIANYAR', 'GIANYAR', 'OFC00006', '1');
/*!40000 ALTER TABLE `office` ENABLE KEYS */;

-- Dumping structure for table db_pobox.pobox
CREATE TABLE IF NOT EXISTS `pobox` (
  `pobox_id` varchar(50) NOT NULL,
  `pobox_office` varchar(50) DEFAULT NULL,
  `pobox_price` varchar(50) DEFAULT NULL,
  `pobox_status` varchar(1) DEFAULT NULL,
  `pobox_status_sale` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`pobox_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.pobox: ~15 rows (approximately)
/*!40000 ALTER TABLE `pobox` DISABLE KEYS */;
INSERT INTO `pobox` (`pobox_id`, `pobox_office`, `pobox_price`, `pobox_status`, `pobox_status_sale`) VALUES
	('130001', 'OFC00005', '50000', '1', '2'),
	('130002', 'OFC00005', '50000', '1', '2'),
	('130003', 'OFC00005', '50000', '1', '2'),
	('130004', 'OFC00005', '50000', '1', '2'),
	('130005', 'OFC00005', '50000', '1', '2'),
	('209010', 'OFC00005', '50000', '1', '2'),
	('209011', 'OFC00005', '50000', '1', '0'),
	('209012', 'OFC00005', '50000', '1', '0'),
	('209013', 'OFC00005', '50000', '1', '0'),
	('209014', 'OFC00005', '50000', '1', '0'),
	('209015', 'OFC00005', '50000', '1', '0'),
	('209016', 'OFC00005', '50000', '1', '0'),
	('209017', 'OFC00005', '50000', '1', '0'),
	('209018', 'OFC00005', '50000', '1', '0'),
	('209019', 'OFC00005', '50000', '1', '0');
/*!40000 ALTER TABLE `pobox` ENABLE KEYS */;

-- Dumping structure for table db_pobox.shipment
CREATE TABLE IF NOT EXISTS `shipment` (
  `shipment_id` varchar(50) NOT NULL,
  `shipment_barcode` varchar(50) NOT NULL,
  `shipment_pobox` varchar(50) DEFAULT NULL,
  `shipment_officer` varchar(50) DEFAULT NULL,
  `shipment_date_entry` datetime DEFAULT NULL,
  PRIMARY KEY (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.shipment: ~15 rows (approximately)
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`shipment_id`, `shipment_barcode`, `shipment_pobox`, `shipment_officer`, `shipment_date_entry`) VALUES
	('SHP00001', '11440001', '130001', 'USR00001', '2021-06-04 15:16:47'),
	('SHP00002', '11440002', '130001', 'USR00001', '2021-06-04 15:16:59'),
	('SHP00003', '11440003', '130001', 'USR00001', '2021-06-04 15:17:07'),
	('SHP00004', '11440004', '130002', 'USR00007', '2021-06-04 16:20:54'),
	('SHP00005', '11440005', '130002', 'USR00007', '2021-06-04 16:20:58'),
	('SHP00006', '11440006', '130002', 'USR00007', '2021-06-04 16:21:02'),
	('SHP00007', '11440007', '130002', 'USR00007', '2021-06-04 16:21:07'),
	('SHP00008', '11440008', '130003', 'USR00007', '2021-06-04 16:21:25'),
	('SHP00009', '11440009', '130003', 'USR00007', '2021-06-04 16:21:30'),
	('SHP00010', '11440010', '130003', 'USR00007', '2021-06-04 16:21:36'),
	('SHP00011', '11440011', '130003', 'USR00007', '2021-06-04 16:21:42'),
	('SHP00012', '11440012', '130003', 'USR00007', '2021-06-04 16:21:47'),
	('SHP00013', '11440013', '130004', 'USR00007', '2021-06-04 16:21:55'),
	('SHP00014', '11440014', '130004', 'USR00007', '2021-06-04 16:22:05'),
	('SHP00015', '11440015', '130005', 'USR00001', '2021-06-04 16:25:25'),
	('SHP00016', '11440016', '130005', 'USR00001', '2021-06-04 16:25:30');
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;

-- Dumping structure for table db_pobox.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `transaction_id` varchar(50) NOT NULL,
  `transaction_pobox` varchar(50) NOT NULL,
  `transaction_user` varchar(50) NOT NULL,
  `transaction_total_price` varchar(50) NOT NULL,
  `transaction_from_date` date NOT NULL,
  `transaction_until_date` date NOT NULL,
  `transaction_month` int(11) NOT NULL DEFAULT 0,
  `transaction_status` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_date_pay` datetime DEFAULT NULL,
  `transaction_date_confirm` datetime DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.transaction: ~7 rows (approximately)
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` (`transaction_id`, `transaction_pobox`, `transaction_user`, `transaction_total_price`, `transaction_from_date`, `transaction_until_date`, `transaction_month`, `transaction_status`, `transaction_date`, `transaction_date_pay`, `transaction_date_confirm`) VALUES
	('TRX00001', '130001', 'USR00004', '600000', '2021-05-30', '2022-05-30', 12, '3', '2021-05-30 13:44:23', '2021-06-04 20:36:16', '2021-06-04 20:36:18'),
	('TRX00002', '130003', 'USR00002', '600000', '2021-06-01', '2022-06-01', 12, '3', '2021-06-01 08:04:16', '2021-06-04 20:36:15', '2021-06-04 20:36:18'),
	('TRX00003', '130004', 'USR00003', '600000', '2021-06-01', '2022-06-01', 12, '3', '2021-06-01 09:21:08', '2021-06-04 20:36:14', '2021-06-04 20:36:19'),
	('TRX00004', '130002', 'USR00006', '300000', '2021-06-01', '2021-12-01', 6, '3', '2021-06-01 15:22:51', '2021-06-04 20:36:13', '2021-06-04 20:36:20'),
	('TRX00005', '130005', 'USR00008', '250000', '2021-06-02', '2021-06-14', 5, '3', '2021-06-02 14:58:46', '2021-06-04 20:36:12', '2021-06-04 20:36:21'),
	('TRX00006', '209010', 'USR00005', '600000', '2021-06-04', '2022-06-04', 12, '3', '2021-06-04 15:35:17', '2021-06-04 15:35:29', '2021-06-04 15:35:58'),
	('TRX00007', '130005', 'USR00008', '50000', '2021-06-12', '2021-07-12', 1, '3', '2021-06-12 06:47:37', '2021-06-12 06:47:44', '2021-06-12 06:48:05');
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

-- Dumping structure for table db_pobox.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.user: ~8 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`, `user_type`) VALUES
	('USR00001', 'Chandra Ahmad Rizki', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1'),
	('USR00002', 'Andri', 'andri@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00003', 'Detia', 'detia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00004', 'Imam', 'imam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00005', 'Tatam Rustaman', 'tatam248@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00006', 'Rini', 'rini@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00007', 'Bayu', 'bayu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '2'),
	('USR00008', 'rizal', 'rizal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00009', 'Andini', 'andini@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
