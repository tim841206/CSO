<?
include_once("../resource/database.php");

if ($_POST['module'] == "BI") {
	if ($_POST['event'] == "REG_CITY_ADD") {
		if ($_POST['option'] == "Renew") {
			date_default_timezone_set('Asia/Taipei');
			$PRODUCE_TIME = date("Y-m-d");
			$result = Renew_REG_CITY_ADD($PRODUCE_TIME);
			if ($result == 0) {
				echo json_encode(array('state' => $result, 'renew' => $PRODUCE_TIME));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "init") {
			$sql = "SELECT * FROM REG_CITY_ADD";
			if ($result = mysql_query($sql)) {
				if (mysql_num_rows($result) == 0) {
					date_default_timezone_set('Asia/Taipei');
					$PRODUCE_TIME = date("Y-m-d");
					$renew = Renew_REG_CITY_ADD($PRODUCE_TIME);
					if ($renew == 1) {
						echo json_encode(array('state' => 2));
						return;
					}
				}
				$table_month = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				$table_season = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				$table_year = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				$table_ever = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				while ($fetch = mysql_fetch_array($result)) {
					$table_month .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTMTD'].'</td></tr>';
					$table_season .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTSTD'].'</td></tr>';
					$table_year .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTYTD'].'</td></tr>';
					$table_ever .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
				}
				$table_month .= '</table>';
				$table_season .= '</table>';
				$table_year .= '</table>';
				$table_ever .= '</table>';
				echo json_encode(array('state' => 0, 'table_month' => $table_month, 'table_season' => $table_season, 'table_year' => $table_year, 'table_ever' => $table_ever));
				return;
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif ($_POST['option'] == "update") {
			$REGIONNO = $_POST['REGIONNO'];
			$CITYNO = $_POST['CITYNO'];
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			if (empty($REGIONNO)) {
				if (empty($CITYNO)) {
					if (empty($CUSNO) || empty($ADDNO)) {
						// Do nothing
					}
					else {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
					}
				}
				else {
					if (empty($CUSNO) || empty($ADDNO)) {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE CITYNO='$CITYNO'";
					}
					else {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE CITYNO='$CITYNO' AND CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
					}
				}
			}
			else {
				if (empty($CITYNO)) {
					if (empty($CUSNO) || empty($ADDNO)) {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO='$REGIONNO'";
					}
					else {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO='$REGIONNO' AND CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
					}
				}
				else {
					if (empty($CUSNO) || empty($ADDNO)) {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO='$REGIONNO' AND CITYNO='$CITYNO'";
					}
					else {
						$sql = "SELECT * FROM REG_CITY_ADD WHERE REGIONNO='$REGIONNO' AND CITYNO='$CITYNO' AND CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
					}
				}
			}
			if ($result = mysql_query($sql)) {
				if (mysql_num_rows($result) == 0) {
					echo json_encode(array('state' => 2));
					return;
				}
				else {
					$table_month = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					$table_season = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					$table_year = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					$table_ever = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					while ($fetch = mysql_fetch_array($result)) {
						$table_month .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTMTD'].'</td></tr>';
						$table_season .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTSTD'].'</td></tr>';
						$table_year .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTYTD'].'</td></tr>';
						$table_ever .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
					}
					$table_month .= '</table>';
					$table_season .= '</table>';
					$table_year .= '</table>';
					$table_ever .= '</table>';
					echo json_encode(array('state' => 0, 'table_month' => $table_month, 'table_season' => $table_season, 'table_year' => $table_year, 'table_ever' => $table_ever));
					return;
				}
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
	elseif ($_POST['event'] == "SLS_CUS_ADD") {
		if ($_POST['option'] == "Renew") {
			date_default_timezone_set('Asia/Taipei');
			$PRODUCE_TIME = date("Y-m-d");
			$result = Renew_SLS_CUS_ADD($PRODUCE_TIME);
			if ($result == 0) {
				echo json_encode(array('state' => $result, 'renew' => $PRODUCE_TIME));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif ($_POST['option'] == "init") {
			$sql = "SELECT * FROM SLS_CUS_ADD";
			if ($result = mysql_query($sql)) {
				if (mysql_num_rows($result) == 0) {
					date_default_timezone_set('Asia/Taipei');
					$PRODUCE_TIME = date("Y-m-d");
					$renew = Renew_SLS_CUS_ADD($PRODUCE_TIME);
					if ($renew == 1) {
						echo json_encode(array('state' => 2));
						return;
					}
				}
				$table_month = '<table><tr><th>銷售員編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				$table_season = '<table><tr><th>銷售員編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				$table_year = '<table><tr><th>銷售員編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				$table_ever = '<table><tr><th>銷售員編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
				while ($fetch = mysql_fetch_array($result)) {
					$table_month .= '<tr><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTMTD'].'</td></tr>';
					$table_season .= '<tr><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTSTD'].'</td></tr>';
					$table_year .= '<tr><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTYTD'].'</td></tr>';
					$table_ever .= '<tr><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
				}
				$table_month .= '</table>';
				$table_season .= '</table>';
				$table_year .= '</table>';
				$table_ever .= '</table>';
				echo json_encode(array('state' => 0, 'table_month' => $table_month, 'table_season' => $table_season, 'table_year' => $table_year, 'table_ever' => $table_ever));
				return;
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif ($_POST['option'] == "update") {
			$SALPERNO = $_POST['SALPERNO'];
			$CUSNO = $_POST['CUSNO'];
			$ADDNO = $_POST['ADDNO'];
			if (empty($SALPERNO)) {
				if (empty($CUSNO)) {
					// Do nothing
				}
				else {
					if (empty($ADDNO)) {
						$sql = "SELECT * FROM SLS_CUS_ADD WHERE CUSNO='$CUSNO'";
					}
					else {
						$sql = "SELECT * FROM SLS_CUS_ADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
					}
				}
			}
			else {
				if (empty($CUSNO)) {
					$sql = "SELECT * FROM SLS_CUS_ADD WHERE SALPERNO='$SALPERNO'";
				}
				else {
					if (empty($ADDNO)) {
						$sql = "SELECT * FROM SLS_CUS_ADD WHERE SALPERNO='$SALPERNO' AND CUSNO='$CUSNO'";
					}
					else {
						$sql = "SELECT * FROM SLS_CUS_ADD WHERE SALPERNO='$SALPERNO' AND CUSNO='$CUSNO' AND ADDNO='$ADDNO'";
					}
				}
			}
			if ($result = mysql_query($sql)) {
				if (mysql_num_rows($result) == 0) {
					echo json_encode(array('state' => 2));
					return;
				}
				else {
					$table_month = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					$table_season = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					$table_year = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					$table_ever = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
					while ($fetch = mysql_fetch_array($result)) {
						$table_month .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTMTD'].'</td></tr>';
						$table_season .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTSTD'].'</td></tr>';
						$table_year .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMTYTD'].'</td></tr>';
						$table_ever .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
					}
					$table_month .= '</table>';
					$table_season .= '</table>';
					$table_year .= '</table>';
					$table_ever .= '</table>';
					echo json_encode(array('state' => 0, 'table_month' => $table_month, 'table_season' => $table_season, 'table_year' => $table_year, 'table_ever' => $table_ever));
					return;
				}
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

function within_month($date, $now) {
	if ($date[0] == $now[0] && $date[1] == $now[1]) {
		return true;
	}
	else {
		return false;
	}
}

function within_season($date, $now) {
	if ($now[1] >= 1 && $now[1] <= 3) {
		if ($date[0] == $now[0] && $date[1] >= 1 && $date[1] <= 3) {
			return true;
		}
		else {
			return false;
		}
	}
	elseif ($now[1] >= 4 && $now[1] <= 6) {
		if ($date[0] == $now[0] && $date[1] >= 4 && $date[1] <= 6) {
			return true;
		}
		else {
			return false;
		}
	}
	elseif ($now[1] >= 7 && $now[1] <= 9) {
		if ($date[0] == $now[0] && $date[1] >= 7 && $date[1] <= 9) {
			return true;
		}
		else {
			return false;
		}
	}
	elseif ($now[1] >= 10 && $now[1] <= 12) {
		if ($date[0] == $now[0] && $date[1] >= 10 && $date[1] <= 12) {
			return true;
		}
		else {
			return false;
		}
	}
}

function within_year($date, $now) {
	if ($date[0] == $now[0]) {
		return true;
	}
	else {
		return false;
	}
}

function Renew_REG_CITY_ADD($PRODUCE_TIME) {
	$sql = "DELETE FROM REG_CITY_ADD WHERE PRODUCER='U'";
	if (mysql_query($sql)) {
		$NOW = explode('-', $PRODUCE_TIME);
		$query = mysql_query("SELECT * FROM INVOICE GROUP BY CUSNO, SHIP_ADD_NO, REV_CODE ORDER BY CUSNO, SHIP_ADD_NO");
		$CUSNO = '';
		$SHIP_ADD_NO = '';
		while ($fetch = mysql_fetch_array($query)) {
			$DATE_TRAN = explode('-', $fetch['DATE_TRAN']);
			$NET_SALES = $fetch['NET_SALES'];
			if ($fetch['CUSNO'] == $CUSNO && $fetch['SHIP_ADD_NO'] == $SHIP_ADD_NO) {
				if ($fetch['REV_CODE'] == 'C') {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMTMTD=SALEAMTMTD+'$NET_SALES', SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					else {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
				}
				else {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMTMTD=SALEAMTMTD-'$NET_SALES', SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					else {
						mysql_query("UPDATE REG_CITY_ADD SET SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
				}
			}
			else {
				$CUSNO = $fetch['CUSNO'];
				$SHIP_ADD_NO = $fetch['SHIP_ADD_NO'];
				if ($fetch['REV_CODE'] == 'C') {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', '$NET_SALES', '$NET_SALES', '$NET_SALES', '$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', 0, '$NET_SALES', '$NET_SALES', '$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, '$NET_SALES', '$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					else {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, 0, '$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
				}
				else {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', -'$NET_SALES', -'$NET_SALES', -'$NET_SALES', -'$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', 0, -'$NET_SALES', -'$NET_SALES', -'$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, -'$NET_SALES', -'$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					else {
						mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$REGIONNO', '$CITYNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, 0, -'$NET_SALES', 'U', '$PRODUCE_TIME')");
					}
				}
			}
		}
		$query = mysql_query("SELECT REGIONNO, CITYNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT FROM REG_CITY_ADD GROUP BY REGIONNO, CITYNO");
		while ($fetch = mysql_fetch_array($query)) {
			$REGIONNO = $fetch['REGIONNO'];
			$CITYNO = $fetch['CITYNO'];
			$SALEAMTMTD = $fetch['SALEAMTMTD'];
			$SALEAMTSTD = $fetch['SALEAMTSTD'];
			$SALEAMTYTD = $fetch['SALEAMTYTD'];
			$SALEAMT = $fetch['SALEAMT'];
			mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, CITYNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (2, '$REGIONNO', '$CITYNO', '$SALEAMTMTD', '$SALEAMTSTD', '$SALEAMTYTD', '$SALEAMT', 'U', '$PRODUCE_TIME')");
		}
		$query = mysql_query("SELECT REGIONNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT FROM REG_CITY_ADD GROUP BY REGIONNO");
		while ($fetch = mysql_fetch_array($query)) {
			$REGIONNO = $fetch['REGIONNO'];
			$SALEAMTMTD = $fetch['SALEAMTMTD'];
			$SALEAMTSTD = $fetch['SALEAMTSTD'];
			$SALEAMTYTD = $fetch['SALEAMTYTD'];
			$SALEAMT = $fetch['SALEAMT'];
			mysql_query("INSERT INTO REG_CITY_ADD (LEVEL, REGIONNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (1, '$REGIONNO', '$SALEAMTMTD', '$SALEAMTSTD', '$SALEAMTYTD', '$SALEAMT', 'U', '$PRODUCE_TIME')");
		}
		return 0;
	}
	else {
		return 1;
	}
}

function Renew_SLS_CUS_ADD($PRODUCE_TIME) {
	$sql = "DELETE FROM SLS_CUS_ADD WHERE PRODUCER='U'";
	if (mysql_query($sql)) {
		$NOW = explode('-', $PRODUCE_TIME);
		$query = mysql_query("SELECT * FROM INVOICE GROUP BY CUSNO, SHIP_ADD_NO, REV_CODE ORDER BY CUSNO, SHIP_ADD_NO");
		$CUSNO = '';
		$SHIP_ADD_NO = '';
		while ($fetch = mysql_fetch_array($query)) {
			$DATE_TRAN = explode('-', $fetch['DATE_TRAN']);
			$NET_SALES = $fetch['NET_SALES'];
			if ($fetch['CUSNO'] == $CUSNO && $fetch['SHIP_ADD_NO'] == $SHIP_ADD_NO) {
				if ($fetch['REV_CODE'] == 'C') {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMTMTD=SALEAMTMTD+'$NET_SALES', SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMTSTD=SALEAMTSTD+'$NET_SALES', SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMTYTD=SALEAMTYTD+'$NET_SALES', SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					else {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMT=SALEAMT+'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
				}
				else {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMTMTD=SALEAMTMTD-'$NET_SALES', SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMTSTD=SALEAMTSTD-'$NET_SALES', SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMTYTD=SALEAMTYTD-'$NET_SALES', SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
					else {
						mysql_query("UPDATE SLS_CUS_ADD SET SALEAMT=SALEAMT-'$NET_SALES' WHERE CUSNO='$CUSNO' AND ADDNO='$SHIP_ADD_NO'");
					}
				}
			}
			else {
				$CUSNO = $fetch['CUSNO'];
				$SHIP_ADD_NO = $fetch['SHIP_ADD_NO'];
				if ($fetch['REV_CODE'] == 'C') {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 'NET_SALES', 'NET_SALES', 'NET_SALES', 'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 0, 'NET_SALES', 'NET_SALES', 'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, 'NET_SALES', 'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					else {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, 0, 'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
				}
				else {
					if (within_month($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', -'NET_SALES', -'NET_SALES', -'NET_SALES', -'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_season($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 0, -'NET_SALES', -'NET_SALES', -'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					elseif (within_year($DATE_TRAN, $NOW)) {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, -'NET_SALES', -'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
					else {
						mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, ADDNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (3, '$SALPERNO', '$CUSNO', '$SHIP_ADD_NO', 0, 0, 0, -'NET_SALES', 'U', '$PRODUCE_TIME')");
					}
				}
			}
		}
		$query = mysql_query("SELECT SALPERNO, CUSNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT FROM SLS_CUS_ADD GROUP BY SALPERNO, CUSNO");
		while ($fetch = mysql_fetch_array($query)) {
			$SALPERNO = $fetch['SALPERNO'];
			$CUSNO = $fetch['CUSNO'];
			$SALEAMTMTD = $fetch['SALEAMTMTD'];
			$SALEAMTSTD = $fetch['SALEAMTSTD'];
			$SALEAMTYTD = $fetch['SALEAMTYTD'];
			$SALEAMT = $fetch['SALEAMT'];
			mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, CUSNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (2, '$SALPERNO', '$CUSNO', '$SALEAMTMTD', '$SALEAMTSTD', '$SALEAMTYTD', '$SALEAMT', 'U', '$PRODUCE_TIME')");
		}
		$query = mysql_query("SELECT SALPERNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT FROM SLS_CUS_ADD GROUP BY SALPERNO");
		while ($fetch = mysql_fetch_array($query)) {
			$SALPERNO = $fetch['SALPERNO'];
			$SALEAMTMTD = $fetch['SALEAMTMTD'];
			$SALEAMTSTD = $fetch['SALEAMTSTD'];
			$SALEAMTYTD = $fetch['SALEAMTYTD'];
			$SALEAMT = $fetch['SALEAMT'];
			mysql_query("INSERT INTO SLS_CUS_ADD (LEVEL, SALPERNO, SALEAMTMTD, SALEAMTSTD, SALEAMTYTD, SALEAMT, PRODUCER, PRODUCE_TIME) VALUES (1, '$SALPERNO', '$SALEAMTMTD', '$SALEAMTSTD', '$SALEAMTYTD', '$SALEAMT', 'U', '$PRODUCE_TIME')");
		}
		return 0;
	}
	else {
		return 1;
	}
}