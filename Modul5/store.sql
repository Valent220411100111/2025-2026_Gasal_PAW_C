/*
SQLyog Community v12.4.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - store
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`store` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `store`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `fk_sup_id` (`supplier_id`),
  CONSTRAINT `fk_sup_id` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`kode_barang`,`nama_barang`,`harga`,`stok`,`supplier_id`) values 
(1,'B001','Kopi Arabika',15000,100,1),
(2,'B002','Kopi Robusta',12000,150,1),
(3,'B003','Susu Full Cream',8000,80,2),
(4,'B004','Susu UHT',7500,60,2),
(5,'B005','Teh Hijau',6000,50,3),
(6,'B006','Teh Hitam',5500,40,3),
(7,'B007','Indomie Goreng',3000,200,4),
(8,'B008','Indomie Kuah',3000,180,4),
(9,'B009','Kopi Susu',20000,90,5),
(10,'B010','Teh Manis',7000,75,6),
(11,'B011','Susu Coklat',9000,70,2),
(12,'B012','Kopi Latte',25000,30,1),
(13,'B013','Teh Melati',6500,65,3),
(14,'B014','Kopi Capucino',22000,50,1),
(15,'B015','Indomie Rasa Ayam',3200,210,4);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama`,`jenis_kelamin`,`telp`,`alamat`) values 
('P001','Ali','L','082345678901','Jl. Raya No. 1'),
('P002','Budi','L','082345678902','Jl. Pahlawan No. 2'),
('P003','Citra','P','082345678903','Jl. Merdeka No. 3'),
('P004','Dewi','P','082345678904','Jl. Suka No. 4'),
('P005','Eko','L','082345678905','Jl. Damai No. 5'),
('P006','Fani','P','082345678906','Jl. Indah No. 6'),
('P007','Guntur','L','082345678907','Jl. Jaya No. 7'),
('P008','Hani','P','082345678908','Jl. Elok No. 8'),
('P009','Indra','L','082345678909','Jl. Sari No. 9'),
('P010','Joko','L','082345678910','Jl. Cinta No. 10'),
('P011','Kiki','P','082345678911','Jl. Bahagia No. 11'),
('P012','Lina','P','082345678912','Jl. Sejuk No. 12'),
('P013','Mila','P','082345678913','Jl. Rindu No. 13'),
('P014','Nia','P','082345678914','Jl. Sejahtera No. 14'),
('P015','Oka','L','082345678915','Jl. Berkah No. 15');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`),
  KEY `fk_trans_id` (`transaksi_id`),
  CONSTRAINT `fk_trans_id` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`waktu_bayar`,`total`,`metode`,`transaksi_id`) values 
(1,'2024-10-01 10:00:00',50000,'TUNAI',1),
(2,'2024-10-02 11:00:00',30000,'TRANSFER',2),
(3,'2024-10-03 09:30:00',40000,'EDC',3),
(4,'2024-10-04 15:00:00',15000,'TUNAI',4),
(5,'2024-10-05 13:45:00',25000,'TRANSFER',5),
(6,'2024-10-06 14:00:00',12000,'TUNAI',6),
(7,'2024-10-07 16:00:00',30000,'EDC',7),
(8,'2024-10-08 08:30:00',20000,'TUNAI',8),
(9,'2024-10-09 11:15:00',8000,'TRANSFER',9),
(10,'2024-10-10 17:30:00',35000,'EDC',10),
(11,'2024-10-11 12:00:00',6000,'TUNAI',11),
(12,'2024-10-12 09:00:00',7000,'TRANSFER',12),
(13,'2024-10-13 14:30:00',22000,'EDC',13),
(14,'2024-10-14 11:45:00',6500,'TUNAI',14),
(15,'2024-10-15 15:20:00',12000,'TRANSFER',15);

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `supplier` */

insert  into `supplier`(`id_supplier`,`nama`,`telp`,`alamat`) values 
(1,'Toko Barokah','081234567890','Jl. Barokah No. 1'),
(2,'Toko Maju Mapan','081234567891','Jl. Maju Mapan No. 2'),
(3,'Toko Sukses Selalu','081234567892','Jl. Sukses No. 3'),
(4,'Toko Segar Selalu','081234567893','Jl. Segar No. 4'),
(5,'Toko Sejahtera','081234567894','Jl. Sejahtera No. 5'),
(6,'Toko Sumber Rejeki','081234567895','Jl. Rejeki No. 6'),
(7,'Toko Berkah','081234567896','Jl. Berkah No. 7'),
(8,'Toko Roti Bakar','081234567897','Jl. Roti Bakar No. 8'),
(9,'Toko Minuman Segar','081234567898','Jl. Minuman No. 9'),
(10,'Toko Makanan Kecil','081234567899','Jl. Makanan Kecil No. 10'),
(11,'Toko Daging Sapi','081234567900','Jl. Daging No. 11'),
(12,'Toko Sayur Segar','081234567901','Jl. Sayur No. 12'),
(13,'Toko Bahan Kue','081234567902','Jl. Kue No. 13'),
(14,'Toko Bahan Pokok','081234567903','Jl. Pokok No. 14'),
(15,'Toko Rempah-rempah','081234567904','Jl. Rempah No. 15');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `fk_pelanggan_transaksi` (`pelanggan_id`),
  CONSTRAINT `fk_pelanggan_transaksi` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`waktu_transaksi`,`keterangan`,`total`,`pelanggan_id`) values 
