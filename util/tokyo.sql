-- ---------------------------------------------------------
-- Database Name: tokyo
-- ---------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8' */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='SYSTEM' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


--
-- Table structure for table aa
--

DROP TABLE IF EXISTS `aa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `aa` (
  `test1` int(11) NOT NULL,
  `test2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table aa
--

INSERT INTO `aa` VALUES ( 11, 12 );
INSERT INTO `aa` VALUES ( 11, 12 );

--
-- Table structure for table address_info
--

DROP TABLE IF EXISTS `address_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `address_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `user_address` text NOT NULL,
  `postcode` int(10) NOT NULL,
  `phone` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table address_info
--


--
-- Table structure for table admin_info
--

DROP TABLE IF EXISTS `admin_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `admin_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_name` varchar(20) NOT NULL,
  `login_pwd` varchar(128) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table admin_info
--

INSERT INTO `admin_info` VALUES ( 1, 123, '202cb962ac59075b964b07152d234b70', '许金龙', 'D' );
INSERT INTO `admin_info` VALUES ( 4, 1234, '81dc9bdb52d04dc20036dbd8313ed055', '沈楚彦', 'B' );

--
-- Table structure for table attribute
--

DROP TABLE IF EXISTS `attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(100) NOT NULL,
  `type_id` int(10) NOT NULL,
  `attr_value` text NOT NULL,
  `attr_sort` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table attribute
--

INSERT INTO `attribute` VALUES ( 1, '品牌', 0, '', 0 );
INSERT INTO `attribute` VALUES ( 2, '价格', 0, '', 0 );
INSERT INTO `attribute` VALUES ( 3, '尺寸', 0, '', 0 );

--
-- Table structure for table attribute_value
--

DROP TABLE IF EXISTS `attribute_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `attribute_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_value_name` varchar(100) NOT NULL,
  `attr_id` int(10) NOT NULL,
  `type_id` int(10) NOT NULL,
  `attr_value_sort` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table attribute_value
--

INSERT INTO `attribute_value` VALUES ( 1, '小米（XIAOMI）', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 2, '华为（huawei）', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 3, '魅族(MEIZU)', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 4, '三星(SAMSUMG)', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 5, '苹果(APPLE)', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 6, 'vivo', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 7, '乐视', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 8, '中兴', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 9, '索尼（sony）', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 10, '联想', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 11, 'HTC', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 12, 'LG', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 13, '诺基亚(nokia)', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 14, 'oppo', 1, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 15, '0-399', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 16, '400-799', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 17, '800-1299', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 18, '1300-2099', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 19, '2100-4299', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 20, '4300-6099', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 21, '6100以上', 2, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 22, '5.6英寸及以上', 3, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 23, '5.5-5.1英寸', 3, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 24, '5.0-4.6英寸', 3, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 25, '4.5-3.1英寸', 3, 0, 0 );
INSERT INTO `attribute_value` VALUES ( 26, '3.0英寸及以下', 3, 0, 0 );

--
-- Table structure for table goods_attri_index
--

DROP TABLE IF EXISTS `goods_attri_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_attri_index` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `attr_id` int(10) NOT NULL,
  `attr_value_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_attri_index
--

INSERT INTO `goods_attri_index` VALUES ( 1, 1, 1, 5 );
INSERT INTO `goods_attri_index` VALUES ( 2, 1, 2, 7 );
INSERT INTO `goods_attri_index` VALUES ( 3, 1, 3, 2 );
INSERT INTO `goods_attri_index` VALUES ( 5, 2, 1, 1 );
INSERT INTO `goods_attri_index` VALUES ( 6, 2, 2, 4 );
INSERT INTO `goods_attri_index` VALUES ( 7, 2, 3, 2 );

--
-- Table structure for table goods_comment
--

