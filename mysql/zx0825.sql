/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : zx

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-08-25 15:32:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zx_article`
-- ----------------------------
DROP TABLE IF EXISTS `zx_article`;
CREATE TABLE `zx_article` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `mid` int(8) DEFAULT NULL COMMENT '菜单id',
  `wid` int(8) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `mtitle` varchar(100) DEFAULT NULL COMMENT '副标题',
  `img_list` varchar(500) DEFAULT NULL COMMENT '列表图片',
  `img_title` varchar(500) DEFAULT NULL COMMENT '文字头图',
  `desc` varchar(500) DEFAULT NULL COMMENT '描述',
  `content` text COMMENT '内容',
  `pubtime` varchar(30) DEFAULT NULL COMMENT '发布时间',
  `from` varchar(100) DEFAULT NULL COMMENT '来源',
  `link` varchar(100) DEFAULT NULL COMMENT '外链',
  `isopen` tinyint(1) DEFAULT NULL COMMENT '是否显示',
  `isrecommend` tinyint(1) DEFAULT NULL COMMENT '是否推荐',
  `catid` int(8) DEFAULT NULL COMMENT '分类id',
  `sort_order` int(8) DEFAULT NULL COMMENT '排序',
  `seo` text COMMENT 'SEO信息',
  `share` text COMMENT '分享信息',
  `created_at` varchar(30) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of zx_article
-- ----------------------------
INSERT INTO `zx_article` VALUES ('1', '51', '1', '第一篇文章1', '1231', '{\"path\":\"/upload/x00001/images/201607/25145537x57c4f.png\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"size\":\"13080\",\"uploadID\":43}', '{\"path\":\"/upload/x00001/images/201607/25145537x15f80.png\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"size\":\"16172\",\"uploadID\":44}', '描述1', '<p>\r\n	<span style=\"color:#E53333;background-color:#337FE5;\">哈哈哈哈哈哈哈哈啊哈a</span> \r\n</p>\r\n<p>\r\n	<strong><em>u就按粉红色的附件是离开饭店</em></strong> \r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	进口粮食局连接链接了 111111\r\n</p>', '2016-08-11', '本站原创1', 'http://www.baidu.com1', '1', '0', null, '1231312', '{\"title\":\"seo\\u6807\\u9898\",\"desc\":\"seo \\u63cf\\u8ff0\"}', '{\"title\":\"\\u7b2c\\u4e00\\u7bc7\\u6587\\u7ae0\\u5206\\u4eab\\u6807\\u9898\",\"desc\":\"\\u7b2c\\u4e00\\u7bc7\\u6587\\u7ae0\\u5206\\u4eab\\u63cf\\u8ff0\\u5206\\u4eab\\u63cf\\u8ff0\\u5206\\u4eab\\u63cf\\u8ff0\",\"img\":\"\\/upload\\/x00001\\/images\\/201607\\/25150835xff9b4.jpg\"}', '1469429536', '1469430515');

-- ----------------------------
-- Table structure for `zx_cache`
-- ----------------------------
DROP TABLE IF EXISTS `zx_cache`;
CREATE TABLE `zx_cache` (
  `id` varchar(128) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='DB缓存表';

-- ----------------------------
-- Records of zx_cache
-- ----------------------------
INSERT INTO `zx_cache` VALUES ('1122', '1472009229', 0x613A323A7B693A303B733A31313A2268656C6C6F20776F726C64223B693A313B4E3B7D);
INSERT INTO `zx_cache` VALUES ('963454f612a8b5fb4a63ba1e97f028a1', '0', 0x613A323A7B693A303B613A323A7B693A303B613A333A7B693A303B4F3A31353A227969695C7765625C55726C52756C65223A31343A7B733A343A226E616D65223B733A35303A223C6D6F64756C653A5C772B3E2F3C636F6E74726F6C6C65723A5C772B3E2F3C69643A5C642B3E3C616374696F6E3A5C772B3E223B733A373A227061747465726E223B733A37393A22235E283F503C6130633234323632383E5C772B292F283F503C6134636632363639613E5C772B292F283F503C6162663339363735303E5C642B29283F503C6134376363386339323E5C772B29242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A33303A223C6D6F64756C653E2F3C636F6E74726F6C6C65723E2F3C616374696F6E3E223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31353A22002A00706C616365686F6C64657273223B613A343A7B733A393A22613063323432363238223B733A363A226D6F64756C65223B733A393A22613463663236363961223B733A31303A22636F6E74726F6C6C6572223B733A393A22616266333936373530223B733A323A226964223B733A393A22613437636338633932223B733A363A22616374696F6E223B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A33363A222F3C6D6F64756C653E2F3C636F6E74726F6C6C65723E2F3C69643E3C616374696F6E3E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B733A36313A22235E283F503C6130633234323632383E5C772B292F283F503C6134636632363639613E5C772B292F283F503C6134376363386339323E5C772B29242375223B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A313A7B733A323A226964223B733A383A22235E5C642B242375223B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A333A7B733A363A226D6F64756C65223B733A383A223C6D6F64756C653E223B733A31303A22636F6E74726F6C6C6572223B733A31323A223C636F6E74726F6C6C65723E223B733A363A22616374696F6E223B733A383A223C616374696F6E3E223B7D7D693A313B4F3A31353A227969695C7765625C55726C52756C65223A31343A7B733A343A226E616D65223B733A33373A223C636F6E74726F6C6C65723A5C772B3E2F3C69643A5C642B3E3C616374696F6E3A5C772B3E223B733A373A227061747465726E223B733A36303A22235E283F503C6134636632363639613E5C772B292F283F503C6162663339363735303E5C642B29283F503C6134376363386339323E5C772B29242375223B733A343A22686F7374223B4E3B733A353A22726F757465223B733A32313A223C636F6E74726F6C6C65723E2F3C616374696F6E3E223B733A383A2264656661756C7473223B613A303A7B7D733A363A22737566666978223B4E3B733A343A2276657262223B4E3B733A343A226D6F6465223B4E3B733A31323A22656E636F6465506172616D73223B623A313B733A31353A22002A00706C616365686F6C64657273223B613A333A7B733A393A22613463663236363961223B733A31303A22636F6E74726F6C6C6572223B733A393A22616266333936373530223B733A323A226964223B733A393A22613437636338633932223B733A363A22616374696F6E223B7D733A32363A22007969695C7765625C55726C52756C65005F74656D706C617465223B733A32373A222F3C636F6E74726F6C6C65723E2F3C69643E3C616374696F6E3E2F223B733A32373A22007969695C7765625C55726C52756C65005F726F75746552756C65223B733A34323A22235E283F503C6134636632363639613E5C772B292F283F503C6134376363386339323E5C772B29242375223B733A32383A22007969695C7765625C55726C52756C65005F706172616D52756C6573223B613A313A7B733A323A226964223B733A383A22235E5C642B242375223B7D733A32393A22007969695C7765625C55726C52756C65005F726F757465506172616D73223B613A323A7B733A31303A22636F6E74726F6C6C6572223B733A31323A223C636F6E74726F6C6C65723E223B733A363A22616374696F6E223B733A383A223C616374696F6E3E223B7D7D693A323B4F3A31333A227969695C7765625C526F757465223A303A7B7D7D693A313B733A33323A223136343761623130326338353161376136656136396165376432623639393365223B7D693A313B4E3B7D);
INSERT INTO `zx_cache` VALUES ('lurongze9QiDNZ4STXa1aDy', '1472614510', 0x613A323A7B693A303B733A313A2232223B693A313B4E3B7D);
INSERT INTO `zx_cache` VALUES ('lurongzeLQiDNZ4STXa1aDy', '0', 0x613A323A7B693A303B733A313A2232223B693A313B4E3B7D);

-- ----------------------------
-- Table structure for `zx_menu`
-- ----------------------------
DROP TABLE IF EXISTS `zx_menu`;
CREATE TABLE `zx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `wid` int(11) NOT NULL COMMENT '菜单所属用户ID',
  `pid` int(11) NOT NULL COMMENT '父ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `mtitle` varchar(255) DEFAULT NULL COMMENT '副标题',
  `description` text COMMENT '描述',
  `type` int(8) NOT NULL DEFAULT '1' COMMENT '菜单类型',
  `link` varchar(255) DEFAULT NULL COMMENT '菜单链接',
  `tmp` int(8) NOT NULL DEFAULT '1' COMMENT '菜单模板',
  `tmp_config` text COMMENT '模板配置信息',
  `img_menu` varchar(500) NOT NULL COMMENT '菜单图标',
  `img_smenu` varchar(500) DEFAULT NULL COMMENT '菜单副图标',
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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='菜单表';

