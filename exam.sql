/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : exam

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-12 15:20:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for classes
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of classes
-- ----------------------------
INSERT INTO `classes` VALUES ('1', '1', 'Bachelor 1');
INSERT INTO `classes` VALUES ('2', '1', 'Bachelor 2');
INSERT INTO `classes` VALUES ('3', '1', 'Bachelor 3');
INSERT INTO `classes` VALUES ('4', '1', 'Bachelor 4');

-- ----------------------------
-- Table structure for schools
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of schools
-- ----------------------------
INSERT INTO `schools` VALUES ('1', 'Y-nov Ingésup');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
-- B1
INSERT INTO `students` VALUES ('1', '1', 'Yann', 'Guineau');
INSERT INTO `students` VALUES ('2', '1', 'Saïd', 'Mezhoud');
INSERT INTO `students` VALUES ('3', '1', 'Thibaut', 'Taelman');
-- B2
INSERT INTO `students` VALUES ('4', '2', 'Folco', 'Durand');
INSERT INTO `students` VALUES ('5', '2', 'Charles', 'Secchi');
INSERT INTO `students` VALUES ('6', '2', 'Vincent', 'Biaudis');
-- B3
INSERT INTO `students` VALUES ('7', '3', 'Chris', 'Limongi');
INSERT INTO `students` VALUES ('8', '3', 'Arnaud', 'Trousselard');
INSERT INTO `students` VALUES ('9', '3', 'Boris', 'Despiau');
-- B4
INSERT INTO `students` VALUES ('10', '4', 'Julien', 'Nikos');
INSERT INTO `students` VALUES ('11', '4', 'Thomas', 'Burgio');
INSERT INTO `students` VALUES ('12', '4', 'Jérémy', 'Bona');