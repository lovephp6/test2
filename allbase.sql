/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : allbase

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-08-05 22:58:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for arrears
-- ----------------------------
DROP TABLE IF EXISTS `arrears`;
CREATE TABLE `arrears` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CardNo` bigint(20) NOT NULL DEFAULT '1' COMMENT '身份证号',
  `payment_term` varchar(30) NOT NULL DEFAULT '' COMMENT '缴费期限',
  `amount_arrears` int(10) NOT NULL DEFAULT '0' COMMENT '欠缴金额',
  `pay` int(10) NOT NULL DEFAULT '0' COMMENT '缴费',
  `status` int(3) NOT NULL DEFAULT '1',
  `created_at` int(15) NOT NULL,
  `updated_at` int(15) NOT NULL,
  `student_num` varchar(30) NOT NULL DEFAULT '' COMMENT '学生编号',
  `tuition_standard` int(11) NOT NULL DEFAULT '0' COMMENT '学费标准',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of arrears
-- ----------------------------

-- ----------------------------
-- Table structure for certificate
-- ----------------------------
DROP TABLE IF EXISTS `certificate`;
CREATE TABLE `certificate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CardNo` bigint(20) NOT NULL,
  `certificate_number` varchar(50) NOT NULL DEFAULT '' COMMENT '证书编号',
  `degree_education` varchar(10) NOT NULL DEFAULT '' COMMENT '文化程度',
  `professional_level` varchar(10) NOT NULL DEFAULT '' COMMENT '专业等级',
  `evaluation_audit` varchar(10) NOT NULL DEFAULT '' COMMENT '考评审核',
  `created_at` bigint(15) NOT NULL,
  `updated_at` bigint(15) NOT NULL,
  `issue_date` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of certificate
-- ----------------------------
INSERT INTO `certificate` VALUES ('2', '411081199407253277', 'SHLT-PXZX-2017061800001', '中专', '高级', '合格', '1497748726', '1497748752', '1497744000');

-- ----------------------------
-- Table structure for charge
-- ----------------------------
DROP TABLE IF EXISTS `charge`;
CREATE TABLE `charge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_num` varchar(50) NOT NULL,
  `tuition_standard` varchar(50) DEFAULT '' COMMENT '学费标准',
  `payment_period` varchar(10) NOT NULL DEFAULT '' COMMENT '缴费期限',
  `part_activities` varchar(20) DEFAULT '' COMMENT '参与活动',
  `student_relief` varchar(30) DEFAULT '' COMMENT '助学减免',
  `receipt_number` varchar(30) DEFAULT '' COMMENT '减免凭证',
  `invoice_number` varchar(30) NOT NULL DEFAULT '' COMMENT '发票编号',
  `pay_card` varchar(20) DEFAULT '' COMMENT '刷卡',
  `cash` varchar(20) DEFAULT '' COMMENT '现金',
  `transfer_accounts` varchar(20) DEFAULT '' COMMENT '转账',
  `loan` varchar(20) DEFAULT '' COMMENT '贷款',
  `other` varchar(20) DEFAULT '' COMMENT '其他',
  `total` varchar(20) DEFAULT '' COMMENT '合计',
  `drawer` varchar(20) NOT NULL DEFAULT '' COMMENT '开票人',
  `payee` varchar(20) NOT NULL DEFAULT '' COMMENT '收款人',
  `payee_company` varchar(50) NOT NULL DEFAULT '' COMMENT '收款单位',
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  `CardNo` bigint(18) NOT NULL,
  `home_standard` varchar(30) DEFAULT '' COMMENT '住宿标准',
  `skill_money` int(11) DEFAULT '0' COMMENT '技能费',
  `military_money` int(11) DEFAULT '0' COMMENT '军训费',
  `bedding_money` int(11) DEFAULT '0' COMMENT '被服费',
  `clothing_money` int(11) DEFAULT '0' COMMENT '服装费',
  `book_money` int(11) DEFAULT '0' COMMENT '教材费',
  `safe_money` int(11) DEFAULT '0' COMMENT '保险费',
  `certtifate_money` int(11) DEFAULT '0' COMMENT '证书费',
  `zatotal_money` int(11) DEFAULT '0' COMMENT '杂费合计',
  `actual_money` int(11) DEFAULT '0' COMMENT '应缴金额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of charge
-- ----------------------------
INSERT INTO `charge` VALUES ('1', '12255', '39800', '两年', '送电脑', '1', '66666666666', '452542542542', '555', '4444', '55555', '99999', '8888', '169441', '郑秀儿', '江忠泉', '北京首航蓝天学院', '1497487618', '1499402176', '411081199407253277', '', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `charge` VALUES ('7', '122111', '39800', '一年', '送电脑', '1', '54545454', '12221221', '19800', '0', '0', '0', '0', '19800', '郑秀儿', '郑秀儿', '北京首航蓝天学院', '1499239731', '1499239731', '411081199407253277', '', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `charge` VALUES ('8', '122111', '39800', '一年', '送电脑', '1', '5464565', '546546546', '19800', '0', '200', '0', '0', '20000', '郑秀儿', '郑秀儿', '北京首航蓝天学院', '1499239881', '1499239881', '411081199407253277', '', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for colleges
-- ----------------------------
DROP TABLE IF EXISTS `colleges`;
CREATE TABLE `colleges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(50) DEFAULT '' COMMENT '院系名称',
  `sort` tinyint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of colleges
