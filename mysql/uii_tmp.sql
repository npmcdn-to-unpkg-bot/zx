/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : uii

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-08 16:15:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `uii_tmp`
-- ----------------------------
DROP TABLE IF EXISTS `uii_tmp`;
CREATE TABLE `uii_tmp` (
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='模板表';

-- ----------------------------
-- Records of uii_tmp
-- ----------------------------
INSERT INTO `uii_tmp` VALUES ('1', '菜单模板1', '1', '1', '[{\"url\":\"/upload/u00001/Images/20160516/07521c3b9bd33197d1d9234889164b37_202356.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"600\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"字体大小\",\"extdatakey\":\"fontsize\",\"extdataval\":\"12\"},{\"extdataname\":\"字体颜色\",\"extdatakey\":\"fontcolor\",\"extdataval\":\"#f9f9f9\"},{\"extdataname\":\"行高\",\"extdatakey\":\"lineheight\",\"extdataval\":\"50\"}]', '1', '这是第一个菜单模板', '1463401538', '1463576433', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"广告图片1\",\"extimgwidth\":\"640\",\"extimgheight\":\"150\"}]');
INSERT INTO `uii_tmp` VALUES ('2', '菜单模板2', '2', '1', '[{\"url\":\"/upload/u00001/Images/20160516/99a9f16d564e5a5685c7087c425dad7f_203355.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"视频地址\",\"extdatakey\":\"videolink\"}]', '1', '这是第二个菜单模板', '1463402062', '1463406109', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"分享的图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"100\"}]');
INSERT INTO `uii_tmp` VALUES ('3', '菜单模板3', '3', '1', '[{\"url\":\"/upload/u00001/Images/20160516/99a9f16d564e5a5685c7087c425dad7f_210412.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"字体颜色\",\"extdatakey\":\"fontcolor\"}]', '1', '12313212', '1463403921', '1463403921', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('13', '电子宣传册模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '8', '', '1464760000', '1464760000', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('12', '下载模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '7', '', '1464759963', '1464759963', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('6', '文章列表模型1', '1', '1', '[{\"url\":\"/upload/u00001/Images/20160516/74c4a9dda7414c1086e053d27c7ea54b_214234.jpg\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"标题字体\",\"extdatakey\":\"titlefontfamily\",\"extdataval\":\"\"},{\"extdataname\":\"标题大小\",\"extdatakey\":\"titlefontsize\",\"extdataval\":\"\"}]', '2', '这是一个文章列表的模板', '1463406223', '1463904148', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('9', '外链模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"在新窗口中打开链接（非空则为是）\",\"extdatakey\":\"target\",\"extdataval\":\"1\"}]', '10', '外链模板', '1464156934', '1464157534', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('10', '单页模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"单页1\",\"extdatakey\":\"pageindex\",\"extdataval\":\"0\"}]', '3', '单页插件的第一个模板', '1464328029', '1464328194', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('11', '相册模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"图片宽度\",\"extdatakey\":\"imgwidth\",\"extdataval\":\"640\"},{\"extdataname\":\"图片高度\",\"extdatakey\":\"imgheight\",\"extdataval\":\"640\"}]', '5', '图片相册', '1464598083', '1464762010', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('14', '产品模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '4', '', '1464760031', '1464760031', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('15', '招聘模型模板1', '1', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"\",\"extdatakey\":\"\"}]', '6', '', '1464760068', '1464760068', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
INSERT INTO `uii_tmp` VALUES ('16', '相册模板2', '2', '1', '[{\"url\":\"\",\"link\":\"\",\"width\":\"0\",\"height\":\"0\",\"label\":\"示例图片\",\"name\":\"images\"}]', '[{\"extdataname\":\"高度\",\"extdatakey\":\"height\",\"extdataval\":\"555\"}]', '5', '', '1464762196', '1464762454', '[{\"extimgname\":\"头部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"},{\"extimgname\":\"底部图片\",\"extimgwidth\":\"640\",\"extimgheight\":\"300\"}]');
