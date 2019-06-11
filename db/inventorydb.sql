# Host: localhost  (Version 5.5.5-10.1.38-MariaDB)
# Date: 2019-06-11 09:54:42
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "tb_barang"
#

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `harga` bigint(18) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tb_barang"
#

INSERT INTO `tb_barang` VALUES (1,'Komputer','Elektronik','',NULL,990,'b676ce6ef06da96d3b28ddab29524c63.jpg','2019-06-10 02:42:18',NULL);

#
# Structure for table "tb_history"
#

DROP TABLE IF EXISTS `tb_history`;
CREATE TABLE `tb_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deksripsi` text,
  `created_at` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_history"
#


#
# Structure for table "tb_role"
#

DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `permission` enum('read','write','edit','delete') DEFAULT 'read',
  `created_at` datetime DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "tb_role"
#


#
# Structure for table "tb_users"
#

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `cookie` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT '0000-00-00 00:00:00',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "tb_users"
#

INSERT INTO `tb_users` VALUES (1,'Administrator','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','d9515891a1258fcc158ee5539f48e4fc','hnvVFuzufgkkEcAmUGHf0XJbwPdwBeODZdiHtB4VQKhvROSNT21QZosnt7E3Y0CN',1,1,'0000-00-00 00:00:00',NULL);