-- ----------------------------
INSERT INTO `colleges` VALUES ('4', '邮轮学院', '9');
INSERT INTO `colleges` VALUES ('3', '传媒学院', '8');
INSERT INTO `colleges` VALUES ('5', '航空学院', '10');
INSERT INTO `colleges` VALUES ('6', '影视学院', '2');
INSERT INTO `colleges` VALUES ('8', '旅游学院', '2');
INSERT INTO `colleges` VALUES ('9', '酒店学院', '2');

-- ----------------------------
-- Table structure for conf_money
-- ----------------------------
DROP TABLE IF EXISTS `conf_money`;
CREATE TABLE `conf_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_period` varchar(50) NOT NULL COMMENT '缴费期限',
  `tuition_standard` int(11) DEFAULT '0' COMMENT '学费',
  `skill_money` int(11) DEFAULT '0' COMMENT '住宿费',
  `school_money` int(11) DEFAULT '0' COMMENT '学籍费',
  `military_money` int(11) DEFAULT '0' COMMENT '军训费',
  `bedding_money` int(11) DEFAULT '0' COMMENT '被褥',
  `clothing_money` int(11) DEFAULT '0' COMMENT '服装',
  `book_money` int(11) DEFAULT '0' COMMENT '教材',
  `safe_money` int(11) DEFAULT '0' COMMENT '保险',
  `certtifate_money` int(11) DEFAULT '0' COMMENT '证书',
  `zatotal_money` int(11) DEFAULT '0' COMMENT '杂合计',
  `major_name` varchar(50) DEFAULT '' COMMENT '专业',
  `major_type` varchar(50) DEFAULT '' COMMENT '专业类型',
  `major_date` varchar(50) DEFAULT '' COMMENT '学制',
  `college_id` int(11) NOT NULL DEFAULT '0' COMMENT '院系id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of conf_money
-- ----------------------------
INSERT INTO `conf_money` VALUES ('1', '3', '2222', '222', '222', '222', '22', '222', '22', '22', '22', '11', '航空', '航空', '一年', '0');

