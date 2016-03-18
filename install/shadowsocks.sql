/*
Navicat MySQL Data Transfer

Source Server         : local.dev
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : shadowsocks

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2016-03-19 01:33:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for invite_code
-- ----------------------------
DROP TABLE IF EXISTS `invite_code`;
CREATE TABLE `invite_code` (
  `id` int(32) NOT NULL,
  `code` varchar(128) NOT NULL,
  `user` int(32) NOT NULL,
  `plan` int(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ss_card
-- ----------------------------
DROP TABLE IF EXISTS `ss_card`;
CREATE TABLE `ss_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card` varchar(50) NOT NULL COMMENT '卡号',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `type` int(1) DEFAULT '0' COMMENT '0 月卡，1 季度卡，2 半年卡 ，5 流量卡（20GB），6 流量卡（50GB），7 流量卡（100GB）, 8 流量卡（200GB）',
  `status` int(1) DEFAULT '1' COMMENT ' 0 失效 1 有效',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Table structure for ss_cron
-- ----------------------------
DROP TABLE IF EXISTS `ss_cron`;
CREATE TABLE `ss_cron` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `enabled` int(1) NOT NULL,
  `nextrun` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ss_msg
-- ----------------------------
DROP TABLE IF EXISTS `ss_msg`;
CREATE TABLE `ss_msg` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL COMMENT '标题，不要太长',
  `message` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT '消息内容',
  `add_time` int(11) NOT NULL COMMENT '添加时间',
  `hot` int(3) NOT NULL DEFAULT '0' COMMENT '热点： 加粗显示',
  `type` int(3) NOT NULL DEFAULT '0' COMMENT '1 绿色提示图标，2 黑色感叹号图标，3 橙色警告图标，4 红色错误图标',
  `enable` int(1) NOT NULL DEFAULT '1' COMMENT '是否启用 1 在前台显示， 0 不显示',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for ss_node
-- ----------------------------
DROP TABLE IF EXISTS `ss_node`;
CREATE TABLE `ss_node` (
  `id` int(11) NOT NULL,
  `node_name` varchar(128) NOT NULL,
  `node_type` int(3) NOT NULL,
  `node_server` varchar(128) NOT NULL,
  `node_method` varchar(64) NOT NULL,
  `node_info` varchar(128) NOT NULL,
  `node_status` varchar(128) NOT NULL,
  `node_order` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Table structure for ss_reset_pwd
-- ----------------------------
DROP TABLE IF EXISTS `ss_reset_pwd`;
CREATE TABLE `ss_reset_pwd` (
  `id` int(11) NOT NULL,
  `init_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uni_char` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for ss_user_admin
-- ----------------------------
DROP TABLE IF EXISTS `ss_user_admin`;
CREATE TABLE `ss_user_admin` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `t` int(11) NOT NULL DEFAULT '0',
  `u` bigint(20) NOT NULL,
  `d` bigint(20) NOT NULL,
  `plan` varchar(3) CHARACTER SET utf8mb4 NOT NULL,
  `transfer_enable` bigint(20) NOT NULL,
  `port` int(11) NOT NULL,
  `switch` tinyint(4) NOT NULL DEFAULT '1',
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `last_get_gift_time` int(11) NOT NULL DEFAULT '0',
  `last_check_in_time` int(11) NOT NULL DEFAULT '0',
  `last_rest_pass_time` int(11) NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL,
  `invite_num` int(8) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `ref_by` int(11) NOT NULL DEFAULT '0',
  `paytime` int(11) NOT NULL,
  `expire_date` int(11) NOT NULL,
  `remark` varchar(128) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- AUTO INERT INTO DEFAULT DB
--
INSERT INTO `ss_node` (`id`, `node_name`, `node_type`, `node_server`, `node_method`, `node_info`, `node_status`, `node_order`) VALUES
(1, '第一个节点',  0,  'node.url.io',  'aes-256-cfb',  'node描述', '可用', 0);

INSERT INTO `invite_code` (`id`, `code`, `user`) VALUES
(1, '193c77e35a4a3f', 1),
(0, '134201a5b85900', 0);

INSERT INTO `ss_user_admin` (`id`, `uid`) VALUES ('1', '1');

INSERT INTO `shadowsocks`.`ss_msg` (`pid`, `title`, `message`, `add_time`, `hot`, `type`, `enable`) VALUES ('1', '', '测试公告', '1458318093', '0', '1', '1');