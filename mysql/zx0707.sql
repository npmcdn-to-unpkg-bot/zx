/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : zx

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-07 18:00:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zx_user`
-- ----------------------------
DROP TABLE IF EXISTS `zx_user`;
CREATE TABLE `zx_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `wid` int(8) DEFAULT NULL COMMENT '网站ID',
  `pid` int(8) DEFAULT NULL COMMENT '父用户ID',
  `name` varchar(100) DEFAULT NULL COMMENT '用户名',
  `password` varchar(100) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(100) DEFAULT NULL COMMENT '昵称',
  `portrait` varchar(100) DEFAULT NULL COMMENT '头像',
  `last_login_time` varchar(20) DEFAULT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(30) DEFAULT NULL COMMENT '上次登录IP',
  `login_times` int(6) DEFAULT NULL COMMENT '总登录次数',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `role` varchar(20) DEFAULT NULL COMMENT '角色',
  `created_at` varchar(20) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(20) DEFAULT NULL COMMENT '更新时间',
  `auth_key` varchar(100) DEFAULT NULL COMMENT '认证字符串',
  `access_token` varchar(100) DEFAULT NULL COMMENT '验证token',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '账户是否可用',
  `expire` varchar(20) DEFAULT NULL COMMENT '过期时间',
  `menulist` text COMMENT '子账号课件的菜单列表',
  `rightlist` text COMMENT '权限列表',
  `extdata` text COMMENT '额外数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='后台用户表';

-- ----------------------------
-- Records of zx_user
-- ----------------------------
INSERT INTO `zx_user` VALUES ('1', '1', null, '陆荣泽', '$2y$13$uy0aB58DVquOk0gkOurLCe/ZA4lpSswbtxj9ivUWDXbt2DUeIRrEa', null, null, '1467885609', '::1', '1', '1946755280@qq.com', 'USER', '1467884992', '1467885609', 'D9KDaSvwmfS8s5m2tT0HBrjYTZr_N8mI', '5a81pcW5be-41A_1uXwrsXvPMG5psLYq', '1', '1467884992.864', null, null, null);

-- ----------------------------
-- Table structure for `zx_web`
-- ----------------------------
DROP TABLE IF EXISTS `zx_web`;
CREATE TABLE `zx_web` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `admin` int(8) NOT NULL COMMENT '管理员id',
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '网站名称',
  `logo` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '网站LOGO',
  `config` text CHARACTER SET utf8 COMMENT '配置',
  `smtp` text CHARACTER SET utf8 COMMENT 'SMTP邮箱配置',
  `keyword` text CHARACTER SET utf8 COMMENT '网站关键字',
  `description` text CHARACTER SET utf8 COMMENT '网站描述',
  `created_at` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='系统各子网站信息配置表，wid即webid从这个表根据admin拿到';

-- ----------------------------
-- Records of zx_web
-- ----------------------------
INSERT INTO `zx_web` VALUES ('1', '1', null, null, null, null, null, null, '1467884992', '1467884992');