-- ----------------------------
-- Table structure for enclosure
-- ----------------------------
DROP TABLE IF EXISTS `enclosure`;
CREATE TABLE `enclosure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_num` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL DEFAULT '',
  `img_something` varchar(255) NOT NULL DEFAULT '' COMMENT '附件',
  `created_at` bigint(20) NOT NULL DEFAULT '1',
  `updated_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of enclosure
-- ----------------------------
INSERT INTO `enclosure` VALUES ('1', '122111', '', '/public/upload/img/2017070108334659575e6a2fef0.png', '1498898026', '1498898026');
INSERT INTO `enclosure` VALUES ('2', '122111', '', '/public/upload/img/2017070108334659575e6a352dc.png', '1498898026', '1498898026');
INSERT INTO `enclosure` VALUES ('3', '122111', '李世超', '/public/upload/img/2017070108353459575ed67273c.jpg', '1498898134', '1498898134');
INSERT INTO `enclosure` VALUES ('4', '122111', '李世超', '/public/upload/img/2017070108353459575ed675ca4.png', '1498898134', '1498898134');
INSERT INTO `enclosure` VALUES ('5', '122111', '李世超', '/public/upload/img/2017070108353459575ed68600b.jpg', '1498898134', '1498898134');
INSERT INTO `enclosure` VALUES ('6', '122111', '李世超', '/public/upload/img/20170705071416595c91c8a38d0.jpg', '1499238856', '1499238856');

-- ----------------------------
-- Table structure for finance
-- ----------------------------
DROP TABLE IF EXISTS `finance`;
CREATE TABLE `finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_unit` varchar(50) NOT NULL DEFAULT '' COMMENT '付款单位',
  `handle_person` varchar(50) NOT NULL DEFAULT '' COMMENT '经手人',
  `bill_number` varchar(50) NOT NULL DEFAULT '' COMMENT '票据编号',
  `invoice_number` varchar(50) NOT NULL DEFAULT '' COMMENT '发票编号',
  `collection_date` bigint(15) NOT NULL DEFAULT '1' COMMENT '收款日期',
  `payment_method` varchar(30) NOT NULL DEFAULT '' COMMENT '收款方式',
  `remarks` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `abstract` varchar(100) NOT NULL DEFAULT '' COMMENT '摘要',
  `number` varchar(30) NOT NULL DEFAULT '' COMMENT '数量',
  `unit` varchar(100) NOT NULL DEFAULT '' COMMENT '单位',
  `unit_price` varchar(100) NOT NULL DEFAULT '' COMMENT '总额',
  `drawer` varchar(30) NOT NULL DEFAULT '' COMMENT '开票人',
  `payee` varchar(30) NOT NULL DEFAULT '' COMMENT '收款人',
  `collecting_unit` varchar(30) NOT NULL DEFAULT '' COMMENT '收款单位',
  `collecting_date` bigint(15) NOT NULL DEFAULT '1' COMMENT '收款日期',
  `created_at` bigint(15) NOT NULL,
  `updated_at` bigint(15) NOT NULL,
  `total` varchar(50) NOT NULL DEFAULT '' COMMENT '总钱',
  `status` int(5) NOT NULL DEFAULT '1' COMMENT '状态 1付款 2 收款',
  `total_num` varchar(50) NOT NULL DEFAULT '' COMMENT '数字总和',
  `total_money` varchar(50) NOT NULL DEFAULT '' COMMENT '剩余钱',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of finance
-- ----------------------------
INSERT INTO `finance` VALUES ('16', '北京首航蓝天', '郑秀儿', 'SR41132123132', '65465131321', '1499040000', '微信', '速度速度', '[\"\\u5b66\\u8d39\",null,null,null]', '[\"1\",\"1\",\"1\",\"1\"]', '[null,null,null,null]', '[\"39,800.00\",\"0\",\"0\",\"0\"]', '郑秀儿', '郑秀儿', '财务部', '1499040000', '1499050716', '1499050716', '叁万玖仟捌佰元整', '1', '39800', '39800');
INSERT INTO `finance` VALUES ('17', '北京天然嘟嘟', '小薇', 'SR1132132132', '113213221321', '1499040000', '微信', '说得对', '[\"\\u5b66\\u8d39\",null,null,null]', '[\"2\",\"1\",\"1\",\"1\"]', '[\"\\u5143\",null,null,null]', '[\"19,800.00\",\"0\",\"0\",\"0\"]', '郑秀儿', '郑秀儿', '财务部', '1499040000', '1499050752', '1499050752', '叁万玖仟陆佰元整', '1', '79400', '39600');
INSERT INTO `finance` VALUES ('18', '北京首航蓝天', '郑秀儿', 'ZC1122156', '41123213123', '1499040000', '微信', '的舒适度', '[\"\\u5b66\\u8d39\",\"\\u670d\\u88c5\",null,null]', '[\"1\",\"2\",\"1\",\"1\"]', '[\"\\u5143\",\"\\u5143\",null,null]', '[\"5,000.00\",\"500.00\",\"0\",\"0\"]', '郑秀儿', '郑秀儿', '财务部', '1499040000', '1499050892', '1499050892', '陆仟元整', '2', '73400', '6000');
INSERT INTO `finance` VALUES ('19', '北京首航蓝天', '嘟嘟', 'ZC152132321', '513121321213', '1499040000', '微信', '速度速度', '[\"\\u5b66\\u8d39\",\"\\u6276\\u6b63\",null,null]', '[\"2\",\"3\",\"1\",\"1\"]', '[\"\\u5143\",\"\\u5143\",null,null]', '[\"12,000.00\",\"300.00\",\"0\",\"0\"]', '郑秀儿', '郑秀儿', '财务部', '1499040000', '1499054320', '1499054320', '贰万肆仟玖佰元整', '2', '48500', '24900');
INSERT INTO `finance` VALUES ('20', '北京首航蓝天', '秀', 'SR5151132', '3213213232', '1499040000', '微信', '速度多少速度', '[\"\\u5b66\\u8d39\",\"\\u670d\\u88c5\",\"\\u6742\\u8d39\",null]', '[\"2\",\"3\",\"6\",\"1\"]', '[\"\\u5143\",\"\\u5143\",\"\\u5143\",null]', '[\"12,345,678.00\",\"100.00\",\"100.00\",\"0\"]', '郑秀儿', '郑秀儿', '财务部', '1499040000', '1499064363', '1499064363', '贰仟肆佰陆拾玖万贰仟贰佰伍拾陆元整', '1', '24740756', '24692256');
INSERT INTO `finance` VALUES ('21', '北京首航蓝天', '嘟嘟', 'SR12123231', '541132321', '1499040000', '微信', '速度速度', '[\"\\u5b66\\u8d39\",\"\\u670d\\u88c5\",\"\\u54c8\\u54c8\",null]', '[\"2\",\"6\",\"1\",\"1\"]', '[\"\\u5143\",\"\\u5143\",\"\\u5143\",null]', '[\"18,000.00\",\"1,111.00\",\"666.00\",\"0\"]', '郑秀儿', '郑秀儿', '财务部', '1499040000', '1499067311', '1499067311', '肆万叁仟叁佰叁拾贰元整', '1', '24784088', '43332');

-- ----------------------------
-- Table structure for hotel
-- ----------------------------
DROP TABLE IF EXISTS `hotel`;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_sex` varchar(20) NOT NULL DEFAULT '' COMMENT '男生，女生宿舍',
  `hotel_number` varchar(30) NOT NULL DEFAULT '' COMMENT '房间编号',
  `hotel_type` varchar(30) NOT NULL COMMENT '房间类型  几人间',
  `hotel_status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` bigint(20) DEFAULT '1',
  `updated_at` bigint(20) DEFAULT '1',
  `home_type` varchar(30) NOT NULL DEFAULT '' COMMENT '房间类型',
  `student_count` tinyint(3) DEFAULT '0' COMMENT '入住人数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hotel
