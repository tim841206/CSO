-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2017 年 02 月 06 日 05:16
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
  `PRINTAG` varchar(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售訂單發票交易檔';

-- --------------------------------------------------------

--
-- 資料表結構 `ITMBAL`
--

CREATE TABLE `ITMBAL` (
  `whouse` varchar(5) COLLATE utf8_bin NOT NULL,
  `itemno` varchar(20) COLLATE utf8_bin NOT NULL,
  `leadtmcode` varchar(1) COLLATE utf8_bin NOT NULL,
  `leadtmmnf` double NOT NULL,
  `leadtmpur` int(11) NOT NULL,
  `orderpoint` int(11) NOT NULL,
  `qtyfixord` int(11) NOT NULL,
  `saftystock` int(11) NOT NULL,
  `flrstockcd` varchar(1) COLLATE utf8_bin NOT NULL,
  `date_cre` date NOT NULL,
  `date_l_mnt` date NOT NULL,
  `qtysoldptd` int(11) NOT NULL,
  `qtyissptd` int(11) NOT NULL,
  `qtyrecptd` int(11) NOT NULL,
  `qtyscrptd` int(11) NOT NULL,
  `qtyadjptd` int(11) NOT NULL,
  `saleamtptd` double NOT NULL,
  `issamtptd` double NOT NULL,
  `recamtptd` double NOT NULL,
  `scramtptd` double NOT NULL,
  `adjamtptd` double NOT NULL,
  `qtysoldstd` int(11) NOT NULL,
  `qtyissstd` int(11) NOT NULL,
  `qtyrecstd` int(11) NOT NULL,
  `qtyscrstd` int(11) NOT NULL,
  `qtyadjstd` int(11) NOT NULL,
  `saleamtstd` double NOT NULL,
  `issamtstd` double NOT NULL,
  `recamtstd` double NOT NULL,
  `scramtstd` double NOT NULL,
  `adjamtstd` double NOT NULL,
  `qtysoldytd` int(11) NOT NULL,
  `qtyissytd` int(11) NOT NULL,
  `qtyrecytd` int(11) NOT NULL,
  `qtyscrytd` int(11) NOT NULL,
  `qtyadjytd` int(11) NOT NULL,
  `saleamtytd` double NOT NULL,
  `issamtytd` double NOT NULL,
  `recamtytd` double NOT NULL,
  `scramtytd` double NOT NULL,
  `adjamtytd` double NOT NULL,
  `qtyonhand` int(11) NOT NULL,
  `qtyphyinv` int(11) NOT NULL,
  `date_prupd` date DEFAULT NULL,
  `beginv` int(11) NOT NULL,
  `qtyonprd` int(11) NOT NULL,
  `qtyonpur` int(11) NOT NULL,
  `costamtytd` double NOT NULL,
  `costamtptd` double NOT NULL,
  `date_onhnd` date NOT NULL,
  `date_sales` date DEFAULT NULL,
  `date_l_iss` date DEFAULT NULL,
  `actcode` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `ITMMAS`
--

CREATE TABLE `ITMMAS` (
  `itemno` varchar(20) COLLATE utf8_bin NOT NULL,
  `descripts` varchar(50) COLLATE utf8_bin NOT NULL,
  `itemclass` varchar(5) COLLATE utf8_bin NOT NULL,
  `pur_man` varchar(1) COLLATE utf8_bin NOT NULL,
  `salable` varchar(1) COLLATE utf8_bin NOT NULL,
  `no_rout` int(11) NOT NULL,
  `lastdate` date NOT NULL,
  `mat_cur` double NOT NULL,
  `mat_sta` double NOT NULL,
  `mat_his` double NOT NULL,
  `lab_cur` double NOT NULL,
  `lab_sta` double NOT NULL,
  `lab_his` double NOT NULL,
  `over_cur` double NOT NULL,
  `over_sta` double NOT NULL,
  `over_his` double NOT NULL,
  `cur_date` date NOT NULL,
  `sta_date` date NOT NULL,
  `his_date` date DEFAULT NULL,
  `pri_cur` double NOT NULL,
  `pricurdate` date DEFAULT NULL,
  `pri_his1` int(11) NOT NULL,
  `prihis1d` date DEFAULT NULL,
  `pri_his2` int(11) NOT NULL,
  `prihis2d` date DEFAULT NULL,
  `pri_his3` int(11) NOT NULL,
  `prihis3d` date DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `l_bsize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `LOCBAL`
--

CREATE TABLE `LOCBAL` (
  `whouse` varchar(5) COLLATE utf8_bin NOT NULL,
  `itemno` varchar(20) COLLATE utf8_bin NOT NULL,
  `locno` varchar(20) COLLATE utf8_bin NOT NULL,
  `qtyonhand` int(11) NOT NULL,
  `qtyperend` int(11) NOT NULL,
  `date_l_mnt` date NOT NULL,
  `date_onhnd` date NOT NULL,
  `date_fifo` date NOT NULL,
  `actcode` tinyint(4) NOT NULL,
  `date_prupd` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `LOCMAS`
--

CREATE TABLE `LOCMAS` (
  `whouse` varchar(5) COLLATE utf8_bin NOT NULL,
  `locno` varchar(20) COLLATE utf8_bin NOT NULL,
  `descripts` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_cre` date NOT NULL,
  `date_l_mnt` date NOT NULL,
  `qtytotal` int(11) NOT NULL,
  `date_qty` date NOT NULL,
  `actcode` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- 資料表結構 `REG_CITY_ADD`
--

CREATE TABLE `REG_CITY_ADD` (
  `LEVEL` tinyint(1) NOT NULL,
  `REGIONNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CITYNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `SALEAMTMTD` int(11) NOT NULL,
  `SALEAMTSTD` int(11) NOT NULL,
  `SALEAMTYTD` int(11) NOT NULL,
  `SALEAMT` int(11) NOT NULL,
  `PRODUCER` varchar(1) COLLATE utf8_bin NOT NULL,
  `PRODUCE_TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='地區-城市-地址';

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

-- --------------------------------------------------------

--
-- 資料表結構 `SLS_CUS_ADD`
--

CREATE TABLE `SLS_CUS_ADD` (
  `LEVEL` tinyint(1) NOT NULL,
  `SALPERNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `CUSNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `ADDNO` varchar(15) COLLATE utf8_bin NOT NULL,
  `SALEAMTMTD` int(11) NOT NULL,
  `SALEAMTSTD` int(11) NOT NULL,
  `SALEAMTYTD` int(11) NOT NULL,
  `SALEAMT` int(11) NOT NULL,
  `PRODUCER` varchar(1) COLLATE utf8_bin NOT NULL,
  `PRODUCE_TIME` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='銷售員-顧客-地址';

-- --------------------------------------------------------

--
-- 資料表結構 `WHOUSE`
--

CREATE TABLE `WHOUSE` (
  `whouse` varchar(5) COLLATE utf8_bin NOT NULL,
  `descriptor` varchar(50) COLLATE utf8_bin NOT NULL,
  `inreq_no` int(11) NOT NULL,
  `plan_or_no` int(11) NOT NULL,
  `pur_or_no` int(11) NOT NULL,
  `date_l_mnt` date NOT NULL,
  `date_cre` date NOT NULL,
  `actcode` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
