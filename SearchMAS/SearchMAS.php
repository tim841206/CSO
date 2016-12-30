<?
include_once("../resource/database.php");

if ($_POST['module'] == "SearchMAS") {
	if ($_POST['event'] == "SearchSLSMAS") {
		if ($_POST['option'] == "Search") {
			$result = SearchSLSMAS($_POST['Search']);
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
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSMAS") {
		if ($_POST['check'] == "Search") {
			$result = SearchCUSMAS($_POST['CUSNO']);
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
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSADD") {
		if ($_POST['option'] == "Search") {
			$result = SearchCUSADD($_POST['CUSNO'], $_POST['ADDNO']);
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
		else {
			echo json_encode(array('state' => 400));
    		return;
		}	
	}
	elseif ($_POST['event'] == "SearchCUSREGION") {
		if ($_POST['check'] == "Search") {
			$result = SearchCUSREGION($_POST['REGIONNO']);
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
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSCITY") {
		if ($_POST['option'] == "Search") {
			$result = SearchCUSCITY($_POST['CITYNO']);
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
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "SearchCUSADDCITY") {
		if ($_POST['check'] == "Search") {
			$result = SearchCUSADDCITY($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CUSNM' => $fetch['CUSNM'], 'CITYNO' => $fetch['CITYNO'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
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

// 連接資料庫
function SearchSLSMAS($SALPERNO) {
	$sql = "SELECT * FROM SLSMAS WHERE SALPERNO=$SALPERNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $result; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSMAS($CUSNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $result; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSREGION($REGIONNO) {
	$sql = "SELECT * FROM CUSREGION WHERE REGIONNO=$REGIONNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $result; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSCITY($CITYNO) {
	$sql = "SELECT * FROM CUSCITY WHERE CITYNO=$CITYNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $result; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else if ($fetch['ACTCODE'] != 1){
		return 1; // 不存在
	}
	$sql = "SELECT * FROM CUSADD WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $result; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 4; // 已刪除
	}
	else {
		return 3; // 不存在
	}
}

function SearchCUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 0) {
		return 2; // 已刪除
	}
	else if ($fetch['ACTCODE'] != 1){
		return 1; // 不存在
	}
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ACTCODE'] == 1) {
		return $result; // ok
	}
	else if ($fetch['ACTCODE'] == 0) {
		return 4; // 已刪除
	}
	else {
		return 3; // 不存在
	}
}