-- ----------------------------
INSERT INTO `hotel` VALUES ('4', '男生宿舍', 'A0111', '公寓区', '1', '1499331249', '1499331249', '豪华双人间', '1');
INSERT INTO `hotel` VALUES ('5', '女生宿舍', 'A0222', '公寓区', '1', '1499331260', '1499331260', '标准四人间', '2');
INSERT INTO `hotel` VALUES ('6', '男生宿舍', 'B022', '别墅区', '1', '1499331273', '1499390186', '豪华双人间', '2');
INSERT INTO `hotel` VALUES ('7', '女生宿舍', 'A0333', '别墅区', '1', '1499331311', '1499331311', '豪华双人间', '2');
INSERT INTO `hotel` VALUES ('8', '女生宿舍', 'B2220', '公寓区', '1', '1499331321', '1499388667', '标准四人间', '3');
INSERT INTO `hotel` VALUES ('9', '男生宿舍', 'A553', '公寓区', '1', '1499331331', '1499390156', '标准六人间', '5');
INSERT INTO `hotel` VALUES ('10', '女生宿舍', 'A123', '公寓区', '1', '1499331342', '1499331342', '标准四人间', '3');
INSERT INTO `hotel` VALUES ('15', '男生宿舍', 'A555', '公寓区', '1', '1499333927', '1499333927', '豪华双人间', '1');
INSERT INTO `hotel` VALUES ('14', '女生宿舍', 'A3333', '别墅区', '1', '1499333855', '1499333855', '标准四人间', '3');
INSERT INTO `hotel` VALUES ('16', '男生宿舍', 'F55506', '别墅区', '1', '1499333938', '1499388836', '标准六人间', '4');
INSERT INTO `hotel` VALUES ('17', '女生宿舍', 'A555', '别墅区', '1', '1499336362', '1499336362', '豪华双人间', '2');

-- ----------------------------
-- Table structure for majors
-- ----------------------------
DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) NOT NULL,
  `major_name` varchar(30) DEFAULT '' COMMENT '专业名称',
  `status` tinyint(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of majors
-- ----------------------------
INSERT INTO `majors` VALUES ('1', '5', '空港地勤', '1');
INSERT INTO `majors` VALUES ('2', '5', '空姐', '1');
INSERT INTO `majors` VALUES ('3', '5', '空少', '1');
INSERT INTO `majors` VALUES ('4', '4', '海轮海乘', '1');
INSERT INTO `majors` VALUES ('6', '3', '22', '1');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2017_07_04_082303_entrust_setup_tables', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` bigint(20) DEFAULT NULL,
  `updated_at` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'create_user', '创建用户', null, '20170704092138', '20170704092138');
