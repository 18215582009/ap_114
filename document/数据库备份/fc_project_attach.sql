-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.24


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema fc114
--

CREATE DATABASE IF NOT EXISTS fc114;
USE fc114;

--
-- Definition of table `home_layout_attach`
--

DROP TABLE IF EXISTS `home_layout_attach`;
CREATE TABLE `home_layout_attach` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '附件id',
  `name` varchar(255) NOT NULL COMMENT '附件名称(用于显示)',
  `url` varchar(255) NOT NULL COMMENT '资源路径(服务器上相对路径)',
  `type` varchar(10) NOT NULL COMMENT '存文件扩展名',
  `size` int(10) DEFAULT NULL COMMENT '附件大小',
  `checksum` varchar(128) DEFAULT NULL COMMENT 'MD5验证码',
  `download` int(10) DEFAULT '0' COMMENT '下载次数',
  `update_at` int(11) NOT NULL COMMENT '上传时间',
  PRIMARY KEY (`id`),
  KEY `update_at` (`update_at`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='附件';

--
-- Dumping data for table `home_layout_attach`
--

/*!40000 ALTER TABLE `home_layout_attach` DISABLE KEYS */;
INSERT INTO `home_layout_attach` (`id`,`name`,`url`,`type`,`size`,`checksum`,`download`,`update_at`) VALUES 
 (1,'843190_163217076669_2.jpg','/uploads/201347/VTP2S1GQ7ESOGU0QJKFP9BD8E7_1385263444327.jpg','jpg',88253,'',0,1385263444),
 (4,'0745_110502_SqH2vRF7.jpg','/uploads/201347/VTP2S1GQ7ESOGU0QJKFP9BD8E7_1385266176853.jpg','jpg',75981,'',0,1385266176),
 (5,'W0QQnZo.jpg','/uploads/201347/VTP2S1GQ7ESOGU0QJKFP9BD8E7_1385289878390.jpg','jpg',91339,'',0,1385289878),
 (6,'W0QQnZo1.jpg','/uploads/201347/VTP2S1GQ7ESOGU0QJKFP9BD8E7_1385289900939.jpg','jpg',61451,'',0,1385289900),
 (7,'2223075_091438043_2.jpg','/uploads/201348/SEOGLQH488UVVD6USVRGK1J1Q1_1385781042966.jpg','jpg',171631,'',0,1385781042),
 (8,'4820887_105027332390_2.jpg','/uploads/201348/SEOGLQH488UVVD6USVRGK1J1Q1_1385782174405.jpg','jpg',204159,'',0,1385782174),
 (9,'6957036_163526257371_2.jpg','/uploads/201348/SEOGLQH488UVVD6USVRGK1J1Q1_1385783256152.jpg','jpg',109316,'',0,1385783256),
 (10,'190x128.jpg','/uploads/201350/2U5KPAV3GQ1D671DTF7BLTS517_1386742903284.jpg','jpg',20029,'',0,1386742903),
 (16,'49.jpg','/uploads/201350/2U5KPAV3GQ1D671DTF7BLTS517_1386745819964.jpg','jpg',85626,'',0,1386745819),
 (31,'49.jpg','/uploads/201350/580SV6B7L52RC0IHDS8UITIDE3_1386902928750.jpg','jpg',85626,'',0,1386902928);
/*!40000 ALTER TABLE `home_layout_attach` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
