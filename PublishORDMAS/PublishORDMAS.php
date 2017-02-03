<?
include_once("../resource/database.php");

if ($_POST['module'] == "PublishORDMAS") {
	if ($_POST['event'] == "C_ORDMAS") {
		if ($_POST['option'] == "init") {
			$result = init('C_ORDMAS');
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
			$result = Search('C_ORDMAS', $data);
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ'], 'ORDCOMPER' => $_POST['ORDCOMPER']);
			$result = Check('C_ORDMAS', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "F_ORDMAS") {
		if ($_POST['option'] == "init") {
			$result = init('F_ORDMAS');
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Search('F_ORDMAS', $data);
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Check('F_ORDMAS', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "R_ORDMAS") {
		if ($_POST['option'] == "init") {
			$result = init('R_ORDMAS');
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Search('R_ORDMAS', $data);
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Check('R_ORDMAS', $data);
			echo json_encode(array('state' => $result));
			return;
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}	
	}
	elseif ($_POST['event'] == "RR_ORDMAS") {
		if ($_POST['option'] == "init") {
			$result = init('RR_ORDMAS');
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Search('RR_ORDMAS', $data);
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
			$data = array('FromSALPERNO' => $_POST['FromSALPERNO'], 'ToSALPERNO' => $_POST['ToSALPERNO'], 'FromCUSNO' => $_POST['FromCUSNO'], 'ToCUSNO' => $_POST['ToCUSNO'], 'FromORDNO' => $_POST['FromORDNO'], 'ToORDNO' => $_POST['ToORDNO'], 'FromDATE_REQ' => $_POST['FromDATE_REQ'], 'ToDATE_REQ' => $_POST['ToDATE_REQ']);
			$result = Check('RR_ORDMAS', $data);
			echo json_encode(array('state' => $result));
			return;
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

function init($type) {
	$FromSALPERNO = 9999999;
	$ToSALPERNO = 0;
	$FromCUSNO = 9999999;
	$ToCUSNO = 0;
	$FromORDNO = 9999999;
	$ToORDNO = 0;
	$FromDATE_REQ = 9999999;
	$ToDATE_REQ = 0;
	if ($type == 'C_ORDMAS') {
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND ACTCODE=1");
	}
	elseif ($type == 'F_ORDMAS') {
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND ACTCODE=1");
	}
	elseif ($type == 'R_ORDMAS') {
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='E' AND ACTCODE=1");
	}
	elseif ($type == 'RR_ORDMAS') {
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='F' AND ACTCODE=1");
	}
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

function Search($type, $data) {
	$FromSALPERNO = $data['FromSALPERNO'];
	$ToSALPERNO = $data['ToSALPERNO'];
	$FromCUSNO = $data['FromCUSNO'];
	$ToCUSNO = $data['ToCUSNO'];
	$FromORDNO = $data['FromORDNO'];
	$ToORDNO = $data['ToORDNO'];
	$FromDATE_REQ = $data['FromDATE_REQ'];
	$ToDATE_REQ = $data['ToDATE_REQ'];
	if ($type == 'C_ORDMAS') {
		$ORDCOMPER = $data['ORDCOMPER'];
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ORDCOMPER>='$ORDCOMPER' AND ACTCODE=1");
	}
	elseif ($type == 'F_ORDMAS') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ACTCODE=1");
	}
	elseif ($type == 'R_ORDMAS') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='E' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ACTCODE=1");
	}
	elseif ($type == 'RR_ORDMAS') {
		$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORD_STAT='F' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ACTCODE=1");
	}
	if (mysql_num_rows($resource) == 0) {
		return 1; // 無資料
	}
	else {
		$table = '<table>';
		$table .= '<tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>顧客訂單編號</th><th>運送地編號</th><th>帳單地編號</th><th>缺貨狀態碼</th><th>發票編號</th><th>銷售員編號</th><th>訂單總值</th><th>運送總值</th><th>訂單額外附加指令</th><th>原始訂單開啟日期</th><th>訂單完成百分比</th><th>訂單狀態</th><th>訂單要求完成日期</th><th>建立日期</th><th>最後修改日期</th></tr>';
		while ($ORDMAS = mysql_fetch_array($resource)) {
			$table .= '<tr><td>'.$ORDMAS['ORDNO'].'</td><td>'.$ORDMAS['ORDTYPE'].'</td><td>'.$ORDMAS['CUSNO'].'</td><td>'.$ORDMAS['CUS_PO_NO'].'</td><td>'.$ORDMAS['SHIP_ADD_NO'].'</td><td>'.$ORDMAS['BILL_ADD_NO'].'</td><td>'.$ORDMAS['BACKCODE'].'</td><td>'.$ORDMAS['INVOICENO'].'</td><td>'.$ORDMAS['SALPERNO'].'</td><td>'.$ORDMAS['TO_ORD_AMT'].'</td><td>'.$ORDMAS['TO_SHP_AMT'].'</td><td>'.$ORDMAS['ORD_INST'].'</td><td>'.$ORDMAS['DATEORDORG'].'</td><td>'.$ORDMAS['ORDCOMPER'].'</td><td>'.$ORDMAS['ORD_STAT'].'</td><td>'.$ORDMAS['DATE_REQ'].'</td><td>'.$ORDMAS['CREATEDATE'].'</td><td>'.$ORDMAS['UPDATEDATE'].'</td></tr>';
		}
		$table .= '</table>';
		return $table;
	}
}

function Check($type, $data) {
	date_default_timezone_set('Asia/Taipei');
	$UPDATEDATE = date("Y-m-d H:i:s");
	$DATEORDORG = date("Y-m-d");
	$FromSALPERNO = $data['FromSALPERNO'];
	$ToSALPERNO = $data['ToSALPERNO'];
	$FromCUSNO = $data['FromCUSNO'];
	$ToCUSNO = $data['ToCUSNO'];
	$FromORDNO = $data['FromORDNO'];
	$ToORDNO = $data['ToORDNO'];
	$FromDATE_REQ = $data['FromDATE_REQ'];
	$ToDATE_REQ = $data['ToDATE_REQ'];
	if ($type == 'C_ORDMAS') {
		$ORDCOMPER = $data['ORDCOMPER'];
		$sql = "UPDATE ORDMAS SET ORD_STAT='C', UPDATEDATE='$UPDATEDATE' WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ORDCOMPER>='$ORDCOMPER' AND ACTCODE=1";
	}
	elseif ($type == 'F_ORDMAS') {
		$sql = "UPDATE ORDMAS SET ORD_STAT='F', UPDATEDATE='$UPDATEDATE' WHERE ORD_STAT='R' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ACTCODE=1";
	}
	elseif ($type == 'R_ORDMAS') {
		$sql = "UPDATE ORDMAS SET ORD_STAT='R', UPDATEDATE='$UPDATEDATE', DATEORDORG='$DATEORDORG' WHERE ORD_STAT='E' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ACTCODE=1";
	}
	elseif ($type == 'RR_ORDMAS') {
		$sql = "UPDATE ORDMAS SET ORD_STAT='R', UPDATEDATE='$UPDATEDATE', DATEORDORG='$DATEORDORG' WHERE ORD_STAT='F' AND SALPERNO>='$FromSALPERNO' AND SALPERNO<='$ToSALPERNO' AND CUSNO>='$FromCUSNO' AND CUSNO<='$ToCUSNO' AND ORDNO>='$FromORDNO' AND ORDNO<='$ToORDNO' AND DATE_REQ>='$FromDATE_REQ' AND DATE_REQ<='$ToDATE_REQ' AND ACTCODE=1";
	}
	if (mysql_query($sql)) {
		return 0;
	}
	else {
		return 1;
	}
}