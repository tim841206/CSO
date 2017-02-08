<?
include_once("../resource/database.php");
include_once("../resource/attachment.php");

if (safe($_POST['module']) == "ORDMAS") {
	if (safe($_POST['event']) == "CreateORDMAS") {
		if (safe($_POST['option']) == "SALPERNO") {
			$result = check_SALPERNO_exist(safe($_POST['SALPERNO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "CUSNO") {
			$result = check_CUSNO_exist(safe($_POST['SALPERNO']), safe($_POST['CUSNO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "CUS_PO_NO") {
			$result = check_50(safe($_POST['CUS_PO_NO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "SHIP_ADD_NO") {
			$result = check_ADDNO_exist(safe($_POST['CUSNO']), safe($_POST['SHIP_ADD_NO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "BILL_ADD_NO") {
			$result = check_ADDNO_exist(safe($_POST['CUSNO']), safe($_POST['BILL_ADD_NO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "ORD_INST") {
			$result = check_50(safe($_POST['ORD_INST']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "DATE_REQ") {
			$result = check_notnull(safe($_POST['DATE_REQ']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "Create") {
			$SALPERNO = safe($_POST['SALPERNO']);
			$ORDTYPE = safe($_POST['ORDTYPE']);
			$CUSNO = safe($_POST['CUSNO']);
			$CUS_PO_NO = safe($_POST['CUS_PO_NO']);
			$SHIP_ADD_NO = safe($_POST['SHIP_ADD_NO']);
			$BILL_ADD_NO = safe($_POST['BILL_ADD_NO']);
			$ORD_INST = safe($_POST['ORD_INST']);
			$DATE_REQ = safe($_POST['DATE_REQ']);
			$result1 = check_SALPERNO_exist($SALPERNO);
			$result2 = check_CUSNO_exist($SALPERNO, $CUSNO);
			$result3 = check_50($CUS_PO_NO);
			$result4 = check_ADDNO_exist($CUSNO, $SHIP_ADD_NO);
			$result5 = check_ADDNO_exist($CUSNO, $BILL_ADD_NO);
			$result6 = check_50($ORD_INST);
			$result7 = check_notnull($DATE_REQ);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6 + $result7;
			if ($result == 0) {
				$ORDNO = query_ORDNO($ORDTYPE);
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO ORDMAS (ORDNO, ORDTYPE, CUSNO, CUS_PO_NO, SHIP_ADD_NO, BILL_ADD_NO, BACKCODE, INVOICENO, SALPERNO, TO_ORD_AMT, TO_SHP_AMT, SALEAMTYTD, SALEAMTSTD, SALEAMTMTD, ORD_INST, ORDCOMPER, ORD_STAT, DATE_REQ, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$ORDNO', '$ORDTYPE', '$CUSNO', '$CUS_PO_NO', '$SHIP_ADD_NO', '$BILL_ADD_NO', 0, 0, '$SALPERNO', 0, 0, 0, 0, 0, '$ORD_INST', 0, 'E', '$DATE_REQ', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					if ($ORDTYPE == 'G') {
						mysql_query("UPDATE CSO_setup SET VALUE=VALUE+1 WHERE TYPENO='OG'");
					}
					elseif ($ORDTYPE == 'S') {
						mysql_query("UPDATE CSO_setup SET VALUE=VALUE+1 WHERE TYPENO='OS'");
					}
					echo json_encode(array('state' => 0, 'ORDNO' => $ORDNO));
					return;
				}
				else {
					echo json_encode(array('state' => -1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -2));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "CreateORDMAT") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO_valid(safe($_POST['ORDNO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "WHOUSE") {
			$result = check_WHOUSE_exist(safe($_POST['WHOUSE']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "ITEMNO") {
			$result = check_ITEMNO(safe($_POST['ORDNO']), safe($_POST['ITEMNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'UNI_COST' => $result['UNI_COST'], 'ITEMCLASS' => $result['ITEMCLASS'], 'BASE_PRICE' => $result['BASE_PRICE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "QTYORD") {
			$result = positive_notnull(safe($_POST['QTYORD']));
			if ($result == 0) {
				$price = get_price(safe($_POST['ITEMNO']), safe($_POST['PRICE_CNT']), safe($_POST['PERCENTDIS']), safe($_POST['QTYORD']));
				echo json_encode(array('state' => $result, 'PRICE_SELL' => $price['PRICE_SELL'], 'NET_SALES' => $price['NET_SALES']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "PRICE_CNT") {
			if (check_PRICE_CNT(safe($_POST['PRICE_CNT'])) == 0) {
				$price = get_price(safe($_POST['ITEMNO']), safe($_POST['PRICE_CNT']), safe($_POST['PERCENTDIS']), safe($_POST['QTYORD']));
				echo json_encode(array('state' => 0, 'PRICE_SELL' => $price['PRICE_SELL'], 'NET_SALES' => $price['NET_SALES']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "PERCENTDIS") {
			if (check_PERCENTDIS(safe($_POST['PERCENTDIS'])) == 0) {
				$price = get_price(safe($_POST['ITEMNO']), safe($_POST['PRICE_CNT']), safe($_POST['PERCENTDIS']), safe($_POST['QTYORD']));
				echo json_encode(array('state' => 0, 'PRICE_SELL' => $price['PRICE_SELL'], 'NET_SALES' => $price['NET_SALES']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Create") {
			$ORDNO = safe($_POST['ORDNO']);
			$WHOUSE = safe($_POST['WHOUSE']);
			$ITEMNO = safe($_POST['ITEMNO']);
			$ITEM = query_ITEM($ITEMNO);
			$ITEMCLASS = $ITEM['ITEMCLASS'];
			$UNI_COST = $ITEM['UNI_COST'];
			$QTYORD = safe($_POST['QTYORD']);
			$BASE_PRICE = $ITEM['BASE_PRICE'];
			$PRICE_CNT = safe($_POST['PRICE_CNT']);
			$PERCENTDIS = safe($_POST['PERCENTDIS']);
			$price = get_price($ITEMNO, $PRICE_CNT, $PERCENTDIS, $QTYORD);
			$PRICE_SELL = $price['PRICE_SELL'];
			$NET_SALES = $price['NET_SALES'];
			$TAX_CODE = safe($_POST['TAX_CODE']);
			$result1 = check_ORDNO_valid($ORDNO);
			$result2 = check_WHOUSE_exist($WHOUSE);
			$result3 = is_array(check_ITEMNO($ORDNO, $ITEMNO))? 0 : -1;
			$result4 = positive_notnull($QTYORD);
			$result5 = check_PRICE_CNT($PRICE_CNT);
			$result6 = check_PERCENTDIS($PERCENTDIS);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$CREATEDATE = date("Y-m-d H:i:s");
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "INSERT INTO ORDMAT (ORDNO, ITEMNO, WHOUSE, UNI_COST, ITEMCLASS, QTYORD, QTYSHIP, QTYBAKORD, BASE_PRICE, PRICE_CNT, PERCENTDIS, PRICE_SELL, NET_SALES, TAX_CODE, CREATEDATE, UPDATEDATE, ACTCODE) VALUES ('$ORDNO', '$ITEMNO', '$WHOUSE', '$UNI_COST', '$ITEMCLASS', '$QTYORD', 0, '$QTYORD', '$BASE_PRICE', '$PRICE_CNT', '$PERCENTDIS', '$PRICE_SELL', '$NET_SALES', '$TAX_CODE', '$CREATEDATE', '$UPDATEDATE', 1)";
				if (mysql_query($sql)) {
					update_TO_ORD_AMT($ORDNO, $ITEMNO, 'Plus');
					echo json_encode(array('state' => 0, 'UNI_COST' => $UNI_COST, 'ITEMCLASS' => $ITEMCLASS, 'BASE_PRICE' => $BASE_PRICE, 'PRICE_SELL' => $PRICE_SELL, 'NET_SALES' => $NET_SALES));
					return;
				}
				else {
					echo json_encode(array('state' => -1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -2));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "EditORDMAS") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO(safe($_POST['ORDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'ORDTYPE' => $result['ORDTYPE'], 'CUSNO' => $result['CUSNO'], 'SALPERNO' => $result['SALPERNO'], 'CUS_PO_NO' => $result['CUS_PO_NO'], 'SHIP_ADD_NO' => $result['SHIP_ADD_NO'], 'BILL_ADD_NO' => $result['BILL_ADD_NO'], 'ORD_INST' => $result['ORD_INST'], 'DATE_REQ' => $result['DATE_REQ']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "CUS_PO_NO") {
			$result = check_50(safe($_POST['CUS_PO_NO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "SHIP_ADD_NO") {
			$query = check_ORDNO(safe($_POST['ORDNO']));
			$result = check_ADDNO_exist(safe($query['CUSNO']), safe($_POST['SHIP_ADD_NO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "BILL_ADD_NO") {
			$query = check_ORDNO(safe($_POST['ORDNO']));
			$result = check_ADDNO_exist(safe($query['CUSNO']), safe($_POST['BILL_ADD_NO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "ORD_INST") {
			$result = check_50(safe($_POST['ORD_INST']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "DATE_REQ") {
			$result = check_notnull(safe($_POST['DATE_REQ']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "Edit") {
			$ORDNO = safe($_POST['ORDNO']);
			$CUS_PO_NO = safe($_POST['CUS_PO_NO']);
			$SHIP_ADD_NO = safe($_POST['SHIP_ADD_NO']);
			$BILL_ADD_NO= safe($_POST['BILL_ADD_NO']);
			$ORD_INST= safe($_POST['ORD_INST']);
			$DATE_REQ= safe($_POST['DATE_REQ']);
			$query = check_ORDNO($ORDNO);
			$result1 = is_array(check_ORDNO($ORDNO))? 0 : check_ORDNO($ORDNO);
			$result2 = check_50($CUS_PO_NO);
			$result3 = check_ADDNO_exist($query['CUSNO'], $SHIP_ADD_NO);
			$result4 = check_ADDNO_exist($query['CUSNO'], $BILL_ADD_NO);
			$result5 = check_50($ORD_INST);
			$result6 = check_notnull($DATE_REQ);
			$result = $result1 + $result2 + $result3 + $result4 + $result5 + $result6;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE ORDMAS SET CUS_PO_NO='$CUS_PO_NO', SHIP_ADD_NO='$SHIP_ADD_NO', BILL_ADD_NO='$BILL_ADD_NO', ORD_INST='$ORD_INST', DATE_REQ='$DATE_REQ', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
				if (mysql_query($sql)) {
					echo json_encode(array('state' => 0));
					return;
				}
				else {
					echo json_encode(array('state' => -1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -2));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "EditORDMAT") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO_valid(safe($_POST['ORDNO']));
			echo json_encode(array('state' => $result));
			return;
		}
		elseif (safe($_POST['option']) == "ITEMNO") {
			$result = check_ORDMAT(safe($_POST['ORDNO']), safe($_POST['ITEMNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'WHOUSE' => $result['WHOUSE'], 'ITEMCLASS' => $result['ITEMCLASS'], 'UNI_COST' => $result['UNI_COST'], 'QTYORD' => $result['QTYORD'], 'BASE_PRICE' => $result['BASE_PRICE'], 'PRICE_CNT' => $result['PRICE_CNT'], 'PERCENTDIS' => $result['PERCENTDIS'], 'PRICE_SELL' => $result['PRICE_SELL'], 'NET_SALES' => $result['NET_SALES'], 'TAX_CODE' => $result['TAX_CODE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "QTYORD") {
			$result = positive_notnull(safe($_POST['QTYORD']));
			if ($result == 0) {
				$price = get_price(safe($_POST['ITEMNO']), safe($_POST['PRICE_CNT']), safe($_POST['PERCENTDIS']), safe($_POST['QTYORD']));
				echo json_encode(array('state' => $result, 'PRICE_SELL' => $price['PRICE_SELL'], 'NET_SALES' => $price['NET_SALES']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "PRICE_CNT") {
			if (check_PRICE_CNT(safe($PRICE_CNT)) == 0) {
				$price = get_price(safe($_POST['ITEMNO']), safe($_POST['PRICE_CNT']), safe($_POST['PERCENTDIS']), safe($_POST['QTYORD']));
				echo json_encode(array('state' => 0, 'PRICE_SELL' => $price['PRICE_SELL'], 'NET_SALES' => $price['NET_SALES']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "PERCENTDIS") {
			if (check_PERCENTDIS(safe($PERCENTDIS)) == 0) {
				$price = get_price(safe($_POST['ITEMNO']), safe($_POST['PRICE_CNT']), safe($_POST['PERCENTDIS']), safe($_POST['QTYORD']));
				echo json_encode(array('state' => 0, 'PRICE_SELL' => $price['PRICE_SELL'], 'NET_SALES' => $price['NET_SALES']));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Edit") {
			$ORDNO = safe($_POST['ORDNO']);
			$ITEMNO = safe($_POST['ITEMNO']);
			$QTYORD = safe($_POST['QTYORD']);
			$PRICE_CNT = safe($_POST['PRICE_CNT']);
			$PERCENTDIS = safe($_POST['PERCENTDIS']);
			$price = get_price($ITEMNO, $PRICE_CNT, $PERCENTDIS, $QTYORD);
			$PRICE_SELL = $price['PRICE_SELL'];
			$NET_SALES = $price['NET_SALES'];
			$TAX_CODE = safe($_POST['TAX_CODE']);
			$result1 = check_ORDNO_valid($ORDNO);
			$result2 = is_array(check_ORDMAT($ORDNO, $ITEMNO))? 0 : check_ORDMAT($ORDNO, $ITEMNO);
			$result3 = positive_notnull($QTYORD);
			$result4 = check_PRICE_CNT($PRICE_CNT);
			$result5 = check_PERCENTDIS($PERCENTDIS);
			$result = $result1 + $result2 + $result3 + $result4 + $result5;
			if ($result == 0) {
				date_default_timezone_set('Asia/Taipei');
				$UPDATEDATE = date("Y-m-d H:i:s");
				$sql = "UPDATE ORDMAT SET QTYORD='$QTYORD', PRICE_CNT='$PRICE_CNT', PERCENTDIS='$PERCENTDIS', PRICE_SELL='$PRICE_SELL', NET_SALES='$NET_SALES', TAX_CODE='$TAX_CODE', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
				update_TO_ORD_AMT($ORDNO, $ITEMNO, 'Minus');
				if (mysql_query($sql)) {
					update_TO_ORD_AMT($ORDNO, $ITEMNO, 'Plus');
					echo json_encode(array('state' => 0, 'PRICE_SELL' => $PRICE_SELL, 'NET_SALES' => $NET_SALES));
					return;
				}
				else {
					echo json_encode(array('state' => -1));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -2));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "DeleteORDMAS") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO(safe($_POST['ORDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'ORDTYPE' => $result['ORDTYPE'], 'CUSNO' => $result['CUSNO'], 'SALPERNO' => $result['SALPERNO'], 'CUS_PO_NO' => $result['CUS_PO_NO'], 'SHIP_ADD_NO' => $result['SHIP_ADD_NO'], 'BILL_ADD_NO' => $result['BILL_ADD_NO'], 'ORD_INST' => $result['ORD_INST'], 'DATE_REQ' => $result['DATE_REQ'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Delete") {
			$ORDNO = safe($_POST['ORDNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE ORDMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE ORDNO='$ORDNO'";
			if (mysql_query($sql)) {
				$deleteORDMAT = "UPDATE ORDMAT SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE ORDNO='$ORDNO'";
				if (!mysql_query($deleteORDMAT)) {
					echo json_encode(array('state' => -2));
					return;
				}
				else {
					echo json_encode(array('state' => 0));
					return;
				}
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "DeleteORDMAT") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO(safe($_POST['ORDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ITEMNO") {
			$result = check_ORDMAT(safe($_POST['ORDNO']), safe($_POST['ITEMNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'WHOUSE' => $result['WHOUSE'], 'UNI_COST' => $result['UNI_COST'], 'ITEMCLASS' => $result['ITEMCLASS'], 'QTYORD' => $result['QTYORD'], 'QTYSHIP' => $result['QTYSHIP'], 'QTYBAKORD' => $result['QTYBAKORD'], 'BASE_PRICE' => $result['BASE_PRICE'], 'PRICE_CNT' => $result['PRICE_CNT'], 'PERCENTDIS' => $result['PERCENTDIS'], 'PRICE_SELL' => $result['PRICE_SELL'], 'NET_SALES' => $result['NET_SALES'], 'TAX_CODE' => $result['TAX_CODE'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Delete") {
			$ORDNO = safe($_POST['ORDNO']);
			$ITEMNO = safe($_POST['ITEMNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE ORDMAT SET UPDATEDATE='$UPDATEDATE', ACTCODE=0 WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
			if (mysql_query($sql)) {
				update_TO_ORD_AMT($ORDNO, $ITEMNO, 'Minus');
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "RecoverORDMAS") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO_deleted(safe($_POST['ORDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'ORDTYPE' => $result['ORDTYPE'], 'CUSNO' => $result['CUSNO'], 'SALPERNO' => $result['SALPERNO'], 'CUS_PO_NO' => $result['CUS_PO_NO'], 'SHIP_ADD_NO' => $result['SHIP_ADD_NO'], 'BILL_ADD_NO' => $result['BILL_ADD_NO'], 'ORD_INST' => $result['ORD_INST'], 'DATE_REQ' => $result['DATE_REQ'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$ORDNO = safe($_POST['ORDNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE ORDMAS SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE ORDNO='$ORDNO'";
			if (mysql_query($sql)) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
				return;
			}
		}
		else {
			echo "Invalid Access!";
		}
	}
	elseif (safe($_POST['event']) == "RecoverORDMAT") {
		if (safe($_POST['option']) == "ORDNO") {
			$result = check_ORDNO(safe($_POST['ORDNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "ITEMNO") {
			$result = check_ORDMAT_deleted(safe($_POST['ORDNO']), safe($_POST['ITEMNO']));
			if (is_array($result)) {
				echo json_encode(array('state' => 0, 'WHOUSE' => $result['WHOUSE'], 'UNI_COST' => $result['UNI_COST'], 'ITEMCLASS' => $result['ITEMCLASS'], 'QTYORD' => $result['QTYORD'], 'QTYSHIP' => $result['QTYSHIP'], 'QTYBAKORD' => $result['QTYBAKORD'], 'BASE_PRICE' => $result['BASE_PRICE'], 'PRICE_CNT' => $result['PRICE_CNT'], 'PERCENTDIS' => $result['PERCENTDIS'], 'PRICE_SELL' => $result['PRICE_SELL'], 'NET_SALES' => $result['NET_SALES'], 'TAX_CODE' => $result['TAX_CODE'], 'CREATEDATE' => $result['CREATEDATE'], 'UPDATEDATE' => $result['UPDATEDATE']));
				return;
			}
			else {
				echo json_encode(array('state' => $result));
				return;
			}
		}
		elseif (safe($_POST['option']) == "Recover") {
			$ORDNO = safe($_POST['ORDNO']);
			$ITEMNO = safe($_POST['ITEMNO']);
			date_default_timezone_set('Asia/Taipei');
			$UPDATEDATE = date("Y-m-d H:i:s");
			$sql = "UPDATE ORDMAT SET UPDATEDATE='$UPDATEDATE', ACTCODE=1 WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
			if (mysql_query($sql)) {
				update_TO_ORD_AMT($ORDNO, $ITEMNO, 'Plus');
				echo json_encode(array('state' => 0));
				return;
			}
			else {
				echo json_encode(array('state' => -1));
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
}
else {
	echo "Invalid Access!";
}

function check_notnull($value) {
	if (empty($value)) {
		return -1; // 無輸入
	}
	else {
		return 0; // ok
	}
}

function positive_notnull($value) {
	if (empty($value)) {
		return -1; // 無輸入
	}
	else {
		if (((int)$value == $value) && $value > 0) {
			return 0; // ok
		}
		else {
			return -2; // 非正整數
		}
	}
}

function check_50($value) {
	if (!empty($value) && strlen($value) > 50) {
		return -1; // 長度超過上限
	}
	else {
		return 0; // ok
	}
}

function check_SALPERNO_exist($SALPERNO) {
	$sql = "SELECT SALPERNO FROM SLSMAS WHERE SALPERNO='$SALPERNO' AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // 存在
	}
	else {
		return -1; // 不存在
	}
}

function check_CUSNO_exist($SALPERNO, $CUSNO) {
	$sql = "SELECT CUSNO FROM CUSMAS WHERE CUSNO='$CUSNO' AND SALPERNO='$SALPERNO' AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		return 0; // ok
	}
	else {
		return -1; // 不存在
	}
}

function check_ADDNO_exist($CUSNO, $ADDNO) {
	$sql = "SELECT * FROM CUSADD WHERE CUSNO='$CUSNO' AND ADDNO='$ADDNO' AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) == 0) {
		return -1; // 不存在
	} 
	else {
		return 0; // ok
	}
}

function check_WHOUSE_exist($WHOUSE) {
	$sql = "SELECT * FROM WHOUSE WHERE WHOUSE='$WHOUSE'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['actcode'] == 1) {
			return -2; // 已刪除
		}
		else {
			return 0; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_PRICE_CNT($PRICE_CNT) {
	if (empty($PRICE_CNT)) {
		return 0;
	}
	elseif (is_numeric($PRICE_CNT)) {
		return 0;
	}
	else {
		return -1;
	}
}

function check_PERCENTDIS($PERCENTDIS) {
	if ((empty($PERCENTDIS))) {
		return 0;
	}
	elseif ((is_numeric($PERCENTDIS) && $PERCENTDIS >= 0 && $PERCENTDIS <= 100)) {
		return 0;
	}
	else {
		return -1;
	}
}

function check_ORDNO($ORDNO) {
	$sql = "SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO' AND ACTCODE=1";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch; // ok
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ORDNO_deleted($ORDNO) {
	$sql = "SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return $fetch; // ok
		}
		else {
			return -2; // 未刪除
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ORDNO_valid($ORDNO) {
	$sql = "SELECT * FROM ORDMAS WHERE ORDNO='$ORDNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2; // 已刪除
		}
		elseif ($fetch['ORD_STAT'] != 'E') {
			return -3; // 已發佈
		}
		return 0; // ok
	}
	else {
		return -1; // 不存在
	}
}

function check_ITEMNO($ORDNO, $ITEMNO) {
	$sql = "SELECT * FROM ITMMAS WHERE ITEMNO='$ITEMNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['salable'] == 'N') {
			return -2; // 不可賣
		}
		else {
			$query = mysql_query("SELECT * FROM ORDMAT WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($query) > 0) {
				$queryORDMAT = mysql_fetch_array($query);
				if ($queryORDMAT['ACTCODE'] == 0) {
					return -3; // 已刪除
				}
				else {
					return -4; // 已存在
				}
			}
			else {
				$UNI_COST = $fetch['lab_sta'] + $fetch['mat_sta'] + $fetch['over_sta'];
				$ITEMCLASS = $fetch['itemclass'];
				$BASE_PRICE = $fetch['pri_cur'];
				return array('UNI_COST' => $UNI_COST, 'ITEMCLASS' => $ITEMCLASS, 'BASE_PRICE' => $BASE_PRICE);
			}
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ORDMAT($ORDNO, $ITEMNO) {
	$sql = "SELECT * FROM ORDMAT WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return -2;
		}
		else {
			return $fetch;
		}
	}
	else {
		return -1; // 不存在
	}
}

function check_ORDMAT_deleted($ORDNO, $ITEMNO) {
	$sql = "SELECT * FROM ORDMAT WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'";
	$result = mysql_query($sql);
	if (mysql_num_rows($result) > 0) {
		$fetch = mysql_fetch_array($result);
		if ($fetch['ACTCODE'] == 0) {
			return $fetch;
		}
		else {
			return -2; // 未刪除
		}
	}
	else {
		return -1; // 不存在
	}
}

function query_ORDNO($ORDTYPE) {
	if ($ORDTYPE == 'G') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='OG'";
	}
	elseif ($ORDTYPE == 'S') {
		$sql = "SELECT VALUE FROM CSO_setup WHERE TYPENO='OS'";
	}
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	return $fetch['VALUE'];
}

function get_price($ITEMNO, $PRICE_CNT, $PERCENTDIS, $QTYORD) {
	if (empty($PERCENTDIS)) {
		$PERCENTDIS = 0;
	}
	$ITEM = query_ITEM($ITEMNO);
	$BASE_PRICE = $ITEM['BASE_PRICE'];
	if (empty($PRICE_CNT)) {
		$PRICE_SELL = $BASE_PRICE * (1 - $PERCENTDIS/100);
		$NET_SALES = $QTYORD * $PRICE_SELL;
	}
	else {
		$PRICE_SELL = $PRICE_CNT * (1 - $PERCENTDIS/100);
		$NET_SALES = $QTYORD * $PRICE_SELL;
	}
	return array('PRICE_SELL' => $PRICE_SELL, 'NET_SALES' => $NET_SALES);
}

function query_ITEM($ITEMNO) {
	$sql = "SELECT * FROM ITMMAS WHERE ITEMNO='$ITEMNO'";
	$result = mysql_query($sql);
	$fetch = mysql_fetch_array($result);
	$UNI_COST = $fetch['lab_sta'] + $fetch['mat_sta'] + $fetch['over_sta'];
	$ITEMCLASS = $fetch['itemclass'];
	$BASE_PRICE = $fetch['pri_cur'];
	return array('UNI_COST' => $UNI_COST, 'ITEMCLASS' => $ITEMCLASS, 'BASE_PRICE' => $BASE_PRICE);
}

function update_TO_ORD_AMT($ORDNO, $ITEMNO, $type) {
	$result = mysql_query("SELECT NET_SALES FROM ORDMAT WHERE ORDNO='$ORDNO' AND ITEMNO='$ITEMNO'");
	$fetch = mysql_fetch_array($result);
	$NET_SALES = $fetch['NET_SALES'];
	if ($type == 'Plus') {
		mysql_query("UPDATE ORDMAS SET TO_ORD_AMT=TO_ORD_AMT+'$NET_SALES' WHERE ORDNO='$ORDNO'");
	}
	elseif ($type == 'Minus') {
		mysql_query("UPDATE ORDMAS SET TO_ORD_AMT=TO_ORD_AMT-'$NET_SALES' WHERE ORDNO='$ORDNO'");
	}
}