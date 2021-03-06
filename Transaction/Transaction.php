<?
include_once("../resource/database.php");
include_once("../resource/attachment.php");

if (safe($_POST['module']) == "Transaction") {
	if (safe($_POST['event']) == "CreateINV") {
		if (safe($_POST['option']) == "PCKLSTNO") {
			$result = check_PCKLSTNO(safe($_POST['PCKLSTNO']));
			if ($result < 0) {
				echo json_encode(array('state' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'ORDNO' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO(safe($_POST['ORDNO']));
			if ($result < 0) {
				echo json_encode(array('state' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'PCKLSTNO' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ITEMNO") {
			$result = check_ITEMNO(safe($_POST['PCKLSTNO']), safe($_POST['ITEMNO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "LOCNO") {
			$result = check_LOCNO(safe($_POST['PCKLSTNO']), safe($_POST['ITEMNO']), safe($_POST['REV_CODE']), safe($_POST['LOCNO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "QTYTRAN") {
			$result = check_QTYTRAN(safe($_POST['PCKLSTNO']), safe($_POST['ITEMNO']), safe($_POST['REV_CODE']), safe($_POST['LOCNO']), safe($_POST['QTYTRAN']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "DATE_TRAN") {
			$result = check_DATE_TRAN(safe($_POST['DATE_TRAN']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "Create") {
			$PCKLSTNO = safe($_POST['PCKLSTNO']);
			$ORDNO = safe($_POST['ORDNO']);
			$ITEMNO = safe($_POST['ITEMNO']);
			$REV_CODE = safe($_POST['REV_CODE']);
			$LOCNO = safe($_POST['LOCNO']);
			$QTYTRAN = safe($_POST['QTYTRAN']);
			$DATE_TRAN = safe($_POST['DATE_TRAN']);
			$result1 = (check_PCKLSTNO($PCKLSTNO)>0)? 0 : check_PCKLSTNO($PCKLSTNO);
			$result2 = (check_ORDNO($ORDNO)>0)? 0 : check_ORDNO($ORDNO);
			$result3 = check_ITEMNO($PCKLSTNO, $ITEMNO);
			$result4 = check_LOCNO($PCKLSTNO, $ITEMNO, $REV_CODE, $LOCNO);
			$result5 = check_QTYTRAN($PCKLSTNO, $ITEMNO, $REV_CODE, $LOCNO, $QTYTRAN);
			$result6 = check_DATE_TRAN($DATE_TRAN);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6;
			if ($result == 0) {
				$queryORDMAT = mysql_query("SELECT * FROM ORDMAT WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'");
				$fetchORDMAT = mysql_fetch_array($queryORDMAT);
				$queryORDMAS = mysql_query("SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO'");
				$fetchORDMAS = mysql_fetch_array($queryORDMAS);
				$CUSNO = $fetchORDMAS['CUSNO'];
				$UNI_COST = $fetchORDMAT['UNI_COST'];
				$ITEMCLASS = $fetchORDMAT['ITEMCLASS'];
				$BASE_PRICE = $fetchORDMAT['BASE_PRICE'];
				$PRICE_CNT = $fetchORDMAT['PRICE_CNT'];
				$PERCENTDIS = $fetchORDMAT['PERCENTDIS'];
				$PRICE_SELL = $fetchORDMAT['PRICE_SELL'];
				$TAX_CODE = $fetchORDMAT['TAX_CODE'];
				$DATE_REQ = $fetchORDMAS['DATE_REQ'];
				$SHIP_ADD_NO = $fetchORDMAS['SHIP_ADD_NO'];
				$BILL_ADD_NO = $fetchORDMAS['BILL_ADD_NO'];
				$NET_SALES = $PRICE_SELL*$QTYTRAN;
				date_default_timezone_set('Asia/Taipei');
				$DATE_L_MNT = date("Y-m-d H:i:s");
				$query = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO=0 AND PCKLSTNO='$PCKLSTNO' AND ITEMNO='$ITEMNO'");
				if (mysql_num_rows($query) == 0) {
					$sql = "INSERT INTO INVOICE (INVOICENO, PCKLSTNO, ORDNO, CUSNO, ITEMNO, DATE_TRAN, UNI_COST, ITEMCLASS, QTYTRAN, BASE_PRICE, PRICE_CNT, PERCENTDIS, PRICE_SELL, NET_SALES, TAX_CODE, DATE_REQ, SHIP_ADD_NO, BILL_ADD_NO, REV_CODE, DATE_L_MNT, PRINTAG) VALUES (0, '$PCKLSTNO', '$ORDNO', '$CUSNO', '$ITEMNO', '$DATE_TRAN', '$UNI_COST', '$ITEMCLASS', '$QTYTRAN', '$BASE_PRICE', '$PRICE_CNT', '$PERCENTDIS', '$PRICE_SELL', '$NET_SALES', '$TAX_CODE', '$DATE_REQ', '$SHIP_ADD_NO', '$BILL_ADD_NO', '$REV_CODE', '$DATE_L_MNT', 0)";
				}
				else {
					$sql = "UPDATE INVOICE SET DATE_TRAN='$DATE_TRAN', QTYTRAN=QTYTRAN+'$QTYTRAN' WHERE INVOICENO=0 AND PCKLSTNO='$PCKLSTNO' AND ITEMNO='$ITEMNO'";
				}		
				if (!mysql_query($sql)) {
					echo json_encode(array('state' => -1));
					return;
				}
				if (change_ITM($PCKLSTNO, $ITEMNO, $REV_CODE, $LOCNO, $QTYTRAN, $DATE_TRAN, $fetchORDMAT['PRICE_SELL']*$QTYTRAN) != 0) {
					echo json_encode(array('state' => -3));
					return;
				}
				if (change_MAS($fetchORDMAT['PRICE_SELL']*$QTYTRAN, $fetchORDMAS['CUSNO'], $fetchORDMAS['SALPERNO'], $ORDNO, $QTYTRAN, $ITEMNO, $REV_CODE) != 0) {
					echo json_encode(array('state' => -4));
					return;
				}
				if (change_PCK($DATE_TRAN, $QTYTRAN, $LOCNO, $PCKLSTNO, $ITEMNO, $REV_CODE) != 0) {
					echo json_encode(array('state' => -5));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -2));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "PrintINV") {
		if (safe($_POST['option']) == "init") {
			$result = init('PrintINV');
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromDATE_TRAN' => $result['FromDATE_TRAN'], 'ToDATE_TRAN' => $result['ToDATE_TRAN']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Search") {
			$data = array('FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_TRAN' => safe($_POST['FromDATE_TRAN']), 'ToDATE_TRAN' => safe($_POST['ToDATE_TRAN']));
			$result = Search('PrintINV', $data);
			if ($result == 0) {
				echo json_encode(array('state' => 0, 'result1' => $result[0], 'result2' => $result[1]));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Check") {
			$data = array('FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_TRAN' => safe($_POST['FromDATE_TRAN']), 'ToDATE_TRAN' => safe($_POST['ToDATE_TRAN']));
			$result = Check('PrintINV', $data);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'pdf' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Reprint") {
			$data = array('FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_TRAN' => safe($_POST['FromDATE_TRAN']), 'ToDATE_TRAN' => safe($_POST['ToDATE_TRAN']));
			$result = Reprint('PrintINV', $data);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'pdf' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "SearchINV") {
		if (safe($_POST['option']) == "init") {
			$result = init('SearchINV');
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'FromINVOICENO' => $result['FromINVOICENO'], 'ToINVOICENO' => $result['ToINVOICENO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromDATE_REQ' => $result['FromDATE_REQ'], 'ToDATE_REQ' => $result['ToDATE_REQ']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Search") {
			$data = array('FromINVOICENO' => safe($_POST['FromINVOICENO']), 'ToINVOICENO' => safe($_POST['ToINVOICENO']), 'FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_REQ' => safe($_POST['FromDATE_REQ']), 'ToDATE_REQ' => safe($_POST['ToDATE_REQ']));
			$result = Search('SearchINV', $data);
			if ($result == 0) {
				echo json_encode(array('state' => 0, 'result' => $result));
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
	elseif (safe($_POST['event']) == "PergePCK") {
		if (safe($_POST['option']) == "init") {
			$result = init('PergePCK');
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO'], 'FromDATE_REQ' => $result['FromDATE_REQ'], 'ToDATE_REQ' => $result['ToDATE_REQ']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Search") {
			$data = array('FromSALPERNO' => safe($_POST['FromSALPERNO']), 'ToSALPERNO' => safe($_POST['ToSALPERNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'FromDATE_REQ' => safe($_POST['FromDATE_REQ']), 'ToDATE_REQ' => safe($_POST['ToDATE_REQ']));
			$result = Search('PergePCK', $data);
			if ($result == 0) {
				echo json_encode(array('state' => 0, 'result' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Check") {
			$data = array('FromSALPERNO' => safe($_POST['FromSALPERNO']), 'ToSALPERNO' => safe($_POST['ToSALPERNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'FromDATE_REQ' => safe($_POST['FromDATE_REQ']), 'ToDATE_REQ' => safe($_POST['ToDATE_REQ']));
			$result = Check('PergePCK', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "PrintPCK") {
		if (safe($_POST['option']) == "init") {
			$result = init('PrintPCK');
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromDATE_REQ' => $result['FromDATE_REQ'], 'ToDATE_REQ' => $result['ToDATE_REQ']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Search") {
			$data = array('FromSALPERNO' => safe($_POST['FromSALPERNO']), 'ToSALPERNO' => safe($_POST['ToSALPERNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_REQ' => safe($_POST['FromDATE_REQ']), 'ToDATE_REQ' => safe($_POST['ToDATE_REQ']));
			$result = Search('PrintPCK', $data);
			if ($result == 0) {
				echo json_encode(array('state' => 0, 'result1' => $result[0], 'result2' => $result[1]));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Check") {
			$data = array('FromSALPERNO' => safe($_POST['FromSALPERNO']), 'ToSALPERNO' => safe($_POST['ToSALPERNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_REQ' => safe($_POST['FromDATE_REQ']), 'ToDATE_REQ' => safe($_POST['ToDATE_REQ']));
			$result = Check('PrintPCK', $data);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'pdf' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Reprint") {
			$data = array('FromSALPERNO' => safe($_POST['FromSALPERNO']), 'ToSALPERNO' => safe($_POST['ToSALPERNO']), 'FromCUSNO' => safe($_POST['FromCUSNO']), 'ToCUSNO' => safe($_POST['ToCUSNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromDATE_REQ' => safe($_POST['FromDATE_REQ']), 'ToDATE_REQ' => safe($_POST['ToDATE_REQ']));
			$result = Reprint('PrintPCK', $data);
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'pdf' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "SearchPCK") {
		if (safe($_POST['option']) == "init") {
			$result = init('SearchPCK');
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Search") {
			$data = array('FromSALPERNO' => safe($_POST['FromSALPERNO']), 'ToSALPERNO' => safe($_POST['ToSALPERNO']), 'FromORDNO' => safe($_POST['FromORDNO']), 'ToORDNO' => safe($_POST['ToORDNO']), 'FromPCKLSTNO' => safe($_POST['FromPCKLSTNO']), 'ToPCKLSTNO' => safe($_POST['ToPCKLSTNO']), 'ACTCODE' => safe($_POST['ACTCODE']));
			$result = Search('SearchPCK', $data);
			if ($result == 0) {
				echo json_encode(array('state' => 0, 'result' => $result));
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

function check_PCKLSTNO($PCKLSTNO) {
	$sql = "SELECT * FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) {
		return -1; // 不存在
	}
	else {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 2) {
			return -2; // 已完成
		}
		elseif ($fetch['ACTCODE'] == 3) {
			return -3; // 已作廢
		}
		else {
			return $fetch['ORDNO'];
		}
	}
}

function check_ORDNO($ORDNO) {
	$sql = "SELECT * FROM PCKLST WHERE ORDNO='$ORDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) {
		return -1; // 不存在
	}
	else {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 2) {
			return -2; // 已完成
		}
		elseif ($fetch['ACTCODE'] == 3) {
			return -3; // 已作廢
		}
		else {
			return $fetch['PCKLSTNO'];
		}
	}
}

function check_ITEMNO($PCKLSTNO, $ITEMNO) {
	$sql = "SELECT * FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO' AND ITEMNO='$ITEMNO' AND ACTCODE<=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // ok
	}
	else {
		return -1; // 不存在
	}
}

function check_LOCNO($PCKLSTNO, $ITEMNO, $REV_CODE, $LOCNO) {
	$query = mysql_query("SELECT WHOUSE FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO'");
	$fetch = mysql_fetch_array($query);
	$WHOUSE = $fetch['WHOUSE'];
	$queryLOCMAS = mysql_query("SELECT * FROM LOCMAS WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO'");
	$queryLOCBAL = mysql_query("SELECT * FROM LOCBAL WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO' AND ITEMNO='$ITEMNO'");
	if ($REV_CODE == 'C') {
		if (mysql_num_rows($queryLOCBAL) == 0) {
			return -1;
		}
		else {
			return 0;
		}
	}
	elseif ($REV_CODE == 'D') {
		if (mysql_num_rows($queryLOCMAS) == 0) {
			return -2;
		}
		else {
			return 0;
		}
	}
}

function check_QTYTRAN($PCKLSTNO, $ITEMNO, $REV_CODE, $LOCNO, $QTYTRAN) {
	$query = mysql_query("SELECT WHOUSE FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO'");
	$fetch = mysql_fetch_array($query);
	$WHOUSE = $fetch['WHOUSE'];
	$queryLOCMAS = mysql_query("SELECT * FROM LOCMAS WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO'");
	$fetchLOCMAS = mysql_fetch_array($queryLOCMAS);
	$queryLOCBAL = mysql_query("SELECT * FROM LOCBAL WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO' AND ITEMNO='$ITEMNO'");
	$fetchLOCBAL = mysql_fetch_array($queryLOCBAL);
	$queryITMBAL = mysql_query("SELECT * FROM ITMBAL WHERE WHOUSE='$WHOUSE' AND ITEMNO='$ITEMNO'");
	$fetchITMBAL = mysql_fetch_array($queryITMBAL);
	if ($REV_CODE == 'C' && $QTYTRAN > $fetchLOCMAS['qtytotal']) {
		return -1;
	}
	elseif ($REV_CODE == 'C' && $QTYTRAN > $fetchLOCBAL['qtyonhand']) {
		return -1;
	}
	elseif ($REV_CODE == 'C' && $QTYTRAN > $fetchITMBAL['qtyonhand']) {
		return -2;
	}
	else {
		return 0;
	}
}

function check_DATE_TRAN($DATE_TRAN) {
	if (empty($DATE_TRAN)) {
		return -1;
	}
	else {
		$date = explode('-', $DATE_TRAN);
		if (checkdate($date[1], $date[2], $date[0])) {
			return 0;
		}
		else {
			return -2;
		}
	}
}

function change_ITM($PCKLSTNO, $ITEMNO, $REV_CODE, $LOCNO, $QTYTRAN, $DATE_TRAN, $NET_SALES) {
	$query = mysql_query("SELECT WHOUSE FROM PCKLST WHERE PCKLSTNO='$PCKLSTNO'");
	$fetch = mysql_fetch_array($query);
	$WHOUSE = $fetch['WHOUSE'];
	$queryITMBAL = mysql_query("SELECT * FROM ITMBAL WHERE WHOUSE='$WHOUSE' AND ITEMNO='$ITEMNO'");
	if ($REV_CODE == 'C') {
		$sql_1 = "UPDATE LOCMAS SET date_qty='$DATE_TRAN', qtytotal=qtytotal-'$QTYTRAN' WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO'";
		$sql_2 = "UPDATE LOCBAL SET qtyonhand=qtyonhand-'$QTYTRAN', date_onhnd='$DATE_TRAN', date_fifo='$DATE_TRAN' WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO' AND ITEMNO='$ITEMNO'";
		$sql_3 = "UPDATE ITMBAL SET qtysoldptd=qtysoldptd+'$QTYTRAN', saleamtptd=saleamtptd+'$NET_SALES', qtysoldstd=qtysoldstd+'$QTYTRAN', saleamtstd=saleamtstd+'$NET_SALES', qtysoldytd=qtysoldytd+'$QTYTRAN', saleamtytd=saleamtytd+'$NET_SALES', qtyonhand=qtyonhand-'$QTYTRAN', date_onhnd='$DATE_TRAN', date_sales='$DATE_TRAN' WHERE WHOUSE='$WHOUSE' AND ITEMNO='$ITEMNO'";
	}
	elseif ($REV_CODE == 'D') {
		$sql_1 = "UPDATE LOCMAS SET date_qty='$DATE_TRAN', qtytotal=qtytotal+'$QTYTRAN' WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO'";
		if (mysql_num_rows($queryITMBAL) == 0) {
			$sql_2 = "INSERT INTO LOCBAL (whouse, itemno, locno, qtyonhand, qtyperend, date_l_mnt, date_onhnd, date_fifo, act_code) VALUES ('$WHOUSE', '$ITEMNO', '$LOCNO', '$QTYTRAN', 0, '$DATE_TRAN', '$DATE_TRAN', '$DATE_TRAN', 0)";
		}
		else {
			$sql_2 = "UPDATE LOCBAL SET qtyonhand=qtyonhand+'$QTYTRAN', date_onhnd='$DATE_TRAN', date_fifo='$DATE_TRAN' WHERE WHOUSE='$WHOUSE' AND LOCNO='$LOCNO' AND ITEMNO='$ITEMNO'";
		}
		$sql_3 = "UPDATE ITMBAL SET qtysoldptd=qtysoldptd-'$QTYTRAN', saleamtptd=saleamtptd-'$NET_SALES', qtysoldstd=qtysoldstd-'$QTYTRAN', saleamtstd=saleamtstd-'$NET_SALES', qtysoldytd=qtysoldytd-'$QTYTRAN', saleamtytd=saleamtytd-'$NET_SALES', qtyonhand=qtyonhand+'$QTYTRAN', date_onhnd='$DATE_TRAN', date_sales='$DATE_TRAN' WHERE WHOUSE='$WHOUSE' AND ITEMNO='$ITEMNO'";
	}
	if (!mysql_query($sql_1)) {
		return -1;
	}
	if (!mysql_query($sql_2)) {
		return -2;
	}
	if (!mysql_query($sql_3)) {
		return -3;
	}
	else {
		return 0;
	}
}

function change_MAS($NET_SALES, $CUSNO, $SALPERNO, $ORDNO, $QTYTRAN, $ITEMNO, $REV_CODE) {
	if ($REV_CODE == 'C') {
		$sql_1 = "UPDATE CUSMAS SET SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTMTD=SALEAMTMTD+'$NET_SALES' WHERE CUSNO='$CUSNO'";
		$sql_2 = "UPDATE SLSMAS SET SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTMTD=SALEAMTMTD+'$NET_SALES' WHERE SALPERNO='$SALPERNO'";
		$sql_3 = "UPDATE ORDMAS SET SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTMTD=SALEAMTMTD+'$NET_SALES', INVOICENO=0, TO_SHP_AMT=TO_SHP_AMT+'$NET_SALES', ORDCOMPER=TO_SHP_AMT*100/TO_ORD_AMT WHERE ORDNO='$ORDNO'";
		$sql_4 = "UPDATE ORDMAT SET QTYSHIP=QTYSHIP+'$QTYTRAN', QTYBAKORD=QTYORD-QTYSHIP, NET_SALES=NET_SALES+'$NET_SALES' WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
	}
	elseif ($REV_CODE == 'D') {
		$sql_1 = "UPDATE CUSMAS SET SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTMTD=SALEAMTMTD-'$NET_SALES' WHERE CUSNO='$CUSNO'";
		$sql_2 = "UPDATE SLSMAS SET SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTMTD=SALEAMTMTD-'$NET_SALES' WHERE SALPERNO='$SALPERNO'";
		$sql_3 = "UPDATE ORDMAS SET SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTMTD=SALEAMTMTD-'$NET_SALES', INVOICENO=0, TO_SHP_AMT=TO_SHP_AMT-'$NET_SALES', ORDCOMPER=TO_SHP_AMT*100/TO_ORD_AMT WHERE ORDNO='$ORDNO'";
		$sql_4 = "UPDATE ORDMAT SET QTYSHIP=QTYSHIP-'$QTYTRAN', QTYBAKORD=QTYORD-QTYSHIP, NET_SALES=NET_SALES-'$NET_SALES' WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
	}
	if (!mysql_query($sql_1)) {
		return -1;
	}
	if (!mysql_query($sql_2)) {
		return -2;
	}
	if (!mysql_query($sql_3)) {
		return -3;
	}
	if (!mysql_query($sql_4)) {
		return -4;
	}
	else {
		return 0;
	}
}

function change_PCK($DATE_TRAN, $QTYTRAN, $LOCNO, $PCKLSTNO, $ITEMNO, $REV_CODE) {
	if ($REV_CODE == 'C') {
		$sql = "UPDATE PCKLST SET DATE_SHIP='$DATE_TRAN', ACTCODE=1, QTYSHIPREQ=QTYSHIPREQ-'$QTYTRAN', LOCNO='$LOCNO' WHERE PCKLSTNO='$PCKLSTNO' AND ITEMNO='$ITEMNO'";
	}
	elseif ($REV_CODE == 'D') {
		$sql = "UPDATE PCKLST SET DATE_SHIP='$DATE_TRAN', QTYSHIPREQ=QTYSHIPREQ+'$QTYTRAN', LOCNO='$LOCNO' WHERE PCKLSTNO='$PCKLSTNO' AND ITEMNO='$ITEMNO'";
	}
	if (!mysql_query($sql)) {
		return -1;
	}
	else {
		return 0;
	}
}

function init($type) {
	$FromSALPERNO = 99999999;
	$ToSALPERNO = 0;
	$FromCUSNO = 99999999;
	$ToCUSNO = 0;
	$FromORDNO = 99999999;
	$ToORDNO = 0;
	$FromPCKLSTNO = 99999999;
	$ToPCKLSTNO = 0;
	$FromDATE_REQ = 99999999;
	$ToDATE_REQ = 0;
	$FromINVOICENO = 99999999;
	$ToINVOICENO = 0;
	$FromDATE_TRAN = 99999999;
	$ToDATE_TRAN = 0;
	if ($type == 'PrintPCK') {
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R'");
		if (mysql_num_rows($result) == 0) {
			return -1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($result)) {
				$FromSALPERNO = ($fetch['SALPERNO'] < $FromSALPERNO) ? $fetch['SALPERNO'] : $FromSALPERNO;
				$ToSALPERNO = ($fetch['SALPERNO'] > $ToSALPERNO) ? $fetch['SALPERNO'] : $ToSALPERNO;
				$FromCUSNO = ($fetch['CUSNO'] < $FromCUSNO) ? $fetch['CUSNO'] : $FromCUSNO;
				$ToCUSNO = ($fetch['CUSNO'] > $ToCUSNO) ? $fetch['CUSNO'] : $ToCUSNO;
				$FromORDNO = ($fetch['ORDNO'] < $FromORDNO) ? $fetch['ORDNO'] : $FromORDNO;
				$ToORDNO = ($fetch['ORDNO'] > $ToORDNO) ? $fetch['ORDNO'] : $ToORDNO;
				$FromDATE_REQ = ($fetch['DATE_REQ'] < $FromDATE_REQ) ? $fetch['DATE_REQ'] : $FromDATE_REQ;
				$ToDATE_REQ = ($fetch['DATE_REQ'] > $ToDATE_REQ) ? $fetch['DATE_REQ'] : $ToDATE_REQ;
			}
		}
		return array('FromSALPERNO' => $FromSALPERNO, 'ToSALPERNO' => $ToSALPERNO, 'FromCUSNO' => $FromCUSNO, 'ToCUSNO' => $ToCUSNO, 'FromORDNO' => $FromORDNO, 'ToORDNO' => $ToORDNO, 'FromDATE_REQ' => $FromDATE_REQ, 'ToDATE_REQ' => $ToDATE_REQ);
	}
	elseif ($type == 'PergePCK') {
		$result = mysql_query("SELECT * FROM PCKLST WHERE ACTCODE=0");
		if (mysql_num_rows($result) == 0) {
			return -1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($result)) {
				$FromSALPERNO = ($fetch['SALPERNO'] < $FromSALPERNO) ? $fetch['SALPERNO'] : $FromSALPERNO;
				$ToSALPERNO = ($fetch['SALPERNO'] > $ToSALPERNO) ? $fetch['SALPERNO'] : $ToSALPERNO;
				$FromCUSNO = ($fetch['CUSNO'] < $FromCUSNO) ? $fetch['CUSNO'] : $FromCUSNO;
				$ToCUSNO = ($fetch['CUSNO'] > $ToCUSNO) ? $fetch['CUSNO'] : $ToCUSNO;
				$FromORDNO = ($fetch['ORDNO'] < $FromORDNO) ? $fetch['ORDNO'] : $FromORDNO;
				$ToORDNO = ($fetch['ORDNO'] > $ToORDNO) ? $fetch['ORDNO'] : $ToORDNO;
				$FromPCKLSTNO = ($fetch['PCKLSTNO'] < $FromPCKLSTNO) ? $fetch['PCKLSTNO'] : $FromPCKLSTNO;
				$ToPCKLSTNO = ($fetch['PCKLSTNO'] > $ToPCKLSTNO) ? $fetch['PCKLSTNO'] : $ToPCKLSTNO;
				$FromDATE_REQ = ($fetch['DATE_REQ'] < $FromDATE_REQ) ? $fetch['DATE_REQ'] : $FromDATE_REQ;
				$ToDATE_REQ = ($fetch['DATE_REQ'] > $ToDATE_REQ) ? $fetch['DATE_REQ'] : $ToDATE_REQ;
			}
		}
		return array('FromSALPERNO' => $FromSALPERNO, 'ToSALPERNO' => $ToSALPERNO, 'FromCUSNO' => $FromCUSNO, 'ToCUSNO' => $ToCUSNO, 'FromORDNO' => $FromORDNO, 'ToORDNO' => $ToORDNO, 'FromPCKLSTNO' => $FromPCKLSTNO, 'ToPCKLSTNO' => $ToPCKLSTNO, 'FromDATE_REQ' => $FromDATE_REQ, 'ToDATE_REQ' => $ToDATE_REQ);
	}
	elseif ($type == 'SearchPCK') {
		$result = mysql_query("SELECT * FROM PCKLST");
		if (mysql_num_rows($result) == 0) {
			return -1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($result)) {
				$FromSALPERNO = ($fetch['SALPERNO'] < $FromSALPERNO) ? $fetch['SALPERNO'] : $FromSALPERNO;
				$ToSALPERNO = ($fetch['SALPERNO'] > $ToSALPERNO) ? $fetch['SALPERNO'] : $ToSALPERNO;
				$FromORDNO = ($fetch['ORDNO'] < $FromORDNO) ? $fetch['ORDNO'] : $FromORDNO;
				$ToORDNO = ($fetch['ORDNO'] > $ToORDNO) ? $fetch['ORDNO'] : $ToORDNO;
				$FromPCKLSTNO = ($fetch['PCKLSTNO'] < $FromPCKLSTNO) ? $fetch['PCKLSTNO'] : $FromPCKLSTNO;
				$ToPCKLSTNO = ($fetch['PCKLSTNO'] > $ToPCKLSTNO) ? $fetch['PCKLSTNO'] : $ToPCKLSTNO;
			}
		}
		return array('FromSALPERNO' => $FromSALPERNO, 'ToSALPERNO' => $ToSALPERNO, 'FromORDNO' => $FromORDNO, 'ToORDNO' => $ToORDNO, 'FromPCKLSTNO' => $FromPCKLSTNO, 'ToPCKLSTNO' => $ToPCKLSTNO);
	}
	elseif ($type == 'SearchINV') {
		$result = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO>0");
		if (mysql_num_rows($result) == 0) {
			return -1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($result)) {
				$FromINVOICENO = ($fetch['INVOICENO'] < $FromINVOICENO) ? $fetch['INVOICENO'] : $FromINVOICENO;
				$ToINVOICENO = ($fetch['INVOICENO'] > $ToINVOICENO) ? $fetch['INVOICENO'] : $ToINVOICENO;
				$FromPCKLSTNO = ($fetch['PCKLSTNO'] < $FromPCKLSTNO) ? $fetch['PCKLSTNO'] : $FromPCKLSTNO;
				$ToPCKLSTNO = ($fetch['PCKLSTNO'] > $ToPCKLSTNO) ? $fetch['PCKLSTNO'] : $ToPCKLSTNO;
				$FromCUSNO = ($fetch['CUSNO'] < $FromCUSNO) ? $fetch['CUSNO'] : $FromCUSNO;
				$ToCUSNO = ($fetch['CUSNO'] > $ToCUSNO) ? $fetch['CUSNO'] : $ToCUSNO;
				$FromORDNO = ($fetch['ORDNO'] < $FromORDNO) ? $fetch['ORDNO'] : $FromORDNO;
				$ToORDNO = ($fetch['ORDNO'] > $ToORDNO) ? $fetch['ORDNO'] : $ToORDNO;
				$FromDATE_REQ = ($fetch['DATE_REQ'] < $FromDATE_REQ) ? $fetch['DATE_REQ'] : $FromDATE_REQ;
				$ToDATE_REQ = ($fetch['DATE_REQ'] > $ToDATE_REQ) ? $fetch['DATE_REQ'] : $ToDATE_REQ;
			}
		}
		return array('FromINVOICENO' => $FromINVOICENO, 'ToINVOICENO' => $ToINVOICENO, 'FromPCKLSTNO' => $FromPCKLSTNO, 'ToPCKLSTNO' => $ToPCKLSTNO, 'FromCUSNO' => $FromCUSNO, 'ToCUSNO' => $ToCUSNO, 'FromORDNO' => $FromORDNO, 'ToORDNO' => $ToORDNO, 'FromDATE_REQ' => $FromDATE_REQ, 'ToDATE_REQ' => $ToDATE_REQ);
	}
	elseif ($type == 'PrintINV') {
		$result = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO=0");
		if (mysql_num_rows($result) == 0) {
			return -1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($result)) {
				$FromPCKLSTNO = ($fetch['PCKLSTNO'] < $FromPCKLSTNO) ? $fetch['PCKLSTNO'] : $FromPCKLSTNO;
				$ToPCKLSTNO = ($fetch['PCKLSTNO'] > $ToPCKLSTNO) ? $fetch['PCKLSTNO'] : $ToPCKLSTNO;
				$FromCUSNO = ($fetch['CUSNO'] < $FromCUSNO) ? $fetch['CUSNO'] : $FromCUSNO;
				$ToCUSNO = ($fetch['CUSNO'] > $ToCUSNO) ? $fetch['CUSNO'] : $ToCUSNO;
				$FromORDNO = ($fetch['ORDNO'] < $FromORDNO) ? $fetch['ORDNO'] : $FromORDNO;
				$ToORDNO = ($fetch['ORDNO'] > $ToORDNO) ? $fetch['ORDNO'] : $ToORDNO;
				$FromDATE_TRAN = ($fetch['DATE_TRAN'] < $FromDATE_TRAN) ? $fetch['DATE_TRAN'] : $FromDATE_TRAN;
				$ToDATE_TRAN = ($fetch['DATE_TRAN'] > $ToDATE_TRAN) ? $fetch['DATE_TRAN'] : $ToDATE_TRAN;
			}
		}
		return array('FromPCKLSTNO' => $FromPCKLSTNO, 'ToPCKLSTNO' => $ToPCKLSTNO, 'FromCUSNO' => $FromCUSNO, 'ToCUSNO' => $ToCUSNO, 'FromORDNO' => $FromORDNO, 'ToORDNO' => $ToORDNO, 'FromDATE_TRAN' => $FromDATE_TRAN, 'ToDATE_TRAN' => $ToDATE_TRAN);
	}
}

function Search($type, $data) {
	if ($type == 'PrintPCK') {
		$FromSALPERNO = $data['FromSALPERNO'];
		$ToSALPERNO = $data['ToSALPERNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_REQ = $data['FromDATE_REQ'];
		$ToDATE_REQ = $data['ToDATE_REQ'];
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$table1_count = 0;
			$table2_count = 0;
			$table1 = '';
			$table2 = '';
			while ($fetch = mysql_fetch_array($resource)) {
				$ORDNO = $fetch['ORDNO'];
				$query = mysql_query("SELECT PCKLSTNO FROM PCKLST WHERE ORDNO='$ORDNO'");
				if (mysql_num_rows($query) == 0) {
					if ($table1_count == 0) {
						$table1_count = 1;
						$table1 = '<table><tr>將列印揀貨單的訂單 <button id="Check" onclick="Check()">列印</button></tr><tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>運送地編號</th><th>帳單地編號</th><th>銷售員編號</th></tr>';
					}
					$table1 .= '<tr><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ORDTYPE'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['SHIP_ADD_NO'].'</td><td>'.$fetch['BILL_ADD_NO'].'</td><td>'.$fetch['SALPERNO'].'</td></tr>';
				}
				else {
					if ($table2_count == 0) {
						$table2_count = 1;
						$table2 = '<table><tr>已存在揀貨單的訂單 <button id="Reprint" onclick="Reprint()">重印</button></tr><tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>運送地編號</th><th>帳單地編號</th><th>銷售員編號</th></tr>';
					}
					$table2 .= '<tr><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ORDTYPE'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['SHIP_ADD_NO'].'</td><td>'.$fetch['BILL_ADD_NO'].'</td><td>'.$fetch['SALPERNO'].'</td></tr>';
				}
			}
			$table1 .= '</table>';
			$table2 .= '</table>';
			return array($table1, $table2);
		}
	}
	elseif ($type == 'PergePCK') {
		$FromSALPERNO = $data['FromSALPERNO'];
		$ToSALPERNO = $data['ToSALPERNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$FromDATE_REQ = $data['FromDATE_REQ'];
		$ToDATE_REQ = $data['ToDATE_REQ'];
		$resource = mysql_query("SELECT * FROM PCKLST WHERE SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$table = '<table><tr>將作廢的揀貨單</tr><tr><th>揀貨單編號</th><th>訂單編號</th><th>物料編號</th><th>要求數量</th><th>銷售員編號</th><th>顧客編號</th><th>貨品要求運送時間</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYSHIPREQ'].'</td><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['DATE_REQ'].'</td></tr>';
			}
			$table .= '</table>';
			return $table;
		}
	}
	elseif ($type == 'SearchPCK') {
		$FromSALPERNO = $data['FromSALPERNO'];
		$ToSALPERNO = $data['ToSALPERNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$ACTCODE = $data['ACTCODE'];
		$resource = mysql_query("SELECT * FROM PCKLST WHERE SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND ACTCODE='$ACTCODE'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$table = '<table><tr><th>揀貨單編號</th><th>訂單編號</th><th>物料編號</th><th>要求數量</th><th>銷售員編號</th><th>顧客編號</th><th>貨品要求運送時間</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYSHIPREQ'].'</td><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['DATE_REQ'].'</td></tr>';
			}
			$table .= '</table>';
			return $table;
		}
	}
	elseif ($type == 'SearchINV') {
		$FromINVOICENO = $data['FromINVOICENO'];
		$ToINVOICENO = $data['ToINVOICENO'];
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_REQ = $data['FromDATE_REQ'];
		$ToDATE_REQ = $data['ToDATE_REQ'];
		$resource = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO>0 AND INVOICENO>='$FromINVOICENO' AND INVOICENO<='$ToINVOICENO' AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$table = '<table><tr><th>發票編號</th><th>揀貨單編號</th><th>顧客編號</th><th>訂單編號</th><th>物料編號</th><th>貨品要求運送時間</th><th>運送時間</th><th>運送數量</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$fetch['INVOICENO'].'</td><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['DATE_REQ'].'</td><td>'.$fetch['DATE_TRAN'].'</td><td>'.$fetch['QTYTRAN'].'</td></tr>';
			}
			$table .= '</table>';
			return $table;
		}
	}
	elseif ($type == 'PrintINV') {
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_TRAN = $data['FromDATE_TRAN'];
		$ToDATE_TRAN = $data['ToDATE_TRAN'];
		$resource = mysql_query("SELECT * FROM INVOICE WHERE PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_TRAN>='$FromDATE_TRAN' AND DATE_TRAN<='$ToDATE_TRAN'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$table1_count = 0;
			$table2_count = 0;
			$table1 = '';
			$table2 = '';
			while ($fetch = mysql_fetch_array($resource)) {
				if ($fetch['INVOICENO'] == 0) {
					if ($table1_count == 0) {
						$table1_count = 1;
						$table1 = '<table><tr>將列印發票的揀貨單 <button id="Check" onclick="Check()">列印</button></tr><tr><th>揀貨單編號</th><th>顧客編號</th><th>訂單編號</th><th>物料編號</th><th>交易數量</th><th>交易日期</th></tr>';
					}
					$table1 .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['DATE_TRAN'].'</td></tr>';
				}
				else {
					if ($table2_count == 0) {
						$table2_count = 1;
						$table2 = '<table><tr>已存在發票的揀貨單 <button id="Reprint" onclick="Reprint()">重印</button></tr><tr><th>揀貨單編號</th><th>顧客編號</th><th>訂單編號</th><th>物料編號</th><th>交易數量</th><th>交易日期</th></tr>';
					}
					$table2 .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['DATE_TRAN'].'</td></tr>';
				}
			}
			$table1 .= '</table>';
			$table2 .= '</table>';
			return array($table1, $table2);
		}
	}
}

function Check($type, $data) {
	if ($type == 'PrintPCK') {
		$FromSALPERNO = $data['FromSALPERNO'];
		$ToSALPERNO = $data['ToSALPERNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_REQ = $data['FromDATE_REQ'];
		$ToDATE_REQ = $data['ToDATE_REQ'];
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$pdf = array();
			date_default_timezone_set('Asia/Taipei');
			$DATEPRTORG = date("Y-m-d");
			while ($fetch = mysql_fetch_array($resource)) {
				$ORDNO = $fetch['ORDNO'];
				$record = mysql_query("SELECT PCKLSTNO FROM PCKLST WHERE ORDNO='$ORDNO'");
				if (mysql_num_rows($record) == 0) {
					$result = mysql_query("SELECT * FROM ORDMAT WHERE ORDNO='$ORDNO'");
					if (mysql_num_rows($result) != 0) {
						$PCKLSTNO = query_PCKLSTNO($fetch['ORDTYPE']);
						while ($query = mysql_fetch_array($result)) {
							$ORDNO = $fetch['ORDNO'];
							$ITEMNO = $query['ITEMNO'];
							$DATE_REQ = $fetch['DATE_REQ'];
							$QTYORD = $query['QTYORD'];
							$CUSNO = $fetch['CUSNO'];
							$SHIP_ADD_NO = $fetch['SHIP_ADD_NO'];
							$WHOUSE = $query['WHOUSE'];
							$SALPERNO = $fetch['SALPERNO'];
							mysql_query("INSERT INTO PCKLST (PCKLSTNO, ORDNO, ITEMNO, DATE_REQ, QTYSHIPREQ, DATEPRTORG, CUSNO, PRINTAG, SHIP_ADD_NO, WHOUSE, SALPERNO, ACTCODE) VALUES ('$PCKLSTNO', '$ORDNO', '$ITEMNO', '$DATE_REQ', '$QTYORD', '$DATEPRTORG', '$CUSNO', 1, '$SHIP_ADD_NO', '$WHOUSE', '$SALPERNO', 0)");
						}
						array_push($pdf, array('PCKLSTNO' => $PCKLSTNO));
					}
				}
			}
			return $pdf;
		}
	}
	elseif ($type == 'PergePCK') {
		$FromSALPERNO = $data['FromSALPERNO'];
		$ToSALPERNO = $data['ToSALPERNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$FromDATE_REQ = $data['FromDATE_REQ'];
		$ToDATE_REQ = $data['ToDATE_REQ'];
		$resource = mysql_query("SELECT * FROM PCKLST WHERE SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'");
		if (mysql_num_rows($resource) == 0) {
			return -2; // 無資料
		}
		else {
			$sql = "UPDATE PCKLST SET ACTCODE=3 WHERE SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'";
			if (mysql_query($sql)) {
				return 0;
			}
			else {
				return -1;
			}
		}
	}
	elseif ($type == 'PrintINV') {
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_TRAN = $data['FromDATE_TRAN'];
		$ToDATE_TRAN = $data['ToDATE_TRAN'];
		$resource = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO=0 AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_TRAN>='$FromDATE_TRAN' AND DATE_TRAN<='$ToDATE_TRAN' ORDER BY PCKLSTNO ASC, DATE_TRAN ASC");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$pdf = array();
			$PCKLSTNO = '';
			$INVOICENO = '';
			date_default_timezone_set('Asia/Taipei');
			$DATE_L_MNT = date("Y-m-d");
			while ($fetch = mysql_fetch_array($resource)) {
				if ($fetch['PCKLSTNO'] != $PCKLSTNO) {
					$ORDNO = $fetch['ORDNO'];
					$result = mysql_query("SELECT ORDTYPE FROM ORDMAS WHERE ORDNO='$ORDNO'");
					$query = mysql_fetch_array($result);
					$INVOICENO = query_INVOICENO($query['ORDTYPE']);
					$PCKLSTNO = $fetch['PCKLSTNO'];
					mysql_query("UPDATE PCKLST SET ACTCODE=2 WHERE PCKLSTNO='$PCKLSTNO'");
					mysql_query("UPDATE INVOICE SET INVOICENO='$INVOICENO', DATE_L_MNT='$DATE_L_MNT' WHERE PCKLSTNO='$PCKLSTNO'");
					array_push($pdf, array('INVOICENO' => $INVOICENO));
				}
			}
			return $pdf;
		}
	}
}

function Reprint($type, $data) {
	if ($type == 'PrintPCK') {
		$FromSALPERNO = $data['FromSALPERNO'];
		$ToSALPERNO = $data['ToSALPERNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_REQ = $data['FromDATE_REQ'];
		$ToDATE_REQ = $data['ToDATE_REQ'];
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$pdf = array();
			while ($fetch = mysql_fetch_array($resource)) {
				$ORDNO = $fetch['ORDNO'];
				$record = mysql_query("SELECT * FROM PCKLST WHERE ORDNO='$ORDNO'");
				if (mysql_num_rows($record) != 0) {
					$PCKLSTNO = mysql_fetch_array($record);
					array_push($pdf, array("PCKLSTNO" => $PCKLSTNO['PCKLSTNO']));
				}
				$update = mysql_query("UPDATE PCKLST SET PRINTAG=PRINTAG+1 WHERE ORDNO='$ORDNO'");
			}
			return $pdf;
		}
	}
	elseif ($type == 'PrintINV') {
		$FromPCKLSTNO = $data['FromPCKLSTNO'];
		$ToPCKLSTNO = $data['ToPCKLSTNO'];
		$FromCUSNO = $data['FromCUSNO'];
		$ToCUSNO = $data['ToCUSNO'];
		$FromORDNO = $data['FromORDNO'];
		$ToORDNO = $data['ToORDNO'];
		$FromDATE_TRAN = $data['FromDATE_TRAN'];
		$ToDATE_TRAN = $data['ToDATE_TRAN'];
		$resource = mysql_query("SELECT * FROM INVOICENO WHERE INVOICENO>0 AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_TRAN>='$FromDATE_TRAN' AND DATE_TRAN<='$ToDATE_TRAN'");
		if (mysql_num_rows($resource) == 0) {
			return -1; // 無資料
		}
		else {
			$pdf = array();
			while ($fetch = mysql_fetch_array($resource)) {
				array_push($pdf, array('INVOICENO' => $fetch['INVOICENO']));
				$update = mysql_query("UPDATE INVOICE SET PRINTAG=PRINTAG+1 WHERE INVOICENO>0 AND PCKLSTNO>='$FromPCKLSTNO' AND PCKLSTNO<='$ToPCKLSTNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_TRAN>='$FromDATE_TRAN' AND DATE_TRAN<='$ToDATE_TRAN'");
			}
			return $pdf;
		}
	}
}

function query_PCKLSTNO($ORDTYPE) {
	if ($ORDTYPE == 'G') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='PG'";
		$update = "UPDATE CSO_setup SET VALUE=VALUE+1 WHERE TYPENO='PG'";
	}
	elseif ($ORDTYPE == 'S') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='PS'";
		$update = "UPDATE CSO_setup SET VALUE=VALUE+1 WHERE TYPENO='PS'";
	}
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if (mysql_query($update)) {
		return $fetch['VALUE'];
	}
}

function query_INVOICENO($ORDTYPE) {
	if ($ORDTYPE == 'G') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='IG'";
		$update = "UPDATE CSO_setup SET VALUE=VALUE+1 WHERE TYPENO='IG'";
	}
	elseif ($ORDTYPE == 'S') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='IS'";
		$update = "UPDATE CSO_setup SET VALUE=VALUE+1 WHERE TYPENO='IS'";
	}
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if (mysql_query($update)) {
		return $fetch['VALUE'];
	}
}