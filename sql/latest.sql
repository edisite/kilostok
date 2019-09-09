/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.1.35-MariaDB : Database - kstok
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `admin_groups` */

DROP TABLE IF EXISTS `admin_groups`;

CREATE TABLE `admin_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `admin_login_attempts` */

DROP TABLE IF EXISTS `admin_login_attempts`;

CREATE TABLE `admin_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `admin_users` */

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `admin_users_groups` */

DROP TABLE IF EXISTS `admin_users_groups`;

CREATE TABLE `admin_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `api_access` */

DROP TABLE IF EXISTS `api_access`;

CREATE TABLE `api_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) NOT NULL DEFAULT '',
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `api_keys` */

DROP TABLE IF EXISTS `api_keys`;

CREATE TABLE `api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `api_limits` */

DROP TABLE IF EXISTS `api_limits`;

CREATE TABLE `api_limits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `api_logs` */

DROP TABLE IF EXISTS `api_logs`;

CREATE TABLE `api_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `funder_groups` */

DROP TABLE IF EXISTS `funder_groups`;

CREATE TABLE `funder_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `funder_login_attempts` */

DROP TABLE IF EXISTS `funder_login_attempts`;

CREATE TABLE `funder_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `funder_users` */

DROP TABLE IF EXISTS `funder_users`;

CREATE TABLE `funder_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `funder_users_groups` */

DROP TABLE IF EXISTS `funder_users_groups`;

CREATE TABLE `funder_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `m_bidang` */

DROP TABLE IF EXISTS `m_bidang`;

CREATE TABLE `m_bidang` (
  `bidang_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_nama` varchar(255) DEFAULT NULL,
  `bidang_status_aktif` char(1) DEFAULT NULL,
  `bidang_create_date` datetime DEFAULT NULL,
  `bidang_create_by` varchar(255) DEFAULT NULL,
  `bidang_update_date` datetime DEFAULT NULL,
  `bidang_update_by` varchar(255) DEFAULT NULL,
  `bidang_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`bidang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `m_gudang` */

DROP TABLE IF EXISTS `m_gudang`;

CREATE TABLE `m_gudang` (
  `gudang_id` int(255) NOT NULL AUTO_INCREMENT,
  `gudang_nama` varchar(255) NOT NULL,
  `gudang_alamat` varchar(255) NOT NULL,
  `gudang_kota` varchar(255) NOT NULL,
  `gudang_telepon` varchar(255) NOT NULL,
  `gudang_fax` varchar(255) DEFAULT NULL,
  `gudang_email` varchar(255) DEFAULT NULL,
  `m_cabang_id` int(11) NOT NULL,
  `m_jenis_gudang_id` int(11) NOT NULL,
  `gudang_status_aktif` char(1) NOT NULL,
  `gudang_create_date` datetime NOT NULL,
  `gudang_create_by` varchar(255) NOT NULL,
  `gudang_update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `gudang_update_by` varchar(255) DEFAULT NULL,
  `gudang_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`gudang_id`),
  KEY `gudang_cabang` (`m_cabang_id`),
  KEY `gudang_jenis_gudang` (`m_jenis_gudang_id`),
  CONSTRAINT `gudang_cabang` FOREIGN KEY (`m_cabang_id`) REFERENCES `m_cabang` (`cabang_id`),
  CONSTRAINT `gudang_jenis_gudang` FOREIGN KEY (`m_jenis_gudang_id`) REFERENCES `m_jenis_gudang` (`jenis_gudang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `m_periode` */

DROP TABLE IF EXISTS `m_periode`;

CREATE TABLE `m_periode` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_nama` varchar(255) DEFAULT NULL,
  `periode_status_aktif` char(1) DEFAULT NULL,
  `periode_create_date` datetime DEFAULT NULL,
  `periode_create_by` varchar(255) DEFAULT NULL,
  `periode_update_date` datetime DEFAULT NULL,
  `periode_update_by` varchar(255) DEFAULT NULL,
  `periode_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `m_produk` */

DROP TABLE IF EXISTS `m_produk`;

CREATE TABLE `m_produk` (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_jenis_barang_id` int(11) NOT NULL,
  `produk_kode` varchar(255) NOT NULL,
  `produk_nomor` varchar(255) DEFAULT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `m_satuan_id` int(11) DEFAULT NULL,
  `produk_minimum_stok` int(11) NOT NULL DEFAULT '0',
  `produk_status_aktif` char(1) NOT NULL,
  `produk_create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `produk_create_by` varchar(255) NOT NULL,
  `produk_update_date` datetime DEFAULT NULL,
  `produk_update_by` varchar(255) DEFAULT NULL,
  `produk_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`produk_id`),
  KEY `jenis_barang` (`m_jenis_barang_id`),
  CONSTRAINT `jenis_barang` FOREIGN KEY (`m_jenis_barang_id`) REFERENCES `m_produk_kategori` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `m_produk_kategori` */

DROP TABLE IF EXISTS `m_produk_kategori`;

CREATE TABLE `m_produk_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(255) DEFAULT NULL,
  `m_kategori_gudang_id` int(11) DEFAULT NULL,
  `kategori_status_aktif` char(1) DEFAULT NULL,
  `kategori_create_date` datetime DEFAULT NULL,
  `kategori_create_by` varchar(255) DEFAULT NULL,
  `kategori_update_date` datetime DEFAULT NULL,
  `kategori_update_by` varchar(255) DEFAULT NULL,
  `kategori_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`),
  KEY `jenis_gudang` (`m_kategori_gudang_id`),
  CONSTRAINT `jenis_gudang` FOREIGN KEY (`m_kategori_gudang_id`) REFERENCES `m_jenis_gudang` (`jenis_gudang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `m_satuan` */

DROP TABLE IF EXISTS `m_satuan`;

CREATE TABLE `m_satuan` (
  `satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_nama` varchar(255) DEFAULT NULL,
  `satuan_status_aktif` char(1) DEFAULT NULL,
  `satuan_create_date` datetime DEFAULT NULL,
  `satuan_create_by` varchar(255) DEFAULT NULL,
  `satuan_update_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `satuan_update_by` varchar(255) DEFAULT NULL,
  `satuan_revised` int(11) DEFAULT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `mitra_groups` */

DROP TABLE IF EXISTS `mitra_groups`;

CREATE TABLE `mitra_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `mitra_login_attempts` */

DROP TABLE IF EXISTS `mitra_login_attempts`;

CREATE TABLE `mitra_login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `mitra_users` */

DROP TABLE IF EXISTS `mitra_users`;

CREATE TABLE `mitra_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `mitra_users_groups` */

DROP TABLE IF EXISTS `mitra_users_groups`;

CREATE TABLE `mitra_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