INSERT INTO `permissions` VALUES ('2', 'edit_user', '编辑用户', null, '20170704092138', '20170704092138');
INSERT INTO `permissions` VALUES ('3', 'delete_user', '删除用户', null, '20170704092138', '20170704092138');
INSERT INTO `permissions` VALUES ('4', 'property', '财务管理员', '管理财务方面的信息', '1499221598', '1499225226');
INSERT INTO `permissions` VALUES ('5', 'staff', '人事quanxian', 'this is 人事 quanxian', '1499251108', '1499251108');
INSERT INTO `permissions` VALUES ('6', 'home', 'gongyu', '萨顶顶是', '1499251181', '1499251181');
INSERT INTO `permissions` VALUES ('7', 'school', '合作院校', '合作院校权限', '1499251755', '1499251755');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('1', '1');
INSERT INTO `permission_role` VALUES ('1', '14');
INSERT INTO `permission_role` VALUES ('2', '1');
INSERT INTO `permission_role` VALUES ('2', '14');
INSERT INTO `permission_role` VALUES ('3', '1');
INSERT INTO `permission_role` VALUES ('3', '14');
INSERT INTO `permission_role` VALUES ('4', '14');
INSERT INTO `permission_role` VALUES ('4', '15');
INSERT INTO `permission_role` VALUES ('5', '15');
INSERT INTO `permission_role` VALUES ('5', '16');
INSERT INTO `permission_role` VALUES ('6', '15');
INSERT INTO `permission_role` VALUES ('7', '16');

