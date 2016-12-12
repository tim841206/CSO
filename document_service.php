<?php
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['type']) && !empty($_POST['event'])){
	$content = search_content();
	echo json_encode(array('msg' => 'ok', 'content' => $content));
}
else {
	// error content sent
}

function search_content() {
	$content = "<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>";
	if ($_POST['type'] == 'CreateMAS'){
		if ($_POST['event'] == 'CreateSLSMAS'){
			$content .= "
			<tr><td>SALPERNO</td><td>銷售員編號</td><td>系統生成</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td></td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td></td></tr>
			<tr><td>COMRATE</td><td>酬勞比例</td><td></td><td></td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>刪除碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSMAS'){
			$content .= "
			<tr><td>CUSNO</td><td>顧客編號</td><td>系統生成</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td></td></tr>
			<tr><td>CUSADD_1</td><td>顧客地址編號1</td><td></td><td></td></tr>
			<tr><td>CUSADD_2</td><td>顧客地址編號2</td><td></td><td></td></tr>
			<tr><td>CUSADD_3</td><td>顧客地址編號3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>WSITE</td><td>網址</td><td></td><td></td></tr>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td><td></td><td></td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td></td><td></td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td></td><td></td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td><td></td><td></td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td><td>A</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>TAXID</td><td>統一編號</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>刪除碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSADD'){
			$content .= "
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDRESSNO</td><td>地址編號</td><td></td><td></td></tr>
			<tr><td>ADD_1</td><td>地址1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>地址2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>地址3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>地址所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>地址所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>地址所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>地址所屬郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>地址所屬顧客方接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>地址所屬電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>地址所屬傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>地址所屬電子信箱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>刪除碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSREGION'){
			$content .= "
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td></td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td></td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td></td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td></td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>刪除碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSCITY'){
			$content .= "
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td></td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>刪除碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSADDCITY'){
			$content .= "
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDRESSNO</td><td>運送地編號</td><td></td><td></td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>刪除碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'EditMAS'){

	}
	elseif ($_POST['type'] == 'DeleteMAS'){
		
	}
	elseif ($_POST['type'] == 'ExportMAS'){
		
	}
	elseif ($_POST['type'] == 'SearchMAS'){
		
	}
	elseif ($_POST['type'] == 'CrossSearchMAS'){
		
	}
	elseif ($_POST['type'] == 'ORDMAS'){
		
	}
	elseif ($_POST['type'] == 'SearchORDMAS'){
		
	}
	elseif ($_POST['type'] == 'PublishORDMAS'){
		
	}
	elseif ($_POST['type'] == 'Transaction'){
		
	}
	else {
		// unknown request type
	}
	$content .= "</table>";
	return $content;
}