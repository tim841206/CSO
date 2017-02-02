-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2017 年 02 月 02 日 05:07
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `CSO`
--

-- --------------------------------------------------------

--
-- 資料表結構 `CSO_setup`
--

CREATE TABLE `CSO_setup` (
  `TYPENO` varchar(2) COLLATE utf8_bin NOT NULL,
  `DESCRIPTS` varchar(50) COLLATE utf8_bin NOT NULL,
  `VALUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客與銷售訂單系統設定檔';

--
-- 資料表的匯出資料 `CSO_setup`
--

INSERT INTO `CSO_setup` (`TYPENO`, `DESCRIPTS`, `VALUE`) VALUES
('OG', '下一筆正常訂單編號', 100036),
('OS', '下一筆特殊訂單編號', 900002),
('PG', '下一筆正常訂單揀貨單編號', 1000001),
('PS', '下一筆特殊訂單揀貨單編號', 9000001),
('IG', '下一筆正常發票編號', 10000001),
('IS', '下一筆特殊發票編號', 90000001);

-- --------------------------------------------------------

--
-- 資料表結構 `CUSADD`
--

CREATE TABLE `CUSADD` (
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADD_1` varchar(50) COLLATE utf8_bin NOT NULL,
  `ADD_2` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ADD_3` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CITY` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `COUNTY` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `COUNTRY` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ZCODE` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `CNTPER` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `TEL` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `FAX` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客地址主檔';

--
-- 資料表的匯出資料 `CUSADD`
--

INSERT INTO `CUSADD` (`CUSNO`, `ADDNO`, `ADD_1`, `ADD_2`, `ADD_3`, `CITY`, `COUNTY`, `COUNTRY`, `ZCODE`, `CNTPER`, `TEL`, `FAX`, `EMAIL`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('100001', '1', '9112 E. Arapaho Road Suite 1001', '', '', 'Richardson', 'TX', 'US', '75081', 'Sarah Miller', '(214) 479-6666', '(214) 479-1422', 'Exch@aol.com', '2017-01-31 21:34:23', '2017-02-01 03:01:33', 1),
('100001', '2', '125 Coit Street Suite 210', '', '', 'Richardson', 'TX', 'US', '75081', 'Nancy Woods', '(214) 479-2345', '(214) 479-2211', 'Exch@aol.com', '2017-01-31 23:36:02', '2017-02-01 03:01:24', 1),
('200001', '1', '4268 Campbell Road Suite 3401', '', '', 'Dallas', 'TX', 'US', '75007', 'Meggy Kelly', '(972) 236-7128', '(972) 236-7142', 'ACA@aol.com', '2017-01-31 23:37:03', '2017-01-31 23:37:03', 1),
('200001', '2', '2214 Parker Road Suite 2200', '', '', 'Plano', 'TX', 'US', '75057', 'Robert Young', '(972) 234-2345', '(972) 234-2366', 'ACA@aol.com', '2017-01-31 23:37:43', '2017-01-31 23:37:43', 1),
('300001', '1', '4268 Floyd Road Suite 901', '', '', 'Dallas', 'TX', 'US', '75041', 'Ethen Pan', '(972) 428-6523', '(972) 428-6511', 'Microage@aol.com', '2017-01-31 23:38:18', '2017-01-31 23:38:18', 1),
('300001', '2', '233 Parker Road Suite 110', '', '', 'Plano', 'TX', 'US', '75057', 'Steve Mode', '(972) 221-0011', '(972) 221-0087', 'Microage@aol.com', '2017-01-31 23:38:55', '2017-01-31 23:38:55', 1),
('300001', '3', '109 W. Perters Colony Road Suite 1178', '', '', 'Plano', 'TX', 'US', '75057', 'Paul Young', '(972) 347-1320', '(972) 347-2100', 'Microage@aol.com', '2017-01-31 23:39:32', '2017-01-31 23:39:32', 1),
('300002', '1', '670 Water Front Street Suite 2119', '', '', 'Carrollton', 'TX', 'US', '75007', 'Lisa Howard', '(972) 267-1327', '(972) 267-1448', 'Great_Angle@aol.com', '2017-01-31 23:40:15', '2017-01-31 23:40:15', 1),
('400001', '1', '忠孝東路三段210號2樓之4', '', '', '中山區', '台北市', '臺灣', '104', '李文利', '(02) 2336-1247', '(02) 2336-4211', 'Creative@SeedNet.com.tw', '2017-01-31 23:40:57', '2017-01-31 23:40:57', 1),
('400001', '2', '和平東路二段166號', '', '', '大安區', '台北市', '臺灣', '106', '吳鳳英', '(02) 2221-9975', '(02) 2221-4234', 'Wu@Creative.SeedNet.com.tw', '2017-01-31 23:41:39', '2017-01-31 23:41:39', 1),
('400001', '3', '中山北路一段257號', '', '', '大安區', '台北市', '臺灣', '106', '林經偉', '(02) 2346-7975', '(02) 2346-4577', 'Lching@creative.com.tw', '2017-01-31 23:42:17', '2017-01-31 23:42:17', 1),
('400002', '1', '羅斯福路三段40號7樓之8', '', '', '中山區', '台北市', '臺灣', '104', '吳昭和', '(02) 2366-7244', '(02) 2366-7422', 'Wu@ThunderBird.com.tw', '2017-01-31 23:42:59', '2017-01-31 23:42:59', 1),
('400002', '2', '仁愛路三段200號', '', '', '大安區', '台北市', '臺灣', '106', '王德域', '(02) 2346-8888', '(02) 2346-7801', 'Wang@ThunderBird.com.tw', '2017-01-31 23:44:02', '2017-01-31 23:44:02', 1),
('500001', '1', '新生南路二段320號6樓之3', '', '', '大安區', '台北市', '臺灣', '106', '陳逸麟', '(02) 2369-7722', '(02) 2369-5126', 'Chen@universal.com.tw', '2017-01-31 23:45:05', '2017-01-31 23:45:05', 1),
('500001', '2', '信義路三段68號', '', '', '松山區', '台北市', '臺灣', '105', '林經洋', '(02) 2344-5544', '(02) 2344-4777', 'Lin@universal.com.tw', '2017-01-31 23:45:42', '2017-01-31 23:45:42', 1),
('500001', '3', '文心路二段7號', '', '', '板橋區', '新北市', '臺灣', '234', '高郁凱', '(02) 2765-5678', '(02) 2765-9236', 'Goa@universal.com.tw', '2017-01-31 23:46:12', '2017-01-31 23:46:12', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `CUSADDCITY`
--

CREATE TABLE `CUSADDCITY` (
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CITYNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客運送地址城市關係主檔';

--
-- 資料表的匯出資料 `CUSADDCITY`
--

INSERT INTO `CUSADDCITY` (`CUSNO`, `ADDNO`, `CITYNO`, `CUSNM`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('100001', '1', 'RICHARDSON', 'Excellent Choice Corporation', '2017-02-01 01:03:08', '2017-02-01 03:04:43', 1),
('100001', '2', 'RICHARDSON', 'Excellent Choice Corporation', '2017-02-01 01:03:20', '2017-02-01 03:04:28', 1),
('200001', '1', 'DALLAS', 'ACA Technology Inc.', '2017-02-01 01:03:32', '2017-02-01 01:03:32', 1),
('200001', '2', 'PLANO', 'ACA Technology Inc.', '2017-02-01 01:03:39', '2017-02-01 01:03:39', 1),
('300001', '1', 'DALLAS', 'Microage Inc.', '2017-02-01 01:03:54', '2017-02-01 01:03:54', 1),
('300001', '2', 'PLANO', 'Microage Inc.', '2017-02-01 01:04:05', '2017-02-01 01:04:05', 1),
('300001', '3', 'PLANO', 'Microage Inc.', '2017-02-01 01:04:13', '2017-02-01 01:04:13', 1),
('300002', '1', 'CARROLLTON', 'Great Angle Technology, Inc.', '2017-02-02 12:07:06', '2017-02-02 12:07:06', 1),
('400001', '1', 'TAIPEI-N', '創意電腦科技股份有限公司', '2017-02-01 01:04:29', '2017-02-01 01:04:29', 1),
('400001', '2', 'TAIPEI-S', '創意電腦科技股份有限公司', '2017-02-01 01:04:35', '2017-02-01 01:04:35', 1),
('400001', '3', 'TAIPEI-N', '創意電腦科技股份有限公司', '2017-02-01 01:04:42', '2017-02-01 01:04:42', 1),
('400002', '1', 'TAIPEI-S', '雷鳥科技股份有限公司', '2017-02-01 01:04:54', '2017-02-01 01:04:54', 1),
('400002', '2', 'TAIPEI-N', '雷鳥科技股份有限公司', '2017-02-01 01:05:02', '2017-02-01 01:05:02', 1),
('500001', '1', 'TAIPEI-S', '環宇國際科技股份有限公司', '2017-02-01 01:05:15', '2017-02-01 01:05:15', 1),
('500001', '2', 'TAIPEI-N', '環宇國際科技股份有限公司', '2017-02-01 01:05:21', '2017-02-01 01:05:21', 1),
('500001', '3', 'TAIPEI-C', '環宇國際科技股份有限公司', '2017-02-01 01:05:28', '2017-02-01 01:05:28', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `CUSCITY`
--

CREATE TABLE `CUSCITY` (
  `CITYNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CITYNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `REGIONNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客城市主檔';

--
-- 資料表的匯出資料 `CUSCITY`
--

INSERT INTO `CUSCITY` (`CITYNO`, `CITYNM`, `REGIONNO`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('CARROLLTON', 'Carrollton, Texas', 'USD002', '2017-01-31 19:49:39', '2017-01-31 19:49:39', 1),
('DALLAS', 'Dallas, Texas', 'USD001', '2017-01-31 19:47:41', '2017-02-01 03:03:45', 1),
('PLANO', 'Plano, Texas', 'USD002', '2017-01-31 19:49:26', '2017-02-01 03:03:36', 1),
('RICHARDSON', 'Richardson, Texas', 'USD001', '2017-01-31 19:49:01', '2017-01-31 19:49:01', 1),
('TAIPEI-C', '台北縣', 'TPE02', '2017-01-31 19:50:32', '2017-01-31 19:50:32', 1),
('TAIPEI-N', '台北市北區', 'TPE01', '2017-01-31 19:50:17', '2017-01-31 19:50:17', 1),
('TAIPEI-S', '台北市南區', 'TPE01', '2017-01-31 19:50:05', '2017-01-31 19:50:05', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `CUSMAS`
--

CREATE TABLE `CUSMAS` (
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `ADDNO_1` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO_2` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `ADDNO_3` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `CITY` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `COUNTY` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `COUNTRY` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ZCODE` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `CNTPER` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `TEL` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `FAX` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `WSITE` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `SALPERNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DFSHIPNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DFBILLNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `SALEAMTYTD` double NOT NULL,
  `SALEAMTSTD` double NOT NULL,
  `SALEAMTMTD` double NOT NULL,
  `CURAR` double NOT NULL,
  `AR30_60` double NOT NULL,
  `AR60_90` double NOT NULL,
  `AR90_120` double NOT NULL,
  `M120AR` double NOT NULL,
  `SPEINS` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CREDITSTAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `TAXID` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客資料主檔';

--
-- 資料表的匯出資料 `CUSMAS`
--

INSERT INTO `CUSMAS` (`CUSNO`, `CUSNM`, `ADDNO_1`, `ADDNO_2`, `ADDNO_3`, `CITY`, `COUNTY`, `COUNTRY`, `ZCODE`, `CNTPER`, `TEL`, `FAX`, `EMAIL`, `WSITE`, `SALPERNO`, `DFSHIPNO`, `DFBILLNO`, `SALEAMTYTD`, `SALEAMTSTD`, `SALEAMTMTD`, `CURAR`, `AR30_60`, `AR60_90`, `AR90_120`, `M120AR`, `SPEINS`, `CREDITSTAT`, `TAXID`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('100001', 'Excellent Choice Corporation', '1', '2', '3', 'Richardson', 'TX', 'US', '75081', 'Sarah Miller', '(214) 479-6666', '(214) 479-1422', 'Exch@aol.com', 'http://Excell_Choice.com', '1', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, 'Inform Customer after shipping orders.', 'C', '', '2017-01-31 21:26:38', '2017-02-01 02:59:53', 1),
('200001', 'ACA Technology Inc.', '1', '2', '3', 'Dallas', 'TX', 'US', '75007', 'Meggy Kelly', '(972) 236-7128', '(972) 236-7142', 'ACA@aol.com', 'http://ACA_tech.com', '2', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, 'Inform Customer Shortage and Delay.', 'C', '', '2017-01-31 21:28:07', '2017-02-01 03:00:28', 1),
('300001', 'Microage Inc.', '1', '2', '3', 'Dallas', 'TX', 'US', '75041', 'Ethen Pan', '(972) 428-6523', '(972) 428-6511', 'Microage@aol.com', 'http://microage.com', '3', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, 'Customer needs new item information.', 'B', '', '2017-01-31 21:29:17', '2017-01-31 21:29:17', 1),
('300002', 'Great Angle Technology, Inc.', '1', '2', '3', 'Carrollton', 'TX', 'US', '75007', 'Lisa Howard', '(972) 267-1327', '(972) 267-1448', 'Great_Angle@aol.com', 'http://Great_Angle.com', '3', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, 'Pay within 1 week after the order shipped.', 'A', '', '2017-01-31 21:30:11', '2017-01-31 21:30:11', 1),
('400001', '創意電腦科技股份有限公司', '1', '2', '3', '中山區', '台北市', '臺灣', '104', '李文利', '(02) 2336-1247', '(02) 2336-4211', 'Creative@SeedNet.com.tw', 'http://creative.com.tw', '4', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, '請與顧客多接觸並介紹新產品', 'B', '', '2017-01-31 21:31:34', '2017-01-31 21:31:34', 1),
('400002', '雷鳥科技股份有限公司', '1', '2', '3', '中山區', '台北市', '臺灣', '104', '吳昭和', '(02) 2366-7244', '(02) 2366-7422', 'Wu@ThunderBird.com.tw', 'http://ThunderBird.com.tw', '4', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, '30天內交貨', 'A', '', '2017-01-31 21:32:26', '2017-01-31 21:32:26', 1),
('500001', '環宇國際科技股份有限公司', '1', '2', '3', '大安區', '台北市', '臺灣', '106', '陳逸麟', '(02) 2369-7722', '(02) 2369-5126', 'Chen@universal.com.tw', 'http://Universal Tech.com.tw', '5', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, '訂貨後三十天內送貨與付款', 'A', '', '2017-01-31 21:33:27', '2017-01-31 21:33:27', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `CUSREGION`
--

CREATE TABLE `CUSREGION` (
  `REGIONNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CHANNELNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CHANNELNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `COMPANYNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `COMPANYNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `DISTRICTNO` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `DESCRIPTION` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客地區主檔';

--
-- 資料表的匯出資料 `CUSREGION`
--

INSERT INTO `CUSREGION` (`REGIONNO`, `CHANNELNO`, `CHANNELNM`, `COMPANYNO`, `COMPANYNM`, `DISTRICTNO`, `DESCRIPTION`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('TPE01', 'S001', 'Store', 'C002', 'TW', 'TW01', 'Taiwan Taipei City District 1 Store', '2017-01-31 19:46:12', '2017-01-31 19:46:12', 1),
('TPE02', 'S001', 'Store', 'C002', 'TW', 'TW02', 'Taiwan Taipei County District 1 Store', '2017-01-31 19:46:46', '2017-01-31 19:46:46', 1),
('USD001', 'S001', 'Store', 'C001', 'US', 'US01', 'US District 1 Store', '2017-01-31 19:44:37', '2017-02-01 03:02:53', 1),
('USD002', 'S001', 'Store', 'C001', 'US', 'US02', 'US District 2 Store', '2017-01-31 19:45:25', '2017-02-01 03:02:58', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `INVOICE`
--

CREATE TABLE `INVOICE` (
  `INVOICENO` varchar(15) COLLATE utf8_bin NOT NULL,
  `PCKLSTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ORDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DATE_TRAN` date NOT NULL,
  `UNI_COST` double NOT NULL,
  `ITEMCLASS` varchar(2) COLLATE utf8_bin NOT NULL,
  `QTYTRAN` int(11) NOT NULL,
  `BASE_PRICE` double NOT NULL,
  `PRICE_CNT` double NOT NULL,
  `PERCENTDIS` double NOT NULL,
  `PRICE_SELL` double NOT NULL,
  `NET_SALES` double NOT NULL,
  `TAX_CODE` varchar(1) COLLATE utf8_bin NOT NULL,
  `DATE_REQ` date NOT NULL,
  `SHIP_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `BILL_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `REV_CODE` varchar(1) COLLATE utf8_bin NOT NULL,
  `DATE_L_MNT` date NOT NULL,
  `PRINTAG` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售訂單發票交易檔';

-- --------------------------------------------------------

--
-- 資料表結構 `ORDMAS`
--

CREATE TABLE `ORDMAS` (
  `ORDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ORDTYPE` varchar(1) COLLATE utf8_bin NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUS_PO_NO` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `SHIP_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `BILL_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `BACKCODE` varchar(1) COLLATE utf8_bin NOT NULL,
  `INVOICENO` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `SALPERNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `TO_ORD_AMT` double NOT NULL,
  `TO_SHP_AMT` double NOT NULL,
  `SALEAMTYTD` double NOT NULL,
  `SALEAMTSTD` double NOT NULL,
  `SALEAMTMTD` double NOT NULL,
  `ORD_INST` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DATEORDORG` date DEFAULT NULL,
  `ORDCOMPER` double NOT NULL,
  `ORD_STAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `DATE_REQ` date NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客訂單主檔';

--
-- 資料表的匯出資料 `ORDMAS`
--

INSERT INTO `ORDMAS` (`ORDNO`, `ORDTYPE`, `CUSNO`, `CUS_PO_NO`, `SHIP_ADD_NO`, `BILL_ADD_NO`, `BACKCODE`, `INVOICENO`, `SALPERNO`, `TO_ORD_AMT`, `TO_SHP_AMT`, `SALEAMTYTD`, `SALEAMTSTD`, `SALEAMTMTD`, `ORD_INST`, `DATEORDORG`, `ORDCOMPER`, `ORD_STAT`, `DATE_REQ`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('100001', 'G', '100001', '57890076', '1', '1', '0', '0', '1', 0, 0, 0, 0, 0, 'No delay.', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:40:00', '2017-02-02 11:06:51', 1),
('100002', 'G', '100001', '57890120', '2', '2', '0', '0', '1', 0, 0, 0, 0, 0, 'No delay.', NULL, 0, 'E', '2016-12-06', '2017-02-02 10:40:20', '2017-02-02 10:40:20', 1),
('100003', 'G', '200001', '67032', '1', '1', '0', '0', '2', 0, 0, 0, 0, 0, 'Use UPS.', NULL, 0, 'E', '2016-12-07', '2017-02-02 10:40:57', '2017-02-02 10:40:57', 1),
('100004', 'G', '200001', '67125', '2', '2', '0', '0', '2', 0, 0, 0, 0, 0, 'Use UPS.', NULL, 0, 'E', '2016-12-08', '2017-02-02 10:41:18', '2017-02-02 10:41:18', 1),
('100005', 'G', '300001', 'R1126008', '1', '1', '0', '0', '3', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-09', '2017-02-02 10:41:46', '2017-02-02 10:41:46', 1),
('100006', 'G', '300001', 'R1208003', '1', '1', '0', '0', '3', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-09', '2017-02-02 10:42:18', '2017-02-02 10:42:18', 1),
('100007', 'G', '300001', 'R1209001', '2', '1', '0', '0', '3', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-09', '2017-02-02 10:42:42', '2017-02-02 10:42:42', 1),
('100008', 'G', '300001', 'R6607789', '3', '1', '0', '0', '3', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-09', '2017-02-02 10:43:05', '2017-02-02 10:43:05', 1),
('100009', 'G', '300002', 'P6708668', '1', '1', '0', '0', '3', 0, 0, 0, 0, 0, 'Use DHL.', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:43:34', '2017-02-02 10:43:34', 1),
('100010', 'G', '300002', 'P6709021', '1', '1', '0', '0', '3', 0, 0, 0, 0, 0, 'Use DHL.', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:44:16', '2017-02-02 10:44:16', 1),
('100011', 'G', '400001', 'L1699003', '2', '2', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:44:49', '2017-02-02 10:44:49', 1),
('100012', 'G', '400001', 'L1699006', '3', '2', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-06', '2017-02-02 10:45:07', '2017-02-02 10:45:07', 1),
('100013', 'G', '400001', 'L1699008', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-07', '2017-02-02 10:45:25', '2017-02-02 10:45:25', 1),
('100014', 'G', '400001', 'L1699235', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-08', '2017-02-02 10:45:45', '2017-02-02 10:45:45', 1),
('100015', 'G', '400002', 'VGA00236', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:46:09', '2017-02-02 10:46:09', 1),
('100016', 'G', '400002', 'VGA00244', '2', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:46:34', '2017-02-02 10:46:34', 1),
('100017', 'G', '500001', 'K009877', '2', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-06', '2017-02-02 10:47:05', '2017-02-02 10:47:05', 1),
('100018', 'G', '500001', 'K009878', '3', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-06', '2017-02-02 10:47:28', '2017-02-02 10:47:28', 1),
('100019', 'G', '500001', 'K009879', '1', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-06', '2017-02-02 10:47:45', '2017-02-02 10:47:45', 1),
('100020', 'G', '400001', 'L1699235', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-12', '2017-02-02 10:48:19', '2017-02-02 10:48:19', 1),
('100021', 'G', '400001', 'L1699238', '2', '2', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-12', '2017-02-02 10:48:39', '2017-02-02 10:48:39', 1),
('100022', 'G', '400001', 'L1699240', '2', '2', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-12', '2017-02-02 10:48:58', '2017-02-02 10:48:58', 1),
('100023', 'G', '400001', 'L1699244', '3', '2', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-12', '2017-02-02 10:49:16', '2017-02-02 10:49:16', 1),
('100024', 'G', '400002', 'VGA00236', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-13', '2017-02-02 10:49:36', '2017-02-02 11:12:24', 1),
('100025', 'G', '400002', 'LCD00244', '2', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-14', '2017-02-02 10:49:56', '2017-02-02 11:12:32', 1),
('100026', 'G', '400002', 'VGA00455', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-15', '2017-02-02 10:50:14', '2017-02-02 10:50:14', 1),
('100027', 'G', '400002', 'LCD00467', '2', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-16', '2017-02-02 10:50:34', '2017-02-02 10:50:34', 1),
('100028', 'G', '400002', 'VGA00632', '1', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-19', '2017-02-02 10:50:52', '2017-02-02 10:50:52', 1),
('100029', 'G', '400002', 'VGA00676', '2', '1', '0', '0', '4', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-19', '2017-02-02 10:51:12', '2017-02-02 10:51:12', 1),
('100030', 'G', '500001', 'K009877', '2', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-20', '2017-02-02 10:51:33', '2017-02-02 10:51:33', 1),
('100031', 'G', '500001', 'K009878', '3', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-20', '2017-02-02 10:52:00', '2017-02-02 10:52:00', 1),
('100032', 'G', '500001', 'K009879', '1', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-20', '2017-02-02 10:52:22', '2017-02-02 10:52:22', 1),
('100033', 'G', '500001', 'K0100782', '1', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-20', '2017-02-02 10:52:41', '2017-02-02 10:52:41', 1),
('100034', 'G', '500001', 'L1699238', '2', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-21', '2017-02-02 10:53:00', '2017-02-02 10:53:00', 1),
('100035', 'G', '500001', 'L1699244', '3', '1', '0', '0', '5', 0, 0, 0, 0, 0, '', NULL, 0, 'E', '2016-12-21', '2017-02-02 10:53:17', '2017-02-02 11:07:16', 1),
('900001', 'S', '100001', 'S9999110', '1', '1', '0', '0', '1', 0, 0, 0, 0, 0, 'Use UPS.', NULL, 0, 'E', '2016-12-05', '2017-02-02 10:53:52', '2017-02-02 10:53:52', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `ORDMAT`
--

CREATE TABLE `ORDMAT` (
  `ORDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `WHOUSE` varchar(5) COLLATE utf8_bin NOT NULL,
  `UNI_COST` double NOT NULL,
  `ITEMCLASS` varchar(2) COLLATE utf8_bin NOT NULL,
  `QTYORD` int(11) NOT NULL,
  `QTYSHIP` int(11) NOT NULL,
  `QTYBAKORD` int(11) NOT NULL,
  `BASE_PRICE` double NOT NULL,
  `PRICE_CNT` double DEFAULT NULL,
  `PERCENTDIS` double DEFAULT NULL,
  `PRICE_SELL` double NOT NULL,
  `NET_SALES` double NOT NULL,
  `TAX_CODE` varchar(1) COLLATE utf8_bin NOT NULL,
  `DATEORDORG` date DEFAULT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售訂單物料檔';

-- --------------------------------------------------------

--
-- 資料表結構 `PCKLST`
--

CREATE TABLE `PCKLST` (
  `PCKLSTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ORDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DATE_REQ` date NOT NULL,
  `QTYSHIPREQ` int(11) NOT NULL,
  `DATEPRTORG` date NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `PRINTAG` tinyint(4) NOT NULL,
  `DATE_SHIP` date DEFAULT NULL,
  `SHIP_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `WHOUSE` varchar(5) COLLATE utf8_bin NOT NULL,
  `LOCNO` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `SALPERNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='揀貨單交易檔';

-- --------------------------------------------------------

--
-- 資料表結構 `SLSMAS`
--

CREATE TABLE `SLSMAS` (
  `SALPERNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `SALPERNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `EMPNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `COMRATE` double NOT NULL,
  `SALEAMTYTD` double NOT NULL,
  `SALEAMTSTD` double NOT NULL,
  `SALEAMTMTD` double NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售員資料主檔';

--
-- 資料表的匯出資料 `SLSMAS`
--

INSERT INTO `SLSMAS` (`SALPERNO`, `SALPERNM`, `EMPNO`, `COMRATE`, `SALEAMTYTD`, `SALEAMTSTD`, `SALEAMTMTD`, `CREATEDATE`, `UPDATEDATE`, `ACTCODE`) VALUES
('1', 'Trip, Linda', '900001', 5, 0, 0, 0, '2017-01-31 19:41:58', '2017-02-01 02:54:33', 1),
('2', 'Gate, Robert', '900002', 3, 0, 0, 0, '2017-01-31 19:42:16', '2017-02-01 02:55:25', 1),
('3', 'Jobs, Steve', '900003', 1, 0, 0, 0, '2017-01-31 19:42:32', '2017-01-31 19:42:32', 1),
('4', 'Chen, Davis', '900004', 1, 0, 0, 0, '2017-01-31 19:43:02', '2017-01-31 19:43:02', 1),
('5', 'Wang, Tim', '900005', 1, 0, 0, 0, '2017-01-31 19:43:23', '2017-01-31 19:43:23', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `CUSADD`
--
ALTER TABLE `CUSADD`
  ADD PRIMARY KEY (`CUSNO`,`ADDNO`);

--
-- 資料表索引 `CUSADDCITY`
--
ALTER TABLE `CUSADDCITY`
  ADD PRIMARY KEY (`CUSNO`,`ADDNO`,`CITYNO`);

--
-- 資料表索引 `CUSCITY`
--
ALTER TABLE `CUSCITY`
  ADD PRIMARY KEY (`CITYNO`);

--
-- 資料表索引 `CUSMAS`
--
ALTER TABLE `CUSMAS`
  ADD PRIMARY KEY (`CUSNO`);

--
-- 資料表索引 `CUSREGION`
--
ALTER TABLE `CUSREGION`
  ADD PRIMARY KEY (`REGIONNO`);

--
-- 資料表索引 `INVOICE`
--
ALTER TABLE `INVOICE`
  ADD PRIMARY KEY (`INVOICENO`,`PCKLSTNO`,`ITEMNO`);

--
-- 資料表索引 `ORDMAS`
--
ALTER TABLE `ORDMAS`
  ADD PRIMARY KEY (`ORDNO`);

--
-- 資料表索引 `ORDMAT`
--
ALTER TABLE `ORDMAT`
  ADD PRIMARY KEY (`ORDNO`,`ITEMNO`);

--
-- 資料表索引 `PCKLST`
--
ALTER TABLE `PCKLST`
  ADD PRIMARY KEY (`PCKLSTNO`,`ITEMNO`);

--
-- 資料表索引 `SLSMAS`
--
ALTER TABLE `SLSMAS`
  ADD PRIMARY KEY (`SALPERNO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
