/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : zx

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-12 18:00:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zx_images`
-- ----------------------------
DROP TABLE IF EXISTS `zx_images`;
CREATE TABLE `zx_images` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `wid` int(8) DEFAULT NULL COMMENT '网站id',
  `mid` int(8) DEFAULT NULL COMMENT '菜单id',
  `cid` int(8) DEFAULT NULL COMMENT '辨别id',
  `uid` int(8) DEFAULT NULL COMMENT '上传用户id',
  `title` varchar(100) DEFAULT NULL COMMENT '图片名称',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `width` int(8) DEFAULT NULL COMMENT '宽度',
  `height` int(8) DEFAULT NULL COMMENT '高度',
  `url` varchar(100) DEFAULT NULL COMMENT '地址',
  `type` varchar(100) DEFAULT NULL COMMENT '类型',
  `desc` varchar(100) DEFAULT NULL COMMENT '描述',
  `isuse` int(1) DEFAULT NULL COMMENT '是否再用',
  `created_at` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `updated_at` varchar(30) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zx_images
-- ----------------------------

-- ----------------------------
-- Table structure for `zx_menu`
-- ----------------------------
DROP TABLE IF EXISTS `zx_menu`;
CREATE TABLE `zx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `wid` int(11) NOT NULL COMMENT '菜单所属用户ID',
  `pid` int(11) NOT NULL COMMENT '父ID',
  `title` varchar(255) NOT NULL COMMENT '标题',
  `mtitle` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '副标题',
  `description` text CHARACTER SET utf8 NOT NULL COMMENT '描述',
  `type` int(8) NOT NULL DEFAULT '1' COMMENT '菜单类型',
  `link` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '菜单链接',
  `tmp` int(8) NOT NULL DEFAULT '1' COMMENT '菜单模板',
  `tmp_config` text CHARACTER SET utf8 COMMENT '模板配置信息',
  `images` text CHARACTER SET utf8 NOT NULL COMMENT '图片数据',
  `plist` varchar(255) CHARACTER SET utf8 DEFAULT '0' COMMENT '所有的父菜单id',
  `ext_data` text CHARACTER SET utf8 COMMENT '额外的数据',
  `configs` text CHARACTER SET utf8 COMMENT '配置信息，一般拿来保存子菜单需要的配置信息',
  `sort_order` int(8) DEFAULT '0' COMMENT '排序',
  `is_open` tinyint(1) DEFAULT '1' COMMENT '是否启用',
  `configdata` text CHARACTER SET utf8 COMMENT '插件下的额外数据内容',
  `configimg` text CHARACTER SET utf8 COMMENT '插件下的额外图片数据',
  `share` text CHARACTER SET utf8 COMMENT '分享设置',
  `seo` text CHARACTER SET utf8 COMMENT 'SEO配置信息',
  `created_at` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建时间',
  `updated_at` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COMMENT='菜单表';

