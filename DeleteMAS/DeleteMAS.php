<?
include_once("../resource/database.php");

if ($_POST['module'] == "DeleteMAS") {
	if ($_POST['event'] == "DeleteSLSMAS") {
		if ($_POST['option'] == "SALPERNO") {
			$result = check_SALPERNO($_POST['SALPERNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'SALPERNM' => $result['SALPERNM'], 'EMPNO' => $result['EMPNO'], 'COMRATE' => $result['COMRATE'], 'SALEAMTYTD' => $result['SALEAMTYTD'], 'SALEAMTSTD' => $result['SALEAMTSTD'], 'SALEAMTMTD' => $result['SALEAMTMTD'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Delete") {
			$SALPERNO = $_POST['SALPERNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE SLSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE SALPERNO='$SALPERNO'";
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
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "DeleteCUSMAS") {
		if ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CUSNM' => $result['CUSNM'], 'ADDNO_1' => $result['ADDNO_1'], 'ADDNO_2' => $result['ADDNO_2'], 'ADDNO_3' => $result['ADDNO_3'], 'CITY' => $result['CITY'], 'COUNTY' => $result['COUNTY'], 'COUNTRY' => $result['COUNTRY'], 'ZCODE' => $result['ZCODE'], 'CNTPER' => $result['CNTPER'], 'TEL' => $result['TEL'], 'FAX' => $result['FAX'], 'EMAIL' => $result['EMAIL'], 'WSITE' => $result['WSITE'], 'SALPERNO' => $result['SALPERNO'], 'DFSHIPNO' => $result['DFSHIPNO'], 'DFBILLNO' => $result['DFBILLNO'], 'SALEAMTYTD' => $result['SALEAMTYTD'], 'SALEAMTSTD' => $result['SALEAMTSTD'], 'SALEAMTMTD' => $result['SALEAMTMTD'], 'CURAR' => $result['CURAR'], 'AR30_60' => $result['AR30_60'], 'AR60_90' => $result['AR60_90'], 'AR90_120' => $result['AR90_120'], 'M120AR' => $result['M120AR'], 'SPEINS' => $result['SPEINS'], 'CREDITSTAT' => $result['CREDITSTAT'], 'TAXID' => $result['TAXID'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Delete") {
			$CUSNO = $_POST['CUSNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO'";
			if (mysql_query($sql)) {
				$deleteCUSADD = "UPDATE CUSADD SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO'";
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO'";
				if (!mysql_query($deleteCUSADD)) {
					echo json_encode(array('state' => 2));
					return;
				}
				elseif (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => 3));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "DeleteCUSADD") {
		if ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "ADDNO") {
			$result = check_ADDNO_CUSADD($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'ADD_1' => $result['ADD_1'], 'ADD_2' => $result['ADD_2'], 'ADD_3' => $result['ADD_3'], 'CITY' => $result['CITY'], 'COUNTY' => $result['COUNTY'], 'COUNTRY' => $result['COUNTRY'], 'ZCODE' => $result['ZCODE'], 'CNTPER' => $result['CNTPER'], 'TEL' => $result['TEL'], 'FAX' => $result['FAX'], 'EMAIL' => $result['EMAIL'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Delete") {
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADD SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
			if (mysql_query($sql)) {
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
				if (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => 2));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}	
	}
	elseif ($_POST['event'] == "DeleteCUSREGION") {
		if ($_POST['option'] == "REGIONNO") {
			$result = check_REGIONNO($_POST['REGIONNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CHANNELNO' => $result['CHANNELNO'], 'CHANNELNM' => $result['CHANNELNM'], 'COMPANYNO' => $result['COMPANYNO'], 'COMPANYNM' => $result['COMPANYNM'], 'DISTRICTNO' => $result['DISTRICTNO'], 'DESCRIPTION' => $result['DESCRIPTION'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Delete") {
			$REGIONNO = $_POST['REGIONNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSREGION SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE REGIONNO='$REGIONNO'";
			if (mysql_query($sql)) {
				$deleteCUSCITY = "UPDATE CUSCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE REGIONNO='$REGIONNO'";
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CITYNO IN (SELECT CITYNO FROM CUSCITY WHERE REGIONNO='$REGIONNO')";
				if (!mysql_query($deleteCUSCITY)) {
					echo json_encode(array('state' => 2));
					return;
				}
				elseif (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => 3));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "DeleteCUSCITY") {
		if ($_POST['option'] == "CITYNO") {
			$result = check_CITYNO($_POST['CITYNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CITYNM' => $result['CITYNM'], 'REGIONNO' => $result['REGIONNO'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Delete") {
			$CITYNO = $_POST['CITYNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CITYNO='$CITYNO'";
			if (mysql_query($sql)) {
				$deleteCUSADDCITY = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CITYNO='$CITYNO'";
				if (!mysql_query($deleteCUSADDCITY)) {
					echo json_encode(array('state' => 2));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "DeleteCUSADDCITY") {
		if ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CUSNM' => $result['CUSNM']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "ADDNO") {
			$result = check_ADDNO_CUSADDCITY($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CITYNO' => $result['CITYNO'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Delete") {
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADDCITY SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
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

function check_SALPERNO($SALPERNO) {
	$sql = "SELECT * FROM SLSMAS WHERE SALPERNO='$SALPERNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return 2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return 1; // 不存在
	}
}

function check_CUSNO($CUSNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO='$CUSNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return 2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return 1; // 不存在
	}
}

function check_REGIONNO($REGIONNO) {
	$sql = "SELECT * FROM CUSREGION WHERE REGIONNO='$REGIONNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return 2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return 1; // 不存在
	}
}

function check_CITYNO($CITYNO) {
	$sql = "SELECT * FROM CUSCITY WHERE CITYNO='$CITYNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return 2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO_CUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return 2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO_CUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return 2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return 1; // 不存在
	}
}