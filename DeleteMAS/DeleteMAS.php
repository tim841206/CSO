<?
if ($_POST['module'] == "DeleteMAS") {
	if ($_POST['event'] == "DeleteSLSMAS") {
		if ($_POST['option'] == "SALPERNO") {
			$result = check_SALPERNO($_POST['SALPERNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'SALPERNM' => $fetch['SALPERNM'], 'EMPNO' => $fetch['EMPNO'], 'COMRATE' => $fetch['COMRATE'], 'SALEAMTYTD' => $fetch['SALEAMTYTD'], 'SALEAMTSTD' => $fetch['SALEAMTSTD'], 'SALEAMTMTD' => $fetch['SALEAMTMTD'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
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
			$sql = "UPDATE SLSMAS SET UPDATEDATE=$UPDATEDATE, ACTCODE=0 WHERE SALPERNO=$SALPERNO";
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
		if ($_POST['check'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CUSNM' => $fetch['CUSNM'], 'ADDNO_1' => $fetch['ADDNO_1'], 'ADDNO_2' => $fetch['ADDNO_2'], 'ADDNO_3' => $fetch['ADDNO_3'], 'CITY' => $fetch['CITY'], 'COUNTY' => $fetch['COUNTY'], 'COUNTRY' => $fetch['COUNTRY'], 'ZCODE' => $fetch['ZCODE'], 'CNTPER' => $fetch['CNTPER'], 'TEL' => $fetch['TEL'], 'FAX' => $fetch['FAX'], 'EMAIL' => $fetch['EMAIL'], 'WSITE' => $fetch['WSITE'], 'SALPERNO' => $fetch['SALPERNO'], 'DFSHIPNO' => $fetch['DFSHIPNO'], 'DFBILLNO' => $fetch['DFBILLNO'], 'SALEAMTYTD' => $fetch['SALEAMTYTD'], 'SALEAMTSTD' => $fetch['SALEAMTSTD'], 'SALEAMTMTD' => $fetch['SALEAMTMTD'], 'CURAR' => $fetch['CURAR'], 'AR30_60' => $fetch['AR30_60'], 'AR60_90' => $fetch['AR60_90'], 'AR90_120' => $fetch['AR90_120'], 'M120AR' => $fetch['M120AR'], 'SPEINS' => $fetch['SPEINS'], 'CREDITSTAT' => $fetch['CREDITSTAT'], 'TAXID' => $fetch['TAXID'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['check'] == "Delete") {
			$CUSNO = $_POST['CUSNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSMAS SET UPDATEDATE=$UPDATEDATE, ACTCODE=0 WHERE CUSNO=$CUSNO";
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
	elseif ($_POST['event'] == "DeleteCUSADD") {
		if ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			if (is_resource($result)) {
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
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'ADD_1' => $fetch['ADD_1'], 'ADD_2' => $fetch['ADD_2'], 'ADD_3' => $fetch['ADD_3'], 'CITY' => $fetch['CITY'], 'COUNTY' => $fetch['COUNTY'], 'COUNTRY' => $fetch['COUNTRY'], 'ZCODE' => $fetch['ZCODE'], 'CNTPER' => $fetch['CNTPER'], 'TEL' => $fetch['TEL'], 'FAX' => $fetch['FAX'], 'EMAIL' => $fetch['EMAIL'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
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
			$sql = "UPDATE CUSADD SET UPDATEDATE=$UPDATEDATE, ACTCODE=0 WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
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
	elseif ($_POST['event'] == "DeleteCUSREGION") {
		if ($_POST['check'] == "REGIONNO") {
			$result = check_REGIONNO($_POST['REGIONNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CHANNELNO' => $fetch['CHANNELNO'], 'CHANNELNM' => $fetch['CHANNELNM'], 'COMPANYNO' => $fetch['COMPANYNO'], 'COMPANYNM' => $fetch['COMPANYNM'], 'DISTRICTNO' => $fetch['DISTRICTNO'], 'DESCRIPTION' => $fetch['DESCRIPTION'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
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
			$sql = "UPDATE CUSREGION SET UPDATEDATE=$UPDATEDATE, ACTCODE=0 WHERE REGIONNO=$REGIONNO";
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
	elseif ($_POST['event'] == "DeleteCUSCITY") {
		if ($_POST['option'] == "CITYNO") {
			$result = check_CITYNO($_POST['CITYNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CITYNM' => $fetch['CITYNM'], 'REGIONNO' => $fetch['REGIONNO'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
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
			$sql = "UPDATE CUSCITY SET UPDATEDATE=$UPDATEDATE, ACTCODE=0 WHERE CITYNO=$CITYNO";
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
	elseif ($_POST['event'] == "DeleteCUSADDCITY") {
		if ($_POST['check'] == "CUSNO") {
			$result = check_CUSNO($_POST['CUSNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CUSNM' => $fetch['CUSNM']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['check'] == "ADDNO") {
			$result = check_ADDNO_CUSADDCITY($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CITYNO' => $fetch['CITYNO'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['check'] == "Delete") {
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE CUSADDCITY SET UPDATEDATE=$UPDATEDATE, ACTCODE=0 WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
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

// 連接資料庫
function check_SALPERNO($SALPERNO) {
	$sql = "SELECT * FROM SLSMAS WHERE SALPERNO=$SALPERNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return $result; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_CUSNO($CUSNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return $result; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_REGIONNO($REGIONNO) {
	$sql = "SELECT * FROM CUSREGION WHERE REGIONNO=$REGIONNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return $result; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_CITYNO($CITYNO) {
	$sql = "SELECT * FROM CUSCITY WHERE CITYNO=$CITYNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return $result; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO_CUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADD WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return $result; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO_CUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return $result; // ok
	}
	else {
		return 1; // 不存在
	}
}