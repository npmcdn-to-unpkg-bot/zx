/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : uii

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-07 16:06:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `uii_web`
-- ----------------------------
DROP TABLE IF EXISTS `uii_web`;
CREATE TABLE `uii_web` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `admin` int(8) NOT NULL COMMENT '管理员id',
  `name` varchar(100) DEFAULT NULL COMMENT '网站名称',
  `logo` varchar(255) DEFAULT NULL COMMENT '网站LOGO',
  `config` text COMMENT '配置',
  `smtp` text COMMENT 'SMTP邮箱配置',
  `keyword` text COMMENT '网站关键字',
  `description` text COMMENT '网站描述',
  `created_at` varchar(20) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(20) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统各子网站信息配置表，wid即webid从这个表根据admin拿到';

-- ----------------------------
-- Records of uii_web
-- ----------------------------
INSERT INTO `uii_web` VALUES ('1', '1', '网站名称', '[{\"url\":\"/upload/u00001/Images/20160530/80b09878f96984f45bcc1a421aa991ee_113456.png\",\"link\":\"123\",\"width\":\"640\",\"height\":\"640\",\"label\":\"子网站LOGO\",\"name\":\"images\"}]', null, null, 'keyword', 'description', '1462861668', '1464579359');
