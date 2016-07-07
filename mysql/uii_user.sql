/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : uii

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-07 16:06:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `uii_user`
-- ----------------------------
DROP TABLE IF EXISTS `uii_user`;
CREATE TABLE `uii_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `wid` int(8) DEFAULT NULL COMMENT '网站ID，每个注册的账号有一个，下面的子账号共用同一个wid',
  `pid` int(8) DEFAULT '0' COMMENT '父用户的ID',
  `name` varchar(100) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '密码',
  `nickname` varchar(100) NOT NULL COMMENT '昵称',
  `portrait` varchar(255) NOT NULL COMMENT '头像',
  `last_login_time` varchar(20) NOT NULL COMMENT '上次登录时间',
  `last_login_ip` varchar(30) NOT NULL COMMENT '上次登录IP',
  `login_times` int(6) NOT NULL COMMENT '总登录次数',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `role` varchar(20) NOT NULL COMMENT '角色',
  `created_at` varchar(30) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `auth_key` varchar(100) DEFAULT NULL COMMENT '认证字符串',
  `access_token` varchar(100) DEFAULT NULL COMMENT '验证token',
  `is_active` tinyint(1) DEFAULT '1' COMMENT '账户是否可用',
  `expire` varchar(100) DEFAULT NULL COMMENT '过期时间',
  `menulist` text COMMENT '子帐号可以看到的菜单列表',
  `ex_data` text COMMENT '额外的数据',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='后台登录用户表';

-- ----------------------------
-- Records of uii_user
-- ----------------------------
INSERT INTO `uii_user` VALUES ('1', '1', '0', '陆荣泽', '$2y$13$vYfxCwdADpgn/4K1wYZsIO5PUqk/BbSjL0BMLjUQr6u5h3xwMRolm', '我的昵称', '[{\"url\":\"/upload/u00001/Images/20160511/c064bc788b00520d408e5fc1ab9c8e5f_213009.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"图片上传\",\"name\":\"images\"}]', '1467874146', '::1', '27', 'lurongze@qq.com', 'USER', '1462861667', '1467874146', 'OsJymidH0n7yXj5UStC-4kXOG2LszMTx', 'LQwq8Ce_VkpDc7f4VKdTbMhMEjK7nuan', '1', '1473466467', null, null);
INSERT INTO `uii_user` VALUES ('3', '1', '1', '\"陆荣泽\"的子账号', '$2y$13$inBGVlDrJTnEHbMDMnxiGeivHmROsmbDC48v5ggnM08MJC03c9uve', '哈哈哈', '[{\"url\":\"/upload/u00003/Images/20160512/aee7d4fbaf4f4fa00546944da6311797_203415.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"图片上传\",\"name\":\"images\"}]', '1463056208', '127.0.0.1', '3', '121121@qq.com', 'SUBSER', '1463037883', '1463056461', 'jWTrJqfbJiSS7HPIHEZnwkezl4L5nAsL', 'ywOfiGtOzAFA_Kti32omYswLtFjkNV4H', '1', '1473466467', null, null);
INSERT INTO `uii_user` VALUES ('5', '1', '1', '\"陆荣泽\"的子账号', '$2y$13$tXx9dNW3QydaG1nKsvpTSeORA0HRifZveBn/bET/2A9cRXWUTb7Qm', '', '', '1463037920', '::1', '0', 'fesfef@qq.com', 'SUBSER', '1463037921', '1463037921', 'NoAhBjASGzqfQ_4lzPDSsSkznkVdBymH', 'fVY0JoX-Q3mam5q8CbRLXoiQldMEcUB3', '1', '1473466467', null, null);
INSERT INTO `uii_user` VALUES ('6', '1', '1', '\"陆荣泽\"的子账号', '$2y$13$QeGHQWYR0kfRGMLAh7I36uLsdOcKVHvuP1xRNCnjUGnq8zYOzeXC.', '', '', '1463037943', '::1', '0', 'erwrwrwrw@qq.com', 'SUBSER', '1463037943', '1463037943', '_Zh0vnujrGPTVK6q5MJzBRxvTC5Mvlbq', 'IwPEU1MXsOw4fHg-EqoXJLN16gsptvqb', '1', '1463466467', null, null);
