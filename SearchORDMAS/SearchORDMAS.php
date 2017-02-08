<?
include_once("../resource/database.php");
include_once("../resource/attachment.php");;

if (safe($_POST['module']) == "SearchORDMAS") {
	if (safe($_POST['event']) == "ORDNOSearchORDMAS") {
		$ORDNO = safe($_POST['ORDNO']);
		$result = mysql_query("SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO'");
		if (mysql_num_rows($result) > 0) {
			$fetch = mysql_fetch_array($result);
			if ($fetch['ACTCODE'] == 1) {
				echo json_encode(array('state' => 0, 'ORDTYPE' => $fetch['ORDTYPE'], 'CUSNO' => $fetch['CUSNO'], 'CUS_PO_NO' => $fetch['CUS_PO_NO'], 'SHIP_ADD_NO' => $fetch['SHIP_ADD_NO'], 'BILL_ADD_NO' => $fetch['BILL_ADD_NO'], 'BACKCODE' => $fetch['BACKCODE'], 'INVOICENO' => $fetch['INVOICENO'], 'SALPERNO' => $fetch['SALPERNO'], 'TO_ORD_AMT' => $fetch['TO_ORD_AMT'], 'TO_SHP_AMT' => $fetch['TO_SHP_AMT'], 'ORD_INST' => $fetch['ORD_INST'], 'DATEORDORG' => $fetch['DATEORDORG'], 'ORDCOMPER' => $fetch['ORDCOMPER'], 'ORD_STAT' => $fetch['ORD_STAT'], 'DATE_REQ' => $fetch['DATE_REQ'], 'CREATEDATE' => $fetch['CREATEDATE'], 'UPDATEDATE' => $fetch['UPDATEDATE']));
				return;
			}
			elseif ($fetch['ACTCODE'] == 0) {
				echo json_encode(array('state' => -2));
				return;
			}
		}
		else {
			echo json_encode(array('state' => -1));
			return;
		}
	}
	elseif (safe($_POST['event']) == "ORDNOSearchORDMAT") {
		$ORDNO = safe($_POST['ORDNO']);
		$check = Check("ORDMAS", $ORDNO);
		if ($check != 0) {
			echo json_encode(array('state' => $check));
			return;
		}
		else {
			$resource = mysql_query("SELECT * FROM ORDMAT WHERE ORDNO='$ORDNO' AND ACTCODE=1");
			$result = Search("ORDMAT", $resource);
			if ($result === 0) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'table' => $result));
				return;
			}
		}
	}
	elseif (safe($_POST['event']) == "SLSMASSearchORDMAS") {
		$SALPERNO = safe($_POST['SALPERNO']);
		$check = Check("SLSMAS", $SALPERNO);
		if ($check != 0) {
			echo json_encode(array('state' => $check));
			return;
		}
		else {
			$resource = mysql_query("SELECT * FROM ORDMAS WHERE SALPERNO='$SALPERNO' AND ACTCODE=1");
			$result = Search("ORDMAS", $resource);
			if ($result === 0) {
				echo json_encode(array('state' => -3));
				return;
			}
			else {
				echo json_encode(array('state' => 0, 'table' => $result));
				return;
			}
		}
	}
	elseif (safe($_POST['event']) == "ORDMATSearchORDMAS") {
		$WHOUSE = safe($_POST['WHOUSE']);
		$ITEMNO = safe($_POST['ITEMNO']);
		$resource = mysql_query("SELECT ORDNO FROM ORDMAT WHERE WHOUSE='$WHOUSE' AND ITEMNO='$ITEMNO' AND ACTCODE=1");
		if (mysql_num_rows($resource) == 0) {
			echo json_encode(array('state' => -1));
			return;
		}
		else {
			$resource = mysql_query("SELECT * FROM ORDMAS WHERE ORDNO IN (SELECT ORDNO FROM ORDMAT WHERE WHOUSE='$WHOUSE' AND ITEMNO='$ITEMNO' AND ACTCODE=1) AND ACTCODE=1");
			$result = Search("ORDMAS", $resource);
			echo json_encode(array('state' => 0, 'table' => $result));
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

function Check($master, $value) {
	if ($master == "ORDMAS") {
		$sql = "SELECT * FROM ORDMAS WHERE ORDNO='$value'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			$fetch = mysql_fetch_array($result);
			if ($fetch['ACTCODE'] == 1) {
				return 0; // ok
			}
			else if ($fetch['ACTCODE'] == 0) {
				return -2; // 已刪除
			}
		}
		else {
			return -1; // 不存在
		}
	}
	elseif ($master == "SLSMAS") {
		$sql = "SELECT * FROM SLSMAS WHERE SALPERNO='$value'";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0) {
			$fetch = mysql_fetch_array($result);
			if ($fetch['ACTCODE'] == 1) {
				return 0; // ok
			}
			else if ($fetch['ACTCODE'] == 0) {
				return -2; // 已刪除
			}
		}
		else {
			return -1; // 不存在
		}
	}
}

