-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- 主機: localhost:3306
-- 產生時間： 2014 年 08 月 13 日 21:08
-- 伺服器版本: 5.5.34
-- PHP 版本： 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `johogo`
--

-- --------------------------------------------------------

--
-- 資料表結構 `browser`
--

CREATE TABLE IF NOT EXISTS `browser` (
  `p_id` int(11) NOT NULL COMMENT 'product id',
  `m_account` char(15) NOT NULL COMMENT 'account of member',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`,`m_account`),
  KEY `m_account` (`m_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `p_id` int(11) NOT NULL COMMENT 'product id',
  `m_account` char(15) NOT NULL COMMENT 'account of member',
  `number` char(20) NOT NULL COMMENT 'the number of product member brought',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`p_id`,`m_account`),
  KEY `m_account` (`m_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `co_id` int(11) NOT NULL COMMENT 'comment id',
  `m_account` char(15) NOT NULL COMMENT 'account of member',
  `p_id` int(11) NOT NULL COMMENT 'product id',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text,
  `isgood` tinyint(4) DEFAULT NULL,
  `response` text,
  `r_datetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`co_id`),
  KEY `p_id` (`p_id`),
  KEY `m_account` (`m_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` char(10) NOT NULL,
  `c_account` char(15) NOT NULL,
  `password` char(15) NOT NULL,
  `name_contact` char(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` char(12) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_account` (`c_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200000011 ;

--
-- 資料表的匯出資料 `company`
--

INSERT INTO `company` (`c_id`, `c_name`, `c_account`, `password`, `name_contact`, `email`, `phone`, `address`) VALUES
(200000001, '懶人包', 'idlefox', 'qweqwe', 'Leo Lin', 'contemplation8213@gmail.com', '0982245628', '台北市文山區指南路三段14巷13弄7號5樓'),
(200000002, '味全', '1201', '123456', 'Leo Lin', 'contemplation8214@gmail.com', '982245629', '台北市文山區指南路三段14巷13弄7號6樓'),
(200000003, '台榮', '1220', 'asdasd', 'Leo Lin', 'contemplation8215@gmail.com', '982245630', '台北市文山區指南路三段14巷13弄7號7樓'),
(200000004, '味王', '1203', 'zxczxc', 'Leo Lin', 'contemplation8216@gmail.com', '982245631', '台北市文山區指南路三段14巷13弄7號8樓'),
(200000005, '大成', '1210', 'qweqwe', 'Leo Lin', 'contemplation8217@gmail.com', '982245632', '台北市文山區指南路三段14巷13弄7號9樓'),
(200000006, '大飲', '1213', '123456', 'Leo Lin', 'contemplation8218@gmail.com', '982245633', '台北市文山區指南路三段14巷13弄7號10樓'),
(200000007, '卜蜂', '1215', 'asdasd', 'Leo Lin', 'contemplation8219@gmail.com', '982245634', '台北市文山區指南路三段14巷13弄7號11樓'),
(200000008, '統一', '1216', 'zxczxc', 'Leo Lin', 'contemplation8220@gmail.com', '982245635', '台北市文山區指南路三段14巷13弄7號12樓'),
(200000009, '愛之味', '1217', '123456', 'Leo Lin', 'contemplation8221@gmail.com', '982245636', '台北市文山區指南路三段14巷13弄7號13樓'),
(200000010, '泰山', '1218', 'qweqwe', 'Leo Lin', 'contemplation8222@gmail.com', '982245637', '台北市文山區指南路三段14巷13弄7號14樓');

-- --------------------------------------------------------

--
-- 資料表結構 `discuz`
--

CREATE TABLE IF NOT EXISTS `discuz` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `m_account` varchar(15) NOT NULL COMMENT 'foreign key',
  `d_title` char(20) NOT NULL,
  `category` char(4) NOT NULL,
  `content` text,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'the time online',
  `popular` int(11) DEFAULT '0' COMMENT 'the number of people pay attention on the product',
  PRIMARY KEY (`d_id`),
  KEY `m_account` (`m_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=900028 ;

--
-- 資料表的匯出資料 `discuz`
--

INSERT INTO `discuz` (`d_id`, `m_account`, `d_title`, `category`, `content`, `datetime`, `popular`) VALUES
(900001, 'rilakkuma', '大家來團購吧~', '閒聊', '弘光\n阿疵\n有是ㄇ', '2014-08-07 13:27:35', 75),
(900002, 'google', '我們 一起 團購 ㄅ', '閒聊', '回家囉 ? 囉 ker,', '2014-08-07 11:51:56', 2),
(900003, 'firefox', '這好美ㄛ ~ ~ ~ ><', '閒聊', '阿哈哈\nYO~~~~~~~~,…..', '2014-07-31 12:28:55', 3),
(900004, 'holmes', '          蛤這什麼鬼!!???', '閒聊', '  \n嗯哼\n我想睡惹~~~~~~!', '2014-07-31 09:43:16', 1),
(900005, 'watson', 'YO~~~~~sdfghjkl;''', '閒聊', '大加快來領貨ㄚㄚ\n你們這樣主糾很尷尬很麻煩捏~\n拜 偷…..。', '2014-07-31 12:29:07', 2),
(900006, 'holmes', 'ㄎㄎㄎㄎㄎ', '閒聊', 'xo4xo4jjfrfddskf;dfljkjkrfjklbkgfrjdfs;fropjrkrogtjrjgrdl\n累累累累累累累累累累累\n睡睡睡睡睡睡睡睡睡睡睡睡\nYO@#$%^&*()_+', '2014-07-31 12:29:10', 1),
(900007, 'watson', '<@#$%^&*()_', '閒聊', '花惹發#$%^&*()_+\n\n亨亨亨', '2014-07-31 12:29:13', 1),
(900008, 'moriarty', '，，，。。。。；、、、', '閒聊', '吧哈巴拉巴拉唷瞜齁齁', '2014-07-31 10:02:34', 5),
(900009, 'lestrade', ',,,,,,,,,,………', '閒聊', ',,,,,,,,,,,,\n…………..\n<<<<<<<<<<，，，，\n。。。。。。。。', '2014-07-31 12:29:15', 1),
(900010, 'psychology', 'what''s going, on?', '閒聊', '我\n餓\n惹', '2014-07-31 10:02:25', 1),
(900011, 'holmes', 'title', 'cate', 'content', '2014-07-26 07:06:22', 0),
(900024, '小光', 'test', '閒聊', 'test2', '2014-07-26 07:35:50', 0),
(900025, '小光', 'asd', '黑特', 'asd', '2014-08-07 11:48:42', 4),
(900026, '惠娟', 'test', '問題', 'dddd', '2014-07-31 05:47:26', 0),
(900027, '安安', '123', '問題', '3123123123', '2014-07-31 12:29:32', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `d_response`
--

CREATE TABLE IF NOT EXISTS `d_response` (
  `d_id` int(11) NOT NULL COMMENT 'comment id',
  `m_account` char(15) NOT NULL COMMENT 'account of Company',
  `content` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`d_id`,`m_account`),
  KEY `m_account` (`m_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `i_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `p_id` int(11) NOT NULL COMMENT 'foreign key',
  `url` varchar(500) NOT NULL,
  `title` varchar(15) NOT NULL,
  `description` text,
  PRIMARY KEY (`i_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=500000055 ;

--
-- 資料表的匯出資料 `image`
--

INSERT INTO `image` (`i_id`, `p_id`, `url`, `title`, `description`) VALUES
(500000001, 300000001, 'resource/champagne.jpg', '加拿大楓葉冰酒', '加拿大楓葉冰酒'),
(500000002, 300000002, 'resource/champagne.jpg', '加拿大品尼克蘋果氣泡冰酒', '加拿大品尼克蘋果氣泡冰酒'),
(500000003, 300000003, 'resource/003.jpg', '少女忽必烈', '少女忽必烈'),
(500000004, 300000004, 'resource/004.jpg', '夢幻花', '夢幻花'),
(500000005, 300000005, 'resource/005.jpg', '蕾絲勾花珍珠拼接寬鬆無袖雪紡衫', '蕾絲勾花珍珠拼接寬鬆無袖雪紡衫'),
(500000006, 300000006, 'resource/006.jpg', '台灣製抗UV防風機能連帽外套', '台灣製抗UV防風機能連帽外套'),
(500000007, 300000007, 'resource/007.jpg', '空運加州櫻桃1.2kg/盒', '空運加州櫻桃1.2kg/盒'),
(500000008, 300000008, 'resource/008.jpg', '炭燒掛耳式咖啡', '炭燒掛耳式咖啡'),
(500000009, 300000009, 'resource/009.jpg', '生機無籽葡萄乾', '生機無籽葡萄乾'),
(500000010, 300000010, 'resource/010.jpg', '四合一色鉛筆(2入)', '四合一色鉛筆(2入)'),
(500000011, 300000011, 'resource/011.jpg', '耐熱玻璃馬克杯-375ml', '耐熱玻璃馬克杯-375ml'),
(500000012, 300000012, 'resource/012.jpg', '肩頸背舒壓枕', '肩頸背舒壓枕'),
(500000013, 300000013, 'resource/013.jpg', '橘子工坊_天然制菌濃縮洗衣精1', '橘子工坊_天然制菌濃縮洗衣精1800mL'),
(500000014, 300000014, 'resource/014.jpg', 'SNUGGLE柔軟精(藍瓶-清', 'SNUGGLE柔軟精(藍瓶-清新香)-64oz'),
(500000015, 300000015, 'resource/015.jpg', '日本LION濃縮柔軟洗衣精-清', '日本LION濃縮柔軟洗衣精-清新花果香400g'),
(500000016, 300000016, 'resource/016.jpg', '化妝刷具7件組', '化妝刷具7件組'),
(500000017, 300000017, 'resource/017.jpg', 'TINT WATER 唇露(甜', 'TINT WATER 唇露(甜橙橘)'),
(500000018, 300000018, 'resource/018.jpg', '3CE 立體小臉驚奇修容粉餅', '3CE 立體小臉驚奇修容粉餅'),
(500000019, 300000019, 'resource/019.jpg', '1028瑪卡龍眼妝盒', '1028瑪卡龍眼妝盒'),
(500000020, 300000020, 'resource/020.jpg', 'Aimez le style寬', 'Aimez le style寬版和紙膠帶_餅乾'),
(500000021, 300000021, 'resource/021.jpg', '1920大稻埕印花漾紙膠帶', '1920大稻埕印花漾紙膠帶'),
(500000022, 300000022, 'resource/022.jpg', '和紙膠帶(25mm)-Fouf', '和紙膠帶(25mm)-Foufou Comics'),
(500000023, 300000023, 'resource/023.jpg', '冰心波蘿泡芙', '冰心波蘿泡芙'),
(500000024, 300000024, 'resource/024.jpg', '冰釀情人果乾+冰釀紅酒番茄', '冰釀情人果乾+冰釀紅酒番茄'),
(500000025, 300000025, 'resource/025.jpg', '原味花生糖', '原味花生糖'),
(500000026, 300000026, 'resource/026.jpg', '蛋糕酥', '蛋糕酥'),
(500000027, 300000027, 'resource/027.jpg', '愛文芒果', '愛文芒果'),
(500000028, 300000028, 'resource/028.jpg', '《愛麗絲農莊》燕麥葡萄酥餅-大', '《愛麗絲農莊》燕麥葡萄酥餅-大罐250g'),
(500000029, 300000029, 'resource/029.jpg', '咖啡拉茶', '咖啡拉茶'),
(500000030, 300000030, 'resource/030.jpg', '漁夫帽', '漁夫帽'),
(500000031, 300000031, 'resource/031.jpg', '長裙', '長裙'),
(500000032, 300000032, 'resource/032.jpg', '荷葉邊', '荷葉邊'),
(500000033, 300000033, 'resource/033.jpg', '格子襯衫', '格子襯衫'),
(500000034, 300000034, 'resource/034.jpg', '雪紡襯衫', '雪紡襯衫'),
(500000035, 300000035, 'resource/035.jpg', '短褲', '短褲'),
(500000036, 300000036, 'resource/036.jpg', '短裙', '短裙'),
(500000037, 300000037, 'resource/037.jpg', '圓裙', '圓裙'),
(500000038, 300000038, 'resource/038.jpg', '縮口褲', '縮口褲'),
(500000039, 300000039, 'resource/039.jpg', '棉T', '棉T'),
(500000040, 300000040, 'resource/040.jpg', '男襯衫', '男襯衫'),
(500000041, 300000041, 'resource/041.jpg', '亮T', '亮T'),
(500000042, 300000042, 'resource/042.jpg', '男短褲', '男短褲'),
(500000043, 300000043, 'resource/043.jpg', '丹寧', '丹寧'),
(500000044, 300000044, 'resource/044.jpg', '短上衣', '短上衣'),
(500000045, 300000045, 'resource/045.jpg', '短上衣', '短上衣'),
(500000046, 300000046, 'resource/046.jpg', '高跟鞋', '高跟鞋'),
(500000047, 300000047, 'resource/047.jpg', '高跟鞋', '高跟鞋'),
(500000048, 300000048, 'resource/048.jpg', '娃娃鞋', '娃娃鞋'),
(500000049, 300000049, 'resource/049.jpg', '娃娃鞋', '娃娃鞋'),
(500000050, 300000050, 'resource/050.jpg', 'SHISEIDO資生堂 嘉美艷', 'SHISEIDO資生堂 嘉美艷容露150ml'),
(500000051, 300000051, 'resource/051.jpg', '化妝水', '化妝水'),
(500000052, 300000052, 'resource/052.jpg', '電扇', '電扇'),
(500000053, 300000053, 'resource/053.jpg', '果汁機', '果汁機'),
(500000054, 300000054, 'resource/054.jpg', '洗臉機', '洗臉機');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `student_id` char(10) NOT NULL,
  `m_name` char(10) DEFAULT NULL,
  `nickname` char(10) DEFAULT NULL,
  `password` char(15) NOT NULL,
  `m_account` char(15) DEFAULT NULL,
  `identity` char(4) NOT NULL,
  `department` char(10) NOT NULL,
  `gender` char(2) NOT NULL,
  `birthday` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `verification` char(40) NOT NULL DEFAULT '0',
  `isverified` int(11) DEFAULT NULL,
  `point` int(11) DEFAULT '0',
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `m_account` (`m_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`student_id`, `m_name`, `nickname`, `password`, `m_account`, `identity`, `department`, `gender`, `birthday`, `verification`, `isverified`, `point`, `role`) VALUES
('100306082', '韓宏光', '小光', '100306082', NULL, '請選擇身', '請選擇系所', '請選', '0000-00-00 00:00:00', 'd627f44819e0cdb235a1ba10dc32df2e', 1, 0, NULL),
('nvs_test', NULL, NULL, 'nvs_test', NULL, '', '', '', NULL, '735ddec196a9ca5745c05bec0eaa4bf9', 0, 0, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `c_account` char(15) NOT NULL COMMENT 'foreign key',
  `p_name` char(20) NOT NULL,
  `category_1` char(4) NOT NULL,
  `category_2` char(4) NOT NULL,
  `o_price` int(11) DEFAULT NULL COMMENT 'original price)',
  `s_price` int(11) DEFAULT NULL COMMENT 'special offer',
  `description` text,
  `goal` int(11) NOT NULL COMMENT 'arrive the number, the product will start sell',
  `u_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'the time on the shelf',
  `d_datetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'the time off the shelf',
  `popular` int(11) DEFAULT '0' COMMENT 'the number of people pay attention on the product',
  `isgroup` tinyint(4) DEFAULT NULL,
  `shipment` int(11) DEFAULT '7',
  `img` varchar(100) DEFAULT NULL,
  `vote_list` longtext,
  PRIMARY KEY (`p_id`),
  KEY `c_account` (`c_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=300000055 ;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`p_id`, `c_account`, `p_name`, `category_1`, `category_2`, `o_price`, `s_price`, `description`, `goal`, `u_datetime`, `d_datetime`, `popular`, `isgroup`, `shipment`, `img`, `vote_list`) VALUES
(300000001, 'idlefox', '加拿大楓葉冰酒', '美食', '酒類', 500, 300, '酒精濃度：9.50% \r\n容量：375 ml', 20, '2014-05-12 09:40:00', '2014-06-29 16:00:00', 0, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000002, 'idlefox', '加拿大品尼克蘋果氣泡冰酒', '美食', '酒類', 750, 450, '加拿大品尼克蘋果氣泡冰酒\r\nDomaine Pinnacle Ice Apple Wine Sparkling \r\n酒精濃度：12.00% \r\n容量：375 ml', 20, '2014-05-12 09:40:00', '2014-06-29 16:00:00', 1, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082'),
(300000003, '1201', '少女忽必烈', '休閒', '圖書', 250, 200, '新世代時代小說！駱以軍 紀蔚然 盛情推薦', 15, '2014-05-13 09:40:00', '2014-06-30 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000004, '1201', '夢幻花', '休閒', '圖書', 320, 265, '作者： 東野圭吾\n原文作者：Keigo Higashino\n譯者：王蘊潔\n出版社：春天出版社\n出版日期：2014/05/16\n語言：繁體中文', 25, '2014-05-14 09:40:00', '2014-07-01 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000005, '1220', '蕾絲勾花珍珠拼接寬鬆無袖雪紡衫', '服飾', '女裝', 600, 350, '簍空蕾絲勾花小露性感~ ?寬鬆雪紡材質輕柔舒適。\n清爽的感極佳~ ?春夏衣櫃必備款唷!~', 20, '2014-05-15 09:40:00', '2014-07-02 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000006, '1220', '台灣製抗UV防風機能連帽外套', '服飾', '女裝', 1120, 560, '抗UV、防曬功能，保護皮膚遠離紫外線\n防風、防潑水功能，清洗容易\n戶外休閒、通勤必備單品\n馬卡龍撞色設計 造型百搭\n輕盈舒適好穿，好攜帶\n帽子可收納於後領，變換不同造型', 35, '2014-05-16 09:40:00', '2014-07-03 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000007, '1203', '空運加州櫻桃1.2kg/盒', '美食', '水果', 1480, 788, '．產地：美國加州\n．保存方式：冷藏保存\n．保存期限：5-7天\n．配送地點限制：限台灣本島，離島不配送', 30, '2014-05-17 09:40:00', '2014-07-04 16:00:00', 0, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000008, '1203', '炭燒掛耳式咖啡', '美食', '咖啡', 180, 150, '', 20, '2014-05-18 09:40:00', '2014-07-05 16:00:00', 0, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000009, '1203', '生機無籽葡萄乾', '美食', '零食', 170, 98, '來自土壤肥沃、地勢高、溫差大、日照充足，一年約有330年是萬里無雲的好天氣，\n過人的地理環境所孕育出自然甘甜Q度夠的超大葡萄乾。\n無添加防腐劑、色素、人工香料，保證純天然的口感。\n\n保存注意事項：\n請置於乾燥陰涼處，避免陽光直射，開封後請儘速食用完畢或冷藏。', 15, '2014-05-19 09:40:00', '2014-07-06 16:00:00', 0, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000010, '1213', '四合一色鉛筆(2入)', '生活', '文具', 150, 120, '筆芯超粗：鉛筆芯直徑是一般鉛筆的3倍！筆芯體積比一般鉛筆大7倍！\n※6.25mm特粗筆芯堅硬不易斷、顯色度佳、筆芯防水\n※好握的圓滑三角筆身：增加了筆桿與小手抓握的接觸面積，使小手好抓握，好操控！\n※筆尾為原木密封包覆設計，幼兒不致直接接觸筆芯\n※好握的圓滑三角造型，對於幼兒及左手使用者有極大的幫助。\n※可搭配LYRA延長筆套使用，即使削筆後依然可正常使用。\n※純天然木材製造\n※4色筆芯，紅黃藍綠，一筆畫出美妙的色彩變化。', 15, '2014-05-20 09:40:00', '2014-07-07 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000011, '1213', '耐熱玻璃馬克杯-375ml', '生活', '居家', 780, 350, '純淨耐熱馬克杯 獨創插圖設計!\n◆台玻執著精神細膩玻璃工藝製品\n◆採用耐熱玻璃材質，質地清透\n◆壺型杯把手工拼接,拿取輕鬆\n◆玻璃體耐熱溫差120度C\n◆透明感加上豐富色彩呈現', 35, '2014-05-21 09:40:00', '2014-07-08 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000012, '1213', '肩頸背舒壓枕', '生活', '居家', 1280, 660, '★今年日本大美人小美人的話題商品\n★一日五分鐘讓肩胛骨伸展放鬆\n★躺下休息或小睡就能做到肩胛骨伸展\n★肩胛骨周圍多運動就可以開始變漂亮\n★伸展背部筋肉塑造美麗的姿勢\n★日本進口', 15, '2014-05-22 09:40:00', '2014-07-09 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000013, '1215', '橘子工坊_天然制菌濃縮洗衣精1800mL', '生活', '日用', 340, 220, '三大堅持，為家人打造健康安心生活\n■ 堅持一：天然原料製成-食品級認證橘油與植物性配方，無香精真安心\n■ 堅持二：通過無有毒化學殘留測試（界面活性劑與螢光劑）\n■ 堅持三：全新天然深層D淨因子有效防霉，制菌效果通過實體測試超過99%', 20, '2014-05-23 09:40:00', '2014-07-10 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000014, '1215', 'SNUGGLE柔軟精(藍瓶-清新香)-6', '生活', '日用', 300, 280, '◆美國原裝進口\n◆清新自然之清新芳香\n◆使衣物柔軟芳香護色，減少皺折產生', 20, '2014-05-24 09:40:00', '2014-07-11 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000015, '1216', '日本LION濃縮柔軟洗衣精-清新花果香4', '生活', '日用', 280, 188, '重量：470g\n◎獨特香氛及消臭成分讓衣物潔淨又清香\n◎柔軟成分配合衣物膨鬆柔細\n◎適用於一般及滾筒洗衣機\n\n◎適用於: 綿、麻、合成纖維 \n\n◎使用方法:同一般洗衣精\n\n◎建議用量:30L水量加入約10ml本產品(請視衣物髒污程度增減)\n\n◎注意事項: 1.請放置於陰涼乾燥處保處避免高溫及日光直射\n                    2.洗滌前請參考衣物上之洗滌標示\n                    3.如誤入眼睛請以大量清水沖洗\n\n◎產地:日本 \n◎容量:400g', 20, '2014-05-25 09:40:00', '2014-07-12 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000016, '1217', '化妝刷具7件組', '美妝', '美妝', 480, 299, '', 15, '2014-05-26 09:40:00', '2014-07-13 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000017, '1217', 'TINT WATER 唇露(甜橙橘)', '美妝', '美妝', 380, 235, '★韓劇女主角必備，網路熱烈討論不間斷，WonderGirls、黃金時刻黃靜茵代言，一擦可愛度up↗★\n★唇露可用在嘴唇或臉頰，點幾滴後在輕輕推開，就算素顏也有好氣色★\n★可愛包裝，女孩們都無法抗拒~補妝看到心情也變好★\n\n微微暈染，可愛好氣色', 20, '2014-05-27 09:40:00', '2014-07-14 16:00:00', 1, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082'),
(300000018, '1217', '3CE 立體小臉驚奇修容粉餅', '美妝', '美妝', 890, 480, '?保證韓國原裝進口\n?限量優惠組合\n?韓國女星 人氣部落客 愛用品牌', 30, '2014-05-28 09:40:00', '2014-07-15 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000019, '1217', '1028瑪卡龍眼妝盒', '美妝', '美妝', 499, 330, '1028瑪卡龍眼妝盒\n\n★6色清新眼彩上的夢幻光澤低調甜美\n★質地柔滑顯色、妝感服貼持久\n★精緻的瑪卡龍鐵盒配上法式復古的手繪設計(可作小物收納)\n★貼心附上可愛的小圓鏡，讓上妝更便利', 25, '2014-05-29 09:40:00', '2014-07-16 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000020, '1215', 'Aimez le style寬版和紙膠帶', '生活', '文具', 189, 120, '', 20, '2014-05-30 09:40:00', '2014-07-17 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000021, '1210', '1920大稻埕印花漾紙膠帶', '生活', '文具', 198, 120, '1920大稻埕印花漾紙膠帶\n感受1920閨秀的花漾年華\n復古布料印花紙膠帶，多種變化、時尚、美觀、好用、不殘膠！', 20, '2014-05-31 09:40:00', '2014-07-18 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000022, '1210', '和紙膠帶(25mm)-Foufou Co', '生活', '文具', 120, 69, '台灣圖像創意品牌Foufou  與 台灣在地和紙膠帶品牌菊水KIKUSUI\n跨界合作開發和紙膠帶 全程台灣設計製造\n人氣好評第二彈，這次也有寬版的設計囉！', 20, '2014-06-01 09:40:00', '2014-07-19 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000023, '1210', '【里洋烘培坊】冰心波蘿泡芙 原味香草 (', '美食', '甜點', 240, 180, '【法式經典重現 冰涼透心 酥軟回味】泡芙於十六世紀傳入法國王室，法文P?te ? chaud，意即「熱的麵團」，也是指泡芙的麵糰，它烘烤出來的外形像花椰菜(chou)模樣，因此它的名稱再逐漸轉變成P?te ? Choux意指花椰菜狀的麵糰，由於泡芙似蛋糕鬆軟與綿密，製作費時且繁複，對法國廚師而言，泡芙是需要相當專業與經驗的甜點。\n\n品名：冰心波蘿泡芙Ice Cream Puff ???????\n淨重：45公克/個，12入\n主成分：鮮奶、動物性鮮奶油、植物性鮮奶油、低筋麵粉、卡士達粉、雞蛋\n保存方式：需冷藏(4℃以下) \n食用方式：直接食用\n保存期限：冷藏5天，冷凍1個月\n有效日期：標於包裝盒上\n出品企業：東東國際企業股份有限公司\n地址：台南市華平路156號3樓', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000024, '1210', '《第二顆鈕釦》冰釀情人果乾+冰釀紅酒番茄', '美食', '零食', 630, 475, '成分：\n冰釀情人果乾　成份：芒果、冰糖\n冰釀紅酒番茄　成份：番茄、紅酒、冰糖、醋\n淨重：400g±5%/包，共2包\n保存期限：未開封冷凍(-18℃)一年\n賞味期限：標示於包裝上\n產地：台灣\n使用建議：解凍後略含碎冰食用最佳，未食用完請置於冷凍保存', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000025, '1210', '《東勢厝特產鄉土味》原味花生糖(460g', '美食', '零食', 930, 725, ' "雲林東勢厝特產"鄉土味花生糖(麥芽蔗糖釀製)\n手工新鮮現做獨特不黏牙 \n麥芽蔗糖釀製\n\n只採用台灣雲林東勢鄉出產優質花生為主源料\n\n年節送禮∣品茗佳點∣素食可用∣無防腐劑 \n土豆自產∣原地採收∣香脆可口∣不會甜膩\n\n規格:460g/瓶，5瓶裝(1箱)\n※免運※ \n\n保存期限:常溫45天！', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000026, '1210', '《品屋》蛋糕酥條4盒組', '美食', '零食', 680, 599, '◆蛋糕製作而成，香氣四溢\n◆口感酥脆、甜而不膩 \n◆送禮自用兩相宜', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000027, '1210', '嚴選愛文芒果(18顆/10台斤/箱)', '美食', '水果', 988, 799, '規格：18粒裝/盒\n重量：10台斤±5%(6公斤)\n內容物：愛文芒果\n產地：台南玉井\n', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000028, '1210', '《愛麗絲農莊》燕麥葡萄酥餅-大罐250g', '美食', '甜點', 299, 200, '愛麗絲手工餅乾特色:\n\n1.農莊自行生產以純手工製成\n2.不添加任何防腐劑.起雲劑\n3.採用天然食材加入大量堅果類原料營養健康\n4.口感佳.味道香.下午茶.點心的最佳良伴\n\n產品資訊:\n品名: 燕麥葡萄酥餅 250g/罐\n成分:麵粉/奶油/蔗糖/雞蛋/燕麥片/鹽/葡萄乾/米洒', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000029, '1210', '《唐拾壹》咖啡拉茶系列組合', '美食', '咖啡', 600, 525, '產品規格:\n商品名稱: <花園Garden Cafe>白咖啡--原味 5包入\n\n內容物成份: 細砂糖、脫脂奶粉、即溶咖啡\n\n內容量:30公克*5包/盒 \n\n低咖啡因、不苦不酸澀。直接感受香濃撲鼻的咖啡香氣，與天然的頂級脫脂奶粉完美結合，給您全新的味覺享受。', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000030, '1203', 'kimishop 韓版牛仔布圓?花盆帽森', '服飾', '女裝', 500, 299, '新品上架 現折100元!! 最新時尚流行單品', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000031, '1203', '嘉蒂斯長褲 韓版飄逸顯瘦鬆緊腰雪紡長褲裙', '服飾', '女裝', 798, 499, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000032, '1203', 'BONAMANA小柚日系T恤彩紅小馬荷葉', '服飾', '女裝', 520, 499, '日韓精緻版，數量有限要買要快.....', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000033, '1203', '糖罐子格紋點點雪紡襯衫', '服飾', '女裝', 650, 399, '利用配色感搭配格紋.點點更顯得俏麗亮眼\n內搭背心當外套穿搭穿出屬於自己風格的簡單時尚喔～', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000034, '1203', '糖罐子貓咪格紋反摺袖雪紡襯衫', '服飾', '女裝', 650, 350, '可愛的貓咪頭x知性格紋讓女孩們依喜好挑選最適合的魅力時尚\n搭小可愛x褲裝即可擁有帶點大人味的輕熟形象', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000035, '1203', '蕾絲花邊格紋純棉短褲*', '服飾', '女裝', 260, 199, '◆女孩必備的格紋短褲，與蕾絲花邊混搭出休閒甜美感', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000036, '1203', 'Miu-Star 好感棉質內裡安全褲波浪', '服飾', '女裝', 598, 199, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000037, '1203', 'Miu-Star 可愛女孩好搭配立體壓紋', '服飾', '女裝', 458, 250, '0204特殊立體壓紋質感設計 甜美好搭配', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000038, '1217', '糖罐子格紋星星素面縮口褲', '服飾', '女裝', 698, 398, '褲頭加入鬆緊帶包覆腰部不緊繃\n格紋星星素面花色展現多種穿搭風情\n褲管縮口可調整長短露出纖細腿長唷～', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000039, '1217', '蝴蝶結別針接雪紡點點棉衫', '服飾', '女裝', 499, 199, '蝴蝶結x點點甜美可愛並以雪紡下擺營造溫柔層次感\n穿搭色褲可呈現優雅的輕盈姿態彷彿腳步頓時輕快了起來唷', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000040, '1217', '皮標口袋設計短袖襯衫(八色)', '服飾', '男裝', 790, 488, '■我們堅持讓你的穿著走在時代的尖端，讓您成為時尚達人不落人後', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000041, '1217', 'hito亮面字母印花，小二潮物棉質短袖T', '服飾', '男裝', 590, 398, '■我們堅持讓你的穿著走在時代的尖端，讓您成為時尚達人不落人後', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000042, '1217', '熱潮百搭素面短褲', '服飾', '男裝', 299, 199, '夏日潮流嚴選百搭多色系素面百搭休閒短褲 -共13色-', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000043, '1217', '牛仔丹寧條紋拼接木扣短袖男襯衫', '服飾', '男裝', 780, 350, '襯衫ManStyle潮流嚴選', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000044, '1220', '韓風百搭，配色口袋條紋短袖上衣(三色)', '服飾', '男裝', 500, 299, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000045, '1220', '搶眼色系條紋拼接口袋短袖上衣(四色)', '服飾', '男裝', 500, 280, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000046, '1220', '顯瘦美腿圓頭絨面粗跟高跟鞋', '服飾', '鞋類', 1688, 600, '顏色:紅色"藍色"黑色\n 尺寸:35/36/37/38/39\n鞋版:正常版(腳板寬厚請自行加大）\n質料:磨紗絨面\n 跟高:約8.5cm \n商品組合:鞋盒', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000047, '1220', '緹花蕾絲防水台設計細跟鞋‧2色', '服飾', '鞋類', 599, 499, '顏色：米網．黑網\n尺碼：35．36．37．38．39．40', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000048, '1220', '蝴蝶結絨面平底娃娃鞋', '服飾', '鞋類', 499, 389, '質感絨面\nMIT好穿鞋\n古典蝴蝶結', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000049, '1216', '淡雅蝴蝶結平底娃娃鞋-3色', '服飾', '鞋類', 588, 299, '週週新品刊登\n22.5~25\nMIT製造', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000050, '1216', 'SHISEIDO資生堂 嘉美艷容露150', '美妝', '保養', 199, 88, '調理化妝水 舒緩日曬 冰涼', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000051, '1216', 'Kiehl''s 契爾氏 特級保濕無油清爽', '美妝', '保養', 299, 150, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000052, '1216', '三洋14吋遙控式DC立扇/涼風扇/電扇', '生活', '電器', 4500, 1890, '■採用日本原裝進口馬達\n■無線遙控功能，涼夏真輕鬆\n■5段式風量循環設定\n■定時設計\n■台灣製造', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000053, '1216', '《思樂誼 SANOE》七彩隨行杯果汁機(', '生活', '電器', 2480, 1290, '我們承諾，超長3年保固，180天只換不修\n輕巧果汁機、隨行杯，輕便帶著走\nSGS綠環保，外觀手感漆', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL),
(300000054, '1216', '全新六代pobling洗臉神器洗臉刷洗臉', '生活', '電器', 899, 285, '潔臉機其實就是幫助大家更深沉的清潔到毛孔', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `response`
--

CREATE TABLE IF NOT EXISTS `response` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `d_id` int(11) NOT NULL,
  `m_account` char(15) NOT NULL,
  `r_title` char(20) NOT NULL,
  `content` text,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'the time online',
  PRIMARY KEY (`r_id`),
  KEY `m_account` (`m_account`),
  KEY `d_id` (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=800011 ;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `browser`
--
ALTER TABLE `browser`
  ADD CONSTRAINT `browser_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `browser_ibfk_2` FOREIGN KEY (`m_account`) REFERENCES `member` (`m_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `buy_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buy_ibfk_2` FOREIGN KEY (`m_account`) REFERENCES `member` (`m_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`m_account`) REFERENCES `member` (`m_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `d_response`
--
ALTER TABLE `d_response`
  ADD CONSTRAINT `d_response_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `discuz` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `d_response_ibfk_2` FOREIGN KEY (`m_account`) REFERENCES `discuz` (`m_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_account`) REFERENCES `company` (`c_account`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`m_account`) REFERENCES `member` (`m_account`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `discuz` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
