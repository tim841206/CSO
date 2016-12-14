<? init(); ?>
<form id="form" action="document.php" method="post" >
	<select class="" name="type" onchange="document.getElementById('form').submit();">
		<option value="CreateMAS" <? check_selected('type', 'CreateMAS') ?>>新增主檔維護</option>
		<option value="EditMAS" <? check_selected('type', 'EditMAS') ?>>修改主檔維護</option>
		<option value="DeleteMAS" <? check_selected('type', 'DeleteMAS') ?>>刪除主檔維護</option>
		<option value="ExportMAS" <? check_selected('type', 'ExportMAS') ?>>輸出主檔</option>
		<option value="SearchMAS" <? check_selected('type', 'SearchMAS') ?>>查詢主檔</option>
		<option value="CrossSearchMAS" <? check_selected('type', 'CrossSearchMAS') ?>>跨主檔查詢</option>
		<option value="ORDMAS" <? check_selected('type', 'ORDMAS') ?>>訂單主檔維護</option>
		<option value="SearchORDMAS" <? check_selected('type', 'SearchORDMAS') ?>>查詢訂單主檔</option>
		<option value="PublishORDMAS" <? check_selected('type', 'PublishORDMAS') ?>>發布訂單</option>
		<option value="Transaction" <? check_selected('type', 'Transaction') ?>>交易檔維護</option>
	</select>
	<? if ($_POST['type'] == 'CreateMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="CreateSLSMAS" <? check_selected('event', 'CreateSLSMAS') ?>>新增銷售員</option>
		<option value="CreateCUSMAS" <? check_selected('event', 'CreateCUSMAS') ?>>新增顧客</option>
		<option value="CreateCUSADD" <? check_selected('event', 'CreateCUSADD') ?>>新增顧客地址</option>
		<option value="CreateCUSREGION" <? check_selected('event', 'CreateCUSREGION') ?>>新增顧客地區</option>
		<option value="CreateCUSCITY" <? check_selected('event', 'CreateCUSCITY') ?>>新增顧客城市</option>
		<option value="CreateRELATION" <? check_selected('event', 'CreateCUSADDCITY') ?>>新增顧客地址城市關聯</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'EditMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="EditSLSMAS" <? check_selected('event', 'EditSLSMAS') ?>>修改銷售員</option>
		<option value="EditCUSMAS" <? check_selected('event', 'EditCUSMAS') ?>>修改顧客</option>
		<option value="EditCUSADD" <? check_selected('event', 'EditCUSADD') ?>>修改顧客地址</option>
		<option value="EditCUSREGION" <? check_selected('event', 'EditCUSREGION') ?>>修改顧客地區</option>
		<option value="EditCUSCITY" <? check_selected('event', 'EditCUSCITY') ?>>修改顧客城市</option>
		<option value="EditRELATION" <? check_selected('event', 'EditCUSADDCITY') ?>>修改顧客地址城市關聯</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'DeleteMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="DeleteSLSMAS" <? check_selected('event', 'DeleteSLSMAS') ?>>刪除銷售員</option>
		<option value="DeleteCUSMAS" <? check_selected('event', 'DeleteCUSMAS') ?>>刪除顧客</option>
		<option value="DeleteCUSADD" <? check_selected('event', 'DeleteCUSADD') ?>>刪除顧客地址</option>
		<option value="DeleteCUSREGION" <? check_selected('event', 'DeleteCUSREGION') ?>>刪除顧客地區</option>
		<option value="DeleteCUSCITY" <? check_selected('event', 'DeleteCUSCITY') ?>>刪除顧客城市</option>
		<option value="DeleteRELATION" <? check_selected('event', 'DeleteCUSADDCITY') ?>>刪除顧客地址城市關聯</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'ExportMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="ExportSLSMAS" <? check_selected('event', 'ExportSLSMAS') ?>>輸出銷售員</option>
		<option value="ExportCUSMAS" <? check_selected('event', 'ExportCUSMAS') ?>>輸出顧客</option>
		<option value="ExportCUSADD" <? check_selected('event', 'ExportCUSADD') ?>>輸出顧客地址</option>
		<option value="ExportCUSREGION" <? check_selected('event', 'ExportCUSREGION') ?>>輸出顧客地區</option>
		<option value="ExportCUSCITY" <? check_selected('event', 'ExportCUSCITY') ?>>輸出顧客城市</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'SearchMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="SearchSLSMAS" <? check_selected('event', 'SearchSLSMAS') ?>>查詢銷售員</option>
		<option value="SearchCUSMAS" <? check_selected('event', 'SearchCUSMAS') ?>>查詢顧客</option>
		<option value="SearchCUSADD" <? check_selected('event', 'SearchCUSADD') ?>>查詢顧客地址</option>
		<option value="SearchCUSREGION" <? check_selected('event', 'SearchCUSREGION') ?>>查詢顧客地區</option>
		<option value="SearchCUSCITY" <? check_selected('event', 'SearchCUSCITY') ?>>查詢顧客城市</option>
		<option value="SearchRELATION" <? check_selected('event', 'SearchCUSADDCITY') ?>>查詢顧客地址城市關聯</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'CrossSearchMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="SLSMASSearchCUSMAS" <? check_selected('event', 'SLSMASSearchCUSMAS') ?>>銷售員查詢顧客</option>
		<option value="CUSMASSearchCUSCITY" <? check_selected('event', 'CUSMASSearchCUSADD') ?>>顧客查詢顧客地址</option>
		<option value="CUSREGIONSearchCUSCITY" <? check_selected('event', 'CUSREGIONSearchCUSCITY') ?>>顧客地區查詢顧客城市</option>
		<option value="CUSCITYSearchRELATION" <? check_selected('event', 'CUSCITYSearchCUSADDCITY') ?>>顧客城市查詢顧客地址城市關聯</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'ORDMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="CreateORDMAS" <? check_selected('event', 'CreateORDMAS') ?>>新增訂單主檔</option>
		<option value="EditORDMAS" <? check_selected('event', 'EditORDMAS') ?>>修改訂單主檔</option>
		<option value="DeleteORDMAS" <? check_selected('event', 'DeleteORDMAS') ?>>刪除訂單主檔</option>
		<option value="CreateORDMAT" <? check_selected('event', 'CreateORDMAT') ?>>新增訂單材料</option>
		<option value="EditORDMAT" <? check_selected('event', 'EditORDMAT') ?>>修改訂單材料</option>
		<option value="DeleteORDMAT" <? check_selected('event', 'DeleteORDMAT') ?>>刪除訂單材料</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'SearchORDMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="SLSMASSearchORDMAS" <? check_selected('event', 'SLSMASSearchORDMAS') ?>>銷售員查詢訂單主檔</option>
		<option value="ORDNOSearchORDMAT" <? check_selected('event', 'ORDNOSearchORDMAT') ?>>訂單編號查詢訂單物料</option>
		<option value="ORDNOSearchORDMAS" <? check_selected('event', 'ORDNOSearchORDMAS') ?>>訂單編號查詢訂單主檔</option>
		<option value="ORDMATSearchORDMAS" <? check_selected('event', 'ORDMATSearchORDMAS') ?>>訂單物料查詢訂單主檔</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'PublishORDMAS'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="R_ORDMAS" <? check_selected('event', 'R_ORDMAS') ?>>發布訂單</option>
		<option value="C_ORDMAS" <? check_selected('event', 'C_ORDMAS') ?>>正常關閉訂單</option>
		<option value="F_ORDMAS" <? check_selected('event', 'F_ORDMAS') ?>>強制關閉訂單</option>
		<option value="RR_ORDMAS" <? check_selected('event', 'RR_ORDMAS') ?>>重生訂單</option>
	</select>
	<? } ?>
	<? if ($_POST['type'] == 'Transaction'){ ?>
	<select class="" name="event" onchange="document.getElementById('form').submit();">
		<option value="PrintPCK" <? check_selected('event', 'PrintPCK') ?>>列印揀貨單</option>
		<option value="SearchPCK" <? check_selected('event', 'SearchPCK') ?>>查詢揀貨單</option>
		<option value="PergePCK" <? check_selected('event', 'PergePCK') ?>>作廢揀貨單</option>
		<option value="CreateINV" <? check_selected('event', 'CreateINV') ?>>新增發票</option>
		<option value="PrintINV" <? check_selected('event', 'PrintINV') ?>>列印發票</option>
		<option value="SearchINV" <? check_selected('event', 'SearchINV') ?>>查詢發票</option>
	</select>
	<? } ?>
