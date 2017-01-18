<?
include_once("../resource/database.php");

if ($_POST['module'] == "Transaction") {
	if ($_POST['event'] == "CreateINV") {
		if ($_POST['option'] == "PCKLSTNO") {
			$result = check_PCKLSTNO($_POST['PCKLSTNO']);
			if ($result <= 3) {
				echo json_encode(array('state' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'ORDNO' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "ORDNO") {
			$result = check_ORDNO($_POST['ORDNO']);
			if ($result <= 3) {
				echo json_encode(array('state' => $result));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'PCKLSTNO' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "ITEMNO") {
			$result = check_ITEMNO($_POST['PCKLSTNO'], $_POST['ITEMNO']);
			echo json_encode(array('state' => $result));
			return;
		}
	}
	elseif ($_POST['event'] == "PrintINV") {
		if ($_POST['option'] == "init") {
			$result = init('PrintINV');
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromDATE_TRAN' => $result['FromDATE_TRAN'], 'ToDATE_TRAN' => $result['ToDATE_TRAN']));
				return;
			}
		}
		elseif ($_POST['option'] == "Search") {
			$data = array('FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_TRAN' => $_POST['FromDATE_TRAN'], 'ToDATE_TRAN' => $_POST['ToDATE_TRAN']);
			$result = Search('PrintINV', $data);
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'result1' => $result[0], 'result2' => $result[1]));
				return;
			}
		}
		elseif ($_POST['option'] == "Check") {
			$data = array('FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_TRAN' => $_POST['FromDATE_TRAN'], 'ToDATE_TRAN' => $_POST['ToDATE_TRAN']);
			$result = Check('PrintINV', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Reprint") {
			$data = array('FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_TRAN' => $_POST['FromDATE_TRAN'], 'ToDATE_TRAN' => $_POST['ToDATE_TRAN']);
			$result = Reprint('PrintINV', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "SearchINV") {
		if ($_POST['option'] == "init") {
			$result = init('SearchINV');
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'FromINVOICENO' => $result['FromINVOICENO'], 'ToINVOICENO' => $result['ToINVOICENO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromDATE_REQ' => $result['FromDATE_REQ'], 'ToDATE_REQ' => $result['ToDATE_REQ']));
				return;
			}
		}
		elseif ($_POST['option'] == "Search") {
			$data = array('FromINVOICENO' => $_POST['FromINVOICENO'], 'ToINVOICENO' => $_POST['ToINVOICENO'], 'FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Search('SearchINV', $data);
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'result' => $result));
				return;
			}
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "PergePCK") {
		if ($_POST['option'] == "init") {
			$result = init('PergePCK');
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO'], 'FromDATE_REQ' => $result['FromDATE_REQ'], 'ToDATE_REQ' => $result['ToDATE_REQ']));
				return;
			}
		}
		elseif ($_POST['option'] == "Search") {
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Search('PergePCK', $data);
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'result' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "Check") {
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Check('PCK', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "PrintPCK") {
		if ($_POST['option'] == "init") {
			$result = init('PrintPCK');
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromCUSNO' => $result['FromCUSNO'], 'ToCUSNO' => $result['ToCUSNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromDATE_REQ' => $result['FromDATE_REQ'], 'ToDATE_REQ' => $result['ToDATE_REQ']));
				return;
			}
		}
		elseif ($_POST['option'] == "Search") {
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ'], 'ORDCOMPER' => $_POST['ORDCOMPER']);
			$result = Search('PrintPCK', $data);
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'result1' => $result[0], 'result2' => $result[1]));
				return;
			}
		}
		elseif ($_POST['option'] == "Check") {
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ'], 'ORDCOMPER' => $_POST['ORDCOMPER']);
			$result = Check('PrintPCK', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		elseif ($_POST['option'] == "Reprint") {
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ'], 'ORDCOMPER' => $_POST['ORDCOMPER']);
			$result = Reprint('PrintPCK', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "SearchPCK") {
		if ($_POST['option'] == "init") {
			$result = init('SearchPCK');
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromORDNO' => $result['FromORDNO'], 'ToORDNO' => $result['ToORDNO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO']));
				return;
			}
		}
		elseif ($_POST['option'] == "Search") {
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromPCKLSTNO' => $_POST['FromPCKLSTNO'], 'ToPCKLSTNO' => $_POST['ToPCKLSTNO'], 'ACTCODE' => $_POST['ACTCODE']);
			$result = Search('SearchPCK', $data);
			if ($result == 1) {
				echo json_encode(array('state' => 1));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'result' => $result));
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

function check_PCKLSTNO($PCKLSTNO) {
	$sql = "SELECT * FROM PCKLST WHERE PCKLSTNO=$PCKLSTNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result) == 0) {
		return 1; // 不存在
	}
	else {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 2) {
			return 2; // 已完成
		}
		elseif ($fetch['ACTCODE'] == 3) {
			return 3; // 已作廢
		}
		else {
			return $fetch['ORDNO'];
		}
	}
}

function check_ORDNO($ORDNO) {
	$sql = "SELECT * FROM PCKLST WHERE ORDNO=$ORDNO";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result) == 0) {
		return 1; // 不存在
	}
	else {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 2) {
			return 2; // 已完成
		}
		elseif ($fetch['ACTCODE'] == 3) {
			return 3; // 已作廢
		}
		else {
			return $fetch['PCKLSTNO'];
		}
	}
}

