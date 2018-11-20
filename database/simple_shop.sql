/*
Navicat MySQL Data Transfer

Source Server         : kien
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : simple_shop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-11-20 20:03:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'latop Dell 6520', '6520.jpg', '3500000');
INSERT INTO `products` VALUES ('2', 'camera', 'camera.jpg', '1000000');
INSERT INTO `products` VALUES ('3', 'Hard disk driver 1tb', 'hdd.png', '2000000');
INSERT INTO `products` VALUES ('4', 'intel cor I7', 'intel.jpg', '1500000');
INSERT INTO `products` VALUES ('5', 'Macbook pro 2018', 'mac2018.jpg', '20000000');
INSERT INTO `products` VALUES ('6', 'Smart watch', 'watch.jpg', '1500000');
INSERT INTO `products` VALUES ('7', 'Laptop', 'laptop.jpg', '3000000');
