-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_pengiriman
CREATE DATABASE IF NOT EXISTS `db_pengiriman` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pengiriman`;

-- Dumping structure for table db_pengiriman.capacity
CREATE TABLE IF NOT EXISTS `capacity` (
  `id_capacity` int NOT NULL,
  `schedule` date NOT NULL,
  `id_truck` int NOT NULL,
  `id_driver` int NOT NULL,
  `b_capacity` int NOT NULL,
  `r_capacity` float NOT NULL,
  `t_package` int NOT NULL,
  `receive` int NOT NULL,
  `return` int NOT NULL,
  `cstatus` int NOT NULL,
  PRIMARY KEY (`id_capacity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.capacity: ~20 rows (approximately)
REPLACE INTO `capacity` (`id_capacity`, `schedule`, `id_truck`, `id_driver`, `b_capacity`, `r_capacity`, `t_package`, `receive`, `return`, `cstatus`) VALUES
	(1001, '2023-11-12', 1001, 1001, 1500, 5.25, 3, 1, 1, 3),
	(1002, '2023-11-11', 1002, 1002, 2800, 12.6, 2, 0, 2, 3),
	(1003, '2023-11-13', 1001, 1001, 0, 0, 5, 0, 0, 3),
	(1004, '2024-08-21', 1002, 1003, 250, 0.75, 1, 1, 0, 3),
	(1005, '2024-08-01', 1001, 1001, 0, 0, 2, 0, 0, 3),
	(1006, '2024-09-07', 1001, 1003, 600, 1.8, 3, 1, 0, 3),
	(1007, '2024-09-01', 1001, 1003, 0, 0, 1, 0, 1, 3),
	(1008, '2024-08-01', 1001, 1004, 1726, 0.75, 2, 2, 0, 3),
	(1009, '2024-09-01', 1001, 1004, 12300, 55.35, 1, 1, 0, 3),
	(1011, '2024-09-02', 1001, 1005, 1868664, 0, 1, 1, 0, 3),
	(1012, '2024-09-01', 0, 1005, 1200, 5.4, 2, 1, 0, 3),
	(1013, '2024-09-02', 0, 1005, 100, 0.45, 2, 1, 0, 3),
	(1014, '2024-09-04', 0, 1005, 0, 0, 1, 0, 0, 3),
	(1015, '0000-00-00', 0, 0, 0, 0, 0, 0, 0, 0),
	(1016, '2024-09-06', 0, 1005, 0, 0, 0, 0, 0, 3),
	(1017, '2024-09-12', 0, 1004, 15129, 0, 1, 0, 1, 3),
	(1018, '2024-09-04', 0, 1004, 0, 0, 0, 0, 0, 3),
	(1019, '2024-09-07', 0, 1006, 1000, 0, 1, 1, 0, 3),
	(1020, '2024-09-04', 0, 1004, 0, 0, 0, 0, 0, 3),
	(1021, '2024-09-05', 0, 1004, 16605, 0, 2, 2, 0, 3),
	(1022, '2024-09-28', 0, 1006, 15129, 0, 1, 1, 0, 3),
	(1023, '2024-09-05', 0, 1003, 0, 0, 0, 0, 0, 0),
	(1024, '2024-09-05', 0, 1005, 1200, 0, 1, 1, 0, 3),
	(1025, '2024-10-02', 0, 1005, 0, 0, 0, 0, 0, 3),
	(1026, '2024-09-01', 0, 1004, 1476, 0, 1, 1, 0, 3),
	(1027, '2024-09-06', 0, 1006, 0, 0, 1, 0, 0, 2),
	(1028, '2024-09-26', 0, 1006, 2676, -5.4, 1, 0, 1, 3);

