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
	if ($_POST['type'] == 'CreateMAS'){
		if ($_POST['event'] == 'CreateSLSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td></td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td></td></tr>
			<tr><td>COMRATE</td><td>酬勞比例</td><td></td><td></td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td></td></tr>
			<tr><td>ADDNO_1</td><td>顧客地址編號1</td><td></td><td></td></tr>
			<tr><td>ADDNO_2</td><td>顧客地址編號2</td><td></td><td></td></tr>
			<tr><td>ADDNO_3</td><td>顧客地址編號3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>WSITE</td><td>網址</td><td></td><td></td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td><td></td><td></td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td><td></td><td></td></tr>
			<tr><td>TAXID</td><td>統一編號</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSADD'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>地址2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>地址3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSREGION'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td></td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td></td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td></td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td></td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSADDCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'EditMAS'){
		if ($_POST['event'] == 'EditSLSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td></td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td></td></tr>
			<tr><td>COMRATE</td><td>酬勞比例</td><td></td><td></td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td></td></tr>
			<tr><td>ADDNO_1</td><td>顧客地址編號1</td><td></td><td></td></tr>
			<tr><td>ADDNO_2</td><td>顧客地址編號2</td><td></td><td></td></tr>
			<tr><td>ADDNO_3</td><td>顧客地址編號3</td><td></td><td></td></tr>
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
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td><td></td><td></td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td><td></td><td></td></tr>
			<tr><td>TAXID</td><td>統一編號</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSADD'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>地址2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>地址3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSREGION'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td></td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td></td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td></td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td></td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td></td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSADDCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'DeleteMAS'){
		if ($_POST['event'] == 'DeleteSLSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMRATE</td><td>酬勞比例</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_1</td><td>顧客地址編號1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_2</td><td>顧客地址編號2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_3</td><td>顧客地址編號3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>WSITE</td><td>網址</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td><td></td><td>不可輸入</td></tr>
			<tr><td>TAXID</td><td>統一編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSADD'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>地址2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>地址3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSREGION'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSADDCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'RecoverMAS'){
		if ($_POST['event'] == 'RecoverSLSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMRATE</td><td>酬勞比例</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_1</td><td>顧客地址編號1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_2</td><td>顧客地址編號2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_3</td><td>顧客地址編號3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>WSITE</td><td>網址</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td><td></td><td>不可輸入</td></tr>
			<tr><td>TAXID</td><td>統一編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSADD'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>地址2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>地址3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSREGION'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSADDCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'ExportMAS'){
		
	}
	elseif ($_POST['type'] == 'SearchMAS'){
		if ($_POST['event'] == 'SearchSLSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMRATE</td><td>酬勞比例</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSMAS'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_1</td><td>顧客地址編號1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_2</td><td>顧客地址編號2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO_3</td><td>顧客地址編號3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>WSITE</td><td>網址</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td><td></td><td>不可輸入</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td><td></td><td>不可輸入</td></tr>
			<tr><td>TAXID</td><td>統一編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSADD'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td></td></tr>
			<tr><td>ADD_1</td><td>地址1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>地址2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>地址3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSREGION'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSADDCITY'){
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
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
	elseif ($_POST['type'] == 'BI'){
		
	}
	return $content;
}