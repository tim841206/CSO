<?
if ($_POST['module'] == "BI") {
	if ($_POST['event'] == "REG-CITY-ADD") {
		if ($_POST['option'] == "Renew") {
			$sql = "DELETE * FROM REG-CITY-ADD";
			if (mysql_query($sql)) {
				$sql = "SELECT * FROM INVOICE WHERE INVNO>0";
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
	elseif ($_POST['event'] == "SLS-CUS-ADD") {
		if ($_POST['option'] == "Renew") {
			$sql = "DELETE * FROM SLS-CUS-ADD";
			if (mysql_query($sql)) {
				$sql = "SELECT * FROM INVOICE WHERE INVNO>0";
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
			$sql = "SELECT SALPERNO FROM SLSMAS WHERE SALPERNO=$SALPERNO";
			$result = mysql_query($sql);
			if (mysql_fetch_row($result)) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
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
			$sql = "SELECT CUSNO FROM CUSMAS WHERE CUSNO=$CUSNO";
			$result = mysql_query($sql);
			if (mysql_fetch_row($result)) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
	}
}

function check_CUSNO_exist($CUSNO) {
	$sql = "SELECT CUSNO FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function check_ADDNO($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ADDNO_1'] != $ADDNO && $fetch['ADDNO_2'] != $ADDNO && $fetch['ADDNO_3'] != $ADDNO) {
		return 1; // 不存在
	} 
	else {
		$sql = "SELECT * FROM CUSADD WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
		$result = mysql_query($sql);
		if (mysql_fetch_row($result)) {
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
	$sql = "SELECT * FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	if ($fetch['ADDNO_1'] != $ADDNO && $fetch['ADDNO_2'] != $ADDNO && $fetch['ADDNO_3'] != $ADDNO) {
		return 1; // 不存在
	}
	else {
		$sql = "SELECT ADDNO FROM CUSADDCITY WHERE CUSNO=$CUSNO AND ADDNO=$ADDNO";
		$result = mysql_query($sql);
		if (mysql_fetch_row($result)) {
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
			$sql = "SELECT REGIONNO FROM CUSREGION WHERE REGIONNO=$REGIONNO";
			$result = mysql_query($sql);
			if (mysql_fetch_row($result)) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
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

function check_CITYNO($CITYNO) {
	if (empty($CITYNO)) {
		return 1; // 無輸入
	}
	else {
		if (strlen($CITYNO) > 15) {
			return 2; // 長度超過上限
		}
		else {
			$sql = "SELECT CITYNO FROM CUSCITY WHERE CITYNO=$CITYNO";
			$result = mysql_query($sql);
			if (mysql_fetch_row($result)) {
				return 3; // 已存在
			}
			else {
				return 0; // ok
			}
		}
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

function query_CUSNM($CUSNO) {
	$sql = "SELECT CUSNM FROM CUSMAS WHERE CUSNO=$CUSNO";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_row($result);
	return $fetch[0];
}