<?php
header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['type']) && !empty($_POST['event'])) {
	$return = search_content();
	echo json_encode(array('msg' => 'ok', 'title' => $return['title'], 'content' => $return['content']));
}
else {
	echo json_encode(array('msg' => 'Invalid Access!'));
}

function search_content() {
	if ($_POST['type'] == 'CreateMAS') {
		if ($_POST['event'] == 'CreateSLSMAS') {
			$title = "新增銷售員";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td></td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td></td></tr>
			<tr><td>COMRATE</td><td>酬勞比率(%)</td><td></td><td></td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSMAS') {
			$title = "新增顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td></td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>WSITE</td><td>網址</td><td></td><td></td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td><td>1</td><td>不可輸入、不會顯示</td></tr>
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
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSADD') {
			$title = "新增顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址 1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>地址 2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>地址 3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSREGION') {
			$title = "新增顧客地區";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td></td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td></td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td></td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td></td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSCITY') {
			$title = "新增顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateCUSADDCITY') {
			$title = "新增顧客地址城市關聯";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'EditMAS') {
		if ($_POST['event'] == 'EditSLSMAS') {
			$title = "修改銷售員";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td></td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td></td></tr>
			<tr><td>COMRATE</td><td>酬勞比率(%)</td><td></td><td></td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSMAS') {
			$title = "修改顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td></td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td><td></td><td></td></tr>
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
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSADD') {
			$title = "修改顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址 1</td><td></td><td></td></tr>
			<tr><td>ADD_2</td><td>地址 2</td><td></td><td></td></tr>
			<tr><td>ADD_3</td><td>地址 3</td><td></td><td></td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td></td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td></td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td></td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td></td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td></td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td></td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td></td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSREGION') {
			$title = "修改顧客地區";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td><td></td><td></td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td><td></td><td></td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td><td></td><td></td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td><td></td><td></td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td><td></td><td></td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSCITY') {
			$title = "修改顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td></td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditCUSADDCITY') {
			$title = "修改顧客地址城市關聯";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'DeleteMAS') {
		if ($_POST['event'] == 'DeleteSLSMAS') {
			$title = "刪除銷售員";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMRATE</td><td>酬勞比率(%)</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSMAS') {
			$title = "刪除顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td><td></td><td>不可輸入</td></tr>
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
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSADD') {
			$title = "刪除顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址 1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>地址 2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>地址 3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSREGION') {
			$title = "刪除顧客地區";
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
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSCITY') {
			$title = "刪除顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteCUSADDCITY') {
			$title = "刪除顧客地址城市關聯";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'RecoverMAS') {
		if ($_POST['event'] == 'RecoverSLSMAS') {
			$title = "恢復銷售員";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMRATE</td><td>酬勞比率(%)</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSMAS') {
			$title = "恢復顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td><td></td><td>不可輸入</td></tr>
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
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSADD') {
			$title = "恢復顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>ADD_1</td><td>地址 1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>地址 2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>地址 3</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITY</td><td>所屬城市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td><td></td><td>不可輸入</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td><td></td><td>不可輸入</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td><td></td><td>不可輸入</td></tr>
			<tr><td>TEL</td><td>電話</td><td></td><td>不可輸入</td></tr>
			<tr><td>FAX</td><td>傳真</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSREGION') {
			$title = "恢復顧客地區";
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
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSCITY') {
			$title = "恢復顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverCUSADDCITY') {
			$title = "恢復顧客地址城市關聯";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td>支援萬用卡</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'ExportMAS') {
		if ($_POST['event'] == 'ExportCUSADD') {
			$title = "輸出顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td></tr>
			<tr><td>ADD_1</td><td>地址 1</td></tr>
			<tr><td>ADD_2</td><td>地址 2</td></tr>
			<tr><td>ADD_3</td><td>地址 3</td></tr>
			<tr><td>CITY</td><td>所屬城市</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td></tr>
			<tr><td>TEL</td><td>電話</td></tr>
			<tr><td>FAX</td><td>傳真</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'ExportCUSCITY') {
			$title = "輸出顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'ExportCUSMAS') {
			$title = "輸出顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td></tr>
			<tr><td>CITY</td><td>所屬城市</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td></tr>
			<tr><td>TEL</td><td>電話</td></tr>
			<tr><td>FAX</td><td>傳真</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td></tr>
			<tr><td>WSITE</td><td>網址</td></tr>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td></tr>
			<tr><td>TAXID</td><td>統一編號</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'ExportCUSREGION') {
			$title = "輸出顧客地區";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td></tr>
			<tr><td>CHANNELNO</td><td>通路編號</td></tr>
			<tr><td>CHANNELNM</td><td>通路名稱</td></tr>
			<tr><td>COMPANYNO</td><td>廠商公司編號</td></tr>
			<tr><td>COMPANYNM</td><td>廠商公司名稱</td></tr>
			<tr><td>DISTRICTNO</td><td>地區編號</td></tr>
			<tr><td>DESCRIPTION</td><td>敘述</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'ExportSLSMAS') {
			$title = "輸出銷售員";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td></tr>
			<tr><td>COMRATE</td><td>酬勞比率(%)</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'SearchMAS') {
		if ($_POST['event'] == 'SearchSLSMAS') {
			$title = "查詢銷售員";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>SALPERNM</td><td>銷售員名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>EMPNO</td><td>員工編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>COMRATE</td><td>酬勞比率(%)</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>本年累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>本季累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>本月累計銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSMAS') {
			$title = "查詢顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td><td></td><td>不可輸入</td></tr>
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
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSADD') {
			$title = "查詢顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td></td></tr>
			<tr><td>ADD_1</td><td>地址 1</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_2</td><td>地址 2</td><td></td><td>不可輸入</td></tr>
			<tr><td>ADD_3</td><td>地址 3</td><td></td><td>不可輸入</td></tr>
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
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSREGION') {
			$title = "查詢顧客地區";
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
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSCITY') {
			$title = "查詢顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td></td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchCUSADDCITY') {
			$title = "查詢顧客地址城市關聯";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></td><td></td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td><td></td><td>不可輸入</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td></td><td>不可輸入</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'CrossSearchMAS') {
		if ($_POST['event'] == 'CUSCITYSearchCUSADDCITY') {
			$title = "顧客城市查詢顧客地址城市關聯";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td></tr>
			<tr><td>CITYNO</td><td>城市編號</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CUSMASSearchCUSADD') {
			$title = "顧客查詢顧客地址";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>ADDNO</td><td>地址編號</td></tr>
			<tr><td>ADD_1</td><td>地址 1</td></tr>
			<tr><td>ADD_2</td><td>地址 2</td></tr>
			<tr><td>ADD_3</td><td>地址 3</td></tr>
			<tr><td>CITY</td><td>所屬城市</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td></tr>
			<tr><td>CNTPER</td><td>接觸人員</td></tr>
			<tr><td>TEL</td><td>電話</td></tr>
			<tr><td>FAX</td><td>傳真</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CUSREGIONSearchCUSCITY') {
			$title = "顧客地區查詢顧客城市";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CITYNO</td><td>城市編號</td></tr>
			<tr><td>CITYNM</td><td>城市名稱</td></tr>
			<tr><td>REGIONNO</td><td>所屬廠商暨地區編號</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SLSMASSearchCUSMAS') {
			$title = "銷售員查詢顧客";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>CUSNM</td><td>顧客名稱</td></tr>
			<tr><td>ADD_1</td><td>顧客地址 1</td></tr>
			<tr><td>ADD_2</td><td>顧客地址 2</td></tr>
			<tr><td>ADD_3</td><td>顧客地址 3</td></tr>
			<tr><td>CITY</td><td>所屬城市</td></tr>
			<tr><td>COUNTY</td><td>所屬縣市</td></tr>
			<tr><td>COUNTRY</td><td>所屬國家</td></tr>
			<tr><td>ZCODE</td><td>郵遞區號</td></tr>
			<tr><td>CNTPER</td><td>顧客方接觸人員</td></tr>
			<tr><td>TEL</td><td>電話</td></tr>
			<tr><td>FAX</td><td>傳真</td></tr>
			<tr><td>EMAIL</td><td>電子信箱</td></tr>
			<tr><td>WSITE</td><td>網址</td></tr>
			<tr><td>SALPERNO</td><td>所屬銷售員編號</td></tr>
			<tr><td>DFSHIPNO</td><td>預設運送地編號</td></tr>
			<tr><td>DFBILLNO</td><td>預設帳單地編號</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td></tr>
			<tr><td>CURAR</td><td>至今期間之應收帳款</td></tr>
			<tr><td>AR30-60</td><td>30-60天之應收帳款</td></tr>
			<tr><td>AR60-90</td><td>60-90天之應收帳款</td></tr>
			<tr><td>AR90-120</td><td>90-120天之應收帳款</td></tr>
			<tr><td>M120AR</td><td>超過120天之應收帳款</td></tr>
			<tr><td>SPEINS</td><td>顧客特殊要求</td></tr>
			<tr><td>CREDITSTAT</td><td>信用狀態</td></tr>
			<tr><td>TAXID</td><td>統一編號</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'ORDMAS') {
		if ($_POST['event'] == 'CreateORDMAS') {
			$title = "新增訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td>系統自動生成</td><td></td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td></td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td><td></td><td></td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td></td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td><td></td><td></td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td><td></td><td></td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td><td></td><td></td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td><td></td><td></td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'CreateORDMAT') {
			$title = "新增訂單物料";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>WHOUSE</td><td>倉庫編號</td><td></td><td></td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td><td></td><td></td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td><td></td><td>不可輸入</td></tr>
			<tr><td>UNI_COST</td><td>單位成本</td><td></td><td>不可輸入</td></tr>
			<tr><td>QTYORD</td><td>訂購數量</td><td></td><td></td></tr>
			<tr><td>QTYSHIP</td><td>運送數量</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>QTYBAKORD</td><td>要求數量</td><td></td><td></td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>PRICE_CNT</td><td>簽約價格</td><td></td><td></td></tr>
			<tr><td>PERCENTDIS</td><td>折扣率(%)</td><td></td><td></td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td><td></td><td></td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td><td></td><td>不可輸入</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteORDMAS') {
			$title = "刪除訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td><td></td><td>不可輸入</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td><td></td><td>不可輸入</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td><td></td><td>不可輸入</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td><td>E</td><td>不可輸入</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'DeleteORDMAT') {
			$title = "刪除訂單物料";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td><td></td><td></td></tr>
			<tr><td>WHOUSE</td><td>倉庫編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td><td></td><td>不可輸入</td></tr>
			<tr><td>UNI_COST</td><td>單位成本</td><td></td><td>不可輸入</td></tr>
			<tr><td>QTYORD</td><td>訂購數量</td><td></td><td>不可輸入</td></tr>
			<tr><td>QTYSHIP</td><td>運送數量</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>QTYBAKORD</td><td>要求數量</td><td></td><td>不可輸入</td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>PRICE_CNT</td><td>簽約價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>PERCENTDIS</td><td>折扣率(%)</td><td></td><td>不可輸入</td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td><td></td><td>不可輸入</td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td><td></td><td>不可輸入</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditORDMAS') {
			$title = "修改訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td><td></td><td>不可輸入</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td><td></td><td></td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td><td></td><td></td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td><td></td><td></td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td><td></td><td></td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td><td>E</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td><td></td><td></td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'EditORDMAT') {
			$title = "修改訂單物料";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td><td></td><td></td></tr>
			<tr><td>WHOUSE</td><td>倉庫編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td><td></td><td>不可輸入</td></tr>
			<tr><td>UNI_COST</td><td>單位成本</td><td></td><td>不可輸入</td></tr>
			<tr><td>QTYORD</td><td>訂購數量</td><td></td><td></td></tr>
			<tr><td>QTYSHIP</td><td>運送數量</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>QTYBAKORD</td><td>要求數量</td><td></td><td>不可輸入</td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>PRICE_CNT</td><td>簽約價格</td><td></td><td></td></tr>
			<tr><td>PERCENTDIS</td><td>折扣率(%)</td><td></td><td></td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td><td></td><td></td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td><td></td><td>不可輸入</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>1</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverORDMAS') {
			$title = "恢復訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td><td></td><td>不可輸入</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td><td></td><td>不可輸入</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></td><td>不可輸入</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td><td></td><td>不可輸入</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td><td>E</td><td>不可輸入</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'RecoverORDMAT') {
			$title = "恢復訂單物料";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td><td></td><td></td></tr>
			<tr><td>WHOUSE</td><td>倉庫編號</td><td></td><td>不可輸入</td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td><td></td><td>不可輸入</td></tr>
			<tr><td>UNI_COST</td><td>單位成本</td><td></td><td>不可輸入</td></tr>
			<tr><td>QTYORD</td><td>訂購數量</td><td></td><td>不可輸入</td></tr>
			<tr><td>QTYSHIP</td><td>運送數量</td><td>0</td><td>不可輸入</td></tr>
			<tr><td>QTYBAKORD</td><td>要求數量</td><td></td><td>不可輸入</td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>PRICE_CNT</td><td>簽約價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>PERCENTDIS</td><td>折扣率(%)</td><td></td><td>不可輸入</td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td><td></td><td>不可輸入</td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td><td></td><td>不可輸入</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td><td></td><td>不可輸入</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td><td></td><td>不可輸入</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td><td>現在時間</td><td>不可輸入</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'SearchORDMAS') {
		if ($_POST['event'] == 'ORDMATSearchORDMAS') {
			$title = "訂單物料查詢訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'ORDNOSearchORDMAS') {
			$title = "訂單編號查詢訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'ORDNOSearchORDMAT') {
			$title = "訂單編號查詢訂單物料";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td></tr>
			<tr><td>WHOUSE</td><td>倉庫編號</td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td></tr>
			<tr><td>UNI_COST</td><td>單位成本</td></tr>
			<tr><td>QTYORD</td><td>訂購數量</td></tr>
			<tr><td>QTYSHIP</td><td>運送數量</td></tr>
			<tr><td>QTYBAKORD</td><td>要求數量</td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td></tr>
			<tr><td>PRICE_CNT</td><td>簽約價格</td></tr>
			<tr><td>PERCENTDIS</td><td>折扣率(%)</td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SLSMASSearchORDMAS') {
			$title = "銷售員查詢訂單主檔";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ORDTYPE</td><td>訂單種類</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>CUS_PO_NO</td><td>顧客訂單編號</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td></tr>
			<tr><td>BACKCODE</td><td>缺貨狀態碼</td></tr>
			<tr><td>INVOICENO</td><td>發票編號</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>TO_ORD_AMT</td><td>訂單總值</td></tr>
			<tr><td>TO_SHP_AMT</td><td>運送總值</td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td></tr>
			<tr><td>ORD_INST</td><td>訂單額外附加指令</td></tr>
			<tr><td>DATEORDORG</td><td>原始訂單開啟日期</td></tr>
			<tr><td>ORDCOMPER</td><td>訂單完成百分比</td></tr>
			<tr><td>ORD_STAT</td><td>訂單狀態</td></tr>
			<tr><td>DATE_REQ</td><td>訂單需要完成期限</td></tr>
			<tr><td>CREATEDATE</td><td>建立日期</td></tr>
			<tr><td>UPDATEDATE</td><td>最後修改日期</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'PublishORDMAS') {
		if ($_POST['event'] == 'C_ORDMAS') {
			$title = "正常關閉訂單";
			$content = "";
		}
		elseif ($_POST['event'] == 'F_ORDMAS') {
			$title = "強制關閉訂單";
			$content = "";
		}
		elseif ($_POST['event'] == 'R_ORDMAS') {
			$title = "發佈訂單";
			$content = "";
		}
		elseif ($_POST['event'] == 'RR_ORDMAS') {
			$title = "重生訂單";
			$content = "";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'Transaction') {
		if ($_POST['event'] == 'CreateINV') {
			$title = "新增發票";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>INVOICENO</td><td>發票編號</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>PCKLSTNO</td><td>揀貨單編號</td><td></td><td></td></tr>
			<tr><td>ORDNO</td><td>訂單編號</td><td></td><td></td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td><td></td><td></td></tr>
			<tr><td>DATE_TRAN</td><td>交易日期</td><td></td><td></td></tr>
			<tr><td>UNI_COST</td><td>單位成本</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>QTYTRAN</td><td>交易數量</td><td></td><td></td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>PRICE_CNT</td><td>簽約價格</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>PERCENTDIS</td><td>折扣率(%)</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>DATE_REQ</td><td>訂單要求完成日期</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td><td></td><td>不可輸入、不會顯示</td></tr>
			<tr><td>REV_CODE</td><td>倒置碼</td><td></td><td></td></tr>
			<tr><td>DATE_L_MNT</td><td>最後更新日期</td><td>現在日期</td><td>不可輸入、不會顯示</td></tr>
			<tr><td>PRINTAG</td><td>印製次數</td><td>0</td><td>不可輸入、不會顯示</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'PergePCK') {
			$title = "作廢揀貨單";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>PCKLSTNO</td><td>揀貨單編號</td></tr>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td></tr>
			<tr><td>QTYSHIPREQ</td><td>要求數量</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>DATE_REQ</td><td>貨品要求運送時間</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'PrintINV') {
			$title = "列印發票";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>INVOICENO</td><td>發票編號</td></tr>
			<tr><td>PCKLSTNO</td><td>揀貨單編號</td></tr>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td></tr>
			<tr><td>DATE_TRAN</td><td>交易日期</td></tr>
			<tr><td>ITEMCLASS</td><td>物料分類</td></tr>
			<tr><td>QTYTRAN</td><td>交易數量</td></tr>
			<tr><td>BASE_PRICE</td><td>基本價格</td></tr>
			<tr><td>PRICE_SELL</td><td>賣出價格</td></tr>
			<tr><td>NET_SALES</td><td>銷售總額</td></tr>
			<tr><td>TAX_CODE</td><td>稅狀態碼</td></tr>
			<tr><td>DATE_REQ</td><td>訂單要求完成日期</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td></tr>
			<tr><td>BILL_ADD_NO</td><td>帳單地編號</td></tr>
			<tr><td>REV_CODE</td><td>倒置碼</td></tr>
			<tr><td>DATE_L_MNT</td><td>最後更新日期</td></tr>
			<tr><td>PRINTAG</td><td>印製次數</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'PrintPCK') {
			$title = "列印揀貨單";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>PCKLSTNO</td><td>揀貨單編號</td></tr>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td></tr>
			<tr><td>DATE_REQ</td><td>訂單要求完成日期</td></tr>
			<tr><td>QTYSHIPREQ</td><td>要求數量</td></tr>
			<tr><td>DATEPRTORG</td><td>印製時間</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>PRINTAG</td><td>印製次數</td></tr>
			<tr><td>DATE_SHIP</td><td>運送日期</td></tr>
			<tr><td>SHIP_ADD_NO</td><td>運送地編號</td></tr>
			<tr><td>WHOUSE</td><td>倉庫編號</td></tr>
			<tr><td>LOCNO</td><td>存貨位置編號</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>ACTCODE</td><td>狀態碼</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchINV') {
			$title = "查詢發票";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>INVOICENO</td><td>發票編號</td></tr>
			<tr><td>PCKLSTNO</td><td>揀貨單編號</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td></tr>
			<tr><td>DATE_REQ</td><td>貨品要求運送時間</td></tr>
			<tr><td>DATE_TRAN</td><td>運送時間</td></tr>
			<tr><td>QTYTRAN</td><td>運送數量</td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SearchPCK') {
			$title = "查詢揀貨單";
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>PCKLSTNO</td><td>揀貨單編號</td></tr>
			<tr><td>ORDNO</td><td>訂單編號</td></tr>
			<tr><td>ITEMNO</td><td>物料編號</td></tr>
			<tr><td>QTYSHIPREQ</td><td>要求數量</td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td></tr>
			<tr><td>DATE_REQ</td><td>貨品要求運送時間</td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	elseif ($_POST['type'] == 'BI') {
		if ($_POST['event'] == 'REG-CITY-ADD') {
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td></tr></th>
			<tr><td>LEVEL</td><td>階層</td><td></tr>
			<tr><td>REGIONNO</td><td>廠商暨地區編號</td><td></tr>
			<tr><td>CITYNO</td><td>城市編號</td><td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></tr>
			<tr><td>SALEAMT</td><td>累積銷售額</td><td></tr>
			<tr><td>PRODUCER</td><td>產生者</td><td></tr>
			<tr><td>PRODUCE_TIME</td><td>產生日期</td><td></tr>
			</table>
			";
		}
		elseif ($_POST['event'] == 'SLS-CUS-ADD') {
			$content = "
			<table><th><tr><td>欄位</td><td>名稱</td><td>限制</td><td>備註</td></tr></th>
			<tr><td>LEVEL</td><td>階層</td><td></tr>
			<tr><td>SALPERNO</td><td>銷售員編號</td><td></tr>
			<tr><td>CUSNO</td><td>顧客編號</td><td></tr>
			<tr><td>ADDNO</td><td>地址編號</td><td></tr>
			<tr><td>SALEAMTMTD</td><td>月結帳至今期間之銷售額</td><td></tr>
			<tr><td>SALEAMTSTD</td><td>季結帳至今期間之銷售額</td><td></tr>
			<tr><td>SALEAMTYTD</td><td>年結帳至今期間之銷售額</td><td></tr>
			<tr><td>SALEAMT</td><td>累積銷售額</td><td></tr>
			<tr><td>PRODUCER</td><td>產生者</td><td></tr>
			<tr><td>PRODUCE_TIME</td><td>產生日期</td><td></tr>
			</table>
			";
		}
		else {
			$content = "unknown request event";
		}
	}
	return array('title' => $title, 'content' => $content);
}