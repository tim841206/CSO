<?
include_once("database.php");

if ($_POST['module'] == "CUSNO_ADDNO") {
	$CUSNO = $_POST['CUSNO'];
	$ADDNO = $_POST['ADDNO'];
	$result = mysql_query("SELECT * FROM CUSADD WHERE ACTCODE=1 AND CUSNO='$CUSNO' AND ADDNO LIKE '$ADDNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>顧客編號</th><th>地址編號</th><th>地址</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th></tr>';
			}
			$table .= '<tr><td>'.$fetch['CUSNO'].'</td><td id="option'.$count.'">'.$fetch['ADDNO'].'</td><td>'.$fetch['ADD_1'].'</td><td>'.$fetch['CITY'].'</td><td>'.$fetch['COUNTY'].'</td><td>'.$fetch['COUNTRY'].'</td><td><button onclick="document.getElementById(\'ADDNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'ADDNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "CITYNO") {
	$CITYNO = $_POST['CITYNO'];
	$result = mysql_query("SELECT * FROM CUSCITY WHERE ACTCODE=1 AND CITYNO LIKE '$CITYNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>城市編號</th><th>城市名稱</th><th>所屬廠商暨地區編號</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['CITYNO'].'</td><td>'.$fetch['CITYNM'].'</td><td>'.$fetch['REGIONNO'].'</td><td><button onclick="document.getElementById(\'CITYNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'CITYNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "REGIONNO") {
	$REGIONNO = $_POST['REGIONNO'];
	$result = mysql_query("SELECT * FROM CUSREGION WHERE ACTCODE=1 AND REGIONNO LIKE '$REGIONNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>廠商暨地區編號</th><th>通路編號</th><th>通路名稱</th><th>廠商公司編號</th><th>廠商公司名稱</th><th>地區編號</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['REGIONNO'].'</td><td>'.$fetch['CHANNELNO'].'</td><td>'.$fetch['CHANNELNM'].'</td><td>'.$fetch['COMPANYNO'].'</td><td>'.$fetch['COMPANYNM'].'</td><td>'.$fetch['DISTRICTNO'].'</td><td><button onclick="document.getElementById(\'REGIONNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'REGIONNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "SALPERNO") {
	$SALPERNO = $_POST['SALPERNO'];
	$result = mysql_query("SELECT * FROM SLSMAS WHERE ACTCODE=1 AND SALPERNO LIKE '$SALPERNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>銷售員編號</th><th>銷售員名稱</th><th>員工編號</th><th>酬勞比率(%)</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['SALPERNO'].'</td><td>'.$fetch['SALPERNM'].'</td><td>'.$fetch['EMPNO'].'</td><td>'.$fetch['COMRATE'].'</td><td><button onclick="document.getElementById(\'SALPERNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'SALPERNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "SALPERNO_CUSNO") {
	$SALPERNO = $_POST['SALPERNO'];
	$CUSNO = $_POST['CUSNO'];
	$result = mysql_query("SELECT * FROM CUSMAS WHERE ACTCODE=1 AND SALPERNO='$SALPERNO' AND CUSNO LIKE '$CUSNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>顧客編號</th><th>顧客名稱</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th><th>所屬銷售員編號</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['CUSNO'].'</td><td>'.$fetch['CUSNM'].'</td><td>'.$fetch['CITY'].'</td><td>'.$fetch['COUNTY'].'</td><td>'.$fetch['COUNTRY'].'</td><td>'.$fetch['SALPERNO'].'</td><td><button onclick="document.getElementById(\'CUSNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'CUSNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "CUSNO_SHIP_ADD_NO") {
	$CUSNO = $_POST['CUSNO'];
	$SHIP_ADD_NO = $_POST['SHIP_ADD_NO'];
	$result = mysql_query("SELECT * FROM CUSADD WHERE ACTCODE=1 AND CUSNO='$CUSNO' AND ADDNO LIKE '$SHIP_ADD_NO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>顧客編號</th><th>地址編號</th><th>地址</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th></tr>';
			}
			$table .= '<tr><td>'.$fetch['CUSNO'].'</td><td id="option'.$count.'">'.$fetch['ADDNO'].'</td><td>'.$fetch['ADD_1'].'</td><td>'.$fetch['CITY'].'</td><td>'.$fetch['COUNTY'].'</td><td>'.$fetch['COUNTRY'].'</td><td><button onclick="document.getElementById(\'ADDNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'SHIP_ADD_NO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "CUSNO_BILL_ADD_NO") {
	$CUSNO = $_POST['CUSNO'];
	$BILL_ADD_NO = $_POST['BILL_ADD_NO'];
	$result = mysql_query("SELECT * FROM CUSADD WHERE ACTCODE=1 AND CUSNO='$CUSNO' AND ADDNO LIKE '$BILL_ADD_NO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>顧客編號</th><th>地址編號</th><th>地址</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th></tr>';
			}
			$table .= '<tr><td>'.$fetch['CUSNO'].'</td><td id="option'.$count.'">'.$fetch['ADDNO'].'</td><td>'.$fetch['ADD_1'].'</td><td>'.$fetch['CITY'].'</td><td>'.$fetch['COUNTY'].'</td><td>'.$fetch['COUNTRY'].'</td><td><button onclick="document.getElementById(\'ADDNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'BILL_ADD_NO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "WHOUSE") {
	$WHOUSE = $_POST['WHOUSE'];
	$result = mysql_query("SELECT * FROM WHOUSE WHERE ACTCODE=0 AND WHOUSE LIKE '$WHOUSE'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>whouse</th><th>descriptor</th><th>inreq_no</th><th>plan_or_no</th><th>pur_or_no</th><th>date_l_mnt</th><th>date_cre</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['whouse'].'</td><td>'.$fetch['descriptor'].'</td><td>'.$fetch['inreq_no'].'</td><td>'.$fetch['plan_or_no'].'</td><td>'.$fetch['pur_or_no'].'</td><td>'.$fetch['date_l_mnt'].'</td><td>'.$fetch['date_cre'].'</td><td><button onclick="document.getElementById(\'WHOUSE\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'WHOUSE\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "WHOUSE_ITEMNO") {
	$WHOUSE = $_POST['WHOUSE'];
	$ITEMNO = $_POST['ITEMNO'];
	$result = mysql_query("SELECT * FROM LOCBAL WHERE ACTCODE=0 AND WHOUSE='$WHOUSE' AND ITEMNO LIKE '$ITEMNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>itemno</th><th>locno</th><th>qtyonhand</th><th>qtyperend</th><th>date_l_mnt</th><th>date_onhnd</th><th>date_fifo</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['itemno'].'</td><td>'.$fetch['locno'].'</td><td>'.$fetch['qtyonhand'].'</td><td>'.$fetch['qtyperend'].'</td><td>'.$fetch['date_l_mnt'].'</td><td>'.$fetch['date_onhnd'].'</td><td>'.$fetch['date_fifo'].'</td><td><button onclick="document.getElementById(\'ITEMNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'ITEMNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "ORDNO_ITEMNO") {
	$ORDNO = $_POST['ORDNO'];
	$ITEMNO = $_POST['ITEMNO'];
	$result = mysql_query("SELECT * FROM ORDMAT WHERE ACTCODE=1 AND ORDNO='$ORDNO' AND ITEMNO LIKE '$ITEMNO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>ITEMNO</th><th>WHOUSE</th><th>ITEMCLASS</th><th>UNI_COST</th><th>BASE_PRICE</th></tr>';
			}
			$table .= '<tr><td id="option'.$count.'">'.$fetch['物料編號'].'</td><td>'.$fetch['倉庫編號'].'</td><td>'.$fetch['物料分類'].'</td><td>'.$fetch['單位成本'].'</td><td>'.$fetch['基本價格'].'</td><td><button onclick="document.getElementById(\'ITEMNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'ITEMNO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "ORDNO_SHIP_ADD_NO") {
	$ORDNO = $_POST['ORDNO'];
	$SHIP_ADD_NO = $_POST['SHIP_ADD_NO'];
	$result = mysql_query("SELECT * FROM CUSADD WHERE ACTCODE=1 AND CUSNO IN (SELECT CUSNO FROM ORDMAS WHERE ORDNO='$ORDNO') AND ADDNO LIKE '$SHIP_ADD_NO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>顧客編號</th><th>地址編號</th><th>地址</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th></tr>';
			}
			$table .= '<tr><td>'.$fetch['CUSNO'].'</td><td id="option'.$count.'">'.$fetch['ADDNO'].'</td><td>'.$fetch['ADD_1'].'</td><td>'.$fetch['CITY'].'</td><td>'.$fetch['COUNTY'].'</td><td>'.$fetch['COUNTRY'].'</td><td><button onclick="document.getElementById(\'ADDNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'SHIP_ADD_NO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
elseif ($_POST['module'] == "ORDNO_BILL_ADD_NO") {
	$ORDNO = $_POST['ORDNO'];
	$BILL_ADD_NO = $_POST['BILL_ADD_NO'];
	$result = mysql_query("SELECT * FROM CUSADD WHERE ACTCODE=1 AND CUSNO IN (SELECT CUSNO FROM ORDMAS WHERE ORDNO='$ORDNO') AND ADDNO LIKE '$BILL_ADD_NO'");
	if (mysql_num_rows($result) == 0) {
		echo json_encode(array('state' => 1));
		return;
	}
	else {
		$count = 0;
		while ($fetch = mysql_fetch_array($result)) {
			$count += 1;
			if ($count == 1) {
				$table = '<br><br><table><tr><th>顧客編號</th><th>地址編號</th><th>地址</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th></tr>';
			}
			$table .= '<tr><td>'.$fetch['CUSNO'].'</td><td id="option'.$count.'">'.$fetch['ADDNO'].'</td><td>'.$fetch['ADD_1'].'</td><td>'.$fetch['CITY'].'</td><td>'.$fetch['COUNTY'].'</td><td>'.$fetch['COUNTRY'].'</td><td><button onclick="document.getElementById(\'ADDNO\').value = document.getElementById(\'option'.$count.'\').innerHTML; CloseModalDialog(); document.getElementById(\'BILL_ADD_NO\').onchange();">選擇</button></td></tr>';
		}
		$table .= '</table>';
		echo json_encode(array('state' => 0, 'wildcard' => $table));
		return;
	}
}
else {
	echo json_encode(array('state' => 400));
	return;
}