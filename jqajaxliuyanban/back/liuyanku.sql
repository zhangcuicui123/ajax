/*
Navicat MySQL Data Transfer

Source Server         : zcc
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : liuyanku

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-05-15 19:18:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `message` text COMMENT '留言内容',
  `status` tinyint(3) DEFAULT NULL COMMENT '状态:  10正常显示   20删除',
  `created_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '10301', 'zhang', '中国梦', '我有梦，中国梦想秀', '10', '1494846976', null);
INSERT INTO `message` VALUES ('2', '10301', 'zhang', '追梦人', '让青春吹动你的长发', '10', '1494847010', null);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '名字',
  `age` int(11) DEFAULT NULL COMMENT '年龄',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `sex` tinyint(3) DEFAULT NULL COMMENT '性别 1：男；2：女；3：保密',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `mobile` varchar(255) DEFAULT NULL COMMENT '手机号',
  `realname` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `status` tinyint(3) DEFAULT NULL COMMENT '状态',
  `created_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `note` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '10301', 'zhang', '23', '202cb962ac59075b964b07152d234b70', '1', null, '135@126.com', '18716010771', null, null, '0', null, null);
SET FOREIGN_KEY_CHECKS=1;