DROP TABLE IF EXISTS `goods_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(10) NOT NULL,
  `comment_detail` text NOT NULL,
  `comment_rate` int(10) NOT NULL,
  `comment_date` date NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_comment
--


--
-- Table structure for table goods_describle
--

DROP TABLE IF EXISTS `goods_describle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_describle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(50) NOT NULL,
  `goods_sold` int(50) NOT NULL,
  `describle_brand` varchar(50) NOT NULL,
  `describle_detail` text NOT NULL,
  `describle_pic` varchar(50) NOT NULL,
  `goods_score` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_describle
--


--
-- Table structure for table goods_info
--

DROP TABLE IF EXISTS `goods_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(50) NOT NULL,
  `goods_price` int(10) NOT NULL,
  `goods_produce` varchar(50) NOT NULL,
  `goods_weight` int(10) NOT NULL,
  `goods_type` varchar(20) NOT NULL,
  `goods_number` int(10) NOT NULL,
  `goods_status` varchar(20) NOT NULL,
  `top_type` int(50) NOT NULL,
  `mid_type` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_info
--

INSERT INTO `goods_info` VALUES ( 1, 'iphone 6s', 8888, 'Apple', 800, '', 9999, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 2, '小米手机', 1999, '小米', 600, '', 7878, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 3, '诺基亚', 3999, 'NOKIA', 800, '', 8888, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 4, 'I9001', 2000, '三星', 700, '', 7777, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 5, 'I9002', 2000, '三星', 700, '', 7777, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 6, 'I9003', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 7, 'I9004', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 8, 'I9005', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 9, 'I9006', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 10, 'I9007', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 11, 'I9008', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 12, 'I9009', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 13, 'I9010', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 14, 'S9007', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 15, 'S9008', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 16, 'S9009', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 17, 'S9010', 2000, '三星', 700, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 18, 'qq', 123, 'er', 555, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 19, 'qwe', 34, 'yuy', 66, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 20, 'qwe', 34, 'yuy', 66, '', 6666, '正常', 1, 2 );
INSERT INTO `goods_info` VALUES ( 21, 'qq1', 123, 'er', 555, '', 111, '正常', 1, 2 );

--
-- Table structure for table goods_meun
--

DROP TABLE IF EXISTS `goods_meun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_meun` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` int(50) NOT NULL,
  `parents_id` int(50) NOT NULL,
  `goods_number` int(50) NOT NULL,
  `meun_name` varchar(50) NOT NULL,
  `goods_status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_meun
--


--
-- Table structure for table goods_style
--

DROP TABLE IF EXISTS `goods_style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_id` int(11) NOT NULL,
  `goods_style` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_style
--


--
-- Table structure for table goods_type
--

DROP TABLE IF EXISTS `goods_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `goods_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `father_id` int(10) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table goods_type
--

INSERT INTO `goods_type` VALUES ( 1, -1, '数码' );
INSERT INTO `goods_type` VALUES ( 2, 1, '手机通讯' );
INSERT INTO `goods_type` VALUES ( 3, 1, '手机配件' );
INSERT INTO `goods_type` VALUES ( 4, 1, '摄影摄像' );
INSERT INTO `goods_type` VALUES ( 5, 1, '智能设备' );
INSERT INTO `goods_type` VALUES ( 6, 1, '电脑整机' );
INSERT INTO `goods_type` VALUES ( 7, 1, '电脑配件' );
INSERT INTO `goods_type` VALUES ( 8, 1, '游戏设备' );
INSERT INTO `goods_type` VALUES ( 9, 1, '网络产品' );
INSERT INTO `goods_type` VALUES ( 10, -1, '家居' );
INSERT INTO `goods_type` VALUES ( 11, 10, '厨具' );
INSERT INTO `goods_type` VALUES ( 12, 10, '家纺' );
INSERT INTO `goods_type` VALUES ( 13, 10, '家具' );
INSERT INTO `goods_type` VALUES ( 14, 10, '灯具' );
INSERT INTO `goods_type` VALUES ( 15, 10, '家装建材' );
INSERT INTO `goods_type` VALUES ( 16, 10, '生活用品' );
INSERT INTO `goods_type` VALUES ( 17, 10, '家装软饰' );
INSERT INTO `goods_type` VALUES ( 18, 10, '宠物生活' );
INSERT INTO `goods_type` VALUES ( 19, -1, '食品' );
INSERT INTO `goods_type` VALUES ( 20, 19, '中外名酒' );
INSERT INTO `goods_type` VALUES ( 21, 19, '进口食品' );
INSERT INTO `goods_type` VALUES ( 22, 19, '休闲食品' );
INSERT INTO `goods_type` VALUES ( 23, 19, '地方特产' );
INSERT INTO `goods_type` VALUES ( 24, 19, '饮料冲调' );
INSERT INTO `goods_type` VALUES ( 25, 19, '粮油调味' );
INSERT INTO `goods_type` VALUES ( 26, 19, '生鲜食品' );
INSERT INTO `goods_type` VALUES ( 27, 19, '食品礼券' );
INSERT INTO `goods_type` VALUES ( 28, -1, '生活' );
INSERT INTO `goods_type` VALUES ( 29, 28, '男装' );
INSERT INTO `goods_type` VALUES ( 30, 28, '女装' );
INSERT INTO `goods_type` VALUES ( 31, 28, '箱包' );
INSERT INTO `goods_type` VALUES ( 32, 28, '首饰' );
INSERT INTO `goods_type` VALUES ( 33, 28, '护肤' );
INSERT INTO `goods_type` VALUES ( 34, 28, '洗发' );
INSERT INTO `goods_type` VALUES ( 35, 28, '护理' );
INSERT INTO `goods_type` VALUES ( 36, 28, '香水' );
INSERT INTO `goods_type` VALUES ( 37, -1, '图书' );
INSERT INTO `goods_type` VALUES ( 38, 37, '音像' );
INSERT INTO `goods_type` VALUES ( 39, 37, '少儿' );
INSERT INTO `goods_type` VALUES ( 40, 37, '教育' );
INSERT INTO `goods_type` VALUES ( 41, 37, '文艺' );
INSERT INTO `goods_type` VALUES ( 42, 37, '人文' );
INSERT INTO `goods_type` VALUES ( 43, 37, '生活' );
INSERT INTO `goods_type` VALUES ( 44, 37, '科技' );
INSERT INTO `goods_type` VALUES ( 45, 37, '刊物' );

--
-- Table structure for table payment_info
--

DROP TABLE IF EXISTS `payment_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `payment_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL,
  `goods_id` varchar(50) NOT NULL,
  `goods_number` int(10) NOT NULL,
  `payment_price` int(10) NOT NULL,
  `payment_discount` int(5) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `deliver_type` varchar(10) NOT NULL,
  `generate_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `deliverfee` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table payment_info
