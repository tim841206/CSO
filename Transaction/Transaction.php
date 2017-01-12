<?
include_once("../resource/database.php");

if ($_POST['module'] == "Transaction") {
	if ($_POST['event'] == "CreateINV") {
		
	}
	elseif ($_POST['event'] == "PrintINV") {
		
	}
	elseif ($_POST['event'] == "SearchINV") {
		
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
				echo json_encode(array('state' => 0, 'FromSALPERNO' => $result['FromSALPERNO'], 'ToSALPERNO' => $result['ToSALPERNO'], 'FromORDNO' => $result['FromORDNO'], 'FromPCKLSTNO' => $result['FromPCKLSTNO'], 'ToPCKLSTNO' => $result['ToPCKLSTNO']));
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
}

function Search($type, $data) {
	if ($type == 'PrintPCK') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ'] AND ORDCOMPER>=$data['ORDCOMPER']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			$table1 = '<table><tr>將列印揀貨單的訂單</tr><tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>運送地編號</th><th>帳單地編號</th><th>銷售員編號</th></tr>';
			$table2 = '<table><tr>已存在揀貨單的訂單</tr><tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>運送地編號</th><th>帳單地編號</th><th>銷售員編號</th></tr>';
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
}

function Check($type, $data) {
	if ($type == 'PrintPCK') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ'] AND ORDCOMPER>=$data['ORDCOMPER']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($resource)) {
				$record = mysql_query("SELECT PCKLSTNO FROM PCKLST WHERE ORDNO=$fetch['ORDNO']");
				if (mysql_num_rows($query) == 0) {
					$result = mysql_query("SELECT * FROM ORDMAT WHERE ORDNO=$fetch['ORDNO']");
					if (mysql_num_rows($result) != 0) {
						$PCKLSTNO = query_PCKLSTNO(); // 函數未定義
						$PCKINDEX = 0;
						date_default_timezone_set('Asia/Taipei');
						$DATEPRTORG = date("Y-m-d H:i:s");
					}
					while ($query = mysql_fetch_array($result)) {
						$PCKINDEX += 1;
						mysql_query("INSERT INTO PCKLST (PCKLSTNO, PCKINDEX, ORDNO, ITEMNO, DATE_REQ, QTYSHIPREQ, DATEPRTORG, CUSNO, PRINTAG, SHIP_ADD_NO, WHOUSE, LOCNO, SALPERNO, ACTCODE) VALUES ($PCKLSTNO, $PCKINDEX, $fetch['ORDNO'], $query['ITEMNO'], $fetch['DATE_REQ'], $query['QTYORD'], $DATEPRTORG, $fetch['CUSNO'], 1, $fetch['SHIP_ADD_NO'], $query['WHOUSE'], /*LOCNO*/, $fetch['SALPERNO'], 0)");
					}
					// 印
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
}

function Reprint($type, $data) {
	if ($type == 'PrintPCK') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>=$data['FromSALPERNO'] AND SALPERNO<=$data['ToSALPERNO'] AND CUSNO>=$data['FromCUSNO'] AND CUSNO<=$data['ToCUSNO'] AND ORDNO>=$data['FromORDNO'] AND ORDNO<=$data['ToORDNO'] AND DATE_REQ>=$data['FromDATE_REQ'] AND DATE_REQ<=$data['ToDATE_REQ'] AND ORDCOMPER>=$data['ORDCOMPER']");
		if (mysql_num_rows($resource) == 0) {
			return 1; // 無資料
		}
		else {
			while ($fetch = mysql_fetch_array($resource)) {
				$record = mysql_query("SELECT * FROM PCKLST WHERE ORDNO=$fetch['ORDNO']");
				if (mysql_num_rows($record) != 0) {
					// 印
				}
				$update = mysql_query("UPDATE PCKLST SET PRINTAG = PRINTAG+1 WHERE ORDNO=$fetch['ORDNO']");
			}
			return 0;
		}
	}
}