(1,'2024-10-01','Pembelian kopi dan Indomie',50000,'P001'),
(2,'2024-10-02','Pembelian teh dan susu',30000,'P002'),
(3,'2024-10-03','Pembelian kopi susu',40000,'P003'),
(4,'2024-10-04','Pembelian Indomie dan teh',15000,'P004'),
(5,'2024-10-05','Pembelian kopi Arabika',25000,'P005'),
(6,'2024-10-06','Pembelian susu UHT',12000,'P006'),
(7,'2024-10-07','Pembelian kopi latte',30000,'P007'),
(8,'2024-10-08','Pembelian teh manis',20000,'P008'),
(9,'2024-10-09','Pembelian Indomie goreng',8000,'P009'),
(10,'2024-10-10','Pembelian kopi dan susu coklat',35000,'P010'),
(11,'2024-10-11','Pembelian Indomie kuah',6000,'P011'),
(12,'2024-10-12','Pembelian teh hijau',7000,'P012'),
(13,'2024-10-13','Pembelian kopi cappuccino',22000,'P013'),
(14,'2024-10-14','Pembelian teh melati',6500,'P014'),
(15,'2024-10-15','Pembelian kopi robusta',12000,'P015');

/*Table structure for table `transaksi_detail` */

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`transaksi_id`,`barang_id`),
  KEY `fk_barang_id` (`barang_id`),
  CONSTRAINT `fk_barang_id` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `fk_tran_id` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `transaksi_detail` */

insert  into `transaksi_detail`(`transaksi_id`,`barang_id`,`harga`,`qty`) values 
(1,1,15000,2),
(1,7,3000,1),
(2,3,8000,2),
(2,5,6000,2),
(3,1,15000,1),
(3,3,8000,1),
(4,5,6000,1),
(4,7,3000,2),
(5,1,15000,1),
(5,2,12000,1),
(6,3,8000,1),
(7,1,15000,2),
(7,4,7500,1),
(8,5,6000,1),
(9,7,3000,1),
(10,1,15000,1),
(10,3,8000,1),
(11,7,3000,1),
(12,5,6000,1),
(13,1,15000,1),
(14,5,6000,1),
(15,2,12000,1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama`,`alamat`,`hp`,`level`) values 
(1,'admin_warungkopi','admin123','Administrator','Jl. Utama No. 1','081234567890',1),
(2,'kasir_warungkopi1','kasir123','Kasir 1','Jl. Kasir No. 2','081234567891',2),
(3,'kasir_warungkopi2','kasir123','Kasir 2','Jl. Kasir No. 3','081234567892',2),
(4,'admin_kopi','admin_kopi123','Admin Kopi','Jl. Kopi No. 4','081234567893',1),
(5,'staf_operasional','staf123','Staf Operasional','Jl. Staf No. 5','081234567894',2),
(6,'manager_warungkopi','manager123','Manager','Jl. Manager No. 6','081234567895',1),
(7,'admin_laporan_kopi','laporan123','Admin Laporan','Jl. Laporan No. 7','081234567896',1),
(8,'kasir_warungkopi3','kasir123','Kasir 3','Jl. Kasir No. 8','081234567897',2),
(9,'admin_stok_kopi','stok123','Admin Stok','Jl. Stok No. 9','081234567898',1),
(10,'supervisor_kopi','supervisor123','Supervisor','Jl. Supervisor No. 10','081234567899',1),
(11,'kasir_warungkopi4','kasir123','Kasir 4','Jl. Kasir No. 11','081234567900',2),
(12,'kasir_warungkopi5','kasir123','Kasir 5','Jl. Kasir No. 12','081234567901',2),
(13,'admin_event_kopi','event123','Admin Event','Jl. Event No. 13','081234567902',1),
(14,'kasir_warungkopi6','kasir123','Kasir 6','Jl. Kasir No. 14','081234567903',2),
(15,'admin_akuntansi_kopi','akuntansi123','Admin Akuntansi','Jl. Akuntansi No. 15','081234567904',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
