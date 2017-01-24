<?
include_once("../resource/database.php");

if ($_POST['module'] == "SearchMAS") {
	if ($_POST['event'] == "SearchSLSMAS") {
		if ($_POST['option'] == "Search") {
			$result = SearchSLSMAS($_POST['SALPERNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'SALPERNM' => $result['SALPERNM'], 'EMPNO' => $result['EMPNO'], 'COMRATE' => $result['COMRATE'], 'SALEAMTYTD' => $result['SALEAMTYTD'], 'SALEAMTSTD' => $result['SALEAMTSTD'], 'SALEAMTMTD' => $result['SALEAMTMTD'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSMAS") {
		if ($_POST['check'] == "Search") {
			$result = SearchCUSMAS($_POST['CUSNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CUSNM' => $result['CUSNM'], 'ADDNO_1' => $result['ADDNO_1'], 'ADDNO_2' => $result['ADDNO_2'], 'ADDNO_3' => $result['ADDNO_3'], 'CITY' => $result['CITY'], 'COUNTY' => $result['COUNTY'], 'COUNTRY' => $result['COUNTRY'], 'ZCODE' => $result['ZCODE'], 'CNTPER' => $result['CNTPER'], 'TEL' => $result['TEL'], 'FAX' => $result['FAX'], 'EMAIL' => $result['EMAIL'], 'WSITE' => $result['WSITE'], 'SALPERNO' => $result['SALPERNO'], 'DFSHIPNO' => $result['DFSHIPNO'], 'DFBILLNO' => $result['DFBILLNO'], 'SALEAMTYTD' => $result['SALEAMTYTD'], 'SALEAMTSTD' => $result['SALEAMTSTD'], 'SALEAMTMTD' => $result['SALEAMTMTD'], 'CURAR' => $result['CURAR'], 'AR30_60' => $result['AR30_60'], 'AR60_90' => $result['AR60_90'], 'AR90_120' => $result['AR90_120'], 'M120AR' => $result['M120AR'], 'SPEINS' => $result['SPEINS'], 'CREDITSTAT' => $result['CREDITSTAT'], 'TAXID' => $result['TAXID'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSADD") {
		if ($_POST['option'] == "Search") {
			$result = SearchCUSADD($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'ADD_1' => $result['ADD_1'], 'ADD_2' => $result['ADD_2'], 'ADD_3' => $result['ADD_3'], 'CITY' => $result['CITY'], 'COUNTY' => $result['COUNTY'], 'COUNTRY' => $result['COUNTRY'], 'ZCODE' => $result['ZCODE'], 'CNTPER' => $result['CNTPER'], 'TEL' => $result['TEL'], 'FAX' => $result['FAX'], 'EMAIL' => $result['EMAIL'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}	
	}
	elseif ($_POST['event'] == "SearchCUSREGION") {
		if ($_POST['check'] == "Search") {
			$result = SearchCUSREGION($_POST['REGIONNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CHANNELNO' => $result['CHANNELNO'], 'CHANNELNM' => $result['CHANNELNM'], 'COMPANYNO' => $result['COMPANYNO'], 'COMPANYNM' => $result['COMPANYNM'], 'DISTRICTNO' => $result['DISTRICTNO'], 'DESCRIPTION' => $result['DESCRIPTION'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSCITY") {
		if ($_POST['option'] == "Search") {
			$result = SearchCUSCITY($_POST['CITYNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CITYNM' => $result['CITYNM'], 'REGIONNO' => $result['REGIONNO'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSADDCITY") {
		if ($_POST['check'] == "Search") {
			$result = SearchCUSADDCITY($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'CUSNM' => $result['CUSNM'], 'CITYNO' => $result['CITYNO'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
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

function SearchSLSMAS($SALPERNO) {
	$sql = "SELECT * FROM SLSMAS WHERE SALPERNO=$SALPERNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $fetch; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSMAS($CUSNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $fetch; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSREGION($REGIONNO) {
	$sql = "SELECT * FROM CUSREGION WHERE REGIONNO=$REGIONNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $fetch; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSCITY($CITYNO) {
	$sql = "SELECT * FROM CUSCITY WHERE CITYNO=$CITYNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $fetch; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else if ($fetch['ACTCODE'] != 1){
		return 1; // 不存在
	}
	$sql = "SELECT * FROM CUSADD WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $fetch; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 4; // 已刪除
	}
	else {
		return 3; // 不存在
	}
}

function SearchCUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else if ($fetch['ACTCODE'] != 1){
		return 1; // 不存在
	}
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO AND ACTCODE=1";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $fetch; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 4; // 已刪除
	}
	else {
		return 3; // 不存在
	}
}