-- Dumping structure for table db_pengiriman.driver
CREATE TABLE IF NOT EXISTS `driver` (
  `id_driver` int NOT NULL,
  `driver` varchar(25) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id_driver`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.driver: ~2 rows (approximately)
REPLACE INTO `driver` (`id_driver`, `driver`, `phone`, `email`) VALUES
	(1004, 'Bandung', '0812', 'as@as.com'),
	(1005, 'Pekalongan', '0821', 'pekalongan@gmail.com'),
	(1006, 'Jakarta', '0821', '123@gmail.com');

-- Dumping structure for table db_pengiriman.kota
CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int NOT NULL,
  `id_prov` int NOT NULL,
  `kota` varchar(25) NOT NULL,
  `priority` int NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.kota: ~53 rows (approximately)
REPLACE INTO `kota` (`id_kota`, `id_prov`, `kota`, `priority`) VALUES
	(1, 1, 'Banda Aceh', 1),
	(2, 1, 'Lhokseumawe', 1),
	(3, 2, 'Denpasar', 2),
	(4, 2, 'Singaraja', 2),
	(5, 3, 'Serang', 3),
	(6, 3, 'Tangerang', 3),
	(7, 4, 'Bengkulu', 4),
	(8, 5, 'Yogyakarta', 5),
	(9, 6, 'Central Jakarta', 6),
	(10, 6, 'North Jakarta', 6),
	(11, 6, 'South Jakarta', 6),
	(12, 6, 'East Jakarta', 6),
	(13, 6, 'West Jakarta', 6),
	(14, 7, 'Jambi', 7),
	(15, 8, 'Bandung', 8),
	(16, 8, 'Bogor', 8),
	(17, 8, 'Depok', 8),
	(18, 8, 'Sukabumi', 8),
	(19, 9, 'Semarang', 9),
	(20, 9, 'Solo', 9),
	(21, 9, 'Purwokerto', 9),
	(22, 10, 'Surabaya', 10),
	(23, 10, 'Malang', 10),
	(24, 10, 'Kediri', 10),
	(25, 11, 'Pontianak', 11),
	(26, 11, 'Singkawang', 11),
	(27, 12, 'Banjarmasin', 12),
	(28, 12, 'Banjarbaru', 12),
	(29, 13, 'Palangka Raya', 13),
	(30, 14, 'Samarinda', 14),
	(31, 14, 'Balikpapan', 14),
	(32, 15, 'Tarakan', 15),
	(33, 16, 'Pangkalpinang', 16),
	(34, 17, 'Batam', 17),
	(35, 17, 'Tanjungpinang', 17),
	(36, 18, 'Bandar Lampung', 18),
	(37, 19, 'Ambon', 19),
	(38, 20, 'Ternate', 20),
	(39, 20, 'Tidore', 20),
	(40, 21, 'Mataram', 21),
	(41, 21, 'Bima', 21),
	(42, 22, 'Kupang', 22),
	(43, 23, 'Jayapura', 23),
	(44, 24, 'Manokwari', 24),
	(45, 25, 'Pekanbaru', 25),
	(46, 26, 'Mamuju', 26),
	(47, 27, 'Makassar', 27),
	(48, 28, 'Palu', 28),
	(49, 29, 'Kendari', 29),
	(50, 30, 'Manado', 30),
	(51, 31, 'Padang', 31),
	(52, 32, 'Palembang', 32),
	(53, 33, 'Medan', 33);

-- Dumping structure for table db_pengiriman.package
CREATE TABLE IF NOT EXISTS `package` (
  `id_package` int NOT NULL,
  `no_package` varchar(11) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `id_kota` int NOT NULL,
  `t_kg` int NOT NULL,
  `t_kgv` float NOT NULL,
  `date` date NOT NULL,
  `received_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `pstatus` int NOT NULL,
  `metode_pembayaran` varchar(100) DEFAULT NULL,
  `jangka_waktu` varchar(100) DEFAULT NULL,
  `jumlah_hutang` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_package`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.package: ~15 rows (approximately)
REPLACE INTO `package` (`id_package`, `no_package`, `customer_name`, `phone`, `address`, `id_kota`, `t_kg`, `t_kgv`, `date`, `received_date`, `return_date`, `pstatus`, `metode_pembayaran`, `jangka_waktu`, `jumlah_hutang`) VALUES
	(1001, 'PACK001', 'Reza', '1231231231', 'Tangerang, Banten', 1, 1000, 3.75, '2023-11-11', NULL, NULL, 4, NULL, NULL, NULL),
	(1002, 'PACK002', 'Aditiya', '082132312', 'Jakarta', 2, 500, 1.5, '2023-11-11', NULL, NULL, 2, NULL, NULL, NULL),
	(1003, 'PACK003', 'Rezare', '0984324', 'Tangerang Indah', 1, 1050, 3.15, '2023-11-11', NULL, NULL, 2, NULL, NULL, NULL),
	(1004, 'PACK004', 'Mrezadit', '0896875877', 'Bekasi Bekasi', 3, 2000, 9, '2023-11-11', NULL, NULL, 2, NULL, NULL, NULL),
	(1005, 'PACK005', 'Retza', '027129112', 'Tangerang', 1, 800, 3.6, '2023-11-11', NULL, NULL, 2, NULL, NULL, NULL),
	(1006, 'PACK006', 'Aiya', '098989', 'Tangerang', 1, 250, 0.75, '2023-11-12', NULL, NULL, 4, NULL, NULL, NULL),
	(1007, 'PACK007', 'Bandung', '123', '13', 1, 1200, 5.4, '2024-08-31', NULL, NULL, 4, NULL, NULL, NULL),
	(1009, 'PACK009', 'Yizreel123', '123', '123', 5, 12300, 55.35, '2024-09-01', NULL, NULL, 4, NULL, NULL, NULL),
	(1011, 'PACK011', 'Yizreel Manurung1', '123', '123', 46, 1868664, 0, '2024-09-01', NULL, NULL, 4, NULL, NULL, NULL),
	(1012, 'PACK012', 'Yizreel1232', '123', '123', 36, 100, 0.45, '2024-09-02', NULL, NULL, 4, NULL, NULL, NULL),
	(1013, 'PACK013', 'Yizreel', '0821', 'aceh', 2, 1476, 0, '2024-09-02', NULL, NULL, 4, NULL, NULL, NULL),
	(1014, 'PACK014', 'Yizreel Manurung11', '123', '123', 43, 1476, 0, '2024-09-25', NULL, NULL, 4, NULL, NULL, NULL),
	(1015, 'PACK015', 'Yiz test', '123', '123', 42, 15129, 0, '2024-09-25', '2024-09-04', NULL, 4, NULL, NULL, NULL),
	(1016, 'PACK016', 'Yizreel123123', '123', '123', 43, 15129, 0, '2024-09-25', NULL, NULL, 4, NULL, NULL, NULL),
	(1017, 'PACK017', 'RR Prod', '08215746', '123', 37, 1000, 0, '2024-09-04', NULL, NULL, 4, NULL, NULL, NULL),
	(1018, 'PACK018', 'Testing Penerima', '0821', '123', 41, 1476, 0, '2024-10-05', '2024-09-05', NULL, 4, NULL, NULL, NULL),
	(1019, 'PACK019', 'Yizreel123', '123', '123', 45, 1200, 5.4, '2024-09-05', '2024-09-05', NULL, 4, 'tunai', NULL, NULL),
	(1020, 'PACK020', '123', '123', '123', 46, 0, 0, '2024-10-12', NULL, NULL, 2, 'transfer', NULL, NULL),
	(1021, 'PACK021', 'asd', '213', '123', 46, 2676, 5.4, '2024-10-11', NULL, NULL, 3, 'hutang', '3', NULL);

-- Dumping structure for table db_pengiriman.product
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `berat` float NOT NULL,
  `panjang` int NOT NULL,
  `tinggi` int NOT NULL,
  `lebar` int NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.product: ~6 rows (approximately)
REPLACE INTO `product` (`id_product`, `product_name`, `berat`, `panjang`, `tinggi`, `lebar`) VALUES
	(1001, 'Lemari', 100, 100, 90, 50),
	(1002, 'Meja', 50, 100, 30, 50),
	(1003, 'Komputer', 123, 0, 0, 0),
	(1004, 'Laptop', 12, 0, 0, 0),
	(1005, 'Desktop LG', 10, 0, 0, 0);

-- Dumping structure for table db_pengiriman.provinsi
CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int NOT NULL,
  `provinsi` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `priority` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pengiriman.provinsi: ~33 rows (approximately)
REPLACE INTO `provinsi` (`id_provinsi`, `provinsi`, `priority`) VALUES
	(1, 'Aceh', 1),
	(2, 'Bali', 2),
	(3, 'Banten', 3),
	(4, 'Bengkulu', 4),
	(5, 'DI Yogyakarta', 5),
	(6, 'DKI Jakarta', 6),
	(7, 'Jambi', 7),
	(8, 'Jawa Barat', 8),
	(9, 'Jawa Tengah', 9),
	(10, 'Jawa Timur', 10),
	(11, 'Kalimantan Barat', 11),
	(12, 'Kalimantan Selatan', 12),
	(13, 'Kalimantan Tengah', 13),
	(14, 'Kalimantan Timur', 14),
	(15, 'Kalimantan Utara', 15),
	(16, 'Kepulauan Bangka Belitung', 16),
	(17, 'Kepulauan Riau', 17),
	(18, 'Lampung', 18),
	(19, 'Maluku', 19),
	(20, 'Maluku Utara', 20),
	(21, 'Nusa Tenggara Barat', 21),
	(22, 'Nusa Tenggara Timur', 22),
	(23, 'Papua', 23),
	(24, 'Papua Barat', 24),
	(25, 'Riau', 25),
	(26, 'Sulawesi Barat', 26),
	(27, 'Sulawesi Selatan', 27),
	(28, 'Sulawesi Tengah', 28),
	(29, 'Sulawesi Tenggara', 29),
	(30, 'Sulawesi Utara', 30),
	(31, 'Sumatera Barat', 31),
	(32, 'Sumatera Selatan', 32),
	(33, 'Sumatera Utara', 33);

-- Dumping structure for table db_pengiriman.truck
CREATE TABLE IF NOT EXISTS `truck` (
  `id_truck` int NOT NULL,
  `truck` varchar(25) NOT NULL,
  `no_plate` varchar(11) NOT NULL,
  `bmax` int NOT NULL,
  `capacity` int NOT NULL,
  PRIMARY KEY (`id_truck`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.truck: ~2 rows (approximately)
REPLACE INTO `truck` (`id_truck`, `truck`, `no_plate`, `bmax`, `capacity`) VALUES
	(1001, 'Mobil Box', 'B 1234 Tes', 6000, 20),
	(1002, 'Mobil Box 2', 'B 1231 DRV', 3000, 15);

-- Dumping structure for table db_pengiriman.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(50) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `role` varchar(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cabid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=ucs2;

-- Dumping data for table db_pengiriman.user: ~3 rows (approximately)
REPLACE INTO `user` (`user_id`, `username`, `password`, `role`, `email`, `cabid`) VALUES
	('1', 'admin', 'admin', 'admin', NULL, '1'),
	('3', 'driver', 'driver', 'driver', NULL, '2'),
	('BAN70845', 'Bandung', '123', 'driver', 'admin@gmail.com', '123'),
	('YIZ71650', 'Yizreel', '123', 'admin', 'superadmin@bsm.co.id', '1');

-- Dumping structure for table db_pengiriman.v_capacity
CREATE TABLE IF NOT EXISTS `v_capacity` (
  `id_vcapacity` int NOT NULL,
  `id_capacity` int NOT NULL,
  `id_package` int NOT NULL,
  `rstatus` int NOT NULL,
  PRIMARY KEY (`id_vcapacity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.v_capacity: ~24 rows (approximately)
REPLACE INTO `v_capacity` (`id_vcapacity`, `id_capacity`, `id_package`, `rstatus`) VALUES
	(1001, 1001, 0, 0),
	(1002, 1001, 1001, 2),
	(1005, 1002, 1004, 3),
	(1006, 1002, 1005, 3),
	(1009, 1004, 1006, 2),
	(1010, 1003, 0, 0),
	(1011, 1003, 0, 0),
	(1012, 1005, 0, 0),
	(1014, 1005, 0, 0),
	(1015, 1003, 0, 0),
	(1016, 1003, 0, 0),
	(1017, 1003, 1009, 2),
	(1018, 1006, 0, 0),
	(1019, 1006, 0, 0),
	(1020, 1006, 1010, 2),
	(1022, 1008, 1006, 2),
	(1023, 1009, 1009, 2),
	(1024, 1008, 1013, 2),
	(1027, 1011, 1011, 2),
	(1029, 1012, 0, 0),
	(1030, 1012, 1007, 2),
	(1031, 1013, 0, 0),
	(1032, 1013, 1012, 2),
	(1033, 1014, 0, 0),
	(1034, 1017, 1015, 2),
	(1035, 1019, 1017, 2),
	(1036, 1021, 1014, 2),
	(1037, 1021, 1016, 2),
	(1038, 1022, 1015, 2),
	(1039, 1024, 1019, 2),
	(1040, 1026, 1018, 2),
	(1041, 1027, 1020, 0),
	(1042, 1028, 1021, 3);

-- Dumping structure for table db_pengiriman.v_package
CREATE TABLE IF NOT EXISTS `v_package` (
  `id_vpackage` int NOT NULL,
  `id_package` int NOT NULL,
  `id_product` int NOT NULL,
  `qty` int NOT NULL,
  `t_berat` int NOT NULL,
  `t_volume` float NOT NULL,
  PRIMARY KEY (`id_vpackage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_pengiriman.v_package: ~16 rows (approximately)
REPLACE INTO `v_package` (`id_vpackage`, `id_package`, `id_product`, `qty`, `t_berat`, `t_volume`) VALUES
	(1001, 1001, 1001, 5, 500, 2.25),
	(1002, 1001, 1002, 10, 500, 1.5),
	(1003, 1002, 1002, 10, 500, 1.5),
	(1004, 1003, 1002, 21, 1050, 3.15),
	(1005, 1004, 1001, 20, 2000, 9),
	(1006, 1005, 1001, 8, 800, 3.6),
	(1007, 1006, 1002, 5, 250, 0.75),
	(1009, 1002, 1001, 12, 1200, 5.4),
	(1011, 1009, 1001, 123, 12300, 55.35),
	(1012, 1012, 1001, 1, 100, 0.45),
	(1013, 1013, 1003, 12, 1476, 0),
	(1014, 1011, 1004, 12, 144, 0),
	(1015, 1011, 1004, 155, 1860, 0),
	(1016, 1011, 1004, 155555, 1866660, 0),
	(1017, 1007, 1001, 12, 1200, 5.4),
	(1018, 1014, 1004, 123, 1476, 0),
	(1019, 1015, 1003, 123, 15129, 0),
	(1020, 1016, 1003, 123, 15129, 0),
	(1021, 1017, 1005, 100, 1000, 0),
	(1023, 1018, 1003, 12, 1476, 0),
	(1024, 1019, 1001, 12, 1200, 5.4),
	(1025, 1021, 1001, 12, 1200, 5.4),
	(1026, 1021, 1003, 1, 123, 0),
	(1027, 1021, 1003, 1, 123, 0),
	(1028, 1021, 1005, 123, 1230, 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
