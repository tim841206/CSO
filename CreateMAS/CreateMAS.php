<?
include_once("../resource/database.php");

if ($_POST['module'] == "CreateMAS") {
	if ($_POST['event'] == "CreateSLSMAS") {
		if ($_POST['option'] == "SALPERNO") {
			$result = check_SALPERNO($_POST['SALPERNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "SALPERNM") {
			$result = check_50_notnull($_POST['SALPERNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "EMPNO") {
			$result = check_15_notnull($_POST['EMPNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COMRATE") {
			$result = check_COMRATE($_POST['COMRATE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			$SALPERNO = $_POST['SALPERNO'];
			$SALPERNM = $_POST['SALPERNM'];
			$EMPNO = $_POST['EMPNO'];
			$COMRATE = $_POST['COMRATE'];
			$result1 = check_SALPERNO($SALPERNO);
			$result2 = check_50_notnull($SALPERNM);
			$result3 = check_15_notnull($EMPNO);
			$result4 = check_COMRATE($COMRATE);
			$result = $result1 + $result2 + $result3 + $result4;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO SLSMAS (SALPERNO, SALPERNM, EMPNO, COMRATE, SALEAMTYTD, SALEAMTSTD, SALEAMTMTD, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$SALPERNO', '$SALPERNM', '$EMPNO', '$COMRATE', 0, 0, 0, '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => 1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "CreateCUSMAS") {
		if ($_POST['option'] == "SALPERNO") {
			$result = check_SALPERNO_exist($_POST['SALPERNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CUSNM") {
			$result = check_50_notnull($_POST['CUSNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADDNO_1") {
			$result = check_ADDNO_1($_POST['ADDNO_1'], $_POST['ADDNO_2'], $_POST['ADDNO_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADDNO_2") {
			$result = check_ADDNO_2($_POST['ADDNO_1'], $_POST['ADDNO_2'], $_POST['ADDNO_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADDNO_3") {
			$result = check_ADDNO_3($_POST['ADDNO_1'], $_POST['ADDNO_2'], $_POST['ADDNO_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CITY") {
			$result = check_50($_POST['CITY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COUNTY") {
			$result = check_50($_POST['COUNTY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COUNTRY") {
			$result = check_50($_POST['COUNTRY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ZCODE") {
			$result = check_15($_POST['ZCODE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CNTPER") {
			$result = check_50($_POST['CNTPER']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "TEL") {
			$result = check_15($_POST['TEL']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "FAX") {
			$result = check_15($_POST['FAX']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "EMAIL") {
			$result = check_50($_POST['EMAIL']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "WSITE") {
			$result = check_50($_POST['WSITE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "SPEINS") {
			$result = check_50($_POST['SPEINS']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "TAXID") {
			$result = check_15($_POST['TAXID']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			$SALPERNO = $_POST['SALPERNO'];
			$CUSNO = $_POST['CUSNO'];
			$CUSNM = $_POST['CUSNM'];
			$ADDNO_1 = $_POST['ADDNO_1'];
			$ADDNO_2 = $_POST['ADDNO_2'];
			$ADDNO_3 = $_POST['ADDNO_3'];
			$CITY = $_POST['CITY'];
			$COUNTY = $_POST['COUNTY'];
			$COUNTRY = $_POST['COUNTRY'];
			$ZCODE = $_POST['ZCODE'];
			$CNTPER = $_POST['CNTPER'];
			$TEL = $_POST['TEL'];
			$FAX = $_POST['FAX'];
			$EMAIL = $_POST['EMAIL'];
			$WSITE = $_POST['WSITE'];
			$SPEINS = $_POST['SPEINS'];
			$CREDITSTAT = $_POST['CREDITSTAT'];
			$TAXID = $_POST['TAXID'];
			$result1 = check_SALPERNO_exist($SALPERNO);
			$result2 = check_CUSNO($CUSNO);
			$result3 = check_50_notnull($CUSNM);
			$result4 = check_ADDNO_1($ADDNO_1, $ADDNO_2, $ADDNO_3);
			$result5 = check_ADDNO_2($ADDNO_1, $ADDNO_2, $ADDNO_3);
			$result6 = check_ADDNO_3($ADDNO_1, $ADDNO_2, $ADDNO_3);
			$result7 = check_50($CITY);
			$result8 = check_50($COUNTY);
			$result9 = check_50($COUNTRY);
			$result10 = check_15($ZCODE);
			$result11 = check_50($CNTPER);
			$result12 = check_15($TEL);
			$result13 = check_15($FAX);
			$result14 = check_50($EMAIL);
			$result15 = check_50($WSITE);
			$result16 = check_50($SPEINS);
			$result17 = check_15($TAXID);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7 + $result8 + $result9 + $result10 + $result11 + $result12 + $result13 + $result14 + $result15 + $result16 + $result17;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO CUSMAS (CUSNO, CUSNM, ADDNO_1, ADDNO_2, ADDNO_3, CITY, COUNTY, COUNTRY, ZCODE, CNTPER, TEL, FAX, EMAIL, WSITE, SALPERNO, DFSHIPNO, DFBILLNO, SALEAMTYTD, SALEAMTSTD, SALEAMTMTD, CURAR, AR30_60, AR60_90, AR90_120, M120AR, SPEINS, CREDITSTAT, TAXID, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$CUSNO', '$CUSNM', '$ADDNO_1', '$ADDNO_2', '$ADDNO_3', '$CITY', '$COUNTY', '$COUNTRY', '$ZCODE', '$CNTPER', '$TEL', '$FAX', '$EMAIL', '$WSITE', '$SALPERNO', '$ADDNO_1', '$ADDNO_1', 0, 0, 0, 0, 0, 0, 0, 0, '$SPEINS', '$CREDITSTAT', '$TAXID', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => 1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "CreateCUSADD") {
		if ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO_exist($_POST['CUSNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADDNO") {
			$result = check_ADDNO($_POST['CUSNO'], $_POST['ADDNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADD_1") {
			$result = check_50_notnull($_POST['ADD_1']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADD_2") {
			$result = check_50($_POST['ADD_2']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ADD_3") {
			$result = check_50($_POST['ADD_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CITY") {
			$result = check_50($_POST['CITY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COUNTY") {
			$result = check_50($_POST['COUNTY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COUNTRY") {
			$result = check_50($_POST['COUNTRY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ZCODE") {
			$result = check_15($_POST['ZCODE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CNTPER") {
			$result = check_50($_POST['CNTPER']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "TEL") {
			$result = check_15($_POST['TEL']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "FAX") {
			$result = check_15($_POST['FAX']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "EMAIL") {
			$result = check_50($_POST['EMAIL']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			$ADD_1 = $_POST['ADD_1'];
			$ADD_2 = $_POST['ADD_2'];
			$ADD_3 = $_POST['ADD_3'];
			$CITY = $_POST['CITY'];
			$COUNTY = $_POST['COUNTY'];
			$COUNTRY = $_POST['COUNTRY'];
			$ZCODE = $_POST['ZCODE'];
			$CNTPER = $_POST['CNTPER'];
			$TEL = $_POST['TEL'];
			$FAX = $_POST['FAX'];
			$EMAIL = $_POST['EMAIL'];
			$result1 = check_CUSNO_exist($CUSNO);
			$result2 = check_ADDNO($ADDNO);
			$result3 = check_50_notnull($ADD_1);
			$result4 = check_50($ADD_2);
			$result5 = check_50($ADD_3);
			$result6 = check_50($CITY);
			$result7 = check_50($COUNTY);
			$result8 = check_50($COUNTRY);
			$result9 = check_15($ZCODE);
			$result10 = check_50($CNTPER);
			$result11 = check_15($TEL);
			$result12 = check_15($FAX);
			$result13 = check_50($EMAIL);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7 + $result8 + $result9 + $result10 + $result11 + $result12 + $result13;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO CUSADD (CUSNO, ADDNO, ADD_1, ADD_2, ADD_3, CITY, COUNTY, COUNTRY, ZCODE, CNTPER, TEL, FAX, EMAIL, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$CUSNO', '$ADDNO', '$ADD_1', '$ADD_2', '$ADD_3', '$CITY', '$COUNTY', '$COUNTRY', '$ZCODE', '$CNTPER', '$TEL', '$FAX', '$EMAIL', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => 1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}	
	}
	elseif ($_POST['event'] == "CreateCUSREGION") {
		if ($_POST['option'] == "REGIONNO") {
			$result = check_REGIONNO($_POST['REGIONNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CHANNELNO") {
			$result = check_15_notnull($_POST['CHANNELNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CHANNELNM") {
			$result = check_50_notnull($_POST['CHANNELNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COMPANYNO") {
			$result = check_15_notnull($_POST['COMPANYNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "COMPANYNM") {
			$result = check_50_notnull($_POST['COMPANYNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "DISTRICTNO") {
			$result = check_15_notnull($_POST['DISTRICTNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "DESCRIPTION") {
			$result = check_50($_POST['DESCRIPTION']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			$REGIONNO = $_POST['REGIONNO'];
			$CHANNELNO = $_POST['CHANNELNO'];
			$CHANNELNM = $_POST['CHANNELNM'];
			$COMPANYNO = $_POST['COMPANYNO'];
			$COMPANYNM = $_POST['COMPANYNM'];
			$DISTRICTNO = $_POST['DISTRICTNO'];
			$DESCRIPTION = $_POST['DESCRIPTION'];
			$result1 = check_REGIONNO($REGIONNO);
			$result2 = check_15_notnull($CHANNELNO);
			$result3 = check_50_notnull($CHANNELNM);
			$result4 = check_15_notnull($COMPANYNO);
			$result5 = check_50_notnull($COMPANYNM);
			$result6 = check_15_notnull($DISTRICTNO);
			$result7 = check_50($DESCRIPTION);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO CUSREGION (REGIONNO, CHANNELNO, CHANNELNM, COMPANYNO, COMPANYNM, DISTRICTNO, DESCRIPTION, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$REGIONNO', '$CHANNELNO', '$CHANNELNM', '$COMPANYNO', '$COMPANYNM', '$DISTRICTNO', '$DESCRIPTION', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => 1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "CreateCUSCITY") {
		if ($_POST['option'] == "REGIONNO") {
			$result = check_REGIONNO_exist($_POST['REGIONNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CITYNO") {
			$result = check_CITYNO($_POST['CITYNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CITYNM") {
			$result = check_50_notnull($_POST['CITYNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			$CITYNO = $_POST['CITYNO'];
			$CITYNM = $_POST['CITYNM'];
			$REGIONNO = $_POST['REGIONNO'];
			$result1 = check_REGIONNO_exist($REGIONNO);
			$result2 = check_CITYNO($CITYNO);
			$result3 = check_50_notnull($CITYNM);
			$result = $result1 + $result2 + $result3;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO CUSCITY (CITYNO, CITYNM, REGIONNO, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$CITYNO', '$CITYNM', '$REGIONNO', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => 1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "CreateCUSADDCITY") {
		if ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO_exist($_POST['CUSNO']);
			if ($result == 0) {
				$CUSNM = query_CUSNM($_POST['CUSNO']);
				echo json_encode(array('state' => $result, 'CUSNM' => $CUSNM));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "ADDNO") {
			$result = check_ADDNO_valid($_POST['CUSNO'], $_POST['ADDNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CITYNO") {
			$result = check_CITYNO_exist($_POST['CITYNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			$CUSNO = $_POST['CUSNO'];
			$CUSNM = $_POST['CUSNM'];
			$ADDNO = $_POST['ADDNO'];
			$CITYNO = $_POST['CITYNO'];
			$result1 = check_CUSNO_exist($CUSNO);
			$result2 = check_ADDNO_valid($CUSNO, $ADDNO);
			$result3 = check_CITYNO_exist($CITYNO);
			$result = $result1 + $result2 + $result3;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO CUSADDCITY (CUSNO, CUSNM, ADDNO, CITYNO, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$CUSNO', '$CUSNM', '$ADDNO', '$CITYNO', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => 1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	else {
		echo json_encode(array('state' => 400));
    	return;
	}
}
else {
	echo json_encode(array('state' => 400));
    return;
}

function check_15($value) {
	if (!empty($value) && strlen($value) > 15) {
		return 1; // 長度超過上限
	}
	else {
		return 0; // ok
	}
}

function check_15_notnull($value) {
	if (empty($value)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($value) > 15) {
			return 2; // 長度超過上限
		}
		else {
			return 0; // ok
		}
	}
}

function check_50($value) {
	if (!empty($value) && strlen($value) > 50) {
		return 1; // 長度超過上限
	}
	else {
		return 0; // ok
	}
}

function check_50_notnull($value) {
	if (empty($value)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($value) > 50) {
			return 2; // 長度超過上限
		}
		else {
			return 0; // ok
		}
	}
}

function check_SALPERNO($SALPERNO) {
	if (empty($SALPERNO)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($SALPERNO) > 15) {
			return 2; // 長度超過上限
		}
		else {
			$sql = "SELECT SALPERNO FROM SLSMAS WHERE SALPERNO=$SALPERNO AND ACTCODE=1";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) > 0) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
	}
}

function check_SALPERNO_exist($SALPERNO) {
	$sql = "SELECT SALPERNO FROM SLSMAS WHERE SALPERNO=$SALPERNO AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // 存在
	}
	else {
		return 1; // 不存在
	}
}

function check_COMRATE($COMRATE) {
	if (empty($COMRATE)) {
		return 1; // 無輸入
	}
	else {
		if ($COMRATE < 0) {
			return 2; // 為負數
		}
		else {
			return 0; // ok
		}
	}
}

function check_CUSNO($CUSNO) {
	if (empty($CUSNO)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($CUSNO) > 15) {
			return 2; // 長度超過上限
		}
		else {
			$sql = "SELECT CUSNO FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) > 0) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
	}
}

function check_CUSNO_exist($CUSNO) {
	$sql = "SELECT CUSNO FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ADDNO_1'] != $ADDNO && $fetch['ADDNO_2'] != $ADDNO && $fetch['ADDNO_3'] != $ADDNO) {
		return 1; // 不存在
	} 
	else {
		$sql = "SELECT * FROM CUSADD WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO AND ACTCODE=1";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			return 2; // 已存在
		}
		else {
			return 0; // ok
		}
	}
}

function check_ADDNO_1($ADDNO_1, $ADDNO_2, $ADDNO_3) {
	if (empty($ADDNO_1)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($ADDNO_1) > 15) {
			return 2; // 長度超過上限
		}
		else {
			if ($ADDNO_1 == $ADDNO_2 || $ADDNO_1 == $ADDNO_3) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
	}
}

function check_ADDNO_2($ADDNO_1, $ADDNO_2, $ADDNO_3) {
	if (!empty($ADDNO_2) && strlen($ADDNO_2) > 15) {
		return 1; // 長度超過上限
	}
	else {
		if ($ADDNO_2 == $ADDNO_1 || $ADDNO_2 == $ADDNO_3) {
			return 2; // 已存在
		}
		else {
			return 0; // ok
		}
	}
}

function check_ADDNO_3($ADDNO_1, $ADDNO_2, $ADDNO_3) {
	if (!empty($ADDNO_3) && strlen($ADDNO_3) > 15) {
		return 1; // 長度超過上限
	}
	else {
		if ($ADDNO_3 == $ADDNO_1 || $ADDNO_3 == $ADDNO_2) {
			return 2; // 已存在
		}
		else {
			return 0; // ok
		}
	}
}

function check_ADDNO_valid($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ADDNO_1'] != $ADDNO && $fetch['ADDNO_2'] != $ADDNO && $fetch['ADDNO_3'] != $ADDNO) {
		return 1; // 不存在
	}
	else {
		$sql = "SELECT ADDNO FROM CUSADDCITY WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO AND ACTCODE=1";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			return 2; // 已存在
		}
		else {
			return 0; // ok
		}
	}
}

function check_REGIONNO($REGIONNO) {
	if (empty($REGIONNO)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($REGIONNO) > 15) {
			return 2; // 長度超過上限
		}
		else {
			$sql = "SELECT REGIONNO FROM CUSREGION WHERE REGIONNO=$REGIONNO AND ACTCODE=1";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) > 0) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
	}
}

function check_REGIONNO_exist($REGIONNO) {
	$sql = "SELECT REGIONNO FROM CUSREGION WHERE REGIONNO=$REGIONNO AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_CITYNO($CITYNO) {
	if (empty($CITYNO)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($CITYNO) > 15) {
			return 2; // 長度超過上限
		}
		else {
			$sql = "SELECT CITYNO FROM CUSCITY WHERE CITYNO=$CITYNO AND ACTCODE=1";
			$result = mysql_query($sql);
			if (mysql_num_rows($result) > 0) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
	}
}

function check_CITYNO_exist($CITYNO) {
	$sql = "SELECT CITYNO FROM CUSCITY WHERE CITYNO=$CITYNO AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function query_CUSNM($CUSNO) {
	$sql = "SELECT CUSNM FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	return $fetch['CUSNM'];
}