function check_ITEMNO($PCKLSTNO, $ITEMNO) {
	$sql = "SELECT * FROM PCKLST WHERE PCKLSTNO=$PCKLSTNO AND ITEMNO=$ITEMNO AND ACTCODE<=1";
	$result = mysql_query($sql);
	if (mysql_fetch_row($result)) {
		return 0; // ok
	}
	else {
		return 1; // 不存在
	}
}

function init($type) {
	$FromSALPERNO = 9999999;
	$ToSALPERNO = 0;
	$FromCUSNO = 9999999;
	$ToCUSNO = 0;
	$FromORDNO = 9999999;
	$ToORDNO = 0;
	$FromPCKLSTNO = 9999999;
	$ToPCKLSTNO = 0;
	$FromDATE_REQ = 9999999;
	$ToDATE_REQ = 0;
	$FromINVOICENO = 9999999;
	$ToINVOICENO = 0;
	$FromDATE_TRAN = 9999999;
	$ToDATE_TRAN = 0;
	if ($type == 'PrintPCK') {
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R'");
		if (mysql_num_rows($result) == 0) {
			return 1; // 無資料
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
			return 1; // 無資料
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
			return 1; // 無資料
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
			return 1; // 無資料
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
			return 1; // 無資料
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
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ'] AND ORDCOMPER>=$data['ORDCOMPER']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			$table1 = '<table><tr>將列印揀貨單的訂單</tr><tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>運送地編號</th><th>帳單地編號</th><th>銷售員編號</th></tr>';
			$table2 = '<table><tr>已存在揀貨單的訂單 <button id="Reprint" onclick="Reprint()"></button></tr><tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>運送地編號</th><th>帳單地編號</th><th>銷售員編號</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				$query = mysql_query("SELECT PCKLSTNO FROM PCKLST WHERE ORDNO=$fetch['ORDNO']");
				if (mysql_num_rows($query) == 0) {
					$table1 .= '<tr><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ORDTYPE'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['SHIP_ADD_NO'].'</td><td>'.$fetch['BILL_ADD_NO'].'</td><td>'.$fetch['SALPERNO'].'</td></tr>';
				}
				else {
					$table2 .= '<tr><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ORDTYPE'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['SHIP_ADD_NO'].'</td><td>'.$fetch['BILL_ADD_NO'].'</td><td>'.$fetch['SALPERNO'].'</td></tr>';
				}
			}
			$table1 .= '</table>';
			$table2 .= '</table>';
			return array($table1, $table2);
		}
	}
	elseif ($type == 'PergePCK') {
		$resource = mysql_query("SELECT * FROM PCKLST WHERE SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			$table = '<table><tr>將作廢的揀貨單</tr><tr><th>揀貨單編號</th><th>訂單編號</th><th>銷售員編號</th><th>顧客編號</th><th>貨品要求運送時間</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['DATE_REQ'].'</td></tr>';
			}
			$table .= '</table>';
			return $table;
		}
	}
	elseif ($type == 'SearchPCK') {
		$resource = mysql_query("SELECT * FROM PCKLST WHERE SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND ACTCODE=$data['ACTCODE']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			$table = '<table><tr><th>揀貨單編號</th><th>訂單編號</th><th>銷售員編號</th><th>顧客編號</th><th>貨品要求運送時間</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['DATE_REQ'].'</td></tr>';
			}
			$table .= '</table>';
			return $table;
		}
	}
	elseif ($type == 'SearchINV') {
		$resource = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO>0 AND INVOICENO>=$data['FromINVOICENO'] AND INVOICENO<=$data['ToINVOICENO'] AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
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
		$resource = mysql_query("SELECT * FROM INVOICE WHERE PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_TRAN>=$data['FromDATE_TRAN'] AND DATE_TRAN<=$data['ToDATE_TRAN']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			$table1 = '<table><tr>將列印發票的揀貨單</tr><tr><th>揀貨單編號</th><th>顧客編號</th><th>訂單編號</th><th>物料編號</th><th>交易數量</th><th>交易日期</th></tr>';
			$table2 = '<table><tr>已存在發票的揀貨單 <button id="Reprint" onclick="Reprint()"></button></tr><tr><th>揀貨單編號</th><th>顧客編號</th><th>訂單編號</th><th>物料編號</th><th>交易數量</th><th>交易日期</th></tr>';
			while ($fetch = mysql_fetch_array($resource)) {
				if ($fetch['INVOICENO'] == 0) {
					$table1 .= '<tr><td>'.$fetch['PCKLSTNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ORDNO'].'</td><td>'.$fetch['ITEMNO'].'</td><td>'.$fetch['QTYTRAN'].'</td><td>'.$fetch['DATE_TRAN'].'</td></tr>';
				}
				else {
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
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ'] AND ORDCOMPER>=$data['ORDCOMPER']");
		if (mysql_num_rows($resource) == 0) {
			return 2; // 無資料
		}
		else {
			date_default_timezone_set('Asia/Taipei');
			$DATEPRTORG = date("Y-m-d");
			while ($fetch = mysql_fetch_array($resource)) {
				$record = mysql_query("SELECT PCKLSTNO FROM PCKLST WHERE ORDNO=$fetch['ORDNO']");
				if (mysql_num_rows($query) == 0) {
					$result = mysql_query("SELECT * FROM ORDMAT WHERE ORDNO=$fetch['ORDNO']");
					if (mysql_num_rows($result) != 0) {
						$PCKLSTNO = query_PCKLSTNO($fetch['ORDTYPE']);
						$PCKINDEX = 0;
						while ($query = mysql_fetch_array($result)) {
							$PCKINDEX += 1;
							mysql_query("INSERT INTO PCKLST (PCKLSTNO, PCKINDEX, ORDNO, ITEMNO, DATE_REQ, QTYSHIPREQ, DATEPRTORG, CUSNO, PRINTAG, SHIP_ADD_NO, WHOUSE, LOCNO, SALPERNO, ACTCODE) VALUES ($PCKLSTNO, $PCKINDEX, $fetch['ORDNO'], $query['ITEMNO'], $fetch['DATE_REQ'], $query['QTYORD'], $DATEPRTORG, $fetch['CUSNO'], 1, $fetch['SHIP_ADD_NO'], $query['WHOUSE'], /*LOCNO*/, $fetch['SALPERNO'], 0)");
						}
						$pdf = curl_init();
						curl_setopt($pdf, CURLOPT_URL, "../resource/pdf.php");
						curl_setopt($pdf, CURLOPT_POST, true);
						curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("ORDNO" => $fetch['ORDNO'], "PCKLSTNO" => $PCKLSTNO)));
						$output = curl_exec($pdf);
						curl_close($pdf);
						if ($output == 1) {
							return 1;
						}
					}
				}
			}
			return 0;
		}
	}
	elseif ($type == 'PergePCK') {
		$resource = mysql_query("SELECT * FROM PCKLST WHERE SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ']");
		if (mysql_num_rows($resource) == 0) {
			return 2; // 無資料
		}
		else {
			$sql = "UPDATE PCKLST SET ACTCODE=3 WHERE SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ']";
			if (mysql_query($sql)) {
				return 0;
			}
			else {
				return 1;
			}
		}
	}
	if ($type == 'PrintINV') {
		$resource = mysql_query("SELECT * FROM INVOICE WHERE INVOICENO=0 AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_TRAN>=$data['FromDATE_TRAN'] AND DATE_TRAN<=$data['ToDATE_TRAN'] ORDER BY PCKLSTNO ASC, DATE_TRAN ASC");
		if (mysql_num_rows($resource) == 0) {
			return 2; // 無資料
		}
		else {
			$PCKLSTNO = '';
			$INVOICENO = '';
			date_default_timezone_set('Asia/Taipei');
			$DATE_L_MNT = date("Y-m-d");
			while ($fetch = mysql_fetch_array($resource)) {
				if ($fetch['PCKLSTNO'] != $PCKLSTNO) {
					$result = mysql_query("SELECT ORDTYPE FROM ORDMAS WHERE ORDNO=$fetch['ORDNO']");
					$query = mysql_fetch_array($result);
					$PCKLSTNO = $fetch['PCKLSTNO'];
					$INVOICENO = query_INVOICENO($query['ORDTYPE']);
					mysql_query("UPDATE INVOICE SET INVOICENO=$INVOICENO, DATE_L_MNT=$DATE_L_MNT WHERE PCKLSTNO=$PCKLSTNO");
					$pdf = curl_init();
					curl_setopt($pdf, CURLOPT_URL, "../resource/pdf.php");
					curl_setopt($pdf, CURLOPT_POST, true);
					curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("PCKLSTNO" => $fetch['PCKLSTNO'], "INVOICENO" => $INVOICENO)));
					$output = curl_exec($pdf);
					curl_close($pdf);
					if ($output == 1) {
						return 1;
					}
				}
			}
			return 0;
		}
	}
}

