/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : uii

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-08 09:49:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `uii_menu`
-- ----------------------------
DROP TABLE IF EXISTS `uii_menu`;
CREATE TABLE `uii_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `wid` int(11) NOT NULL COMMENT '菜单所属用户ID',
  `pid` int(11) NOT NULL COMMENT '父ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `mtitle` varchar(255) NOT NULL COMMENT '副标题',
  `description` text NOT NULL COMMENT '描述',
  `type` int(8) NOT NULL DEFAULT '1' COMMENT '菜单类型',
  `link` varchar(255) NOT NULL COMMENT '菜单链接',
  `tmp` int(8) NOT NULL DEFAULT '1' COMMENT '菜单模板',
  `tmp_config` text COMMENT '模板配置信息',
  `images` text NOT NULL COMMENT '图片数据',
  `plist` varchar(255) DEFAULT '0' COMMENT '所有的父菜单id',
  `ext_data` text COMMENT '额外的数据',
  `configs` text COMMENT '配置信息，一般拿来保存子菜单需要的配置信息',
  `sort_order` int(8) DEFAULT '0' COMMENT '排序',
  `is_open` tinyint(1) DEFAULT '1' COMMENT '是否启用',
  `configdata` text COMMENT '插件下的额外数据内容',
  `configimg` text COMMENT '插件下的额外图片数据',
  `share` text COMMENT '分享设置',
  `seo` text COMMENT 'SEO配置信息',
  `created_at` varchar(30) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of uii_menu
-- ----------------------------
INSERT INTO `uii_menu` VALUES ('6', '1', '0', '首页', 'a11', '菜单描述', '1', 'www.baidu.com', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"/upload/u00001/Images/20160601/41eae321616c03b2ef5680052e544873_180323.png\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"/upload/u00001/Images/20160511/99a9f16d564e5a5685c7087c425dad7f_215648.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"/upload/u00001/Images/20160511/d2e02d5622c294c781176852597bac53_215650.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"/upload/u00001/Images/20160511/aee7d4fbaf4f4fa00546944da6311797_215652.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '0', null, null, '0', '1', '[{\"itgdataname\":\"name1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val1\"},{\"itgdataname\":\"name2\",\"itgdatakey\":\"key2\",\"itgdataval\":\"val2\"}]', '[{\"itgimgname\":\"img\",\"itgimgwidth\":\"645\",\"itgimgheight\":\"453\"}]', '{\"title\":\"分享标题分享标题分享标题分享标题\",\"desc\":\"分享描述分享描述分享描述分享描述分享描述分享描述分享描述分享描述\",\"img\":\"/upload/u00001/Images/20160513/721614de9177fbd1e20a7481839136df_144051.jpg\"}', '{\"keyword\":\"SEO关键字111\",\"desc\":\"SEO描述SEO描述SEO描述SEO描述SEO描述SEO描述111\"}', '1457688379', '1464938043');
INSERT INTO `uii_menu` VALUES ('35', '1', '0', '12312', '123123', '12312', '1', '123123', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '0', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467703325', '1467703370');
INSERT INTO `uii_menu` VALUES ('20', '1', '0', '新闻频道', 'a111', '', '1', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"/upload/u00001/Images/20160601/2575eb4905c9fb2f49a02f5610d775e7_180411.png\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '', null, null, '0', '1', '[{\"itgdataname\":\"name123\",\"itgdatakey\":\"key123\",\"itgdataval\":\"val123\"},{\"itgdataname\":\"name321\",\"itgdatakey\":\"key321\",\"itgdataval\":\"val321\"}]', '[{\"itgimgname\":\"tupian\",\"itgimgwidth\":\"555\",\"itgimgheight\":\"666\"}]', '', null, '1457757460', '1464938342');
INSERT INTO `uii_menu` VALUES ('21', '1', '0', '国内新闻', 'wqeq12', '', '2', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '', null, null, '0', '1', '[{\"itgdataname\":\"名称\",\"itgdatakey\":\"key\",\"itgdataval\":\"val\"},{\"itgdataname\":\"名称1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val222\"}]', '[{\"itgimgname\":\"\",\"itgimgwidth\":\"\",\"itgimgheight\":\"\"}]', '', null, '1457757486', '1465196233');
INSERT INTO `uii_menu` VALUES ('23', '1', '0', '国际新闻1', 'qwe', '', '3', '请问请问企鹅', '1', '', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '', null, null, '0', '1', null, null, '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1458045731', '1464340051');
INSERT INTO `uii_menu` VALUES ('34', '1', '0', '公司动态', '', '公司动态的东西', '2', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '0', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1465201393', '1465201415');
INSERT INTO `uii_menu` VALUES ('36', '1', '6', '1首页', '1232', '123123', '1', '123', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '0', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467704976', '1467704985');
INSERT INTO `uii_menu` VALUES ('37', '1', '36', '2首页', '', '1232', '1', '', '1', null, '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '0', '1', null, null, '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467705024', '1467705024');
