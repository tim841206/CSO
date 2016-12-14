<?
if ($_POST['module'] == "CrossSearchMAS") {
	if ($_POST['event'] == "CUSMASSearchCUSADD") {
		$CUSNO = $_POST['CUSNO'];
		$resource = mysql_query("SELECT * FROM CUSADD WHERE CUSNO=$CUSNO");
		Search("CUSADD", $resource);
	}
	elseif ($_POST['event'] == "CUSREGIONSearchCUSCITY") {
		$REGIONNO = $_POST['REGIONNO'];
		$resource = mysql_query("SELECT * FROM CUSCITY WHERE REGIONNO=$REGIONNO");
		Search("CUSCITY", $resource);
	}
	elseif ($_POST['event'] == "SLSMASSearchCUSMAS") {
		$SALPERNO = $_POST['SALPERNO'];
		$resource = mysql_query("SELECT * FROM CUSMAS WHERE SALPERNO=$SALPERNO");
		Search("CUSMAS", $resource);
	}
	elseif ($_POST['event'] == "CUSCITYSearchCUSADDCITY") {
		$CITYNO = $_POST['CITYNO'];
		$resource = mysql_query("SELECT * FROM CUSADDCITY WHERE CITYNO=$CITYNO");
		Search("CUSADDCITY", $resource);
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

function Search($title, $resource) {
	if (mysql_num_rows($resource) == 0) {
		return 0;
	}
	else {
		$table = '<table>';
		if ($title == "CUSADD") {
			$table .= '<tr><th>顧客編號</th><th>地址編號</th><th>地址 1</th><th>地址 2</th><th>地址 3</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th><th>郵遞區號</th><th>接觸人員</th><th>電話</th><th>傳真</th><th>電子信箱</th><th>建立日期</th><th>最後修改日期</th></tr>';
			while($CUSADD = mysql_fetch_array($resource)){
				$table .= '<tr><td>'.$CUSADD['CUSNO'].'</td><td>'.$CUSADD['ADDNO'].$CUSADD['ADD_1'].'</td><td>'.$CUSADD['ADD_2'].'</td><td>'.$CUSADD['ADD_3'].'</td><td>'.$CUSADD['CITY'].'</td><td>'.$CUSADD['COUNTY'].'</td><td>'.$CUSADD['COUNTRY'].'</td><td>'.$CUSADD['CNTPER'].'</td><td>'.$CUSADD['TEL'].'</td><td>'.$CUSADD['FAX'].'</td><td>'.$CUSADD['EMAIL'].'</td><td>'.$CUSADD['CREATEDATE'].'</td><td>'.$CUSADD['UPDATEDATE'].'</td></tr>';
			}
		}
		elseif ($title == "CUSCITY") {
			$table .= '<tr><th>城市編號</th><th>城市名稱</th><th>所屬廠商暨地區編號</th><th>建立日期</th><th>最後修改日期</th></tr>';
			while($CUSCITY = mysql_fetch_array($resource)){
				$table .= '<tr><td>'.$CUSCITY['CITYNO'].'</td><td>'.$CUSCITY['CITYNM'].$CUSCITY['REGIONNO'].'</td><td>'.$CUSCITY['CREATEDATE'].'</td><td>'.$CUSCITY['UPDATEDATE'].'</td></tr>';
			}
		}
		elseif ($title == "CUSMAS") {
			$table .= '<tr><th>顧客編號</th><th>顧客名稱</th><th>地址編號 1</th><th>地址編號 2</th><th>地址編號 3</th><th>所屬城市</th><th>所屬縣市</th><th>所屬國家</th><th>郵遞區號</th><th>接觸人員</th><th>電話</th><th>傳真</th><th>電子信箱</th><th>網址</th><th>所屬銷售員編號</th><th>預設運送地編號</th><th>預設帳單地編號</th><th>年結帳至今銷售額</th><th>季結帳至今銷售額</th><th>月結帳至今銷售額</th><th>應收帳款</th><th>30~60天應收帳款</th><th>60~90天應收帳款</th><th>90~120天應收帳款</th><th>超過120天應收帳款</th><th>特殊要求</th><th>信用狀態</th><th>統一編號</th></tr>';
			while($CUSMAS = mysql_fetch_array($resource)){
				$table .= '<tr><td>'.$CUSMAS['CUSNO'].'</td><td>'.$CUSMAS['CUSNM'].$CUSMAS['ADDNO_1'].'</td><td>'.$CUSMAS['ADDNO_2'].'</td><td>'.$CUSMAS['ADDNO_3'].'</td><td>'.$CUSMAS['CITY'].'</td><td>'.$CUSMAS['COUNTY'].'</td><td>'.$CUSMAS['COUNTRY'].'</td><td>'.$CUSMAS['ZCODE'].'</td><td>'.$CUSMAS['CNTPER'].'</td><td>'.$CUSMAS['TEL'].'</td><td>'.$CUSMAS['FAX'].'</td><td>'.$CUSMAS['EMAIL'].'</td><td>'.$CUSMAS['WSITE'].'</td><td>'.$CUSMAS['SALPERNO'].'</td><td>'.$CUSMAS['DFSHIPNO'].'</td><td>'.$CUSMAS['DFBILLNO'].'</td><td>'.$CUSMAS['SALEAMTYTD'].'</td><td>'.$CUSMAS['SALEAMTSTD'].'</td><td>'.$CUSMAS['SALEAMTMTD'].'</td><td>'.$CUSMAS['CURAR'].'</td><td>'.$CUSMAS['AR30_60'].'</td><td>'.$CUSMAS['AR60_90'].'</td><td>'.$CUSMAS['AR90_120'].'</td><td>'.$CUSMAS['M120AR'].'</td><td>'.$CUSMAS['SPEINS'].'</td><td>'.$CUSMAS['CREDITSTAT'].'</td><td>'.$CUSMAS['TAXID'].'</td></tr>';
			}
		}
		elseif ($title == "CUSADDCITY") {
			$table .= '<tr><th>顧客編號</th><th>顧客名稱</th><th>地址編號</th><th>所屬城市編號</th><th>建立日期</th><th>最後修改日期</th></tr>';
			while($CUSADDCITY = mysql_fetch_array($resource)){
				$table .= '<tr><td>'.$CUSADDCITY['CUSNO'].'</td><td>'.$CUSADDCITY['CUSNM'].$CUSADDCITY['ADDNO'].'</td><td>'.$CUSADDCITY['CITYNO'].'</td><td>'.$CUSADDCITY['CREATEDATE'].'</td><td>'.$CUSADDCITY['UPDATEDATE'].'</td></tr>';
			}
		}
		return $table;
	}
}