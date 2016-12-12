-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 10 月 26 日 05:41
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `C&SO`
--

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

-- --------------------------------------------------------

--
-- 資料表結構 `CUSADDRESS`
--

CREATE TABLE `CUSADD` (
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADD_1` varchar(50) COLLATE utf8_bin NOT NULL,
  `ADD_2` varchar(50) COLLATE utf8_bin NOT NULL,
  `ADD_3` varchar(50) COLLATE utf8_bin NOT NULL,
  `CITY` varchar(50) COLLATE utf8_bin NOT NULL,
  `COUNTY` varchar(50) COLLATE utf8_bin NOT NULL,
  `COUNTRY` varchar(50) COLLATE utf8_bin NOT NULL,
  `ZCODE` varchar(15) COLLATE utf8_bin NOT NULL,
  `CNTPER` varchar(50) COLLATE utf8_bin NOT NULL,
  `TEL` varchar(15) COLLATE utf8_bin NOT NULL,
  `FAX` varchar(15) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客地址主檔';

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

-- --------------------------------------------------------

--
-- 資料表結構 `CUSMAS`
--

CREATE TABLE `CUSMAS` (
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNM` varchar(50) COLLATE utf8_bin NOT NULL,
  `ADDNO_1` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO_2` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO_3` varchar(15) COLLATE utf8_bin NOT NULL,
  `CITY` varchar(50) COLLATE utf8_bin NOT NULL,
  `COUNTY` varchar(50) COLLATE utf8_bin NOT NULL,
  `COUNTRY` varchar(50) COLLATE utf8_bin NOT NULL,
  `ZCODE` varchar(15) COLLATE utf8_bin NOT NULL,
  `CNTPER` varchar(50) COLLATE utf8_bin NOT NULL,
  `TEL` varchar(15) COLLATE utf8_bin NOT NULL,
  `FAX` varchar(15) COLLATE utf8_bin NOT NULL,
  `EMAIL` varchar(50) COLLATE utf8_bin NOT NULL,
  `WSITE` varchar(50) COLLATE utf8_bin NOT NULL,
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
  `SPEINS` varchar(50) COLLATE utf8_bin NOT NULL,
  `CREDITSTAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `TAXID` varchar(15) COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客資料主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `CUSORD`
--

CREATE TABLE `CUSORD` (
  `ORDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ORDTYPE` varchar(1) COLLATE utf8_bin NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUS_PO_NO` varchar(50) COLLATE utf8_bin NOT NULL,
  `SHIP_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `BILL_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `BACKCODE` varchar(1) COLLATE utf8_bin NOT NULL,
  `INVOICENO` varchar(15) COLLATE utf8_bin NOT NULL,
  `SALPERNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `TO_ORD_AMT` double NOT NULL,
  `TO_SHP_AMT` double NOT NULL,
  `SALEAMTYTD` double NOT NULL,
  `SALEAMTSTD` double NOT NULL,
  `SALEAMTMTD` double NOT NULL,
  `CREDITSTAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `ORD_INST` varchar(50) COLLATE utf8_bin NOT NULL,
  `DATEORDORG` date NOT NULL,
  `ORDCOMPER` double NOT NULL,
  `ORD_STAT` varchar(1) COLLATE utf8_bin NOT NULL,
  `DATE_REQ` date NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客訂單主檔';

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
  `DISTRICTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DESCRIPTION` varchar(50) COLLATE utf8_bin NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='顧客地區主檔';

-- --------------------------------------------------------

--
-- 資料表結構 `INVOICE`
--

CREATE TABLE `INVOICE` (
  `INVOICENO` varchar(15) COLLATE utf8_bin NOT NULL,
  `PCKLSTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `PCKINDEX` varchar(15) COLLATE utf8_bin NOT NULL,
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
  `PRINTAG` varchar(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售訂單發票交易檔';

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
  `PRICE_CNT` double NOT NULL,
  `PERCENTDIS` double NOT NULL,
  `PRICE_SELL` double NOT NULL,
  `NET_SALES` double NOT NULL,
  `TAX_CODE` varchar(1) COLLATE utf8_bin NOT NULL,
  `DATEORDORG` date NOT NULL,
  `CREATEDATE` datetime NOT NULL,
  `UPDATEDATE` datetime NOT NULL,
  `ACTCODE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售訂單材料檔';

-- --------------------------------------------------------

--
-- 資料表結構 `PCKLST`
--

CREATE TABLE `PCKLST` (
  `PCKLSTNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `PCKINDEX` varchar(15) COLLATE utf8_bin NOT NULL,
  `ORDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ITEMNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `DATE_REQ` date NOT NULL,
  `QTYSHIPREQ` int(11) NOT NULL,
  `DATEPRTORG` date NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `PRINTAG` varchar(15) COLLATE utf8_bin NOT NULL,
  `DATE_SHIP` date NOT NULL,
  `SHIP_ADD_NO` varchar(15) COLLATE utf8_bin NOT NULL,
  `WHOUSE` varchar(5) COLLATE utf8_bin NOT NULL,
  `LOCNO` varchar(5) COLLATE utf8_bin NOT NULL,
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
-- 已匯出資料表的索引
--

--
-- 資料表索引 `CUSADDCITY`
--
ALTER TABLE `CUSADDCITY`
  ADD PRIMARY KEY (`CUSNO`,`ADDRESSNO`,`CITYNO`);

--
-- 資料表索引 `CUSADDRESS`
--
ALTER TABLE `CUSADD`
  ADD PRIMARY KEY (`CUSNO`,`ADDNO`);

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
-- 資料表索引 `CUSORD`
--
ALTER TABLE `CUSORD`
  ADD PRIMARY KEY (`ORDNO`);

--
-- 資料表索引 `CUSREGION`
--
ALTER TABLE `CUSREGION`
  ADD PRIMARY KEY (`REGIONNO`);

--
-- 資料表索引 `INVOICE`
--
ALTER TABLE `INVOICE`
  ADD PRIMARY KEY (`INVOICENO`,`PCKLSTNO`,`PCKINDEX`);

--
-- 資料表索引 `ORDMAT`
--
ALTER TABLE `ORDMAT`
  ADD PRIMARY KEY (`ORDNO`,`ITEMNO`);

--
-- 資料表索引 `PCKLST`
--
ALTER TABLE `PCKLST`
  ADD PRIMARY KEY (`PCKLSTNO`,`PCKINDEX`);

--
-- 資料表索引 `SLSMAS`
--
ALTER TABLE `SLSMAS`
  ADD PRIMARY KEY (`SALPERNO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;