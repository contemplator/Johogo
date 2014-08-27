-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2014 �?08 ??27 ??20:26
-- 伺服器版本: 5.6.16
-- PHP 版本： 5.5.9

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
  `status` varchar(255) NOT NULL DEFAULT '下架',
  PRIMARY KEY (`p_id`),
  KEY `c_account` (`c_account`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=300000055 ;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`p_id`, `c_account`, `p_name`, `category_1`, `category_2`, `o_price`, `s_price`, `description`, `goal`, `u_datetime`, `d_datetime`, `popular`, `isgroup`, `shipment`, `img`, `vote_list`, `status`) VALUES
(300000001, 'idlefox', '加拿大楓葉冰 酒', '美食', '酒類', 500, 300, '酒精濃度：9.50% \r\n容量：375 ml', 20, '2014-05-12 09:40:00', '2014-09-29 16:00:00', 1, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082', '上架'),
(300000002, 'idlefox', '加拿大品尼克蘋果氣泡冰酒', '美食', '酒類', 750, 450, '加拿大品尼克蘋果氣泡冰酒\r\nDomaine Pinnacle Ice Apple Wine Sparkling \r\n酒精濃度：12.00% \r\n容量：375 ml', 20, '2014-05-12 09:40:00', '2014-09-29 16:00:00', 3, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082;100306021;100306032', '上架'),
(300000003, '1201', '少女忽必烈', '休閒', '圖書', 250, 200, '新世代時代小說！駱以軍 紀蔚然 盛情推薦', 15, '2014-05-13 09:40:00', '2014-09-29 16:00:00', 15, 1, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000004, '1201', '夢幻花', '休閒', '圖書', 320, 265, '作者： 東野圭吾\n原文作者：Keigo Higashino\n譯者：王蘊潔\n出版社：春天出版社\n出版日期：2014/05/16\n語言：繁體中文', 25, '2014-05-14 09:40:00', '2014-09-29 16:00:00', 1, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082', '上架'),
(300000005, '1220', '蕾絲勾花珍珠拼接寬鬆無袖雪紡衫', '服飾', '女裝', 600, 350, '簍空蕾絲勾花小露性感~ ?寬鬆雪紡材質輕柔舒適。\n清爽的感極佳~ ?春夏衣櫃必備款唷!~', 20, '2014-05-15 09:40:00', '2014-09-29 16:00:00', 20, 1, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000006, '1220', '台灣製抗UV防風機能連帽外套', '服飾', '女裝', 1120, 560, '抗UV、防曬功能，保護皮膚遠離紫外線\n防風、防潑水功能，清洗容易\n戶外休閒、通勤必備單品\n馬卡龍撞色設計 造型百搭\n輕盈舒適好穿，好攜帶\n帽子可收納於後領，變換不同造型', 35, '2014-05-16 09:40:00', '2014-09-29 16:00:00', 1, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082', '上架'),
(300000007, '1203', '空運加州櫻桃1.2kg/盒', '美食', '水果', 1480, 788, '．產地：美國加州\n．保存方式：冷藏保存\n．保存期限：5-7天\n．配送地點限制：限台灣本島，離島不配送', 30, '2014-05-17 09:40:00', '2014-09-29 16:00:00', 0, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000008, '1203', '炭燒掛耳式咖啡', '美食', '咖啡', 180, 150, '', 20, '2014-05-18 09:40:00', '2014-09-29 16:00:00', 1, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082', '上架'),
(300000009, '1203', '生機無籽葡萄乾', '美食', '零食', 170, 98, '來自土壤肥沃、地勢高、溫差大、日照充足，一年約有330年是萬里無雲的好天氣，\n過人的地理環境所孕育出自然甘甜Q度夠的超大葡萄乾。\n無添加防腐劑、色素、人工香料，保證純天然的口感。\n\n保存注意事項：\n請置於乾燥陰涼處，避免陽光直射，開封後請儘速食用完畢或冷藏。', 15, '2014-05-19 09:40:00', '2014-09-29 16:00:00', 0, 0, 7, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000010, '1213', '四合一色鉛筆(2入)', '生活', '文具', 150, 120, '筆芯超粗：鉛筆芯直徑是一般鉛筆的3倍！筆芯體積比一般鉛筆大7倍！\n※6.25mm特粗筆芯堅硬不易斷、顯色度佳、筆芯防水\n※好握的圓滑三角筆身：增加了筆桿與小手抓握的接觸面積，使小手好抓握，好操控！\n※筆尾為原木密封包覆設計，幼兒不致直接接觸筆芯\n※好握的圓滑三角造型，對於幼兒及左手使用者有極大的幫助。\n※可搭配LYRA延長筆套使用，即使削筆後依然可正常使用。\n※純天然木材製造\n※4色筆芯，紅黃藍綠，一筆畫出美妙的色彩變化。', 15, '2014-05-20 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000011, '1213', '耐熱玻璃馬克杯-375ml', '生活', '居家', 780, 350, '純淨耐熱馬克杯 獨創插圖設計!\n◆台玻執著精神細膩玻璃工藝製品\n◆採用耐熱玻璃材質，質地清透\n◆壺型杯把手工拼接,拿取輕鬆\n◆玻璃體耐熱溫差120度C\n◆透明感加上豐富色彩呈現', 35, '2014-05-21 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000012, '1213', '肩頸背舒壓枕', '生活', '居家', 1280, 660, '★今年日本大美人小美人的話題商品\n★一日五分鐘讓肩胛骨伸展放鬆\n★躺下休息或小睡就能做到肩胛骨伸展\n★肩胛骨周圍多運動就可以開始變漂亮\n★伸展背部筋肉塑造美麗的姿勢\n★日本進口', 15, '2014-05-22 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000013, '1215', '橘子工坊_天然制菌濃縮洗衣精1800mL', '生活', '日用', 340, 220, '三大堅持，為家人打造健康安心生活\n■ 堅持一：天然原料製成-食品級認證橘油與植物性配方，無香精真安心\n■ 堅持二：通過無有毒化學殘留測試（界面活性劑與螢光劑）\n■ 堅持三：全新天然深層D淨因子有效防霉，制菌效果通過實體測試超過99%', 20, '2014-05-23 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000014, '1215', 'SNUGGLE柔軟精(藍瓶-清新香)-6', '生活', '日用', 300, 280, '◆美國原裝進口\n◆清新自然之清新芳香\n◆使衣物柔軟芳香護色，減少皺折產生', 20, '2014-05-24 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000015, '1216', '日本LION濃縮柔軟洗衣精-清新花果香4', '生活', '日用', 280, 188, '重量：470g\n◎獨特香氛及消臭成分讓衣物潔淨又清香\n◎柔軟成分配合衣物膨鬆柔細\n◎適用於一般及滾筒洗衣機\n\n◎適用於: 綿、麻、合成纖維 \n\n◎使用方法:同一般洗衣精\n\n◎建議用量:30L水量加入約10ml本產品(請視衣物髒污程度增減)\n\n◎注意事項: 1.請放置於陰涼乾燥處保處避免高溫及日光直射\n                    2.洗滌前請參考衣物上之洗滌標示\n                    3.如誤入眼睛請以大量清水沖洗\n\n◎產地:日本 \n◎容量:400g', 20, '2014-05-25 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000016, '1217', '化妝刷具7件組', '美妝', '美妝', 480, 299, '', 15, '2014-05-26 09:40:00', '2014-09-29 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000017, '1217', 'TINT WATER 唇露(甜橙橘)', '美妝', '美妝', 380, 235, '★韓劇女主角必備，網路熱烈討論不間斷，WonderGirls、黃金時刻黃靜茵代言，一擦可愛度up↗★\n★唇露可用在嘴唇或臉頰，點幾滴後在輕輕推開，就算素顏也有好氣色★\n★可愛包裝，女孩們都無法抗拒~補妝看到心情也變好★\n\n微微暈染，可愛好氣色', 20, '2014-05-27 09:40:00', '2014-09-29 16:00:00', 1, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082', '上架'),
(300000018, '1217', '3CE 立體小臉驚奇修容粉餅', '美妝', '美妝', 890, 480, '?保證韓國原裝進口\n?限量優惠組合\n?韓國女星 人氣部落客 愛用品牌', 30, '2014-05-28 09:40:00', '2014-09-29 16:00:00', 30, 1, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000019, '1217', '1028瑪卡龍眼妝盒', '美妝', '美妝', 499, 330, '1028瑪卡龍眼妝盒\n\n★6色清新眼彩上的夢幻光澤低調甜美\n★質地柔滑顯色、妝感服貼持久\n★精緻的瑪卡龍鐵盒配上法式復古的手繪設計(可作小物收納)\n★貼心附上可愛的小圓鏡，讓上妝更便利', 25, '2014-05-29 09:40:00', '2014-09-29 16:00:00', 0, 0, 5, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000020, '1215', 'Aimez le style寬版和紙膠帶', '生活', '文具', 189, 120, '', 20, '2014-05-30 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000021, '1210', '1920大稻埕印花漾紙膠帶', '生活', '文具', 198, 120, '1920大稻埕印花漾紙膠帶\n感受1920閨秀的花漾年華\n復古布料印花紙膠帶，多種變化、時尚、美觀、好用、不殘膠！', 20, '2014-05-31 09:40:00', '2014-09-29 16:00:00', 0, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000022, '1210', '和紙膠帶(25mm)-Foufou Co', '生活', '文具', 120, 69, '台灣圖像創意品牌Foufou  與 台灣在地和紙膠帶品牌菊水KIKUSUI\n跨界合作開發和紙膠帶 全程台灣設計製造\n人氣好評第二彈，這次也有寬版的設計囉！', 20, '2014-06-01 09:40:00', '2014-09-29 16:00:00', 1, 0, 3, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306082', '上架'),
(300000023, '1210', '【里洋烘培坊】冰心波蘿泡芙 原味香草 (', '美食', '甜點', 240, 180, '【法式經典重現 冰涼透心 酥軟回味】泡芙於十六世紀傳入法國王室，法文P?te ? chaud，意即「熱的麵團」，也是指泡芙的麵糰，它烘烤出來的外形像花椰菜(chou)模樣，因此它的名稱再逐漸轉變成P?te ? Choux意指花椰菜狀的麵糰，由於泡芙似蛋糕鬆軟與綿密，製作費時且繁複，對法國廚師而言，泡芙是需要相當專業與經驗的甜點。\n\n品名：冰心波蘿泡芙Ice Cream Puff ???????\n淨重：45公克/個，12入\n主成分：鮮奶、動物性鮮奶油、植物性鮮奶油、低筋麵粉、卡士達粉、雞蛋\n保存方式：需冷藏(4℃以下) \n食用方式：直接食用\n保存期限：冷藏5天，冷凍1個月\n有效日期：標於包裝盒上\n出品企業：東東國際企業股份有限公司\n地址：台南市華平路156號3樓', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 1, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '102356002', '上架'),
(300000024, '1210', '《第二顆鈕釦》冰釀情人果乾+冰釀紅酒番茄', '美食', '零食', 630, 475, '成分：\n冰釀情人果乾　成份：芒果、冰糖\n冰釀紅酒番茄　成份：番茄、紅酒、冰糖、醋\n淨重：400g±5%/包，共2包\n保存期限：未開封冷凍(-18℃)一年\n賞味期限：標示於包裝上\n產地：台灣\n使用建議：解凍後略含碎冰食用最佳，未食用完請置於冷凍保存', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000025, '1210', '《東勢厝特產鄉土味》原味花生糖(460g', '美食', '零食', 930, 725, ' "雲林東勢厝特產"鄉土味花生糖(麥芽蔗糖釀製)\n手工新鮮現做獨特不黏牙 \n麥芽蔗糖釀製\n\n只採用台灣雲林東勢鄉出產優質花生為主源料\n\n年節送禮∣品茗佳點∣素食可用∣無防腐劑 \n土豆自產∣原地採收∣香脆可口∣不會甜膩\n\n規格:460g/瓶，5瓶裝(1箱)\n※免運※ \n\n保存期限:常溫45天！', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000026, '1210', '《品屋》蛋糕酥條4盒組', '美食', '零食', 680, 599, '◆蛋糕製作而成，香氣四溢\n◆口感酥脆、甜而不膩 \n◆送禮自用兩相宜', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000027, '1210', '嚴選愛文芒果(18顆/10台斤/箱)', '美食', '水果', 988, 799, '規格：18粒裝/盒\n重量：10台斤±5%(6公斤)\n內容物：愛文芒果\n產地：台南玉井\n', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000028, '1210', '《愛麗絲農莊》燕麥葡萄酥餅-大罐250g', '美食', '甜點', 299, 200, '愛麗絲手工餅乾特色:\n\n1.農莊自行生產以純手工製成\n2.不添加任何防腐劑.起雲劑\n3.採用天然食材加入大量堅果類原料營養健康\n4.口感佳.味道香.下午茶.點心的最佳良伴\n\n產品資訊:\n品名: 燕麥葡萄酥餅 250g/罐\n成分:麵粉/奶油/蔗糖/雞蛋/燕麥片/鹽/葡萄乾/米洒', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000029, '1210', '《唐拾壹》咖啡拉茶系列組合', '美食', '咖啡', 600, 525, '產品規格:\n商品名稱: <花園Garden Cafe>白咖啡--原味 5包入\n\n內容物成份: 細砂糖、脫脂奶粉、即溶咖啡\n\n內容量:30公克*5包/盒 \n\n低咖啡因、不苦不酸澀。直接感受香濃撲鼻的咖啡香氣，與天然的頂級脫脂奶粉完美結合，給您全新的味覺享受。', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000030, '1203', 'kimishop 韓版牛仔布圓?花盆帽森', '服飾', '女裝', 500, 299, '新品上架 現折100元!! 最新時尚流行單品', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000031, '1203', '嘉蒂斯長褲 韓版飄逸顯瘦鬆緊腰雪紡長褲裙', '服飾', '女裝', 798, 499, '', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000032, '1203', 'BONAMANA小柚日系T恤彩紅小馬荷葉', '服飾', '女裝', 520, 499, '日韓精緻版，數量有限要買要快.....', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000033, '1203', '糖罐子格紋點點雪紡襯衫', '服飾', '女裝', 650, 399, '利用配色感搭配格紋.點點更顯得俏麗亮眼\n內搭背心當外套穿搭穿出屬於自己風格的簡單時尚喔～', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000034, '1203', '糖罐子貓咪格紋反摺袖雪紡襯衫', '服飾', '女裝', 650, 350, '可愛的貓咪頭x知性格紋讓女孩們依喜好挑選最適合的魅力時尚\n搭小可愛x褲裝即可擁有帶點大人味的輕熟形象', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000035, '1203', '蕾絲花邊格紋純棉短褲*', '服飾', '女裝', 260, 199, '◆女孩必備的格紋短褲，與蕾絲花邊混搭出休閒甜美感', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000036, '1203', 'Miu-Star 好感棉質內裡安全褲波浪', '服飾', '女裝', 598, 199, '', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000037, '1203', 'Miu-Star 可愛女孩好搭配立體壓紋', '服飾', '女裝', 458, 250, '0204特殊立體壓紋質感設計 甜美好搭配', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000038, '1217', '糖罐子格紋星星素面縮口褲', '服飾', '女裝', 698, 398, '褲頭加入鬆緊帶包覆腰部不緊繃\n格紋星星素面花色展現多種穿搭風情\n褲管縮口可調整長短露出纖細腿長唷～', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000039, '1217', '蝴蝶結別針接雪紡點點棉衫', '服飾', '女裝', 499, 199, '蝴蝶結x點點甜美可愛並以雪紡下擺營造溫柔層次感\n穿搭色褲可呈現優雅的輕盈姿態彷彿腳步頓時輕快了起來唷', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000040, '1217', '皮標口袋設計短袖襯衫(八色)', '服飾', '男裝', 790, 488, '■我們堅持讓你的穿著走在時代的尖端，讓您成為時尚達人不落人後', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000041, '1217', 'hito亮面字母印花，小二潮物棉質短袖T', '服飾', '男裝', 590, 398, '■我們堅持讓你的穿著走在時代的尖端，讓您成為時尚達人不落人後', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000042, '1217', '熱潮百搭素面短褲', '服飾', '男裝', 299, 199, '夏日潮流嚴選百搭多色系素面百搭休閒短褲 -共13色-', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 1, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '102356002', '上架'),
(300000043, '1217', '牛仔丹寧條紋拼接木扣短袖男襯衫', '服飾', '男裝', 780, 350, '襯衫ManStyle潮流嚴選', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000044, '1220', '韓風百搭，配色口袋條紋短袖上衣(三色)', '服飾', '男裝', 500, 299, '', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 1, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '102356002', '上架'),
(300000045, '1220', '搶眼色系條紋拼接口袋短袖上衣(四色)', '服飾', '男裝', 500, 280, '', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000046, '1220', '顯瘦美腿圓頭絨面粗跟高跟鞋', '服飾', '鞋類', 1688, 600, '顏色:紅色"藍色"黑色\n 尺寸:35/36/37/38/39\n鞋版:正常版(腳板寬厚請自行加大）\n質料:磨紗絨面\n 跟高:約8.5cm \n商品組合:鞋盒', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000047, '1220', '緹花蕾絲防水台設計細跟鞋‧2色', '服飾', '鞋類', 599, 499, '顏色：米網．黑網\n尺碼：35．36．37．38．39．40', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000048, '1220', '蝴蝶結絨面平底娃娃鞋', '服飾', '鞋類', 499, 389, '質感絨面\nMIT好穿鞋\n古典蝴蝶結', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000049, '1216', '淡雅蝴蝶結平底娃娃鞋-3色', '服飾', '鞋類', 588, 299, '週週新品刊登\n22.5~25\nMIT製造', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 1, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306032', '上架'),
(300000050, '1216', 'SHISEIDO資生堂 嘉美艷容露150', '美妝', '保養', 199, 88, '調理化妝水 舒緩日曬 冰涼', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 1, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', '100306065', '上架'),
(300000051, '1216', 'Kiehl''s 契爾氏 特級保濕無油清爽', '美妝', '保養', 299, 150, '', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000052, '1216', '三洋14吋遙控式DC立扇/涼風扇/電扇', '生活', '電器', 4500, 1890, '■採用日本原裝進口馬達\n■無線遙控功能，涼夏真輕鬆\n■5段式風量循環設定\n■定時設計\n■台灣製造', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000053, '1216', '《思樂誼 SANOE》七彩隨行杯果汁機(', '生活', '電器', 2480, 1290, '我們承諾，超長3年保固，180天只換不修\n輕巧果汁機、隨行杯，輕便帶著走\nSGS綠環保，外觀手感漆', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架'),
(300000054, '1216', '全新六代pobling洗臉神器洗臉刷洗臉', '生活', '電器', 899, 285, '潔臉機其實就是幫助大家更深沉的清潔到毛孔', 0, '0000-00-00 00:00:00', '2014-09-29 16:00:00', 0, 0, 0, 'http://www.idlefox.idv.tw/Johogo_backstage/resource/champagne.jpg', NULL, '上架');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`c_account`) REFERENCES `company` (`c_account`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
