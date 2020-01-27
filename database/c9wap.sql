/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : c9wap

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2016-01-30 19:34:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_news
-- ----------------------------
DROP TABLE IF EXISTS `tb_news`;
CREATE TABLE `tb_news` (
  `news_id` int(3) NOT NULL auto_increment,
  `news_name` varchar(100) NOT NULL,
  `news_detail` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_type` int(2) NOT NULL,
  `news_img` varchar(255) default NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_news
-- ----------------------------
INSERT INTO `tb_news` VALUES ('1', 'ทดสอบประกาศ3', '<div>ทดสอบประกาศ3</div>\r\n', '2015-11-06 17:44:13', '1', 'news_1.JPG');
INSERT INTO `tb_news` VALUES ('4', 'ทดสอบกิจกรรม2', '<p>ทดสอบกิจกรรม2</p>\r\n', '2015-11-24 01:31:42', '2', 'news_4');
INSERT INTO `tb_news` VALUES ('2', 'ทดสอบประกาศ2', '<div>ทดสอบประกาศ2</div>\r\n', '2015-11-06 17:54:42', '1', 'news_2.JPG');
INSERT INTO `tb_news` VALUES ('3', 'ทดสอบประกาศ1', '<div>ทดสอบประกาศ1</div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<p>&nbsp;</p>\r\n', '2015-11-06 18:29:07', '1', 'news_3.JPG');
INSERT INTO `tb_news` VALUES ('5', 'ทดสอบกิจกรรม1', '<div>ทดสอบกิจกรรม1</div>\r\n', '2015-11-24 01:34:08', '2', 'news_5');
INSERT INTO `tb_news` VALUES ('6', 'ทดสอบอัพเดท2', '<p>ทดสอบอัพเดท2</p>\r\n', '2015-11-24 01:54:55', '3', 'news_6');
INSERT INTO `tb_news` VALUES ('7', 'ทดสอบอัพเดท1', '<p>ทดสอบอัพเดท1</p>\r\n', '2015-11-24 01:57:28', '3', 'news_7');
INSERT INTO `tb_news` VALUES ('8', 'ทดสอบข่าว1', '<p>ทดสอบข่าว1</p>\r\n', '2015-11-24 03:23:30', '0', 'news_8');

-- ----------------------------
-- Table structure for tb_page
-- ----------------------------
DROP TABLE IF EXISTS `tb_page`;
CREATE TABLE `tb_page` (
  `page_id` int(3) NOT NULL auto_increment,
  `page_name` varchar(100) NOT NULL,
  `page_detail` text NOT NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_page
-- ----------------------------
INSERT INTO `tb_page` VALUES ('1', 'ดาวน์โหลดเกม', '<h1>Client Download</h1>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" class=\"inverted table ui\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\">ประเภท</td>\r\n			<td style=\"text-align:center\">ขนาด</td>\r\n			<td style=\"text-align:center\">ดาวน์โหลด</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Full Client</td>\r\n			<td style=\"text-align:center\">0.0 mb</td>\r\n			<td style=\"text-align:center\"><img alt=\"\" src=\"http://www.chiangmai-airport.immigration.go.th/wp-content/uploads/2015/11/Download-Button.png\" style=\"height:100px; width:226px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">Bittorrent</td>\r\n			<td style=\"text-align:center\">0.0 mb</td>\r\n			<td style=\"text-align:center\"><img alt=\"\" src=\"http://www.chiangmai-airport.immigration.go.th/wp-content/uploads/2015/11/Download-Button.png\" style=\"height:100px; line-height:20.8px; width:226px\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>System Requirements</h1>\r\n\r\n<div class=\"r\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; position: relative; color: rgb(113, 113, 113); font-family: ThaiSansNeue_Light, sans-serif; line-height: 18.5714px;\">\r\n<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; width:98%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>ก่อนที่จะทำการ ลงเกม C9 ลงในเครื่องคอมพิวเตอร์ กรุณาเช็คสเปคเครื่องคอมพิวเตอร์ของท่านว่าตรงกับที่เราความต้องการ เพื่อการเล่นเกม C9 อย่างสมบูรณ์แบบและได้ความเพลิดเพลินมากที่สุด</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n&nbsp;\r\n\r\n<table border=\"1\" class=\"inverted table ui\" style=\"background-color:transparent; border-collapse:collapse; border-spacing:0px; box-sizing:border-box; width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><strong>รายการ</strong></td>\r\n			<td style=\"text-align:center\"><strong>ระบบขั้นต่ำ</strong></td>\r\n			<td style=\"text-align:center\"><strong>ระบบที่แนะนำ</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">ระบบปฏิบัติการ</td>\r\n			<td style=\"text-align:center\">Window XP(32bit/64bit)<br />\r\n			Vista(32bit/64bit)</td>\r\n			<td style=\"text-align:center\">Window 7(32bit/64bit)</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">CPU</td>\r\n			<td style=\"text-align:center\">AMD Athlon X2<br />\r\n			Intel Pentium Dualcore</td>\r\n			<td style=\"text-align:center\">AMD FM1<br />\r\n			Intel Core I3</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">RAM</td>\r\n			<td style=\"text-align:center\">1GB or higher</td>\r\n			<td style=\"text-align:center\">2GB หรือสูงกว่า</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">การ์ดจอ</td>\r\n			<td style=\"text-align:center\">ATI Radeon HD4000 Series<br />\r\n			Geforce 200 Series</td>\r\n			<td style=\"text-align:center\">ATI Radeon HD6000 Series หรือสูงกว่า<br />\r\n			Geforce 500 Series หรือสูงกว่า</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">เวอร์ชั่นของ DirectX&nbsp;</td>\r\n			<td style=\"text-align:center\">DirectX 9.0c</td>\r\n			<td style=\"text-align:center\">DirectX 9.0c หรือสูงกว่า</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center\">พื้นที่ในฮาร์ดดิส</td>\r\n			<td style=\"text-align:center\">5GB</td>\r\n			<td style=\"text-align:center\">5GB หรือสูงกว่า<br />\r\n			&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Download Drivers</h2>\r\n\r\n<p style=\"text-align:center\">Make sure you have the latest drivers installed. The links below will help you update the drivers best suited for your system.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://www.microsoft.com/en-us/download/details.aspx?id=35\" rel=\"nofollow\" style=\"text-decoration: none; color: rgb(102, 102, 102);\" target=\"_blank\"><img alt=\"Microsoft DirectX Download Page\" src=\"http://image.webzen.net/C9/content/down_link_etc01.gif\" style=\"border-style:initial; border-width:0px; margin:0px; padding:0px; vertical-align:top\" />&nbsp; &nbsp;</a><a href=\"http://www.nvidia.com/Download/index.aspx\" rel=\"nofollow\" style=\"text-decoration: none; color: rgb(102, 102, 102);\" target=\"_blank\"><img alt=\"GeForce Graphic Card Download Page\" src=\"http://image.webzen.net/C9/content/down_link_etc02.gif\" style=\"border-style:initial; border-width:0px; margin:0px; padding:0px; vertical-align:top\" />&nbsp; &nbsp;</a><a href=\"http://support.amd.com/us/gpudownload/Pages/index.aspx\" rel=\"nofollow\" style=\"text-decoration: none; color: rgb(102, 102, 102);\" target=\"_blank\"><img alt=\"Radeon Graphic Card Download Page\" src=\"http://image.webzen.net/C9/content/down_link_etc03.gif\" style=\"border-style:initial; border-width:0px; margin:0px; padding:0px; vertical-align:top\" /></a></p>\r\n</div>\r\n');

-- ----------------------------
-- Table structure for tb_shopcash_item
-- ----------------------------
DROP TABLE IF EXISTS `tb_shopcash_item`;
CREATE TABLE `tb_shopcash_item` (
  `id` int(11) NOT NULL auto_increment,
  `id_type` int(11) default NULL,
  `item_id` int(11) default NULL,
  `item_name` varchar(50) default NULL,
  `item_description` varchar(250) default NULL,
  `item_count` int(11) default NULL,
  `item_price` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_shopcash_item
-- ----------------------------
INSERT INTO `tb_shopcash_item` VALUES ('1', '2', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '1000');
INSERT INTO `tb_shopcash_item` VALUES ('2', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '1000');
INSERT INTO `tb_shopcash_item` VALUES ('3', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('4', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('5', '4', '6313', 'ธนูปราบมาร', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('6', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('7', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('8', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('9', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('10', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('11', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('12', '2', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '50');
INSERT INTO `tb_shopcash_item` VALUES ('13', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '2200');
INSERT INTO `tb_shopcash_item` VALUES ('14', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '200');
INSERT INTO `tb_shopcash_item` VALUES ('15', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '48');
INSERT INTO `tb_shopcash_item` VALUES ('16', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '482');
INSERT INTO `tb_shopcash_item` VALUES ('17', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '568');
INSERT INTO `tb_shopcash_item` VALUES ('18', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '230');
INSERT INTO `tb_shopcash_item` VALUES ('19', '2', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150');
INSERT INTO `tb_shopcash_item` VALUES ('20', '2', '6313', 'ดาบมหาเวทย์', 'รายละเอียดนะครับผม', '1', '900');

-- ----------------------------
-- Table structure for tb_shopgold_item
-- ----------------------------
DROP TABLE IF EXISTS `tb_shopgold_item`;
CREATE TABLE `tb_shopgold_item` (
  `id` int(11) NOT NULL auto_increment,
  `id_type` int(11) default NULL,
  `item_id` int(11) default NULL,
  `item_name` varchar(50) default NULL,
  `item_description` varchar(250) default NULL,
  `item_count` int(11) default NULL,
  `item_price` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_shopgold_item
-- ----------------------------
INSERT INTO `tb_shopgold_item` VALUES ('1', '2', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000000');
INSERT INTO `tb_shopgold_item` VALUES ('2', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('3', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('4', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('5', '4', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('6', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('7', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('8', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('9', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('10', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('11', '6', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('12', '2', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('13', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('14', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('15', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('16', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('17', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('18', '8', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('19', '2', '6313', 'ทดสอบไอเท็ม', 'รายละเอียดนะครับผม', '1', '150000');
INSERT INTO `tb_shopgold_item` VALUES ('20', '2', '6313', 'ดาบมหาเวทย์', 'รายละเอียดนะครับผม', '1', '150000');

-- ----------------------------
-- Table structure for tb_slide
-- ----------------------------
DROP TABLE IF EXISTS `tb_slide`;
CREATE TABLE `tb_slide` (
  `slide_id` int(3) NOT NULL auto_increment,
  `slide_img` varchar(255) NOT NULL,
  `slide_link` varchar(255) default NULL,
  `slide_name` varchar(100) NOT NULL,
  `slide_detail` varchar(255) default NULL,
  PRIMARY KEY  (`slide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_slide
-- ----------------------------
INSERT INTO `tb_slide` VALUES ('1', 'slide_1.JPG', '', '01', '');
INSERT INTO `tb_slide` VALUES ('2', 'slide_2.JPG', 'http://www.google.co.th', '02', '');
INSERT INTO `tb_slide` VALUES ('3', 'slide_3.JPG', '', '03', '');

-- ----------------------------
-- Table structure for tb_type
-- ----------------------------
DROP TABLE IF EXISTS `tb_type`;
CREATE TABLE `tb_type` (
  `type_id` int(2) NOT NULL auto_increment,
  `type_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_type
-- ----------------------------
INSERT INTO `tb_type` VALUES ('1', 'Notice');
INSERT INTO `tb_type` VALUES ('2', 'Event');
INSERT INTO `tb_type` VALUES ('3', 'Update');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `user_id` int(3) NOT NULL auto_increment,
  `user_name` varchar(13) NOT NULL,
  `user_pass` varchar(13) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('1', 'admin', 'c9wapp11500');