function Reprint($type, $data) {
	if ($type == 'PrintPCK') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ'] AND ORDCOMPER>=$data['ORDCOMPER']");
		if (mysql_num_rows($resource) == 0) {
			return 2; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($resource)) {
				$record = mysql_query("SELECT * FROM PCKLST WHERE ORDNO=$fetch['ORDNO']");
				if (mysql_num_rows($record) != 0) {
					$pdf = curl_init();
					curl_setopt($pdf, CURLOPT_URL, "../resource/pdf.php");
					curl_setopt($pdf, CURLOPT_POST, true);
					curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("ORDNO" => $fetch['ORDNO'])));
					$output = curl_exec($pdf);
					curl_close($pdf);
					if ($output == 1) {
						return 1;
					}
				}
				$update = mysql_query("UPDATE PCKLST SET PRINTAG = PRINTAG+1 WHERE ORDNO=$fetch['ORDNO']");
			}
			return 0;
		}
	}
	elseif ($type == 'PrintINV') {
		$resource = mysql_query("SELECT * FROM INVOICENO WHERE INVOICENO>0 AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_TRAN>=$data['FromDATE_TRAN'] AND DATE_TRAN<=$data['ToDATE_TRAN']");
		if (mysql_num_rows($resource) == 0) {
			return 2; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($resource)) {
				$pdf = curl_init();
				curl_setopt($pdf, CURLOPT_URL, "../resource/pdf.php");
				curl_setopt($pdf, CURLOPT_POST, true);
				curl_setopt($pdf, CURLOPT_POSTFIELDS, http_build_query(array("INVOICENO" => $fetch['INVOICENO'])));
				$output = curl_exec($pdf);
				curl_close($pdf);
				if ($output == 1) {
					return 1;
				}
				$update = mysql_query("UPDATE INVOICE SET PRINTAG = PRINTAG+1 WHERE INVOICENO>0 AND PCKLSTNO>=$data['FromPCKLSTNO'] AND PCKLSTNO<=$data['ToPCKLSTNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_TRAN>=$data['FromDATE_TRAN'] AND DATE_TRAN<=$data['ToDATE_TRAN']");
			}
			return 0;
		}
	}
}

function query_PCKLSTNO($ORDTYPE) {
	if ($ORDTYPE == 'G') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='PG'";
	}
	elseif ($ORDTYPE == 'S') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='PS'";
	}
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result)
	return $fetch['VALUE'];
}

function query_INVOICENO($ORDTYPE) {
	if ($ORDTYPE == 'G') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='IG'";
	}
	elseif ($ORDTYPE == 'S') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='IS'";
	}
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result)
	return $fetch['VALUE'];
}