<?
include_once("../resource/database.php");

if ($_POST['module'] == "BI") {
	if ($_POST['event'] == "REG_CITY_ADD") {
		if ($_POST['option'] == "Renew") {
			$sql = "DELETE * FROM REG_CITY_ADD WHERE PRODUCER='U'";
			if (mysql_query($sql)) {
				$sql = "SELECT * FROM INVOICE WHERE INVNO>0 ORDER BY DATE_L_MNT DESC";
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif ($_POST['option'] == "init") {
			$sql = "SELECT * FROM REG_CITY_ADD";
			$result = mysql_query($sql);
			$table = '<table><tr><th>銷售員編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
			while ($fetch = mysql_fetch_array($result)) {
				$table .= '<tr><td>'.$fetch['SALPERNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
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
				$sql = "SELECT * FROM INVOICE WHERE INVNO>0 ORDER BY DATE_L_MNT DESC";
			}
			else {
				echo json_encode(array('state' => 1));
				return;
			}
		}
		elseif ($_POST['option'] == "init") {
			$sql = "SELECT * FROM SLS_CUS_ADD";
			$result = mysql_query($sql);
			$table = '<table><tr><th>廠商暨地區編號</th><th>城市編號</th><th>顧客編號</th><th>地址編號</th><th>累積銷售額</th></tr>';
			while ($fetch = mysql_fetch_array($result)) {
				$table .= '<tr><td>'.$fetch['REGIONNO'].'</td><td>'.$fetch['CITYNO'].'</td><td>'.$fetch['CUSNO'].'</td><td>'.$fetch['ADDNO'].'</td><td>'.$fetch['SALEAMT'].'</td></tr>';
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