-- ----------------------------
-- Table structure for refund
-- ----------------------------
DROP TABLE IF EXISTS `refund`;
CREATE TABLE `refund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CardNo` bigint(18) NOT NULL DEFAULT '0' COMMENT '身份证',
  `app_number` varchar(20) NOT NULL DEFAULT '' COMMENT '退费信息',
  `amount` int(10) NOT NULL DEFAULT '1' COMMENT '扣款金额',
  `refund_amount` int(10) NOT NULL DEFAULT '1' COMMENT '退款金额',
  `refund_method` varchar(50) NOT NULL DEFAULT '' COMMENT '退款方式',
  `refund_reasons` varchar(255) NOT NULL DEFAULT '' COMMENT '退费信息',
  `refund_num` varchar(30) NOT NULL DEFAULT '' COMMENT '退款单号',
  `refund_date` bigint(15) NOT NULL DEFAULT '1' COMMENT '退款日期',
  `created_at` bigint(15) NOT NULL,
  `updated_at` bigint(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of refund
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` bigint(20) DEFAULT NULL,
  `updated_at` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', '管理员', 'suoer admin role', '20170704092138', '20170704092138');
INSERT INTO `roles` VALUES ('2', 'owner', '操作员', '添加文章', '1499220235', '1499220235');
INSERT INTO `roles` VALUES ('3', 'xueji', '学籍管理员', '管理学籍部分', '1499220279', '1499220279');
INSERT INTO `roles` VALUES ('4', 'property', '财务管理员', '管理财务', '1499220347', '1499220347');
INSERT INTO `roles` VALUES ('5', 'jiaowu', '教务管理员', '管理教务部分', '1499220390', '1499220390');
INSERT INTO `roles` VALUES ('13', 'jiuye', '假鸡蛋', '戴肃军上盾尖', '1499249676', '1499249676');
INSERT INTO `roles` VALUES ('14', 'hah', '得色', '骷髅死荡寇两道三科里', '1499250995', '1499250995');
INSERT INTO `roles` VALUES ('15', 'meiyou', '没呀', '阿森七磅枪侠', '1499251232', '1499251232');
INSERT INTO `roles` VALUES ('16', 'school_role', '院校管理员', '管理合作院校到权限', '1499251825', '1499251825');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1');
INSERT INTO `role_user` VALUES ('13', '3');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_num` varchar(30) NOT NULL,
  `staff_name` varchar(30) NOT NULL DEFAULT '' COMMENT '员工姓名',
  `staff_sex` varchar(10) NOT NULL DEFAULT '' COMMENT '员工性别',
  `staff_nation` varchar(30) NOT NULL DEFAULT '' COMMENT '民族',
  `photo` varchar(100) NOT NULL DEFAULT '' COMMENT '照片',
  `staff_born` bigint(20) NOT NULL DEFAULT '1' COMMENT '出生日期',
  `staff_origin` varchar(30) NOT NULL DEFAULT '' COMMENT '籍贯',
  `staff_marriage` varchar(30) NOT NULL DEFAULT '' COMMENT '婚姻状况',
  `staff_political` varchar(30) NOT NULL DEFAULT '' COMMENT '政治面貌',
  `staff_height` varchar(20) NOT NULL DEFAULT '' COMMENT '身高',
  `staff_weight` varchar(20) NOT NULL DEFAULT '' COMMENT '体重',
  `staff_phone` varchar(100) NOT NULL DEFAULT '1' COMMENT '手机号',
  `staff_email` varchar(100) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `staff_certType` varchar(50) NOT NULL DEFAULT '' COMMENT '证件类型',
  `staff_card` bigint(20) NOT NULL DEFAULT '1' COMMENT '证件号码',
  `staff_school` varchar(100) NOT NULL DEFAULT '' COMMENT '毕业院校',
  `staff_major_school` varchar(255) NOT NULL DEFAULT '' COMMENT '专业',
  `staff_graduationDate` bigint(20) NOT NULL,
  `staff_edu` varchar(30) NOT NULL DEFAULT '' COMMENT '学历',
  `staff_regResidence` varchar(30) NOT NULL DEFAULT '' COMMENT '户口 性质',
  `staff_domination` varchar(50) NOT NULL DEFAULT '' COMMENT '管辖机关',
  `staff_address` varchar(100) NOT NULL DEFAULT '' COMMENT '户籍地址',
  `staff_qixian` varchar(50) NOT NULL DEFAULT '' COMMENT '证件期限',
  `staff_parents_name` varchar(100) NOT NULL DEFAULT '' COMMENT '父母姓名',
  `staff_parents_relationship` varchar(100) NOT NULL DEFAULT '' COMMENT '关系',
  `staff_parents_company` varchar(100) NOT NULL DEFAULT '' COMMENT '工作单位',
  `staff_parents_phone` varchar(100) NOT NULL DEFAULT '' COMMENT '父母电话',
  `staff_startDate_school` varchar(255) NOT NULL DEFAULT '' COMMENT '教育起止',
  `staff_school_name` varchar(200) NOT NULL DEFAULT '' COMMENT '院校名称',
  `staff_major` varchar(100) NOT NULL DEFAULT '' COMMENT '专业',
  `staff_startDate_work` varchar(255) NOT NULL DEFAULT '' COMMENT '工作起止日期',
  `staff_unitName` varchar(255) NOT NULL DEFAULT '' COMMENT '单位名称',
  `staff_post` varchar(255) NOT NULL DEFAULT '' COMMENT '工作职务',
  `staff_department` varchar(50) NOT NULL DEFAULT '' COMMENT '部门',
  `staff_postNew` varchar(50) NOT NULL DEFAULT '' COMMENT '职务',
  `staff_employ` varchar(100) NOT NULL DEFAULT '' COMMENT '聘用形式',
  `staff_entryDate` bigint(20) NOT NULL DEFAULT '1' COMMENT '入职日期',
  `staff_contractDate` bigint(20) NOT NULL DEFAULT '1' COMMENT '合同日期',
  `staff_contractPeriod` varchar(50) NOT NULL DEFAULT '' COMMENT '合同期限',
  `staff_probation` varchar(100) NOT NULL DEFAULT '' COMMENT '试用工资',
  `staff_full` varchar(100) NOT NULL DEFAULT '' COMMENT '转正工资',
  `staff_seniority` varchar(100) NOT NULL DEFAULT '' COMMENT '工龄工资',
  `staff_meal` varchar(50) NOT NULL DEFAULT '' COMMENT '餐食补助',
  `staff_traffic` varchar(50) NOT NULL DEFAULT '' COMMENT '交通补助',
  `staff_communication` varchar(50) NOT NULL DEFAULT '' COMMENT '通信补助',
  `staff_travel` varchar(50) NOT NULL DEFAULT '' COMMENT '出差补助',
  `staff_overtime` varchar(50) NOT NULL DEFAULT '' COMMENT '加班补助',
  `staff_achievements` varchar(50) NOT NULL DEFAULT '' COMMENT '绩效奖金',
  `staff_insurance` varchar(20) NOT NULL DEFAULT '' COMMENT '保险状态',
  `staff_social` int(11) NOT NULL DEFAULT '0' COMMENT '社保',
  `staff_fund` int(11) NOT NULL DEFAULT '0' COMMENT '公积金',
  `staff_bank` varchar(100) NOT NULL DEFAULT '' COMMENT '开户行',
  `staff_bankName` varchar(100) NOT NULL DEFAULT '' COMMENT '户名',
  `staff_bankNumber` varchar(100) NOT NULL DEFAULT '' COMMENT '账号',
  `staff_leaveDate` bigint(20) NOT NULL DEFAULT '1' COMMENT '离职日期',
  `staff_leaveType` varchar(50) NOT NULL DEFAULT '' COMMENT '离职类型',
  `staff_leaveReason` varchar(100) NOT NULL DEFAULT '' COMMENT '离职原因',
  `created_at` bigint(20) NOT NULL DEFAULT '1',
  `updated_at` bigint(20) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'A010223', '嘟嘟6', '男', '汉', './upload/photos/e94a76fd988ada146de61a902803e3e5.png', '698716800', '黑背', '否', '团员', '172', '65', '18801473156', '649448500@qq.com', '身份证', '2350613223222', '哈哈', '[\"\\u5f97\\u745f\\u5f97\\u745f\",\"\\u8bf4\\u7684\\u90fd\\u662f\"]', '0', '哈啊哈', '哈啊哈', '哈啊哈', '哈啊哈', '哈啊哈', '[\"\\u5f20\\u4e09\",\"\\u5f20\\u4e09\"]', '[\"\\u5f20\\u4e09\",\"\\u5f20\\u4e09\"]', '[\"\\u5f20\\u4e09\",\"\\u5f20\\u4e09\"]', '[\"18801473255\",\"17701473122\"]', '[\"2017\",\"5213\"]', '[\"\\u561f\\u561f\",\"\\u7684\\u901f\\u5ea6\"]', '哈啊哈', '[\"2017-2018\",\"2018-2019\"]', '[\"\\u7684\\u662f2\",\"\\u591a\\u5c11\"]', '[\"\\u6536\\u5230\",\"\\u8d37\\u65b9v\"]', '网络部', '网络', '网络', '0', '0', '2年', '4000', '5000', '1000', '300', '300', '200', '500', '500', '100', '是', '100', '100', '北京招商银行', '北京首航蓝天学院', '515132165132651', '1503360000', '自然离职', '工资少', '1498287190', '1499153504');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Nation` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Born` bigint(20) NOT NULL COMMENT '生日',
  `CardNo` bigint(20) NOT NULL COMMENT '身份证',
  `Address` varchar(150) NOT NULL,
  `qixian` varchar(100) NOT NULL,
  `student_num` varchar(50) NOT NULL,
  `edu` varchar(50) NOT NULL,
  `political_status` varchar(100) NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  `student_height` double NOT NULL COMMENT '涓撲笟',
  `student_weight` double NOT NULL COMMENT '姣曚笟闄㈡牎',
  `major_name` varchar(50) NOT NULL,
  `major_type` varchar(50) NOT NULL,
  `major_date` varchar(50) NOT NULL DEFAULT '' COMMENT '鐩寸郴浜插睘',
  `student_class` varchar(50) NOT NULL COMMENT '浜插睘宸ヤ綔鍗曚綅',
  `teacher` varchar(50) NOT NULL,
  `come_time` bigint(20) NOT NULL COMMENT '鎵??涓撲笟',
  `graduation_school` varchar(50) NOT NULL,
  `major_study` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `parents_name` varchar(50) NOT NULL,
  `parents_relationship` varchar(50) NOT NULL,
  `parents_company` varchar(100) NOT NULL,
  `parents_phone` varchar(100) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `cost_state` int(2) NOT NULL DEFAULT '0' COMMENT '学费状态 0欠费 1不欠',
  `img_something` varchar(255) NOT NULL DEFAULT '' COMMENT '附件',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('5', '李世超', '男', '汉族', './upload/photos/97caa4e55250edacf4b175593de84de3.jpg', '775094400', '411081199407253277', '河南省禹州市小吕乡莲花池村３组', '2010.11.11 -- 2020.11.11', '122111', '大专', '群众', '18801473222', '177', '56', '航空6', '航空', '三年', '一班', '老刘', '1488326400', '[\"\\u9ed1\\u9f99\\u6c5f\",\"\\u5317\\u4eac\"]', '[\"\\u9ed1\\u9f99\\u6c5f\",\"\\u5317\\u4eac\"]', '[\"\\u9ed1\\u9f99\\u6c5f\",\"\\u5317\\u4eac\"]', '[\"\\u5f20\\u4e09\",\"\\u674e\\u56db\"]', '[\"\\u5f20\\u4e09\",\"\\u674e\\u56db\"]', '[\"\\u5f20\\u4e09\",\"\\u674e\\u56db\"]', '[\"\\u5f20\\u4e09\",\"\\u674e\\u56db\"]', '1497747973', '1498896363', '航空', '0', '/public/upload/img/20170701080603595757eb0d0fc.png');
