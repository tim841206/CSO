<?
if ($_POST['module'] == "ORDMAS") {
	if ($_POST['event'] == "CreateORDMAS") {
		if ($_POST['option'] == "SALPERNO") {
			$result = check_SALPERNO_exist($_POST['SALPERNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CUSNO") {
			$result = check_CUSNO_exist($_POST['SALPERNO'], $_POST['CUSNO']);
			if ($result == 0) {
				$ORDNO = query_ORDNO($_POST['ORDTYPE']);
				echo json_encode(array('state' => $result, 'ORDNO' => $ORDNO));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "ORDNO") {
			$result = check_ORDNO($_POST['ORDNO'], $_POST['ORDTYPE']);
			if ($result == 1) {
				echo json_encode(array('state' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => 2, 'ORDNO' => $result));
				return;
			}
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "CUS_PO_NO") {
			$result = check_50($_POST['CUSNO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "SHIP_ADD_NO") {
			$result = check_ADDNO_exist($_POST['CUSNO'], $_POST['SHIP_ADD_NO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "BILL_ADD_NO") {
			$result = check_ADDNO_exist($_POST['CUSNO'], $_POST['BILL_ADD_NO']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ORD_INST") {
			$result = check_50($_POST['ORD_INST']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "DATE_REQ") {
			$result = check_notnull($_POST['DATE_REQ']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Create") {
			
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "CreateORDMAT") {
		if ($_POST['option'] == "ORDNO") {
			
		}
		elseif ($_POST['option'] == "WHOUSE") {
			$result = check_WHOUSE_exist($_POST['WHOUSE']);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "ITEMNO") {
			
		}
		elseif ($_POST['option'] == "QTYORD") {
			
		}
		elseif ($_POST['option'] == "PRICE_CNT") {
			
		}
		elseif ($_POST['option'] == "PERCENTDIS") {
			
		}
		elseif ($_POST['option'] == "Create") {
			
		}
		else {
			echo json_encode(array('state' => 400));
    		return;
		}
	}
	elseif ($_POST['event'] == "EditORDMAS") {
		
	}
	elseif ($_POST['event'] == "EditORDMAT") {
		
	}
	elseif ($_POST['event'] == "DeleteORDMAS") {
		
	}
	elseif ($_POST['event'] == "DeleteORDMAT") {
		
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

function notnull($value) {
	if (empty($value)) {
		return 1; // 無輸入
	}
	else {
		return 0; // ok
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

function check_CUSNO_exist($SALPERNO, $CUSNO) {
	$sql = "SELECT CUSNO FROM CUSMAS WHERE CUSNO=$CUSNO AND SALPERNO=$SALPERNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO_exist($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ADDNO_1'] != $ADDNO && $fetch['ADDNO_2'] != $ADDNO && $fetch['ADDNO_3'] != $ADDNO) {
		return 1; // 不存在
	} 
	else {
		return 0; // ok
	}
}

function check_ORDNO($ORDNO, $ORDTYPE) {
	$sql = "SELECT ORDNO FROM ORDMAS WHERE ORDNO=$ORDNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result)
	if ($fetch['ACTCODE'] == 0) {
		return 1; // 已刪除
	}
	else {
		return query_ORDNO($ORDTYPE); // 還原
	}
}
function query_ORDNO($ORDTYPE) {
	if ($ORDTYPE == 'G') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='OG'";
	}
	elseif ($ORDTYPE == 'S') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='OS'";
	}
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result)
	return $fetch['VALUE'];
}

function check_WHOUSE_exist($WHOUSE) {
	$sql = "SELECT WHOUSE FROM WAREHOUSE WHERE WHOUSE=$WHOUSE";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}