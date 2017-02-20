<?
include_once("../resource/database.php");
include_once("../resource/attachment.php");

if (safe($_POST['module']) == "DeleteMAS") {
	if (safe($_POST['event']) == "DeleteSLSMAS") {
		if (safe($_POST['option']) == "SALPERNO") {
			if (!check_ORDMAS_SLSMAS(safe($_POST['SALPERNO']))) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
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
		}
		elseif (safe($_POST['option']) == "Delete") {
			$SALPERNO = safe($_POST['SALPERNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE SLSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE SALPERNO='$SALPERNO'";
			if (mysql_query($sql)) {
				$deleteCUSMAS = "UPDATE CUSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE SALPERNO='$SALPERNO'";
				$deleteCUSADD = "UPDATE CUSADD SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO IN (SELECT CUSNO FROM CUSMAS WHERE SALPERNO='$SALPERNO')";
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO IN (SELECT CUSNO FROM CUSMAS WHERE SALPERNO='$SALPERNO')";
				if (!mysql_query($deleteCUSMAS)) {
					echo json_encode(array('state' => -2));
					return;
				}
				elseif (!mysql_query($deleteCUSADD)) {
					echo json_encode(array('state' => -3));
					return;
				}
				elseif (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => -4));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "DeleteCUSMAS") {
		if (safe($_POST['option']) == "CUSNO") {
			if (!check_ORDMAS_CUSMAS(safe($_POST['CUSNO']))) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
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
		}
		elseif (safe($_POST['option']) == "Delete") {
			$CUSNO = safe($_POST['CUSNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO'";
			if (mysql_query($sql)) {
				$deleteCUSADD = "UPDATE CUSADD SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO'";
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO'";
				if (!mysql_query($deleteCUSADD)) {
					echo json_encode(array('state' => -2));
					return;
				}
				elseif (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => -3));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "DeleteCUSADD") {
		if (safe($_POST['option']) == "CUSNO") {
			$result = check_CUSNO(safe($_POST['CUSNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ADDNO") {
			if (!check_ORDMAS_ADDNO(safe($_POST['CUSNO']), safe($_POST['ADDNO']))) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
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
		}
		elseif (safe($_POST['option']) == "Delete") {
			$CUSNO = safe($_POST['CUSNO']);
			$ADDNO = safe($_POST['ADDNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADD SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
			if (mysql_query($sql)) {
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
				if (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => -2));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}	
	}
	elseif (safe($_POST['event']) == "DeleteCUSREGION") {
		if (safe($_POST['option']) == "REGIONNO") {
			if (!check_ORDMAS_CUSREGION(safe($_POST['REGIONNO']))) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
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
		}
		elseif (safe($_POST['option']) == "Delete") {
			$REGIONNO = safe($_POST['REGIONNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSREGION SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE REGIONNO='$REGIONNO'";
			if (mysql_query($sql)) {
				$deleteCUSCITY = "UPDATE CUSCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE REGIONNO='$REGIONNO'";
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CITYNO IN (SELECT CITYNO FROM CUSCITY WHERE REGIONNO='$REGIONNO')";
				if (!mysql_query($deleteCUSCITY)) {
					echo json_encode(array('state' => -2));
					return;
				}
				elseif (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => -3));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "DeleteCUSCITY") {
		if (safe($_POST['option']) == "CITYNO") {
			if (!check_ORDMAS_CUSCITY(safe($_POST['CITYNO']))) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
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
		}
		elseif (safe($_POST['option']) == "Delete") {
			$CITYNO = safe($_POST['CITYNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CITYNO='$CITYNO'";
			if (mysql_query($sql)) {
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CITYNO='$CITYNO'";
				if (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => -2));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "DeleteCUSADDCITY") {
		if (safe($_POST['option']) == "CUSNO") {
			$result = check_CUSNO(safe($_POST['CUSNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CUSNM' => $result['CUSNM']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ADDNO") {
			if (!check_ORDMAS_ADDNO(safe($_POST['CUSNO']), safe($_POST['ADDNO']))) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
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
		}
		elseif (safe($_POST['option']) == "Delete") {
			$CUSNO = safe($_POST['CUSNO']);
			$ADDNO = safe($_POST['ADDNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
			if (mysql_query($sql)) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
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
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_CUSNO($CUSNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO='$CUSNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_REGIONNO($REGIONNO) {
	$sql = "SELECT * FROM CUSREGION WHERE REGIONNO='$REGIONNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_CITYNO($CITYNO) {
	$sql = "SELECT * FROM CUSCITY WHERE CITYNO='$CITYNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ADDNO_CUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ADDNO_CUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ORDMAS_SLSMAS($SALPERNO) {
	$sql = "SELECT * FROM ORDMAS WHERE SALPERNO='$SALPERNO' AND (ORD_STAT='E' OR ORD_STAT='R') AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return false; // 不可刪
	}
	else {
		return true; // ok
	}
}

function check_ORDMAS_CUSMAS($CUSNO) {
	$sql = "SELECT * FROM ORDMAS WHERE CUSNO='$CUSNO' AND (ORD_STAT='E' OR ORD_STAT='R') AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return false; // 不可刪
	}
	else {
		return true; // ok
	}
}

function check_ORDMAS_ADDNO($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM ORDMAS WHERE CUSNO='$CUSNO' AND (SHIP_ADD_NO='$ADDNO' OR BILL_ADD_NO='$ADDNO') AND (ORD_STAT='E' OR ORD_STAT='R') AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return false; // 不可刪
	}
	else {
		return true; // ok
	}
}

function check_ORDMAS_CUSREGION($REGIONNO) {
	$sql = "SELECT * FROM ORDMAS WHERE CUSNO IN (SELECT CUSNO FROM CUSADDCITY WHERE CITYNO IN (SELECT CITYNO FROM CUSCITY WHERE REGIONNO='$REGIONNO' AND ACTCODE=1) AND ACTCODE=1) AND (SHIP_ADD_NO IN (SELECT ADDNO FROM CUSADDCITY WHERE CITYNO IN (SELECT CITYNO FROM CUSCITY WHERE REGIONNO='$REGIONNO' AND ACTCODE=1) AND ACTCODE=1) OR BILL_ADD_NO IN (SELECT ADDNO FROM CUSADDCITY WHERE CITYNO IN (SELECT CITYNO FROM CUSCITY WHERE REGIONNO='$REGIONNO' AND ACTCODE=1) AND ACTCODE=1)) AND (ORD_STAT='E' OR ORD_STAT='R') AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return false; // 不可刪
	}
	else {
		return true; // ok
	}
}

function check_ORDMAS_CUSCITY($CITYNO) {
	$sql = "SELECT * FROM ORDMAS WHERE CUSNO IN (SELECT CUSNO FROM CUSADDCITY WHERE CITYNO='$CITYNO' AND ACTCODE=1) AND (SHIP_ADD_NO IN (SELECT ADDNO FROM CUSADDCITY WHERE CITYNO='$CITYNO' AND ACTCODE=1) OR BILL_ADD_NO IN (SELECT ADDNO FROM CUSADDCITY WHERE CITYNO='$CITYNO' AND ACTCODE=1)) AND (ORD_STAT='E' OR ORD_STAT='R') AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return false; // 不可刪
	}
	else {
		return true; // ok
	}
}