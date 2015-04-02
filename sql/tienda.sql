/*
Navicat MySQL Data Transfer

Source Server         : MySQL_Taller_III
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : tienda

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2015-03-24 10:38:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `iduser` int(11) unsigned NOT NULL,
  `rfc` varchar(18) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `aPaterno` varchar(40) DEFAULT NULL,
  `aMaterno` varchar(40) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  CONSTRAINT `fk_id_iduser_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for dircliente
-- ----------------------------
DROP TABLE IF EXISTS `dircliente`;
CREATE TABLE `dircliente` (
  `iduser` int(11) unsigned NOT NULL,
  `calle` varchar(60) DEFAULT NULL,
  `ciudad` varchar(40) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  CONSTRAINT `fk_id_iduser_3` FOREIGN KEY (`iduser`) REFERENCES `cliente` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `iduser` int(11) unsigned NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `aPaterno` varchar(50) DEFAULT NULL,
  `aMaterno` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  CONSTRAINT `fk_id_iduser` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `cod_mat` varchar(5) NOT NULL,
  `desc_mat` varchar(255) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `cant_mat` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`cod_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `iduser` int(11) unsigned NOT NULL,
  `folio` int(5) DEFAULT NULL,
  `cantidad` int(11) unsigned DEFAULT NULL,
  `cod_prod` varchar(5) NOT NULL,
  `fecha` date DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `pago` varchar(50) DEFAULT NULL,
  `estado_ped` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_cod_prod` (`cod_prod`),
  CONSTRAINT `fk_cod_prod` FOREIGN KEY (`cod_prod`) REFERENCES `producto` (`cod_prod`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_iduser_4` FOREIGN KEY (`iduser`) REFERENCES `cliente` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `cod_prod` varchar(5) NOT NULL,
  `color` varchar(30) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `talla` varchar(20) DEFAULT NULL,
  `img_p` varchar(255) DEFAULT NULL,
  `cant_p` int(11) DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL,
  `precio` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`cod_prod`),
  KEY `cod_prod` (`cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
