/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50146
Source Host           : localhost:3306
Source Database       : phptushuxns62

Target Server Type    : MYSQL
Target Server Version : 50146
File Encoding         : 65001

Date: 2015-04-10 22:14:49
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `allusers`
-- ----------------------------
DROP TABLE IF EXISTS `allusers`;
CREATE TABLE `allusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `cx` varchar(50) DEFAULT '普通管理员',
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of allusers
-- ----------------------------
INSERT INTO `allusers` VALUES ('2', 'hsg', 'hsg', '超级管理员', '2015-04-10 10:51:02');
INSERT INTO `allusers` VALUES ('5', 'bb', 'bb', '普通管理员', '2015-04-10 22:08:34');

-- ----------------------------
-- Table structure for `jieyuejilu`
-- ----------------------------
DROP TABLE IF EXISTS `jieyuejilu`;
CREATE TABLE `jieyuejilu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tushudaima` varchar(50) DEFAULT NULL,
  `tushumingcheng` varchar(300) DEFAULT NULL,
  `tushufenlei` varchar(50) DEFAULT NULL,
  `tushuzuozhe` varchar(50) DEFAULT NULL,
  `kucun` varchar(50) DEFAULT NULL,
  `jieyongshuliang` varchar(50) DEFAULT NULL,
  `yujietianshu` varchar(50) DEFAULT NULL,
  `shifouguihuan` varchar(50) DEFAULT NULL,
  `guihuanshijian` varchar(50) DEFAULT NULL,
  `beizhu` varchar(500) DEFAULT NULL,
  `jieyueren` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `issh` varchar(2) DEFAULT '否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of jieyuejilu
-- ----------------------------
INSERT INTO `jieyuejilu` VALUES ('2', 'hrth', 'rehrejre', '计算机类', 'hrthtr', '2', '1', '9', '是', 'time', 'fewgew', '555', '2015-04-10 21:15:36', '是');
INSERT INTO `jieyuejilu` VALUES ('5', '004', 'ooicjvds', '计算机类', 'gthr', '22', '3', '45', '是', '1357825239', '3', '555', '2015-04-10 21:30:43', '是');
INSERT INTO `jieyuejilu` VALUES ('6', '003', 'grofgb', '科教类', 'trer', '22', '2', '23', '是', '2015-04-10 13:41:26', 'feew', '555', '2015-04-10 21:41:02', '是');
INSERT INTO `jieyuejilu` VALUES ('7', '006', 'gregrehre', '计算机类', 'fwegwe', '44', '5', '7', '是', '2015-04-10 14:11:02', 'gewrgre', 'ggg', '2015-04-10 22:10:28', '是');

-- ----------------------------
-- Table structure for `shangpinleibie`
-- ----------------------------
DROP TABLE IF EXISTS `shangpinleibie`;
CREATE TABLE `shangpinleibie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leibie` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of shangpinleibie
-- ----------------------------
INSERT INTO `shangpinleibie` VALUES ('13', '科教类', '2015-04-29 19:18:56');
INSERT INTO `shangpinleibie` VALUES ('14', '文艺类', '2015-04-29 19:20:23');
INSERT INTO `shangpinleibie` VALUES ('15', '计算机类', '2015-04-29 19:20:27');
INSERT INTO `shangpinleibie` VALUES ('16', '漫画类', '2015-04-29 19:20:39');

-- ----------------------------
-- Table structure for `tushuxinxi`
-- ----------------------------
DROP TABLE IF EXISTS `tushuxinxi`;
CREATE TABLE `tushuxinxi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tushudaima` varchar(50) DEFAULT NULL,
  `tushumingcheng` varchar(300) DEFAULT NULL,
  `tushufenlei` varchar(50) DEFAULT NULL,
  `tushuzuozhe` varchar(50) DEFAULT NULL,
  `chubanshe` varchar(300) DEFAULT NULL,
  `chubanriqi` varchar(50) DEFAULT NULL,
  `yeshu` varchar(50) DEFAULT NULL,
  `jiage` varchar(50) DEFAULT NULL,
  `tupian` varchar(50) DEFAULT NULL,
  `heshinianlingduan` varchar(50) DEFAULT NULL,
  `dianjilv` varchar(50) DEFAULT NULL,
  `beizhu` varchar(500) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of tushuxinxi
-- ----------------------------
INSERT INTO `tushuxinxi` VALUES ('2', '001', 'gewgewhw', '计算机类', 'wgewgw', 'gewhw', '2015-04-01', '33', '42', 'uploadfile/1357116677kvt3.gif', '1-7', '1', 'fewgew', '2015-04-02 16:51:22');
INSERT INTO `tushuxinxi` VALUES ('3', '002', 'ggogre', '漫画类', 'hreher', 'hrehre', '2015-04-02', '44', '44', 'uploadfile/13571229810fa8.jpg', '8-16', '33', 'fgewgegw', '2015-04-02 18:36:27');
INSERT INTO `tushuxinxi` VALUES ('4', '003', 'grofgb', '科教类', 'trer', 'hrehre', '2015-04-08', '522', '23', 'uploadfile/13571230105gez.jpg', '1-7', '22', 'wegw', '2015-04-02 18:36:54');
INSERT INTO `tushuxinxi` VALUES ('5', '004', 'ooicjvds', '计算机类', 'gthr', 'jtrjtrjtr', '2015-04-01', '225', '5', 'uploadfile/1357123034ix3a.jpg', '1-7', '22', 'fewgwe', '2015-04-02 18:37:19');
INSERT INTO `tushuxinxi` VALUES ('6', 'hrth', 'rehrejre', '计算机类', 'hrthtr', 'hrtjtr', '2015-04-07', '433', '33', 'uploadfile/13571416903k7d.gif', '17-40', '1', 'gewgwe', '2015-04-02 23:48:14');
INSERT INTO `tushuxinxi` VALUES ('7', '006', 'gregrehre', '计算机类', 'fwegwe', 'gwegew', '2015-04-08', '44', '33', 'uploadfile/13578269798gru.jpg', '17-40', '44', 'fwegwegw', '2015-04-10 22:09:48');

-- ----------------------------
-- Table structure for `yonghuzhuce`
-- ----------------------------
DROP TABLE IF EXISTS `yonghuzhuce`;
CREATE TABLE `yonghuzhuce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zhanghao` varchar(50) DEFAULT NULL,
  `mima` varchar(50) DEFAULT NULL,
  `xingming` varchar(50) DEFAULT NULL,
  `xingbie` varchar(50) DEFAULT NULL,
  `diqu` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `zhaopian` varchar(50) DEFAULT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `issh` varchar(10) DEFAULT '否',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of yonghuzhuce
-- ----------------------------
INSERT INTO `yonghuzhuce` VALUES ('26', '555', '555', '何升高', '男', '浙江', 'gsgs@163.com', 'uploadfile/13392103902z4y.jpg', '2015-04-12 10:21:38', '是');
INSERT INTO `yonghuzhuce` VALUES ('27', 'leejie', 'leejie', '李龙', '女', '湖北', 'fege@126.com', 'uploadfile/1357817108hljf.jpg', '2015-04-12 10:21:38', '是');
INSERT INTO `yonghuzhuce` VALUES ('28', 'mygod', 'mygod', '陈德才', '男', '河南', 'gshf@yahoo.com', 'uploadfile/1339211824lezl.gif', '2015-04-12 10:21:38', '是');
INSERT INTO `yonghuzhuce` VALUES ('29', 'xwxxmx', 'xwxxmx', '吴江', '女', '北京', 'jrjtr@163.com', 'uploadfile/1339211786gts3.jpg', '2015-04-12 10:21:38', '是');
INSERT INTO `yonghuzhuce` VALUES ('30', 'ff', 'ff', 'fdsds', '男', '浙江', 'wegw@163.com', 'uploadfile/1357817497krdq.jpg', '2015-04-10 19:31:44', '否');
INSERT INTO `yonghuzhuce` VALUES ('31', 'ggg', 'ggg', 'fwegwe', '女', '湖北', 'ewgw@163.com', 'uploadfile/1357826934jzp9.gif', '2015-04-10 22:08:56', '否');
