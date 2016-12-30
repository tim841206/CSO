<?
include_once("../resource/database.php");

if ($_POST['module'] == "EditMAS") {
	if ($_POST['event'] == "EditSLSMAS") {
		if ($_POST['option'] == "SALPERNO") {
			$result = SearchSLSMAS($_POST['SALPERNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'SALPERNM' => $fetch['SALPERNM'], 'EMPNO' => $fetch['EMPNO'], 'COMRATE' => $fetch['COMRATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
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
		elseif ($_POST['option'] == "Edit") {
			$SALPERNO = $_POST['SALPERNO'];
			$SALPERNM = $_POST['SALPERNM'];
			$EMPNO = $_POST['EMPNO'];
			$COMRATE = $_POST['COMRATE'];
			$result1 = is_resource(SearchSLSMAS($SALPERNO))? 0 : SearchSLSMAS($SALPERNO);
			$result2 = check_50_notnull($SALPERNM);
			$result3 = check_15_notnull($EMPNO);
			$result4 = check_COMRATE($COMRATE);
			$result = $result1 + $result2 + $result3 + $result4;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE SLSMAS SET SALPERNM=$SALPERNM, EMPNO=$EMPNO, COMRATE=$COMRATE, UPDATEDATE=$UPDATEDATE WHERE SALPERNO=$SALPERNO";
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
	elseif ($_POST['event'] == "EditCUSMAS") {
		if ($_POST['check'] == "CUSNO") {
			$result = SearchCUSMAS($_POST['CUSNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CUSNM' => $fetch['CUSNM'], 'ADDNO_1' => $fetch['ADDNO_1'], 'ADDNO_2' => $fetch['ADDNO_2'], 'ADDNO_3' => $fetch['ADDNO_3'], 'CITY' => $fetch['CITY'], 'COUNTY' => $fetch['COUNTY'], 'COUNTRY' => $fetch['COUNTRY'], 'ZCODE' => $fetch['ZCODE'], 'CNTPER' => $fetch['CNTPER'], 'TEL' => $fetch['TEL'], 'FAX' => $fetch['FAX'], 'EMAIL' => $fetch['EMAIL'], 'WSITE' => $fetch['WSITE'], 'SALPERNO' => $fetch['SALPERNO'], 'SPEINS' => $fetch['SPEINS'], 'CREDITSTAT' => $fetch['CREDITSTAT'], 'TAXID' => $fetch['TAXID']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		if ($_POST['check'] == "SALPERNO") {
			$result = check_SALPERNO_exist($_POST['SALPERNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "CUSNM") {
			$result = check_50_notnull($_POST['CUSNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "ADDNO_1") {
			$result = check_ADDNO_1($_POST['ADDNO_1'], $_POST['ADDNO_2'], $_POST['ADDNO_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "ADDNO_2") {
			$result = check_ADDNO_2($_POST['ADDNO_1'], $_POST['ADDNO_2'], $_POST['ADDNO_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "ADDNO_3") {
			$result = check_ADDNO_3($_POST['ADDNO_1'], $_POST['ADDNO_2'], $_POST['ADDNO_3']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "CITY") {
			$result = check_50($_POST['CITY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "COUNTY") {
			$result = check_50($_POST['COUNTY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "COUNTRY") {
			$result = check_50($_POST['COUNTRY']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "ZCODE") {
			$result = check_15($_POST['ZCODE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "CNTPER") {
			$result = check_50($_POST['CNTPER']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "TEL") {
			$result = check_15($_POST['TEL']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "FAX") {
			$result = check_15($_POST['FAX']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "EMAIL") {
			$result = check_50($_POST['EMAIL']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "WSITE") {
			$result = check_50($_POST['WSITE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "SPEINS") {
			$result = check_50($_POST['SPEINS']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "TAXID") {
			$result = check_15($_POST['TAXID']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "Edit") {
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
			$result2 = is_resource(SearchCUSMAS($CUSNO))? 0 : SearchCUSMAS($CUSNO);
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
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE CUSMAS SET CUSNM=$CUSNM, ADDNO_1=$ADDNO_1, ADDNO_2=$ADDNO_2, ADDNO_3=$ADDNO_3, CITY=$CITY, COUNTY=$COUNTY, COUNTRY=$COUNTRY, ZCODE=$ZCODE, CNTPER=$CNTPER, TEL=$TEL, FAX=$FAX, EMAIL=$EMAIL, WSITE=$WSITE, SALPERNO=$SALPERNO, SPEINS=$SPEINS, CREDITSTAT=$CREDITSTAT, TAXID=$TAXID, UPDATEDATE=$UPDATEDATE WHERE CUSNO=$CUSNO";
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
	elseif ($_POST['event'] == "EditCUSADD") {
		if ($_POST['option'] == "CUSNO") {
			$result = SearchCUSMAS($_POST['CUSNO']);
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
			$result = SearchCUSADD($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'ADD_1' => $fetch['ADD_1'], 'ADD_2' => $fetch['ADD_2'], 'ADD_3' => $fetch['ADD_3'], 'CITY' => $fetch['CITY'], 'COUNTY' => $fetch['COUNTY'], 'COUNTRY' => $fetch['COUNTRY'], 'ZCODE' => $fetch['ZCODE'], 'CNTPER' => $fetch['CNTPER'], 'TEL' => $fetch['TEL'], 'FAX' => $fetch['FAX'], 'EMAIL' => $fetch['EMAIL']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
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
		elseif ($_POST['option'] == "Edit") {
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
			$result1 = is_resource(SearchCUSMAS($CUSNO))? 0 : SearchCUSMAS($CUSNO);
			$result2 = is_resource(SearchCUSADD($CUSNO, $ADDNO))? 0 : SearchCUSADD($CUSNO, $ADDNO);
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
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE CUSADD SET ADD_1=$ADD_1, ADD_2=$ADD_2, ADD_3=$ADD_3, CITY=$CITY, COUNTY=$COUNTY, COUNTRY=$COUNTRY, ZCODE=$ZCODE, CNTPER=$CNTPER, TEL=$TEL, FAX=$FAX, EMAIL=$EMAIL WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
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
	elseif ($_POST['event'] == "EditCUSREGION") {
		if ($_POST['check'] == "REGIONNO") {
			$result = SearchCUSREGION($_POST['REGIONNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CHANNELNO' => $fetch['CHANNELNO'], 'CHANNELNM' => $fetch['CHANNELNM'], 'COMPANYNO' => $fetch['COMPANYNO'], 'COMPANYNM' => $fetch['COMPANYNM'], 'DISTRICTNO' => $fetch['DISTRICTNO'], 'DESCRIPTION' => $fetch['DESCRIPTION']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
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
		elseif ($_POST['option'] == "Edit") {
			$REGIONNO = $_POST['REGIONNO'];
			$CHANNELNO = $_POST['CHANNELNO'];
			$CHANNELNM = $_POST['CHANNELNM'];
			$COMPANYNO = $_POST['COMPANYNO'];
			$COMPANYNM = $_POST['COMPANYNM'];
			$DISTRICTNO = $_POST['DISTRICTNO'];
			$DESCRIPTION = $_POST['DESCRIPTION'];
			$result1 = is_resource(SearchCUSREGION($REGIONNO))? 0 : SearchCUSREGION($REGIONNO);
			$result2 = check_15_notnull($CHANNELNO);
			$result3 = check_50_notnull($CHANNELNM);
			$result4 = check_15_notnull($COMPANYNO);
			$result5 = check_50_notnull($COMPANYNM);
			$result6 = check_15_notnull($DISTRICTNO);
			$result7 = check_50($DESCRIPTION);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE CUSREGION SET REGIONNO=$REGIONNO, CHANNELNO=$CHANNELNO, CHANNELNM=$CHANNELNM, COMPANYNO=$COMPANYNO, COMPANYNM=$COMPANYNM, DISTRICTNO=$DISTRICTNO, DESCRIPTION=$DESCRIPTION, UPDATEDATE=$UPDATEDATE WHERE REGIONNO=$REGIONNO";
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
	elseif ($_POST['event'] == "EditCUSCITY") {
		if ($_POST['option'] == "CITYNO") {
			$result = SearchCUSCITY($_POST['CITYNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CITYNM' => $fetch['CITYNM'], 'REGIONNO' => $fetch['REGIONNO']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		if ($_POST['option'] == "REGIONNO") {
			$result = check_REGIONNO_exist($_POST['REGIONNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		if ($_POST['option'] == "CITYNM") {
			$result = check_50_notnull($_POST['CITYNM']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Edit") {
			$CITYNO = $_POST['CITYNO'];
			$CITYNM = $_POST['CITYNM'];
			$REGIONNO = $_POST['REGIONNO'];
			$result1 = check_REGIONNO_exist($REGIONNO);
			$result2 = is_resource(SearchCUSCITY($CITYNO))? 0 : SearchCUSCITY($CITYNO);
			$result3 = check_50_notnull($CITYNM);
			$result = $result1 + $result2 + $result3;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE CUSCITY SET CITYNM=$CITYNM, REGIONNO=$REGIONNO, UPDATEDATE=$UPDATEDATE WHERE CITYNO=$CITYNO";
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
	elseif ($_POST['event'] == "EditCUSADDCITY") {
		if ($_POST['check'] == "CUSNO") {
			$result = SearchCUSMAS($_POST['CUSNO']);
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
			$result = SearchCUSADDCITY($_POST['CUSNO'], $_POST['ADDNO']);
			if (is_resource($result)) {
				$fetch = mysql_fetch_array($result);
				echo json_encode(array('state' => 0, 'CITYNO' => $fetch['CITYNO']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['check'] == "CITYNO") {
			$result = check_CITYNO_exist($_POST['CITYNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['check'] == "Edit") {
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			$CITYNO = $_POST['CITYNO'];
			$result1 = is_resource(SearchCUSMAS($CUSNO))? 0 : SearchCUSMAS($CUSNO);
			$result2 = is_resource(SearchCUSADDCITY($CUSNO, $ADDNO))? 0 : SearchCUSADDCITY($CUSNO, $ADDNO);
			$result3 = check_CITYNO_exist($CITYNO);
			$result = $result1 + $result2 + $result3;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE CUSADDCITY SET CITYNO=$CITYNO WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
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

// 連接資料庫
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

function check_SALPERNO_exist($SALPERNO) {
	$sql = "SELECT SALPERNO FROM SLSMAS WHERE SALPERNO=$SALPERNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // 存在
	}
	else {
		return 1; // 不存在
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

function check_REGIONNO_exist($REGIONNO) {
	$sql = "SELECT REGIONNO FROM CUSREGION WHERE REGIONNO=$REGIONNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function SearchCUSADD($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADD WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
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

function SearchCUSADDCITY($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADDCITY WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
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

function check_CITYNO_exist($CITYNO) {
	$sql = "SELECT CITYNO FROM CUSCITY WHERE CITYNO=$CITYNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}