-- ----------------------------
-- Records of zx_menu
-- ----------------------------
INSERT INTO `zx_menu` VALUES ('6', '1', '0', '首页', 'a11', '菜单描述', '1', 'www.baidu.com', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"/upload/u00001/Images/20160601/41eae321616c03b2ef5680052e544873_180323.png\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"/upload/u00001/Images/20160511/99a9f16d564e5a5685c7087c425dad7f_215648.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"/upload/u00001/Images/20160511/d2e02d5622c294c781176852597bac53_215650.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"/upload/u00001/Images/20160511/aee7d4fbaf4f4fa00546944da6311797_215652.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '0', null, null, '1', '1', '[{\"itgdataname\":\"name1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val1\"},{\"itgdataname\":\"name2\",\"itgdatakey\":\"key2\",\"itgdataval\":\"val2\"}]', '[{\"itgimgname\":\"img\",\"itgimgwidth\":\"645\",\"itgimgheight\":\"453\"}]', '{\"title\":\"分享标题分享标题分享标题分享标题\",\"desc\":\"分享描述分享描述分享描述分享描述分享描述分享描述分享描述分享描述\",\"img\":\"/upload/u00001/Images/20160513/721614de9177fbd1e20a7481839136df_144051.jpg\"}', '{\"keyword\":\"SEO关键字111\",\"desc\":\"SEO描述SEO描述SEO描述SEO描述SEO描述SEO描述111\"}', '1457688379', '1464938043');
INSERT INTO `zx_menu` VALUES ('35', '1', '6', '12312', '123123', '12312', '1', '123123', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', '', '', '2', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467703325', '1467956847');
INSERT INTO `zx_menu` VALUES ('20', '1', '0', '新闻频道', 'a111', '', '1', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"/upload/u00001/Images/20160601/2575eb4905c9fb2f49a02f5610d775e7_180411.png\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '', null, null, '3', '1', '[{\"itgdataname\":\"name123\",\"itgdatakey\":\"key123\",\"itgdataval\":\"val123\"},{\"itgdataname\":\"name321\",\"itgdatakey\":\"key321\",\"itgdataval\":\"val321\"}]', '[{\"itgimgname\":\"tupian\",\"itgimgwidth\":\"555\",\"itgimgheight\":\"666\"}]', '', null, '1457757460', '1464938342');
INSERT INTO `zx_menu` VALUES ('21', '1', '0', '国内新闻', 'wqeq12', '', '2', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '', null, null, '4', '1', '[{\"itgdataname\":\"名称\",\"itgdatakey\":\"key\",\"itgdataval\":\"val\"},{\"itgdataname\":\"名称1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val222\"}]', '[{\"itgimgname\":\"\",\"itgimgwidth\":\"\",\"itgimgheight\":\"\"}]', '', null, '1457757486', '1465196233');
INSERT INTO `zx_menu` VALUES ('23', '1', '0', '国际新闻1', 'qwe', '', '3', '请问请问企鹅', '1', '', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"导航图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"按钮图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"分享图片\",\"name\":\"images\"}]', '', null, null, '5', '1', null, null, '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1458045731', '1464340051');
INSERT INTO `zx_menu` VALUES ('34', '1', '0', '公司动态', '', '公司动态的东西', '2', '', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '6', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1465201393', '1465201415');
INSERT INTO `zx_menu` VALUES ('36', '1', '6', '1首页', '1232', '123123', '1', '123', '1', '{\"data\":\"{\\\"fontsize\\\":\\\"25\\\",\\\"fontcolor\\\":\\\"#000000\\\",\\\"fonttitle\\\":\\\"http://api.vbl.cc\\\"}\",\"img\":\"[{\\\"url\\\":\\\"\\\",\\\"link\\\":\\\"\\\",\\\"width\\\":\\\"100\\\",\\\"height\\\":\\\"640\\\",\\\"label\\\":\\\"模板图片1\\\",\\\"name\\\":\\\"images\\\"}]\"}', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '7', '1', '[{\"itgdataname\":\"\",\"itgdatakey\":\"\",\"itgdataval\":\"\"}]', '[]', '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467704976', '1467704985');
INSERT INTO `zx_menu` VALUES ('37', '1', '36', '2首页', '', '1232', '1', '', '1', null, '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标1\",\"name\":\"images\"},{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"菜单图标2\",\"name\":\"images\"}]', '', null, null, '8', '1', null, null, '{\"title\":\"\",\"desc\":\"\",\"img\":\"\"}', '{\"keyword\":\"\",\"desc\":\"\"}', '1467705024', '1467705024');
INSERT INTO `zx_menu` VALUES ('38', '1', '6', '123123', '1231231', '23123', '123123', '123123', '123123', '123123', '12312', '123123', '123132', '123123', '12313', '0', '12313', '123123', '123123', '123123而且', '1467956804', '1467956804');
INSERT INTO `zx_menu` VALUES ('39', '1', '0', '新增一个标题看看', '', '描述描述', '1', '123123123', '1', null, '12313', '0', null, '123312', '0', '1', '21313', '12331', '123123', '213123', '1467962267', '1467962267');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='插件表';

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
INSERT INTO `zx_user` VALUES ('1', '1', null, '陆荣泽', '$2y$13$uy0aB58DVquOk0gkOurLCe/ZA4lpSswbtxj9ivUWDXbt2DUeIRrEa', null, null, '1468226662', '::1', '2', '1946755280@qq.com', 'DEVELOPER', '1467884992', '1468226662', 'D9KDaSvwmfS8s5m2tT0HBrjYTZr_N8mI', '5a81pcW5be-41A_1uXwrsXvPMG5psLYq', '1', '1567884992', null, null, null);

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
  `wxinfo` text CHARACTER SET utf8,
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
INSERT INTO `zx_web` VALUES ('1', '1', null, null, null, null, null, null, null, '1467884992', '1467884992');