INSERT INTO `students` VALUES ('7', 'dudu', '男', '汉', './upload/photos/e6d32c87d62d31adcf006302af8b5b70.jpeg', '635644800', '2305031990522365', '黑龙江', '2017-02-22', '555', '大专', '团员', '18801473222', '187', '52', '到', '多少', '3', '2', '嘟嘟', '1487721600', '[\"\\u9ed1\\u9f99\\u6c5f\",null]', '[\"\\u561f\\u561f\",null]', '[\"\\u561f\\u561f\",null]', '[\"\\u561f\\u561f\",null]', '[\"\\u5c31\\u5728\",null]', '[\"\\u5730\\u65b9\\u6cd5\",null]', '[\"\\u65b9\\u6cd5\",null]', '1499337000', '1499337000', '的士速递', '0', '');

-- ----------------------------
-- Table structure for students_edu
-- ----------------------------
DROP TABLE IF EXISTS `students_edu`;
CREATE TABLE `students_edu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Nation` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `Born` bigint(20) NOT NULL,
  `CardNo` bigint(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Police` varchar(100) NOT NULL,
  `qixian` varchar(50) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `home_address` varchar(100) NOT NULL,
  `student_source` varchar(50) NOT NULL,
  `referee` varchar(50) NOT NULL,
  `referee_phone` bigint(20) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `major_name` varchar(50) NOT NULL,
  `major` varchar(30) NOT NULL,
  `examination_date` bigint(20) NOT NULL,
  `register_date` bigint(20) NOT NULL,
  `school_status` varchar(30) NOT NULL,
  `student_num` varchar(100) NOT NULL,
  `receive_date` bigint(20) NOT NULL,
  `receive_people` varchar(30) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students_edu
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL COMMENT '手机号',
  `realname` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '真实姓名',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'dudu', '6494488500@qq.com', '$2y$10$JbbkYe8wujUe/iXsl7.WNe0UH1A67/YajMfMK6JkwHq/tpIbP.lv6', 'yvlDtT8Mib55S31VkWxdes9jHiEQH824vhOQ1b0rsjFYtKYPcH4NvSonjiZU', '2017-07-04 09:21:38', '2017-07-04 09:21:38', null, null);
INSERT INTO `users` VALUES ('11', 'A01011', '52455@qq.com', '$2y$10$zTR8y.pRaGVDZD7viPH/xeJ0itMWj2FCXNFggUZvJrUhw0NPJ9tVy', 'BcnCthj4yWMnjqRrg9xJfepSTPAILCQLPdCuypgxgmtOPlq0LrFJeB5osKML', '2017-07-06 02:42:28', '2017-07-06 02:42:28', '13122224444', '嘟嘟');
INSERT INTO `users` VALUES ('12', 'chao', '64221@qq.com', '$2y$10$Z.VQ.hTixOuLqKA8sN66XuTM5pFTkTM5r.8Hm9Hx84LM2e.2O1W.2', null, '2017-07-06 02:55:10', '2017-07-06 02:55:10', '13122226666', '李世超');
INSERT INTO `users` VALUES ('13', 'zhen', '6511@qq.com', '$2y$10$T0pds4H75pbW22R.czH/RO/dUdsEfB7WR3uou7xG.jCEA0aslNUFW', null, '2017-07-06 03:05:37', '2017-07-06 03:05:37', '15612341111', '刘振');

-- ----------------------------
-- Table structure for wages
-- ----------------------------
DROP TABLE IF EXISTS `wages`;
CREATE TABLE `wages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) NOT NULL,
  `kao_days` int(10) NOT NULL DEFAULT '0' COMMENT '考勤天数',
  `chu_days` int(10) NOT NULL DEFAULT '0' COMMENT '出勤天数',
  `created_at` bigint(16) NOT NULL,
  `updated_at` bigint(16) NOT NULL,
  `wages_month` bigint(16) NOT NULL DEFAULT '0' COMMENT '月份',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wages
-- ----------------------------
INSERT INTO `wages` VALUES ('1', '嘟嘟6', '30', '20', '1498373069', '1498373069', '1496275200');
INSERT INTO `wages` VALUES ('3', '嘟嘟6', '27', '24', '1498375530', '1498375530', '1498867200');
INSERT INTO `wages` VALUES ('4', '嘟嘟6', '30', '26', '1498375541', '1498375541', '1504224000');
