/*
Navicat MySQL Data Transfer

Source Server         : phpstudy3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : uii

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-07-08 09:51:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `uii_plug`
-- ----------------------------
DROP TABLE IF EXISTS `uii_plug`;
CREATE TABLE `uii_plug` (
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='插件表';

-- ----------------------------
-- Records of uii_plug
-- ----------------------------
INSERT INTO `uii_plug` VALUES ('1', '菜单模型', 'Menu/index', '[{\"url\":\"upload/u00001/Images/20160302/99a9f16d564e5a5685c7087c425dad7f_224201.jpg\",\"link\":\"uii:8282/index.php?r=system\",\"width\":\"123\",\"height\":\"321\",\"label\":\"图片标题\",\"name\":\"images\"}]', '不添加任何模型，作为一个父菜单存在。', '1', '1', '[{\"itgdataname\":\"菜单字体大小\",\"itgdatakey\":\"fontsize\",\"itgdataval\":\"25\"},{\"itgdataname\":\"菜单字体颜色\",\"itgdatakey\":\"fontcolor\",\"itgdataval\":\"#000000\"},{\"itgdataname\":\"标题图\",\"itgdatakey\":\"fonttitle\",\"itgdataval\":\"http://api.vbl.cc\"}]', '[{\"itgimgname\":\"模板图片1\",\"itgimgwidth\":\"100\",\"itgimgheight\":\"640\"}]', '2016/02/29', '1464933598');
INSERT INTO `uii_plug` VALUES ('2', '文章+列表模型', 'Article/index', '[{\"url\":\"upload/u00001/Images/20160301/07521c3b9bd33197d1d9234889164b37_204010.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"示例图片\",\"name\":\"images\"}]', '文章列表，点击列表进入文章详细页面', '1', '1', null, null, '2016/02/29', '1457171632');
INSERT INTO `uii_plug` VALUES ('3', '单页面模型', 'Page/index', '[{\"url\":\"\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"示例图片\",\"name\":\"images\"}]', '', '1', '1', null, null, '2016/02/29', '1457012211');
INSERT INTO `uii_plug` VALUES ('4', '产品模型', 'Goods/goodsList', null, null, '2', '1', null, null, '1456745368', '1456751368');
INSERT INTO `uii_plug` VALUES ('5', '相册模型', 'Gallery/index', null, '', '1', '1', null, null, '1456744368', '1464597973');
INSERT INTO `uii_plug` VALUES ('6', '招聘模型', 'Recruitment/recList', null, null, '2', '1', null, null, '1456742368', '1456751368');
INSERT INTO `uii_plug` VALUES ('7', '下载模型', 'Download/showList', null, null, '1', '1', null, null, '1456741368', '1456751368');
INSERT INTO `uii_plug` VALUES ('8', '电子宣传册', 'Epage/index', '[{\"url\":\"upload/u00001/Images/20160301/99a9f16d564e5a5685c7087c425dad7f_210459.jpg\",\"link\":\"\",\"width\":\"200\",\"height\":\"200\",\"label\":\"示例图片\",\"name\":\"images\"}]', '电子宣传册，类似翻页', '1', '1', null, null, '1456837538', '1456837538');
INSERT INTO `uii_plug` VALUES ('10', '外链模型', 'Menu/setlink', null, '作为外链的菜单，点击后跳转到所填写的链接', '1', '1', null, null, '1464156820', '1464156820');
INSERT INTO `uii_plug` VALUES ('14', '测试一下', 'qwe', null, '', '1', '1', '[{\"itgdataname\":\"name1\",\"itgdatakey\":\"key1\",\"itgdataval\":\"val1\"},{\"itgdataname\":\"name2\",\"itgdatakey\":\"key2\",\"itgdataval\":\"val2\"}]', '[{\"itgimgname\":\"头部图片\",\"itgimgwidth\":\"600\",\"itgimgheight\":\"500\"}]', '1464768795', '1464769019');