</form>
<p id="content"></p>
<? call_content($_POST['type'], $_POST['event']); ?>
<?
function init() {
	if (!isset($_POST['type'])){
		$_POST['type'] = 'CreateMAS';
	}
	else {
		if (!isset($_POST['event'])){
			if ($_POST['type'] == 'CreateMAS') $_POST['event'] = 'CreateSLSMAS';
			elseif ($_POST['type'] == 'EditMAS') $_POST['event'] = 'EditSLSMAS';
			elseif ($_POST['type'] == 'DeleteMAS') $_POST['event'] = 'DeleteSLSMAS';
			elseif ($_POST['type'] == 'ExportMAS') $_POST['event'] = 'ExportSLSMAS';
			elseif ($_POST['type'] == 'SearchMAS') $_POST['event'] = 'SearchSLSMAS';
			elseif ($_POST['type'] == 'CrossSearchMAS') $_POST['event'] = 'SLSMASSearchCUSMAS';
			elseif ($_POST['type'] == 'ORDMAS') $_POST['event'] = 'CreateORDMAS';
			elseif ($_POST['type'] == 'SearchORDMAS') $_POST['event'] = 'SLSMASSearchORDMAS';
			elseif ($_POST['type'] == 'PublishORDMAS') $_POST['event'] = 'R_ORDMAS';
			elseif ($_POST['type'] == 'Transaction') $_POST['event'] = 'PrintPCK';
			else exit("unknown request type");
		}
	}
}
function check_selected($index, $value) {
	if ($index == 'type' && $value == $_POST['type']){
		echo "selected";
	}
	elseif ($index == 'event' && $value == $_POST['event']){
		echo "selected";
	}
}
function call_content($type, $event) {
	?>
	<script>
		var request = new XMLHttpRequest();
		request.open("POST", "document_service.php");
		var data = "type=<? echo $type; ?>&event=<? echo $event; ?>";
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);

		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.msg == 'ok') {
					document.getElementById("content").innerHTML = data.content;
				}
				else {
					// error content feedback
				}
			}
		}
	</script>
	<?
}
?>
