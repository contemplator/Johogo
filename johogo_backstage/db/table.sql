CREATE TABLE IF NOT EXISTS `Member` (
  `student_id` CHAR(10) NOT NULL,
  `m_name` CHAR(10) NOT NULL,
  `nickname` CHAR(10) NOT NULL,
  `password` CHAR(15) NOT NULL,
  `m_account` CHAR(15),
  `identity` CHAR(4) NOT NULL,
  `department` CHAR(10) NOT NULL,
  `gender` CHAR(2) NOT NULL,
  `birthday` timestamp NOT NULL,
  `verification` CHAR(20),
  `isverified` tinyint,
  `point` int DEFAULT '0',
  `role` int,
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `m_account` (`m_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Company` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` char(10) NOT NULL,
  `c_account` char(15) NOT NULL,
  `password` char(15) NOT NULL,
  `name_contact` char(10),
  `email` varchar(50) NOT NULL,
  `phone` char(12),
  `address` varchar(50),
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_account` (`c_account`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Product` (
  `p_id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `c_account` char(15) NOT NULL COMMENT 'foreign key',
  `p_name` char(20) NOT NULL,
  `category` char(4) NOT NULL,
  `o_price` int COMMENT 'original price)',
  `s_price` int COMMENT 'special offer',
  `description` text,
  `goal` int NOT NULL COMMENT 'arrive the number, the product will start sell',
  `u_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'the time on the shelf',
  `d_datetime` timestamp NOT NULL COMMENT 'the time off the shelf',
  `popular` int DEFAULT 0 COMMENT 'the number of people pay attention on the product',
  `isgroup` tinyint,
  PRIMARY KEY (`p_id`),
  FOREIGN KEY (`c_account` ) REFERENCES Company( c_account ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Discuz` (
  `d_id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `m_account` char(15) NOT NULL COMMENT 'foreign key',
  `d_title` char(20) NOT NULL,
  `category` char(4) NOT NULL,
  `click` int,
  `datetime` timestamp NOT NULL COMMENT 'the time online',
  `popular` int DEFAULT 0 COMMENT 'the number of people pay attention on the product',
  `good` int,
  PRIMARY KEY (`d_id`),
  FOREIGN KEY ( `m_account` ) REFERENCES Member( m_account ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Image` (
  `i_id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `p_id` int NOT NULL COMMENT 'foreign key',
  `url` char(20) NOT NULL,
  `name` char(4) NOT NULL,
  PRIMARY KEY (`i_id`),
  FOREIGN KEY ( `p_id` ) REFERENCES Product( p_id ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Buy` (
  `p_id` int NOT NULL COMMENT 'product id',
  `m_account` char(15) NOT NULL COMMENT 'account of member',
  `number` char(20) NOT NULL COMMENT 'the number of product member brought',
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (p_id, m_account),
  FOREIGN KEY ( `p_id` ) REFERENCES Product( p_id ) ON DELETE CASCADE ON UPDATE CASCADE ,
  FOREIGN KEY ( `m_account` ) REFERENCES member( m_account ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Comment` (
  `co_id` int NOT NULL COMMENT 'comment id',
  `m_account` char(15) NOT NULL COMMENT 'account of member',
  `p_id` int NOT NULL COMMENT 'product id',
  `datetime` timestamp NOT NULL,
  `content` text,
  `isgood` tinyint,
  PRIMARY KEY (co_id),
  FOREIGN KEY ( `p_id` ) REFERENCES Product( p_id ) ON DELETE CASCADE ON UPDATE CASCADE ,
  FOREIGN KEY ( `m_account` ) REFERENCES member( m_account ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Browser` (
  `p_id` int NOT NULL COMMENT 'product id',
  `m_account` char(15) NOT NULL COMMENT 'account of member',
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (p_id, m_account),
  FOREIGN KEY ( `p_id` ) REFERENCES Product( p_id ) ON DELETE CASCADE ON UPDATE CASCADE ,
  FOREIGN KEY ( `m_account` ) REFERENCES member( m_account ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `C_Response` (
  `co_id` int NOT NULL COMMENT 'comment id',
  `c_id` int NOT NULL COMMENT 'account of Company',
  `content` text NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (co_id, c_id),
  FOREIGN KEY ( `co_id` ) REFERENCES Comment( co_id ) ON DELETE CASCADE ON UPDATE CASCADE ,
  FOREIGN KEY ( `c_id` ) REFERENCES Company( c_id ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `D_Response` (
  `d_id` int NOT NULL COMMENT 'comment id',
  `m_account` char(15) NOT NULL COMMENT 'account of Company',
  `content` text NOT NULL,
  `datetime` timestamp NOT NULL,
  PRIMARY KEY (d_id, m_account),
  FOREIGN KEY ( `d_id` ) REFERENCES Discuz( d_id ) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY ( `m_account` ) REFERENCES Discuz( m_account ) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


