/*
Navicat MySQL Data Transfer

Source Server         : MySQL_Taller_III
Source Server Version : 50623
Source Host           : localhost:3306
Source Database       : tienda

Target Server Type    : MYSQL
Target Server Version : 50623
File Encoding         : 65001

Date: 2015-04-14 16:59:11
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
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('26', 'RAMS897635', 'Lorenzo Alfonso', 'Ramirez', 'Zarate', '2015-04-14');
INSERT INTO `cliente` VALUES ('27', 'RAML200806', 'Alfonso', 'Ramirez', ' ', '2015-04-14');

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
-- Records of dircliente
-- ----------------------------
INSERT INTO `dircliente` VALUES ('26', 'Guanajuato', 'Xalapa', '504', '91000', 'Xalapa', ' Macu', 'Veracruz');
INSERT INTO `dircliente` VALUES ('27', 'Guanajuato', 'Xalapa', '100', '91000', 'Xalapa', 'Macuiltepelt', 'Veracruz');

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
-- Records of empleado
-- ----------------------------

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrador');
INSERT INTO `groups` VALUES ('2', 'cliente', 'Publico en General');
INSERT INTO `groups` VALUES ('3', 'mostrador', 'Empleado de la Empresa');
INSERT INTO `groups` VALUES ('4', 'bordado', 'Empleado bordado');
INSERT INTO `groups` VALUES ('5', 'serigrafia', 'Empleado serigrafia');

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
-- Records of login_attempts
-- ----------------------------

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
-- Records of material
-- ----------------------------

-- ----------------------------
-- Table structure for pedido
-- ----------------------------
DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `iduser` int(11) unsigned NOT NULL,
  `folio` int(5) NOT NULL,
  `cantidad` int(11) unsigned DEFAULT NULL,
  `cod_prod` varchar(5) NOT NULL,
  `color` varchar(20) NOT NULL,
  `talla` varchar(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `pago` varchar(50) DEFAULT NULL,
  `estado_ped` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`iduser`,`folio`,`cod_prod`,`color`,`talla`),
  KEY `fk_cod_prod` (`cod_prod`),
  CONSTRAINT `fk_cod_prod` FOREIGN KEY (`cod_prod`) REFERENCES `producto` (`cod_prod`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_iduser_4` FOREIGN KEY (`iduser`) REFERENCES `cliente` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pedido
-- ----------------------------

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `cod_prod` varchar(5) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `talla` varchar(20) DEFAULT NULL,
  `cant_p` varchar(20) DEFAULT NULL,
  `descrip` varchar(255) DEFAULT NULL,
  `precio` float(11,2) DEFAULT NULL,
  `img_p` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_prod`),
  KEY `cod_prod` (`cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES ('1', 'Playera', 'Cuello Redondo', 'mujer', 'blanco', 'CH|M|G|XG', '1000', '100% Algodón', '25.00', 'images/MUJER/PLAYERA/PLAYERA_OPTIMA_32582_A12AXGD.jpg');
INSERT INTO `producto` VALUES ('10', 'Sudadera', 'Basica', 'mujer', 'grisgaspe', 'CH|M|G|XG', '2500', 'Algodón-50% Poliéster', '55.00', 'images/MUJER/SUDADERA/FELPA_OPTIMA_33513_A12DXGD.jpg');
INSERT INTO `producto` VALUES ('11', 'Sudadera', 'Basica', 'mujer', 'azulmarino', 'CH|M|G|XG', '2500', 'Algodón-50% Poliéster', '55.00', 'images/MUJER/SUDADERA/FELPA_OPTIMA_33513_A12EXGD.jpg');
INSERT INTO `producto` VALUES ('12', 'Sudadera', 'Basica', 'mujer', 'azulrey', 'CH|M|G|XG', '2500', 'Algodón-50% Poliéster', '55.00', 'images/MUJER/SUDADERA/FELPA_OPTIMA_33513_A12FXGD.jpg');
INSERT INTO `producto` VALUES ('13', 'Gorra', 'Gabardina', 'mujer', 'azul', 'UNITALLA', '100', '100% Poliéster', '19.00', 'images/MUJER/GORRA/3438-MLM4247012824_052013-O.jpg');
INSERT INTO `producto` VALUES ('14', 'Gorra', 'Gabardina', 'mujer', 'rosa', 'UNITALLA', '100', '100% Poliéster', '19.00', 'images/MUJER/GORRA/3449-MLM4247034391_052013-O.jpg');
INSERT INTO `producto` VALUES ('15', 'Gorra', 'Gabardina', 'mujer', 'naranja', 'UNITALLA', '100', '100% Poliéster', '19.00', 'images/MUJER/GORRA/3450-MLM4247012845_052013-O.jpg');
INSERT INTO `producto` VALUES ('16', 'Gorra', 'Gabardina', 'mujer', 'negro', 'UNITALLA', '100', '100% Poliéster', '19.00', 'images/MUJER/GORRA/3459-MLM4247034485_052013-O.jpg');
INSERT INTO `producto` VALUES ('17', 'Gorra', 'Gabardina', 'mujer', 'blanco', 'UNITALLA', '100', '100% Poliéster', '19.00', 'images/MUJER/GORRA/3478-MLM4247014239_052013-O.jpg');
INSERT INTO `producto` VALUES ('18', 'Playera', 'Polo', 'mujer', 'blanco', 'CH|M|G|XG', '2500', '100% Algodón', '30.00', 'images/MUJER/PLAYERA/POLO/PLAYERA_OPTIMA_33811_A12AXGD.jpg');
INSERT INTO `producto` VALUES ('19', 'Playera', 'Polo', 'mujer', 'rojo', 'CH|M|G|XG', '2500', '100% Algodón', '30.00', 'images/MUJER/PLAYERA/POLO/PLAYERA_OPTIMA_33811_A12BXGD.jpg');
INSERT INTO `producto` VALUES ('2', 'Playera', 'Cuello Redondo', 'mujer', 'rojo', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/MUJER/PLAYERA/PLAYERA_OPTIMA_32582_A12BXGD.jpg');
INSERT INTO `producto` VALUES ('20', 'Playera', 'Polo', 'mujer', 'negro', 'CH|M|G|XG', '2500', '100% Algodón', '30.00', 'images/MUJER/PLAYERA/POLO/PLAYERA_OPTIMA_33811_A12CXGD.jpg');
INSERT INTO `producto` VALUES ('21', 'Playera', 'Cuello Redondo', 'hombre', 'blanco', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/HOMBRE/PLAYERA/PLAYERA_OPTIMA_32702_A12AXGD.jpg');
INSERT INTO `producto` VALUES ('22', 'Playera', 'Cuello Redondo', 'hombre', 'rojo', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/HOMBRE/PLAYERA/PLAYERA_OPTIMA_32702_A12BXGD.jpg');
INSERT INTO `producto` VALUES ('23', 'Playera', 'Cuello Redondo', 'hombre', 'negro', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/HOMBRE/PLAYERA/PLAYERA_OPTIMA_32702_A12CXGD.jpg');
INSERT INTO `producto` VALUES ('24', 'Playera', 'Cuello Redondo', 'hombre', 'azulcielo', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/HOMBRE/PLAYERA/PLAYERA_OPTIMA_32702_A12DXGD.jpg');
INSERT INTO `producto` VALUES ('25', 'Playera', 'Cuello Redondo', 'hombre', 'grisgaspe', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/HOMBRE/PLAYERA/PLAYERA_OPTIMA_32702_A12EXGD.jpg');
INSERT INTO `producto` VALUES ('26', 'Playera', 'Cuello Redondo', 'hombre', 'azulcielo', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/HOMBRE/PLAYERA/PLAYERA_OPTIMA_32702_A12FXGD.jpg');
INSERT INTO `producto` VALUES ('27', 'Playera', 'Polo', 'hombre', 'blanco', 'CH|M|G|XG', '2000', '100% Algodón', '30.00', 'images/HOMBRE/PLAYERA/POLO/PLAYERA_OPTIMA_33912_A12AXGD.jpg');
INSERT INTO `producto` VALUES ('28', 'Playera', 'Polo', 'hombre', 'rojo', 'CH|M|G|XG', '2000', '100% Algodón', '30.00', 'images/HOMBRE/PLAYERA/POLO/PLAYERA_OPTIMA_33912_A12BXGD.jpg');
INSERT INTO `producto` VALUES ('29', 'Playera', 'Polo', 'hombre', 'negro', 'CH|M|G|XG', '2000', '100% Algodón', '30.00', 'images/HOMBRE/PLAYERA/POLO/PLAYERA_OPTIMA_33912_A12CXGD.jpg');
INSERT INTO `producto` VALUES ('3', 'Playera', 'Cuello Redondo', 'mujer', 'negro', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/MUJER/PLAYERA/PLAYERA_OPTIMA_32582_A12CXGD.jpg');
INSERT INTO `producto` VALUES ('30', 'Sudadera', 'Basica', 'hombre', 'blanco', 'CH|M|G|XG', '2600', 'Algodón-50% Poliéster', '65.00', 'images/HOMBRE/SUDADERA/FELPA_OPTIMA_33502_A12AXGD.jpg');
INSERT INTO `producto` VALUES ('31', 'Sudadera', 'Basica', 'hombre', 'rojo', 'CH|M|G|XG', '2600', 'Algodón-50% Poliéster', '65.00', 'images/HOMBRE/SUDADERA/FELPA_OPTIMA_33502_A12BXGD.jpg');
INSERT INTO `producto` VALUES ('32', 'Sudadera', 'Basica', 'hombre', 'negro', 'CH|M|G|XG', '2600', 'Algodón-50% Poliéster', '65.00', 'images/HOMBRE/SUDADERA/FELPA_OPTIMA_33502_A12CXGD.jpg');
INSERT INTO `producto` VALUES ('33', 'Sudadera', 'Basica', 'hombre', 'grisgaspe', 'CH|M|G|XG', '2600', 'Algodón-50% Poliéster', '65.00', 'images/HOMBRE/SUDADERA/FELPA_OPTIMA_33502_A12DXGD.jpg');
INSERT INTO `producto` VALUES ('34', 'Sudadera', 'Basica', 'hombre', 'azulmarino', 'CH|M|G|XG', '2600', 'Algodón-50% Poliéster', '65.00', 'images/HOMBRE/SUDADERA/FELPA_OPTIMA_33502_A12EXGD.jpg');
INSERT INTO `producto` VALUES ('35', 'Sudadera', 'Basica', 'hombre', 'azulrey', 'CH|M|G|XG', '2600', 'Algodón-50% Poliéster', '65.00', 'images/HOMBRE/SUDADERA/FELPA_OPTIMA_33502_A12FXGD.jpg');
INSERT INTO `producto` VALUES ('36', 'Gorra', 'Gabardina', 'hombre', 'blanco', 'UNITALLA', '1500', '100% Poliéster', '29.00', 'images/HOMBRE/GORRA/GGSBSC01gde.jpg');
INSERT INTO `producto` VALUES ('37', 'Gorra', 'Gabardina', 'hombre', 'negro', 'UNITALLA', '1500', '100% Poliéster', '29.00', 'images/HOMBRE/GORRA/GGSBSC03gde.jpg');
INSERT INTO `producto` VALUES ('38', 'Gorra', 'Gabardina', 'hombre', 'rojo', 'UNITALLA', '1500', '100% Poliéster', '29.00', 'images/HOMBRE/GORRA/GGSBSC06gde.jpg');
INSERT INTO `producto` VALUES ('4', 'Playera', 'Cuello Redondo', 'mujer', 'azulcielo', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/MUJER/PLAYERA/PLAYERA_OPTIMA_32582_A12DXGD.jpg');
INSERT INTO `producto` VALUES ('5', 'Playera', 'Cuello Redondo', 'mujer', 'grisgaspe', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/MUJER/PLAYERA/PLAYERA_OPTIMA_32582_A12FXGD.jpg');
INSERT INTO `producto` VALUES ('6', 'Playera', 'Cuello Redondo', 'mujer', 'azulmarino', 'CH|M|G|XG', '2500', '100% Algodón', '25.00', 'images/MUJER/PLAYERA/PLAYERA_OPTIMA_32582_A12GXGD.jpg');
INSERT INTO `producto` VALUES ('7', 'Sudadera', 'Basica', 'mujer', 'blanco', 'CH|M|G|XG', '2500', 'Algodón-50% Poliéster', '55.00', 'images/MUJER/SUDADERA/FELPA_OPTIMA_33513_A12AXGD.jpg');
INSERT INTO `producto` VALUES ('8', 'Sudadera', 'Basica', 'mujer', 'rojo', 'CH|M|G|XG', '2500', 'Algodón-50% Poliéster', '55.00', 'images/MUJER/SUDADERA/FELPA_OPTIMA_33513_A12BXGD.jpg');
INSERT INTO `producto` VALUES ('9', 'Sudadera', 'Basica', 'mujer', 'negro', 'CH|M|G|XG', '2500', 'Algodón-50% Poliéster', '55.00', 'images/MUJER/SUDADERA/FELPA_OPTIMA_33513_A12CXGD.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, 'lEqGpn31iQAKs9q1Flea/e', '1268889823', '1429027570', '1', 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` VALUES ('26', '127.0.0.1', 'Alfonso', '$2y$08$nncKhYTnvWsxSvUXPTRo5.PD7A17Cfz/0YTdTbvcTykdjzBQEpmiW', null, 'lorenzo@hotmail.com', null, null, null, '6CfThkfi8J25Pgeh71Xeru', '1428785477', '1429025461', '1', 'Lorenzo Alfonso', 'Ramirez', '', '2798228059');
INSERT INTO `users` VALUES ('27', '127.0.0.1', 'alfonso ramirez', '$2y$08$hSrcJJVz1xe/nGb5nXupkeTrIkvIyGVwSlKVVDU1kmWgIm/eOQdmu', null, 'alfonso@hotmail.com', null, null, null, 'HwizEGmJt3gobtxrRJd1Re', '1428872999', '1429047316', '1', 'Alfonso', 'Ramirez', '', '2798228059');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1', '1');
INSERT INTO `users_groups` VALUES ('18', '26', '4');
INSERT INTO `users_groups` VALUES ('19', '27', '2');