function Search($title, $resource) {
	if (mysql_num_rows($resource) == 0) {
		return 0; // 無資料
	}
	else {
		$table = '<table>';
		if ($title == "ORDMAT") {
			$table .= '<tr><th>訂單編號</th><th>物料編號</th><th>倉庫編號</th><th>單位成本</th><th>物料分類</th><th>訂單數量</th><th>運送數量</th><th>缺貨數量</th><th>基本價格</th><th>簽約價格</th><th>折扣率</th><th>賣出價格</th><th>總銷售額</th><th>稅狀態碼</th><th>原始訂單開啟日期</th><th>建立日期</th><th>最後修改日期</th></tr>';
			while ($ORDMAT = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$ORDMAT['ORDNO'].'</td><td>'.$ORDMAT['ITEMNO'].'</td><td>'.$ORDMAT['WHOUSE'].'</td><td>'.$ORDMAT['UNI_COST'].'</td><td>'.$ORDMAT['ITEMCLASS'].'</td><td>'.$ORDMAT['QTYORD'].'</td><td>'.$ORDMAT['QTYSHIP'].'</td><td>'.$ORDMAT['QTYBAKORD'].'</td><td>'.$ORDMAT['BASE_PRICE'].'</td><td>'.$ORDMAT['PRICE_CNT'].'</td><td>'.$ORDMAT['PERCENTDIS'].'</td><td>'.$ORDMAT['PRICE_SELL'].'</td><td>'.$ORDMAT['NET_SALES'].'</td><td>'.$ORDMAT['TAX_CODE'].'</td><td>'.$ORDMAT['DATEORDORG'].'</td><td>'.$ORDMAT['CREATEDATE'].'</td><td>'.$ORDMAT['UPDATEDATE'].'</td></tr>';
			}
		}
		elseif ($title == "ORDMAS") {
			$table .= '<tr><th>訂單編號</th><th>訂單種類</th><th>顧客編號</th><th>顧客訂單編號</th><th>運送地編號</th><th>帳單地編號</th><th>缺貨狀態碼</th><th>發票編號</th><th>銷售員編號</th><th>訂單總值</th><th>運送總值</th><th>訂單額外附加指令</th><th>原始訂單開啟日期</th><th>訂單完成百分比</th><th>訂單狀態</th><th>訂單要求完成日期</th><th>建立日期</th><th>最後修改日期</th></tr>';
			while ($ORDMAS = mysql_fetch_array($resource)) {
				$table .= '<tr><td>'.$ORDMAS['ORDNO'].'</td><td>'.$ORDMAS['ORDTYPE'].'</td><td>'.$ORDMAS['CUSNO'].'</td><td>'.$ORDMAS['CUS_PO_NO'].'</td><td>'.$ORDMAS['SHIP_ADD_NO'].'</td><td>'.$ORDMAS['BILL_ADD_NO'].'</td><td>'.$ORDMAS['BACKCODE'].'</td><td>'.$ORDMAS['INVOICENO'].'</td><td>'.$ORDMAS['SALPERNO'].'</td><td>'.$ORDMAS['TO_ORD_AMT'].'</td><td>'.$ORDMAS['TO_SHP_AMT'].'</td><td>'.$ORDMAS['ORD_INST'].'</td><td>'.$ORDMAS['DATEORDORG'].'</td><td>'.$ORDMAS['ORDCOMPER'].'</td><td>'.$ORDMAS['ORD_STAT'].'</td><td>'.$ORDMAS['DATE_REQ'].'</td><td>'.$ORDMAS['CREATEDATE'].'</td><td>'.$ORDMAS['UPDATEDATE'].'</td></tr>';
			}
		}
		$table .= '</table>';
		return $table;
	}
}