-- ----------------------------
-- Records of zx_menu
-- ----------------------------
INSERT INTO `zx_menu` VALUES ('6', '1', '0', '首页', 'a11', '菜单描述', '1', 'www.baidu.com', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"/upload/u00001/Images/20160601/41eae321616c03b2ef5680052e544873_180323.png\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"/upload/u00001/Images/20160511/99a9f16d564e5a5685c7087c425dad7f_215648.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"/upload/u00001/Images/20160511/d2e02d5622c294c781176852597bac53_215650.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"/upload/u00001/Images/20160511/aee7d4fbaf4f4fa00546944da6311797_215652.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', null, '0', null, null, '6', '1', '[{\"itgdataname\":\"name1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val1\"},{\"itgdataname\":\"name2\",\"itgdatakey\":\"key2\",\"itgdataval\":\"val2\"}]', '[{\"itgimgname\":\"img\",\"itgimgwidth\":\"645\",\"itgimgheight\":\"453\"}]', '{\"title\":\"分享标题分享标题分享标题分享标题\",\"desc\":\"分享描述分享描述分享描述分享描述分享描述分享描述分享描述分享描述\",\"img\":\"/upload/u00001/Images/20160513/721614de9177fbd1e20a7481839136df_144051.jpg\"}', '{\"keyword\":\"SEO关键字111\",\"desc\":\"SEO描述SEO描述SEO描述SEO描述SEO描述SEO描述111\"}', '1457688379', '1468634862');
INSERT INTO `zx_menu` VALUES ('35', '1', '6', '12312', '123123', '12312', '1', '123123', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', null, '', '', '', '2', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467703325', '1467956847');
INSERT INTO `zx_menu` VALUES ('20', '1', '0', '新闻频道', 'a111', '', '1', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"/upload/u00001/Images/20160601/2575eb4905c9fb2f49a02f5610d775e7_180411.png\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', null, '', null, null, '3', '1', '[{\"itgdataname\":\"name123\",\"itgdatakey\":\"key123\",\"itgdataval\":\"val123\"},{\"itgdataname\":\"name321\",\"itgdatakey\":\"key321\",\"itgdataval\":\"val321\"}]', '[{\"itgimgname\":\"tupian\",\"itgimgwidth\":\"555\",\"itgimgheight\":\"666\"}]', '', null, '1457757460', '1468650375');
INSERT INTO `zx_menu` VALUES ('21', '1', '0', '国内新闻', 'wqeq12', '', '2', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', null, '', null, null, '4', '1', '[{\"itgdataname\":\"名称\",\"itgdatakey\":\"key\",\"itgdataval\":\"val\"},{\"itgdataname\":\"名称1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val222\"}]', '[{\"itgimgname\":\"\",\"itgimgwidth\":\"\",\"itgimgheight\":\"\"}]', '', null, '1457757486', '1465196233');
INSERT INTO `zx_menu` VALUES ('23', '1', '0', '国际新闻1', 'qwe', '', '3', '请问请问企鹅', '1', '', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', null, '', null, null, '5', '1', null, null, '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1458045731', '1464340051');
INSERT INTO `zx_menu` VALUES ('34', '1', '0', '公司动态', '', '公司动态的东西', '2', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', null, '', null, null, '6', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1465201393', '1465201415');
INSERT INTO `zx_menu` VALUES ('36', '1', '6', '1首页', '1232', '123123', '1', '123', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', null, '', null, null, '7', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467704976', '1467704985');
INSERT INTO `zx_menu` VALUES ('37', '1', '36', '报名测试', '', '1232', '11', '', '1', null, '{\"path\":\"\",\"width\":\"100\",\"height\":\"100\",\"title\":\"\",\"link\":\"\",\"uploadID\":\"0\"}', '{\"path\":\"\",\"width\":\"100\",\"height\":\"100\",\"title\":\"\",\"link\":\"\",\"uploadID\":\"0\"}', '', null, null, '8', '1', null, null, '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467705024', '1472010783');
INSERT INTO `zx_menu` VALUES ('38', '1', '6', '123123', '1231231', '23123', '3', '123123', '123123', '123123', '12312', null, '123123', '123132', '123123', '11', '0', '12313', '123123', '123123', '123123而且', '1467956804', '1468639143');
INSERT INTO `zx_menu` VALUES ('39', '1', '0', '新增一个标题看看', '', '描述描述', '1', '123123123', '1', null, '12313', null, '0', null, '123312', '3', '1', '21313', '12331', '123123', '213123', '1467962267', '1468634746');
INSERT INTO `zx_menu` VALUES ('51', '1', '39', 'qweqwe', 'qweqweqw', '', '2', 'eqweqwe', '1', null, '{\"path\":\"/upload/x00001/images/201607/15175755x9a193.png\",\"width\":\"100\",\"height\":\"100\",\"title\":\"\",\"link\":\"\",\"size\":\"668\",\"uploadID\":32}', '{\"path\":\"/upload/x00001/images/201607/15175755x22a36.png\",\"width\":\"100\",\"height\":\"100\",\"title\":\"\",\"link\":\"\",\"size\":\"1226\",\"uploadID\":33}', '0', null, null, '0', '1', null, null, null, null, '1468576675', '1468576675');
INSERT INTO `zx_menu` VALUES ('47', '1', '0', 'sssssssssss', 'sss', '', '1', '', '1', null, '{\"path\":\"/upload/x00001/images/201607/15171737xbc82c.jpg\",\"width\":\"0\",\"height\":\"0\",\"title\":\"sasaa\",\"link\":\"\",\"size\":44091,\"uploadID\":null}', '{\"path\":\"/upload/x00001/images/201607/15171737x3243c.jpg\",\"width\":\"15\",\"height\":\"15\",\"title\":\"1212\",\"link\":\"1212\",\"size\":827,\"uploadID\":null}', '0', null, '', '4', '1', '', '', '', '', '1468574257', '1468634837');
INSERT INTO `zx_menu` VALUES ('45', '1', '0', '321231231313131', '123123', '', '1', '', '2', null, '{\"path\":\"/upload/x00001/images/201607/15170425xdf410.jpg\",\"width\":\"155\",\"height\":\"155\",\"title\":\"ttttttt\",\"link\":\"http://www.baiud.comttt\",\"size\":3696,\"uploadID\":null}', '{\"path\":\"/upload/x00001/images/201607/15170425x45a69.png\",\"width\":\"55\",\"height\":\"55\",\"title\":\"中奖ttttt\",\"link\":\"http://www.tudou.comtttt\",\"size\":3464,\"uploadID\":null}', '0', null, '', '2', '1', '', '', '{\"title\":\"\\u5206\\u4eab\\u6807\\u9898\",\"desc\":\"\\u5206\\u4eab\\u63cf\\u8ff0\",\"img\":\"\\/upload\\/x00001\\/images\\/201607\\/18134803xbe797.png\"}', '{\"title\":\"SEO\\u6807\\u9898\",\"desc\":\"SEO\\u63cf\\u8ff0\"}', '1468573198', '1468820883');
INSERT INTO `zx_menu` VALUES ('48', '1', '0', 'fefeefefef', '', '', '1', '', '1', null, '{\"path\":\"/upload/x00001/images/201607/15172307xbc82c.jpg\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"size\":\"44091\",\"uploadID\":26}', '{\"path\":\"/upload/x00001/images/201607/15172307x3243c.jpg\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"size\":\"11920\",\"uploadID\":27}', '0', null, '', '7', '1', '', '', '', '', '1468574587', '1468637771');
INSERT INTO `zx_menu` VALUES ('49', '1', '0', '2222ddddd', 'd2', '', '1', '', '1', null, '{\"path\":\"/upload/x00001/images/201607/15172755x8d034.png\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"size\":\"1578\",\"uploadID\":28}', '{\"path\":\"/upload/x00001/images/201607/15172755xa04db.png\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"size\":\"1650\",\"uploadID\":29}', '0', null, '', '3', '1', '', '', '', '', '1468574875', '1468637775');
INSERT INTO `zx_menu` VALUES ('50', '1', '0', '123123', '', '', '1', '', '1', null, '{\"path\":\"\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"uploadID\":\"0\"}', '{\"path\":\"\",\"width\":\"0\",\"height\":\"0\",\"title\":\"\",\"link\":\"\",\"uploadID\":\"0\"}', '0', null, '', '2', '0', '', '', '{\"title\":\"rrrrrrrrrrrr\",\"desc\":\"tttttttttttttt\",\"img\":\"\\/upload\\/x00001\\/images\\/201607\\/18140913x7765e.png\"}', '{\"title\":\"dddddd\",\"desc\":\"ffffffffff\"}', '1468575160', '1468822153');
INSERT INTO `zx_menu` VALUES ('52', '1', '0', 'ooooooooooooooooo', '', '', '1', '', '1', null, '{\"path\":\"/upload/x00001/images/201607/16171055x7765e.png\",\"width\":\"100\",\"height\":\"100\",\"title\":\"hahhah\",\"link\":\"http://www.tudou.com\",\"uploadID\":\"34\"}', '{\"path\":\"/upload/x00001/images/201607/16171924xb3812.png\",\"width\":\"100\",\"height\":\"100\",\"title\":\"xiaoming\",\"link\":\"http://www.baidu.com\",\"uploadID\":\"36\"}', '0', null, null, '5', '1', null, null, null, null, '1468660256', '1468660874');

-- ----------------------------
-- Table structure for `zx_oauth2`
-- ----------------------------
DROP TABLE IF EXISTS `zx_oauth2`;
CREATE TABLE `zx_oauth2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wid` int(8) DEFAULT NULL COMMENT 'wid标识',
  `openid` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户的唯一标识',
  `wxname` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户昵称',
  `wxpic` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。',
  `sex` tinyint(1) DEFAULT NULL COMMENT '用户的性别，值为1时是男性，值为2时是女性，值为0时是未知',
  `province` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户个人资料填写的省份',
  `city` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '普通用户个人资料填写的城市',
  `country` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '国家，如中国为CN',
  `privilege` text CHARACTER SET utf8 COMMENT '用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）',
  `subscribe` tinyint(1) DEFAULT '0' COMMENT '是否关注',
  `encrypt` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '加密字符串',
  `unionid` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。',
  `created_at` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='微信授权表';

-- ----------------------------
-- Records of zx_oauth2
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_plug`
-- ----------------------------
DROP TABLE IF EXISTS `zx_plug`;
CREATE TABLE `zx_plug` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `controller` varchar(255) NOT NULL COMMENT '所属控制器',
  `images` text COMMENT '图片数据',
  `short` text COMMENT '模型描述',
  `type` tinyint(2) DEFAULT '1' COMMENT '类型',
  `is_open` varchar(20) DEFAULT '1' COMMENT '是否可用',
  `tmpdata` text COMMENT '模板数据',
  `tmpimg` text COMMENT '模板图片',
  `created_at` varchar(30) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of zx_plug
-- ----------------------------
INSERT INTO `zx_plug` VALUES ('1', '菜单模型', 'Menu/index', '[{\"url\":\"upload/u00001/Images/20160302/99a9f16d564e5a5685c7087c425dad7f_224201.jpg\",\"link\":\"uii:8282/index.php?r=system\",\"width\":\"123\",\"height\":\"321\",\"label\":\"图片标题\",\"name\":\"images\"}]', '不添加任何模型，作为一个父菜单存在。', '1', '1', '[{\"itgdataname\":\"菜单字体大小\",\"itgdatakey\":\"fontsize\",\"itgdataval\":\"25\"},{\"itgdataname\":\"菜单字体颜色\",\"itgdatakey\":\"fontcolor\",\"itgdataval\":\"#000000\"},{\"itgdataname\":\"标题图\",\"itgdatakey\":\"fonttitle\",\"itgdataval\":\"http://api.vbl.cc\"}]', '[{\"itgimgname\":\"模板图片1\",\"itgimgwidth\":\"100\",\"itgimgheight\":\"640\"}]', '2016/02/29', '1464933598');
INSERT INTO `zx_plug` VALUES ('2', '文章+列表模型', 'Article/index', '[{\"url\":\"upload/u00001/Images/20160301/07521c3b9bd33197d1d9234889164b37_204010.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"示例图片\",\"name\":\"images\"}]', '文章列表，点击列表进入文章详细页面', '1', '1', null, null, '2016/02/29', '1457171632');
INSERT INTO `zx_plug` VALUES ('3', '单页面模型', 'Page/index', '[{\"url\":\"\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"示例图片\",\"name\":\"images\"}]', '', '1', '1', null, null, '2016/02/29', '1457012211');
INSERT INTO `zx_plug` VALUES ('4', '产品模型', 'Goods/goodsList', null, null, '2', '1', null, null, '1456745368', '1456751368');
INSERT INTO `zx_plug` VALUES ('5', '相册模型', 'Gallery/index', null, '', '1', '1', null, null, '1456744368', '1464597973');
INSERT INTO `zx_plug` VALUES ('6', '招聘模型', 'Recruitment/recList', null, null, '2', '1', null, null, '1456742368', '1456751368');
INSERT INTO `zx_plug` VALUES ('7', '下载模型', 'Download/showList', null, null, '1', '1', null, null, '1456741368', '1456751368');
INSERT INTO `zx_plug` VALUES ('8', '电子宣传册', 'Epage/index', '[{\"url\":\"upload/u00001/Images/20160301/99a9f16d564e5a5685c7087c425dad7f_210459.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"示例图片\",\"name\":\"images\"}]', '电子宣传册，类似翻页', '1', '1', null, null, '1456837538', '1456837538');
INSERT INTO `zx_plug` VALUES ('10', '外链模型', 'Menu/setlink', null, '作为外链的菜单，点击后跳转到所填写的链接', '1', '1', null, null, '1464156820', '1464156820');
INSERT INTO `zx_plug` VALUES ('11', '报名插件', 'Signup/index', '', '', '1', '1', '', '', '1472010729', '1472010729');

-- ----------------------------
-- Table structure for `zx_signup`
-- ----------------------------
DROP TABLE IF EXISTS `zx_signup`;
CREATE TABLE `zx_signup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `wid` int(8) DEFAULT NULL,
  `openid` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `tel` varchar(30) DEFAULT NULL COMMENT '电话',
  `mid` int(8) DEFAULT NULL COMMENT '菜单id',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别，0未知，1男，2女',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `st` tinyint(2) DEFAULT '0' COMMENT '状态',
  `info` text COMMENT '额外数据',
  `created_at` varchar(20) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(20) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='报名数据表';

-- ----------------------------
-- Records of zx_signup
-- ----------------------------
INSERT INTO `zx_signup` VALUES ('1', '2', 'openid', 'lurongze', '13828447640', '37', '1', '33', '2', 'info', '1468490064', '1468490064');
INSERT INTO `zx_signup` VALUES ('10', '2', 'openid', '陆荣泽', '13828337465', '37', null, null, '0', null, '1472109928', '1472109928');

-- ----------------------------
-- Table structure for `zx_signupset`
-- ----------------------------
DROP TABLE IF EXISTS `zx_signupset`;
CREATE TABLE `zx_signupset` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `wid` int(8) DEFAULT NULL,
  `mid` int(8) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '报名活动名称',
  `stime` varchar(20) DEFAULT NULL COMMENT '报名开始时间',
  `etime` varchar(20) DEFAULT NULL COMMENT '报名结束时间',
  `limit` int(10) DEFAULT NULL COMMENT '人数限制',
  `extend` text COMMENT '扩展字段',
  `created_at` varchar(20) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(20) DEFAULT NULL COMMENT '更新时间',
  `extinfo` text COMMENT '额外数据',
  PRIMARY KEY (`id`),
  UNIQUE KEY `菜单id` (`mid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='报名设置表';

-- ----------------------------
-- Records of zx_signupset
-- ----------------------------
INSERT INTO `zx_signupset` VALUES ('7', '2', '37', 'lulu', '2016-08-01 00:00', '2016-08-29 13:55', '123123', null, '1472018137', '1472025144', null);

-- ----------------------------
-- Table structure for `zx_tmp`
-- ----------------------------
DROP TABLE IF EXISTS `zx_tmp`;
CREATE TABLE `zx_tmp` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '模板名称',
  `tmpid` int(5) DEFAULT NULL COMMENT '模板自定义ID',
  `is_use` tinyint(1) DEFAULT '1' COMMENT '是否启用',
  `images` text COMMENT '样例图片',
  `configs` text COMMENT '模板的额外数据',
  `plugid` int(5) DEFAULT NULL COMMENT '模板所属的插件ID',
  `short` text COMMENT '模板描述',
  `created_at` varchar(30) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '更新时间',
  `imageset` text COMMENT '模板图片设置',
  PRIMARY KEY (`id`),
  KEY `模板号，插件id` (`tmpid`,`plugid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='模板表';

-- ----------------------------
-- Records of zx_tmp
-- ----------------------------
INSERT INTO `zx_tmp` VALUES ('1', '菜单模板1', '1', '1', '[{\"url\":\"/upload/u00001/Images/20160516/07521c3b9bd33197d1d9234889164b37_202356.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"600\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"字体大小\",\"extdatakey\":\"fontsize\",\"extdataval\":\"12\"},{\"extdataname\":\"字体颜色\",\"extdatakey\":\"fontcolor\",\"extdataval\":\"#f9f9f9\"},{\"extdataname\":\"行高\",\"extdatakey\":\"lineheight\",\"extdataval\":\"50\"}]', '1', '这是第一个菜单模板', '1463401538', '1463576433', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"广告图片1\",\"extimgwidth\":\"640\",\"extimgheight\":\"150\"}]');
INSERT INTO `zx_tmp` VALUES ('2', '菜单模板2', '2', '1', '[{\"url\":\"/upload/u00001/Images/20160516/99a9f16d564e5a5685c7087c425dad7f_203355.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"视频地址\",\"extdatakey\":\"videolink\"}]', '1', '这是第二个菜单模板', '1463402062', '1463406109', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"分享的图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"100\"}]');
INSERT INTO `zx_tmp` VALUES ('3', '菜单模板3', '3', '1', '[{\"url\":\"/upload/u00001/Images/20160516/99a9f16d564e5a5685c7087c425dad7f_210412.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"字体颜色\",\"extdatakey\":\"fontcolor\"}]', '1', '12313212', '1463403921', '1463403921', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('13', '电子宣传册模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '8', '', '1464760000', '1464760000', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('12', '下载模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '7', '', '1464759963', '1464759963', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('6', '文章列表模型1', '1', '1', '[{\"url\":\"/upload/u00001/Images/20160516/74c4a9dda7414c1086e053d27c7ea54b_214234.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"标题字体\",\"extdatakey\":\"titlefontfamily\",\"extdataval\":\"\"},{\"extdataname\":\"标题大小\",\"extdatakey\":\"titlefontsize\",\"extdataval\":\"\"}]', '2', '这是一个文章列表的模板', '1463406223', '1463904148', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('9', '外链模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"在新窗口中打开链接（非空则为是）\",\"extdatakey\":\"target\",\"extdataval\":\"1\"}]', '10', '外链模板', '1464156934', '1464157534', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('10', '单页模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"单页1\",\"extdatakey\":\"pageindex\",\"extdataval\":\"0\"}]', '3', '单页插件的第一个模板', '1464328029', '1464328194', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('11', '相册模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"图片宽度\",\"extdatakey\":\"imgwidth\",\"extdataval\":\"640\"},{\"extdataname\":\"图片高度\",\"extdatakey\":\"imgheight\",\"extdataval\":\"640\"}]', '5', '图片相册', '1464598083', '1464762010', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('14', '产品模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '4', '', '1464760031', '1464760031', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('15', '招聘模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '6', '', '1464760068', '1464760068', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `zx_tmp` VALUES ('16', '相册模板2', '2', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"高度\",\"extdatakey\":\"height\",\"extdataval\":\"555\"}]', '5', '', '1464762196', '1464762454', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');

-- ----------------------------
-- Table structure for `zx_upload`
-- ----------------------------
DROP TABLE IF EXISTS `zx_upload`;
CREATE TABLE `zx_upload` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `wid` int(8) DEFAULT NULL COMMENT '网站id',
  `mid` int(8) DEFAULT NULL COMMENT '菜单id',
  `cid` int(8) DEFAULT NULL COMMENT '辨别id',
  `uid` int(8) DEFAULT NULL COMMENT '上传用户id',
  `title` varchar(100) DEFAULT NULL COMMENT '图片名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `width` int(8) DEFAULT NULL COMMENT '宽度',
  `height` int(8) DEFAULT NULL COMMENT '高度',
  `path` varchar(100) DEFAULT NULL COMMENT '图片路径',
  `type` varchar(100) DEFAULT NULL COMMENT '类型',
  `size` varchar(10) DEFAULT '0' COMMENT '大小',
  `desc` varchar(100) DEFAULT NULL COMMENT '描述',
  `isuse` int(1) DEFAULT NULL COMMENT '是否再用',
  `created_at` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COMMENT='上传表';

-- ----------------------------
-- Records of zx_upload
-- ----------------------------
INSERT INTO `zx_upload` VALUES ('14', '1', '123', null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14163751x3cfa6.png', 'Jquery-Upload', '9K', null, '1', '1468485102', '1468485471');
INSERT INTO `zx_upload` VALUES ('15', '1', '123', null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14164033x52d97.png', 'Jquery-Upload', '2K', null, '0', '1468485633', '1468485633');
INSERT INTO `zx_upload` VALUES ('16', '1', '123', null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14164140x3cfa6.png', 'Jquery-Upload', '9K', null, '0', '1468485700', '1468485700');
INSERT INTO `zx_upload` VALUES ('17', '1', '123', null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14164342x3cfa6.png', 'Jquery-Upload', '9K', null, '0', '1468485822', '1468485822');
INSERT INTO `zx_upload` VALUES ('18', '1', '123', null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14164434x3cfa6.png', 'Jquery-Upload', '9K', null, '0', '1468485874', '1468485874');
INSERT INTO `zx_upload` VALUES ('19', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14165449x038de.jpg', 'Jquery-Upload', '15K', null, '0', '1468486489', '1468486489');
INSERT INTO `zx_upload` VALUES ('20', '1', null, null, '1', 'hhaha', 'http://www.baidu.com', '100', '111', '/upload/x00001/Images/201607/14165952xf0d94.png', 'Jquery-Upload', '130K', null, '1', '1468486766', '1468486792');
INSERT INTO `zx_upload` VALUES ('21', '1', null, null, '1', 'tttu', 'http://www.bilibili.com', '10', '20', '/upload/x00001/Images/201607/14170448xf0d94.png', 'Jquery-Upload', '1K', null, '1', '1468487064', '1468487088');
INSERT INTO `zx_upload` VALUES ('22', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14175424x98a31.png', 'Jquery-Upload', '62K', null, '0', '1468490064', '1468490064');
INSERT INTO `zx_upload` VALUES ('23', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14175445x3cfa6.png', 'Jquery-Upload', '9K', null, '0', '1468490085', '1468490085');
INSERT INTO `zx_upload` VALUES ('24', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14175740x3cfa6.png', 'Jquery-Upload', '9K', null, '0', '1468490260', '1468490260');
INSERT INTO `zx_upload` VALUES ('25', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/Images/201607/14175749x41745.png', 'Jquery-Upload', '11K', null, '0', '1468490269', '1468490269');
INSERT INTO `zx_upload` VALUES ('26', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/images/201607/15172307xbc82c.jpg', null, '44091', null, '1', '1468574587', '1468574587');
INSERT INTO `zx_upload` VALUES ('27', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/images/201607/15172307x3243c.jpg', null, '11920', null, '1', '1468574587', '1468574587');
INSERT INTO `zx_upload` VALUES ('28', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/images/201607/15172755x8d034.png', null, '1578', null, '1', '1468574875', '1468574875');
INSERT INTO `zx_upload` VALUES ('29', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/images/201607/15172755xa04db.png', null, '1650', null, '1', '1468574875', '1468574875');
INSERT INTO `zx_upload` VALUES ('30', null, null, null, null, '', '', '0', '0', '', null, '0', null, null, '1468575160', '1468575160');
INSERT INTO `zx_upload` VALUES ('31', null, null, null, null, '', '', '0', '0', '', null, '0', null, null, '1468575160', '1468575160');
INSERT INTO `zx_upload` VALUES ('32', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/15175755x9a193.png', null, '668', null, '1', '1468576675', '1468576675');
INSERT INTO `zx_upload` VALUES ('33', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/15175755x22a36.png', null, '1226', null, '1', '1468576675', '1468576675');
INSERT INTO `zx_upload` VALUES ('34', '1', null, null, '1', 'hahhah', 'http://www.tudou.com', '100', '100', '/upload/x00001/images/201607/16171055x7765e.png', null, '0', null, '1', '1468660256', '1468660874');
INSERT INTO `zx_upload` VALUES ('36', '1', null, null, '1', 'xiaoming', 'http://www.baidu.com', '100', '100', '/upload/x00001/images/201607/16171924xb3812.png', null, '14577', null, '1', '1468660764', '1468660874');
INSERT INTO `zx_upload` VALUES ('37', '1', null, null, '1', null, null, null, null, '/upload/x00001/images/201607/18115620x1cbdb.png', null, '41004', null, '1', '1468814180', '1468814180');
INSERT INTO `zx_upload` VALUES ('38', '1', null, null, '1', null, null, '360', '360', '/upload/x00001/images/201607/18134803xbe797.png', null, '83870', null, '1', '1468820883', '1468820883');
INSERT INTO `zx_upload` VALUES ('39', null, null, null, null, null, null, '360', '360', '/upload/x00001/images/201607/18134803xbe797.png', null, null, null, null, '1468820979', '1468820979');
INSERT INTO `zx_upload` VALUES ('40', '1', null, null, '1', null, null, '360', '360', '/upload/x00001/images/201607/18140913x7765e.png', null, '97320', null, '1', '1468822153', '1468822153');
INSERT INTO `zx_upload` VALUES ('41', null, null, null, null, '', '', '0', '0', '', null, '0', null, null, '1469429536', '1469429536');
INSERT INTO `zx_upload` VALUES ('42', null, null, null, null, '', '', '0', '0', '', null, '0', null, null, '1469429536', '1469429536');
INSERT INTO `zx_upload` VALUES ('43', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/images/201607/25145537x57c4f.png', null, '13080', null, '1', '1469429737', '1469429737');
INSERT INTO `zx_upload` VALUES ('44', '1', null, null, '1', '', '', '0', '0', '/upload/x00001/images/201607/25145537x15f80.png', null, '16172', null, '1', '1469429737', '1469429737');
INSERT INTO `zx_upload` VALUES ('45', '1', null, null, '1', null, null, '360', '360', '/upload/x00001/images/201607/25150835xff9b4.jpg', null, '4094', null, '1', '1469430515', '1469430515');
INSERT INTO `zx_upload` VALUES ('46', null, null, null, null, '', '', '100', '100', '', null, '0', null, null, '1469432824', '1469432824');
INSERT INTO `zx_upload` VALUES ('47', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/25154940x4de91.jpg', null, '3482', null, '1', '1469432981', '1469432981');
INSERT INTO `zx_upload` VALUES ('48', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/25154949x4de91.jpg', null, '3482', null, '1', '1469432990', '1469432990');
INSERT INTO `zx_upload` VALUES ('49', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/25155136x4de91.jpg', null, '3482', null, '1', '1469433096', '1469433096');
INSERT INTO `zx_upload` VALUES ('50', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/25155315x4de91.jpg', null, '3482', null, '1', '1469433195', '1469433195');
INSERT INTO `zx_upload` VALUES ('51', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/25155331x4de91.jpg', null, '3482', null, '1', '1469433211', '1469433211');
INSERT INTO `zx_upload` VALUES ('52', '1', null, null, '1', '', '', '100', '100', '/upload/x00001/images/201607/25155458x4de91.jpg', null, '3482', null, '1', '1469433298', '1469433298');
INSERT INTO `zx_upload` VALUES ('53', null, null, null, null, '', '', '200', '200', '', null, '0', null, null, '1469503796', '1469503796');
INSERT INTO `zx_upload` VALUES ('54', null, null, null, null, '', '', '200', '200', '', null, '0', null, null, '1469504199', '1469504199');
INSERT INTO `zx_upload` VALUES ('55', null, null, null, null, '', '', '200', '200', '', null, '0', null, null, '1469504735', '1469504735');
INSERT INTO `zx_upload` VALUES ('56', '1', null, null, '1', '', '', '200', '200', '/upload/x00001/images/201607/26134125x4de91.jpg', null, '8070', null, '1', '1469511688', '1469511688');
INSERT INTO `zx_upload` VALUES ('57', null, null, null, null, '', null, null, null, '', null, '0', null, null, '1469521082', '1469521082');
INSERT INTO `zx_upload` VALUES ('58', null, null, null, null, '', null, null, null, '', null, '0', null, null, '1469521082', '1469521082');
INSERT INTO `zx_upload` VALUES ('59', null, null, null, null, '', null, null, null, '', null, '0', null, null, '1469521099', '1469521099');
INSERT INTO `zx_upload` VALUES ('60', null, null, null, null, '', null, null, null, '', null, '0', null, null, '1469521099', '1469521099');
INSERT INTO `zx_upload` VALUES ('61', '1', null, null, '1', '', null, null, null, '/upload/x00001/file/201607/26161910xcad9c.txt', null, '5358', null, '1', '1469521150', '1469521150');
INSERT INTO `zx_upload` VALUES ('62', '1', null, null, '1', '', null, null, null, '/upload/x00001/file/201607/26161910x4aaab.txt', null, '95957', null, '1', '1469521150', '1469521150');
INSERT INTO `zx_upload` VALUES ('63', null, null, null, null, '', null, null, null, '/upload/x00001/file/201607/26161910x4aaab.txt', null, '0', null, null, '1469521240', '1469521240');
INSERT INTO `zx_upload` VALUES ('64', '1', null, null, '1', '', null, null, null, '/upload/x00001/file/201607/26162048x4aaab.txt', null, '95957', null, '1', '1469521248', '1469521248');
INSERT INTO `zx_upload` VALUES ('65', null, null, null, null, '', null, null, null, '/upload/x00001/file/201607/26161910x4aaab.txt', null, '0', null, null, '1469521248', '1469521248');
INSERT INTO `zx_upload` VALUES ('66', null, null, null, null, '', null, null, null, '/upload/x00001/file/201607/26162048x4aaab.txt', null, '0', null, null, '1469522713', '1469522713');
INSERT INTO `zx_upload` VALUES ('67', null, null, null, null, '', null, null, null, '/upload/x00001/file/201607/26161910x4aaab.txt', null, '0', null, null, '1469522713', '1469522713');
INSERT INTO `zx_upload` VALUES ('68', null, null, null, null, '', null, null, null, '/upload/x00001/file/201607/26162048x4aaab.txt', null, '0', null, null, '1469522719', '1469522719');
INSERT INTO `zx_upload` VALUES ('69', null, null, null, null, '', null, null, null, '/upload/x00001/file/201607/26161910x4aaab.txt', null, '0', null, null, '1469522719', '1469522719');
INSERT INTO `zx_upload` VALUES ('70', null, null, null, null, '', '', '100', '100', '', null, '0', null, null, '1472010783', '1472010783');
INSERT INTO `zx_upload` VALUES ('71', null, null, null, null, '', '', '100', '100', '', null, '0', null, null, '1472010783', '1472010783');

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
  `portrait` varchar(500) DEFAULT NULL COMMENT '头像',
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of zx_user
-- ----------------------------
INSERT INTO `zx_user` VALUES ('1', '1', null, '陆荣泽', '$2y$13$8uiYAALSAt8QSw6ONblwKOlBWnc4f1BpMOh7tWL2lhdrO/sKYUL7C', '', '{\"path\":\"/upload/x00001/images/201607/25155458x4de91.jpg\",\"width\":\"100\",\"height\":\"100\",\"title\":\"\",\"link\":\"\",\"size\":\"3482\",\"uploadID\":52}', '1472010614', '127.0.0.1', '6', '1946755280@qq.com', 'DEVELOPER', '1467884992', '1472010614', 'D9KDaSvwmfS8s5m2tT0HBrjYTZr_N8mI', '5a81pcW5be-41A_1uXwrsXvPMG5psLYq', '1', '1567884992', null, null, null);
INSERT INTO `zx_user` VALUES ('2', '2', null, 'lurongze', '$2y$13$TEhvEtYyRORsCgCP43ZOl.4pgIYVkzc4/MN6kcxk0WqyvgGgzjJEG', null, null, '1470726632', '::1', '0', '326108993@qq.com', 'USER', '1470726633', '1470726634', 'DZXqhjMKCpxZVJRg4P31qlMG_qlgzpNr', 'sYmw3ixNKWmBjCmyRLQLuqJmK3Es6AKZ', '0', '1470726633.864', null, null, null);

-- ----------------------------
-- Table structure for `zx_web`
-- ----------------------------
DROP TABLE IF EXISTS `zx_web`;
CREATE TABLE `zx_web` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `admin` int(8) NOT NULL COMMENT '管理员id',
  `name` varchar(100) DEFAULT NULL COMMENT '网站名称',
  `logo` varchar(255) DEFAULT NULL COMMENT '网站LOGO',
  `config` text COMMENT '配置',
  `wx_appid` varchar(255) DEFAULT NULL COMMENT '公众号appid',
  `wx_appsecret` varchar(255) DEFAULT NULL COMMENT '公众号appsecret',
  `wx_merchant_number` varchar(100) DEFAULT NULL COMMENT '微信支付商户号',
  `wx_merchant_key` varchar(255) DEFAULT NULL COMMENT '微信支付秘钥',
  `wx_apiclient_cert` varchar(255) DEFAULT NULL COMMENT '微信支付证书apiclient_cert',
  `wx_apiclient_key` varchar(255) DEFAULT NULL COMMENT '微信支付证书apiclient_key',
  `wx_token` varchar(255) DEFAULT NULL COMMENT '微信token',
  `wx_aeskey` varchar(255) DEFAULT NULL COMMENT '微信EncodingAESKey',
  `wx_use` tinyint(1) unsigned zerofill DEFAULT '1' COMMENT '是否使用本公众号的授权接口',
  `wxinfo` text,
  `smtp` text COMMENT 'SMTP邮箱配置',
  `keyword` text COMMENT '网站关键字',
  `description` text COMMENT '网站描述',
  `created_at` varchar(20) DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(20) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='系统各子网站信息配置表，wid即webid从这个表根据admin拿到';

-- ----------------------------
-- Records of zx_web
-- ----------------------------
INSERT INTO `zx_web` VALUES ('1', '1', '第一个网站', '{\"path\":\"/upload/x00001/images/201607/26134125x4de91.jpg\",\"width\":\"200\",\"height\":\"200\",\"title\":\"\",\"link\":\"\",\"size\":\"8070\",\"uploadID\":56}', '', 'wx8a945e1be85d7785', 'ffbbb237341ecbc9efadca3888e5679a', '123456', '12345678', '/upload/x00001/file/201607/26162048x4aaab.txt', '/upload/x00001/file/201607/26161910x4aaab.txt', 'sc9Uu60n', 'aes', '1', null, 'SMTP', 'keyword-first-website', 'description-first-websit', '1469504199', '1469522719');
INSERT INTO `zx_web` VALUES ('2', '2', null, null, null, null, null, null, null, null, null, null, null, '1', null, null, null, null, '1470726634', '1470726634');