--

INSERT INTO `payment_info` VALUES ( 2, 233452, 43523535, 454544, 998, 80, 'XX', '顺丰快递', '2015-12-25', '配送中', 0 );
INSERT INTO `payment_info` VALUES ( 3, 3245, 345, 345, 435, 345, 435, 435345, '2015-12-25', 345345, 435 );
INSERT INTO `payment_info` VALUES ( 4, 0, 0, 0, 0, 0, '', '', '0000-00-00', '', 0 );
INSERT INTO `payment_info` VALUES ( 5, 0, 0, 1, 74, 0, '在线支付', '伊甸园快递', '0000-00-00', '', 5 );

--
-- Table structure for table system_backup
--

DROP TABLE IF EXISTS `system_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `system_backup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `backup_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table system_backup
--


--
-- Table structure for table system_log
--

DROP TABLE IF EXISTS `system_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `system_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_detail` text NOT NULL,
  `module_id` int(100) NOT NULL,
  `log_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table system_log
--

INSERT INTO `system_log` VALUES ( 1, '系统爆炸', 7, '2015-12-10' );

--
-- Table structure for table user_info
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = 'utf8' */;
CREATE TABLE `user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login_name` varchar(50) NOT NULL,
  `login_pwd` varchar(30) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `account_balance` int(50) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table user_info
--


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
