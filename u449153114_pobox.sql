USE `u449153114_pobox`;

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

-- Dumping data for table db_pobox.customer: ~1 rows (approximately)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_address`, `customer_pic`, `customer_contact`, `customer_email`, `customer_status`, `customer_user_id`) VALUES
	('CSR00001', 'PT Amerta Indah Otsuka', 'Jl Kemanggisan Pulo No 03', 'Imam', '082245162413', 'imam@gmail.com', '1', 'USR00008'),
	('CSR00002', 'PT Indah Sari', 'Jl Pemuda Raya No 01', 'Andri', '082288762515', 'andri@gmail.com', '1', 'USR00009'),
	('CSR00003', 'PT Indonlakto', 'Jl Raya Cicurug No 09', 'Detia', '082245172615', 'detia@gmail.com', '1', 'USR00010');
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

-- Dumping data for table db_pobox.office: ~2 rows (approximately)
/*!40000 ALTER TABLE `office` DISABLE KEYS */;
INSERT INTO `office` (`office_id`, `office_name`, `office_address`, `office_regional`, `office_status`) VALUES
	('OFC00001', 'REGIONAL 4 JAKARTA', 'Jl Lapangan Banteng No 01', '1', '1'),
	('OFC00002', 'KANTOR POS JAKARTA TIMUR', 'JAKARTA TIMUR', 'OFC00001', '1');
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

-- Dumping data for table db_pobox.pobox: ~20 rows (approximately)
/*!40000 ALTER TABLE `pobox` DISABLE KEYS */;
INSERT INTO `pobox` (`pobox_id`, `pobox_office`, `pobox_price`, `pobox_status`, `pobox_status_sale`) VALUES
	('1001', 'OFC00002', '15000', '1', '2'),
	('1002', 'OFC00002', '15000', '1', '2'),
	('1003', 'OFC00002', '15000', '1', '0'),
	('1004', 'OFC00002', '15000', '1', '0'),
	('1005', 'OFC00002', '15000', '1', '0'),
	('1006', 'OFC00002', '15000', '1', '0'),
	('1007', 'OFC00002', '15000', '1', '0'),
	('1008', 'OFC00002', '15000', '1', '0'),
	('1009', 'OFC00002', '15000', '1', '0'),
	('1010', 'OFC00002', '15000', '1', '0'),
	('1011', 'OFC00002', '15000', '1', '0'),
	('1012', 'OFC00002', '15000', '1', '0'),
	('1013', 'OFC00002', '15000', '1', '0'),
	('1014', 'OFC00002', '15000', '1', '0'),
	('1015', 'OFC00002', '15000', '1', '0'),
	('1016', 'OFC00002', '15000', '1', '0'),
	('1017', 'OFC00002', '15000', '1', '0'),
	('1018', 'OFC00002', '15000', '1', '0'),
	('1019', 'OFC00002', '15000', '1', '0'),
	('1020', 'OFC00002', '15000', '1', '2');
/*!40000 ALTER TABLE `pobox` ENABLE KEYS */;

-- Dumping structure for table db_pobox.shipment
CREATE TABLE IF NOT EXISTS `shipment` (
  `shipment_id` varchar(50) NOT NULL,
  `shipment_barcode` varchar(50) NOT NULL,
  `shipment_pobox` varchar(50) DEFAULT NULL,
  `shipment_officer` varchar(50) DEFAULT NULL,
  `shipment_date_entry` datetime DEFAULT NULL,
  `shipment_status` int(11) DEFAULT 0,
  `shipment_status_date` datetime DEFAULT NULL,
  PRIMARY KEY (`shipment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_pobox.shipment: ~4 rows (approximately)
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`shipment_id`, `shipment_barcode`, `shipment_pobox`, `shipment_officer`, `shipment_date_entry`, `shipment_status`, `shipment_status_date`) VALUES
	('SHP00001', 'RNB0001', '1001', 'USR00001', '2021-10-31 05:51:02', 1, '2021-10-31 06:11:48'),
	('SHP00002', 'RNB0002', '1001', 'USR00001', '2021-10-31 05:51:06', 1, '2021-10-31 06:11:48'),
	('SHP00003', 'RNB0003', '1001', 'USR00001', '2021-10-31 05:51:09', 1, '2021-10-31 06:11:48'),
	('SHP00004', 'RNB0004', '1001', 'USR00001', '2021-10-31 05:51:24', 1, '2021-10-31 06:11:48'),
	('SHP00005', 'RNB0005', '1001', 'USR00001', '2021-10-31 06:40:49', 1, '2021-10-31 06:46:29'),
	('SHP00006', 'RNB0006', '1001', 'USR00001', '2021-10-31 06:48:23', 1, '2021-10-31 07:27:01'),
	('SHP00007', 'RNB0007', '1001', 'USR00001', '2021-10-31 06:48:27', 1, '2021-10-31 07:27:01'),
	('SHP00008', 'RNB0010', '1002', 'USR00001', '2021-10-31 07:26:12', 1, '2021-10-31 07:26:36'),
	('SHP00009', 'RNB0011', '1002', 'USR00001', '2021-10-31 07:26:20', 1, '2021-10-31 07:26:36'),
	('SHP00010', 'RNB0020', '1020', 'USR00001', '2021-10-31 07:30:16', 1, '2021-10-31 07:30:32'),
	('SHP00011', 'RNB0021', '1020', 'USR00001', '2021-10-31 07:30:21', 1, '2021-10-31 07:30:32'),
	('SHP00012', 'RNB0022', '1020', 'USR00001', '2021-10-31 07:30:26', 1, '2021-10-31 07:30:32');
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

-- Dumping data for table db_pobox.transaction: ~1 rows (approximately)
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` (`transaction_id`, `transaction_pobox`, `transaction_user`, `transaction_total_price`, `transaction_from_date`, `transaction_until_date`, `transaction_month`, `transaction_status`, `transaction_date`, `transaction_date_pay`, `transaction_date_confirm`) VALUES
	('TRX00001', '1001', 'USR00008', '180000', '2020-08-31', '2021-08-31', 12, '3', '2021-10-31 05:43:26', '2021-10-31 05:46:22', '2021-10-31 05:48:10'),
	('TRX00002', '1001', 'USR00008', '15000', '2021-08-31', '2021-10-01', 1, '3', '2021-10-31 06:01:31', '2021-10-31 06:01:37', '2021-10-31 06:02:29'),
	('TRX00003', '1001', 'USR00009', '30000', '2021-10-31', '2021-10-31', 2, '3', '2021-10-31 06:36:49', '2021-10-31 06:36:56', '2021-10-31 06:37:05'),
	('TRX00004', '1001', 'USR00009', '15000', '2021-10-31', '2021-12-01', 1, '3', '2021-10-31 07:24:15', '2021-10-31 07:24:24', '2021-10-31 07:24:40'),
	('TRX00005', '1002', 'USR00008', '180000', '2021-10-31', '2022-10-31', 12, '3', '2021-10-31 07:25:16', '2021-10-31 07:25:22', '2021-10-31 07:25:35'),
	('TRX00006', '1020', 'USR00010', '360000', '2021-10-31', '2023-10-31', 24, '3', '2021-10-31 07:29:35', '2021-10-31 07:29:41', '2021-10-31 07:30:02');
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

-- Dumping data for table db_pobox.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_status`, `user_type`) VALUES
	('USR00001', 'Chandra Ahmad Rizki', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1'),
	('USR00007', 'Bayu', 'bayu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '2'),
	('USR00008', 'Imam', 'imam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00009', 'Andri', 'andri@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3'),
	('USR00010', 'Detia', 'detia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '3');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
