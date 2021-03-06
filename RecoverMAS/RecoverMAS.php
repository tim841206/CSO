<?
include_once("../resource/database.php");
include_once("../resource/attachment.php");

if (safe($_POST['module']) == "RecoverMAS") {
	if (safe($_POST['event']) == "RecoverSLSMAS") {
		if (safe($_POST['option']) == "SALPERNO") {
			$result = check_SALPERNO(safe($_POST['SALPERNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'SALPERNM' => $result['SALPERNM'], 'EMPNO' => $result['EMPNO'], 'COMRATE' => $result['COMRATE'], 'SALEAMTYTD' => $result['SALEAMTYTD'], 'SALEAMTSTD' => $result['SALEAMTSTD'], 'SALEAMTMTD' => $result['SALEAMTMTD'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$SALPERNO = safe($_POST['SALPERNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE SLSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE SALPERNO='$SALPERNO'";
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
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "RecoverCUSMAS") {
		if (safe($_POST['option']) == "CUSNO") {
			$result = check_CUSNO(safe($_POST['CUSNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CUSNM' => $result['CUSNM'], 'ADD_1' => $result['ADD_1'], 'ADD_2' => $result['ADD_2'], 'ADD_3' => $result['ADD_3'], 'CITY' => $result['CITY'], 'COUNTY' => $result['COUNTY'], 'COUNTRY' => $result['COUNTRY'], 'ZCODE' => $result['ZCODE'], 'CNTPER' => $result['CNTPER'], 'TEL' => $result['TEL'], 'FAX' => $result['FAX'], 'EMAIL' => $result['EMAIL'], 'WSITE' => $result['WSITE'], 'SALPERNO' => $result['SALPERNO'], 'DFSHIPNO' => $result['DFSHIPNO'], 'DFBILLNO' => $result['DFBILLNO'], 'SALEAMTYTD' => $result['SALEAMTYTD'], 'SALEAMTSTD' => $result['SALEAMTSTD'], 'SALEAMTMTD' => $result['SALEAMTMTD'], 'CURAR' => $result['CURAR'], 'AR30_60' => $result['AR30_60'], 'AR60_90' => $result['AR60_90'], 'AR90_120' => $result['AR90_120'], 'M120AR' => $result['M120AR'], 'SPEINS' => $result['SPEINS'], 'CREDITSTAT' => $result['CREDITSTAT'], 'TAXID' => $result['TAXID'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$CUSNO = safe($_POST['CUSNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE CUSNO='$CUSNO'";
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
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "RecoverCUSADD") {
		if (safe($_POST['option']) == "CUSNO") {
			$result = check_CUSNO(safe($_POST['CUSNO']));
			if ($result == 1) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ADDNO") {
			$result = check_ADDNO_CUSADD(safe($_POST['CUSNO']), safe($_POST['ADDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'ADD_1' => $result['ADD_1'], 'ADD_2' => $result['ADD_2'], 'ADD_3' => $result['ADD_3'], 'CITY' => $result['CITY'], 'COUNTY' => $result['COUNTY'], 'COUNTRY' => $result['COUNTRY'], 'ZCODE' => $result['ZCODE'], 'CNTPER' => $result['CNTPER'], 'TEL' => $result['TEL'], 'FAX' => $result['FAX'], 'EMAIL' => $result['EMAIL'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$CUSNO = safe($_POST['CUSNO']);
			$ADDNO = safe($_POST['ADDNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADD SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
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
			echo "Invalid Access!";
		}	
	}
	elseif (safe($_POST['event']) == "RecoverCUSREGION") {
		if (safe($_POST['option']) == "REGIONNO") {
			$result = check_REGIONNO(safe($_POST['REGIONNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CHANNELNO' => $result['CHANNELNO'], 'CHANNELNM' => $result['CHANNELNM'], 'COMPANYNO' => $result['COMPANYNO'], 'COMPANYNM' => $result['COMPANYNM'], 'DISTRICTNO' => $result['DISTRICTNO'], 'DESCRIPTION' => $result['DESCRIPTION'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$REGIONNO = safe($_POST['REGIONNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSREGION SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE REGIONNO='$REGIONNO'";
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
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "RecoverCUSCITY") {
		if (safe($_POST['option']) == "CITYNO") {
			$result = check_CITYNO(safe($_POST['CITYNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CITYNM' => $result['CITYNM'], 'REGIONNO' => $result['REGIONNO'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$CITYNO = safe($_POST['CITYNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE CITYNO='$CITYNO'";
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
			echo "Invalid Access!";
		}
	}
	elseif ($_POST['event'] == "RecoverCUSADDCITY") {
		if (safe($_POST['option']) == "CUSNO") {
			$result = check_CUSNO(safe($_POST['CUSNO']));
			if ($result == 1) {
				echo json_encode(array('state' => 0, 'CUSNM' => query_CUSNM(safe($_POST['CUSNO']))));
				return;
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ADDNO") {
			$result = check_ADDNO_CUSADDCITY(safe($_POST['CUSNO']), safe($_POST['ADDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CITYNO' => $result['CITYNO'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$CUSNO = safe($_POST['CUSNO']);
			$ADDNO = safe($_POST['ADDNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
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
			echo "Invalid Access!";
		}
	}
	else {
		echo "Invalid Access!";
	}
}
else {
	echo "Invalid Access!";
}

function check_SALPERNO($SALPERNO) {
	$sql = "SELECT * FROM SLSMAS WHERE SALPERNO='$SALPERNO'";
	$result = mysql_query($sql);
	if ($fetch = mysql_fetch_array($result)) {
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -1; // 已存在
		}
	}
	else {
		return -2; // 不存在
	}
}

function check_CUSNO($CUSNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO='$CUSNO'";
	$result = mysql_query($sql);
	if ($fetch = mysql_fetch_array($result)) {
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -1; // 已存在
		}
	}
	else {
		return -2; // 不存在
	}
}

function check_REGIONNO($REGIONNO) {
	$sql = "SELECT * FROM CUSREGION WHERE REGIONNO='$REGIONNO'";
	$result = mysql_query($sql);
	if ($fetch = mysql_fetch_array($result)) {
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -1; // 已存在
		}
	}
	else {
		return -2; // 不存在
	}
}

function check_CITYNO($CITYNO) {
	$sql = "SELECT * FROM CUSCITY WHERE CITYNO='$CITYNO'";
	$result = mysql_query($sql);
	if ($fetch = mysql_fetch_array($result)) {
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -1; // 已存在
		}
	}
	else {
		return -2; // 不存在
	}
}

function check_ADDNO_CUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
	$result = mysql_query($sql);
	if ($fetch = mysql_fetch_array($result)) {
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -1; // 已存在
		}
	}
	else {
		return -2; // 不存在
	}
}

function check_ADDNO_CUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
	$result = mysql_query($sql);
	if ($fetch = mysql_fetch_array($result)) {
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -1; // 已存在
		}
	}
	else {
		return -2; // 不存在
	}
}
function query_CUSNM($CUSNO) {
	$result = mysql_query("SELECT * FROM CUSMAS WHERE CUSNO='$CUSNO' AND ACTCODE=1");
	$fetch = mysql_fetch_array($result);
	return $fetch['CUSNM'];
}