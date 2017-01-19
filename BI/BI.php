<?
include_once("../resource/database.php");

if ($_POST['module'] == "BI") {
	if ($_POST['event'] == "REG_CITY_ADD") {
		if ($_POST['option'] == "Renew") {
			$sql = "DELETE * FROM REG_CITY_ADD WHERE PRODUCER='U'";
			if (mysql_query($sql)) {
				date_default_timezone_set('Asia/Taipei');
				$PRODUCE_TIME = date("Y-m-d H:i:s");
				$query_1 = "SELECT * FROM INVOICE WHERE INVNO>0 GROUP BY (CUSNO, ADDNO) ASC";
				while ($fetch = mysql_fetch_array($query_1)) {
					mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, $fetch['REGIONNO'], $fetch['CITYNO'], $fetch['CUSNO'], $fetch['ADDNO'], $fetch['SALEAMTMTD'], $fetch['SALEAMTSTD'], $fetch['SALEAMTYTD'], $fetch['SALEAMT'], 'U', $PRODUCE_TIME)");
				}
				$query_2 = "SELECT * FROM INVOICE WHERE INVNO>0 GROUP BY CITYNO ASC";
				while ($fetch = mysql_fetch_array($query_2)) {
					mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (2, $fetch['REGIONNO'], $fetch['CITYNO'], $fetch['SALEAMTMTD'], $fetch['SALEAMTSTD'], $fetch['SALEAMTYTD'], $fetch['SALEAMT'], 'U', $PRODUCE_TIME)");
				}
				$query_3 = "SELECT * FROM INVOICE WHERE INVNO>0 GROUP BY REGIONNO ASC";
				while ($fetch = mysql_fetch_array($query_3)) {
					mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (1, $fetch['REGIONNO'], $fetch['SALEAMTMTD'], $fetch['SALEAMTSTD'], $fetch['SALEAMTYTD'], $fetch['SALEAMT'], 'U', $PRODUCE_TIME)");
				}
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif ($_POST['option'] == "init") {
			$sql = "SELECT * FROM REG_CITY_ADD";
			$result = mysql_query($sql);
			$table = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
			while ($fetch = mysql_fetch_array($result)) {
				$table .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
			}
			$table .= '</table>';
		}
		elseif ($_POST['option'] == "REGIONNO") {
			$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO=$REGIONNO";
		}
		elseif ($_POST['option'] == "CITYNO") {
			$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO=$REGIONNO AND CITYNO=$CITYNO";
		}
		elseif ($_POST['option'] == "ADDNO") {
			$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO=$REGIONNO AND CITYNO=$CITYNO AND CUSNO=$CUSNO AND ADDNO=$ADDNO";
		}
		else {
			echo json_encode(array('state' => 400));
			return;
		}
	}
	elseif ($_POST['event'] == "SLS_CUS_ADD") {
		if ($_POST['option'] == "Renew") {
			$sql = "DELETE * FROM SLS_CUS_ADD WHERE PRODUCER='U'";
			if (mysql_query($sql)) {
				date_default_timezone_set('Asia/Taipei');
				$PRODUCE_TIME = date("Y-m-d H:i:s");
				$query_1 = mysql_query("SELECT * FROM INVOICE WHERE INVNO>0 GROUP BY (CUSNO, ADDNO)");
				while ($fetch = mysql_fetch_array($query_1)) {
					mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, $fetch['SALPERNO'], $fetch['CUSNO'], $fetch['ADDNO'], $fetch['SALEAMTMTD'], $fetch['SALEAMTSTD'], $fetch['SALEAMTYTD'], $fetch['SALEAMT'], 'U', $PRODUCE_TIME)");
				}
				$query_2 = mysql_query("SELECT * FROM INVOICE WHERE INVNO>0 GROUP BY CUSNO");
				while ($fetch = mysql_fetch_array($query_1)) {
					mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (2, $fetch['SALPERNO'], $fetch['CUSNO'], $fetch['SALEAMTMTD'], $fetch['SALEAMTSTD'], $fetch['SALEAMTYTD'], $fetch['SALEAMT'], 'U', $PRODUCE_TIME)");
				}
				$query_3 = mysql_query("SELECT * FROM INVOICE WHERE INVNO>0 GROUP BY SALPERNO");
				while ($fetch = mysql_fetch_array($query_1)) {
					mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (1, $fetch['SALPERNO'], $fetch['SALEAMTMTD'], $fetch['SALEAMTSTD'], $fetch['SALEAMTYTD'], $fetch['SALEAMT'], 'U', $PRODUCE_TIME)");
				}
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif ($_POST['option'] == "init") {
			$sql = "SELECT * FROM SLS_CUS_ADD";
			$result = mysql_query($sql);
			$table = '<table><tr><th>銷售員編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
			while ($fetch = mysql_fetch_array($result)) {
				$table .= '<tr><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
			}
			$table .= '</table>';
		}
		elseif ($_POST['option'] == "SALPERNO") {
			$sql = "SELECT * FROM SLS_CUS_ADD WHERE SALPERNO=$SALPERNO";
		}
		elseif ($_POST['option'] == "CUSNO") {
			$sql = "SELECT * FROM SLS_CUS_ADD WHERE SALPERNO=$SALPERNO AND CUSNO=$CUSNO";
		}
		elseif ($_POST['option'] == "ADDNO") {
			$sql = "SELECT * FROM SLS_CUS_ADD WHERE SALPERNO=$SALPERNO AND CUSNO=$CUSNO AND ADDNO=$ADDNO";
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